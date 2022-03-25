<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page appelante -->
        <a href="javascript:history.back();">Retour</a>

        <!-- titre et contenu -->
        <h1><?= $page->title() ?></h1> 
        <?= $page->contenu()->kirbytext() ?>
    </main>
</body>
</html>