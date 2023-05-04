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
                    <div class="velaBreadcrumbImage"><img alt="Outstock" src="../../cdn.shopify.com/s/files/1/1573/5553/files/bg-breadcrumb_185ca843-f1e4-4c47-9325-66c8eaeaa9c2441e.jpg?v=1614314493" />
                    </div>
                    <nav class="velaBreadcrumbWrap container">
                        <div class="velaBreadcrumbsInnerWrap">
                            <h1 class="breadcrumbHeading">
                                <?php
                                if (isset($_GET['q'])) {
                                    echo $_GET['q'];
                                } else {
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
                                <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">
                                        <?php
                                        if (isset($_GET['q'])) {
                                            echo $_GET['q'];
                                        } else {
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
                                            <div id="product_container" class="rowFlex rowFlexMargin product-list-container">
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
            function ongoing_orders() {
                const queryString = window.location.search;
                const urlParams = new URLSearchParams(queryString);
                const searched_product = urlParams.get('q')
                var api_url = './api/fetch_products.php?prod=' + searched_product;
                var form_data = {
                    "show_products": searched_product,
                    "user_id": localStorage.getItem('user_id')
                };
                $.ajax({
                    url: api_url,
                    type: 'POST',
                    data: form_data,
                    success: function(returned_data) {
                        // console.log(returned_data);

                        var jsonData = JSON.parse(returned_data);
                        var return_data = jsonData.response;
                        // console.log(jsonData);

                        if (return_data[0].status == "failed") {
                            console.log('failed to fetched product data');
                            $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, no results found</div>')
                        } else if (return_data[0].status == "success") {
                            console.log('Fetched products Data');
                            // console.log(jsonData.response);
                            for (var i = 0; i < jsonData.response.length; i++) {
                                console.log("Data " + i + ":" + return_data[i].title);
                                $("#product_container").append('<div class="velaProBlock list col-xs-12  col-sm-12 col-md-12 col-12" data-price="260.00">' +
                                    '<div class="velaProBlockInner mb20">' +
                                    ' <div class="rowFlex rowFlexMargin">' +
                                    '<div class="col-xs-12 col-sm-3 col-md-3 mbItemGutter">' +
                                    ' <div class="proHImage">' +
                                    ' <a class="proFeaturedImage" href="./productpage.php">' +
                                    ' <div class="wrap ">' +
                                    '<div class="p-relative">' +
                                    '<div class="product-card__image" style="padding-top:126.90355329949239%;">' +
                                    '<img class="product-card__img lazyload imgFlyCart " data-src="../../cdn.shopify.com/s/files/1/1573/5553/products/149ea1.jpg?v=1601694510"  data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="' + return_data[i].title + '" /> </div>' +
                                    '<div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="hidden-sm hidden-xs proSwatch proImageSecond">' +
                                    '<div class="p-relative">' +
                                    '<div class="product-card__image" style="padding-top:126.90355329949239%;">' +
                                    ' <img class="product-card__img lazyload imgFlyCart " data-src="../../cdn.shopify.com/s/files/1/1573/5553/products/14-19ea1.jpg?v=1601694510" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="' + return_data[i].title + '" /> </div>' +
                                    ' <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</a>' +
                                    ' <div class="productLable"><span class="labelSale">Sale</span></div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="col-xs-12 col-sm-9 col-md-9 col-lg-7 mbItemGutter">' +
                                    '<div class="proContent">' +
                                    '<h4 class="proName"> <a href="./productpage.php?prodid="' + return_data[i].id + '>' + return_data[i].title + '</a> </h4>' +
                                    '<div class="proReviews hidden-xs hidden-sm">' +
                                    ' <span class="shopify-product-reviews-badge" data-id="23393796112"></span>' +
                                    '</div>' +
                                    '<div class="proDescription">' +
                                    '<p>' + return_data[i].description + '</p>' +
                                    '<p>' +
                                    '</div>' +
                                    '<div class="proPrice">' +
                                    '<div class="priceProduct priceSale"><span class="money">&#x20B9;' + return_data[i].price + '</span></div>' +
                                    '<div class="priceProduct priceCompare"><span class="money">&#x20B9;' + return_data[i].mrp + '</span></div>' +
                                    '</div>' +
                                    '<form action="https://vela-kazan.myshopify.com/cart/add" method="post" enctype="multipart/form-data" class="formAddToCart">' +
                                    '<input type="hidden" name="id"  value="39397249056833" />' +
                                    '<button class="btn btnAddToCart" type="submit" value="Submit">' +
                                    '<i class="icons">' +
                                    '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">' +
                                    '<g>' +
                                    '<g>' +
                                    ' <path d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />' +
                                    '</g>' +
                                    '</g>' +
                                    '</svg>' +
                                    '</i>' +
                                    '<span>Add to Cart</span>' +
                                    '</button>' +
                                    '</form>' +
                                    '<form action="https://vela-kazan.myshopify.com/wishlist/add" method="post" enctype="multipart/form-data" class="formAddToWishlist">' +
                                    '<input type="hidden" name="id"  value="39397249056833" />' +
                                    '<button class="btn btnAddToWish" type="submit" value="Submit">' +
                                    '<i class="icons">' +
                                    '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">' +
                                    '<g>' +
                                    '<g>' +
                                    ' <path d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />' +
                                    '</g>' +
                                    '</g>' +
                                    '</svg>' +
                                    '</i>' +
                                    '<span><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="23px" width="23px" viewBox="00 -50 380 500"> <defs> <style>.cls-1 {    fill: none;    stroke: currentcolor;    stroke-width: 40px;}' +
                                    '</style> </defs> <path class = "cls-1" d = "M701.23,370.35c-81.12-49.29-157.82,49.29-157.82,49.29s-76.7-98.58-157.82-49.29c-51.52,31.31-67,98.8-36,150.54,10.78,18,26.81,37.87,50.23,59.09L543.41,720.4,687.05,580c23.43-21.22,39.45-41.08,50.23-59.09C768.24,469.15,752.76,401.66,701.23,370.35Z" transform = "translate(-331.66 -354.55)" / >' +
                                    '</svg> </span>' +
                                    '</button>' +
                                    '</form>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>'
                                )
                            }
                        } else {
                            console.log("Nothing");
                        }
                    }
                })
            }
            ongoing_orders()
        </script>

        <script src="../../cdn.shopify.com/shopifycloud/shopify/assets/themes_support/option_selection-9f517843f664ad329c689020fb1e45d03cac979f64b9eb1651ea32858b0ff452.js" type="text/javascript"></script>
        <script src="../../cdn.shopify.com/shopifycloud/shopify/assets/themes_support/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js" type="text/javascript"></script>
        <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vendor3462.js?v=138786516400658099071601353808" type="text/javascript"></script>
        <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vela_ajaxcart02d5.js?v=53329818851908209301618027400" type="text/javascript"></script>
        <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/jquery.ion.rangeslider11ad.js?v=25617981562543196831601353802" type="text/javascript"></script>
        <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/lazysizes.min8f10.js?v=153772683470722238621601353802" async="async"></script>
        <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vela685d.js?v=105199010723301478381618027455" type="text/javascript"></script>
        <script src="../../cdn.shopify.com/s/files/1/1573/5553/t/32/assets/jquery.cookie0b11.js?v=72365755745404048181601353800" type="text/javascript"></script>

</body>

<!--  collections/furniture  24:42 GMT -->

</html>