<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 22/01/19
 * Time: 13:30
 */

function listUser($user_id, $connection){

    $sql = ('SELECT name, email, address, postal_code, city,dni, profile_image
            FROM user
            WHERE id = :id
            ');

    $array_data = array(
        'id' => $user_id
    );

    $stmt = $connection->prepare($sql);

    $stmt->execute($array_data);

    $list = $stmt->fetchALL();

    return $list;
}

function validatePassword($id, $password, $connection)
{
    $sql = ('SELECT id, password
            FROM user 
            WHERE id = :id
            LIMIT 1');

    $stmt = $connection->prepare($sql);

    $stmt->execute(
        [
            'id' => $id
        ]
    );

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return password_verify($password, $result["password"]) ? $result : null;
}

function editUser($id, $name, $address, $city, $postal_code, $date_updated, $connection,$dni)
{
        $sql = ('UPDATE user SET name=:name, address=:address, postal_code=:postal_code, city=:city,dni=:dni, updated=:date_updated WHERE id=:id');

        $data_change = array(
            'id' => $id,
            'name' => $name,
            'address' => $address,
            'postal_code' => $postal_code,
            'city' => $city,
            'dni'=> $dni,
            'date_updated' => $date_updated
        );

        $stmt = $connection->prepare($sql);

        $stmt->execute($data_change);
}

function editUserImage($id, $name, $address, $city, $postal_code, $profile_image, $date_updated, $connection, $dni)
{
    $sql = ('UPDATE user SET name=:name, address=:address, postal_code=:postal_code, city=:city,profile_image=:profile_image,dni=:dni, updated=:date_updated WHERE id=:id');

    $data_change = array(
        'id' => $id,
        'name' => $name,
        'address' => $address,
        'postal_code' => $postal_code,
        'city' => $city,
        'profile_image' => $profile_image,
        'dni'=> $dni,
        'date_updated' => $date_updated
    );

    $stmt = $connection->prepare($sql);

    $stmt->execute($data_change);
}

function changePassword($id, $new_password ,$date_updated, $connection)
{
    $sql = ('UPDATE user SET password=:new_password, updated=:date_updated WHERE id=:id');

    $data_change = array(
        'id' => $id,
        'new_password' => $new_password,
        'date_updated' => $date_updated
    );

    $stmt = $connection->prepare($sql);

    $stmt->execute($data_change);
}
?>