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
        <article id="about">
            <!-- résumé sur l'association -->
            <p><?= $page->resume() ?></p>

            <!-- histoire de l'association -->
            <h2>Notre histoire</h2>
            <p><?= $page->histoire() ?></p>

            <!-- missions de l'association -->
            <h2>Nos missions</h2>
            <p><?= $page->missions() ?></p>

            <!-- adhésion -->
            <h2>Adhésion</h2>
            <p><?= $page->adhesion() ?></p>
        </article>
    </main>
</body>
</html>