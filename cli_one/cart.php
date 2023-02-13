<!DOCTYPE html>
 
<html class="no-js" lang="en">
 

<!--  cart  27:04 GMT -->
 
<meta http-equiv="content-type" content="text/html;charset=utf-8" /> 

<head>
    <?php include('header_links.php') ?>
</head>

<body id="your-shopping-cart" class="template-cart velaFloatHeader">
    <div id="cartDrawer" class="drawer drawerRight">
        <div class="drawerClose">
            <span class="jsDrawerClose"></span>
        </div>
        <div class="drawerCartTitle">
            <span>Shopping cart</span>
        </div>
        <div id="cartContainer"></div>
    </div>
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
                        <img alt="Outstock" src="./cdn.shopify.com/s/files/1/1573/5553/files/bread-blog8c8c.jpg?v=1614329640" />
                    </div>
                    <nav class="velaBreadcrumbWrap container">
                        <div class="velaBreadcrumbsInnerWrap">
                            <h1 class="breadcrumbHeading">Your Shopping Cart</h1>

                            <ol class="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a href="index.html" title="Back to the frontpage" itemprop="item">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li class="active" itemprop="itemListElement" itemscope
                                    itemtype="http://schema.org/ListItem">
                                    <span itemprop="name">Your Shopping Cart</span>
                                    <meta itemprop="position" content="2" />
                                </li>
                            </ol>
                        </div>
                    </nav>
                </div>
            </section>
        </div>
        <main class="mainContent" role="main">
            <section id="pageContent">
                <div class="container">
                    <div id="shopify-section-vela-template-cart" class="shopify-section">
                        <div class="cartContainer">
                            <h1 class="cartTitle hidden">Shopping cart</h1>
                            <div class="cartContent">
                              <table id='cart-product-table' width="100%">
                                <tr>
                                    <th width="60%">Product</th>
                                    <th width="10%">Price</th>
                                    <th width="15%">Quantity</th>
                                    <th width="10%">Total</th>
                                    <th width="5%">Action</th>
                                </tr>
                                <tr> 
                                    <td>
                                        <div>
                                            <img src='' alt=''>
                                        </div>
                                        <div class='cart-product-info'>
                                            <div class='cart-prodct-title'>
                                                Title
                                            </div>
                                            <div class='cart-product-description'>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae illum qui voluptatibus, expedita inventore, eos error harum voluptates reprehenderit officia odit porro pariatur? Officiis quod quas, tempore ipsam assumenda eveniet!
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        &#8377; 1600
                                    </td>
                                    <td>
                                        <span class='input-number-decrement'>–</span><input class='input-number' type='text' value='1' min='0' max='10'><span class='input-number-increment'>+</span>
                                    </td>
                                    <td>
                                        &#8377;1600
                                    </td>
                                    <td>
                                        <a href=""><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>

<?php
    if(isset($_SESSION['username'])){ // If logged in
        $userid = $_SESSION['user_id'];
        $sql = "SELECT * FROM cart WHERE user_id= '$userid' ";
        $result = $dbh->query($sql);

        if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                // Do stuff
                // echo "id: " . $row["id"]."<br>";
            }
            
            ?>
        </table>
        
<?php
    }
        else {
            echo "<div class='cartEmptyContent'>
                    <p class='cartEmpty'>Your cart is currently empty.</p>
                    <p>
                        Before proceed to checkout you must add some products to
                        your shopping cart.<br />
                        You will find a lot of interesting products on our
                        Website.
                    </p>
                    <p>
                        <a class='btn btnVelaOne' href='collections/all.html' title='Go to Shopping'>Go
                            to Shopping</a>
                    </p>
                </div>";
}
?>
<?php
    } // If logged in
    else{ // If not logged in
?>
                                        <div class="cartEmptyContent">
                                            <p class="cartEmpty">You haven't logged in yet.</p>
                                            <p>
                                                Please Login to continue.
                                            </p>
                                            <p>
                                                <a class="btn btnVelaOne" href="./login-page.php" title="Go to Shopping">
                                                    Login
                                                </a>
                                            </p>
                                        </div>
<?php
    // If not logged in
    }
