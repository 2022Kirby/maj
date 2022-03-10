<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <?php foreach ($pages->find('services')->children()->listed() as $service):?>
                <figure>
                    <a href="<?= $service->url() ?>">
                        <img src="" alt="">
                    </a>
                    <figcaption>
                        <h2>
                            <a href="<?= $service->url() ?>">
                                <?= $service->title() ?>
                            </a>
                        </h2>
                        <p><?= $service->description() ?></p>
                    </figcaption>
                </figure>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>
</body>
</html>