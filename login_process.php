<?php
include("db.php");
$pagename="Your Login Result";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet2.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page
if((isset($_POST['lbutton']))and (!empty($_POST['email']))and (!empty($_POST['password']))){
    $email=$_POST['email'];
    $password=$_POST['password'];    
      
    if (!mysqli_query($conn,"INSERT INTO users (userEmail) VALUES ($email)")) {            
        $test=mysqli_errno($conn);        
        if($test==1064){                        
            $SQL="select userId,userType,userFName,userSName,userPassword from users where userEmail='$email'";
            $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
            $arrayp=mysqli_fetch_array($exeSQL);	
            if($arrayp["userPassword"]==$password){
                echo "Hello, ".$arrayp["userFName"]." ".$arrayp["userSName"]."<br>";
                if($arrayp['userType']=="C"){
                    $_SESSION['user_type']="Customer";
                    echo "You have successfully logged in as a hometeq Customer<br>";
                    echo "Continue shopping for <a href=view.php>Home Tech</a><br>";
                    echo "View your <a href=basket.php>Smart Basket"; 
                    echo "<br><a href=message.php>Message</a><br>";              
                }else if($arrayp['userType']=="A"){
                    $_SESSION['user_type']="Administrator";
                    echo "You have successfully logged in as a hometeq Administrator<br>";                    
                    echo "<a href=view.php>Home Tech</a><br>"; 
                    
                    echo "<br><a href=message.php>Message</a><br>";               
                }                                        
                $_SESSION['name']=$arrayp["userFName"]." ".$arrayp["userSName"];
                $_SESSION['userId']=$arrayp["userId"];
            }else{
                echo "The password you entered was not incorrect, ".$arrayp["userFName"]." ".$arrayp["userSName"]."<br><br>";                
                echo "Go back to <a href=login.php>login";           
            }	
        }else{
            echo "The email you entered was not recognized<br><br>";
            echo "Go back to <a href=login.php>login";
        }
    }    
    mysqli_close($conn);                
}else{
    echo "Your login form is incomplete<br>";
    echo "Make sure you provide all the required details<br><br>";
    echo "Go back to <a href=login.php>login";
}
include("footfile.html");//include head layout
echo "</body>";
?>