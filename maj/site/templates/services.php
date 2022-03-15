<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle foreach affichant pour chaque page enfant de la page services la première image ainsi que les fields title et introduction de la page-->
        <?php foreach ($pages->find('services')->children()->listed() as $service):?>
        <figure>
            <a href="<?= $service->url() ?>">
                <!-- insertion de la première image de la page avec un echo de l'url  -->
                <!-- <img src="< ?= $actualite->image()->url() ?>" alt=""> -->
                <!-- pour les besoins de la démo, utilisation d'un lorem picsum -->
                <img src="https://picsum.photos/400" alt="">
            </a>
            <figcaption>
                <h3>
                    <a href="<?= $service->url() ?>">
                        <?= $service->title() ?>
                    </a>
                </h3>
                <p><?= $service->introduction() ?></p>
            </figcaption>
        </figure>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>
</body>
</html>