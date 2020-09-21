<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 24/01/19
 * Time: 13:36
 */

//MODELS
include __DIR__.'/../models/list.php';

$title = 'CATEGORIES';

//VIEWS

$list_sales = listSales($connectionType);

include __DIR__.'/../views/categories.php';

?>
