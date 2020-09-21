<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 13/11/18
 * Time: 18:51
 */

function listAjax($id, $connection)
{
    $sql = ('SELECT  id, name, price
            FROM product
            WHERE category_id = :id
            ORDER BY 1');

    $array_data = array(
      'id' => $id
    );

    $stmt = $connection->prepare($sql);

    $stmt->execute($array_data);

    $list = $stmt->fetchALL();

    return $list;

}
?>