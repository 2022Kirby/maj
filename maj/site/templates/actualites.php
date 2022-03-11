<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <?php foreach ($pages->find('actualites')->children()->listed() as $actualite):?>
                <figure>
                    <a href="<?= $actualite->url() ?>">
                        <img src="https://picsum.photos/400" alt="">
                    </a>
                    <figcaption>
                        <h2>
                            <a href="<?= $actualite->url() ?>">
                                <?= $actualite->title() ?>
                            </a>
                        </h2>
                        <p><?= $actualite->description() ?></p>
                    </figcaption>
                </figure>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>
</body>
</html>