@extends('layouts.app')

@section('content')
    <h1>Modifier la commande #{{ $order->id }}</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="total_price" class="form-label">Prix total</label>
            <input type="number" name="total_price" id="total_price" class="form-control" value="{{ $order->total_price }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Statut</label>
            <select name="status" id="status" class="form-control" required>
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>En attente</option>
                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Complétée</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Annulée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour la commande</button>
    </form>
@endsection
