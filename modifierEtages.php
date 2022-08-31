<?php
  require_once('db_connect.php');
  $id_etage = $_GET['id'];
// récuperer les etages
    $requete2 = 'SELECT * FROM etages';
    $preparer2 = $db_connect->prepare($requete2); // rehefa avy mi connecte dia mandeha ny prepare 
    $preparer2->execute();
    $interventions = $preparer2->fetchAll();

    if(isset($_POST['id_etage']) && isset($_POST['numeroEtage'])) {
     
        $id_etage = $_POST['id_etage'];
        $numero_etage = $_POST['numeroEtage'];
        $requete = "UPDATE etages SET id_etage = :id_etage, numero_etage = :numeroEtage WHERE id_etage = :id " ; 
        $preparer = $db_connect->prepare($requete);
        $preparer->execute([
            ':id_etage' => $id_etage,
            ':numeroEtage' => $numero_etage,
            ':id' => $id_etage
           
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
    <title>Modifier etage</title>
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-2">
                <div class="text-center my-3">
                    <h1>MODIFIER ETAGE</h1>
                </div>
                <form action="#" method="POST">

                    <div class="mb-3">
                    <select
                            class="form-select"
                            id="etage"
                            name="id_etage"
                            required>
                            <option>Choisissez l'Id de l'etage</option>
                            <?php  
                                $requete2 = 'SELECT * FROM etages';
                                $preparer2 = $db_connect->prepare($requete2); // rehefa avy mi connecte dia mandeha ny prepare 
                                $preparer2->execute();
                                $etages = $preparer2->fetchAll();
                            foreach ($etages as $etages ) {  ?>
                            
                            <option
                                value="<?php echo $etages['id_etage']; ?>">
                                <?php echo $etages['id_etage']; ?>
                               
                            </option>
                            <?php } ?>
                        </select>
                        <select
                            class="form-select"
                            id="numeroEtage"
                            name="numeroEtage"
                            required>
                            <option>Choisissez le numero de l'etage</option>
                            <?php  
                                $requete2 = 'SELECT * FROM etages';
                                $preparer2 = $db_connect->prepare($requete2); // rehefa avy mi connecte dia mandeha ny prepare 
                                $preparer2->execute();
                                $etages = $preparer2->fetchAll();
                            foreach ($etages as $etages ) {  ?>
                            <option
                                value="<?php echo $etages['numero_etage']; ?>">
                                <?php echo $etages['numero_etage']; ?>
                            </option>
                            <?php } ?>
                           
                        </select>
                    </div>

                    <div class="d-grid">

                        <button type="submit" class="btn btn-primary">
                            Modifier l'etage
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