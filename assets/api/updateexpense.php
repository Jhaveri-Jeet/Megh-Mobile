<?php
$expenseid = $_POST["expenseid"];
$expense = $_POST["expense"];
$amount = $_POST["amount"];
include("../include/connection.php");

$update = "UPDATE Expenses SET Expense = '$expense', Amount = '$amount' WHERE Id = $expenseid";
$query = $connect->query($update);
header("Content-type:application/json");
header("Location: ../pages/AllEMIs.php");
$connect = null;
