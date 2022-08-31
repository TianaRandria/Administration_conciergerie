<?php
require 'db_connect.php';
$id = $_GET['id'];
$sql = 'DELETE FROM maintenances WHERE id_maintenance=:id';
$statement = $db_connect->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: index44444.php");
}
?>