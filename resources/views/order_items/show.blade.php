@extends('layouts.app')

@section('content')
    <h1>Élément de commande #{{ $orderItem->id }}</h1>

    <p><strong>Commande ID :</strong> {{ $orderItem->order->id }}</p>
    <p><strong>Produit :</strong> {{ $orderItem->produit->name }}</p>
    <p><strong>Quantité :</strong> {{ $orderItem->quantite }}</p>
    <p><strong>Prix :</strong> {{ $orderItem->prix }} €</p>

    <a href="{{ route('order_items.index') }}" class="btn btn-secondary">Retour à la liste des éléments</a>
@endsection
