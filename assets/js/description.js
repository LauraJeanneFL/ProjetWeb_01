export function toggleDescription(event) {
  const button = event.target; // Bouton sur lequel l'utilisateur clique
  const article = button.closest(".produit__description"); // Récupère l'article parent

  if (article) {
    const content = article.querySelectorAll("p, div:not(:last-child), h2"); // Contenu à afficher/masquer
    let isHidden = false;

    content.forEach((element) => {
      if (element.classList.contains("hidden")) {
        element.classList.remove("hidden"); // Affiche les éléments
        isHidden = false;
      } else {
        element.classList.add("hidden"); // Masque les éléments
        isHidden = true;
      }
    });

    // Change le texte du bouton
    button.textContent = isHidden ? "+" : "-";
  }
}

window.toggleDescription = toggleDescription;

export function initializeToggleButtons() {
  const articles = document.querySelectorAll(".produit__description");

  articles.forEach((article) => {
    const button = article.querySelector(".produit__bouton-voirPlus"); // Bouton "voir plus"
    const content = article.querySelectorAll("p, div:not(:last-child), h2"); // Contenu de l'article

    if (button) {
      button.textContent = "+"; // Texte par défaut du bouton

      // Ajoute la classe "hidden" pour masquer le contenu
      content.forEach((element) => {
        element.classList.add("hidden");
      });

      // Ajoute un écouteur d'événement au bouton
      button.addEventListener("click", toggleDescription);
    }
  });
}