<!-- Ceci est le template utilisé par défaut, en cas d'absence de template propre à la page -->

<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <!-- insertion de header.php -->
    <?php snippet('header') ?>
    
    <main>
        <!-- title de la page -->
        <h2><?= $page->title() ?></h2>

        <!-- article -->
        <article>
            <!-- insertion de l'image de la page avec un echo de l'url  -->
            <!-- <img src="< ?= $page->images()->nth()->url() ?>" alt=""> -->
            <!-- pour les besoins de la démo, utilisation d'un lorem picsum -->
            <img src="https://picsum.photos/1500/300" alt="">
            
            <!-- affichage du contenu textuel, correspondant aux champs caption et paragraph de la page -->
            <section>
                <h3><?= $page->caption() ?></h3>
                <p><?= $page->paragraph() ?></p>
            </section>
        </article>
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>
</body>
</html>