
@section('title', 'Ajouter une Catégorie')

<div class="wrapper d-flex">
    <!-- Sidebar -->
    @include('layouts.sidebare')

    <div class="main-content w-100">
        <!-- Navbar -->
        @include('layouts.navbar')

        <div class="container py-4">
            <div class="card shadow-lg p-4">
                <h2 class="text-center text-primary mb-4">Ajouter une Catégorie</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('categories.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom de la catégorie</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                        <div class="invalid-feedback">
                            Veuillez entrer un nom de catégorie.
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

