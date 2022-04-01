<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page contact -->
        <a href="javascript:window.history.go(-2);">< retour</a>
        
        <p><?= $pages->find('contact')->confirmation() ?></p>

        <?php if(!empty($_GET['name']) && !empty($_GET['mail'])): ?>
            <p>
                <b>Prénom Nom :</b> <?= $_GET['name'] ?><br>
                <b>Adresse email :</b> <?= $_GET['mail'] ?><br>
            </p>
        <?php endif ?>
    </main>
</body>
</html>