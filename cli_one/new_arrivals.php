<div id="shopify-section-1600942005808" class="shopify-section velaFramework" style="position:relative; margin-top:100px">
        <div class="productListHome velaProducts mbBlockGutter"
            style="background-color: rgba(0, 0, 0, 0); padding: 20px 0 25px">
            <div class="container"> <!--  style="max-width: 100%;" -->
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
                        <div class="new-arrivals-scrolling-div auto-slider-div scrolling-products" id="product-container">
                            
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
                            $('.new-arrivals-scrolling-div').append(
                                '<div class="new-arrivals-product-slider auto-slider-slides product-slider">'+
                                    '<a onclick="increase_click_count('+return_data[i].prod_id+')"  href="./productpage.php?productid='+return_data[i].prod_id+'" >'+
                                        '<div class="product-image">'+
                                            '<img class="image1 active lazyload" data-src="./admin_panel/uploads/products/'+return_data[i].image_name+'" alt="">'+
                                            '<div class="Image-button">'+
                                                '<button>Buy Now</button>'+ 
                                            '</div>'+
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
                                                '<div class="our-price" style="height:25px">'+
                                                    '<span class="price-entity">&#8377;</span>'+
                                                    '<span class="price-toggle"  data-currency="INR" data-inr="'+return_data[i].price+'" > '+return_data[i].price+'</span>'+
                                                '</div>'+

                                                '<div class="product-mrp">'+
                                                    '<small id="product_mrp">'+
                                                        '<span class="price-entity">&#8377;</span>'+
                                                        '<span class="price-toggle"  data-currency="INR" data-inr="'+return_data[i].mrp+'" > '+return_data[i].mrp+'</span>'+
                                                    '</small>'+
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


</script>