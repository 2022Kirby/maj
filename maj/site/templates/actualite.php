<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <article>
            <!-- titre de la page -->
            <h1><?= $page->title() ?></h1>

            <!-- contenu de la page -->
            <?= $page->contenu()->toBlocks() ?>
        </article>
    </main>

    <?php snippet('footer') ?>
</body>
</html>