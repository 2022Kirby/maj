<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- équipe -->
        <!-- boucle foreach affichant pour chaque membre les fields firstname, lastname et service -->
        <?php foreach ($page->members()->toStructure() as $member):?>
        <div class="team">
            <h2>
                <?= $member->firstname() ?>
                <span><?= $member->lastname() ?></span>
                <sup><?= $member->service() ?></sup>
            </h2>
        </div>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>
</body>
</html>