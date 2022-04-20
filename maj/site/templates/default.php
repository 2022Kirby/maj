<!-- Ceci est le template utilisé par défaut, en cas d'absence de template propre à la page -->

<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <!-- insertion de header.php -->
    <?php snippet('header') ?>
    
    <main>
        <!-- titre de la page -->
        <h1><?= $page->title() ?></h1>
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>
</body>
</html>