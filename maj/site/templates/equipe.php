<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <div class="equipe">
            <!-- boucle affichant pour chaque membre de la page équipe, les champs prénom, nom, détail et téléphone -->
            <?php foreach($page->membres()->toStructure() as $membre):?>
                <p><?= $membre->prenom() ?> <span><?= $membre->nom() ?></span></p>
                
                <!-- < ?php $nameService = str_replace(' ','-',strtolower($membre->service())); ?>
                    <a href="< ?= $pages->find('services')->url() ?>/< ?= $nameService ?>">
                        < ?= $membre->service() ?>
                    </a>
                < ?php ?>
                <p>< ?= $membre->detail() ?></p>
                lien vers page de contact avec ajout d'un paramètre service dans l'url
                donne l'url suivante: http://maj.test/contact?service=Nom Service
                <a href="< ?= $pages->find('contact')->url() ?>?service=< ?= $membre->service() ?>">Formulaire de contact</a> -->
            <?php endforeach ?>
        </div>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script js de l'accordéon -->
    <?= js('assets/js/accordion.js') ?>
</body>
</html>