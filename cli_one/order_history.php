<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .truncate-overflow {
        --lh: 1.4rem;
        --max-lines: 3;
        position: relative;
        max-height: calc(var(--lh) * var(--max-lines));
        overflow: hidden;
        padding-right: 1rem; /* space for ellipsis */
        }
        .order-history-wrapper{
            padding: 0px 0 80px 0;
            display: flex;
            justify-content: center;
        }
        .order-history-wrapper .order-history-container {
            width: 100%;
        }
        .order-history-wrapper .order-history-container .order-history-container-row{
            width: 100%;
            display: grid;
            grid-template-columns: 25% 75%;
            gap: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.338);
        }
        .order-history-wrapper .order-history-container .order-history-container-row .right{
            display: grid;
            grid-template-columns: 50% 10% 15% 15% 10%;
            justify-content: space-around;
            gap: 10px;
        }
        .order-history-wrapper .order-history-container .order-history-container-row .right>div:not(.ordered-product-details){
            text-align: center;
        }
        .order-history-wrapper .order-history-container .order-history-container-row .right>.ordered-product-details{
            text-align: justify;
        }
        .order-history-wrapper .order-history-container .order-history-container-row>*{
            /* border: 1px solid; */

        }
        .order-history-wrapper .order-history-container .order-history-container-row>div{
            padding: 8px 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .order-history-container-row .image img{
            height: 200px;
            border-top-left-radius: 10% 10% ;
            border-bottom-right-radius: 10% 10%;
        }
        @media (max-width: 992px){
            .order-history-wrapper .order-history-container .order-history-container-row {
                /* border: 1px solid; */
                grid-template-columns: 40% auto;
                background-color: rgb(249, 249, 249);
                border-radius: 10% 10%;
                padding: 5px 10px;
                border: none;
                margin-bottom: 10px;
            }
            .order-history-wrapper .order-history-container .order-history-container-row {
                /* grid-template-columns: auto; */
            }
            .order-history-wrapper .order-history-container .order-history-container-row .right {
                grid-template-columns: auto;
            }
            .order-history-wrapper .order-history-container .order-history-container-row .right>div:not(.ordered-product-details){
                text-align: left !important;
                display: flex;
                align-items: center;
            }
        }
        @media (min-width: 992px) {
            .order-history-wrapper .order-history-container {
                max-width: 985px !important;
            }            
        }
        @media (min-width: 1220){
            .order-history-wrapper .order-history-container {
                max-width: 1210px !important;
            }
        }
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

                for (var i = 0; i < jsonData.response.length; i++) {

                    $(".order-history-container").append('<div class="order-history-container-row">'+
                        '<div class="left">'+
                            '<div class="image">'+
                                '<img src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" alt="" srcset="">'+
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