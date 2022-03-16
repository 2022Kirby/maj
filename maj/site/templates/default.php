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
            <!-- insertion de la seconde image de la page avec un echo de l'url  -->
            <!-- <img src="< ?= $page->images()->nth(1)->url() ?>" alt=""> -->

            <!-- pour les besoins de la démo, utilisation d'un lorem picsum -->
            <img src="https://picsum.photos/1200/400" alt="">

            <!-- boucle foreach affichant pour chaque paragraphe les fields caption et text -->
            <?php foreach ($page->paragraphs()->toStructure() as $paragraph):?>
            <section>
                <h3><?= $paragraph->caption() ?></h3>
                <p><?= $paragraph->text() ?></p>
            </section>
            <?php endforeach ?>
        </article>
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>
</body>
</html>