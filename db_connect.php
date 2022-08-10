<?php 
 // connexion à la base de données
try {
    $db_connect = new PDO(
        'mysql:host=localhost;dbname=conciergerie;',
        'root',
        ''
    );
}catch(PDOException $e){
    // si erreur de connexion à la base
    die("Erreur :". $e->getMessage());
}
