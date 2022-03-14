<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- ticker -->
        <div class="splide" id="ticker">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- pour les besoins de la démo, insertion de lorem ipsum, via une boucle for -->
                    <?php for($i = 0 ; $i < 5 ; $i++):?>
                    <!-- chaque élément du ticker correspond à un élément li et contiendra un h4 et un p -->
                    <li class="splide__slide">
                        <h4>Lorem ipsum</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </li>
                    <?php endfor; ?> 
                </ul>
            </div>
        </div>

        <!-- slider -->
        <div class="splide" id="slider">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- chaque slide correspond à un élément li dans lequel on insère le contenu  -->
                    <li class="splide__slide"><img src="https://picsum.photos/1200/400?random=1" alt=""></li>
                    <li class="splide__slide"><img src="https://picsum.photos/1200/400?random=2" alt=""></li>
                    <li class="splide__slide"><img src="https://picsum.photos/1200/400?random=3" alt=""></li>
                    <li class="splide__slide"><img src="https://picsum.photos/1200/400?random=4" alt=""></li>
                    <li class="splide__slide"><img src="https://picsum.photos/1200/400?random=5" alt=""></li>
                    <li class="splide__slide"><img src="https://picsum.photos/1200/400?random=6" alt=""></li>
                </ul>
            </div>
            <!-- barre de progression de la slide -->
            <div class="splide__progress">
                <div class="splide__progress__bar">
                </div>
            </div>
        </div>

        <!-- title de la page -->
        <h2><?= $page->title() ?></h2>

        <!-- boucle foreach affichant pour chaque page enfant de la page actualité une image ainsi que les fields title et description de la page -->
        <?php foreach ($pages->find('actualites')->children()->listed() as $actualite):?>
                <figure>
                    <a href="<?= $actualite->url() ?>">
                        <img src="https://picsum.photos/400" alt="">
                    </a>
                    <figcaption>
                        <h3>
                            <a href="<?= $actualite->url() ?>">
                                <?= $actualite->title() ?>
                            </a>
                        </h3>
                        <p><?= $actualite->description() ?></p>
                    </figcaption>
                </figure>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script js du ticker -->
    <?= js('assets/js/splide-extension-auto-scroll.min.js') ?>
    <!-- lien vers le script js du slider -->
    <?= js('assets/js/splide.min.js') ?>
    
    <!-- insertion ticker / slider 
    voir https://splidejs.com/ -->
    <script>
        // vérification du chargement du contenu avant la construction des éléments
        document.addEventListener( 'DOMContentLoaded', function() {
            // déclaration d'une variable ticker contenant une instanciation de classe Splide
            const ticker = new Splide( '#ticker', {
                // configuration du ticker
                type: 'loop',
                drag: 'free',
                perPage: 4,
                autoScroll: {
                    speed: 1,
                    },
            } );
            // montage du ticker
            ticker.mount(window.splide.Extensions);

            // déclaration d'une variable slider contenant une instanciation de classe Splide
            const slider = new Splide( '#slider', {
                // configuration du slider
                type: 'loop',
                autoplay: true,
                resetProgress: false,
            } );
            // montage du slider
            slider.mount();
        } );
    </script>
</body>
</html>