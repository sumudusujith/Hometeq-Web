<?php
$pagename="Make your home smart";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet2.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page
//display random text
if(isset($_SESSION['name'])){
    echo "Thank you, ".$_SESSION['name']."<br>";        
}else{
    echo "Thank you, <br>";
}
echo "You are now logged out";
session_unset();
session_destroy();
include("footfile.html");//include head layout
echo "</body>";
?>