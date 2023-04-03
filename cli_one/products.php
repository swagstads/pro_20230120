<!doctype html>

<html class="no-js" lang="en">


<!--  collections/furniture  24:30 GMT -->

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <?php include('header_links.php'); ?>
</head>

<body id="furniture" class="template-collection  bodyPreLoading">
            <?php include('header.php'); ?>
        <div id="shopify-section-vela-breacrumb-image" class="shopify-section">
            <section class="velaBreadcrumbs hasBackgroundImage floaHeader">
                <div class="velaBreadcrumbsInner">
                    <div class="velaBreadcrumbImage"><img alt="Outstock" src="./cdn.shopify.com/s/files/1/1573/5553/files/bg-breadcrumb_185ca843-f1e4-4c47-9325-66c8eaeaa9c2441e.jpg?v=1614314493" />
                    </div>
                    <nav class="velaBreadcrumbWrap container">
                        <div class="velaBreadcrumbsInnerWrap">
                            <h1 class="breadcrumbHeading">
                                <?php
                                if (isset($_GET['product'])) {
                                    echo $_GET['product'];
                                } else if (isset($_GET['category'])){
                                    echo ucfirst($_GET['category']);
                                }
                                else{
                                    echo "Our Products";
                                }
                                ?>
                            </h1>

                            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="./" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">
                                        <?php
                                        if (isset($_GET['category'])) {

                                            if (isset($_GET['product'])) {?>
                                                <a href="./products.php?category=<?php echo ucfirst($_GET['category'])?>"><?php echo ucfirst($_GET['category'])?><li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"></a><?php echo $_GET['product'];
                                            } else {
                                                echo ucfirst($_GET['category']);
                                            }
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

            <div class="filter-wrapper">
                <div class="filter-products-container">
                    <div class="filter-text">
                        Filter:
                    </div>
                    <div class="all-filters">
                        <div class="filters relevence" onclick="filter().mostRecent()">
                            New Collection
                        </div>
                        <div class="filters relevence" onclick="filter().sortByClickCount()">
                            Relevance
                        </div>
                        <div class="filters relevence" onclick="filter().sortByPriceLowToHigh()">
                            Price low to high
                        </div>
                        <div class="filters relevence" onclick="filter().sortByPriceHighToLow()">
                            Price high to low
                        </div>
                        <div class="filters relevence" onclick="filter().sortByClickCountDesc()">
                            Featured
                        </div>
                        <div class="filters relevence" onclick="filter().shuffleMe()">
                            Most Searched
                        </div>
                    </div>
                </div>
            </div>
            <section id="pageContent" class="products-page-section">
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

        <!-- <div id="goToTop" class="hidden-xs hidden-sm"><span class="fa fa-long-arrow-up"></span></div> -->

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
            var fetched_products;
            // Get url params to fetch all products data
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            // url params
            const category_name = urlParams.get('category');
            const product_name = urlParams.get('product');

            // API to fetch data
            var api_url = './api/fetch_products.php';
            // form data -> sent to backend
            var form_data = {
                "show_products": "yes",
                "category_name": category_name,
                "product_name": product_name,
                "user_id": localStorage.getItem('user_id')
            };
            // Ajax call to API 
            $.ajax({
                url: api_url,
                type: 'POST',
                data: form_data,
                success: function(returned_data) {
                    // Response from API
                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response;
                    // saving response to global var
                    fetched_products = return_data;
                    // Displaying products
                    display_products(fetched_products);
                }
            })

            // function display_unsf_products(return_data) {
            //     $("#product_container").empty()
            //     if (return_data[0].status === "failed") {
            //         console.log('failed to fetched product data');

            //         $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, no results found</div>')
            //     } else if (return_data[0].status === "success") {

            //         for (var i = 0; i < return_data.length; i++) {
            //             // console.log("Data "+i+":"+return_data[i].id);
            //             let outOfStockMessage = "",
            //                 inStockMessage = "";

            //             let addToCartDisabled = false;

            //             if (return_data[i].quantity == 0) {
            //                 outOfStockMessage = "Out of Stock";
            //                 addToCartDisabled = true;
            //                 $(".btnAddToCart").css("display","none")
            //             } else if (return_data[i].quantity <= 5) {
            //                 inStockMessage = "only " + return_data[i].quantity + " left"
            //             } else {
            //                 inStockMessage = "In Stock"
            //             }

            //             if (!return_data[i].image_name[0]) {
            //                 return_data[i].image_name[0] = "default.jpg";
            //             } else {
            //                 if (!return_data[i].image_name[1]) {
            //                     return_data[i].image_name[1] = return_data[i].image_name[0];
            //                 }
            //             }
            //             $("#product_container").append('<div class="velaProBlock list col-xs-6  col-sm-12 col-md-12 col-12" data-price="260.00">' +
            //                 '<div class="velaProBlockInner mb20">' +
            //                 ' <div class="rowFlex rowFlexMargin">' +
            //                 '<div class="col-xs-12 col-sm-3 col-md-3 mbItemGutter">' +
            //                 ' <div class="proHImage">' +
            //                 ' <a class="proFeaturedImage" onclick="increase_click_count(' + return_data[i].id + ')"  href="./productpage.php?productid=' + return_data[i].id + '">' +
            //                 ' <div class="wrap ">' +
            //                 '<div class="p-relative">' +
            //                 '<div class="product-card__image" style="padding-top:126.90355329949239%;">' +
            //                 '<img class="product-card__img lazyload imgFlyCart " data-src="./admin_panel/uploads/products/' + return_data[i].image_name[0] + '"  data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="' + return_data[i].title + '" /> </div>' +
            //                 '<div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 '<div class="hidden-sm hidden-xs proSwatch proImageSecond">' +
            //                 '<div class="p-relative">' +
            //                 '<div class="product-card__image" style="padding-top:126.90355329949239%;">' +
            //                 ' <img class="product-card__img lazyload imgFlyCart " data-src="./admin_panel/uploads/products/' + return_data[i].image_name[1] + '" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="' + return_data[i].title + '" /> </div>' +
            //                 ' <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 '</a>' +
            //                 ' <div class="productLable"><span class="labelSale">Sale</span></div>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 '<div class="col-xs-12 col-sm-9 col-md-9 col-lg-7 mbItemGutter">' +
            //                 '<div class="proContent">' +
            //                 '<h4 class="proName"> <a href="./productpage.php?productid=' + return_data[i].id + '">' + return_data[i].title + '</a> </h4>' + // - '+return_data[i].category+'
            //                 '<div class="proReviews hidden-xs hidden-sm">' +
            //                 ' <span class="shopify-product-reviews-badge" data-id="23393796112"></span>' +
            //                 '</div>' +
            //                 '<div class="proDescription">' +
            //                 '<p>' + return_data[i].description + '</p>' +
            //                 '</div>' +
            //                 '<div>' +
            //                 '<p class="out-of-stock-message">' + outOfStockMessage + '</p>' +
            //                 '<p class="in-stock-message">' + inStockMessage + '</p>' +
            //                 '</div>' +
            //                 '<div class="proPrice">' +
            //                 '<div class="priceProduct priceSale"><span class="money">&#x20B9;' + return_data[i].price + '</span></div>' +
            //                 '<div class="priceProduct priceCompare"><span class="money">&#x20B9;' + return_data[i].mrp + '</span></div>' +
            //                 '</div>' +
            //                 '<button onclick="addToCart(' + return_data[i].id + ',' + return_data[i].quantity + ')" class="btn btnAddToCart">' +
            //                 '<span>&plus; Add to Cart</span>' +
            //                 '</button>' +
            //                 '<button style="margin-left:5px;" onclick="addToWishlist(' + return_data[i].id + ',' + return_data[i].quantity + ')" class="btn btnAddToCart">' +
            //                 '<span>&plus; Add to Wishlist</span>' +
            //                 '</button>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 '</div>' +
            //                 '</div>'
            //             )
            //         }
            //     } else {
            //         // console.log("Nothing");
            //     }
            // }

            function display_products(return_data) {
                $("#product_container").empty()
                if (return_data[0].status === "failed") {
                    console.log('failed to fetched product data');

                    $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, no results found</div>')
                } else if (return_data[0].status === "success") {

                    let data = [return_data];

                    // Fisher-Yates shuffle algorithm
                    function shuffleArray(array) {
                        for (let i = array.length - 1; i > 0; i--) {
                            const j = Math.floor(Math.random() * (i + 1));
                            [array[i], array[j]] = [array[j], array[i]];
                        }
                        for (let i = 0; i < array.length; i++) {
                            if (Array.isArray(array[i])) {
                                shuffleArray(array[i]);
                            }
                        }
                    }

                    // shuffle the data
                    shuffleArray(data);

                    // display the shuffled data
                    console.log(data);
                    for (var i = 0; i < return_data.length; i++) {
                        // console.log("Data "+i+":"+return_data[i].id);
                        let outOfStockMessage = "",
                            inStockMessage = "";

                        let addToCartDisabled = false;

                        if (return_data[i].quantity == 0) {
                            outOfStockMessage = "Out of Stock";
                            addToCartDisabled = true;
                            $(".btnAddToCart").hide()
                        } else if (return_data[i].quantity <= 5) {
                            inStockMessage = "only " + return_data[i].quantity + " left"
                        } else {
                            inStockMessage = "In Stock"
                        }

                        if (!return_data[i].image_name[0]) {
                            return_data[i].image_name[0] = "default.jpg";
                        } else {
                            if (!return_data[i].image_name[1]) {
                                return_data[i].image_name[1] = return_data[i].image_name[0];
                            }
                        }
                        $("#product_container").append('<div class="velaProBlock list col-xs-6  col-sm-12 col-md-12 col-12" data-price="260.00">' +
                            '<div class="velaProBlockInner mb20">' +
                            ' <div class="rowFlex rowFlexMargin">' +
                            '<div class="col-xs-12 col-sm-3 col-md-3 mbItemGutter">' +
                            ' <div class="proHImage">' +
                            ' <a class="proFeaturedImage" onclick="increase_click_count(' + return_data[i].id + ')"  href="./productpage.php?productid=' + return_data[i].id + '">' +
                            ' <div class="wrap ">' +
                            '<div class="p-relative">' +
                            '<div class="product-card__image" style="padding-top:126.90355329949239%;">' +
                            '<img class="product-card__img lazyload imgFlyCart " data-src="./admin_panel/uploads/products/' + return_data[i].image_name[0] + '"  data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="' + return_data[i].title + '" /> </div>' +
                            '<div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="hidden-sm hidden-xs proSwatch proImageSecond">' +
                            '<div class="p-relative">' +
                            '<div class="product-card__image" style="padding-top:126.90355329949239%;">' +
                            ' <img class="product-card__img lazyload imgFlyCart " data-src="./admin_panel/uploads/products/' + return_data[i].image_name[1] + '" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-sizes="auto" alt="' + return_data[i].title + '" /> </div>' +
                            ' <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>' +
                            '</div>' +
                            '</div>' +
                            '</a>' +
                            ' <div class="productLable"><span class="labelSale">Sale</span></div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="col-xs-12 col-sm-9 col-md-9 col-lg-7 mbItemGutter">' +
                            '<div class="proContent">' +
                            '<h4 class="proName"> <a href="./productpage.php?productid=' + return_data[i].id + '">' + return_data[i].title + '</a> </h4>' + // - '+return_data[i].category+'
                            '<div class="proReviews hidden-xs hidden-sm">' +
                            ' <span class="shopify-product-reviews-badge" data-id="23393796112"></span>' +
                            '</div>' +
                            '<div class="proDescription">' +
                            '<p>' + return_data[i].description + '</p>' +
                            '</div>' +
                            '<div>' +
                            '<p class="out-of-stock-message">' + outOfStockMessage + '</p>' +
                            '<p class="in-stock-message">' + inStockMessage + '</p>' +
                            '</div>' +
                            '<div class="proPrice">'+
                            '<div class="priceProduct priceSale"><span class="money">'+
                                '<span class="price-entity">&#8377;</span>'+
                                '<span class="price-toggle"  data-currency="INR" data-inr="'+return_data[i].price+'" > '+return_data[i].price+'</span>'+
                            '</div>' +
                            '<div class="priceProduct priceCompare">'+
                                '<span class="price-entity">&#8377;</span>'+
                                '<span class="price-toggle" data-currency="INR" data-inr="'+return_data[i].mrp+'" > '+ return_data[i].mrp +'</span>'+
                            '</div>' +
                            '</div>' +
                            '<button onclick="addToCart(' + return_data[i].id + ',' + return_data[i].quantity + ')" class="btn btnAddToCart">' +
                            '<span>Add to Cart</span>' +
                            '</button>' +
                            '<button style="margin-left:5px;" onclick="addToWishlist(' + return_data[i].id + ',' + return_data[i].quantity + ')" class="btn btnAddToCart">' +
                            '<span> Add to Wishlist</span>' +
                            '</button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        )
                        if (return_data[i].quantity == 0) {
                            $(".btnAddToCart").hide()
                        }
                    }
                } else {
                    // console.log("Nothing");
                }
            }

            function filter() {
                function sortByPriceLowToHigh() {
                    // Sort the array of objects by price (low to high)
                    var new_series_fetched_products = fetched_products;
                    new_series_fetched_products.sort((a, b) => {
                        return a.price - b.price;
                    });
                    display_unsf_products(new_series_fetched_products); //display data from price low to high
                }

                function sortByPriceHighToLow() {
                    // Sort the array of objects by price (low to high)
                    var new_series_fetched_products = fetched_products;
                    new_series_fetched_products.sort((a, b) => {
                        return b.price - a.price;
                    });
                    display_unsf_products(new_series_fetched_products); //display data from price hight to low
                }

                function sortByClickCount() {
                    console.log(fetched_products);
                    fetched_products.sort((a, b) => b.click_counts - a.click_counts);
                    display_unsf_products(fetched_products); //display data from click count
                }

                function mostRecent() {
                    fetched_products.sort(function(a, b) {
                        return a.added_on - b.added_on;
                    });
                    console.log(fetched_products);
                    display_unsf_products(fetched_products); //display data from click count
                }

                function sortByClickCountDesc() {
                    console.log(fetched_products);
                    fetched_products.sort((a, b) => a.click_counts - b.click_counts);
                    display_unsf_products(fetched_products); //display data from click count
                }
                function shuffleMe() {
                    console.log(fetched_products);
                    fetched_products.sort((a, b) => a.click_counts - b.click_counts);
                    display_products(fetched_products); //display data from click count
                }

                return {
                    sortByPriceLowToHigh: sortByPriceLowToHigh,
                    sortByPriceHighToLow: sortByPriceHighToLow,
                    sortByClickCount: sortByClickCount,
                    mostRecent: mostRecent,
                    sortByClickCountDesc: sortByClickCountDesc,
                    shuffleMe:shuffleMe
                }
            }



            function addToCart(product_id, stockQuantity) {
                if (stockQuantity === 0) {
                    show_msg("Item not in stock")
                } else {
                    var quantity = 1;
                    api_url = "./api/add_to_cart.php";
                    console.log("adding to cart: pro id,", product_id);
                    var form_data = {
                        "add_to_cart": "add or update",
                        "productid": product_id,
                        'quantity': quantity
                    };
                    $.ajax({
                        url: api_url,
                        type: 'POST',
                        data: form_data,
                        success: function(returned_data) {
                            var jsonData = JSON.parse(returned_data);
                            var return_data = jsonData.response;
                            console.log(return_data);
                            show_msg(return_data[0].message)
                        }
                    })
                }
                cart_count()
            }
        </script>


        <script src="./cdn.shopify.com/shopifycloud/shopify/assets/themes_support/option_selection-9f517843f664ad329c689020fb1e45d03cac979f64b9eb1651ea32858b0ff452.js" type="text/javascript"></script>
        <script src="./cdn.shopify.com/shopifycloud/shopify/assets/themes_support/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js" type="text/javascript"></script>
        <script src="./cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vendor3462.js?v=138786516400658099071601353808" type="text/javascript"></script>
        <script src="./cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vela_ajaxcart02d5.js?v=53329818851908209301618027400" type="text/javascript"></script>
        <script src="./cdn.shopify.com/s/files/1/1573/5553/t/32/assets/jquery.ion.rangeslider11ad.js?v=25617981562543196831601353802" type="text/javascript"></script>
        <script src="./cdn.shopify.com/s/files/1/1573/5553/t/32/assets/lazysizes.min8f10.js?v=153772683470722238621601353802" async="async"></script>
        <script src="./cdn.shopify.com/s/files/1/1573/5553/t/32/assets/vela685d.js?v=105199010723301478381618027455" type="text/javascript"></script>
        <script src="./cdn.shopify.com/s/files/1/1573/5553/t/32/assets/jquery.cookie0b11.js?v=72365755745404048181601353800" type="text/javascript"></script>


        <script>
            // To open search modal on key press
            document.onkeydown = function() {
                let all_contact_inp = document.querySelectorAll(".contact-form");
                let all_inp = document.querySelectorAll(".info");

                if (window.event.keyCode >= 65 & window.event.keyCode <= 90 & all_contact_inp.length <= 0 & all_inp.length <= 0) {
                    openSearchModal()
                    document.getElementById("search_query").focus();
                }
                if (window.event.keyCode === 27) {
                    closeSearchModal()
                }
            }
        </script>

</body>


</html>