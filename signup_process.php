<?php
session_start();
include("db.php");
$pagename="Your Sign Up Results";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page
if(isset($_POST['sbutton'])){
    $type="C";
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $address=$_POST['address'];
    $postcode=$_POST['postcode'];
    $telno=$_POST['telno'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    if(empty($fname)or empty($lname)or empty($address)or empty($postcode)or empty($telno)or empty($telno)or empty($email)or empty($password)or empty($password)){
        echo "Your signup form is incomplete and all fields are mandatory<br>";
        echo "Make sure you provide all the required details<br><br>";
        echo "Go back to <a href=signup.php>sign up";
    }else{
        if($password==$password2){
            if(preg_match("/\b@\b/", $email, $match)){
                $output="'".$type."','".$fname."','".$lname."','".$address."','".$postcode."','".$telno."','".$email."','".$password."'";  

                if (!mysqli_query($conn,"INSERT INTO users (userEmail) VALUES ($email)")) {
                    $test=mysqli_errno($conn);
                    if($test==1062){
                        echo "Email already in use<br>";
                        echo "You may be already registered or try another email address<br><br>";
                        echo "Go back to <a href=signup.php>sign up";
                    }else{
                        $sql = "INSERT INTO users (userId,userType,userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword)        
                        VALUES (NULL,$output)";   
                        if (mysqli_query($conn, $sql)) {
                            echo "<b>Sign-up successful!</b><br>";
                            echo "To continue,please <a href=login.php>login";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                        mysqli_close($conn);                   
                    }
                }
            }else{
                echo "Email not valid<br>";
                echo "Make sure you enter a correct email address<br><br>";
                echo "Go back to <a href=signup.php>sign up";
            }                       
        }else{
            echo "The 2 passwords are not matching<br>";
            echo "Make sure you enter them correctly<br><br>";
            echo "Go back to <a href=signup.php>sign up";
        }        
    }
    
    //$_SESSION['basket'][$newprodid]=$reququantity;	    
}else{
    echo "<p> Enter your SignUp details </p>";
}

include("footfile.html");//include head layout
echo "</body>";
?>