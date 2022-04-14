<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- ticker -->
        <div class="splide" id="ticker">
            <div class="splide__track">
                <!-- slides -->
                <ul class="splide__list">

                    <!-- boucle affichant pour chaque brève, les champs titre et contenu -->
                    <?php foreach($pages->find('actualites')->find('ticker')->breves()->toStructure() as $breve): ?>

                        <!-- si le toggle est activé ET que la date courante est inférieure ou égale à la date de fin OU si le toggle est désactivé, on affiche la brève -->
                        <?php if($breve->toggle()->toBool() == true && strtotime(date('Y-m-d')) <= $breve->dateFin()->toDate() || $breve->toggle()->toBool() == false): ?>

                            <!-- chaque brève correspond à un élément li dans lequel on insère le contenu -->
                            <li class="splide__slide">

                                <!-- si le champ image n'est pas vide -->
                                <?php if($breve->image()->isNotEmpty()): ?>
                                    <?php $image = $breve->image()->toFiles() ?>
                                        <img src="<?= $image ?>" alt="<?= $image->first()->alt() ?>">
                                    <?php ?>
                                <?php endif ?>
                                
                                <div>
                                    <p><?= $breve->titre() ?></p>
                                    <p><?= $breve->contenu()->kirbytext() ?></p>
                                </div>
                            </li>

                        <?php endif ?>

                    <?php endforeach ?>

                </ul>
            </div>
        </div>

        <!-- slider -->
        <div class="splide" id="slider">
            <div class="splide__track">
                <!-- slides -->
                <ul class="splide__list">

                    <!-- boucle affichant chaque image du slider -->
                    <?php foreach($pages->find('actualites')->find('slider')->files()->sortBy('sort') as $image): ?>

                        <!-- si le toggle est activé ET que la date courante est inférieure ou égale à la date de fin OU si le toggle est désactivé, on affiche la slide -->
                        <?php if($image->toggle()->toBool() == true && strtotime(date('Y-m-d')) <= $image->dateFin()->toDate() || $image->toggle()->toBool() == false): ?>

                            <!-- chaque slide correspond à un élément li dans lequel on insère le contenu -->
                            <li class="splide__slide">
                                <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
                            </li>

                        <?php endif ?>

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