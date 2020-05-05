<?php
//this will be run when the database needs to be updated

// Insert a new record into table
$category_id = 1;
$code = 'strat';
$name = 'Fender Stratocaster';
$price = 699.99;

$query = "INSERT INTO products
                 (categoryID, productCode, productName, listPrice)
			VALUES(:category_id, ':code', ':name', :price)";
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':code', $code);
$statement->bindValue(':name', $name);
$statement->bindValue(':price', $price);
$statement->execute();
$statement->closeCursor();


// Updating an existing record from the table
$category_id = 4;
$price = 599.99;
$query = "UPDATE products
                 SET listPrice = $price
				 WHERE categoryID = $category_id";
				 
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->bindValue(':price', $price);
$statement->execute();
$statement->closeCursor();




// Deleting a record from the table
$category_id = 4;
$query = "DELETE FROM products
				 WHERE categoryID = $category_id";
				 
$statement = $db->prepare($query);
$statement->bindValue(':category_id', $category_id);
$statement->execute();
$statement->closeCursor();

?>