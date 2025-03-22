
@section('title', 'Modifier un Produit')

<div class="wrapper d-flex">
    <!-- Sidebar -->
    @include('layouts.sidebare')

    <div class="main-content w-100">
        <!-- Navbar -->
        @include('layouts.navbar')

        <div class="container py-4">
            <div class="card shadow-lg p-4">
                <h2 class="text-center text-primary mb-4">Modifier un Produit</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('produits.update', $produit->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="designation" class="form-label">Désignation</label>
                        <input type="text" class="form-control" name="designation" value="{{ old('designation', $produit->designation) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" name="description">{{ old('description', $produit->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="quantite" class="form-label">Quantité</label>
                        <input type="number" class="form-control" name="quantite" value="{{ old('quantite', $produit->quantite) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="prix" class="form-label">Prix</label>
                        <input type="number" step="0.01" class="form-control" name="prix" value="{{ old('prix', $produit->prix) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="categorie_id" class="form-label">Catégorie</label>
                        <select name="categorie_id" class="form-control" required>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}" {{ old('categorie_id', $produit->categorie_id) == $categorie->id ? 'selected' : '' }}>
                                    {{ $categorie->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
