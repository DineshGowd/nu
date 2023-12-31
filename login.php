<?php
include("db_connect.php"); // Assuming database connection details are in this file

if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stored_hash = $retrieved_hash_from_database;

    if (password_verify($entered_password, $stored_hash)) {
        // Passwords match, proceed with login
    } else {
        // Invalid password
    }
    // Securely check credentials against the database
    $sql = "SELECT * FROM customers WHERE customer_email = ? AND password_hash = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password); // Prevent SQL injection
    $stmt->execute();
    $result = $stmt->get_result();
    echo "$email, $password ";

    if ($result->num_rows > 0) {
        // Successful login
        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email; // Store user information in session
        header("Location: index.php"); // Redirect to protected area
        exit();
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}
