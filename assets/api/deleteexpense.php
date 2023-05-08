<?php 
$expenseid = $_POST["expenseid"];
include("../include/connection.php");

$delete = "DELETE FROM Expenses WHERE Id = $expenseid";
$query = $connect->query($delete);
header("Content-type:application/json");
header("Location: ../pages/ViewExpenses.php");
$connect = null;
