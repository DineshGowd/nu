<?php
include("reuseHTML.php");
require_once("db_connect.php");
$customerID = rand(0, 8388607);;
$forename = $conn->real_escape_string($_POST['forename']);
$surname = $conn->real_escape_string($_POST['surname']);
$dateofbirth = $conn->real_escape_string($_POST['dateofbirth']);
$formatdateofbirth = date("Y-m-d", strtotime($dateofbirth));
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// SQL query to insert data
$sql = "INSERT INTO customers (customerID,customer_forename,customer_surname,date_of_birth,customer_email, password_hash) VALUES ('$customerID','$forename','$surname','$formatdateofbirth','$email','$hashed_password')";
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
    echo "<div style='margin-top: 20px'>New customer registered successfully!</div>";
} else {
    // echo "Error: " . $sql . "<br>" . $conn->error;
    echo "<div style='margin-top: 20px'>New customer unable register! Try again</div>";
}

$conn->close();
