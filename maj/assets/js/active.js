// script de modification du lien actif

// sélection des liens de la nav
let navLinks = document.querySelectorAll("nav > ul > li > a");
// itération sur la variable navLinks
for(link of navLinks){
    // si le href du lien est égal à l'url de la page consultée
    if(link.href == document.URL){
        // ajout de la classe .active sur le lien
        link.classList.add("active");
    }
}