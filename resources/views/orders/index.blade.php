<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>

<main role="main" class="main-content">
    <div class="container py-4">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Liste des commandes</h2>

            <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Créer une commande</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Statut</th>
                        <th>Total (DH)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ ucfirst($order->status) }}</td>
                            <td>{{ number_format($order->total_price, 2, ',', ' ') }}</td>
                            <td>
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Voir</a>
                                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette commande ?')">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
