<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 13/11/18
 * Time: 18:51
 */

if(isset($_SESSION['user_id']))
{
	if(!isset($_SESSION['cart']))
	{
		$_SESSION['cart'] = [];
	}
}

$found = false;

foreach($_SESSION['cart'] as $key => &$val)
{

	if($val['product_id'] == $_POST["id"])
	{
		$found = true;
		$_SESSION["cart"][$key]['product_quantity'] += $_POST['quantity'];
	}
}

if($found === false)
{
	$new_product = array(
			'product_id' => $_POST["id"],
			'product_quantity' => $_POST["quantity"],
			'product_name' => $_POST["name"],
			'product_price' => $_POST["price"],
	);
	array_push($_SESSION["cart"], $new_product);
}
$_SESSION['total_products'] = $_SESSION['total_products']+$_POST["quantity"];
$_SESSION['total_price'] = $_SESSION['total_price']+($_POST['quantity']*$_POST['price']);


?>
