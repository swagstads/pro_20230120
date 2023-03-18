<div id="shopify-section-1600942005808" class="shopify-section velaFramework">
                <div class="productListHome velaProducts mbBlockGutter"
                    style="background-color: rgba(0, 0, 0, 0); padding: 40px 0 45px">
                    <div class="container">
                        <div class="sectionInner">
                            <div class="headingGroup pb20">
                                <h3 class="velaHomeTitle text-center">
                                    <span>Similar Products</span>
                                </h3>
                                <!-- <span class="subTitle">
                                    Mirum est notare quam littera gothica quam nunc putamus  parum claram!
                                </span> -->
                            </div>
                            <div class="product-slider-container">

                                <div  class="left-arrow scrolling-arrow"> <span onclick="productSliderScrollLeftsimilarProd()" ><</span></div>
                                <div class="similar-products-scroll  scrolling-products">
                                    
                                        <!-- Products -->


                                </div>


                                <div class="right-arrow scrolling-arrow"> <span  onclick="productSliderScrollRightsimilarProd()" >></span> </div>

                            </div>
                 
                    </div>
                </div>
            </div>
        </div>

    <script>
        function fetch_similar_products(product_data){
            console.log(product_data);

            var product_title = product_data.title

            var api_url = './api/similar_products.php';

            var form_data = { 
                "product_title": product_data.title,
                "product_category_name": product_data.category_name,
                "product_category_id": product_data.category_id,
            };
            $.ajax({
                url: api_url,
                type: 'GET',
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
                            // else if(return_data[i].product_quantity <= 5){
                            //     inStockMessage = "only " + return_data[i].product_quantity + " left" 
                            // }
                            else{
                                inStockMessage = "In Stock"
                            }
                            $('.similar-products-scroll').append(
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

        function productSliderScrollLeftsimilarProd(){   
            $('.similar-products-scroll').scrollLeft( $('.similar-products-scroll').scrollLeft() - 270 )
            clearInterval(automatic_scroll);
        }
        function productSliderScrollRightsimilarProd(){
            $('.similar-products-scroll').scrollLeft( $('.similar-products-scroll').scrollLeft() + 270 )
        }
        setInterval(() => {
            productSliderScrollLeftsimilarProd()
        }, 5000);
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
