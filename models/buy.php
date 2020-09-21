<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 26/10/18
 * Time: 18:47
 */
function totalBill($id, $total_price, $total_quantity, $date_created, $date_updated,$connection)
{
  $sql = ('INSERT INTO bill (price, quantity, created, updated, user_id) VALUES (:price,:quantity,:created,:updated,:user_id)');

  $data_bill = array(
      'price' => $total_price,
      'quantity' => $total_quantity,
      'created' => $date_created,
      'updated' => $date_updated,
      'user_id' => $id
  );

  $stmt = $connection->prepare($sql);
  $stmt->execute($data_bill);
  $last_id = $connection->lastInsertId();
  return $last_id;
}

function productBill($product, $bill, $quantity, $name, $connection)
{
  $sql = ('INSERT INTO product_bill (product_id, bill_id, quantity, name) VALUES (:product_id,:bill_id,:quantity,:name)');

  $data_product_bill = array(
      'product_id' => $product,
      'bill_id' => $bill,
      'quantity' => $quantity,
      'name' => $name
  );

  $stmt = $connection->prepare($sql);
  $stmt->execute($data_product_bill);
}
?>
