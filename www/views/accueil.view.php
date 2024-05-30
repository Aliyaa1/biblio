<?php ob_start() ?>

<?php
// vérifie si $livresAll n'est pas null et si un tab ou un objet n'a pas ete itere
if (!is_null($livresAll) && (is_array($livresAll) || is_object($livresAll))) {
    foreach ($livresAll as $livre) : ?>
        <div class="card my-3 mx-auto w-25" style="min-width: 350px;">
            <h3 class="card-header"><?= $livre->getTitre() ?></h3>
            <img class="mx-auto" style="height: auto; width: 150px;" src="public/images/<?= $livre->getImage(); ?>">
            <div class=" card-body">
                <div class="card-body">
                    <a href="<?= SITE_URL ?>livres/l/<?= $livre->getId(); ?>">
                        En savoir plus ...
                    </a>
                </div>
                <div class="card-footer text-muted">
                    uploader : <?= $livre->getuploader(); ?>
                </div>
            </div>
        </div>
<?php endforeach;
} else {

    // affiche le msg lorsque $livresAll est null ou n'est ni un objet ni un tab  
    echo "Veuillez vous connecter pour accéder à vos livres.";
}

$titre = "Vos livres";
$content = ob_get_clean();
require "views/template.view.php";
