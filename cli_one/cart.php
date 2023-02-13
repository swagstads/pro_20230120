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
</table>



<?php
    if(isset($_SESSION['username'])){ // If logged in
        $userid = $_SESSION['user_id'];
        $sql = "SELECT * FROM cart WHERE user_id= '$userid' ";
        $result = $dbh->query($sql);

        if ($result->rowCount() > 0){
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
               
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



<div id="shopify-section-vela-footer" class="shopify-section">
    <footer id="velaFooter">
        <?php include('footer.php'); ?>
    </footer>
</div>


<?php include('footer_links.php'); ?>
<script src="js/main.js?key=<?= date('is') ?>" type="text/javascript"></script>

</body>

<!--  cart  27:04 GMT -->

</html>