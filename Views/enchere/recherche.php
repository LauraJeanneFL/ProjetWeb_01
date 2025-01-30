{{ include('layouts/header.php') }}
<h2>Résultats de recherche</h2>
<form action="{{ BASE }}/enchere/rechercher" method="GET">
    <input type="text" name="q" placeholder="Rechercher une enchère...">
    <button type="submit">Rechercher</button>
</form>

<ul>
    {% for enchere in encheres %}
        <li>
            <img src="{{ enchere.image }}" width="100">
            {{ enchere.nom }} - {{ enchere.prix }}$
        </li>
    {% endfor %}
</ul>
{{ include('layouts/footer.php') }}