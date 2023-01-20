<?php
?>
<!DOCTYPE html>
<!--[if IE 9]> <html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <?php include('header_links.php'); ?>
</head>

<body id="404-not-found" class="template-404  velaFloatHeader ">
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
                <section class="headerWrap">
                    <div class="velaHeaderMain headerMenu">
                        <div class="container">
                            <div class="headerContent rowFlex flexAlignCenter rowFlexMargin">
                                <div class="col-xs-3 col-sm-4 hidden-md hidden-lg">
                                    <div class="menuBtnMobile d-flex flexAlignCenter">
                                        <div id="btnMenuMobile" class="btnMenuMobile">
                                            <span class="iconMenu"></span>
                                            <span class="iconMenu"></span>
                                            <span class="iconMenu"></span>
                                            <span class="iconMenu"></span>
                                        </div>
                                        <a class="velaSearchIcon" href="#velaSearchTop" data-toggle="collapse" title="Search">
                                            <span class="icons">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path d="M16.041 15.856c-0.034 0.026-0.067 0.055-0.099 0.087s-0.060 0.064-0.087 0.099c-1.258 1.213-2.969 1.958-4.855 1.958-1.933 0-3.682-0.782-4.95-2.050s-2.050-3.017-2.050-4.95 0.782-3.682 2.050-4.95 3.017-2.050 4.95-2.050 3.682 0.782 4.95 2.050 2.050 3.017 2.050 4.95c0 1.886-0.745 3.597-1.959 4.856zM21.707 20.293l-3.675-3.675c1.231-1.54 1.968-3.493 1.968-5.618 0-2.485-1.008-4.736-2.636-6.364s-3.879-2.636-6.364-2.636-4.736 1.008-6.364 2.636-2.636 3.879-2.636 6.364 1.008 4.736 2.636 6.364 3.879 2.636 6.364 2.636c2.125 0 4.078-0.737 5.618-1.968l3.675 3.675c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z"></path>
                                                </svg>
                                            </span>
                                            <!-- <span>Search</span> -->
                                        </a>
                                    </div>
                                </div>
                                <div class="velaHeaderLeft  flexAlignCenter col-xs-6 col-sm-4 col-md-2 col-lg-3 d-flex">
                                    <div class="velaLogo" itemscope itemtype="http://schema.org/Organization"><a href="/" itemprop="url" class="velaLogoLink" style="width: 150px;"><span class="text-hide">Outstock</span>
                                            <img class="img-responsive" src="https://cdn.shopify.com/s/files/1/1573/5553/files/logo_dark.svg?v=1601695205" alt="Outstock" /></a></div>
                                </div>
                                <div class="velaHeaderCenter p-static col-md-8 col-lg-6 hidden-xs hidden-sm">
                                    <section id="velaMegamenu" class="velaMegamenu">
                                        <nav class="menuContainer">
                                            <ul class="nav hidden-xs hidden-sm">
                                                <li class="">
                                                    <a href="../index.php" title="Home">
                                                        <span>Home</span>
                                                    </a>
                                                </li>
                                                <li class="hasMenuDropdown hasMegaMenu">
                                                    <a href="all.php" title="">
                                                        <span>Shop</span></a>
                                                    <a class="btnCaret hidden-xl hidden-lg hidden-md" data-toggle="collapse" href="#megaDropdown21"></a>

                                                    <div id="megaDropdown21" class="menuDropdown megaMenu collapse">
                                                        <div class="container gutter-20">
                                                            <div class="menuGroup rowFlex rowFlexMargin">

                                                                <div class="col-sm-9">
                                                                    <div class="rowFlex rowFlexMargin velaMenuListLink">
                                                                        <div class="col-xs-12 col-sm-3">
                                                                            <ul class="velaMenuLinks">
                                                                                <li class="menuTitle">
                                                                                    <a href="../collections.php" title="">Catalog</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="furniture.html" title="">Furniture</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="decor-art.php" title="">Decor Art</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="illumination.html" title="">Illumination</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="kitchen-things.html" title="">Kitchen Things</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="best-sellter.html" title="">Best Sellter</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="new-products.html" title="">New products</a>
                                                                                </li>

                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-3">
                                                                            <ul class="velaMenuLinks">
                                                                                <li class="menuTitle">
                                                                                    <a href="best-sellter.html" title="">Shop pages</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="sale-off.html" title="">Left Sidebar</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="best-sellter.html" title="">Right Sidebar</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="furniture.html" title="">Collection List</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="all.php" title="">Collection Grid</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="kitchen-things.html" title="">Full Width</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="illumination.html" title="">Full Width V1</a>
                                                                                </li>

                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-3">
                                                                            <ul class="velaMenuLinks">
                                                                                <li class="menuTitle">
                                                                                    <a href="../products/sacrificial-chair-design-12.html" title="">Product Pages</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="../products/sacrificial-chair-design-12.html" title="">Product Page V1</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="../products/sacrificial-chair-design-5.html" title="">Product Page V2</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="../products/sacrificial-chair-design-6.html" title="">Product Page V3</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="../products/sacrificial-chair-design-10.html" title="">Product Page V4</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="../products/sacrificial-chair-design-11.html" title="">Product Page V5</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="../products/sacrificial-chair-design-2.html" title="">Variable Product</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="../products/sacrificial-chair-design-8.html" title="">External Product</a>
                                                                                </li>

                                                                            </ul>
                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-3">
                                                                            <ul class="velaMenuLinks">
                                                                                <li class="menuTitle">
                                                                                    <a href="/pages/home-pages" title="">Other Pages</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/pages/about-us" title="">About Page</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/pages/contact-us" title="">Contact Page</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/pages/faqs" title="">FAQs Page</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/search" title="">Search Page</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/pages/404" title="">404 Page</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/pages/password" title="">Coming Soon Page</a>
                                                                                </li>
                                                                                <li>
                                                                                    <a href="/cart" title="">Cart Page</a>
                                                                                </li>

                                                                            </ul>
                                                                        </div>

                                                                    </div>
                                                                </div>




                                                                <div class="col-sm-3">
                                                                    <div class="velaMenuBanner mb10 mt10">
                                                                        <a href="/collections/furniture">



                                                                            <div class="p-relative">
                                                                                <div class="product-card__image" style="padding-top:104.54545454545455%;">
                                                                                    <img loading="lazy" class="product-card__img lazyload imgFlyCart " data-src="cdn.shopify.com/s/files/1/1573/5553/files/banner-menu_{width}x.jpg?v=1614321993" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="0.9565217391304348" data-ratio="0.9565217391304348" data-sizes="auto" alt="" />
                                                                                </div>
                                                                                <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                                                                            </div>



                                                                        </a>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="hasMenuDropdown hasMegaMenu">
                                                    <a href="../collections.php" title="">
                                                        <span>Collections</span></a>
                                                    <a class="btnCaret hidden-xl hidden-lg hidden-md" data-toggle="collapse" href="#megaDropdown22"></a>

                                                    <div id="megaDropdown22" class="menuDropdown megaMenu collapse">
                                                        <div class="container gutter-20">
                                                            <div class="menuGroup rowFlex rowFlexMargin">
                                                                <div class="col-sm-12">
                                                                    <div class="velaMenuListCollection">
                                                                        <div class="velaMenuListContent rowFlex">
                                                                            <div class="coll-item" style="width: 20%;">
                                                                                <div class="collImage">
                                                                                    <a href="furniture.html">
                                                                                        <div class="p-relative">
                                                                                            <div class="product-card__image" style="padding-top:100.0%;">
                                                                                                <img 
                                                                                                Loading="lazy"
                                                                                                loading="lazy" class="product-card__img lazyload imgFlyCart " data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/7_360x.jpg?v=1511442889" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="1.0" data-ratio="1.0" data-sizes="auto" alt="Furniture" />
                                                                                            </div>
                                                                                            <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="collTitle"><a href="furniture.html" title="Furniture"> Furniture</a></h5>
                                                                            </div>

                                                                            <div class="coll-item" style="width: 20%;">
                                                                                <div class="collImage">
                                                                                    <a href="decor-art.php">
                                                                                        <div class="p-relative">
                                                                                            <div class="product-card__image" style="padding-top:100.0%;">
                                                                                                <img loading="lazy" class="product-card__img lazyload imgFlyCart " data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/18_360x.jpg?v=1511442950" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="1.0" data-ratio="1.0" data-sizes="auto" alt="Decor Art" />
                                                                                            </div>
                                                                                            <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="collTitle"><a href="decor-art.php" title="Decor Art"> Decor Art</a></h5>
                                                                            </div>

                                                                            <div class="coll-item" style="width: 20%;">
                                                                                <div class="collImage">
                                                                                    <a href="illumination.html">
                                                                                        <div class="p-relative">
                                                                                            <div class="product-card__image" style="padding-top:100.0%;">
                                                                                                <img loading="lazy" class="product-card__img lazyload imgFlyCart " data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/18_360x.jpg" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="1.0" data-ratio="1.0" data-sizes="auto" alt="Illumination" />
                                                                                            </div>
                                                                                            <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="collTitle"><a href="illumination.html" title="Illumination"> Illumination</a></h5>
                                                                            </div>

                                                                            <div class="coll-item" style="width: 20%;">
                                                                                <div class="collImage">
                                                                                    <a href="kitchen-things.html">
                                                                                        <div class="p-relative">
                                                                                            <div class="product-card__image" style="padding-top:100.0%;">
                                                                                                <img loading="lazy" class="product-card__img lazyload imgFlyCart " data-src="../cdn.shopify.com/s/files/1/1573/5553/collections/21_360x.jpg?v=1511442906" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="1.0" data-ratio="1.0" data-sizes="auto" alt="Kitchen Things" />
                                                                                            </div>
                                                                                            <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                                                                                        </div>
                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="collTitle"><a href="kitchen-things.html" title="Kitchen Things"> Kitchen Things</a></h5>
                                                                            </div>

                                                                            <div class="coll-item" style="width: 20%;">
                                                                                <div class="collImage">
                                                                                    <a href="sale-off.html">


                                                                                        <div class="p-relative">
                                                                                            <div class="product-card__image" style="padding-top:99.83606557377047%;">
                                                                                                <img loading="lazy" class="product-card__img lazyload imgFlyCart " data-src="cdn.shopify.com/s/files/1/1573/5553/collections/Arc-Large-Cup_{width}x.jpg?v=1511443696" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="1.0016420361247949" data-ratio="1.0016420361247949" data-sizes="auto" alt="Sale Off" />
                                                                                            </div>
                                                                                            <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                                                                                        </div>


                                                                                    </a>
                                                                                </div>
                                                                                <h5 class="collTitle"><a href="sale-off.html" title="Sale Off"> Sale Off</a></h5>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="">
                                                    <a href="/blogs/news" title="">
                                                        <span>Blog</span></a>
                                                </li>
                                                <li class="">
                                                    <a href="/pages/contact-us" title="">
                                                        <span>Contact</span></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </section>
                                </div>
                                <div class="velaHeaderRight col-xs-3 col-sm-4 col-md-2 col-lg-3">

                                    <div id="velaTopLinks" class="velaTopLinks d-flex flexAlignCenter">
                                        <a class="hidden-lg" href="/account">
                                            <i class="icons"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M21 21v-2c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464h-8c-1.38 0-2.632 0.561-3.536 1.464s-1.464 2.156-1.464 3.536v2c0 0.552 0.448 1 1 1s1-0.448 1-1v-2c0-0.829 0.335-1.577 0.879-2.121s1.292-0.879 2.121-0.879h8c0.829 0 1.577 0.335 2.121 0.879s0.879 1.292 0.879 2.121v2c0 0.552 0.448 1 1 1s1-0.448 1-1zM17 7c0-1.38-0.561-2.632-1.464-3.536s-2.156-1.464-3.536-1.464-2.632 0.561-3.536 1.464-1.464 2.156-1.464 3.536 0.561 2.632 1.464 3.536 2.156 1.464 3.536 1.464 2.632-0.561 3.536-1.464 1.464-2.156 1.464-3.536zM15 7c0 0.829-0.335 1.577-0.879 2.121s-1.292 0.879-2.121 0.879-1.577-0.335-2.121-0.879-0.879-1.292-0.879-2.121 0.335-1.577 0.879-2.121 1.292-0.879 2.121-0.879 1.577 0.335 2.121 0.879 0.879 1.292 0.879 2.121z"></path>
                                                </svg></i>
                                        </a>
                                        <ul class="list-unstyled list-inline hidden-xs hidden-sm hidden-md">

                                            <li><a href="/account/login" id="customer_login_link">Login</a></li>
                                            <li><a href="/account/register" id="customer_register_link">Register</a></li>

                                        </ul>
                                    </div>


                                    <a class="velaSearchIcon hidden-xs hidden-sm" href="#velaSearchTop" data-toggle="collapse" title="Search">
                                        <span class="icons">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M16.041 15.856c-0.034 0.026-0.067 0.055-0.099 0.087s-0.060 0.064-0.087 0.099c-1.258 1.213-2.969 1.958-4.855 1.958-1.933 0-3.682-0.782-4.95-2.050s-2.050-3.017-2.050-4.95 0.782-3.682 2.050-4.95 3.017-2.050 4.95-2.050 3.682 0.782 4.95 2.050 2.050 3.017 2.050 4.95c0 1.886-0.745 3.597-1.959 4.856zM21.707 20.293l-3.675-3.675c1.231-1.54 1.968-3.493 1.968-5.618 0-2.485-1.008-4.736-2.636-6.364s-3.879-2.636-6.364-2.636-4.736 1.008-6.364 2.636-2.636 3.879-2.636 6.364 1.008 4.736 2.636 6.364 3.879 2.636 6.364 2.636c2.125 0 4.078-0.737 5.618-1.968l3.675 3.675c0.391 0.391 1.024 0.391 1.414 0s0.391-1.024 0-1.414z"></path>
                                            </svg>
                                        </span>
                                        <!-- <span>Search</span> -->
                                    </a>
                                    <div class="velaCartTop"><a href="/cart" class="jsDrawerOpenRight d-flex">
                                            <i class="icons"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                    <path d="M19 5h-14l1.5-2h11zM21.794 5.392l-2.994-3.992c-0.196-0.261-0.494-0.399-0.8-0.4h-12c-0.326 0-0.616 0.156-0.8 0.4l-2.994 3.992c-0.043 0.056-0.081 0.117-0.111 0.182-0.065 0.137-0.096 0.283-0.095 0.426v14c0 0.828 0.337 1.58 0.879 2.121s1.293 0.879 2.121 0.879h14c0.828 0 1.58-0.337 2.121-0.879s0.879-1.293 0.879-2.121v-14c0-0.219-0.071-0.422-0.189-0.585-0.004-0.005-0.007-0.010-0.011-0.015zM4 7h16v13c0 0.276-0.111 0.525-0.293 0.707s-0.431 0.293-0.707 0.293h-14c-0.276 0-0.525-0.111-0.707-0.293s-0.293-0.431-0.293-0.707zM15 10c0 0.829-0.335 1.577-0.879 2.121s-1.292 0.879-2.121 0.879-1.577-0.335-2.121-0.879-0.879-1.292-0.879-2.121c0-0.552-0.448-1-1-1s-1 0.448-1 1c0 1.38 0.561 2.632 1.464 3.536s2.156 1.464 3.536 1.464 2.632-0.561 3.536-1.464 1.464-2.156 1.464-3.536c0-0.552-0.448-1-1-1s-1 0.448-1 1z"></path>
                                                </svg></i>
                                            <!-- <span class="cartitle hidden-xs"> Cart</span> -->
                                            <span id="CartCount"> 0 </span>
                                        </a></div>
                                </div>


                                <div id="velaSearchTop" class="collapse">
                                    <div class="container text-center">
                                        <a class="btnClose" href="#velaSearchTop" data-toggle="collapse"><i class="ion ion-android-close"></i></a>
                                        <h3 class="title">Search</h3>
                                        <form id="velaSearchbox" class="formSearch" action="/search" method="get">
                                            <input type="hidden" name="type" value="product">
                                            <input class="velaSearch form-control" type="search" name="q" value="" placeholder="Enter keywords to search..." autocomplete="off" />
                                            <button id="velaSearchButton" class="btnVelaSearch" type="submit">
                                                <span class="icons">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                                        <path d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                    </svg>
                                                </span>
                                                <span class="btnSearchText">Search</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </header>
        <main class="mainContent" role="main">
            <div id="shopify-section-vela-template-404" class="shopify-section">
                <section id="pageContent" class="page404" style="">
                    <div class="container">
                        <div class="boxImage">
                            <img class="img-responsive" alt="Outstock" src="https://cdn.shopify.com/s/files/1/1573/5553/files/404.png?v=1613719734" />
                        </div>
                        <div class="boxText">
                            <div class="page404Des" style="color: #222222">That page can’t be found.<br>
                                Sorry for the inconvenience. Go to our homepage or check out our latest collections.</div>
                        </div><a class="btn btn404" href="../index.php">Back to Home page</a>
                    </div>
                </section>
            </div>
        </main>
        <div id="shopify-section-vela-footer" class="shopify-section">
            <footer id="velaFooter">
                <div class="velaFooterInner">
                    <div class="footerTop">
                        <div class="container">
                            <div class="footerTopInner">
                                <div class="velaFooterNewsletter">
                                    <div class="secionInner">
                                        <div class="wrapper">
                                            <h3 class="velaFooterTitle velaTitle"><span>OUR NEWSLETTER</span>join our newsletter</h3>
                                            <div class="newsletterDescription clearfix">Subscribe to the Puik Store mailing list to receive updates on new arrivals, special offers
                                                and other discount information.</div>
                                            <div class="velaContent">
                                                <form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="contact-form"><input type="hidden" name="form_type" value="customer" /><input type="hidden" name="utf8" value="✓" />
                                                    <div class="form-group">
                                                        <input class="form-control" id="newsletter-input" type="email" name="contact[email]" placeholder="Your email address...">
                                                        <button class="btn btnNewsletter" type="submit">
                                                            <span>Subscribe</span>
                                                            <!-- <i class="fa fa-send" aria-hidden="true"></i> -->
                                                        </button>
                                                        <input type="hidden" name="action" value="0">
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="footerCenter">
                        <div class="container">
                            <div class="footerCenterInner">
                                <div class="velaQuickLink d-flex flexJustifyCenter">
                                    <div class="velaContent">
                                        <a title="instagram" href="https://www.instagram.com/">instagram</a>
                                        <a title="facebook" href="https://www.facebook.com/">facebook</a>
                                        <a href="TWITTER%20">TWITTER </a>
                                        <a title="PINTEREST " href="https://www.pinterest.com">PINTEREST</a>
                                        <a title="YOUTUBE" href="https://youtube.com/">YOUTUBE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footerCopyRight">
                        <div class="container">
                            <div class="footerCopyRightInner clearfix">
                                <div class="rowFlex rowFlexMargin text-center">
                                    <div class="col-xs-12">
                                        <div class="velaCopyRight">
                                            Copyright © Puik Store all rights reserved. Powered by Velatheme
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="logo_payment ">
                                            <span>

                                                <img class="img-responsive" src="cdn.shopify.com/s/files/1/1573/5553/files/payment-logo.png?v=1614329602" alt="">

                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <div id="shopify-section-vela-template-notification" class="shopify-section">
        </div>
        <script type="text/javascript">
            $(window).on("load", function() {
                var dateCookie = new Date();
                var minutes = 60;
                dateCookie.setTime(dateCookie.getTime() + (minutes * 60 * 1000));
                setTimeout(function() {
                    if (document.body.classList.contains('template-collection') && ($("#velaNotifiCollection").length > 0) && ($.cookie('velaNotifiCollectioin') != 'closed')) {
                        $.fancybox.open({
                            src: '#velaNotifiCollection',
                            opts: {
                                padding: 0,
                                beforeLoad: function() {
                                    $('#velaNotifiCollection').removeClass('hidden');
                                },
                                href: '#velaNotifiCollection',
                                helpers: {
                                    overlay: true
                                },
                                afterClose: function() {
                                    $('#velaNotifiCollection').addClass('hidden');
                                    $.cookie('velaNotifiCollectioin', 'closed', {
                                        expires: dateCookie,
                                        path: '/'
                                    });
                                }
                            }
                        });
                    } else if (document.body.classList.contains('template-blog') && ($("#velaNotifiBlog").length > 0) && ($.cookie('velaNotifiBlog') != 'closed')) {
                        $.fancybox.open({
                            src: '#velaNotifiBlog',
                            opts: {
                                padding: 0,
                                beforeLoad: function() {
                                    $('#velaNotifiBlog').removeClass('hidden');
                                },
                                href: '#velaNotifiBlog',
                                helpers: {
                                    overlay: true
                                },
                                afterClose: function() {
                                    $('#velaNotifiBlog').addClass('hidden');
                                    $.cookie('velaNotifiBlog', 'closed', {
                                        expires: dateCookie,
                                        path: '/'
                                    });
                                }
                            }
                        });
                    } else if (document.body.classList.contains('template-product') && ($("#velaNotifiProduct").length > 0) && ($.cookie('velaNotifiProduct') != 'closed')) {
                        $.fancybox.open({
                            src: '#velaNotifiProduct',
                            opts: {
                                padding: 0,
                                beforeLoad: function() {
                                    $('#velaNotifiProduct').removeClass('hidden');
                                },
                                href: '#velaNotifiProduct',
                                helpers: {
                                    overlay: true
                                },
                                afterClose: function() {
                                    $('#velaNotifiProduct').addClass('hidden');
                                    $.cookie('velaNotifiProduct', 'closed', {
                                        expires: dateCookie,
                                        path: '/'
                                    });
                                }
                            }
                        });
                    } else if (document.body.classList.contains('template-page') && ($("#velaNotifiPage").length > 0) && ($.cookie('velaNotifiPage') != 'closed')) {
                        $.fancybox.open({
                            src: '#velaNotifiPage',
                            opts: {
                                padding: 0,
                                beforeLoad: function() {
                                    $('#velaNotifiPage').removeClass('hidden');
                                },
                                href: '#velaNotifiPage',
                                helpers: {
                                    overlay: true
                                },
                                afterClose: function() {
                                    $('#velaNotifiPage').addClass('hidden');
                                    $.cookie('velaNotifiPage', 'closed', {
                                        expires: dateCookie,
                                        path: '/'
                                    });
                                }
                            }
                        });
                    } else if (($("#velaNotifi").length > 0) && ($.cookie('velaNotifi') != 'closed')) {
                        $.fancybox.open({
                            src: '#velaNotifi',
                            opts: {
                                padding: 0,
                                beforeLoad: function() {
                                    $('#velaNotifi').removeClass('hidden');
                                },
                                href: '#velaNotifi',
                                helpers: {
                                    overlay: true
                                },
                                afterClose: function() {
                                    $('#velaNotifi').addClass('hidden');
                                    $.cookie('velaNotifi', 'closed', {
                                        expires: dateCookie,
                                        path: '/'
                                    });
                                }
                            }
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
    <div id="loading" style="display:none;"></div>

    <div id="velaQuickView" style="display:none;">
        <div class="quickviewOverlay"></div>
        <div class="jsQuickview"></div>
        <div id="quickviewModal" class="quickviewProduct" style="display:none;">
            <a title="Close" class="quickviewClose btnClose" href="javascript:void(0);"></a>
            <div class="proBoxPrimary row">
                <div class="proBoxImage col-xs-12 col-sm-12 col-md-5">
                    <div class="proFeaturedImage">
                        <a class="proImage" title="" href="#">
                            <img class="img-responsive proImageQuickview" src="cdn.shopify.com/s/files/1/1573/5553/t/40/assets/loading.gif?v=47373580461733618591612164407" alt="Quickview" />
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

                    <form action="/cart/add" method="post" enctype="multipart/form-data" class="formQuickview form-ajaxtocart">
                        <div class="proVariantsQuickview"><select name='id' style="display:none"></select></div>
                        <div class="velaGroup d-flex flexAlignEnd mb30">
                            <div class="proQuantity">
                                <!-- <label for="Quantity" class="qtySelector">Quantity</label> -->
                                <input type="number" id="Quantity" name="quantity" value="1" min="1" class="qtySelector">
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
    <div id="goToTop" class="hidden-xs hidden-sm"><span class="fa fa-angle-double-up"></span></div>


    <script src="cdn.shopify.com/shopifycloud/shopify/assets/themes_support/option_selection-9f517843f664ad329c689020fb1e45d03cac979f64b9eb1651ea32858b0ff452.js" type="text/javascript"></script>
    <script src="cdn.shopify.com/shopifycloud/shopify/assets/themes_support/api.jquery-e94e010e92e659b566dbc436fdfe5242764380e00398907a14955ba301a4749f.js" type="text/javascript"></script>
    <script src="cdn.shopify.com/s/files/1/1573/5553/t/40/assets/vendor.js?v=171508498140652872771612173323" type="text/javascript"></script>
    <script src="cdn.shopify.com/s/files/1/1573/5553/t/40/assets/vela_ajaxcart.js?v=53329818851908209301618132977" type="text/javascript"></script>
    <script src="cdn.shopify.com/s/files/1/1573/5553/t/40/assets/jquery.ion.rangeslider.js?v=25617981562543196831612164405" type="text/javascript"></script>
    <script src="cdn.shopify.com/s/files/1/1573/5553/t/40/assets/lazysizes.min.js?v=153772683470722238621612164405" async="async"></script>
    <script src="cdn.shopify.com/s/files/1/1573/5553/t/40/assets/vela.js?v=184101252296148192231618133375" type="text/javascript"></script>
    <script src="cdn.shopify.com/s/files/1/1573/5553/t/40/assets/jquery.cookie.js?v=72365755745404048181612164404" type="text/javascript"></script>

    <script type="text/javascript">
        if (window.currencies) {
            Currency.format = "money_format";
            var shopCurrency = window.currency;
            Currency.moneyFormats[shopCurrency].money_with_currency_format = window.shop_money_with_currency_format;
            Currency.moneyFormats[shopCurrency].money_format = window.shop_money_format;
            var defaultCurrency = 'GBP';
            var cookieCurrency = Currency.cookie.read();
            var velaCurrencies = $('[name=currencies]'),
                velaCurrencyItem = $('.jsvela-currency__item'),
                velaCurrencyCurrent = $('.jsvela-currency__current');
            $('span.money span.money').each(function() {
                $(this).parents('span.money').removeClass('money');
            });
            $('span.money').each(function() {
                $(this).attr('data-currency-' + window.currency, $(this).html());
            });
            if (cookieCurrency == null) {
                if (shopCurrency !== defaultCurrency) {
                    Currency.convertAll(shopCurrency, defaultCurrency);
                } else {
                    Currency.currentCurrency = defaultCurrency;
                }
            } else if ($('[name=currencies]').size() && $('[name=currencies] .jsvela-currency__item[data-value=' + cookieCurrency + ']').size() === 0) {
                Currency.currentCurrency = shopCurrency;
                Currency.cookie.write(shopCurrency);
            } else if (cookieCurrency === shopCurrency) {
                Currency.currentCurrency = shopCurrency;
            } else {
                Currency.currentCurrency = cookieCurrency;
                Currency.convertAll(shopCurrency, cookieCurrency);
                velaCurrencies.data('value', cookieCurrency);
                velaCurrencyItem.removeClass('active');
                velaCurrencyItem.each(function() {
                    if ($(this).data('value') === cookieCurrency)
                        $(this).addClass('active');
                });

            }
            $('body').on('click', '.jsvela-currency__item', function() {
                var newCurrency = $(this).data('value');
                velaCurrencies.data('value', newCurrency);
                velaCurrencyItem.removeClass('active');
                $(this).addClass('active');
                Currency.convertAll(Currency.currentCurrency, newCurrency);
                velaCurrencyCurrent.text(Currency.currentCurrency);
                return false;
            });
            var original_selectCallback = window.selectCallback;
            var selectCallback = function(variant, selector) {
                original_selectCallback(variant, selector);
                Currency.convertAll(shopCurrency, $('[name=currencies]').data('value'));
                velaCurrencyCurrent.text(Currency.currentCurrency);
            };
            $('body').on('ajaxCart.afterCartLoad', function(cart) {
                Currency.convertAll(shopCurrency, $('[name=currencies]').data('value'));
                velaCurrencyCurrent.text(Currency.currentCurrency);
            });
            velaCurrencyCurrent.text(Currency.currentCurrency);
        }
    </script>

</body>

</html>