<?php
// (In a logout script)
session_start();
session_destroy(); // Clear session data
header("Location: customerLogin.php"); // Redirect to login page
