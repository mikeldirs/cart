<?php 
 
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		 
		$id=intval($_GET['id']); 
		 
		if(isset($_SESSION['cart'][$id])){ 
			 
			$_SESSION['cart'][$id]['quantity']++; 
			 
		}else{ 
			 
			$sql_s="SELECT * FROM products 
WHERE id_product={$id}"; 
			$query_s=mysql_query($sql_s); 
			if(mysql_num_rows($query_s)!=0){ 
				$row_s=mysql_fetch_array($query_s); 
				 
				$_SESSION['cart'][$row_s['id_product']]=array( 
						"quantity" => 1, 
						"price" => $row_s['price'] 
					); 
				 
				 
			}else{ 
				 
				$message="This product id it's invalid!"; 
				 
			} 
			 
		} 
		 
	} 
 
?>
