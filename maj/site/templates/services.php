<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle foreach affichant pour chaque page enfant de la page services un bouton contenant le field title et une div contenant le field résumé du service-->
        <?php foreach ($pages->find('services')->children()->listed() as $service): ?>
            <button class="accordion">
                <h2>
                    <?= $service->title() ?>
                </h2>
            </button>
            <div class="panel">
                <p><?= $service->resume() ?></p>

                <!-- si le champ horaire existe -->
                <?php if ($service->horaires()->exists()): ?>
                    <h3>Horaires</h3>
                    <?php foreach ($service->horaires()->toStructure() as $horaire): ?>
                        <p>
                            <?= $horaire->jour() ?> : 
                            <!-- si le champ horaire matin n'est pas vide -->
                            <?php if ($horaire->horaireDebutMatin()->isNotEmpty()): ?>
                                <span>
                                    <?= $horaire->horaireDebutMatin() ?> - <?= $horaire->horaireFinMatin() ?> |
                                </span>
                            <?php endif ?>
                            <!-- si le champ horaire après-midi n'est pas vide -->
                            <?php if ($horaire->horaireDebutAprem()->isNotEmpty()): ?>
                                <span>
                                    <?= $horaire->horaireDebutAprem() ?> - <?= $horaire->horaireFinAprem() ?>
                                </span>
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