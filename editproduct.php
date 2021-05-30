<?php
include("db.php");
$pagename="View & Edit Product";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet2.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page

if(isset($_POST['submit'])){		
	$pId = $_POST['h_prodid'];
	//echo $qty;
	$SQL2="select * from Product where prodId=$pId";
	$exeSQL2=mysqli_query($GLOBALS['conn'], $SQL2) or die (mysqli_error());
	$arrayd=mysqli_fetch_array($exeSQL2);
	$fqty = $_POST['qty'];
	if(isset($_POST['qty']) and isset($_POST['price'])){
		$qty = 	$arrayd['prodQuantity']+$_POST['qty'];
		$price = $_POST['price'];
	}else if(!(isset($_POST['qty']) or isset($_POST['price']))){
		$qty = 	$arrayd['prodQuantity'];
		$price = $arrayd['prodPrice'];
	}	
	echo $pId;			
    mysqli_query($GLOBALS['conn'],"UPDATE product SET prodPrice=$price, prodQuantity=$qty
	WHERE prodId=$pId"); 	
}

$SQL="select * from Product";
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());

echo "<table style='border: 0px'>";//create an array of records (2 dimensional variable) called $arrayp.
//extra &nbsp;&nbsp; space
while ($arrayp=mysqli_fetch_array($exeSQL))
{
	echo "<tr>";
	echo "<td style='border: 0px'>";
	echo "<form action=editproduct.php method=POST>";
		echo "<a href=view.php?u_prod_id=".$arrayp['prodId'].">";	
		echo "<img src=images/".$arrayp['prodPicNameSmall']." height=200 width=200>";
		echo "</a>";
		echo "</td>";
		echo "<td style='border: 0px'>";
		echo "<p><h5>".$arrayp['prodName']."</h5>";		
		echo "<p>".$arrayp['prodDescripShort']."</p>";
	
		echo "<p>Current Price : <b>$".$arrayp['prodPrice']."</b>";
		echo "&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;New Price : <input size=10% type='text' id='price' name='price'></p>";
		echo "<p>Current Stock : <b>".$arrayp['prodQuantity']."</b>";
		echo "&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Add number of items : ";
		
		echo "<select name=qty> product quantity";	
		for ($value = 1; $value <= $arrayp['prodQuantity']; $value++) {		
			echo "<option value=$value>".$value."</option>";
			$count=$count+1;
		}			
		echo "</select></p>";
		echo "<input type=hidden name=h_prodid value=".$arrayp['prodId'].">";
		echo "<p><input type=submit name=submit value='Update'></p>";
	echo "</form>";
	echo "</td>";
	echo "</tr>";
}
echo "</table>";


include("footfile.html");//include head layout
echo "</body>";
?>