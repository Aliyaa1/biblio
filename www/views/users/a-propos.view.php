<?php ob_start() ?>

<h1>A propos</h1>


<?php
$titre = "A propos";
$content = ob_get_clean();
require "views/template.view.php";
