<?php
    require_once('database.php');

    // Set product ID

     $ProdductNum = 1;

    // Get all product
    $query = 'SELECT * FROM productinfo
              ORDER BY ProductNum';
    $productinfo = $db->query($query);
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
					<li><a href="SOS-OrderForm.php">Order</a></li>
				</ul>
			</nav>
		</header>
		<article>
			<h1>Order Form</h1>
			
			<!-- display a form for ordering the procucts -->
			<form action="display_order.php" method="post">
				<label>Please select a tea</label>
				<div id="data">
				
				<select name="productkey">
                <?php foreach ($products as $product) : ?>

				<option value="<?php echo $product['prod_Name']; ?>">
					<?php echo $product['prod_Name']; ?>
					</option> 	
				<?php endforeach; ?>					

					</select>
				</div>
				
				<br><br>
				
				<label>Please select your gift options below</label><br>
				<div id="gift">
					<input type="checkbox" name="box" checked="checked"/> 
						Boxed<br />
					<input type="checkbox" name="wrap"/> Gift Wrap<br />
					<input type="checkbox" name="tag"/> Gift Tag
				</div>
				
				<br><br>
				<div id="buttons">
					<label>&nbsp;</label>
					<input type="submit" value="Process Order" /><br />
				</div>	
			</form>	
		</article>
		<footer>
			Stacks O' Servers Llc &#8226; 
			578 Rocket Drive, Minneapolis MN &nbsp; 55402 &#8226;
			612-873-0050 &#8226;
			pottert140065@nicc.edu
		</footer>
	</body>

</html>