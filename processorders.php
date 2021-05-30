<?php
include("db.php");
$pagename="Process Orders"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";//Call in stylesheet
echo "<title>".$pagename."</title>";//display name of the page as window title
echo "<body>";
include ("headfile.html");//include headerlayoutfile
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>";//display name of thepageon the web page

if(isset($_POST['status'])){   
    $ostate = $_POST['status'];
    $oid = $_POST['ordId'];     
    mysqli_query($GLOBALS['conn'],"UPDATE orders SET orderStatus='$ostate' 
    WHERE orderNo=$oid");
    displayTable();         
}else{
    displayTable();           
}
function displayTable(){
    echo "<table>";
    echo "<tr>";
        echo "<th>Order</th>";
        echo "<th>Order Date Time</th>";
        echo "<th>User Id</th>";
        echo "<th>Name</th>";
        echo "<th>Surname</th>";
        echo "<th>Status</th>";
        echo "<th>Product</th>";
        echo "<th>Quantity</th>";              
    echo"</tr>";
    
    $SQL="select * from orders";
    $exeSQL=mysqli_query($GLOBALS['conn'], $SQL) or die (mysqli_error());
    while($arrayp=mysqli_fetch_array($exeSQL)){
        echo"<tr>";
        echo "<td><b>No:".$arrayp['orderNo']."</b></td>";
        echo "<td>".$arrayp['orderDateTime']."</td>";
        echo "<td>".$arrayp['userId']."</td>";
        $uId =$arrayp['userId'];
        $SQL2="select userFName,userSName  from users where userId=$uId";
        $exeSQL2=mysqli_query($GLOBALS['conn'], $SQL2) or die (mysqli_error());
        $arrayp2=mysqli_fetch_array($exeSQL2);            
        echo "<td>".$arrayp2['userFName']."</td>";
        echo "<td>".$arrayp2['userSName']."</td>";
        $status=$arrayp['orderStatus'];  

        echo "<form action=processorders.php method=POST>";
        $ordId=$arrayp['orderNo'];                
        if($status=="Placed"){
            echo "<td><select name=status>";	
                echo "<option value='Placed'>Placed</option>";
                echo "<option value='Ready'>Ready to collect</option>";			
            echo "</select>";            
            echo "<input type=hidden name=ordId value=$ordId>";
            echo "<input type=submit name=submit value='Update'></td>";                
        }else if($status=="Ready"){
            echo "<td><select name=status>";	                        
                echo "<option value='Ready'>Ready to collect</option>";
                echo "<option value='Collected'>Collected</option>";			
            echo "</select>";                    
            echo "<input type=hidden name=ordId value=$ordId>";
            echo "<input type=submit name=submit value='Update'></td>";            
        }else if($status=="Collected"){
            echo "<td>".$status."</td>";
        }
        echo "</form>";            
            
        $ordNo = $arrayp['orderNo'];
        $SQL3="select prodId,quantityOrdered  from order_line where orderNo=$ordNo";
        $exeSQL3=mysqli_query($GLOBALS['conn'], $SQL3) or die (mysqli_error());  
        $count=0;                        
        while($arrayp3=mysqli_fetch_array($exeSQL3)){
            $pId=$arrayp3['prodId'];
            $SQL4="select prodName from product where prodId=$pId";
            $exeSQL4=mysqli_query($GLOBALS['conn'], $SQL4) or die (mysqli_error());
            $arrayp4=mysqli_fetch_array($exeSQL4);                                
            if($count>0){
                echo "<td colspan='6'></td>";
                echo "<td>".$arrayp4['prodName']."</td>";
                echo "<td>".$arrayp3['quantityOrdered']."</td>";                        
            }else{
                echo "<td>".$arrayp4['prodName']."</td>";
                echo "<td>".$arrayp3['quantityOrdered']."</td>";
            }                    
            $count=$count+1;
            echo"</tr>";
        }
        echo"</tr>";
    }             
echo "</table>";
}
		
include("footfile.html");//include head layout
echo "</body>";

?>