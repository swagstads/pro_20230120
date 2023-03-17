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
            <div class="productpage-bredcrum">

                <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" style="justify-content: left;margin-left: 6em;">
                    <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <a href="./" title="Back to the frontpage" itemprop="item">
                            <span itemprop="name">Home</span>
                        </a>
                        <meta itemprop="position" content="1" />
                    </li>
                    <li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                        <span itemprop="name">
                            <?php
                            
                                if (isset($_GET['product'])) { ?>
                                    <a href="./products.php?category=<?php echo ucfirst($_GET['category']) ?>">
                                    <?php echo ucfirst($_GET['category']) ?><li class="active" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"></a>
                                    <?php echo $_GET['product'];
                                } else {
                                    echo ucfirst("Category / Product");
                                }
                            
                ?>
                </span>
                <meta itemprop="position" content="2" />
                    </li>
                </ol>
            </div>
            <div class="mainContent productpage" role="main">
                <!-- Left Column / Headphones Image -->
                <div class="left-column">
                    <div class="main_img_container" id="main_img_container">
                        <!-- <img class="product-img-active" id="activeImage" data-image="" 
                            src="./cdn.shopify.com/s/files/1/1573/5553/products/1-10ea2.jpg?v=1601694960"
                            alt=""> -->
                    </div>
                    <div class="product-configuration">
                        <!-- Product Color -->
                        <div class="img-choose" id="all_prod_images_container">
                            <!-- <img class="small-view-image" onclick="changeActiveImg(this.src)" src="./cdn.shopify.com/s/files/1/1573/5553/products/1-10ea2.jpg?v=1601694960" alt="">
                                <img class="small-view-image" onclick="changeActiveImg(this.src)" src="./cdn.shopify.com/s/files/1/1573/5553/products/1_c14253f1-8cb5-4a88-921b-d3dbaffaaafa0ea2.jpg?v=1601694960" alt=""> -->


                        </div>
                    </div>
                </div>
                <script>
                    function changeActiveImg(sourceImg) {
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
                        <h3 id="product_title">
                        </h3><sup id="instock"></sup>
                        <p style="font-size:12px;">
                            <svg width="11px" height="11px" fill="green" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512">
                                <path fill-rule="nonzero" d="M256 0c70.69 0 134.7 28.66 181.02 74.98C483.34 121.31 512 185.31 512 256c0 70.69-28.66 134.7-74.98 181.02C390.7 483.34 326.69 512 256 512c-70.69 0-134.7-28.66-181.02-74.98C28.66 390.7 0 326.69 0 256c0-70.69 28.66-134.69 74.98-181.02C121.3 28.66 185.31 0 256 0zm17.75 342.25h29.15v29.32h-93.79v-29.32h28.76v-92.34h-28.76v-29.32h64.64v121.66zm-27.94-150.37c-7.08-.05-13.12-2.53-18.2-7.56-5.08-5.01-7.56-11.11-7.56-18.25 0-7.01 2.48-13.06 7.56-18.08 5.08-5.02 11.12-7.55 18.2-7.55 6.95 0 12.99 2.53 18.08 7.55 5.13 5.02 7.67 11.07 7.67 18.08 0 4.72-1.2 9.07-3.56 12.94-2.36 3.93-5.45 7.07-9.31 9.37-3.87 2.3-8.17 3.45-12.88 3.5zm171.9-97.59C376.33 52.92 319.15 27.32 256 27.32c-63.15 0-120.33 25.6-161.71 66.97C52.92 135.68 27.32 192.85 27.32 256c0 63.15 25.6 120.33 66.97 161.71 41.38 41.37 98.56 66.97 161.71 66.97 63.15 0 120.33-25.6 161.71-66.97 41.37-41.38 66.97-98.56 66.97-161.71 0-63.15-25.6-120.32-66.97-161.71z" />
                            </svg> This is secure product
                        </p>
                    </div>
                    <!-- Product Pricing -->
                    <div class="product-price">
                        <span id="product_our_price">Price : <span style="margin-left: 20px;">MRP &#8377;<span id="product_price"></span>
                                <span class="incl-of-tax">(incl. of all taxes)</span></span>
                        </span>
                    </div>
                    <!-- <div class="product-mrp">
                <span class="product-price"> <span id="product_our_price" > Previously: </span></span><span style="margin-left: 20px;">&#8377; <span id="product_mrp"></span></span>
                </div> -->
                    <span class="product_overview"> Overview</span>
                    <p id="product_description" class="truncate-line-3"></p>
                    <div class="read-more-bttn-container">
                        <button onclick="show_description(this)" class="read-more">Read more</button>
                        <script>
                            function show_description(bttn) {
                                if (bttn.classList.contains("active")) {
                                    document.getElementById("product_description").style.display = "-webkit-box";
                                    bttn.textContent = "Read more";
                                    bttn.classList.remove("active")
                                } else {
                                    document.getElementById("product_description").style.display = "block";
                                    bttn.classList.add("active");
                                    bttn.textContent = "Read less";
                                }
                            }
                        </script>
                    </div>
                    <br>
                    <div class="add-to-bttns">
                        <button onclick="addToCart( <?php echo $_GET['productid'] ?> )" class="cart-btn">Add to cart</button>
                        <button onclick="addToWishlist( <?php echo $_GET['productid'] ?> )" class="wish-btn">Add to wishlist</button>
                    </div>
                    <div class="social-media-share-links">
                        <div>
                            <h3>Share on:</h3>
                        </div>
                        <div class="share-buttons">
                            <a href="#" title="Whatsapp" class="share-btn whatsapp-btn"><i class="fa fa-whatsapp"></i></a>
                            <a href="#" title="Instagram" class="share-btn insta-btn"><i class="fa fa-instagram"></i></a>
                            <a href="#" title="Facebook" class="share-btn fb-btn"><i class="fa fa-facebook"></i></a>
                            <a href="#" title="Copy to clipboard" class="share-btn copy-btn"><i class="fa fa-copy"></i></a>
                            <!-- Add more social media buttons here -->
                        </div>
                        <script>
                            // Get the current URL
                            var currentUrl = window.location.href;

                            // Get all share buttons
                            var shareButtons = document.querySelectorAll('.share-btn');

                            // Loop through each button and add a click event listener
                            shareButtons.forEach(function(button) {
                                button.addEventListener('click', function(e) {
                                    e.preventDefault();
                                    var app = this.classList[1];
                                    // Create a share URL for the selected app
                                    var shareUrl;
                                    switch (app) {
                                        case 'whatsapp-btn':
                                            general_product_description = "Hey! I just came across this amazing product and I had to share it with you. Check it out here: "
                                            shareUrl = 'https://api.whatsapp.com/send?text=' + general_product_description + encodeURIComponent(currentUrl);
                                            window.open(shareUrl);
                                            break;
                                        case 'insta-btn':
                                            general_product_description = "Hey! I just came across this amazing product and I had to share it with you. Check it out here: "
                                            shareUrl = 'https://api.instagram.com/send?text=' + general_product_description + encodeURIComponent(currentUrl);
                                            window.open(shareUrl);
                                            break;
                                        case 'fb-btn':
                                            general_product_description = "Hey! I just came across this amazing product and I had to share it with you. Check it out here: "
                                            shareUrl = 'https://api.facebook.com/send?text=' + general_product_description + encodeURIComponent(currentUrl);
                                            window.open(shareUrl);
                                            break;
                                        case 'copy-btn':
                                            if (navigator.clipboard) {
                                                navigator.clipboard.writeText(currentUrl)
                                                    .then(() => {
                                                        show_msg(`Copied to clipboard`);
                                                    })
                                                    .catch((err) => {
                                                        show_msg('Failed to copy: ', err);
                                                    });
                                            } else {
                                                show_msg('Clipboard API not available');
                                            }
                                            break;
                                    }
                                });
                            });
                        </script>

                    </div>
                    <br>
                    <div class="shipping-policy">
                        <details>
                            <summary> <i class="fa fa-chevron-right"></i> Shipping Policy</summary>
                            <div>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat itaque voluptate maiores exercitationem nostrum beatae atque maxime voluptatum. Expedita illo molestiae libero incidunt optio, alias obcaecati tempore quae quas voluptate!</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, incidunt ea. Tempore sed nesciunt quis non dolores molestiae ullam modi aut cumque pariatur ipsam, tempora, repellendus ad fuga sequi eum?
                                </p>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Placeat itaque voluptate maiores exercitationem nostrum beatae atque maxime voluptatum. Expedita illo molestiae libero incidunt optio, alias obcaecati tempore quae quas voluptate!</p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, incidunt ea. Tempore sed nesciunt quis non dolores molestiae ullam modi aut cumque pariatur ipsam, tempora, repellendus ad fuga sequi eum?
                                </p>
                                <p class="para-heading">
                                    <strong>Log Data</strong>
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque alias ab aliquid qui, molestias repellendus dolorum eius culpa voluptate, voluptas, consequatur deleniti mollitia delectus optio? Suscipit in ullam quas laudantium.
                                </p>
                                <p class="para-heading"><strong>Cookies</strong></p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos sit voluptatum deserunt quisquam voluptate, magni aut expedita reprehenderit, recusandae, ullam accusamus asperiores iusto doloremque! Deleniti ducimus iure dolores explicabo illo?
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam omnis ipsam molestiae commodi distinctio. Modi illum sequi consectetur in totam earum odio, velit maxime nihil, vero repellendus rem quo inventore.
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque officiis voluptate cum assumenda accusamus nisi fugiat ipsam repellat. Enim praesentium quibusdam ratione earum eius et temporibus totam sunt! Numquam, ex!
                                </p>
                                <p class="para-heading"><strong>Service Providers</strong></p>
                                <p>
                                    I may employ third-party companies and individuals due to the following reasons:</p>
                                <ul>
                                    <li>To facilitate our Service;</li>
                                    <li>To provide the Service on our behalf;</li>
                                    <li>To perform Service-related services; or</li>
                                    <li>To assist us in analyzing how our Service is used.</li>
                                </ul>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi aspernatur distinctio quasi facere voluptatibus harum velit fugiat qui, aperiam, ducimus animi doloremque voluptas? Nihil qui accusantium illo provident, hic molestiae.
                                </p>
                            </div>
                        </details>
                    </div>

                </div>


            </div>
            <!-- <div class="description-reviews">
                <div class="container">
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'container1')">Description</button>
                        <button class="tablinks" onclick="openTab(event, 'container2')">Reviews</button>
                    </div>
                    <div id="container1" class="tabcontent active show">
                        <h3>Description</h3>
                        <p id="product_description"></p>
                    </div>
                    <div id="container2" class="tabcontent">
                        <h3>Reviews</h3>
                        <p>In construction...</p>
                    </div>
                </div>
            </div> -->

            <script>
                function openTab(evt, tabName) {
                    var i, tabcontent, tablinks;

                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].classList.remove("show");
                    }

                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].classList.remove("active");
                    }

                    document.getElementById(tabName).classList.add("show");
                    evt.currentTarget.classList.add("active");
                }
            </script>
            <br>



            <div class="more-products">
                <?php include('./similar_products.php') ?>
            </div>


            <div class="trending-products">
                <?php include('./trending_products.php') ?>
            </div>

            <div class="best-seller">
                <?php include('./best_seller.php') ?>
            </div>

            <div class="more-products">
                <?php include('./more-products.php') ?>
            </div>

        </main>

        <script>
            function fetch_product() {
                console.log(" fetching product...");
                var product_id = <?php echo $_GET['productid'] ?>;

                var api_url = './api/fetch_single_product.php?product_id';
                var form_data = {
                    "fetch_products": "fetch",
                    "productid": product_id
                };
                // console.log(form_data);
                $.ajax({
                    url: api_url,
                    type: 'GET',
                    data: form_data,
                    success: function(returned_data) {
                        console.log("Data: ", returned_data);
                        var jsonData = JSON.parse(returned_data);
                        var return_data = jsonData.response;

                        // let outOfStockMessage = "";
                        // let inStockMessage = "";
                        // if (jsonData.response[0].product_quantity == 0) {
                        //     outOfStockMessage = "Out of Stock";
                        //     $("#instock").append('<sup class="blinking-box-out"><span>'+outOfStockMessage+'</span></sup>');
                        // } else if (jsonData.response[0].product_quantity <= 60) {
                        //     inStockMessage = "Only " + jsonData.response[0].product_quantity + " left";
                        //     $("#instock").append('<sup class="blinking-box"><span>'+inStockMessage+'</span></sup>');
                        // } else {
                        //     inStockMessage = "In Stock"
                        //     $("#instock").html();
                        // }
                        fetch_similar_products(return_data[0])

                        $("#product_category").html(jsonData.response[0].category)
                        $("#product_price").html(jsonData.response[0].price)
                        $("#product_mrp").html(jsonData.response[0].mrp)
                        $("#product_title").html(jsonData.response[0].title)
                        $("#product_description").html(jsonData.response[0].description)



                        if (jsonData.response[0].image === "no") {
                            show_msg("No Image")
                        } else {
                            images_arr = jsonData.response[0].image_name;
                            primary_img = "./admin_panel/uploads/products/" + images_arr[0];
                            // $(".product-img-active").attr(src , primary_img)


                            $('<img />', {
                                    class: "product-img-active",
                                    id: "activeImage",
                                    src: primary_img,
                                })
                                .appendTo($('#main_img_container'));

                            for (let i = 0; i < images_arr.length; i++) {

                                var img = $('<img />', {
                                        onmouseover: 'changeActiveImg(this.src)',
                                        class: 'small-view-image',
                                        src: "./admin_panel/uploads/products/" + images_arr[i] + "",
                                    })
                                    .appendTo($('#all_prod_images_container'));


                            }
                        }
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