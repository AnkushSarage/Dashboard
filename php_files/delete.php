<?php
require_once("db.php");
$pdo_statement=$pdo_conn->prepare("delete from yearender_site where id=" . $_GET['Id']);
$pdo_statement->execute();
header('location:home.php');
?>
