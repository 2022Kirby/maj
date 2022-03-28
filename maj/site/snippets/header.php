    <header>
        <!-- logo MAJ -->
        <a id="logo" href="<?= $pages->find('actualites')->url() ?>">
            <img src="<?= $pages->find('header')->image()->url() ?>" alt="logo MAJ">
        </a>

        <!-- qui ? renvoyant sur page d'accueil -->
        <a id="qui" href="<?= $site->url() ?>">qui ?</a>

        <!-- menu de navigation -->
        <nav>
            <ul>
                <!-- boucle affichant pour chaque page enfant du site un lien de navigation -->
                <?php foreach ($site->children()->listed() as $page):
                // si page active, ajout de la classe current
                $class = r($page->isOpen(), 'class="current"'); ?>
                    <li>
                        <a <?= $class ?> href="<?= $page->url() ?>">
                            <?= $page->title() ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>