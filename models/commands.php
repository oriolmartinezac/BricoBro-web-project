<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 26/10/18
 * Time: 18:47
 */
function allBill($id, $connection)
{
  $sql = ('SELECT id, quantity, created,price
           FROM bill
           WHERE user_id = :user_id
           ORDER BY 1');

  $data_bill = array(
      'user_id' => $id
  );

  $stmt = $connection->prepare($sql);
  $stmt->execute($data_bill);

  $list = $stmt->fetchALL();

  return $list;
}

function oneBill($bill, $connection)
{
  $sql = ('SELECT bill_id ,product_id, quantity, name
           FROM product_bill
           WHERE bill_id = :bill_id
           ORDER BY 1,2,3,4');

  $data_product_bill = array(
      'bill_id' => $bill
  );

  $stmt = $connection->prepare($sql);
  $stmt->execute($data_product_bill);

  $list = $stmt->fetchALL();

  return $list;
}

function products($product_id, $connection)
{
  $sql = ('SELECT name
           FROM product
           WHERE id=:id
           ORDER BY 1');

   $data_products = array(
       'id' => $product_id
   );

  $stmt = $connection->prepare($sql);
  $stmt->execute($data_products);

  $list = $stmt->fetchALL();

  return $list;
}
?>
