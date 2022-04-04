<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- titre de la page -->
        <h1><?= $page->title() ?></h1>

        <div class="partenaires">
            <!-- boucle affichant pour chaque partenaire, une image et les champs nom et téléphone -->
            <?php foreach ($page->partenaires()->toStructure() as $partenaire): ?>
                <figure>
                    <!-- si le champ logo n'est pas vide -->
                    <?php if($partenaire->logo()->isNotEmpty()): ?>
                        <img src="<?= $partenaire->logo()->toFiles()->first()->url() ?>" alt="logo <?= $partenaire->nom() ?>">
                    <?php endif ?>

                    <figcaption>
                        <h2><?= $partenaire->nom() ?></h2>
                        <p><b>Sur rendez-vous :</b> <?= $partenaire->telephone() ?></p>
                    </figcaption>
                </figure>
            <?php endforeach ?>
        </div>
    </main>

    <?php snippet('footer') ?>
</body>
</html>