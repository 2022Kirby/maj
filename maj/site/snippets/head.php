<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="L'association Moissac Animation Jeunes souhaite favoriser l'intégration de tous à la vie culturelle, sociale, sportive et citoyenne de la ville de Moissac.">
    <link rel="icon" href="<?= $pages->find('header')->files()->filterBy('filename', '*=', 'favicon') ?>" />
    <title><?= $site->nom() ?> / <?= $page->title() ?></title>
    
    <!-- lien vers feuille de style générale -->
    <?= css('assets/css/index.css') ?>
    <!-- media queries -->
    <?= css('assets/css/media-queries.css') ?>
    <!-- lien vers feuille de style splidejs -->
    <?= css('assets/css/splide.min.css') ?>
</head>