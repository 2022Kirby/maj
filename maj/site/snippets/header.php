    <header>
        <!-- logo -->
        <h1>
            <a href="<?= $pages->find('actualites')->url() ?>"><?= $site->acronyme() ?></a>
        </h1>
        <!-- qui ? renvoyant sur page d'accueil -->
        <a href="<?= $site->url() ?>">qui ?</a>

        <!-- menu de navigation -->
        <nav>
            <ul>
                <?php foreach ($site->children()->listed() as $page):?>
                <li>
                    <a href="<?= $page->url() ?>"><?= $page->title() ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>