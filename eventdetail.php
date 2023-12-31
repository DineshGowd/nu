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
      <span class="nav_linkitems"><a href="./credits.php"> Credits</a></span>
      <?php
      if (isset($_SESSION['logged_in'])) {
        echo "<form action='logout.php' method='post'>
                        <button type='submit'>Logout</button>
                    </form>";
      } else {
        echo  "<span class='nav_linkitems'><a href='./createCustomer.php'> Customer Signup</a></span>
                <span class='nav_linkitems'><a href='./customerLogin.php'> Customer Login</a></span>";
      }
      ?>
    </div>
  </nav>
  <h1 class="event_list">Events Details Page</h1>
  <main>
    <?php
    require_once("db_connect.php");
    $event_id = $_GET['event_id'];
    // SQL query to fetch events
    $sql = "SELECT `eventID`, `event_title`, `description`, `event_date`, `price_per_person`, `event_imagepath` FROM events where eventID= $event_id ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Output events in a table
      $event = $result->fetch_assoc();
      echo "<div class='imggroup'>
        <a href=/eventdetail.php?event_id=$event[eventID]>
          <img src= /assets/Images/{$event['event_imagepath']} alt='Purple stage and excited crowd.'>
          <figure>
            <figcaption>{$event['event_title']}</figcaption>
          </figure>
          </a>
          <form action='booking.php' method='post'>
            <input type='hidden' name='eventID' value=$event[eventID]>
            <button type='submit' name='booking'>Book Now</button>
          </form>
      </div>";
    } else {
      echo "No events found.";
    }

    $conn->close();
    ?>
  </main>
</body>

</html>