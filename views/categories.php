<?php include __DIR__.'/layouts/header.php'?>
<div class="main" id="main">
    <div class="content-slide">
        <h1 id="title">Categorias</h1>
    </div>


    <div class="content-flex" id="Contentflex">

        <?php
        if(isset($list_sales))
        {
            foreach($list_sales as $list_sale)
            {
                ?>
                <div class="categories ajax-button" id="<?php echo $list_sale['id']?>">
                    <div class="categoria-producte">
                        <img class="image-categories" src="../images/<?php echo $list_sale["name"]; ?>.jpg"/>
                    </div>
                    <div class="info-product" id="info-product<?php echo $list_sale['id']?>">
                        <h4><?php echo $list_sale["name"]; ?></h4>
                    </div>

                </div>

                <?php
            }
        }
        ?>

    </div>
    <br/>
    <p id="go-categories">Volver al <a href="?action=categories" target="_self">Categorias</a></p>

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

    <!-- BEGIN:CORRECT -->
    <?php if(isset($correct))
    {
        ?>
        <div id="registerTrue"></div>
        <?php
    }
    ?>
    <!-- END:CORRECT -->
</div>


<script>



    $(".ajax-button").click(function()
    {
        var i;
        var id_petition = $(this).attr('id');
        document.getElementById("go-categories").style.display = "block";

        for (i = 0; i < $('.categories').length ; i++) {
            document.getElementsByClassName("categories")[i].style.display = 'none';
        }
        var x = document.getElementById("info-product"+id_petition).textContent;

        document.getElementById("title").innerHTML = x;
        //document.getElementById("Contentflex").style.justifyContent = 'flex-start';

        //document.getElementsByClassName("image-categories")[id_petition-1].style.filter = 'blur(2px)';


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
                    var element_flex = document.createElement("div");
                    element_flex.setAttribute("id","flex-productes");
                    element_flex.setAttribute("class","content-flex");
                    document.getElementById("main").appendChild(element_flex);

                    data.forEach(function(obj){



                        if(!document.getElementById("product_"+obj.id))
                        {
                            //BUTTON || primer elemento = product_ID,  segundo elemento = nombre del producto, tercer elemento = precio del producto


                            var element_image = document.createElement("img");

                            var e_image_container = document.createElement("div");
                            var element = document.createElement("p");
                            var element2 = document.createElement("button");
                            var element3 = document.createElement("input");
                            var element4 = document.createElement("h4");


                            element.setAttribute("id", "product_"+obj.id);
                            //element.setAttribute("class","info-product");
                            element2.setAttribute("id", "product_button_"+obj.id+"_"+obj.name+"_"+obj.price);
                            element2.setAttribute("onclick", "addToCartFunction(this)");
                            e_image_container.setAttribute("class","categories");
                            element3.setAttribute("class", "input-size");
                            element3.setAttribute("type", "number");
                            element3.setAttribute("name", "quantity");
                            element3.setAttribute("id", "quantity_"+obj.id);
                            element3.setAttribute("min", "1");
                            element3.setAttribute("value", "1");


                            element_image.setAttribute("src","../images/"+obj.name+".jpg");
                            element_image.setAttribute("class","image-productes");
                            element_image.setAttribute("id",obj.name);
                            element_image.setAttribute("onclick","f_detall(id);");


                            element_flex.appendChild(e_image_container);

                            e_image_container.appendChild(element_image);
                            e_image_container.appendChild(element);

                            //document.getElementById("product_"+obj.id).innerHTML = obj.name;

                            element.innerHTML = obj.name + ".  Escoja Cantidad:  ";

                            element.appendChild(element3);
                            element.appendChild(element4);
                            element.appendChild(element2);



                            element4.innerHTML = "Precio "+obj.price+" €/u";
                            document.getElementById("product_button_"+obj.id+"_"+obj.name+"_"+obj.price).innerHTML = "Añadir carrito";



                        }
                    }
                    );
                }

            ]
        });


    });

    function f_detall(e)
    {
        //var producte = $(".flex-productes").attr('id');
        var i;
        document.getElementById("title").innerHTML = e;
        for (i = 0; i < $('.categories').length ; i++) {

            document.getElementsByClassName("categories")[i].style.display = 'none';
        }
        var element_flex = document.getElementById("flex-productes"),index;


        $.ajax({
            url: "?action=description-ajax",
            type:'post',
            dataType: 'json',
            data: {
                name: e
            },
            success: [
                function(data)
                {
                    //document.getElementById("descr").style.display = "block";
                    data.forEach(function(obj)
                    {
                        var element_image = document.createElement("img");

                        var e_image_container = document.createElement("div");
                        var element = document.createElement("p");
                        var element2 = document.createElement("button");
                        var element3 = document.createElement("input");
                        var element4 = document.createElement("h4");


                        element.setAttribute("id", "product_"+obj.id);
                        //element.setAttribute("class","info-product");
                        element2.setAttribute("id", "product_button_"+obj.id+"_"+obj.name+"_"+obj.price);
                        element2.setAttribute("onclick", "addToCartFunction2(this)");
                        e_image_container.setAttribute("class","categories");
                        element3.setAttribute("class", "input-size");
                        element3.setAttribute("type", "number");
                        element3.setAttribute("name", "quantity");
                        element3.setAttribute("id", "quantity2_"+obj.id);
                        element3.setAttribute("min", "1");
                        element3.setAttribute("value", "1");


                        element_image.setAttribute("src","../images/"+obj.name+".jpg");
                        element_image.setAttribute("class","image-productes");
                        element_image.setAttribute("id",obj.name);
                        element_image.setAttribute("onclick","f_detall(id);");


                        element_flex.appendChild(e_image_container);

                        e_image_container.appendChild(element_image);
                        e_image_container.appendChild(element);

                        //document.getElementById("product_"+obj.id).innerHTML = obj.name;

                        element.innerHTML = obj.name + ".  Escoja Cantidad:  ";

                        element.appendChild(element3);
                        element.appendChild(element4);
                        element.appendChild(element2);

                        element4.innerHTML = "Precio "+obj.price+" €/u";
                        element2.innerHTML = "Añadir carrito";

                        var m = obj.description;
                        m = htmlEntities(m);
                        var desc = document.createElement("p");
                        var jump = document.createElement("div");
                        var element_descripcion = document.createElement("p");
                        desc.innerHTML = "Descripción: ";
                        element_descripcion.innerHTML = m;
                        jump.appendChild(desc);
                        jump.appendChild(element_descripcion);

                        //var l = document.getElementById("descr");
                        e_image_container.append(jump);


                    }
                );

                }
        ]

        });


    }
    //HTML ENTITIES
    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    };
    $(".ajax-button-pr").click(function()
    {
        var producte = $(this).attr('id');
        document.getElementById("flex-productes");
    });
    //Variables globales list categories
    //AJAX listar productos de una categoria:BEGIN

    //AJAX listar productos de una categoria:END

    //AJAX ADD to CART:BEGIN

    function addToCartFunction(e)
    {
        var id_cart = $(e).attr("id");
        id_cart = id_cart.split("_");

        var price_cart = id_cart[id_cart.length -1];

        var name_cart = id_cart[id_cart.length -2];
        id_cart = id_cart[id_cart.length -3];

        var quantity_cart = document.getElementById("quantity_"+id_cart).value.split("_");
        quantity_cart = quantity_cart[quantity_cart.length -1];

        $.ajax({
            url: "?action=add-ajax",
            type:'post',
            dataType: 'json',
            data: {
                id: id_cart,
                name: name_cart,
                quantity: quantity_cart,
                price: price_cart
            },
            success: [
                function(data)
                {
                    console.log("added to cart");
                }
            ]
        });
    };
    function addToCartFunction2(e)
    {
        var id_cart = $(e).attr("id");
        id_cart = id_cart.split("_");

        var price_cart = id_cart[id_cart.length -1];

        var name_cart = id_cart[id_cart.length -2];
        id_cart = id_cart[id_cart.length -3];

        var quantity_cart = document.getElementById("quantity2_"+id_cart).value.split("_");
        quantity_cart = quantity_cart[quantity_cart.length -1];

        $.ajax({
            url: "?action=add-ajax",
            type:'post',
            dataType: 'json',
            data: {
                id: id_cart,
                name: name_cart,
                quantity: quantity_cart,
                price: price_cart
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

    //SLIDE MENU
    function openNav()
    {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav()
    {
        document.getElementById("mySidenav").style.width = "0";
    }

    //Variables globales Slide a mostrar en el Slide
    var slidePhoto = -1;
    var dots = document.getElementsByClassName("dot");
    var slidingImages = document.getElementsByClassName("slide-photo");
    var manual = false;

    function resetClass()
    {
        for (var index=0;index < slidingImages.length;index++)
        {
            slidingImages[index].style.display = "none";
        }

        for (var i=0; i <dots.length; i++)
        {
            dots[i].className = dots[i].className.replace(" active", "");
        }

    }

    //BEGIN:DROPDOWN (SHOPPING_CART)
    function myShoppingCart()
    {
        document.getElementById("myShoppingCart").classList.toggle("show");
    }
    $('#cart').click(function(evt)
    {
        if (myShoppingCart.classList.contains('show'))
        {
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
        if (myAccount.classList.contains('show'))
        {
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

    //SWEET ALERT
    var registerTrue = document.getElementById("registerTrue");

    if(registerTrue !== null)
    {

        sweetAlert({
            position: 'top-end',
            type: 'success',
            title: 'Te has registrado correctamente',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>
</body>
<!--BEGIN:FOOTER--
