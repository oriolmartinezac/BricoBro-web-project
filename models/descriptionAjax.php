<?php
/**
 * Created by PhpStorm.
 * User: Apocalipto
 * Date: 27/01/2019
 * Time: 12:02
 */

function descriptionAjax($name, $connection)
{
    $sql = ('SELECT  id, name, price, description
            FROM product
            WHERE name = :name
            ORDER BY 1');

    $array_data = array(
        'name' => $name
    );

    $stmt = $connection->prepare($sql);

    $stmt->execute($array_data);

    $list = $stmt->fetchALL();

    return $list;

}
?>
