<div id="shopify-section-1600942005808" class="shopify-section velaFramework">
    <div class="productListHome velaProducts mbBlockGutter" style="background-color: rgba(0, 0, 0, 0); padding: 40px 0 45px">
        <div class="container">
            <div class="sectionInner">
                <div class="headingGroup pb20">
                    <h3 class="velaHomeTitle text-center">
                        <span>Featured Products</span>
                    </h3>
                    <!-- <span class="subTitle">
                                    Mirum est notare quam littera gothica quam nunc putamus  parum claram!
                                </span> -->
                </div>
                <div class="product-slider-container">

                    <div class="left-arrow scrolling-arrow"> <span onclick="productSliderScrollLeftBS()">
                            << /span>
                    </div>

                    <div class="best-seller-products scrolling-products">

                        <!-- Products -->


                    </div>


                    <div class="right-arrow scrolling-arrow"> <span onclick="productSliderScrollRightBS()">></span> </div>

                </div>



            </div>
        </div>
    </div>
</div>

<script>
    function fetchProduct() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        var searched_product = urlParams.get('category') || "all"
        var api_url_best_seller = './api/best_sellers.php';
        var form_data = {
            "show_products": searched_product,
            "user_id": localStorage.getItem('user_id')
        };
        $.ajax({
            url: api_url_best_seller,
            type: 'POST',
            data: form_data,
            success: function(returned_data) {
                var jsonData = JSON.parse(returned_data);
                var return_data = jsonData.response;
                if (return_data[0].status == "failed") {
                    $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, Something went wrong!</div>')
                } else if (return_data[0].status == "success") {
                    for (var i = 0; i < jsonData.response.length; i++) {

                        let outOfStockMessage = "";
                        let inStockMessage = "";
                        if (return_data[i].product_quantity === 0) {
                            outOfStockMessage = "Out of Stock";
                        } else if (return_data[i].product_quantity <= 5) {
                            inStockMessage = "only " + return_data[i].product_quantity + " left"
                        } else {
                            inStockMessage = "In Stock"
                        }
                        $('.best-seller-products').append(
                            '<div class="product-slider">' +
                            '<a onclick="increase_click_count(' + return_data[i].prod_id + ')"  href="./productpage.php?productid=' + return_data[i].prod_id + '" >' +
                            '<div class="product-image">' +
                            '<img class="image1 active lazyload" data-src="./admin_panel/uploads/products/' + return_data[i].image_name + '" alt="">' +
                            '</div>' +
                            '<div class="product-title">' +
                            '<span>' + return_data[i].title + '</span><br>' +
                            '</div>' +
                            '</a>' +

                            '<div class="quantity">' +
                            '<span class="out-of-stock-message"><small>' + outOfStockMessage + '</small></span>' +
                            '<span class="in-stock-message"><small>' + inStockMessage + '</small></span>' +
                            '</div>' +

                            '<div class="product-price">' +
                            '<div class="price-container">' +
                            '<div class="our-price" style="height:25px">' +
                            '<span class="price-entity">&#8377;</span>' +
                            '<span class="price-toggle"  data-currency="INR" data-inr="' + return_data[i].price + '" > ' + return_data[i].price + '</span>' +
                            '</div>' +
                            '<div class="product-mrp">' +
                            '<small id="product_mrp">' +
                            '<span class="price-entity">&#8377;</span>' +
                            '<span class="price-toggle"  data-currency="INR" data-inr="' + return_data[i].mrp + '" > ' + return_data[i].mrp + '</span>' +
                            '</small>' +
                            ' </div>' +
                            '</div>' +
                            '<div class="add-bttns">' +
                            ' <div class="add-to-cart-slide-button">' +
                            '<button onclick="addToCart(' + return_data[i].prod_id + ')">&plus; Add to cart</button>' +
                            '</div>' +
                            ' <div class="add-to-cart-slide-button">' +
                            '<button onclick="addToWishlist(' + return_data[i].prod_id + ')">&plus; <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="23px" width="23px" viewBox="00 -50 380 500"> <defs> <style>.cls-1 {    fill: none;    stroke: currentcolor;    stroke-width: 40px;}' +
                            '</style> </defs> <path class = "cls-1" d = "M701.23,370.35c-81.12-49.29-157.82,49.29-157.82,49.29s-76.7-98.58-157.82-49.29c-51.52,31.31-67,98.8-36,150.54,10.78,18,26.81,37.87,50.23,59.09L543.41,720.4,687.05,580c23.43-21.22,39.45-41.08,50.23-59.09C768.24,469.15,752.76,401.66,701.23,370.35Z" transform = "translate(-331.66 -354.55)" / >' +
                            '</svg> </button>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        )
                    }
                } else {
                    // console.log("Nothing");
                }
            }
        })
    }
    fetchProduct();

    function productSliderScrollLeftBS() {
        $('.best-seller-products').scrollLeft($('.best-seller-products').scrollLeft() - 270)
    }

    function productSliderScrollRightBS() {
        $('.best-seller-products').scrollLeft($('.best-seller-products').scrollLeft() + 270)
    }
    setInterval(() => {
        productSliderScrollLeftBS()
    }, 5000);

    function addToCart(product_id) {
        var quantity = 1;
        api_url = "./api/add_to_cart.php";
        var form_data = {
            "add_to_cart": "add",
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
                show_msg(return_data[0].message)
            }
        })
        cart_count()
    }
</script>