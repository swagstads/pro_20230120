jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var $L = 1200,
		$menu_navigation = $('#main-nav'),
		$cart_trigger = $('#cd-cart-trigger'),
		$hamburger_icon = $('#cd-hamburger-menu'),
		$lateral_cart = $('#cd-cart'),
		$shadow_layer = $('#cd-shadow-layer');

	//open lateral menu on mobile
	$hamburger_icon.on('click', function(event){
		event.preventDefault();
		//close cart panel (if it's open)
		$lateral_cart.removeClass('speed-in');
		toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
	});

	//open cart
	$cart_trigger.on('click', function(event){
		event.preventDefault();
		//close lateral menu (if it's open)
		$menu_navigation.removeClass('speed-in');
		toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
	});

	//close lateral cart or lateral menu
	$shadow_layer.on('click', function(){
		$shadow_layer.removeClass('is-visible');
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		if( $lateral_cart.hasClass('speed-in') ) {
			$lateral_cart.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$menu_navigation.removeClass('speed-in');
		} else {
			$menu_navigation.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				$('body').removeClass('overflow-hidden');
			});
			$lateral_cart.removeClass('speed-in');
		}
	});

	//move #main-navigation inside header on laptop
	//insert #main-navigation after header on mobile
	/*move_navigation( $menu_navigation, $L);
	$(window).on('resize', function(){
		move_navigation( $menu_navigation, $L);
		
		if( $(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
			$menu_navigation.removeClass('speed-in');
			$shadow_layer.removeClass('is-visible');
			$('body').removeClass('overflow-hidden');
		}

	});*/
});

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
	if( $lateral_panel.hasClass('speed-in') ) {
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		$lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.removeClass('overflow-hidden');
		});
		$background_layer.removeClass('is-visible');

	} else {
		$lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.addClass('overflow-hidden');
		});
		$background_layer.addClass('is-visible');
	}
}

function move_navigation( $navigation, $MQ) {
	if ( $(window).width() >= $MQ ) {
		$navigation.detach();
		$navigation.appendTo('header');
	} else {
		$navigation.detach();
		$navigation.insertAfter('header');
	}
}

//ASSIGNING IDS 
var cartItems = document.querySelectorAll('.cd-cart-item');
var ids = [];
var productqty = [];
for (let i = 0; i < cartItems.length; i++) {
  const id = cartItems[i].id;
	productqty.push(1);
  ids.push(id);
}
var productPrice = [];

//WORKING
//-------------------------


// QUANTITY ADD, SUBT

// Get all the quantity elements in the cart
var qtyInputs = document.querySelectorAll('.cd-quantity input[type="number"]');
var totalPrice = document.querySelector('.cd-cart-total span');
console.log("inputs: "); console.log(qtyInputs); console.log("tprice: "+totalPrice.textContent);
var quantity = 1;
var Tprice=parseFloat(totalPrice.textContent.replace('$', '')); console.log("before click Tprice: "+Tprice);
var price=0;
// Add a click event listener to each "+" and "-" button
qtyInputs.forEach(function(qtyInput) {
	const prices = document.querySelectorAll('.cd-cart-item .cd-price');
	prices.forEach(price => { 
		productPrice.push(parseFloat(price.textContent.replace('$', ''))); //console.log(price.textContent);
	});

	var plusBtn = qtyInput.nextElementSibling;
	var minusBtn = qtyInput.previousElementSibling;

	plusBtn.addEventListener('click', function() {
	// Get the product_id of the clicked product
		var productId = this.getAttribute('id');
		console.log("productID clicked: "+ productId);
		// Get the quantity of the clicked product
		var qtyInp = document.querySelector(`input[name='quantity'][data-id='${productId}']`);
		//Get the price of the clicked product 
		var product_idx = productId-1;
		price = productPrice[product_idx]; //   console.log(price);
		// Increment the quantity value by 1
		qtyInp = productqty[product_idx];
		if (qtyInp < 100) {
			var newQtyInp = qtyInp+1; 
			productqty[product_idx] = newQtyInp;
			console.log("updated qty array "+productqty);
			//qtyInput = quantity; //console.log(qtyInput + " of product id "+ productId);
			Tprice += price; //console.log(Tprice);
			totalPrice.textContent = `$${parseFloat(Tprice.toFixed(2))}`; // console.log(totalPrice);
			qtyInput.value = `${newQtyInp}`;
			console.log(newQtyInp);
		}
    });

	minusBtn.addEventListener('click', function() {
		// Decrement the quantity value by 1, but not below 1
		var productId = this.getAttribute('id');
		// console.log("productID clicked: "+ productId);
		var qtyInp = document.querySelector(`input[name='quantity'][data-id='${productId}']`);
		var product_idx = productId-1;
		price = productPrice[product_idx]; //   console.log(price);
		console.log("MINUS BTN");
		quantity = qtyInp.value;
		// var price = document.querySelector('.cd-price');
		if (parseInt(quantity) > 1) {
			// Decrement the quantity value by 1
				var newQtyInp = quantity-1;
				productqty[product_idx]= newQtyInp;
				Tprice = Tprice - price;
				console.log("Tprice: "+Tprice + " newQuantity " +  productqty);
				totalPrice.textContent = `$${parseFloat(Tprice.toFixed(2))}`;
				qtyInput.value = `${newQtyInp}`;
				console.log(newQtyInp);
				//qtyInput.textContent = `$${quantity}`;
		}
		else if(parseInt(qtyInput.value) < 1){
			//ideally, reducing the quantity less than 1 should remove the product
			quantity=1;
			qtyInput.value = quantity;
			qtyInput.value = `${quantity}`;
		} 
	});

});
