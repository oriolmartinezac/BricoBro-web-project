<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 13/11/18
 * Time: 18:51
 */



//MODEL
include __DIR__.'/../models/listAjax.php';

$id = $_POST["id"];

$data = json_encode(listAjax($id, $connectionType));
$data = print_r($data);

return $data;
?>