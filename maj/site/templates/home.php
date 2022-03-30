<?php snippet('head') ?>

<body>
    <header>
        <!-- logo MAJ -->
        <a id="logo" href="<?= $pages->find('actualites')->url() ?>">
            <img src="<?= $pages->find('header')->files()->filterBy('filename', '*=', 'logo') ?>" alt="logo MAJ">
        </a>

        <!-- entrez renvoyant sur page actualités -->
        <a id="entrez" href="<?= $pages->find('actualites')->url() ?>">entrez</a>
    </header>
    
    <main>
        <!-- affichage des champs résumé, histoire et missions de la page -->
        <article id="a-propos">
            <p><?= $page->resume() ?></p>

            <h1>À propos</h1>

            <h2>Notre histoire</h2>
            <p><?= $page->histoire() ?></p>

            <h2>Nos missions</h2>
            <p><?= $page->missions() ?></p>
        </article>
    </main>
</body>
</html>