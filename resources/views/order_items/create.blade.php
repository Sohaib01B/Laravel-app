@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un article à la commande #{{ $order->id }}</h2>
    <form action="{{ route('orderItems.store') }}" method="POST">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order->id }}">

        <div class="form-group">
            <label for="produit_id">Produit :</label>
            <select name="produit_id" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nom }} - {{ $product->prix }}DH</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantite">Quantité :</label>
            <input type="number" name="quantite" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>

    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-secondary mt-3">Retour</a>
</div>
@endsection
