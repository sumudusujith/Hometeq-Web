<?php
$pagename="Login";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page
echo "<form action=login_process.php method=POST>";	
    echo "<table border=0>";
    echo "<tr>";
    echo "<td>*Email : </td>";    
    echo "<td><input type='text' id='email' name='email'></td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>*Password : </td>";
    echo "<td><input type='password' id='password' name='password'></td>";
    echo "</tr>";
    echo "<th><input type=submit name=lbutton value='Login'></button></th>";
    echo "<th><input type=submit name=cbutton value='Clear Login'></button></th>";
    echo "</table>";
    //echo "<input type=hidden name='S_prodid' value=".$index.">";	
echo "</form>";

include("footfile.html");//include head layout
echo "</body>";
?>