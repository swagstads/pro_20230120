<div id="shopify-section-1600942005808" class="shopify-section velaFramework">
                <div class="productListHome velaProducts mbBlockGutter"
                    style="background-color: rgba(0, 0, 0, 0); padding: 40px 0 45px">
                    <div class="container">
                        <div class="sectionInner">
                            <div class="headingGroup pb20">
                                <h3 class="velaHomeTitle text-center">
                                    <span>More Products</span>
                                </h3>
                                <span class="subTitle">
                                    Mirum est notare quam littera gothica quam nunc putamus  parum claram!
                                </span>
                            </div>
                            <div class="product-slider-container">

                                <div  class="left-arrow scrolling-arrow"> <span onclick="productSliderScrollLeft()" ><</span> </div>

                                <div class="scrolling-products">
                                    
                                        <!-- Products -->


                                </div>


                                <div class="right-arrow scrolling-arrow"> <span  onclick="productSliderScrollRight()" >></span> </div>

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

            console.log("SP: ",searched_product);   

            var api_url = './api/more-products.php';
            console.log(api_url);
            var form_data = { "show_products": searched_product, "user_id": localStorage.getItem('user_id') };
            $.ajax({
                url: api_url,
                type: 'POST',
                data: form_data,
                success: function (returned_data) {
                    var jsonData = JSON.parse(returned_data);
                    var return_data = jsonData.response;
                    // console.log(jsonData);
                    if (return_data[0].status == "failed") {
                        // console.log('failed to fetched product data');
                        $("#product_container").append('<div style="text-align:center;width:100%;font-size:20px">Sorry, no results found</div>')
                    }
                    else if (return_data[0].status == "success") {
                        // console.log('Fetched products Data');
                        // console.log(jsonData.response);
                        for (var i = 0; i < jsonData.response.length; i++) {
                            // console.log("Data "+i+":"+return_data[i].title);
                            $('.scrolling-products').append(
                                '<div class="product-slider">'+
                                    '<a href="/productpage.php?productid='+return_data[i].id+'">'+
                                        '<div class="product-image">'+
                                            '<img class="image1 active lazyload" data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/14_360x.jpg?v=1601694510" alt="">'+
                                        '</div>'+
                                        '<div class="product-title">'+
                                            '<span>'+return_data[i].title+'</span>'+
                                        '</div>'+
                                    '</a>'+

                                        '<div class="product-price">'+
                                            '<div class="price-container">'+
                                                '<div class="our-price">'+
                                                    '&#8377; '+return_data[i].price+' &nbsp;'+
                                                '</div>'+
                                                '<div class="product-mrp">'+
                                                    '<small>&#8377; '+return_data[i].mrp+'</small>'+
                                               ' </div>'+
                                           '</div>'+
                                           ' <div class="add-to-cart-slide-button">'+
                                                '<button onclick="addToCart('+return_data[i].id+')">&plus; Add to cart</button>'+
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

        function productSliderScrollLeft(){
            $('.scrolling-products').scrollLeft( $('.scrolling-products').scrollLeft() - 270 )
        }
        function productSliderScrollRight(){
            $('.scrolling-products').scrollLeft( $('.scrolling-products').scrollLeft() + 270 )
        }

        function addToCart(product_id){
                var quantity = 1;
                api_url = "/api/add_to_cart.php";
                console.log("adding to cart: pro id,", product_id);
                var form_data = { "add_to_cart": "add or update" , "productid": product_id,'quantity': quantity};
                console.log(form_data);
                $.ajax({
                        url: api_url,
                        type: 'POST',
                        data: form_data,
                        success: function (returned_data) {
                            var jsonData = JSON.parse(returned_data);
                            var return_data = jsonData.response;
                            console.log(return_data);
                            alert(return_data[0].message)
                        }
                })
                console.log("Ended");
            }

</script>
