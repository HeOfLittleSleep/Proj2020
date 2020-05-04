<?php
// Start session management with a persistent cookie
$lifetime = 60 * 30;    // 30 minutes in seconds
// $lifetime = 0;                      // per-session cookie
session_set_cookie_params($lifetime, '/');
session_start();

// Create a cart array if needed
//if (empty($_SESSION['cart'])) $_SESSION['cart'] = array();

// Create a table of products
//$products = array();
//$products['MMS-1754'] = array('name' => 'Flute', 'cost' => '149.50');
//$products['MMS-6289'] = array('name' => 'Trumpet', 'cost' => '199.50');
//$products['MMS-3408'] = array('name' => 'Clarinet', 'cost' => '299.50');

require_once('database.php');

// Set product ID

 $ProdductNum = 1;

    // Get all product
    $query = 'SELECT * FROM productinfo
              ORDER BY ProductNum';
    $productinfo = $db->query($query);


// Include cart functions
require_once('SOS-Cart.php');

// Get the action to perform
if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'show_add_item';
}

// Add or update cart as needed
switch($action) {
    case 'add':
        add_item($_POST['productkey'], $_POST['itemqty']);
        include('cart_view.php');
        break;
    case 'update':
        $new_qty_list = $_POST['newqty'];
        foreach($new_qty_list as $key => $qty) {
            if ($_SESSION['cart'][$key]['qty'] != $qty) {
                update_item($key, $qty);
            }
        }
        include('cart_view.php');
        break;
    case 'show_cart':
        include('cart_view.php');
        break;
    case 'show_add_item':
        include('add_item_view.php');
        break;
    case 'empty_cart':
        unset($_SESSION['cart']);
        include('cart_view.php');
        break;
}
?>