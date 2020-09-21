<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 12/11/18
 * Time: 17:08
 */

$title = "Carrito";


if(isset($_SESSION["user_id"]))
{
  if(isset($_SESSION['cart']))
  {
    
      $price_cart = $_SESSION["total_price"];
      $quantity_cart = $_SESSION["total_products"];
  }
}
include __DIR__.'/../views/cart.php';
?>
