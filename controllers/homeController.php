<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 26/10/18
 * Time: 16:25
 */

//MODELS
include __DIR__.'/../models/list.php';

$title = 'HOME';

$image_name =
//VIEWS

$list_sales = listSales($connectionType);

include __DIR__.'/../views/home.php';

?>