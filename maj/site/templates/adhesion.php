<?php snippet('head') ?>

<body>
    <main>
        <!-- retour vers page appelante -->
        <a class="retour" href="javascript:history.back();">retour</a>

        <article>
            <!-- contenu de la page -->
            <?= $page->contenu()->kirbytext() ?>
        </article>
    </main>
</body>
</html>