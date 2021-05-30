<?php
include("db.php");
$pagename="A smart buy for a smart home"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//retrieve the product id passed from previous page using the GET method and the $_GET superglobal variable
//applied to the query string u_prod_id
//store the value in a local variable called $prodid
$prodid=$_GET['u_prod_id'];
//display the value of the product id, for debugging purposes
$SQL="select prodId, prodName, prodPicNameLarge, prodDescripLong, prodPrice, prodQuantity from Product where prodId = $prodid";

$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
echo "<table style='border: 0px'>";
while ($arrayp=mysqli_fetch_array($exeSQL))
{

echo "<tr>";
echo "<td style='border: 0px'>";
//display the small image whose name is contained in the array

echo "<img src=images/".$arrayp['prodPicNameLarge']." height=300 width=500>";


echo "<td style='border: 0px'>";
echo "<p><h3 style = 'color:blue'>".$arrayp['prodName']."</h3></p>";
echo "<p>".$arrayp['prodDescripLong'];
echo "<br>";
echo "<br>";
echo "<b>".$arrayp['prodPrice']."</b>";
echo "<br>";
echo "<br>";
echo "Left in Stock : ".$arrayp['prodQuantity'];
echo "<br>";
echo "<br>";

echo "<p>Number to be purchased: ";
//create form made of one text field and one button for user to enter quantity
//the value entered in the form will be posted to the basket.php to be processed
echo "<form action=basket.php method=post>";
echo "<br>";
echo "<select name = 'p_quantity' width=5> ";
for($x=1; $x<=$arrayp['prodQuantity']; $x++){
    echo "<option value = $x "." ".$x." "."</option>";
}
echo "<input type=submit name='submitbtn' value='ADD TO BASKET' id='submitbtn'>";
echo "</select>";
echo"</form>";


//pass the product id to the next page basket.php as a hidden value


echo "</td>";
echo "</td>";
echo "</tr>";
}
echo "</table>";


include("footfile.html"); //include head layout
echo "</body>";