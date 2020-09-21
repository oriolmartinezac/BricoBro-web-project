<?php include __DIR__.'/layouts/header.php';?>
    <div>
		<?php
			if(isset($_SESSION['user_id']))
			{
        if(isset($_SESSION['cart']))
        {
          foreach ($_SESSION['cart'] as $product)
  				{
            ?>
              <p>Nombre del producto: <?php echo $product['product_name']; ?></p>
              <p>Cantidad: <?php echo $product['product_quantity'];?></p>
              <p>Precio total del producto: <?php echo ($product['product_price']*$product['product_quantity']);?>€</p>
              <br/>
  					<?php
  				}
  		      ?>
          <br/>
  				<p>Cantidad total de productos del carrito: <?php echo $quantity_cart; ?></p>
  				<p>Precio total del carrito: <?php echo $price_cart; ?>€</p>
          <p>
            <form id="deleteAll" method="POST" action="?action=delete-products-cart">
              <button type="submit">Eliminar todos los productos del carrito</button>
            </form>
            <form id="confirmAll" method="POST" action="?action=buy">
              <button type="submit">Realizar compra</button>
            </form>
          </p>
  		<?php
        }
        else {
          ?>
          <p>Nada en el carrito, ves a comprar algo.</p>
          <?php
        }
			}
			else
			{
		?>
				<p>Para comprar algo necesitas loguearte antes.</p>
		<?php
			}
		?>
    </div>


    </body>

	<script>
    //OPEN NAV
    function myAccount()
    {
        document.getElementById("myAccount").classList.toggle("show");
    }

    //delete_all products_ajax
    function deleteProducts(){
      $.ajax({
          url: "?action=delete-ajax",
          type:'post',
          dataType: 'json',
          success: [
              function(data)
              {

              }
            ]
        });
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
