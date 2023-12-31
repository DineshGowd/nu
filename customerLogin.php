<?php

include("db_connect.php"); // Assuming database connection details are in this file
if (isset($_POST['email'], $_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Securely check credentials against the database
    $sql = "SELECT * FROM customers WHERE customer_email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email); // Prevent SQL injection
    $stmt->execute();
    $result = $stmt->get_result();
    echo "$email ";

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_hash = $row['password_hash'];
        $customerID = $row['customerID'];
        echo password_verify($password, $stored_hash);
        echo $password, $stored_hash;
        // Verify password using password_verify()
        if (password_verify($password, $stored_hash)) { // Successful login
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email; // Store user information in session
            $_SESSION["customerID"] = $customerID; 
            header("Location: index.php"); // Redirect to protected area
            exit();
        } else {
            // Invalid password
            echo "Invalid username or password";
        }
    } else {
        echo "Invalid email or password.";
    }

    $stmt->close();
}
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
        <h1>Login</h1>
        <form method="post" action="customerLogin.php">
            <label for="email">
                <span>Email:</span>
                <input type="email" id="email" name="email" required>
            </label><br>
            <label for="password">
                <span>Password:</span>
                <input type="password" id="password" name="password" required>
            </label><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>

</html>