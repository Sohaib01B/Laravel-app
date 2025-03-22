



<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>


<main role="main" class="main-content">
        <div class="container py-4">
            <div class="card shadow-lg p-4">
                <h2 class="text-center text-primary mb-4">Ajouter un Produit</h2>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Génération IA -->
                <form action="{{ route('produits.generateAI') }}" method="POST" class="mb-4">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Message pour l'IA" id="message_ai" name="message" required>
                        <button type="submit" class="btn btn-primary">Générer</button>
                    </div>
                </form>

                @if(session('generated_data'))
                    @php
                        $data = session('generated_data');
                        $imageUrl = session('generated_image');
                    @endphp

                    <div class="alert alert-info">
                        <h4>Contenu généré par l'IA :</h4>
                        <ul>
                            <li><strong>Désignation:</strong> {{ $data['designation'] ?? '' }}</li>
                            <li><strong>Description:</strong> {{ $data['description'] ?? '' }}</li>
                            <li><strong>Quantité:</strong> {{ $data['quantite'] ?? '' }}</li>
                            <li><strong>Prix:</strong> {{ $data['prix'] ?? '' }}</li>
                        </ul>
                    </div>

                    <!-- Génération d'image -->
                    <form action="{{ route('produits.generateImage') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-warning w-100">Générer l'Image</button>
                    </form>

                    @if($imageUrl)
                        <div class="text-center mt-4">
                            <h4>Image générée par l'IA :</h4>
                            <img src="{{ session('generated_image') }}" alt="Image du produit" class="img-fluid rounded shadow" width="400">
                        </div>
                    @endif
                @endif

                <!-- Formulaire d'ajout de produit -->
                @if(session('generated_data'))
                    <form action="{{ route('produits.store') }}" method="POST" class="mt-4" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="designation" class="form-label">Désignation</label>
                            <input type="text" class="form-control" id="designation" name="designation" value="{{ old('designation', $data['designation'] ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description">{{ old('description', $data['description'] ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="quantite" class="form-label">Quantité</label>
                            <input type="number" class="form-control" id="quantite" name="quantite" value="{{ old('quantite', $data['quantite'] ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="{{ old('prix', $data['prix'] ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="categorie_id" class="form-label">Catégorie</label>
                            <select name="categorie_id" id="categorie_id" class="form-control" required>
                                @foreach($categories as $categorie)
                                    <option value="{{ $categorie->id }}" {{ (isset($data['categorie_id']) && $data['categorie_id'] == $categorie->id) ? 'selected' : '' }}>
                                        {{ $categorie->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image du produit</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-success w-100">Ajouter</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
 </div>
</main>
