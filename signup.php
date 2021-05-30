<?php
//session_start();
include("db.php");
$pagename="Sign Up";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page
echo "<form action=signup_process.php method=POST>";	
    echo "<table border=0 align='center'>";
    echo "<tr>";
    echo "<td>* First name</td>";
    echo "<td>: <input size='50%' type='text' id='fname' name='fname'><td>";
    echo "</tr>";
    echo "<tr height='35'>";
    echo "<td>* Last name</td>";
    echo "<td>: <input size='50%' type='text' id='lname' name='lname'><td>";
    echo "</tr>";    
    echo "<tr height='35'>";
    echo "<td>* Address</td>";
    echo "<td>: <input size='50%' type='text' id='address' name='address'><td>";
    echo "</tr>";    
    echo "<tr height='35'>";
    echo "<td>* Post Code</td>";
    echo "<td>: <input size='50%' type='text' id='postcode' name='postcode'><td>";
    echo "</tr>";    
    echo "<tr height='35'>";
    echo "<td>* Telephone no</td>";
    echo "<td>: <input size='50%' type='text' id='telno' name='telno'><td>";
    echo "</tr>";    
    echo "<tr height='35'>";
    echo "<td>* Email</td>";
    echo "<td>: <input size='50%' type='text' id='email' name='email'><td>";
    echo "</tr>";    
    echo "<tr height='35'>";
    echo "<td>* Password</td>";
    echo "<td>: <input size='50%' type='password' id='password' name='password'><td>";
    echo "</tr>";    
    echo "<tr height='35'>";
    echo "<td>* Confirm Password</td>";
    echo "<td>: <input size='50%' type='password' id='password2' name='password2'><td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td></td>";
    //echo "<td><input align='right' type=submit name=sbutton value='Submit'></button></td>";
    echo "</tr>";    
    echo "<td><input type=submit name=sbutton value='Submit'></button></td>";
    echo "<td><input type=submit name=sbutton value='Submit'></button></td>";
    //echo "<input type=hidden name='S_prodid' value=".$index.">";
    echo "</table>";	
echo "</form>";
		
include("footfile.html");//include head layout
echo "</body>";
?>