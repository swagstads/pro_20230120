<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
  	
	<title>Side Cart</title>
</head>
<body class="foo">
	<header>
		<div id="logo"><img src="img/cd-logo.svg" alt="Homepage"></div>

		<div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div>
		<div id="cd-cart-trigger"><a class="cd-img-replace" href="#0">Cart</a></div>
	</header>

	<nav id="main-nav">
		<ul>
			<li><a href="#0">Home</a></li>
			<li><a href="#0">About</a></li>
			<li><a class="current" href="#0">Services</a></li>
			<li><a href="#0">Gallery</a></li>
			<li><a href="#0">Contact</a></li>
		</ul>
	</nav>

	<main>
		<ul id="cd-gallery-items" class="cd-container">
			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>

			<li>
				<img src="img/thumb.jpg" alt="Preview image">
			</li>
		</ul> <!-- cd-gallery-items -->
	</main>

	<div id="cd-shadow-layer"></div>

	<div id="cd-cart">
		<h2>Cart</h2>
		<ul class="cd-cart-items">
			<li>
				<span class="cd-qty">1x</span> Product Name
				<div class="cd-price">$9.99</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>

			<li>
				<span class="cd-qty">2x</span> Product Name
				<div class="cd-price">$19.98</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>

			<li>
				<span class="cd-qty">1x</span> Product Name
				<div class="cd-price">$9.99</div>
				<a href="#0" class="cd-item-remove cd-img-replace">Remove</a>
			</li>
		</ul> <!-- cd-cart-items -->

		<div class="cd-cart-total">
			<p>Total <span>$39.96</span></p>
		</div> <!-- cd-cart-total -->

		<a href="#0" class="checkout-btn">Checkout</a>
		
		<p class="cd-go-to-cart"><a href="#0">Go to cart page</a></p>
	</div> <!-- cd-cart -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Gem jQuery -->
</body>
</html>