<?php
class Utils
{
    public static function uploadFile($file, $dir)
    {
        try {
            $extention = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $extentionValidesTab = ["jpg", "jpeg", "png", "gif", "wedp"];
            // $random = rand(0, 9999999);
            $random = time();  // timestamp
            $target_file = $dir . $random . "_" . $file['name'];

            // verification d'image presente ou non 
            if (!isset($file['name']) || empty($file['name'])) throw new Exception("Vous devez séléctionner une image ! ");
            // si doss image non existant ligne du dessous va créer le dossier
            if (!file_exists($dir)) mkdir($dir, 0777);

            // taille image => octets 3 Mo max
            if ($file['size'] > 3000000) throw new Exception("Le fichier est trop volumineux");

            // permet de voir si l'élément est présent dans le tableau (in_array)
            if (!in_array($extention, $extentionValidesTab)) throw new Exception("L'extension $extention n'est pas autorisée !");
            foreach ($extentionValidesTab as $extensionTrouvee) {
                if ($extention !== $extensionTrouvee)  throw new Exception("L'extension n'est pas autorisée ");
            }

            // erreur copie 
            if (!move_uploaded_file($file['tmp_name'], $target_file)) throw new Exception("Le téléchargement de l'image n'a pas fonctionné ");
            if ($extention !== "jpg" && $extention !== "jpeg" && $extention !== "png" && $extention !== "gif")  throw new Exception("L'extension n'est pas autorisée ");
        } catch (Exception $e) {
            // Ne pas utiliser echo ici
            // Utilisez système de journalisation ou lancer une exception pour être géré par le code appelant
            error_log($e->getMessage());
            // Optionnel : Redirigez vers une page d'erreur
            header("Location: " . SITE_URL . "error");
            exit(); // quitter le script après la redirection.
        }
    }
}
