<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Afficher le panier
    public function index()
    {
        // Retrieve the cart from session
        $cart = Session::get('cart', []);

        // Calculate the total price of the cart
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['produit']->prix * $item['quantite'];
        }

        return view('panier.index', compact('cart', 'total'));
    }

    // Ajouter un produit au panier
    public function addToCart(Request $request, $produitId)
    {
        $produit = Produit::findOrFail($produitId);
        $cart = Session::get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$produitId])) {
            // Update quantity
            $cart[$produitId]['quantite'] += $request->quantity;
        } else {
            // Add new product to the cart
            $cart[$produitId] = [
                'produit' => $produit,
                'quantite' => $request->quantity,
            ];
        }

        // Store updated cart in session
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produit ajouté au panier !');
    }

    // Supprimer un produit du panier
    public function removeFromCart($produitId)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$produitId])) {
            unset($cart[$produitId]);  // Remove product from the cart
        }

        // Store updated cart in session
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produit supprimé du panier.');
    }
}
