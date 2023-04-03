<div id="shopify-section-1600942005808" class="shopify-section velaFramework">
                <div class="productListHome velaProducts mbBlockGutter"
                    style="background-color: rgba(0, 0, 0, 0); ">
                    <div class="container"> <!--  style="max-width: 100%;" -->
                        <div class="sectionInner">
                            <div class="headingGroup pb20">
                                <h3 class="velaHomeTitle text-center">
                                    <span>More Products</span>
                                </h3>
                                <!-- <span class="subTitle">
                                    Mirum est notare quam littera gothica quam nunc putamus  parum claram!
                                </span> -->
                            </div>
                            <div class="product-slider-container">

                                <div  class="left-arrow scrolling-arrow"> <span onclick="productSliderScrollLeftMP()" ><</span> </div>

                                <div class="more-producst-scroll  scrolling-products">

                                        <!-- Products -->


                                </div>


                                <div class="right-arrow scrolling-arrow"> <span  onclick="productSliderScrollRightMP()" >></span> </div>

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
            var api_url = './api/more-products.php';
            var form_data = { "show_products": searched_product, "user_id": localStorage.getItem('user_id') };
            $.ajax({
                url: api_url,
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
                            // else if(return_data[i].product_quantity <= 5){
                            //     inStockMessage = "only " + return_data[i].product_quantity + " left"
                            // }
                            else{
                                inStockMessage = "In Stock"
                            }
                            $('.more-producst-scroll').append(
                                '<div class="product-slider">'+
                                    '<a onclick="increase_click_count('+return_data[i].prod_id+')"  href="./productpage.php?productid='+return_data[i].prod_id+'" >'+
                                        '<div class="product-image">'+
                                            '<img class="image1 active lazyload" data-src="./admin_panel/uploads/products/'+return_data[i].image_name+'" alt="">'+
                                            '<div class="image-button">'+
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
                                                '<div class="our-price" style="height: 25px">'+
                                                    '<span class="price-entity">&#8377;</span>'+
                                                    '<span class="price-toggle"  data-currency="INR" data-inr="'+return_data[i].price+'"  > '+return_data[i].price+'</span>'+
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
                    }
                    else{
                        // console.log("Nothing");
                    }
                }
            })
        }
        fetchProduct();
        function productSliderScrollLeftMP() {
            const container = $('.more-producst-scroll');
            const containerWidth = container.width();
            const scrollLeft = container.scrollLeft();
            const productWidth = $('.product-slider').outerWidth(true);

            if (scrollLeft === 0) {
                container.scrollLeft(container[0].scrollWidth - containerWidth);
                container.children('.product-slider:last').prependTo(container);
            } else {
                container.scrollLeft(scrollLeft - productWidth);
            }
        }
        function productSliderScrollRightMP() {
            const container = $('.more-producst-scroll');
            const containerWidth = container.width();
            const scrollLeft = container.scrollLeft();
            const productWidth = $('.product-slider').outerWidth(true);

            if (scrollLeft >= container[0].scrollWidth - containerWidth - productWidth) {
                container.scrollLeft(0);
                container.children('.product-slider:first').appendTo(container);
            } else {
                container.scrollLeft(scrollLeft + productWidth);
            }
        }

        // ========== uncommment if want to auto slide in every 5 seconds ==========
        // setInterval(() => {
        //     productSliderScrollRightMP()
        // }, 5000);



</script>
