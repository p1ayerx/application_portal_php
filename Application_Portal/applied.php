<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="img/icon.png">
  <title>Applied</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="form">
    <h1>Applied</h1>
    <p>
    <?php
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];

        $mysqli->query("UPDATE accounts SET submit='1' WHERE email='$email'" );

        
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>
    <a href="profile.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
