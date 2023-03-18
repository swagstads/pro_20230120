<div id="shopify-section-1600942005808" class="shopify-section velaFramework">
                <div class="productListHome velaProducts mbBlockGutter"
                    style="background-color: rgba(0, 0, 0, 0); padding: 40px 0 45px">
                    <div class="container">
                        <div class="sectionInner">
                            <div class="headingGroup pb20">
                                <h3 class="velaHomeTitle text-center">
                                    <span>Best Sellers</span>
                                </h3>
                                <!-- <span class="subTitle">
                                    Mirum est notare quam littera gothica quam nunc putamus  parum claram!
                                </span> -->
                            </div>
                            <div class="product-slider-container">

                                <div  class="left-arrow scrolling-arrow"> <span onclick="productSliderScrollLeftBS()" ><</span> </div>

                                <div class="best-seller-products scrolling-products">
                                    
                                        <!-- Products -->


                                </div>


                                <div class="right-arrow scrolling-arrow"> <span  onclick="productSliderScrollRightBS()" >></span> </div>

                            </div>

                            

                    </div>
                </div>
            </div>
        </div>

    <script>
        function fetchProduct(){
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);
            var searched_product = urlParams.get('category') || "all"
            var api_url_best_seller = './api/best_sellers.php';
            var form_data = { "show_products": searched_product, "user_id": localStorage.getItem('user_id') };
            $.ajax({
                url: api_url_best_seller,
                type: 'POST',
                data: form_data,
                success: function (returned_data) {
                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response;
                    if (return_data[0].status == "failed") {
                        $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, Something went wrong!</div>')
                    }
                    else if (return_data[0].status == "success") {
                        for (var i = 0; i < jsonData.response.length; i++) {
                            
                            let outOfStockMessage = "";
                            let inStockMessage="";
                            if(return_data[i].product_quantity === 0){
                                outOfStockMessage = "Out of Stock";
                            }
                            else if(return_data[i].product_quantity <= 5){
                                inStockMessage = "only " + return_data[i].product_quantity + " left" 
                            }
                            else{
                                inStockMessage = "In Stock"
                            }
                            $('.best-seller-products').append(
                                '<div class="product-slider">'+
                                    '<a onclick="increase_click_count('+return_data[i].prod_id+')"  href="./productpage.php?productid='+return_data[i].prod_id+'" >'+
                                        '<div class="product-image">'+
                                            '<img class="image1 active lazyload" data-src="./admin_panel/uploads/products/'+return_data[i].image_name+'" alt="">'+
                                        '</div>'+
                                        '<div class="product-title">'+
                                            '<span>'+return_data[i].title+'</span><br>'+
                                        '</div>'+
                                    '</a>'+

                                        '<div class="quantity">'+
                                            '<span class="out-of-stock-message"><small>'+outOfStockMessage+'</small></span>'+
                                            '<span class="in-stock-message"><small>'+inStockMessage+'</small></span>'+
                                        '</div>'+
                                        
                                        '<div class="product-price">'+
                                            '<div class="price-container">'+
                                                '<div class="our-price" style="height: 25px">'+
                                                    '&#8377;'+return_data[i].price+' &nbsp;'+
                                                '</div>'+
                                                '<div class="product-mrp">'+
                                                    '<small>&#8377; '+return_data[i].mrp+'</small>'+
                                               ' </div>'+
                                           '</div>'+
                                           '<div class="add-bttns">'+
                                            ' <div class="add-to-cart-slide-button">'+
                                                    '<button onclick="addToCart('+return_data[i].prod_id+')">&plus; Add to cart</button>'+
                                                '</div>'+
                                                ' <div class="add-to-cart-slide-button">'+
                                                    '<button onclick="addToWishlist('+return_data[i].prod_id+')">&plus; Add to Wishlist</button>'+
                                                '</div>'+
                                            '</div>'+
                                        '</div>'+
                                '</div>'
                            )
                        }
                    }
                    else{
                        // console.log("Nothing");
                    }
                }
            })
        }
        fetchProduct();


        function productSliderScrollRightBS() {
    const container = $('.best-seller-products');
    const scrollAmount = 300;
    container.animate({scrollLeft: container.scrollLeft() - scrollAmount}, 300);
}

function productSliderScrollLeftBS() {
    const container = $('.best-seller-products');
    const scrollAmount = 300;
    container.animate({scrollLeft: container.scrollLeft() + scrollAmount}, 300);
}

let automatic_scroll;

function startAutomaticScroll() {
    automatic_scroll = setInterval(function() {
        productSliderScrollRightBS();
    }, 5000);
}

function stopAutomaticScroll() {
    clearInterval(automatic_scroll);
}

$('.product-slider-container').on({
    mouseenter: function() {
        stopAutomaticScroll();
    },
    mouseleave: function() {
        startAutomaticScroll();
    }
});

startAutomaticScroll();


        function addToCart(product_id){
                var quantity = 1;
                api_url = "./api/add_to_cart.php";
                var form_data = { "add_to_cart": "add" , "productid": product_id,'quantity': quantity};
                $.ajax({
                        url: api_url,
                        type: 'POST',
                        data: form_data,
                        success: function (returned_data) {
                            var jsonData = JSON.parse(returned_data);
                            var return_data = jsonData.response;
                            show_msg(return_data[0].message)
                        }
                })
                cart_count()
            }

</script>
