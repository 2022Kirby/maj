<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle affichant pour chaque page enfant de services, les champs title, résumé et horaires -->
        <?php foreach($pages->find('services')->children()->listed() as $service): ?>
            <!-- bouton pour ouvrir le panel -->
            <button class="accordion-button">
                <h1><?= $service->title() ?></h1>
            </button>

            <!-- panel contenant les infos du service -->
            <div class="accordion-panel">
                <h1><?= $service->title() ?></h1>

                <div>
                    <!-- si le champ horaire existe et n'est pas vide -->
                    <?php if($service->horaires()->exists() && $service->horaires()->isNotEmpty()): ?>
                        <div>
                            <p><b>Horaires</b></p>
                            
                            <!-- boucle affichant chaque champ horaire -->
                            <?php foreach($service->horaires()->toStructure() as $horaire): ?>
                                <p>
                                        <?= $horaire->jour() ?> : 
                                    <!-- si le champ horaire matin n'est pas vide -->
                                    <?php if($horaire->horaireDebutMatin()->isNotEmpty()): ?>
                                        <?= $horaire->horaireDebutMatin() ?> - <?= $horaire->horaireFinMatin() ?> |
                                    <?php endif ?>
                                    <!-- si le champ horaire après-midi n'est pas vide -->
                                    <?php if($horaire->horaireDebutAprem()->isNotEmpty()): ?>
                                        <?= $horaire->horaireDebutAprem() ?> - <?= $horaire->horaireFinAprem() ?>
                                    <?php endif ?>
                                </p>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                
                    <!-- si le champ téléphone existe et n'est pas vide -->
                    <?php if($service->telephone()->exists() && $service->telephone()->isNotEmpty()): ?>
                        <div>
                            <p><b>Téléphone</b></p>
                            <p><?= $service->telephone() ?></p>
                        </div>
                    <?php endif ?>
                </div>

                <!-- champ résumé -->
                <p><?= $service->resume() ?></p>
                
                <!-- si le champ contenu du service existe et n'est pas vide -->
                <?php if($service->contenu()->exists() && $service->contenu()->isNotEmpty()): ?>
                    <a href="<?= $service->url() ?>">En savoir plus</a>
                <?php endif ?>

                <!-- si le champ partenaires existe et n'est pas vide -->
                <?php if($service->partenaires()->exists() && $service->partenaires()->isNotEmpty()): ?>
                    <div id="permanences-partenaires">
                        <!-- boucle affichant pour chaque partenaire, une image et les champs nom et téléphone -->
                        <?php foreach($service->partenaires()->toStructure() as $partenaire): ?>
                            <figure>
                                <!-- si le champ logo n'est pas vide -->
                                <?php if($partenaire->image()->isNotEmpty()): ?>
                                    <img src="<?= $partenaire->image()->toFiles() ?>" alt="logo <?= $partenaire->nom() ?>">
                                <?php endif ?>

                                <figcaption>
                                    <h2><?= $partenaire->nom() ?></h2>
                                    <p>Sur rendez-vous :</p>
                                    <p><?= $partenaire->telephone() ?></p>
                                </figcaption>
                            </figure>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                
            </div>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script js de l'accordéon -->
    <?= js('assets/js/accordion.js') ?>
</body>
</html>