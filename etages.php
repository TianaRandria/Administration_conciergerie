<?php
    require_once('db_connect.php'); //require once au lieu de hitaper an'ilay code lava be ao aminy connect.php d dia io require8once io no soratana @zay miseconnecte ny page**//
    // on récupère les données
    $requete = 'SELECT * FROM etages';
    $preparer = $db_connect->prepare($requete); // rehefa avy mi connecte dia mandeha ny prepare 
    $preparer->execute();
    $resultats = $preparer->fetchAll(); //**fetchAll manambatra resultat requete */ 
                                                                                      //-> io dia succession ana fonction 
/// miarakaraka foana reo requete , prepare , resultats ,fetchall , succession ana commande reoooooo ///////
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
body{
    background-image: url("assets/images/bgetage.png");
    background-repeat: no-repeat;
    background-size : cover;
      
}
    </style>
    <title>LISTE DES ETAGES</title>
</head>
<body>
    <?php require_once('menu.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex flex-column my-3">
                    <div class="text-center">
                        <h1>LISTE DES ETAGES</h1>
                    </div>
                    <div>
                        <a href="ajout_etage.php" class="btn btn-light">
                            <i class="bi bi-plus-circle"></i> Ajouter une étage
                        </a>
                    </div>
                </div>
                <table class="table table-hover table-bordered bg-white">
                    <thead>
                        <tr class="text-center">
                            <th>ID étage</th>
                            <th>Numéro de l'étage</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $etage) { ?> <!--foreach boucle dia tant que mbola misy resultat dia mampiditra ligne ray foana izy -->
                        <tr class="text-center">
                            <td><?php echo $etage['id_etage']; ?></td>
                            <td><?php echo $etage['numero_etage']; ?></td>
                            <td>
                            <a href="modifierEtages.php?id=<?php echo $etage['id_etage']; ?>"> <button type="button" class="btn btn-light">
                                <button type="button" class="btn btn-light">
                                    <i class="bi bi-pencil-square"></i> Editer
                                </button></a>
                                <a onClick="return confirm ('voulez-vous vraiment supprimer cet etage?');" href ="supprimerEtage.php?id=<?php echo $etage['id_etage']; ?>"><button
                                    type="button"
                                    class="btn btn-light"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalSupprimer">
                                    <i class="bi bi-trash"></i> Supprimer
                                </button></a>

                                <!-- Modal Supprimer 
                                <div
                                    class="modal hide fade modal-dialog modal-dialog-centered"
                                    id="modalSupprimer"
                                    tabindex="-1"
                                    aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5
                                                    class="modal-title"
                                                    id="exampleModalLabel">
                                                    Voulez-vous supprimer définitivement ?
                                                </h5>
                                                <button
                                                    type="button"
                                                    class="btn-close"
                                                    data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            ...
                                            </div>
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    class="btn btn-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-primary">
                                                    Save changes
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
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