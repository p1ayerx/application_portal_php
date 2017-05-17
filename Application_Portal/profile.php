<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
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

          // Keep reminding the user this account is not active, until they activate
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link! <u> <b> Please check your junk mail folder!!! </u> </b>
              </div>';
          }

          ?>

          <h2><?php echo $first_name.' '.$last_name; ?></h2>
          <p><?= $email ?></p>

          <p class="application"><a href="application.php">留フェロ2017年応募書類</a><br>
          <u>Complete by 6/25/2017 JST 23:59</u></p>


          <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
