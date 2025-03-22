<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('orderItems.produit')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $products = Produit::all();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_items.*.produit_id' => 'required|exists:produits,id',
            'order_items.*.quantite' => 'required|integer|min:1',
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order = Order::create([
            'user_id' => 1,
            'status' => $request->status
        ]);

        foreach ($request->order_items as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'produit_id' => $item['produit_id'],
                'quantite' => $item['quantite']
            ]);
        }

        return redirect()->route('orders.index')->with('success', 'Commande créée avec succès.');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('success', 'Commande mise à jour.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Commande supprimée.');
    }
}
