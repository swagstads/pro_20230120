<div id="shopify-section-1600941946634" class="shopify-section velaFramework">
                <div class="productLoadMore mbGutter" style="background-color: rgba(0, 0, 0, 0); padding: 45px 0 50px">
                    <div class="container">
                        <div class="sectionInner">
                            <div class="velaProductsMore">
                                <div class="headingGroup pb20">
                                    <h3 class="velaHomeTitle">
                                        <span>Trending Products</span>
                                    </h3>
                                    <span class="subTitle">
                                        In a hurry ? Navigate directly to the list of best
                                        products available.
                                    </span>
                                </div>
                                <!-- <div class="row1 trending-products ">
                                </div> -->

                                <div class="trending-products-wrapper">
                                    <div class="trending-products-container">
                                        <div class="trending-product">
                                                
                                        </div>
                                    </div>
                                </div>

                                <div class="proLoadMoreBottom"></div>

                                <script>
                                    let api_url = "./api/trending_products.php";
                                    // form data values
                                    var form_data = {"trending_prods":"fetch"};
                                    $.ajax({
                                    url: api_url,
                                    type: 'POST',
                                    // type: 'GET',
                                    data: form_data,
                                    success: function (returned_data) {
                                            var jsonData = JSON.parse(returned_data);
                                            var return_data = jsonData.response;
                                            console.log(return_data);

                                            for (i=0;i< 3; i++){
                                                
                                                $(".trending-product").append('<div class="product">'+
                                                        '<a href="./productpage.php?productid='+return_data[i].product_id+'">'+
                                                            '<div class="image-container">'+
                                                                '<img src="./admin_panel/uploads/products/'+return_data[i].image_name+'" alt="">'+
                                                            '</div>'+
                                                            '<span>'+
                                                                return_data[i].product_title+" - "+return_data[i].product_category + 
                                                            '</span>'+
                                                        '</a>'+
                                                    '</div>'
                                                )
                                            }
                                        }
                                    })
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>