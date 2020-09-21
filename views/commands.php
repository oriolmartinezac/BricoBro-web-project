<?php include __DIR__.'/layouts/header.php';?>
    <div>
        <h3>Listado de compras: </h2>
        <?php
          $iteration_facture = 1;
          foreach($productsBill as $facture)
          {
            ?>
            <p>Factura nº <?php echo $iteration_facture; ?>:</p>
            <p>Fecha de la factura: <?php echo $facture['created_total'];?></p>
            <p>Cantidad total de la factura: <?php echo $facture['quantity_total'];?></p>
            <p>Precio total de la factura: <?php echo $facture['price_total'];?>€</p>
            <?php

              foreach($facture as $product)
              {
                ?>

                <?php
                $iteration_product = 1;
                if(is_array($product) || is_object($product))
                {
                  ?>
                  <br/>
                  <?php
                  foreach($product as $element)
                  {
                    ?>
                    <div class="padding-left-50">
                      <p>Producto nº: <?php echo $iteration_product;?></p>
                      <p>Nombre del producto: <?php echo $element['name'];?></p>
                      <p>Cantidad del producto: <?php echo $element['quantity'];?></p>
                    </div>
                    <br/>
                    <?php
                    $iteration_product++;
                  }
                  ?>
                  <br/>
                  <br/>
                  <?php
                }


              }
              $iteration_facture++;
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
