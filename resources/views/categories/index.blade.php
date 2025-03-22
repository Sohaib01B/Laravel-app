
@section('title', 'Liste des Catégories')

<div class="wrapper d-flex">
    <!-- Sidebar -->
    @include('layouts.sidebare')

    <div class="main-content w-100">
        <!-- Navbar -->
        @include('layouts.navbar')

        <div class="container py-4">
            <div class="card shadow-lg p-4">
                <h2 class="text-center text-primary mb-4">Liste des Catégories</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary">
                        Ajouter une Catégorie
                    </a>
                </div>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->nom }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-warning btn-sm">
                                        Modifier
                                    </a>
                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Voulez-vous vraiment supprimer cette catégorie ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($categories->isEmpty())
                    <p class="text-center text-muted">Aucune catégorie disponible.</p>
                @endif
            </div>
        </div>
    </div>
</div>
