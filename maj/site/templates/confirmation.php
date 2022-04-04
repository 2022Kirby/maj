<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page contact -->
        <a href="javascript:window.history.go(-2);">< retour</a>
        
        <p><?= $pages->find('contact')->confirmation() ?></p>

        <?php if(!empty($_GET['service']) && !empty($_GET['name']) && !empty($_GET['mail']) && !empty($_GET['date']) && !empty($_GET['time'])): ?>
            <p>
                <b>Service :</b> <?= $_GET['service'] ?><br>
                <b>Prénom Nom :</b> <?= $_GET['name'] ?><br>
                <b>Adresse email :</b> <?= $_GET['mail'] ?><br>
                <b>Date d'envoi :</b> <?= $_GET['date'] ?> à <?= $_GET['time'] ?>
            </p>
        <?php endif ?>
    </main>
</body>
</html>