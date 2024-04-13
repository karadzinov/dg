!function (a) {
    function i(r, s) {
        var n = this, i = !1, o = !!a.fn.prop;
        n.$form = r, n.options = s, n.$container = a(s.container, r), n.$loading = a(s.loading, r), n.$submitButton = a(s.submitButton, r), n.reset = function (t) {
            window.grecaptcha && a(".g-recaptcha", n.$form).each(function () {
                var t = a(this);
                if ("v3" !== t.data("version")) try {
                    grecaptcha.reset(t.data("recaptcha-id"))
                } catch (t) {
                }
            }), i = !1, n.$submitButton[o ? "prop" : "attr"]("disabled", !1), n.$loading.stop(!0, !0).hide(), a(".quform-success-message", r).remove(), a(".quform-error-message", r).remove(), a(".quform-has-error", r).removeClass("quform-has-error"), a(".quform-errors-wrap", r).remove(), s.reset && t && (r.resetForm(), a('input[type="file"]', r).each(function () {
                a(this).replaceWith(a(this).val("").clone(!0))
            }))
        }, n.errorMessage = function (t, e) {
            var i = a('<div class="quform-error-message"/>');
            !1 !== e && i.append(a('<div class="quform-error-title"/>').html(s.errorTitle)), i.append(t).hide(), "below" === s.errorPosition ? i.insertAfter(n.$container) : i.insertBefore(n.$container), i.fadeIn("slow"), n.scrollTo(i)
        }, n.scrollTo = function (t) {
            s.scrolling && t && t.length && a(window).scrollTop() >= t.offset().top - s.scrollThreshold && a.scrollTo(t, s.scrollSpeed, {
                axis: "y",
                offset: s.scrollOffset
            })
        }, n.submit = function () {
            if (!i) {
                if (i = !0, n.$submitButton[o ? "prop" : "attr"]("disabled", !0), n.$loading.fadeIn("slow"), window.grecaptcha) {
                    var e = n.$form.find(".g-recaptcha");
                    if (e.length && "invisible" === e.data("size")) return "v3" === e.data("version") ? void grecaptcha.execute(e.data("recaptcha-id"), {action: "quform"}).then(function (t) {
                        e.find(".g-recaptcha-response").val(t), n.ajaxSubmit()
                    }) : void grecaptcha.execute(e.data("recaptcha-id"))
                }
                n.ajaxSubmit()
            }
        }, n.ajaxSubmit = function () {
            r.ajaxSubmit({
                async: !1,
                dataType: "json",
                data: {quform_ajax: 1},
                iframe: !0,
                iframeSrc: "about:blank",
                success: function (e) {
                    if (null == e) n.reset(), n.errorMessage(s.errorResponseEmpty); else if ("object" == typeof e) if ("success" === e.type) {
                        if ("string" == typeof e.redirect) return void (window.location = e.redirect);
                        var t;
                        "function" == typeof s.successStart && s.successStart.call(n, e), "function" == typeof s.success ? s.success.call(n, e) : (t = function () {
                            n.reset(!0);
                            var t = a('<div class="quform-success-message"/>').html(e.message).hide().insertBefore(n.$container).fadeIn(s.successFadeInSpeed).show(0, function () {
                                "function" == typeof s.successEnd && s.successEnd.call(n, e, t)
                            });
                            n.scrollTo(t), 0 < s.successTimeout && setTimeout(function () {
                                t.fadeOut(s.successFadeOutSpeed).hide(0, function () {
                                    t.remove()
                                })
                            }, s.successTimeout)
                        }, s.hideFormSpeed ? n.$container.fadeOut(s.hideFormSpeed).hide(0, function () {
                            t()
                        }) : t())
                    } else {
                        var i, o;
                        "error" === e.type && ("function" == typeof s.errorStart && s.errorStart.call(n, e), "function" == typeof s.error ? s.error.call(n, e) : (i = !1, n.reset(), e.error.length && (n.errorMessage(e.error, !1), i = !0), a.each(e.elementErrors, function (t, e) {
                            var i, s, n;
                            "object" == typeof e.errors && 0 < e.errors.length && ((i = a("[name='" + t + "']", r)).length ? (s = a('<div class="quform-errors quform-cf"/>'), n = a('<div class="quform-errors-wrap"/>').append(s), s.append('<div class="quform-error">' + e.errors[0] + "</div>"), i.parents(".quform-input").append(n).end().parents(".quform-element").addClass("quform-has-error"), o = o || i) : alert("Element '" + t + "' does not exist in the HTML but failed validation, you must either add the HTML for this element into the form or remove the element configuration from the process file."))
                        }), a(".quform-errors", r).fadeIn("slow"), i || n.scrollTo(o), "function" == typeof s.errorEnd && s.errorEnd.call(n, e)))
                    }
                },
                error: function (t) {
                    n.reset(), "string" == typeof t.responseText && 0 < t.responseText.length ? n.errorMessage("<pre>" + t.responseText + "</pre>") : n.errorMessage(s.errorAjax)
                }
            })
        }, r.bind("submit", function (t) {
            t.preventDefault(), n.submit()
        })
    }

    a.fn.Quform = function (t) {
        var e = a.extend({}, {
            container: ".quform-elements",
            loading: ".quform-loading-wrap",
            submitButton: ".quform-submit",
            reset: !0,
            hideFormSpeed: !1,
            successFadeInSpeed: "slow",
            successFadeOutSpeed: "slow",
            successTimeout: 8e3,
            scrolling: !0,
            scrollSpeed: 400,
            scrollThreshold: 20,
            scrollOffset: -50,
            errorTitle: "There was a problem",
            errorResponseEmpty: "An error occurred and the response from the server was empty.",
            errorAjax: "An Ajax error occurred.",
            errorPosition: "above"
        }, t);
        return a.isFunction(a.scrollTo) && a.isFunction(a.fn.scrollTo) || (e.scrolling = !1), this.each(function () {
            var t = a(this);
            t.data("quform") || t.data("quform", new i(a(this), e))
        })
    }
}(jQuery), function (o) {
    o.fn.replaceSelectWithTextInput = function (n) {
        return n = o.extend({}, {onValue: "Other", cancel: "Cancel"}, n), this.each(function () {
            var t = o(this), e = t.parent(), i = t.parents(".quform-element").addClass("quform-select-replaced"),
                s = e.html();
            e.delegate("select", "change", function () {
                o(this).val() === n.onValue && (e.html('<input type="text" name="' + t.attr("name") + '" id="' + t.attr("id") + '" value="" />'), i.removeClass("quform-element-select").addClass("quform-element-text"), o(".qtip").hide(), $cancel = o("<a>").click(function () {
                    return e.html(s), i.removeClass("quform-element-text").addClass("quform-element-select"), o(this).remove(), !1
                }).attr("href", "#").addClass("quform-cancel-button").attr("title", n.cancel), e.append($cancel))
            }), t.change()
        })
    }
}(jQuery), jQuery.preloadImages = function (t, e) {
    for (e = e || "", f = [], c = 0; c < t.length; c++) {
        var i = new Image;
        i.src = e + t[c], f.push(i)
    }
}, function (t) {
    "use strict";
    "function" == typeof define && define.amd ? define(["jquery"], t) : "undefined" != typeof module && module.exports ? module.exports = t(require("jquery")) : t(jQuery)
}(function (r) {
    "use strict";

    function v(t) {
        return !t.nodeName || -1 !== r.inArray(t.nodeName.toLowerCase(), ["iframe", "#document", "html", "body"])
    }

    function e(t) {
        return r.isFunction(t) || r.isPlainObject(t) ? t : {top: t, left: t}
    }

    var y = r.scrollTo = function (t, e, i) {
        return r(window).scrollTo(t, e, i)
    };
    return y.defaults = {axis: "xy", duration: 0, limit: !0}, r.fn.scrollTo = function (t, i, m) {
        "object" == typeof i && (m = i, i = 0), "function" == typeof m && (m = {onAfter: m}), "max" === t && (t = 9e9), m = r.extend({}, y.defaults, m), i = i || m.duration;
        var g = m.queue && 1 < m.axis.length;
        return g && (i /= 2), m.offset = e(m.offset), m.over = e(m.over), this.each(function () {
            function a(t) {
                var e = r.extend({}, m, {
                    queue: !0, duration: i, complete: t && function () {
                        t.call(h, d, m)
                    }
                });
                u.animate(p, e)
            }

            if (null !== t) {
                var c, l = v(this), h = l ? this.contentWindow || window : this, u = r(h), d = t, p = {};
                switch (typeof d) {
                    case"number":
                    case"string":
                        if (/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(d)) {
                            d = e(d);
                            break
                        }
                        d = l ? r(d) : r(d, h);
                    case"object":
                        if (0 === d.length) return;
                        (d.is || d.style) && (c = (d = r(d)).offset())
                }
                var f = r.isFunction(m.offset) && m.offset(h, d) || m.offset;
                r.each(m.axis.split(""), function (t, e) {
                    var i = "x" === e ? "Left" : "Top", s = i.toLowerCase(), n = "scroll" + i, o = u[n](),
                        r = y.max(h, e);
                    c ? (p[n] = c[s] + (l ? 0 : o - u.offset()[s]), m.margin && (p[n] -= parseInt(d.css("margin" + i), 10) || 0, p[n] -= parseInt(d.css("border" + i + "Width"), 10) || 0), p[n] += f[s] || 0, m.over[s] && (p[n] += d["x" === e ? "width" : "height"]() * m.over[s])) : (i = d[s], p[n] = i.slice && "%" === i.slice(-1) ? parseFloat(i) / 100 * r : i), m.limit && /^\d+$/.test(p[n]) && (p[n] = p[n] <= 0 ? 0 : Math.min(p[n], r)), !t && 1 < m.axis.length && (o === p[n] ? p = {} : g && (a(m.onAfterFirst), p = {}))
                }), a(m.onAfter)
            }
        })
    }, y.max = function (t, e) {
        var i = "scroll" + (s = "x" === e ? "Width" : "Height");
        if (!v(t)) return t[i] - r(t)[s.toLowerCase()]();
        var s = "client" + s, n = (o = t.ownerDocument || t.document).documentElement, o = o.body;
        return Math.max(n[i], o[i]) - Math.min(n[s], o[s])
    }, r.Tween.propHooks.scrollLeft = r.Tween.propHooks.scrollTop = {
        get: function (t) {
            return r(t.elem)[t.prop]()
        }, set: function (t) {
            var e = this.get(t);
            if (t.options.interrupt && t._last && t._last !== e) return r(t.elem).stop();
            var i = Math.round(t.now);
            e !== i && (r(t.elem)[t.prop](i), t._last = this.get(t))
        }
    }, y
}), function (i) {
    "function" == typeof define && define.amd ? define(["jquery"], i) : "object" == typeof module && module.exports ? module.exports = function (t, e) {
        return void 0 === e && (e = "undefined" != typeof window ? require("jquery") : require("jquery")(t)), i(e), e
    } : i(jQuery)
}(function (z) {
    "use strict";

    function o(t) {
        var e = t.data;
        t.isDefaultPrevented() || (t.preventDefault(), z(t.target).closest("form").ajaxSubmit(e))
    }

    function r(t) {
        var e = t.target, i = z(e);
        if (!i.is("[type=submit],[type=image]")) {
            var s = i.closest("[type=submit]");
            if (0 === s.length) return;
            e = s[0]
        }
        var n, o = e.form;
        "image" === (o.clk = e).type && (void 0 !== t.offsetX ? (o.clk_x = t.offsetX, o.clk_y = t.offsetY) : "function" == typeof z.fn.offset ? (n = i.offset(), o.clk_x = t.pageX - n.left, o.clk_y = t.pageY - n.top) : (o.clk_x = t.pageX - e.offsetLeft, o.clk_y = t.pageY - e.offsetTop)), setTimeout(function () {
            o.clk = o.clk_x = o.clk_y = null
        }, 100)
    }

    function O() {
        var t;
        z.fn.ajaxSubmit.debug && (t = "[jquery.form] " + Array.prototype.join.call(arguments, ""), window.console && window.console.log ? window.console.log(t) : window.opera && window.opera.postError && window.opera.postError(t))
    }

    var p = /\r?\n/g, _ = {};
    _.fileapi = void 0 !== z('<input type="file">').get(0).files, _.formdata = void 0 !== window.FormData;
    var W = !!z.fn.prop;
    z.fn.attr2 = function () {
        if (!W) return this.attr.apply(this, arguments);
        var t = this.prop.apply(this, arguments);
        return t && t.jquery || "string" == typeof t ? t : this.attr.apply(this, arguments)
    }, z.fn.ajaxSubmit = function (E, t, e, i) {
        function s(t) {
            function h(e) {
                var i = null;
                try {
                    e.contentWindow && (i = e.contentWindow.document)
                } catch (e) {
                    O("cannot get iframe.contentWindow document: " + e)
                }
                if (i) return i;
                try {
                    i = e.contentDocument ? e.contentDocument : e.document
                } catch (t) {
                    O("cannot get iframe.contentDocument: " + t), i = e.document
                }
                return i
            }

            function e() {
                var t = M.attr2("target"), e = M.attr2("action"),
                    i = M.attr("enctype") || M.attr("encoding") || "multipart/form-data";
                a.setAttribute("target", o), F && !/post/i.test(F) || a.setAttribute("method", "POST"), e !== d.url && a.setAttribute("action", d.url), d.skipEncodingOverride || F && !/post/i.test(F) || M.attr({
                    encoding: "multipart/form-data",
                    enctype: "multipart/form-data"
                }), d.timeout && (y = setTimeout(function () {
                    v = !0, u(x)
                }, d.timeout));
                var s = [];
                try {
                    if (d.extraData) for (var n in d.extraData) d.extraData.hasOwnProperty(n) && (z.isPlainObject(d.extraData[n]) && d.extraData[n].hasOwnProperty("name") && d.extraData[n].hasOwnProperty("value") ? s.push(z('<input type="hidden" name="' + d.extraData[n].name + '">', c).val(d.extraData[n].value).appendTo(a)[0]) : s.push(z('<input type="hidden" name="' + n + '">', c).val(d.extraData[n]).appendTo(a)[0]));
                    d.iframeTarget || f.appendTo(l), m.attachEvent ? m.attachEvent("onload", u) : m.addEventListener("load", u, !1), setTimeout(function t() {
                        try {
                            var e = h(m).readyState;
                            O("state = " + e), e && "uninitialized" === e.toLowerCase() && setTimeout(t, 50)
                        } catch (e) {
                            O("Server abort: ", e, " (", e.name, ")"), u(w), y && clearTimeout(y), y = void 0
                        }
                    }, 15);
                    try {
                        a.submit()
                    } catch (t) {
                        document.createElement("form").submit.apply(a)
                    }
                } finally {
                    a.setAttribute("action", e), a.setAttribute("enctype", i), t ? a.setAttribute("target", t) : M.removeAttr("target"), z(s).remove()
                }
            }

            function u(t) {
                if (!g.aborted && !C) {
                    if ((q = h(m)) || (O("cannot access response document"), t = w), t === x && g) return g.abort("timeout"), void b.reject(g, "timeout");
                    if (t === w && g) return g.abort("server abort"), void b.reject(g, "error", "server abort");
                    if (q && q.location.href !== d.iframeSrc || v) {
                        m.detachEvent ? m.detachEvent("onload", u) : m.removeEventListener("load", u, !1);
                        var e, i = "success";
                        try {
                            if (v) throw "timeout";
                            var s = "xml" === d.dataType || q.XMLDocument || z.isXMLDoc(q);
                            if (O("isXml=" + s), !s && window.opera && (null === q.body || !q.body.innerHTML) && --S) return O("requeing onLoad callback, DOM not available"), void setTimeout(u, 250);
                            var n = q.body ? q.body : q.documentElement;
                            g.responseText = n ? n.innerHTML : null, g.responseXML = q.XMLDocument ? q.XMLDocument : q, s && (d.dataType = "xml"), g.getResponseHeader = function (t) {
                                return {"content-type": d.dataType}[t.toLowerCase()]
                            }, n && (g.status = Number(n.getAttribute("status")) || g.status, g.statusText = n.getAttribute("statusText") || g.statusText);
                            var o, r, a, c = (d.dataType || "").toLowerCase(), l = /(json|script|text)/.test(c);
                            l || d.textarea ? (o = q.getElementsByTagName("textarea")[0]) ? (g.responseText = o.value, g.status = Number(o.getAttribute("status")) || g.status, g.statusText = o.getAttribute("statusText") || g.statusText) : l && (r = q.getElementsByTagName("pre")[0], a = q.getElementsByTagName("body")[0], r ? g.responseText = r.textContent ? r.textContent : r.innerText : a && (g.responseText = a.textContent ? a.textContent : a.innerText)) : "xml" === c && !g.responseXML && g.responseText && (g.responseXML = k(g.responseText));
                            try {
                                j = D(g, c, d)
                            } catch (t) {
                                i = "parsererror", g.error = e = t || i
                            }
                        } catch (t) {
                            O("error caught: ", t), i = "error", g.error = e = t || i
                        }
                        g.aborted && (O("upload aborted"), i = null), g.status && (i = 200 <= g.status && g.status < 300 || 304 === g.status ? "success" : "error"), "success" === i ? (d.success && d.success.call(d.context, j, "success", g), b.resolve(g.responseText, "success", g), p && z.event.trigger("ajaxSuccess", [g, d])) : i && (void 0 === e && (e = g.statusText), d.error && d.error.call(d.context, g, i, e), b.reject(g, "error", e), p && z.event.trigger("ajaxError", [g, d, e])), p && z.event.trigger("ajaxComplete", [g, d]), p && !--z.active && z.event.trigger("ajaxStop"), d.complete && d.complete.call(d.context, g, i), C = !0, d.timeout && clearTimeout(y), setTimeout(function () {
                            d.iframeTarget ? f.attr("src", d.iframeSrc) : f.remove(), g.responseXML = null
                        }, 100)
                    }
                }
            }

            var i, s, d, p, o, f, m, g, n, r, v, y, a = M[0], b = z.Deferred();
            if (b.abort = function (t) {
                g.abort(t)
            }, t) for (s = 0; s < L.length; s++) i = z(L[s]), W ? i.prop("disabled", !1) : i.removeAttr("disabled");
            (d = z.extend(!0, {}, z.ajaxSettings, E)).context = d.context || d, o = "jqFormIO" + (new Date).getTime();
            var c = a.ownerDocument, l = M.closest("body");
            if (d.iframeTarget ? (r = (f = z(d.iframeTarget, c)).attr2("name")) ? o = r : f.attr2("name", o) : (f = z('<iframe name="' + o + '" src="' + d.iframeSrc + '" />', c)).css({
                position: "absolute",
                top: "-1000px",
                left: "-1000px"
            }), m = f[0], g = {
                aborted: 0,
                responseText: null,
                responseXML: null,
                status: 0,
                statusText: "n/a",
                getAllResponseHeaders: function () {
                },
                getResponseHeader: function () {
                },
                setRequestHeader: function () {
                },
                abort: function (t) {
                    var e = "timeout" === t ? "timeout" : "aborted";
                    O("aborting upload... " + e), this.aborted = 1;
                    try {
                        m.contentWindow.document.execCommand && m.contentWindow.document.execCommand("Stop")
                    } catch (t) {
                    }
                    f.attr("src", d.iframeSrc), g.error = e, d.error && d.error.call(d.context, g, e, t), p && z.event.trigger("ajaxError", [g, d, e]), d.complete && d.complete.call(d.context, g, e)
                }
            }, (p = d.global) && 0 == z.active++ && z.event.trigger("ajaxStart"), p && z.event.trigger("ajaxSend", [g, d]), d.beforeSend && !1 === d.beforeSend.call(d.context, g, d)) return d.global && z.active--, b.reject(), b;
            if (g.aborted) return b.reject(), b;
            (n = a.clk) && (r = n.name) && !n.disabled && (d.extraData = d.extraData || {}, d.extraData[r] = n.value, "image" === n.type && (d.extraData[r + ".x"] = a.clk_x, d.extraData[r + ".y"] = a.clk_y));
            var x = 1, w = 2, T = z("meta[name=csrf-token]").attr("content"),
                _ = z("meta[name=csrf-param]").attr("content");
            _ && T && (d.extraData = d.extraData || {}, d.extraData[_] = T), d.forceSync ? e() : setTimeout(e, 10);
            var j, q, C, S = 50, k = z.parseXML || function (t, e) {
                return window.ActiveXObject ? ((e = new ActiveXObject("Microsoft.XMLDOM")).async = "false", e.loadXML(t)) : e = (new DOMParser).parseFromString(t, "text/xml"), e && e.documentElement && "parsererror" !== e.documentElement.nodeName ? e : null
            }, A = z.parseJSON || function (t) {
                return window.eval("(" + t + ")")
            }, D = function (t, e, i) {
                var s = t.getResponseHeader("content-type") || "", n = ("xml" === e || !e) && 0 <= s.indexOf("xml"),
                    o = n ? t.responseXML : t.responseText;
                return n && "parsererror" === o.documentElement.nodeName && z.error && z.error("parsererror"), i && i.dataFilter && (o = i.dataFilter(o, e)), "string" == typeof o && (("json" === e || !e) && 0 <= s.indexOf("json") ? o = A(o) : ("script" === e || !e) && 0 <= s.indexOf("javascript") && z.globalEval(o)), o
            };
            return b
        }

        if (!this.length) return O("ajaxSubmit: skipping submit process - no element selected"), this;
        var F, n, o, M = this;
        "function" == typeof E ? E = {success: E} : "string" == typeof E || !1 === E && 0 < arguments.length ? (E = {
            url: E,
            data: t,
            dataType: e
        }, "function" == typeof i && (E.success = i)) : void 0 === E && (E = {}), F = E.method || E.type || this.attr2("method"), (o = (o = "string" == typeof (n = E.url || this.attr2("action")) ? z.trim(n) : "") || window.location.href || "") && (o = (o.match(/^([^#]+)/) || [])[1]), E = z.extend(!0, {
            url: o,
            success: z.ajaxSettings.success,
            type: F || z.ajaxSettings.type,
            iframeSrc: /^https/i.test(window.location.href || "") ? "javascript:false" : "about:blank"
        }, E);
        var r = {};
        if (this.trigger("form-pre-serialize", [this, E, r]), r.veto) return O("ajaxSubmit: submit vetoed via form-pre-serialize trigger"), this;
        if (E.beforeSerialize && !1 === E.beforeSerialize(this, E)) return O("ajaxSubmit: submit aborted via beforeSerialize callback"), this;
        var a = E.traditional;
        void 0 === a && (a = z.ajaxSettings.traditional);
        var c, l, L = [], h = this.formToArray(E.semantic, L, E.filtering);
        if (E.data && (l = z.isFunction(E.data) ? E.data(h) : E.data, E.extraData = l, c = z.param(l, a)), E.beforeSubmit && !1 === E.beforeSubmit(h, this, E)) return O("ajaxSubmit: submit aborted via beforeSubmit callback"), this;
        if (this.trigger("form-submit-validate", [h, this, E, r]), r.veto) return O("ajaxSubmit: submit vetoed via form-submit-validate trigger"), this;
        var u = z.param(h, a);
        c && (u = u ? u + "&" + c : c), "GET" === E.type.toUpperCase() ? (E.url += (0 <= E.url.indexOf("?") ? "&" : "?") + u, E.data = null) : E.data = u;
        var d, p, f, m = [];
        E.resetForm && m.push(function () {
            M.resetForm()
        }), E.clearForm && m.push(function () {
            M.clearForm(E.includeHidden)
        }), !E.dataType && E.target ? (d = E.success || function () {
        }, m.push(function (t, e, i) {
            var s = arguments, n = E.replaceTarget ? "replaceWith" : "html";
            z(E.target)[n](t).each(function () {
                d.apply(this, s)
            })
        })) : E.success && (z.isArray(E.success) ? z.merge(m, E.success) : m.push(E.success)), E.success = function (t, e, i) {
            for (var s = E.context || this, n = 0, o = m.length; n < o; n++) m[n].apply(s, [t, e, i || M, M])
        }, E.error && (p = E.error, E.error = function (t, e, i) {
            var s = E.context || this;
            p.apply(s, [t, e, i, M])
        }), E.complete && (f = E.complete, E.complete = function (t, e) {
            var i = E.context || this;
            f.apply(i, [t, e, M])
        });
        var g = 0 < z("input[type=file]:enabled", this).filter(function () {
                return "" !== z(this).val()
            }).length, v = "multipart/form-data", y = M.attr("enctype") === v || M.attr("encoding") === v,
            b = _.fileapi && _.formdata;
        O("fileAPI :" + b);
        var x, w = (g || y) && !b;
        !1 !== E.iframe && (E.iframe || w) ? E.closeKeepAlive ? z.get(E.closeKeepAlive, function () {
            x = s(h)
        }) : x = s(h) : x = (g || y) && b ? function (t) {
            for (var i = new FormData, e = 0; e < t.length; e++) i.append(t[e].name, t[e].value);
            if (E.extraData) for (var s = function (t) {
                for (var e, i = z.param(t, E.traditional).split("&"), s = i.length, n = [], o = 0; o < s; o++) i[o] = i[o].replace(/\+/g, " "), e = i[o].split("="), n.push([decodeURIComponent(e[0]), decodeURIComponent(e[1])]);
                return n
            }(E.extraData), e = 0; e < s.length; e++) s[e] && i.append(s[e][0], s[e][1]);
            E.data = null;
            var n = z.extend(!0, {}, z.ajaxSettings, E, {
                contentType: !1,
                processData: !1,
                cache: !1,
                type: F || "POST"
            });
            E.uploadProgress && (n.xhr = function () {
                var t = z.ajaxSettings.xhr();
                return t.upload && t.upload.addEventListener("progress", function (t) {
                    var e = 0, i = t.loaded || t.position, s = t.total;
                    t.lengthComputable && (e = Math.ceil(i / s * 100)), E.uploadProgress(t, i, s, e)
                }, !1), t
            }), n.data = null;
            var o = n.beforeSend;
            return n.beforeSend = function (t, e) {
                E.formData ? e.data = E.formData : e.data = i, o && o.call(this, t, e)
            }, z.ajax(n)
        }(h) : z.ajax(E), M.removeData("jqxhr").data("jqxhr", x);
        for (var T = 0; T < L.length; T++) L[T] = null;
        return this.trigger("form-submit-notify", [this, E]), this
    }, z.fn.ajaxForm = function (t, e, i, s) {
        if (("string" == typeof t || !1 === t && 0 < arguments.length) && (t = {
            url: t,
            data: e,
            dataType: i
        }, "function" == typeof s && (t.success = s)), (t = t || {}).delegation = t.delegation && z.isFunction(z.fn.on), t.delegation || 0 !== this.length) return t.delegation ? (z(document).off("submit.form-plugin", this.selector, o).off("click.form-plugin", this.selector, r).on("submit.form-plugin", this.selector, t, o).on("click.form-plugin", this.selector, t, r), this) : this.ajaxFormUnbind().on("submit.form-plugin", t, o).on("click.form-plugin", t, r);
        var n = {s: this.selector, c: this.context};
        return !z.isReady && n.s ? (O("DOM not ready, queuing ajaxForm"), z(function () {
            z(n.s, n.c).ajaxForm(t)
        })) : O("terminating; zero elements found by selector" + (z.isReady ? "" : " (DOM not ready)")), this
    }, z.fn.ajaxFormUnbind = function () {
        return this.off("submit.form-plugin click.form-plugin")
    }, z.fn.formToArray = function (t, e, i) {
        var s = [];
        if (0 === this.length) return s;
        var n, o, r, a, c, l, h, u, d, p, f = this[0], m = this.attr("id"),
            g = (g = t || void 0 === f.elements ? f.getElementsByTagName("*") : f.elements) && z.makeArray(g);
        if (m && (t || /(Edge|Trident)\//.test(navigator.userAgent)) && (n = z(':input[form="' + m + '"]').get()).length && (g = (g || []).concat(n)), !g || !g.length) return s;
        for (z.isFunction(i) && (g = z.map(g, i)), o = 0, h = g.length; o < h; o++) if ((a = (l = g[o]).name) && !l.disabled) if (t && f.clk && "image" === l.type) f.clk === l && (s.push({
            name: a,
            value: z(l).val(),
            type: l.type
        }), s.push({name: a + ".x", value: f.clk_x}, {
            name: a + ".y",
            value: f.clk_y
        })); else if ((c = z.fieldValue(l, !0)) && c.constructor === Array) for (e && e.push(l), r = 0, u = c.length; r < u; r++) s.push({
            name: a,
            value: c[r]
        }); else if (_.fileapi && "file" === l.type) {
            e && e.push(l);
            var v = l.files;
            if (v.length) for (r = 0; r < v.length; r++) s.push({
                name: a,
                value: v[r],
                type: l.type
            }); else s.push({name: a, value: "", type: l.type})
        } else null != c && (e && e.push(l), s.push({name: a, value: c, type: l.type, required: l.required}));
        return t || !f.clk || (a = (p = (d = z(f.clk))[0]).name) && !p.disabled && "image" === p.type && (s.push({
            name: a,
            value: d.val()
        }), s.push({name: a + ".x", value: f.clk_x}, {name: a + ".y", value: f.clk_y})), s
    }, z.fn.formSerialize = function (t) {
        return z.param(this.formToArray(t))
    }, z.fn.fieldSerialize = function (n) {
        var o = [];
        return this.each(function () {
            var t = this.name;
            if (t) {
                var e = z.fieldValue(this, n);
                if (e && e.constructor === Array) for (var i = 0, s = e.length; i < s; i++) o.push({
                    name: t,
                    value: e[i]
                }); else null != e && o.push({name: this.name, value: e})
            }
        }), z.param(o)
    }, z.fn.fieldValue = function (t) {
        for (var e = [], i = 0, s = this.length; i < s; i++) {
            var n = this[i], o = z.fieldValue(n, t);
            null == o || o.constructor === Array && !o.length || (o.constructor === Array ? z.merge(e, o) : e.push(o))
        }
        return e
    }, z.fieldValue = function (t, e) {
        var i = t.name, s = t.type, n = t.tagName.toLowerCase();
        if (void 0 === e && (e = !0), e && (!i || t.disabled || "reset" === s || "button" === s || ("checkbox" === s || "radio" === s) && !t.checked || ("submit" === s || "image" === s) && t.form && t.form.clk !== t || "select" === n && -1 === t.selectedIndex)) return null;
        if ("select" !== n) return z(t).val().replace(p, "\r\n");
        var o = t.selectedIndex;
        if (o < 0) return null;
        for (var r = [], a = t.options, c = "select-one" === s, l = c ? o + 1 : a.length, h = c ? o : 0; h < l; h++) {
            var u = a[h];
            if (u.selected && !u.disabled) {
                var d = (d = u.value) || (u.attributes && u.attributes.value && !u.attributes.value.specified ? u.text : u.value);
                if (c) return d;
                r.push(d)
            }
        }
        return r
    }, z.fn.clearForm = function (t) {
        return this.each(function () {
            z("input,select,textarea", this).clearFields(t)
        })
    }, z.fn.clearFields = z.fn.clearInputs = function (i) {
        var s = /^(?:color|date|datetime|email|month|number|password|range|search|tel|text|time|url|week)$/i;
        return this.each(function () {
            var t = this.type, e = this.tagName.toLowerCase();
            s.test(t) || "textarea" === e ? this.value = "" : "checkbox" === t || "radio" === t ? this.checked = !1 : "select" === e ? this.selectedIndex = -1 : "file" === t ? /MSIE/.test(navigator.userAgent) ? z(this).replaceWith(z(this).clone(!0)) : z(this).val("") : i && (!0 === i && /hidden/.test(t) || "string" == typeof i && z(this).is(i)) && (this.value = "")
        })
    }, z.fn.resetForm = function () {
        return this.each(function () {
            var e = z(this), t = this.tagName.toLowerCase();
            switch (t) {
                case"input":
                    this.checked = this.defaultChecked;
                case"textarea":
                    return this.value = this.defaultValue, !0;
                case"option":
                case"optgroup":
                    var i = e.parents("select");
                    return i.length && i[0].multiple ? "option" === t ? this.selected = this.defaultSelected : e.find("option").resetForm() : i.resetForm(), !0;
                case"select":
                    return e.find("option").each(function (t) {
                        if (this.selected = this.defaultSelected, this.defaultSelected && !e[0].multiple) return e[0].selectedIndex = t, !1
                    }), !0;
                case"label":
                    var s = z(e.attr("for")), n = e.find("input,select,textarea");
                    return s[0] && n.unshift(s[0]), n.resetForm(), !0;
                case"form":
                    return "function" != typeof this.reset && ("object" != typeof this.reset || this.reset.nodeType) || this.reset(), !0;
                default:
                    return e.find("form,input,label,select,textarea").resetForm(), !0
            }
        })
    }, z.fn.enable = function (t) {
        return void 0 === t && (t = !0), this.each(function () {
            this.disabled = !t
        })
    }, z.fn.selected = function (i) {
        return void 0 === i && (i = !0), this.each(function () {
            var t, e = this.type;
            "checkbox" === e || "radio" === e ? this.checked = i : "option" === this.tagName.toLowerCase() && (t = z(this).parent("select"), i && t[0] && "select-one" === t[0].type && t.find("option").selected(!1), this.selected = i)
        })
    }, z.fn.ajaxSubmit.debug = !1
}), function (mt, gt, vt) {
    !function (t) {
        "use strict";
        "function" == typeof define && define.amd ? define(["jquery"], t) : jQuery && !jQuery.fn.qtip && t(jQuery)
    }(function (S) {
        "use strict";

        function p(t, e, i, s) {
            this.id = i, this.target = t, this.tooltip = w, this.elements = {target: t}, this._id = T + "-" + i, this.timers = {img: {}}, this.options = e, this.plugins = {}, this.cache = {
                event: {},
                target: S(),
                disabled: A,
                attr: s,
                onTooltip: A,
                lastClass: ""
            }, this.rendered = this.destroyed = this.disabled = this.waiting = this.hiddenDuringWait = this.positioning = this.triggering = A
        }

        function i(t) {
            return t === w || "object" !== S.type(t)
        }

        function s(t) {
            return !(S.isFunction(t) || t && t.attr || t.length || "object" === S.type(t) && (t.jquery || t.then))
        }

        function f(t) {
            var e, n, o, r;
            return i(t) ? A : (i(t.metadata) && (t.metadata = {type: t.metadata}), "content" in t && (i(e = t.content) || e.jquery || e.done ? e = t.content = {text: n = s(e) ? A : e} : n = e.text, "ajax" in e && (o = e.ajax, r = o && o.once !== A, delete e.ajax, e.text = function (t, s) {
                var e = n || S(this).attr(s.options.content.attr) || "Loading...",
                    i = S.ajax(S.extend({}, o, {context: s})).then(o.success, w, o.error).then(function (t) {
                        return t && r && s.set("content.text", t), t
                    }, function (t, e, i) {
                        s.destroyed || 0 === t.status || s.set("content.text", e + ": " + i)
                    });
                return r ? e : (s.set("content.text", e), i)
            }), "title" in e && (S.isPlainObject(e.title) && (e.button = e.title.button, e.title = e.title.text), s(e.title || A) && (e.title = A))), "position" in t && i(t.position) && (t.position = {
                my: t.position,
                at: t.position
            }), "show" in t && i(t.show) && (t.show = t.show.jquery ? {target: t.show} : t.show === k ? {ready: k} : {event: t.show}), "hide" in t && i(t.hide) && (t.hide = t.hide.jquery ? {target: t.hide} : {event: t.hide}), "style" in t && i(t.style) && (t.style = {classes: t.style}), S.each(I, function () {
                this.sanitize && this.sanitize(t)
            }), t)
        }

        function c(t, e) {
            for (var i, s = 0, n = t, o = e.split("."); n = n[o[s++]];) s < o.length && (i = n);
            return [i || t, o.pop()]
        }

        function l(t, e) {
            var i, s, n;
            for (i in this.checks) for (s in this.checks[i]) (n = new RegExp(s, "i").exec(t)) && (e.push(n), "builtin" !== i && !this.plugins[i] || this.checks[i][s].apply(this.plugins[i] || this, e))
        }

        function n(t) {
            return j.concat("").join(t ? "-" + t + " " : " ")
        }

        function a(t, e) {
            return 0 < e ? setTimeout(S.proxy(t, this), e) : void t.call(this)
        }

        function d(t) {
            this.tooltip.hasClass(H) || (clearTimeout(this.timers.show), clearTimeout(this.timers.hide), this.timers.show = a.call(this, function () {
                this.toggle(k, t)
            }, this.options.show.delay))
        }

        function m(t) {
            if (!this.tooltip.hasClass(H) && !this.destroyed) {
                var e = S(t.relatedTarget), i = e.closest(q)[0] === this.tooltip[0],
                    s = e[0] === this.options.show.target[0];
                if (clearTimeout(this.timers.show), clearTimeout(this.timers.hide), this !== e[0] && "mouse" === this.options.position.target && i || this.options.hide.fixed && /mouse(out|leave|move)/.test(t.type) && (i || s)) try {
                    t.preventDefault(), t.stopImmediatePropagation()
                } catch (t) {
                } else this.timers.hide = a.call(this, function () {
                    this.toggle(A, t)
                }, this.options.hide.delay, this)
            }
        }

        function g(t) {
            !this.tooltip.hasClass(H) && this.options.hide.inactive && (clearTimeout(this.timers.inactive), this.timers.inactive = a.call(this, function () {
                this.hide(t)
            }, this.options.hide.inactive))
        }

        function v(t) {
            this.rendered && 0 < this.tooltip[0].offsetWidth && this.reposition(t)
        }

        function t(t, e, i) {
            S(gt.body).delegate(t, (e.split ? e : e.join("." + T + " ")) + "." + T, function () {
                var t = y.api[S.attr(this, u)];
                t && !t.disabled && i.apply(t, arguments)
            })
        }

        function h(t) {
            return t.charAt(0).toUpperCase() + t.slice(1)
        }

        function o(t, e) {
            return Math.ceil(parseFloat(function (t, e) {
                var i, s, n = e.charAt(0).toUpperCase() + e.slice(1), o = (e + " " + ft.join(n + " ") + n).split(" "),
                    r = 0;
                if (pt[e]) return t.css(pt[e]);
                for (; i = o[r++];) if ((s = t.css(i)) !== vt) return pt[e] = i, s
            }(t, e)))
        }

        function e(t, e) {
            this._ns = "tip", this.options = e, this.offset = e.offset, this.size = [e.width, e.height], this.init(this.qtip = t)
        }

        var y, b, r, x, k = !0, A = !1, w = null, D = "x", E = "y", F = "width", M = "height", L = "top", z = "left",
            O = "bottom", W = "right", $ = "center", P = "shift", I = {}, T = "qtip", _ = "data-hasqtip",
            u = "data-qtip-id", j = ["ui-widget", "ui-tooltip"], q = "." + T,
            C = "click dblclick mousedown mouseup mousemove mouseleave mouseenter".split(" "), N = T + "-fixed",
            X = T + "-default", B = T + "-focus", R = T + "-hover", H = T + "-disabled", V = "_replacedByqTip",
            Y = "oldtitle", Q = {
                ie: function () {
                    for (var t = 4, e = gt.createElement("div"); (e.innerHTML = "\x3c!--[if gt IE " + t + "]><i></i><![endif]--\x3e") && e.getElementsByTagName("i")[0]; t += 1) ;
                    return 4 < t ? t : NaN
                }(),
                iOS: parseFloat(("" + (/CPU.*OS ([0-9_]{1,5})|(CPU like).*AppleWebKit.*Mobile/i.exec(navigator.userAgent) || [0, ""])[1]).replace("undefined", "3_2").replace("_", ".").replace("_", "")) || A
            }, U = p.prototype;
        U._when = function (t) {
            return S.when.apply(S, t)
        }, U.render = function (t) {
            if (this.rendered || this.destroyed) return this;
            var i = this, e = this.options, s = this.cache, n = this.elements, o = e.content.text, r = e.content.title,
                a = e.content.button, c = e.position, l = (this._id, []);
            return S.attr(this.target[0], "aria-describedby", this._id), s.posClass = this._createPosClass((this.position = {
                my: c.my,
                at: c.at
            }).my), this.tooltip = n.tooltip = S("<div/>", {
                id: this._id,
                class: [T, X, e.style.classes, s.posClass].join(" "),
                width: e.style.width || "",
                height: e.style.height || "",
                tracking: "mouse" === c.target && c.adjust.mouse,
                role: "alert",
                "aria-live": "polite",
                "aria-atomic": A,
                "aria-describedby": this._id + "-content",
                "aria-hidden": k
            }).toggleClass(H, this.disabled).attr(u, this.id).data(T, this).appendTo(c.container).append(n.content = S("<div />", {
                class: T + "-content",
                id: this._id + "-content",
                "aria-atomic": k
            })), this.rendered = -1, this.positioning = k, r && (this._createTitle(), S.isFunction(r) || l.push(this._updateTitle(r, A))), a && this._createButton(), S.isFunction(o) || l.push(this._updateContent(o, A)), this.rendered = k, this._setWidget(), S.each(I, function (t) {
                var e;
                "render" === this.initialize && (e = this(i)) && (i.plugins[t] = e)
            }), this._unassignEvents(), this._assignEvents(), this._when(l).then(function () {
                i._trigger("render"), i.positioning = A, i.hiddenDuringWait || !e.show.ready && !t || i.toggle(k, s.event, A), i.hiddenDuringWait = A
            }), y.api[this.id] = this
        }, U.destroy = function (t) {
            function e() {
                if (!this.destroyed) {
                    this.destroyed = k;
                    var t, e = this.target, i = e.attr(Y);
                    for (t in this.rendered && this.tooltip.stop(1, 0).find("*").remove().end().remove(), S.each(this.plugins, function () {
                        this.destroy && this.destroy()
                    }), this.timers) clearTimeout(this.timers[t]);
                    e.removeData(T).removeAttr(u).removeAttr(_).removeAttr("aria-describedby"), this.options.suppress && i && e.attr("title", i).removeAttr(Y), this._unassignEvents(), this.options = this.elements = this.cache = this.timers = this.plugins = this.mouse = w, delete y.api[this.id]
                }
            }

            return this.destroyed || (t === k && "hide" !== this.triggering || !this.rendered ? e.call(this) : (this.tooltip.one("tooltiphidden", S.proxy(e, this)), this.triggering || this.hide())), this.target
        }, r = U.checks = {
            builtin: {
                "^id$": function (t, e, i, s) {
                    var n = i === k ? y.nextid : i, o = T + "-" + n;
                    n !== A && 0 < n.length && !S("#" + o).length ? (this._id = o, this.rendered && (this.tooltip[0].id = this._id, this.elements.content[0].id = this._id + "-content", this.elements.title[0].id = this._id + "-title")) : t[e] = s
                }, "^prerender": function (t, e, i) {
                    i && !this.rendered && this.render(this.options.show.ready)
                }, "^content.text$": function (t, e, i) {
                    this._updateContent(i)
                }, "^content.attr$": function (t, e, i, s) {
                    this.options.content.text === this.target.attr(s) && this._updateContent(this.target.attr(i))
                }, "^content.title$": function (t, e, i) {
                    return i ? (i && !this.elements.title && this._createTitle(), void this._updateTitle(i)) : this._removeTitle()
                }, "^content.button$": function (t, e, i) {
                    this._updateButton(i)
                }, "^content.title.(text|button)$": function (t, e, i) {
                    this.set("content." + e, i)
                }, "^position.(my|at)$": function (t, e, i) {
                    "string" == typeof i && (this.position[e] = t[e] = new b(i, "at" === e))
                }, "^position.container$": function (t, e, i) {
                    this.rendered && this.tooltip.appendTo(i)
                }, "^show.ready$": function (t, e, i) {
                    i && (!this.rendered && this.render(k) || this.toggle(k))
                }, "^style.classes$": function (t, e, i, s) {
                    this.rendered && this.tooltip.removeClass(s).addClass(i)
                }, "^style.(width|height)": function (t, e, i) {
                    this.rendered && this.tooltip.css(e, i)
                }, "^style.widget|content.title": function () {
                    this.rendered && this._setWidget()
                }, "^style.def": function (t, e, i) {
                    this.rendered && this.tooltip.toggleClass(X, !!i)
                }, "^events.(render|show|move|hide|focus|blur)$": function (t, e, i) {
                    this.rendered && this.tooltip[(S.isFunction(i) ? "" : "un") + "bind"]("tooltip" + e, i)
                }, "^(show|hide|position).(event|target|fixed|inactive|leave|distance|viewport|adjust)": function () {
                    var t;
                    this.rendered && (t = this.options.position, this.tooltip.attr("tracking", "mouse" === t.target && t.adjust.mouse), this._unassignEvents(), this._assignEvents())
                }
            }
        }, U.get = function (t) {
            if (this.destroyed) return this;
            var e = c(this.options, t.toLowerCase()), i = e[0][e[1]];
            return i.precedance ? i.string() : i
        };
        var J = /^position\.(my|at|adjust|target|container|viewport)|style|content|show\.ready/i,
            K = /^prerender|show\.ready/i;
        U.set = function (n, t) {
            if (this.destroyed) return this;
            var e, o = this.rendered, r = A, a = this.options;
            return this.checks, "string" == typeof n ? (e = n, (n = {})[e] = t) : n = S.extend({}, n), S.each(n, function (t, e) {
                var i, s;
                o && K.test(t) ? delete n[t] : (s = (i = c(a, t.toLowerCase()))[0][i[1]], i[0][i[1]] = e && e.nodeType ? S(e) : e, r = J.test(t) || r, n[t] = [i[0], i[1], e, s])
            }), f(a), this.positioning = k, S.each(n, S.proxy(l, this)), this.positioning = A, this.rendered && 0 < this.tooltip[0].offsetWidth && r && this.reposition("mouse" === a.position.target ? w : this.cache.event), this
        }, U._update = function (t, e) {
            var i = this, s = this.cache;
            return this.rendered && t ? (S.isFunction(t) && (t = t.call(this.elements.target, s.event, this) || ""), S.isFunction(t.then) ? (s.waiting = k, t.then(function (t) {
                return s.waiting = A, i._update(t, e)
            }, w, function (t) {
                return i._update(t, e)
            })) : t === A || !t && "" !== t ? A : (t.jquery && 0 < t.length ? e.empty().append(t.css({
                display: "block",
                visibility: "visible"
            })) : e.html(t), this._waitForContent(e).then(function (t) {
                i.rendered && 0 < i.tooltip[0].offsetWidth && i.reposition(s.event, !t.length)
            }))) : A
        }, U._waitForContent = function (t) {
            var e = this.cache;
            return e.waiting = k, (S.fn.imagesLoaded ? t.imagesLoaded() : S.Deferred().resolve([])).done(function () {
                e.waiting = A
            }).promise()
        }, U._updateContent = function (t, e) {
            this._update(t, this.elements.content, e)
        }, U._updateTitle = function (t, e) {
            this._update(t, this.elements.title, e) === A && this._removeTitle(A)
        }, U._createTitle = function () {
            var t = this.elements, e = this._id + "-title";
            t.titlebar && this._removeTitle(), t.titlebar = S("<div />", {class: T + "-titlebar " + (this.options.style.widget ? n("header") : "")}).append(t.title = S("<div />", {
                id: e,
                class: T + "-title",
                "aria-atomic": k
            })).insertBefore(t.content).delegate(".qtip-close", "mousedown keydown mouseup keyup mouseout", function (t) {
                S(this).toggleClass("ui-state-active ui-state-focus", "down" === t.type.substr(-4))
            }).delegate(".qtip-close", "mouseover mouseout", function (t) {
                S(this).toggleClass("ui-state-hover", "mouseover" === t.type)
            }), this.options.content.button && this._createButton()
        }, U._removeTitle = function (t) {
            var e = this.elements;
            e.title && (e.titlebar.remove(), e.titlebar = e.title = e.button = w, t !== A && this.reposition())
        }, U._createPosClass = function (t) {
            return T + "-pos-" + (t || this.options.position.my).abbrev()
        }, U.reposition = function (t, e) {
            if (!this.rendered || this.positioning || this.destroyed) return this;
            this.positioning = k;
            var i, s, n, o, r = this.cache, a = this.tooltip, c = this.options.position, l = c.target, h = c.my,
                u = c.at, d = c.viewport, p = c.container, f = c.adjust, m = f.method.split(" "), g = a.outerWidth(A),
                v = a.outerHeight(A), y = 0, b = 0, x = a.css("position"), w = {left: 0, top: 0},
                T = 0 < a[0].offsetWidth, _ = t && "scroll" === t.type, j = S(mt), q = p[0].ownerDocument,
                C = this.mouse;
            if (S.isArray(l) && 2 === l.length) u = {x: z, y: L}, w = {
                left: l[0],
                top: l[1]
            }; else if ("mouse" === l) u = {
                x: z,
                y: L
            }, (!f.mouse || this.options.hide.distance) && r.origin && r.origin.pageX ? t = r.origin : !t || t && ("resize" === t.type || "scroll" === t.type) ? t = r.event : C && C.pageX && (t = C), "static" !== x && (w = p.offset()), q.body.offsetWidth !== (mt.innerWidth || q.documentElement.clientWidth) && (s = S(gt.body).offset()), w = {
                left: t.pageX - w.left + (s && s.left || 0),
                top: t.pageY - w.top + (s && s.top || 0)
            }, f.mouse && _ && C && (w.left -= (C.scrollX || 0) - j.scrollLeft(), w.top -= (C.scrollY || 0) - j.scrollTop()); else {
                if ("event" === l ? t && t.target && "scroll" !== t.type && "resize" !== t.type ? r.target = S(t.target) : t.target || (r.target = this.elements.target) : "event" !== l && (r.target = S(l.jquery ? l : this.elements.target)), l = r.target, 0 === (l = S(l).eq(0)).length) return this;
                l[0] === gt || l[0] === mt ? (y = Q.iOS ? mt.innerWidth : l.width(), b = Q.iOS ? mt.innerHeight : l.height(), l[0] === mt && (w = {
                    top: (d || l).scrollTop(),
                    left: (d || l).scrollLeft()
                })) : I.imagemap && l.is("area") ? i = I.imagemap(this, l, u, I.viewport ? m : A) : I.svg && l && l[0].ownerSVGElement ? i = I.svg(this, l, u, I.viewport ? m : A) : (y = l.outerWidth(A), b = l.outerHeight(A), w = l.offset()), i && (y = i.width, b = i.height, s = i.offset, w = i.position), w = this.reposition.offset(l, w, p), (3.1 < Q.iOS && Q.iOS < 4.1 || 4.3 <= Q.iOS && Q.iOS < 4.33 || !Q.iOS && "fixed" === x) && (w.left -= j.scrollLeft(), w.top -= j.scrollTop()), (!i || i && i.adjustable !== A) && (w.left += u.x === W ? y : u.x === $ ? y / 2 : 0, w.top += u.y === O ? b : u.y === $ ? b / 2 : 0)
            }
            return w.left += f.x + (h.x === W ? -g : h.x === $ ? -g / 2 : 0), w.top += f.y + (h.y === O ? -v : h.y === $ ? -v / 2 : 0), I.viewport ? (n = w.adjusted = I.viewport(this, w, c, y, b, g, v), s && n.left && (w.left += s.left), s && n.top && (w.top += s.top), n.my && (this.position.my = n.my)) : w.adjusted = {
                left: 0,
                top: 0
            }, r.posClass !== (o = this._createPosClass(this.position.my)) && a.removeClass(r.posClass).addClass(r.posClass = o), this._trigger("move", [w, d.elem || d], t) && (delete w.adjusted, e === A || !T || isNaN(w.left) || isNaN(w.top) || "mouse" === l || !S.isFunction(c.effect) ? a.css(w) : S.isFunction(c.effect) && (c.effect.call(a, this, S.extend({}, w)), a.queue(function (t) {
                S(this).css({opacity: "", height: ""}), Q.ie && this.style.removeAttribute("filter"), t()
            })), this.positioning = A), this
        }, U.reposition.offset = function (t, i, e) {
            function s(t, e) {
                i.left += e * t.scrollLeft(), i.top += e * t.scrollTop()
            }

            if (!e[0]) return i;
            for (var n, o, r, a, c = S(t[0].ownerDocument), l = !!Q.ie && "CSS1Compat" !== gt.compatMode, h = e[0]; "static" !== (o = S.css(h, "position")) && ("fixed" === o ? (r = h.getBoundingClientRect(), s(c, -1)) : ((r = S(h).position()).left += parseFloat(S.css(h, "borderLeftWidth")) || 0, r.top += parseFloat(S.css(h, "borderTopWidth")) || 0), i.left -= r.left + (parseFloat(S.css(h, "marginLeft")) || 0), i.top -= r.top + (parseFloat(S.css(h, "marginTop")) || 0), n || "hidden" === (a = S.css(h, "overflow")) || "visible" === a || (n = S(h))), h = h.offsetParent;) ;
            return n && (n[0] !== c[0] || l) && s(n, 1), i
        };
        var G = (b = U.reposition.Corner = function (t, e) {
            t = ("" + t).replace(/([A-Z])/, " $1").replace(/middle/gi, $).toLowerCase(), this.x = (t.match(/left|right/i) || t.match(/center/) || ["inherit"])[0].toLowerCase(), this.y = (t.match(/top|bottom|center/i) || ["inherit"])[0].toLowerCase(), this.forceY = !!e;
            var i = t.charAt(0);
            this.precedance = "t" === i || "b" === i ? E : D
        }).prototype;
        G.invert = function (t, e) {
            this[t] = this[t] === z ? W : this[t] === W ? z : e || this[t]
        }, G.string = function (t) {
            var e = this.x, i = this.y,
                s = e !== i ? "center" === e || "center" !== i && (this.precedance === E || this.forceY) ? [i, e] : [e, i] : [e];
            return !1 !== t ? s.join(" ") : s
        }, G.abbrev = function () {
            var t = this.string(!1);
            return t[0].charAt(0) + (t[1] && t[1].charAt(0) || "")
        }, G.clone = function () {
            return new b(this.string(), this.forceY)
        }, U.toggle = function (t, e) {
            var i = this.cache, s = this.options, n = this.tooltip;
            if (e) {
                if (/over|enter/.test(e.type) && i.event && /out|leave/.test(i.event.type) && s.show.target.add(e.target).length === s.show.target.length && n.has(e.relatedTarget).length) return this;
                i.event = S.event.fix(e)
            }
            if (this.waiting && !t && (this.hiddenDuringWait = k), !this.rendered) return t ? this.render(1) : this;
            if (this.destroyed || this.disabled) return this;
            var o, r, a, c = t ? "show" : "hide", l = this.options[c],
                h = (this.options[t ? "hide" : "show"], this.options.position), u = this.options.content,
                d = this.tooltip.css("width"), p = this.tooltip.is(":visible"), f = t || 1 === l.target.length,
                m = !e || l.target.length < 2 || i.target[0] === e.target;
            return (typeof t).search("boolean|number") && (t = !p), r = (o = !n.is(":animated") && p === t && m) ? w : !!this._trigger(c, [90]), this.destroyed || (r !== A && t && this.focus(e), !r || o || (S.attr(n[0], "aria-hidden", !t), t ? (this.mouse && (i.origin = S.event.fix(this.mouse)), S.isFunction(u.text) && this._updateContent(u.text, A), S.isFunction(u.title) && this._updateTitle(u.title, A), !x && "mouse" === h.target && h.adjust.mouse && (S(gt).bind("mousemove." + T, this._storeMouse), x = k), d || n.css("width", n.outerWidth(A)), this.reposition(e, arguments[2]), d || n.css("width", ""), l.solo && ("string" == typeof l.solo ? S(l.solo) : S(q, l.solo)).not(n).not(l.target).qtip("hide", S.Event("tooltipsolo"))) : (clearTimeout(this.timers.show), delete i.origin, x && !S(q + '[tracking="true"]:visible', l.solo).not(n).length && (S(gt).unbind("mousemove." + T), x = A), this.blur(e)), a = S.proxy(function () {
                t ? (Q.ie && n[0].style.removeAttribute("filter"), n.css("overflow", ""), "string" == typeof l.autofocus && S(this.options.show.autofocus, n).focus(), this.options.show.target.trigger("qtip-" + this.id + "-inactive")) : n.css({
                    display: "",
                    visibility: "",
                    opacity: "",
                    left: "",
                    top: ""
                }), this._trigger(t ? "visible" : "hidden")
            }, this), l.effect === A || f === A ? (n[c](), a()) : S.isFunction(l.effect) ? (n.stop(1, 1), l.effect.call(n, this), n.queue("fx", function (t) {
                a(), t()
            })) : n.fadeTo(90, t ? 1 : 0, a), t && l.target.trigger("qtip-" + this.id + "-inactive"))), this
        }, U.show = function (t) {
            return this.toggle(k, t)
        }, U.hide = function (t) {
            return this.toggle(A, t)
        }, U.focus = function (t) {
            if (!this.rendered || this.destroyed) return this;
            var e = S(q), i = this.tooltip, s = parseInt(i[0].style.zIndex, 10), n = y.zindex + e.length;
            return i.hasClass(B) || this._trigger("focus", [n], t) && (s !== n && (e.each(function () {
                this.style.zIndex > s && (this.style.zIndex = this.style.zIndex - 1)
            }), e.filter("." + B).qtip("blur", t)), i.addClass(B)[0].style.zIndex = n), this
        }, U.blur = function (t) {
            return !this.rendered || this.destroyed || (this.tooltip.removeClass(B), this._trigger("blur", [this.tooltip.css("zIndex")], t)), this
        }, U.disable = function (t) {
            return this.destroyed || ("toggle" === t ? t = !(this.rendered ? this.tooltip.hasClass(H) : this.disabled) : "boolean" != typeof t && (t = k), this.rendered && this.tooltip.toggleClass(H, t).attr("aria-disabled", t), this.disabled = !!t), this
        }, U.enable = function () {
            return this.disable(A)
        }, U._createButton = function () {
            var e = this, t = this.elements, i = t.tooltip, s = this.options.content.button,
                n = "string" == typeof s ? s : "Close tooltip";
            t.button && t.button.remove(), t.button = s.jquery ? s : S("<a />", {
                class: "qtip-close " + (this.options.style.widget ? "" : T + "-icon"),
                title: n,
                "aria-label": n
            }).prepend(S("<span />", {
                class: "ui-icon ui-icon-close",
                html: "&times;"
            })), t.button.appendTo(t.titlebar || i).attr("role", "button").click(function (t) {
                return i.hasClass(H) || e.hide(t), A
            })
        }, U._updateButton = function (t) {
            if (!this.rendered) return A;
            var e = this.elements.button;
            t ? this._createButton() : e.remove()
        }, U._setWidget = function () {
            var t = this.options.style.widget, e = this.elements, i = e.tooltip, s = i.hasClass(H);
            i.removeClass(H), H = t ? "ui-state-disabled" : "qtip-disabled", i.toggleClass(H, s), i.toggleClass("ui-helper-reset " + n(), t).toggleClass(X, this.options.style.def && !t), e.content && e.content.toggleClass(n("content"), t), e.titlebar && e.titlebar.toggleClass(n("header"), t), e.button && e.button.toggleClass(T + "-icon", !t)
        }, U._storeMouse = function (t) {
            return (this.mouse = S.event.fix(t)).type = "mousemove", this
        }, U._bind = function (t, e, i, s, n) {
            if (t && i && e.length) {
                var o = "." + this._id + (s ? "-" + s : "");
                return S(t).bind((e.split ? e : e.join(o + " ")) + o, S.proxy(i, n || this)), this
            }
        }, U._unbind = function (t, e) {
            return t && S(t).unbind("." + this._id + (e ? "-" + e : "")), this
        }, U._trigger = function (t, e, i) {
            var s = S.Event("tooltip" + t);
            return s.originalEvent = i && S.extend({}, i) || this.cache.event || w, this.triggering = t, this.tooltip.trigger(s, [this].concat(e || [])), this.triggering = A, !s.isDefaultPrevented()
        }, U._bindEvents = function (s, t, e, i, n, o) {
            var r = e.filter(i).add(i.filter(e)), a = [];
            r.length && (S.each(t, function (t, e) {
                var i = S.inArray(e, s);
                -1 < i && a.push(s.splice(i, 1)[0])
            }), a.length && (this._bind(r, a, function (t) {
                (!!this.rendered && 0 < this.tooltip[0].offsetWidth ? o : n).call(this, t)
            }), e = e.not(r), i = i.not(r))), this._bind(e, s, n), this._bind(i, t, o)
        }, U._assignInitialEvents = function (t) {
            function e(t) {
                return this.disabled || this.destroyed ? A : (this.cache.event = t && S.event.fix(t), this.cache.target = t && S(t.target), clearTimeout(this.timers.show), void (this.timers.show = a.call(this, function () {
                    this.render("object" == typeof t || i.show.ready)
                }, i.prerender ? 0 : i.show.delay)))
            }

            var i = this.options, s = i.show.target, n = i.hide.target,
                o = i.show.event ? S.trim("" + i.show.event).split(" ") : [],
                r = i.hide.event ? S.trim("" + i.hide.event).split(" ") : [];
            this._bind(this.elements.target, ["remove", "removeqtip"], function () {
                this.destroy(!0)
            }, "destroy"), /mouse(over|enter)/i.test(i.show.event) && !/mouse(out|leave)/i.test(i.hide.event) && r.push("mouseleave"), this._bind(s, "mousemove", function (t) {
                this._storeMouse(t), this.cache.onTarget = k
            }), this._bindEvents(o, r, s, n, e, function () {
                return this.timers ? void clearTimeout(this.timers.show) : A
            }), (i.show.ready || i.prerender) && e.call(this, t)
        }, U._assignEvents = function () {
            var i = this, n = this.options, t = n.position, s = this.tooltip, e = n.show.target, o = n.hide.target,
                r = t.container, a = t.viewport, c = S(gt), l = (S(gt.body), S(mt)),
                h = n.show.event ? S.trim("" + n.show.event).split(" ") : [],
                u = n.hide.event ? S.trim("" + n.hide.event).split(" ") : [];
            S.each(n.events, function (t, e) {
                i._bind(s, "toggle" === t ? ["tooltipshow", "tooltiphide"] : ["tooltip" + t], e, null, s)
            }), /mouse(out|leave)/i.test(n.hide.event) && "window" === n.hide.leave && this._bind(c, ["mouseout", "blur"], function (t) {
                /select|option/.test(t.target.nodeName) || t.relatedTarget || this.hide(t)
            }), n.hide.fixed ? o = o.add(s.addClass(N)) : /mouse(over|enter)/i.test(n.show.event) && this._bind(o, "mouseleave", function () {
                clearTimeout(this.timers.show)
            }), -1 < ("" + n.hide.event).indexOf("unfocus") && this._bind(r.closest("html"), ["mousedown", "touchstart"], function (t) {
                var e = S(t.target), i = this.rendered && !this.tooltip.hasClass(H) && 0 < this.tooltip[0].offsetWidth,
                    s = 0 < e.parents(q).filter(this.tooltip[0]).length;
                e[0] === this.target[0] || e[0] === this.tooltip[0] || s || this.target.has(e[0]).length || !i || this.hide(t)
            }), "number" == typeof n.hide.inactive && (this._bind(e, "qtip-" + this.id + "-inactive", g, "inactive"), this._bind(o.add(s), y.inactiveEvents, g)), this._bindEvents(h, u, e, o, d, m), this._bind(e.add(s), "mousemove", function (t) {
                var e, i, s;
                "number" == typeof n.hide.distance && (e = this.cache.origin || {}, i = this.options.hide.distance, ((s = Math.abs)(t.pageX - e.pageX) >= i || s(t.pageY - e.pageY) >= i) && this.hide(t)), this._storeMouse(t)
            }), "mouse" === t.target && t.adjust.mouse && (n.hide.event && this._bind(e, ["mouseenter", "mouseleave"], function (t) {
                return this.cache ? void (this.cache.onTarget = "mouseenter" === t.type) : A
            }), this._bind(c, "mousemove", function (t) {
                this.rendered && this.cache.onTarget && !this.tooltip.hasClass(H) && 0 < this.tooltip[0].offsetWidth && this.reposition(t)
            })), (t.adjust.resize || a.length) && this._bind(S.event.special.resize ? a : l, "resize", v), t.adjust.scroll && this._bind(l.add(t.container), "scroll", v)
        }, U._unassignEvents = function () {
            var t = this.options, e = t.show.target, i = t.hide.target,
                s = S.grep([this.elements.target[0], this.rendered && this.tooltip[0], t.position.container[0], t.position.viewport[0], t.position.container.closest("html")[0], mt, gt], function (t) {
                    return "object" == typeof t
                });
            e && e.toArray && (s = s.concat(e.toArray())), i && i.toArray && (s = s.concat(i.toArray())), this._unbind(s)._unbind(s, "destroy")._unbind(s, "inactive")
        }, S(function () {
            t(q, ["mouseenter", "mouseleave"], function (t) {
                var e = "mouseenter" === t.type, i = S(t.currentTarget), s = S(t.relatedTarget || t.target),
                    n = this.options;
                e ? (this.focus(t), i.hasClass(N) && !i.hasClass(H) && clearTimeout(this.timers.hide)) : "mouse" === n.position.target && n.position.adjust.mouse && n.hide.event && n.show.target && !s.closest(n.show.target[0]).length && this.hide(t), i.toggleClass(R, e)
            }), t("[" + u + "]", C, g)
        }), y = S.fn.qtip = function (t, e, i) {
            var s = ("" + t).toLowerCase(), n = w, o = S.makeArray(arguments).slice(1), r = o[o.length - 1],
                a = this[0] ? S.data(this[0], T) : w;
            return !arguments.length && a || "api" === s ? a : "string" == typeof t ? (this.each(function () {
                var t = S.data(this, T);
                if (!t) return k;
                if (r && r.timeStamp && (t.cache.event = r), !e || "option" !== s && "options" !== s) t[s] && t[s].apply(t, o); else {
                    if (i === vt && !S.isPlainObject(e)) return n = t.get(e), A;
                    t.set(e, i)
                }
            }), n !== w ? n : this) : "object" != typeof t && arguments.length ? void 0 : (a = f(S.extend(k, {}, t)), this.each(function (t) {
                var e, i = S.isArray(a.id) ? a.id[t] : a.id;
                return i = !i || i === A || i.length < 1 || y.api[i] ? y.nextid++ : i, (e = function (t, e, i) {
                    var s, n, o, r, a, c = S(gt.body), l = t[0] === gt ? c : t,
                        h = t.metadata ? t.metadata(i.metadata) : w,
                        u = "html5" === i.metadata.type && h ? h[i.metadata.name] : w,
                        d = t.data(i.metadata.name || "qtipopts");
                    try {
                        d = "string" == typeof d ? S.parseJSON(d) : d
                    } catch (t) {
                    }
                    if (n = (r = S.extend(k, {}, y.defaults, i, "object" == typeof d ? f(d) : w, f(u || h))).position, r.id = e, "boolean" == typeof r.content.text) {
                        if (o = t.attr(r.content.attr), r.content.attr === A || !o) return A;
                        r.content.text = o
                    }
                    if (n.container.length || (n.container = c), n.target === A && (n.target = l), r.show.target === A && (r.show.target = l), r.show.solo === k && (r.show.solo = n.container.closest("body")), r.hide.target === A && (r.hide.target = l), r.position.viewport === k && (r.position.viewport = n.container), n.container = n.container.eq(0), n.at = new b(n.at, k), n.my = new b(n.my), t.data(T)) if (r.overwrite) t.qtip("destroy", !0); else if (r.overwrite === A) return A;
                    return t.attr(_, e), r.suppress && (a = t.attr("title")) && t.removeAttr("title").attr(Y, a).attr("title", ""), s = new p(t, r, e, !!o), t.data(T, s), s
                }(S(this), i, a)) === A ? k : (y.api[i] = e, S.each(I, function () {
                    "initialize" === this.initialize && this(e)
                }), void e._assignInitialEvents(r))
            }))
        }, S.qtip = p, y.api = {}, S.each({
            attr: function (t, e) {
                if (this.length) {
                    var i = this[0], s = S.data(i, "qtip");
                    if ("title" === t && s && "object" == typeof s && s.options.suppress) return arguments.length < 2 ? S.attr(i, Y) : (s && "title" === s.options.content.attr && s.cache.attr && s.set("content.text", e), this.attr(Y, e))
                }
                return S.fn["attr" + V].apply(this, arguments)
            }, clone: function (t) {
                var e = (S([]), S.fn["clone" + V].apply(this, arguments));
                return t || e.filter("[" + Y + "]").attr("title", function () {
                    return S.attr(this, Y)
                }).removeAttr(Y), e
            }
        }, function (t, e) {
            if (!e || S.fn[t + V]) return k;
            var i = S.fn[t + V] = S.fn[t];
            S.fn[t] = function () {
                return e.apply(this, arguments) || i.apply(this, arguments)
            }
        }), S.ui || (S["cleanData" + V] = S.cleanData, S.cleanData = function (t) {
            for (var e, i = 0; (e = S(t[i])).length; i++) if (e.attr(_)) try {
                e.triggerHandler("removeqtip")
            } catch (t) {
            }
            S["cleanData" + V].apply(this, arguments)
        }), y.version = "2.2.1", y.nextid = 0, y.inactiveEvents = C, y.zindex = 15e3, y.defaults = {
            prerender: A,
            id: A,
            overwrite: k,
            suppress: k,
            content: {text: k, attr: "title", title: A, button: A},
            position: {
                my: "top left",
                at: "bottom right",
                target: A,
                container: A,
                viewport: A,
                adjust: {x: 0, y: 0, mouse: k, scroll: k, resize: k, method: "flipinvert flipinvert"},
                effect: function (t, e) {
                    S(this).animate(e, {duration: 200, queue: A})
                }
            },
            show: {target: A, event: "mouseenter", effect: k, delay: 90, solo: A, ready: A, autofocus: A},
            hide: {
                target: A,
                event: "mouseleave",
                effect: k,
                delay: 0,
                fixed: A,
                inactive: A,
                leave: "window",
                distance: A
            },
            style: {classes: "", widget: A, width: A, height: A, def: k},
            events: {render: w, move: w, show: w, hide: w, toggle: w, visible: w, hidden: w, focus: w, blur: w}
        };
        var Z, tt, et, it, st, nt, ot = "margin", rt = "border", at = "color", ct = "background-color",
            lt = "transparent", ht = " !important", ut = !!gt.createElement("canvas").getContext,
            dt = /rgba?\(0, 0, 0(, 0)?\)|transparent|#123456/i, pt = {}, ft = ["Webkit", "O", "Moz", "ms"];
        ut ? (tt = mt.devicePixelRatio || 1, et = (nt = gt.createElement("canvas").getContext("2d")).backingStorePixelRatio || nt.webkitBackingStorePixelRatio || nt.mozBackingStorePixelRatio || nt.msBackingStorePixelRatio || nt.oBackingStorePixelRatio || 1, it = tt / et) : st = function (t, e, i) {
            return "<qtipvml:" + t + ' xmlns="urn:schemas-microsoft.com:vml" class="qtip-vml" ' + (e || "") + ' style="behavior: url(#default#VML); ' + (i || "") + '" />'
        }, S.extend(e.prototype, {
            init: function (t) {
                var e, i = this.element = t.elements.tip = S("<div />", {class: T + "-tip"}).prependTo(t.tooltip);
                ut ? ((e = S("<canvas />").appendTo(this.element)[0].getContext("2d")).lineJoin = "miter", e.miterLimit = 1e5, e.save()) : (e = st("shape", 'coordorigin="0,0"', "position:absolute;"), this.element.html(e + e), t._bind(S("*", i).add(i), ["click", "mousedown"], function (t) {
                    t.stopPropagation()
                }, this._ns)), t._bind(t.tooltip, "tooltipmove", this.reposition, this._ns, this), this.create()
            }, _swapDimensions: function () {
                this.size[0] = this.options.height, this.size[1] = this.options.width
            }, _resetDimensions: function () {
                this.size[0] = this.options.width, this.size[1] = this.options.height
            }, _useTitle: function (t) {
                var e = this.qtip.elements.titlebar;
                return e && (t.y === L || t.y === $ && this.element.position().top + this.size[1] / 2 + this.options.offset < e.outerHeight(k))
            }, _parseCorner: function (t) {
                var e = this.qtip.options.position.my;
                return t === A || e === A ? t = A : t === k ? t = new b(e.string()) : t.string || ((t = new b(t)).fixed = k), t
            }, _parseWidth: function (t, e, i) {
                var s = this.qtip.elements, n = rt + h(e) + "Width";
                return (i ? o(i, n) : o(s.content, n) || o(this._useTitle(t) && s.titlebar || s.content, n) || o(s.tooltip, n)) || 0
            }, _parseRadius: function (t) {
                var e = this.qtip.elements, i = rt + h(t.y) + h(t.x) + "Radius";
                return !(Q.ie < 9) && (o(this._useTitle(t) && e.titlebar || e.content, i) || o(e.tooltip, i)) || 0
            }, _invalidColour: function (t, e, i) {
                var s = t.css(e);
                return !s || i && s === t.css(i) || dt.test(s) ? A : s
            }, _parseColours: function (t) {
                var e = this.qtip.elements, i = this.element.css("cssText", ""), s = rt + h(t[t.precedance]) + h(at),
                    n = this._useTitle(t) && e.titlebar || e.content, o = this._invalidColour, r = [];
                return r[0] = o(i, ct) || o(n, ct) || o(e.content, ct) || o(e.tooltip, ct) || i.css(ct), r[1] = o(i, s, at) || o(n, s, at) || o(e.content, s, at) || o(e.tooltip, s, at) || e.tooltip.css(s), S("*", i).add(i).css("cssText", ct + ":" + lt + ht + ";" + rt + ":0" + ht + ";"), r
            }, _calculateSize: function (t) {
                var e, i, s = t.precedance === E, n = this.options.width, o = this.options.height,
                    r = "c" === t.abbrev(), a = (s ? n : o) * (r ? .5 : 1), c = Math.pow, l = Math.round,
                    h = Math.sqrt(c(a, 2) + c(o, 2)), u = [this.border / a * h, this.border / o * h];
                return u[2] = Math.sqrt(c(u[0], 2) - c(this.border, 2)), u[3] = Math.sqrt(c(u[1], 2) - c(this.border, 2)), i = [l((e = (h + u[2] + u[3] + (r ? 0 : u[0])) / h) * n), l(e * o)], s ? i : i.reverse()
            }, _calculateTip: function (t, e, i) {
                i = i || 1;
                var s = (e = e || this.size)[0] * i, n = e[1] * i, o = Math.ceil(s / 2), r = Math.ceil(n / 2), a = {
                    br: [0, 0, s, n, s, 0],
                    bl: [0, 0, s, 0, 0, n],
                    tr: [0, n, s, 0, s, n],
                    tl: [0, 0, 0, n, s, n],
                    tc: [0, n, o, 0, s, n],
                    bc: [0, 0, s, 0, o, n],
                    rc: [0, 0, s, r, 0, n],
                    lc: [s, 0, s, n, 0, r]
                };
                return a.lt = a.br, a.rt = a.bl, a.lb = a.tr, a.rb = a.tl, a[t.abbrev()]
            }, _drawCoords: function (t, e) {
                t.beginPath(), t.moveTo(e[0], e[1]), t.lineTo(e[2], e[3]), t.lineTo(e[4], e[5]), t.closePath()
            }, create: function () {
                var t = this.corner = (ut || Q.ie) && this._parseCorner(this.options.corner);
                return (this.enabled = !!this.corner && "c" !== this.corner.abbrev()) && (this.qtip.cache.corner = t.clone(), this.update()), this.element.toggle(this.enabled), this.corner
            }, update: function (t, e) {
                if (!this.enabled) return this;
                var i, s, n, o, r, a, c, l, h = this.qtip.elements, u = this.element, d = u.children(),
                    p = this.options, f = this.size, m = p.mimic, g = Math.round;
                t = t || (this.qtip.cache.corner || this.corner), m === A ? m = t : ((m = new b(m)).precedance = t.precedance, "inherit" === m.x ? m.x = t.x : "inherit" === m.y ? m.y = t.y : m.x === m.y && (m[t.precedance] = t[t.precedance])), s = m.precedance, t.precedance === D ? this._swapDimensions() : this._resetDimensions(), (i = this.color = this._parseColours(t))[1] !== lt ? (l = this.border = this._parseWidth(t, t[t.precedance]), p.border && l < 1 && !dt.test(i[1]) && (i[0] = i[1]), this.border = l = p.border !== k ? p.border : l) : this.border = l = 0, c = this.size = this._calculateSize(t), u.css({
                    width: c[0],
                    height: c[1],
                    lineHeight: c[1] + "px"
                }), a = t.precedance === E ? [g(m.x === z ? l : m.x === W ? c[0] - f[0] - l : (c[0] - f[0]) / 2), g(m.y === L ? c[1] - f[1] : 0)] : [g(m.x === z ? c[0] - f[0] : 0), g(m.y === L ? l : m.y === O ? c[1] - f[1] - l : (c[1] - f[1]) / 2)], ut ? ((n = d[0].getContext("2d")).restore(), n.save(), n.clearRect(0, 0, 6e3, 6e3), o = this._calculateTip(m, f, it), r = this._calculateTip(m, this.size, it), d.attr(F, c[0] * it).attr(M, c[1] * it), d.css(F, c[0]).css(M, c[1]), this._drawCoords(n, r), n.fillStyle = i[1], n.fill(), n.translate(a[0] * it, a[1] * it), this._drawCoords(n, o), n.fillStyle = i[0], n.fill()) : (o = "m" + (o = this._calculateTip(m))[0] + "," + o[1] + " l" + o[2] + "," + o[3] + " " + o[4] + "," + o[5] + " xe", a[2] = l && /^(r|b)/i.test(t.string()) ? 8 === Q.ie ? 2 : 1 : 0, d.css({
                    coordsize: c[0] + l + " " + (c[1] + l),
                    antialias: "" + (-1 < m.string().indexOf($)),
                    left: a[0] - a[2] * Number(s === D),
                    top: a[1] - a[2] * Number(s === E),
                    width: c[0] + l,
                    height: c[1] + l
                }).each(function (t) {
                    var e = S(this);
                    e[e.prop ? "prop" : "attr"]({
                        coordsize: c[0] + l + " " + (c[1] + l),
                        path: o,
                        fillcolor: i[0],
                        filled: !!t,
                        stroked: !t
                    }).toggle(!(!l && !t)), t || e.html(st("stroke", 'weight="' + 2 * l + 'px" color="' + i[1] + '" miterlimit="1000" joinstyle="miter"'))
                })), mt.opera && setTimeout(function () {
                    h.tip.css({display: "inline-block", visibility: "visible"})
                }, 1), e !== A && this.calculate(t, c)
            }, calculate: function (o, r) {
                if (!this.enabled) return A;
                var a, t, c = this, l = this.qtip.elements, e = this.element, h = this.options.offset,
                    u = (l.tooltip.hasClass("ui-widget"), {});
                return o = o || this.corner, a = o.precedance, r = r || this._calculateSize(o), t = [o.x, o.y], a === D && t.reverse(), S.each(t, function (t, e) {
                    var i, s, n;
                    e === $ ? (u[i = a === E ? z : L] = "50%", u[ot + "-" + i] = -Math.round(r[a === E ? 0 : 1] / 2) + h) : (i = c._parseWidth(o, e, l.tooltip), s = c._parseWidth(o, e, l.content), n = c._parseRadius(o), u[e] = Math.max(-c.border, t ? s : h + (i < n ? n : -i)))
                }), u[o[a]] -= r[a === D ? 0 : 1], e.css({
                    margin: "",
                    top: "",
                    bottom: "",
                    left: "",
                    right: ""
                }).css(u), u
            }, reposition: function (t, e, s) {
                function i(t, e, i, s, n) {
                    t === P && c.precedance === e && l[s] && c[i] !== $ ? c.precedance = c.precedance === D ? E : D : t !== P && l[s] && (c[e] = c[e] === $ ? 0 < l[s] ? s : n : c[e] === s ? n : s)
                }

                function n(t, e, i) {
                    c[t] === $ ? f[ot + "-" + e] = p[t] = o[ot + "-" + e] - l[e] : (r = o[i] !== vt ? [l[e], -o[e]] : [-l[e], o[e]], (p[t] = Math.max(r[0], r[1])) > r[0] && (s[e] -= l[e], p[e] = A), f[o[i] !== vt ? i : e] = p[t])
                }

                var o, r, a, c, l, h, u, d, p, f;
                this.enabled && (a = e.cache, c = this.corner.clone(), l = s.adjusted, u = (h = e.options.position.adjust.method.split(" "))[0], d = h[1] || h[0], p = {
                    left: A,
                    top: A,
                    x: 0,
                    y: 0
                }, f = {}, this.corner.fixed !== k && (i(u, D, E, z, W), i(d, E, D, L, O), c.string() === a.corner.string() && a.cornerTop === l.top && a.cornerLeft === l.left || this.update(c, A)), (o = this.calculate(c)).right !== vt && (o.left = -o.right), o.bottom !== vt && (o.top = -o.bottom), o.user = this.offset, (p.left = u === P && !!l.left) && n(D, z, W), (p.top = d === P && !!l.top) && n(E, L, O), this.element.css(f).toggle(!(p.x && p.y || c.x === $ && p.y || c.y === $ && p.x)), s.left -= o.left.charAt ? o.user : u !== P || p.top || !p.left && !p.top ? o.left + this.border : 0, s.top -= o.top.charAt ? o.user : d !== P || p.left || !p.left && !p.top ? o.top + this.border : 0, a.cornerLeft = l.left, a.cornerTop = l.top, a.corner = c.clone())
            }, destroy: function () {
                this.qtip._unbind(this.qtip.tooltip, this._ns), this.qtip.elements.tip && this.qtip.elements.tip.find("*").remove().end().remove()
            }
        }), (Z = I.tip = function (t) {
            return new e(t, t.options.style.tip)
        }).initialize = "render", Z.sanitize = function (t) {
            var e;
            t.style && "tip" in t.style && ("object" != typeof (e = t.style.tip) && (e = t.style.tip = {corner: e}), /string|boolean/i.test(typeof e.corner) || (e.corner = k))
        }, r.tip = {
            "^position.my|style.tip.(corner|mimic|border)$": function () {
                this.create(), this.qtip.reposition()
            }, "^style.tip.(height|width)$": function (t) {
                this.size = [t.width, t.height], this.update(), this.qtip.reposition()
            }, "^content.title|style.(classes|widget)$": function () {
                this.update()
            }
        }, S.extend(k, y.defaults, {
            style: {
                tip: {
                    corner: k,
                    mimic: A,
                    width: 6,
                    height: 6,
                    border: k,
                    offset: 0
                }
            }
        }), I.viewport = function (t, b, e, i, s, n, o) {
            function r(t, e, i, s, n, o, r, a, c) {
                var l = b[n], h = S[t], u = k[t], d = i === P, p = h === n ? c : h === o ? -c : -c / 2,
                    f = u === n ? a : u === o ? -a : -a / 2, m = q[n] + C[n] - (T ? 0 : w[n]), g = m - l,
                    v = l + c - (r === F ? _ : j) - m,
                    y = p - (S.precedance === t || h === S[e] ? f : 0) - (u === $ ? a / 2 : 0);
                return d ? (y = (h === n ? 1 : -1) * p, b[n] += 0 < g ? g : 0 < v ? -v : 0, b[n] = Math.max(-w[n] + C[n], l - y, Math.min(Math.max(-w[n] + C[n] + (r === F ? _ : j), l + y), b[n], "center" === h ? l - p : 1e9))) : (s *= "flipinvert" === i ? 2 : 0, 0 < g && (h !== n || 0 < v) ? (b[n] -= y + s, x.invert(t, n)) : 0 < v && (h !== o || 0 < g) && (b[n] -= (h === $ ? -y : y) + s, x.invert(t, o)), b[n] < q && -b[n] > v && (b[n] = l, x = S.clone())), b[n] - l
            }

            var a, x, w, T, _, j, q, C, c = e.target, l = t.elements.tooltip, S = e.my, k = e.at, h = e.adjust,
                u = h.method.split(" "), d = u[0], p = u[1] || u[0], f = e.viewport, m = e.container,
                g = (t.cache, {left: 0, top: 0});
            return f.jquery && c[0] !== mt && c[0] !== gt.body && "none" !== h.method ? (w = m.offset() || g, T = "static" === m.css("position"), a = "fixed" === l.css("position"), _ = f[0] === mt ? f.width() : f.outerWidth(A), j = f[0] === mt ? f.height() : f.outerHeight(A), q = {
                left: a ? 0 : f.scrollLeft(),
                top: a ? 0 : f.scrollTop()
            }, C = f.offset() || g, "shift" === d && "shift" === p || (x = S.clone()), g = {
                left: "none" !== d ? r(D, E, d, h.x, z, W, F, i, n) : 0,
                top: "none" !== p ? r(E, D, p, h.y, L, O, M, s, o) : 0,
                my: x
            }) : g
        }
    })
}(window, document);
