<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle foreach affichant pour chaque page enfant de la page services une image ainsi que les fields title et description de la page-->
        <?php foreach ($pages->find('services')->children()->listed() as $service):?>
                <figure>
                    <a href="<?= $service->url() ?>">
                        <img src="https://picsum.photos/400" alt="">
                    </a>
                    <figcaption>
                        <h3>
                            <a href="<?= $service->url() ?>">
                                <?= $service->title() ?>
                            </a>
                        </h3>
                        <p><?= $service->description() ?></p>
                    </figcaption>
                </figure>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>
</body>
</html>