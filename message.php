<?php
    include ("db.php");    
    $pagename="Message";       //Create and populate a variable called $pagename
    echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
    echo "<title>".$pagename."</title>";//display name of the page as window title
    echo "<body>";
    include ("headfile.html");//include headerlayoutfile
    include ("detectlogin.php");
    echo "<h4>".$pagename."</h4>";//display name of thepageon the web page

    $sender=$_SESSION['userId'];
    $SQL2="select userId,userFName,userSName,userType from users";
    $exeSQL2=mysqli_query($GLOBALS['conn'], $SQL2) or die (mysqli_error());    
    while($arrayd=mysqli_fetch_array($exeSQL2)){
        if($arrayd['userType']=="A"){
            $type="Administrator";
        }else if($arrayd['userType']=="C"){
            $type="Customer";
        }	       

        echo "<a href=message_process.php?rid=".$arrayd['userId'].">";	
        echo "<b>".$arrayd['userFName']." ". $arrayd['userSName']."</b> (".$type.")<br>";
        echo "</a>";
    }

    $SQL="select receiverId,senderId from messgae where (senderId=$sender OR receiverId=$sender) order by messageId DESC";
    $exeSQL=mysqli_query($GLOBALS['conn'], $SQL) or die (mysqli_error());
    while($arrayp=mysqli_fetch_array($exeSQL)){
       
    
                     
    }

    include("footfile.html");
    echo "</body>";



    // if(isset($POST['rid'])){
    //     //$_SESSION['receiverId']=$_POST['rid'];
    //     echo "<form action=message_process.php method=POST>";
    //         echo "<p>ID selected :".$_POST['rid']."</p>";
    //         echo "<th><input type=submit name=button value='Are you sure'></button></th>";    
    //     echo "</form>";
    // }
    // echo "<form action=message_process.php method=POST>";
    //     echo "Receiver's ID : <input type='text' id='rid' name='rid'><br>";
    //     echo "<th><input type=submit name=button value='Search'></button></th>";	
    // echo "</form>";  
    
?>