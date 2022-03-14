<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <section>
            <h2>Nous contacter</h2>

            <!-- formulaire de contact -->
            <p>Formulaire de contact à implémenter</p>
        </section>
        
        <section>
            <h2>Nous trouver</h2>
            <p><?= $site->acronym() ?><br>
            <?= $site->street() ?><br>
            <?= $site->postcode() ?> <?= $site->city() ?><br>
            <?= $site->number() ?></p>

            <!-- google map récupérée du site précédent,
            à actualiser -->
            <iframe frameborder="0" scrolling="no" src="https://www.openstreetmap.org/export/embed.html?bbox=1.0886228084564211%2C44.10279718890034%2C1.0907605290412905%2C44.10392970938834&amp;layer=mapnik&amp;marker=44.1033636997035%2C1.0896939790002307" style="border: 1px solid black"></iframe>
            <a href="https://www.openstreetmap.org/?mlat=44.10336&amp;mlon=1.08969#map=19/44.10336/1.08969" target="_blank">
                <small>Afficher une carte plus grande</small>
            </a>
        </section>
    </main>

    <?php snippet('footer') ?>
</body>
</html>