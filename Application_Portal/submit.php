<?php
require 'db.php';
session_start();

        //Get user email
        $email=$_SESSION['email'];

        //$(sqldb name) = $mysqli->escape_string($_POST['name'])
        $kyoutuu = $mysqli->escape_string($_POST['kyoutuu']);
        $caravan1 = $mysqli->escape_string($_POST['caravan1']);

        //Insert data into sql
        $sql = "UPDATE accounts SET kyoutuu = '$kyoutuu', caravan1='$caravan1' WHERE email = '$email' ";

        //Return Success or error
        if($mysqli->query($sql)){
          $_SESSION['message'] = 'Saved!';
          header ("location: application.php");
        }else{
          $_SESSION['message'] = 'Failed to save';
          header ("location: error.php");
        }

?>
