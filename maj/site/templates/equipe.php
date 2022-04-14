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
                            <!-- si le champ service n'est pas vide -->
                            <?php if($membre->service()->isNotEmpty()): ?>

                                <!-- déclaration d'une variable $nameService contenant le champ service, avec transformation en minuscule et remplacement des espaces par des tirets -->
                                <?php $nameService = str_replace(' ','-',strtolower($membre->service())); ?>
                                    <!-- déclaration d'une variable $service contenant la page service, ciblée grâce à la variable $nameService -->
                                    <?php $service = $pages->find('services')->find($nameService);
                                    // si le champ contenu du service existe et n'est pas vide
                                    if($service->contenu()->exists() && $service->contenu()->isNotEmpty()): ?>
                                        <!-- affichage d'un lien vers la page de service -->
                                        <a href="<?= $service->url() ?>">
                                            <?= $membre->service() ?>
                                        </a>

                                        <!-- barre d'espacement -->
                                        <span>&nbsp;|&nbsp;</span>
                                    <?php endif ?>

                                    <!-- lien vers page de contact avec ajout d'un paramètre service dans l'url
                                    donne l'url suivante: http://maj.test/contact?service=Nom Service -->
                                    <a href="<?= $pages->find('contact')->url() ?>?service=<?= $membre->service() ?>">Contacter</a>
                                <?php ?>
                            <?php endif ?>
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