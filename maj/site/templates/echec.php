<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page contact -->
        <a href="<?= $pages->find('contact')->url() ?>">< retour</a>
        
        <p><?= $pages->find('contact')->echec() ?></p>
    </main>
</body>
</html>