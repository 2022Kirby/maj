<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- retour vers page contact -->
        <a href="<?= $pages->find('contact')->url() ?>">Retour</a>
        <p>Votre message n'a pas pu être envoyé.</p>
    </main>

    <?php snippet('footer') ?>
</body>
</html>