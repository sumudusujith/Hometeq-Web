<?php
session_start();
if (!isset($_SESSION['basket'])) {
    $_SESSION['basket'] = array();
}

include ("db.php");
$pagename="Your smart basket"; //Create and populate a variable called $pagename 
echo "<link rel=stylesheet type=text/css href=styles/styles.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>";
echo "<body>";
include ("header.php");
echo "<h4>".$pagename."</h4>";
//display name of the page as window title
//include header layout file
//display name of the page on the web page
//display random text

$newprodid = $_POST['h_prodid'];
$reququantity = $_POST['qty'];
$delprodid = $_POST['delprodid'];

if (isset($delprodid)){
    unset($_SESSION['basket'][$delprodid]);
}

if (isset($newprodid)) {
    array_push($_SESSION['basket'],array($newprodid,$reququantity));
    echo "<p>New Item Added</p>";
}else{
    echo "<p>Current basket unchaged</p>";
}

if (count($_SESSION['basket']) == 0){
    echo "<p>Empty Basket</p>";
}

?>

<table>
    <tr>
        <th>Product Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
        <th></th>
    </tr>

<?php
    
    $total = 0;
    $count = 0;
foreach ($_SESSION['basket'] as $item){

    $sql = "SELECT prodName, prodPrice FROM Product WHERE prodId=".$item[0];
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $total = $total+$row['prodPrice']*$item[1];
            echo "<tr>";
            echo "<td>".$row['prodName']."</td><td>".$row['prodPrice']."</td><td>".$item[1]."</td><td>".$row['prodPrice']*$item[1]."</td><td><form action='basket.php' method='post'><input type='hidden' name='delprodid' value='".$count."'><input type='submit' value='Remove'></form></td>";
            echo "</tr>";
            $count = $count +1;
        }
    }

   
    

} 
echo "<tr><td colspan='3'>Total</td><td>".$total."</td><td></td></tr>";
?>

</table>
<br>
<a href="clearbasket.php">CLEAR BASKET</a>
<p>New hometeq customers: <a href="signup.php">Sign Up</a></p>
<p>Returning hometeq customers: <a href="login.php">Login</a></p>
<?php
include("footer.php"); //include head layout
echo "</body>";
?>