<!-- Ceci est le template utilisé par défaut, en cas d'absence de template propre à la page -->

<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <!-- insertion de header.php -->
    <?php snippet('header') ?>
    
    <main>
        <!-- title de la page -->
        <h2><?= $page->title() ?></h2> 
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>
</body>
</html>