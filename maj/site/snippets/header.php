    <header>
        <!-- logo MAJ -->
        <a id="logo" href="<?= $pages->find('actualites')->url() ?>">
            <img src="<?= $site->image()->url() ?>" alt="logo MAJ">
        </a>

        <!-- qui ? renvoyant sur page d'accueil -->
        <a id="qui" href="<?= $site->url() ?>">qui ?</a>

        <!-- menu de navigation -->
        <nav>
            <ul>
                <?php foreach ($site->children()->listed() as $page): 
                $classes = r($page->isOpen(), 'class="current"'); ?>
                    <li>
                        <a <?= $classes ?> href="<?= $page->url() ?>"><?= $page->title() ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>