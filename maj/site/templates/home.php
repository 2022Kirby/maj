<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <main>
        <!-- logo renvoyant sur page d'accueil -->
        <h1>
            <a href="<?= $page->url() ?>">
                <?= $site->acronym() ?>
            </a>
        </h1>

        <!-- entrez renvoyant sur page actualités -->
        <a id="enter" href="<?= $pages->find('actualites')->url() ?>">entrez</a>

        <!-- texte d'introduction sur l'association -->
        <p id="about"><?= $page->text() ?></p>
    </main>
</body>
</html>