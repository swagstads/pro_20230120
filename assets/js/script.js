"use strict";
function removeClass() {
  document.getElementById("remove").classList.remove("hidden");
}
function addClass() {
  document.getElementById("remove").classList.add("hidden");
}

// function myFunction() {
//   const img = Math.trunc(Math.random() * 3) + 1;
//   document.getElementById("myImg").src = `king-${img}.jpg`;
// }

window.money = "<span class=money>${{amount}}</span>";
window.money_format = "<span class=money>${{amount}} USD</span>";
window.currency = "USD";
window.shop_money_format = "${{amount}}";
window.shop_money_with_currency_format = "${{amount}} USD";
// window.loading_url =
//   "cdn.shopify.com/s/files/1/1573/5553/t/43/assets/loadingfa7a.gif?v=47373580461733618591617237743";
window.file_url = "http://cdn.shopify.com/s/files/1/1573/5553/files/?9371";
window.asset_url =
  "http://cdn.shopify.com/s/files/1/1573/5553/t/43/assets/?9371";
window.ajaxcart_type = "drawer";
window.newsletter_success = "Thank you for your subscription";
window.cart_empty = "Your cart is currently empty.";
window.swatch_enable = true;
window.swatch_show_unvailable = false;
window.sidebar_multichoise = true;
window.float_header = true;
window.review = true;
window.currencies = false;
window.countdown_format =
  "<ul class='list-unstyle list-inline'><li><span class='number'>%D</span><span>Days</span></li><li><span class='number'>%H</span><span>Hours</span></li><li><span class='number'>%M</span><span>Mins</span></li><li><span class='number'>%S</span><span>Secs</span></li></ul>";
window.vela = window.vela || {};
vela.strings = {
  add_to_cart: "Add to Cart",
  sold_out: "Sold Out",
  vendor: "Vendor",
  sku: "SKU",
  availability: "Availability",
  available: "In stock",
  unavailable: "Out Of Stock",
};
