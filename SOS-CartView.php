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
		
 <section>	
		<div id="page"> 
           <h1>Your Cart</h1>
            <?php if (empty($_SESSION['cart'])) : ?>
                <p>There are no items in your cart.</p>
            <?php else: ?>
                <form action="SOS-Order.php" method="post">
                <input type="hidden" name="action" value="update"/>
                <table>
                    <tr id="cart_header">
                        <th class="left">Item</th>
                        <th class="right">Item Cost</th>
                        <th class="right">Quantity</th>
                        <th class="right">Item Total</th>
                    </tr>
        
                <?php foreach( $_SESSION['cart'] as $key => $item ) :
                    $Price  = number_format($item['Price'],  2);
                    $total = number_format($item['total'], 2);
                ?>
                    <tr>
                        <td>
                            <?php echo $item['ProductName']; ?>
                        </td>
                        <td class="right">
                            $<?php echo $Price; ?>
                        </td>
                        <td class="right">
                            <input type="text" class="cart_qty"
                                name="newqty[<?php echo $key; ?>]"
                                value="<?php echo $item['qty']; ?>"/>
                        </td>
                        <td class="right">
                            $<?php echo $total; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr id="cart_footer">
                        <td colspan="3"><b>Subtotal</b></td>
                        <td>$<?php echo get_subtotal(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="right">
                            <input type="submit" value="Update Cart"/>
                        </td>
                    </tr>
                </table>
                <p>Click "Update Cart" to update quantities in your
                    cart. Enter a quantity of 0 to remove an item.
                </p>
                </form>
            <?php endif; ?>
            <p><a href="SOS-Order.php?action=show_add_item">Add Item</a></p>
            <p><a href="SOS-Order.php?action=empty_cart">Empty Cart</a></p>
			
			<br />
			
			<form action="SOS-DatabaseUpdate.php" method="post">
				<input type="hidden" name="action" value="submit_order"/>
				
				<label>Your first name</label><br />
                <input type="text" name="custname" id="custname" value="Your Name"><br /><br />
				
				<label>Address line 1</label><br />
                <input type="text" name="custaddress" id="custaddress2" value="Line 1"><br />
				<label>Address line 2</label><br />
                <input type="text" name="custaddress2" id="custaddress2" value="Line 2"><br /><br />
				
                <input type="submit" value="Submit Order"/><br /><br />
				
				

            </form>

		</div><!-- end page -->
	</section>
</body>
</html>
