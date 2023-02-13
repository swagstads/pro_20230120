<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <?php include('header_links.php'); ?>
</head>

<body>
    <div id="pageContainer" class="isMoved">
        <div id="shopify-section-vela-header" class="shopify-section">
            <header id="header" class="velaHeader">
                <?php include('header.php'); ?>
            </header>    
        </div>
        <main>
            <div class="mainContent productpage" role="main">
                    <!-- Left Column / Headphones Image -->
                    <div class="left-column">
                        <img class="product-img-active" id="activeImage" data-image="" 
                        src="./cdn.shopify.com/s/files/1/1573/5553/products/1-10ea2.jpg?v=1601694960"
                        alt="">
                        <div class="product-configuration">
                            <!-- Product Color -->
                            <div class="img-choose">
                                <img class="small-view-image" onclick="changeActiveImg(this.src)" src="./cdn.shopify.com/s/files/1/1573/5553/products/1-10ea2.jpg?v=1601694960" alt="">
                                <img class="small-view-image" onclick="changeActiveImg(this.src)" src="./cdn.shopify.com/s/files/1/1573/5553/products/1_c14253f1-8cb5-4a88-921b-d3dbaffaaafa0ea2.jpg?v=1601694960" alt="">
                            </div>
                        </div>
                    </div>
                    <script>
                        function changeActiveImg(sourceImg){
                            var activeImg = document.getElementById("activeImage")
                            activeImg.src = sourceImg 
                        }
                    </script>
                    <!-- Right Column -->
                    <div class="right-column">
                    
                    <!-- Product Configuration -->
          
    
                    <!-- Product Description -->
                    <div class="product-description">
                        <span id="product_category"></span>
                        <h1 id="product_title"></h1>
                        <p id="product_description">
                        </p>
                    </div>
    
                    <!-- Product Pricing -->
                    <div class="product-price">
                        <span id="product_our_price">&#8377; <span id="product_price"></span></span>
                        <button  onclick="addToCart( <?php echo $_GET['productid'] ?> )" class="cart-btn">Add to cart</button>
                    </div>
                        
                    <div class="product-mrp">
                            <span>&#8377; <span id="product_mrp"></span></span>
                    </div>

                </div>
            </div>

            <div class="more-products">
                <?php include('./more-products.php') ?>
            </div>
        </main>

        <script>
            function fetch_product(){
                console.log(" fetching product...");
                var product_id = <?php echo $_GET['productid'] ?>;

                var api_url = './api/fetch_single_product.php?product_id';
                var form_data = { "fetch_products": "fetch","productid":product_id};
                // console.log(form_data);
                $.ajax({
                        url: api_url,
                        type: 'GET',
                        data: form_data,
                        success: function (returned_data) {
                            console.log(returned_data);
                            var jsonData = JSON.parse(returned_data);
                            var return_data = jsonData.response;
                            $("#product_category").html(jsonData.response[0].category)
                            $("#product_price").html(jsonData.response[0].price)
                            $("#product_mrp").html(jsonData.response[0].mrp)
                            $("#product_title").html(jsonData.response[0].title)
                            $("#product_description").html(jsonData.response[0].description)

                        }
                    })
            }
            fetch_product()

        </script>

    </div>
    <div id="shopify-section-vela-footer" class="shopify-section">
        <footer id="velaFooter">
            <?php include('footer.php'); ?>
        </footer>
    </div>

    <?php include('footer_links.php'); ?>
    <script src="js/main.js?key=<?= date('is') ?>" type="text/javascript"></script>
    <script>
    get_cat();
    </script>
    
</body>
</html>