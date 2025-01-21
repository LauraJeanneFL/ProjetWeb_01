const switchTheme = document.getElementById("theme-switch");

switchTheme.addEventListener("click", () => {
  document.body.classList.toggle("theme--sombre");
});
