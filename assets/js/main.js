import { toggleDescription, initializeToggleButtons } from "./description.js";
import { toggleMenu, changerImage } from "./menu.js";
//import { filtrerTimbres, trierTimbres, afficherTimbres } from "./filtres.js";


// Assigner des fonctions globales
window.toggleDescription = toggleDescription;
window.changerImage = changerImage;

// Initialisation
document.addEventListener("DOMContentLoaded", () => {
  initializeToggleButtons(); // Initialise les boutons "voir plus"
});



// Initialisation au chargement du DOM
document.addEventListener("DOMContentLoaded", () => {
  // Initialiser les boutons "voir plus"
  initializeToggleButtons();

  // Configuration des événements pour les filtres
  const toggleFiltersButton = document.getElementById("toggle-filters");
  const filtersSidebar = document.getElementById("barre-filtres");

  if (toggleFiltersButton && filtersSidebar) {
    toggleFiltersButton.addEventListener("click", () => {
      filtersSidebar.classList.toggle("barre-filtres--active");
      console.log("Bouton de filtre cliqué !");
    });
  } else {
    console.error("Le bouton ou la barre de filtres est introuvable.");
  }

  /* // Exemple : Affichage initial des timbres
  afficherTimbres(filtrerTimbres("pays", "France"));

  // Exemple : Trier et afficher les timbres
  document.getElementById("prix-min").addEventListener("input", () => {
    afficherTimbres(trierTimbres("prix-minimum"));
  });

  document.getElementById("prix-max").addEventListener("input", () => {
    afficherTimbres(trierTimbres("prix-maximum"));
  });
 */
  // Ajoute d'autres gestionnaires d'événements ici si nécessaire
});
