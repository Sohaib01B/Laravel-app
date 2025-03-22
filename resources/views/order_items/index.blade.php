<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>

<main role="main" class="main-content">
    <div class="container py-4">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Liste des articles de commande</h2>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Commande</th>
                        <th>Produit</th>
                        <th>Quantité</th>
                        <th>Prix unitaire (DH)</th>
                        <th>Total (DH)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderItems as $item)
                        <tr>
                            <td>#{{ $item->order->id }}</td>
                            <td>{{ $item->produit->designation }}</td>
                            <td>{{ $item->quantite }}</td>
                            <td>{{ number_format($item->produit->prix, 2, ',', ' ') }}DH</td>
                            <td>{{ number_format($item->quantite * $item->produit->prix, 2, ',', ' ') }}DH</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cet article ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('orders.index') }}" class="btn btn-secondary mt-3">Retour aux commandes</a>
        </div>
    </div>
</main>
