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
				</ul>
			</nav>
		</header>
		<article>
			<h1>Inventory</h1>
			
			<!-- display a table of products -->
            <table align="center">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity On Hand</th>
					<th>Price</th>
					<th>Device Type</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach ($productinfo as $productinfo) : ?>
                <tr>
                    <td><?php echo $productinfo['ProductName']; ?></td>
                    <td><?php echo $productinfo['QuantityAvail']; ?></td>
                    <td><?php echo "$".number_format($productinfo['Price'], 2); ?></td>  
					<td><?php echo $productinfo['ProductType']; ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
		</article>
		<footer>
			Stacks O' Servers Llc &#8226; 578 Rocket Drive, Minneapolis MN &nbsp; 55402 &#8226; 612-873-0050 &#8226; pottert140065@nicc.edu
		</footer>
	</body>

</html>