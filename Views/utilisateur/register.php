{{include('layouts/header.php')}}
    <main>
        <h1>Inscription</h1>
            <form method="post">
                <label for="first_name">Prénom :</label>
                <input type="text" name="first_name" required>
                
                <label for="last_name">Nom :</label>
                <input type="text" name="last_name" required>
                
                <label for="email">Email :</label>
                <input type="email" name="email" required>
                
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" required>
                
                <button type="submit">S inscrire</button>
            </form>
    </main>

{{include('layouts/footer.php')}}