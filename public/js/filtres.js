import { timbres } from "./timbres.js";

/**
 * Filtrer les timbres selon un critère et une valeur
 * @param {string} critere - Le critère de filtre (ex. "pays", "condition")
 * @param {string} valeur - La valeur du critère
 * @returns {Array} - Liste des timbres filtrés
 */
export function filtrerTimbres(critere, valeur) {
  return timbres.filter((timbre) => timbre[critere] === valeur);
}

/**
 * Trier les timbres par prix
 * @param {string} prixOrdre - Ordre de tri (ex. "prix-minimum", "prix-maximum")
 * @returns {Array} - Liste des timbres triés
 */
export function trierTimbres(prixOrdre) {
  const timbresTries = [...timbres];
  if (prixOrdre === "prix-minimum") {
    timbresTries.sort((a, b) => a.prix - b.prix); // Croissant
  } else if (prixOrdre === "prix-maximum") {
    timbresTries.sort((a, b) => b.prix - a.prix); // Décroissant
  }
  return timbresTries;
}

document.addEventListener("DOMContentLoaded", () => {
  const boutonFiltres = document.getElementById("bouton-filtres");
  const barreFiltres = document.getElementById("barre-filtres");

  if (boutonFiltres && barreFiltres) {
    boutonFiltres.addEventListener("click", () => {
      barreFiltres.classList.toggle("barre-filtres--active");
    });
  } else {
    console.error("Bouton ou barre de filtres introuvable.");
  }
});

/* /**
 * Afficher les timbres dans une section donnée
 * @param {Array} timbres - Liste des timbres à afficher

export function afficherTimbres(timbres) {
 const sectionProduits = document.querySelector(".section-produits__grille");
  if (!sectionProduits) {
    console.error("Section des produits introuvable !");
    return;
  }

  sectionProduits.innerHTML = ""; // Vide la section avant affichage
  timbres.forEach((timbre) => {
    const article = document.createElement("article");
    article.classList.add("carte-produit"); // Mise à jour avec la méthode BEM

    article.innerHTML = `
      <img src="${timbre.src}" alt="${timbre.nom}" />
      <h3 class="carte-produit__titre">${timbre.nom}</h3>
      <p class="carte-produit__prix">Prix : ${timbre.prix}$</p>
      <a class="carte-produit__lien" href="#">Enchérir</a>
    `;

    sectionProduits.appendChild(article);
  });
} */
