<div class="wrapper">
    @include('layouts.navbar')
</div>

<div>
    @include('layouts.sidebare')
</div>

<main role="main" class="main-content">
    <div class="container py-4">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Créer une commande</h2>
            
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="status" class="form-label">Statut :</label>
                    <select name="status" class="form-control" required>
                        <option value="pending">En attente</option>
                        <option value="completed">Complétée</option>
                        <option value="cancelled">Annulée</option>
                    </select>
                </div>
                
                <h4 class="mt-4">Ajouter des produits</h4>
                <div id="products-container">
                    <div class="product-item mb-3">
                        <select name="order_items[0][produit_id]" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->designation }} - {{ $product->prix }}DH</option>
                            @endforeach
                        </select>
                        <input type="number" name="order_items[0][quantite]" class="form-control mt-2" placeholder="Quantité" min="1" required>
                    </div>
                </div>
                
                <button type="button" id="add-product" class="btn btn-secondary mt-2">Ajouter un autre produit</button>
                <button type="submit" class="btn btn-primary mt-3 w-100">Créer la commande</button>
            </form>
        </div>
    </div>
</main>

<script>
    document.getElementById('add-product').addEventListener('click', function () {
        let index = document.querySelectorAll('.product-item').length;
        let newProduct = document.createElement('div');
        newProduct.classList.add('product-item', 'mb-3');
        newProduct.innerHTML = `
            <select name="order_items[${index}][produit_id]" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->designation }} - {{ $product->prix }}€</option>
                @endforeach
            </select>
            <input type="number" name="order_items[${index}][quantite]" class="form-control mt-2" placeholder="Quantité" min="1" required>
        `;
        document.getElementById('products-container').appendChild(newProduct);
    });
</script>
