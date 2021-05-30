<?php
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
    if(isset($_SESSION['name']) and isset($_SESSION['user_type']) and isset($_SESSION['userId'])){        
        if($_SESSION['user_type']=="Customer"){
            $utype="Customer No:";
        }else if($_SESSION['user_type']=="Administrator"){
            $utype="Administrator No:";
        }
        echo "<div id='header'>
             <h3>".$_SESSION['name']." / ".$utype." ". $_SESSION['userId']. "<h3>
            </div>";        
    }
?>