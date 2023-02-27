<?php

require("./db.php");

if(isset($_SESSION['user_id'])){
	
	// $user_id = $_SESSION['user_id'];

	// $sql = "SELECT wishlist.id, product.id AS pid, product.title, product.price, product_media.image_name FROM wishlist JOIN product ON product.id = wishlist.product_id JOIN product_media on product_media.product_id = wishlist.product_id WHERE wishlist.user_id = :user_id";

	// $query = $dbh->prepare($sql);
	// $query->bindParam(':user_id', $user_id, PDO::PARAM_STR);
	// if($query->execute()){
	// 	$result = $query->fetchAll(PDO::FETCH_OBJ);
	// }
	// else{
	// 	$result = [];
	// }
	$result = mysqli_query($conn,"SELECT wishlist.id, product.id AS pid, product.title, product.price, product_media.image_name FROM wishlist JOIN product ON product.id = wishlist.product_id JOIN product_media on product_media.product_id = wishlist.product_id WHERE wishlist.user_id = '$user_id'");
}
?>

<div id="cd-shadow-layer"></div>

<div id="cd-cart">
    <div class="sidebar">
		<?php 
		if(isset($_SESSION['user_id'])){ 		
		?>
	    <ul class="cd-cart-items">
            <?php
			if(mysqli_num_row($result)){
           		while($row = $result->fetch_assoc()){
           		    $id = $row['id'];
           		    $pid = $row['pid'];
           		    $image = $row['image_name'];
           		    $price = $row['price'];
           		    $name = $row['title'];
            ?>
		    <li id="<?php echo $id; ?>"class="cd-cart-item">
				<div class="container" style="display: flex; height: 125px; position:relative; overflow: hidden;" >
					<div class="cd-cart-item-left"  >
						<img src="admin_panel/uploads/products/<?php echo $image;?>" alt="Product Image  ;">
					  </div>
					  <div class="cd-cart-item-right" >
						<h4 class="cd-cart-item-name"><?php echo $name; ?></h4>
						<div class="cd-price">RS. <?php echo $price; ?></div>
						<div class="cd-quantity">
						  <input type="button" onclick="moveToCart(<?php echo $id; ?>)" value="Move to Cart" class="move" id="1" style="padding: 5px 5px; height: 41px; background-color: #ffffff; border: 1px solid #000; cursor:pointer;">
						  <input type="button" onclick="removeWish(<?php echo $id; ?>)" value="Remove" class="remove" id="1021" style="padding: 5px 5px; height: 41px; background-color: #ffffff; border: 1px solid #000; cursor:pointer;">
						</div>
					</div>
				</div>
			</li>
            <?php
            	}
			}else{
            ?>
			<p>You haven't added anything to Wishlist yet.</p>
           	<p>
              	Continue browsing and wishlist products.
           	</p>
			<?php
			}
			?>
		</ul>
		<?php
		}else{
		?>
		<div style="vertical-align:middle; padding-top: 40vh;">
           	<p>You haven't logged in yet.</p>
           	<p>
               Please Login to continue.
           	</p>
           	<p>
            	<a class='btn btnVelaOne' href='./login-page.php' title='Go to Shopping'>
                   Login
               	</a>
           </p>
    	</div>
		<?php
		}
		?> 
    </div>
</div>