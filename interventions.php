<?php
    require_once('db_connect.php');
    // on récupère les données
    $requete = 'SELECT * FROM interventions';
    $preparer = $db_connect->prepare($requete);
    $preparer->execute();
    $resultats = $preparer->fetchAll();
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
    <style>
        body {
            background-image: url("assets/images/intervention.png");
            background-repeat: no-repeat;
            background-size : cover;
        }
    </style>
    
    <title>LISTE DES INTERVENTIONS</title>
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex flex-column my-3">
                    <div class="text-center">
                        <h1>LISTE DES INTERVENTIONS</h1>
                    </div>
                    <div>
                        <a href="ajout_intervention.php" class="btn btn-light">
                            <i class="bi bi-plus-circle"></i> Ajouter une intervention
                        </a>
                    </div>
                </div>
                <table class="table table-hover table-bordered bg-white">
                    <thead>
                        <tr class="text-center">
                            <th>ID intervention</th>
                            <th>Type d'intervention</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $intervention) { ?>
                        <tr class="text-center">
                            <td><?php echo $intervention['id_intervention']; ?></td>
                            <td><?php echo $intervention['type_intervention']; ?></td>
                            <td>
                               <a href="supprimerIntervention.php?id=<?php echo $intervention['id_intervention']; ?>"> <button type="button" class="btn btn-light">
                                    <i class="bi bi-pencil-square"></i> Editer
                                </button> </a>
                                
                                <a onClick="return confirm ('voulez-vous vraiment supprimer cette intervention?');"href="supprimerIntervention.php?id=<?php echo $intervention['id_intervention']; ?>">

                                <button type="button" class="btn btn-light">
                                    <i class="bi bi-trash"></i> Supprimer
                                </button></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>