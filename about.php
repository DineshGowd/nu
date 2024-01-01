<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: customerLogin.php"); // Redirect to login page if not logged in
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home Page</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./assets/stylesheets/index.css">
</head>

<body>
  <?php include("reuseHTML.php");
  navigation();
  ?>
  <h1 class="event_list">About Us</h1>
  <div>
    Online event management system is an event management system software
    project that serves the functionality of an event manager. The system
    allows registered user login and new users are allowed to register on the
    application. The system helps in the management of events, users and the
    aspects related to them.
  </div>
</body>

</html>