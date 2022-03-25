<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- retour vers page contact -->
        <a href="<?= $pages->find('contact')->url() ?>">Retour</a>
        <p>Votre message a bien été envoyé.</p>
    </main>

    <?php snippet('footer') ?>
</body>
</html>