<?php ob_start() ?>

<h1>Page indisponible</h1>


<?php
$titre = "ERROR";
$content = ob_get_clean();

require "views/template.view.php";
