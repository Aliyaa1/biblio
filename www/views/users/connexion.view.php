<?php
require_once "controllers/users/UserController.controller.php";
$usersController = new UsersController;
if (isset($_POST['identifiant'])) {
    $usersController->connexionUser($_POST['identifiant'], $_POST['password']);
}

?>

<?php ob_start() ?>

<form class="m-auto w-50" method="post" action="">
    <fieldset>
        <legend>Connexion</legend>
        <div class="form-group">
            <label for="exampleInputIdentifiant" class="form-label mt-4">Identifiant</label>
            <input type="text" name="identifiant" class="form-control" id="exampleInputIdentifiant" aria-describedby="identifiantHelp" placeholder="Identifiant">
            <small id="identifiantHelp" class="form-text text-muted">Saisissez l'identifiant choisi à l'inscription.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" autocomplete="off">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Se connecter</button>
    </fieldset>
</form>

<?php
$titre = "connexion";
$content = ob_get_clean();
require_once "views/template.view.php";
