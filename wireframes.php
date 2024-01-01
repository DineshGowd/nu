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
  <section style=" margin-top:20px; background: white">
    <h1 class="event_list">WireFrames of this Application</h1>
    <div>
      <a style="color: blue" href="./assets/Wireframes.pdf">Click here: WireFrame link of Event Website</a>
    </div>
  </section>
</body>

</html>