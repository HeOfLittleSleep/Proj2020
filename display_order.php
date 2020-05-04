/* <?php

	// get the data from the form list box
    $prod_Name = $_POST['productkey'];

	// get the data from the form Checked boxes
    $box = isset($_POST['box']);
    $wrap = isset($_POST['wrap']);
    $tag = isset($_POST['tag']);

?> */

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

		<section>
		<div id="order">
			<?php 
				echo "Ordered ".$prod_Name; 
				$message = "";
				if(!empty($box)) {
					$message = " with gift box ";
				}
				if(!empty($wrap)) {
					if(!empty($message)) {
						$message = $message . " and gift wrap"; 
				}	else { 
						$message = $message . " with gift wrap";
					}
				}
				if(!empty($tag)) {
					if(!empty($message)) {
						$message = $message . " and gift tag"; 
				}	else { 
						$message = $message . " with gift tag";
					}
				}
				if(!empty($message)) {
						$message = $message . "."; 					
						echo $message;
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