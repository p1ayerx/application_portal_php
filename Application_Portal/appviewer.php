<?php
/* Displays user information and some useful messages */
session_start();
include 'db.php';
// Check if user is logged in using the session variable
/*
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $hash = $_SESSION['hash'];
    $active = $_SESSION['active'];
}
*/
?>
<!DOCTYPE html>
<html >
<head>
  <link rel="icon" href="img/icon.png">
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name.' '.$last_name ?></title>
  <?php include 'css/css.html'; ?>
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>

          <?php
          /*
          $data = $mysqli->query("SELECT * FROM accounts");

          $user = $data->fetch_assoc();

          echo $user['id'];
          */

          echo '<select name="dropdown">';
          $data = $mysqli->query("SELECT * FROM accounts");

          while ($user = $data->fetch_assoc()) {
            echo '<option value="'.$user['hs'].'">'.$user['hs'].'</option>';
          }

          echo '</select>';



           ?>

          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
