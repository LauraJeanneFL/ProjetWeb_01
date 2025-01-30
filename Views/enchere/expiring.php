{{ include('layouts/header.php') }}
<h2>Enchères Bientôt Expirées</h2>
<ul>
    {% for enchere in encheres %}
        <li style="color: red;">
            ⚠️ {{ enchere.nom }} - {{ enchere.prix }}$ - Expire le {{ enchere.date_fin }}
        </li>
    {% endfor %}
</ul>
{{ include('layouts/footer.php') }}