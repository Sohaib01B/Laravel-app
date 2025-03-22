<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>

<main role="main" class="main-content">
    <div class="container py-4">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Votre Panier</h2>

            @if(count($cart) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Produit</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td>{{ $item['produit']->designation }}</td>
                                <td>{{ $item['quantite'] }}</td>
                                <td>{{ $item['produit']->prix }} DH</td>
                                <td>{{ $item['produit']->prix * $item['quantite'] }} DH</td>
                                <td>
                                    <form action="{{ route('cart.remove', $item['produit']->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center mt-4">
                    <h4>Total : {{ $total }} DH</h4>
                    <a href="{{ route('produits.index') }}" class="btn btn-secondary">Continuer vos achats</a>
                </div>
            @else
                <p class="text-center">Votre panier est vide.</p>
            @endif
        </div>
    </div>
</main>
