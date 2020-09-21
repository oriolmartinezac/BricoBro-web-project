<?php include __DIR__.'/layouts/header.php';?>
    <div>
		    <h1>La compra ha sido realizada correctamente.</h1>
        <br/>
        <h3>Detalles de la compra: </h2>
        <?php
          foreach ($old_cart as $old_product)
          {
            ?>
              <p>Nombre del producto: <?php echo $old_product['product_name']; ?></p>
              <p>Cantidad: <?php echo $old_product['product_quantity'];?></p>
              <p>Precio total del producto: <?php echo ($old_product['product_price']*$old_product['product_quantity']);?>€</p>
              <br/>
            <?php
          }
            ?>
          <br/>
          <p>Cantidad total de productos del carrito: <?php echo $total_quantity; ?></p>
          <p>Precio total del carrito: <?php echo $total_price; ?>€</p>
    </div>
  </body>

	<script>
    //OPEN NAV
    function myAccount()
    {
        document.getElementById("myAccount").classList.toggle("show");
    }

		//SLIDE MENU
        function openNav()
        {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav()
        {
            document.getElementById("mySidenav").style.width = "0";
        }

        //BEGIN:DROPDOWN MENU
        function dropdownMenu()
        {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        //END:DROPDOWN MENU

        //TESTING
        function myFunction()
        {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        $('#cart').click(function(evt)
        {
            console.log(myDropdown.classList.contains('show'));
            if (myDropdown.classList.contains('show'))
            {
                console.log($(evt.target).closest("#cart"));
                console.log($(evt.target).closest("#cart").length);
                if($(evt.target).closest("#cart").length === 0)
                {
                    //myDropdown.classList.remove('show');
                }

            }

        });
	</script>

</html>
