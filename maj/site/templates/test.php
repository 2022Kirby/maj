<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="L'association Moissac Animation Jeunes souhaite favoriser l'intégration de tous à la vie culturelle, sociale, sportive et citoyenne de la ville de Moissac.">
    <link rel="icon" href="" />
    <title><?= $site->acronyme() ?> / <?= $page->title() ?></title>
    
    <!-- lien vers feuille de style générale -->
    <?= css('assets/css/index.css') ?>
    <!-- media queries -->
    <?= css('assets/css/media-queries.css') ?>
    <!-- lien vers feuille de style splidejs -->
    <?= css('assets/css/splide.min.css') ?>

    <style>
         /* boutons permettant d'ouvrir / fermer les panels */
        .accordion {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1%;
            width: 100%;
            font-size: 3vw;
            font-weight: bold;
            background-color: transparent;
            color: var(--primary-color);
            border: none;
            outline: none;
            cursor: pointer;
            transition: background-color 0.25s;
        }

        /* si bouton actif ou en survol, changement de couleur */
        .active, .accordion:hover {
            background-color: var(--bg-color-blue);
        }

        /* ajout du plus */
        .accordion:after {
            content: '+';
            margin-right: 3%;
            font-size: 3vw;
            color: var(--primary-color);
        }

        /* si bouton actif, transformation du plus en moins */
        .active:after {
            content: "-";
        }

        /* panel contenant les infos du service */
        .panel {
            display: none;
            overflow: hidden;
            margin: 1%;
        }

        .panel p{
            font-size: 1.5vw;
        }
    </style>
</head>

<body>
    <?php snippet('header') ?>
    
    <main>
        <!-- boucle foreach affichant pour chaque page enfant de la page services un bouton contenant le field title et une div contenant le field résumé du service-->
        <?php foreach ($pages->find('services')->children()->listed() as $service):?>
            <button class="accordion"><?= $service->title() ?></button>
            <div class="panel">
                <p><?= $service->résumé() ?></p>
            </div>
        <?php endforeach ?>
    </main>

    <?php snippet('footer') ?>

    <script>
        const buttons = document.getElementsByClassName("accordion");

        // itération sur l'array buttons
        for(button of buttons){
            // écoute du clic
            button.addEventListener("click", function() {
                // ajout de la classe active
                this.classList.toggle("active");

                // toggle entre afficher ou cacher le panel actif
                const panel = this.nextElementSibling;
                if(panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        } 
    </script>
</body>
</html>