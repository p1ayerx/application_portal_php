<?php
require 'db.php';
session_start();

        //Get user email
        $email=$_SESSION['email'];

        //$(sqldb name) = $mysqli->escape_string($_POST['name'])
        $name = $mysqli->escape_string($_POST['name']);
        $furigana = $mysqli->escape_string($_POST['furigana']);
        $gender = $mysqli->escape_string($_POST['gender']);
        $birthday = $mysqli->escape_string($_POST['birthday']);
        $hs = $mysqli->escape_string($_POST['hs']);
        $grade = $mysqli->escape_string($_POST['grade']);
        $uni = $mysqli->escape_string($_POST['uni']);
        $abroad = $mysqli->escape_string($_POST['abroad']);
        $how = $mysqli->escape_string($_POST['how']);
        $scores = $mysqli->escape_string($_POST['scores']);
        $ec = $mysqli->escape_string($_POST['ec']);
        $ds = $mysqli->escape_string($_POST['ds']);
        $prompt = $mysqli->escape_string($_POST['prompt']);
        $ee = $mysqli->escape_string($_POST['ee']);
        $je = $mysqli->escape_string($_POST['je']);
        $se1 = $mysqli->escape_string($_POST['se1']);
        $se2 = $mysqli->escape_string($_POST['se2']);
        $supp = $mysqli->escape_string($_POST['supp']);


        $sql = "UPDATE accounts SET name='$name', furigana='$furigana', gender='$gender', birthday='$birthday', hs='$hs', grade='$grade', uni='$uni', abroad='$abroad', how='$how', scores='$scores', ec='$ec', ds='$ds', prompt='$prompt', ee='$ee', je='$je', se1='$se1', se2='$se2', supp='$supp' WHERE email='$email'";

        //Insert data into sql

        //sends email for backup
        $to      = $email;
        $headers = "MIME-Version: 1.0"."\r\n";
        $headers ="From: apply@ryu-fellow.org\r\n";
        $subject = $first_name ;
        $message_body = '
        '.$first_name.' '.$last_name.'

        '.$name.'
        '.$furigana.'
        '.$gender.'
        '.$birthday.'
        '.$hs.'
        '.$grade.'
        '.$uni.'
        '.$abroad.'
        '.$how.'
        '.$scores.'
        '.$ec.'
        '.$ds.'
        '.$prompt.'
        '.$ee.'
        '.$se1.'
        '.$se2.'
        '.$supp.'

        ';
        mail( $to, $subject, $message_body );


        //Return Success or error
        if($mysqli->query($sql)){
          $_SESSION['message'] = 'Saved!';
          header ("location: application.php");
        }else{
          $_SESSION['message'] = 'Failed to save';
          header ("location: error.php");
        }

?>
