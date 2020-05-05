<?php
    require_once('database.php');

    // Set product ID

     $ProdductNum = 1;

    // Get all product
    $query = "SELECT * FROM productinfo";
    $productinfo = $db->query($query);
	$products = $productinfo->fetchAll();
?>

<!DOCTYPE html>
<html>

	<head>
		<!--
		General Information about Stacks O' Servers Llc
		Author: Timothy Potter
		Date: No thanks, I'm not into computers that way.
		-->
		<meta charset="utf-8" />
		<meta name="keywords"
		 content="used, servers, free, mp3, you, won't, believe, what, happens, next, optional ram" />
		<title>Stacks o' Servers</title>
		<link href="Pencils_base.css" rel="stylesheet"/>
		<link href="Pencils_layout2.css" rel="stylesheet"/>
	</head>

	<body>
		<header>
			<a href="index.html" style="text-decoration: none;"><h1>STACKS O' SERVERS</h1></a>
			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="SOS_AboutContact.html">About/Contact info</a></li>
					<li><a href="SOS-Inventory.php">Inventory</a></li>
					<li><a href="SOS-Order.php">Order</a></li>
				</ul>
			</nav>
		</header>
		<article>
			<h1>Order Form</h1>
			
			<!-- displays a form for ordering the procucts -->
			<form action="SOS-Order.php" method="post">
				<input type="hidden" name="action" value="add"/>
			
				<label>Select Product</label>
				<div id="data">
				
				<select name="productdropdown">
                <?php foreach ($products as $key => $product) : 
					$Price = number_format($product['Price'], 2);
                    $name = $product['ProductName'];
                    $item = $name . ' ($' . $Price . ')';
				?>

				<option value="<?php echo $key; ?>">
                    <?php echo $item; ?>
                </option> 	
				<?php endforeach; ?>

				</select>
				</div>
				
				<br />
				
				<label>Quantity:</label>
				<select name="itemqty">
                <?php for($i = 1; $i <= 10; $i++) : ?>
                    <option value="<?php echo $i; ?>">
                        <?php echo $i; ?>
                    </option>
                <?php endfor; ?>
                </select><br /><br><br>
				
				
				<div id="buttons">
					<label>&nbsp;</label>
					<input type="submit" value="Add Item" /><br />
				</div>
			</form>
			<p><a href="SOS-Order.php?action=show_cart">View Cart</a></p>			
		</article>
		<footer>
			Stacks O' Servers Llc &#8226; 
			578 Rocket Drive, Minneapolis MN &nbsp; 55402 &#8226;
			612-873-0050 &#8226;
			pottert140065@nicc.edu
		</footer>
	</body>

</html>