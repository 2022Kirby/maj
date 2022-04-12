<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <div id="equipe">

            <!-- boucle affichant pour chaque membre de la page équipe, les champs prénom, nom, détail et téléphone -->
            <?php foreach($page->membres()->toStructure() as $membre):?>
                <div class="membre">
                    <!-- prenom nom -->
                    <h1><?= $membre->prenom() ?> <span><?= $membre->nom() ?></span></h1>
                    
                    <div class="infos">
                        <!-- poste -->
                        <p><b><?= $membre->poste() ?></b></p>
                        
                        <p>
                            <!-- lien vers la page de service -->
                            <?php $nameService = str_replace(' ','-',strtolower($membre->service())); ?>
                                <a href="<?= $pages->find('services')->find($nameService)->url() ?>">
                                    <?= $membre->service() ?>
                                </a>
                            <?php ?>

                                <span>&nbsp;|&nbsp;</span>
                                
                                <!-- lien vers page de contact avec ajout d'un paramètre service dans l'url
                                donne l'url suivante: http://maj.test/contact?service=Nom Service -->
                                <a href="<?= $pages->find('contact')->url() ?>?service=<?= $membre->service() ?>">Contacter</a>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script js de l'accordéon -->
    <?= js('assets/js/accordion.js') ?>
</body>
</html>