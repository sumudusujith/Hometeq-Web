<?php
include ("db.php");
$pagename="Message";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet(hover).css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page

if(isset($_POST['del_button'])){
    $delmsgid=$_POST['S_prodid']; 	
    mysqli_query($GLOBALS['conn'],"DELETE FROM messgae WHERE messageId=$delmsgid");      		       
}
if(isset($_POST['send_button'])){    
    $output1 = "".$_SESSION['senderid'].",".$_SESSION['receiverId'].",'".$_POST['message']."'";
    mysqli_query($GLOBALS['conn'],"INSERT INTO messgae (messageId,senderId,receiverId,message) VALUES (NULL,$output1)");      		
}

if(isset($_GET['rid'])){    
    $_SESSION['receiverId']=$_GET['rid'];   
    $rid = $_SESSION['receiverId'];       
    displayMsg($rid);    
}else if(isset($_SESSION['receiverId'])){
    $rid=$_SESSION['receiverId'];
    displayMsg($rid);    
}

function newMsg($rid,$sid){ 
    echo "<align='right'><form action=message_process.php method=POST>";
        echo "<input  type='text' id='message' size='80%' name='message' placeholder='type a message'>";
        echo "<th><input type=submit name=send_button value='Send'></button></th>";	
    echo "</form>";
}
function displayMsg($rid){ 
    echo "<span>oii</span>";
    echo "<div id='hover1'>yako</div>";

    $SQL="select userFName,userSName,userType from users where userId=$rid";
    $exeSQL=mysqli_query($GLOBALS['conn'], $SQL) or die (mysqli_error());
    $arrayd=mysqli_fetch_array($exeSQL);
    if($arrayd['userType']=="A"){
        $type="Administrator";
    }else if($arrayd['userType']=="C"){
        $type="Customer";
    }	
    echo "<b>".$arrayd['userFName']." ". $arrayd['userSName']."</b> (".$type.")"; 
    
    echo "<table width=100%>";
    $sid=$_SESSION['userId'];
    $SQL2="select messageId,senderId,message from messgae where (senderId=$sid AND receiverId=$rid) OR (senderId=$rid AND receiverId=$sid) order by messageId ASC";
    $exeSQL2=mysqli_query($GLOBALS['conn'], $SQL2) or die (mysqli_error());
    while($arrayp=mysqli_fetch_array($exeSQL2)){
        if($arrayp['senderId']==$sid){
            echo "<tr>";
            echo "<td><p align='right'>".$arrayp['message']."</p></td>";
            $msgId=$arrayp['messageId'];
            echo "<form action=message_process.php method=POST>";
				echo "<th width=10%><input type=submit name=del_button value='Delete Msg'></button></th>";
				echo "<input type=hidden name='S_prodid' value=".$msgId.">";	
                echo "</tr>";
            echo "</form>";
            
        }else{
            echo "<tr>";
            //echo "";
            echo "<td>".$arrayp['message']."</td>";
            //echo "";           
            
            echo "</tr>";
            echo "<div id='hover1'>yako</div>";
            
        }        
    }    
    echo "</table>";
    $_SESSION['senderid']=$sid;
    newMsg($rid,$sid);     
}
include("footfile.html");
echo "</body>";

?>