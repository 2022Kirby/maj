<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- ticker -->
        <div class="splide" id="ticker">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- boucle foreach affichant pour chaque élément du ticker, les fields caption et text -->
                    <?php foreach ($page->breves()->toStructure() as $breve):?>
                        <li class="splide__slide">
                            <p><?= $breve->titre() ?></p>
                            <p><?= $breve->contenu() ?></p>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>

        <!-- slider -->
        <div class="splide" id="slider">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- boucle foreach affichant chaque image de la page actualités -->
                    <?php foreach ($page->images() as $image):?>
                        <!-- chaque slide correspond à un élément li dans lequel on insère le contenu -->
                        <li class="splide__slide"><img src="<?= $image->url() ?>" alt="image bannière"></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <!-- barre de progression de la slide -->
            <div class="splide__progress">
                <div class="splide__progress__bar">
                </div>
            </div>
        </div>

        <!-- title de la page -->
        <h2 id="ancre"><?= $page->title() ?></h2>

        <!-- boucle foreach affichant pour chaque page enfant de la page actualité la première image ainsi que les fields title et résumé de la page -->
        <?php foreach ($actualites = $page->children()->listed()->paginate(3) as $actualite):?>
            <div class="news">
                <a href="<?= $actualite->url() ?>">
                    <h3><?= $actualite->title() ?></h3>
                    
                    <?php if($actualite->resume()->exists()):?> <!-- si l'actualité possède un champ résumé -->
                        <p><?= $actualite->resume() ?></p>
                    <?php endif ?>
                </a>
            </div>
        <?php endforeach ?>

        <!-- pagination -->
        <?php if ($actualites->pagination()->hasPages()): ?>
            <nav id="pagination">
                <?php if ($actualites->pagination()->hasPrevPage()):?>
                    <a class="prev" href="<?= $actualites->pagination()->prevPageURL() ?>#ancre">‹ plus récent</a>
                <?php endif ?>
                
                <?php if ($actualites->pagination()->hasNextPage()):?>
                    <a class="next" href="<?= $actualites->pagination()->nextPageURL() ?>#ancre">plus ancien ›</a> <!-- ajout de l'id anchor à la fin de l'url pour éviter à l'utilisateur de scroller entre chaque changement de page -->
                <?php endif ?>
            </nav>
        <?php endif ?>
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
                perPage: 3,
                autoWidth: true,
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