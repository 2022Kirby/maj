<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page appelante -->
        <a class="retour" href="javascript:history.back();">retour</a>

        <article>
            <!-- titre de la page -->
            <h1><?= $page->title() ?></h1> 

            <!-- contenu de la page -->
            <?= $page->contenu()->kirbytext() ?>
        </article>
    </main>
</body>
</html>