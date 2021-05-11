// récupération des éléments HTML
var menu = document.querySelector('.menu');
var fermer = document.querySelector('.icone-fermer');
var burger = document.querySelector('.icone-menu');

// fonction pour ouvrir / fermer le menu
function afficherMenu() {
  menu.classList.toggle('visible');
}

// événements sur les icônes (click)
burger.addEventListener('click', afficherMenu);
fermer.addEventListener('click', afficherMenu);

