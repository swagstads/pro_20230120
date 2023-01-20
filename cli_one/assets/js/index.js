var Shopify = Shopify || {};
Shopify.shop = "vela-kazan.myshopify.com";
Shopify.locale = "en";
Shopify.currency = { active: "USD", rate: "1.0" };
Shopify.country = "US";
Shopify.theme = {
  name: "Furniture home01--new",
  id: 120192106561,
  theme_store_id: null,
  role: "main",
};
Shopify.theme.handle = "null";
Shopify.theme.style = { id: null, handle: null };
Shopify.cdnHost = "cdn.shopify.com";
Shopify.routes = Shopify.routes || {};
Shopify.routes.root = "index.html";

(function () {
  function asyncLoad() {
    var urls = [
      "//productreviews.shopifycdn.com/embed/loader.js?shop=vela-kazan.myshopify.com",
    ];
    for (var i = 0; i < urls.length; i++) {
      var s = document.createElement("script");
      s.type = "text/javascript";
      s.async = true;
      s.src = urls[i];
      var x = document.getElementsByTagName("script")[0];
      x.parentNode.insertBefore(s, x);
    }
  }
  if (window.attachEvent) {
    window.attachEvent("onload", asyncLoad);
  } else {
    window.addEventListener("load", asyncLoad, false);
  }
})();

window.ShopifyPaypalV4VisibilityTracking = true;
window.performance &&
  window.performance.mark &&
  window.performance.mark("shopify.content_for_header.end");

(function () {
  if ("sendBeacon" in navigator && "performance" in window) {
    var session_token = document.cookie.match(/_shopify_s=([^;]*)/);
    function handle_abandonment_event(e) {
      var entries = performance.getEntries().filter(function (entry) {
        return /monorail-edge.shopifysvc.com/.test(entry.name);
      });
      if (!window.abandonment_tracked && entries.length === 0) {
        window.abandonment_tracked = true;
        var currentMs = Date.now();
        var navigation_start = performance.timing.navigationStart;
        var payload = {
          shop_id: 15735553,
          url: window.location.href,
          navigation_start,
          duration: currentMs - navigation_start,
          session_token:
            session_token && session_token.length === 2 ? session_token[1] : "",
          page_type: "index",
        };
        window.navigator.sendBeacon(
          "https://monorail-edge.shopifysvc.com/v1/produce",
          JSON.stringify({
            schema_id: "online_store_buyer_site_abandonment/1.1",
            payload: payload,
            metadata: {
              event_created_at_ms: currentMs,
              event_sent_at_ms: currentMs,
            },
          })
        );
      }
    }
    window.addEventListener("pagehide", handle_abandonment_event);
  }
})();

if (window.currencies) {
  Currency.format = "money_format";
  var shopCurrency = window.currency;
  Currency.moneyFormats[shopCurrency].money_with_currency_format =
    window.shop_money_with_currency_format;
  Currency.moneyFormats[shopCurrency].money_format = window.shop_money_format;
  var defaultCurrency = "USD";
  var cookieCurrency = Currency.cookie.read();
  var velaCurrencies = $("[name=currencies]"),
    velaCurrencyItem = $(".jsvela-currency__item"),
    velaCurrencyCurrent = $(".jsvela-currency__current");
  $("span.money span.money").each(function () {
    $(this).parents("span.money").removeClass("money");
  });
  $("span.money").each(function () {
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
    velaCurrencyItem.each(function () {
      if ($(this).data("value") === cookieCurrency) $(this).addClass("active");
    });
  }
  $("body").on("click", ".jsvela-currency__item", function () {
    var newCurrency = $(this).data("value");
    velaCurrencies.data("value", newCurrency);
    velaCurrencyItem.removeClass("active");
    $(this).addClass("active");
    Currency.convertAll(Currency.currentCurrency, newCurrency);
    velaCurrencyCurrent.text(Currency.currentCurrency);
    return false;
  });
  var original_selectCallback = window.selectCallback;
  var selectCallback = function (variant, selector) {
    original_selectCallback(variant, selector);
    Currency.convertAll(shopCurrency, $("[name=currencies]").data("value"));
    velaCurrencyCurrent.text(Currency.currentCurrency);
  };
  $("body").on("ajaxCart.afterCartLoad", function (cart) {
    Currency.convertAll(shopCurrency, $("[name=currencies]").data("value"));
    velaCurrencyCurrent.text(Currency.currentCurrency);
  });
  velaCurrencyCurrent.text(Currency.currentCurrency);
}
