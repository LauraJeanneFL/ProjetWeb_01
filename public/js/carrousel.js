// Sélection des éléments principaux
const carrousel = document.querySelector(".carrousel");
const piste = carrousel.querySelector(".carrousel__piste");
const items = Array.from(piste.children);
const boutonPrecedent = carrousel.querySelector(
  ".carrousel__bouton--precedent"
);
const boutonSuivant = carrousel.querySelector(".carrousel__bouton--suivant");
const indicateurs = carrousel.querySelectorAll(".carrousel__indicateur");

// Index de l'élément courant
let indexCourant = 0;

// Fonction pour mettre à jour la position du carrousel
function mettreAJourCarrousel() {
  const largeurItem = items[0].getBoundingClientRect().width; // Largeur d'un élément
  piste.style.transform = `translateX(-${indexCourant * largeurItem}px)`; // Déplace la piste

  // Mise à jour des indicateurs
  indicateurs.forEach((indicateur, i) => {
    indicateur.classList.toggle(
      "carrousel__indicateur--actif",
      i === indexCourant
    );
  });
}

// Écouteur sur le bouton "Suivant"
boutonSuivant.addEventListener("click", () => {
  indexCourant = (indexCourant + 1) % items.length; // Passe au prochain élément (avec retour au début)
  mettreAJourCarrousel();
});

// Écouteur sur le bouton "Précédent"
boutonPrecedent.addEventListener("click", () => {
  indexCourant = (indexCourant - 1 + items.length) % items.length; // Passe à l'élément précédent (avec retour à la fin)
  mettreAJourCarrousel();
});

// Écouteur pour les indicateurs
indicateurs.forEach((indicateur, i) => {
  indicateur.addEventListener("click", () => {
    indexCourant = i; // Met à jour l'index courant en fonction de l'indicateur cliqué
    mettreAJourCarrousel();
  });
});

// Initialisation (au cas où la position initiale est incorrecte)
mettreAJourCarrousel();
