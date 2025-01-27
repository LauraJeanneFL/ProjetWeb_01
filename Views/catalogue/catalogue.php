
<h1>Catalogue des produits</h1>

<div class="filters">
    <!-- Menu des filtres -->
    <form method="get" action="/catalogue">
        <label for="search">Rechercher :</label>
        <input type="text" id="search" name="q" placeholder="Rechercher un produit">

        <label for="category">Catégorie :</label>
        <select id="category" name="category">
            <option value="">Toutes</option>
            <option value="category1">Catégorie 1</option>
            <option value="category2">Catégorie 2</option>
        </select>

        <button type="submit">Filtrer</button>
    </form>
</div>

<div class="products">
    <!-- Affichage des produits -->
    {% for product in products %}
    <div class="product">
        <h2>{{ product.name }}</h2>
        <p>Prix : {{ product.price }} €</p>
        <a href="/fiche-produit/{{ product.id }}">Voir le produit</a>
    </div>
    {% endfor %}
</div>


