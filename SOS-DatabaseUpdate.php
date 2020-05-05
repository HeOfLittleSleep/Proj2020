<?php
require_once('database.php');

// get the data that will be sent to the database
$custname = $_POST['custname'];
$custaddress = $_POST['custaddress'];
$custaddress2 = $_POST['custaddress2'];

$ordernumber = uniqid();

// gets required data from session and updates orderline
$item = array(
		'ProductName' => $products[$key]['ProductName'],
		'Price' => $Price,
		'qty'  => $quantity,
		'total' => $total,
		'ProductNum' => $productnum
    );


?>
// update database entries



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
			<p>your order has been processed. Thank you for shopping with us!<p/>
			<?php foreach( $_SESSION['cart'] as $key => $item ) :
				echo $productnum;
			?>
			<?php endforeach; ?>
		</article>
		<footer>
			Stacks O' Servers Llc &#8226; 578 Rocket Drive, Minneapolis MN &nbsp; 55402 &#8226; 612-873-0050 &#8226; pottert140065@nicc.edu
		</footer>
	</body>

</html>