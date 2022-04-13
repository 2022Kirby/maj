<?php snippet('head') ?>

<body>
    <header>
        <?php snippet('logo') ?>

        <!-- entrez renvoyant sur page actualités -->
        <a id="entrez" href="<?= $pages->find('actualites')->url() ?>">entrez</a>
    </header>
    
    <main>
        <!-- affichage des champs résumé, histoire et missions de la page -->
        <article id="a-propos">
            <p><?= $page->resume() ?></p>

            <section>
                <h1>Nos missions</h1>
                <p><?= $page->missions()->kirbytext() ?></p>
            </section>

            <section>
                <h1>Notre histoire</h1>
                <p><?= $page->histoire()->kirbytext() ?></p>
            </section>
        </article>
    </main>
</body>
</html>