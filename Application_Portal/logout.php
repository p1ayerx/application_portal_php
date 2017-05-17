<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="img/icon.png">
  <meta charset="UTF-8">
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>

<body>
    <div class="form">
          <center><h1><img rel="logo" src="img/logo.gif" height="150" width="200"></h1></center></h1>

          <p><?= 'You have been logged out!'; ?></p>

          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
