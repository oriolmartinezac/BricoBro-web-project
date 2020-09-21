<?php
/**
 * Created by PhpStorm.
 * User: Apocalipto
 * Date: 27/01/2019
 * Time: 11:55
 */

//MODEL
include __DIR__.'/../models/descriptionAjax.php';

$name = $_POST["name"];

//$_SESSION["description"] = $data[0]["description"];
//print_r($data);

$data = json_encode(descriptionAjax($name,$connectionType));

$data = print_r($data);


return $data;
?>