?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>


        <div id="shopify-section-vela-template-notification" class="shopify-section"></div>
        <script type="text/javascript">
        $(window).on("load", function() {
            var dateCookie = new Date();
            var minutes = 60;
            dateCookie.setTime(dateCookie.getTime() + minutes * 60 * 1000);
            setTimeout(function() {
                if (
                    document.body.classList.contains("template-collection") &&
                    $("#velaNotifiCollection").length > 0 &&
                    $.cookie("velaNotifiCollectioin") != "closed"
                ) {
                    $.fancybox.open({
                        src: "#velaNotifiCollection",
                        opts: {
                            padding: 0,
                            beforeLoad: function() {
                                $("#velaNotifiCollection").removeClass("hidden");
                            },
                            href: "#velaNotifiCollection",
                            helpers: {
                                overlay: true,
                            },
                            afterClose: function() {
                                $("#velaNotifiCollection").addClass("hidden");
                                $.cookie("velaNotifiCollectioin", "closed", {
                                    expires: dateCookie,
                                    path: "/",
                                });
                            },
                        },
                    });
                } else if (
                    document.body.classList.contains("template-blog") &&
                    $("#velaNotifiBlog").length > 0 &&
                    $.cookie("velaNotifiBlog") != "closed"
                ) {
                    $.fancybox.open({
                        src: "#velaNotifiBlog",
                        opts: {
                            padding: 0,
                            beforeLoad: function() {
                                $("#velaNotifiBlog").removeClass("hidden");
                            },
                            href: "#velaNotifiBlog",
                            helpers: {
                                overlay: true,
                            },
                            afterClose: function() {
                                $("#velaNotifiBlog").addClass("hidden");
                                $.cookie("velaNotifiBlog", "closed", {
                                    expires: dateCookie,
                                    path: "/",
                                });
                            },
                        },
                    });
                } else if (
                    document.body.classList.contains("template-product") &&
                    $("#velaNotifiProduct").length > 0 &&
                    $.cookie("velaNotifiProduct") != "closed"
                ) {
                    $.fancybox.open({
                        src: "#velaNotifiProduct",
                        opts: {
                            padding: 0,
                            beforeLoad: function() {
                                $("#velaNotifiProduct").removeClass("hidden");
                            },
                            href: "#velaNotifiProduct",
                            helpers: {
                                overlay: true,
                            },
                            afterClose: function() {
                                $("#velaNotifiProduct").addClass("hidden");
                                $.cookie("velaNotifiProduct", "closed", {
                                    expires: dateCookie,
                                    path: "/",
                                });
                            },
                        },
                    });
                } else if (
                    document.body.classList.contains("template-page") &&
                    $("#velaNotifiPage").length > 0 &&
                    $.cookie("velaNotifiPage") != "closed"
                ) {
                    $.fancybox.open({
                        src: "#velaNotifiPage",
                        opts: {
                            padding: 0,
                            beforeLoad: function() {
                                $("#velaNotifiPage").removeClass("hidden");
                            },
                            href: "#velaNotifiPage",
                            helpers: {
                                overlay: true,
                            },
                            afterClose: function() {
                                $("#velaNotifiPage").addClass("hidden");
                                $.cookie("velaNotifiPage", "closed", {
                                    expires: dateCookie,
                                    path: "/",
                                });
                            },
                        },
                    });
                } else if (
                    $("#velaNotifi").length > 0 &&
                    $.cookie("velaNotifi") != "closed"
                ) {
                    $.fancybox.open({
                        src: "#velaNotifi",
                        opts: {
                            padding: 0,
                            beforeLoad: function() {
                                $("#velaNotifi").removeClass("hidden");
                            },
                            href: "#velaNotifi",
                            helpers: {
                                overlay: true,
                            },
                            afterClose: function() {
                                $("#velaNotifi").addClass("hidden");
                                $.cookie("velaNotifi", "closed", {
                                    expires: dateCookie,
                                    path: "/",
                                });
                            },
                        },
                    });
                }
            }, 0);
        });
        </script>
    </div>
    <script id="CartTemplate" type="text/template">

        <form action="/cart" method="post" novalidate class="cart ajaxcart">
          <div class="ajaxCartInner">
              {{#items}}
              <div class="ajaxCartProduct">
                  <div class="drawerProduct ajaxCartRow" data-line="{{line}}">
                      <div class="drawerProductImage">
                          <a href="{{url}}"><img class="img-responsive" src="{{img}}" alt="" /></a>
                      </div>
                      <div class="drawerProductContent">
                          <div class="drawerProductTitle">
                              <a href="{{url}}">{{name}}</a>
                              {{#if variation}}
                                  <span>{{variation}}</span>
                              {{/if}}
                              {{#properties}}
                                  {{#each this}}
                                      {{#if this}}
                                          <span>{{@key}}: {{this}}</span>
                                      {{/if}}
                                  {{/each}}
                              {{/properties}}



                          </div>
                          <div class="drawerProductPrice">
                              <div class="priceProduct">
                                  {{{price}}}
                              </div>
                          </div>
                          <div class="drawerProductQty">
                              <div class="velaQty">
                                  <button type="button" class="qtyAdjust velaQtyButton velaQtyMinus" data-id="{{id}}" data-qty="{{itemMinus}}" data-line="{{line}}">
                                      <span class="txtFallback">&minus;</span>
                                  </button>
                                  <input type="text" name="updates[]" class="qtyNum velaQtyText" value="{{itemQty}}" min="0" data-id="{{id}}" data-line="{{line}}"  pattern="[0-9]*" />
                                  <button type="button" class="qtyAdjust velaQtyButton velaQtyPlus" data-id="{{id}}" data-line="{{line}}" data-qty="{{itemAdd}}">
                                      <span class="txtFallback">+</span>
                                  </button>
                              </div>
                          </div>
                          <div class="drawerProductDelete">
                              <div class="cartRemoveBox">
                                  <a href="#" class="cartRemove btnClose" onclick="return false;" data-line="{{ line }}">
                                      <span>Remove</span>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              {{/items}}




                  <div class="ajaxCartNote">
                      <div class="velaCartNoteButton">
                          <a class="btnCartNote collapsed" href="#velaCartNote" data-toggle="collapse">
                              <i class="fa fa-times"></i>
                              add order note
                          </a>
                      </div>
                      <div id="velaCartNote" class="velaCartNoteGroup collapse">
                          <label for="CartSpecialInstructions">Special instructions for seller</label>
                          <textarea name="note" class="form-control" id="CartSpecialInstructions" rows="4">{{ note }}</textarea>
                      </div>
                  </div>



              <div class="drawerCartFooter">
                  <div class="drawerAjaxFooter">
                      <div class="drawerSubtotal">
                          <span class="cartSubtotalHeading">Subtotal</span>
                          <span class="cartSubtotal">{{{totalPrice}}}</span>
                      </div>
                      <p class="drawerShipping">Shipping, taxes, and discounts will be calculated at checkout.</p>
                      <div class="drawerButton">
                          <div class="drawerButtonBox">
                              <a class="btn btnVelaCart btnViewCart" href="/cart">
                                  View Cart
                              </a>
                          </div>
                          <div class="drawerButtonBox">
                              <button type="submit" class="btn btnVelaCart btnCheckout" name="checkout">
                                  CheckOut
                              </button>
                          </div>



                      </div>
                  </div>
              </div>
          </div>
      </form>
    </script>
    <script id="headerCartTemplate" type="text/template">
        <form action="/cart" method="post" novalidate class="cart ajaxcart">
      <div class="headerCartInner">
          <div class="headerCartScroll">

          {{#items}}
              <div class="ajaxCartProduct">
                  <div class="ajaxCartRow rowFlex" data-line="{{line}}">
                      <div class="headerCartImage">
                          <a href="{{url}}"><img class="img-responsive" src="{{img}}" alt="" /></a>
                      </div>
                      <div class="headerCartContent">
                          <div class="headerCartInfo">
                              <a href="{{url}}" class="headerCartProductName">{{name}}</a>
                              {{#if variation}}
                                  <div class="headerCartProductMeta">{{variation}}</div>
                              {{/if}}
                              {{#properties}}
                                  {{#each this}}
                                      {{#if this}}
                                          <div class="headerCartProductMeta">{{@key}}: {{this}}</div>
                                      {{/if}}
                                  {{/each}}
                              {{/properties}}



                              <div class="headerCartPrice">
                                  {{{price}}} <span class="d-block">x {{itemQty}}</span>
                              </div>
                          </div>
                          <div class="headerCartRemoveBox">
                              <a href="#" class="cartRemove" onclick="return false;" data-line="{{ line }}">
                                  <i class="btnClose"></i> <span>Remove</span>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
          {{/items}}
          </div>
          <div class="headerCartTotal">
              <span class="headerCartTotalTitle">Subtotal</span>
              <span class="headerCartTotalNum">{{{totalPrice}}}</span>
          </div>
          <div class="headerCartButton d-flex">
              <div class="headerCartButtonBox mr10">
                  <a class="btn btnVelaCart btnViewCart" href="/cart">

                      View Cart

                  </a>
              </div>
              <div class="headerCartButtonBox">
                  <button type="submit" class="btn btnVelaCart btnCheckout" name="checkout">

                      CheckOut

                  </button>
              </div>
          </div>

      </div>
      </form>
    </script>
    <script id="velaAjaxQty" type="text/template">

        <div class="velaQty">
          <button type="button" class="qtyAdjust velaQtyButton velaQtyMinus" data-id="{{id}}" data-qty="{{itemMinus}}">
              <span class="txtFallback">&minus;</span>
          </button>
          <input type="text" class="qtyNum velaQtyText" value="{{itemQty}}" min="0" data-id="{{id}}" aria-label="quantity" pattern="[0-9]*">
          <button type="button" class="qtyAdjust velaQtyButton velaQtyPlus" data-id="{{id}}" data-qty="{{itemAdd}}">
              <span class="txtFallback">+</span>
          </button>
      </div>
    </script>
    <script id="velaJsQty" type="text/template">

        <div class="velaQty">
          <button type="button" class="velaQtyAdjust velaQtyButton velaQtyMinus" data-id="{{id}}" data-qty="{{itemMinus}}">
              <span class="txtFallback">&minus;</span>
          </button>
          <input type="text" class="velaQtyNum velaQtyText" value="{{itemQty}}" min="1" data-id="{{id}}" aria-label="quantity" pattern="[0-9]*" name="{{inputName}}" id="{{inputId}}" />
          <button type="button" class="velaQtyAdjust velaQtyButton velaQtyPlus" data-id="{{id}}" data-qty="{{itemAdd}}">
              <span class="txtFallback">+</span>
          </button>
      </div>
    </script>
    <div id="loading" style="display: none"></div>

    <div id="velaQuickView" style="display: none">
        <div class="quickviewOverlay"></div>
        <div class="jsQuickview"></div>
        <div id="quickviewModal" class="quickviewProduct" style="display: none">
            <a title="Close" class="quickviewClose btnClose" href="javascript:void(0);"></a>
            <div class="proBoxPrimary row">
                <div class="proBoxImage col-xs-12 col-sm-12 col-md-5">
                    <div class="proFeaturedImage">
                        <a class="proImage" title="" href="#">
                            <img class="img-responsive proImageQuickview"
                                src="../cdn.shopify.com/s/files/1/1573/5553/t/40/assets/loading2fe9.gif?v=47373580461733618591612164407"
                                alt="Quickview" />
                            <span class="loadingImage"></span>
                        </a>
                    </div>
                    <div class="proThumbnails proThumbnailsQuickview clearfix">
                        <div class="owl-thumblist">
                            <div class="owl-carousel"></div>
                        </div>
                    </div>
                </div>
                <div class="proBoxInfo col-xs-12 col-sm-12 col-md-7">
                    <h3 class="quickviewName mb20">&nbsp;</h3>
                    <div class="proPrice clearfix">
                        <span class="priceProduct pricePrimary"></span>
                        <span class="priceProduct priceCompare"></span>
                    </div>
                    <div class="proShortDescription rte"></div>

                    <form action="https://vela-kazan.myshopify.com/cart/add" method="post" enctype="multipart/form-data"
                        class="formQuickview form-ajaxtocart">
                        <div class="proVariantsQuickview">
                            <select name="id" style="display: none"></select>
                        </div>
                        <div class="velaGroup d-flex flexAlignEnd mb30">
                            <div class="proQuantity">
                                <!-- <label for="Quantity" class="qtySelector">Quantity</label> -->
                                <input type="number" id="Quantity" name="quantity" value="1" min="1"
                                    class="qtySelector" />
                            </div>
                            <button type="submit" name="add" class="btn btnAddToCart">
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </form>
                    <div class="proAttr quickviewAvailability"></div>
                    <div class="proAttr quickViewVendor"></div>
                    <div class="proAttr quickViewType"></div>
                    <div class="proAttr quickViewSKU"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="goToTop" class="hidden-xs hidden-sm">
        <span class="fa fa-angle-double-up"></span>
    </div>

    <script
        src="../cdn.shopify.com/shopifycloud/shopify/assets/themes_support/option_selection-9f517843f664ad329c689020fb1e45d03cac979f64b9eb1651ea32858b0ff452.js"
        type="text/javascript"></script>
    <script
        src="../cdn.shopify.com/shopifycloud/shopify/assets/themes_support/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js"
        type="text/javascript"></script>
    <script src="../cdn.shopify.com/s/files/1/1573/5553/t/40/assets/vendor1580.js?v=171508498140652872771612173323"
        type="text/javascript"></script>
    <script
        src="../cdn.shopify.com/s/files/1/1573/5553/t/40/assets/vela_ajaxcart259b.js?v=53329818851908209301618132977"
        type="text/javascript"></script>
    <script
        src="../cdn.shopify.com/s/files/1/1573/5553/t/40/assets/jquery.ion.rangeslider83cf.js?v=25617981562543196831612164405"
        type="text/javascript"></script>
    <script
        src="../cdn.shopify.com/s/files/1/1573/5553/t/40/assets/lazysizes.min0692.js?v=153772683470722238621612164405"
        async="async"></script>
    <script src="../cdn.shopify.com/s/files/1/1573/5553/t/40/assets/vela58cf.js?v=184101252296148192231618133375"
        type="text/javascript"></script>
    <script
        src="../cdn.shopify.com/s/files/1/1573/5553/t/40/assets/jquery.cookiebf5e.js?v=72365755745404048181612164404"
        type="text/javascript"></script>

    <script type="text/javascript">
    if (window.currencies) {
        Currency.format = "money_format";
        var shopCurrency = window.currency;
        Currency.moneyFormats[shopCurrency].money_with_currency_format =
            window.shop_money_with_currency_format;
        Currency.moneyFormats[shopCurrency].money_format =
            window.shop_money_format;
        var defaultCurrency = "GBP";
        var cookieCurrency = Currency.cookie.read();
        var velaCurrencies = $("[name=currencies]"),
            velaCurrencyItem = $(".jsvela-currency__item"),
            velaCurrencyCurrent = $(".jsvela-currency__current");
        $("span.money span.money").each(function() {
            $(this).parents("span.money").removeClass("money");
        });
        $("span.money").each(function() {
            $(this).attr("data-currency-" + window.currency, $(this).html());
        });
        if (cookieCurrency == null) {
            if (shopCurrency !== defaultCurrency) {
                Currency.convertAll(shopCurrency, defaultCurrency);
            } else {
                Currency.currentCurrency = defaultCurrency;
            }
        } else if (
            $("[name=currencies]").size() &&
            $(
                "[name=currencies] .jsvela-currency__item[data-value=" +
                cookieCurrency +
                "]"
            ).size() === 0
        ) {
            Currency.currentCurrency = shopCurrency;
            Currency.cookie.write(shopCurrency);
        } else if (cookieCurrency === shopCurrency) {
            Currency.currentCurrency = shopCurrency;
        } else {
            Currency.currentCurrency = cookieCurrency;
            Currency.convertAll(shopCurrency, cookieCurrency);
            velaCurrencies.data("value", cookieCurrency);
            velaCurrencyItem.removeClass("active");
            velaCurrencyItem.each(function() {
                if ($(this).data("value") === cookieCurrency)
                    $(this).addClass("active");
            });
        }
        $("body").on("click", ".jsvela-currency__item", function() {
            var newCurrency = $(this).data("value");
            velaCurrencies.data("value", newCurrency);
            velaCurrencyItem.removeClass("active");
            $(this).addClass("active");
            Currency.convertAll(Currency.currentCurrency, newCurrency);
            velaCurrencyCurrent.text(Currency.currentCurrency);
            return false;
        });
        var original_selectCallback = window.selectCallback;
        var selectCallback = function(variant, selector) {
            original_selectCallback(variant, selector);
            Currency.convertAll(
                shopCurrency,
                $("[name=currencies]").data("value")
            );
            velaCurrencyCurrent.text(Currency.currentCurrency);
        };
        $("body").on("ajaxCart.afterCartLoad", function(cart) {
            Currency.convertAll(
                shopCurrency,
                $("[name=currencies]").data("value")
            );
            velaCurrencyCurrent.text(Currency.currentCurrency);
        });
        velaCurrencyCurrent.text(Currency.currentCurrency);
    }
    </script>
</body>

<!--  cart  27:04 GMT -->

</html>