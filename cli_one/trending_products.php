<div id="shopify-section-1600942005808" class="shopify-section velaFramework">
    <div class="productListHome velaProducts mbBlockGutter" style="background-color: rgba(0, 0, 0, 0); padding: 20px 0 25px">
        <div class="container">
            <div class="sectionInner">
                <div class="headingGroup pb20">
                    <h3 class="velaHomeTitle text-center">
                        <span>Trending products</span>
                    </h3>
                    <!-- <span class="subTitle">
                                    Mirum est notare quam littera gothica quam nunc putamus  parum claram!
                                </span> -->
                </div>
                <div class="product-slider-container">

                    <div class="left-arrow scrolling-arrow"> <span onclick="productSliderScrollLeftTP()">
                            << /span>
                    </div>

                    <div class="trending-products-scrolling-div scrolling-products">

                        <!-- Products -->


                    </div>


                    <div class="right-arrow scrolling-arrow"> <span onclick="productSliderScrollRightTP()">></span> </div>

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
        var api_url_trending_prods = './api/trending_products.php';
        var form_data = {
            "show_products": searched_product,
            "user_id": localStorage.getItem('user_id')
        };
        $.ajax({
            url: api_url_trending_prods,
            type: 'POST',
            data: form_data,
            success: function(returned_data) {
                var jsonData = JSON.parse(returned_data);
                var return_data = jsonData.response;
                console.log(return_data);
                if (return_data[0].status == "failed") {
                    $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, Something went wrong!</div>')
                } else if (return_data[0].status == "success") {
                    for (var i = 0; i < jsonData.response.length; i++) {

                        let outOfStockMessage = "";
                        let inStockMessage = "";
                        if (return_data[i].product_quantity == 0) {
                            outOfStockMessage = "Out of Stock";
                        }
                        // else if(return_data[i].product_quantity <= 5){
                        //     inStockMessage = "only " + return_data[i].product_quantity + " left" 
                        // }
                        else {
                            inStockMessage = "In Stock"
                        }
                        $('.trending-products-scrolling-div').append(
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
                            '<div class="our-price" style="height: 25px">' +
                            '&#8377;' + return_data[i].price +
                            '</div>' +
                            '<div class="product-mrp">' +
                            '<small>&#8377; ' + return_data[i].mrp + '</small>' +
                            ' </div>' +
                            '</div>' +
                            '<div class="add-bttns">' +
                            ' <div class="add-to-cart-slide-button">' +
                            '<button onclick="addToCart(' + return_data[i].prod_id + ')">&plus; Add to cart</button>' +
                            '</div>' +
                            ' <div class="add-to-cart-slide-button">' +
                            '<button onclick="addToWishlist(' + return_data[i].prod_id + ')">&plus;<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" height="23px" width="23px" viewBox="00 -50 380 500"> <defs> <style>.cls-1 {    fill: none;    stroke: currentcolor;    stroke-width: 40px;}' +
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

    function productSliderScrollLeftTP() {
        $('.trending-products-scrolling-div').scrollLeft($('.trending-products-scrolling-div').scrollLeft() - 270)
    }

    function productSliderScrollRightTP() {
        $('.trending-products-scrolling-div').scrollLeft($('.trending-products-scrolling-div').scrollLeft() + 270)
    }
    setInterval(() => {
        productSliderScrollRightTP()
    }, 5000);
</script>