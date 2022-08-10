<?php
    require_once('db_connect.php'); //require once au lieu de hitaper an'ilay code lava be ao aminy connect.php d dia io require8once io no soratana @zay miseconnecte ny page**//
    if(isset($_POST['intervention'])) {
        $intervention = $_POST['intervention'];
        $requete = 'INSERT INTO interventions(type_intervention) VALUES (:type_intervention)'; 
        $preparer = $db_connect->prepare($requete);
        $preparer->execute([
            'type_intervention' => $intervention
        ]);
        header('Location: /interventions.php');
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
    <title>Ajouter une intervention</title>
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <div class="text-center my-3">
                    <h1>Ajouter une intervention</h1>
                </div>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <input
                            type="text"
                            class="form-control"
                            id="intervention"
                            name="intervention"
                            placeholder="Type d'intervention (exemple : changement ampoule)"
                            required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Ajouter une intervention
                        </button>
                        <a href="interventions.php">
                            <i class="bi bi-arrow-left-circle"></i> Retour
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php } ?>