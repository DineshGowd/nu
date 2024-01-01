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
  <h1 class="event_list">Events</h1>
  <main>
    <?php
    require_once("db_connect.php");

    // SQL query to fetch events
    $sql = "SELECT `eventID`, `event_title`, `description`, `event_date`, `price_per_person`, `event_imagepath` FROM events";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output events in a table
      while ($row = $result->fetch_assoc()) {
        echo "<div class='imggroup'>
        <a href=/eventdetail.php?event_id=$row[eventID]>
          <img src= /assets/Images/{$row['event_imagepath']} alt='Purple stage and excited crowd.'>
          <figure>
            <figcaption>{$row['event_title']}</figcaption>
          </figure>
          </a>
      </div>";
      }
    } else {
      echo "No events found.";
    }

    $conn->close();
    ?>
  </main>
</body>

</html>