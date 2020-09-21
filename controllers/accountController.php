<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 22/01/19
 * Time: 13:21
 */

include __DIR__.'/../models/account.php';

$title = 'Ajustes de usuario';

//VIEWS
$user_id = $_SESSION['user_id'];

$user = listUser($user_id, $connectionType);

foreach($user as $item)
{
    $user_name = $item['name'];
    $user_email = $item['email'];
    $user_address = $item['address'];
    $user_postal_code = $item['postal_code'];
    $user_city = $item['city'];
    $user_dni = $item['dni'];
    $user_profile_image = $item['profile_image'];
}

include __DIR__.'/../views/accountSettings.php';

?>