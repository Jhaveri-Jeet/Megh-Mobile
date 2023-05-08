<?php
$expensename = $_POST["expensename"];
$amount = $_POST["amount$amount"];
include("../include/connection.php");

$insert = "INSERT INTO `Expenses` (`Expense`, `Amount`) VALUES ('$expensename', '$amount')";
$query = $connect->query($insert);
header("Content-type:application/json");
header("Location: ../pages/AddExpense.php");
$connect = null;
