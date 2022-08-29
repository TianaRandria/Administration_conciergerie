<?php
  require_once('db_connect.php');
  $id_intervention = $_GET['id'];

 


    // récuperer les interventions
    $requete2 = 'SELECT * FROM interventions';
    $preparer2 = $db_connect->prepare($requete2); // rehefa avy mi connecte dia mandeha ny prepare 
    $preparer2->execute();
    $interventions = $preparer2->fetchAll();

    if(isset($_POST['intervention']) && isset($_POST['typeintervention']) ) {
     
        $intervention = $_POST['intervention'];
        $type = $_POST['typeintervention'];
        $requete = "UPDATE interventions SET id_intervention = :id_intervention, type_intervention = :type_intervention  WHERE id_intervention = :id" ; 
        $preparer = $db_connect->prepare($requete);
        $preparer->execute([
            ':id_intervention' => $intervention,
            ':type_intervention' => $type,
            ':id' => $id_intervention
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
                    <h1>MODIFIER UNE INTERVENTION</h1>
                </div>
                <form action="#" method="POST">

                    <div class="mb-3">
                    <select
                            class="form-select"
                            id="intervention"
                            name="intervention"
                            required>
                            <option>Choisissez le id de l'intervention</option>
                            <?php foreach ($interventions as $interventions) { ?>
                            <option
                                value="<?php echo $interventions['id_intervention']; ?>">
                                <?php echo $interventions['id_intervention']; ?>
                               
                            </option>
                            <?php } ?>
                        </select>
                        <select
                            class="form-select"
                            id="typeintervention"
                            name="typeintervention"
                            required>
                            <option>Choisissez le type d'intervention</option>
                            <?php  
                                $requete2 = 'SELECT * FROM interventions';
                                $preparer2 = $db_connect->prepare($requete2); // rehefa avy mi connecte dia mandeha ny prepare 
                                $preparer2->execute();
                                $interventions = $preparer2->fetchAll();
                            foreach ($interventions as $interventions ) {  ?>
                            <option
                                value="<?php echo $interventions['type_intervention']; ?>">
                                <?php echo $interventions['type_intervention']; ?>
                            </option>
                            <?php } ?>
                           
                        </select>
                    </div>

                    <div class="d-grid">

                        <button type="submit" class="btn btn-primary">
                            Modifier l'intervention
                        </button>
                        <a href="interventions.php">
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