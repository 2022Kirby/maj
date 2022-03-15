<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- title de la page -->
        <h2>Rencontrez notre équipe !</h2>

        <!-- équipe -->
        <!-- boucle foreach affichant chaque image de la page équipe, ainsi que les champs title et caption de l'image -->
        <?php foreach ($page->images() as $image):?>
        <div class="team">
            <!-- pour les besoins de la démo, les photos utilisées proviennent de TheNounProject (licence Creative Commons)-->
            <img src="<?= $image->url() ?>" alt="">
            <dl>
                <dt><?= $image->title() ?></dt>
                <dd><?= $image->caption() ?></dd>
            </dl>
        </div>
        <?php endforeach ?>

        <!-- crédits photos (temporaire) -->
        <h4><small>Photos by Jacob Lund Photography from NounProject.com</small></h4>
    </main>

    <?php snippet('footer') ?>
</body>
</html>