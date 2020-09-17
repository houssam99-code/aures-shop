<?php
require("includes/common.php");
session_start();
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
    $query = "INSERT INTO users_products(user_id, item_id, status) VALUES('$user_id', '$item_id', 'Added to cart')";
	$query2 = "SELECT * FROM products WHERE id='$item_id'";
	$a = mysqli_query($con, $query2);
	$item = mysqli_fetch_array($a);
	$num = $item['quantity'] -1 ;
	
	$query3 = "UPDATE products SET quantity = '$num' WHERE id='$item_id'";
	mysqli_query($con, $query3) or die(mysqli_error($con));
    mysqli_query($con, $query) or die(mysqli_error($con));
    header('location: products.php');
}
?>   