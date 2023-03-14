
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
            for (i=0;i< 3; i++){
                
                $(".trending-products").append(
                    '<a href="productpage.php?productid='+return_data[i].product_id+'">'+
                        '<div class="container10 col-md-3">'+
                            '<img src="https://cdn.shopify.com/s/files/1/1573/5553/products/14_360x.jpg" />'+
                            '<img src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />'+
                            '<img src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />'+
                        '</div>'+
                        // '<br/><div style="text-align:center">'+return_data[i].product_title+' - '+return_data[i].product_category+'</div>'+
                    '</a>'
                )
            }
        }
    })
</script>