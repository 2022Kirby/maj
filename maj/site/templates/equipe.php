<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle affichant pour chaque membre de la page équipe, les champs prénom, nom, détail et téléphone -->
        <?php foreach ($page->membres()->toStructure() as $membre):?>
            <!-- bouton pour ouvrir le panel -->
            <button class="accordion-button">
                <h1>
                    <?= $membre->prenom() ?>
                    <span><?= $membre->nom() ?></span>
                    <sup><?= $membre->service() ?></sup>
                </h1>
            </button>

            <!-- panel contenant les infos du membre -->
            <div class="accordion-panel">
                <p><?= $membre->detail() ?></p>

                <div>
                    <!-- lien vers page de contact avec ajout d'un paramètre service dans l'url-->
                    <!-- donne l'url suivante: http://maj.test/contact?service=Nom Service -->
                    <a href="<?= $pages->find('contact')->url() ?>?service=<?= $membre->service() ?>">
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