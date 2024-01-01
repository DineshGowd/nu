<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
  header("Location: customerLogin.php"); // Redirect to login page if not logged in
  exit();
}
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

<body>
  <?php include("reuseHTML.php");
  navigation();
  ?>
  <h1 class="credits_title">Credits</h1>
  <div class="credits_list">
    <ul>
      <li class="credits_item">
        <h5>HomePage Banner Image</h5>
        <a href="https://www.pexels.com/photo/people-having-a-concert-1190297/">https://www.pexels.com/photo/people-having-a-concert-1190297/</a>
      </li>
      <li class="credits_item">
        <h5>Music Concert Image</h5>
        <a href="https://www.pexels.com/photo/tilt-shift-photo-of-acoustic-drum-set-995301/">https://www.pexels.com/photo/tilt-shift-photo-of-acoustic-drum-set-995301/</a>
      </li>
      <li class="credits_item">
        <h5>Festival Image</h5>
        <a href="https://www.pexels.com/photo/people-in-gold-and-red-traditional-dress-dancing-on-the-street-3453056/">https://www.pexels.com/photo/people-in-gold-and-red-traditional-dress-dancing-on-the-street-3453056/</a>
      </li>
      <li class="credits_item">
        <h5>Comedy Image</h5>
        <a href="https://www.pexels.com/photo/clown-wearing-a-black-hat-15197673/">https://www.pexels.com/photo/clown-wearing-a-black-hat-15197673/</a>
      </li>
      <li class="credits_item">
        <h5>Standup Comedy Image</h5>
        <a href="https://www.pexels.com/photo/photo-of-man-holding-mic-3321793/">https://www.pexels.com/photo/photo-of-man-holding-mic-3321793/</a>
      </li>
      <li class="credits_item">
        <h5>Lectures Image</h5>
        <a href="https://www.pexels.com/photo/people-sitting-on-gang-chairs-2774556/">https://www.pexels.com/photo/people-sitting-on-gang-chairs-2774556/</a>
      </li>
      <li class="credits_item">
        <h5>Theatrical event Image</h5>
        <a href="https://www.pexels.com/photo/crowd-in-front-of-blue-and-orange-stage-during-a-concert-at-night-1387174/">https://www.pexels.com/photo/crowd-in-front-of-blue-and-orange-stage-during-a-concert-at-night-1387174/</a>
      </li>
    </ul>
  </div>
</body>

</html>