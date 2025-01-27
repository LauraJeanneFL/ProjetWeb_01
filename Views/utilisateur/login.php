
<h1>Connexion</h1>
<form action="/utilisateur/login" method="POST">
    <label for="username">Nom d’utilisateur :</label>
    <input type="text" name="username" required>
    
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" required>
    
    <button type="submit">Se connecter</button>
</form>
{% if error %}
    <p class="error">{{ error }}</p>
