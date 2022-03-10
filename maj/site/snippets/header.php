    <header>
        <!-- logo renvoyant sur page d'accueil -->
        <h1>
            <a href="<?= $site->url() ?>">
                <?= $site->acronym() ?>
            </a>
        </h1>

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