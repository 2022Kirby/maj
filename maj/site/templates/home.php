<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <header>
        <!-- logo MAJ -->
        <a id="logo" href="<?= $pages->find('actualites')->url() ?>">
            <img src="<?= $site->image()->url() ?>" alt="logo MAJ">
        </a>

        <!-- entrez renvoyant sur page actualités -->
        <a id="entrez" href="<?= $pages->find('actualites')->url() ?>">entrez</a>
    </header>
    
    <main>
        <!-- contenu sur l'association -->
        <article id="apropos">
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