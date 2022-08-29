<?php
  require_once('db_connect.php');
  $id_maintenance = $_GET['id'];

    // récuperer les étages
    $requete1 = 'SELECT * FROM etages';
    $preparer1 = $db_connect->prepare($requete1); // rehefa avy mi connecte dia mandeha ny prepare 
    $preparer1->execute();
    $etages = $preparer1->fetchAll();

        // récuperer les id maintenance
        $requete2 = 'SELECT * FROM maintenances';
        $preparer2 = $db_connect->prepare($requete2); // rehefa avy mi connecte dia mandeha ny prepare 
        $preparer2->execute();
        $maintenance = $preparer2->fetchAll();

    // récuperer les interventions
    $requete2 = 'SELECT * FROM interventions';
    $preparer2 = $db_connect->prepare($requete2); // rehefa avy mi connecte dia mandeha ny prepare 
    $preparer2->execute();
    $interventions = $preparer2->fetchAll();

    if(isset($_POST['date']) && isset($_POST['intervention']) && isset($_POST['etage'])) {
        $date = $_POST['date'];
        $maint = $_POST['maintenance'];
        $intervention = $_POST['intervention'];
        $etage = $_POST['etage'];
        $requete = "UPDATE maintenances SET id_maintenance = :id_maintenance, date_intervention = :date_intervention, id_intervention = :id_intervention, id_etage = :id_etage WHERE id_maintenance = :id" ; 
        $preparer = $db_connect->prepare($requete);
        $preparer->execute([
            ':id_maintenance' => $maint,
            ':date_intervention' => $date,
            ':id_intervention' => $intervention,
            ':id_etage' => $etage,
            ':id' => $id_maintenance
        ]);
        header('Location: /index.php');
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
    <title>Ajouter une maintenance</title>
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <div class="text-center my-3">
                    <h1>MODIFIER UNE MAINTENANCE</h1>
                </div>
                <form action="#" method="POST">
                    <div class="mb-3">
                        <input
                            type="date"
                            class="form-control"
                            id="date"
                            name="date"
                            placeholder="Date d'intervention"
                            required>
                    </div>
                    <div class="mb-3">
                    <select
                            class="form-select"
                            id="maintenance"
                            name="maintenance"
                            required>
                            <option>Choisissez le id de la maintenance</option>
                            <?php foreach ($maintenance as $maintenance) { ?>
                            <option
                                value="<?php echo $maintenance['id_maintenance']; ?>">
                                <?php echo $maintenance['id_maintenance']; ?>
                               
                            </option>
                            <?php } ?>
                        </select>
                        <select
                            class="form-select"
                            id="intervention"
                            name="intervention"
                            required>
                            <option>Choisissez le type d'intervention</option>
                            <?php foreach ($interventions as $intervention) { ?>
                            <option
                                value="<?php echo $intervention['id_intervention']; ?>">
                                <?php echo $intervention['type_intervention']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select
                            class="form-select"
                            id="etage"
                            name="etage"
                            required>
                            <option>Choisissez l'étage</option>
                            <?php foreach ($etages as $etage) { ?>
                                <option
                                value="<?php echo $etage['id_etage']; ?>">
                                <?php echo $etage['numero_etage'];; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="d-grid">

                        <button type="submit" class="btn btn-primary">
                            Modifier la maintenance
                        </button>
                        <a href="index.php">
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