<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: customerLogin.php"); // Redirect to login page if not logged in
    exit();
}

// Homepage content for logged-in users
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
<!-- <?php phpinfo();
        $currentYear = date("Y");
        echo "<p>Copyright © $currentYear My Name</p>";
        ?> -->

<body>
    <nav>
        <div class="nav_logo">
            <img src="./assets/images/logo.jpg" alt="website logo">
        </div>
        <div class="nav_links">
            <span class="nav_linkitems"><a href="./index.php"> Home</a></span>
            <span class="nav_linkitems"><a href="./about.php"> About</a></span><span class="nav_linkitems"><a href="./booking.php"> Booking</a></span>
            <span class="nav_linkitems"><a href="./events.php"> Events</a></span>
            <span class="nav_linkitems"><a href="./wireframes.php"> WireFrames</a></span>
            <span class="nav_linkitems"><a href="./createCustomer.php"> Customer Signup</a></span>
            <span class="nav_linkitems"><a href="./customerLogin.php"> Customer Login</a></span>
            <span class="nav_linkitems"><a href="./credits.php"> Credits</a></span>
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div>
        <div class="banner_image">
            <h1 class="banner_text">
                Welcome to <br>
                Events Booking System
            </h1>
        </div>
    </div>
    <section>
        <h2>About Us</h2>
        Online event management system is an event management system software
        project that serves the functionality of an event manager. The system
        allows registered user login and new users are allowed to register on the
        application. The system helps in the management of events, users and the
        aspects related to them.
        <div>
            <a href="./events.php"><span class="btn">Book Event</span></a>
        </div>
    </section>
    <h2>Upcoming events</h2>
    <div class="upcoming-events">
        <?php
        require_once("db_connect.php");

        // SQL query to fetch events
        $sql = "SELECT `eventID`, `event_title`, `description`, `event_date`, `price_per_person`, `event_imagepath` FROM events";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output events in a table
            while ($row = $result->fetch_assoc()) {
                // echo $result->num_rows;
                echo "<div class='imggroup'>
                    <img src= /assets/Images/{$row['event_imagepath']} alt='Purple stage and excited crowd.'>
                    <figure>
                    <figcaption>{$row['event_title']}</figcaption>
                    </figure>
                </div>";
            }
        } else {
            echo "No events found.";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>