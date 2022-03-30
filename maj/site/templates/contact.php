<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <section>
            <h1>Nous contacter</h1>

            <!-- formulaire de contact -->
            <form action="" method="post">
                <div>
                    <label for="name">Prénom Nom <span>*</span></label>
                    <input type="text" name="name" id="name" required maxlength="50" placeholder="Votre prénom et nom">
                </div>
                <div>
                    <label for="email">Email <span>*</span></label>
                    <input type="email" name="email" id="email" required minlength="10" maxlength="50" placeholder="Votre adresse mail">
                </div>
                <div>
                    <label for="service">Service <span>*</span></label>
                    <select name="service" id="service" required>
                        <!-- si pas de paramètre dans l'url, pas de préselection du service -->
                        <?php if(empty($_GET['service'])): ?>
                                <option value="" selected disabled>Sélectionnez le service à joindre</option>
                            <!-- boucle affichant une option de sélection pour chaque page enfant de services -->
                            <?php foreach($pages->find('services')->children()->listed() as $service): ?>
                                <option value="<?= $service->title() ?>">
                                    <?= $service->title() ?>
                                </option>
                            <?php endforeach ?>
                                <option value="Autre">Autre</option>

                        <!-- si paramètre présent dans l'url, préselection du service -->
                        <?php else: 
                        // récupération du paramètre
                        $parameter = $_GET['service']; ?> 
                                <option value="" disabled>Sélectionnez le service à joindre</option>
                            <!-- boucle affichant une option de sélection pour chaque page enfant de services -->
                            <?php foreach($pages->find('services')->children()->listed() as $service):
                            // si le paramètre est identique au nom du service, ajout de l'attribut selected
                            $selected = r($parameter == $service->title(), 'selected'); ?>
                                <option value="<?= $service->title() ?>" <?= $selected ?>>
                                    <?= $service->title() ?>
                                </option>
                            <?php endforeach ?>
                                <option value="Autre">Autre</option>
                        <?php endif ?>
                    </select>
                </div>
                <div>
                    <label for="message">Message <span>*</span></label>
                    <textarea name="message" id="message" required spellcheck=true rows="10" minlength="10" maxlength="1500" placeholder="Votre message..."></textarea>
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </section>
        
        <section id="nous-trouver">
            <h1>Nous trouver</h1>

            <p>
                <?= $site->nom() ?><br>
                <?= $site->rue() ?><br>
                <?= $site->ville() ?><br>
                <?= $site->numero() ?>
            </p>

            <!-- google map -->
            <iframe frameborder="0" scrolling="no" src="https://www.openstreetmap.org/export/embed.html?bbox=1.0886228084564211%2C44.10279718890034%2C1.0907605290412905%2C44.10392970938834&amp;layer=mapnik&amp;marker=44.1033636997035%2C1.0896939790002307" style="border: 1px solid black"></iframe>
            
            <a href="https://www.openstreetmap.org/?mlat=44.10336&amp;mlon=1.08969#map=19/44.10336/1.08969" target="_blank">
                <small>Afficher une carte plus grande</small>
            </a>
        </section>
    </main>

    <?php snippet('footer') ?>

    <!-- lien vers le script php du formulaire -->
    <?php snippet('sendForm') ?>
</body>
</html>