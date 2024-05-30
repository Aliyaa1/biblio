<?php
require_once "models/utils/ConnexionManager.class.php";
require_once "models/livres/Livre.class.php";

class LivreManager extends ConnexionManager
{
    private array $livres = [];

    public function ajouterLivre($nouveauLivre)
    {
        $this->livres[] = $nouveauLivre;
    }

    public function chargementLivres($id_user)
    {

        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM livre where id_user=$id_user");
        $req->execute();
        $livresImportes = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();


        foreach ($livresImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['titre'], $livre['image'], $livre['nb_pages']);
            $this->ajouterLivre($nouveauLivre);
        }
    }
    public function getAllLivres()
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM livre INNER JOIN user ON user.id_user = livre.id_user");
        $req->execute();
        $livresImportes = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();

        $this->livres = [];
        foreach ($livresImportes as $livre) {
            $nouveauLivre = new Livre($livre['id_livre'], $livre['titre'], $livre['image'], $livre['nb_pages'], $livre['identifiant'] != null ? $livre['identifiant'] : "pas d'uploader");
            $this->ajouterLivre($nouveauLivre);
        }
    }
    public function getLivreById($id_livre)
    {
        foreach ($this->livres as $livre) {
            if ($livre->getId() === $id_livre) {
                return $livre;
            }
        }
    }

    // affiche infor livre avec ...
    public function excerptLivre($titre)
    {
        if (strlen($titre) < 30) {
            return $titre;
        } else {

            $new = wordwrap($titre, 28);
            $new = explode("\n", $new);

            $new = $new[0] . '...';

            return $new;
        }
    }
    public function ajoutLivreBdd($titre, $nbPages, $nomImage, $id_user)
    {
        // on bind pr relier un paramètre à une valeur 
        $req = "INSERT INTO livre(titre, nb_pages, image, id_user) VALUES (:titre, :nb_pages, :image, :id_user)";
        $stmt = $this->getConnexionBdd()->prepare($req);
        $stmt->bindValue("titre", $titre, PDO::PARAM_STR);
        $stmt->bindValue("nb_pages", $nbPages, PDO::PARAM_INT);
        $stmt->bindValue("image", $nomImage, PDO::PARAM_STR);
        $stmt->bindValue("id_user", $id_user, PDO::PARAM_INT);  // Utilisez PDO::PARAM_INT si id_user est un entier
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        // libère la connexion 
    }
    /**
     * Get the value of livres
     *
     * @return array
     */
    public function getLivres(): array
    {
        return $this->livres;
    }
}
