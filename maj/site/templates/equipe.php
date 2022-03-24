<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle foreach affichant pour chaque membre, les champs prénom, nom, détail et téléphone -->
        <?php foreach ($page->membres()->toStructure() as $membre):?>
            <button class="accordion">
                <h2>
                    <?= $membre->prenom() ?>
                    <span><?= $membre->nom() ?></span>
                    <sup><?= $membre->service() ?></sup>
                </h2>
            </button>
            <div class="panel">
                <p><?= $membre->detail() ?></p>

                <div>
                    <a href="<?= $pages->find('contact')->url() ?>?service=<?= $membre->service() ?>"> <!-- envoi du paramètre service dans l'url -->
                    <!-- donne l'url suivante: http://maj.test/contact?service=NomService -->
                        <p>Formulaire de contact</p>
                    </a>
                    <p><b>Téléphone</b> <?= $membre->telephone() ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script js de l'accordéon -->
    <?= js('assets/js/accordion.js') ?>
</body>
</html>