<!DOCTYPE html>
    <html>
    <head>
      <meta charset='utf-8'>
      <meta name='viewport' content='width=device-width'>
      <title>Privacy Policy</title>
      <style> 
      .policy-container{
        padding: 20px 0 80px 0;
        width: 100%;
        text-align: justify;
        display: flex;
        justify-content: center;
      }
      @media (min-width: 992px){
        .policy-container div{
            max-width: 980px;
        }
      }
      @media (min-width: 1220){
        .policy-container div{
            max-width: 1210px;
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
                                    <span itemprop="name">Shipping policy</span>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </section>
        </div>
        <main>
            <div class="order-history-container">
    
            </div>
        </main>

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

                        }
                    }
                })
        </script>
      

</body>
</html>
      