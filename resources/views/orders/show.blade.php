<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>

<main role="main" class="main-content">
    <div class="container py-4">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Commande #{{ $order->id }}</h2>

            <div class="mb-3">
                <p><strong>Utilisateur :</strong> {{ $order->user->name }}</p>
                <p><strong>Statut :</strong> <span class="badge bg-info text-dark">{{ ucfirst($order->status) }}</span></p>
                <p><strong>Total :</strong> <span class="fw-bold">{{ number_format($order->total_price, 2, ',', ' ') }}DH</span></p>
            </div>

            <h4 class="mb-3">Articles commandés :</h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire (DH)</th>
                        <th>Total (DH)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->produit->designation }}</td>
                            <td>{{ $item->quantite }}</td>
                            <td>{{ number_format($item->produit->prix, 2, ',', ' ') }}DH</td>
                            <td>{{ number_format($item->quantite * $item->produit->prix, 2, ',', ' ') }}DH</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Retour</a>
        </div>
    </div>
</main>
