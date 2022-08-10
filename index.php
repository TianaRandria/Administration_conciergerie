<?php
    require_once('db_connect.php');
    // on récupère les données
    // $requete = 'SELECT * FROM maintenances';
    $requete = 'SELECT * FROM maintenances INNER JOIN interventions ON maintenances.id_intervention = interventions.id_intervention INNER JOIN etages ON maintenances.id_etage = etages.id_etage';
    $preparer = $db_connect->prepare($requete);
    $preparer->execute();
    $resultats = $preparer->fetchAll();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Liste des maintenances</title>
</head>
<body>
    <?php require_once('menu.php'); ?> 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex flex-column my-3">
                    <div class="text-center">
                        <h1>Liste des maintenances</h1>
                    </div>
                    <div>
                        <a href="ajout_maintenance.php" class="btn btn-light">
                            <i class="bi bi-plus-circle"></i> Ajouter une tâche
                        </a>
                    </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Date d'intervention</th>
                            <th>Type d'intervention</th>
                            <th>Etage concerné</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $maintenance) { ?>
                        <tr class="text-center">
                            <td><?php echo date('d/m/Y', strtotime($maintenance['date_intervention'])); ?></td>
                            <td><?php echo $maintenance['type_intervention']; ?></td>
                            <td><?php echo $maintenance['numero_etage']; ?></td>
                            <td>
                                <button type="button" class="btn btn-light">
                                    <i class="bi bi-pencil-square"></i> Editer
                                </button>
                                <button type="button" class="btn btn-light">
                                    <i class="bi bi-trash"></i> Supprimer
                                </button>
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