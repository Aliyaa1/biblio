<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="index, follow">
    <meta name="description" content="site">
    <meta name="keyword" content="science-fiction, livres, aventure">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- based css bootstrap by bootswatch -->
    <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css">
    <title>Bibliothèque | <?= $titre ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <!-- lien vers adresse php soit / soit lien complet -->
            <a class="navbar-brand" href="/">Bibliothèque </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= SITE_URL ?>">Accueil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <!-- marche si prsn est connecté -->
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= SITE_URL ?>">Livres</a>
                        </li>
                    <?php endif; ?>


                    <li class="nav-item">
                        <a class="nav-link" href="a-propos">A propos</a>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= SITE_URL ?>">Se connecter</a>
                    </li>

                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= SITE_URL ?>">Se déconnecter</a>
                        </li>

                    <?php endif; ?>
                    <?php if (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= SITE_URL ?>">Mon profil</a>
                        </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>


    <!-- !-- <?php echo $content ?> -->
    <div id="container" classe="m-2 bg-success">
        <!-- pareil ligne au dessus et en bas -->
        <!-- alimentation de ce content avec template -->
        <h1 class="rounded border p-2 m_-2 text-center text-white bg-primary">
            <?= $titre ?></h1>
        <?= $content ?>
    </div>

    <!-- js bootstrap v5  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>

</html>