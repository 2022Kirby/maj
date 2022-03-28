const buttons = document.getElementsByClassName("accordion-button");

// itération sur l'array buttons
for(button of buttons){
    // écoute du clic
    button.addEventListener("click", function () {
        // ajout de la classe active
        this.classList.toggle("active");

        // toggle entre afficher ou cacher le panel actif
        const panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.display = "none";
            panel.style.maxHeight = null;
        } else {
            panel.style.display = "block";
            panel.style.maxHeight = panel.scrollHeight + "px";
        }
    });
} 