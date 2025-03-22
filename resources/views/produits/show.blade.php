<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>

<main role="main" class="main-content">
    <div class="container py-4">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Détails du Produit</h2>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $produit->id }}</p>
                    <p><strong>Désignation:</strong> {{ $produit->designation }}</p>
                    <p><strong>Description:</strong> {{ $produit->description }}</p>
                    <p><strong>Quantité:</strong> {{ $produit->quantite }}</p>
                    <p><strong>Prix:</strong> {{ $produit->prix }} DH</p>
                    <p><strong>Catégorie:</strong> {{ $produit->categorie->nom }}</p>

                    <!-- Formulaire d'ajout au panier -->
                    <form action="{{ route('cart.add', $produit->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="quantity"><strong>Quantité :</strong></label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="1" min="1">
                        </div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-shopping-cart"></i> Ajouter au panier
                        </button>
                    </form>
                </div>
                <div class="col-md-6 text-center">
                    @if($produit->image)
                    <img src="{{ asset('storage/'.$produit->image) }}" alt="Image du produit" class="img-fluid rounded shadow" width="300">
                    @else
                        <p class="text-muted">Aucune image disponible</p>
                    @endif
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('produits.index') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
</main>
