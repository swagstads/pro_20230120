<!DOCTYPE html>
 
<html class="no-js" lang="en">
 

<!--  cart  27:04 GMT -->
 
<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 

<style>
    .show-address{
        display: flex;
        width: 100%;
        /* justify-content: center; */
        align-items: center;
        gap: 20px;
    }
    .show-address textarea{
        resize: none;
        border: none;
        border-bottom: 1px solid;
    }
    .new-address-modal{
        background-color: rgba(0, 0, 0, 0.67);
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 999;
    }
    .new-address-modal .address-fields{
        background-color: white;
        padding: 20px 40px ;
        border-radius: 10px 10px 10px 10px;
    }
    .new-address-modal .address-fields .address-field-row{
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }
    .new-address-modal .address-fields .address-field-row p{
        width: 100%;
    }
    .new-address-modal .address-fields .address-field-row{
        width: 100%;
    }
    .new-address-modal .modal-top{
        width: 100%;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid;
    }
    .new-address-modal .address-inputs{
        position: relative;
        margin-top: 20px;
    }
    .submit-button {
        border:none;
        background-color: #0d6efd;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        transition: 0.3s;
      }
      .submit-button:hover {
        color: white;
        background: var(--vela-color-secondary); 
    }
    .new-address-modal input[type="text"],
    .new-address-modal input[type="email"],
    .new-address-modal input[type="password"],
    .new-address-modal input[type="number"],
    .new-address-modal input[type="tel"] {
        border: none;
        border-bottom: 1px solid var(--vela-color-primary);
        background-color: transparent;
        font-size: 1.5rem;
        padding: 10px 5px;
        width: 100%;
        transition: all 0.3s ease-in-out;
    }
    .new-address-modal input[type="text"]:focus,
    .new-address-modal input[type="email"]:focus,
    .new-address-modal input[type="password"]:focus,
    .new-address-modal input[type="number"]:focus,
    .new-address-modal input[type="tel"]:focus {
        border-bottom: 1px solid var(--vela-color-secondary);
    /* outline: none; */
    }
    .new-address-modal input[type="text"]:disabled,
    .new-address-modal input[type="email"]:disabled,
    .new-address-modal input[type="password"]:disabled,
    .new-address-modal input[type="number"]:disabled,
    .new-address-modal input[type="tel"]:disabled{
        border-bottom: 1px solid grey;
        opacity: 0.7;
        background: lightgrey
    }
    .close-bttn{
        cursor: pointer !important;
    }
    @media (max-width: 768px) {
        .new-address-modal .address-fields{
            width: 90%;
        }
        .new-address-modal .address-fields .address-field-row>*{
            min-width: 20px;
        }
        .new-address-modal .address-fields .address-field-row{
            flex-wrap: wrap ;
        }
    }
</style>

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
                                    <a href="index.html" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
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

<table id='cart-product-table' width="100%">
  <tr>
      <th width="60%">Product</th>
      <th width="10%">Price</th>
      <th width="15%">Quantity</th>
      <th width="10%">Total</th>
      <th width="5%">Action</th>
  </tr>
  <tr> 
      <td>
          <div>
              <img src='' alt=''>
          </div>
          <div class='cart-product-info'>
              <div class='cart-prodct-title'>
                  Title
              </div>
              <div class='cart-product-description'>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum qui voluptatibus, expedita inventore, eos error harum voluptates reprehenderit officia odit porro pariatur? Officiis quod quas, tempore ipsam assumenda eveniet!
              </div>
          </div>
      </td>
      <td>
          &#8377; 1600
      </td>
      <td>
          <span class='input-number-decrement'>–</span><input class='input-number' type='text' value='1' min='0' max='10'><span class='input-number-increment'>+</span>
      </td>
      <td>
          &#8377;1600
      </td>
      <td>
          <a href=""><i class="fa fa-trash"></i></a>
      </td>
  </tr>
</table>



<?php
    if(isset($_SESSION['username'])){ // If logged in
        $userid = $_SESSION['user_id'];
        $sql = "SELECT * FROM cart WHERE user_id= '$userid' ";
        $result = $dbh->query($sql);

        if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
               
            }
