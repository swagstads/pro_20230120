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
                        <div class="main_img_container" id="main_img_container">
                            <!-- <img class="product-img-active" id="activeImage" data-image="" 
                            src="./cdn.shopify.com/s/files/1/1573/5553/products/1-10ea2.jpg?v=1601694960"
                            alt=""> -->
                        </div>
                        <div class="product-configuration"  >
                            <!-- Product Color -->
                            <div class="img-choose" id="all_prod_images_container">
                                <!-- <img class="small-view-image" onclick="changeActiveImg(this.src)" src="./cdn.shopify.com/s/files/1/1573/5553/products/1-10ea2.jpg?v=1601694960" alt="">
                                <img class="small-view-image" onclick="changeActiveImg(this.src)" src="./cdn.shopify.com/s/files/1/1573/5553/products/1_c14253f1-8cb5-4a88-921b-d3dbaffaaafa0ea2.jpg?v=1601694960" alt=""> -->


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
                        <p>
                            <svg width="20px" height="20px" fill="green" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512"><path fill-rule="nonzero" d="M256 0c70.69 0 134.7 28.66 181.02 74.98C483.34 121.31 512 185.31 512 256c0 70.69-28.66 134.7-74.98 181.02C390.7 483.34 326.69 512 256 512c-70.69 0-134.7-28.66-181.02-74.98C28.66 390.7 0 326.69 0 256c0-70.69 28.66-134.69 74.98-181.02C121.3 28.66 185.31 0 256 0zm17.75 342.25h29.15v29.32h-93.79v-29.32h28.76v-92.34h-28.76v-29.32h64.64v121.66zm-27.94-150.37c-7.08-.05-13.12-2.53-18.2-7.56-5.08-5.01-7.56-11.11-7.56-18.25 0-7.01 2.48-13.06 7.56-18.08 5.08-5.02 11.12-7.55 18.2-7.55 6.95 0 12.99 2.53 18.08 7.55 5.13 5.02 7.67 11.07 7.67 18.08 0 4.72-1.2 9.07-3.56 12.94-2.36 3.93-5.45 7.07-9.31 9.37-3.87 2.3-8.17 3.45-12.88 3.5zm171.9-97.59C376.33 52.92 319.15 27.32 256 27.32c-63.15 0-120.33 25.6-161.71 66.97C52.92 135.68 27.32 192.85 27.32 256c0 63.15 25.6 120.33 66.97 161.71 41.38 41.37 98.56 66.97 161.71 66.97 63.15 0 120.33-25.6 161.71-66.97 41.37-41.38 66.97-98.56 66.97-161.71 0-63.15-25.6-120.32-66.97-161.71z"/></svg> This is secure product
                        </p>
                        <!-- <p id="product_description"></p> -->
                    </div>
                    <!-- Product Pricing -->
                    <div class="product-price">
                        <span id="product_our_price">&#8377; <span id="product_price"></span></span>
                        <div class="add-to-bttns">
                            <button onclick="addToCart( <?php echo $_GET['productid'] ?> )" class="cart-btn">Add to cart</button>
                            <button onclick="addToWishlist( <?php echo $_GET['productid'] ?> )" class="wish-btn">Add to wishlist</button>
                        </div>
                    </div>
                        
                    <div class="product-mrp">
                        <span>&#8377; <span id="product_mrp"></span></span>
                    </div>
                    <div class="social-media-share-links">
                        <div><h3>Share on:</h3></div>
                        <div class="share-buttons">
                            <a href="#" title="Whatsapp" class="share-btn whatsapp-btn"><i class="fa fa-whatsapp"></i></a>
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
            shareUrl = 'https://api.whatsapp.com/send?text='+ general_product_description + encodeURIComponent(currentUrl);
            window.open(shareUrl);
            break;
        case 'copy-btn':
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text)
                .then(() => {
                    show_msg(`Copied to clipboard: ${text}`);
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
                </div>

                
            </div>
            <div class="description-reviews">
                <div class="container">
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'container1')">Description</button>
                        <button class="tablinks" onclick="openTab(event, 'container2')">Reviews</button>
                    </div>

                    <div id="container1" class="tabcontent active show">
                        <h3>Description</h3>
                        <p id="product_description" ></p>
                    </div>

                    <div id="container2" class="tabcontent">
                        <h3>Reviews</h3>
                        <p>In construction...</p>
                    </div>
                </div>
            </div>

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
                            console.log("Data: ",returned_data);
                            var jsonData = JSON.parse(returned_data);
                            var return_data = jsonData.response;
                            $("#product_category").html(jsonData.response[0].category)
                            $("#product_price").html(jsonData.response[0].price)
                            $("#product_mrp").html(jsonData.response[0].mrp)
                            $("#product_title").html(jsonData.response[0].title)
                            $("#product_description").html(jsonData.response[0].description)

                           

                            if(jsonData.response[0].image === "no"){
                                show_msg("No Image")
                            }
                            else{
                                images_arr = jsonData.response[0].image_name;
                                primary_img = "./admin_panel/uploads/products/"+images_arr[0];
                                // $(".product-img-active").attr(src , primary_img)

                            
                            $('<img />', { 
                                class:"product-img-active",
                                id:"activeImage", 
                                src: primary_img , 
                            })
                            .appendTo($('#main_img_container'));

                                for (let i = 0; i < images_arr.length; i++) {

                                    var img = $('<img />',
                                    { 
                                        onclick: 'changeActiveImg(this.src)',
                                        class: 'small-view-image',
                                        src: "./admin_panel/uploads/products/"+images_arr[i]+"", 
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