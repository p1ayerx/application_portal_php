<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="img/icon.png">
  <title>Confirmation</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Confirmation</h1>
    <p>
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>
    <a href="application.php"><button class="button button-block"/>Back</button></a>
    <a href="apply.php"><button class="button button-block"/>Confirm</button></a>
</div>
</body>
</html>
