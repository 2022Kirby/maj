<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page appelante -->
        <a href="javascript:history.back();">< retour</a>

        <!-- titre de la page -->
        <h1><?= $page->title() ?></h1> 

        <!-- contenu de la page -->
        <?= $page->contenu()->kirbytext() ?>
    </main>
</body>
</html>