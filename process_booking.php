<?php
// Connect to your database
include("db_connect.php"); // Assuming database connection details are in this file

// Get form data
$eventID = 1;
$customerID = 2;
$number_of_people = $_POST['number_of_people'];
$total_booking_cost = $_POST['total_booking_cost'];
$booking_notes = $_POST['booking_notes'];
// $booking_date = $_POST['booking_date'];

// Validate and sanitize data (replace with your validation logic)
if (!validate_booking_data($event_id, $booking_date, $number_of_people)) {
    // Handle validation errors
    header("Location: booking.php?error=invalid_data");
    exit();
}

// Check availability (replace with your logic to check availability based on event_id and booking_date)
if (!is_available($event_id, $booking_date)) {
    header("Location: booking.php?error=not_available");
    exit();
}

function validate_booking_data($event_id, $booking_date, $number_of_people)
{
    // Validate event_id (ensure it's a valid integer and exists in the events table)
    // if (!filter_var($event_id, FILTER_VALIDATE_INT) || !event_exists($event_id)) {
    if (!filter_var($event_id, FILTER_VALIDATE_INT)) {
        return false;
    }

    // Validate booking_date (ensure it's a valid date and not in the past)
    $booking_timestamp = strtotime($booking_date);
    if (!$booking_timestamp || $booking_timestamp < time()) {
        return false;
    }

    // Validate number_of_people (ensure it's a positive integer)
    if (!filter_var($number_of_people, FILTER_VALIDATE_INT) || $number_of_people <= 0) {
        return false;
    }

    return true; // All validations passed
}

// Insert booking into the database
$sql = "INSERT INTO bookings (event_id, booking_date, number_of_people) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "isd", $event_id, $booking_date, $number_of_people);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Booking successful, display confirmation
    header("Location: confirmation.php?booking_id=" . mysqli_insert_id($conn));
} else {
    // Booking failed
    header("Location: booking.php?error=booking_failed");
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

function is_available($event_id, $booking_date)
{
    // Check if the event is already fully booked or has any other availability constraints
    $sql = "SELECT COUNT(*) FROM bookings WHERE event_id = ? AND booking_date = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "is", $event_id, $booking_date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $existing_bookings);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Adjust the threshold based on your event capacity
    if ($existing_bookings >= 10) { // Assuming a maximum capacity of 10
        return false; // Not available
    }

    return true; // Available
}
