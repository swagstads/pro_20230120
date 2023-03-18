function replaceUrlParam(t, a, o) {
    var e = new RegExp("(" + a + "=).*?(&|$)"),
        n = t;
    return n = t.search(e) >= 0 ? t.replace(e, "$1" + o + "$2") : n + (n.indexOf("?") > 0 ? "&" : "?") + a + "=" + o
}
typeof Shopify == "undefined" && (Shopify = {}), Shopify.formatMoney || (Shopify.formatMoney = function(t, a) {
    var o = "",
        e = /\{\{\s*(\w+)\s*\}\}/,
        n = a || this.money_format;
    typeof t == "string" && (t = t.replace(".", ""));

    function r(s, l) {
        return typeof s == "undefined" ? l : s
    }

    function c(s, l, p, h) {
        if (l = r(l, 2), p = r(p, ","), h = r(h, "."), isNaN(s) || s == null) return 0;
        s = (s / 100).toFixed(l);
        var g = s.split("."),
            v = g[0].replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1" + p),
            y = g[1] ? h + g[1] : "";
        return v + y
    }
    switch (n.match(e)[1]) {
        case "amount":
            o = c(t, 2);
            break;
        case "amount_no_decimals":
            o = c(t, 0);
            break;
        case "amount_with_comma_separator":
            o = c(t, 2, ".", ",");
            break;
        case "amount_no_decimals_with_comma_separator":
            o = c(t, 0, ".", ",");
            break
    }
    return n.replace(e, o)
}), Shopify.optionsMap = {}, Shopify.updateOptionsInSelector = function(t) {
    switch (t) {
        case 0:
            var a = "root",
                o = jQuery(".single-option-selector:eq(0)");
            break;
        case 1:
            var a = jQuery(".single-option-selector:eq(0)").val(),
                o = jQuery(".single-option-selector:eq(1)");
            break;
        case 2:
            var a = jQuery(".single-option-selector:eq(0)").val();
            a += " / " + jQuery(".single-option-selector:eq(1)").val();
            var o = jQuery(".single-option-selector:eq(2)")
    }
    var e = o.val();
    o.empty();
    for (var n = Shopify.optionsMap[a], r = 0; r < n.length; r++) {
        var c = n[r],
            s = jQuery("<option></option>").val(c).html(c);
        o.append(s)
    }
    jQuery('.swatch[data-option-index="' + t + '"] .swatch-element').each(function() {
        jQuery.inArray($(this).attr("data-value"), n) !== -1 ? $(this).removeClass("soldout").show().find(":radio").removeAttr("disabled", "disabled").removeAttr("checked") : window.swatch_show_unvailable == !0 ? $(this).addClass("soldout").find(":radio").removeAttr("checked").attr("disabled", "disabled") : $(this).addClass("soldout").hide().find(":radio").removeAttr("checked").attr("disabled", "disabled")
    }), jQuery.inArray(e, n) !== -1 && o.val(e), o.trigger("change")
}, Shopify.linkOptionSelectors = function(t) {
    for (var a = 0; a < t.variants.length; a++) {
        var o = t.variants[a];
        if (o.available) {
            if (Shopify.optionsMap.root = Shopify.optionsMap.root || [], Shopify.optionsMap.root.push(o.option1), Shopify.optionsMap.root = Shopify.uniq(Shopify.optionsMap.root), t.options.length > 1) {
                var e = o.option1;
                Shopify.optionsMap[e] = Shopify.optionsMap[e] || [], Shopify.optionsMap[e].push(o.option2), Shopify.optionsMap[e] = Shopify.uniq(Shopify.optionsMap[e])
            }
            if (t.options.length === 3) {
                var e = o.option1 + " / " + o.option2;
                Shopify.optionsMap[e] = Shopify.optionsMap[e] || [], Shopify.optionsMap[e].push(o.option3), Shopify.optionsMap[e] = Shopify.uniq(Shopify.optionsMap[e])
            }
        }
    }
    Shopify.updateOptionsInSelector(0), t.options.length > 1 && Shopify.updateOptionsInSelector(1), t.options.length === 3 && Shopify.updateOptionsInSelector(2), jQuery(".single-option-selector:eq(0)").change(function() {
        return Shopify.updateOptionsInSelector(1), t.options.length === 3 && Shopify.updateOptionsInSelector(2), !0
    }), jQuery(".single-option-selector:eq(1)").change(function() {
        return t.options.length === 3 && Shopify.updateOptionsInSelector(2), !0
    })
}, window.vela = window.vela || {}, vela.cacheSelectors = function() {
    vela.cache = {
        $html: $("html"),
        $body: $("body"),
        $velaProductImage: $("#ProductPhotoImg"),
        $velaLoading: $("#loading"),
        $velaNewletterModal: $("#velaNewsletterModal")
    }
}, vela.init = function() {
    vela.cacheSelectors(), vela.preLoading(), vela.startTheme(), vela.drawersInit(), vela.swatchProduct(), vela.productThumbImage(), vela.ajaxSearch(), vela.ajaxFilter(), vela.accordion(), vela.responsiveVideos(), vela.floatHeader(), vela.menuMobile(), vela.productCountdown(), vela.owlOneCarousel(), vela.quickview(), vela.lookbook(), vela.flytocart(), vela.goToTop(), vela.newsletter(), vela.productLoadMore(), vela.velaAccountPage(), vela.velaBannerTop(), vela.filterByPrice(), vela.disclosure(), window.ajaxcart_type == "modal" && ajaxCart.load()
}, vela.flytocart = function() {
    function t(a, o) {
        var e = 3,
            n = $(a).clone();
        $(n).css({
            position: "absolute",
            top: $(a).offset().top + "px",
            left: $(a).offset().left + "px",
            opacity: 1,
            "z-index": 1e3
        }), $("body").append($(n));
        var r = $(o).offset().left + $(o).width() / 2 - $(a).width() / e / 2,
            c = $(o).offset().top + $(o).height() / 2 - $(a).height() / e / 2;
        $(n).animate({
            opacity: .4,
            left: r,
            top: c,
            width: $(a).width() / e,
            height: $(a).height() / e
        }, 700, function() {
            $(n).fadeOut("fast", function() {
                $(n).remove()
            })
        })
    }
    window.ajaxcart_type == "fly" && $(".formAddToCart button.btnAddToCart").on("click", function(a) {
        $("html, body").animate({
            scrollTop: $(".velaCartTop").position().top
        });
        var o = $(this).parents(".proFlyBlock").find(".imgFlyCart");
        t($(o), $(".velaCartTop"))
    })
}, vela.disclosure = function() {
    var t = $(".js-disclosure");
    t.each(function() {
        var a = $(this).find(".js-disclosure-item"),
            o = $(this).find(".js-disclosure-input");
        a.on("click", function(e) {
            e.preventDefault();
            var n = $(this).data("value");
            o.val(n), $(this).closest("form").submit()
        })
    })
}, vela.filterByPrice = function() {
    var t = $("#rangePrice"),
        a = $(".btnFilterPrice"),
        o = 0,
        e = 0;

    function n(r, c) {
        $("#loading").show(), $("#velaProList .rowFlexMargin .velaProBlock").hide().filter(function() {
            var s = $(this).data("price").toString().replace(/,/g, ""),
                l = parseInt(s, 10);
            return console.log("Min: " + r), console.log("Max: " + c), console.log("Price: " + l), l >= r && l <= c
        }).show(), $("body,html").animate({
            scrollTop: 400
        }, 600), setTimeout(function() {
            $("#loading").hide()
        }, 200)
    }
    // a.on("click", function() {
    //     o = t.data("from"), e = t.data("to"), n(o, e)
    // }), t.ionRangeSlider({
    //     onFinish: function(r) {}
    // })
}, vela.getHash = function() {
    return window.location.hash
}, vela.productPage = function(t) {
    var a = t.money_format,
        o = t.variant,
        e = t.selector,
        n = $("#AddToCart"),
        r = $("#ProductPrice"),
        c = $("#ComparePrice"),
        s = $(".qtySelector, .qtySelector + .velaQty"),
        l = $("#AddToCartText");
    if (o) {
        if (o.available ? (n.removeClass("disabled").prop("disabled", !1), l.html(vela.strings.add_to_cart), s.show()) : (n.addClass("disabled").prop("disabled", !0), l.html(vela.strings.sold_out), s.hide()), r.html(Shopify.formatMoney(o.price, a)), o.compare_at_price > o.price ? c.html(Shopify.formatMoney(o.compare_at_price, a)).show() : c.hide(), window.swatch_enable)
            for (var p = $("#" + e.domIdPrefix).closest("form"), h = 0, g = o.options.length; h < g; h++) p.find('.swatch[data-option-index="' + h + '"] :radio').each(function() {
                if (_.isEqual(o.options[h], $(this).val())) {
                    $(this).prop("checked", !0);
                    var C = p.find('.swatch[data-option-index="' + h + '"] .js-swatch-display');
                    C.text(o.options[h])
                }
            });
        var v = o.sku;
        o.sku == "" && (v = "N/A"), $(".productSKU").html("<label>" + vela.strings.sku + ":</label> " + v), o.available ? ($(".productAvailability").removeClass("outstock"), $(".productAvailability").addClass("instock"), $(".productAvailability").html("<label>" + vela.strings.availability + ":</label> " + vela.strings.available)) : ($(".productAvailability").removeClass("instock"), $(".productAvailability").addClass("outstock"), $(".productAvailability").html("<label>" + vela.strings.availability + ":</label> " + vela.strings.unavailable)), window.currencies && Currency.convertAll(window.currency, $(".jsvela-currency__item.active").data("value"), "span.money", "money_format")
    } else n.addClass("disabled").prop("disabled", !0), l.html(vela.strings.unavailable), s.hide();
    if (o && o.featured_media) {
        var y = o.featured_media.id,
            w, k = 0;
        $("#productThumbs .product-single__thumbnail").removeClass("active-thumb"), $("#productThumbs .product-single__thumbnail").each(function() {
            var C = $(this);
            if (w = C.data("imageid"), w === y) {
                var T = C.closest(".product-single__thumbnails-item");
                return k = T.data("slick-index") ? T.data("slick-index") : 0, C.addClass("active-thumb"), $("#ProductPhotoImg").attr("src", C.data("image")).attr("data-zoom-image", C.data("zoom-image")), C.trigger("click"), !1
            }
        }), k != "undefined" && $("#productThumbs .product-single__thumbnails").slick("slickGoTo", k)
    }
}, vela.preLoading = function() {
    var t = 0,
        a = $("#velaPreLoading"),
        o = $("#velaPreLoading > span"),
        e = new Array;
    a.css({
        position: "fixed",
        top: 0,
        left: 0,
        zIndex: 99999,
        width: "100%",
        height: "100%",
        backgroundColor: "rgba(255, 255, 255, 1)"
    }), $("body").removeClass("bodyPreLoading");

    function n(l) {
        $(l).find("*:not(script)").each(function() {
            var p = "";
            if ($(this).css("background-image").indexOf("none") == -1 && $(this).css("background-image").indexOf("-gradient") == -1) {
                if (p = $(this).css("background-image"), p.indexOf("url") != -1) {
                    var h = p.match(/url\((.*?)\)/);
                    p = h[1].replace(/\"/g, "")
                }
            } else $(this).get(0).nodeName.toLowerCase() == "img" && typeof $(this).attr("src") != "undefined" && (p = $(this).attr("src"));
            p.length > 0 && e.push(p)
        })
    }

    function r(l) {
        var p = new Image;
        $(p).load(function() {
            s()
        }).error(function() {
            s()
        }).attr("src", l)
    }

    function c() {
        for (var l = 0; l < e.length; l++) r(e[l])
    }

    function s() {
        t++;
        var l = Math.round(t / e.length * 100);
        $(o).stop().animate({
            width: l + "%"
        }, 500, "linear"), t >= e.length && (t = e.length, $(o).stop().animate({
            width: "100%"
        }, 500, "linear", function() {
            $(a).fadeOut(200, function() {
                $(a).remove()
            })
        }))
    }
    n($("body")), c()
}, vela.startTheme = function() {
    $(".swatch :radio").change(function() {
        var t = $(this).closest(".swatch").attr("data-option-index"),
            a = $(this).val();
        $(this).closest("form").find(".single-option-selector").eq(t).val(a).trigger("change")
    }), $(".headerCartModal .overlayCart, .headerCartModal .closeCartModal").on("click", function() {
        $(".headerCartModal").removeClass("active")
    }), $("body").on("click", ".velaCartModal", function() {
        $(this).parent().toggleClass("active")
    }), $("body").click(function(t) {
        var a = $(t.target);
        a.parents(".velaCartTop").length === 0 && $(".velaCartTop").removeClass("active")
    }), $('[data-toggle="tooltip"]').tooltip(), $(".googleOverPlay").on("click", function() {
        $(this).fadeOut()
    }), $(".velaGoogleMap").on("mouseleave", function() {
        $(this).find(".googleOverPlay").fadeIn()
    })
}, vela.drawersInit = function() {
    vela.RightDrawer = new vela.Drawers("cartDrawer", "Right", !0, {
        onDrawerOpen: ajaxCart.load
    })
}, vela.swatchProduct = function() {
    $(".velaSwatchProduct > li").each(function() {
        var t = $(this).parents(".velaProBlock").find(".proSwatch .product-card__image > img"),
            a = t.attr("src");
        $(this).mouseover(function() {
            var o = $(this).find(".hidden a").attr("href");
            o != "#" && t.attr({
                src: o,
                srcset: ""
            })
        }), $(this).mouseout(function() {
            var o = t.data("srcset");
            t.attr({
                srcset: o
            }), t.removeAttr("src")
        })
    })
}, vela.productThumbImage = function() {
    $("#productThumbs").length > 0 && $("#productThumbs .owl-carousel").each(function() {
        var t = $(this),
            a = t.data("item");
        (a === void 0 || a == null) && (a = 5);
        var o = t.data("vertical");
        (o === void 0 || o == null) && (o = !1);
        var e = a;
        o && (e = 4);
        var n = {
            slidesToShow: a,
            slidesToScroll: 1,
            dots: !1,
            mouseDrag: !1,
            nav: !0,
            centerMode: !1,
            adaptiveHeight: !0,
            rows: 1,
            infinite: !1,
            vertical: o,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: e
                }
            }, {
                breakpoint: 992,
                settings: {
                    slidesToShow: a,
                    slidesToScroll: a
                }
            }, {
                breakpoint: 1200,
                settings: {
                    slidesToShow: e
                }
            }, {
                breakpoint: 1400,
                settings: {
                    slidesToShow: e
                }
            }]
        };
        t.slick(n)
    })
}, vela.ajaxSearch = function() {
    var t = null,
        a = $('form[action="/search"]').each(function() {
            var o = $(this).find('input[name="q"]'),
                e = $(this).find('input[name="type"]'),
                n = o.position().top + o.innerHeight();
            $('<ul class="velaAjaxSearch"></ul>').appendTo($(this)).hide(), e.val() == "product" && o.attr("autocomplete", "off").bind("keyup change", function() {
                var r = $(this).val(),
                    c = $(this).closest("form"),
                    s = "/search?type=product&q=" + r,
                    l = c.find(".velaAjaxSearch");
                r.length > 1 && r != $(this).attr("data-old-term") && ($(this).attr("data-old-term", r), t != null && t.abort(), t = $.getJSON(s + "&view=json", function(p) {
                    l.empty(), p.results_count == 0 ? l.hide() : ($.each(p.results, function(h, g) {
                        var v = $("<a></a>").attr("href", g.url);
                        v.append('<div class="searchProductImage"><img src="' + g.thumbnail + '" /></div>'), v.append('<div class="searchContent"><span class="searchProductTitle">' + g.title + '</span><span class="searchPrice">' + g.price + "</span></div>"), v.wrap("<li></li>"), l.append(v.parent())
                    }), p.results_count > 10 && l.append('<li><a class="searchViewAll" href="' + s + '">See all results (' + p.results_count + ")</a></li>"), l.fadeIn(200))
                }))
            })
        });
    $("body").bind("click", function() {
        $(".velaAjaxSearch").hide()
    }), $(".searchBoxTop").hover(function() {
        $(".velaSearchbox .velaSearch").focus()
    }), vela.cache.$body.on("click", ".velaSearchIcon", function() {
        $(".searchBoxTop").toggleClass("active"), $(".searchClose").toggleClass("active"), $(".searchOverLayer").toggleClass("active")
    }), vela.cache.$body.on("click", ".searchClose, .searchOverLayer", function() {
        var o = $(this).hasClass("active");
        o && ($(".searchBoxTop").removeClass("active"), $(".searchClose").removeClass("active"), $(".searchOverLayer").removeClass("active"))
    })
}, vela.ajaxFilter = function() {
    var t = $(".filterTagFullwidthButton"),
        a = $(".filterTagFullwidthContent");
    vela.cache.$body.on("click", ".filterTagFullwidthButton", function() {
        a.hasClass("active") ? (t.removeClass("active"), a.removeClass("active"), $(".filterTagFullwidthOverlay").each(function() {
            $(this).remove()
        })) : ($('<div class="filterTagFullwidthOverlay"></div>').css("display", "none").insertAfter(a), $(".filterTagFullwidthOverlay").fadeIn(300), t.addClass("active"), a.addClass("active"))
    }), vela.cache.$body.on("click", ".filterTagFullwidthOverlay, .filterTagFullwidthClose", function() {
        $(".filterTagFullwidthOverlay").each(function() {
            $(this).remove()
        }), t.removeClass("active"), a.removeClass("active")
    });
    var o = !1;
    $(".template-collection") && History.Adapter.bind(window, "statechange", function() {
        var e = History.getState();
        if (!o) {
            ajaxFilterParams();
            var n = ajaxFilterCreateUrl();
            ajaxFilterGetContent(n), reActivateSidebar()
        }
        vela.isSidebarAjaxClick = !1
    }), ajaxFilterParams = function() {
        if (Shopify.queryParams = {}, location.search.length)
            for (var e, n = 0, r = location.search.substr(1).split("&"); n < r.length; n++) e = r[n].split("="), e.length > 1 && (Shopify.queryParams[decodeURIComponent(e[0])] = decodeURIComponent(e[1]))
    }, ajaxFilterCreateUrl = function(e) {
        var n = $.param(Shopify.queryParams).replace(/%2B/g, "+");
        return e ? n != "" ? e + "?" + n : e : location.pathname + "?" + n
    }, ajaxFilterClick = function(e) {
        delete Shopify.queryParams.page;
        var n = ajaxFilterCreateUrl(e);
        o = !0, History.pushState({
            param: Shopify.queryParams
        }, n, n), ajaxFilterGetContent(n)
    }, ajaxFilterSortby = function() {
        if (Shopify.queryParams.sort_by) {
            var e = Shopify.queryParams.sort_by;
            $("#SortBy").val(e)
        }
        vela.cache.$body.on("change", "#SortBy", function(n) {
            Shopify.queryParams.sort_by = $(this).val(), ajaxFilterClick()
        })
    }, ajaxFilterView = function() {
        vela.cache.$body.on("click", ".changeView", function(e) {
            e.preventDefault(), $(this).hasClass("changeViewActive") || (Shopify.queryParams.view = $(this).data("view"), $(".changeView").removeClass("changeViewActive"), $(this).addClass("changeViewActive"), ajaxFilterClick())
        })
    }, ajaxFilterTags = function() {
        vela.cache.$body.on("click", ".ajaxFilter li > a", function(e) {
            e.preventDefault();
            var n = [];
            if (Shopify.queryParams.constraint && (n = Shopify.queryParams.constraint.split("+")), !window.sidebar_multichoise && !$(this).parent().hasClass("active")) {
                var r = $(this).parents(".listFilter").find("li.active");
                if (r.length > 0) {
                    var c = r.data("filter");
                    if (c) {
                        var s = n.indexOf(c);
                        s >= 0 && n.splice(s, 1)
                    }
                }
            }
            var l = $(this).parent().data("filter");
            if (l) {
                var s = n.indexOf(l);
                s >= 0 ? n.splice(s, 1) : n.push(l)
            }
            n.length ? Shopify.queryParams.constraint = n.join("+") : delete Shopify.queryParams.constraint, ajaxFilterClick()
        })
    }, ajaxFilterPaging = function() {
        vela.cache.$body.on("click", "#collPagination .pagination a", function(e) {
            e.preventDefault();
            var n = $(this).attr("href").match(/page=\d+/g);
            if (n && (Shopify.queryParams.page = parseInt(n[0].match(/\d+/g)), Shopify.queryParams.page)) {
                var r = ajaxFilterCreateUrl();
                o = !0, History.pushState({
                    param: Shopify.queryParams
                }, r, r), ajaxFilterGetContent(r), $("body,html").animate({
                    scrollTop: 300
                }, 600)
            }
        })
    }, ajaxFilterReview = function() {
        if (window.review && $(".shopify-product-reviews-badge").length > 0) return window.SPR.registerCallbacks(), window.SPR.initRatingHandler(), window.SPR.initDomEls(), window.SPR.loadProducts(), window.SPR.loadBadges()
    }, ajaxFilterClear = function() {
        $(".ajaxFilter").each(function() {
            var e = $(this);
            e.find(".listFilter > li.active").length > 0 && e.find(".velaClear").show().click(function(n) {
                var r = [];
                Shopify.queryParams.constraint && (r = Shopify.queryParams.constraint.split("+")), e.find(".listFilter > li.active").each(function() {
                    var c = $(this),
                        s = c.data("filter");
                    if (s) {
                        var l = r.indexOf(s);
                        l >= 0 && r.splice(l, 1)
                    }
                }), r.length ? Shopify.queryParams.constraint = r.join("+") : delete Shopify.queryParams.constraint, ajaxFilterClick(), n.preventDefault()
            })
        })
    }, ajaxFilterClearAll = function() {
        vela.cache.$body.on("click", "a.velaClearAll", function(e) {
            delete Shopify.queryParams.constraint, delete Shopify.queryParams.q, ajaxFilterClick(), e.preventDefault()
        })
    }, ajaxFilterAddToCart = function() {
        window.ajaxcart_type != "page" && ajaxCart.init({
            formSelector: ".formAddToCart",
            cartContainer: "#cartContainer",
            addToCartSelector: ".btnAddToCart",
            cartCountSelector: "#CartCount",
            cartCostSelector: "#CartCost",
            moneyFormat: null
        })
    }, ajaxAccordionMobile = function() {
        $(".velaSidebar").hasClass("accordion") && $("#sidebarAjaxFilter .titleSidebar").on("click", function(e) {
            $(this).toggleClass("active").parent().find(".velaContent").stop().slideToggle("medium"), e.preventDefault()
        })
    }, ajaxFilterData = function(e) {
        var n = $("#proListCollection .proList"),
            r = $(e).find("#proListCollection .proList");
        n.replaceWith(r), $("#collPagination").length > 0 ? $("#collPagination").replaceWith($(e).find("#collPagination")) : $("#shopify-section-vela-template-collection").append($(e).find("#collPagination"));
        var c = $("#sidebarAjaxFilter"),
            s = $(e).find("#sidebarAjaxFilter");
        c.replaceWith(s)
    }, ajaxFilterGetContent = function(e) {
        $.ajax({
            type: "get",
            url: e,
            beforeSend: function() {
                vela.cache.$velaLoading.show()
            },
            success: function(n) {
                var r = $(n).filter("title").text();
                document.title = r, ajaxFilterData(n), ajaxFilterSortby(), ajaxFilterReview(), ajaxFilterClear(), ajaxFilterAddToCart(), ajaxAccordionMobile(), vela.flytocart(), vela.cache.$velaLoading.hide(), vela.swatchProduct()
            },
            error: function(n, r) {
                vela.cache.$velaLoading.hide()
            }
        })
    }, ajaxFilterParams(), ajaxFilterSortby(), ajaxFilterView(), ajaxFilterTags(), ajaxFilterPaging(), ajaxFilterClear(), ajaxFilterClearAll()
}, vela.accordion = function() {
    function t() {
        $(window).width() <= 767 ? $(".velaBlogSidebar").hasClass("accordion") || ($(".velaBlogSidebar .titleSidebar").on("click", function(o) {
            $(this).toggleClass("active").parent().find(".velaContent").stop().slideToggle("medium"), o.preventDefault()
        }), $(".velaBlogSidebar").addClass("accordion").find(".velaContent").slideUp("fast")) : ($(".velaBlogSidebar .titleSidebar").removeClass("active").off().parent().find(".velaContent").removeAttr("style").slideDown("fast"), $(".velaBlogSidebar").removeClass("accordion"))
    }

    function a() {
        $(window).width() <= 767 ? $(".velaFooterMenu").hasClass("accordion") || ($(".velaFooterMenu .velaFooterTitle").on("click", function(o) {
            $(this).toggleClass("active").parent().find(".velaContent").stop().slideToggle("medium"), o.preventDefault()
        }), $(".velaFooterMenu").addClass("accordion").find(".velaContent").slideUp("fast")) : ($(".velaFooterMenu .velaFooterTitle").removeClass("active").off().parent().find(".velaContent").removeAttr("style").slideDown("fast"), $(".velaFooterMenu").removeClass("accordion"))
    }
    t(), a(), $(window).resize(t), $(window).resize(a)
}, vela.responsiveVideos = function() {
    var t = $('.proDetailInfo iframe[src*="youtube.com/embed"], .proDetailInfo iframe[src*="player.vimeo"]'),
        a = t.add("iframe#admin_bar_iframe");
    t.each(function() {
        $(this).wrap('<div class="videoContainer"></div>')
    }), a.each(function() {
        this.src = this.src
    })
}, vela.floatHeader = function() {
    function t(e) {
        if (e) {
            $("#velaHeader").addClass("headerFixed");
            var n = $("#velaHeader").height() + 120,
                r = $(window).scrollTop(),
                c = $("#velaHeader").height();
            $(".velaBreadcrumbWrap").css("padding-top", c), r >= n ? $(".headerMenu").addClass("velaHeaderFixed") : $(".headerMenu").removeClass("velaHeaderFixed")
        } else $("#velaHeader").removeClass("headerFixed"), $(".headerMenu").removeClass("velaHeaderFixed")
    }

    function a() {
        window.float_header && ($(window).width() >= 992 ? t(!0) : $(window).width() <= 991 && t(!1))
    }

    function o() {
        if (window.float_header)
            if ($(window).width() >= 992) {
                var e = $("#velaHeader").height() + 120,
                    n = $(window).scrollTop();
                n >= e ? $(".headerMenu").addClass("velaHeaderFixed") : $(".headerMenu").removeClass("velaHeaderFixed")
            } else $(window).width() <= 991 && $("#velaMegamenu").removeClass("velaHeaderFixed")
    }
    a(), $(window).resize(a), $(window).scroll(o)
}, vela.menuMobile = function() {
    vela.cache.$body.on("click", "#btnMenuMobile", function(t) {
        t.preventDefault(), $("body").toggleClass("menuMobileActive")
    }), vela.cache.$body.on("click", ".btnMenuClose, .menuMobileOverlay", function(t) {
        t.preventDefault(), $("body").removeClass("menuMobileActive")
    })
}, vela.productCountdown = function() {
    $("[data-countdown]").each(function() {
        var t = $(this),
            a = $(this).data("countdown");
        t.countdown(a, function(o) {
            t.html(o.strftime(window.countdown_format))
        })
    })
}, vela.owlOneCarousel = function() {
    $(".owlCarouselPlay .owl-carousel").each(function() {
        var t = $(this),
            a = t.data("nav"),
            o = t.data("navText"),
            e = t.data("dots"),
            n = t.data("autoplay"),
            r = t.data("autoplaytimeout"),
            c = t.data("loop"),
            s = t.data("margin"),
            l = t.data("center"),
            p = t.data("columnone"),
            h = t.data("columntwo"),
            g = t.data("columnthree"),
            v = t.data("columnfour"),
            y = t.data("columnfive");
        (s === void 0 || s == null) && (s = 20);
        var w = {
            margin: s,
            nav: a,
            responsive: {
                0: {
                    items: y
                },
                480: {
                    items: v
                },
                768: {
                    items: g
                },
                992: {
                    items: h
                },
                1200: {
                    items: p
                }
            }
        };
        e === void 0 || e == null || e.length <= 0 || e != !0 ? w.dots = !1 : w.dots = !0, o === void 0 || o == null || o.length <= 0 || (w.navText = o), c === void 0 || c == null || c.length <= 0 || (w.loop = c), l === void 0 || l == null || c.center <= 0 || (w.center = l), n && (w.autoplay = n, w.autoplayTimeout = r, w.autoplayHoverPause = !0), p != null && t.owlCarousel(w)
    })
}, vela.lookbook = function() {
    vela.cache.$body.on("click", ".lookbItemButton", function() {
        var t = $(this).parents(".velaBoxLookbook"),
            a = $(this).closest(".lookbItem"),
            o = a.find(".lookbItemContent");
        t.hasClass("active") ? (t.removeClass("active"), $(".velaBoxLookbookOverlay").remove(), $(".velaBoxLookbookClose").remove()) : (t.addClass("active"), a.prepend('<div class="velaBoxLookbookOverlay"></div>'), o.prepend('<div class="velaBoxLookbookClose"></div>'), o.fadeIn(500))
    }), vela.cache.$body.on("click", ".velaBoxLookbookOverlay, .velaBoxLookbookClose", function() {
        $(".velaBoxLookbook").removeClass("active"), $(".velaBoxLookbookOverlay").remove(), $(".velaBoxLookbookClose").remove(), $(".lookbItemContent").fadeOut(500)
    })
}, vela.quickview = function() {
    var t = {},
        a = "",
        o = "";
    Shopify.doNotTriggerClickOnThumb = !1, selectCallbackQuickView = function(e, n) {
        var r = jQuery(".jsQuickview .proBoxInfo"),
            c = r.find(".btnAddToCart"),
            s = r.find(".proQuantity"),
            l = r.find(".pricePrimary"),
            p = r.find(".priceCompare");
        if (e) {
            if (e.sku == "") var h = "N/A";
            else var h = e.sku;
            if (r.find(".quickViewSKU").html("<label>" + vela.strings.sku + ":</label> " + h), e.available ? (c.removeClass("disabled").removeAttr("disabled"), c.html(vela.strings.add_to_cart), s.show(), r.find(".proBoxInfo .quickviewAvailability").removeClass("outstock").addClass("instock"), r.find(".proBoxInfo .quickviewAvailability").append("<label>" + vela.strings.availability + "</label> " + vela.strings.available)) : (c.addClass("disabled").attr("disabled", "disabled"), c.html(vela.strings.sold_out), s.hide(), r.find(".proBoxInfo .quickviewAvailability").removeClass("instock").addClass("outstock"), r.find(".proBoxInfo .quickviewAvailability").append("<label>" + vela.strings.availability + "</label> " + vela.strings.unavailable)), l.html(Shopify.formatMoney(e.price, window.money)), e.compare_at_price > e.price ? p.html(Shopify.formatMoney(e.compare_at_price, window.money)).show() : p.hide(), window.swatch_enable) {
                r.find(".selector-wrapper").addClass("hiddenVariant");
                for (var g = jQuery("#" + n.domIdPrefix).closest("form"), v = 0, y = e.options.length; v < y; v++) g.find('.swatch[data-option-index="' + v + '"] .js-qv-variant-value').each(function() {
                    if (_.isEqual(e.options[v], $(this).text())) {
                        $(this).next("input[type=radio]").prop("checked", !0);
                        var F = g.find('.swatch[data-option-index="' + v + '"] .js-swatch-display');
                        F.text(e.options[v])
                    }
                })
            }
            if (e && e.featured_image) {
                var w = $(".proImageQuickview"),
                    k = e.featured_image,
                    C = e.featured_media,
                    T = w[0];
                Shopify.Image.switchImage(k, T, function(F, A, j) {
                    $(".proThumbnails img").each(function() {
                        var L = $(this).parent(),
                            I = $(this).parent().data("imageid");
                        if (I == C.id) {
                            $(this).parent().trigger("click");
                            var O = $(this).parent().data("index"),
                                V = ".proThumbnailsQuickview .owl-carousel";
                            return $(V).trigger("to.owl.carousel", [O, [300], !0]), !1
                        }
                    })
                })
            }
            window.currencies && Currency.convertAll(window.currency, Currency.cookie.read())
        } else c.addClass("disabled").attr("disabled", "disabled"), c.html(vela.strings.unavailable), s.hide()
    }, changeImageQuickView = function(e, n) {
        var r = $(e).attr("src");
        r = r.replace("_compact", ""), $(n).attr("src", r)
    }, velaUpdateOptionsInSelector = function(e) {
        switch (e) {
            case 0:
                var n = "root",
                    r = $(".jsQuickview .single-option-selector:eq(0)");
                break;
            case 1:
                var n = $(".jsQuickview .single-option-selector:eq(0)").val(),
                    r = $(".jsQuickview .single-option-selector:eq(1)");
                break;
            case 2:
                var n = $(".jsQuickview .single-option-selector:eq(0)").val();
                n += " / " + $(".jsQuickview .single-option-selector:eq(1)").val();
                var r = $(".jsQuickview .single-option-selector:eq(2)")
        }
        var c = r.val();
        r.empty();
        var s = Shopify.optionsMapQuickview[n];
        if (typeof s != "undefined")
            for (var l = 0; l < s.length; l++) {
                var p = s[l],
                    h = $("<option></option>").val(p).html(p);
                r.append(h)
            }
        $('.jsQuickview .swatch[data-option-index="' + e + '"] .swatch-element').each(function() {
            var g = $(this).find(".js-qv-variant-value").text();
            $.inArray(g, s) !== -1 ? $(this).removeClass("soldout").show().find(":radio").removeAttr("disabled", "disabled") : window.swatch_show_unvailable == !0 ? $(this).addClass("soldout").find(":radio").removeAttr("checked").attr('disabled", "disabled') : $(this).addClass("soldout").hide().find(":radio").removeAttr("checked").attr("disabled", "disabled")
        }), $.inArray(c, s) !== -1 && r.val(c), r.trigger("change")
    }, velaLinkOptionSelectors = function(e) {
        for (var n = 0; n < e.variants.length; n++) {
            var r = e.variants[n];
            if (r.available) {
                if (Shopify.optionsMapQuickview.root = Shopify.optionsMapQuickview.root || [], Shopify.optionsMapQuickview.root.push(r.option1), Shopify.optionsMapQuickview.root = Shopify.uniq(Shopify.optionsMapQuickview.root), e.options.length > 1) {
                    var c = r.option1;
                    Shopify.optionsMapQuickview[c] = Shopify.optionsMapQuickview[c] || [], Shopify.optionsMapQuickview[c].push(r.option2), Shopify.optionsMapQuickview[c] = Shopify.uniq(Shopify.optionsMapQuickview[c])
                }
                if (e.options.length === 3) {
                    var c = r.option1 + " / " + r.option2;
                    Shopify.optionsMapQuickview[c] = Shopify.optionsMapQuickview[c] || [], Shopify.optionsMapQuickview[c].push(r.option3), Shopify.optionsMapQuickview[c] = Shopify.uniq(Shopify.optionsMapQuickview[c])
                }
            }
        }
        velaUpdateOptionsInSelector(0), e.options.length > 1 && velaUpdateOptionsInSelector(1), e.options.length === 3 && velaUpdateOptionsInSelector(2), $("#productSelectQuickview-option-0").change(function() {
            return velaUpdateOptionsInSelector(1), e.options.length === 3 && velaUpdateOptionsInSelector(2), !0
        }), $("#productSelectQuickview-option-1").change(function() {
            return e.options.length === 3 && velaUpdateOptionsInSelector(2), !0
        })
    }, loadQuickViewSlider = function(e, n) {
        var r = $(".loadingImage"),
            c = Shopify.resizeImage(e.featured_image, "grande");
        r.hide();
        var s = "";
        if (e.media.length > 0) {
            var l = n.find(".proThumbnailsQuickview .owl-carousel");
            for (i in e.media) {
                i == 0 ? s = "active" : s = "";
                var p = '<div class="thumbItem"><a href="javascript:void(0)" class="' + s + '"  data-index="' + i + '" data-imageid="' + e.media[i].id + '" data-image="' + e.media[i].preview_image.src + '" data-zoom-image="' + e.media[i].preview_image.src + '" ><img src="' + e.media[i].preview_image.src + '" alt="' + e.media[i].preview_image.alt + '" /></a></div>';
                l.append(p)
            }
            l.find("a").click(function() {
                var h = n.find(".proImageQuickview");
                if (h.attr("src") != $(this).attr("data-image")) {
                    for (i in e.media) l.find("a").hasClass("active") && l.find("a").removeClass("active");
                    h.attr("src", $(this).attr("data-image")), $(this).addClass("active"), r.show(), h.load(function(g) {
                        $(this).unbind("load"), r.hide()
                    })
                }
            }), l.owlCarousel({
                items: 4,
                nav: !0,
                mouseDrag: !1,
                dots: !1
            }).css("visibility", "visible")
        } else n.find(".jsQuickview .proThumbnailsQuickview").remove()
    }, convertToSlug = function(e) {
        return e.toLowerCase().replace(/[^a-z0-9 -]/g, "").replace(/\s+/g, "-").replace(/-+/g, "-")
    }, addCheckedSwatch = function() {
        vela.cache.$body.on("click", ".swatch .color label", function() {
            $(".swatch .color").each(function() {
                $(this).find("label").removeClass("checkedBox")
            }), $(this).addClass("checkedBox")
        })
    }, quickViewVariants = function(e, n) {
        if (e.variants.length > 1) {
            for (var r = 0; r < e.variants.length; r++) {
                var c = e.variants[r],
                    s = '<option value="' + c.id + '">' + c.title + "</option>";
                n.find("form.formQuickview .proVariantsQuickview > select").append(s)
            }
            if (new Shopify.OptionSelectors("productSelectQuickview", {
                    product: e,
                    onVariantSelected: selectCallbackQuickView
                }), e.options.length == 1 && $("form.formQuickview .selector-wrapper:eq(0)").prepend("<label>" + e.options[0].name + "</label>"), n.find("form.formQuickview .selector-wrapper label").each(function(A, j) {
                    $(this).html(e.options[A].name)
                }), window.swatch_enable) {
                for (var l = window.file_url.substring(0, window.file_url.lastIndexOf("?")), p = window.asset_url.substring(0, window.asset_url.lastIndexOf("?")), h = "", r = 0; r < e.options.length; r++) {
                    h += '<div class="swatch clearfix" data-option-index="' + r + '">', h += '<div class="header">' + e.options[r].name + ": <span class='js-swatch-display text'>&nbsp;</span></div>";
                    var g = !1;
                    /Color|Colour/i.test(e.options[r].name) && (g = !0);
                    for (var v = new Array, y = 0; y < e.variants.length; y++) {
                        var c = e.variants[y],
                            w = c.options[r],
                            k = this.convertToSlug(w),
                            C = "quickview-swatch-" + r + "-" + k;
                        if (v.indexOf(w) < 0) {
                            var T = l + k + ".png";
                            c.featured_image && (T = c.featured_image.src), h += '<div data-value="' + w + '" class="swatch-element ' + (g ? "color " : "") + k + (c.available ? " available " : " soldout ") + '">', g && (h += '<div class="tooltip">' + w + "</div>"), h += '<span class="js-qv-variant-value hidden">' + w + "</span>", h += '<input id="' + C + '" type="radio" name="option-' + r + '" value="' + w + '" ' + (y == 0 ? " checked " : "") + (c.available ? "" : " disabled") + " />", g ? h += '<label class="' + k + '" for="' + C + '" style="background-color: ' + k + "; background-image: url(" + T + '.png)"><img class="crossed-out" src="' + p + 'soldout.png" /><i></i></label>' : h += '<label class="' + k + '" for="' + C + '">' + w + '<img class="crossed-out" src="' + p + 'soldout.png" /></label>', h += "</div>", c.available && $('.jsQuickview .swatch[data-option-index="' + r + '"] .' + k).removeClass("soldout").addClass("available").find(":radio").removeAttr("disabled"), v.push(w)
                        }
                    }
                    h += "</div>"
                }
                n.find("form.formQuickview .proVariantsQuickview > select").after(h), n.find(".swatch :radio").change(function() {
                    var A = $(this).closest(".swatch").attr("data-option-index"),
                        j = $(this).prev(".js-qv-variant-value").text();
                    $(this).closest("form").find(".single-option-selector").eq(A).val(j).trigger("change")
                }), addCheckedSwatch()
            }
            e.available && (Shopify.optionsMapQuickview = {}, window.swatch_show_unvailable ? window.swatch_enable && velaLinkOptionSelectors(e) : velaLinkOptionSelectors(e))
        } else {
            n.find("form.formQuickview .proVariantsQuickview > select").remove();
            var F = '<input type="hidden" name="id" value="' + e.variants[0].id + '">';
            n.find("form.formQuickview").append(F)
        }
    }, validateQty = function(e) {
        return parseFloat(e) == parseInt(e) && !isNaN(e) || (e = 1), e
    }, qvAddToCart = function() {
        window.ajaxcart_type != "page" && ajaxCart.init({
            formSelector: ".formQuickview",
            cartContainer: "#cartContainer",
            addToCartSelector: ".btnAddToCart",
            cartCountSelector: "#CartCount",
            cartCostSelector: "#CartCost",
            moneyFormat: null
        })
    }, $(document).on("click", ".proThumbnailsQuickview li", function() {
        changeImageQuickView($(this).find("img:first-child"), ".proImageQuickview")
    }), $(document).on("click", ".quickviewClose, .quickviewOverlay", function(e) {
        $("#velaQuickView").fadeOut(0), $(".jsQuickview").html(""), $(".jsQuickview").removeClass("velaFadeOut")
    }), $(document).on("click", ".btnProductQuickview", function(e) {
        vela.cache.$velaLoading.show();
        var n = $(this).data("handle");
        return Shopify.getProduct(n, function(r) {
            var c = $("#quickviewModal").html();
            $(".jsQuickview").html(c);
            var s = $(".jsQuickview"),
                l = r.description.replace(/(<([^>]+)>)/ig, ""),
                p = "",
                h = r.media[0].preview_image.src;
            if (r.description.indexOf("[SHORTDESCRIPTION]") != -1 ? (p = r.description.split("[SHORTDESCRIPTION]")[0], s.find(".proShortDescription").html(p)) : (p = l.split(" ").splice(0, 30).join(" ") + "...", s.find(".proShortDescription").text(p)), s.find(".proImageQuickview").attr("src", h), s.find(".proImage").attr("href", r.url), s.find(".pricePrimary").html(Shopify.formatMoney(r.price, window.money)), s.find(".proBoxInfo").attr("id", "product-" + r.id), s.find(".formQuickview").attr("id", "product-actions-" + r.id), s.find(".formQuickview select").attr("id", "productSelectQuickview"), s.find(".proBoxInfo .quickviewName").html("<a href='" + r.url + "'>" + r.title + "</a>"), s.find(".proBoxInfo .quickViewVendor").append("<label>" + vela.strings.vendor + ":</label> " + r.vendor), r.variants[0].sku == "") var g = "N/A";
            else var g = r.variants[0].sku;
            s.find(".proBoxInfo .quickViewSKU").append("<label>" + vela.strings.sku + ":</label> " + g), r.available ? (s.find(".proBoxInfo .quickviewAvailability").removeClass("outstock").addClass("instock"), s.find(".proBoxInfo .quickviewAvailability").append("<label>" + vela.strings.availability + ":</label> " + vela.strings.available)) : (s.find(".proBoxInfo .quickviewAvailability").removeClass("instock").addClass("outstock"), s.find(".proBoxInfo .quickviewAvailability").append("<label>" + vela.strings.availability + ":</label> " + vela.strings.unavailable)), r.compare_at_price > r.price ? (s.find(".priceCompare").html(Shopify.formatMoney(r.compare_at_price_max, window.money)).show(), s.find(".pricePrimary").addClass("priceSale")) : s.find(".priceCompare").html(""), r.available ? quickViewVariants(r, s) : (s.find("select, input").hide(), s.find(".btnAddToCart").html(vela.strings.sold_out).addClass("disabled").attr("disabled", "disabled"), s.find(".proQuantity").hide()), loadQuickViewSlider(r, s), $("#velaQuickView").fadeIn(500), $(".jsQuickview").fadeIn(500), $(".jsQuickview").addClass("velaFadeOut"), vela.cache.$velaLoading.hide(), qvAddToCart(), window.currencies && Currency.convertAll(window.currency, Currency.cookie.read())
        }), !1
    })
}, vela.goToTop = function() {
    $(window).scroll(function() {
        $(window).scrollTop() >= 200 ? $("#goToTop").fadeIn() : $("#goToTop").fadeOut()
    }), $("#goToTop").click(function() {
        return $("body,html").animate({
            scrollTop: 0
        }, "normal"), $("#pageContainer").animate({
            scrollTop: 0
        }, "normal"), !1
    })
}, vela.newsletter = function() {
    var t;
    $(".js-vela-newsletter").each(function() {
        var a = $(this);
        a.on("submit", function(o) {
            o.preventDefault(), $(".js-alert-newsletter").remove(), $.ajax({
                type: a.attr("method"),
                url: a.attr("action"),
                data: a.serialize(),
                cache: !1,
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                success: function(e) {
                    e.result === "success" ? (a.prepend(t(window.newsletter_success, "success")), $(".js-input-newsletter").val("")) : a.prepend(t(e.msg.replace("0 - ", ""), "error"))
                },
                error: function(e) {
                    a.prepend(t(e, "error"))
                }
            })
        })
    }), t = function(a, o) {
        var e = '<div class="js-alert-newsletter alert-dismissible  alert alert-' + o + '">' + a + '<button type="button" data-dismiss="alert" aria-hidden="true" aria-label="Close" class="btnClose">x</button></div>';
        return e
    }
}, vela.productLoadMore = function() {
    function t() {
        var o = $(".productLoadMore .btnLoadMore"),
            e = $(".productLoadMore .btnLoadMore").attr("href");
        $.ajax({
            type: "GET",
            url: e,
            beforeSend: function() {
                vela.cache.$velaLoading.show()
            },
            success: function(n) {
                o.remove(), vela.cache.$velaLoading.hide();
                var r = $(n).find(".producsLoadMore");
                r.insertBefore($(".proLoadMoreBottom")), a()
            },
            dataType: "html"
        })
    }

    function a() {
        $(".productLoadMore .btnLoadMore").click(function(o) {
            return $(this).hasClass("disableLoadMore") ? (o.stopPropagation(), !1) : (t(), o.stopPropagation(), !1)
        })
    }
    a()
}, vela.velaAccountPage = function() {
    $("body").on("click", ".velaRecoverPassword", function(t) {
        t.preventDefault(), $("#RecoverPasswordForm").removeClass("hidden"), $("#CustomerLoginForm").addClass("hidden")
    }), $("body").on("click", ".velaHideRecoverPasswordLink", function(t) {
        t.preventDefault(), $("#RecoverPasswordForm").addClass("hidden"), $("#CustomerLoginForm").removeClass("hidden")
    }), vela.getHash() == "#recover" && ($("#RecoverPasswordForm").removeClass("hidden"), $("#CustomerLoginForm").addClass("hidden")), $("body").on("click", ".velaShowPassword", function(t) {
        var a = $(this),
            o = a.prev("input");
        o.attr("type") == "password" ? (o.attr("type", "text"), a.text("Hide")) : (o.attr("type", "password"), a.text("Show"))
    })
}, vela.productImage = function() {
    if (vela.cache.$velaProductImage.length > 0) {
        if ($(window).width() >= 992) {
            var t = vela.cache.$velaProductImage.data("zoom-enable"),
                a = vela.cache.$velaProductImage.data("zoom-scroll"),
                o = vela.cache.$velaProductImage.data("zoom-type"),
                e = vela.cache.$velaProductImage.data("zoom-width"),
                n = vela.cache.$velaProductImage.data("zoom-height"),
                r = vela.cache.$velaProductImage.data("zoom-lens"),
                c = vela.cache.$velaProductImage.data("lens-shape"),
                s = vela.cache.$velaProductImage.data("lens-border");
            vela.cache.$velaProductImage.elevateZoom({
                zoomEnabled: t,
                gallery: "productThumbs",
                galleryActiveClass: "active",
                cursor: "pointer",
                zoomType: o,
                scrollZoom: a,
                zoomWindowWidth: e,
                zoomWindowHeight: n,
                lensSize: r,
                lensShape: c,
                onImageSwapComplete: function() {
                    $(".zoomWrapper div").hide()
                }
            }), vela.cache.$velaProductImage.bind("click", function(h) {
                var g = $("#ProductPhotoImg").data("elevateZoom"),
                    v = [];
                return $.each(g.getGalleryList(), function(y, w) {
                    v.push({
                        src: w.href
                    })
                }), $.fancybox.open(v), !1
            }), $("#velaViewImage").bind("click", function(h) {
                var g = $("#ProductPhotoImg").data("elevateZoom"),
                    v = [];
                return $.each(g.getGalleryList(), function(y, w) {
                    v.push({
                        src: w.href
                    })
                }), $.fancybox.open(v), !1
            })
        } else if ($(window).width() <= 991) {
            vela.cache.$velaProductImage.elevateZoom({
                zoomEnabled: !1,
                gallery: "productThumbs"
            });
            var l = [],
                p = vela.cache.$velaProductImage.data("elevateZoom");
            $.each(p.getGalleryList(), function(h, g) {
                l.push({
                    src: g.href
                })
            })
        }
    }
}, vela.Drawers = function() {
    var t = function(a, o, e, n) {
        var r = {
            close: ".jsDrawerClose",
            open: ".jsDrawerOpen" + o,
            openClass: "jsDrawerOpen",
            dirOpenClass: "jsDrawerOpen" + o
        };
        if (this.$nodes = {
                parent: $("body, html"),
                page: $("#pageContainer"),
                moved: $(".isMoved")
            }, this.config = $.extend(r, n), this.position = o, this.iscart = e, this.$drawer = $("#" + a), !this.$drawer.length) return !1;
        this.drawerIsOpen = !1, this.init()
    };
    return t.prototype.init = function() {
        $(this.config.open).on("click", $.proxy(this.open, this)), this.$drawer.find(this.config.close).on("click", $.proxy(this.close, this))
    }, t.prototype.open = function(a) {
        if (window.ajaxcart_type == "modal" && this.iscart) {
            var o = !1;
            this.$drawer.modal(), a ? a.preventDefault() : o = !0, a && a.stopPropagation && (a.stopPropagation(), this.$activeSource = $(a.currentTarget)), this.config.onDrawerOpen && typeof this.config.onDrawerOpen == "function" && (o || this.config.onDrawerOpen())
        } else {
            var o = !1;
            if (a ? a.preventDefault() : o = !0, a && a.stopPropagation && (a.stopPropagation(), this.$activeSource = $(a.currentTarget)), this.drawerIsOpen && !o) return this.close();
            this.$nodes.moved.addClass("is-transitioning"), this.$drawer.prepareTransition(), this.$nodes.parent.addClass(this.config.openClass + " " + this.config.dirOpenClass), this.drawerIsOpen = !0, this.trapFocus(this.$drawer, "drawer_focus"), this.config.onDrawerOpen && typeof this.config.onDrawerOpen == "function" && (o || this.config.onDrawerOpen()), this.$activeSource && this.$activeSource.attr("aria-expanded") && this.$activeSource.attr("aria-expanded", "true"), this.$nodes.page.on("touchmove.drawer", function() {
                return !1
            }), this.$nodes.page.on("click.drawer", $.proxy(function() {
                return this.close(), !1
            }, this))
        }
    }, t.prototype.close = function() {
        !this.drawerIsOpen || ($(document.activeElement).trigger("blur"), this.$nodes.moved.prepareTransition({
            disableExisting: !0
        }), this.$drawer.prepareTransition({
            disableExisting: !0
        }), this.$nodes.parent.removeClass(this.config.dirOpenClass + " " + this.config.openClass), this.drawerIsOpen = !1, this.removeTrapFocus(this.$drawer, "drawer_focus"), this.$nodes.page.off(".drawer"))
    }, t.prototype.trapFocus = function(a, o) {
        var e = o ? "focusin." + o : "focusin";
        a.attr("tabindex", "-1"), a.focus(), $(document).on(e, function(n) {
            a[0] !== n.target && !a.has(n.target).length && a.focus()
        })
    }, t.prototype.removeTrapFocus = function(a, o) {
        var e = o ? "focusin." + o : "focusin";
        a.removeAttr("tabindex"), $(document).off(e)
    }, t
}(), window.velatheme = window.velatheme || {}, velatheme.Sections = function() {
    this.constructors = {}, this.instances = []
}, velatheme.Sections.prototype = _.assignIn({}, velatheme.Sections.prototype, {
    _createInstance: function(t, a) {
        var o = $(t),
            e = o.attr("data-section-id"),
            n = o.attr("data-section-type");
        if (a = a || this.constructors[n], !_.isUndefined(a)) {
            var r = _.assignIn(new a(t), {
                id: e,
                type: n,
                container: t
            });
            this.instances.push(r)
        }
    },
    register: function(t, a) {
        this.constructors[t] = a, $("[data-section-type=" + t + "]").each(function(o, e) {
            this._createInstance(e, a)
        }.bind(this))
    }
}), vela.velaBannerTop = function() {
    var t = new Date,
        a = 5;
    t.setTime(t.getTime() + a * 60 * 1e3), $.cookie("velaBannerTop") == "closed" ? $("#bannerTop").removeClass("active") : $("#bannerTop").addClass("active"), $("#bannerTop .btn-bannerTop").click(function() {
        $("#bannerTop").hasClass("active") ? ($.cookie("velaBannerTop", "closed", t), $("#bannerTop").removeClass("active")) : ($.cookie("velaBannerTop", "opened", t), $("#bannerTop").addClass("active"))
    })
}, velatheme.Slideshow = function() {
    this.$slideshow = null;
    var t = {
        wrapper: "velaSlideshowWrapper",
        slideshow: "vela--slideshow",
        currentSlide: "slick-current",
        video: "velassVideo",
        videoBackground: "velassVideoBackground",
        closeVideoBtn: "btnssVideoControlClose",
        pauseButton: "btnssPause",
        isPaused: "is-paused"
    };

    function a(c) {
        this.$slideshow = $(c), this.$wrapper = this.$slideshow.closest("." + t.wrapper), this.$pause = this.$wrapper.find("." + t.pauseButton), this.settings = {
            accessibility: !0,
            arrows: this.$slideshow.data("navigation"),
            dots: this.$slideshow.data("pagination"),
            fade: !0,
            pauseOnHover: 0,
            draggable: !0,
            touchThreshold: 20,
            autoplay: this.$slideshow.data("autoplay"),
            autoplaySpeed: this.$slideshow.data("speed")
        }, this.$slideshow.on("beforeChange", e.bind(this)), this.$slideshow.on("init", o.bind(this)), this.$slideshow.slick(this.settings), this.$pause.on("click", this.togglePause.bind(this))
    }

    function o(c, s) {
        var l = s.$slider,
            p = s.$list,
            h = this.$wrapper,
            g = this.settings.autoplay;
        l.removeClass("velaSliderLoading"), p.removeAttr("aria-live"), h.on("focusin", function(v) {
            !h.has(v.target).length || (p.attr("aria-live", "polite"), g && l.slick("slickPause"))
        }), h.on("focusout", function(v) {
            if (!!h.has(v.target).length && (p.removeAttr("aria-live"), g)) {
                if ($(v.target).hasClass(t.closeVideoBtn)) return;
                l.slick("slickPlay")
            }
        }), s.$dots && s.$dots.on("keydown", function(v) {
            v.which === 37 && l.slick("slickPrev"), v.which === 39 && l.slick("slickNext"), (v.which === 37 || v.which === 39) && s.$dots.find(".slick-active button").focus()
        })
    }

    function e(c, s, l, p) {
        var h = s.$slider,
            g = h.find("." + t.currentSlide),
            v = h.find('.velassSlide[data-slick-index="' + p + '"]');
        if (n(g)) {
            var y = g.find("." + t.video),
                w = y.attr("id");
            velatheme.SlideshowVideo.pauseVideo(w), y.attr("tabindex", "-1")
        }
        if (n(v)) {
            var k = v.find("." + t.video),
                C = k.attr("id"),
                T = k.hasClass(t.videoBackground);
            T ? velatheme.SlideshowVideo.playVideo(C) : k.attr("tabindex", "0")
        }
    }

    function n(c) {
        return c.find("." + t.video).length
    }
    a.prototype.togglePause = function() {
        var c = r(this.$pause);
        this.$pause.hasClass(t.isPaused) ? (this.$pause.removeClass(t.isPaused), $(c).slick("slickPlay")) : (this.$pause.addClass(t.isPaused), $(c).slick("slickPause"))
    };

    function r(c) {
        return "#velaSlideshows" + c.data("id")
    }
    return a
}(), velatheme.SlideshowVideo = function() {
    var t = !1,
        a = !1,
        o = !1,
        e = !1,
        n = !1,
        r = {},
        c = [],
        s = {
            ratio: 16 / 9,
            playerVars: {
                iv_load_policy: 3,
                modestbranding: 1,
                autoplay: 0,
                controls: 0,
                showinfo: 0,
                wmode: "opaque",
                branding: 0,
                autohide: 0,
                rel: 0
            },
            events: {
                onReady: A,
                onStateChange: j
            }
        },
        l = {
            playing: "video-is-playing",
            paused: "video-is-paused",
            loading: "video-is-loading",
            loaded: "video-is-loaded",
            slideshowWrapper: "velaSlideshowWrapper",
            slide: "velassSlide",
            slideBackgroundVideo: "velassSlideBackgroundVideo",
            slideDots: "slick-dots",
            videoChrome: "velassVideo-chrome",
            videoBackground: "velassVideoBackground",
            playVideoBtn: "btnssVideoControlPlay",
            closeVideoBtn: "btnssVideoControlClose",
            currentSlide: "slick-current",
            slickClone: "slick-cloned",
            supportsAutoplay: "autoplay",
            supportsNoAutoplay: "no-autoplay"
        };

    function p(u) {
        if (!!u.length && (r[u.attr("id")] = {
                id: u.attr("id"),
                videoId: u.data("id"),
                type: u.data("type"),
                status: u.data("type") === "chrome" ? "closed" : "background",
                videoSelector: u.attr("id"),
                $parentSlide: u.closest("." + l.slide),
                $parentSlideshowWrapper: u.closest("." + l.slideshowWrapper),
                controls: u.data("type") === "background" ? 0 : 1,
                slideshow: u.data("slideshow")
            }, !n)) {
            var m = document.createElement("script");
            m.src = "https://www.youtube.com/iframe_api";
            var S = document.getElementsByTagName("script")[0];
            S.parentNode.insertBefore(m, S)
        }
    }

    function h(u) {
        !o && !e || u && typeof c[u].playVideo == "function" && w(u)
    }

    function g(u) {
        c[u] && typeof c[u].pauseVideo == "function" && c[u].pauseVideo()
    }

    function v() {
        for (var u in r)
            if (r.hasOwnProperty(u)) {
                var m = $.extend({}, s, r[u]);
                m.playerVars.controls = m.controls, c[u] = new YT.Player(u, m)
            } M(), n = !0
    }

    function y(u) {
        if (!!n) {
            var m = $.extend({}, s, r[u]);
            m.playerVars.controls = m.controls, c[u] = new YT.Player(u, m), M()
        }
    }

    function w(u, m) {
        var S = r[u],
            d = c[u],
            f = r[u].$parentSlide;
        if (e) I(S);
        else if (m || t && a) {
            f.removeClass(l.loading), I(S), d.playVideo();
            return
        }
        t || C(d, f)
    }

    function k(u) {
        var m = u ? l.supportsAutoplay : l.supportsNoAutoplay;
        $(document.documentElement).addClass(m), u || (e = !0), t = !0
    }

    function C(u, m) {
        u.playVideo(), T(u).then(function() {
            k(!0)
        }).fail(function() {
            k(!1), u.stopVideo()
        }).always(function() {
            t = !0, m.removeClass(l.loading)
        })
    }

    function T(u) {
        var m = $.Deferred(),
            S, d;
        return S = setInterval(function() {
            u.getCurrentTime() <= 0 || (a = !0, clearInterval(S), clearTimeout(d), m.resolve())
        }, 500), d = setTimeout(function() {
            clearInterval(S), m.reject()
        }, 4e3), m
    }

    function F() {
        o || ($(window).width() < 767 && (e = !0), e && k(!1), o = !0)
    }

    function A(u) {
        u.target.setPlaybackQuality("hd1080");
        var m = E(u);
        switch (F(), $("#" + m.id).attr("tabindex", "-1"), Q(), m.type) {
            case "background-chrome":
            case "background":
                u.target.mute(), m.$parentSlide.hasClass(l.currentSlide) && w(m.id);
                break
        }
        m.$parentSlide.addClass(l.loaded)
    }

    function j(u) {
        var m = E(u);
        switch (u.data) {
            case 0:
                L(m);
                break;
            case 1:
                I(m);
                break;
            case 2:
                O(m);
                break
        }
    }

    function L(u) {
        switch (u.type) {
            case "background":
                c[u.id].seekTo(0);
                break;
            case "background-chrome":
                c[u.id].seekTo(0), V(u.id);
                break;
            case "chrome":
                V(u.id);
                break
        }
    }

    function I(u) {
        var m = u.$parentSlideshowWrapper,
            S = u.$parentSlide;
        if (S.removeClass(l.loading), u.status !== "background") {
            switch ($("#" + u.id).attr("tabindex", "0"), u.type) {
                case "chrome":
                case "background-chrome":
                    m.removeClass(l.paused).addClass(l.playing), S.removeClass(l.paused).addClass(l.playing);
                    break
            }
            S.find("." + l.closeVideoBtn).focus()
        }
    }

    function O(u) {
        var m = u.$parentSlideshowWrapper,
            S = u.$parentSlide;
        if (u.type === "background-chrome") {
            V(u.id);
            return
        }
        u.status !== "closed" && u.type !== "background" && (m.addClass(l.paused), S.addClass(l.paused)), u.type === "chrome" && u.status === "closed" && (m.removeClass(l.paused), S.removeClass(l.paused)), m.removeClass(l.playing), S.removeClass(l.playing)
    }

    function V(u) {
        var m = r[u],
            S = m.$parentSlideshowWrapper,
            d = m.$parentSlide,
            f = [l.pause, l.playing].join(" ");
        switch ($("#" + m.id).attr("tabindex", "-1"), m.status = "closed", m.type) {
            case "background-chrome":
                c[u].mute(), z(u);
                break;
            case "chrome":
                c[u].stopVideo(), O(m);
                break
        }
        S.removeClass(f), d.removeClass(f)
    }

    function E(u) {
        var m = u.target.getIframe().id;
        return r[m]
    }

    function R(u) {
        var m = r[u];
        switch (m.$parentSlide.addClass(l.loading), m.status = "open", m.type) {
            case "background-chrome":
                H(u, m), c[u].unMute(), w(u, !0);
                break;
            case "chrome":
                w(u, !0);
                break
        }
        $(document).on("keydown.videoPlayer", function(S) {
            S.keyCode === 27 && V(u)
        })
    }

    function Q() {
        $("." + l.videoBackground).each(function(u, m) {
            q($(m))
        })
    }

    function q(u) {
        var m = u.closest("." + l.slide);
        if (!m.hasClass(l.slickClone)) {
            var S = m.width(),
                d = u.width(),
                f = u.height();
            S / s.ratio < f ? (d = Math.ceil(f * s.ratio), u.width(d).height(f).css({
                left: (S - d) / 2,
                top: 0
            })) : (f = Math.ceil(S / s.ratio), u.width(S).height(f).css({
                left: 0,
                top: (f - f) / 2
            })), u.prepareTransition().addClass(l.loaded)
        }
    }

    function H(u) {
        $("#" + u).removeAttr("style").removeClass(l.videoBackground).addClass(l.videoChrome), r[u].$parentSlideshowWrapper.removeClass(l.slideBackgroundVideo).addClass(l.playing), r[u].$parentSlide.removeClass(l.slideBackgroundVideo).addClass(l.playing), r[u].status = "open"
    }

    function z(u) {
        var m = $("#" + u).addClass(l.videoBackground).removeClass(l.videoChrome);
        r[u].$parentSlide.addClass(l.slideBackgroundVideo), r[u].status = "background", w(u, !0), q(m)
    }

    function M() {
        $(document).on("click.videoPlayer", "." + l.playVideoBtn, function(u) {
            var m = $(u.currentTarget).data("controls");
            R(m)
        }), $(document).on("click.videoPlayer", "." + l.closeVideoBtn, function(u) {
            var m = $(u.currentTarget).data("controls");
            V(m)
        }), $(window).on("resize.videoPlayer", $.debounce(250, function(u) {
            var m = $(u.currentTarget).data("controls");
            n && (Q(), w(m, !0))
        }))
    }

    function D() {
        $(document).off(".videoPlayer"), $(window).off(".videoPlayer")
    }
    return {
        init: p,
        loadVideos: v,
        loadVideo: y,
        playVideo: h,
        pauseVideo: g,
        removeEvents: D
    }
}(), velatheme.slideshows = {}, velatheme.SlideshowSection = function() {
    function t(a) {
        var o = this.$container = $(a),
            e = o.attr("data-section-id"),
            n = this.slideshow = "#velaSlideshows" + e;
        $(".velassVideo", n).each(function() {
            var r = $(this);
            velatheme.SlideshowVideo.init(r), velatheme.SlideshowVideo.loadVideo(r.attr("id"))
        }), velatheme.slideshows[n] = new velatheme.Slideshow(n)
    }
    return t
}(), velatheme.SlideshowSection.prototype = _.assignIn({}, velatheme.SlideshowSection.prototype, {
    onUnload: function() {
        delete velatheme.slideshows[this.slideshow]
    },
    onBlockSelect: function(t) {
        var a = $(this.slideshow),
            o = $(".velassSlide" + t.detail.blockId + ":not(.slick-cloned)"),
            e = o.data("slick-index");
        a.slick("slickGoTo", e).slick("slickPause")
    },
    onBlockDeselect: function() {
        $(this.slideshow).slick("slickPlay")
    }
}), velatheme.Video = function() {
    var t = !1,
        a = !1,
        o = !1,
        e = !1,
        n = {},
        r = [],
        c = {
            ratio: 16 / 9,
            scrollAnimationDuration: 400,
            playerVars: {
                iv_load_policy: 3,
                modestbranding: 1,
                autoplay: 0,
                controls: 0,
                wmode: "opaque",
                branding: 0,
                autohide: 0,
                rel: 0
            },
            events: {
                onReady: T,
                onStateChange: F
            }
        },
        s = {
            playing: "video-is-playing",
            paused: "video-is-paused",
            loading: "video-is-loading",
            loaded: "video-is-loaded",
            backgroundVideoWrapper: "video-background-wrapper",
            videoWithImage: "video--image_with_play",
            backgroundVideo: "video--background",
            userPaused: "is-paused",
            supportsAutoplay: "autoplay",
            supportsNoAutoplay: "no-autoplay",
            wrapperMinHeight: "video-section-wrapper--min-height"
        },
        l = {
            section: ".video-section",
            videoWrapper: ".video-section-wrapper",
            playVideoBtn: ".video-control__play",
            closeVideoBtn: ".video-control__close-wrapper",
            pauseVideoBtn: ".video__pause",
            pauseVideoStop: ".video__pause-stop",
            pauseVideoResume: ".video__pause-resume",
            fallbackText: ".icon__fallback-text"
        };

    function p(d) {
        if (!!d.length) {
            if (n[d.attr("id")] = {
                    id: d.attr("id"),
                    videoId: d.data("id"),
                    type: d.data("type"),
                    status: d.data("type") === "image_with_play" ? "closed" : "background",
                    $video: d,
                    $videoWrapper: d.closest(l.videoWrapper),
                    $section: d.closest(l.section),
                    controls: d.data("type") === "background" ? 0 : 1
                }, !e) {
                var f = document.createElement("script");
                f.src = "https://www.youtube.com/iframe_api";
                var b = document.getElementsByTagName("script")[0];
                b.parentNode.insertBefore(f, b)
            }
            C()
        }
    }

    function h(d) {
        !a && !o || d && typeof r[d].playVideo == "function" && w(d)
    }

    function g(d) {
        r[d] && typeof r[d].pauseVideo == "function" && r[d].pauseVideo()
    }

    function v() {
        for (var d in n) n.hasOwnProperty(d) && u(d);
        D(), e = !0
    }

    function y(d) {
        !e || (u(d), D())
    }

    function w(d, f) {
        var b = n[d],
            x = r[d],
            P = b.$videoWrapper;
        if (o) j(b);
        else if (f || t) {
            P.removeClass(s.loading), j(b), x.playVideo();
            return
        } else x.playVideo()
    }

    function k(d) {
        var f = d ? s.supportsAutoplay : s.supportsNoAutoplay;
        $(document.documentElement).removeClass(s.supportsAutoplay).removeClass(s.supportsNoAutoplay).addClass(f), d || (o = !0), t = !0
    }

    function C() {
        a || (M() && (o = !0), o && k(!1), a = !0)
    }

    function T(d) {
        d.target.setPlaybackQuality("hd1080");
        var f = O(d),
            b = d.target.getVideoData().title;
        C(), $("#" + f.id).attr("tabindex", "-1"), Q(), S(f.$videoWrapper, b), f.type === "background" && (d.target.mute(), w(f.id)), f.$videoWrapper.addClass(s.loaded)
    }

    function F(d) {
        var f = O(d);
        switch (f.status === "background" && !M() && !t && (d.data === YT.PlayerState.PLAYING || d.data === YT.PlayerState.BUFFERING) && (k(!0), t = !0, f.$videoWrapper.removeClass(s.loading)), d.data) {
            case YT.PlayerState.ENDED:
                A(f);
                break;
            case YT.PlayerState.PAUSED:
                setTimeout(function() {
                    d.target.getPlayerState() === YT.PlayerState.PAUSED && L(f)
                }, 200);
                break
        }
    }

    function A(d) {
        switch (d.type) {
            case "background":
                r[d.id].seekTo(0);
                break;
            case "image_with_play":
                I(d.id), V(d.id, !1);
                break
        }
    }

    function j(d) {
        var f = d.$videoWrapper,
            b = f.find(l.pauseVideoBtn);
        f.removeClass(s.loading), b.hasClass(s.userPaused) && b.removeClass(s.userPaused), d.status !== "background" && ($("#" + d.id).attr("tabindex", "0"), d.type === "image_with_play" && f.removeClass(s.paused).addClass(s.playing), setTimeout(function() {
            f.find(l.closeVideoBtn).focus()
        }, c.scrollAnimationDuration))
    }

    function L(d) {
        var f = d.$videoWrapper;
        d.type === "image_with_play" && (d.status === "closed" ? f.removeClass(s.paused) : f.addClass(s.paused)), f.removeClass(s.playing)
    }

    function I(d) {
        var f = n[d],
            b = f.$videoWrapper,
            x = [s.paused, s.playing].join(" ");
        switch (M() && b.removeAttr("style"), $("#" + f.id).attr("tabindex", "-1"), f.status = "closed", f.type) {
            case "image_with_play":
                r[d].stopVideo(), L(f);
                break;
            case "background":
                r[d].mute(), z(d);
                break
        }
        b.removeClass(x)
    }

    function O(d) {
        var f = d.target.getIframe().id;
        return n[f]
    }

    function V(d, f) {
        var b = n[d],
            x = b.$videoWrapper.offset().top,
            P = b.$videoWrapper.find(l.playVideoBtn),
            W = 0,
            B = 0;
        M() && b.$videoWrapper.parent().toggleClass("page-width", !f), f ? (M() ? B = $(window).width() / c.ratio : B = b.$videoWrapper.width() / c.ratio, W = ($(window).height() - B) / 2, b.$videoWrapper.removeClass(s.wrapperMinHeight).animate({
            height: B
        }, 600), M() && Shopify.designMode || $("html, body").animate({
            scrollTop: x - W
        }, c.scrollAnimationDuration)) : (M() ? B = b.$videoWrapper.data("mobile-height") : B = b.$videoWrapper.data("desktop-height"), b.$videoWrapper.height(b.$videoWrapper.width() / c.ratio).animate({
            height: B
        }, 600), setTimeout(function() {
            b.$videoWrapper.addClass(s.wrapperMinHeight)
        }, 600), P.focus())
    }

    function E(d) {
        var f = n[d].$videoWrapper.find(l.pauseVideoBtn),
            b = f.hasClass(s.userPaused);
        b ? (f.removeClass(s.userPaused), h(d)) : (f.addClass(s.userPaused), g(d)), f.attr("aria-pressed", !b)
    }

    function R(d) {
        var f = n[d];
        switch (f.$videoWrapper.addClass(s.loading), f.$videoWrapper.attr("style", "height: " + f.$videoWrapper.height() + "px"), f.status = "open", f.type) {
            case "image_with_play":
                w(d, !0);
                break;
            case "background":
                H(d, f), r[d].unMute(), w(d, !0);
                break
        }
        V(d, !0), $(document).on("keydown.videoPlayer", function(b) {
            var x = $(document.activeElement).data("controls");
            b.keyCode !== slate.utils.keyboardKeys.ESCAPE || !x || (I(x), V(x, !1))
        })
    }

    function Q() {
        $("." + s.backgroundVideo).each(function(d, f) {
            q($(f))
        })
    }

    function q(d) {
        if (!!e)
            if (M()) d.removeAttr("style");
            else {
                var f = d.closest(l.videoWrapper),
                    b = f.width(),
                    x = d.width(),
                    P = f.data("desktop-height");
                b / c.ratio < P ? (x = Math.ceil(P * c.ratio), d.width(x).height(P).css({
                    left: (b - x) / 2,
                    top: 0
                })) : (P = Math.ceil(b / c.ratio), d.width(b).height(P).css({
                    left: 0,
                    top: (P - P) / 2
                })), d.prepareTransition(), f.addClass(s.loaded)
            }
    }

    function H(d) {
        $("#" + d).removeClass(s.backgroundVideo).addClass(s.videoWithImage), setTimeout(function() {
            $("#" + d).removeAttr("style")
        }, 600), n[d].$videoWrapper.removeClass(s.backgroundVideoWrapper).addClass(s.playing), n[d].status = "open"
    }

    function z(d) {
        $("#" + d).removeClass(s.videoWithImage).addClass(s.backgroundVideo), n[d].$videoWrapper.addClass(s.backgroundVideoWrapper), n[d].status = "background", q($("#" + d))
    }

    function M() {
        return $(window).width() < 767 || window.mobileCheck()
    }

    function D() {
        $(document).on("click.videoPlayer", l.playVideoBtn, function(d) {
            var f = $(d.currentTarget).data("controls");
            R(f)
        }), $(document).on("click.videoPlayer", l.closeVideoBtn, function(d) {
            var f = $(d.currentTarget).data("controls");
            $(d.currentTarget).blur(), I(f), V(f, !1)
        }), $(document).on("click.videoPlayer", l.pauseVideoBtn, function(d) {
            var f = $(d.currentTarget).data("controls");
            E(f)
        }), $(window).on("resize.videoPlayer", $.debounce(200, function() {
            if (!!e) {
                var d, f = window.innerHeight === screen.height;
                if (Q(), M()) {
                    for (d in n) n.hasOwnProperty(d) && (n[d].$videoWrapper.hasClass(s.playing) && (f || (g(d), L(n[d]))), n[d].$videoWrapper.height($(document).width() / c.ratio));
                    k(!1)
                } else {
                    k(!0);
                    for (d in n) n[d].$videoWrapper.find("." + s.videoWithImage).length || (r[d].playVideo(), j(n[d]))
                }
            }
        })), $(window).on("scroll.videoPlayer", $.debounce(50, function() {
            if (!!e) {
                for (var d in n)
                    if (n.hasOwnProperty(d)) {
                        var f = n[d].$videoWrapper;
                        f.hasClass(s.playing) && (f.offset().top + f.height() * .75 < $(window).scrollTop() || f.offset().top + f.height() * .25 > $(window).scrollTop() + $(window).height()) && (I(d), V(d, !1))
                    }
            }
        }))
    }

    function u(d) {
        var f = $.extend({}, c, n[d]);
        f.playerVars.controls = f.controls, r[d] = new YT.Player(d, f)
    }

    function m() {
        $(document).off(".videoPlayer"), $(window).off(".videoPlayer")
    }

    function S(d, f) {
        var b = d.find(l.playVideoBtn),
            x = d.find(l.closeVideoBtn),
            P = d.find(l.pauseVideoBtn),
            W = x.find(l.fallbackText),
            B = P.find(l.pauseVideoStop).find(l.fallbackText),
            N = P.find(l.pauseVideoResume).find(l.fallbackText);
        b.each(function() {
            var G = $(this),
                U = G.find(l.fallbackText);
            U.text(U.text().replace("[video_title]", f))
        }), W.text(W.text().replace("[video_title]", f)), B.text(B.text().replace("[video_title]", f)), N.text(N.text().replace("[video_title]", f))
    }
    return {
        init: p,
        editorLoadVideo: y,
        loadVideos: v,
        playVideo: h,
        pauseVideo: g,
        removeEvents: m
    }
}(), velatheme.Helpers = function() {
    var t = !1;

    function a() {
        t = !0
    }

    function o() {
        return t
    }
    return {
        setTouch: a,
        isTouch: o
    }
}(), velatheme.LibraryLoader = function() {
    var t = {
            link: "link",
            script: "script"
        },
        a = {
            requested: "requested",
            loaded: "loaded"
        },
        o = "https://cdn.shopify.com/shopifycloud/",
        e = {
            youtubeSdk: {
                tagId: "youtube-sdk",
                src: "https://www.youtube.com/iframe_api",
                type: t.script
            },
            plyrShopifyStyles: {
                tagId: "plyr-shopify-styles",
                src: o + "shopify-plyr/v1.0/shopify-plyr.css",
                type: t.link
            },
            modelViewerUiStyles: {
                tagId: "shopify-model-viewer-ui-styles",
                src: o + "model-viewer-ui/assets/v1.0/model-viewer-ui.css",
                type: t.link
            }
        };

    function n(s, l) {
        var p = e[s];
        if (!!p && p.status !== a.requested) {
            if (l = l || function() {}, p.status === a.loaded) {
                l();
                return
            }
            p.status = a.requested;
            var h;
            switch (p.type) {
                case t.script:
                    h = r(p, l);
                    break;
                case t.link:
                    h = c(p, l);
                    break
            }
            h.id = p.tagId, p.element = h;
            var g = document.getElementsByTagName(p.type)[0];
            g.parentNode.insertBefore(h, g)
        }
    }

    function r(s, l) {
        var p = document.createElement("script");
        return p.src = s.src, p.addEventListener("load", function() {
            s.status = a.loaded, l()
        }), p
    }

    function c(s, l) {
        var p = document.createElement("link");
        return p.href = s.src, p.rel = "stylesheet", p.type = "text/css", p.addEventListener("load", function() {
            s.status = a.loaded, l()
        }), p
    }
    return {
        load: n
    }
}(), velatheme.ProductVideo = function() {
    var t = {},
        a = {
            html5: "html5",
            youtube: "youtube"
        },
        o = {
            productMediaWrapper: "[data-product-single-media-wrapper]"
        },
        e = {
            enableVideoLooping: "enable-video-looping",
            videoId: "video-id"
        };

    function n(v, y) {
        if (!!v.length) {
            var w = v.find("iframe, video")[0],
                k = v.data("mediaId");
            if (!!w) {
                t[k] = {
                    mediaId: k,
                    sectionId: y,
                    host: l(w),
                    container: v,
                    element: w,
                    ready: function() {
                        s(this)
                    }
                };
                var C = t[k];
                switch (C.host) {
                    case a.html5:
                        window.Shopify.loadFeatures([{
                            name: "video-ui",
                            version: "1.0",
                            onLoad: r
                        }]), velatheme.LibraryLoader.load("plyrShopifyStyles");
                        break;
                    case a.youtube:
                        velatheme.LibraryLoader.load("youtubeSdk", c);
                        break
                }
            }
        }
    }

    function r(v) {
        if (v) {
            h();
            return
        }
        p(a.html5)
    }

    function c() {
        !window.YT.Player || p(a.youtube)
    }

    function s(v) {
        if (!v.player) {
            var y = v.container.closest(o.productMediaWrapper),
                w = y.data(e.enableVideoLooping);
            switch (v.host) {
                case a.html5:
                    v.player = new Shopify.Plyr(v.element, {
                        loop: {
                            active: w
                        }
                    });
                    break;
                case a.youtube:
                    var k = y.data(e.videoId);
                    v.player = new YT.Player(v.element, {
                        videoId: k,
                        events: {
                            onStateChange: function(C) {
                                C.data === 0 && w && C.target.seekTo(0)
                            }
                        }
                    });
                    break
            }
            y.on("mediaHidden xrLaunch", function() {
                !v.player || (v.host === a.html5 && v.player.pause(), v.host === a.youtube && v.player.pauseVideo && v.player.pauseVideo())
            }), y.on("mediaVisible", function() {
                velatheme.Helpers.isTouch() || !v.player || (v.host === a.html5 && v.player.play(), v.host === a.youtube && v.player.playVideo && v.player.playVideo())
            })
        }
    }

    function l(v) {
        return v.tagName === "VIDEO" ? a.html5 : v.tagName === "IFRAME" && /^(https?:\/\/)?(www\.)?(youtube\.com|youtube-nocookie\.com|youtu\.?be)\/.+$/.test(v.src) ? a.youtube : null
    }

    function p(v) {
        for (var y in t)
            if (t.hasOwnProperty(y)) {
                var w = t[y];
                w.host === v && w.ready()
            }
    }

    function h() {
        for (var v in t)
            if (t.hasOwnProperty(v)) {
                var y = t[v];
                if (y.nativeVideo) continue;
                y.host === a.html5 && (y.element.setAttribute("controls", "controls"), y.nativeVideo = !0)
            }
    }

    function g(v) {
        for (var y in t)
            if (t.hasOwnProperty(y)) {
                var w = t[y];
                w.sectionId === v && (w.player && w.player.destroy(), delete t[y])
            }
    }
    return {
        init: n,
        hosts: a,
        loadVideos: p,
        removeSectionVideos: g
    }
}(), velatheme.ProductModel = function() {
    var t = {},
        a = {},
        o = {},
        e = {
            mediaGroup: "[data-product-single-media-group]",
            xrButton: "[data-shopify-xr]"
        };

    function n(p, h) {
        t[h] = {
            loaded: !1
        }, p.each(function(g) {
            var v = $(this),
                y = v.data("media-id"),
                w = $(v.find("model-viewer")[0]),
                k = w.data("model-id");
            if (g === 0) {
                var C = v.closest(e.mediaGroup).find(e.xrButton);
                o[h] = {
                    $element: C,
                    defaultId: k
                }
            }
            a[y] = {
                modelId: k,
                sectionId: h,
                $container: v,
                $element: w
            }
        }), window.Shopify.loadFeatures([{
            name: "shopify-xr",
            version: "1.0",
            onLoad: r
        }, {
            name: "model-viewer-ui",
            version: "1.0",
            onLoad: c
        }]), velatheme.LibraryLoader.load("modelViewerUiStyles")
    }

    function r(p) {
        if (!p) {
            if (!window.ShopifyXR) {
                document.addEventListener("shopify_xr_initialized", function() {
                    r()
                });
                return
            }
            for (var h in t)
                if (t.hasOwnProperty(h)) {
                    var g = t[h];
                    if (g.loaded) continue;
                    var v = $("#ModelJson-" + h);
                    window.ShopifyXR.addModels(JSON.parse(v.html())), g.loaded = !0
                } window.ShopifyXR.setupXRElements()
        }
    }

    function c(p) {
        if (!p) {
            for (var h in a)
                if (a.hasOwnProperty(h)) {
                    var g = a[h];
                    g.modelViewerUi || (g.modelViewerUi = new Shopify.ModelViewerUI(g.$element)), s(g)
                }
        }
    }

    function s(p) {
        var h = o[p.sectionId];
        p.$container.on("mediaVisible", function() {
            h.$element.attr("data-shopify-model3d-id", p.modelId), !velatheme.Helpers.isTouch() && p.modelViewerUi.play()
        }), p.$container.on("mediaHidden", function() {
            h.$element.attr("data-shopify-model3d-id", h.defaultId), p.modelViewerUi.pause()
        }).on("xrLaunch", function() {
            p.modelViewerUi.pause()
        })
    }

    function l(p) {
        for (var h in a)
            if (a.hasOwnProperty(h)) {
                var g = a[h];
                g.sectionId === p && (a[h].modelViewerUi.destroy(), delete a[h])
            } delete t[p]
    }
    return {
        init: n,
        removeSectionModels: l
    }
}(), velatheme.Product = {}, velatheme.Product = function() {
    function t(a) {
        var o = this.$container = $(a),
            e = o.attr("data-section-id");
        this.settings = {
            mediaQueryMediumUp: "screen and (min-width: 767px)",
            mediaQuerySmall: "screen and (max-width: 749px)",
            bpSmall: !1,
            enableHistoryState: o.data("enable-history-state") || !1,
            namespace: ".slideshow-" + e,
            sectionId: e
        }, this.selectors = {
            productMediaWrapper: "[data-product-single-media-wrapper]",
            productThumbImages: ".product-single__thumbnail--" + e,
            productThumbs: ".product-single__thumbnails-" + e,
            productThumb: ".product-single__thumbnail",
            productThumbListItem: ".product-single__thumbnails-item",
            productThumbsWrapper: ".thumbnails-wrapper",
            productMediaTypeVideo: "[data-product-media-type-video]",
            productMediaTypeModel: "[data-product-media-type-model]"
        }, this.classes = {
            hidden: "hide",
            visibilityHidden: "visibility-hidden",
            activeClass: "active-thumb"
        }, this.$loaderStatus = $(this.selectors.loaderStatus, o), $("#ProductJson-" + e).html() && (this.productSingleObject = JSON.parse(document.getElementById("ProductJson-" + e).innerHTML), this._initMediaSwitch(), this._initProductVideo(), this._initModelViewerLibraries(), this._initShopifyXrLaunch())
    }
    return t.prototype = _.assignIn({}, velatheme.Product.prototype, {
        _initProductVideo: function() {
            var a = this.settings.sectionId;
            $(this.selectors.productMediaTypeVideo, this.$container).each(function() {
                var o = $(this);
                velatheme.ProductVideo.init(o, a)
            })
        },
        _initMediaSwitch: function() {
            if (!!$(this.selectors.productThumbImages).length) {
                var a = this;
                $(this.selectors.productThumbImages).on("click", function(o) {
                    o.preventDefault();
                    var e = $(this),
                        n = e.data("thumbnail-id"),
                        r = e.data("stype"),
                        c = e.data("zoom-image");
                    $("#ProductPhotoImg").attr("data-zoom-image", c), r == "image" ? ($("#groupProImage").css("display", "block"), $("#groupMedia").css("display", "none")) : ($("#groupProImage").css("display", "none"), $("#groupMedia").css("display", "block")), a._switchMedia(n), a._setActiveThumbnail(n)
                }).on("keyup", a._handleMediaFocus.bind(a))
            }
        },
        _setActiveThumbnail: function(a) {
            typeof a == "undefined" && (a = $(this.selectors.productMediaWrapper + ":not(.hide)", this.$container).data("media-id"));
            var o = $(this.selectors.productThumbListItem + ":not(.slick-cloned)", this.$container),
                e = o.find(this.selectors.productThumbImages + "[data-thumbnail-id='" + a + "']");
            $(this.selectors.productThumbImages).removeClass(this.classes.activeClass).removeAttr("aria-current"), e.addClass(this.classes.activeClass), e.attr("aria-current", !0), o.hasClass("slick-slide")
        },
        _switchMedia: function(a) {
            var o = $(this.selectors.productMediaWrapper + ":not(." + this.classes.hidden + ")", this.$container),
                e = $(this.selectors.productMediaWrapper + "[data-media-id='" + a + "']", this.$container),
                n = $(this.selectors.productMediaWrapper + ":not([data-media-id='" + a + "'])", this.$container);
            o.trigger("mediaHidden"), e.removeClass(this.classes.hidden).trigger("mediaVisible"), n.addClass(this.classes.hidden)
        },
        _handleMediaFocus: function(a) {
            if (a.keyCode === slate.utils.keyboardKeys.ENTER) {
                var o = $(a.currentTarget).data("thumbnail-id");
                $(this.selectors.productMediaWrapper + "[data-media-id='" + o + "']", this.$container).focus()
            }
        },
        _initModelViewerLibraries: function() {
            var a = $(this.selectors.productMediaTypeModel, this.$container);
            a.length < 1 || velatheme.ProductModel.init(a, this.settings.sectionId)
        },
        _initShopifyXrLaunch: function() {
            var a = this;
            $(document).on("shopify_xr_launch", function() {
                var o = $(a.selectors.productMediaWrapper + ":not(." + a.classes.hidden + ")", a.$container);
                o.trigger("xrLaunch")
            })
        },
        onUnload: function() {
            this.$container.off(this.settings.namespace), velatheme.ProductVideo.removeSectionVideos(this.settings.sectionId), velatheme.ProductModel.removeSectionModels(this.settings.sectionId)
        }
    }), t
}();

function onYouTubeIframeAPIReady() {
    velatheme.SlideshowVideo.loadVideos(), velatheme.Video.loadVideos(), velatheme.ProductVideo.loadVideos(velatheme.ProductVideo.hosts.youtube)
}
$(document).ready(function() {
    $(vela.init), $("body").on("ajaxCart.afterCartLoad", function(a, o) {
        window.ajaxcart_type == "drawer" && vela.RightDrawer.open()
    });
    var t = new velatheme.Sections;
    t.register("velaSlideshowSection", velatheme.SlideshowSection), t.register("product", velatheme.Product), t.register("vela-template-product", velatheme.Product)
}), $(window).on("load", function() {
    $(vela.productImage)
});
//# sourceMappingURL=/s/files/1/1573/5553/t/43/assets/vela.js.map?v=105199010723301478381618026699