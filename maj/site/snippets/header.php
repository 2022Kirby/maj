    <header>
        <!-- logo -->
        <h1>
            <a href="<?= $pages->find('actualites')->url() ?>"><?= $site->acronym() ?></a>
        </h1>
        <!-- qui ? renvoyant sur page d'accueil -->
        <a href="<?= $site->url() ?>">qui ?</a>

        <!-- menu de navigation -->
        <nav>
            <ul>
                <?php foreach ($site->children()->listed() as $item):?>
                <li>
                    <a href="<?= $item->url() ?>"><?= $item->title() ?></a>
                </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </header>