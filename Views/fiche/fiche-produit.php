
<h1>{{ product.name }}</h1>
<p>Description : {{ product.description }}</p>
<p>Prix : {{ product.price }} €</p>
<p>Disponibilité : {{ product.stock > 0 ? 'En stock' : 'Rupture de stock' }}</p>

<a href="/catalogue">Retour au catalogue</a>

