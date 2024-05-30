<?php
class UserModel
{
    public function getUserProfile($userId)
    {
        $connexion = $this->getConnexionBdd();

        // Préparez et exécutez la requête SQL pour récupérer le profil de l'utilisateur
        $req = "SELECT * FROM users WHERE id = :userId";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();

        // Récupérez les résultats de la requête
        $userProfile = $stmt->fetch(PDO::FETCH_ASSOC);

        return $userProfile;
    }
}
