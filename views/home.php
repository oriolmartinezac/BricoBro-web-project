<?php include __DIR__.'/layouts/header.php'?>
    <div class="main">
        <div class="content-slide">
            <h1>OFERTAS</h1>
            <div class="slideshow-container">
                <div class="slide-photo fade">
                    <a id="previousSlide" class="left-next-slide manual-slide cursor" onclick="manualSlides()">&#10094;</a>
                    <img class="price-slide" src="../images/precio-slide.png"/>
                    <img class="image-slide center" src="../images/slide-photo-1.jpg"/>
                    <a id="nextSlide" class="right-next-slide manual-slide cursor" onclick="manualSlides()">&#10095;</a>
                </div>
                <div class="slide-photo fade">
                    <a id="previousSlide" class="left-next-slide manual-slide cursor" onclick="manualSlides()">&#10094;</a>
                    <img class="price-slide" src="../images/precio-slide.png"/>
                    <img class="image-slide center" src="../images/slide-photo-1.jpg"/>
                    <a id="nextSlide" class="right-next-slide manual-slide cursor" onclick="manualSlides()">&#10095;</a>
                </div>
                <div class="slide-photo fade">
                    <a id="previousSlide" class="left-next-slide manual-slide cursor" onclick="manualSlides()">&#10094;</a>
                    <img class="price-slide" src="../images/precio-slide.png"/>
                    <img class="image-slide center" src="../images/slide-photo-1.jpg"/>
                    <a id="nextSlide" class="right-next-slide manual-slide cursor" onclick="manualSlides()">&#10095;</a>
                </div>
            </div>
            <br/>
            <div class="text-center">
                <span id="0_slide" class="dot manual-slide cursor"></span>
                <span id="1_slide" class="dot manual-slide cursor"></span>
                <span id="2_slide" class="dot manual-slide cursor"></span>
            </div>

        </div>


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
    //JQUERY MENU
    $(document).ready(function(){
      $('ul li:has(ul)').hover(
        function(e){
          $(this).find('ul').css({display: "block"});
        },
        function(e){
          $(this).find('ul').css({display: "none"});
        }

      );
    })

            $(".ajax-button").click(function()
            {
                var i;
                var id_petition = $(this).attr('id');
                for (i = 0; i < $('.categories').length ; i++) {

                    if (i != id_petition-1) {
                        document.getElementsByClassName("categories")[i].style.display = 'none';
                    }

                }
                document.getElementById("Contentflex").style.justifyContent = 'flex-start';
                document.getElementsByClassName("image-categories")[id_petition-1].style.filter = 'blur(2px)';


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

                                    //var element = document.createElement("p");
                                    //var element2 = document.createElement("button");
                                    var element4 = document.createElement("div");
                                    var element3 = document.createElement("img");


                                    //element.setAttribute("id", "product_"+obj.id);
                                    //element2.setAttribute("id", "product_button_"+obj.id+"_"+obj.name);
                                    //element2.setAttribute("onclick", "addToCartFunction(this)");
                                    element3.setAttribute("id","pr_"+obj.name);
                                    element3.setAttribute("src","../images/"+obj.name+".jpg");
                                    element4.setAttribute("id","product_d"+obj.name);
                                    element4.setAttribute("class","productes");
                                    document.getElementById("Contentflex").appendChild(element4);
                                    document.getElementById("product_d"+obj.name).appendChild(element3);





                                    //document.getElementById(id_petition).appendChild(element);
                                    //document.getElementById("product_"+obj.id).innerHTML = obj.name;

                                    //element.appendChild(element2);

                                    //document.getElementById("product_button_"+obj.id+"_"+obj.name).innerHTML = "Añadir carrito";

                                }
                            });
                        }
                    ]
                });

            });
		//Variables globales list categories

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
			/*
				$_SESSION['cart'] = [
					[
					'product_id' => 3,
					'quantity' => 23,
					'product_name' =>'Producte 1',
					'product_price' => 23.87,
					],
				]
			*/
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

        automaticSlides();

        function automaticSlides()
        {
            slidePhoto++;
            slidePhoto = slidePhoto%3;
            resetClass();
            switch(slidePhoto)
            {
                case 0:
                    slidingImages[slidePhoto].style.display = "block";
                    dots[slidePhoto].className += " active";
                    break;
                case 1:
                    slidingImages[slidePhoto].style.display = "block";
                    dots[slidePhoto].className += " active";
                    break;
                case 2:
                    slidingImages[slidePhoto].style.display = "block";
                    dots[slidePhoto].className += " active";
                    break;
                default:
                    //empty case
                    break;
            }
            if(manual === false) {
                setTimeout(function() { automaticSlides(); }, 5000);
            }

        }


            $(".manual-slide").click(function()
            {
                manual = true;
                var id_class = $(this).attr('id');
                switch (id_class){
                    case 'previousSlide':
                        console.log(slidePhoto);
                        if(slidePhoto === 0)
                        {
                            resetClass();
                            slidingImages[slidingImages.length-1].style.display = "block";
                            dots[slidingImages.length-1].className += " active";
                            slidePhoto = slidingImages.length-1;
                        }
                        else
                        {
                            slidePhoto--;
                            slidePhoto = slidePhoto%3;
                            resetClass();

                            slidingImages[slidePhoto].style.display = "block";
                            dots[slidePhoto].className += " active";
                        }

                        break;
                    case 'nextSlide':
                        slidePhoto++;
                        resetClass();
                        slidePhoto = slidePhoto%3;
                        slidingImages[slidePhoto].style.display = "block";
                        dots[slidePhoto].className += " active";
                        break;
                    default:
                        slidePhoto = (id_class.split("_")[0])%3;
                        resetClass();
                        slidingImages[slidePhoto].style.display = "block";
                        dots[slidePhoto].className += " active";
                        break;
                }
            });

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
<!--BEGIN:FOOTER-->

<!--END:FOOTER-->
</html>
