<?php
    $dbhost = 'phpmyadmin.ecs.westminster.ac.uk';
    $dbuser = 'w1790114';
    $dbpass = '2F1kDjRfelCu';
    $dbname = 'w1790114_0';
    
    //Creating DB Connection
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    
    if (!$conn){
        die('Could not connect: ' . mysqli_error($conn));
    }
    //select the database
    mysqli_select_db($conn, $dbname);
?>