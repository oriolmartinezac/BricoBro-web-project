<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="../../images/favicon.ico" type="image/x-icon">
    <!-- BEGIN:CSS -->

    <!--<link rel="stylesheet" type="text/css" href="../css/columns.css"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" type="text/css" href="../../css/custom-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- END:CSS -->

    <!-- BEGIN:JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


    <!-- END:JS -->

    <title>BricoBro | <?php echo $title ?></title>

</head>
<body>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="/">Home</a>
        <a href="?action=categories">Categorias</a>
        <a href="?action=register">Registro</a>
        <?php
        if(!isset($_SESSION['user_id']))
        {
        ?>
        <a href="?action=login">Login</a>
        <?php
		}
        ?>


        <?php
        if(isset($_SESSION['user_id']))
		{
		?>
			<a href="?action=logout">Logout</a>
		<?php
		}
        ?>

    </div>

    <div class="navbar">
        <a onclick="openNav()" class="cursor"><i class="material-icons">menu</i></a>
        <div class="float-right">
			<?php if(isset($_SESSION['user_id'])){?><p class="padding-right-15">Bienvenido <?php echo $_SESSION['name']; ?></p><?php } ?>
        </div>


        <div class="dropdown-2 float-left">
            <button class="dropbtn-2" onclick="myAccount()">
                <i class="material-icons">account_circle</i>
            </button>

            <div class="dropdown-content-2" id="myAccount">
                <div id="accountSettings">
                    <?php
                    if(isset($_SESSION['user_id'])){
                    ?>
                    <a href="?action=account-settings">Editar Perfil</a>
                    <br/>
                    <a href="?action=command-list">Compras realizadas</a>
                    <br/>
                    <a href="?action=logout">Logout</a>
                        <?php
                    }
                    ?>
                    <?php
                    if(!isset($_SESSION['user_id']))
                    {
                    ?>
                    <a href="?action=login">Login</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="dropdown float-left">
          <a href="?action=cart" class="dropbtn"><i class="material-icons">shopping_cart</i></a>
    			<div class="dropdown-content" id="myShoppingCart">
    				<div id="cart">
    					<a href="?action=cart">
                <?php
                if(isset($_SESSION['user_id'])){
                ?>
	                <button type="button">Gestionar</button>
                    <?php
                }
                ?>
                <?php
                if(!isset($_SESSION['user_id']))
                {
                    ?>
                    <a href="?action=login">Login</a>
                    <?php
                }
                ?>
    					</a>
    				</div>
    			</div>
        </div>

        <!--
        <div class="dropdown float-right">
            <button class="dropbtn" onclick="myFunction()">
                <i class="material-icons">account_circle</i>
            </button>

            <div class="dropdown-content" id="myDropdown">
                <form id="loginForm">
                    <input type="email" name="email" placeholder="Email"/>
                    <br/>
                    <input type="password" name="password" placeholder="Contraseña"/>
                    <br/>
                    <input type="submit" value="Login"/>
                </form>
            </div>
        </div>
        -->

    </div>
