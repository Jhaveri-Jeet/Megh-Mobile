<?php

include('../include/connection.php');

$companyId = $_POST['companyId'];
$mobileId = $_POST['mobileId'];
$customerName = $_POST['customerName'];
$customerNumber = $_POST['customerNumber'];
$billDate = $_POST['billDate'];
$emiStartingDate = $_POST['emiStartingDate'];
$emiMonths = $_POST['emiMonths'];
$amount = $_POST['amount'];
$profit = $_POST['profit'];
$emiAmount = $_POST['emiAmount'];
$status = "Pending";

$insertCustomerInfo = "INSERT INTO `CustomerInfo` (`CustomerName`, `CustomerNumber`, `BillDate`, `EMIStartingDate`, `EMIMonths`, `CompanyId`, `MobileId`, `Amount`, `Profit`) VALUES ('$customerName', '$customerNumber', '$billDate', '$emiStartingDate', '$emiMonths', '$companyId', '$mobileId', $amount, $profit)";
$query = $connect->query($insertCustomerInfo);

$customerInfoId = $connect->lastInsertId();
$emiStartDate = new DateTime($emiStartingDate); // Set the EMI start date
$emiEndDate = clone $emiStartDate; // Clone the start date to get the end date
$emiEndDate->add(new DateInterval('P4M')); // Add 4 months to get the EMI end date

for ($i = 0; $i < $emiMonths; $i++) {
    // Loop through each month and get the EMI due date
    $emiDueDate = clone $emiStartDate; // Clone the start date to get the due date
    $insertDateForEmi = $emiDueDate->format('Y-m-d');
    $emiStartDate->add(new DateInterval('P1M')); // Increment the start date by 1 month    

    $insertEmi = "INSERT INTO `EMI` (`CustomerInfoId`, `EMIDueDate`, `DueAmount`, `Status`) VALUES ('$customerInfoId', '$insertDateForEmi','$emiAmount','$status')";
    $queryInsert = $connect->query($insertEmi);
}
header("Content-type:application/json");
echo json_encode($queryInsert);
$connect = null;
