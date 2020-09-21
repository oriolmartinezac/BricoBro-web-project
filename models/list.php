<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 26/10/18
 * Time: 16:47
 */

function listSales($connection){

    $sql = ('SELECT DISTINCT id, name
            FROM category
            ORDER BY 1');

    /*
     $sql = 'SELECT DISTINCT id
        FROM product
        WHERE b_sale = TRUE
        ORDER BY 1';
    */

    $stmt = $connection->prepare($sql);

    $stmt->execute();

    $list = $stmt->fetchALL();

    return $list;
}

?>