<?php ob_start() ?>

<div class="card card-livre mb-3">
    <h3 class="card-header"><?= $livreEnCours->getTitre() ?></h3>
    <div class="card-image">
        <img src="<?= SITE_URL ?>public/image/<?php echo $livreEnCours->getImage(); ?>" class="d-block mt-2 mx-auto" height="300" width="auto" alt="Livre pour <?php echo $livreEnCours->getTitre(); ?>">
    </div>
    <div class="card-body">
        <a href="#" class="card-link">Modifier</a>
    </div>
    <div class="card-footer text-muted">
        <p>Nombre de pages : <?= $livreEnCours->getNbPages() ?></p>
    </div>
</div>


<?php
$titre = $livreEnCours->getTitre();
$content = ob_get_clean();
require "views/template.view.php";
