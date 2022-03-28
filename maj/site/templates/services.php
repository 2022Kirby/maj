<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle affichant pour chaque page enfant de services, les champs title, résumé et horaires -->
        <?php foreach ($pages->find('services')->children()->listed() as $service): ?>
            <!-- bouton pour ouvrir le panel -->
            <button class="accordion-button">
                <h1><?= $service->title() ?></h1>
            </button>

            <!-- panel contenant les infos du service -->
            <div class="accordion-panel">
                <p><?= $service->resume() ?></p>

                <!-- si le champ horaire existe -->
                <?php if ($service->horaires()->exists()): ?>
                    <h2>Horaires</h2>
                    
                    <!-- boucle affichant chaque champ horaire -->
                    <?php foreach ($service->horaires()->toStructure() as $horaire): ?>
                        <p>
                                <?= $horaire->jour() ?> : 
                            <!-- si le champ horaire matin n'est pas vide -->
                            <?php if ($horaire->horaireDebutMatin()->isNotEmpty()): ?>
                                <?= $horaire->horaireDebutMatin() ?> - <?= $horaire->horaireFinMatin() ?> |
                            <?php endif ?>
                            <!-- si le champ horaire après-midi n'est pas vide -->
                            <?php if ($horaire->horaireDebutAprem()->isNotEmpty()): ?>
                                <?= $horaire->horaireDebutAprem() ?> - <?= $horaire->horaireFinAprem() ?>
                            <?php endif ?>
                        </p>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script js de l'accordéon -->
    <?= js('assets/js/accordion.js') ?>
</body>
</html>