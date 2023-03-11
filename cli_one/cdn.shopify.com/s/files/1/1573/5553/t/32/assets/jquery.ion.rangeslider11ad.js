! function(a) {
    "function" === typeof define && define.amd ? define(["jquery"], function(b) {
        a(b, document, window, navigator)
    }) : a(jQuery, document, window, navigator)
}(function(a, b, c, d) {
    "use strict";
    var f = 0,
        g = function() {
            var e, b = d.userAgent,
                c = /msie\s\d+/i;
            return b.search(c) > 0 && (e = c.exec(b).toString(), e = e.split(" ")[1], e < 9) ? (a("html").addClass("lt-ie9"), !0) : !1
        }();
    Function.prototype.bind || (Function.prototype.bind = function(a) {
        var b = this,
            c = [].slice;
        if ("function" != typeof b) throw new TypeError;
        var d = c.call(arguments, 1),
            e = function() {
                if (this instanceof e) {
                    var f = function() {};
                    f.prototype = b.prototype;
                    var g = new f,
                        h = b.apply(g, d.concat(c.call(arguments)));
                    return Object(h) === h ? h : g
                }
                return b.apply(a, d.concat(c.call(arguments)))
            };
        return e
    }), Array.prototype.indexOf || (Array.prototype.indexOf = function(a, b) {
        var c;
        if (null == this) throw new TypeError('"this" is null or not defined');
        var d = Object(this),
            e = d.length >>> 0;
        if (0 === e) return -1;
        var f = +b || 0;
        if (1 / 0 === Math.abs(f) && (f = 0), f >= e) return -1;
        for (c = Math.max(f >= 0 ? f : e - Math.abs(f), 0); c < e;) {
            if (c in d && d[c] === a) return c;
            c++
        }
        return -1
    });
    var h = '<span class="irs"><span class="irs-line" tabindex="-1"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min">0</span><span class="irs-max">1</span><span class="irs-from">0</span><span class="irs-to">0</span><span class="irs-single">0</span></span><span class="irs-grid"></span><span class="irs-bar"></span>',
        i = '<span class="irs-bar-edge"></span><span class="irs-shadow shadow-single"></span><span class="irs-slider single"></span>',
        j = '<span class="irs-shadow shadow-from"></span><span class="irs-shadow shadow-to"></span><span class="irs-slider from"></span><span class="irs-slider to"></span>',
        k = '<span class="irs-disable-mask"></span>',
        l = function(d, e, f) {
            this.VERSION = "2.1.4", this.input = d, this.plugin_count = f, this.current_plugin = 0, this.calc_count = 0, this.update_tm = 0, this.old_from = 0, this.old_to = 0, this.old_min_interval = null, this.raf_id = null, this.dragging = !1, this.force_redraw = !1, this.no_diapason = !1, this.is_key = !1, this.is_update = !1, this.is_start = !0, this.is_finish = !1, this.is_active = !1, this.is_resize = !1, this.is_click = !1, this.$cache = {
                win: a(c),
                body: a(b.body),
                input: a(d),
                cont: null,
                rs: null,
                min: null,
                max: null,
                from: null,
                to: null,
                single: null,
                bar: null,
                line: null,
                s_single: null,
                s_from: null,
                s_to: null,
                shad_single: null,
                shad_from: null,
                shad_to: null,
                edge: null,
                grid: null,
                grid_labels: []
            }, this.coords = {
                x_gap: 0,
                x_pointer: 0,
                w_rs: 0,
                w_rs_old: 0,
                w_handle: 0,
                p_gap: 0,
                p_gap_left: 0,
                p_gap_right: 0,
                p_step: 0,
                p_pointer: 0,
                p_handle: 0,
                p_single_fake: 0,
                p_single_real: 0,
                p_from_fake: 0,
                p_from_real: 0,
                p_to_fake: 0,
                p_to_real: 0,
                p_bar_x: 0,
                p_bar_w: 0,
                grid_gap: 0,
                big_num: 0,
                big: [],
                big_w: [],
                big_p: [],
                big_x: []
            }, this.labels = {
                w_min: 0,
                w_max: 0,
                w_from: 0,
                w_to: 0,
                w_single: 0,
                p_min: 0,
                p_max: 0,
                p_from_fake: 0,
                p_from_left: 0,
                p_to_fake: 0,
                p_to_left: 0,
                p_single_fake: 0,
                p_single_left: 0
            };
            var i, j, k, g = this.$cache.input,
                h = g.prop("value");
            i = {
                type: "single",
                min: 10,
                max: 100,
                from: null,
                to: null,
                step: 1,
                min_interval: 0,
                max_interval: 0,
                drag_interval: !1,
                values: [],
                p_values: [],
                from_fixed: !1,
                from_min: null,
                from_max: null,
                from_shadow: !1,
                to_fixed: !1,
                to_min: null,
                to_max: null,
                to_shadow: !1,
                prettify_enabled: !0,
                prettify_separator: " ",
                prettify: null,
                force_edges: !1,
                keyboard: !1,
                keyboard_step: 5,
                grid: !1,
                grid_margin: !0,
                grid_num: 4,
                grid_snap: !1,
                hide_min_max: !1,
                hide_from_to: !1,
                prefix: "",
                postfix: "",
                max_postfix: "",
                decorate_both: !0,
                values_separator: " \u2014 ",
                input_values_separator: ";",
                disable: !1,
                onStart: null,
                onChange: null,
                onFinish: null,
                onUpdate: null
            }, j = {
                type: g.data("type"),
                min: g.data("min"),
                max: g.data("max"),
                from: g.data("from"),
                to: g.data("to"),
                step: g.data("step"),
                min_interval: g.data("minInterval"),
                max_interval: g.data("maxInterval"),
                drag_interval: g.data("dragInterval"),
                values: g.data("values"),
                from_fixed: g.data("fromFixed"),
                from_min: g.data("fromMin"),
                from_max: g.data("fromMax"),
                from_shadow: g.data("fromShadow"),
                to_fixed: g.data("toFixed"),
                to_min: g.data("toMin"),
                to_max: g.data("toMax"),
                to_shadow: g.data("toShadow"),
                prettify_enabled: g.data("prettifyEnabled"),
                prettify_separator: g.data("prettifySeparator"),
                force_edges: g.data("forceEdges"),
                keyboard: g.data("keyboard"),
                keyboard_step: g.data("keyboardStep"),
                grid: g.data("grid"),
                grid_margin: g.data("gridMargin"),
                grid_num: g.data("gridNum"),
                grid_snap: g.data("gridSnap"),
                hide_min_max: g.data("hideMinMax"),
                hide_from_to: g.data("hideFromTo"),
                prefix: g.data("prefix"),
                postfix: g.data("postfix"),
                max_postfix: g.data("maxPostfix"),
                decorate_both: g.data("decorateBoth"),
                values_separator: g.data("valuesSeparator"),
                input_values_separator: g.data("inputValuesSeparator"),
                disable: g.data("disable")
            }, j.values = j.values && j.values.split(",");
            for (k in j) j.hasOwnProperty(k) && (j[k] || 0 === j[k] || delete j[k]);
            h && (h = h.split(j.input_values_separator || e.input_values_separator || ";"), h[0] && h[0] == +h[0] && (h[0] = +h[0]), h[1] && h[1] == +h[1] && (h[1] = +h[1]), e && e.values && e.values.length ? (i.from = h[0] && e.values.indexOf(h[0]), i.to = h[1] && e.values.indexOf(h[1])) : (i.from = h[0] && +h[0], i.to = h[1] && +h[1])), a.extend(i, e), a.extend(i, j), this.options = i, this.validate(), this.result = {
                input: this.$cache.input,
                slider: null,
                min: this.options.min,
                max: this.options.max,
                from: this.options.from,
                from_percent: 0,
                from_value: null,
                to: this.options.to,
                to_percent: 0,
                to_value: null
            }, this.init()
        };
    l.prototype = {
            init: function(a) {
                this.no_diapason = !1, this.coords.p_step = this.convertToPercent(this.options.step, !0), this.target = "base", this.toggleInput(), this.append(), this.setMinMax(), a ? (this.force_redraw = !0, this.calc(!0), this.callOnUpdate()) : (this.force_redraw = !0, this.calc(!0), this.callOnStart()), this.updateScene()
            },
            append: function() {
                var a = '<span class="irs js-irs-' + this.plugin_count + '"></span>';
                this.$cache.input.before(a), this.$cache.input.prop("readonly", !0), this.$cache.cont = this.$cache.input.prev(), this.result.slider = this.$cache.cont, this.$cache.cont.html(h), this.$cache.rs = this.$cache.cont.find(".irs"), this.$cache.min = this.$cache.cont.find(".irs-min"), this.$cache.max = this.$cache.cont.find(".irs-max"), this.$cache.from = this.$cache.cont.find(".irs-from"), this.$cache.to = this.$cache.cont.find(".irs-to"), this.$cache.single = this.$cache.cont.find(".irs-single"), this.$cache.bar = this.$cache.cont.find(".irs-bar"), this.$cache.line = this.$cache.cont.find(".irs-line"), this.$cache.grid = this.$cache.cont.find(".irs-grid"), "single" === this.options.type ? (this.$cache.cont.append(i), this.$cache.edge = this.$cache.cont.find(".irs-bar-edge"), this.$cache.s_single = this.$cache.cont.find(".single"), this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.shad_single = this.$cache.cont.find(".shadow-single")) : (this.$cache.cont.append(j), this.$cache.s_from = this.$cache.cont.find(".from"), this.$cache.s_to = this.$cache.cont.find(".to"), this.$cache.shad_from = this.$cache.cont.find(".shadow-from"), this.$cache.shad_to = this.$cache.cont.find(".shadow-to"), this.setTopHandler()), this.options.hide_from_to && (this.$cache.from[0].style.display = "none", this.$cache.to[0].style.display = "none", this.$cache.single[0].style.display = "none"), this.appendGrid(), this.options.disable ? (this.appendDisableMask(), this.$cache.input[0].disabled = !0) : (this.$cache.cont.removeClass("irs-disabled"), this.$cache.input[0].disabled = !1, this.bindEvents()), this.options.drag_interval && (this.$cache.bar[0].style.cursor = "ew-resize")
            },
            setTopHandler: function() {
                var a = this.options.min,
                    b = this.options.max,
                    c = this.options.from,
                    d = this.options.to;
                c > a && d === b ? this.$cache.s_from.addClass("type_last") : d < b && this.$cache.s_to.addClass("type_last")
            },
            changeLevel: function(a) {
                switch (a) {
                    case "single":
                        this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_single_fake);
                        break;
                    case "from":
                        this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_from_fake), this.$cache.s_from.addClass("state_hover"), this.$cache.s_from.addClass("type_last"), this.$cache.s_to.removeClass("type_last");
                        break;
                    case "to":
                        this.coords.p_gap = this.toFixed(this.coords.p_pointer - this.coords.p_to_fake), this.$cache.s_to.addClass("state_hover"), this.$cache.s_to.addClass("type_last"), this.$cache.s_from.removeClass("type_last");
                        break;
                    case "both":
                        this.coords.p_gap_left = this.toFixed(this.coords.p_pointer - this.coords.p_from_fake), this.coords.p_gap_right = this.toFixed(this.coords.p_to_fake - this.coords.p_pointer), this.$cache.s_to.removeClass("type_last"), this.$cache.s_from.removeClass("type_last")
                }
            },
            appendDisableMask: function() {
                this.$cache.cont.append(k), this.$cache.cont.addClass("irs-disabled")
            },
            remove: function() {
                this.$cache.cont.remove(), this.$cache.cont = null, this.$cache.line.off("keydown.irs_" + this.plugin_count), this.$cache.body.off("touchmove.irs_" + this.plugin_count), this.$cache.body.off("mousemove.irs_" + this.plugin_count), this.$cache.win.off("touchend.irs_" + this.plugin_count), this.$cache.win.off("mouseup.irs_" + this.plugin_count), g && (this.$cache.body.off("mouseup.irs_" + this.plugin_count), this.$cache.body.off("mouseleave.irs_" + this.plugin_count)), this.$cache.grid_labels = [], this.coords.big = [], this.coords.big_w = [], this.coords.big_p = [], this.coords.big_x = [], cancelAnimationFrame(this.raf_id)
            },
            bindEvents: function() {
                this.no_diapason || (this.$cache.body.on("touchmove.irs_" + this.plugin_count, this.pointerMove.bind(this)), this.$cache.body.on("mousemove.irs_" + this.plugin_count, this.pointerMove.bind(this)), this.$cache.win.on("touchend.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.win.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.line.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.line.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.options.drag_interval && "double" === this.options.type ? (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "both")), this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "both"))) : (this.$cache.bar.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.bar.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))), "single" === this.options.type ? (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.s_single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.shad_single.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.s_single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "single")), this.$cache.edge.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_single.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))) : (this.$cache.single.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, null)), this.$cache.single.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, null)), this.$cache.from.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("touchstart.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("touchstart.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.s_from.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "from")), this.$cache.to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.s_to.on("mousedown.irs_" + this.plugin_count, this.pointerDown.bind(this, "to")), this.$cache.shad_from.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click")), this.$cache.shad_to.on("mousedown.irs_" + this.plugin_count, this.pointerClick.bind(this, "click"))), this.options.keyboard && this.$cache.line.on("keydown.irs_" + this.plugin_count, this.key.bind(this, "keyboard")), g && (this.$cache.body.on("mouseup.irs_" + this.plugin_count, this.pointerUp.bind(this)), this.$cache.body.on("mouseleave.irs_" + this.plugin_count, this.pointerUp.bind(this))))
            },
            pointerMove: function(a) {
                if (this.dragging) {
                    var b = a.pageX || a.originalEvent.touches && a.originalEvent.touches[0].pageX;
                    this.coords.x_pointer = b - this.coords.x_gap, this.calc()
                }
            },
            pointerUp: function(b) {
                this.current_plugin === this.plugin_count && this.is_active && (this.is_active = !1, this.$cache.cont.find(".state_hover").removeClass("state_hover"), this.force_redraw = !0, g && a("*").prop("unselectable", !1), this.updateScene(), this.restoreOriginalMinInterval(), (a.contains(this.$cache.cont[0], b.target) || this.dragging) && (this.is_finish = !0, this.callOnFinish()), this.dragging = !1)
            },
            pointerDown: function(b, c) {
                c.preventDefault();
                var d = c.pageX || c.originalEvent.touches && c.originalEvent.touches[0].pageX;
                2 !== c.button && ("both" === b && this.setTempMinInterval(), b || (b = this.target), this.current_plugin = this.plugin_count, this.target = b, this.is_active = !0, this.dragging = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = d - this.coords.x_gap, this.calcPointerPercent(), this.changeLevel(b), g && a("*").prop("unselectable", !0), this.$cache.line.trigger("focus"), this.updateScene())
            },
            pointerClick: function(a, b) {
                b.preventDefault();
                var c = b.pageX || b.originalEvent.touches && b.originalEvent.touches[0].pageX;
                2 !== b.button && (this.current_plugin = this.plugin_count, this.target = a, this.is_click = !0, this.coords.x_gap = this.$cache.rs.offset().left, this.coords.x_pointer = +(c - this.coords.x_gap).toFixed(), this.force_redraw = !0, this.calc(), this.$cache.line.trigger("focus"))
            },
            key: function(a, b) {
                if (!(this.current_plugin !== this.plugin_count || b.altKey || b.ctrlKey || b.shiftKey || b.metaKey)) {
                    switch (b.which) {
                        case 83:
                        case 65:
                        case 40:
                        case 37:
                            b.preventDefault(), this.moveByKey(!1);
                            break;
                        case 87:
                        case 68:
                        case 38:
                        case 39:
                            b.preventDefault(), this.moveByKey(!0)
                    }
                    return !0
                }
            },
            moveByKey: function(a) {
                var b = this.coords.p_pointer;
                a ? b += this.options.keyboard_step : b -= this.options.keyboard_step, this.coords.x_pointer = this.toFixed(this.coords.w_rs / 100 * b), this.is_key = !0, this.calc()
            },
            setMinMax: function() {
                if (this.options) {
                    if (this.options.hide_min_max) return this.$cache.min[0].style.display = "none", void(this.$cache.max[0].style.display = "none");
                    this.options.values.length ? (this.$cache.min.html(this.decorate(this.options.p_values[this.options.min])), this.$cache.max.html(this.decorate(this.options.p_values[this.options.max]))) : (this.$cache.min.html(this.decorate(this._prettify(this.options.min), this.options.min)), this.$cache.max.html(this.decorate(this._prettify(this.options.max), this.options.max))), this.labels.w_min = this.$cache.min.outerWidth(!1), this.labels.w_max = this.$cache.max.outerWidth(!1)
                }
            },
            setTempMinInterval: function() {
                var a = this.result.to - this.result.from;
                null === this.old_min_interval && (this.old_min_interval = this.options.min_interval), this.options.min_interval = a
            },
            restoreOriginalMinInterval: function() {
                null !== this.old_min_interval && (this.options.min_interval = this.old_min_interval, this.old_min_interval = null)
            },
            calc: function(a) {
                if (this.options && (this.calc_count++, (10 === this.calc_count || a) && (this.calc_count = 0, this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.calcHandlePercent()), this.coords.w_rs)) {
                    this.calcPointerPercent();
                    var b = this.getHandleX();
                    switch ("click" === this.target && (this.coords.p_gap = this.coords.p_handle / 2, b = this.getHandleX(), this.target = this.options.drag_interval ? "both_one" : this.chooseHandle(b)), this.target) {
                        case "base":
                            var c = (this.options.max - this.options.min) / 100,
                                d = (this.result.from - this.options.min) / c,
                                e = (this.result.to - this.options.min) / c;
                            this.coords.p_single_real = this.toFixed(d), this.coords.p_from_real = this.toFixed(d), this.coords.p_to_real = this.toFixed(e), this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_single_fake = this.convertToFakePercent(this.coords.p_single_real), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real), this.target = null;
                            break;
                        case "single":
                            if (this.options.from_fixed) break;
                            this.coords.p_single_real = this.convertToRealPercent(b), this.coords.p_single_real = this.calcWithStep(this.coords.p_single_real), this.coords.p_single_real = this.checkDiapason(this.coords.p_single_real, this.options.from_min, this.options.from_max), this.coords.p_single_fake = this.convertToFakePercent(this.coords.p_single_real);
                            break;
                        case "from":
                            if (this.options.from_fixed) break;
                            this.coords.p_from_real = this.convertToRealPercent(b), this.coords.p_from_real = this.calcWithStep(this.coords.p_from_real), this.coords.p_from_real > this.coords.p_to_real && (this.coords.p_from_real = this.coords.p_to_real), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from_real = this.checkMaxInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real);
                            break;
                        case "to":
                            if (this.options.to_fixed) break;
                            this.coords.p_to_real = this.convertToRealPercent(b), this.coords.p_to_real = this.calcWithStep(this.coords.p_to_real), this.coords.p_to_real < this.coords.p_from_real && (this.coords.p_to_real = this.coords.p_from_real), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to_real = this.checkMaxInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real);
                            break;
                        case "both":
                            if (this.options.from_fixed || this.options.to_fixed) break;
                            b = this.toFixed(b + .1 * this.coords.p_handle), this.coords.p_from_real = this.convertToRealPercent(b) - this.coords.p_gap_left, this.coords.p_from_real = this.calcWithStep(this.coords.p_from_real), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_real = this.checkMinInterval(this.coords.p_from_real, this.coords.p_to_real, "from"), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real), this.coords.p_to_real = this.convertToRealPercent(b) + this.coords.p_gap_right, this.coords.p_to_real = this.calcWithStep(this.coords.p_to_real), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_to_real = this.checkMinInterval(this.coords.p_to_real, this.coords.p_from_real, "to"), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real);
                            break;
                        case "both_one":
                            if (this.options.from_fixed || this.options.to_fixed) break;
                            var f = this.convertToRealPercent(b),
                                g = this.result.from_percent,
                                h = this.result.to_percent,
                                i = h - g,
                                j = i / 2,
                                k = f - j,
                                l = f + j;
                            k < 0 && (k = 0, l = k + i), l > 100 && (l = 100, k = l - i), this.coords.p_from_real = this.calcWithStep(k), this.coords.p_from_real = this.checkDiapason(this.coords.p_from_real, this.options.from_min, this.options.from_max), this.coords.p_from_fake = this.convertToFakePercent(this.coords.p_from_real), this.coords.p_to_real = this.calcWithStep(l), this.coords.p_to_real = this.checkDiapason(this.coords.p_to_real, this.options.to_min, this.options.to_max), this.coords.p_to_fake = this.convertToFakePercent(this.coords.p_to_real)
                    }
                    "single" === this.options.type ? (this.coords.p_bar_x = this.coords.p_handle / 2, this.coords.p_bar_w = this.coords.p_single_fake, this.result.from_percent = this.coords.p_single_real, this.result.from = this.convertToValue(this.coords.p_single_real), this.options.values.length && (this.result.from_value = this.options.values[this.result.from])) : (this.coords.p_bar_x = this.toFixed(this.coords.p_from_fake + this.coords.p_handle / 2), this.coords.p_bar_w = this.toFixed(this.coords.p_to_fake - this.coords.p_from_fake), this.result.from_percent = this.coords.p_from_real, this.result.from = this.convertToValue(this.coords.p_from_real), this.result.to_percent = this.coords.p_to_real, this.result.to = this.convertToValue(this.coords.p_to_real), this.options.values.length && (this.result.from_value = this.options.values[this.result.from], this.result.to_value = this.options.values[this.result.to])), this.calcMinMax(), this.calcLabels()
                }
            },
            calcPointerPercent: function() {
                return this.coords.w_rs ? (this.coords.x_pointer < 0 || isNaN(this.coords.x_pointer) ? this.coords.x_pointer = 0 : this.coords.x_pointer > this.coords.w_rs && (this.coords.x_pointer = this.coords.w_rs), void(this.coords.p_pointer = this.toFixed(this.coords.x_pointer / this.coords.w_rs * 100))) : void(this.coords.p_pointer = 0)
            },
            convertToRealPercent: function(a) {
                var b = 100 - this.coords.p_handle;
                return a / b * 100
            },
            convertToFakePercent: function(a) {
                var b = 100 - this.coords.p_handle;
                return a / 100 * b
            },
            getHandleX: function() {
                var a = 100 - this.coords.p_handle,
                    b = this.toFixed(this.coords.p_pointer - this.coords.p_gap);
                return b < 0 ? b = 0 : b > a && (b = a), b
            },
            calcHandlePercent: function() {
                this.coords.w_handle = "single" === this.options.type ? this.$cache.s_single.outerWidth(!1) : this.$cache.s_from.outerWidth(!1), this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100)
            },
            chooseHandle: function(a) {
                if ("single" === this.options.type) return "single";
                var b = this.coords.p_from_real + (this.coords.p_to_real - this.coords.p_from_real) / 2;
                return a >= b ? this.options.to_fixed ? "from" : "to" : this.options.from_fixed ? "to" : "from"
            },
            calcMinMax: function() {
                this.coords.w_rs && (this.labels.p_min = this.labels.w_min / this.coords.w_rs * 100, this.labels.p_max = this.labels.w_max / this.coords.w_rs * 100)
            },
            calcLabels: function() {
                this.coords.w_rs && !this.options.hide_from_to && ("single" === this.options.type ? (this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single_fake = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = this.coords.p_single_fake + this.coords.p_handle / 2 - this.labels.p_single_fake / 2, this.labels.p_single_left = this.checkEdges(this.labels.p_single_left, this.labels.p_single_fake)) : (this.labels.w_from = this.$cache.from.outerWidth(!1), this.labels.p_from_fake = this.labels.w_from / this.coords.w_rs * 100, this.labels.p_from_left = this.coords.p_from_fake + this.coords.p_handle / 2 - this.labels.p_from_fake / 2, this.labels.p_from_left = this.toFixed(this.labels.p_from_left), this.labels.p_from_left = this.checkEdges(this.labels.p_from_left, this.labels.p_from_fake), this.labels.w_to = this.$cache.to.outerWidth(!1), this.labels.p_to_fake = this.labels.w_to / this.coords.w_rs * 100, this.labels.p_to_left = this.coords.p_to_fake + this.coords.p_handle / 2 - this.labels.p_to_fake / 2, this.labels.p_to_left = this.toFixed(this.labels.p_to_left), this.labels.p_to_left = this.checkEdges(this.labels.p_to_left, this.labels.p_to_fake), this.labels.w_single = this.$cache.single.outerWidth(!1), this.labels.p_single_fake = this.labels.w_single / this.coords.w_rs * 100, this.labels.p_single_left = (this.labels.p_from_left + this.labels.p_to_left + this.labels.p_to_fake) / 2 - this.labels.p_single_fake / 2, this.labels.p_single_left = this.toFixed(this.labels.p_single_left), this.labels.p_single_left = this.checkEdges(this.labels.p_single_left, this.labels.p_single_fake)))
            },
            updateScene: function() {
                this.raf_id && (cancelAnimationFrame(this.raf_id), this.raf_id = null), clearTimeout(this.update_tm), this.update_tm = null, this.options && (this.drawHandles(), this.is_active ? this.raf_id = requestAnimationFrame(this.updateScene.bind(this)) : this.update_tm = setTimeout(this.updateScene.bind(this), 300))
            },
            drawHandles: function() {
                this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.coords.w_rs && (this.coords.w_rs !== this.coords.w_rs_old && (this.target = "base", this.is_resize = !0), (this.coords.w_rs !== this.coords.w_rs_old || this.force_redraw) && (this.setMinMax(), this.calc(!0), this.drawLabels(), this.options.grid && (this.calcGridMargin(), this.calcGridLabels()), this.force_redraw = !0, this.coords.w_rs_old = this.coords.w_rs, this.drawShadow()), this.coords.w_rs && (this.dragging || this.force_redraw || this.is_key) && ((this.old_from !== this.result.from || this.old_to !== this.result.to || this.force_redraw || this.is_key) && (this.drawLabels(), this.$cache.bar[0].style.left = this.coords.p_bar_x + "%", this.$cache.bar[0].style.width = this.coords.p_bar_w + "%", "single" === this.options.type ? (this.$cache.s_single[0].style.left = this.coords.p_single_fake + "%", this.$cache.single[0].style.left = this.labels.p_single_left + "%", this.options.values.length ? this.$cache.input.prop("value", this.result.from_value) : this.$cache.input.prop("value", this.result.from), this.$cache.input.data("from", this.result.from)) : (this.$cache.s_from[0].style.left = this.coords.p_from_fake + "%", this.$cache.s_to[0].style.left = this.coords.p_to_fake + "%", (this.old_from !== this.result.from || this.force_redraw) && (this.$cache.from[0].style.left = this.labels.p_from_left + "%"), (this.old_to !== this.result.to || this.force_redraw) && (this.$cache.to[0].style.left = this.labels.p_to_left + "%"), this.$cache.single[0].style.left = this.labels.p_single_left + "%", this.options.values.length ? this.$cache.input.prop("value", this.result.from_value + this.options.input_values_separator + this.result.to_value) : this.$cache.input.prop("value", this.result.from + this.options.input_values_separator + this.result.to), this.$cache.input.data("from", this.result.from), this.$cache.input.data("to", this.result.to)), this.old_from === this.result.from && this.old_to === this.result.to || this.is_start || this.$cache.input.trigger("change"), this.old_from = this.result.from, this.old_to = this.result.to, this.is_resize || this.is_update || this.is_start || this.is_finish || this.callOnChange(), (this.is_key || this.is_click) && (this.is_key = !1, this.is_click = !1, this.callOnFinish()), this.is_update = !1, this.is_resize = !1, this.is_finish = !1), this.is_start = !1, this.is_key = !1, this.is_click = !1, this.force_redraw = !1))
            },
            drawLabels: function() {
                if (this.options) {
                    var c, d, e, a = this.options.values.length,
                        b = this.options.p_values;
                    if (!this.options.hide_from_to)
                        if ("single" === this.options.type) a ? (c = this.decorate(b[this.result.from]), this.$cache.single.html(c)) : (c = this.decorate(this._prettify(this.result.from), this.result.from), this.$cache.single.html(c)), this.calcLabels(), this.$cache.min[0].style.visibility = this.labels.p_single_left < this.labels.p_min + 1 ? "hidden" : "visible", this.$cache.max[0].style.visibility = this.labels.p_single_left + this.labels.p_single_fake > 100 - this.labels.p_max - 1 ? "hidden" : "visible";
                        else {
                            a ? (this.options.decorate_both ? (c = this.decorate(b[this.result.from]), c += this.options.values_separator, c += this.decorate(b[this.result.to])) : c = this.decorate(b[this.result.from] + this.options.values_separator + b[this.result.to]), d = this.decorate(b[this.result.from]), e = this.decorate(b[this.result.to]), this.$cache.single.html(c), this.$cache.from.html(d), this.$cache.to.html(e)) : (this.options.decorate_both ? (c = this.decorate(this._prettify(this.result.from), this.result.from), c += this.options.values_separator, c += this.decorate(this._prettify(this.result.to), this.result.to)) : c = this.decorate(this._prettify(this.result.from) + this.options.values_separator + this._prettify(this.result.to), this.result.to), d = this.decorate(this._prettify(this.result.from), this.result.from), e = this.decorate(this._prettify(this.result.to), this.result.to), this.$cache.single.html(c), this.$cache.from.html(d), this.$cache.to.html(e)), this.calcLabels();
                            var f = Math.min(this.labels.p_single_left, this.labels.p_from_left),
                                g = this.labels.p_single_left + this.labels.p_single_fake,
                                h = this.labels.p_to_left + this.labels.p_to_fake,
                                i = Math.max(g, h);
                            this.labels.p_from_left + this.labels.p_from_fake >= this.labels.p_to_left ? (this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.single[0].style.visibility = "visible", this.result.from === this.result.to ? ("from" === this.target ? this.$cache.from[0].style.visibility = "visible" : "to" === this.target ? this.$cache.to[0].style.visibility = "visible" : this.target || (this.$cache.from[0].style.visibility = "visible"), this.$cache.single[0].style.visibility = "hidden", i = h) : (this.$cache.from[0].style.visibility = "hidden", this.$cache.to[0].style.visibility = "hidden", this.$cache.single[0].style.visibility = "visible", i = Math.max(g, h))) : (this.$cache.from[0].style.visibility = "visible", this.$cache.to[0].style.visibility = "visible", this.$cache.single[0].style.visibility = "hidden"), this.$cache.min[0].style.visibility = f < this.labels.p_min + 1 ? "hidden" : "visible", this.$cache.max[0].style.visibility = i > 100 - this.labels.p_max - 1 ? "hidden" : "visible"
                        }
                }
            },
            drawShadow: function() {
                var g, h, i, j, a = this.options,
                    b = this.$cache,
                    c = "number" === typeof a.from_min && !isNaN(a.from_min),
                    d = "number" === typeof a.from_max && !isNaN(a.from_max),
                    e = "number" === typeof a.to_min && !isNaN(a.to_min),
                    f = "number" === typeof a.to_max && !isNaN(a.to_max);
                "single" === a.type ? a.from_shadow && (c || d) ? (g = this.convertToPercent(c ? a.from_min : a.min), h = this.convertToPercent(d ? a.from_max : a.max) - g, g = this.toFixed(g - this.coords.p_handle / 100 * g), h = this.toFixed(h - this.coords.p_handle / 100 * h), g += this.coords.p_handle / 2, b.shad_single[0].style.display = "block", b.shad_single[0].style.left = g + "%", b.shad_single[0].style.width = h + "%") : b.shad_single[0].style.display = "none" : (a.from_shadow && (c || d) ? (g = this.convertToPercent(c ? a.from_min : a.min), h = this.convertToPercent(d ? a.from_max : a.max) - g, g = this.toFixed(g - this.coords.p_handle / 100 * g), h = this.toFixed(h - this.coords.p_handle / 100 * h), g += this.coords.p_handle / 2, b.shad_from[0].style.display = "block", b.shad_from[0].style.left = g + "%", b.shad_from[0].style.width = h + "%") : b.shad_from[0].style.display = "none", a.to_shadow && (e || f) ? (i = this.convertToPercent(e ? a.to_min : a.min), j = this.convertToPercent(f ? a.to_max : a.max) - i, i = this.toFixed(i - this.coords.p_handle / 100 * i), j = this.toFixed(j - this.coords.p_handle / 100 * j), i += this.coords.p_handle / 2, b.shad_to[0].style.display = "block", b.shad_to[0].style.left = i + "%", b.shad_to[0].style.width = j + "%") : b.shad_to[0].style.display = "none")
            },
            callOnStart: function() {
                this.options.onStart && "function" === typeof this.options.onStart && this.options.onStart(this.result)
            },
            callOnChange: function() {
                this.options.onChange && "function" === typeof this.options.onChange && this.options.onChange(this.result)
            },
            callOnFinish: function() {
                this.options.onFinish && "function" === typeof this.options.onFinish && this.options.onFinish(this.result)
            },
            callOnUpdate: function() {
                this.options.onUpdate && "function" === typeof this.options.onUpdate && this.options.onUpdate(this.result)
            },
            toggleInput: function() {
                this.$cache.input.toggleClass("irs-hidden-input")
            },
            convertToPercent: function(a, b) {
                var e, f, c = this.options.max - this.options.min,
                    d = c / 100;
                return c ? (e = b ? a : a - this.options.min, f = e / d, this.toFixed(f)) : (this.no_diapason = !0, 0)
            },
            convertToValue: function(a) {
                var f, g, b = this.options.min,
                    c = this.options.max,
                    d = b.toString().split(".")[1],
                    e = c.toString().split(".")[1],
                    h = 0,
                    i = 0;
                if (0 === a) return this.options.min;
                if (100 === a) return this.options.max;
                d && (f = d.length, h = f), e && (g = e.length, h = g), f && g && (h = f >= g ? f : g), b < 0 && (i = Math.abs(b), b = +(b + i).toFixed(h), c = +(c + i).toFixed(h));
                var l, j = (c - b) / 100 * a + b,
                    k = this.options.step.toString().split(".")[1];
                return k ? j = +j.toFixed(k.length) : (j /= this.options.step, j *= this.options.step, j = +j.toFixed(0)), i && (j -= i), l = k ? +j.toFixed(k.length) : this.toFixed(j), l < this.options.min ? l = this.options.min : l > this.options.max && (l = this.options.max), l
            },
            calcWithStep: function(a) {
                var b = Math.round(a / this.coords.p_step) * this.coords.p_step;
                return b > 100 && (b = 100), 100 === a && (b = 100), this.toFixed(b)
            },
            checkMinInterval: function(a, b, c) {
                var e, f, d = this.options;
                return d.min_interval ? (e = this.convertToValue(a), f = this.convertToValue(b), "from" === c ? f - e < d.min_interval && (e = f - d.min_interval) : e - f < d.min_interval && (e = f + d.min_interval), this.convertToPercent(e)) : a
            },
            checkMaxInterval: function(a, b, c) {
                var e, f, d = this.options;
                return d.max_interval ? (e = this.convertToValue(a), f = this.convertToValue(b), "from" === c ? f - e > d.max_interval && (e = f - d.max_interval) : e - f > d.max_interval && (e = f + d.max_interval), this.convertToPercent(e)) : a
            },
            checkDiapason: function(a, b, c) {
                var d = this.convertToValue(a),
                    e = this.options;
                return "number" !== typeof b && (b = e.min), "number" !== typeof c && (c = e.max), d < b && (d = b), d > c && (d = c), this.convertToPercent(d)
            },
            toFixed: function(a) {
                return a = a.toFixed(9), +a
            },
            _prettify: function(a) {
                return this.options.prettify_enabled ? this.options.prettify && "function" === typeof this.options.prettify ? this.options.prettify(a) : this.prettify(a) : a
            },
            prettify: function(a) {
                var b = a.toString();
                return b.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + this.options.prettify_separator)
            },
            checkEdges: function(a, b) {
                return this.options.force_edges ? (a < 0 ? a = 0 : a > 100 - b && (a = 100 - b), this.toFixed(a)) : this.toFixed(a)
            },
            validate: function() {
                var e, f, a = this.options,
                    b = this.result,
                    c = a.values,
                    d = c.length;
                if ("string" === typeof a.min && (a.min = +a.min), "string" === typeof a.max && (a.max = +a.max), "string" === typeof a.from && (a.from = +a.from), "string" === typeof a.to && (a.to = +a.to), "string" === typeof a.step && (a.step = +a.step), "string" === typeof a.from_min && (a.from_min = +a.from_min), "string" === typeof a.from_max && (a.from_max = +a.from_max), "string" === typeof a.to_min && (a.to_min = +a.to_min), "string" === typeof a.to_max && (a.to_max = +a.to_max), "string" === typeof a.keyboard_step && (a.keyboard_step = +a.keyboard_step), "string" === typeof a.grid_num && (a.grid_num = +a.grid_num), a.max < a.min && (a.max = a.min), d)
                    for (a.p_values = [], a.min = 0, a.max = d - 1, a.step = 1, a.grid_num = a.max, a.grid_snap = !0, f = 0; f < d; f++) e = +c[f], isNaN(e) ? e = c[f] : (c[f] = e, e = this._prettify(e)), a.p_values.push(e);
                ("number" !== typeof a.from || isNaN(a.from)) && (a.from = a.min), ("number" !== typeof a.to || isNaN(a.from)) && (a.to = a.max), "single" === a.type ? (a.from < a.min && (a.from = a.min), a.from > a.max && (a.from = a.max)) : ((a.from < a.min || a.from > a.max) && (a.from = a.min), (a.to > a.max || a.to < a.min) && (a.to = a.max), a.from > a.to && (a.from = a.to)), ("number" !== typeof a.step || isNaN(a.step) || !a.step || a.step < 0) && (a.step = 1), ("number" !== typeof a.keyboard_step || isNaN(a.keyboard_step) || !a.keyboard_step || a.keyboard_step < 0) && (a.keyboard_step = 5), "number" === typeof a.from_min && a.from < a.from_min && (a.from = a.from_min), "number" === typeof a.from_max && a.from > a.from_max && (a.from = a.from_max), "number" === typeof a.to_min && a.to < a.to_min && (a.to = a.to_min), "number" === typeof a.to_max && a.from > a.to_max && (a.to = a.to_max), b && (b.min !== a.min && (b.min = a.min), b.max !== a.max && (b.max = a.max), (b.from < b.min || b.from > b.max) && (b.from = a.from), (b.to < b.min || b.to > b.max) && (b.to = a.to)), ("number" !== typeof a.min_interval || isNaN(a.min_interval) || !a.min_interval || a.min_interval < 0) && (a.min_interval = 0), ("number" !== typeof a.max_interval || isNaN(a.max_interval) || !a.max_interval || a.max_interval < 0) && (a.max_interval = 0), a.min_interval && a.min_interval > a.max - a.min && (a.min_interval = a.max - a.min), a.max_interval && a.max_interval > a.max - a.min && (a.max_interval = a.max - a.min)
            },
            decorate: function(a, b) {
                var c = "",
                    d = this.options;
                return d.prefix && (c += d.prefix), c += a, d.max_postfix && (d.values.length && a === d.p_values[d.max] ? (c += d.max_postfix, d.postfix && (c += " ")) : b === d.max && (c += d.max_postfix, d.postfix && (c += " "))), d.postfix && (c += d.postfix), c
            },
            updateFrom: function() {
                this.result.from = this.options.from, this.result.from_percent = this.convertToPercent(this.result.from), this.options.values && (this.result.from_value = this.options.values[this.result.from])
            },
            updateTo: function() {
                this.result.to = this.options.to, this.result.to_percent = this.convertToPercent(this.result.to), this.options.values && (this.result.to_value = this.options.values[this.result.to])
            },
            updateResult: function() {
                this.result.min = this.options.min, this.result.max = this.options.max, this.updateFrom(), this.updateTo()
            },
            appendGrid: function() {
                if (this.options.grid) {
                    var b, c, i, j, l, a = this.options,
                        d = a.max - a.min,
                        e = a.grid_num,
                        f = 0,
                        g = 0,
                        h = 4,
                        k = 0,
                        m = "";
                    for (this.calcGridMargin(), a.grid_snap ? (e = d / a.step, f = this.toFixed(a.step / (d / 100))) : f = this.toFixed(100 / e), e > 4 && (h = 3), e > 7 && (h = 2), e > 14 && (h = 1), e > 28 && (h = 0), b = 0; b < e + 1; b++) {
                        for (i = h, g = this.toFixed(f * b), g > 100 && (g = 100, i -= 2, i < 0 && (i = 0)), this.coords.big[b] = g, j = (g - f * (b - 1)) / (i + 1), c = 1; c <= i && 0 !== g; c++) k = this.toFixed(g - j * c), m += '<span class="irs-grid-pol small" style="left: ' + k + '%"></span>';
                        m += '<span class="irs-grid-pol" style="left: ' + g + '%"></span>', l = this.convertToValue(g), l = a.values.length ? a.p_values[l] : this._prettify(l), m += '<span class="irs-grid-text js-grid-text-' + b + '" style="left: ' + g + '%">' + l + "</span>"
                    }
                    this.coords.big_num = Math.ceil(e + 1), this.$cache.cont.addClass("irs-with-grid"), this.$cache.grid.html(m), this.cacheGridLabels()
                }
            },
            cacheGridLabels: function() {
                var a, b, c = this.coords.big_num;
                for (b = 0; b < c; b++) a = this.$cache.grid.find(".js-grid-text-" + b), this.$cache.grid_labels.push(a);
                this.calcGridLabels()
            },
            calcGridLabels: function() {
                var a, b, c = [],
                    d = [],
                    e = this.coords.big_num;
                for (a = 0; a < e; a++) this.coords.big_w[a] = this.$cache.grid_labels[a].outerWidth(!1), this.coords.big_p[a] = this.toFixed(this.coords.big_w[a] / this.coords.w_rs * 100), this.coords.big_x[a] = this.toFixed(this.coords.big_p[a] / 2), c[a] = this.toFixed(this.coords.big[a] - this.coords.big_x[a]), d[a] = this.toFixed(c[a] + this.coords.big_p[a]);
                for (this.options.force_edges && (c[0] < -this.coords.grid_gap && (c[0] = -this.coords.grid_gap, d[0] = this.toFixed(c[0] + this.coords.big_p[0]), this.coords.big_x[0] = this.coords.grid_gap), d[e - 1] > 100 + this.coords.grid_gap && (d[e - 1] = 100 + this.coords.grid_gap, c[e - 1] = this.toFixed(d[e - 1] - this.coords.big_p[e - 1]), this.coords.big_x[e - 1] = this.toFixed(this.coords.big_p[e - 1] - this.coords.grid_gap))), this.calcGridCollision(2, c, d), this.calcGridCollision(4, c, d), a = 0; a < e; a++) b = this.$cache.grid_labels[a][0], b.style.marginLeft = -this.coords.big_x[a] + "%"
            },
            calcGridCollision: function(a, b, c) {
                var d, e, f, g = this.coords.big_num;
                for (d = 0; d < g && (e = d + a / 2, !(e >= g)); d += a) f = this.$cache.grid_labels[e][0], f.style.visibility = c[d] <= b[e] ? "visible" : "hidden"
            },
            calcGridMargin: function() {
                this.options.grid_margin && (this.coords.w_rs = this.$cache.rs.outerWidth(!1), this.coords.w_rs && (this.coords.w_handle = "single" === this.options.type ? this.$cache.s_single.outerWidth(!1) : this.$cache.s_from.outerWidth(!1), this.coords.p_handle = this.toFixed(this.coords.w_handle / this.coords.w_rs * 100), this.coords.grid_gap = this.toFixed(this.coords.p_handle / 2 - .1), this.$cache.grid[0].style.width = this.toFixed(100 - this.coords.p_handle) + "%", this.$cache.grid[0].style.left = this.coords.grid_gap + "%"))
            },
            update: function(b) {
                this.input && (this.is_update = !0, this.options.from = this.result.from, this.options.to = this.result.to, this.options = a.extend(this.options, b), this.validate(), this.updateResult(b), this.toggleInput(), this.remove(), this.init(!0))
            },
            reset: function() {
                this.input && (this.updateResult(), this.update())
            },
            destroy: function() {
                this.input && (this.toggleInput(), this.$cache.input.prop("readonly", !1), a.data(this.input, "ionRangeSlider", null), this.remove(), this.input = null, this.options = null)
            }
        }, a.fn.ionRangeSlider = function(b) {
            return this.each(function() {
                a.data(this, "ionRangeSlider") || a.data(this, "ionRangeSlider", new l(this, b, f++))
            })
        },
        function() {
            for (var a = 0, b = ["ms", "moz", "webkit", "o"], d = 0; d < b.length && !c.requestAnimationFrame; ++d) c.requestAnimationFrame = c[b[d] + "RequestAnimationFrame"], c.cancelAnimationFrame = c[b[d] + "CancelAnimationFrame"] || c[b[d] + "CancelRequestAnimationFrame"];
            c.requestAnimationFrame || (c.requestAnimationFrame = function(b) {
                var e = (new Date).getTime(),
                    f = Math.max(0, 16 - (e - a)),
                    g = c.setTimeout(function() {
                        b(e + f)
                    }, f);
                return a = e + f, g
            }), c.cancelAnimationFrame || (c.cancelAnimationFrame = function(a) {
                clearTimeout(a)
            })
        }()
});