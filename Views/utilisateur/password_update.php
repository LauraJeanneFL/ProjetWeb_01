{{include('layouts/header.php')}}
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <div class="container">
        <h1>Réinitialiser le mot de passe</h1>
        <form method="post">
            <input type="hidden" name="token" value="{{ token }}">
            <label for="password">Nouveau mot de passe :</label>
            <input type="password" name="password" required>
            <button type="submit">Mettre à jour</button>
        </form>
    </div>
{{include('layouts/footer.php')}}