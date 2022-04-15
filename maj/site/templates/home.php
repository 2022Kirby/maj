<?php snippet('head') ?>

<body>
    <header>
        <?php snippet('logo') ?>

        <p id="description">Moissac Animation Jeunes</p>

        <!-- entrez renvoyant sur page actualités -->
        <a id="entrer" href="<?= $pages->find('actualites')->url() ?>">
            entrer
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
            </svg>
        </a>
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