<!-- Ceci est le template utilisé par défaut, en cas d'absence de template propre à la page -->

<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <!-- insertion de header.php -->
    <?php snippet('header') ?>
    
    <main>
        <!-- article -->
        <article>
            <!-- insertion de la première image de la page avec un echo de l'url  -->
            <!-- <img src="< ?= $page->image()->url() ?>" alt="image article"> -->

            <!-- pour les besoins de la démo, utilisation d'un lorem picsum -->
            <img src="https://picsum.photos/1200/400" alt="image article">

            <!-- title de la page -->
            <h2><?= $page->title() ?></h2>

            <!-- contenu de la page -->
            <p><?= $page->contenu() ?></p>
        </article>
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>
</body>
</html>