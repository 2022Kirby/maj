<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page appelante -->
        <a href="javascript:history.back();">< retour</a>

        <article>
            <!-- titre de la page -->
            <h1><?= $page->title() ?></h1> 

            <!-- contenu de la page -->
            <p><?= $page->contenu()->kirbytext() ?></p>
        </article>
    </main>
</body>
</html>