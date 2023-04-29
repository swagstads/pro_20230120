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
            <span>Shopping cart</span>
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
                            <h1 class="breadcrumbHeading">Your Shopping Cart</h1>

                            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="./index.php" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">Your Shopping Cart</span>
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
                        <div class="cartContainer">
                            <h1 class="cartTitle hidden">Shopping cart</h1>
                            <div class="cartContent">

                                <div class="cart-product-wrapper">
                                    <div class="cart-product-container">
                                    </div>
                                </div>
                                <script>
                                    $("#cartEmptyContent").hide()

                                    function display_cart_data() {

                                        var api_url_for_cart_data = './api/fetch_cart_details.php';
                                        var order_history_table = document.querySelector(".cart-product-table");

                                        var form_data = {
                                            "orders": "previous"
                                        };

                                        $.ajax({
                                            url: api_url_for_cart_data,
                                            type: 'POST',
                                            data: form_data,
                                            success: function(returned_data) {
                                                var jsonData = JSON.parse(returned_data);
                                                var return_data = jsonData.response;
                                                let mrp_arr =[];
                                                let amount_arr = [],
                                                    total_amount = "";
                                                    // console.log(return_data);
                                                $(".cart-product-container").empty();

                                                if (jsonData.response.length >= 1) {

                                                    for (var i = 0; i < jsonData.response.length; i++) {
                                                        let input_id = "product_" + return_data[i].prod_id_;
                                                        let exact_amount = return_data[i].product_price * return_data[i].required_quantity;
                                                        let exact_mrp = return_data[i].product_mrp * return_data[i].required_quantity;
                                                        let amount = Math.round(exact_amount * 100) / 100;
                                                        let mrp = Math.round(exact_mrp * 100) / 100;
                                                        // console.log("ee",mrp);
                                                        let price_entity = "&#8377;"

                                                        currency = localStorage.getItem("currency");
                                                        if(currency === "USD"){
                                                            amount = parseFloat(amount / localStorage.getItem("inrRate")).toFixed(2)
                                                            mrp = parseFloat(mrp / localStorage.getItem("inrRate")).toFixed(2)
                                                            price_entity = "&#36;"
                                                        }
                                                        amount_arr.push(amount)
                                                        mrp_arr.push(mrp)
                                                        // console.log("ee",mrp_arr);
                                                        $(".cart-product-container").append(
                                                            '<div class="cart-product-container-row">' +
                                                            '<div class="left">' +
                                                            '<div class="image">' +
                                                            '<img src="./admin_panel/uploads/products/' + return_data[i].image_name + '"  alt="" srcset="">' +
                                                            '</div>' +
                                                            '</div>' +
                                                            '<div class="right">' +
                                                            '<div class="ordered-product-details">' +
                                                            '<div class="title">' +
                                                            '<h2>' + return_data[i].product_name + '</h2>' +
                                                            '</div>' +
                                                            '<div class="description truncate-overflow ">' +
                                                            return_data[i].product_description +
                                                            '</div>' +
                                                            '</div>' +
                                                            '<div class="quantity-container">Quantity' +
                                                            '<div class="manipulate-quantity-container justify-content-center ordered-quantity">' +
                                                                '<span class="input-number-decrement"' +
                                                                'onclick="decrease_quantity(' + return_data[i].prod_id_ + ',' + return_data[i].required_quantity + ',' + return_data[i].product_quantity + ')" >-</span>' +
                                                                '<span  id="prod_qnty_show" >' + return_data[i].required_quantity + '</span>' +
                                                                // '<input class="input-number"'+
                                                                //     'id="'+input_id+'" type="" value="'+return_data[i].required_quantity+'" min="1" max="'+return_data[i].required_quantity+'">'+
                                                                '<span class="input-number-increment"' +
                                                                'onclick="increase_quantity(' + return_data[i].prod_id_ + ',' + return_data[i].required_quantity + ',' + return_data[i].product_quantity + ')" >+</span>' +
                                                                '</div>' +
                                                            '</div>' +
                                                            '<div class="price">'+
                                                            'Amount:<h4>'+
                                                                '<span class="price-entity">'+price_entity+'</span>'+
                                                                '<span id="total_product_amount" data-inr="'+ amount +'">' + amount + '<span>'+
                                                            '</h4>' +
                                                            '</div>' +
                                                            '<div class="action">' +
                                                            '<a onclick="remove_from_cart(' + return_data[i].prod_id_ + ')" >' +
                                                            '<svg width="20px" height="20px" viewBox="0 0 1024 1024" fill="currentcolor" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M32 241.6c-11.2 0-20-8.8-20-20s8.8-20 20-20l940 1.6c11.2 0 20 8.8 20 20s-8.8 20-20 20L32 241.6zM186.4 282.4c0-11.2 8.8-20 20-20s20 8.8 20 20v688.8l585.6-6.4V289.6c0-11.2 8.8-20 20-20s20 8.8 20 20v716.8l-666.4 7.2V282.4z" fill="" /><path d="M682.4 867.2c-11.2 0-20-8.8-20-20V372c0-11.2 8.8-20 20-20s20 8.8 20 20v475.2c0.8 11.2-8.8 20-20 20zM367.2 867.2c-11.2 0-20-8.8-20-20V372c0-11.2 8.8-20 20-20s20 8.8 20 20v475.2c0.8 11.2-8.8 20-20 20zM524.8 867.2c-11.2 0-20-8.8-20-20V372c0-11.2 8.8-20 20-20s20 8.8 20 20v475.2c0.8 11.2-8.8 20-20 20zM655.2 213.6v-48.8c0-17.6-14.4-32-32-32H418.4c-18.4 0-32 14.4-32 32.8V208h-40v-42.4c0-40 32.8-72.8 72.8-72.8H624c40 0 72.8 32.8 72.8 72.8v48.8h-41.6z" fill="" /></svg>&nbsp; Remove' +
                                                            '</a>' +
                                                            '</div>' +
                                                            '</div>' +
                                                            '</div>'
                                                            )
                                                        // console.log(amount_arr);
                                                        // console.log(mrp_arr);
                                                        mrp_total_amount = (mrp_arr.reduce((total, current_val) => parseFloat(total) + parseFloat(current_val)) ) 
                                                        total_amount = (amount_arr.reduce((total, current_val) => parseFloat(total) + parseFloat(current_val)) )
                                                        // console.log(...amount_arr, "=>", total_amount);
                                                        $("#total_amount").text(total_amount)
                                                        $("#mrp_total").text(mrp_total_amount)
                                                        $("#total_amount_inp").val(total_amount)
                                                        $("#grand_total_amount").text(total_amount)
                                                    }
                                                    $("#cartEmptyContent").hide()
                                                } else {
                                                    $("#cartEmptyContent").show()
                                                    $(".add-new-address-bttn-container").hide()
                                                    $(".Total-amount-container").hide()
                                                    $("#total_amount_inp").val(0)
                                                    $("#checkout_bttn").hide()
                                                    $("#show_address").hide()
                                                }
                                            }
                                        })

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
                                                    // console.log(returned_data);
                                                    var jsonData = JSON.parse(returned_data);
                                                    var return_data = jsonData.response[0];
                                                    show_msg("Quantity Updated")
                                                    // console.log(return_data);
                                                    $("#product_" + product_id).val(decreased_qnty)
                                                    display_cart_data()
                                                }
                                            })
                                        } else {
                                            show_msg("Quantity cannot be 0")
                                        }
                                    }

                                    function increase_quantity(product_id, order_qnty, product_qnty) {
                                        let increased_qnty = order_qnty + 1;
                                        if (increased_qnty <= product_qnty) {
                                            event.preventDefault()
                                            let api_url = "./api/increase_qnty.php";
                                            // form data values
                                            var form_data = {
                                                "quantity_action": "increase",
                                                "product_id": product_id,
                                                "quantity": increased_qnty
                                            };
                                            $.ajax({
                                                url: api_url,
                                                type: 'POST',
                                                // type: 'GET',
                                                data: form_data,
                                                success: function(returned_data) {
                                                    // console.log(returned_data);
                                                    var jsonData = JSON.parse(returned_data);
                                                    var return_data = jsonData.response[0];
                                                    show_msg("Quantity Updated")
                                                    // console.log("Quantity:", return_data);
                                                    display_cart_data()
                                                }
                                            })
                                        } else {
                                            show_msg("Stock not available")
                                        }
                                    }

                                    function remove_from_cart(product_id) {
                                        event.preventDefault()
                                        let api_url_delete_from_cart = "./api/delete_cart_product.php";
                                        var form_data = {
                                            "remove": "yes",
                                            "product_id": product_id
                                        };
                                        $.ajax({
                                            url: api_url_delete_from_cart,
                                            type: 'POST',
                                            data: form_data,
                                            success: function(returned_data) {
                                                // console.log("yeah");
                                                var jsonData = JSON.parse(returned_data);
                                                // console.log("yeah", returned_data);
                                                var return_data = jsonData.response;
                                                show_msg("Product removed from cart")
                                                display_cart_data()
                                            }
                                        })
                                        cart_count();
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
                                            // console.log(return_data);
                                            if (return_data.status === "ok") {
                                                // console.log("Address", return_data.status);
                                                $("#address_div").text(return_data.address)
                                            } else {
                                                // show_msg("Please provide your address to checkout")
                                                $("#address_div").html("<small><i>Please provide adress</i></small>")
                                            }
                                        }


                                    })

                                    //  ======= checkout button function - verify address and proceed for payment =======
                                    function checkout() {
                                        event.preventDefault()
                                        let api_url = "./api/checkout.php";
                                        // form data values
                                        var form_data = {
                                            "checkout": "yes"
                                        };
                                        $.ajax({
                                            url: api_url,
                                            type: 'GET',
                                            data: form_data,

                                            success: function(returned_data) {
                                                // console.log(returned_data);
                                                var jsonData = JSON.parse(returned_data);
                                                var return_data = jsonData.response[0];
                                                // console.log(return_data);
                                                if (return_data.status === "ok") {
                                                    window.location.href = "./checkout.php"
                                                } else {
                                                    show_msg(return_data.message)
                                                }
                                            }
                                        })
                                    }
                                </script>
                                <div class="Total-amount-container">
                                    
                                <h5>
                                        <div class="left">
                                            <span>MRP Total:</span> 
                                        </div>
                                        <div class="right">
                                            <span>
                                                <span class="price-entity">&#8377;</span>
                                            </span>
                                            <span class="total-amount " id="mrp_total"></span>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="left">
                                            <span>Our total:</span> 
                                        </div>
                                        <div class="right">
                                            <span>
                                                <span class="price-entity">&#8377;</span>
                                            </span>
                                            <span class="total-amount " id="total_amount"></span>
                                        </div>
                                    </h5>
                                    <h5>
                                        <div class="left">
                                            <span>Discount:</span>
                                        </div>
                                        <div  style='color: green' class="right">
                                            <span>-</span>
                                            <span>
                                                <span class="price-entity">&#8377;</span>
                                            </span>
                                            <span class="discount-amount">0</span>
                                        </div>
                                    </h5>
                                    <h4>
                                        <div class="left">
                                            <span>Total:</span>
                                        </div>
                                        <div class="right">
                                            <span>
                                                <span class="price-entity">&#8377;</span>
                                            </span>
                                            <span class="grand-total-amount" id="grand_total_amount">0</span>
                                        </div>
                                    </h4>
                                    <input type="hidden" id="total_amount_inp" value="0">
                                    <input type="hidden" id="grand_total_amount_inp" value="0">
                                </div>


                                <?php
                                if (isset($_SESSION['username'])) { // If logged in
                                    $userid = $_SESSION['user_id'];
                                    $sql = "SELECT * FROM cart WHERE user_id= '$userid' ";
                                    $result = $dbh->query($sql);

                                    if ($result->rowCount() > 0) {
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        }
                                ?>
                                        <br>
                                        <div class="show-addresss" id="show_address">
                                            <div class="text">
                                                <h5>Your delivery Address:</h5>
                                            </div>
                                            <div class="address-div" id="address_div">

                                            </div>

                                            <!-- New address modal -->
                                            <div id="new_address_modal" class="new-address-modal">
                                                <div class="address-fields">
                                                    <div class="modal-top">
                                                        <label for="Address">
                                                            <h4>New Delivery Address:</h4>
                                                        </label>
                                                        <div onclick="removeModalVisibility()" class="close-bttn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="25px" height="25px">
                                                                <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <form onsubmit="insert_new_address()">
                                                        <div class="address-inputs">
                                                            <div class="address-field-row">
                                                                <input type="hidden" class="profile_address_id" name="" id="address_id">
                                                                <p class="info address"><input type="text" pattern="^[a-zA-Z0-9\.\,\-\#\(\)\s]{1,100}$" placeholder="Address Line 1" name="" id="address_line_1" required></p>
                                                                <p class="info address"><input type="text" pattern="^[a-zA-Z0-9\.\,\-\#\(\)\s]{1,100}$" placeholder="Address Line 2" name="" id="address_line_2" required></p>
                                                            </div>
                                                            <div class="address-field-row">
                                                                <p class="info address"><input type="text" placeholder="City" pattern="^[a-zA-Z\s]{1,100}$" name="" id="address_city" required></p>
                                                                <p class="info address"><input type="text" placeholder="State" pattern="^[a-zA-Z\s]{1,100}$" name="" id="address_state" required></p>
                                                                <p class="info address"><input type="tel" pattern="^\d{6}$" placeholder="Zip" name="" id="address_zip" required></p>
                                                            </div>
                                                            <div class="submit-bttn">
                                                                <button type="submit" class="submit-button">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <script>
                                                    // $(document).click(function() {
                                                    //     var container = $("#new_address_modal");
                                                    //     if(!container.hasClass(".disp-none")){
                                                    //         if (container.is(event.target) && container.has(event.target).length) {
                                                    //             removeModalVisibility();
                                                    //         }
                                                    //     }
                                                    // });
                                                    function addModalVisibility() {
                                                        // console.log("ADD");
                                                        $("#new_address_modal").show()
                                                    }
                                                    function removeModalVisibility() {
                                                        // console.log("remove");
                                                        $("#new_address_modal").hide()
                                                    }
                                                    removeModalVisibility()
                                                    function insert_new_address() {
                                                        event.preventDefault()
                                                        let api_url_ = "./api/insert_address.php";

                                                        // form data values
                                                        let address_id = document.getElementById("address_id").value;
                                                        let address_line_1 = document.getElementById("address_line_1").value;
                                                        let address_line_2 = document.getElementById("address_line_2").value;
                                                        let address_city = document.getElementById("address_city").value;
                                                        let address_state = document.getElementById("address_state").value;
                                                        let address_zip = document.getElementById("address_zip").value;

                                                        var form_data = {
                                                            "edit_address": "yes",
                                                            "address_id": address_id,
                                                            "address_line_1": address_line_1,
                                                            "address_line_2": address_line_2,
                                                            "address_city": address_city,
                                                            "address_state": address_state,
                                                            "address_zip": address_zip,
                                                            // "cart_ids": cart_ids
                                                        };
                                                        $.ajax({
                                                            url: api_url_,
                                                            type: 'POST',
                                                            data: form_data,
                                                            success: function(returned_data) {
                                                                // console.log(returned_data);
                                                                var jsonData = JSON.parse(returned_data);
                                                                var return_data = jsonData.response[0];
                                                                // console.log(return_data);
                                                                if (return_data.status === "ok") {
                                                                    $("#address_div").text(return_data.updated_address)
                                                                    removeModalVisibility();
                                                                    show_msg(return_data.message)
                                                                }
                                                            }
                                                        })
                                                    }
                                                </script>
                                            </div>

                                            <div id="coupon" class="new-address-modal">
                                                <div class="address-fields">
                                                    <div class="modal-top">
                                                        <label for="Address">
                                                            <h4>Coupon Code</h4>
                                                        </label>
                                                        <div onclick="removeCoupon()" class="close-bttn">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="25px" height="25px">
                                                                <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <form onsubmit="check_coupon()">
                                                        <div class="address-inputs">
                                                            <div class="address-field-row">
                                                                <input type="hidden" class="profile_address_id" name="" id="address_id">
                                                                <p class="info address">
                                                                    <input type="text" placeholder="Coupon Code" name="coupon_code" id="coupon_code"></p>
                                                            </div>
                                                            <div class="submit-bttn">
                                                                <button type="submit" class="submit-button">Add</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <script>
                                                    // $(document).click(function() {
                                                    //     var container = $("#new_address_modal");
                                                    //     if(!container.hasClass(".disp-none")){
                                                    //         if (container.is(event.target) && container.has(event.target).length) {
                                                    //             removeModalVisibility();
                                                    //         }
                                                    //     }
                                                    // });
                                                    
                                                    function addCoupon() {
                                                        // console.log("ADD");
                                                        $("#coupon").show()
                                                        $("#coupon_code").val(localStorage.getItem("coupon"))
                                                    }
                                                    if(localStorage.getItem("coupon")){
                                                        $(document).ready(function(){
                                                        changeText("Coupon Applied")
                                                        $("#coupon_code").val(localStorage.getItem("coupon"))

                                                        discount_amount = localStorage.getItem("coupon_amount"); 
                                                        // console.log(discount_amount);

                                                        $(".discount-amount").text(" "+discount_amount)
                                                        var subtotal = $("#total_amount_inp").val()
                                                        var total_amount = subtotal - discount_amount;
                                                        $("#grand_total_amount").text(total_amount)
                                                    })
                                                    }else{
                                                        $(document).ready(function(){
                                                        $("#coupon_btn_message").text("Add Coupon Code")
                                                        })
                                                    }
                                                    function changeText(newText) {
                                                        $("#coupon_btn_message").text(newText)
                                                    }
                                                    function onRemoveCoupon() {
                                                        changeText('Add Coupon Code');
                                                        if(localStorage.getItem('coupon')){
                                                            localStorage.removeItem('coupon')
                                                            localStorage.removeItem('coupon_amount')
                                                            show_msg("Coupon removed")
                                                            
                                                            $(".discount-amount").text("0")
                                                            var subtotal = $("#total_amount_inp").val()
                                                            var total_amount = subtotal;
                                                            $("#grand_total_amount").text(total_amount)

                                                        }
                                                        else{
                                                            show_msg("No coupon applied to remove")
                                                        }
                                                    }
                                                    function removeCoupon() {
                                                        // console.log("remove");
                                                        $("#coupon").hide()
                                                        $("#coupon_code").val(localStorage.getItem("coupon"))
                                                    }
                                                    removeCoupon()
                                                    function check_coupon() {
                                                        event.preventDefault()
                                                        let api_url_ = "./api/coupon.php";

                                                        // form data values
                                                        let address_id = document.getElementById("address_id").value;
                                                        let coupon_code = document.getElementById("coupon_code").value;

                                                        var form_data = {
                                                            "chk_coupon": "chk_coupon",
                                                            "address_id": address_id,
                                                            "coupon_code": coupon_code,
                                                            // "cart_ids": cart_ids
                                                        };
                                                        $.ajax({
                                                            url: api_url_,
                                                            type: 'POST',
                                                            data: form_data,
                                                            success: function(returned_data) {
                                                                // console.log(returned_data);
                                                                var jsonData = JSON.parse(returned_data);
                                                                var return_data = jsonData.response[0];
                                                                // console.log(return_data);
                                                                if (return_data.status === "active") {
                                                                    localStorage.setItem("coupon_amount",return_data.amount)
                                                                    localStorage.setItem("coupon",return_data.coupon_name)
                                                                    removeCoupon();
                                                                    changeText("Coupon Applied")
                                                                    $(".discount-amount").text(return_data.amount)
                                                                    var subtotal = $("#total_amount_inp").val()
                                                                    var total_amount = subtotal - return_data.amount;
                                                                    $("#grand_total_amount").text(total_amount)
                                                                }
                                                                show_msg(return_data.message)
                                                            }
                                                        })
                                                    }
                                                </script>
                                            </div>

                                            <!-- <textarea name="address" id="user_address" class="info" placeholder="Please provide your dilevery address" cols="30" rows="2"></textarea>
                                            <div onclick="save_address()" class="save-bttn"><button>Save Address</button></div> -->
                                        </div>
                                        <div onclick="addModalVisibility()" class="add-new-address-bttn-container">
                                            <button class="submit-button">Add new Address</button>
                                        </div>
                                        <div class="add-new-address-bttn-container" style="display:flex;justify-content: space-between;">
                                            <div> 
                                                <button onclick="addCoupon()" class="submit-button"><pa id="coupon_btn_message"></pa></button>
                                                <button type="submit" class="submit-button" onclick="onRemoveCoupon()">Remove Coupon</button>
                                            </div>
                                            <button class="submit-button" id="checkout_bttn" style="float: right;" onclick="checkout()">Checkout</button>
                                        </div>

                                    <?php
                                    } 
                                    ?>

                                    <div class='cartEmptyContent' id="cartEmptyContent">
                                        <p class='cartEmpty'>Your cart is currently empty.</p>
                                        <p>
                                            Before proceed to checkout you must add some products to
                                            your shopping cart.<br />
                                            You will find a lot of interesting products on our
                                            Website.
                                        </p>
                                        <p>
                                            <a class='btn btnVelaOne' href='./products.php' title='Go to Shopping'>Go to Shopping</a>
                                        </p>
                                    </div>

                                <?php
                                } // If logged in
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
                                    // If not logged in
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>



        <div id="shopify-section-vela-footer" class="shopify-section">
            <footer id="velaFooter">
                <?php include('footer.php'); ?>
            </footer>
        </div>


        <?php include('footer_links.php'); ?>
        <script src="js/main.js?key=<?= date('is') ?>" type="text/javascript"></script>

</body>

<!--  cart  27:04 GMT -->

</html>