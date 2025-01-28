{% block content %}
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catalogue de produit</title>
    <link rel="stylesheet" href="public/assets/css/main.css" />
    <script src="assets/js/main.js" defer></script>
    <script src="assets/js/mode-sombre.js" defer></script>
  </head>

  <body>
    <header class="header">
      <input type="checkbox" id="menu-toggle" class="menu-toggle" />
      <label for="menu-toggle" id="hamburger" class="hamburger">&#9776;</label>
      <nav class="header__nav" id="nav">
        <ul class="header__nav_liens">
          <li class="header__medaillon">
            <img
              src="assets/images-optimisees/Logos/logo-2-alt.webp"
              alt="logo-navigation"
            />
          </li>
          <li><a href="index.html">Accueil</a></li>
          <li class="header__nav_deroulant">
            <a href="fiche-produits.html">Portail d’enchère ▾</a>
            <ul class="header__nav_sous-menu">
              <li><a href="fiche-produits.html">Fiche d'enchère</a></li>
              <li><a href="catalogue.html">Catalogue</a></li>
            </ul>
          </li>
          <li class="header__nav_deroulant">
            <a href="">A propos du Lord Reginal Stampee III ▾</a>
            <ul class="header__nav_sous-menu">
              <li><a href="">Biographie du Lord</a></li>
              <li><a href="">La philatélie, c'est la vie!</a></li>
              <li><a href="">Historique familiale</a></li>
            </ul>
          </li>
          <li class="header__nav_deroulant">
            <a href="">Langue ▾</a>
            <ul class="header__nav_sous-menu">
              <li><a href="">Français</a></li>
              <li><a href="">Anglais</a></li>
              <li><a href="">Allemand</a></li>
            </ul>
          </li>

          <li><button class="bouton bouton-navigation">S'inscrire</button></li>
          <li><button class="bouton bouton-navigation">Connexion</button></li>
          <li>
            <button class="button theme__switch" id="theme-switch">
              Mode clair/sombre
            </button>
          </li>
        </ul>
      </nav>
    </header>
    <main class="contenu__grille">
      <div id="bouton-filtres" class="bouton-filtres">
        <i class="fa-solid fa-sliders"></i>
      </div>
      <aside class="barre-filtres" id="barre-filtres">
        <button id="toggle-filters" class="barre-filtres__bouton bouton">
          Afficher/Masquer les filtres
        </button>
        <div class="barre-filtres__conteneur">
          <h2 class="barre-filtres__titre">Filtrer par :</h2>
          <form class="barre-filtres__formulaire">
            <fieldset class="barre-filtres__categorie">
              <legend class="barre-filtres__legende">Type</legend>
              <ul class="barre-filtres__options">
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="historique"
                    class="barre-filtres__checkbox"
                  />
                  <label for="historique" class="barre-filtres__label"
                    >Timbre historique</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="rare"
                    class="barre-filtres__checkbox"
                  />
                  <label for="rare" class="barre-filtres__label"
                    >Timbre rare</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="moderne"
                    class="barre-filtres__checkbox"
                  />
                  <label for="moderne" class="barre-filtres__label"
                    >Timbre art moderne</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="classique"
                    class="barre-filtres__checkbox"
                  />
                  <label for="classique" class="barre-filtres__label"
                    >Timbre classique</label
                  >
                </li>
              </ul>
            </fieldset>
            <fieldset class="barre-filtres__categorie">
              <legend class="barre-filtres__legende">Années</legend>
              <ul class="barre-filtres__options">
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="1900-1939"
                    class="barre-filtres__checkbox"
                  />
                  <label for="1900-1939" class="barre-filtres__label"
                    >1900-1939</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input type="checkbox" id="1940-1969" />
                  <label for="1940-1969" class="barre-filtres__label"
                    >1940-1969</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="1970-1999"
                    class="barre-filtres__checkbox"
                  />
                  <label for="1970-1999" class="barre-filtres__label"
                    >1970-1999
                  </label>
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="2000-2024"
                    class="barre-filtres__checkbox"
                  />
                  <label for="2000-2024" class="barre-filtres__label"
                    >2000-2024</label
                  >
                </li>
              </ul>
            </fieldset>
            <fieldset class="barre-filtres__categorie">
              <legend class="barre-filtres__legende">Couleur</legend>
              <ul class="barre-filtres__options">
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="blanc"
                    class="barre-filtres__checkbox"
                  />
                  <label for="blanc" class="barre-filtres__label">Blanc</label>
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="rouge"
                    class="barre-filtres__checkbox"
                  />
                  <label for="rouge" class="barre-filtres__label">Rouge</label>
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="bleu"
                    class="barre-filtres__checkbox"
                  />
                  <label for="bleu" class="barre-filtres__label">Bleu</label>
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="vert"
                    class="barre-filtres__checkbox"
                  />
                  <label for="vert" class="barre-filtres__label">Vert</label>
                </li>
              </ul>
            </fieldset>
            <fieldset class="barre-filtres__categorie">
              <legend class="barre-filtres__legende">Conditions</legend>
              <ul class="barre-filtres__options">
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="neuf"
                    class="barre-filtres__checkbox"
                  />
                  <label for="neuf" class="barre-filtres__label">Neuf</label>
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="occasion"
                    class="barre-filtres__checkbox"
                  />
                  <label for="occasion" class="barre-filtres__label"
                    >Occasion</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="legerement-endommage"
                    class="barre-filtres__checkbox"
                  />
                  <label for="legerement-endommage" class="barre-filtres__label"
                    >Légèrement endommagées</label
                  >
                </li>
              </ul>
            </fieldset>
            <fieldset class="barre-filtres__categorie">
              <legend class="barre-filtres__legende">Pays</legend>
              <ul class="barre-filtres__options">
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="angleterre"
                    class="barre-filtres__checkbox"
                  />
                  <label for="angleterre" class="barre-filtres__label"
                    >Angleterre</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="allemagne"
                    class="barre-filtres__checkbox"
                  />
                  <label for="allemagne" class="barre-filtres__label"
                    >Allemagne</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="canada"
                    class="barre-filtres__checkbox"
                  />
                  <label for="canada" class="barre-filtres__label"
                    >Canada</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="chine"
                    class="barre-filtres__checkbox"
                  />
                  <label for="chine" class="barre-filtres__label">Chine</label>
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="etats-unis"
                    class="barre-filtres__checkbox"
                  />
                  <label for="etats-unis" class="barre-filtres__label"
                    >États-Unis</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="espagne"
                    class="barre-filtres__checkbox"
                  />
                  <label for="espagne" class="barre-filtres__label"
                    >Espagne</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="france"
                    class="barre-filtres__checkbox"
                  />
                  <label for="france" class="barre-filtres__label"
                    >France</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="italie"
                    class="barre-filtres__checkbox"
                  />
                  <label for="italie" class="barre-filtres__label"
                    >Italie</label
                  >
                </li>
                <li class="barre-filtres__option">
                  <input
                    type="checkbox"
                    id="russie"
                    class="barre-filtres__checkbox"
                  />
                  <label for="russie" class="barre-filtres__label"
                    >Russie</label
                  >
                </li>
              </ul>
            </fieldset>
            <fieldset class="barre-filtres__categorie">
              <legend class="barre-filtres__legende">Trier par prix</legend>
              <div class="barre-filtres__range">
                <label for="prix-min" class="barre-filtres__range-label"
                  >Prix minimum</label
                >
                <input
                  type="range"
                  min="0"
                  max="10000"
                  id="prix-min"
                  class="barre-filtres__range-input"
                />
                <label for="prix-max" class="barre-filtres__range-label"
                  >Prix maximum</label
                >
                <input
                  type="range"
                  min="0"
                  max="10000"
                  id="prix-max"
                  class="barre-filtres__range-input"
                />
              </div>
              <button
                type="button"
                class="barre-filtres__appliquer"
                onclick="applyFilters()"
              >
                Appliquer les filtres
              </button>
            </fieldset>
          </form>
        </div>
      </aside>
      <div class="grille">
        <div class="grille__produit">
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-01.webp"
                alt="image-timbre-01"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              GB 1953 Queen Elizabeth II Coronation 5s Mint
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre de collection britannique
              commémorant le couronnement de la Reine Elizabeth II.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-02.webp"
                alt="image-timbre-02"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              Kenya 1976 Wildlife Elephant 10 Sh Used
            </h1>
            <p class="carte-produit__texte">
              État : Usagé. Timbre du Kenya illustrant un éléphant, partie de la
              série sur la faune africaine.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-03.webp"
                alt="image-timbre-03"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              USA 1992 Columbus Discovery 29c Mint
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre américain marquant le 500e
              anniversaire de la découverte de l'Amérique.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-04.webp"
                alt="image-timbre-04"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              Canada 1988 Polar Bear $1 Mint NH
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre canadien représentant un ours
              polaire, série Faune en péril.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-05.webp"
                alt="image-timbre-05"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              France 2000 Versailles 6.70F MNH
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre français montrant le Château de
              Versailles, série Patrimoine.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-06.webp"
                alt="image-timbre-06"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              Italy 1980 Colosseum 500 Lire MNH
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre italien représentant le Colisée
              de Rome, symbole du patrimoine.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-07.webp"
                alt="image-timbre-07"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              France 1993 Belle Epoque Toulouse-Lautrec 4.50F MNH
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre rendant hommage à l'artiste
              Toulouse-Lautrec et la Belle Époque.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-08.webp"
                alt="image-timbre-08"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              Germany 1977 Neuschwanstein Castle 50 Pf Used
            </h1>
            <p class="carte-produit__texte">
              État : Usagé. Timbre allemand illustrant le château de
              Neuschwanstein, emblème médiéval.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-09.webp"
                alt="image-timbre-09"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              GB 1967 Queen Victoria Portrait 1s Used
            </h1>
            <p class="carte-produit__texte">
              État : Usagé. Timbre britannique avec le portrait de la Reine
              Victoria.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-10.webp"
                alt="image-timbre-10"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              USA 1999 Personal Computer 33c MNH
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre célébrant l'invention de
              l'ordinateur personnel.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-11.webp"
                alt="image-timbre-11"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              Austria 2003 Art Nouveau Klimt 0.55€ Mint NH
            </h1>
            <p class="carte-produit__texte">
              État : Neuf sans charnière. Timbre autrichien illustrant Gustav
              Klimt, icône de l'Art Nouveau.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
          <article class="carte-produit">
            <div>
              <img
                src="assets/images-optimisees/Timbres/timbre-12.webp"
                alt="image-timbre-12"
              />
              <button class="carte-produit__favori">❤️</button>
            </div>
            <h1 class="carte-produit__titre">
              Brazil 1995 Scarlet Macaw 1 R$ Used
            </h1>
            <p class="carte-produit__texte">
              État : Usagé. Timbre brésilien représentant un Ara rouge exotique.
            </p>
            <a class="carte-produit__bouton bouton" href="">Enchérir</a>
          </article>
        </div>
      </div>
    </main>

    <footer class="pied-page">
      <nav class="pied-page__navigation">
        <div class="pied-page__section pied-page__section--droite">
          <h3 class="pied-page__titre">Fonctionnement de la plateforme</h3>
          <ul class="pied-page__liste">
            <li class="pied-page__item"><a href="">Aide : Profil</a></li>
            <li class="pied-page__item"><a href="">Aide : Connexion</a></li>
            <li class="pied-page__item"><a href="">Aide : Inscription</a></li>
            <li class="pied-page__item">
              <a href="">Aide : Fiche d'enchère</a>
            </li>
            <li class="pied-page__item">
              <a href="">Aide : Suivre une enchère</a>
            </li>
            <li class="pied-page__item">
              <a href="">Aide : Comment placer une offre</a>
            </li>
          </ul>
          <div class="pied-page__boutons">
            <button class="pied-page__bouton">S'inscrire</button>
            <button class="pied-page__bouton">Se connecter</button>
          </div>
        </div>

        <div class="pied-page__logo">
          <img
            src="assets/images-optimisees/Logos/logo-2-alt.webp"
            alt="Logo"
            class="pied-page__logo-image"
          />
        </div>

        <div class="pied-page__section pied-page__section--gauche">
          <h3 class="pied-page__titre">Contactez-nous</h3>
          <ul class="pied-page__liste">
            <li class="pied-page__item"><a href="">Angleterre</a></li>
            <li class="pied-page__item"><a href="">Canada</a></li>
            <li class="pied-page__item"><a href="">USA</a></li>
            <li class="pied-page__item"><a href="">Australie</a></li>
          </ul>
          <h3 class="pied-page__titre">Actualités</h3>
          <ul class="pied-page__liste">
            <li class="pied-page__item"><a href="">Timbre</a></li>
            <li class="pied-page__item"><a href="">Enchère</a></li>
            <li class="pied-page__item"><a href="">Bridge</a></li>
          </ul>
          <form
            action="recherche.html"
            method="GET"
            class="pied-page__recherche"
          >
            <input
              type="text"
              placeholder="Rechercher..."
              class="pied-page__recherche-input"
              aria-label="Champ de recherche"
            />
            <button type="submit" class="pied-page__recherche-bouton">
              🔍
            </button>
          </form>
        </div>
      </nav>

      <div class="pied-page__infos">
        <p>Conditions générales d'utilisation</p>
        <p>Mentions légales</p>
        <p>Cookies et confidentialité</p>
        <p>Tous droits réservés - Stampee</p>
      </div>
    </footer>
  </body>
</html>
{% endblock %}
