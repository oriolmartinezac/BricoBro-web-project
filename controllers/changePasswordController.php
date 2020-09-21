<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 22/01/19
 * Time: 18:22
 */

$errors = [];

//BEGIN:VARIABLES DE LA VISTA
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
//END:VARIABLES DE LA VISTA

if($_SERVER['REQUEST_METHOD']=== 'POST')
{
    $id = $_SESSION['user_id'];
    $old_password = $_POST["old_password"];
    $repeat_new_password = $_POST["repeat_new_password"];
    $new_password = $_POST["new_password"];
    $date_updated = date('Y-m-d');

    if(empty($old_password))
    {
        $errors["old_password"] = "Error: el campo de antigua contraseña está vacio";
    }
    if($old_password === $new_password)
    {
        $errors["old_password"] = "Error: el campo de contraseña antigua coincide con el campo de contraseña nueva";
    }

    if(empty($new_password))
    {
        $errors["new_password"] = "Error: el campo de nueva contraseña está vacio";
    }
    if(empty($repeat_new_password))
    {
        $errors["repeat_new_password"] = "Error: el campo de repite nueva contraseña está vacio";
    }

    if($new_password !== $repeat_new_password)
    {
        $errors["repeat_password"] = "Error: el campo repite nueva contraseña no es el mismo que el campo nueva contraseña";
    }

    if(empty($errors))
    {
        //ADD MODEL
        require_once __DIR__."/../models/account.php";

        if(validatePassword($id, $old_password, $connectionType) == true)
        {
            $password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
            changePassword($id, $password_hashed,$date_updated, $connectionType);
            header('Location: ?action=account-settings');
        }else{
            require_once __DIR__.'/../views/accountSettings.php';
        }
        header('Location: ?action=account-settings');


    }else {

        require_once __DIR__.'/../views/accountSettings.php';
    }
}
else
{

    require_once __DIR__.'/../views/accountSettings.php';
}

?>