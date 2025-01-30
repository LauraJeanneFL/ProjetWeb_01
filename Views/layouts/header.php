
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stampee</title>
    <link rel="stylesheet" href="{{asset}}css/main.css">
    <script src="{{asset}}js/mode-sombre.js" defer></script>
    <script src="{{asset}}js/carrousel.js" defer></script>
</head>
<body>
    <header class="header">
        <input type="checkbox" id="menu-toggle" class="menu-toggle">
        <label for="menu-toggle" id="hamburger" class="hamburger">&#9776;</label>
        <nav class="header__nav">
            <ul class="header__nav_liens">
                <li class="header__medaillon">
                    <img src="{{ ('assets/images-optimisees/Logos/logo-2-alt.webp') }}" alt="logo-navigation">
                </li>
                <li><a href="{{ BASE }}/home/index">Accueil</a></li>
                <li class="header__nav_deroulant">
                    <a href="{{ BASE }}/catalogue/index">Portail d’enchère ▾</a>
                    <ul class="header__nav_sous-menu">
                        <li><a href="{{ BASE }}/fiche/fiche-produit">Fiche d'enchère</a></li>
                        <li><a href="{{BASE}}/enchere/liste">Enchères actives</a></li>
                        <li><a href="{{ BASE }}/enchere/archive">Enchères archivés</a></li>
                    </ul>
                </li>
                <li class="header__nav_deroulant">
                    <a href="#">A propos du Lord ▾</a>
                    <ul class="header__nav_sous-menu">
                        <li><a href="#">Biographie</a></li>
                        <li><a href="#">La philatélie</a></li>
                        <li><a href="#">Historique</a></li>
                    </ul>
                </li>
                <li class="header__nav_deroulant">
                    <a href="#">Langue ▾</a>
                    <ul class="header__nav_sous-menu">
                        <li><a href="#">Français</a></li>
                        <li><a href="#">Anglais</a></li>
                        <li><a href="#">Allemand</a></li>
                    </ul>
                </li>
                <a href="{{ BASE }}/utilisateur/login">
                    <button class="bouton bouton-navigation">Connexion</button>
                </a>
                <a href="{{ BASE }}/utilisateur/register">
                    <button class="bouton bouton-navigation">S'inscrire</button>
                </a>
                <li><button class="button theme__switch" id="theme-switch">Mode clair/sombre</button></li>
            </ul>
        </nav>
    </header>
   
    
    