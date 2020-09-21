<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 13/11/18
 * Time: 18:51
 */

$_SESSION['cart'] = [];
$_SESSION['total_products'] = 0;
$_SESSION['total_price'] = 0;

header('Location: /?action=cart');
?>
