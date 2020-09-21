<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 26/10/18
 * Time: 18:47
 */

function register($name, $email, $password, $address, $city, $postal_code,$dni, $date_created, $date_updated, $connection)
{
    $sql = ('INSERT INTO user (name, email, password, address, postal_code, city,dni, created, updated) VALUES (:name,:email,:password,:address,:postal_code,:city,:dni, :date_created, :date_updated)');

    $data_register = array(

        'name' => $name,
        'email' => $email,
        'password' => $password,
        'address' => $address,
        'postal_code' => $postal_code,
        'city' => $city,
        'dni' => $dni,
        'date_created' => $date_created,
        'date_updated' => $date_updated

    );


    $stmt = $connection->prepare($sql);
    $stmt->execute($data_register);

}

function notUniqueEmail($email, $connection)
{
    $sql = ('SELECT email 
            FROM user
            WHERE email=:email');

    $stmt = $connection->prepare($sql);

    $stmt->execute(
        [
            'email' => $email,
        ]
    );

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if($result === false)
    {
        return false;
    }

    return ($result['email'] == $email) ? true: false;
}

?>