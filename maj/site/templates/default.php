<!-- Ceci est le template utilisé par défaut, en cas d'absence de template propre à la page -->
<!-- Le template est actuellement utilisé par les pages d'actualités / de services -->

<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <!-- insertion de header.php -->
    <?php snippet('header') ?>
    
    <main>
        <article>
            <!-- titre de la page -->
            <h1><?= $page->title() ?></h1>

            <!-- contenu de la page -->
            <?= $page->contenu()->toBlocks() ?>
        </article>
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>
</body>
</html>