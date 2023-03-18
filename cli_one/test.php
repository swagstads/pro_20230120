<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <head>
    <?php include('header_links.php'); ?>
</head>

<style>
    .product-slider{
        animation: productScrollerFromRight 100s linear infinite;
    }
    .trending-products-scrolling-div:hover .product-slider{
        animation-play-state: paused;
    }
    .trending-products-scrolling-div{
        transform: translateX(0);
        position: relative;
    }
    @keyframes productScrollerFromRight {
        0%{
            transform: translateX(100px);
        }
        50%{
            transform: translateX(calc(-270px * 5));
        }
        100%{
            transform: translateX(100px);
        }
    }
</style>

<body>
<div id="shopify-section-vela-header" class="shopify-section">
    <header id="header" class="velaHeader">
        <?php include('./header.php'); ?>
    </header>
</div>
<div id="shopify-section-1600942005808" class="shopify-section velaFramework" style="position:relative; margin-top:100px">
                <div class="productListHome velaProducts mbBlockGutter"
                    style="background-color: rgba(0, 0, 0, 0); padding: 20px 0 25px">
                    <div class="container">
                        <div class="sectionInner">
                            <div class="headingGroup pb20">
                                <h3 class="velaHomeTitle text-center">
                                    <span>New Arrivals</span>
                                </h3>
                                <!-- <span class="subTitle">
                                    Mirum est notare quam littera gothica quam nunc putamus  parum claram!
                                </span> -->
                            </div>
                            <div class="product-slider-container">
                                <div class="trending-products-scrolling-div scrolling-products" id="product-container">
                                    
                                        <!-- Products -->

                                </div>
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
            var api_url_best_seller = './api/new_arrivals.php';
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
                            if(return_data[i].product_quantity == 0){
                                outOfStockMessage = "Out of Stock";
                            }
                            // else if(return_data[i].product_quantity <= 5){
                            //     inStockMessage = "only " + return_data[i].product_quantity + " left" 
                            // }
                            else{
                                inStockMessage = "In Stock"
                            }
                            $('.trending-products-scrolling-div').append(
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
                                                    '&#8377;'+return_data[i].price+
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
                        
                        $( ".trending-products-scrolling-div" ).clone().prepend( ".trending-products-scrolling-div" );
                    }
                    else{
                        // console.log("Nothing");
                    }
                }
            })
        }
        fetchProduct();
        var productContainer = document.getElementById("product-container");
        productContainer.addEventListener("animationiteration", function() {
            // Get the first product element
            var firstProduct = productContainer.firstElementChild;

            // Move the first product element to the end of the list
            productContainer.appendChild(firstProduct);
        });




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


<div id="shopify-section-vela-footer" class="shopify-section">
        <footer id="velaFooter">
            <?php include('footer.php'); ?>
        </footer>
    </div>
    </div>

    <?php include('footer_links.php'); ?>

</body>
</html>