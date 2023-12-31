<?php
$eventID = $_POST['eventID'];

?>

<!DOCTYPE html>
<html>

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
        <div class="nav_logo">
            <img src="./assets/images/logo.jpg" alt="website logo">
        </div>
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
    <div class="customForm">
        <h1>Event Booking</h1>
        <form class="booking" action="process_booking.php" method="post">
            <input hidden type="number" id="eventID" name="eventID" value=<?php echo $_POST['eventID'] ?>>
            <input hidden type="number" id="customerID" name="customerID" required>
            <label for="number_of_people">
                <span> Number of People:</span>
                <input type="number" id="number_of_people" name="number_of_people" min="1" required>

            </label>
            <label for="total_booking_cost">
                <span>Total Booking Cost:</span>
                <input disabled type="number" id="total_booking_cost" name="total_booking_cost">
            </label>
            <label for="booking_notes">
                <span>Booking Notes:</span>
                <textarea id="booking_notes" name="booking_notes" rows="4" cols="22" style="resize: none;">Booking Notes</textarea>
            </label>
            <label for="booking_date">
                <span>Booking Date:</span>
                <input type="date" id="booking_date" name="booking_date" required>
            </label>
            <button type="submit">Book Now</button>
        </form>
    </div>
</body>

</html>