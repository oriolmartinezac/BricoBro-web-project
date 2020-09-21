<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 13/11/18
 * Time: 18:51
 */

if(empty($_SESSION["cart"]))
{
	header('Location: /?action=cart');
}
else
{
	$title = "Compra realizada";
	//MODEL
	include __DIR__.'/../models/buy.php';
	$id = $_SESSION['user_id'];
	$date_created = date('Y-m-d');
	$date_updated = $date_created;
	$total_price = $_SESSION["total_price"];
	$total_quantity = $_SESSION["total_products"];


	$bill_id = totalBill($id, $total_price, $total_quantity, $date_created, $date_updated, $connectionType);

	foreach($_SESSION['cart'] as $product)
	{
		productBill($product['product_id'],$bill_id, $product['product_quantity'], $product['product_name'], $connectionType);
	}

	$old_cart = $_SESSION['cart'];

	//RESET VARIABLES
	$_SESSION["total_price"] = 0;
	$_SESSION["total_products"] = 0;
	$_SESSION['cart'] = [];

	//VIEW
	include __DIR__.'/../views/buy.php';
}


?>
