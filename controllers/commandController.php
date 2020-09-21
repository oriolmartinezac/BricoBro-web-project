<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 13/11/18
 * Time: 18:51
 */
	$title = "Listado de compras";
	if(isset($_SESSION['user_id']))
	{
		//MODEL
		include __DIR__.'/../models/commands.php';

		$id = $_SESSION['user_id'];

		$allBill = allBill($id, $connectionType);
		$productsBill = [];

		foreach($allBill as $individualBill)
		{
			$infoTotal = [];
			$quantityTotal = $individualBill['quantity'];
			$oneBill = oneBill($individualBill['id'], $connectionType);

			$infoTotal = array(
				'quantity_total' => $individualBill['quantity'],
				'created_total' => $individualBill['created'],
				'price_total' => $individualBill['price']
			);

			array_push($infoTotal, $oneBill);
			array_push($productsBill, $infoTotal);
		}
		//VIEW
		include __DIR__.'/../views/commands.php';
	}else {
		header('Location: /');
	}
?>
