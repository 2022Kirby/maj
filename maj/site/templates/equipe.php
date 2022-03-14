<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- title de la page -->
        <h2>Rencontrez notre équipe !</h2>

        <!-- équipe -->
        <!-- boucle foreach affichant chaque image de la page équipe, ainsi que les champs Fullname et Role -->
        <?php foreach ($page->images() as $image):?>
        <div class="team">
            <!-- pour les besoins de la démo, les avatars utilisés proviennent de TheNounProject (licence Creative Commons)-->
            <img src="<?= $image->url() ?>" alt="">
            <dl>
                <dt><?= $image->fullname() ?></dt>
                <dd><?= $image->role() ?></dd>
            </dl>
        </div>
        <?php endforeach ?>

        <!-- crédits avatars (temporaire) -->
        <h4><small>Avatars by Sarah Rudkin from NounProject.com</small></h4>
    </main>

    <?php snippet('footer') ?>
</body>
</html>