<?php
require_once "models/utils/ConnexionManager.class.php";
require_once "models/users/User.class.php";
?>
<?php
class UserManager extends ConnexionManager
{
    // utilisation de l'objet User qui est dans User.class
    private User $user;

    public function setUser($identifiant, $password)
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM user");
        $req->execute();
        // fetchAll recupération de toutes les lignes 
        $users = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();


        foreach ($users as $user) {
            // logique  pr recup ce qui est tapé par user et comparaison avec cans la superglob POST
            if ($user['identifiant'] === $identifiant) {
                if (password_verify($password, $user['password'])) {
                    $user = new User($user['id_user'], $user['identifiant'], $user['password']);
                    return $this->user = $user;
                }
            }
        }
    }

    public function getUser(): User
    {
        return $this->user;
    }
}
