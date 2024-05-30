<?php ob_start() ?>

<h1>mon Profil</h1>


<?php
$titre = "Profil";
$content = ob_get_clean();
require "views/template.view.php";
