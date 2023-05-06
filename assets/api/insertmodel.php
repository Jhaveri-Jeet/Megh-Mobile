<?php 
$companyid = $_POST["companyid"];
$modelname = $_POST["modelname"];
include("../include/connection.php");

$insert = "INSERT INTO Mobiles (MobileName, CompanyId) VALUES ('$modelname','$companyid')";
$query = $connect->query($insert);
header('Content-type:application/json');
header("Location: ../pages/AddMobile.php");
$connect = null;
?>