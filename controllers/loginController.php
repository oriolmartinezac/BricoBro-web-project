<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 12/11/18
 * Time: 17:08
 */

$errors = [];
$logged = false;
$title = "Login";

if($_SERVER['REQUEST_METHOD']=== 'POST')
{
    /////////////////////////////POST/////////////////////////////////
    if(empty($_POST["email"]))
    {
        $errors["email"] = "Error: El campo Email está vacio";
    }
    else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL ))
    {
        $errors["email_format"] = "Error: El formato de Email no es válido";
    }
    if(empty($_POST["password"]))
    {
        $errors["password"] = "Error: El campo Contraseña está vacio";
    }

    if(empty($errors))
    {
        require_once __DIR__."/../models/login.php";
        $logged = login($_POST["email"], $_POST["password"], $connectionType);
    }
    else
    {
        //VISTA
        $logged_in = false;
        require_once __DIR__. "/../views/login.php";
    }

    if($logged)
    {
		
		//LOGUEADO CORRECTAMENTE
		$logged_in = true;
		
        $_SESSION['user_id'] = $logged['id'];
        $_SESSION['name'] = $logged['name'];
        $_SESSION['total_price'] = 0;
        $_SESSION['total_products'] = 0;
        
        //header('Location: /');
        
        require_once __DIR__. "/../views/home.php";
       
    }
    else
    {
        //ERROR LOGIN
        $logged_in = false;
        require_once __DIR__. "/../views/login.php";
    }
}
else
{
    /////////////////////////////VIEW/////////////////////////////////
    include __DIR__. "/../views/login.php";
}
