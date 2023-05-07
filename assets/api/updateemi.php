<?php
$date = $_POST["date"];
$customerid = $_POST["customerid"];
include("../include/connection.php");

$update = "UPDATE EMI SET Status = 'Paid' WHERE EMIDueDate ='$date' && CustomerInfoId = $customerid";
$query = $connect->query($update);
header("Content-type:application/json");
header("Location: ../pages/AllEMIs.php");
$connect = null;
