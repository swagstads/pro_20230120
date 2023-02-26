jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var $L = 1200,
		$menu_navigation = $('#main-nav'),
		$cart_trigger = $('#cd-cart-trigger'),
		$lateral_cart = $('#cd-cart'),
		$shadow_layer = $('#cd-shadow-layer');


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
function moveToCart (wishlist_id){
	event.preventDefault();
    let api_url_delete_from_cart = "./api/move_cart.php";
    var form_data = {"wishlist_id":wishlist_id};
    $.ajax({
        url: api_url_delete_from_cart,
        type: 'POST',
        data: form_data,
        success: function (returned_data) {
            console.log("yeah");
            var jsonData = JSON.parse(returned_data);
            console.log("yeah",returned_data);
            var return_data = jsonData.response;
            show_msg("Product Moved to Cart");
        }
    })
	wish_item = document.getElementById(wishlist_id);
	wish_item.remove();
	console.log($product_id);
	console.log($user_id);
	//Add AJAX
}

function removeWish(wishlist_id){
	event.preventDefault();
	console.log("Meh")
    let api_url_delete_from_cart = "./api/remove_wishlist.php";
    var form_data = {"wishlist_id":wishlist_id};
    $.ajax({
        url: api_url_delete_from_cart,
        type: 'POST',
        data: form_data,
        success: function (returned_data) {
            console.log("yeah");
            var jsonData = JSON.parse(returned_data);
            console.log("yeah",returned_data);
            var return_data = jsonData.response;
            show_msg("Product removed from Wishlist");
        }
    })
	wish_item = document.getElementById(wishlist_id);
	wish_item.remove();
	console.log($product_id);
	console.log($user_id);
	//Add AJAX
}
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

// QUANTITY ADD, SUBT

// Get all the quantity elements in the cart
//var qtyInputs = document.querySelectorAll('.cd-quantity input[type="number"]');
/*
// Add a click event listener to each "+" and "-" button
qtyInputs.forEach(function(qtyInput) {
  $id = qtyInput.id;
  console.log(qtyInput)
  var plusBtn = qtyInput.nextElementSibling;
  var minusBtn = qtyInput.previousElementSibling;

  plusBtn.addEventListener('click', function() {
	console.log($id);
    // Increment the quantity value by 1
    qtyInput.value = parseInt(qtyInput.value) + 1;
  });

  minusBtn.addEventListener('click', function() {
    // Decrement the quantity value by 1, but not below 1
    if (parseInt(qtyInput.value) > 1) {
	  console.log($id);
      qtyInput.value = parseInt(qtyInput.value) - 1;
    }
  });
});
*/