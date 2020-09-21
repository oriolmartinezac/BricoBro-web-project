<?php
/**
 * Created by PhpStorm.
 * User: tdiw-b8
 * Date: 26/10/18
 * Time: 16:22
 */

    include __DIR__.'/config/config.php';

    $filesAbsolutePath = '/home/TDIW/tdiw-b8/public_html/user_images/';

//check if URL is empty with action
    if(isset($_GET['action']))
    {
        $action = $_GET['action'];
    }else {
        $action = null;
    }
     session_start();



    switch($action)
    {
        case 'home':
              include __DIR__.'/controllers/homeController.php';
		          break;
        case 'register':
              include __DIR__. '/controllers/registerController.php';
	            break;
        case 'login':
        			if(isset($_SESSION['user_id']))
        			{
        				include __DIR__.'/controllers/homeController.php';
        			}
        			else
        			{
        				include __DIR__.'/controllers/loginController.php';
        			}
	            break;
        case 'categories':
              //$product['description'] = "false"
              include __DIR__.'/controllers/categoriesController.php';
              break;
        case 'account-settings':
             include __DIR__.'/controllers/accountController.php';
             break;
        case 'post-account-settings':
            include __DIR__.'/controllers/editAccountController.php';
            break;
        case 'post-change-password':
            include __DIR__.'/controllers/changePasswordController.php';
            break;
        case 'list-ajax':
            include __DIR__.'/controllers/listAjaxController.php';
	          break;
        case 'add-ajax':
		        include __DIR__.'/controllers/addAjaxController.php';
            break;
        case 'delete-products-cart':
            include __DIR__.'/controllers/deleteProductsController.php';
            break;
        case 'cart':
		        include __DIR__.'/controllers/cartController.php';
            break;
        case 'buy':
            include __DIR__.'/controllers/buyController.php';
            break;
        case 'command-list':
		        include __DIR__.'/controllers/commandController.php';
            break;
        case 'logout':
		        include __DIR__.'/controllers/logoutController.php';
	          break;
        case 'description-ajax':
            include __DIR__.'/controllers/descriptionAjaxController.php';
            break;
        default:
            //ERROR 404 PAGE NOT FOUND
            include __DIR__.'/controllers/homeController.php';
	          break;
    }
?>
