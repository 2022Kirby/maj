<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <?php foreach ($pages->find('actions')->children()->listed() as $action):?>
                <figure>
                    <a href="<?= $action->url() ?>">
                        <img src="" alt="">
                    </a>
                    <figcaption>
                        <h2>
                            <a href="<?= $action->url() ?>">
                                <?= $action->title() ?>
                            </a>
                            <?= $action->subtitle() ?>
                        </h2>
                        <p><?= $action->description() ?></p>
                    </figcaption>
                </figure>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>
</body>
</html>