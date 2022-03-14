<!-- Ceci est le template utilisé par défaut, en cas d'absence de template propre à la page -->

<!-- insertion de head.php -->
<?php snippet('head') ?>

<body>
    <!-- insertion de header.php -->
    <?php snippet('header') ?>
    
    <main>
        <!-- title de la page -->
        <h2><?= $page->title() ?></h2>

        <!-- article -->
        <article>
            <img src="https://picsum.photos/1500/300" alt="">
            
            <!-- pour les besoins de la démo, insertion de lorem ipsum, via une boucle for -->
            <?php for($i = 0 ; $i < 3 ; $i++):?>
            <!-- l'article se découpera en sections, chacune contenant un h3 et un p, et possiblement des images -->
            <section>
                <h3>Lorem ipsum</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sit amet vestibulum nibh. Mauris dapibus tortor eros, ut mollis lectus lobortis nec. Curabitur lacinia posuere rhoncus. Nunc sagittis cursus pellentesque. Proin hendrerit tempus sagittis. Curabitur feugiat, massa vel suscipit mollis, mi massa ornare justo, vel aliquet mauris justo ut ex. Aliquam pulvinar vulputate gravida. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. <br><br>
                Aliquam id lorem vitae nibh iaculis venenatis nec ut leo. Sed dapibus velit at sodales hendrerit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas fermentum ipsum quis iaculis scelerisque. Pellentesque commodo cursus urna, a ultrices quam vestibulum id. Suspendisse consequat nulla eu ex condimentum, tempor accumsan magna varius. Sed hendrerit erat enim, in malesuada ante convallis ut. Nam fringilla velit id tellus volutpat porttitor. Donec aliquam nec mauris vel consectetur. Sed vitae orci sapien. Sed quis nulla ac nisl lacinia tincidunt a ut neque. Nulla eu velit dapibus elit semper lobortis.
                </p>
            </section>
            <?php endfor; ?> 
        </article>
    </main>

    <!-- insertion de footer.php -->
    <?php snippet('footer') ?>
</body>
</html>