// script de construction du ticker / slider 
// voir https://splidejs.com/ pour la doc

// déclaration d'une variable ticker contenant une instanciation de classe Splide
const ticker = new Splide('#ticker', {
    // configuration du ticker
    type: 'loop',
    drag: false,
    perPage: 3,
    autoWidth: true,
    autoScroll: {
        speed: 1,
        pauseOnFocus: false,
    },
});
// montage du ticker
ticker.mount(window.splide.Extensions);

// déclaration d'une variable slider contenant une instanciation de classe Splide
const slider = new Splide('#slider', {
    // configuration du slider
    type: 'loop',
    drag: false,
    pauseOnFocus: false,
    autoplay: true,
    resetProgress: false,
});
// montage du slider
slider.mount();