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
        <div class="background-image"></div>
        <div class="content">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Registro</h3>
                        <form id="register" action="?action=register" method="POST">
                            <p>Nom</p>
                            <input type="text" name="name" id="name" required/>

                            <p>Email</p>
                            <input type="email" name="email" id="email" required/>

                            <p>Password</p>
                            <input type="password" name="password" id="password" required/>

                            <p>Repetir password</p>
                            <input type="password" name="repeat_password" id="repeat_password" required/>

                            <p>Dirección</p>
                            <input type="text" name="address" required/>

                            <p>Población</p>
                            <input type="text" name="city" required/>

                            <p>Código Postal</p>
                            <input type="number" name="postal_code" min="1" value="0" required/>

                            <p>DNI</p>
                            <input type="text" name="dni" required/>

                            <br/>
                            
                            <input type="submit" value="REGISTRO"/>
                        </form>

                        <!-- BEGIN:ERRORES -->
                        <?php
                            if(isset($errors))
                            {
                                foreach ($errors as $error)
                                {
                                ?>
                                <p><?php echo $error ?></p>

                                <?php
                                }
                            }
                        ?>
                        <!-- END:ERRORES -->

                        <!-- TESTING -->
                        <p>Si ya tienes usuario <a href="?action=login" target="_self">Login</a></p>
                        <br/>
                        <p>Volver al <a href="/" target="_self">Home</a></p>
                    </div>
                </div>


            </div>
            <div class="content-right">

            </div>

        </div>


        <!--Scripts -->

    </body>

    <script>
        var password = document.getElementById("password");
        var repeat_password = documentgetElementById("repeat_password");

        function validatePassword()
        {
            if(password !== repeat_password)
            {
                repeat_password.setCustomValidity("La contraseña no coincide");
            }   
        }
        password.onchange = validatePassword;
        repeat_password.onkeyup = validatePassword;

    </script>
    <!--BEGIN:FOOTER-->
    <!--END:FOOTER-->

</html>
