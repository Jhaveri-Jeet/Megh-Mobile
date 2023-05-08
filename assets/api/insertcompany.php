<?php 
$companyname = $_POST["companyname"];
include("../include/connection.php");

$insert = "INSERT INTO `Companies` (`CompanyName`) VALUES ('$companyname')";
$query = $connect->query($insert);
header("Content-type:application/json");
header("Location: ../pages/AddCompany.php");
$connect = null;
