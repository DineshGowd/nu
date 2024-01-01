<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: customerLogin.php"); // Redirect to login page if not logged in
    exit();
}
$customerID = $_SESSION["customerID"];
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
    <?php include("reuseHTML.php");
    navigation();
    ?>
    <div class="customForm">
        <h1>Event Booking</h1>
        <form class="booking" action="process_booking.php" method="post">
            <input style="visibility: hidden;" type="number" id="eventID" name="eventID" value=<?php echo $eventID ?> required>
            <input style="visibility: hidden;" type="number" id="customerID" name="customerID" value=<?php echo $customerID ?> required>
            <label for="number_of_people">
                <span> Number of People:</span>
                <input type="number" id="number_of_people" name="number_of_people" min="1" required>

            </label>
            <label for="total_booking_cost">
                <span>Total Booking Cost:</span>
                <input type="number" id="total_booking_cost" name="total_booking_cost">
            </label>
            <label for="booking_notes">
                <span>Booking Notes:</span>
                <textarea id="booking_notes" name="booking_notes" rows="4" cols="22" style="resize: none;">Booking Notes</textarea>
            </label>
            <label for="booking_date">
                <span>Booking Date:</span>
                <input type="date" id="booking_date" name="booking_date" required>
            </label>
            <button type="submit" class="btnSubmit">Book Now</button>
        </form>
    </div>
</body>

</html>