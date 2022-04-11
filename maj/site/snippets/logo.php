        <!-- logo MAJ -->
        <a id="logo" href="<?= $pages->find('actualites')->url() ?>">
            <?php $logo = $pages->find('header')->find('logo')->image() ?>
                <img src="<?= $logo->url() ?>" alt="<?= $logo->alt() ?>">
            <?php ?>
        </a>