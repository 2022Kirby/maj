<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <div class="message">
            <p><?= $page->message() ?></p>
            <a href="<?= $pages->find('actualites')->url() ?>">Retour</a>
        </div>
    </main>

    <?php snippet('footer') ?>
</body>
</html>