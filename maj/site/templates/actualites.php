<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- titre de la page -->
        <h1><?= $page->title() ?></h1>
        
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
                    <!-- chaque slide correspond à un élément li dans lequel on insère le contenu -->
                    <?php foreach ($page->images() as $image):?>
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

        <!-- ancre pour éviter à l'utilisateur de scroller entre chaque changement de pagination -->
        <div id="ancre"></div>

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
                    <a class="prev" href="<?= $actualites->pagination()->prevPageURL() ?>#ancre">‹ plus récent</a> <!-- ajout de l'id ancre à la fin de l'url  -->
                <?php endif ?>
                
                <?php if ($actualites->pagination()->hasNextPage()):?>
                    <a class="next" href="<?= $actualites->pagination()->nextPageURL() ?>#ancre">plus ancien ›</a>
                <?php endif ?>
            </nav>
        <?php endif ?>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script js du ticker -->
    <?= js('assets/js/splide-extension-auto-scroll.min.js') ?>
    <!-- lien vers le script js du slider -->
    <?= js('assets/js/splide.min.js') ?>
    <!-- lien vers le script js de montage du ticker / slider -->
    <?= js('assets/js/splide-mount.js') ?>
    
</body>
</html>