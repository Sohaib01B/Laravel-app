<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <!-- Page Header -->
                <div class="row align-items-center my-3">
                    <div class="col">
                        <h2 class="page-title">Liste des Produits</h2>
                        <p class="text-muted">Gérez vos produits efficacement avec cette liste.</p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('produits.create') }}" class="btn btn-primary">
                            <span class="fe fe-plus fe-16 mr-2"></span>Ajouter un Produit
                        </a>
                    </div>
                </div>

                <!-- Liste des Produits -->
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Produits Disponibles</strong>
                    </div>
                    <div class="card-body">
                    <table class="table table-striped table-hover table-bordered align-middle text-center shadow-sm">
                        <thead class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>Désignation</th>
                                <th>Description</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Catégorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                                <tr>
                                    <td><strong>{{ $produit->id }}</strong></td>
                                    <td>{{ $produit->designation }}</td>
                                    <td class="text-truncate" style="max-width: 250px;">{{ $produit->description }}</td>
                                    <td><span class="">{{ $produit->quantite }}</span></td>
                                    <td><span class="fw-bold text-success">{{ $produit->prix }} DH</span></td>
                                    <td><span class="b">{{ $produit->categorie->nom }}</span></td>
                                    <td>
                                        <a href="{{ route('produits.show', $produit->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>
                                        <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline" 
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>
                </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main>
