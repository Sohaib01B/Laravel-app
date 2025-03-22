<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;



class ProduitController extends Controller
{
    /**
     * Afficher tous les produits avec leurs catégories.
     */
    public function index()
    {
        $produits = Produit::with('categorie')->get();
        return view('produits.index', compact('produits'));
    }

    /**
     * Afficher le formulaire pour ajouter un produit.
     */
    public function create()
{
    $categories = Categorie::all(); // Assurer que tu récupères les catégories
    return view('produits.create', compact('categories'));
}

    /**
     * Ajouter un nouveau produit.
     */
    public function store(Request $request)
{
    $request->validate([
        'designation' => 'required|string|max:255',
        'description' => 'nullable|string',
        'quantite' => 'required|integer|min:1',
        'prix' => 'required|numeric|min:0',
        'categorie_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('produits', 'public');
        $data['image'] = $imagePath;
    }

    Produit::create($data);

    return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
}

    /**
     * Afficher un produit spécifique.
     */
    public function show($id)
{
    $produit = Produit::findOrFail($id); // Récupère le produit ou affiche une erreur 404
    return view('produits.show', compact('produit'));
}

    /**
     * Afficher le formulaire de modification d'un produit.
     */
    public function edit($id)
    {
        $produit = Produit::find($id);
        $categories = Categorie::all();

        if (!$produit) {
            return redirect()->route('produits.index')->with('error', 'Produit non trouvé');
        }

        return view('produits.edit', compact('produit', 'categories'));
    }

    /**
     * Modifier un produit.
     */
    public function update(Request $request, $id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect()->route('produits.index')->with('error', 'Produit non trouvé');
        }

        $request->validate([
            'designation' => 'sometimes|string|max:255',
            'description' => 'nullable|string',
            'quantite' => 'sometimes|integer|min:1',
            'prix' => 'sometimes|numeric|min:0',
            'categorie_id' => 'sometimes|exists:categories,id',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès');
    }

    /**
     * Supprimer un produit.
     */
    public function destroy($id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect()->route('produits.index')->with('error', 'Produit non trouvé');
        }

        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }


    
    
   


public function generateAI(Request $request)
{
    $message = $request->input('message');

    if (!$message) {
        return response()->json(['error' => 'Veuillez entrer un message'], 400);
    }

    $apiKey = config('app.gemini_api_key');

    if (empty($apiKey)) {
        return response()->json(['error' => 'Clé API manquante ou invalide'], 500);
    }

    $url = "https://generativelanguage.googleapis.com/v1/models/gemini-1.5-pro:generateContent?key=$apiKey";

    $payload = [
        "contents" => [
            [
                "role" => "user",
                "parts" => [
                    ["text" => "Génère un produit avec les informations suivantes : $message"]
                ]
            ]
        ],
        "generationConfig" => [
            "temperature" => 1,
            "topP" => 0.95,
            "topK" => 40,
            "maxOutputTokens" => 512
        ]
    ];

    try {
        $response = Http::withOptions([
            'verify' => false 
        ])->withHeaders([
            'Content-Type' => 'application/json',
        ])->post($url, $payload);

        Log::info('Réponse API :', ['status' => $response->status(), 'body' => $response->body()]);

        if ($response->failed()) {
            return response()->json([
                'error' => 'Erreur API',
                'status' => $response->status(),
                'response' => $response->body()
            ], $response->status());
        }

        $responseData = json_decode($response->body(), true);
        $generatedText = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? '';

        $designation = '';
        $description = '';
        $quantite = 0;
        $prix = 0.0;

        if (preg_match('/^(?:##\s*)?(.*?)\n/', $generatedText, $matches)) {
            $designation = trim($matches[1]);
        }

        if (preg_match('/\*\*Description:\*\*\s*(.*?)(\n|$)/s', $generatedText, $matches)) {
            $description = trim($matches[1]);
        }

        if (preg_match('/\*\*Quantité:\*\*\s*(\d+)/', $generatedText, $matches)) {
            $quantite = (int) $matches[1];
        }

        if (preg_match('/\*\*Prix:\*\*\s*([\d,.]+)/', $generatedText, $matches)) {
            $prix = (float) str_replace(',', '.', $matches[1]); // Conversion en format décimal
        }

        if (empty($designation) || empty($description) || $quantite === 0 || $prix === 0.0) {
            return response()->json(['error' => 'Format de réponse IA invalide', 'response' => $generatedText], 500);
        }

        $generatedData = [
            'designation' => $designation,
            'description' => $description,
            'quantite' => $quantite,
            'prix' => $prix,
        ];

        session(['generated_data' => $generatedData]);

        return redirect()->route('produits.create');

    } catch (\Exception $e) {
        Log::error('Erreur API IA : ' . $e->getMessage());
        return response()->json(['error' => 'Erreur de communication avec IA', 'message' => $e->getMessage()], 500);
    }
}



public function generateImage(Request $request)
{
    $description = session('generated_data')['description'] ?? null;

    if (!$description) {
        return response()->json(['error' => 'Aucune description fournie'], 400);
    }

    $apiKey = config('app.huggingface_api_key');

    if (empty($apiKey)) {
        return response()->json(['error' => 'Clé API Hugging Face manquante'], 500);
    }

    $model = "stabilityai/stable-diffusion-xl-base-1.0"; 

    $prompt = "A detailed and realistic image of a product: " . $description;

    try {
        $response = Http::withOptions([
            'verify' => false  
        ])->withHeaders([
            'Authorization' => "Bearer $apiKey",
            'Content-Type'  => 'application/json'
        ])->post("https://api-inference.huggingface.co/models/$model", [
            'inputs' => $prompt
        ]);

        if ($response->failed()) {
            return response()->json([
                'error'    => 'Erreur API Hugging Face',
                'status'   => $response->status(),
                'message'  => $response->body()
            ], $response->status());
        }

        $imageData = $response->body();
        $imageName = 'produit_' . time() . '.png';
        $imagePath = storage_path("app/public/$imageName");
        file_put_contents($imagePath, $imageData);

        session(['generated_image' => asset("storage/$imageName")]);

        return redirect()->back()->with('success', 'Image générée avec succès.');

    } catch (\Exception $e) {
        Log::error('Erreur de génération d\'image : ' . $e->getMessage());
        return response()->json([
            'error'   => 'Erreur lors de la génération de l\'image',
            'message' => $e->getMessage()
        ], 500);
    }
}




    
}
