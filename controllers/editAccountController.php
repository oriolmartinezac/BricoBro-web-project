<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 22/01/19
 * Time: 18:18
 */

/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 29/10/18
 * Time: 19:05
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
        $user_profile_image = $_SESSION['user_id'].".jpg";
    }
    //END:VARIABLES DE LA VISTA

    if($_SERVER['REQUEST_METHOD']=== 'POST')
    {
        $name = $_POST["name"];
        $id = $_SESSION['user_id'];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postal_code = $_POST["postal_code"];
        $date_updated = date('Y-m-d');
        $dni = $_POST['dni'];
        $profile_image = $_SESSION['user_id'].".jpg";


        if(empty($name))
        {
            $errors["name"] = 'Error: el campo nombre está vacio';
        }

        if(empty($password))
        {
            $errors["password"] = "Error: el campo contraseña está vacio";
        }

        if(empty($address))
        {
            $errors["address"] = "Error: el campo dirección está vacio";
        }

        if(empty($city))
        {
            $errors["city"] = "Error: el campo población está vacio";
        }

        if(empty($postal_code))
        {
            $errors["postal_code"] = "Error: el campo código postal está vacio";
        }
        if(empty($dni))
        {
            $errors["dni"] = "Error: el campo DNI está vacio";
        }
        if(empty($errors))
        {
            //ADD MODEL
            require_once __DIR__."/../models/account.php";
            $image_uploaded = false;

            if(validatePassword($id, $password, $connectionType) == true)
            {
                if (isset($_FILES['profile_image'])  && !empty($profile_image)){
                    editUserImage($id, $name, $address, $city, $postal_code, $profile_image, $date_updated, $connectionType,$dni);
                    move_uploaded_file($_FILES['profile_image']['tmp_name'],$filesAbsolutePath.$profile_image);
                }else{
                    editUser($id, $name, $address, $city, $postal_code, $date_updated, $connectionType,$dni);
                }
            }else{
                $errors["password_wrong"] = "Error: la contraseña es incorrecta";
                require_once __DIR__.'/../views/accountSettings.php';
            }
            require_once __DIR__.'/../views/accountSettings.php';
            //header('Location: ?action=account-settings');

        }else {
            require_once __DIR__.'/../views/accountSettings.php';
        }
    }
    else
    {
        require_once __DIR__.'/../views/accountSettings.php';
    }

?>
