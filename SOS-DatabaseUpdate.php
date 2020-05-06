<?php
session_start();
require_once('database.php');

// get the data that will be sent to the database
$custname = $_POST['custname'];
$custaddress = $_POST['custaddress'];
$custaddress2 = $_POST['custaddress2'];

$ordernumber = uniqid();

// gets required data from session and updates orderline
foreach ($_SESSION['cart'] as $item) 
{
	// add quantity and product number to respective arrays
	$quantityordered=array();
	$productordered=array();
	
	$quantityordered[] = $item['qty'];
	$productordered[]= $item['ProductNum'];
	
	// add record to the orderline table
	$query = "INSERT INTO orderline
                 (AmtOrdered, OrderNum, ProductNum)
			VALUES(:AmtOrdered, :OrderNum, :ProductNum)";
	$statement = $db->prepare($query);
	$statement->bindValue(':AmtOrdered', $item['qty']);
	$statement->bindValue(':OrderNum', $ordernumber);
	$statement->bindValue(':ProductNum', $item['ProductNum']);
	$statement->execute();
	$statement->closeCursor();
}

// add record of order to orderinfo table
$query = "INSERT INTO orderinfo
			 (Address, Address2, CustName, OrderNum, TotalPrice)
		VALUES(:Address, :Address2, :CustName, :OrderNum, :TotalPrice)";
$statement = $db->prepare($query);
$statement->bindValue(':Address', $custaddress);
$statement->bindValue(':Address2', $custaddress2);
$statement->bindValue(':CustName', $custname);
$statement->bindValue(':OrderNum', $ordernumber);
$statement->bindValue(':TotalPrice', $_SESSION['DBsubtotal']);
$statement->execute();
$statement->closeCursor();

// reduce QuantityAvail by AmtOrdered for each respective product

$i = 0;
foreach ($quantityordered as $amt) 
{	
	echo $amt;

	$query = "UPDATE productinfo
                SET  QuantityAvail = QuantityAvail - :amt
			WHERE ProductNum = :product";
	$statement = $db->prepare($query);
	$statement->bindValue(':amt', $amt);
	$statement->bindValue(':product', $productordered[$i]);
	$statement->execute();
	$statement->closeCursor();
	
	$i++;
	
}

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
			<p>your order has been processed. Thank you for shopping with us!<p/>
			<?php echo $_SESSION['DBsubtotal']; ?><br />
			<?php echo $custname; ?>
			<?php echo $ordernumber; ?>
			<?php foreach ($_SESSION['cart'] as $item) 
			{
				echo $item['qty'];
				echo "<br />";
				echo $item['ProductNum'];
				echo "<br />";
			} 
			if (empty($_SESSION['cart'])) : ?>
                <p>F U C K</p>
			<?php endif; ?>

			
		</article>
		<footer>
			Stacks O' Servers Llc &#8226; 578 Rocket Drive, Minneapolis MN &nbsp; 55402 &#8226; 612-873-0050 &#8226; pottert140065@nicc.edu
		</footer>
	</body>

</html>