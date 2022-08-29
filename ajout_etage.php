<?php
    require_once('db_connect.php'); //require once au lieu de hitaper an'ilay code lava be ao aminy connect.php d dia io require8once io no soratana @zay miseconnecte ny page**//
    if(isset($_POST['etage'])) {
        $etage = $_POST['etage'];
        $requete = 'INSERT INTO etages(numero_etage) VALUES (:numero_etage)'; 
        $preparer = $db_connect->prepare($requete);
        $preparer->execute([
            'numero_etage' => $etage
        ]);
        header('Location: /etages.php');
    } else {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Ajouter un étage</title>
    <style>
        body {
            background-image: url("assets/images/maintenance.jpg");
            background-repeat: no-repeat;
            background-size : cover;
        } 
    </style>
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="text-center my-3">
                    <h1>AJOUTER UNE ETAGE</h1>
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input
                            type="number"
                            class="form-control"
                            id="etage"
                            name="etage"
                            placeholder="Numéro de l'étage"
                            required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Ajouter l'étage
                        </button>
                        <a href="etages.php">
                            <i class="bi bi-arrow-left-circle"></i> Retour
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>