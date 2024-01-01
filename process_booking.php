<?php
// Connect to your database
include("db_connect.php"); // Assuming database connection details are in this file
include("reuseHTML.php");
// Get form data
$bookingID = rand(0, 8388607);;
$eventID = $conn->real_escape_string($_POST['eventID']);
$customerID = $conn->real_escape_string($_POST['customerID']);
$number_of_people =  $conn->real_escape_string($_POST['number_of_people']);
$total_booking_cost =  $conn->real_escape_string($_POST['total_booking_cost']);
$booking_notes =  $conn->real_escape_string($_POST['booking_notes']);
// $booking_date = $_POST['booking_date'];
$sql = "INSERT INTO booking (bookingID,eventID,customerID,number_people,total_booking_cost,booking_notes) VALUES ('$bookingID','$eventID','$customerID','$number_of_people','$total_booking_cost','$booking_notes')";
navigation();
echo "
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Home Page</title>
        <meta name='description' content=''>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel='stylesheet' href='./assets/stylesheets/index.css'>
    </head>";
// Execute query
if ($conn->query($sql) === TRUE) {
    echo "<div style='margin-top: 20px'>Booking successfully done!</div>";
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<div style='margin-top: 20px'>Booking unsuccessfully! Try again</div>";
}

$conn->close();
