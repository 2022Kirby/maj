            <div class="actualite">
                <a href="<?= $actualite->url() ?>">
                    <h1><?= $actualite->title() ?></h1>
                
                    <!-- si le champ résumé existe -->
                    <?php if($actualite->resume()->exists()): ?>
                        <p><?= $actualite->resume() ?></p>
                    <?php endif ?>
                </a>
            </div>