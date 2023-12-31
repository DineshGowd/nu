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
        <h1>Customer Registration</h1>
        <form action="insertCustomer.php" method="post">
            <label for="forename">ForeName:
                <input type="text" id="forename" name="forename" required>
            </label>
            <label for="surname">SurName:
                <input type="text" id="surname" name="surname" required>
            </label>
            <label for="dateofbirth">Date of Birth:
                <input type="date" id="dateofbirth" name="dateofbirth" required>
            </label><br>
            <label for="email">Email:
                <input type="email" id="email" name="email" required>
            </label><br>
            <label for="password">Password:
                <input type="password" id="password" name="password" required>
            </label><br>
            <button type="submit">Register</button>
        </form>
    </div>
</body>

</html>