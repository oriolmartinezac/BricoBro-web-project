<?php include __DIR__.'/layouts/header.php'?>
    <div id="main">
        <form id="accountSettingsForm" action="?action=post-account-settings" method="POST" enctype="multipart/form-data">
            <p>
                Imagen de Perfil:
                <br/>
                <?php
                    if(empty($user_profile_image))
                    {
                    ?>
                        <img src="/../images/avatar-by-default.png" class="avatar-image">
                    <?php
                    }
                    else
                    {
                        ?>
                        <img src="/../user_images/<?php echo $user_profile_image;?>" class="avatar-image">
                        <?php
                    }
                ?>
            </p>
            <p>
                Email:
                <input type="text" name="email" value="<?php echo $user_email; ?>" disabled />
            </p>
            <p>
                Nombre:
                <input type="text" id="name" name="name" value='<?php echo $user_name; ?>'  disabled />
            </p>
            <p>
                Dirección:
                <input type="text" id="address" name="address" value="<?php echo $user_address; ?>" disabled />
            </p>
            <p>
                Código Postal:
                <input type="text" id="postal_code" name="postal_code" value="<?php echo $user_postal_code; ?>" disabled />
            </p>
            <p>
                Población:
                <input type="text" id="city" name="city" value="<?php echo $user_city; ?>" disabled />
            </p>
            <p>
                DNI:
                <input type="text" id="dni" name="dni" value="<?php echo $user_dni; ?>" disabled />
            </p>
            <p>
                Actualizar imagen:
                <input type="file" id="profile_image" name="profile_image" disabled/>
            </p>
            <div id="showChangeUser">
                <p>
                    Escribe la contraseña:
                    <input type="password" name="password" />
                </p>
                <p class="padding-left-200">
                    <button type="submit" name="btnpass">Guardar cambios</button>
                </p>
            </div>
        </form>
        <p id="changePasswordButton">
            Contraseña: <button type="button" id="changePassword">Cambiar contraseña</button>
        </p>
        <form id="changePasswordForm" action="?action=post-change-password" method="POST">
            <div id="showChangePassword">
                <p>
                    Escribe la antigua contraseña:
                    <input type="password" name="old_password"/>
                </p>
                <p>
                    Escribe la nueva contraseña:
                    <input type="password" name="new_password"/>
                </p>
                <p>
                    Vuelve a escribir la nueva contraseña:
                    <input type="password" name="repeat_new_password"/>
                </p>
                <p  class="padding-left-250"><button type="submit">Guardar contraseña</button></p>
            </div>
        </form>
        <p id="editButton">
            <button type="button" id="changeUser">Editar perfil</button>
        </p>
    </div>
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

    <script>
        //SLIDE MENU
        function openNav()
        {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav()
        {
            document.getElementById("mySidenav").style.width = "0";
        }

        //BEGIN:Cambiar contraseña
        $("#changePassword").click(function()
        {
            var showChangePassword = document.getElementById("showChangePassword");

            if(showChangePassword.getAttribute("style")==null)
            {
                showChangePassword.style.display = "block";
                document.getElementById("editButton").style.display = "none";
                document.getElementById("showChangeUser").style.display = "none";
            }
            else if(showChangePassword.style.display === "none")
            {
                showChangePassword.style.display = "block";
                document.getElementById("editButton").style.display = "none";
                document.getElementById("showChangeUser").style.display = "none";

            }
            else
            {
                showChangePassword.style.display = "none";
                document.getElementById("editButton").style.display = "block";
            }
        });
        //END:Cambiar contraseña

        //BEGIN:Cambiar usuario
        $("#changeUser").click(function()
        {
            var showChangeUser = document.getElementById("showChangeUser");

            if(showChangeUser.getAttribute("style")==null)
            {
                document.getElementById("changePasswordButton").style.display = "none";
                document.getElementById("name").disabled = false;
                document.getElementById("address").disabled = false;
                document.getElementById("postal_code").disabled = false;
                document.getElementById("city").disabled = false;
                document.getElementById("dni").disabled = false;
                document.getElementById("profile_image").disabled = false;
                showChangeUser.style.display = "block";
            }
            else if(showChangeUser.style.display === "none")
            {
                document.getElementById("changePasswordButton").style.display = "none";
                document.getElementById("name").disabled = false;
                document.getElementById("address").disabled = false;
                document.getElementById("postal_code").disabled = false;
                document.getElementById("city").disabled = false;
                document.getElementById("dni").disabled = false;
                document.getElementById("profile_image").disabled = false;
                showChangeUser.style.display = "block";
            }
            else {
                showChangeUser.style.display = "none";
                document.getElementById("name").disabled = true;
                document.getElementById("address").disabled = true;
                document.getElementById("postal_code").disabled = true;
                document.getElementById("city").disabled = true;
                document.getElementById("dni").disabled = true;
                document.getElementById("profile_image").disabled = true;
                document.getElementById("changePasswordButton").style.display = "block";
            }
        });
        //END:Cambiar usuario


		//Variables globales list categories
        //AJAX listar productos de una categoria:BEGIN
        $(".ajax-button").click(function()
        {
            var id_petition = $(this).attr('id');
            $.ajax({
                url: "?action=list-ajax",
                type:'post',
                dataType: 'json',
                data: {
                    id: id_petition
                },
                success: [
                    function(data)
                    {
                        data.forEach(function(obj){
							console.log(obj);
							if(!document.getElementById("product_"+obj.id))
							{
								var element = document.createElement("p");
								var element2 = document.createElement("button");
								
								element.setAttribute("id", "product_"+obj.id);
								element2.setAttribute("id", "product_button_"+obj.id+"_"+obj.name);
								element2.setAttribute("onclick", "addToCartFunction(this)");
								
								document.getElementById(id_petition).appendChild(element);
								document.getElementById("product_"+obj.id).innerHTML = obj.name;
								
								element.appendChild(element2);
								
								document.getElementById("product_button_"+obj.id+"_"+obj.name).innerHTML = "Añadir carrito";	
								
							}
                        });
                    }
                ]
            });

        });
        //AJAX listar productos de una categoria:END
        
        //AJAX ADD to CART:BEGIN
        
        function addToCartFunction(e)
		{
			var id_cart = $(e).attr("id");
			id_cart = id_cart.split("_");
			
			var name_cart = id_cart[id_cart.length -1];
			id_cart = id_cart[id_cart.length -2];
			
			$.ajax({
                url: "?action=add-ajax",
                type:'post',
                dataType: 'json',
                data: {
                    id: id_cart,
                    name: name_cart
                },
                success: [
                    function(data)
                    {
						console.log("added to cart");
                    }
                ]
            });
		};
        //AJAX ADD to CART:END
    
        //BEGIN:DROPDOWN (SHOPPING_CART)
        function myShoppingCart()
        {
            document.getElementById("myShoppingCart").classList.toggle("show");
        }
        $('#cart').click(function(evt)
        {
            console.log(myShoppingCart.classList.contains('show'));
            if (myShoppingCart.classList.contains('show'))
            {
                console.log($(evt.target).closest("#cart"));
                console.log($(evt.target).closest("#cart").length);
                if($(evt.target).closest("#cart").length === 0)
                {
                    //myDropdown.classList.remove('show');
                }
            }
        });
        //END:DROPDOWN (SHOPPING_CART)

        //BEGIN:DROPDOWN (ACCOUNT)
        function myAccount()
        {
            document.getElementById("myAccount").classList.toggle("show");
        }
        $('#accountSettings').click(function(evt)
        {
            console.log(myAccount.classList.contains('show'));
            if (myAccount.classList.contains('show'))
            {
                console.log($(evt.target).closest("#accountSettings"));
                console.log($(evt.target).closest("#accountSettings").length);
                if($(evt.target).closest("#accountSettings").length === 0)
                {
                    //myDropdown.classList.remove('show');
                }

            }
        });
        //END:DROPDOWN (ACCOUNT)

		//LOGGED SWEETALERT
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
</body>
<!--BEGIN:FOOTER-->

<!--END:FOOTER-->
</html>
