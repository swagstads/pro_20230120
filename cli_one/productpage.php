<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <?php include('header_links.php'); ?>
</head>

<body>
    <div id="pageContainer" class="isMoved">
        <div id="shopify-section-vela-header" class="shopify-section">
            <?php include('header.php'); ?>
        </div>
        <div class="productpage-bredcrum-wrapper">
            <div class="productpage-bredcrum">
                <div>
                    <span>
                        <a href="./">Home</a>
                    </span>
                    /
                    <span>
                        <a id="breadcrum_category" href="./">Category</a>
                    </span>
                    /
                    <span>
                        <a id="breadcrum_product_name">Product</a>
                    </span>
                </div>
                <div>
                    <span>
                        <!-- Use code <span class="copon-code" title="Click to cpoy" data-clipboard-text="AToZ"> AToZ </span> to get 10% discount. -->
                        <script>
                            $(document).ready(() => {
                                $(".copon-code").click(function() {
                                    // Get the text to copy from the data attribute
                                    var text = $(this).attr("data-clipboard-text");

                                    // Create a temporary input element
                                    var $input = $("<input>")
                                        .attr("type", "text")
                                        .attr("value", text)
                                        .appendTo("body")
                                        .css("position", "fixed")
                                        .css("opacity", "0");

                                    // Select the text in the input element
                                    $input[0].select();

                                    // Copy the selected text to the clipboard
                                    document.execCommand("copy");
                                    show_msg("Coupon code copied to clipboard")
                                    // Remove the temporary input element
                                    $input.remove();
                                });
                            })
                        </script>
                    </span>
                </div>
            </div>
        </div>
        <main>
            <div class="magnifying-glass hide-on-mobile"></div>
            <div class="mainContent productpage" role="main">
                <!-- Left Column / Headphones Image -->
                <div class="left-column">
                    <div class="main_img_container" id="main_img_container">
                        <!-- Main product Image  -->
                    </div>
                    <div class="product-configuration">
                        <div class="img-choose" id="all_prod_images_container">
                            <!-- Product Other images -->
                        </div>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="right-column">
                    <!-- Product Description -->
                    <div class="product-description">
                        <span id="product_category"></span>
                        <h4 id="product_title">
                        </h4>
                        <!-- <sup id="instock"></sup> -->
                        <p style="font-size:12px;">
                            <svg width="11px" height="11px" fill="green" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 512">
                                <path fill-rule="nonzero" d="M256 0c70.69 0 134.7 28.66 181.02 74.98C483.34 121.31 512 185.31 512 256c0 70.69-28.66 134.7-74.98 181.02C390.7 483.34 326.69 512 256 512c-70.69 0-134.7-28.66-181.02-74.98C28.66 390.7 0 326.69 0 256c0-70.69 28.66-134.69 74.98-181.02C121.3 28.66 185.31 0 256 0zm17.75 342.25h29.15v29.32h-93.79v-29.32h28.76v-92.34h-28.76v-29.32h64.64v121.66zm-27.94-150.37c-7.08-.05-13.12-2.53-18.2-7.56-5.08-5.01-7.56-11.11-7.56-18.25 0-7.01 2.48-13.06 7.56-18.08 5.08-5.02 11.12-7.55 18.2-7.55 6.95 0 12.99 2.53 18.08 7.55 5.13 5.02 7.67 11.07 7.67 18.08 0 4.72-1.2 9.07-3.56 12.94-2.36 3.93-5.45 7.07-9.31 9.37-3.87 2.3-8.17 3.45-12.88 3.5zm171.9-97.59C376.33 52.92 319.15 27.32 256 27.32c-63.15 0-120.33 25.6-161.71 66.97C52.92 135.68 27.32 192.85 27.32 256c0 63.15 25.6 120.33 66.97 161.71 41.38 41.37 98.56 66.97 161.71 66.97 63.15 0 120.33-25.6 161.71-66.97 41.37-41.38 66.97-98.56 66.97-161.71 0-63.15-25.6-120.32-66.97-161.71z" />
                            </svg> This is secure product
                        </p>
                    </div>
                    <!-- Product Pricing -->
                    <h4>Color Options</h4>
                    <div class="btn-group" role="group" aria-label="Color Options">
                        <li class="btn btn-primary">Blue</li>   
                        <li class="btn btn-secondary">Gray</li>
                        <li class="btn btn-success">Green</li>
                        <li class="btn btn-danger">Red</li>
                    </div><br>
                    <span class="product_overview"> Overview</span>
                    <p id="product_description" class="truncate-line-5"></p>
                    <div class="read-more-bttn-container">
                        <button id="read_more_bttn" onclick="show_description(this)" class="read-more">Read more</button>
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

                <!-- Extreme-Column  -->
                <div class="extreme-column">
                    <div class="product-price">
                        <span id="product_our_price">MRP:
                            &nbsp;
                            <span>
                                <span class="price-entity">&#8377;</span>
                                <span id="product_price" class="price-toggle">

                                </span>
                                &nbsp;
                                <span>

                                    <small id="product_mrp" class="product-mrp">
                                        <span class="price-entity">&#8377;</span>
                                        <span id="product_mrp_val" class="price-toggle"></span>
                                    </small>

                                </span>

                                &nbsp;
                                <br>
                                <span class="incl-of-tax">(incl. of all taxes)</span></span>
                        </span>
                    </div>
                    <div class="manipulate-quantity-container">
                        <span class="input-number-decrement" onclick="product_quantity().decrease()">-</span>

                        <span id="prod_qnty_show">1</span>
                        <input type="hidden" id="prod_qnty_inp" min="1" max="" value="1">

                        <span class="input-number-increment" onclick="product_quantity().increase()">+</span>
                    </div>
                    <div class="out-of-stock-mssge">
                        <span>Out of stock</span>
                    </div>
                    <div class="add-to-bttns">
                        <button onclick="addToCart( <?php echo $_GET['productid'] ?> )" class="add-to-bttns cart-btn">Add to Cart</button>
                        <button onclick="instant_checkout(<?php echo $_GET['productid'] ?> )" class="add-to-bttns wish-btn" id="checkout_bttn">Buy Now</button>
                        <button onclick="addToWishlist( <?php echo $_GET['productid'] ?> )" class="add-to-bttns wish-btn"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="23px" width="23px" viewBox="00 -50 380 500"> <defs> <style>
                            .cls-1 {    
                                fill: none;    
                                stroke: currentcolor;    
                                stroke-width: 40px;} 
                        </style> </defs> <path class = "cls-1" d = "M701.23,370.35c-81.12-49.29-157.82,49.29-157.82,49.29s-76.7-98.58-157.82-49.29c-51.52,31.31-67,98.8-36,150.54,10.78,18,26.81,37.87,50.23,59.09L543.41,720.4,687.05,580c23.43-21.22,39.45-41.08,50.23-59.09C768.24,469.15,752.76,401.66,701.23,370.35Z" transform = "translate(-331.66 -354.55)" / >'+
                        </svg> </button>
                        <script>
                            function instant_checkout(prod_id) {
                                event.preventDefault()
                                let api_url = "./api/fetch_address.php";

                                // form data values
                                $.ajax({
                                    url: api_url,
                                    type: 'POST',
                                    // type: 'GET',
                                    success: function(returned_data) {
                                        var jsonData = JSON.parse(returned_data);
                                        var return_data = jsonData.response[0];
                                        console.log(return_data);
                                        if (return_data.status === "ok") {
                                            localStorage.setItem("instant_checkout_product_id", prod_id)
                                            localStorage.setItem("instant_checkout_quantity", $("#prod_qnty_inp").val())
                                            window.location.href = "./instant_checkout.php"
                                        } else {
                                            show_msg(return_data.message)
                                        }
                                    }
                                })
                            }
                        </script>
                    </div>
                    <div class="social-media-share-links">
                        <div>
                            <h4>Share on:</h4>
                        </div>
                        <div class="share-buttons">
                            <a href="#" title="Whatsapp" class="share-btn whatsapp-btn"><i class="fa fa-whatsapp"></i></a>
                            <!-- <a href="#" title="Instagram" class="share-btn insta-btn"><i class="fa fa-instagram"></i></a> -->
                            <!-- <a href="#" title="Facebook" class="share-btn fb-btn"><i class="fa fa-facebook"></i></a> -->
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
                </div>

            </div>

            <!-- review tab -->

            <div class="description-reviews">
                <div class="container">
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'container1')">Reviews</button>
                        <button class="tablinks" onclick="openTab(event, 'container2')">Write feedback</button>
                    </div>
                    <div id="container1" class="tabcontent active show">
                        <h3>Reviews</h3>
                        <div class="show-reviews-container-wrapper">
                            <div class="show-reviews-container">

                                <div class="reviews">




                                </div>


                                <script>
                                    function getFeedbacks() {
                                        let api_url = "./api/fetch_feedbacks.php";

                                        product_id = <?php echo $_GET['productid'] ?>;

                                        // form data values
                                        var form_data = {
                                            product_id: product_id
                                        };
                                        $.ajax({
                                            url: api_url,
                                            type: 'POST',
                                            data: form_data,
                                            success: function(returned_data) {
                                                var jsonData = JSON.parse(returned_data);
                                                var return_data = jsonData.response;
                                                console.log(return_data);

                                                if (return_data.length > 0) {
                                                    let rated_star = '<span class="rate-star rate-star-1">' +
                                                        '<svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">' +
                                                        '<polygon class="star-elem rated-fill" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25"/>' +
                                                        '</svg>' +
                                                        '</span>'
                                                    let unrated_start = '<span class="rate-star rate-star-1">' +
                                                        '<svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">' +
                                                        '<polygon class="star-elem" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25"/>' +
                                                        '</svg>' +
                                                        '</span>'

                                                    for (let i = 0; i < return_data.length; i++) {
                                                        let star = "";
                                                        for (let j = 0; j < return_data[i].stars; j++) {
                                                            star += rated_star;
                                                        }
                                                        for (let j = return_data[i].stars; j < 5; j++) {
                                                            star += unrated_start;
                                                        }

                                                        let review_container =
                                                            '<div class="review">' +
                                                            '<div class="user-info">' +
                                                            '<div class="profile-img-container">' +
                                                            '<img src="' + return_data[i].profile_img + '"  class="profile-mg"  alt="">' +
                                                            '</div>' +
                                                            '<div class="user-name">' +
                                                            return_data[i].name +
                                                            '</div>' +
                                                            '</div>' +
                                                            '<div class="user-ratings">' +
                                                            star +
                                                            '</div>' +
                                                            '<div class="user-feeedback">' +
                                                            return_data[i].feedback +
                                                            '</div>' +
                                                            '</div>'

                                                        $(".reviews").append(review_container);
                                                    }
                                                } else {
                                                    $(".show-reviews-container").html("<h4 style='text-align:center'>No reviews yet..</h4>");
                                                }


                                            }
                                        })
                                    }
                                    getFeedbacks()

                                    function getColors(){
                                        let api_url = "./api/fetch_color.php";

                                        product_id = <?php echo $_GET['productid'] ?>;
                                        // form data values
                                        var form_data = {
                                            product_id: product_id
                                        };
                                        $.ajax({
                                            url: api_url,
                                            type: 'POST',
                                            data: form_data,
                                            success: function(returned_data) {
                                                var jsonData = JSON.parse(returned_data);
                                                var return_data = jsonData.response;
                                                console.log(return_data);
                                                if (return_data.length > 0) {
                                                    console.log("Length is here");
                                                }
                                                else{
                                                    console.log("Length is oolalala");
                                                }
                                            }
                                        })
                                    }

                                    getColors()
                                </script>

                            </div>
                        </div>

                    </div>
                    <div id="container2" class="tabcontent">
                        <h3>Write your Feedback</h3>
                        <!-- Rate and feedback -->
                        <div class="ratings-container-wrapper">
                            <div class="ratings-container">
                                <form method="post" onsubmit="sendFeedback()">
                                    <div class="upper-box">

                                        <div class="user-info">

                                            <div class="profile-img-container">
                                                <img src="<?php echo $_SESSION['profile_img'] ?>" class="profile" alt="">
                                            </div>

                                            <div class="user-details">
                                                <?php echo $_SESSION['name'] ?>
                                            </div>

                                        </div>

                                        <div class="rating-star-input">
                                            <input type="hidden" name="" id="rating_val" required>
                                            <span class="rate-star rate-star-1" onclick="rateStarVal(1)" onmouseenter="rateStar(1)" onmouseleave="unrateStar(1)">
                                                <svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">
                                                    <polygon class="star-elem" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25" />
                                                </svg>
                                            </span>
                                            <span class="rate-star rate-star-2" onclick="rateStarVal(2)" onmouseenter="rateStar(2)" onmouseleave="unrateStar(2)">
                                                <svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">
                                                    <polygon class="star-elem" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25" />
                                                </svg>
                                            </span>
                                            <span class="rate-star rate-star-3" onclick="rateStarVal(3)" onmouseenter="rateStar(3)" onmouseleave="unrateStar(3)">
                                                <svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">
                                                    <polygon class="star-elem" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25" />
                                                </svg>
                                            </span>
                                            <span class="rate-star rate-star-4" onclick="rateStarVal(4)" onmouseenter="rateStar(4)" onmouseleave="unrateStar(4)">
                                                <svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">
                                                    <polygon class="star-elem" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25" />
                                                </svg>
                                            </span>
                                            <span class="rate-star rate-star-5" onclick="rateStarVal(5)" onmouseenter="rateStar(5)" onmouseleave="unrateStar(5)">
                                                <svg id="Layer_1" data-name="Layer 1" height="50px" width="40px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 595.28 841.89">
                                                    <polygon class="star-elem" points="297.64 258.25 350.5 365.36 468.7 382.54 383.17 465.91 403.36 583.64 297.64 528.05 191.91 583.64 212.1 465.91 126.57 382.54 244.78 365.36 297.64 258.25" />
                                                </svg>
                                            </span>


                                        </div>

                                        <script>
                                            function rateStar(n) {
                                                let star = document.querySelectorAll(`.star-elem`);
                                                for (let i = 0; i < n; i++) {
                                                    star[i].classList.add("hover-fill")
                                                }
                                            }

                                            function unrateStar(n) {
                                                let star = document.querySelectorAll(`.star-elem`);
                                                for (let i = n - 1; i < 5; i++) {
                                                    star[i].classList.remove("hover-fill")
                                                }
                                            }

                                            function rateStarVal(n) {
                                                let star = document.querySelectorAll(`.star-elem`);
                                                for (let i = 0; i < n; i++) {
                                                    star[i].classList.add("rated-fill")
                                                }
                                                for (let i = n; i < 5; i++) {
                                                    star[i].classList.remove("rated-fill")
                                                }
                                                $("#rating_val").val(n)
                                            }
                                        </script>

                                    </div>

                                    <div class="bottom-box">
                                        <div class="feedback-section">
                                            <textarea name="Feedback" class="feedback-input" placeholder="Give me feedback" id="" rows="5" required></textarea>
                                        </div>
                                    </div>

                                    <div class="submit-bttn-container">
                                        <button class="submit-ratings-bttn">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <script>
                                function sendFeedback() {
                                    event.preventDefault()

                                    rateVal = parseInt($("#rating_val").val());
                                    feedback = $(".feedback-input").val();
                                    if (feedback.length < 500) {
                                        if (rateVal) {
                                            let inert_feedback_api_url = "./api/insert_feedback.php";

                                            // form data values
                                            var form_data = {
                                                stars: rateVal,
                                                feedback: feedback,
                                                product_id: <?php echo $_GET['productid'] ?>
                                            };
                                            $.ajax({
                                                url: inert_feedback_api_url,
                                                type: 'POST',
                                                // type: 'GET',
                                                data: form_data,
                                                success: function(returned_data) {
                                                    console.log(returned_data);
                                                    var jsonData = JSON.parse(returned_data);
                                                    var return_data = jsonData.response[0];
                                                    show_msg(return_data.message)
                                                }
                                            })
                                        } else {
                                            show_msg("Please provide rating to submit feedback...")
                                        }
                                    } else {
                                        show_msg("Please provide short feedback of less than 500 letters...")
                                    }
                                }
                            </script>
                        </div>
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

            <div class="best-seller">
                <?php include('./recently_viewed.php') ?>
            </div>

            <div class="more-products">
                <?php include('./similar_products.php') ?>
            </div>


            <!-- <div class="trending-products">
                <?php //include('./trending_products.php')
                ?>
            </div>

            <div class="best-seller">
                <?php //include('./best_seller.php')
                ?>
            </div>

            <div class="more-products">
                <?php //include('./more-products.php')
                ?>
            </div> -->

        </main>


        <script>
            var product_id = <?php echo $_GET['productid'] ?>;
            var api_url = './api/fetch_single_product.php?product_id';
            var form_data = {
                "fetch_products": "fetch",
                "productid": product_id
            };
            $.ajax({
                url: api_url,
                type: 'GET',
                data: form_data,
                success: function(returned_data) {
                    console.log("Data: ", returned_data);
                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response;
                    let outOfStockMessage = "";
                    let inStockMessage = "";
                    if (jsonData.response[0].product_quantity == 0) {
                        outOfStockMessage = "Out of Stock";
                        $("#instock").append('<sup class="blinking-box-out"><span>' + outOfStockMessage + '</span></sup>');
                    } else if (jsonData.response[0].product_quantity <= 60) {
                        inStockMessage = "Only " + jsonData.response[0].product_quantity + " left";
                        $("#instock").append('<sup class="blinking-box"><span>' + inStockMessage + '</span></sup>');
                    } else {
                        inStockMessage = "In Stock"
                        $("#instock").html();
                    }
                    product_qnty = return_data[0].product_quantity;
                    if (product_qnty != 0) {
                        $("#prod_qnty_inp").attr("max", product_qnty)
                        $(".out-of-stock-mssge").hide()

                    } else {
                        $(".manipulate-quantity-container").hide()
                        $(".out-of-stock-mssge").show()
                        $(".add-to-bttns").hide()
                    }

                    if (jsonData.response[0].description.length <= 580) {
                        $("#read_more_bttn").hide()
                    }
                    // Chaange breadcrum text and href link to products category
                    $("#breadcrum_category").text(jsonData.response[0].caps_category_name).attr('href', '/products.php?category=' + jsonData.response[0].category_name);
                    // add product title description and price dynamically
                    $("#breadcrum_product_name").text(jsonData.response[0].title)
                    $("#product_title").text(jsonData.response[0].title)
                    $("#product_description").text(jsonData.response[0].description)
                    $("#product_price").text(jsonData.response[0].price)
                    $("#product_price").attr("data-inr", jsonData.response[0].price)
                    $("#product_mrp_val").text(jsonData.response[0].mrp)

                    if (jsonData.response[0].image === "no") {
                        // show_msg("")
                        console.log("No Image");
                    } else {
                        images_arr = jsonData.response[0].image_name;
                        primary_img = "./admin_panel/uploads/products/" + images_arr[0];



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
                        var magnifyingGlass = $('.magnifying-glass');
                        var image = $('.product-img-active');
                        image.ready(() => {
                            console.log("Image", image[0]);
                        })
                        image.mousemove(function(event) {
                            console.log("Mouse Moved on image");
                            // Load the full-sized image and set it as the background image of the magnifying glass
                            var fullSizeImage = new Image();
                            fullSizeImage.src = image.attr('src');
                            $(fullSizeImage).on('load', function() {
                                magnifyingGlass.css('background-image', 'url(' + fullSizeImage.src + ')');
                            });

                            // Calculate the position of the mouse relative to the image
                            var posX = event.pageX - image.offset().left;
                            var posY = event.pageY - image.offset().top;

                            // Calculate the position of the magnifying glass relative to the image
                            var glassPosX = posX - magnifyingGlass.width() / 2;
                            var glassPosY = posY - magnifyingGlass.height() / 2;

                            // Limit the movement of the magnifying glass to stay within the boundaries of the image
                            if (glassPosX < 0) {
                                glassPosX = 0;
                            } else if (glassPosX > image.width() - magnifyingGlass.width()) {
                                glassPosX = image.width() - magnifyingGlass.width();
                            }

                            if (glassPosY < 0) {
                                glassPosY = 0;
                            } else if (glassPosY > image.height() - magnifyingGlass.height()) {
                                glassPosY = image.height() - magnifyingGlass.height();
                            }

                            // Move the magnifying glass to the current mouse position
                            magnifyingGlass.css({
                                // 'left': event.pageX - 200 + 'px',
                                // 'top': event.pageY - 150 + 'px',
                                'visibility': 'visible',
                                'background-position': '-' + (posX * 2) + 'px -' + (posY * 2) + 'px'
                            });
                        });

                        // Hide the magnifying glass when the mouse leaves the image
                        image.mouseleave(function() {
                            magnifyingGlass.css('visibility', 'hidden');
                        });
                    }
                    fetch_similar_products(return_data[0])

                }
            })
            save_recent_views(product_id)


            function save_recent_views(product_id) {
                let api_url = "./api/insert_recent_views.php";
                var form_data = {
                    "product_id": product_id
                };
                $.ajax({
                    url: api_url,
                    type: 'POST',
                    // type: 'GET',
                    data: form_data,
                    success: function(returned_data) {
                        console.log(returned_data);
                        var jsonData = JSON.parse(returned_data);
                        var return_data = jsonData.response[0];
                        console.log(return_data);
                    }
                })
            }

            function changeActiveImg(sourceImg) {
                var activeImg = document.getElementById("activeImage")
                activeImg.src = sourceImg
            }
        </script>


    </div>
    <div id="shopify-section-vela-footer" class="shopify-section">
        <footer id="velaFooter">
            <?php include('footer.php'); ?>
        </footer>
    </div>

    <?php include('footer_links.php'); ?>

    <script>
        function product_quantity() {
            qnty_val = $("#prod_qnty_inp").val();
            max_qnty = $("#prod_qnty_inp").attr("max");

            function increase() {
                qnty_val = parseInt(qnty_val) + 1
                if (qnty_val <= max_qnty) {
                    $("#prod_qnty_inp").val(qnty_val)
                    $("#prod_qnty_show").text(qnty_val)
                } else {
                    show_msg("Stock not available")
                }
            }

            function decrease() {
                qnty_val = parseInt(qnty_val) - 1
                if (qnty_val > 0) {
                    $("#prod_qnty_inp").val(qnty_val)
                    $("#prod_qnty_show").text(qnty_val)

                } else {
                    show_msg("Quantity cannot be 0")
                }
            }

            return {
                increase: increase,
                decrease: decrease
            }
        }
    </script>

</body>

</html>