?>
        </table>
        <br>
        <div class="show-address">
            <div class="text"> <h5>Your delivery Address:</h5> </div>

            <!-- New address modal -->
            <div id="new_address_modal" class="new-address-modal disp-none">
                <div class="address-fields">
                    <div class="modal-top">
                        <label for="Address"><h4>New Delivery Address:</h4></label>
                        <div  onclick="removeModalVisibility()"  class="close-bttn">
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="25px" height="25px"><path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="address-inputs">
                        <div class="address-field-row">
                        <input type="hidden" class="profile_address_id" name="" id="address_id">
                        <p class="info address"><input type="text" placeholder="Address Line 1" name="" id="address_line_1" required></p>
                        <p class="info address"><input type="text" placeholder="Address Line 2" name="" id="address_line_2" required></p>
                        </div>
                        <div class="address-field-row">
                        <p class="info address"><input type="text" placeholder="City" name="" id="address_city" required></p>
                        <p class="info address"><input type="text" placeholder="State" name="" id="address_state" required></p>
                        <p class="info address"><input type="tel" pattern="[0-9]+"  placeholder="Zip" name="" id="address_zip" required></p>
                        </div>
                        <div class="submit-bttn">
                            <button type="submit" onclick="insert_new_address()" class="submit-button">Save</button>
                        </div>
                    </div>
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
                    function addModalVisibility(){
                        console.log("ADD");
                        $("#new_address_modal").removeClass("disp-none")
                    }
                    function removeModalVisibility(){
                        console.log("remove");
                        $("#new_address_modal").addClass("disp-none")
                    }
                    function insert_new_address(){
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
                                "edit_address":"yes",
                                "address_id": address_id,
                                "address_line_1": address_line_1,
                                "address_line_2": address_line_2,
                                "address_city": address_city,
                                "address_state" : address_state,
                                "address_zip" : address_zip,
                                "cart_ids": cart_ids
                            };
                            $.ajax({
                            url: api_url_,
                            type: 'POST',
                            data: form_data,
                            success: function (returned_data) {
                                    console.log(returned_data);
                                    var jsonData = JSON.parse(returned_data);
                                    var return_data = jsonData.response[0];
                                    console.log(return_data);
                                    $(".address-div").text(return_data.updated_address)
                                    show_msg(return_data.message)
                                }
                            })
                    }
                </script>
            </div>


            <div class="address-div">

            </div>
            <!-- <textarea name="address" id="user_address" class="info" placeholder="Please provide your dilevery address" cols="30" rows="2"></textarea>
            <div onclick="save_address()" class="save-bttn"><button>Save Address</button></div> -->
        </div>
        <div onclick="addModalVisibility()" class="add-new-address-bttn-container">
            <button class="submit-button">Add new Address</button>
        </div>
        <br>
        <button class="submit-button" onclick="checkout()">checkout</button>

        <!-- payment gateway - do not touch  -->
        <button class="disp-none" id="rzp-button1">Pay</button>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
        var options = {
            "key": "rzp_test_vMCLbtwM7n8HDj", // Enter the Key ID generated from the Dashboard
            "amount": "100", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "AToZ Furnishing",
            "description": "Test Transaction",
            "image": "",
            "handler": function (response){
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
        rzp1.on('payment.failed', function (response){
                // show_msg(response.error.code);
                show_msg(response.error.description);
                // show_msg(response.error.source);
                // show_msg(response.error.step);
                // show_msg(response.error.reason);
                // show_msg(response.error.metadata.order_id);
                // show_msg(response.error.metadata.payment_id);
        });
        document.getElementById('rzp-button1').onclick = function(e){
            rzp1.open();
            e.preventDefault();
        }
        </script>

        <!-- payment gateway code end -->
        <script>
            let api_url = "./api/fetch_address.php";
            let api_url_cart_data = "./api/fetch_cart_details.php";
            let cart_ids = [];
            var form_data = {"fetch_address":"fetch"};

            let address_field = $(".address-div")

            $.ajax({    
            url: api_url,
            type: 'GET',
            data: form_data,

            success: function (returned_data) {
                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response[0];
                    console.log(return_data);
                    if(return_data.status === "ok"){
                        address_field.text(return_data.address)
                        $.ajax({    
                            url: api_url_cart_data,
                            type: 'GET',
                            data: form_data,

                            success: function (returned_data) {
                                    var jsonData = JSON.parse(returned_data);
                                    // for (var i = 0; i < jsonData.response.length; i++) {
                                    var jsonData = JSON.parse(returned_data);
                                    var return_data = jsonData.response[0];
                                    cart_ids.push(return_data.cart_id)
                                    // }
                                    // console.log(cart_ids);
                                }
                            })


                    }
                    else{
                        // show_msg("Please provide your address to checkout")
                    }
                }


            })

            function checkout(){
                event.preventDefault()
                let api_url = "./api/checkout.php";
                // form data values
                var form_data = {"checkout":"yes"};
                $.ajax({
                url: api_url,
                type: 'GET',
                data: form_data,

                success: function (returned_data) {
                        console.log(returned_data);
                        var jsonData = JSON.parse(returned_data);
                        var return_data = jsonData.response[0];
                        console.log(return_data);
                        if(return_data.status === "ok"){
                            $("#rzp-button1").click()
                        }
                        else{
                            show_msg(return_data.message)
                        }
                    }
                })
            }
        </script>


        
<?php
}
else {
echo "<div class='cartEmptyContent'>
        <p class='cartEmpty'>Your cart is currently empty.</p>
        <p>
            Before proceed to checkout you must add some products to
            your shopping cart.<br />
            You will find a lot of interesting products on our
            Website.
        </p>
        <p>
            <a class='btn btnVelaOne' href='collections/all.html' title='Go to Shopping'>Go
                to Shopping</a>
        </p>
    </div>";
}
?>
<?php
    } // If logged in
    else{ // If not logged in
?>
                    <div class="cartEmptyContent">
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