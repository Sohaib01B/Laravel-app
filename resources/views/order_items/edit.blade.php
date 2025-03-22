@extends('layouts.app')

@section('content')
    <h1>Modifier l'élément de commande #{{ $orderItem->id }}</h1>

    <form action="{{ route('order_items.update', $orderItem->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="order_id" class="form-label">Commande</label>
            <select name="order_id" id="order_id" class="form-control" required>
                @foreach ($orders as $order)
                    <option value="{{ $order->id }}" {{ $orderItem->order_id == $order->id ? 'selected' : '' }}>
                        {{ $order->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="produit_id" class="form-label">Produit</label>
            <select name="produit_id" id="produit_id" class="form-control" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" {{ $orderItem->produit_id == $product->id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" value="{{ $orderItem->quantite }}" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" name="prix" id="prix" class="form-control" value="{{ $orderItem->prix }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour l'élément</button>
    </form>
@endsection
