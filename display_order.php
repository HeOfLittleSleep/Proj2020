<?php

	// get the data from the form list box
    $prod_Name = $_POST['productdropdown'];

	// get the data from the form Checked boxes
    $cpus = $_POST['CPUs'];
    $ram = $_POST['RAM'];
    $sticker = isset($_POST['sticker']);

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

		<br />
		<section>
		<div id="order">
			<?php 
				echo "Ordered ".$prod_Name." with ".$cpus; 
				$message = "";
				
				if(!empty($sticker)) 
				{
					$message = $message . ", ".$ram." of RAM, and a Cpt Serverbeard sticker."; 
				}
				else
				{
					$message = $message . " and ".$RAM." of RAM."; 
				}
				
				echo $message;
			?>
			
		</div>
		</section>
		<footer>
			Stacks O' Servers Llc &#8226; 
			578 Rocket Drive, Minneapolis MN &nbsp; 55402 &#8226;
			612-873-0050 &#8226;
			pottert140065@nicc.edu
		</footer>
   </body>
</html>	