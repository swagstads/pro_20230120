!(function () {
  "use strict";
  const e = "0.0.163",
    t = "product_added_to_cart",
    n = "payment_info_submitted";
  function o() {
    return window;
  }
  let r = "OFF";
  function i(e, t, n) {
    const { jQuery: r } = o();
    r && r(e).bind
      ? r(e).bind(t, n)
      : e.addEventListener && e.addEventListener(t, n);
  }
  function s(e, t) {
    "ON" === r &&
      console &&
      console.warn &&
      console.warn(`[pixel_shop_events_listener] Error in ${e}:  ${t.message}`);
  }
  function a(e) {
    i(window, "load", () => {
      for (const t of document.forms) e(t);
    });
  }
  function c(e, t) {
    a((o) => {
      const r = o.querySelector('[name="previous_step"]');
      r &&
        r instanceof HTMLInputElement &&
        "payment_method" === r.value &&
        i(document.body, "submit", (o) => {
          !(function (e, t, o) {
            const r = t || window.event,
              i = r.target || r.srcElement;
            if (
              i &&
              i instanceof HTMLFormElement &&
              i.getAttribute("action") &&
              null !== i.getAttribute("data-payment-form")
            )
              try {
                const t = o.checkout;
                if (!t) throw new Error("Checkout data not found");
                e(n, { checkout: t });
              } catch (e) {
                s("handleSubmitToPaymentAdd", e);
              }
          })(e, o, t);
        });
    });
  }
  function l() {
    var e, t;
    return (
      (null ===
        (e =
          null === (t = o()) || void 0 === t ? void 0 : t.ShopifyAnalytics) ||
      void 0 === e
        ? void 0
        : e.meta) || {}
    );
  }
  function u(e, t, n) {
    if (t.length !== n.length)
      throw Error("Payload body and response have different number of items");
    t.forEach((t, o) => {
      let r = 1;
      try {
        r = parseInt(n[o].quantity, 10) || 1;
      } catch (e) {
        s("handleBulkItemCartAddResponse", e);
      }
      d(e, t, r);
    });
  }
  function d(e, n, o) {
    const r = l().currency,
      i = {
        id: String(n.id),
        image: { src: n.image },
        price: { amount: n.price / 100, currencyCode: r },
        product: { id: String(n.product_id), title: n.title, vendor: n.vendor },
        sku: n.sku,
        title: n.variant_title,
      },
      s = {
        cost: { totalAmount: { amount: i.price.amount * o, currencyCode: r } },
        merchandise: i,
        quantity: o,
      };
    e(t, { cartLine: s });
  }
  function f(e) {
    if (!e) return 1;
    try {
      return JSON.parse(e).quantity || 1;
    } catch (t) {
      if (e instanceof FormData) {
        if (e.has("quantity")) return Number(e.get("quantity"));
      } else {
        const t = e.split("&");
        for (const e of t) {
          const t = e.split("=");
          if ("quantity" === t[0]) return Number(t[1]);
        }
      }
    }
    return 1;
  }
  function p(e, n, o) {
    const r = n || window.event;
    if (r.defaultPrevented) return;
    const i = r.currentTarget || r.srcElement;
    if (
      i &&
      i instanceof Element &&
      (i.getAttribute("action") || i.getAttribute("href"))
    )
      try {
        const n = (function (e) {
          let t;
          const n = e.querySelector('[name="id"]');
          return (
            n instanceof HTMLSelectElement && n.options
              ? (t = n.options[n.selectedIndex])
              : (n instanceof HTMLOptionElement ||
                  n instanceof HTMLInputElement) &&
                (t = n),
            t
          );
        })(i);
        if (!n) return;
        const r = n.value,
          s = (function (e) {
            const t = e.querySelector('[name="quantity"]');
            return t instanceof HTMLInputElement ? Number(t.value) : 1;
          })(i),
          a = (function (e, t) {
            var n;
            let o;
            const r =
              null === (n = t.productVariants) || void 0 === n
                ? void 0
                : n.filter((t) => t.id === e);
            if (!r || !r.length) throw new Error("Product variant not found");
            return (o = { ...r[0] }), o;
          })(r, o),
          c = {
            cost: {
              totalAmount: {
                amount: a.price.amount * s,
                currencyCode: a.price.currencyCode,
              },
            },
            merchandise: a,
            quantity: s,
          };
        e(t, { cartLine: c });
      } catch (e) {
        s("handleSubmitCartAdd", e);
      }
  }
  class h {
    static handleXhrOpen() {}
    static handleXhrDone(e) {
      try {
        const t = document.createElement("a");
        t.href = e.url;
        const n = t.pathname ? t.pathname : e.url;
        h.ADD_TO_CART_REGEX.test(n) &&
          h.parsePayloadResponse(e, (t) => {
            const n = Object.keys(t);
            if (1 === n.length && "items" === n[0]) {
              const n = t.items;
              let o;
              try {
                o = JSON.parse(e.body).items;
              } catch (t) {
                o = (function (e, t) {
                  const n = new Array(t);
                  for (let e = 0; e < t; e++) n[e] = {};
                  for (const t of decodeURI(e).split("&")) {
                    const e = t.split("="),
                      o = e[0].match(/items\[(\d+)\]\[(\w+)\].*/);
                    if (o) {
                      const t = Number(o[1]),
                        r = o[2];
                      "quantity" === r
                        ? (n[t].quantity = e[1])
                        : "id" === r && (n[t].id = e[1]);
                    }
                  }
                  return n;
                })(e.body, n.length);
              }
              u(e.publish, n, o);
            } else d(e.publish, t, f(e.body));
          });
      } catch (e) {
        s("handleXhrDone", e);
      }
    }
    static parseBlobToJson(e, t) {
      const n = new FileReader();
      n.addEventListener("loadend", () => {
        t(JSON.parse(String.fromCharCode(...new Uint8Array(n.result))));
      }),
        n.readAsArrayBuffer(e);
    }
    static parsePayloadResponse(e, t) {
      e.xhr.response instanceof Blob
        ? h.parseBlobToJson(e.xhr.response, t)
        : e.xhr.responseText && t(JSON.parse(e.xhr.responseText));
    }
    constructor(e, t, n, o, r) {
      (this.oldOnReadyStateChange = void 0),
        (this.xhr = void 0),
        (this.url = void 0),
        (this.method = void 0),
        (this.body = void 0),
        (this.publish = void 0),
        (this.xhr = e),
        (this.url = t),
        (this.method = n),
        (this.body = o),
        (this.publish = r);
    }
    onReadyStateChange() {
      this.xhr.readyState === XMLHttpRequest.DONE &&
        h.handleXhrDone({
          method: this.method,
          url: this.url,
          body: this.body,
          xhr: this.xhr,
          publish: this.publish,
        }),
        this.oldOnReadyStateChange &&
          this.oldOnReadyStateChange.call(
            this.xhr,
            new Event("oldOnReadyStateChange")
          );
    }
  }
  function m(e, t) {
    !(function (e, t) {
      const n = e.prototype.open,
        o = e.prototype.send;
      (e.prototype.open = function (e, t) {
        (this._url = t), (this._method = e), n.apply(this, arguments);
      }),
        (e.prototype.send = function (e) {
          if (!(e instanceof Document)) {
            const n = new h(this, this._url, this._method, e || "", t);
            this.addEventListener
              ? this.addEventListener(
                  "readystatechange",
                  n.onReadyStateChange.bind(n),
                  !1
                )
              : ((n.oldOnReadyStateChange = this.onreadystatechange),
                (this.onreadystatechange = n.onReadyStateChange));
          }
          o.call(this, e);
        });
    })(XMLHttpRequest, e),
      (function (e, t) {
        const n = e.fetch;
        function o(e, n) {
          e.clone()
            .json()
            .then((e) => {
              const o = n.items,
                r = e.items;
              return u(t, r, o), e;
            })
            .catch(i);
        }
        function r(e, n) {
          const o = f(n);
          e.clone()
            .json()
            .then((e) => d(t, e, o))
            .catch(i);
        }
        function i(e) {
          s("handleFetchRequest", e);
        }
        "function" == typeof n &&
          (e.fetch = function (...e) {
            return n.apply(this, Array.prototype.slice.call(e)).then((e) => {
              if (!e.ok) return e;
              const t = document.createElement("a");
              t.href = e.url;
              const n = t.pathname ? t.pathname : e.url;
              try {
                if (h.ADD_TO_CART_REGEX.test(n)) {
                  try {
                    const t = JSON.parse(arguments[1].body);
                    if (Object.keys(t).includes("items")) return o(e, t), e;
                  } catch (e) {
                    i(e);
                  }
                  r(e, arguments[1].body);
                }
              } catch (e) {
                i(e);
              }
              return e;
            });
          });
      })(o(), e),
      a((n) => {
        const o = n.getAttribute("action");
        o &&
          o.indexOf("/cart/add") >= 0 &&
          i(n, "submit", (n) => {
            p(e, n, t);
          });
      });
  }
  function b(e, t, n) {
    var o;
    null != n && n.logLevel && ((o = n.logLevel), (r = o)), m(e, t), c(e, t);
  }
  h.ADD_TO_CART_REGEX =
    /^(?:\/[a-zA-Z]+(?:-[a-zA-Z]+)?)?\/cart\/add(?:\.js|\.json)?$/;
  const y = {
    test: "edge_test_click/1.0",
    load: "web_pixels_manager_load/2.0",
    init: "web_pixels_manager_init/2.0",
    register: "web_pixels_manager_pixel_register/2.0",
    subscriberEventEmit: "web_pixels_manager_subscriber_event_emit/2.0",
  };
  function g(e, t) {
    return { schemaId: y[e], payload: t };
  }
  const w = (function () {
    const e = "production";
    if (
      (function (e) {
        return "{__ENV__}" === e;
      })(e)
    )
      return "test";
    return e;
  })();
  function v(e) {
    const t = {};
    for (const n in e)
      if (Object.prototype.hasOwnProperty.call(e, n)) {
        const o = n.replace(/[A-Z]/g, (e) => `_${e}`).toLowerCase(),
          r = e[n];
        t[o] = null !== r && "object" == typeof r ? v(r) : r;
      }
    return t;
  }
  class x extends Error {
    constructor(...e) {
      super(...e), Error.captureStackTrace && Error.captureStackTrace(this, x);
    }
  }
  const _ = (e, t) => {
      var n;
      const o = { severity: "error", context: "", unhandled: !0, ...t };
      let r = "";
      const i = {
        lineNumber: "1",
        columnNumber: "1",
        method: o.context,
        file: "browser.js",
      };
      if (e.stackTrace || e.stack || e.description) {
        r = e.stack.split("\n")[0];
        const t = e.stack.match(/([0-9]+):([0-9]+)/);
        if (
          t &&
          t.length > 2 &&
          ((i.lineNumber = t[1]),
          (i.columnNumber = t[2]),
          parseInt(i.lineNumber, 10) > 1e5)
        )
          return;
      }
      fetch("https://notify.bugsnag.com", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Bugsnag-Api-Key": "bcbc9f6762da195561967577c2d74ff8",
          "Bugsnag-Payload-Version": "5",
        },
        body: JSON.stringify({
          payloadVersion: 5,
          notifier: { name: "web-pixel-manager", version: "0.0.163", url: "-" },
          events: [
            {
              exceptions: [
                {
                  errorClass: r,
                  message: r,
                  stacktrace: [i],
                  type: "browserjs",
                },
              ],
              context: o.context,
              severity: o.severity,
              unhandled: o.unhandled,
              app: { version: "0.0.163" },
              metaData: {
                device: {
                  userAgent:
                    null === (n = self.navigator) || void 0 === n
                      ? void 0
                      : n.userAgent,
                },
                request: {
                  shopId: o.shopId,
                  shopUrl: self.location.href,
                  pixelId: o.pixelId,
                  pixelType: o.pixelType,
                  runtimeContext: o.runtimeContext,
                },
                "Additional Notes": {
                  initConfig: JSON.stringify(o.initConfig),
                  notes: o.notes,
                },
              },
            },
          ],
        }),
      }).catch(() => {});
    },
    E = {
      global: "https://monorail-edge.shopifysvc.com",
      staging: "https://monorail-edge-staging.shopifycloud.com",
      test: "https://localhost",
    },
    C = "/unstable/produce_batch";
  let A;
  switch (w) {
    case "test":
      A = "test";
      break;
    case "production":
      A = "global";
      break;
    default:
      A = "staging";
  }
  const S = new Array();
  function I(e, t = !1) {
    const n = { ...e, metadata: { eventCreatedAtMs: P() } };
    S.push(n), t && R();
  }
  function O(e, t, n = !1) {
    I(g(e, t), n);
  }
  function R() {
    const e = [...S];
    (S.length = 0),
      (function (e) {
        if (0 === e.length) return !1;
        const t = {
          metadata: { event_sent_at_ms: P() },
          events: e.map((e) => ({
            schema_id: e.schemaId,
            payload: v(e.payload),
            metadata: { event_created_at_ms: e.metadata.eventCreatedAtMs },
          })),
        };
        (function (e) {
          const t = `${E[A]}${C}`;
          try {
            if (self.navigator.sendBeacon.bind(self.navigator)(t, e)) return !0;
          } catch (e) {}
          const n = new XMLHttpRequest();
          try {
            n.open("POST", t, !0),
              n.setRequestHeader("Content-Type", "text/plain"),
              n.send(e);
          } catch (e) {
            _(e, { context: "utilities/monorail/sendRequest", unhandled: !1 });
          }
        })(JSON.stringify(t));
      })(e);
  }
  function P() {
    return new Date().getTime();
  }
  class k extends Set {
    constructor(e, t) {
      if (
        (super(),
        (this.maxSize = void 0),
        (this.keep = void 0),
        (Number.isFinite(e) && !Number.isInteger(e)) || e <= 0)
      )
        throw new Error("Invalid maxSize specified");
      (this.maxSize = e), (this.keep = t);
    }
    push(e) {
      if ("oldest" === this.keep) this.size < this.maxSize && this.add(e);
      else if (
        "newest" === this.keep &&
        (this.add(e), this.size > this.maxSize)
      )
        for (const e of this)
          if ((this.delete(e), this.size <= this.maxSize)) break;
      return this;
    }
  }
  const L = {
    bufferSize: 50,
    replayKeep: "oldest",
    enableSubscribeAll: !1,
    subscribeAllKey: "all_events",
  };
  class D {
    constructor(e = L) {
      (this.channelSubscribers = new Map()),
        (this.replayQueue = void 0),
        (this.options = void 0),
        (this.options = e),
        (this.replayQueue = new k(e.bufferSize, e.replayKeep));
    }
    publish(e, t, n = {}) {
      var o;
      if (this.options.enableSubscribeAll && e === this.options.subscribeAllKey)
        throw new Error(`Cannot publish to ${String(e)}`);
      this.replayQueue.push({ name: e, payload: t, options: n });
      const r = (e, n) => n.apply({}, [{ ...t }]);
      var i;
      (null === (o = this.channelSubscribers.get(e)) ||
        void 0 === o ||
        o.forEach(r),
      this.options.enableSubscribeAll) &&
        (null ===
          (i = this.channelSubscribers.get(this.options.subscribeAllKey)) ||
          void 0 === i ||
          i.forEach(r));
      return !0;
    }
    subscribe(e, t, n = {}) {
      const o = this.channelSubscribers.get(e) || new Map();
      return (
        this.channelSubscribers.set(e, o.set(t, n)),
        this.replayQueue.forEach(({ name: n, payload: o }) => {
          (e === n ||
            (this.options.enableSubscribeAll &&
              e === this.options.subscribeAllKey)) &&
            t.apply({}, [{ ...o }]);
        }),
        () => o.delete(t)
      );
    }
  }
  const N = [
      "checkout_completed",
      "checkout_started",
      "payment_info_submitted",
      "collection_viewed",
      "page_viewed",
      "product_added_to_cart",
      "product_viewed",
      "product_variant_viewed",
      "search_submitted",
    ],
    U = [
      "all_events",
      "all_standard_events",
      "all_custom_events",
      "checkout_completed",
      "checkout_started",
      "payment_info_submitted",
      "collection_viewed",
      "page_viewed",
      "product_added_to_cart",
      "product_viewed",
      "product_variant_viewed",
      "search_submitted",
    ];
  function T(e) {
    return N.includes(e);
  }
  function j(e) {
    return U.includes(e);
  }
  let M, B, $, V, q;
  !(function (e) {
    (e.TRACKING_LOADED = "trackingConsentLoaded"),
      (e.TRACKING_ACCEPTED = "trackingConsentAccepted"),
      (e.TRACKING_DECLINED = "trackingConsentDeclined"),
      (e.TRACKING_RESET = "trackingConsentReset");
  })(M || (M = {})),
    (function (e) {
      (e.ACCEPTED = "yes"),
        (e.DECLINED = "no"),
        (e.NO_INTERACTION = "no_interaction"),
        (e.NO_VALUE = "");
    })(B || (B = {})),
    (function (e) {
      (e.NO_INTERACTION = "no_interaction"),
        (e.NO_VALUE = ""),
        (e.ACCEPTED = "1"),
        (e.DECLINED = "0");
    })($ || ($ = {})),
    (function (e) {
      (e.GDPR = "GDPR"), (e.CCPA = "CCPA"), (e.NO_VALUE = "");
    })(V || (V = {})),
    (function (e) {
      (e.CCPA_BLOCK_ALL = "CCPA_BLOCK_ALL"),
        (e.GDPR = "GDPR"),
        (e.GDPR_BLOCK_ALL = "GDPR_BLOCK_ALL"),
        (e.CCPA = "CCPA");
    })(q || (q = {}));
  const z = ["prefs", "version", "consent", "regulation"],
    W = ["lim", "v", "con", "reg"];
  function G(e, t) {
    const n = t.slice().sort();
    return (
      e.length === t.length &&
      e
        .slice()
        .sort()
        .every((e, t) => e === n[t])
    );
  }
  function K() {
    try {
      let e;
      if (
        ((document.cookie ? document.cookie.split("; ") : []).forEach((t) => {
          const [n, o] = t.split("=");
          if ("_tracking_consent" === decodeURIComponent(n)) {
            const t = JSON.parse(decodeURIComponent(o));
            e = t;
          }
        }),
        void 0 === e ||
          (function (e) {
            const t = Object.keys(e);
            return !(G(t, W) || G(t, z));
          })(e))
      )
        return;
      return (
        (function (e) {
          if (e.hasOwnProperty("version")) return !0;
          if (e.hasOwnProperty("v")) return !1;
          return !1;
        })(e) &&
          (e = (function (e) {
            const t = e.prefs.limit,
              n = e.regulation,
              o = e.version;
            let r = {};
            (function (e) {
              return e.prefs.limit.includes(q.GDPR);
            })(e) && (r = { GDPR: H(e.consent) });
            return { con: r, reg: n, v: o, lim: t };
          })(e)),
        e
      );
    } catch (e) {
      return;
    }
  }
  function X(e = null) {
    return null === e && (e = K()), void 0 === e;
  }
  function H(e) {
    switch (e) {
      case B.ACCEPTED:
        return $.ACCEPTED;
      case B.DECLINED:
        return $.DECLINED;
      default:
        return $.NO_VALUE;
    }
  }
  function J() {
    const e = (function () {
      const e = K();
      return void 0 === e || X(e) ? V.NO_VALUE : e.reg;
    })();
    return e in V ? e : V.NO_VALUE;
  }
  function Y() {
    return (function () {
      const e = K();
      return void 0 === e || X(e) ? { limit: [] } : { limit: e.lim };
    })();
  }
  function F() {
    if (!Z(q.GDPR) && !Z(q.GDPR_BLOCK_ALL)) return !0;
    switch (
      (function () {
        const e = K();
        return void 0 === e || X(e) ? $.NO_VALUE : e.con.GDPR || $.NO_VALUE;
      })()
    ) {
      case $.ACCEPTED:
        return !0;
      case $.DECLINED:
        return !1;
      case $.NO_VALUE:
      default:
        return J() !== V.GDPR;
    }
  }
  function Q() {
    return !!X() || F();
  }
  function Z(e) {
    return Y().limit.includes(e);
  }
  function ee(e) {
    document.addEventListener(M.TRACKING_ACCEPTED, e);
  }
  const te = "[object Object]",
    ne = [
      "[object String]",
      "[object Number]",
      "[object Boolean]",
      "[object Undefined]",
      "[object Null]",
    ];
  function oe(e) {
    let t = null;
    function n(e) {
      return Object.prototype.toString.call(e) === te;
    }
    return void 0 === e || n(e)
      ? {
          isValid: (function e(o) {
            if (Array.isArray(o)) return o.every(e);
            if (n(o)) return Object.keys(o).every((t) => e(o[t]));
            const r = ne.includes(Object.prototype.toString.call(o));
            return (
              r ||
                (t = `${o} must be one of the following types: ${ne.join(
                  ", "
                )}`),
              r
            );
          })(e),
          error: t,
        }
      : ((t = `${e} must be an object`), { isValid: !1, error: t });
  }
  let re;
  const ie = new Uint8Array(16);
  function se() {
    if (
      !re &&
      ((re =
        "undefined" != typeof crypto &&
        crypto.getRandomValues &&
        crypto.getRandomValues.bind(crypto)),
      !re)
    )
      throw new Error(
        "crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported"
      );
    return re(ie);
  }
  const ae = [];
  for (let e = 0; e < 256; ++e) ae.push((e + 256).toString(16).slice(1));
  var ce = {
    randomUUID:
      "undefined" != typeof crypto &&
      crypto.randomUUID &&
      crypto.randomUUID.bind(crypto),
  };
  function le(e, t, n) {
    if (ce.randomUUID && !t && !e) return ce.randomUUID();
    const o = (e = e || {}).random || (e.rng || se)();
    if (((o[6] = (15 & o[6]) | 64), (o[8] = (63 & o[8]) | 128), t)) {
      n = n || 0;
      for (let e = 0; e < 16; ++e) t[n + e] = o[e];
      return t;
    }
    return (function (e, t = 0) {
      return (
        ae[e[t + 0]] +
        ae[e[t + 1]] +
        ae[e[t + 2]] +
        ae[e[t + 3]] +
        "-" +
        ae[e[t + 4]] +
        ae[e[t + 5]] +
        "-" +
        ae[e[t + 6]] +
        ae[e[t + 7]] +
        "-" +
        ae[e[t + 8]] +
        ae[e[t + 9]] +
        "-" +
        ae[e[t + 10]] +
        ae[e[t + 11]] +
        ae[e[t + 12]] +
        ae[e[t + 13]] +
        ae[e[t + 14]] +
        ae[e[t + 15]]
      ).toLowerCase();
    })(o);
  }
  function ue() {
    return {
      document: {
        location: {
          href: window.location.href,
          hash: window.location.hash,
          host: window.location.host,
          hostname: window.location.hostname,
          origin: window.location.origin,
          pathname: window.location.pathname,
          port: window.location.port,
          protocol: window.location.protocol,
          search: window.location.search,
        },
        referrer: document.referrer,
        characterSet: document.characterSet,
        title: document.title,
      },
      navigator: {
        language: navigator.language,
        cookieEnabled: navigator.cookieEnabled,
        languages: navigator.languages,
        userAgent: navigator.userAgent,
      },
      window: {
        innerHeight: window.innerHeight,
        innerWidth: window.innerWidth,
        outerHeight: window.outerHeight,
        outerWidth: window.outerWidth,
        pageXOffset: window.pageXOffset,
        pageYOffset: window.pageYOffset,
        location: {
          href: window.location.href,
          hash: window.location.hash,
          host: window.location.host,
          hostname: window.location.hostname,
          origin: window.location.origin,
          pathname: window.location.pathname,
          port: window.location.port,
          protocol: window.location.protocol,
          search: window.location.search,
        },
        origin: window.origin,
        screenX: window.screenX,
        screenY: window.screenY,
        scrollX: window.scrollX,
        scrollY: window.scrollY,
      },
    };
  }
  function de(e) {
    const t = {};
    for (const n of e.split(/ *; */)) {
      const e = n.split("=");
      try {
        t[decodeURIComponent(e[0])] = decodeURIComponent(e[1] || "");
      } catch (e) {
        continue;
      }
    }
    return t;
  }
  const fe = Symbol.for("RemoteUi::Retain"),
    pe = Symbol.for("RemoteUi::Release"),
    he = Symbol.for("RemoteUi::RetainedBy");
  class me {
    constructor() {
      this.memoryManaged = new Set();
    }
    add(e) {
      this.memoryManaged.add(e), e[he].add(this), e[fe]();
    }
    release() {
      for (const e of this.memoryManaged) e[he].delete(this), e[pe]();
      this.memoryManaged.clear();
    }
  }
  function be(e) {
    return Boolean(e && e[fe] && e[pe]);
  }
  function ye(e, { deep: t = !0 } = {}) {
    const n = be(e);
    if ((n && e[fe](), t)) {
      if (Array.isArray(e))
        return e.reduce((e, n) => ye(n, { deep: t }) || e, n);
      if ("object" == typeof e && null != e)
        return Object.keys(e).reduce((n, o) => ye(e[o], { deep: t }) || n, n);
    }
    return n;
  }
  const ge = "_@f";
  function we(e) {
    const t = new Map(),
      n = new Map(),
      o = new Map();
    return {
      encode: function o(r) {
        if ("object" == typeof r) {
          if (null == r) return [r];
          if (r instanceof ArrayBuffer) return [r];
          const e = [];
          if (Array.isArray(r)) {
            const t = r.map((t) => {
              const [n, r = []] = o(t);
              return e.push(...r), n;
            });
            return [t, e];
          }
          const t = Object.keys(r).reduce((t, n) => {
            const [i, s = []] = o(r[n]);
            return e.push(...s), { ...t, [n]: i };
          }, {});
          return [t, e];
        }
        if ("function" == typeof r) {
          if (t.has(r)) {
            const e = t.get(r);
            return [{ [ge]: e }];
          }
          const o = e.uuid();
          return t.set(r, o), n.set(o, r), [{ [ge]: o }];
        }
        return [r];
      },
      decode: r,
      async call(e, t) {
        const o = new me(),
          i = n.get(e);
        if (null == i)
          throw new Error(
            "You attempted to call a function that was already released."
          );
        try {
          const e = be(i) ? [o, ...i[he]] : [o];
          return await i(...r(t, e));
        } finally {
          o.release();
        }
      },
      release(e) {
        const o = n.get(e);
        o && (n.delete(e), t.delete(o));
      },
      terminate() {
        t.clear(), n.clear(), o.clear();
      },
    };
    function r(t, n) {
      if ("object" == typeof t) {
        if (null == t) return t;
        if (t instanceof ArrayBuffer) return t;
        if (Array.isArray(t)) return t.map((e) => r(e, n));
        if (ge in t) {
          const r = t["_@f"];
          if (o.has(r)) return o.get(r);
          let i = 0,
            s = !1;
          const a = () => {
              (i -= 1), 0 === i && ((s = !0), o.delete(r), e.release(r));
            },
            c = () => {
              i += 1;
            },
            l = new Set(n),
            u = (...t) => {
              if (s)
                throw new Error(
                  "You attempted to call a function that was already released."
                );
              if (!o.has(r))
                throw new Error(
                  "You attempted to call a function that was already revoked."
                );
              return e.call(r, t);
            };
          Object.defineProperties(u, {
            [pe]: { value: a, writable: !1 },
            [fe]: { value: c, writable: !1 },
            [he]: { value: l, writable: !1 },
          });
          for (const e of l) e.add(u);
          return o.set(r, u), u;
        }
        return Object.keys(t).reduce((e, o) => ({ ...e, [o]: r(t[o], n) }), {});
      }
      return t;
    }
  }
  function ve(e, { uuid: t = xe, createEncoder: n = we, callable: o } = {}) {
    let r = !1,
      i = e;
    const s = new Map(),
      a = new Map(),
      c = (function (e, t) {
        let n;
        if (null == t) {
          if ("function" != typeof Proxy)
            throw new Error(
              "You must pass an array of callable methods in environments without Proxies."
            );
          const t = new Map();
          n = new Proxy(
            {},
            {
              get(n, o) {
                if (t.has(o)) return t.get(o);
                const r = e(o);
                return t.set(o, r), r;
              },
            }
          );
        } else {
          n = {};
          for (const o of t)
            Object.defineProperty(n, o, {
              value: e(o),
              writable: !1,
              configurable: !0,
              enumerable: !0,
            });
        }
        return n;
      })(f, o),
      l = n({
        uuid: t,
        release(e) {
          u(3, [e]);
        },
        call(e, n, o) {
          const r = t(),
            i = p(r, o),
            [s, a] = l.encode(n);
          return u(5, [r, e, s], a), i;
        },
      });
    return (
      i.addEventListener("message", d),
      {
        call: c,
        replace(e) {
          const t = i;
          (i = e),
            t.removeEventListener("message", d),
            e.addEventListener("message", d);
        },
        expose(e) {
          for (const t of Object.keys(e)) {
            const n = e[t];
            "function" == typeof n ? s.set(t, n) : s.delete(t);
          }
        },
        callable(...e) {
          if (null != o)
            for (const t of e)
              Object.defineProperty(c, t, {
                value: f(t),
                writable: !1,
                configurable: !0,
                enumerable: !0,
              });
        },
        terminate() {
          u(2, void 0), h(), i.terminate && i.terminate();
        },
      }
    );
    function u(e, t, n) {
      r || i.postMessage(t ? [e, t] : [e], n);
    }
    async function d(e) {
      const { data: t } = e;
      if (null != t && Array.isArray(t))
        switch (t[0]) {
          case 2:
            h();
            break;
          case 0: {
            const e = new me(),
              [n, o, r] = t[1],
              i = s.get(o);
            try {
              if (null == i)
                throw new Error(`No '${o}' method is exposed on this endpoint`);
              const [t, s] = l.encode(await i(...l.decode(r, [e])));
              u(1, [n, void 0, t], s);
            } catch (e) {
              const { name: t, message: o, stack: r } = e;
              throw (u(1, [n, { name: t, message: o, stack: r }]), e);
            } finally {
              e.release();
            }
            break;
          }
          case 1: {
            const [e] = t[1];
            a.get(e)(...t[1]), a.delete(e);
            break;
          }
          case 3: {
            const [e] = t[1];
            l.release(e);
            break;
          }
          case 6: {
            const [e] = t[1];
            a.get(e)(...t[1]), a.delete(e);
            break;
          }
          case 5: {
            const [e, n, o] = t[1];
            try {
              const t = await l.call(n, o),
                [r, i] = l.encode(t);
              u(6, [e, void 0, r], i);
            } catch (t) {
              const { name: n, message: o, stack: r } = t;
              throw (u(6, [e, { name: n, message: o, stack: r }]), t);
            }
            break;
          }
        }
    }
    function f(e) {
      return (...n) => {
        if (r)
          return Promise.reject(
            new Error(
              "You attempted to call a function on a terminated web worker."
            )
          );
        if ("string" != typeof e && "number" != typeof e)
          return Promise.reject(
            new Error(
              `Can’t call a symbol method on a remote endpoint: ${e.toString()}`
            )
          );
        const o = t(),
          i = p(o),
          [s, a] = l.encode(n);
        return u(0, [o, e, s], a), i;
      };
    }
    function p(e, t) {
      return new Promise((n, o) => {
        a.set(e, (e, r, i) => {
          if (null == r) n(i && l.decode(i, t));
          else {
            const e = new Error();
            Object.assign(e, r), o(e);
          }
        });
      });
    }
    function h() {
      var e;
      (r = !0),
        s.clear(),
        a.clear(),
        null === (e = l.terminate) || void 0 === e || e.call(l),
        i.removeEventListener("message", d);
    }
  }
  function xe() {
    return `${_e()}-${_e()}-${_e()}-${_e()}`;
  }
  function _e() {
    return Math.floor(Math.random() * Number.MAX_SAFE_INTEGER).toString(16);
  }
  function Ee(e) {
    return e.replace(/\/$/, "");
  }
  function Ce({ id: e, src: t, srcdoc: n, privileges: o }) {
    const r = document.querySelector(`iframe#sandbox-${e}`);
    if (r && "IFRAME" === r.tagName) return r;
    const i = document.createElement("iframe");
    if (t) i.setAttribute("src", t);
    else {
      if (!n) {
        const e = new x("src or srcdoc must be provided");
        throw (
          (_(e, {
            context: "createIframe",
            unhandled: !1,
            severity: "warning",
          }),
          e)
        );
      }
      i.setAttribute("srcdoc", n);
    }
    return (
      i.setAttribute("id", `sandbox-${e}`),
      i.setAttribute("sandbox", o.join(" ")),
      i.setAttribute("tabIndex", "-1"),
      i.setAttribute("aria-hidden", "true"),
      i.setAttribute(
        "style",
        "display:none; height:0; width:0; visibility: hidden;"
      ),
      (function (e) {
        let t = document.querySelector("#WebPixelsManagerSandboxContainer");
        null == t &&
          ((t = document.createElement("div")),
          t.setAttribute("id", "WebPixelsManagerSandboxContainer"),
          document.body.appendChild(t));
        t.appendChild(e);
      })(i),
      i
    );
  }
  function Ae(e, t, n, o, r, i = !1) {
    let s = {};
    try {
      s = t.configuration ? JSON.parse(t.configuration) : {};
    } catch (e) {}
    return {
      analytics: {
        subscribe: (r, s, a) => (
          i && ye(s),
          e.subscribe(r, s, {
            ...a,
            pixelRuntimeConfig: t,
            shopId: n,
            surface: o,
          })
        ),
      },
      browser: {
        cookie: {
          get: async (e) => {
            if (e) {
              let t = "";
              const n = document.cookie.split("; ");
              for (const o of n) {
                const [n, r] = o.split("=");
                if (n === e) {
                  t = r;
                  break;
                }
              }
              return t;
            }
            return document.cookie;
          },
          set: async (e, t) => {
            if (t) {
              const n = `${e}=${t}`;
              document.cookie = n;
            } else document.cookie = e;
            return document.cookie;
          },
        },
        sendBeacon: async (e, t = "") => {
          const n = new window.Blob([t], { type: "text/plain" });
          return window.navigator.sendBeacon(e, n);
        },
        localStorage: {
          setItem: async (e, t) => window.localStorage.setItem(e, t),
          getItem: async (e) => window.localStorage.getItem(e),
          key: async (e) => window.localStorage.key(e),
          removeItem: async (e) => window.localStorage.removeItem(e),
          clear: async () => window.localStorage.clear(),
          length: async () => window.localStorage.length,
        },
        sessionStorage: {
          setItem: async (e, t) => window.sessionStorage.setItem(e, t),
          getItem: async (e) => window.sessionStorage.getItem(e),
          key: async (e) => window.sessionStorage.key(e),
          removeItem: async (e) => window.sessionStorage.removeItem(e),
          clear: async () => window.sessionStorage.clear(),
          length: async () => window.sessionStorage.length,
        },
      },
      settings: s,
      init:
        ((a = r),
        {
          context: ue(),
          data: {
            customer:
              ((p = null == a ? void 0 : a.customer),
              p
                ? {
                    id: null == p ? void 0 : p.id,
                    email: null == p ? void 0 : p.email,
                    phone: null == p ? void 0 : p.phone,
                  }
                : null),
            cart:
              ((c = null == a ? void 0 : a.cart),
              c
                ? {
                    id: null == c ? void 0 : c.id,
                    cost: {
                      totalAmount: {
                        amount:
                          null == c ||
                          null === (l = c.cost) ||
                          void 0 === l ||
                          null === (u = l.totalAmount) ||
                          void 0 === u
                            ? void 0
                            : u.amount,
                        currencyCode:
                          null == c ||
                          null === (d = c.cost) ||
                          void 0 === d ||
                          null === (f = d.totalAmount) ||
                          void 0 === f
                            ? void 0
                            : f.currencyCode,
                      },
                    },
                    lines: null == c ? void 0 : c.lines,
                    totalQuantity: null == c ? void 0 : c.totalQuantity,
                  }
                : null),
          },
        }),
      _pixelInfo: { ...t },
    };
    var a, c, l, u, d, f, p;
  }
  function Se() {
    const e = [];
    return (
      self.location.hostname
        .split(".")
        .reverse()
        .reduce((t, n) => {
          const o = "" === t ? n : `${n}.${t}`;
          return (
            (function (e) {
              document.cookie = `wpm-domain-test=1; path=/; domain=${e}`;
            })(o),
            document.cookie
              .split(";")
              .find((e) => e.includes("wpm-domain-test")) || e.push(o),
            (function (e) {
              document.cookie = `wpm-domain-test=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT; domain=${e}`;
            })(o),
            o
          );
        }, ""),
      e
    );
  }
  let Ie, Oe;
  function Re({
    webPixelConfig: t,
    eventBus: n,
    shopId: o,
    storefrontBaseUrl: r,
    webPixelsExtensionBaseUrl: i,
    cdnBaseUrl: s,
    surface: a,
    initData: c,
  }) {
    const l = [
      i,
      "/app",
      "/services",
      `/${o}`,
      "/web-pixels-manager",
      `/${t.type.toLowerCase()}`,
      `/web-pixel-${t.id}`,
      `@${t.scriptVersion}.js`,
    ].join("");
    let u;
    if (t.type === Oe.App && t.runtimeContext === Ie.Strict) {
      const e = [
          Ee(s),
          "/shopifycloud/web-pixels-manager/0.0.163/iife/sandbox.js",
        ].join(""),
        t = new Blob([`importScripts('${e}');`], { type: "text/javascript" });
      u = new Worker(URL.createObjectURL(t));
    } else {
      let { search: e } = window.location;
      if (r.match(/spin\.dev\/?/)) {
        e = `${e}${e.length ? "&" : "?"}fast_storefront_renderer=1`;
      }
      const n = [
        Ee(r),
        "/web-pixels-manager@0.0.163",
        "/sandbox",
        window.location.pathname,
        e,
      ].join("");
      u = (function (e, { terminate: t = !0, targetOrigin: n = "*" } = {}) {
        if ("undefined" == typeof window)
          throw new Error(
            "You can only run fromIframe() in a browser context, but no window was found."
          );
        const o = new WeakMap(),
          r = new Promise((t) => {
            window.addEventListener("message", (n) => {
              n.source === e.contentWindow &&
                "remote-ui::ready" === n.data &&
                t();
            });
          });
        return {
          async postMessage(t, o) {
            await r, e.contentWindow.postMessage(t, n, o);
          },
          addEventListener(t, n) {
            const r = (t) => {
              t.source === e.contentWindow && n(t);
            };
            o.set(n, r), self.addEventListener(t, r);
          },
          removeEventListener(e, t) {
            const n = o.get(t);
            null != n && (o.delete(t), self.removeEventListener(e, n));
          },
          terminate() {
            t && e.remove();
          },
        };
      })(
        Ce({
          id: `web-pixel-extension-${t.type}-${t.id}`,
          src: n,
          privileges: ["allow-scripts", "allow-forms"],
        })
      );
    }
    const d = ve(u, {
        callable: ["initialize", "initWebPixelsAwaitingConsent"],
      }),
      f = Ae(n, t, o, a, c, !0),
      p = {
        cookieRestrictedDomains: async () => Se(),
        userCanBeTracked: async () => Q(),
        self: { origin: { get: async () => self.origin } },
        document: { referrer: { get: async () => document.referrer } },
        monorail: {
          register: async ({ status: n, errorMsg: r }) => {
            const i = Pe(t);
            O(
              "register",
              {
                version: e,
                pageUrl: self.location.href,
                shopId: o,
                surface: a,
                pixelId: t.id,
                pixelAppId: i,
                pixelSource: t.type,
                pixelRuntimeContext: t.runtimeContext,
                pixelScriptVersion: t.scriptVersion,
                pixelConfiguration: null == t ? void 0 : t.configuration,
                pixelEventSchemaVersion: t.eventPayloadVersion,
                status: n,
                errorMsg: r,
              },
              !0
            );
          },
        },
      };
    d.expose({ pixelRuntimeAPI: () => f, sandboxInternalAPI: () => p });
    const h = self.document.title;
    return (
      d.call.initialize(h, l, t),
      ee(() => {
        d.call.initWebPixelsAwaitingConsent();
      }),
      { config: t, endpoint: d }
    );
  }
  function Pe(e) {
    return e.type === Oe.Custom
      ? "-1"
      : e.apiClientId
      ? `${e.apiClientId}`
      : void 0;
  }
  !(function (e) {
    (e.Strict = "STRICT"),
      (e.Lax = "LAX"),
      (e.Sandboxed = "SANDBOXED"),
      (e.Unsandboxed = "UNSANDBOXED");
  })(Ie || (Ie = {})),
    (function (e) {
      (e.App = "APP"), (e.Custom = "CUSTOM");
    })(Oe || (Oe = {}));
  const ke = "all_standard_events",
    Le = "all_custom_events";
  function De(t) {
    const n = new D({
        bufferSize: Number.POSITIVE_INFINITY,
        replayKeep: "oldest",
        enableSubscribeAll: !0,
        subscribeAllKey: ke,
      }),
      o = new D({
        bufferSize: 1e3,
        replayKeep: "oldest",
        enableSubscribeAll: !0,
        subscribeAllKey: Le,
      }),
      r = (function () {
        const e = new Set();
        return (
          ee(function () {
            e.forEach((t) => {
              e.delete(t), t();
            });
          }),
          {
            gate(t, n = { runOnAccept: !0 }) {
              Q() ? t() : n.runOnAccept && e.add(t);
            },
          }
        );
      })();
    return {
      publish(e, t) {
        if ("string" != typeof e)
          throw new Error(
            "Expected event name to be a string, but got " + typeof e
          );
        if (!T(e)) return !1;
        const o = oe(t);
        if (!o.isValid) return console.error(o.error), !1;
        const r = (function (e, t, n) {
          return {
            id: le(),
            clientId: de(document.cookie)._shopify_y,
            timestamp: new Date().toISOString(),
            name: e,
            context: ue(),
            data: { ...(n || {}) },
          };
        })(e, 0, t);
        return n.publish(e, r);
      },
      publishCustomEvent(e, t) {
        if ("string" != typeof e)
          throw new Error(
            "Expected event name to be a string, but got " + typeof e
          );
        if (T(e) || j(e)) return !1;
        const n = oe(t);
        if (!n.isValid) return console.error(n.error), !1;
        const r = (function (e, t, n = null) {
          return {
            id: le(),
            clientId: de(document.cookie)._shopify_y,
            timestamp: new Date().toISOString(),
            name: e,
            context: ue(),
            customData: n,
          };
        })(e, 0, t);
        return o.publish(e, r);
      },
      subscribe(t, i, s = {}) {
        const a = (t) => {
          r.gate(() => {
            var n;
            const o =
              s.schemaVersion || s.pixelRuntimeConfig.eventPayloadVersion;
            i(t),
              O(
                "subscriberEventEmit",
                {
                  version: e,
                  pageUrl: self.location.href,
                  shopId: s.shopId,
                  surface: s.surface,
                  pixelId: s.pixelRuntimeConfig.id,
                  pixelAppId: Pe(s.pixelRuntimeConfig),
                  pixelSource: s.pixelRuntimeConfig.type,
                  pixelRuntimeContext: s.pixelRuntimeConfig.runtimeContext,
                  pixelScriptVersion: s.pixelRuntimeConfig.scriptVersion,
                  pixelConfiguration:
                    null === (n = s.pixelRuntimeConfig) || void 0 === n
                      ? void 0
                      : n.configuration,
                  pixelEventSchemaVersion: o,
                  eventName: t.name,
                  eventType: T(t.name) ? "standard" : "custom",
                },
                !0
              );
          });
        };
        if ("all_events" === t) {
          const e = n.subscribe(ke, a, s),
            t = o.subscribe(Le, a, s);
          return () => e() && t();
        }
        return t === Le
          ? o.subscribe(Le, a, s)
          : t === ke || j(t)
          ? n.subscribe(t, a, s)
          : o.subscribe(t, a, s);
      },
    };
  }
  function Ne(e) {
    try {
      return new URL(e), !0;
    } catch (t) {
      return (function (e) {
        const t = new RegExp(
          "^(https?:\\/\\/)((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)*[a-z]{1,}|((\\d{1,3}\\.){3}\\d{1,3}))(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*(\\?[;&a-z\\d%_.~+=-]*)?(\\#[-a-z\\d_]*)?$",
          "i"
        );
        return Boolean(t.test(e));
      })(e);
    }
  }
  var Ue = (function () {
    const t = g("load", {
      version: e,
      pageUrl: self.location.href,
      status: "loading",
    });
    try {
      const n = new Map();
      return (
        (t.payload.status = "loaded"),
        I(t),
        {
          init(t) {
            const {
                shopId: o,
                storefrontBaseUrl: r,
                cdnBaseUrl: i,
                webPixelsConfigList: s,
                surface: a = "unknown",
                initData: c,
              } = t || {},
              l = De(),
              u = t.webPixelsExtensionBaseUrl || t.webPixelExtensionBaseUrl,
              d = {
                severity: "warning",
                context: "createWebPixelsManager/init",
                unhandled: !1,
                shopId: o,
                initConfig: t,
              },
              f = g("init", {
                version: e,
                pageUrl: self.location.href,
                shopId: o,
                surface: a,
                status: "initializing",
              });
            try {
              if (!o) {
                const e = new x("WebPixelsManager: shopId is required");
                throw (_(e, d), e);
              }
              if (!r) {
                const e = new x(
                  "WebPixelsManager: storefrontBaseUrl is required"
                );
                throw (_(e, d), e);
              }
              if (!Ne(r)) {
                const e = new x(
                  `WebPixelsManager: storefrontBaseUrl is not a valid absolute URL: ${r}`
                );
                throw (_(e, d), e);
              }
              if (!u) {
                const e = new x(
                  "WebPixelsManager: webPixelsExtensionBaseUrl is required"
                );
                throw (_(e, d), e);
              }
              if (!Ne(u)) {
                const e = new x(
                  `WebPixelsManager: webPixelsExtensionBaseUrl is not a valid absolute URL: ${u}`
                );
                throw (_(e, d), e);
              }
              if (!i) {
                const e = new x("WebPixelsManager: cdnBaseUrl is required");
                throw (_(e, d), e);
              }
              if (!Ne(i)) {
                const e = new x(
                  `WebPixelsManager: cdnBaseUrl is not a valid absolute URL: ${i}`
                );
                throw (_(e, d), e);
              }
              return (
                s.forEach((e) => {
                  const t = ((s = e.id), `${e.type.toLowerCase()}/${s}`);
                  var s;
                  if (
                    !n.has(t) &&
                    (function (e) {
                      const t = {
                        eventPayloadVersion: "string",
                        id: "number",
                        runtimeContext: "string",
                        scriptVersion: "string",
                        type: "string",
                      };
                      return (
                        e.type === Oe.App && (t.configuration = "string"),
                        Object.keys(e).filter(
                          (n) =>
                            Object.prototype.hasOwnProperty.call(t, n) &&
                            typeof e[n] === t[n]
                        ).length === Object.keys(t).length
                      );
                    })(e)
                  ) {
                    const s = Re({
                      webPixelConfig: e,
                      eventBus: l,
                      shopId: o,
                      storefrontBaseUrl: r,
                      webPixelsExtensionBaseUrl: u,
                      cdnBaseUrl: i,
                      surface: a,
                      initData: c,
                    });
                    n.set(t, s);
                  } else
                    console.warn(
                      "Web Pixel config is invalid or already configured"
                    );
                }),
                "checkout-one" !== a && b(l.publish, c),
                (f.payload.status = "initialized"),
                I(f),
                {
                  publish: (e, t, n = {}) => l.publish(e, t),
                  publishCustomEvent: (e, t, n = {}) =>
                    l.publishCustomEvent(e, t),
                }
              );
            } catch (e) {
              return (
                e instanceof x ||
                  _(e, { context: "init", shopId: o, initConfig: t }),
                self.console && console.error(e),
                (f.payload.status = "failed"),
                (f.payload.errorMsg = null == e ? void 0 : e.message),
                I(f),
                { publish: (...e) => !1, publishCustomEvent: (...e) => !1 }
              );
            } finally {
              R();
            }
          },
        }
      );
    } catch (e) {
      return (
        e instanceof x || _(e, { context: "createWebPixelsManager" }),
        self.console && console.error(e),
        (t.payload.status = "failed"),
        (t.payload.errorMsg = null == e ? void 0 : e.message),
        I(t, !0),
        {}
      );
    }
  })();
  self.webPixelsManager = Ue;
})();
