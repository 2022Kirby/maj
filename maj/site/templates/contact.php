<?php snippet('head') ?>

<body>
    <?php snippet('header') ?>
    
    <main>
        <section>
            <h2>Nous contacter</h2>

            <!-- formulaire de contact -->
            <form action="" method="post">
                <div>
                    <label for="name">Prénom Nom <span>*</span></label>
                    <input type="text" name="name" id="name" required maxlength="50" placeholder="Votre prénom et nom">
                </div>
                <div>
                    <label for="email">Email <span>*</span></label>
                    <input type="email" name="email" id="email" required minlength="5" maxlength="50" placeholder="Votre adresse mail">
                </div>

                <!-- si pas de paramètre dans l'url, pas de pré-selection -->
                <?php if (empty($_GET['service'])): ?>
                    <div>
                        <label for="service">Service <span>*</span></label>
                        <select name="service" id="service" required>
                            <option value="" selected disabled>Sélectionnez le service à joindre</option>
                            <option value="accueilJeunes">Accueil Jeunes</option>
                            <option value="pij">Point Information Jeunesse</option>
                            <option value="maisonDigitale">Maison Digitale</option>
                            <option value="sefi">Service Emploi Formation Insertion</option>
                            <option value="fablab">FabLab</option>
                            <option value="coworking">Salle Coworking</option>
                            <option value="partenaires">Permanence partenaires</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                <!-- si paramètre présent dans l'url, déclaration de la variable $service avec pour valeur le paramètre -->
                <?php elseif (!empty($_GET['service'])): $service = $_GET['service']; ?> 
                    <div>
                        <label for="service">Service <span>*</span></label>
                        <select name="service" id="service" required>
                            <option value="" disabled>Sélectionnez le service à joindre</option>
                            
                            <!-- série de if / else vérifiant la valeur de $service et préselection du champ en conséquence -->
                            <?php if ($service == "Accueil Jeunes"): ?>
                                <option value="accueilJeunes" selected>Accueil Jeunes</option>
                            <?php else: ?>
                                <option value="accueilJeunes">Accueil Jeunes</option>
                            <?php endif ?>

                            <?php if ($service == "PIJ"): ?>
                                <option value="pij" selected>Point Information Jeunesse</option>
                            <?php else: ?>
                                <option value="pij">Point Information Jeunesse</option>
                            <?php endif ?>

                            <option value="maisonDigitale">Maison Digitale</option>

                            <?php if ($service == "SEFI"): ?>
                                <option value="sefi" selected>Service Emploi Formation Insertion</option>
                            <?php else: ?>
                                <option value="sefi">Service Emploi Formation Insertion</option>
                            <?php endif ?>

                            <?php if ($service == "FabLab"): ?>
                                <option value="fablab" selected>FabLab</option>
                            <?php else: ?>
                                <option value="fablab">FabLab</option>
                            <?php endif ?>

                            <option value="coworking">Salle Coworking</option>
                            <option value="partenaires">Permanence partenaires</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>
                <?php endif ?>

                <div>
                    <label for="message">Message <span>*</span></label>
                    <textarea name="message" id="message" required spellcheck=true rows="10" cols="50" minlength="10" maxlength="1500" placeholder="Votre message..."></textarea>
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </section>
        
        <section>
            <h2>Nous trouver</h2>
            <p><?= $site->acronyme() ?><br>
            <?= $site->rue() ?><br>
            <?= $site->code() ?> <?= $site->ville() ?><br>
            <?= $site->numéro() ?>
            </p>

            <!-- google map récupérée du site précédent,
            à actualiser -->
            <iframe frameborder="0" scrolling="no" src="https://www.openstreetmap.org/export/embed.html?bbox=1.0886228084564211%2C44.10279718890034%2C1.0907605290412905%2C44.10392970938834&amp;layer=mapnik&amp;marker=44.1033636997035%2C1.0896939790002307" style="border: 1px solid black"></iframe>
            <a href="https://www.openstreetmap.org/?mlat=44.10336&amp;mlon=1.08969#map=19/44.10336/1.08969" target="_blank">
                <small>Afficher une carte plus grande</small>
            </a>
        </section>
    </main>

    <?php snippet('footer') ?>

    <?php snippet('sendForm') ?>
</body>
</html>