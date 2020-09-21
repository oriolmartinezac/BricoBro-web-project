<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 29/10/18
 * Time: 19:05
 */

    $errors = [];
    
    $title = "Registro";

    if($_SERVER['REQUEST_METHOD']=== 'POST')
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $postal_code = $_POST["postal_code"];
        $dni = $_POST["dni"];
        $date_created = date('Y-m-d');
        $date_updated = $date_created;

        if(empty($name))
        {
            $errors["name"] = 'Error: el campo nombre está vacio';
        }

        if(empty($email))
        {
            $errors["email"] = 'Error: el campo email está vacio';
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL ))
        {
            $errors["email_format"] = "Error: el campo email no tiene un formato válido";
        }

        if(empty($password))
        {
            $errors["password"] = "Error: el campo contraseña está vacio";
        }

        if($password !== $repeat_password)
        {
            $errors["repeat_password"] = "Error: el campo repite contraseña no es el mismo que el campo contraseña";
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
        //ADD MODEL
        require_once __DIR__ . "/../models/register.php";

        if(notUniqueEmail($email, $connectionType)){
            $errors["email_already_exist"] = "Error: el email introducido ya existe";
        }

        if(empty($errors))
        {
            //password hashed
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);

            //INSERTAR BASE DE DATOS
            register($name, $email, $password_hashed, $address, $city, $postal_code,$dni, $date_created, $date_updated, $connectionType);

            $correct = true;

            include __DIR__.'/../views/home.php';
        }else {
            require_once __DIR__. "/../views/register.php";
        }
    }
    else
    {
        require_once __DIR__. "/../views/register.php";
    }

?>
