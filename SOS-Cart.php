<?php
// Add an item to the cart
function add_item($key, $quantity) {
    global $products;
    if ($quantity < 1) return;

    // If item already exists in cart, update quantity
    if (isset($_SESSION['cart'][$key])) {
        $quantity += $_SESSION['cart'][$key]['qty'];
        update_item($key, $quantity);
        return;
    }

    // Add item
    $Price = $products[$key]['Price'];
    $total = $Price * $quantity;
    $item = array(
        'ProductName' => $products[$key]['ProductName'],
        'Price' => $Price,
        'qty'  => $quantity,
        'total' => $total,
		'ProductNum' => $products[$key]['ProductNum']
		
    );
    $_SESSION['cart'][$key] = $item;
}

// Update an item in the cart
function update_item($key, $quantity) {
    global $products;
    $quantity = (int) $quantity;
    if (isset($_SESSION['cart'][$key])) {
        if ($quantity <= 0) {
            unset($_SESSION['cart'][$key]);
        } else {
            $_SESSION['cart'][$key]['qty'] = $quantity;
            $total = $_SESSION['cart'][$key]['Price'] *
                     $_SESSION['cart'][$key]['qty'];
            $_SESSION['cart'][$key]['total'] = $total;
        }
    }
}

// Get cart subtotal
function get_subtotal() {
    $subtotal = 0;
    foreach ($_SESSION['cart'] as $item) {
        $subtotal += $item['total'];
    }
    $subtotal = number_format($subtotal, 2);
    
	$_SESSION["DBsubtotal"] = $subtotal;
	
	return $subtotal;
}
?>