<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- ticker -->
        <div class="splide" id="ticker">
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- boucle affichant pour chaque brève, les champs titre et contenu -->
                    <!-- chaque brève correspond à un élément li dans lequel on insère le contenu -->
                    <?php foreach ($page->breves()->toStructure() as $breve): ?>
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
            <!-- slides -->
            <div class="splide__track">
                <ul class="splide__list">
                    <!-- boucle affichant chaque image de la page actualités -->
                    <!-- chaque slide correspond à un élément li dans lequel on insère le contenu -->
                    <?php foreach ($page->images() as $image): ?>
                        <li class="splide__slide">
                            <img src="<?= $image->url() ?>" alt="bannière d'actualité">
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <!-- barre de progression de la slide -->
            <div class="splide__progress">
                <div class="splide__progress__bar"></div>
            </div>
        </div>

        <!-- titre de la page -->
        <!-- l'id #ancre sera utilisé pour éviter à l'utilisateur de scroller entre chaque changement de pagination -->
        <h1 id="ancre"><?= $page->title() ?></h1>

        <!-- boucle affichant pour chaque page enfant de la page actualités les champs titre et résumé,
        avec mise en place d'une pagination -->
        <?php foreach ($actualites = $page->children()->listed()->paginate(3) as $actualite): ?>
            <div class="actualites">
                <a href="<?= $actualite->url() ?>">
                    <h2><?= $actualite->title() ?></h2>

                    <!-- si le champ résumé existe -->
                    <?php if($actualite->resume()->exists()): ?>
                        <p><?= $actualite->resume() ?></p>
                    <?php endif ?>
                </a>
            </div>
        <?php endforeach ?>

        <!-- pagination des actualités -->
        <div class="pagination">
            <!-- si d'autres pages existent, affichage d'un menu de navigation -->
            <?php if($actualites->pagination()->hasPages()): ?>
                <nav>
                    <!-- si il y a des pages précédentes -->
                    <?php if ($actualites->pagination()->hasPrevPage()): ?>
                        <a class="prev" href="<?= $actualites->pagination()->prevPageURL() ?>#ancre">‹ plus récent</a> 
                    <?php endif ?>
                    
                    <!-- si il y a des pages suivantes -->
                    <?php if($actualites->pagination()->hasNextPage()): ?>
                        <a class="next" href="<?= $actualites->pagination()->nextPageURL() ?>#ancre">plus ancien ›</a>
                    <?php endif ?>
                </nav>
            <?php endif ?>
        </div>
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