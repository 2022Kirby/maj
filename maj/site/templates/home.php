<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <header>
        <!-- logo MAJ -->
        <h1><?= $site->acronyme() ?></h1>

        <!-- entrez renvoyant sur page actualités -->
        <a id="enter" href="<?= $pages->find('actualites')->url() ?>">entrez</a>
    </header>
    
    <main>
        <!-- texte d'introduction sur l'association -->
        <p id="about"><?= $page->résumé() ?></p>
    </main>
</body>
</html>