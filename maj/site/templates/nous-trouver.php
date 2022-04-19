<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page appelante -->
        <a class="retour" href="javascript:history.back();">retour</a>

        <!-- titre de la page -->
        <h1><?= $page->title() ?></h1>

        <!-- adresse -->
        <?= $site->adresse()->kirbytext() ?>
        <p><?= $site->numero() ?></p>

        <!-- google map -->
        <iframe src="<?= $page->carte() ?>" style="<?= $page->style() ?>"></iframe>
        
        <a href="<?= $page->lien() ?>" target="_blank">
            <small>Afficher une carte plus grande</small>
        </a>
    </main>
</body>
</html>