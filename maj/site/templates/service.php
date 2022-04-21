<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <article>
            <!-- si le service a un dossier enfant partenaires et que ce dossier a des images -->
            <?php if($page->hasChildren() && $page->find('partenaires')->hasImages()): ?>
                <div class="partenaires">
                    <!-- boucle affichant chaque logo partenaire -->
                    <?php foreach($page->find('partenaires')->files()->sortBy('sort') as $image): ?>
                        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            
            <!-- titre de la page -->
            <h1><?= $page->title() ?></h1>

            <div class="coordonnees">
                <!-- pour chaque membre de la page équipe -->
                <?php foreach($pages->find('equipe')->membres()->toStructure() as $membre): ?>
                    <!-- si le champ service n'est pas vide et que le nom du service est égal à celui de la page -->
                    <?php if($membre->service()->isNotEmpty() && strtolower($membre->service()) == strtolower($page->title())): ?>
                        <div>
                            <p><b><?= $membre->poste() ?></b></p>
                            <p><?= $membre->prenom() ?> <span><?= $membre->nom() ?></span></p>
                        </div>
                    <?php endif ?>
                <?php endforeach ?>
            
                <!-- si le champ téléphone existe et n'est pas vide -->
                <?php if($page->telephone()->exists() && $page->telephone()->isNotEmpty()): ?>
                    <div>
                        <p><b>Téléphone</b></p>
                        <!-- boucle affichant chaque champ numéro -->
                        <?php foreach($page->telephone()->toStructure() as $telephone): ?>
                            <p><?= $telephone->numero() ?></p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>

                <!-- lien vers page de contact avec ajout d'un paramètre service dans l'url
                donne l'url suivante: http://maj.test/contact?service=Nom Service -->
                <a href="<?= $pages->find('contact')->url() ?>?service=<?= $page->title() ?>">Contacter</a>
            </div>

            <!-- contenu de la page -->
            <div>
                <?= $page->contenu()->toBlocks() ?>
            </div>
        </article>
    </main>

    <?php snippet('footer') ?>
</body>
</html>