<?php snippet('head') ?>

<body>
    <main>
        <article>
            <a href="<?= $pages->find('actualites')->url() ?>">Retour</a>

            <h1><?= $page->title() ?></h1> 
            <p><?= $page->contenu()->kirbytext() ?></p>
        </article>
    </main>
</body>
</html>