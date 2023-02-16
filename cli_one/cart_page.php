<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AToZ - Cart</title>
    <?php include('header_links.php') ?>

</head>
<body>
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
                                <a href="./index.php" title="Back to the frontpage" itemprop="item">
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

        <!-- Check is user logges in -->
        <?php 
            if(!isset($_SESSION['username'])){
               echo " <div class='cartEmptyContent'>
                        <p class='cartEmpty'>You haven't logged in yet.</p>
                        <p>
                            Please Login to continue.
                        </p>
                        <p>
                            <a class='btn btnVelaOne' href='./login-page.php' title='Go to Shopping'>
                                Login
                            </a>
                        </p>
                    </div>";
            }
            else{
            }

        ?>


    </main>
</div>
</body>
</html>