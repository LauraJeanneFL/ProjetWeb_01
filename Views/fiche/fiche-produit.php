{% extends 'layout/base' %}
{% block content %}
    <main>
      <section class="produit">
        <div class="produit__conteneur">
          <aside class="produit__galerie">
            <div class="produit__galerie-miniatures">
              <img
                src="assets/images-optimisees/Timbres/timbre-01.webp"
                alt="Timbre 1"
                onclick="changerImage(this.src)"
                width="300"
                height="200"
              />
              <img
                src="assets/images-optimisees/Timbres/timbre-02.webp"
                alt="Timbre 2"
                onclick="changerImage(this.src)"
                width="400"
                height="300"
              />
              <img
                src="assets/images-optimisees/Timbres/timbre-03.webp"
                alt="Timbre 3"
                onclick="changerImage(this.src)"
                width="400"
                height="300"
              />
            </div>
          </aside>
          <section class="produit__image">
            <img
              src="assets/images-optimisees/Timbres/timbre-01.webp"
              alt="Timbre rare"
              width="400"
              height="300"
            />
            <article class="produit__action">
              <p><strong>Offre actuelle:</strong> 150$</p>
              <p>Il reste 6h</p>
              <div class="produit__action-offre">
                <input type="text" aria-label="miser" placeholder="Miser..." />
              </div>
              <div class="produit__boutons">
                <button class="bouton">Miser</button>
                <button class="bouton">Ajouter aux favoris</button>
              </div>
            </article>
          </section>
          <section class="produit__details">
            <h2 class="produit__description-titre">Informations</h2>
            <article class="produit__description">
              <p class="produit__titre">
                <strong>Timbre Classique de 1942</strong>
              </p>
              <p class="produit__categorie">
                <strong>Catégorie:</strong> Historique
              </p>
              <p class="produit__prix"><strong>Prix actuel:</strong> 50$</p>
              <p class="produit__etat">
                <strong>État:</strong>
                <span class="produit__etat--statut">Neuf</span>
              </p>
              <p class="produit__origine">
                <strong>Origine:</strong>
                <span class="produit__origine--pays">France</span>
              </p>
              <div>
                <button class="produit__bouton-voirPlus">+</button>
              </div>
            </article>
            <h2 class="produit__description-titre">Description du produit</h2>
            <article class="produit__description">
              <p>
                <strong>Nom:</strong> Emperor Napoleon III 20c Blue On Greenish
              </p>
              <p><strong>Date de création:</strong> 1853</p>
              <p><strong>Pays d’origine:</strong> France</p>
              <p><strong>Condition:</strong> Parfaite</p>
              <p class="produit__description-texte">
                Ce timbre historique datant de 1942 représente une œuvre d'art
                rare et bien conservée.
              </p>
              <div>
                <button class="produit__bouton-voirPlus">+</button>
              </div>
            </article>
            <h2 class="produit__description-titre">Enchère</h2>
            <article class="produit__description">
              <p>
                Le prix actuel est de 50$. Vous pouvez placer une mise pour
                débuter une enchère.
              </p>
              <p>Historique de vente</p>
              <p>
                Vous pouvez voir la liste des offres actuelles dans le panneau
                de contrôle. Les offres seront triées par prix décroissant.
              </p>
              <div>
                <button class="produit__bouton-voirPlus">+</button>
              </div>
            </article>
            <article class="produit__compte-a-rebours">
              <p class="produit__compte-a-rebours-texte">
                Temps restant :
                <span class="produit__compte-a-rebours-temps">02:12:45</span>
              </p>
            </article>
          </section>
        </div>
      </section>

      <section class="banniere">
        <h1>Articles qui pourraient vous intéressez</h1>
        <section class="galerie-produits">
          <div class="galerie-produits__contenu">
            <article class="galerie-produits__carte">
              <img
                src="assets/images-optimisees/Timbres/timbre-04.webp"
                alt="Timbre 4"
                width="400"
                height="300"
              />
              <h3>Timbre Historique de 1742</h3>
              <p>Prix : 1180$</p>
              <a class="bouton galerie-produits__bouton" href="">Voir plus</a>
            </article>
            <article class="galerie-produits__carte">
              <img
                src="assets/images-optimisees/Timbres/timbre-05.webp"
                alt="Timbre 5"
                width="400"
                height="300"
              />
              <h3>Timbre Rétro de 1970</h3>
              <p>Prix : 150$</p>
              <a class="bouton galerie-produits__bouton" href="">Voir plus</a>
            </article>
            <article class="galerie-produits__carte">
              <img
                src="assets/images-optimisees/Timbres/timbre-08.webp"
                alt="Timbre 8"
                width="400"
                height="300"
              />
              <h3>Germany 1977 Neuschwanstein Castle 50 Pf Used </h3>
              <p>Prix : 110$</p>
              <a class="bouton galerie-produits__bouton" href="">Voir plus</a>
            </article>
            <article class="galerie-produits__carte">
              <img
                src="assets/images-optimisees/Timbres/timbre-10.webp"
                alt="Timbre 10"
                width="400"
                height="300"
              />
              <h3>GB 1967 Queen Victoria Portrait 1s Used</h3>
              <p>Prix : 2823$</p>
              <a class="bouton galerie-produits__bouton" href="">Voir plus</a>
            </article>
          </div>
        </section>
      </section>
    </main>
    {% extends 'layout/base' %}
{% endblock %}
