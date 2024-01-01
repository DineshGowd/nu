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
        <h1>Registration</h1>
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