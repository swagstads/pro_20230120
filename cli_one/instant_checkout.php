<!DOCTYPE html>

<html class="no-js" lang="en">


<!--  cart  27:04 GMT -->

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <?php include('header_links.php') ?>
</head>

<body id="your-shopping-cart" class="template-cart velaFloatHeader">
    <div id="cartDrawer" class="drawer drawerRight">
        <div class="drawerClose">
            <span class="jsDrawerClose"></span>
        </div>
        <div class="drawerCartTitle">
            <span>Check out</span>
        </div>
        <div id="cartContainer"></div>
    </div>

    <div id="pageContainer" class="isMoved">
        <div id="shopify-section-vela-header" class="shopify-section">
            <header id="velaHeader" class="velaHeader">
                <?php include('header.php') ?>
            </header>
        </div>
        <div id="shopify-section-vela-breacrumb-image" class="shopify-section">
            <section class="velaBreadcrumbs hasBackgroundImage floaHeader">
                <div class="velaBreadcrumbsInner" style="background-color: #ffffff">
                    <div class="velaBreadcrumbImage">
                        <img alt="Outstock" src="./cdn.shopify.com/s/files/1/1573/5553/files/bread-blog8c8c.jpg?v=1614329640" />
                    </div>
                    <nav class="velaBreadcrumbWrap container">
                        <div class="velaBreadcrumbsInnerWrap">
                            <h1 class="breadcrumbHeading">Checkout</h1>

                            <ol class="breadcrumb">
                                <li itemprop="itemListElement">
                                    <a href="./index.php" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">Checkout</span>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </section>
        </div>
        <main class="mainContent" role="main">
            <section id="pageContent">
                <div class="container">
                    <div id="shopify-section-vela-template-cart" class="shopify-section">
                        <!-- First check logged in -->
                        <?php
                        if ($_SESSION['username']) { // if logged in
                        ?>
                            <!-- when logged in  -->
                            <div class="cart-product-wrapper">
                                <div class="cart-product-container">
                                </div>
                            </div>
                            <div class="Total-amount-container">
                                <h3>Total: <span class="price-entity">&#8377;</span><span class="total-amount" id="total_amount"></span></h3>
                                <input type="hidden" id="total_amount_inp" value="0">
                            </div>

                            <!-- Payment gateway js link -->
                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

                            <script>
                                $("#cartEmptyContent").hide()

                                function display_cart_data() {

                                    var api_url_for_instant_checkout_data =  './api/fetch_single_product.php';
                                    var order_history_table = document.querySelector(".cart-product-table");

                                    var form_data = {
                                        "fetch_products": "fetch",
                                        "productid": localStorage.getItem("instant_checkout_product_id")
                                    };

                                    $.ajax({
                                            url: api_url_for_instant_checkout_data,
                                            type: 'GET',
                                            data: form_data,
                                            success: function(returned_data) {
                                                $(".cart-product-container").empty();
                                                var jsonData = JSON.parse(returned_data);
                                                var return_data = jsonData.response[0];
                                                console.log(returned_data);

                                                let total_amount = return_data.price * parseInt(localStorage.getItem("instant_checkout_quantity"))

                                                let price_entity = "&#8377;"
                                                currency = localStorage.getItem("currency");
                                                if(currency === "USD"){
                                                    total_amount = (total_amount / localStorage.getItem("inrRate")).toFixed(2)
                                                    price_entity = "&#36;"
                                                }

                                                $("#total_amount").text(total_amount)
                                                $("#total_amount_inp").val(total_amount)

                                                $(".cart-product-container").append('<div class="cart-product-container-row">' +
                                                        '<div class="left">' +
                                                        '<div class="image">' +
                                                        '<img src="./admin_panel/uploads/products/' + return_data.image_name[0]+ '" alt="" srcset="">' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '<div class="right">' +
                                                        '<div class="ordered-product-details">' +
                                                        '<div class="title">' +
                                                        '<h2>' + return_data.title + '</h2>' +
                                                        '</div>' +
                                                        '<div class="description truncate-overflow ">' +
                                                        return_data.description +
                                                        '</div>' +
                                                        '</div>' +
                                                        '<div class="quantity-container">Quantity' +
                                                        '<div class="ordered-quantity">' +
                                                        '<h4>' + localStorage.getItem("instant_checkout_quantity") + '</h4>' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '<div class="action">' +

                                                        '</div>' +
                                                        '<div class="price">' +
                                                        'Amount: &nbsp;'+
                                                        '<h4>'+
                                                            '<span class="price-entity">'+price_entity+'</span>'+
                                                            '<span id="total_product_amount">' + (total_amount) + '<span>'+
                                                        '</h4>' +
                                                        '</div>' +
                                                        '</div>' +
                                                        '</div>')
                                                }

                                        })
                                        .done(function() {
                                            let currency = localStorage.getItem("currency")
                                            if(!currency){
                                                currency = "INR"
                                            }
                                            var options = {
                                                "key": "rzp_test_vMCLbtwM7n8HDj", // Enter the Key ID generated from the Dashboard
                                                "amount": (parseFloat($("#total_amount_inp").val()) * 100), // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                                                "currency": currency,
                                                "name": "AToZ Furnishing",
                                                "description": "Test Transaction",
                                                "image": "",
                                                "handler": function(response) {
                                                    show_msg(response.razorpay_payment_id);
                                                    show_msg(response.razorpay_order_id);
                                                    show_msg(response.razorpay_signature)
                                                },
                                                "prefill": {
                                                    "name": "Gaurav Kumar",
                                                    "email": "gaurav.kumar@example.com",
                                                    "contact": "9000090000"
                                                },
                                                "notes": {
                                                    "address": "Razorpay Corporate Office"
                                                },
                                                "theme": {
                                                    "color": "#3399cc"
                                                }
                                            };
                                            var rzp1 = new Razorpay(options);
                                            rzp1.on('payment.failed', function(response) {
                                                // show_msg(response.error.code);
                                                show_msg(response.error.description);
                                                // show_msg(response.error.source);
                                                // show_msg(response.error.step);
                                                // show_msg(response.error.reason);
                                                // show_msg(response.error.metadata.order_id);
                                                // show_msg(response.error.metadata.payment_id);
                                            });


                                            document.getElementById('rzp-button1').onclick = function(e) {
                                                rzp1.open();
                                                e.preventDefault();
                                            }
                                        });

                                }


                                display_cart_data()

                                function decrease_quantity(product_id, order_qnty, product_qnty) {
                                    let decreased_qnty = order_qnty - 1;
                                    if (decreased_qnty < product_qnty && decreased_qnty !== 0) {
                                        let api_url = "./api/increase_qnty.php";
                                        // form data values
                                        var form_data = {
                                            "quantity_action": "increase",
                                            "product_id": product_id,
                                            "quantity": decreased_qnty
                                        };
                                        $.ajax({
                                            url: api_url,
                                            type: 'POST',
                                            // type: 'GET',
                                            data: form_data,
                                            success: function(returned_data) {
                                                console.log(returned_data);
                                                var jsonData = JSON.parse(returned_data);
                                                var return_data = jsonData.response[0];
                                                show_msg("Quantity Updated")
                                                console.log(return_data);
                                                $("#product_" + product_id).val(decreased_qnty)
                                                display_cart_data()
                                            }
                                        })
                                    } else {
                                        show_msg("Quantity cannot be 0")
                                    }
                                }
                                // ====== fetch address ======

                                let api_url_fetch_address = "./api/fetch_address.php";
                                // let cart_ids = [];
                                var form_data = {
                                    "fetch_address": "fetch"
                                };

                                let address_field = $(".address-div")


                                $.ajax({
                                    url: api_url_fetch_address,
                                    type: 'GET',
                                    data: form_data,

                                    success: function(returned_data) {
                                        var jsonData = JSON.parse(returned_data);
                                        var return_data = jsonData.response[0];
                                        console.log(return_data);
                                        if (return_data.status === "ok") {
                                            console.log("Address", return_data.status);
                                            $("#rzp-button1").removeAttr('disabled');
                                        } else {
                                            show_msg("Please provide your address to checkout")
                                            $(".Address-details").text("Please provide valid address to pay")
                                        }
                                    }
                                })
                            </script>

                            <!-- payment gateway - do not touch  -->
                            <div class="Address-details">

                            </div>
                            <span>
                                <span>
                                    <button class="submit-button" id="rzp-button1" style="float: right;" disabled>Pay</button>
                                </span>
                                <span>
                                    <a id="back_to_product_page_bttn"><button class="submit-button" id="Edit">Edit</button></a>
                                    <script>
                                            let prod_id = localStorage.getItem("instant_checkout_product_id")
                                            $("#back_to_product_page_bttn").attr("href","./productpage.php?productid="+prod_id)
                                    </script>
                                </span>
                            </span>

                            <br><br>
                            <!-- payment gateway code end -->


                            <!-- when logged in end -->
                        <?php
                        } // when logged in ended
                        else { // If not logged in
                        ?>
                            <div class="loginContent">
                                <p class="cartEmpty">You haven't logged in yet.</p>
                                <p>
                                    Please Login to continue.
                                </p>
                                <p>
                                    <a class="btn btnVelaOne" href="./login-page.php" title="Go to Shopping">
                                        Login
                                    </a>
                                </p>
                            </div>
                        <?php
                            // If not logged in end
                        }
                        ?>
                    </div>
                </div>
            </section>


            <!-- if yes -> show products if any with quantity and them check out else show no products to checkout -->
            <!-- else -> show login first option  -->
        </main>
        <div id="shopify-section-vela-footer" class="shopify-section">
            <footer id="velaFooter">
                <?php include('footer.php'); ?>
            </footer>
        </div>

    </div>

    <?php include('footer_links.php'); ?>
    <script src="js/main.js?key=<?= date('is') ?>" type="text/javascript"></script>
</body>

<!--  cart  27:04 GMT -->

</html>