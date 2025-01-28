{{base}}

{% block content %}
    <main>
      <section class="banniere">
        <h1 class="banniere__titre">
          Explorez l’élégance de la philatélie à l’ère numérique
        </h1>
        <h3 class="banniere__sous-titre">
          Découvrez les trésors philatéliques du monde entier dans un
          environnement raffiné conçu pour les passionnés. Plongez dans
          l’univers des enchères exclusives de Lord Reginald Stampee.
        </h3>
        <div class="banniere__cartes">
          <article class="banniere__carte">
            <h4><a href="">Découvrez le catalogue</a></h4>
          </article>
          <article class="banniere__carte">
            <h4><a href="">Voir les timbres vedettes</a></h4>
          </article>
        </div>
      </section>

      <section class="section__background">
         <img
          src="assets/images-optimisees/Photos-banniere/timbres-sombres.webp"
          alt="Timbres sombres"
          class="section__image"
          width="1920"
          height="600"
        />
        <header class="section__header">
          <h1 class="section__titre">Comment ça marche ?</h1>
        </header>
        <div class="section__conteneur">
          <div class="section__liste">
            <article class="section__item">
              <h2 class="section__petitTitre">
                Connectez-vous ou inscrivez-vous
              </h2>
              <button class="section__button">Voir plus</button>
            </article>
            <article class="section__item">
              <h2 class="section__petitTitre">
                Recherche et trouver votre timbre
              </h2>
              <button class="section__button">Voir plus</button>
            </article>
            <article class="section__item">
              <h2 class="section__petitTitre">
                Suivez et misez sur vos enchères favorites
              </h2>
              <button class="section__button">Voir plus</button>
            </article>
          </div>
        </div>
      </section>

      <section class="hero">
        <header class="hero__en-tete">
          <h1 class="hero__titre--principal">Le Lord Reginal Stampee III</h1>
        </header>

        <section class="hero__contenu">
          <article class="hero__carte">
            <header class="hero__carte-entete">
              <h3 class="hero__titre-secondaire">
                À propos de Lord Reginald Stampee
              </h3>
            </header>
            <div class="hero__carte-texte-wrapper">
              <p class="hero__carte-texte">
                Né en 1954, Lord Reginald Stampee, duc de Worcessteshear, est un
                collectionneur passionné de timbres depuis son plus jeune âge.
                Avec un sens aigu de la tradition et une vision pour l’avenir,
                il a décidé de rendre ses enchères accessibles au monde entier.
              </p>
              <p class="hero__carte-texte">
                Au fil des années, il a acquis des pièces rares et précieuses,
                faisant de sa collection l’une des plus renommées au monde.
                Parmi ses trésors figurent le célèbre “Penny Black”, premier
                timbre postal émis au monde, ainsi que des éditions limitées de
                timbres impériaux russes et des séries commémoratives des Jeux
                olympiques.
              </p>
              <p class="hero__carte-texte-italique">
                “Les timbres ne sont pas de simples bouts de papier. Ils sont
                les gardiens d’histoires, d’événements, et de cultures qui ont
                façonné notre monde.” - Lord Reginald Stampee
              </p>

              <footer class="hero__pied">
                <button class="bouton bouton-lien" type="submit">
                  Voir la biographie complète
                </button>
              </footer>
            </div>
          </article>

          <article class="hero__carte">
            <header class="hero__carte-entete">
              <h3 class="hero__titre-secondaire">Citation du Lord :</h3>
            </header>
            <p class="hero__carte-texte-italique">
              “La philatélie est plus qu’un passe-temps : c’est une porte vers
              l’histoire et la culture.”
            </p>
            <img
              src="assets/images-optimisees/Photo-articles/lord-selfie.webp"
              alt="Lord Stampee"
              class="hero__carte-image"
            />
          </article>
        </section>
      </section>

      <div class="carrousel__background background-section">
        <section class="carrousel">
          <header class="carrousel__header">
            <h1 class="carrousel__titre">
              Sélections spéciales par Lord Stampee
            </h1>
            <p class="carrousel__sous-titre">
              Découvrez une sélection d’articles rares et emblématiques
              soigneusement choisis par Lord Stampee.
            </p>
          </header>
          <button
            class="carrousel__bouton carrousel__bouton--precedent"
            aria-label="Précédent"
          >
            &#8656;
          </button>
          <div class="carrousel__piste">
            <article class="carrousel__item">
              <img
                src="assets/images-optimisees/Photo-articles/timbre-fondNoir.webp"
                alt="Le monde turc"
                class="carrousel__image"
              />
              <h4 class="carrousel__description">Le monde turc</h4>
              <p>Lot #441</p>
              <button class="carrousel__action">Voir plus</button>
            </article>
            <article class="carrousel__item">
              <img
                src="assets/images-optimisees/Photo-articles/timbre-loupe.webp"
                alt="Timbre du monde"
                class="carrousel__image"
              />
              <h4 class="carrousel__description">Timbre du monde</h4>
              <p>Lot #1245</p>
              <button type="submit" class="carrousel__action">Voir plus</button>
            </article>
            <article class="carrousel__item">
              <img
                src="assets/images-optimisees/Photo-articles/timbres-fondBois.webp"
                alt="Timbre antique"
                class="carrousel__image"
              />
              <h4 class="carrousel__description">Timbre antique</h4>
              <p>Lot #6</p>
              <button class="carrousel__action">Voir plus</button>
            </article>
          </div>
          <button
            class="carrousel__bouton carrousel__bouton--suivant"
            aria-label="Suivant"
          >
            &#8658;
          </button>
          <div class="carrousel__indicateurs">
            <button
              class="carrousel__indicateur carrousel__indicateur--actif"
              aria-label="Voir le premier élément"
            ></button>
            <button
              class="carrousel__indicateur"
              aria-label="Voir le deuxième élément"
            ></button>
            <button
              class="carrousel__indicateur"
              aria-label="Voir le troisième élément"
            ></button>
          </div>
        </section>
      </div>

      <section class="offres">
        <h1 class="offres__titre">Offres vedettes</h1>
        <header class="offres__header">
          <h3 class="offres__sous-titre">
            Découvrez nos trésors philatéliques soigneusement sélectionnés,
            mettant en avant des pièces rares et emblématiques.
          </h3>
        </header>
        <div class="offres__grille">
          <article class="offres__item">
            <img
              src="assets/images-optimisees/Timbres/timbre-01.webp"
              alt="Timbre vedette"
              class="offres__image"
            />
            <div class="offres__details">
              <h6 class="offres__description">Timbre Français, Poste-France</h6>
              <span class="offres__prix">CAD 1,000.00</span>
              <button type="submit" class="bouton">Voir</button>
            </div>
          </article>
          <article class="offres__item">
            <img
              src="assets/images-optimisees/Timbres/timbre-02.webp"
              alt="Timbre vedette"
              class="offres__image"
            />
            <div class="offres__details">
              <h6 class="offres__description">Timbre Célimène</h6>
              <span class="offres__prix">CAD 35.00</span>
              <button type="submit" class="bouton">Voir</button>
            </div>
          </article>
          <article class="offres__item">
            <img
              src="assets/images-optimisees/Timbres/timbre-03.webp"
              alt="Timbre vedette"
              class="offres__image"
            />
            <div class="offres__details">
              <h6 class="offres__description">Timbre antique</h6>
              <span class="offres__prix">CAD 96.00</span>
              <button class="bouton">Voir</button>
            </div>
          </article>
          <article class="offres__item">
            <img
              src="assets/images-optimisees/Timbres/timbre-18.webp"
              alt="Timbre vedette"
              class="offres__image"
            />
            <div class="offres__details">
              <h6 class="offres__description">Lot de timbres #566</h6>
              <span class="offres__prix">CAD 147.00</span>
              <button class="bouton">Voir</button>
            </div>
          </article>
          <article class="offres__item">
            <img
              src="assets/images-optimisees/Timbres/timbre-11.webp"
              alt="Timbre vedette"
              class="offres__image"
            />
            <div class="offres__details">
              <h6 class="offres__description">Timbre de l'Empire</h6>
              <span class="offres__prix">CAD 60.00</span>
              <button class="bouton">Voir</button>
            </div>
          </article>
          <article class="offres__item">
            <img
              src="assets/images-optimisees/Timbres/timbre-13.webp"
              alt="Timbre vedette"
              class="offres__image"
            />
            <div class="offres__details">
              <h6 class="offres__description">
                Timbre de la Grande Méditerranée
              </h6>
              <span class="offres__prix">CAD 115.00</span>
              <button class="bouton">Voir</button>
            </div>
          </article>
        </div>
      </section>

      <section class="section actualites">
        <header class="section__header">
          <h1 class="titre titre--principal">Actualités</h1>
          <p class="section__sous-titre">
            Les dernières nouvelles de l’univers philatélique
          </p>
        </header>
        <div class="grille-cartes">
          <article class="carte actualites__article">
            <div class="carte__image-container">
              <img
                src="assets/images-optimisees/Photos-banniere/carte-monde.webp"
                alt="Lancement de Stampee"
                class="carte__image"
              />
            </div>
            <header class="carte__en-tete">
              <h2 class="titre titre--secondaire">
                Lancement de la plateforme Stampee
              </h2>
            </header>
            <p class="carte__description">
              La communauté internationale de philatélie célèbre l’ouverture
              officielle des enchères numériques de Lord Stampee.
            </p>
            <footer class="carte__pied">
              <button class="bouton bouton--primaire">
                Lire l’article complet →
              </button>
            </footer>
          </article>
          <article class="carte actualites__article">
            <div class="carte__image-container">
              <img
                src="assets/images-optimisees/Photos-banniere/timbres-insectes.webp"
                alt="Timbre historique"
                class="carte__image"
              />
            </div>
            <header class="carte__en-tete">
              <h2 class="titre titre--secondaire">
                Nouveau record pour un timbre historique
              </h2>
            </header>
            <p class="carte__description">
              Lors de la dernière vente, un timbre anglais de 1840 a été vendu
              pour £15,000, établissant un nouveau record.
            </p>
            <footer class="carte__pied">
              <button class="bouton bouton--primaire">En savoir plus →</button>
            </footer>
          </article>
          <article class="carte actualites__article">
            <div class="carte__image-container">
              <img
                src="assets/images-optimisees/Photo-articles/lords-sablier.webp"
                alt="Conseils pour collectionneurs"
                class="carte__image"
              />
            </div>
            <header class="carte__en-tete">
              <h2 class="titre titre--secondaire">
                Conseils pour collectionneurs débutants
              </h2>
            </header>
            <p class="carte__description">
              Découvrez comment démarrer une collection et les erreurs à éviter
              selon Lord Stampee.
            </p>
            <footer class="carte__pied">
              <button class="bouton bouton--primaire">
                Consulter les conseils →
              </button>
            </footer>
          </article>
        </div>
      </section>
    </main>
{% endblock %}
