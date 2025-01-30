{{include('layouts/header.php')}}
<main>
    <h1>Connexion</h1>
    <form action="{{ BASE }}/utilisateur/login" method="post">
        <label for="username">Nom d’utilisateur :</label>
        <input type="text" name="username" required>
        
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" required>
        
        <button type="submit" value="save">Se connecter</button>
    </form>
    {% if error %}
        <p class="error">{{ error }}</p>
    {% endif %}
</main>
{{include('layouts/footer.php')}}


