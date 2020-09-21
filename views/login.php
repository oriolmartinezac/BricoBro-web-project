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
        <h3>Login</h3>
        <form id="login" action="?action=login" method="POST">
            <p>Email</p>
                <input type="email" name="email" id="email" required/>

            <p>Password</p>
                <input type="password" name="password" id="password" required/>
            <br/>

            <input type="submit" value="LOGIN"/>
        </form>

        <br/>
        <p>Volver al <a href="/" target="_self">Home</a></p>
        
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
		
		<!-- BEGIN:LOGGED -->
        <?php 
			if(isset($logged_in))
			{
				if($logged_in)
				{
		?>
					<div id="loggued_in_true"></div>
		<?php
				}
				else
				{
		?>
					<div id="loggued_in_false"></div>
		<?php
				}
			}
        ?>
        <!-- END:LOGGED -->

    </body>
	
	<script>
		
		var logged_true = document.getElementById("loggued_in_true");
		var logged_false = document.getElementById("loggued_in_false");

		if(logged_true !== null)
		{
			
			sweetAlert({
				position: 'top-end',
				type: 'success',
				title: 'Te has logueado correctamente',
				showConfirmButton: false,
				timer: 1500
			});
		}
		else if(logged_false !== null)
		{
			sweetAlert({
				position: 'top-end',
				type: 'error',
				title: 'Error al loguear',
				showConfirmButton: false,
				timer: 1500
			});
		}
	</script>
</html>