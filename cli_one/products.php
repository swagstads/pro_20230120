<!doctype html>
 
<html class="no-js" lang="en">
 

<!--  collections/furniture  24:30 GMT -->
 
<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 

<head>
    <?php include('header_links.php'); ?>
</head>

<body id="furniture" class="template-collection  velaFloatHeader bodyPreLoading">
    <div id="pageContainer" class="isMoved">
        <div id="shopify-section-vela-header" class="shopify-section">
            <header id="velaHeader" class="velaHeader">
                <?php include('header.php'); ?>
            </header>
        </div>
        <div id="shopify-section-vela-breacrumb-image" class="shopify-section">
            <section class="velaBreadcrumbs hasBackgroundImage floaHeader">
                <div class="velaBreadcrumbsInner">
                    <div class="velaBreadcrumbImage"><img alt="Outstock"
                            src="../../cdn.shopify.com/s/files/1/1573/5553/files/bg-breadcrumb_185ca843-f1e4-4c47-9325-66c8eaeaa9c2441e.jpg?v=1614314493" />
                    </div>
                    <nav class="velaBreadcrumbWrap container">
                        <div class="velaBreadcrumbsInnerWrap">
                            <h1 class="breadcrumbHeading">
                                <?php
                                    if( isset($_GET['category'])){
                                        echo $_GET['category'];
                                    } 
                                    else{
                                        echo "Products";
                                    }
                                ?>
                            </h1>

                            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="/" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">
                                        <?php
                                            if( isset($_GET['category'])){
                                                echo $_GET['category'];
                                            } 
                                            else{
                                                echo "Products";
                                            }
                                        ?>
                                    </span>
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
                    <div class="pageCollectionInner mb20 pb-md-30">
                        <div class="row">
                            <div id="proListCollection" class="velaCenterColumn col-xs-12 col-sm-12 ">
                                <div id="shopify-section-vela-template-collection" class="shopify-section">
                                    <div class="collBoxProducts">

                                        <div id="velaProList" class="proList list">
                                            <div id="product_container"  class="rowFlex rowFlexMargin product-list-container">
                                                <!-- prodcut showcase -->
                                            </div>

                                    </div>
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

    <!-- <div id="loading" style="display:none;"></div> -->

    <div id="goToTop" class="hidden-xs hidden-sm"><span class="fa fa-long-arrow-up"></span></div>
    <div id="velaPreLoading">
        <span></span>
        <div class="velaLoading">
            <span class="velaLoadingIcon one"></span>
            <span class="velaLoadingIcon two"></span>
            <span class="velaLoadingIcon three"></span>
            <span class="velaLoadingIcon four"></span>
        </div>
    </div>

    <script>
        function fetch_products() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            const searched_product = urlParams.get('category')
            var api_url = './api/fetch_products.php?prod='+searched_product;
            var form_data = { "show_products": searched_product, "user_id": localStorage.getItem('user_id') };
            $.ajax({
                url: api_url,
                type: 'POST',
                data: form_data,
                success: function (returned_data) {
                    // console.log(returned_data);

                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response;
                    // console.log(jsonData);

                    if (return_data[0].status == "failed") {
                        console.log('failed to fetched product data');
                        $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, no results found</div>')
                    }
                    else if (return_data[0].status == "success") {
                        console.log('Fetched products Data');
                        // console.log(jsonData.response);
                        for (var i = 0; i < jsonData.response.length; i++) {
                            console.log("Data "+i+":"+return_data[i].id);
                            $("#product_container").append('<div class="velaProBlock list col-xs-6  col-sm-12 col-md-12 col-12" data-price="260.00">'+
                                '<div class="velaProBlockInner mb20">'+
                                ' <div class="rowFlex rowFlexMargin">'+
                                        '<div class="col-xs-12 col-sm-3 col-md-3 mbItemGutter">'+
                                        ' <div class="proHImage">'+
                                            ' <a class="proFeaturedImage" href="./productpage.php?productid='+return_data[i].id+'">' +
                                                ' <div class="wrap ">'+
                                                        '<div class="p-relative">'+
                                                            '<div class="product-card__image" style="padding-top:126.90355329949239%;">'+
                                                                '<img class="product-card__img lazyload imgFlyCart " data-src="../../cdn.shopify.com/s/files/1/1573/5553/products/149ea1.jpg?v=1601694510"  data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="'+return_data[i].title+'" /> </div>'+
                                                            '<div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                    '<div class="hidden-sm hidden-xs proSwatch proImageSecond">'+
                                                        '<div class="p-relative">'+
                                                            '<div class="product-card__image" style="padding-top:126.90355329949239%;">'+
                                                            ' <img class="product-card__img lazyload imgFlyCart " data-src="../../cdn.shopify.com/s/files/1/1573/5553/products/14-19ea1.jpg?v=1601694510" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="'+return_data[i].title+'" /> </div>'+
                                                        ' <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>'+
                                                        '</div>'+
                                                    '</div>'+
                                                '</a>'+
                                            ' <div class="productLable"><span class="labelSale">Sale</span></div>'+
                                            '</div>'+
                                        '</div>'+
                                        '<div class="col-xs-12 col-sm-9 col-md-9 col-lg-7 mbItemGutter">'+
                                            '<div class="proContent">'+
                                                '<h4 class="proName"> <a href="./productpage.php?productid='+return_data[i].id+'">'+return_data[i].title+'</a> </h4>'+
                                                '<div class="proReviews hidden-xs hidden-sm">'+
                                                ' <span class="shopify-product-reviews-badge" data-id="23393796112"></span>'+
                                                '</div>'+
                                                '<div class="proDescription">'+
                                                    '<p>'+return_data[i].description+'</p>'+
                                                    '<p>'+
                                                '</div>'+
                                                '<div class="proPrice">'+
                                                    '<div class="priceProduct priceSale"><span class="money">&#x20B9;'+return_data[i].price+'</span></div>'+
                                                    '<div class="priceProduct priceCompare"><span class="money">&#x20B9;'+return_data[i].mrp+'</span></div>'+
                                                '</div>'+
                                                '<button  onclick="addToCart('+return_data[i].id+')" class="btn btnAddToCart">'+
                                                    '<span>&plus; Add to Cart</span>'+
                                                '</button>'+
                                            '</div>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                            )
                        }
                    }
                    else{
                        console.log("Nothing");
                    }
                }
            })
        }
        fetch_products();


        function addToCart(product_id){
                var quantity = 1;
                api_url = "/api/add_to_cart.php";
                console.log("adding to cart: pro id,", product_id);
                var form_data = { "add_to_cart": "add or update" , "productid": product_id,'quantity': quantity};
                $.ajax({
                        url: api_url,
                        type: 'POST',
                        data: form_data,
                        success: function (returned_data) {
                            var jsonData = JSON.parse(returned_data);
                            var return_data = jsonData.response;
                            console.log(return_data);
                            alert(return_data[0].message)
                        }
                })
                console.log("Ended");
            }

    </script>

    <script
        src="../../cdn.shopify.com/shopifycloud/shopify/assets/themes_support/option_selection-9f517843f664ad329c689020fb1e45d03cac979f64b9eb1651ea32858b0ff452.js"
        type="text/javascript"></script>
    <script
        src="../../cdn.shopify.com/shopifycloud/shopify/assets/themes_support/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js"
        type="text/javascript"></script>
    <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vendor3462.js?v=138786516400658099071601353808"
        type="text/javascript"></script>
    <script
        src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vela_ajaxcart02d5.js?v=53329818851908209301618027400"
        type="text/javascript"></script>
    <script
        src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/jquery.ion.rangeslider11ad.js?v=25617981562543196831601353802"
        type="text/javascript"></script>
    <script
        src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/lazysizes.min8f10.js?v=153772683470722238621601353802"
        async="async"></script>
    <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vela685d.js?v=105199010723301478381618027455"
        type="text/javascript"></script>
    <script
        src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/jquery.cookie0b11.js?v=72365755745404048181601353800"
        type="text/javascript"></script>

</body>

<!--  collections/furniture  24:42 GMT -->

</html>