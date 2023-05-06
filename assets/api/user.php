<?php 
$adminusername = $_POST["username"];
$adminpassword = $_POST["password"];
include("../include/connection.php");

$select = "SELECT UserName , Password FROM Users WHERE username = '$adminusername' and password = '$adminpassword'";
$query = $connect->query($select);
$result = $query->fetch();
if($result){
    header("Location: ../pages/Main.php");
}
else{
    header("Location: ../../index.php");
}
$connect = null;
?>