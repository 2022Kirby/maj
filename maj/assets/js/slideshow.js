// sélection des images de la class slide
let slides = document.getElementsByClassName("slides");
// déclaration d'une variable slideIndex correspondant au numéro de slide
let slideIndex = 0;

// fonction d'affichage des slides
function displaySlide(){
    let i;
    for (i = 0; i < slides.length; i++){
        slides[i].style.display = "none";
    }
    slideIndex++;
    if(slideIndex > slides.length){
        slideIndex = 1;
    }
    slides[slideIndex-1].style.display = "block";
    // changement de slide toutes les 3 secondes
    setTimeout(displaySlide, 3000);
}

// appel de la fonction showSlide
displaySlide();