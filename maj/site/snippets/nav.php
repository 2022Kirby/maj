        <!-- menu de navigation -->
        <nav>
            <ul>
                <!-- boucle affichant pour chaque page enfant du site un lien de navigation -->
                <?php foreach($site->children()->listed() as $page):
                // si page active, ajout de la classe courant
                $class = r($page->isOpen(), 'class="courant"'); ?>
                    <li>
                        <a <?= $class ?> href="<?= $page->url() ?>">
                            <?= $page->title() ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>