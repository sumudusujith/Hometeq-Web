<?php
include("db.php");
//echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";
$output='';
		if(isset($_POST['search'])) {
			$search = $_POST['search'];
			$search2 = preg_replace("#[^0-9a-z]#i","",$search);
			
			$SQL="SELECT * FROM product WHERE prodName LIKE '%$search2%'";
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());			
			
			
			$count = mysqli_num_rows($exeSQL);
			if($count == 0){
				$output = 'There was no search results !';
			}else{
				echo "<form action=search.php method=POST>";
					echo "<input type='text' name='search' placeholder='Search'>";
					echo "<button type='submit' name='submit' value='Search'>Search</button>";
				echo "</form>";

				echo "<form action=search.php method=POST>";
				echo "<select name=item>";
				while($arrayp=mysqli_fetch_array($exeSQL)){
					$pid=$arrayp['prodId'];
					echo "<option value=$pid>".$arrayp['prodName']."</option><br>";	
				}								
				echo "</select>";	
				echo "<input type=submit name=submit value='ADD TO BASKET'>";
				//pass the product id to the next page basket.php as a hidden value
				echo "<input type=hidden name=h_prodid value=".$pid.">";	
				echo "</form>";
			}				
			

		}
		if(isset($_POST['prodId'])){
			echo $_POST['prodId'];
			echo $_POST['h_prodid'];
		}
		if(!(isset($_POST['search']))){
			echo "<form action=search.php method=POST>";
				echo "<input type='text' name='search' placeholder='Search'>";
				echo "<button type='submit' name='submit' value='Search'>Search</button>";
			echo "</form>";
		}		
?>
