<?php
?>
<!doctype html>
 
<html class="no-js" lang="en">
 

<!--  /contact-us  :58 GMT -->
 
<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 

<head>
    <?php include('header_links.php'); ?>
</head>

<body id="contact-us" class="template-page  velaFloatHeader ">
    <div id="pageContainer" class="isMoved">
        <div id="shopify-section-vela-header" class="shopify-section">
            <header id="velaHeader" class="velaHeader">
                <?php include('header.php') ?>
            </header>
        </div>
        <div id="shopify-section-vela-breacrumb-image" class="shopify-section">


            <section class="velaBreadcrumbs hasBackgroundImage floaHeader">
                <div class="velaBreadcrumbsInner" style="background-color: #ffffff">
                    <div class="velaBreadcrumbImage">


                        <img alt="Outstock"
                            src="./cdn.shopify.com/s/files/1/1573/5553/files/bread-blog8c8c.jpg?v=1614329640" />
                    </div>
                    <nav class="velaBreadcrumbWrap container">
                        <div class="velaBreadcrumbsInnerWrap">
                            <h2 class="breadcrumbHeading">Collections</h2>
                            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="./index.php" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">Collections</span>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </section>
        </div>

        <main>

            <div class="show-products-wrapper">
                <div class="show-all-products-container">

                </div>
            </div>

            
            <div class="order-history-wrapper">
                <div class="order-history-container">

                </div>
            </div>

            

    <script>
        var api_url = './api/fetch_all_products.php';
        var order_history_table = document.querySelector(".order-history-table");
        var form_data = { "show_products": "show"};
        $.ajax({
            url: api_url,
            type: 'POST',
            data: form_data,
            success: function (returned_data) {
                console.log(returned_data);
                var jsonData = JSON.parse(returned_data);
                var return_data = jsonData.response;
                if(jsonData.response.length > 0){
                    for (var i = 0; i < jsonData.response.length; i++) {
                        $(".order-history-container").append('<a href="./productpage.php?productid='+return_data[i].id+'"  ><div class="order-history-container-row">'+
                            '<div class="left">'+
                                '<div class="image">'+
                                    '<img src="./admin_panel/uploads/products/'+return_data[i].image_name+'" alt="" srcset="">'+
                                '</div>'+
                            '</div>'+
                            '<div class="right">'+
                                '<div class="ordered-product-details">'+
                                    '<div class="title">'+
                                        '<h2>'+return_data[i].title+' - ' +return_data[i].category+ ' </h2>'+
                                    '</div>'+
                                    '<div class="description truncate-overflow ">'+
                                        return_data[i].description+
                                    '</div>'+
                                '</div>'+
                                '<div class="ordered-quantity">'+
                                        // 'Qnty: &nbsp;<h4></h4>'+
                                '</div>'+
                                '<div class="price">'+
                                    'Our price: &nbsp;<h4>'+return_data[i].price+'</h4>'+
                                '</div>'+
                                '<div class="mrp">'+
                                    // 'Amount: &nbsp;<h4>Rs.'+return_data[i].mrp+'</h4>'+
                                '</div>'+
                            '</div>'+
                        '</div></a>')
                    }
                }
                else{
                    $(".order-history-container").html("<h3 style='text-align:center'>No order history found</h3>")
                }
            }
        })


    </script>
            

        </main>


<div id="shopify-section-vela-footer" class="shopify-section">
    <footer id="velaFooter">
        <?php include('footer.php'); ?>
    </footer>
</div>

 
<?php include('footer_links.php'); ?>
<script src="js/main.js?key=<?= date('is') ?>" type="text/javascript"></script>
<script>
            // To open search modal on key press
            document.onkeydown = function() {
            let all_contact_inp = document.querySelectorAll(".contact-form");
            let all_inp = document.querySelectorAll(".info");

            if (window.event.keyCode >= 65 & window.event.keyCode <= 90 & all_contact_inp.length <= 0 & all_inp.length <= 0) {
                openSearchModal()
                document.getElementById("search_query").focus();
            }
            if (window.event.keyCode === 27) {
                closeSearchModal()
            }
        }
</script>

</div>

</body>

<!--  /contact-us  :58 GMT -->

</html>