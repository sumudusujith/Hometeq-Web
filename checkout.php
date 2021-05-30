<?php
include ("db.php");
$pagename="Your Login Results";       //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<link rel=stylesheet type=text/css href=mystylesheet2.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page
//display random text
date_default_timezone_set('Asia/Colombo');
$currentdatetime = date('Y-m-d H:i:s');
if(isset($_SESSION['userId'])){
    $userid = $_SESSION['userId'];
    $null = 0.00;
    $output = "'".$_SESSION['userId']."','".$currentdatetime."'";
    mysqli_query($conn,"INSERT INTO orders (orderNo,userId,orderDateTime,orderTotal,orderStatus) VALUES (NULL,$output,NULL,'Placed')");  
    
    $SQL="select MAX(orderNo) as lastorder from orders where userId=$userid";
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
    $arrayord=mysqli_fetch_array($exeSQL);	
    $orderno = $arrayord["lastorder"];
    echo "<b>Order has been placed successfully<b> - ORDER REFERENCE NO: ".$orderno."<br>";
    
    $subtotoal=0;
    $total=0;
    if(isset($_SESSION['basket'])){
        echo "<table>";
        echo "<tr>";
            echo "<th>Product Name</th>";
            echo "<th>Price</th>";
            echo "<th>Quantity</th>";
            echo "<th>Subtotal</th>";
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
            echo"</tr>"; 
            $output2 = "'".$orderno."','".$index."','".$value."','".$subtotal."'";
            mysqli_query($conn,"INSERT INTO order_line (orderLineId,orderNo,prodId,quantityOrdered,subTotal) VALUES (NULL,$output2)");  
     			
            $total=$total+$subtotal;
            $subtotal=0;
        }
        echo "<tr>";
            echo "<th colspan='3'>Total</th>";
            echo "<th>$".$total."</th>";
        echo"</tr>";
        echo"</table>";
    }
    mysqli_query($conn,"UPDATE orders SET orderTotal=$total WHERE orderNo=$orderno");  
    

    mysqli_close($conn);
}


                        
include("footfile.html");//include head layout
echo "</body>";
?>