<?php
require_once("db.php");
$pdo_statement=$pdo_conn->prepare("delete from yearenderdata where id=" . $_GET['id']);
$pdo_statement->execute();
header('location:home.php');
?>
