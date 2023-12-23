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
  <nav>
    <div class="nav_logo"> <img src="./assets/images/logo.jpg" alt="website logo"></div>

    <div class="nav_links">
      <span class="nav_linkitems"><a href="./index.php"> Home</a></span>
      <span class="nav_linkitems"><a href="./about.php"> About</a></span>
      <span class="nav_linkitems"><a href="./events.php"> Events</a></span>
      <span class="nav_linkitems"><a href="./wireframes.php"> WireFrames</a></span>
      <span class="nav_linkitems"><a href="./customer.php"> Customer Signup</a></span>
      <span class="nav_linkitems"><a href="./customerLogin.php"> Customer Login</a></span>
      <span class="nav_linkitems"><a href="./credits.php"> Credits</a></span>
    </div>
  </nav>
  <h1 class="event_list">Events</h1>
  <main>
    <?php
    require_once("db_connect.php");

    // SQL query to fetch events
    $sql = "SELECT eventname, eventimage FROM events";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output events in a table
      while ($row = $result->fetch_assoc()) {
        echo "<div class='imggroup'>
        <img src= {$row['eventimage']} alt='Purple stage and excited crowd.'>
        <figure>
          <figcaption>{$row['eventname']}</figcaption>
        </figure>
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