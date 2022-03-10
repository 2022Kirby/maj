<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <!-- insertion de header.php -->
    <?php snippet('header') ?>

    <main>
        <!-- bandeau de brèves -->

        <!-- slideshow (temporaire)-->
        <div class="slideshow-container">
            <div class="slides">
                <img src="https://picsum.photos/900/300?random=1">
            </div>
            <div class="slides">
                <img src="https://picsum.photos/900/300?random=2">
            </div>
            <div class="slides">
                <img src="https://picsum.photos/900/300?random=3">
            </div>
        </div>

        <!-- texte d'introduction sur l'association -->
        <p id="about">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ante est, mattis id suscipit vel, hendrerit ac magna. Nulla condimentum, sapien sit amet sollicitudin posuere, elit nisi ornare augue, sit amet ultrices metus metus maximus erat. Fusce a urna nisi. Fusce in laoreet tellus. Mauris quis elit laoreet, aliquam tellus eu, fringilla sem. Curabitur tempor et turpis id gravida. Nunc metus massa, facilisis vel volutpat id, imperdiet in orci. Nulla ac diam molestie, sollicitudin metus sit amet, rhoncus eros. Integer dui odio, egestas eu condimentum vitae, facilisis sit amet mi. Suspendisse feugiat vulputate arcu id gravida. Aenean luctus elementum felis, et cursus ligula fermentum non. Proin tellus est, congue at porttitor in, faucibus nec ex.</p>
        
        <!-- boucle foreach affichant pour chaque service, une image, un titre et une description -->
        <?php foreach ($pages->find('services')->children()->listed() as $service):?>
            <figure>
                <img src="https://picsum.photos/400" alt="">
                <figcaption>
                    <h2>
                        <a href="<?= $service->url() ?>">
                            <?= $service->title() ?>
                        </a>
                    </h2>
                    <p><?= $service->description() ?></p>
                </figcaption>
            </figure>
        <?php endforeach ?>
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>

    <!-- insertion script pour slideshow -->
    <?= js('assets/js/slideshow.js') ?>
</body>
</html>