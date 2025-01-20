const nav = document.querySelector(".header__nav");
document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.getElementById("hamburger");
  if (!hamburger) {
    console.error("#hamburger non trouvé !");
  } else {
    hamburger.addEventListener("click", () => {
      const nav = document.getElementById("nav");
      if (nav) {
        nav.classList.toggle("active");
      } else {
        console.error("#nav non trouvé !");
      }
    });
  }
});

export function toggleMenu() {
  if (nav) {
    nav.classList.toggle("active");
  } else {
    console.error("Navigation principale introuvable.");
  }
}

export function changerImage(src) {
  const imagePrincipale = document.getElementById("imagePrincipale");
  if (imagePrincipale) {
    imagePrincipale.src = src;
  } else {
    console.error("Image principale introuvable.");
  }
}

// Gestion des miniatures pour changer l'image principale
document.addEventListener("DOMContentLoaded", () => {
  const miniatures = document.querySelectorAll(
    ".produit__galerie-miniatures img"
  );
  const imagePrincipale = document.getElementById("imagePrincipale");

  miniatures.forEach((miniature) => {
    miniature.addEventListener("click", () => {
      if (imagePrincipale) {
        changerImage(miniature.src);
      }
    });
  });
});
