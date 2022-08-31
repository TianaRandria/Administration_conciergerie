<?php
require 'db_connect.php';
$id = $_GET['id'];
$sql = 'DELETE FROM interventions WHERE id_intervention=:id';
$statement = $db_connect->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: interventions.php");
}
?>