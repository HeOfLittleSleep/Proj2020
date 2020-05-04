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
					<li><a href="SOS-OrderForm.php">Order</a></li>
				</ul>
			</nav>
		</header>

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
			?>
			
		</div>
		</section>
		
		     <footer>
         <address>
            The Little Coffee Hut &nbsp;&nbsp;&nbsp;
            601 Elkhart Avenue &nbsp;&nbsp;&nbsp;
            Peosta, IA 52068 &nbsp;&nbsp;&nbsp;
            1 (800) 556-5110 &nbsp;&nbsp;&nbsp;
         </address>
      </footer>
   </body>
</html>	