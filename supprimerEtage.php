<?php
require 'db_connect.php';
$id = $_GET['id'];
$sql = 'DELETE FROM etages WHERE id_etage=:id';
$statement = $db_connect->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: etages.php");
}
?>