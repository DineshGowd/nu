<?php
function navigation()
{
    echo '<nav>
    <div class="nav_logo"> <img src="./assets/images/logo.jpg" alt="website logo"></div>
    <div class="nav_links">
      <span class="nav_linkitems"><a href="./index.php"> Home</a></span>
      <span class="nav_linkitems"><a href="./about.php"> About</a></span>
      <span class="nav_linkitems"><a href="./events.php"> Events</a></span>
      <span class="nav_linkitems"><a href="./wireframes.php"> WireFrames</a></span>
      <span class="nav_linkitems"><a href="./credits.php"> Credits</a></span>';
      if (isset($_SESSION["logged_in"])) {
        echo '<form action="logout.php" style="display:flex" method="post">
                        <button type="submit" class="nav_linkitems nav_logoutbtn">Logout</button>
                    </form>';
      } else {
        echo  '<span class="nav_linkitems"><a href="./createCustomer.php"> Signup</a></span>
                <span class="nav_linkitems"><a href="./customerLogin.php"> Login</a></span>';
      }
   echo '</div>
  </nav>';
}

function my_function_with_html2()
{
    $html = "<h1>This is HTML from a function</h1>";
    return $html;
}
