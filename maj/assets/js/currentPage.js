// script de modification du lien actif

// sélection des liens de la nav
let navLinks = document.querySelectorAll("nav > ul > li > a");
// itération sur la variable navLinks
for(link of navLinks){
    // si le href du lien est égal à l'url de la page consultée
    if(document.URL.includes(link.href)){
    // if (window.location.pathname == "/" + link.id || window.location.pathname == "/"+link.id+"/"){
        // ajout de la classe .activeLink sur le lien
        link.classList.add("current");
    }
}