<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle foreach affichant pour chaque page enfant de la page services la première image ainsi que les fields title et introduction de la page-->
        <?php foreach ($pages->find('services')->children()->listed() as $service):?>
        <figure>
            <a href="<?= $service->url() ?>">
                <!-- insertion de la première image de la page avec un echo de l'url  -->
                <img src="<?= $service->image()->url() ?>" alt="">
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