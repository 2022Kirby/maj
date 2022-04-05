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
                    <?php foreach($pages->find('actualites')->find('ticker')->breves()->toStructure() as $breve): ?>
                        <li class="splide__slide">
                            <!-- si le champ image n'est pas vide -->
                            <?php if($breve->image()->isNotEmpty()): ?>
                                <img src="<?= $breve->image()->toFiles() ?>" alt="<?= $breve->titre() ?>">
                            <?php endif ?>
                            
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
                    <?php foreach($pages->find('actualites')->find('slider')->files()->sortBy('sort') as $image): ?>
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

        <!-- boucle affichant pour chaque page enfant de la page actualités les champs titre et résumé,
        avec mise en place d'une pagination -->
        <?php foreach($actualites = $page->children()->listed()->paginate(6) as $actualite): ?>
            <div class="actualites">
                <a href="<?= $actualite->url() ?>">
                    <?= $actualite->title() ?>
                </a>
                
                <!-- si le champ résumé existe -->
                <?php if($actualite->resume()->exists()): ?>
                    <p><?= $actualite->resume() ?></p>
                <?php endif ?>
            </div>
        <?php endforeach ?>

        <!-- pagination des actualités -->
        <div class="pagination">
            <!-- si d'autres pages existent, affichage d'un menu de navigation -->
            <?php if($actualites->pagination()->hasPages()): ?>
                <nav>
                    <!-- si il y a des pages précédentes -->
                    <?php if($actualites->pagination()->hasPrevPage()): ?>
                        <a class="prev" href="<?= $actualites->pagination()->prevPageURL() ?>">< plus récent</a> 
                    <?php endif ?>
                    
                    <!-- si il y a des pages suivantes -->
                    <?php if($actualites->pagination()->hasNextPage()): ?>
                        <a class="next" href="<?= $actualites->pagination()->nextPageURL() ?>">plus ancien ></a>
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