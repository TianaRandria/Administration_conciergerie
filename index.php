<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <?php
session_start();
if(ISSET($_POST['username'])){
    if($_POST['password'] != "" && $_POST['password'] != ""){
        require_once 'db_connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `users` WHERE `nom_utilisateur`=?  ";
        $query = $db_connect->prepare($sql);
        $query->execute(array($username));
        $row = $query->rowCount();
        $fetch = $query->fetch();
        if (($row > 0) && (($password = $fetch['mot_de_passe']))) {
        
 
            header("location: index44444.php");
           


                } else{
                    header("location: index.php?erreur=1");
                    echo "<p style='color:red'>Utilafficher.phpisateur ou mot de passe incorrect</p>";
                  }}}
?>
        <div id="container">
            <!-- zone de connexion -->
            
            <form action="" method="POST">
                <h1>Bonjour Mr Menard</h1>
                
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="Entrez votre nom d'utilisateur" name="username" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrez votre mot de passe" name="password" required>

                <input type="submit" id='submit' value='SE CONNECTER' >
                <?php

                ?>
            </form>
        </div>
    </body>
</html>