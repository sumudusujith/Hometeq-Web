<?php
include("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet2.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page

//deleting one single item
if(isset($_POST['button'])){
    $delprodid=$_POST['S_prodid']; 
	echo "<p>".$delprodid."</p>";
    unset($_SESSION['basket'][$delprodid]);
	echo "<p>Item has been deleted</p>";        
}

//Creating SESSION by adding the id and the qty
if(isset($_POST['submit'])){
    $newprodid=$_POST['h_prodid'];
    $reququantity=$_POST['qty'];   	
	$_SESSION['basket'][$newprodid]=$reququantity;	    
}else{
    echo "<p> Current basket unchanged </p>";
}

$subtotoal=0;
$total=0;
if(isset($_SESSION['basket'])){
	echo "<table>";
	echo "<tr>";
		echo "<th>Product Name</th>";
		echo "<th>Price</th>";
		echo "<th>Quantity</th>";
		echo "<th>Subtotal</th>";
		echo "<th></th>";
	echo"</tr>";
	
    foreach($_SESSION['basket'] as $index => $value){
        $SQL="select prodName,prodPrice from Product where prodId=$index";
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
        $arrayp=mysqli_fetch_array($exeSQL);
		echo "<tr>";
			echo "<th>".$arrayp["prodName"]."</th>";
			echo "<th>$".$arrayp["prodPrice"]."</th>";
			echo "<th>".$value."</th>";
			$subtotal=$arrayp["prodPrice"]*$value;	
			echo "<th>$".$subtotal."</th>";
			
			echo "<form action=basket.php method=POST>";
				echo "<th><input type=submit name=button value='Remove'></button></th>";
				echo "<input type=hidden name='S_prodid' value=".$index.">";	
			echo "</form>";
		echo"</tr>";  			
		$total=$total+$subtotal;
		$subtotal=0;
    }
	echo "<tr>";
		echo "<th colspan='3'>Total</th>";
		echo "<th>$".$total."</th>";
		echo "<th></th>";
	echo"</tr>";
	echo"</table>";
}else{
	
}
echo "<a href=clearbasket.php>Clear Basket</a>";
if(isset($_SESSION['userId'])){
	echo "<br><br>";
	echo "To finalise your order: <a href=checkout.php>Checkout</a>";
}else{
	echo "<p>New Hometeq customers : <a href=signup.php>Signup</a></p>";
	echo "<p>Returning Hometeq customers : <a href=login.php>Login</a></p>";
}

include("footfile.html");//include head layout
echo "</body>";
?>