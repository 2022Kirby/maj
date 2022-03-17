<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- équipe -->
        <!-- boucle foreach affichant pour chaque membre les fields firstname, lastname et service -->
        <?php foreach ($page->membres()->toStructure() as $membre):?>
        <div class="team">
            <h2>
                <?= $membre->prénom() ?>
                <span><?= $membre->nom() ?></span>
                <sup><?= $membre->service() ?></sup>
            </h2>
        </div>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>
</body>
</html>