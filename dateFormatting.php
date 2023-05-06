<?php
$emiStartDate = new DateTime('2023-05-06'); // Set the EMI start date
$emiEndDate = clone $emiStartDate; // Clone the start date to get the end date
$emiEndDate->add(new DateInterval('P4M')); // Add 4 months to get the EMI end date

// Loop through each month and get the EMI due date
for ($i = 0; $i < 4; $i++) {
    $emiDueDate = clone $emiStartDate; // Clone the start date to get the due date
    // $emiDueDate->modify('last day of this month'); // Set the due date to the last day of the month
    $insertDateForEmi = $emiDueDate->format('d-m-Y');
    echo  $insertDateForEmi . "<br/>"; // Output the due date in the desired format
    $emiStartDate->add(new DateInterval('P1M')); // Increment the start date by 1 month
}
