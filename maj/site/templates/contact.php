<?php snippet('head') ?>

<body>
    <main>
        <!-- si les champs du formulaire ont été envoyés, affichage d'une page vierge dans laquelle on va insérer un message de confirmation et les inputs de l'utilisateur -->
        <?php if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['service']) && !empty($_POST['message'])): ?>
            <!-- retour vers page appelante -->
            <a href="javascript:history.go(-2);">< retour</a>
        
        <!-- sinon, affichage du formulaire-->
        <?php else: ?>
            <!-- retour vers page appelante -->
            <a href="javascript:history.back()">< retour</a>

            <!-- titre de la page -->
            <h1><?= $page->title() ?></h1>

            <!-- formulaire de contact -->
            <form method="post" action="">
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

                        <!-- sinon, paramètre présent dans l'url, préselection du service -->
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

        <?php endif ?>
    </main>

    <!-- lien vers le script php du formulaire -->
    <?php snippet('sendForm') ?>
</body>
</html>