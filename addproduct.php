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

if(isset($_POST['sbutton'])){
    $pname=$_POST['pname'];
    // $_POST['spicname'];
    // $_POST['lpicname'];
    // $_POST['sdesc'];
    // $_POST['ldesc'];
    // $_POST['price'];
    // $_POST['qty'];
    if(empty($pname) or empty($_POST['spicname']) or empty($_POST['lpicname']) or empty($_POST['sdesc']) or empty($_POST['ldesc']) or empty($_POST['price']) or empty($_POST['qty'])){
        echo "Your Add Product form is incomplete and all fields are mandatory<br>";
        echo "Go back to <a href=addproduct.php>Add Product</a>";
    }else{
        $SQL="select prodName from Product";
        $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
        $contains=false;
        while($arrayp=mysqli_fetch_array($exeSQL)){
            if($arrayp['prodName']==$pname){
                $contains=true;
            }                    
        }
        if($contains==true){
            echo "Item is already in our database<br>";
            echo "try with another item<br>";
            echo "Go back to <a href=addproduct.php>Add Product</a>";          
           
        }else{
            $output = "'".$pname."','".$_POST['spicname']."','".$_POST['lpicname']."','".$_POST['sdesc']."','".$_POST['ldesc']."',".$_POST['price'].",".$_POST['qty'];
            mysqli_query($GLOBALS['conn'],"INSERT INTO product (prodId,prodName,prodPicNameSmall,prodPicnameLarge,prodDescripShort,prodDescripLong,prodPrice,prodQuantity)
            VALUES (NULL,$output)");                 
            echo "The product has been added<br>"; 
            echo "<p>Name of the small picture : ".$_POST['spicname']."</p>"; 
            echo "<p>Name of the large picture : ".$_POST['lpicname']."</p>";
            echo "<p>Short Description : ".$_POST['sdesc']."</p>";  
            echo "<p>Long Description : ".$_POST['ldesc']."</p>";
            echo "<p>Price : $ ".$_POST['price']."</p>";         
            echo "<p>Initial Quantity : ".$_POST['qty']."</p>";
        }        
    }
            
}else{
    echo "<form action=addproduct.php method=POST>";
    echo "<table>";
        echo "<tr>";
            echo "<th><li style='float: left'>Product Name</li></th>";  
            echo "<th><input style='float: left' size=100% type='text' id='pname' name='pname'></th>";  
        echo"</tr>";
        echo "<tr>";
            echo "<th><li style='float: left'>Small Picture Name</li></th>";
            echo "<th><input style='float: left' size=100% type='text' id='spicname' name='spicname'></th>";
        echo "</tr>";
        echo "<tr>";
            echo "<th><li style='float: left'>Large Picture Name</li></th>";
            echo "<th><input style='float: left' size=100% type='text' id='lpicname' name='lpicname'></th>";
        echo "</tr>";
        echo "<tr>";
            echo "<th><li style='float: left'>Short Description</li></th>";
            echo "<th><input style='float: left' size=100% type='text' id='sdesc' name='sdesc'></th>";
        echo "</th>";
        echo "<tr>";
            echo "<th><li style='float: left'>Long Description</li></th>";
            echo "<th><input style='float: left' size=100% type='text' id='ldesc' name='ldesc'></th>";
        echo "</th>";
        echo "<tr>";
            echo "<th><li style='float: left'>Price</li></th>";
            echo "<th><input style='float: left' size=10% type='text' id='price' name='price'></th>";
        echo "</th>";
        echo "<tr>";
            echo "<th><li style='float: left'>Intial Stock Quantity</li></th>";
            echo "<th><input style='float: left' size=10% type='text' id='qty' name='qty'></th>";
        echo "</th>";
        echo "<tr>";
            echo "<th><input style='float: left' type='submit' name=sbutton value='Add Product'></button></th>";
            echo "<th><input style='float: left' type='reset' name=rbutton value='Clear Form'></button></th>";
        echo "</th>";
    echo "</table>";
    echo "</form>";

}


		
include("footfile.html");//include head layout
echo "</body>";

?>