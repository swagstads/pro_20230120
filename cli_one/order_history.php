<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>

     <div id="cartDrawer" class="drawer drawerRight">
        <div class="drawerClose">
            <span class="jsDrawerClose"></span>
        </div>
        <div class="drawerCartTitle">
            <span>Shopping cart</span>
        </div>
        <div id="cartContainer"></div>
    </div>
    <?php include('./header_links.php') ?>
    <div id="pageContainer" class="isMoved">
        <div id="shopify-section-vela-header" class="shopify-section">
            <header id="velaHeader" class="velaHeader">
                <?php include('./header.php'); ?>
            </header>
        </div>
        <div class="header-height">
            
        </div>
        <div id="shopify-section-vela-breacrumb-image" class="shopify-section">


            <section class="velaBreadcrumbs hasBackgroundImage floaHeader">
                <div class="velaBreadcrumbsInner" style="background-color: #ffffff">
                    <div class="velaBreadcrumbImage">
                        <img alt="Outstock"
                            src="./cdn.shopify.com/s/files/1/1573/5553/files/bread-blog8c8c.jpg?v=1614329640" />
                    </div>
                    <nav class="velaBreadcrumbWrap container">
                        <div class="velaBreadcrumbsInnerWrap">
                            <h2 class="breadcrumbHeading">Order History</h2>
                            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="../index.html" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">Order History</span>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </section>
        </div>
        <main class="">
            <div class="order-history-wrapper">
                <div class="order-history-container">
        
                    <!-- <div class="order-history-container-row">
                        <div class="left">
                            <div class="image">
                                <img src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" alt="" srcset="">
                            </div>
                        </div>
                        <div class="right">
                            <div class="ordered-product-details">
                                <div class="title">
                                    <h2>Title</h2>
                                </div>
                                <div class="description truncate-overflow ">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum illo cumque dolorum quis. Quis nihil cumque quaerat. Odit aspernatur, illo vitae veritatis vel ullam, unde asperiores molestiae perferendis tempora voluptas.
                                </div>
                            </div>
                            <div class="ordered-quantity">
                                    Qnty:5
                            </div>
                            <div class="dilevery-date">
                                12/05/2022
                            </div>
                            <div class="price">
                                Rs. 1500
                            </div>
                        </div>
                    </div> -->
        
                </div>
            </div>
      </main>
    </div>



    <script>
        var api_url = './api/prev_orders.php';
        let user_id = "<?php $_SESSION['user_id'] ?>";
        var order_history_table = document.querySelector(".order-history-table");

        var form_data = { "orders": "previous","user_id":user_id};

        $.ajax({
            url: api_url,
            type: 'POST',
            data: form_data,
            success: function (returned_data) {
                console.log(returned_data);
                var jsonData = JSON.parse(returned_data);
                var return_data = jsonData.response;
                if(return_data.length > 0){
                    for (var i = 0; i < return_data.length; i++) {
                        $(".order-history-container").append('<div class="order-history-container-row">'+
                            '<div class="left">'+
                                '<div class="image">'+
                                    '<img src="./admin_panel/uploads/products/'+return_data[i].image_name+'" height="200px" alt="" srcset="">'+
                                '</div>'+
                            '</div>'+
                            '<div class="right">'+
                                '<div class="ordered-product-details">'+
                                    '<div class="title">'+
                                        '<h2>'+return_data[i].title+'</h2>'+
                                    '</div>'+
                                    '<div class="description truncate-overflow ">'+
                                        return_data[i].description+
                                    '</div>'+
                                '</div>'+
                                '<div class="ordered-quantity">'+
                                        'Qnty: &nbsp;<h4>'+return_data[i].order_quantity+'</h4>'+
                                '</div>'+
                                '<div class="dilevery-date">'+
                                    'Dilevery on: &nbsp;<h4>'+return_data[i].delivery_date+'</h4>'+
                                '</div>'+
                                '<div class="price">'+
                                    'Amount: &nbsp;<h4>Rs.'+return_data[i].amount+'</h4>'+
                                '</div>'+
                                '<div class="status_pending">'+
                                    'Status: &nbsp;<h4>'+return_data[i].order_status+'</h4>'+
                                '</div>'+
                            '</div>'+
                        '</div>')
                    }
                }
                else{
                    $(".order-history-container").html("<h3 style='text-align:center'>Let's Order something</h3>")
                }
            }
        })
    </script>


      
<div id="shopify-section-vela-footer" class="shopify-section">
    <footer id="velaFooter">
        <?php include('footer.php'); ?>
    </footer>
</div>

 
<?php include('footer_links.php'); ?>
<script src="js/main.js?key=<?= date('is') ?>" type="text/javascript"></script>
<script></script>



</body>
</html>