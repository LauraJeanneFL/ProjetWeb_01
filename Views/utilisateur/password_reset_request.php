{{include('layouts/header.php')}}
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <div class="container">
        <h1>Réinitialisation du mot de passe</h1>
        <form method="post">
            <label for="email">Adresse e-mail :</label>
            <input type="email" name="email" id="email" required>
            <button type="submit">Envoyer le lien</button>
        </form>
        {% if error %}
            <p class="error">{{ error }}</p>
        {% endif %}
    </div>
{{include('layouts/footer.php')}}