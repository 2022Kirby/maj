<?php snippet('head') ?>

<body>
    <header>
        <!-- logo MAJ -->
        <a id="logo" href="<?= $pages->find('actualites')->url() ?>">
            <?php $logo = $pages->find('header')->find('logo')->image() ?>
                <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>">
            <?php ?>
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
            <p><?= $page->histoire()->kirbytext() ?></p>

            <h2>Nos missions</h2>
            <p><?= $page->missions()->kirbytext() ?></p>
        </article>
    </main>
</body>
</html>