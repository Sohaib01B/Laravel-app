<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Afficher la liste des catégories.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $categories = Categorie::all(); 
        return view('categories.index', compact('categories'));
    }

    /**
     * Afficher le formulaire pour créer une nouvelle catégorie.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Ajouter une nouvelle catégorie.
     *
     * @param  \Illuminate\Http\Request  
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        Categorie::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès');
    }

    /**
     * Afficher une catégorie spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return redirect()->route('categories.index')->with('error', 'Catégorie non trouvée');
        }

        return view('categories.show', compact('categorie'));
    }

    /**
     * Afficher le formulaire d'édition d'une catégorie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return redirect()->route('categories.index')->with('error', 'Catégorie non trouvée');
        }

        return view('categories.edit', compact('categorie'));
    }

    /**
     * Mettre à jour une catégorie spécifique.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return redirect()->route('categories.index')->with('error', 'Catégorie non trouvée');
        }

        $request->validate([
            'nom' => 'required|string|max:255',
        ]);

        $categorie->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    /**
     * Supprimer une catégorie spécifique.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::find($id);

        if (!$categorie) {
            return redirect()->route('categories.index')->with('error', 'Catégorie non trouvée');
        }

        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
