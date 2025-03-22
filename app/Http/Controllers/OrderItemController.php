<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Produit;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index()
{
    $orderItems = OrderItem::with('produit', 'order')->get();
    return view('order_items.index', compact('orderItems'));
}



    public function create()
    {
        $orders = Order::all();
        $products = Produit::all();
        return view('order_items.create', compact('orders', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'produit_id' => 'required|exists:produits,id',
            'quantite' => 'required|integer|min:1',
        ]);

        OrderItem::create([
            'order_id' => $request->order_id,
            'produit_id' => $request->produit_id,
            'quantite' => $request->quantite
        ]);

        return redirect()->route('orders.show', $request->order_id)->with('success', 'Article ajouté à la commande.');
    }

    public function destroy(OrderItem $orderItem)
    {
        $order = $orderItem->order;
        $orderItem->delete();
        return redirect()->route('orders.show', $order->id)->with('success', 'Article supprimé.');
    }
    
}
