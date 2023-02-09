<?php
session_start();
error_reporting(0);
include('api/config.php');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <?php include('header_links.php'); ?>
</head>

<body>
    <section id="hero">
        <div class="hero-container">
            <div data-aos="fade-in">
                <h2 style="margin-top:230px;color:#201f1f">
                    We provide
                    <span class="typed"
                        data-typed-items="Vishnu style sitting sofa, fanciful rugs, finest bedsheets, plushy carpet"></span>
                </h2>
                <div class="actions">
                    <!-- <a href="#about" class="btn-get-started">Get Strated</a> -->
                    <!-- <a href="#services" class="btn-services">Our Services</a> -->
                </div>
            </div>
        </div>
    </section>
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
                                <div class="velaHeaderLeft flexAlignCenter col-xs-5 col-sm-6 col-md-2 d-flex">
                                    <div class="menuBtnMobile pull-left hidden-md hidden-lg">
                                        <div id="btnMenuMobile" class="btnMenuMobile">
                                            <span class="iconMenu"></span>
                                            <span class="iconMenu"></span>
                                            <span class="iconMenu"></span>
                                            <span class="iconMenu"></span>
                                        </div>
                                    </div>
                                    <h1 class="velaLogo" itemscope itemtype="http://schema.org/Organization">
                                        <a href="myprofile.php" itemprop="url" class="velaLogoLink"
                                            style="width: 100px"><span class="text-hide">AtoZ</span>
                                            <img class="img-responsive"
                                                src="https://media-exp1.licdn.com/dms/image/C4E0BAQGcKRCfiO6Ppw/company-logo_200_200/0/1519909184223?e=1673481600&v=beta&t=yE1XBv-PfK4TmXCvAWO20cx6xXsYzuatTFC7NhLmEwI"
                                                alt="AtoZ" style="max-width: 65px" /></a>
                                    </h1>
                                </div>
                                <div class="velaHeaderCenter p-static col-md-7 hidden-xs hidden-sm">
                                    <section id="velaMegamenu" class="velaMegamenu">
                                        <nav class="menuContainer">
                                            <ul class="nav hidden-xs hidden-sm">
                                                <li class="active">
                                                    <a href="myprofile.php" title="Home">
                                                        <span>Home</span>
                                                    </a>
                                                </li>
                                                <li class="hasMenuDropdown hasMegaMenu">
                                                    <a href="collections/all.php" title="Shop">
                                                        <span>Shop</span></a>
                                                    <a class="btnCaret hidden-xl hidden-lg hidden-md"
                                                        data-toggle="collapse" href="#megaDropdown21"></a>

                                                    <div id="megaDropdown21" class="menuDropdown megaMenu collapse">
                                                        <div class="menuGroup rowFlex rowFlexMargin">
                                                            <div class="col-sm-9">
                                                                <div class="rowFlex rowFlexMargin velaMenuListLink">
                                                                    <div class="col-xs-12 col-sm-3">
                                                                        <ul class="velaMenuLinks">
                                                                            <li class="menuTitle">
                                                                                <a href="collections.php"
                                                                                    title="">Cushion Covers</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/furniture.php"
                                                                                    title="">Leaves</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/decor-art.php"
                                                                                    title="">Small
                                                                                    motifs</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/illumination.php"
                                                                                    title="">Plain
                                                                                    and textures</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/kitchen-things.php"
                                                                                    title="">Stripes and checks</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/best-sellter.php"
                                                                                    title="">Abstract</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/new-products.php"
                                                                                    title="">Geometric</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-3">
                                                                        <ul class="velaMenuLinks">
                                                                            <li class="menuTitle">
                                                                                <a href="collections/best-sellter.php"
                                                                                    title="">Rugs</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/sale-off.php"
                                                                                    title="">Plain and
                                                                                    Textures</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/best-sellter.php"
                                                                                    title="">Classical</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/furniture.php"
                                                                                    title="">Abstract</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/all.php"
                                                                                    title="">Ethnic</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/kitchen-things.php"
                                                                                    title="">Stripes And Checks</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="collections/illumination.php"
                                                                                    title="">Damask</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-3">
                                                                        <ul class="velaMenuLinks">
                                                                            <li class="menuTitle">
                                                                                <a href="products/sacrificial-chair-design-12.php"
                                                                                    title="">Bed & Bath</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-12.php"
                                                                                    title="">Bed Sheets</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-5.php"
                                                                                    title="">Comforter</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-6.php"
                                                                                    title="">Quilts</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-10.php"
                                                                                    title="">Dohar</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-11.php"
                                                                                    title="">Bedding Set</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-2.php"
                                                                                    title="">Bed in Bag</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-8.php"
                                                                                    title="">Hand towles</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-8.php"
                                                                                    title="">Face towles</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="products/sacrificial-chair-design-8.php"
                                                                                    title="">Bath Robe</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-xs-12 col-sm-3">
                                                                        <ul class="velaMenuLinks">
                                                                            <li class="menuTitle">
                                                                                <a href="pages/home-pages.php"
                                                                                    title="">Ready Made
                                                                                    Curtains</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="pages/about-us.php"
                                                                                    title="">Botanical</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="pages/contact-us.php"
                                                                                    title="">Leaves</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="pages/faqs.php" title="">Shiny
                                                                                    textures</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="search.php" title="">Plain</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="pages/404.php"
                                                                                    title="">Floral</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="pages/password.php"
                                                                                    title="">Stripes and
                                                                                    Checks</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="cart.php" title="">For Kids</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="velaMenuBanner mb10">
                                                                    <a href="#">
                                                                        <div class="p-relative">
                                                                            <div class="product-card__image" style="
                                            padding-top: 104.54545454545455%;
                                          ">
                                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/banner-menu_360x.jpg?v=1614321993"
                                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                                    data-aspectratio="0.9565217391304348"
                                                                                    data-ratio="0.9565217391304348"
                                                                                    data-sizes="auto" alt="" />
                                                                            </div>
                                                                            <div class="placeholder-background placeholder-background--animation"
                                                                                data-image-placeholder></div>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="hasMenuDropdown hasMegaMenu">
                                                    <a href="collections.php" title="">
                                                        <span>Collections</span></a>
                                                    <a class="btnCaret hidden-xl hidden-lg hidden-md"
                                                        data-toggle="collapse" href="#megaDropdown22"></a>

                                                    <div id="megaDropdown22" class="menuDropdown megaMenu collapse">
                                                        <div class="menuGroup rowFlex rowFlexMargin">
                                                            <div class="col-sm-12">
                                                                <div class="rowFlex rowFlexMargin velaMenuListLink">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="velaMenuListCollection">
                                                                    <div class="menuTitle">
                                                                        <span>List collection</span>
                                                                    </div>

                                                                    <div class="velaMenuListContent rowFlex">
                                                                        <div class="coll-item" style="width: 20%">
                                                                            <div class="collImage">
                                                                                <a href="collections/decor-art.php">
                                                                                    <div class="p-relative">
                                                                                        <div class="product-card__image"
                                                                                            style="padding-top: 100%">
                                                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/18_360x.jpg?v=1511442950"
                                                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                                                data-aspectratio="1.0"
                                                                                                data-ratio="1.0"
                                                                                                data-sizes="auto"
                                                                                                alt="Decor Art" />
                                                                                        </div>
                                                                                        <div class="placeholder-background placeholder-background--animation"
                                                                                            data-image-placeholder>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5 class="collTitle">
                                                                                <a href="collections/decor-art.php"
                                                                                    title="Decor Art">
                                                                                    Decor Art</a>
                                                                            </h5>
                                                                        </div>

                                                                        <div class="coll-item" style="width: 20%">
                                                                            <div class="collImage">
                                                                                <a href="collections/furniture.php">
                                                                                    <div class="p-relative">
                                                                                        <div class="product-card__image"
                                                                                            style="padding-top: 100%">
                                                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/7_360x.jpg?v=1511442889"
                                                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                                                data-aspectratio="1.0"
                                                                                                data-ratio="1.0"
                                                                                                data-sizes="auto"
                                                                                                alt="Furniture" />
                                                                                        </div>
                                                                                        <div class="placeholder-background placeholder-background--animation"
                                                                                            data-image-placeholder>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5 class="collTitle">
                                                                                <a href="collections/furniture.php"
                                                                                    title="Furniture">
                                                                                    Furniture</a>
                                                                            </h5>
                                                                        </div>

                                                                        <div class="coll-item" style="width: 20%">
                                                                            <div class="collImage">
                                                                                <a
                                                                                    href="collections/kitchen-things.php">
                                                                                    <div class="p-relative">
                                                                                        <div class="product-card__image"
                                                                                            style="padding-top: 100%">
                                                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/21_360x.jpg?v=1511442906"
                                                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                                                data-aspectratio="1.0"
                                                                                                data-ratio="1.0"
                                                                                                data-sizes="auto"
                                                                                                alt="Kitchen Things" />
                                                                                        </div>
                                                                                        <div class="placeholder-background placeholder-background--animation"
                                                                                            data-image-placeholder>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5 class="collTitle">
                                                                                <a href="collections/kitchen-things.php"
                                                                                    title="Kitchen Things">
                                                                                    Kitchen Things</a>
                                                                            </h5>
                                                                        </div>

                                                                        <div class="coll-item" style="width: 20%">
                                                                            <div class="collImage">
                                                                                <a href="collections/illumination.php">
                                                                                    <div class="p-relative">
                                                                                        <div class="product-card__image"
                                                                                            style="padding-top: 100%">
                                                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/12_360x.jpg?v=1511442995"
                                                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                                                data-aspectratio="1.0"
                                                                                                data-ratio="1.0"
                                                                                                data-sizes="auto"
                                                                                                alt="Illumination" />
                                                                                        </div>
                                                                                        <div class="placeholder-background placeholder-background--animation"
                                                                                            data-image-placeholder>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5 class="collTitle">
                                                                                <a href="collections/illumination.php"
                                                                                    title="Illumination">
                                                                                    Illumination</a>
                                                                            </h5>
                                                                        </div>

                                                                        <div class="coll-item" style="width: 20%">
                                                                            <div class="collImage">
                                                                                <a href="collections/sale-off.php">
                                                                                    <div class="p-relative">
                                                                                        <div class="product-card__image"
                                                                                            style="
                                                  padding-top: 99.83606557377047%;
                                                ">
                                                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/collections/Arc-Large-Cup_360x.jpg"
                                                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                                                data-aspectratio="1.0016420361247949"
                                                                                                data-ratio="1.0016420361247949"
                                                                                                data-sizes="auto"
                                                                                                alt="Sale Off" />
                                                                                        </div>
                                                                                        <div class="placeholder-background placeholder-background--animation"
                                                                                            data-image-placeholder>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5 class="collTitle">
                                                                                <a href="collections/sale-off.php"
                                                                                    title="Sale Off">
                                                                                    Sale Off</a>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="">
                                                    <a href="blogs/news.php" title="">
                                                        <span>Blog</span></a>
                                                </li>
                                                <li class="">
                                                    <a href="pages/contact-us.php" title="">
                                                        <span>Contact</span></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </section>
                                </div>
                                <div class="velaHeaderRight col-xs-7 col-sm-6 col-md-3">
                                    <a class="velaSearchIcon" href="#velaSearchTop" data-toggle="collapse"
                                        title="Search">
                                        <span class="icons">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                viewBox="0 0 512 512" xml:space="preserve">
                                                <path
                                                    d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                            </svg>
                                        </span>
                                        <span>Search</span>
                                    </a>
                                    <div class="velaCartTop">
                                        <a href="cart.php" class="jsDrawerOpenRight d-flex">
                                            <i class="icons"><svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 512 512" style="enable-background: new 0 0 512 512"
                                                    xml:space="preserve">
                                                    <path
                                                        d="M448,160h-64v-4.5C384,87,329,32,260.5,32h-8C184,32,128,87,128,155.5v4.5H64L32,480h448L448,160z M160,155.5c0-50.7,41.8-91.5,92.5-91.5h7.5h0.5c50.7,0,91.5,40.8,91.5,91.5v4.5H160V155.5z M67.8,448l24.9-256H128v36.3c-9.6,5.5-16,15.9-16,27.7c0,17.7,14.3,32,32,32s32-14.3,32-32c0-11.8-6.4-22.2-16-27.7V192h192v36.3c-9.6,5.5-16,15.9-16,27.7c0,17.7,14.3,32,32,32s32-14.3,32-32c0-11.8-6.4-22.2-16-27.7V192h35.4l24.9,256H67.8z" />
                                                </svg></i>
                                            <span class="cartitle hidden-xs"> Cart</span>
                                            (<span id="CartCount"> 0 </span>)
                                        </a>
                                    </div>
                                    <a class="velaIonTopLinks collapsed" data-toggle="collapse" href="#velaTopLinks">
                                        <i class="icons"><svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                                                focusable="false" style="
                            -ms-transform: rotate(360deg);
                            -webkit-transform: rotate(360deg);
                            transform: rotate(360deg);
                          " preserveAspectRatio="xMidYMid meet" viewBox="0 0 1024 896">
                                                <path
                                                    d="M27 130q-4-4-7-9t-4-10.5T15 98q0-19 12-31t31-12h913q19 0 31 12t12 31t-12 31.5t-31 12.5H58q-19 0-31-12zm975 285q12 12 12 31t-12 31t-31 12H58q-19 0-31-12q-2-2-4-5t-3.5-6t-2.5-6t-1.5-6.5t-.5-7.5q0-19 12-31t31-12h913q19 0 31 12zm0 347q12 12 12 31t-12 31.5t-31 12.5H58q-19 0-31-12q-2-2-3.5-4.5l-3-5l-2.5-5l-2-5.5l-1-5.5V793q0-19 12-31t31-12h913q18 0 31 12z" />
                                            </svg></i>
                                    </a>
                                    <div id="velaTopLinks" class="groupLink collapse">
                                        <div class="velaTopLinks">
                                            <ul class="list-unstyled">

                                                <?php
                                                $eid = $_SESSION['eid'];
                                                $sql = "SELECT Name from members where id=:eid";
                                                $query = $dbh->prepare($sql);
                                                $query->bindParam(':eid', $eid, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {               ?>
                                                <li>
                                                    <p style="margin-left: 9px; margin-bottom:0px">
                                                        <?php echo htmlentities($result->Name); ?>
                                                    </p>
                                                </li>

                                                <?php }
                                                } ?>

                                                <li>
                                                    <a href="logout.php" id="customer_login_link">Logout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div id="velaSearchTop" class="collapse">
                                    <div class="container text-center">
                                        <a class="btnClose" href="#velaSearchTop" data-toggle="collapse"><i
                                                class="ion ion-android-close"></i></a>
                                        <h3 class="title">Search</h3>
                                        <form id="velaSearchbox" class="formSearch"
                                            action="https://vela-kazan.myshopify.com/search" method="get">
                                            <input type="hidden" name="type" value="product" />
                                            <input class="velaSearch form-control" type="search" name="q" value=""
                                                placeholder="Enter keywords to search..." autocomplete="off" />
                                            <button id="velaSearchButton" class="btnVelaSearch" type="submit">
                                                <span class="icons">
                                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        viewBox="0 0 512 512" style="enable-background: new 0 0 512 512"
                                                        xml:space="preserve">
                                                        <path
                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
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
                <!-- BEGIN content_for_index -->
                <div id="shopify-section-1551027504217" class="shopify-section velaFramework">
                    <div class="banner-slideShow mbBlockGutter" style="background-color: #eaebef">
                        <div class="container-full">
                            <div class="velaSlideshow">
                                <div data-section-id="1551027504217" data-section-type="velaSlideshowSection">
                                    <div class="velaSlideshowWrapper">
                                        <button type="button" class="btnssPause" data-id="1551027504217">
                                            <span class="btnssPauseStop">
                                                <i class="fa fa-play"></i>
                                                <span class="iconText">Pause slideshow</span>
                                            </span>
                                            <span class="btnssPausePlay">
                                                <i class="fa fa-pause"></i>
                                                <span class="iconText">Play slideshow</span>
                                            </span>
                                        </button>

                                        <div id="velaSlideshows1551027504217" class="vela--slideshow velaSliderLoading"
                                            data-autoplay="true" data-speed="8000" data-navigation="true"
                                            data-pagination="true">
                                            <div class="velassSlide velassSlide1551027504217-0">
                                                <div class="velassImage"
                                                    data-image="https://cdn.shopify.com/s/files/1/1573/5553/files/slide1_1944x.jpg?v=1613719087">
                                                    <div class="p-relative">
                                                        <div class="product-card__image"
                                                            style="padding-top: 48.59375000000001%">
                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/slide1_1944x.jpg?v=1613719087"
                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                data-aspectratio="2.057877813504823"
                                                                data-ratio="2.057877813504823" data-sizes="auto"
                                                                alt="" />
                                                        </div>
                                                        <div class="placeholder-background placeholder-background--animation"
                                                            data-image-placeholder></div>
                                                    </div>
                                                </div>

                                                <div class="velassCaption" style="background-color: rgba(0, 0, 0, 0)">
                                                    <div class="container captionWrap">
                                                        <div class="velassCaptionContent text-left align-middle">
                                                            <div class="velassCaptionInner text-left">
                                                                <h2 class="velassHeading leftright-2"
                                                                    style="color: #323232">
                                                                    Luxury
                                                                </h2>
                                                                <h3 class="velassHeadingSmall leftright-3"
                                                                    style="color: #323232">
                                                                    at your home
                                                                </h3>
                                                                <div class="velassDesc leftright-4"
                                                                    style="color: #323232">
                                                                    A new range of esthetic rugs with checks and
                                                                    textures and variety of floral prints.
                                                                </div>
                                                                <div>
                                                                    <a class="btn btnVelaSlider leftright-5"
                                                                        href="collections/all.php" style="
                                      border-color: #201f1f;
                                      background-color: rgba(0, 0, 0, 0);
                                      color: #201f1f;
                                      padding: 16px 40px;
                                    ">
                                                                        discover now
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velassSlide velassSlide1585906051700">
                                                <div class="velassImage"
                                                    data-image="https://cdn.shopify.com/s/files/1/1573/5553/files/slide2_1944x.jpg?v=1613719087">
                                                    <div class="p-relative">
                                                        <div class="product-card__image"
                                                            style="padding-top: 48.59375000000001%">
                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/slide2_1944x.jpg?v=1613719087"
                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                data-aspectratio="2.057877813504823"
                                                                data-ratio="2.057877813504823" data-sizes="auto"
                                                                alt="" />
                                                        </div>
                                                        <div class="placeholder-background placeholder-background--animation"
                                                            data-image-placeholder></div>
                                                    </div>
                                                </div>

                                                <div class="velassCaption" style="background-color: rgba(0, 0, 0, 0)">
                                                    <div class="container captionWrap">
                                                        <div class="velassCaptionContent text-left align-middle">
                                                            <div class="velassCaptionInner text-left">
                                                                <h2 class="velassHeading leftright-2"
                                                                    style="color: #323232">
                                                                    Think different &
                                                                </h2>
                                                                <h3 class="velassHeadingSmall leftright-3"
                                                                    style="color: #323232">
                                                                    Do otherwise
                                                                </h3>
                                                                <div class="velassDesc leftright-4"
                                                                    style="color: #323232">
                                                                    An extensive range of stylish bedsheets, bed
                                                                    covers, embroidered with elegance to highlight
                                                                    Indian homes.
                                                                </div>
                                                                <div>
                                                                    <a class="btn btnVelaSlider leftright-5"
                                                                        href="collections/all.php" style="
                                      border-color: #201f1f;
                                      background-color: rgba(0, 0, 0, 0);
                                      color: #201f1f;
                                      padding: 16px 40px;
                                    ">
                                                                        discover now
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velassSlide velassSlide1585906169692">
                                                <div class="velassImage"
                                                    data-image="https://cdn.shopify.com/s/files/1/1573/5553/files/slide3_1944x.jpg?v=1613719087">
                                                    <div class="p-relative">
                                                        <div class="product-card__image"
                                                            style="padding-top: 48.59375000000001%">
                                                            <img class="product-card__img lazyload imgFlyCart"
                                                                data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/slide3_1944x.jpg?v=1613719087"
                                                                data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                data-aspectratio="2.057877813504823"
                                                                data-ratio="2.057877813504823" data-sizes="auto"
                                                                alt="" />
                                                        </div>
                                                        <div class="placeholder-background placeholder-background--animation"
                                                            data-image-placeholder></div>
                                                    </div>
                                                </div>

                                                <div class="velassCaption" style="background-color: rgba(0, 0, 0, 0)">
                                                    <div class="container captionWrap">
                                                        <div class="velassCaptionContent text-left align-middle">
                                                            <div class="velassCaptionInner text-left">
                                                                <h2 class="velassHeading leftright-2"
                                                                    style="color: #323232">
                                                                    High Beam
                                                                </h2>
                                                                <h3 class="velassHeadingSmall leftright-3"
                                                                    style="color: #323232">
                                                                    Stylish Curtains
                                                                </h3>
                                                                <div class="velassDesc leftright-4"
                                                                    style="color: #323232">
                                                                    Add a layer of eye catching long tail curtains
                                                                    at your windows to express your persona
                                                                </div>
                                                                <div>
                                                                    <a class="btn btnVelaSlider leftright-5"
                                                                        href="collections/decor-art.php" style="
                                      border-color: #201f1f;
                                      background-color: rgba(0, 0, 0, 0);
                                      color: #201f1f;
                                      padding: 16px 40px;
                                    ">
                                                                        discover now
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shopify-section-1600941194145" class="shopify-section velaFramework">
                    <div class="velaThreeBanner velaBannerFix mbBlockGutter">
                        <div class="container">
                            <div class="velaBannerInner">
                                <div class="row">
                                    <div class="col-sp-12 col-xs-4 col-sm-4">
                                        <div class="mbItemGutter effectOne">
                                            <a href="collections/furniture.php" title="AtoZ">
                                                <div class="p-relative">
                                                    <div class="product-card__image"
                                                        style="padding-top: 61.43617021276596%">
                                                        <img class="product-card__img lazyload imgFlyCart"
                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/banner1_540x.jpg?v=1613738659"
                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                            data-aspectratio="1.6277056277056277"
                                                            data-ratio="1.6277056277056277" data-sizes="auto" alt="" />
                                                    </div>
                                                    <div class="placeholder-background placeholder-background--animation"
                                                        data-image-placeholder></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sp-12 col-xs-4 col-sm-4">
                                        <div class="mbItemGutter effectOne">
                                            <a href="collections/kitchen-things.php" title="AtoZ">
                                                <div class="p-relative">
                                                    <div class="product-card__image"
                                                        style="padding-top: 61.43617021276596%">
                                                        <img class="product-card__img lazyload imgFlyCart"
                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/banner2_540x.jpg?v=1613719087"
                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                            data-aspectratio="1.6277056277056277"
                                                            data-ratio="1.6277056277056277" data-sizes="auto" alt="" />
                                                    </div>
                                                    <div class="placeholder-background placeholder-background--animation"
                                                        data-image-placeholder></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sp-12 col-xs-4 col-sm-4">
                                        <div class="mbItemGutter effectOne">
                                            <a href="collections/illumination.php" title="AtoZ">
                                                <div class="p-relative">
                                                    <div class="product-card__image"
                                                        style="padding-top: 61.43617021276596%">
                                                        <img class="product-card__img lazyload imgFlyCart"
                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/banner3_540x.jpg?v=1613738659"
                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                            data-aspectratio="1.6277056277056277"
                                                            data-ratio="1.6277056277056277" data-sizes="auto" alt="" />
                                                    </div>
                                                    <div class="placeholder-background placeholder-background--animation"
                                                        data-image-placeholder></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shopify-section-1600941946634" class="shopify-section velaFramework">
                    <div class="productLoadMore mbGutter"
                        style="background-color: rgba(0, 0, 0, 0); padding: 45px 0 50px">
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
                                    <div class="row1">
                                        <div class="container10 col-md-3">
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14_360x.jpg" />
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />
                                        </div>
                                        <div class="container10 col-md-3">
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14_360x.jpg" />
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />
                                        </div>
                                        <div class="container10 col-md-3">
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14_360x.jpg" />
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />
                                            <img
                                                src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg" />
                                        </div>

                                    </div>
                                    <div class="clearfix text-center" style="margin-top: 30px;">
                                        <a class="btnLoadMore" href="index4658.php?page=2" title="LOAD MORE">
                                            LOAD MORE
                                        </a>
                                    </div>
                                    <div class="proLoadMoreBottom"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div id="shopify-section-1600941984523" class="shopify-section velaFramework">
        <div class="velaMultiBanner mbBlockGutter" style="background-color: rgba(0, 0, 0, 0)">
          <div class="container-full">
            <div class="velaMultiBannerInner">
              <div class="velaContent">
                <div class="rowFlex rowFlexMargin">
                  <div class="col-xs-12 col-sm-6">
                    <div class="mbItemGutter velaBanner effectOne">
                      <a href="collections/decor-art.php" title="AtoZ">
                        <div class="p-relative">
                          <div class="product-card__image" style="padding-top: 48.10526315789473%">
                            <img class="product-card__img lazyload imgFlyCart" data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/banner4_360x.jpg?v=1613719087" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="2.078774617067834" data-ratio="2.078774617067834" data-sizes="auto" alt="" />
                          </div>
                          <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                        </div>
                      </a>
                    </div>
                  </div>

                  <div class="col-xs-12 col-sm-6">
                    <div class="mbItemGutter velaBanner effectOne">
                      <a href="collections/furniture.php" title="AtoZ">
                        <div class="p-relative">
                          <div class="product-card__image" style="padding-top: 48.10526315789473%">
                            <img class="product-card__img lazyload imgFlyCart" data-src="https://cdn.shopify.com/s/files/1/1573/5553/files/banner5_360x.jpg?v=1613719087" data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]" data-aspectratio="2.078774617067834" data-ratio="2.078774617067834" data-sizes="auto" alt="" />
                          </div>
                          <div class="placeholder-background placeholder-background--animation" data-image-placeholder></div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

                <!-- ======= Portfolio Section Start======= -->
                <section id="portfolio">
                    <div class="container" data-aos="fade-up">
                        <div class="row">
                            <div class="headingGroup pb20">
                                <h3 class="velaHomeTitle">
                                    <span> Best Sellers</span>
                                </h3>
                                <span class="subTitle">
                                    Watch our best selling products in Market!
                                </span>
                            </div>
                            <!-- <div class="col-md-12">
            <h3 class="section-title">Portfolio</h3>
            <div class="section-title-divider"></div>
            <p class="section-description">Si stante, hoc natura videlicet vult, salvam esse se, quod concedimus ses haec dicturum fuisse</p>
            </div> -->
                        </div>

                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <ul id="portfolio-flters">
                                    <li data-filter="*" class="filter-active">All</li>
                                    <li data-filter=".filter-app">Bedsheets</li>
                                    <li data-filter=".filter-card">Cushion Covers</li>
                                    <li data-filter=".filter-web">Curtains</li>
                                </ul>
                            </div>
                        </div>

                        <div class="image-gal">
                            <div class="box">
                                <div class="dream">
                                    <img src="assets/images/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                                    <img src="https://cdn.shopify.com/s/files/1/1573/5553/products/11_360x.jpg?v=1617528878"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="dream">
                                    <img src="https://cdn.shopify.com/s/files/1/1573/5553/products/11_360x.jpg?v=1617528878"
                                        class="img-fluid" alt="">
                                    <img src="assets/images/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="dream">
                                    <img src="assets/images/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                                    <img src="assets/images/portfolio/portfolio-1.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="headingGroup pb20">
                                <h3 class="velaHomeTitle">
                                    <span> PAGE BREAK </span>
                                </h3>
                            </div>
                        </div>
                        <div class="row portfolio-container" id="category">


                            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                                <img src="assets/images/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>Web 3</h4>
                                    <p>Web</p>
                                    <a href="assets/images/portfolio/portfolio-2.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox preview-link" title="Web 3"><i
                                            class="bi bi-plus"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <img src="assets/images/portfolio/portfolio-3.jpg" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>App 2</h4>
                                    <p>App</p>
                                    <a href="assets/images/portfolio/portfolio-3.jpg" data-gallery="portfolioGallery"
                                        class="portfolio-lightbox preview-link" title="App 2"><i
                                            class="bi bi-plus"></i></a>
                                </div>
                            </div>
                            <!--
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/images/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <a href="assets/images/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 2"><i class="bi bi-plus"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/images/portfolio/portfolio-5.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <a href="assets/images/portfolio/portfolio-5.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 2"><i class="bi bi-plus"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <img src="assets/images/portfolio/portfolio-6.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <a href="assets/images/portfolio/portfolio-6.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="App 3"><i class="bi bi-plus"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/images/portfolio/portfolio-7.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <a href="assets/images/portfolio/portfolio-7.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 1"><i class="bi bi-plus"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
              <img src="assets/images/portfolio/portfolio-8.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <a href="assets/images/portfolio/portfolio-8.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Card 3"><i class="bi bi-plus"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
              <img src="assets/images/portfolio/portfolio-9.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <a href="assets/images/portfolio/portfolio-9.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="Web 3"><i class="bi bi-plus"></i></a>
              </div>
            </div> -->
                        </div>

                    </div>
                </section>
                <!-- ======= Portfolio Section End======= -->

                <div id="shopify-section-1600942005808" class="shopify-section velaFramework">
                    <div class="productListHome velaProducts mbBlockGutter"
                        style="background-color: rgba(0, 0, 0, 0); padding: 40px 0 45px">
                        <div class="container">
                            <div class="sectionInner">
                                <div class="headingGroup pb20">
                                    <h3 class="velaHomeTitle text-center">
                                        <span>Sale Off</span>
                                    </h3>
                                    <span class="subTitle">Mirum est notare quam littera gothica quam nunc putamus
                                        parum claram!</span>
                                </div>
                                <div class="velaContent">
                                    <div class="proOwlCarousel velaOwlRow owlCarouselPlay">
                                        <div class="owl-carousel" data-nav="true" data-autoplay="false"
                                            data-autoplaytimeout="10000" data-columnone="4" data-columntwo="4"
                                            data-columnthree="3" data-columnfour="2" data-columnfive="2">
                                            <div class="velaProBlock grid" data-price="260.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design-12.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 126.90355329949239%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/14_360x.jpg?v=1601694510"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.788" data-ratio="0.788"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm hidden-xs proSwatch proImageSecond">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 126.90355329949239%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/14-1_360x.jpg?v=1601694510"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.788" data-ratio="0.788"
                                                                            data-sizes="auto"
                                                                            alt="Sacrificial Chair Design" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable">
                                                            <span class="labelSale">Sale</span>
                                                        </div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design-12"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design-12.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct priceSale">
                                                                    <span class="money">$260.00</span>
                                                                </div>

                                                                <div class="priceProduct priceCompare">
                                                                    <span class="money">$280.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="39397249056833" />

                                                                <button class="btn btnAddToCart" type="submit"
                                                                    value="Submit">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velaProBlock grid" data-price="170.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design-11.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 126.90355329949239%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/1_c14253f1-8cb5-4a88-921b-d3dbaffaaafa_360x.jpg?v=1601694960"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.788" data-ratio="0.788"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm hidden-xs proSwatch proImageSecond">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 126.90355329949239%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/1-1_360x.jpg?v=1601694960"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.788" data-ratio="0.788"
                                                                            data-sizes="auto"
                                                                            alt="Sacrificial Chair Design" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable"></div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design-11"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design-11.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct">
                                                                    <span class="money">$170.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="158484398096" />

                                                                <button class="btn btnAddToCart" type="submit"
                                                                    value="Submit">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velaProBlock grid" data-price="150.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design-9.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 127.42857142857142%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/16_360x.jpg?v=1509980861"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7847533632286996"
                                                                            data-ratio="0.7847533632286996"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm hidden-xs proSwatch proImageSecond">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 128.57142857142858%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/12_360x.jpg?v=1509980861"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7777777777777778"
                                                                            data-ratio="0.7777777777777778"
                                                                            data-sizes="auto"
                                                                            alt="Sacrificial Chair Design" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable">
                                                            <span class="labelSale">Sale</span>
                                                        </div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design-9"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design-9.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct priceSale">
                                                                    <span class="money">$150.00</span>
                                                                </div>

                                                                <div class="priceProduct priceCompare">
                                                                    <span class="money">$180.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="158484758544" />

                                                                <button class="btn btnAddToCart" type="submit"
                                                                    value="Submit">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velaProBlock grid" data-price="170.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design-8.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 128.57142857142858%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/11_360x.jpg?v=1617528878"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7777777777777778"
                                                                            data-ratio="0.7777777777777778"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm hidden-xs proSwatch proImageSecond">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 127.42857142857142%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/25_14925dcf-253e-4ad6-bece-ba55411af4e1_360x.jpg?v=1617528878"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7847533632286996"
                                                                            data-ratio="0.7847533632286996"
                                                                            data-sizes="auto"
                                                                            alt="Sacrificial Chair Design" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable">
                                                            <span class="labelSale">Sale</span>
                                                        </div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design-8"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design-8.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct priceSale">
                                                                    <span class="money">$170.00</span>
                                                                </div>

                                                                <div class="priceProduct priceCompare">
                                                                    <span class="money">$200.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="158484791312" />

                                                                <button class="btn btnAddToCart" type="submit"
                                                                    value="Submit">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velaProBlock grid" data-price="100.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design-7.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 128.57142857142858%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/9_360x.jpg?v=1509980323"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7777777777777778"
                                                                            data-ratio="0.7777777777777778"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm hidden-xs proSwatch proImageSecond">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 127.42857142857142%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/25_42a243f5-01de-4f8e-9314-0c2ab068ed20_360x.jpg?v=1509981003"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7847533632286996"
                                                                            data-ratio="0.7847533632286996"
                                                                            data-sizes="auto"
                                                                            alt="Sacrificial Chair Design" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable">
                                                            <span class="labelSale">Sale</span>
                                                        </div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design-7"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design-7.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct priceSale">
                                                                    <span class="money">$100.00</span>
                                                                </div>

                                                                <div class="priceProduct priceCompare">
                                                                    <span class="money">$180.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="158484824080" />

                                                                <button class="btn btnAddToCart" type="submit"
                                                                    value="Submit">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velaProBlock grid" data-price="140.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design-3.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 128.57142857142858%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/4_360x.jpg?v=1509980328"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7777777777777778"
                                                                            data-ratio="0.7777777777777778"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm hidden-xs proSwatch proImageSecond">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 127.42857142857142%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/9_d9a89bd5-61ac-4547-b397-bcea7a9b4917_360x.jpg?v=1509981236"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7847533632286996"
                                                                            data-ratio="0.7847533632286996"
                                                                            data-sizes="auto"
                                                                            alt="Sacrificial Chair Design" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable"></div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design-3"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design-3.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct">
                                                                    <span class="money">$140.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="158484987920" />

                                                                <button class="btn btnAddToCart" type="submit"
                                                                    value="Submit">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velaProBlock grid" data-price="130.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 128.57142857142858%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/1_360x.jpg?v=1509980332"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7777777777777778"
                                                                            data-ratio="0.7777777777777778"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-sm hidden-xs proSwatch proImageSecond">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 128.57142857142858%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/3_360x.jpg?v=1509980332"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7777777777777778"
                                                                            data-ratio="0.7777777777777778"
                                                                            data-sizes="auto"
                                                                            alt="Sacrificial Chair Design" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable"></div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct">
                                                                    <span class="money">$130.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="158485676048" />

                                                                <a class="btn btnAddToCart"
                                                                    href="products/sacrificial-chair-design.php"
                                                                    title="Select options">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span class="select_options">Select options</span>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="velaProBlock grid" data-price="132.00">
                                                <div class="velaProBlockInner">
                                                    <div class="proHImage d-flex flexJustifyCenter">
                                                        <a class="proFeaturedImage"
                                                            href="products/sacrificial-chair-design-1.php">
                                                            <div class="wrap">
                                                                <div class="p-relative">
                                                                    <div class="product-card__image"
                                                                        style="padding-top: 128.57142857142858%">
                                                                        <img class="product-card__img lazyload imgFlyCart"
                                                                            data-src="https://cdn.shopify.com/s/files/1/1573/5553/products/13_1c04d432-a1ba-4e9b-88a1-b9c3aecbab9d_360x.jpg?v=1591760416"
                                                                            data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                            data-aspectratio="0.7777777777777778"
                                                                            data-ratio="0.7777777777777778"
                                                                            data-sizes="auto" alt="" />
                                                                    </div>
                                                                    <div class="placeholder-background placeholder-background--animation"
                                                                        data-image-placeholder></div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <div class="productLable"></div>
                                                        <div class="productQuickView">
                                                            <a class="btn btnProduct btnProductQuickview"
                                                                href="#velaQuickView"
                                                                data-handle="sacrificial-chair-design-1"
                                                                title="Quick view">
                                                                <span class="icons">
                                                                    <svg version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        x="0px" y="0px" viewBox="0 0 512 512"
                                                                        style="enable-background: new 0 0 512 512"
                                                                        xml:space="preserve">
                                                                        <path
                                                                            d="M344.5,298c15-23.6,23.8-51.6,23.8-81.7c0-84.1-68.1-152.3-152.1-152.3C132.1,64,64,132.2,64,216.3c0,84.1,68.1,152.3,152.1,152.3c30.5,0,58.9-9,82.7-24.4l6.9-4.8L414.3,448l33.7-34.3L339.5,305.1L344.5,298z M301.4,131.2c22.7,22.7,35.2,52.9,35.2,85c0,32.1-12.5,62.3-35.2,85c-22.7,22.7-52.9,35.2-85,35.2c-32.1,0-62.3-12.5-85-35.2c-22.7-22.7-35.2-52.9-35.2-85c0-32.1,12.5-62.3,35.2-85c22.7-22.7,52.9-35.2,85-35.2C248.5,96,278.7,108.5,301.4,131.2z" />
                                                                    </svg>
                                                                </span>
                                                                <span class="text">Quick view</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="proContent">
                                                        <h5 class="proName">
                                                            <a href="products/sacrificial-chair-design-1.php">Sacrificial
                                                                Chair Design</a>
                                                        </h5>
                                                        <div class="proGroup">
                                                            <div class="proPrice">
                                                                <div class="priceProduct">
                                                                    <span class="money">$132.00</span>
                                                                </div>
                                                            </div>

                                                            <form action="https://vela-kazan.myshopify.com/cart/add"
                                                                method="post" enctype="multipart/form-data"
                                                                class="formAddToCart">
                                                                <input type="hidden" name="id" value="158485250064" />

                                                                <button class="btn btnAddToCart" type="submit"
                                                                    value="Submit">
                                                                    <i class="icons">
                                                                        <svg version="1.1"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                            x="0px" y="0px" viewBox="0 0 512 512"
                                                                            enable-background="new 0 0 512 512"
                                                                            xml:space="preserve">
                                                                            <g>
                                                                                <g>
                                                                                    <path
                                                                                        d="M416,277.333H277.333V416h-42.666V277.333H96v-42.666h138.667V96h42.666v138.667H416V277.333z" />
                                                                                </g>
                                                                            </g>
                                                                        </svg>
                                                                    </i>
                                                                    <span>Add to Cart</span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shopify-section-1600942022910" class="shopify-section velaFramework">
                    <div class="velaLogoList mbGutter" style="background-color: rgba(0, 0, 0, 0); padding: 40px 0 90px">
                        <div class="container">
                            <div class="velaLogoListInner">
                                <div class="velaContent">
                                    <div class="velaOwlRow owlCarouselPlay">
                                        <div class="owl-carousel" data-nav="true" data-loop="true" data-autoplay="false"
                                            data-autoplaytimeout="10000" data-columnone="5" data-columntwo="4"
                                            data-columnthree="3" data-columnfour="3" data-columnfive="2">
                                            <div class="item">
                                                <div class="logoImage d-flex flexJustifyCenter">
                                                    <a href="#"><img class="img-responsive" alt="AtoZ"
                                                            src="https://cdn.shopify.com/s/files/1/1573/5553/files/logo_image1.png?v=1613719814" /></a>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="logoImage d-flex flexJustifyCenter">
                                                    <a href="#"><img class="img-responsive" alt="AtoZ"
                                                            src="https://cdn.shopify.com/s/files/1/1573/5553/files/logo_image2.png?v=1613719814" /></a>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="logoImage d-flex flexJustifyCenter">
                                                    <a href="#"><img class="img-responsive" alt="AtoZ"
                                                            src="https://cdn.shopify.com/s/files/1/1573/5553/files/logo_image3.png?v=1613719814" /></a>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="logoImage d-flex flexJustifyCenter">
                                                    <a href="#"><img class="img-responsive" alt="AtoZ"
                                                            src="https://cdn.shopify.com/s/files/1/1573/5553/files/logo_image4.png?v=1613719815" /></a>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="logoImage d-flex flexJustifyCenter">
                                                    <a href="#"><img class="img-responsive" alt="AtoZ"
                                                            src="https://cdn.shopify.com/s/files/1/1573/5553/files/logo_image5.png?v=1613719815" /></a>
                                                </div>
                                            </div>

                                            <div class="item">
                                                <div class="logoImage d-flex flexJustifyCenter">
                                                    <a href="#"><img class="img-responsive" alt="AtoZ"
                                                            src="https://cdn.shopify.com/s/files/1/1573/5553/files/logo_image6.png?v=1613719815" /></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="shopify-section-1600942034460" class="shopify-section velaFramework">
                    <div class="velaHomeBlogs mbGutter style1"
                        style="background-color: rgba(0, 0, 0, 0); padding: 0 0 40px">
                        <div class="container">
                            <div class="velaHomeBlogsInner">
                                <div class="headingGroup pb20">
                                    <h3 class="velaHomeTitle text-center">
                                        <span>Our Blog Posts</span>
                                    </h3>
                                    <span class="subTitle">Mirum est notare quam littera gothica quam nunc putamus
                                        parum claram!</span>
                                </div>
                                <div class="velaContent">
                                    <div class="velaOwlRow owlCarouselPlay">
                                        <div class="owl-carousel" data-nav="true" data-loop="false" data-dots="false"
                                            data-autoplay="false" data-autoplaytimeout="10000" data-columnone="3"
                                            data-columntwo="3" data-columnthree="2" data-columnfour="1"
                                            data-columnfive="1">
                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-6.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/1_360x.jpg?v=1511574495"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-6.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            16, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-6.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-13.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/2_360x.jpg?v=1511574521"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-13.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            06, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-13.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-12.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/3_360x.jpg?v=1511574539"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-12.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            06, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-12.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-11.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/4_360x.jpg?v=1511574572"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-11.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            06, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-11.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-10.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/5_360x.jpg?v=1511574587"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-10.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            06, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-10.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-9.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/1_8c97c3ce-68a4-490a-b77b-ceece77b0926_360x.jpg?v=1511574604"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-9.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            06, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-9.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-8.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/2_1e36e94b-9401-45f7-995d-860334be9f14_360x.jpg?v=1511574639"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-8.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            06, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-8.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="velaBlogItem blogArticle">
                                                <div class="blogPostImage">
                                                    <a href="blogs/news/anteposuerit-litterarum-formas-7.php"
                                                        title="Anteposuerit litterarum formas.">
                                                        <div class="p-relative">
                                                            <div class="product-card__image"
                                                                style="padding-top: 64.375%">
                                                                <img class="product-card__img lazyload imgFlyCart"
                                                                    data-src="https://cdn.shopify.com/s/files/1/1573/5553/articles/3_8c6e9a18-7a88-4e6e-8754-ad9cea2d6594_360x.jpg?v=1511574623"
                                                                    data-widths="[360,540,720,900,1080,1296,1728,1944,2808,4320]"
                                                                    data-aspectratio="1.5533980582524272"
                                                                    data-ratio="1.5533980582524272" data-sizes="auto"
                                                                    alt="Anteposuerit litterarum formas." />
                                                            </div>
                                                            <div class="placeholder-background placeholder-background--animation"
                                                                data-image-placeholder></div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="blogPostContent">
                                                    <div class="blogTitle">
                                                        <a href="blogs/news.php" title="News">News</a>
                                                    </div>
                                                    <h3 class="articleTitle">
                                                        <a href="blogs/news/anteposuerit-litterarum-formas-7.php">Anteposuerit
                                                            litterarum formas.</a>
                                                    </h3>
                                                    <div class="articleMeta d-flex">
                                                        <span class="articleAuthor"><span>By</span> Mr Admin</span>
                                                        <span>/</span>
                                                        <span class="articlePublish pull-left"><i
                                                                class="fa fa-calendar-o" aria-hidden="true"></i>November
                                                            06, 2017</span>
                                                    </div>
                                                    <div class="articleDesc">
                                                        Diga, Koma and Torus are three kitchen utensils
                                                        designed for Ommo, a new design-oriented...
                                                    </div>
                                                    <a class="btn btnBlogReadMore"
                                                        href="blogs/news/anteposuerit-litterarum-formas-7.php"
                                                        title="Read More">
                                                        Read More
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END content_for_index -->

                <div id="shopify-section-vela-footer" class="shopify-section">
                    <footer id="velaFooter">
                        <div class="footerTop">
                            <div class="container-full">
                                <div class="footerTopInner">
                                    <div class="velaFooterNewsletter">
                                        <div class="container">
                                            <div class="secionInner">
                                                <div class="wrapper">
                                                    <h3 class="velaTitle">Get Discount Info</h3>

                                                    <div class="newsletterDescription clearfix">
                                                        Subscribe to the AtoZ mailing list to receive updates
                                                        on new arrivals, special offers and other discount
                                                        information.
                                                    </div>

                                                    <div class="velaContent">
                                                        <form method="post"
                                                            action="https://vela-kazan.myshopify.com/contact#contact_form"
                                                            id="contact_form" accept-charset="UTF-8"
                                                            class="contact-form">
                                                            <input type="hidden" name="form_type"
                                                                value="customer" /><input type="hidden" name="utf8"
                                                                value="✓" />

                                                            <div class="form-group">
                                                                <input class="form-control" id="newsletter-input"
                                                                    type="email" name="contact[email]"
                                                                    placeholder="Your email address..." />
                                                                <button class="btn btnNewsletter" type="submit">
                                                                    <span>Subscribe</span>
                                                                    <!-- <i class="fa fa-send" aria-hidden="true"></i> -->
                                                                </button>
                                                                <input type="hidden" name="action" value="0" />
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php include('footer.php'); ?>
                    </footer>
                </div>

                <!-- <div id="shopify-section-vela-template-notification" class="shopify-section"></div>
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
    </div>-->
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
                                  Check Out
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

                      Check Out

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
                                            src="cdn.shopify.com/s/files/1/1573/5553/t/43/assets/loadingfa7a.gif?v=47373580461733618591617237743"
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
                                <div class="proShortDescription rte"></div>

                                <form action="https://vela-kazan.myshopify.com/cart/add" method="post"
                                    enctype="multipart/form-data" class="formQuickview form-ajaxtocart">
                                    <div class="proVariantsQuickview">
                                        <select name="id" style="display: none"></select>
                                    </div>
                                    <div class="proPrice clearfix">
                                        <span class="priceProduct pricePrimary"></span>
                                        <span class="priceProduct priceCompare"></span>
                                    </div>
                                    <div class="velaGroup d-flex flexAlignEnd mb30">
                                        <div class="proQuantity">
                                            <!-- <label for="Quantity" class="qtySelector">Quantity</label> -->
                                            <input type="number" id="Quantity" name="quantity" value="1" min="1"
                                                class="qtySelector" />
                                        </div>
                                        <div class="proButton">
                                            <button type="submit" name="add" class="btn btnAddToCart">
                                                <span>Add to Cart</span>
                                            </button>
                                        </div>
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
                <?php include('footer_links.php'); ?>
</body>

<!--    24:10 GMT -->

</html>