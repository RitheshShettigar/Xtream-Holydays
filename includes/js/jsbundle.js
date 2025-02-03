! function(e, t) {
	"use strict";
	"object" == typeof module && "object" == typeof module.exports ? module.exports = e.document ? t(e, !0) : function(e) {
		if (!e.document) throw new Error("jQuery requires a window with a document");
		return t(e)
	} : t(e)
}("undefined" != typeof window ? window : this, function(e, t) {
	"use strict";
	var n = [],
		r = e.document,
		i = Object.getPrototypeOf,
		o = n.slice,
		a = n.concat,
		s = n.push,
		u = n.indexOf,
		l = {},
		c = l.toString,
		f = l.hasOwnProperty,
		p = f.toString,
		d = p.call(Object),
		h = {},
		g = function e(t) {
			return "function" == typeof t && "number" != typeof t.nodeType
		},
		y = function e(t) {
			return null != t && t === t.window
		},
		v = {
			type: !0,
			src: !0,
			noModule: !0
		};

	function m(e, t, n) {
		var i, o = (t = t || r).createElement("script");
		if (o.text = e, n)
			for (i in v) n[i] && (o[i] = n[i]);
		t.head.appendChild(o).parentNode.removeChild(o)
	}

	function x(e) {
		return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? l[c.call(e)] || "object" : typeof e
	}
	var b = "3.3.1",
		w = function(e, t) {
			return new w.fn.init(e, t)
		},
		T = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
	w.fn = w.prototype = {
		jquery: "3.3.1",
		constructor: w,
		length: 0,
		toArray: function() {
			return o.call(this)
		},
		get: function(e) {
			return null == e ? o.call(this) : e < 0 ? this[e + this.length] : this[e]
		},
		pushStack: function(e) {
			var t = w.merge(this.constructor(), e);
			return t.prevObject = this, t
		},
		each: function(e) {
			return w.each(this, e)
		},
		map: function(e) {
			return this.pushStack(w.map(this, function(t, n) {
				return e.call(t, n, t)
			}))
		},
		slice: function() {
			return this.pushStack(o.apply(this, arguments))
		},
		first: function() {
			return this.eq(0)
		},
		last: function() {
			return this.eq(-1)
		},
		eq: function(e) {
			var t = this.length,
				n = +e + (e < 0 ? t : 0);
			return this.pushStack(n >= 0 && n < t ? [this[n]] : [])
		},
		end: function() {
			return this.prevObject || this.constructor()
		},
		push: s,
		sort: n.sort,
		splice: n.splice
	}, w.extend = w.fn.extend = function() {
		var e, t, n, r, i, o, a = arguments[0] || {},
			s = 1,
			u = arguments.length,
			l = !1;
		for ("boolean" == typeof a && (l = a, a = arguments[s] || {}, s++), "object" == typeof a || g(a) || (a = {}), s === u && (a = this, s--); s < u; s++)
			if (null != (e = arguments[s]))
				for (t in e) n = a[t], a !== (r = e[t]) && (l && r && (w.isPlainObject(r) || (i = Array.isArray(r))) ? (i ? (i = !1, o = n && Array.isArray(n) ? n : []) : o = n && w.isPlainObject(n) ? n : {}, a[t] = w.extend(l, o, r)) : void 0 !== r && (a[t] = r));
		return a
	}, w.extend({
		expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
		isReady: !0,
		error: function(e) {
			throw new Error(e)
		},
		noop: function() {},
		isPlainObject: function(e) {
			var t, n;
			return !(!e || "[object Object]" !== c.call(e)) && (!(t = i(e)) || "function" == typeof(n = f.call(t, "constructor") && t.constructor) && p.call(n) === d)
		},
		isEmptyObject: function(e) {
			var t;
			for (t in e) return !1;
			return !0
		},
		globalEval: function(e) {
			m(e)
		},
		each: function(e, t) {
			var n, r = 0;
			if (C(e)) {
				for (n = e.length; r < n; r++)
					if (!1 === t.call(e[r], r, e[r])) break
			} else
				for (r in e)
					if (!1 === t.call(e[r], r, e[r])) break;
			return e
		},
		trim: function(e) {
			return null == e ? "" : (e + "").replace(T, "")
		},
		makeArray: function(e, t) {
			var n = t || [];
			return null != e && (C(Object(e)) ? w.merge(n, "string" == typeof e ? [e] : e) : s.call(n, e)), n
		},
		inArray: function(e, t, n) {
			return null == t ? -1 : u.call(t, e, n)
		},
		merge: function(e, t) {
			for (var n = +t.length, r = 0, i = e.length; r < n; r++) e[i++] = t[r];
			return e.length = i, e
		},
		grep: function(e, t, n) {
			for (var r, i = [], o = 0, a = e.length, s = !n; o < a; o++)(r = !t(e[o], o)) !== s && i.push(e[o]);
			return i
		},
		map: function(e, t, n) {
			var r, i, o = 0,
				s = [];
			if (C(e))
				for (r = e.length; o < r; o++) null != (i = t(e[o], o, n)) && s.push(i);
			else
				for (o in e) null != (i = t(e[o], o, n)) && s.push(i);
			return a.apply([], s)
		},
		guid: 1,
		support: h
	}), "function" == typeof Symbol && (w.fn[Symbol.iterator] = n[Symbol.iterator]), w.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function(e, t) {
		l["[object " + t + "]"] = t.toLowerCase()
	});

	function C(e) {
		var t = !!e && "length" in e && e.length,
			n = x(e);
		return !g(e) && !y(e) && ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e)
	}
	var E = function(e) {
		var t, n, r, i, o, a, s, u, l, c, f, p, d, h, g, y, v, m, x, b = "sizzle" + 1 * new Date,
			w = e.document,
			T = 0,
			C = 0,
			E = ae(),
			k = ae(),
			S = ae(),
			D = function(e, t) {
				return e === t && (f = !0), 0
			},
			N = {}.hasOwnProperty,
			A = [],
			j = A.pop,
			q = A.push,
			L = A.push,
			H = A.slice,
			O = function(e, t) {
				for (var n = 0, r = e.length; n < r; n++)
					if (e[n] === t) return n;
				return -1
			},
			P = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
			M = "[\\x20\\t\\r\\n\\f]",
			R = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
			I = "\\[" + M + "*(" + R + ")(?:" + M + "*([*^$|!~]?=)" + M + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + R + "))|)" + M + "*\\]",
			W = ":(" + R + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + I + ")*)|.*)\\)|)",
			$ = new RegExp(M + "+", "g"),
			B = new RegExp("^" + M + "+|((?:^|[^\\\\])(?:\\\\.)*)" + M + "+$", "g"),
			F = new RegExp("^" + M + "*," + M + "*"),
			_ = new RegExp("^" + M + "*([>+~]|" + M + ")" + M + "*"),
			z = new RegExp("=" + M + "*([^\\]'\"]*?)" + M + "*\\]", "g"),
			X = new RegExp(W),
			U = new RegExp("^" + R + "$"),
			V = {
				ID: new RegExp("^#(" + R + ")"),
				CLASS: new RegExp("^\\.(" + R + ")"),
				TAG: new RegExp("^(" + R + "|[*])"),
				ATTR: new RegExp("^" + I),
				PSEUDO: new RegExp("^" + W),
				CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + M + "*(even|odd|(([+-]|)(\\d*)n|)" + M + "*(?:([+-]|)" + M + "*(\\d+)|))" + M + "*\\)|)", "i"),
				bool: new RegExp("^(?:" + P + ")$", "i"),
				needsContext: new RegExp("^" + M + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + M + "*((?:-\\d)?\\d*)" + M + "*\\)|)(?=[^-]|$)", "i")
			},
			G = /^(?:input|select|textarea|button)$/i,
			Y = /^h\d$/i,
			Q = /^[^{]+\{\s*\[native \w/,
			J = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
			K = /[+~]/,
			Z = new RegExp("\\\\([\\da-f]{1,6}" + M + "?|(" + M + ")|.)", "ig"),
			ee = function(e, t, n) {
				var r = "0x" + t - 65536;
				return r !== r || n ? t : r < 0 ? String.fromCharCode(r + 65536) : String.fromCharCode(r >> 10 | 55296, 1023 & r | 56320)
			},
			te = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
			ne = function(e, t) {
				return t ? "\0" === e ? "\ufffd" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e
			},
			re = function() {
				p()
			},
			ie = me(function(e) {
				return !0 === e.disabled && ("form" in e || "label" in e)
			}, {
				dir: "parentNode",
				next: "legend"
			});
		try {
			L.apply(A = H.call(w.childNodes), w.childNodes), A[w.childNodes.length].nodeType
		} catch (e) {
			L = {
				apply: A.length ? function(e, t) {
					q.apply(e, H.call(t))
				} : function(e, t) {
					var n = e.length,
						r = 0;
					while (e[n++] = t[r++]);
					e.length = n - 1
				}
			}
		}

		function oe(e, t, r, i) {
			var o, s, l, c, f, h, v, m = t && t.ownerDocument,
				T = t ? t.nodeType : 9;
			if (r = r || [], "string" != typeof e || !e || 1 !== T && 9 !== T && 11 !== T) return r;
			if (!i && ((t ? t.ownerDocument || t : w) !== d && p(t), t = t || d, g)) {
				if (11 !== T && (f = J.exec(e)))
					if (o = f[1]) {
						if (9 === T) {
							if (!(l = t.getElementById(o))) return r;
							if (l.id === o) return r.push(l), r
						} else if (m && (l = m.getElementById(o)) && x(t, l) && l.id === o) return r.push(l), r
					} else {
						if (f[2]) return L.apply(r, t.getElementsByTagName(e)), r;
						if ((o = f[3]) && n.getElementsByClassName && t.getElementsByClassName) return L.apply(r, t.getElementsByClassName(o)), r
					} if (n.qsa && !S[e + " "] && (!y || !y.test(e))) {
					if (1 !== T) m = t, v = e;
					else if ("object" !== t.nodeName.toLowerCase()) {
						(c = t.getAttribute("id")) ? c = c.replace(te, ne): t.setAttribute("id", c = b), s = (h = a(e)).length;
						while (s--) h[s] = "#" + c + " " + ve(h[s]);
						v = h.join(","), m = K.test(e) && ge(t.parentNode) || t
					}
					if (v) try {
						return L.apply(r, m.querySelectorAll(v)), r
					} catch (e) {} finally {
						c === b && t.removeAttribute("id")
					}
				}
			}
			return u(e.replace(B, "$1"), t, r, i)
		}

		function ae() {
			var e = [];

			function t(n, i) {
				return e.push(n + " ") > r.cacheLength && delete t[e.shift()], t[n + " "] = i
			}
			return t
		}

		function se(e) {
			return e[b] = !0, e
		}

		function ue(e) {
			var t = d.createElement("fieldset");
			try {
				return !!e(t)
			} catch (e) {
				return !1
			} finally {
				t.parentNode && t.parentNode.removeChild(t), t = null
			}
		}

		function le(e, t) {
			var n = e.split("|"),
				i = n.length;
			while (i--) r.attrHandle[n[i]] = t
		}

		function ce(e, t) {
			var n = t && e,
				r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
			if (r) return r;
			if (n)
				while (n = n.nextSibling)
					if (n === t) return -1;
			return e ? 1 : -1
		}

		function fe(e) {
			return function(t) {
				return "input" === t.nodeName.toLowerCase() && t.type === e
			}
		}

		function pe(e) {
			return function(t) {
				var n = t.nodeName.toLowerCase();
				return ("input" === n || "button" === n) && t.type === e
			}
		}

		function de(e) {
			return function(t) {
				return "form" in t ? t.parentNode && !1 === t.disabled ? "label" in t ? "label" in t.parentNode ? t.parentNode.disabled === e : t.disabled === e : t.isDisabled === e || t.isDisabled !== !e && ie(t) === e : t.disabled === e : "label" in t && t.disabled === e
			}
		}

		function he(e) {
			return se(function(t) {
				return t = +t, se(function(n, r) {
					var i, o = e([], n.length, t),
						a = o.length;
					while (a--) n[i = o[a]] && (n[i] = !(r[i] = n[i]))
				})
			})
		}

		function ge(e) {
			return e && "undefined" != typeof e.getElementsByTagName && e
		}
		n = oe.support = {}, o = oe.isXML = function(e) {
			var t = e && (e.ownerDocument || e).documentElement;
			return !!t && "HTML" !== t.nodeName
		}, p = oe.setDocument = function(e) {
			var t, i, a = e ? e.ownerDocument || e : w;
			return a !== d && 9 === a.nodeType && a.documentElement ? (d = a, h = d.documentElement, g = !o(d), w !== d && (i = d.defaultView) && i.top !== i && (i.addEventListener ? i.addEventListener("unload", re, !1) : i.attachEvent && i.attachEvent("onunload", re)), n.attributes = ue(function(e) {
				return e.className = "i", !e.getAttribute("className")
			}), n.getElementsByTagName = ue(function(e) {
				return e.appendChild(d.createComment("")), !e.getElementsByTagName("*").length
			}), n.getElementsByClassName = Q.test(d.getElementsByClassName), n.getById = ue(function(e) {
				return h.appendChild(e).id = b, !d.getElementsByName || !d.getElementsByName(b).length
			}), n.getById ? (r.filter.ID = function(e) {
				var t = e.replace(Z, ee);
				return function(e) {
					return e.getAttribute("id") === t
				}
			}, r.find.ID = function(e, t) {
				if ("undefined" != typeof t.getElementById && g) {
					var n = t.getElementById(e);
					return n ? [n] : []
				}
			}) : (r.filter.ID = function(e) {
				var t = e.replace(Z, ee);
				return function(e) {
					var n = "undefined" != typeof e.getAttributeNode && e.getAttributeNode("id");
					return n && n.value === t
				}
			}, r.find.ID = function(e, t) {
				if ("undefined" != typeof t.getElementById && g) {
					var n, r, i, o = t.getElementById(e);
					if (o) {
						if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
						i = t.getElementsByName(e), r = 0;
						while (o = i[r++])
							if ((n = o.getAttributeNode("id")) && n.value === e) return [o]
					}
					return []
				}
			}), r.find.TAG = n.getElementsByTagName ? function(e, t) {
				return "undefined" != typeof t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0
			} : function(e, t) {
				var n, r = [],
					i = 0,
					o = t.getElementsByTagName(e);
				if ("*" === e) {
					while (n = o[i++]) 1 === n.nodeType && r.push(n);
					return r
				}
				return o
			}, r.find.CLASS = n.getElementsByClassName && function(e, t) {
				if ("undefined" != typeof t.getElementsByClassName && g) return t.getElementsByClassName(e)
			}, v = [], y = [], (n.qsa = Q.test(d.querySelectorAll)) && (ue(function(e) {
				h.appendChild(e).innerHTML = "<a id='" + b + "'></a><select id='" + b + "-\r\\' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && y.push("[*^$]=" + M + "*(?:''|\"\")"), e.querySelectorAll("[selected]").length || y.push("\\[" + M + "*(?:value|" + P + ")"), e.querySelectorAll("[id~=" + b + "-]").length || y.push("~="), e.querySelectorAll(":checked").length || y.push(":checked"), e.querySelectorAll("a#" + b + "+*").length || y.push(".#.+[+~]")
			}), ue(function(e) {
				e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
				var t = d.createElement("input");
				t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && y.push("name" + M + "*[*^$|!~]?="), 2 !== e.querySelectorAll(":enabled").length && y.push(":enabled", ":disabled"), h.appendChild(e).disabled = !0, 2 !== e.querySelectorAll(":disabled").length && y.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), y.push(",.*:")
			})), (n.matchesSelector = Q.test(m = h.matches || h.webkitMatchesSelector || h.mozMatchesSelector || h.oMatchesSelector || h.msMatchesSelector)) && ue(function(e) {
				n.disconnectedMatch = m.call(e, "*"), m.call(e, "[s!='']:x"), v.push("!=", W)
			}), y = y.length && new RegExp(y.join("|")), v = v.length && new RegExp(v.join("|")), t = Q.test(h.compareDocumentPosition), x = t || Q.test(h.contains) ? function(e, t) {
				var n = 9 === e.nodeType ? e.documentElement : e,
					r = t && t.parentNode;
				return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
			} : function(e, t) {
				if (t)
					while (t = t.parentNode)
						if (t === e) return !0;
				return !1
			}, D = t ? function(e, t) {
				if (e === t) return f = !0, 0;
				var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
				return r || (1 & (r = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === r ? e === d || e.ownerDocument === w && x(w, e) ? -1 : t === d || t.ownerDocument === w && x(w, t) ? 1 : c ? O(c, e) - O(c, t) : 0 : 4 & r ? -1 : 1)
			} : function(e, t) {
				if (e === t) return f = !0, 0;
				var n, r = 0,
					i = e.parentNode,
					o = t.parentNode,
					a = [e],
					s = [t];
				if (!i || !o) return e === d ? -1 : t === d ? 1 : i ? -1 : o ? 1 : c ? O(c, e) - O(c, t) : 0;
				if (i === o) return ce(e, t);
				n = e;
				while (n = n.parentNode) a.unshift(n);
				n = t;
				while (n = n.parentNode) s.unshift(n);
				while (a[r] === s[r]) r++;
				return r ? ce(a[r], s[r]) : a[r] === w ? -1 : s[r] === w ? 1 : 0
			}, d) : d
		}, oe.matches = function(e, t) {
			return oe(e, null, null, t)
		}, oe.matchesSelector = function(e, t) {
			if ((e.ownerDocument || e) !== d && p(e), t = t.replace(z, "='$1']"), n.matchesSelector && g && !S[t + " "] && (!v || !v.test(t)) && (!y || !y.test(t))) try {
				var r = m.call(e, t);
				if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType) return r
			} catch (e) {}
			return oe(t, d, null, [e]).length > 0
		}, oe.contains = function(e, t) {
			return (e.ownerDocument || e) !== d && p(e), x(e, t)
		}, oe.attr = function(e, t) {
			(e.ownerDocument || e) !== d && p(e);
			var i = r.attrHandle[t.toLowerCase()],
				o = i && N.call(r.attrHandle, t.toLowerCase()) ? i(e, t, !g) : void 0;
			return void 0 !== o ? o : n.attributes || !g ? e.getAttribute(t) : (o = e.getAttributeNode(t)) && o.specified ? o.value : null
		}, oe.escape = function(e) {
			return (e + "").replace(te, ne)
		}, oe.error = function(e) {
			throw new Error("Syntax error, unrecognized expression: " + e)
		}, oe.uniqueSort = function(e) {
			var t, r = [],
				i = 0,
				o = 0;
			if (f = !n.detectDuplicates, c = !n.sortStable && e.slice(0), e.sort(D), f) {
				while (t = e[o++]) t === e[o] && (i = r.push(o));
				while (i--) e.splice(r[i], 1)
			}
			return c = null, e
		}, i = oe.getText = function(e) {
			var t, n = "",
				r = 0,
				o = e.nodeType;
			if (o) {
				if (1 === o || 9 === o || 11 === o) {
					if ("string" == typeof e.textContent) return e.textContent;
					for (e = e.firstChild; e; e = e.nextSibling) n += i(e)
				} else if (3 === o || 4 === o) return e.nodeValue
			} else
				while (t = e[r++]) n += i(t);
			return n
		}, (r = oe.selectors = {
			cacheLength: 50,
			createPseudo: se,
			match: V,
			attrHandle: {},
			find: {},
			relative: {
				">": {
					dir: "parentNode",
					first: !0
				},
				" ": {
					dir: "parentNode"
				},
				"+": {
					dir: "previousSibling",
					first: !0
				},
				"~": {
					dir: "previousSibling"
				}
			},
			preFilter: {
				ATTR: function(e) {
					return e[1] = e[1].replace(Z, ee), e[3] = (e[3] || e[4] || e[5] || "").replace(Z, ee), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
				},
				CHILD: function(e) {
					return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || oe.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && oe.error(e[0]), e
				},
				PSEUDO: function(e) {
					var t, n = !e[6] && e[2];
					return V.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && X.test(n) && (t = a(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
				}
			},
			filter: {
				TAG: function(e) {
					var t = e.replace(Z, ee).toLowerCase();
					return "*" === e ? function() {
						return !0
					} : function(e) {
						return e.nodeName && e.nodeName.toLowerCase() === t
					}
				},
				CLASS: function(e) {
					var t = E[e + " "];
					return t || (t = new RegExp("(^|" + M + ")" + e + "(" + M + "|$)")) && E(e, function(e) {
						return t.test("string" == typeof e.className && e.className || "undefined" != typeof e.getAttribute && e.getAttribute("class") || "")
					})
				},
				ATTR: function(e, t, n) {
					return function(r) {
						var i = oe.attr(r, e);
						return null == i ? "!=" === t : !t || (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i.replace($, " ") + " ").indexOf(n) > -1 : "|=" === t && (i === n || i.slice(0, n.length + 1) === n + "-"))
					}
				},
				CHILD: function(e, t, n, r, i) {
					var o = "nth" !== e.slice(0, 3),
						a = "last" !== e.slice(-4),
						s = "of-type" === t;
					return 1 === r && 0 === i ? function(e) {
						return !!e.parentNode
					} : function(t, n, u) {
						var l, c, f, p, d, h, g = o !== a ? "nextSibling" : "previousSibling",
							y = t.parentNode,
							v = s && t.nodeName.toLowerCase(),
							m = !u && !s,
							x = !1;
						if (y) {
							if (o) {
								while (g) {
									p = t;
									while (p = p[g])
										if (s ? p.nodeName.toLowerCase() === v : 1 === p.nodeType) return !1;
									h = g = "only" === e && !h && "nextSibling"
								}
								return !0
							}
							if (h = [a ? y.firstChild : y.lastChild], a && m) {
								x = (d = (l = (c = (f = (p = y)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === T && l[1]) && l[2], p = d && y.childNodes[d];
								while (p = ++d && p && p[g] || (x = d = 0) || h.pop())
									if (1 === p.nodeType && ++x && p === t) {
										c[e] = [T, d, x];
										break
									}
							} else if (m && (x = d = (l = (c = (f = (p = t)[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] || [])[0] === T && l[1]), !1 === x)
								while (p = ++d && p && p[g] || (x = d = 0) || h.pop())
									if ((s ? p.nodeName.toLowerCase() === v : 1 === p.nodeType) && ++x && (m && ((c = (f = p[b] || (p[b] = {}))[p.uniqueID] || (f[p.uniqueID] = {}))[e] = [T, x]), p === t)) break;
							return (x -= i) === r || x % r == 0 && x / r >= 0
						}
					}
				},
				PSEUDO: function(e, t) {
					var n, i = r.pseudos[e] || r.setFilters[e.toLowerCase()] || oe.error("unsupported pseudo: " + e);
					return i[b] ? i(t) : i.length > 1 ? (n = [e, e, "", t], r.setFilters.hasOwnProperty(e.toLowerCase()) ? se(function(e, n) {
						var r, o = i(e, t),
							a = o.length;
						while (a--) e[r = O(e, o[a])] = !(n[r] = o[a])
					}) : function(e) {
						return i(e, 0, n)
					}) : i
				}
			},
			pseudos: {
				not: se(function(e) {
					var t = [],
						n = [],
						r = s(e.replace(B, "$1"));
					return r[b] ? se(function(e, t, n, i) {
						var o, a = r(e, null, i, []),
							s = e.length;
						while (s--)(o = a[s]) && (e[s] = !(t[s] = o))
					}) : function(e, i, o) {
						return t[0] = e, r(t, null, o, n), t[0] = null, !n.pop()
					}
				}),
				has: se(function(e) {
					return function(t) {
						return oe(e, t).length > 0
					}
				}),
				contains: se(function(e) {
					return e = e.replace(Z, ee),
						function(t) {
							return (t.textContent || t.innerText || i(t)).indexOf(e) > -1
						}
				}),
				lang: se(function(e) {
					return U.test(e || "") || oe.error("unsupported lang: " + e), e = e.replace(Z, ee).toLowerCase(),
						function(t) {
							var n;
							do {
								if (n = g ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
							} while ((t = t.parentNode) && 1 === t.nodeType);
							return !1
						}
				}),
				target: function(t) {
					var n = e.location && e.location.hash;
					return n && n.slice(1) === t.id
				},
				root: function(e) {
					return e === h
				},
				focus: function(e) {
					return e === d.activeElement && (!d.hasFocus || d.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
				},
				enabled: de(!1),
				disabled: de(!0),
				checked: function(e) {
					var t = e.nodeName.toLowerCase();
					return "input" === t && !!e.checked || "option" === t && !!e.selected
				},
				selected: function(e) {
					return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
				},
				empty: function(e) {
					for (e = e.firstChild; e; e = e.nextSibling)
						if (e.nodeType < 6) return !1;
					return !0
				},
				parent: function(e) {
					return !r.pseudos.empty(e)
				},
				header: function(e) {
					return Y.test(e.nodeName)
				},
				input: function(e) {
					return G.test(e.nodeName)
				},
				button: function(e) {
					var t = e.nodeName.toLowerCase();
					return "input" === t && "button" === e.type || "button" === t
				},
				text: function(e) {
					var t;
					return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
				},
				first: he(function() {
					return [0]
				}),
				last: he(function(e, t) {
					return [t - 1]
				}),
				eq: he(function(e, t, n) {
					return [n < 0 ? n + t : n]
				}),
				even: he(function(e, t) {
					for (var n = 0; n < t; n += 2) e.push(n);
					return e
				}),
				odd: he(function(e, t) {
					for (var n = 1; n < t; n += 2) e.push(n);
					return e
				}),
				lt: he(function(e, t, n) {
					for (var r = n < 0 ? n + t : n; --r >= 0;) e.push(r);
					return e
				}),
				gt: he(function(e, t, n) {
					for (var r = n < 0 ? n + t : n; ++r < t;) e.push(r);
					return e
				})
			}
		}).pseudos.nth = r.pseudos.eq;
		for (t in {
				radio: !0,
				checkbox: !0,
				file: !0,
				password: !0,
				image: !0
			}) r.pseudos[t] = fe(t);
		for (t in {
				submit: !0,
				reset: !0
			}) r.pseudos[t] = pe(t);

		function ye() {}
		ye.prototype = r.filters = r.pseudos, r.setFilters = new ye, a = oe.tokenize = function(e, t) {
			var n, i, o, a, s, u, l, c = k[e + " "];
			if (c) return t ? 0 : c.slice(0);
			s = e, u = [], l = r.preFilter;
			while (s) {
				n && !(i = F.exec(s)) || (i && (s = s.slice(i[0].length) || s), u.push(o = [])), n = !1, (i = _.exec(s)) && (n = i.shift(), o.push({
					value: n,
					type: i[0].replace(B, " ")
				}), s = s.slice(n.length));
				for (a in r.filter) !(i = V[a].exec(s)) || l[a] && !(i = l[a](i)) || (n = i.shift(), o.push({
					value: n,
					type: a,
					matches: i
				}), s = s.slice(n.length));
				if (!n) break
			}
			return t ? s.length : s ? oe.error(e) : k(e, u).slice(0)
		};

		function ve(e) {
			for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
			return r
		}

		function me(e, t, n) {
			var r = t.dir,
				i = t.next,
				o = i || r,
				a = n && "parentNode" === o,
				s = C++;
			return t.first ? function(t, n, i) {
				while (t = t[r])
					if (1 === t.nodeType || a) return e(t, n, i);
				return !1
			} : function(t, n, u) {
				var l, c, f, p = [T, s];
				if (u) {
					while (t = t[r])
						if ((1 === t.nodeType || a) && e(t, n, u)) return !0
				} else
					while (t = t[r])
						if (1 === t.nodeType || a)
							if (f = t[b] || (t[b] = {}), c = f[t.uniqueID] || (f[t.uniqueID] = {}), i && i === t.nodeName.toLowerCase()) t = t[r] || t;
							else {
								if ((l = c[o]) && l[0] === T && l[1] === s) return p[2] = l[2];
								if (c[o] = p, p[2] = e(t, n, u)) return !0
							} return !1
			}
		}

		function xe(e) {
			return e.length > 1 ? function(t, n, r) {
				var i = e.length;
				while (i--)
					if (!e[i](t, n, r)) return !1;
				return !0
			} : e[0]
		}

		function be(e, t, n) {
			for (var r = 0, i = t.length; r < i; r++) oe(e, t[r], n);
			return n
		}

		function we(e, t, n, r, i) {
			for (var o, a = [], s = 0, u = e.length, l = null != t; s < u; s++)(o = e[s]) && (n && !n(o, r, i) || (a.push(o), l && t.push(s)));
			return a
		}

		function Te(e, t, n, r, i, o) {
			return r && !r[b] && (r = Te(r)), i && !i[b] && (i = Te(i, o)), se(function(o, a, s, u) {
				var l, c, f, p = [],
					d = [],
					h = a.length,
					g = o || be(t || "*", s.nodeType ? [s] : s, []),
					y = !e || !o && t ? g : we(g, p, e, s, u),
					v = n ? i || (o ? e : h || r) ? [] : a : y;
				if (n && n(y, v, s, u), r) {
					l = we(v, d), r(l, [], s, u), c = l.length;
					while (c--)(f = l[c]) && (v[d[c]] = !(y[d[c]] = f))
				}
				if (o) {
					if (i || e) {
						if (i) {
							l = [], c = v.length;
							while (c--)(f = v[c]) && l.push(y[c] = f);
							i(null, v = [], l, u)
						}
						c = v.length;
						while (c--)(f = v[c]) && (l = i ? O(o, f) : p[c]) > -1 && (o[l] = !(a[l] = f))
					}
				} else v = we(v === a ? v.splice(h, v.length) : v), i ? i(null, a, v, u) : L.apply(a, v)
			})
		}

		function Ce(e) {
			for (var t, n, i, o = e.length, a = r.relative[e[0].type], s = a || r.relative[" "], u = a ? 1 : 0, c = me(function(e) {
					return e === t
				}, s, !0), f = me(function(e) {
					return O(t, e) > -1
				}, s, !0), p = [function(e, n, r) {
					var i = !a && (r || n !== l) || ((t = n).nodeType ? c(e, n, r) : f(e, n, r));
					return t = null, i
				}]; u < o; u++)
				if (n = r.relative[e[u].type]) p = [me(xe(p), n)];
				else {
					if ((n = r.filter[e[u].type].apply(null, e[u].matches))[b]) {
						for (i = ++u; i < o; i++)
							if (r.relative[e[i].type]) break;
						return Te(u > 1 && xe(p), u > 1 && ve(e.slice(0, u - 1).concat({
							value: " " === e[u - 2].type ? "*" : ""
						})).replace(B, "$1"), n, u < i && Ce(e.slice(u, i)), i < o && Ce(e = e.slice(i)), i < o && ve(e))
					}
					p.push(n)
				} return xe(p)
		}

		function Ee(e, t) {
			var n = t.length > 0,
				i = e.length > 0,
				o = function(o, a, s, u, c) {
					var f, h, y, v = 0,
						m = "0",
						x = o && [],
						b = [],
						w = l,
						C = o || i && r.find.TAG("*", c),
						E = T += null == w ? 1 : Math.random() || .1,
						k = C.length;
					for (c && (l = a === d || a || c); m !== k && null != (f = C[m]); m++) {
						if (i && f) {
							h = 0, a || f.ownerDocument === d || (p(f), s = !g);
							while (y = e[h++])
								if (y(f, a || d, s)) {
									u.push(f);
									break
								} c && (T = E)
						}
						n && ((f = !y && f) && v--, o && x.push(f))
					}
					if (v += m, n && m !== v) {
						h = 0;
						while (y = t[h++]) y(x, b, a, s);
						if (o) {
							if (v > 0)
								while (m--) x[m] || b[m] || (b[m] = j.call(u));
							b = we(b)
						}
						L.apply(u, b), c && !o && b.length > 0 && v + t.length > 1 && oe.uniqueSort(u)
					}
					return c && (T = E, l = w), x
				};
			return n ? se(o) : o
		}
		return s = oe.compile = function(e, t) {
			var n, r = [],
				i = [],
				o = S[e + " "];
			if (!o) {
				t || (t = a(e)), n = t.length;
				while (n--)(o = Ce(t[n]))[b] ? r.push(o) : i.push(o);
				(o = S(e, Ee(i, r))).selector = e
			}
			return o
		}, u = oe.select = function(e, t, n, i) {
			var o, u, l, c, f, p = "function" == typeof e && e,
				d = !i && a(e = p.selector || e);
			if (n = n || [], 1 === d.length) {
				if ((u = d[0] = d[0].slice(0)).length > 2 && "ID" === (l = u[0]).type && 9 === t.nodeType && g && r.relative[u[1].type]) {
					if (!(t = (r.find.ID(l.matches[0].replace(Z, ee), t) || [])[0])) return n;
					p && (t = t.parentNode), e = e.slice(u.shift().value.length)
				}
				o = V.needsContext.test(e) ? 0 : u.length;
				while (o--) {
					if (l = u[o], r.relative[c = l.type]) break;
					if ((f = r.find[c]) && (i = f(l.matches[0].replace(Z, ee), K.test(u[0].type) && ge(t.parentNode) || t))) {
						if (u.splice(o, 1), !(e = i.length && ve(u))) return L.apply(n, i), n;
						break
					}
				}
			}
			return (p || s(e, d))(i, t, !g, n, !t || K.test(e) && ge(t.parentNode) || t), n
		}, n.sortStable = b.split("").sort(D).join("") === b, n.detectDuplicates = !!f, p(), n.sortDetached = ue(function(e) {
			return 1 & e.compareDocumentPosition(d.createElement("fieldset"))
		}), ue(function(e) {
			return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
		}) || le("type|href|height|width", function(e, t, n) {
			if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
		}), n.attributes && ue(function(e) {
			return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
		}) || le("value", function(e, t, n) {
			if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue
		}), ue(function(e) {
			return null == e.getAttribute("disabled")
		}) || le(P, function(e, t, n) {
			var r;
			if (!n) return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
		}), oe
	}(e);
	w.find = E, w.expr = E.selectors, w.expr[":"] = w.expr.pseudos, w.uniqueSort = w.unique = E.uniqueSort, w.text = E.getText, w.isXMLDoc = E.isXML, w.contains = E.contains, w.escapeSelector = E.escape;
	var k = function(e, t, n) {
			var r = [],
				i = void 0 !== n;
			while ((e = e[t]) && 9 !== e.nodeType)
				if (1 === e.nodeType) {
					if (i && w(e).is(n)) break;
					r.push(e)
				} return r
		},
		S = function(e, t) {
			for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
			return n
		},
		D = w.expr.match.needsContext;

	function N(e, t) {
		return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
	}
	var A = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

	function j(e, t, n) {
		return g(t) ? w.grep(e, function(e, r) {
			return !!t.call(e, r, e) !== n
		}) : t.nodeType ? w.grep(e, function(e) {
			return e === t !== n
		}) : "string" != typeof t ? w.grep(e, function(e) {
			return u.call(t, e) > -1 !== n
		}) : w.filter(t, e, n)
	}
	w.filter = function(e, t, n) {
		var r = t[0];
		return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? w.find.matchesSelector(r, e) ? [r] : [] : w.find.matches(e, w.grep(t, function(e) {
			return 1 === e.nodeType
		}))
	}, w.fn.extend({
		find: function(e) {
			var t, n, r = this.length,
				i = this;
			if ("string" != typeof e) return this.pushStack(w(e).filter(function() {
				for (t = 0; t < r; t++)
					if (w.contains(i[t], this)) return !0
			}));
			for (n = this.pushStack([]), t = 0; t < r; t++) w.find(e, i[t], n);
			return r > 1 ? w.uniqueSort(n) : n
		},
		filter: function(e) {
			return this.pushStack(j(this, e || [], !1))
		},
		not: function(e) {
			return this.pushStack(j(this, e || [], !0))
		},
		is: function(e) {
			return !!j(this, "string" == typeof e && D.test(e) ? w(e) : e || [], !1).length
		}
	});
	var q, L = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
	(w.fn.init = function(e, t, n) {
		var i, o;
		if (!e) return this;
		if (n = n || q, "string" == typeof e) {
			if (!(i = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : L.exec(e)) || !i[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
			if (i[1]) {
				if (t = t instanceof w ? t[0] : t, w.merge(this, w.parseHTML(i[1], t && t.nodeType ? t.ownerDocument || t : r, !0)), A.test(i[1]) && w.isPlainObject(t))
					for (i in t) g(this[i]) ? this[i](t[i]) : this.attr(i, t[i]);
				return this
			}
			return (o = r.getElementById(i[2])) && (this[0] = o, this.length = 1), this
		}
		return e.nodeType ? (this[0] = e, this.length = 1, this) : g(e) ? void 0 !== n.ready ? n.ready(e) : e(w) : w.makeArray(e, this)
	}).prototype = w.fn, q = w(r);
	var H = /^(?:parents|prev(?:Until|All))/,
		O = {
			children: !0,
			contents: !0,
			next: !0,
			prev: !0
		};
	w.fn.extend({
		has: function(e) {
			var t = w(e, this),
				n = t.length;
			return this.filter(function() {
				for (var e = 0; e < n; e++)
					if (w.contains(this, t[e])) return !0
			})
		},
		closest: function(e, t) {
			var n, r = 0,
				i = this.length,
				o = [],
				a = "string" != typeof e && w(e);
			if (!D.test(e))
				for (; r < i; r++)
					for (n = this[r]; n && n !== t; n = n.parentNode)
						if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && w.find.matchesSelector(n, e))) {
							o.push(n);
							break
						} return this.pushStack(o.length > 1 ? w.uniqueSort(o) : o)
		},
		index: function(e) {
			return e ? "string" == typeof e ? u.call(w(e), this[0]) : u.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
		},
		add: function(e, t) {
			return this.pushStack(w.uniqueSort(w.merge(this.get(), w(e, t))))
		},
		addBack: function(e) {
			return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
		}
	});

	function P(e, t) {
		while ((e = e[t]) && 1 !== e.nodeType);
		return e
	}
	w.each({
		parent: function(e) {
			var t = e.parentNode;
			return t && 11 !== t.nodeType ? t : null
		},
		parents: function(e) {
			return k(e, "parentNode")
		},
		parentsUntil: function(e, t, n) {
			return k(e, "parentNode", n)
		},
		next: function(e) {
			return P(e, "nextSibling")
		},
		prev: function(e) {
			return P(e, "previousSibling")
		},
		nextAll: function(e) {
			return k(e, "nextSibling")
		},
		prevAll: function(e) {
			return k(e, "previousSibling")
		},
		nextUntil: function(e, t, n) {
			return k(e, "nextSibling", n)
		},
		prevUntil: function(e, t, n) {
			return k(e, "previousSibling", n)
		},
		siblings: function(e) {
			return S((e.parentNode || {}).firstChild, e)
		},
		children: function(e) {
			return S(e.firstChild)
		},
		contents: function(e) {
			return N(e, "iframe") ? e.contentDocument : (N(e, "template") && (e = e.content || e), w.merge([], e.childNodes))
		}
	}, function(e, t) {
		w.fn[e] = function(n, r) {
			var i = w.map(this, t, n);
			return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = w.filter(r, i)), this.length > 1 && (O[e] || w.uniqueSort(i), H.test(e) && i.reverse()), this.pushStack(i)
		}
	});
	var M = /[^\x20\t\r\n\f]+/g;

	function R(e) {
		var t = {};
		return w.each(e.match(M) || [], function(e, n) {
			t[n] = !0
		}), t
	}
	w.Callbacks = function(e) {
		e = "string" == typeof e ? R(e) : w.extend({}, e);
		var t, n, r, i, o = [],
			a = [],
			s = -1,
			u = function() {
				for (i = i || e.once, r = t = !0; a.length; s = -1) {
					n = a.shift();
					while (++s < o.length) !1 === o[s].apply(n[0], n[1]) && e.stopOnFalse && (s = o.length, n = !1)
				}
				e.memory || (n = !1), t = !1, i && (o = n ? [] : "")
			},
			l = {
				add: function() {
					return o && (n && !t && (s = o.length - 1, a.push(n)), function t(n) {
						w.each(n, function(n, r) {
							g(r) ? e.unique && l.has(r) || o.push(r) : r && r.length && "string" !== x(r) && t(r)
						})
					}(arguments), n && !t && u()), this
				},
				remove: function() {
					return w.each(arguments, function(e, t) {
						var n;
						while ((n = w.inArray(t, o, n)) > -1) o.splice(n, 1), n <= s && s--
					}), this
				},
				has: function(e) {
					return e ? w.inArray(e, o) > -1 : o.length > 0
				},
				empty: function() {
					return o && (o = []), this
				},
				disable: function() {
					return i = a = [], o = n = "", this
				},
				disabled: function() {
					return !o
				},
				lock: function() {
					return i = a = [], n || t || (o = n = ""), this
				},
				locked: function() {
					return !!i
				},
				fireWith: function(e, n) {
					return i || (n = [e, (n = n || []).slice ? n.slice() : n], a.push(n), t || u()), this
				},
				fire: function() {
					return l.fireWith(this, arguments), this
				},
				fired: function() {
					return !!r
				}
			};
		return l
	};

	function I(e) {
		return e
	}

	function W(e) {
		throw e
	}

	function $(e, t, n, r) {
		var i;
		try {
			e && g(i = e.promise) ? i.call(e).done(t).fail(n) : e && g(i = e.then) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r))
		} catch (e) {
			n.apply(void 0, [e])
		}
	}
	w.extend({
		Deferred: function(t) {
			var n = [
					["notify", "progress", w.Callbacks("memory"), w.Callbacks("memory"), 2],
					["resolve", "done", w.Callbacks("once memory"), w.Callbacks("once memory"), 0, "resolved"],
					["reject", "fail", w.Callbacks("once memory"), w.Callbacks("once memory"), 1, "rejected"]
				],
				r = "pending",
				i = {
					state: function() {
						return r
					},
					always: function() {
						return o.done(arguments).fail(arguments), this
					},
					"catch": function(e) {
						return i.then(null, e)
					},
					pipe: function() {
						var e = arguments;
						return w.Deferred(function(t) {
							w.each(n, function(n, r) {
								var i = g(e[r[4]]) && e[r[4]];
								o[r[1]](function() {
									var e = i && i.apply(this, arguments);
									e && g(e.promise) ? e.promise().progress(t.notify).done(t.resolve).fail(t.reject) : t[r[0] + "With"](this, i ? [e] : arguments)
								})
							}), e = null
						}).promise()
					},
					then: function(t, r, i) {
						var o = 0;

						function a(t, n, r, i) {
							return function() {
								var s = this,
									u = arguments,
									l = function() {
										var e, l;
										if (!(t < o)) {
											if ((e = r.apply(s, u)) === n.promise()) throw new TypeError("Thenable self-resolution");
											l = e && ("object" == typeof e || "function" == typeof e) && e.then, g(l) ? i ? l.call(e, a(o, n, I, i), a(o, n, W, i)) : (o++, l.call(e, a(o, n, I, i), a(o, n, W, i), a(o, n, I, n.notifyWith))) : (r !== I && (s = void 0, u = [e]), (i || n.resolveWith)(s, u))
										}
									},
									c = i ? l : function() {
										try {
											l()
										} catch (e) {
											w.Deferred.exceptionHook && w.Deferred.exceptionHook(e, c.stackTrace), t + 1 >= o && (r !== W && (s = void 0, u = [e]), n.rejectWith(s, u))
										}
									};
								t ? c() : (w.Deferred.getStackHook && (c.stackTrace = w.Deferred.getStackHook()), e.setTimeout(c))
							}
						}
						return w.Deferred(function(e) {
							n[0][3].add(a(0, e, g(i) ? i : I, e.notifyWith)), n[1][3].add(a(0, e, g(t) ? t : I)), n[2][3].add(a(0, e, g(r) ? r : W))
						}).promise()
					},
					promise: function(e) {
						return null != e ? w.extend(e, i) : i
					}
				},
				o = {};
			return w.each(n, function(e, t) {
				var a = t[2],
					s = t[5];
				i[t[1]] = a.add, s && a.add(function() {
					r = s
				}, n[3 - e][2].disable, n[3 - e][3].disable, n[0][2].lock, n[0][3].lock), a.add(t[3].fire), o[t[0]] = function() {
					return o[t[0] + "With"](this === o ? void 0 : this, arguments), this
				}, o[t[0] + "With"] = a.fireWith
			}), i.promise(o), t && t.call(o, o), o
		},
		when: function(e) {
			var t = arguments.length,
				n = t,
				r = Array(n),
				i = o.call(arguments),
				a = w.Deferred(),
				s = function(e) {
					return function(n) {
						r[e] = this, i[e] = arguments.length > 1 ? o.call(arguments) : n, --t || a.resolveWith(r, i)
					}
				};
			if (t <= 1 && ($(e, a.done(s(n)).resolve, a.reject, !t), "pending" === a.state() || g(i[n] && i[n].then))) return a.then();
			while (n--) $(i[n], s(n), a.reject);
			return a.promise()
		}
	});
	var B = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
	w.Deferred.exceptionHook = function(t, n) {
		e.console && e.console.warn && t && B.test(t.name) && e.console.warn("jQuery.Deferred exception: " + t.message, t.stack, n)
	}, w.readyException = function(t) {
		e.setTimeout(function() {
			throw t
		})
	};
	var F = w.Deferred();
	w.fn.ready = function(e) {
		return F.then(e)["catch"](function(e) {
			w.readyException(e)
		}), this
	}, w.extend({
		isReady: !1,
		readyWait: 1,
		ready: function(e) {
			(!0 === e ? --w.readyWait : w.isReady) || (w.isReady = !0, !0 !== e && --w.readyWait > 0 || F.resolveWith(r, [w]))
		}
	}), w.ready.then = F.then;

	function _() {
		r.removeEventListener("DOMContentLoaded", _), e.removeEventListener("load", _), w.ready()
	}
	"complete" === r.readyState || "loading" !== r.readyState && !r.documentElement.doScroll ? e.setTimeout(w.ready) : (r.addEventListener("DOMContentLoaded", _), e.addEventListener("load", _));
	var z = function(e, t, n, r, i, o, a) {
			var s = 0,
				u = e.length,
				l = null == n;
			if ("object" === x(n)) {
				i = !0;
				for (s in n) z(e, t, s, n[s], !0, o, a)
			} else if (void 0 !== r && (i = !0, g(r) || (a = !0), l && (a ? (t.call(e, r), t = null) : (l = t, t = function(e, t, n) {
					return l.call(w(e), n)
				})), t))
				for (; s < u; s++) t(e[s], n, a ? r : r.call(e[s], s, t(e[s], n)));
			return i ? e : l ? t.call(e) : u ? t(e[0], n) : o
		},
		X = /^-ms-/,
		U = /-([a-z])/g;

	function V(e, t) {
		return t.toUpperCase()
	}

	function G(e) {
		return e.replace(X, "ms-").replace(U, V)
	}
	var Y = function(e) {
		return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
	};

	function Q() {
		this.expando = w.expando + Q.uid++
	}
	Q.uid = 1, Q.prototype = {
		cache: function(e) {
			var t = e[this.expando];
			return t || (t = {}, Y(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
				value: t,
				configurable: !0
			}))), t
		},
		set: function(e, t, n) {
			var r, i = this.cache(e);
			if ("string" == typeof t) i[G(t)] = n;
			else
				for (r in t) i[G(r)] = t[r];
			return i
		},
		get: function(e, t) {
			return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][G(t)]
		},
		access: function(e, t, n) {
			return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t)
		},
		remove: function(e, t) {
			var n, r = e[this.expando];
			if (void 0 !== r) {
				if (void 0 !== t) {
					n = (t = Array.isArray(t) ? t.map(G) : (t = G(t)) in r ? [t] : t.match(M) || []).length;
					while (n--) delete r[t[n]]
				}(void 0 === t || w.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
			}
		},
		hasData: function(e) {
			var t = e[this.expando];
			return void 0 !== t && !w.isEmptyObject(t)
		}
	};
	var J = new Q,
		K = new Q,
		Z = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
		ee = /[A-Z]/g;

	function te(e) {
		return "true" === e || "false" !== e && ("null" === e ? null : e === +e + "" ? +e : Z.test(e) ? JSON.parse(e) : e)
	}

	function ne(e, t, n) {
		var r;
		if (void 0 === n && 1 === e.nodeType)
			if (r = "data-" + t.replace(ee, "-$&").toLowerCase(), "string" == typeof(n = e.getAttribute(r))) {
				try {
					n = te(n)
				} catch (e) {}
				K.set(e, t, n)
			} else n = void 0;
		return n
	}
	w.extend({
		hasData: function(e) {
			return K.hasData(e) || J.hasData(e)
		},
		data: function(e, t, n) {
			return K.access(e, t, n)
		},
		removeData: function(e, t) {
			K.remove(e, t)
		},
		_data: function(e, t, n) {
			return J.access(e, t, n)
		},
		_removeData: function(e, t) {
			J.remove(e, t)
		}
	}), w.fn.extend({
		data: function(e, t) {
			var n, r, i, o = this[0],
				a = o && o.attributes;
			if (void 0 === e) {
				if (this.length && (i = K.get(o), 1 === o.nodeType && !J.get(o, "hasDataAttrs"))) {
					n = a.length;
					while (n--) a[n] && 0 === (r = a[n].name).indexOf("data-") && (r = G(r.slice(5)), ne(o, r, i[r]));
					J.set(o, "hasDataAttrs", !0)
				}
				return i
			}
			return "object" == typeof e ? this.each(function() {
				K.set(this, e)
			}) : z(this, function(t) {
				var n;
				if (o && void 0 === t) {
					if (void 0 !== (n = K.get(o, e))) return n;
					if (void 0 !== (n = ne(o, e))) return n
				} else this.each(function() {
					K.set(this, e, t)
				})
			}, null, t, arguments.length > 1, null, !0)
		},
		removeData: function(e) {
			return this.each(function() {
				K.remove(this, e)
			})
		}
	}), w.extend({
		queue: function(e, t, n) {
			var r;
			if (e) return t = (t || "fx") + "queue", r = J.get(e, t), n && (!r || Array.isArray(n) ? r = J.access(e, t, w.makeArray(n)) : r.push(n)), r || []
		},
		dequeue: function(e, t) {
			t = t || "fx";
			var n = w.queue(e, t),
				r = n.length,
				i = n.shift(),
				o = w._queueHooks(e, t),
				a = function() {
					w.dequeue(e, t)
				};
			"inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, a, o)), !r && o && o.empty.fire()
		},
		_queueHooks: function(e, t) {
			var n = t + "queueHooks";
			return J.get(e, n) || J.access(e, n, {
				empty: w.Callbacks("once memory").add(function() {
					J.remove(e, [t + "queue", n])
				})
			})
		}
	}), w.fn.extend({
		queue: function(e, t) {
			var n = 2;
			return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? w.queue(this[0], e) : void 0 === t ? this : this.each(function() {
				var n = w.queue(this, e, t);
				w._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && w.dequeue(this, e)
			})
		},
		dequeue: function(e) {
			return this.each(function() {
				w.dequeue(this, e)
			})
		},
		clearQueue: function(e) {
			return this.queue(e || "fx", [])
		},
		promise: function(e, t) {
			var n, r = 1,
				i = w.Deferred(),
				o = this,
				a = this.length,
				s = function() {
					--r || i.resolveWith(o, [o])
				};
			"string" != typeof e && (t = e, e = void 0), e = e || "fx";
			while (a--)(n = J.get(o[a], e + "queueHooks")) && n.empty && (r++, n.empty.add(s));
			return s(), i.promise(t)
		}
	});
	var re = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
		ie = new RegExp("^(?:([+-])=|)(" + re + ")([a-z%]*)$", "i"),
		oe = ["Top", "Right", "Bottom", "Left"],
		ae = function(e, t) {
			return "none" === (e = t || e).style.display || "" === e.style.display && w.contains(e.ownerDocument, e) && "none" === w.css(e, "display")
		},
		se = function(e, t, n, r) {
			var i, o, a = {};
			for (o in t) a[o] = e.style[o], e.style[o] = t[o];
			i = n.apply(e, r || []);
			for (o in t) e.style[o] = a[o];
			return i
		};

	function ue(e, t, n, r) {
		var i, o, a = 20,
			s = r ? function() {
				return r.cur()
			} : function() {
				return w.css(e, t, "")
			},
			u = s(),
			l = n && n[3] || (w.cssNumber[t] ? "" : "px"),
			c = (w.cssNumber[t] || "px" !== l && +u) && ie.exec(w.css(e, t));
		if (c && c[3] !== l) {
			u /= 2, l = l || c[3], c = +u || 1;
			while (a--) w.style(e, t, c + l), (1 - o) * (1 - (o = s() / u || .5)) <= 0 && (a = 0), c /= o;
			c *= 2, w.style(e, t, c + l), n = n || []
		}
		return n && (c = +c || +u || 0, i = n[1] ? c + (n[1] + 1) * n[2] : +n[2], r && (r.unit = l, r.start = c, r.end = i)), i
	}
	var le = {};

	function ce(e) {
		var t, n = e.ownerDocument,
			r = e.nodeName,
			i = le[r];
		return i || (t = n.body.appendChild(n.createElement(r)), i = w.css(t, "display"), t.parentNode.removeChild(t), "none" === i && (i = "block"), le[r] = i, i)
	}

	function fe(e, t) {
		for (var n, r, i = [], o = 0, a = e.length; o < a; o++)(r = e[o]).style && (n = r.style.display, t ? ("none" === n && (i[o] = J.get(r, "display") || null, i[o] || (r.style.display = "")), "" === r.style.display && ae(r) && (i[o] = ce(r))) : "none" !== n && (i[o] = "none", J.set(r, "display", n)));
		for (o = 0; o < a; o++) null != i[o] && (e[o].style.display = i[o]);
		return e
	}
	w.fn.extend({
		show: function() {
			return fe(this, !0)
		},
		hide: function() {
			return fe(this)
		},
		toggle: function(e) {
			return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each(function() {
				ae(this) ? w(this).show() : w(this).hide()
			})
		}
	});
	var pe = /^(?:checkbox|radio)$/i,
		de = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
		he = /^$|^module$|\/(?:java|ecma)script/i,
		ge = {
			option: [1, "<select multiple='multiple'>", "</select>"],
			thead: [1, "<table>", "</table>"],
			col: [2, "<table><colgroup>", "</colgroup></table>"],
			tr: [2, "<table><tbody>", "</tbody></table>"],
			td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
			_default: [0, "", ""]
		};
	ge.optgroup = ge.option, ge.tbody = ge.tfoot = ge.colgroup = ge.caption = ge.thead, ge.th = ge.td;

	function ye(e, t) {
		var n;
		return n = "undefined" != typeof e.getElementsByTagName ? e.getElementsByTagName(t || "*") : "undefined" != typeof e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t && N(e, t) ? w.merge([e], n) : n
	}

	function ve(e, t) {
		for (var n = 0, r = e.length; n < r; n++) J.set(e[n], "globalEval", !t || J.get(t[n], "globalEval"))
	}
	var me = /<|&#?\w+;/;

	function xe(e, t, n, r, i) {
		for (var o, a, s, u, l, c, f = t.createDocumentFragment(), p = [], d = 0, h = e.length; d < h; d++)
			if ((o = e[d]) || 0 === o)
				if ("object" === x(o)) w.merge(p, o.nodeType ? [o] : o);
				else if (me.test(o)) {
			a = a || f.appendChild(t.createElement("div")), s = (de.exec(o) || ["", ""])[1].toLowerCase(), u = ge[s] || ge._default, a.innerHTML = u[1] + w.htmlPrefilter(o) + u[2], c = u[0];
			while (c--) a = a.lastChild;
			w.merge(p, a.childNodes), (a = f.firstChild).textContent = ""
		} else p.push(t.createTextNode(o));
		f.textContent = "", d = 0;
		while (o = p[d++])
			if (r && w.inArray(o, r) > -1) i && i.push(o);
			else if (l = w.contains(o.ownerDocument, o), a = ye(f.appendChild(o), "script"), l && ve(a), n) {
			c = 0;
			while (o = a[c++]) he.test(o.type || "") && n.push(o)
		}
		return f
	}! function() {
		var e = r.createDocumentFragment().appendChild(r.createElement("div")),
			t = r.createElement("input");
		t.setAttribute("type", "radio"), t.setAttribute("checked", "checked"), t.setAttribute("name", "t"), e.appendChild(t), h.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked, e.innerHTML = "<textarea>x</textarea>", h.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue
	}();
	var be = r.documentElement,
		we = /^key/,
		Te = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
		Ce = /^([^.]*)(?:\.(.+)|)/;

	function Ee() {
		return !0
	}

	function ke() {
		return !1
	}

	function Se() {
		try {
			return r.activeElement
		} catch (e) {}
	}

	function De(e, t, n, r, i, o) {
		var a, s;
		if ("object" == typeof t) {
			"string" != typeof n && (r = r || n, n = void 0);
			for (s in t) De(e, s, n, r, t[s], o);
			return e
		}
		if (null == r && null == i ? (i = n, r = n = void 0) : null == i && ("string" == typeof n ? (i = r, r = void 0) : (i = r, r = n, n = void 0)), !1 === i) i = ke;
		else if (!i) return e;
		return 1 === o && (a = i, (i = function(e) {
			return w().off(e), a.apply(this, arguments)
		}).guid = a.guid || (a.guid = w.guid++)), e.each(function() {
			w.event.add(this, t, i, r, n)
		})
	}
	w.event = {
		global: {},
		add: function(e, t, n, r, i) {
			var o, a, s, u, l, c, f, p, d, h, g, y = J.get(e);
			if (y) {
				n.handler && (n = (o = n).handler, i = o.selector), i && w.find.matchesSelector(be, i), n.guid || (n.guid = w.guid++), (u = y.events) || (u = y.events = {}), (a = y.handle) || (a = y.handle = function(t) {
					return "undefined" != typeof w && w.event.triggered !== t.type ? w.event.dispatch.apply(e, arguments) : void 0
				}), l = (t = (t || "").match(M) || [""]).length;
				while (l--) d = g = (s = Ce.exec(t[l]) || [])[1], h = (s[2] || "").split(".").sort(), d && (f = w.event.special[d] || {}, d = (i ? f.delegateType : f.bindType) || d, f = w.event.special[d] || {}, c = w.extend({
					type: d,
					origType: g,
					data: r,
					handler: n,
					guid: n.guid,
					selector: i,
					needsContext: i && w.expr.match.needsContext.test(i),
					namespace: h.join(".")
				}, o), (p = u[d]) || ((p = u[d] = []).delegateCount = 0, f.setup && !1 !== f.setup.call(e, r, h, a) || e.addEventListener && e.addEventListener(d, a)), f.add && (f.add.call(e, c), c.handler.guid || (c.handler.guid = n.guid)), i ? p.splice(p.delegateCount++, 0, c) : p.push(c), w.event.global[d] = !0)
			}
		},
		remove: function(e, t, n, r, i) {
			var o, a, s, u, l, c, f, p, d, h, g, y = J.hasData(e) && J.get(e);
			if (y && (u = y.events)) {
				l = (t = (t || "").match(M) || [""]).length;
				while (l--)
					if (s = Ce.exec(t[l]) || [], d = g = s[1], h = (s[2] || "").split(".").sort(), d) {
						f = w.event.special[d] || {}, p = u[d = (r ? f.delegateType : f.bindType) || d] || [], s = s[2] && new RegExp("(^|\\.)" + h.join("\\.(?:.*\\.|)") + "(\\.|$)"), a = o = p.length;
						while (o--) c = p[o], !i && g !== c.origType || n && n.guid !== c.guid || s && !s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (p.splice(o, 1), c.selector && p.delegateCount--, f.remove && f.remove.call(e, c));
						a && !p.length && (f.teardown && !1 !== f.teardown.call(e, h, y.handle) || w.removeEvent(e, d, y.handle), delete u[d])
					} else
						for (d in u) w.event.remove(e, d + t[l], n, r, !0);
				w.isEmptyObject(u) && J.remove(e, "handle events")
			}
		},
		dispatch: function(e) {
			var t = w.event.fix(e),
				n, r, i, o, a, s, u = new Array(arguments.length),
				l = (J.get(this, "events") || {})[t.type] || [],
				c = w.event.special[t.type] || {};
			for (u[0] = t, n = 1; n < arguments.length; n++) u[n] = arguments[n];
			if (t.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, t)) {
				s = w.event.handlers.call(this, t, l), n = 0;
				while ((o = s[n++]) && !t.isPropagationStopped()) {
					t.currentTarget = o.elem, r = 0;
					while ((a = o.handlers[r++]) && !t.isImmediatePropagationStopped()) t.rnamespace && !t.rnamespace.test(a.namespace) || (t.handleObj = a, t.data = a.data, void 0 !== (i = ((w.event.special[a.origType] || {}).handle || a.handler).apply(o.elem, u)) && !1 === (t.result = i) && (t.preventDefault(), t.stopPropagation()))
				}
				return c.postDispatch && c.postDispatch.call(this, t), t.result
			}
		},
		handlers: function(e, t) {
			var n, r, i, o, a, s = [],
				u = t.delegateCount,
				l = e.target;
			if (u && l.nodeType && !("click" === e.type && e.button >= 1))
				for (; l !== this; l = l.parentNode || this)
					if (1 === l.nodeType && ("click" !== e.type || !0 !== l.disabled)) {
						for (o = [], a = {}, n = 0; n < u; n++) void 0 === a[i = (r = t[n]).selector + " "] && (a[i] = r.needsContext ? w(i, this).index(l) > -1 : w.find(i, this, null, [l]).length), a[i] && o.push(r);
						o.length && s.push({
							elem: l,
							handlers: o
						})
					} return l = this, u < t.length && s.push({
				elem: l,
				handlers: t.slice(u)
			}), s
		},
		addProp: function(e, t) {
			Object.defineProperty(w.Event.prototype, e, {
				enumerable: !0,
				configurable: !0,
				get: g(t) ? function() {
					if (this.originalEvent) return t(this.originalEvent)
				} : function() {
					if (this.originalEvent) return this.originalEvent[e]
				},
				set: function(t) {
					Object.defineProperty(this, e, {
						enumerable: !0,
						configurable: !0,
						writable: !0,
						value: t
					})
				}
			})
		},
		fix: function(e) {
			return e[w.expando] ? e : new w.Event(e)
		},
		special: {
			load: {
				noBubble: !0
			},
			focus: {
				trigger: function() {
					if (this !== Se() && this.focus) return this.focus(), !1
				},
				delegateType: "focusin"
			},
			blur: {
				trigger: function() {
					if (this === Se() && this.blur) return this.blur(), !1
				},
				delegateType: "focusout"
			},
			click: {
				trigger: function() {
					if ("checkbox" === this.type && this.click && N(this, "input")) return this.click(), !1
				},
				_default: function(e) {
					return N(e.target, "a")
				}
			},
			beforeunload: {
				postDispatch: function(e) {
					void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
				}
			}
		}
	}, w.removeEvent = function(e, t, n) {
		e.removeEventListener && e.removeEventListener(t, n)
	}, w.Event = function(e, t) {
		if (!(this instanceof w.Event)) return new w.Event(e, t);
		e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? Ee : ke, this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this.currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e, t && w.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[w.expando] = !0
	}, w.Event.prototype = {
		constructor: w.Event,
		isDefaultPrevented: ke,
		isPropagationStopped: ke,
		isImmediatePropagationStopped: ke,
		isSimulated: !1,
		preventDefault: function() {
			var e = this.originalEvent;
			this.isDefaultPrevented = Ee, e && !this.isSimulated && e.preventDefault()
		},
		stopPropagation: function() {
			var e = this.originalEvent;
			this.isPropagationStopped = Ee, e && !this.isSimulated && e.stopPropagation()
		},
		stopImmediatePropagation: function() {
			var e = this.originalEvent;
			this.isImmediatePropagationStopped = Ee, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation()
		}
	}, w.each({
		altKey: !0,
		bubbles: !0,
		cancelable: !0,
		changedTouches: !0,
		ctrlKey: !0,
		detail: !0,
		eventPhase: !0,
		metaKey: !0,
		pageX: !0,
		pageY: !0,
		shiftKey: !0,
		view: !0,
		"char": !0,
		charCode: !0,
		key: !0,
		keyCode: !0,
		button: !0,
		buttons: !0,
		clientX: !0,
		clientY: !0,
		offsetX: !0,
		offsetY: !0,
		pointerId: !0,
		pointerType: !0,
		screenX: !0,
		screenY: !0,
		targetTouches: !0,
		toElement: !0,
		touches: !0,
		which: function(e) {
			var t = e.button;
			return null == e.which && we.test(e.type) ? null != e.charCode ? e.charCode : e.keyCode : !e.which && void 0 !== t && Te.test(e.type) ? 1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0 : e.which
		}
	}, w.event.addProp), w.each({
		mouseenter: "mouseover",
		mouseleave: "mouseout",
		pointerenter: "pointerover",
		pointerleave: "pointerout"
	}, function(e, t) {
		w.event.special[e] = {
			delegateType: t,
			bindType: t,
			handle: function(e) {
				var n, r = this,
					i = e.relatedTarget,
					o = e.handleObj;
				return i && (i === r || w.contains(r, i)) || (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
			}
		}
	}), w.fn.extend({
		on: function(e, t, n, r) {
			return De(this, e, t, n, r)
		},
		one: function(e, t, n, r) {
			return De(this, e, t, n, r, 1)
		},
		off: function(e, t, n) {
			var r, i;
			if (e && e.preventDefault && e.handleObj) return r = e.handleObj, w(e.delegateTarget).off(r.namespace ? r.origType + "." + r.namespace : r.origType, r.selector, r.handler), this;
			if ("object" == typeof e) {
				for (i in e) this.off(i, t, e[i]);
				return this
			}
			return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = ke), this.each(function() {
				w.event.remove(this, e, n, t)
			})
		}
	});
	var Ne = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
		Ae = /<script|<style|<link/i,
		je = /checked\s*(?:[^=]|=\s*.checked.)/i,
		qe = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

	function Le(e, t) {
		return N(e, "table") && N(11 !== t.nodeType ? t : t.firstChild, "tr") ? w(e).children("tbody")[0] || e : e
	}

	function He(e) {
		return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
	}

	function Oe(e) {
		return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e
	}

	function Pe(e, t) {
		var n, r, i, o, a, s, u, l;
		if (1 === t.nodeType) {
			if (J.hasData(e) && (o = J.access(e), a = J.set(t, o), l = o.events)) {
				delete a.handle, a.events = {};
				for (i in l)
					for (n = 0, r = l[i].length; n < r; n++) w.event.add(t, i, l[i][n])
			}
			K.hasData(e) && (s = K.access(e), u = w.extend({}, s), K.set(t, u))
		}
	}

	function Me(e, t) {
		var n = t.nodeName.toLowerCase();
		"input" === n && pe.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue)
	}

	function Re(e, t, n, r) {
		t = a.apply([], t);
		var i, o, s, u, l, c, f = 0,
			p = e.length,
			d = p - 1,
			y = t[0],
			v = g(y);
		if (v || p > 1 && "string" == typeof y && !h.checkClone && je.test(y)) return e.each(function(i) {
			var o = e.eq(i);
			v && (t[0] = y.call(this, i, o.html())), Re(o, t, n, r)
		});
		if (p && (i = xe(t, e[0].ownerDocument, !1, e, r), o = i.firstChild, 1 === i.childNodes.length && (i = o), o || r)) {
			for (u = (s = w.map(ye(i, "script"), He)).length; f < p; f++) l = i, f !== d && (l = w.clone(l, !0, !0), u && w.merge(s, ye(l, "script"))), n.call(e[f], l, f);
			if (u)
				for (c = s[s.length - 1].ownerDocument, w.map(s, Oe), f = 0; f < u; f++) l = s[f], he.test(l.type || "") && !J.access(l, "globalEval") && w.contains(c, l) && (l.src && "module" !== (l.type || "").toLowerCase() ? w._evalUrl && w._evalUrl(l.src) : m(l.textContent.replace(qe, ""), c, l))
		}
		return e
	}

	function Ie(e, t, n) {
		for (var r, i = t ? w.filter(t, e) : e, o = 0; null != (r = i[o]); o++) n || 1 !== r.nodeType || w.cleanData(ye(r)), r.parentNode && (n && w.contains(r.ownerDocument, r) && ve(ye(r, "script")), r.parentNode.removeChild(r));
		return e
	}
	w.extend({
		htmlPrefilter: function(e) {
			return e.replace(Ne, "<$1></$2>")
		},
		clone: function(e, t, n) {
			var r, i, o, a, s = e.cloneNode(!0),
				u = w.contains(e.ownerDocument, e);
			if (!(h.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || w.isXMLDoc(e)))
				for (a = ye(s), r = 0, i = (o = ye(e)).length; r < i; r++) Me(o[r], a[r]);
			if (t)
				if (n)
					for (o = o || ye(e), a = a || ye(s), r = 0, i = o.length; r < i; r++) Pe(o[r], a[r]);
				else Pe(e, s);
			return (a = ye(s, "script")).length > 0 && ve(a, !u && ye(e, "script")), s
		},
		cleanData: function(e) {
			for (var t, n, r, i = w.event.special, o = 0; void 0 !== (n = e[o]); o++)
				if (Y(n)) {
					if (t = n[J.expando]) {
						if (t.events)
							for (r in t.events) i[r] ? w.event.remove(n, r) : w.removeEvent(n, r, t.handle);
						n[J.expando] = void 0
					}
					n[K.expando] && (n[K.expando] = void 0)
				}
		}
	}), w.fn.extend({
		detach: function(e) {
			return Ie(this, e, !0)
		},
		remove: function(e) {
			return Ie(this, e)
		},
		text: function(e) {
			return z(this, function(e) {
				return void 0 === e ? w.text(this) : this.empty().each(function() {
					1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
				})
			}, null, e, arguments.length)
		},
		append: function() {
			return Re(this, arguments, function(e) {
				1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || Le(this, e).appendChild(e)
			})
		},
		prepend: function() {
			return Re(this, arguments, function(e) {
				if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
					var t = Le(this, e);
					t.insertBefore(e, t.firstChild)
				}
			})
		},
		before: function() {
			return Re(this, arguments, function(e) {
				this.parentNode && this.parentNode.insertBefore(e, this)
			})
		},
		after: function() {
			return Re(this, arguments, function(e) {
				this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
			})
		},
		empty: function() {
			for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (w.cleanData(ye(e, !1)), e.textContent = "");
			return this
		},
		clone: function(e, t) {
			return e = null != e && e, t = null == t ? e : t, this.map(function() {
				return w.clone(this, e, t)
			})
		},
		html: function(e) {
			return z(this, function(e) {
				var t = this[0] || {},
					n = 0,
					r = this.length;
				if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
				if ("string" == typeof e && !Ae.test(e) && !ge[(de.exec(e) || ["", ""])[1].toLowerCase()]) {
					e = w.htmlPrefilter(e);
					try {
						for (; n < r; n++) 1 === (t = this[n] || {}).nodeType && (w.cleanData(ye(t, !1)), t.innerHTML = e);
						t = 0
					} catch (e) {}
				}
				t && this.empty().append(e)
			}, null, e, arguments.length)
		},
		replaceWith: function() {
			var e = [];
			return Re(this, arguments, function(t) {
				var n = this.parentNode;
				w.inArray(this, e) < 0 && (w.cleanData(ye(this)), n && n.replaceChild(t, this))
			}, e)
		}
	}), w.each({
		appendTo: "append",
		prependTo: "prepend",
		insertBefore: "before",
		insertAfter: "after",
		replaceAll: "replaceWith"
	}, function(e, t) {
		w.fn[e] = function(e) {
			for (var n, r = [], i = w(e), o = i.length - 1, a = 0; a <= o; a++) n = a === o ? this : this.clone(!0), w(i[a])[t](n), s.apply(r, n.get());
			return this.pushStack(r)
		}
	});
	var We = new RegExp("^(" + re + ")(?!px)[a-z%]+$", "i"),
		$e = function(t) {
			var n = t.ownerDocument.defaultView;
			return n && n.opener || (n = e), n.getComputedStyle(t)
		},
		Be = new RegExp(oe.join("|"), "i");
	! function() {
		function t() {
			if (c) {
				l.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", c.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%", be.appendChild(l).appendChild(c);
				var t = e.getComputedStyle(c);
				i = "1%" !== t.top, u = 12 === n(t.marginLeft), c.style.right = "60%", s = 36 === n(t.right), o = 36 === n(t.width), c.style.position = "absolute", a = 36 === c.offsetWidth || "absolute", be.removeChild(l), c = null
			}
		}

		function n(e) {
			return Math.round(parseFloat(e))
		}
		var i, o, a, s, u, l = r.createElement("div"),
			c = r.createElement("div");
		c.style && (c.style.backgroundClip = "content-box", c.cloneNode(!0).style.backgroundClip = "", h.clearCloneStyle = "content-box" === c.style.backgroundClip, w.extend(h, {
			boxSizingReliable: function() {
				return t(), o
			},
			pixelBoxStyles: function() {
				return t(), s
			},
			pixelPosition: function() {
				return t(), i
			},
			reliableMarginLeft: function() {
				return t(), u
			},
			scrollboxSize: function() {
				return t(), a
			}
		}))
	}();

	function Fe(e, t, n) {
		var r, i, o, a, s = e.style;
		return (n = n || $e(e)) && ("" !== (a = n.getPropertyValue(t) || n[t]) || w.contains(e.ownerDocument, e) || (a = w.style(e, t)), !h.pixelBoxStyles() && We.test(a) && Be.test(t) && (r = s.width, i = s.minWidth, o = s.maxWidth, s.minWidth = s.maxWidth = s.width = a, a = n.width, s.width = r, s.minWidth = i, s.maxWidth = o)), void 0 !== a ? a + "" : a
	}

	function _e(e, t) {
		return {
			get: function() {
				if (!e()) return (this.get = t).apply(this, arguments);
				delete this.get
			}
		}
	}
	var ze = /^(none|table(?!-c[ea]).+)/,
		Xe = /^--/,
		Ue = {
			position: "absolute",
			visibility: "hidden",
			display: "block"
		},
		Ve = {
			letterSpacing: "0",
			fontWeight: "400"
		},
		Ge = ["Webkit", "Moz", "ms"],
		Ye = r.createElement("div").style;

	function Qe(e) {
		if (e in Ye) return e;
		var t = e[0].toUpperCase() + e.slice(1),
			n = Ge.length;
		while (n--)
			if ((e = Ge[n] + t) in Ye) return e
	}

	function Je(e) {
		var t = w.cssProps[e];
		return t || (t = w.cssProps[e] = Qe(e) || e), t
	}

	function Ke(e, t, n) {
		var r = ie.exec(t);
		return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t
	}

	function Ze(e, t, n, r, i, o) {
		var a = "width" === t ? 1 : 0,
			s = 0,
			u = 0;
		if (n === (r ? "border" : "content")) return 0;
		for (; a < 4; a += 2) "margin" === n && (u += w.css(e, n + oe[a], !0, i)), r ? ("content" === n && (u -= w.css(e, "padding" + oe[a], !0, i)), "margin" !== n && (u -= w.css(e, "border" + oe[a] + "Width", !0, i))) : (u += w.css(e, "padding" + oe[a], !0, i), "padding" !== n ? u += w.css(e, "border" + oe[a] + "Width", !0, i) : s += w.css(e, "border" + oe[a] + "Width", !0, i));
		return !r && o >= 0 && (u += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - u - s - .5))), u
	}

	function et(e, t, n) {
		var r = $e(e),
			i = Fe(e, t, r),
			o = "border-box" === w.css(e, "boxSizing", !1, r),
			a = o;
		if (We.test(i)) {
			if (!n) return i;
			i = "auto"
		}
		return a = a && (h.boxSizingReliable() || i === e.style[t]), ("auto" === i || !parseFloat(i) && "inline" === w.css(e, "display", !1, r)) && (i = e["offset" + t[0].toUpperCase() + t.slice(1)], a = !0), (i = parseFloat(i) || 0) + Ze(e, t, n || (o ? "border" : "content"), a, r, i) + "px"
	}
	w.extend({
		cssHooks: {
			opacity: {
				get: function(e, t) {
					if (t) {
						var n = Fe(e, "opacity");
						return "" === n ? "1" : n
					}
				}
			}
		},
		cssNumber: {
			animationIterationCount: !0,
			columnCount: !0,
			fillOpacity: !0,
			flexGrow: !0,
			flexShrink: !0,
			fontWeight: !0,
			lineHeight: !0,
			opacity: !0,
			order: !0,
			orphans: !0,
			widows: !0,
			zIndex: !0,
			zoom: !0
		},
		cssProps: {},
		style: function(e, t, n, r) {
			if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
				var i, o, a, s = G(t),
					u = Xe.test(t),
					l = e.style;
				if (u || (t = Je(s)), a = w.cssHooks[t] || w.cssHooks[s], void 0 === n) return a && "get" in a && void 0 !== (i = a.get(e, !1, r)) ? i : l[t];
				"string" == (o = typeof n) && (i = ie.exec(n)) && i[1] && (n = ue(e, t, i), o = "number"), null != n && n === n && ("number" === o && (n += i && i[3] || (w.cssNumber[s] ? "" : "px")), h.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (l[t] = "inherit"), a && "set" in a && void 0 === (n = a.set(e, n, r)) || (u ? l.setProperty(t, n) : l[t] = n))
			}
		},
		css: function(e, t, n, r) {
			var i, o, a, s = G(t);
			return Xe.test(t) || (t = Je(s)), (a = w.cssHooks[t] || w.cssHooks[s]) && "get" in a && (i = a.get(e, !0, n)), void 0 === i && (i = Fe(e, t, r)), "normal" === i && t in Ve && (i = Ve[t]), "" === n || n ? (o = parseFloat(i), !0 === n || isFinite(o) ? o || 0 : i) : i
		}
	}), w.each(["height", "width"], function(e, t) {
		w.cssHooks[t] = {
			get: function(e, n, r) {
				if (n) return !ze.test(w.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? et(e, t, r) : se(e, Ue, function() {
					return et(e, t, r)
				})
			},
			set: function(e, n, r) {
				var i, o = $e(e),
					a = "border-box" === w.css(e, "boxSizing", !1, o),
					s = r && Ze(e, t, r, a, o);
				return a && h.scrollboxSize() === o.position && (s -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(o[t]) - Ze(e, t, "border", !1, o) - .5)), s && (i = ie.exec(n)) && "px" !== (i[3] || "px") && (e.style[t] = n, n = w.css(e, t)), Ke(e, n, s)
			}
		}
	}), w.cssHooks.marginLeft = _e(h.reliableMarginLeft, function(e, t) {
		if (t) return (parseFloat(Fe(e, "marginLeft")) || e.getBoundingClientRect().left - se(e, {
			marginLeft: 0
		}, function() {
			return e.getBoundingClientRect().left
		})) + "px"
	}), w.each({
		margin: "",
		padding: "",
		border: "Width"
	}, function(e, t) {
		w.cssHooks[e + t] = {
			expand: function(n) {
				for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++) i[e + oe[r] + t] = o[r] || o[r - 2] || o[0];
				return i
			}
		}, "margin" !== e && (w.cssHooks[e + t].set = Ke)
	}), w.fn.extend({
		css: function(e, t) {
			return z(this, function(e, t, n) {
				var r, i, o = {},
					a = 0;
				if (Array.isArray(t)) {
					for (r = $e(e), i = t.length; a < i; a++) o[t[a]] = w.css(e, t[a], !1, r);
					return o
				}
				return void 0 !== n ? w.style(e, t, n) : w.css(e, t)
			}, e, t, arguments.length > 1)
		}
	});

	function tt(e, t, n, r, i) {
		return new tt.prototype.init(e, t, n, r, i)
	}
	w.Tween = tt, tt.prototype = {
		constructor: tt,
		init: function(e, t, n, r, i, o) {
			this.elem = e, this.prop = n, this.easing = i || w.easing._default, this.options = t, this.start = this.now = this.cur(), this.end = r, this.unit = o || (w.cssNumber[n] ? "" : "px")
		},
		cur: function() {
			var e = tt.propHooks[this.prop];
			return e && e.get ? e.get(this) : tt.propHooks._default.get(this)
		},
		run: function(e) {
			var t, n = tt.propHooks[this.prop];
			return this.options.duration ? this.pos = t = w.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration) : this.pos = t = e, this.now = (this.end - this.start) * t + this.start, this.options.step && this.options.step.call(this.elem, this.now, this), n && n.set ? n.set(this) : tt.propHooks._default.set(this), this
		}
	}, tt.prototype.init.prototype = tt.prototype, tt.propHooks = {
		_default: {
			get: function(e) {
				var t;
				return 1 !== e.elem.nodeType || null != e.elem[e.prop] && null == e.elem.style[e.prop] ? e.elem[e.prop] : (t = w.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0
			},
			set: function(e) {
				w.fx.step[e.prop] ? w.fx.step[e.prop](e) : 1 !== e.elem.nodeType || null == e.elem.style[w.cssProps[e.prop]] && !w.cssHooks[e.prop] ? e.elem[e.prop] = e.now : w.style(e.elem, e.prop, e.now + e.unit)
			}
		}
	}, tt.propHooks.scrollTop = tt.propHooks.scrollLeft = {
		set: function(e) {
			e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now)
		}
	}, w.easing = {
		linear: function(e) {
			return e
		},
		swing: function(e) {
			return .5 - Math.cos(e * Math.PI) / 2
		},
		_default: "swing"
	}, w.fx = tt.prototype.init, w.fx.step = {};
	var nt, rt, it = /^(?:toggle|show|hide)$/,
		ot = /queueHooks$/;

	function at() {
		rt && (!1 === r.hidden && e.requestAnimationFrame ? e.requestAnimationFrame(at) : e.setTimeout(at, w.fx.interval), w.fx.tick())
	}

	function st() {
		return e.setTimeout(function() {
			nt = void 0
		}), nt = Date.now()
	}

	function ut(e, t) {
		var n, r = 0,
			i = {
				height: e
			};
		for (t = t ? 1 : 0; r < 4; r += 2 - t) i["margin" + (n = oe[r])] = i["padding" + n] = e;
		return t && (i.opacity = i.width = e), i
	}

	function lt(e, t, n) {
		for (var r, i = (pt.tweeners[t] || []).concat(pt.tweeners["*"]), o = 0, a = i.length; o < a; o++)
			if (r = i[o].call(n, t, e)) return r
	}

	function ct(e, t, n) {
		var r, i, o, a, s, u, l, c, f = "width" in t || "height" in t,
			p = this,
			d = {},
			h = e.style,
			g = e.nodeType && ae(e),
			y = J.get(e, "fxshow");
		n.queue || (null == (a = w._queueHooks(e, "fx")).unqueued && (a.unqueued = 0, s = a.empty.fire, a.empty.fire = function() {
			a.unqueued || s()
		}), a.unqueued++, p.always(function() {
			p.always(function() {
				a.unqueued--, w.queue(e, "fx").length || a.empty.fire()
			})
		}));
		for (r in t)
			if (i = t[r], it.test(i)) {
				if (delete t[r], o = o || "toggle" === i, i === (g ? "hide" : "show")) {
					if ("show" !== i || !y || void 0 === y[r]) continue;
					g = !0
				}
				d[r] = y && y[r] || w.style(e, r)
			} if ((u = !w.isEmptyObject(t)) || !w.isEmptyObject(d)) {
			f && 1 === e.nodeType && (n.overflow = [h.overflow, h.overflowX, h.overflowY], null == (l = y && y.display) && (l = J.get(e, "display")), "none" === (c = w.css(e, "display")) && (l ? c = l : (fe([e], !0), l = e.style.display || l, c = w.css(e, "display"), fe([e]))), ("inline" === c || "inline-block" === c && null != l) && "none" === w.css(e, "float") && (u || (p.done(function() {
				h.display = l
			}), null == l && (c = h.display, l = "none" === c ? "" : c)), h.display = "inline-block")), n.overflow && (h.overflow = "hidden", p.always(function() {
				h.overflow = n.overflow[0], h.overflowX = n.overflow[1], h.overflowY = n.overflow[2]
			})), u = !1;
			for (r in d) u || (y ? "hidden" in y && (g = y.hidden) : y = J.access(e, "fxshow", {
				display: l
			}), o && (y.hidden = !g), g && fe([e], !0), p.done(function() {
				g || fe([e]), J.remove(e, "fxshow");
				for (r in d) w.style(e, r, d[r])
			})), u = lt(g ? y[r] : 0, r, p), r in y || (y[r] = u.start, g && (u.end = u.start, u.start = 0))
		}
	}

	function ft(e, t) {
		var n, r, i, o, a;
		for (n in e)
			if (r = G(n), i = t[r], o = e[n], Array.isArray(o) && (i = o[1], o = e[n] = o[0]), n !== r && (e[r] = o, delete e[n]), (a = w.cssHooks[r]) && "expand" in a) {
				o = a.expand(o), delete e[r];
				for (n in o) n in e || (e[n] = o[n], t[n] = i)
			} else t[r] = i
	}

	function pt(e, t, n) {
		var r, i, o = 0,
			a = pt.prefilters.length,
			s = w.Deferred().always(function() {
				delete u.elem
			}),
			u = function() {
				if (i) return !1;
				for (var t = nt || st(), n = Math.max(0, l.startTime + l.duration - t), r = 1 - (n / l.duration || 0), o = 0, a = l.tweens.length; o < a; o++) l.tweens[o].run(r);
				return s.notifyWith(e, [l, r, n]), r < 1 && a ? n : (a || s.notifyWith(e, [l, 1, 0]), s.resolveWith(e, [l]), !1)
			},
			l = s.promise({
				elem: e,
				props: w.extend({}, t),
				opts: w.extend(!0, {
					specialEasing: {},
					easing: w.easing._default
				}, n),
				originalProperties: t,
				originalOptions: n,
				startTime: nt || st(),
				duration: n.duration,
				tweens: [],
				createTween: function(t, n) {
					var r = w.Tween(e, l.opts, t, n, l.opts.specialEasing[t] || l.opts.easing);
					return l.tweens.push(r), r
				},
				stop: function(t) {
					var n = 0,
						r = t ? l.tweens.length : 0;
					if (i) return this;
					for (i = !0; n < r; n++) l.tweens[n].run(1);
					return t ? (s.notifyWith(e, [l, 1, 0]), s.resolveWith(e, [l, t])) : s.rejectWith(e, [l, t]), this
				}
			}),
			c = l.props;
		for (ft(c, l.opts.specialEasing); o < a; o++)
			if (r = pt.prefilters[o].call(l, e, c, l.opts)) return g(r.stop) && (w._queueHooks(l.elem, l.opts.queue).stop = r.stop.bind(r)), r;
		return w.map(c, lt, l), g(l.opts.start) && l.opts.start.call(e, l), l.progress(l.opts.progress).done(l.opts.done, l.opts.complete).fail(l.opts.fail).always(l.opts.always), w.fx.timer(w.extend(u, {
			elem: e,
			anim: l,
			queue: l.opts.queue
		})), l
	}
	w.Animation = w.extend(pt, {
			tweeners: {
				"*": [function(e, t) {
					var n = this.createTween(e, t);
					return ue(n.elem, e, ie.exec(t), n), n
				}]
			},
			tweener: function(e, t) {
				g(e) ? (t = e, e = ["*"]) : e = e.match(M);
				for (var n, r = 0, i = e.length; r < i; r++) n = e[r], pt.tweeners[n] = pt.tweeners[n] || [], pt.tweeners[n].unshift(t)
			},
			prefilters: [ct],
			prefilter: function(e, t) {
				t ? pt.prefilters.unshift(e) : pt.prefilters.push(e)
			}
		}), w.speed = function(e, t, n) {
			var r = e && "object" == typeof e ? w.extend({}, e) : {
				complete: n || !n && t || g(e) && e,
				duration: e,
				easing: n && t || t && !g(t) && t
			};
			return w.fx.off ? r.duration = 0 : "number" != typeof r.duration && (r.duration in w.fx.speeds ? r.duration = w.fx.speeds[r.duration] : r.duration = w.fx.speeds._default), null != r.queue && !0 !== r.queue || (r.queue = "fx"), r.old = r.complete, r.complete = function() {
				g(r.old) && r.old.call(this), r.queue && w.dequeue(this, r.queue)
			}, r
		}, w.fn.extend({
			fadeTo: function(e, t, n, r) {
				return this.filter(ae).css("opacity", 0).show().end().animate({
					opacity: t
				}, e, n, r)
			},
			animate: function(e, t, n, r) {
				var i = w.isEmptyObject(e),
					o = w.speed(t, n, r),
					a = function() {
						var t = pt(this, w.extend({}, e), o);
						(i || J.get(this, "finish")) && t.stop(!0)
					};
				return a.finish = a, i || !1 === o.queue ? this.each(a) : this.queue(o.queue, a)
			},
			stop: function(e, t, n) {
				var r = function(e) {
					var t = e.stop;
					delete e.stop, t(n)
				};
				return "string" != typeof e && (n = t, t = e, e = void 0), t && !1 !== e && this.queue(e || "fx", []), this.each(function() {
					var t = !0,
						i = null != e && e + "queueHooks",
						o = w.timers,
						a = J.get(this);
					if (i) a[i] && a[i].stop && r(a[i]);
					else
						for (i in a) a[i] && a[i].stop && ot.test(i) && r(a[i]);
					for (i = o.length; i--;) o[i].elem !== this || null != e && o[i].queue !== e || (o[i].anim.stop(n), t = !1, o.splice(i, 1));
					!t && n || w.dequeue(this, e)
				})
			},
			finish: function(e) {
				return !1 !== e && (e = e || "fx"), this.each(function() {
					var t, n = J.get(this),
						r = n[e + "queue"],
						i = n[e + "queueHooks"],
						o = w.timers,
						a = r ? r.length : 0;
					for (n.finish = !0, w.queue(this, e, []), i && i.stop && i.stop.call(this, !0), t = o.length; t--;) o[t].elem === this && o[t].queue === e && (o[t].anim.stop(!0), o.splice(t, 1));
					for (t = 0; t < a; t++) r[t] && r[t].finish && r[t].finish.call(this);
					delete n.finish
				})
			}
		}), w.each(["toggle", "show", "hide"], function(e, t) {
			var n = w.fn[t];
			w.fn[t] = function(e, r, i) {
				return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(ut(t, !0), e, r, i)
			}
		}), w.each({
			slideDown: ut("show"),
			slideUp: ut("hide"),
			slideToggle: ut("toggle"),
			fadeIn: {
				opacity: "show"
			},
			fadeOut: {
				opacity: "hide"
			},
			fadeToggle: {
				opacity: "toggle"
			}
		}, function(e, t) {
			w.fn[e] = function(e, n, r) {
				return this.animate(t, e, n, r)
			}
		}), w.timers = [], w.fx.tick = function() {
			var e, t = 0,
				n = w.timers;
			for (nt = Date.now(); t < n.length; t++)(e = n[t])() || n[t] !== e || n.splice(t--, 1);
			n.length || w.fx.stop(), nt = void 0
		}, w.fx.timer = function(e) {
			w.timers.push(e), w.fx.start()
		}, w.fx.interval = 13, w.fx.start = function() {
			rt || (rt = !0, at())
		}, w.fx.stop = function() {
			rt = null
		}, w.fx.speeds = {
			slow: 1000,
			fast: 10000,
			_default: 600
		}, w.fn.delay = function(t, n) {
			return t = w.fx ? w.fx.speeds[t] || t : t, n = n || "fx", this.queue(n, function(n, r) {
				var i = e.setTimeout(n, t);
				r.stop = function() {
					e.clearTimeout(i)
				}
			})
		},
		function() {
			var e = r.createElement("input"),
				t = r.createElement("select").appendChild(r.createElement("option"));
			e.type = "checkbox", h.checkOn = "" !== e.value, h.optSelected = t.selected, (e = r.createElement("input")).value = "t", e.type = "radio", h.radioValue = "t" === e.value
		}();
	var dt, ht = w.expr.attrHandle;
	w.fn.extend({
		attr: function(e, t) {
			return z(this, w.attr, e, t, arguments.length > 1)
		},
		removeAttr: function(e) {
			return this.each(function() {
				w.removeAttr(this, e)
			})
		}
	}), w.extend({
		attr: function(e, t, n) {
			var r, i, o = e.nodeType;
			if (3 !== o && 8 !== o && 2 !== o) return "undefined" == typeof e.getAttribute ? w.prop(e, t, n) : (1 === o && w.isXMLDoc(e) || (i = w.attrHooks[t.toLowerCase()] || (w.expr.match.bool.test(t) ? dt : void 0)), void 0 !== n ? null === n ? void w.removeAttr(e, t) : i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : (e.setAttribute(t, n + ""), n) : i && "get" in i && null !== (r = i.get(e, t)) ? r : null == (r = w.find.attr(e, t)) ? void 0 : r)
		},
		attrHooks: {
			type: {
				set: function(e, t) {
					if (!h.radioValue && "radio" === t && N(e, "input")) {
						var n = e.value;
						return e.setAttribute("type", t), n && (e.value = n), t
					}
				}
			}
		},
		removeAttr: function(e, t) {
			var n, r = 0,
				i = t && t.match(M);
			if (i && 1 === e.nodeType)
				while (n = i[r++]) e.removeAttribute(n)
		}
	}), dt = {
		set: function(e, t, n) {
			return !1 === t ? w.removeAttr(e, n) : e.setAttribute(n, n), n
		}
	}, w.each(w.expr.match.bool.source.match(/\w+/g), function(e, t) {
		var n = ht[t] || w.find.attr;
		ht[t] = function(e, t, r) {
			var i, o, a = t.toLowerCase();
			return r || (o = ht[a], ht[a] = i, i = null != n(e, t, r) ? a : null, ht[a] = o), i
		}
	});
	var gt = /^(?:input|select|textarea|button)$/i,
		yt = /^(?:a|area)$/i;
	w.fn.extend({
		prop: function(e, t) {
			return z(this, w.prop, e, t, arguments.length > 1)
		},
		removeProp: function(e) {
			return this.each(function() {
				delete this[w.propFix[e] || e]
			})
		}
	}), w.extend({
		prop: function(e, t, n) {
			var r, i, o = e.nodeType;
			if (3 !== o && 8 !== o && 2 !== o) return 1 === o && w.isXMLDoc(e) || (t = w.propFix[t] || t, i = w.propHooks[t]), void 0 !== n ? i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : e[t] = n : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t]
		},
		propHooks: {
			tabIndex: {
				get: function(e) {
					var t = w.find.attr(e, "tabindex");
					return t ? parseInt(t, 10) : gt.test(e.nodeName) || yt.test(e.nodeName) && e.href ? 0 : -1
				}
			}
		},
		propFix: {
			"for": "htmlFor",
			"class": "className"
		}
	}), h.optSelected || (w.propHooks.selected = {
		get: function(e) {
			var t = e.parentNode;
			return t && t.parentNode && t.parentNode.selectedIndex, null
		},
		set: function(e) {
			var t = e.parentNode;
			t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)
		}
	}), w.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
		w.propFix[this.toLowerCase()] = this
	});

	function vt(e) {
		return (e.match(M) || []).join(" ")
	}

	function mt(e) {
		return e.getAttribute && e.getAttribute("class") || ""
	}

	function xt(e) {
		return Array.isArray(e) ? e : "string" == typeof e ? e.match(M) || [] : []
	}
	w.fn.extend({
		addClass: function(e) {
			var t, n, r, i, o, a, s, u = 0;
			if (g(e)) return this.each(function(t) {
				w(this).addClass(e.call(this, t, mt(this)))
			});
			if ((t = xt(e)).length)
				while (n = this[u++])
					if (i = mt(n), r = 1 === n.nodeType && " " + vt(i) + " ") {
						a = 0;
						while (o = t[a++]) r.indexOf(" " + o + " ") < 0 && (r += o + " ");
						i !== (s = vt(r)) && n.setAttribute("class", s)
					} return this
		},
		removeClass: function(e) {
			var t, n, r, i, o, a, s, u = 0;
			if (g(e)) return this.each(function(t) {
				w(this).removeClass(e.call(this, t, mt(this)))
			});
			if (!arguments.length) return this.attr("class", "");
			if ((t = xt(e)).length)
				while (n = this[u++])
					if (i = mt(n), r = 1 === n.nodeType && " " + vt(i) + " ") {
						a = 0;
						while (o = t[a++])
							while (r.indexOf(" " + o + " ") > -1) r = r.replace(" " + o + " ", " ");
						i !== (s = vt(r)) && n.setAttribute("class", s)
					} return this
		},
		toggleClass: function(e, t) {
			var n = typeof e,
				r = "string" === n || Array.isArray(e);
			return "boolean" == typeof t && r ? t ? this.addClass(e) : this.removeClass(e) : g(e) ? this.each(function(n) {
				w(this).toggleClass(e.call(this, n, mt(this), t), t)
			}) : this.each(function() {
				var t, i, o, a;
				if (r) {
					i = 0, o = w(this), a = xt(e);
					while (t = a[i++]) o.hasClass(t) ? o.removeClass(t) : o.addClass(t)
				} else void 0 !== e && "boolean" !== n || ((t = mt(this)) && J.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : J.get(this, "__className__") || ""))
			})
		},
		hasClass: function(e) {
			var t, n, r = 0;
			t = " " + e + " ";
			while (n = this[r++])
				if (1 === n.nodeType && (" " + vt(mt(n)) + " ").indexOf(t) > -1) return !0;
			return !1
		}
	});
	var bt = /\r/g;
	w.fn.extend({
		val: function(e) {
			var t, n, r, i = this[0]; {
				if (arguments.length) return r = g(e), this.each(function(n) {
					var i;
					1 === this.nodeType && (null == (i = r ? e.call(this, n, w(this).val()) : e) ? i = "" : "number" == typeof i ? i += "" : Array.isArray(i) && (i = w.map(i, function(e) {
						return null == e ? "" : e + ""
					})), (t = w.valHooks[this.type] || w.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, i, "value") || (this.value = i))
				});
				if (i) return (t = w.valHooks[i.type] || w.valHooks[i.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(i, "value")) ? n : "string" == typeof(n = i.value) ? n.replace(bt, "") : null == n ? "" : n
			}
		}
	}), w.extend({
		valHooks: {
			option: {
				get: function(e) {
					var t = w.find.attr(e, "value");
					return null != t ? t : vt(w.text(e))
				}
			},
			select: {
				get: function(e) {
					var t, n, r, i = e.options,
						o = e.selectedIndex,
						a = "select-one" === e.type,
						s = a ? null : [],
						u = a ? o + 1 : i.length;
					for (r = o < 0 ? u : a ? o : 0; r < u; r++)
						if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode.disabled || !N(n.parentNode, "optgroup"))) {
							if (t = w(n).val(), a) return t;
							s.push(t)
						} return s
				},
				set: function(e, t) {
					var n, r, i = e.options,
						o = w.makeArray(t),
						a = i.length;
					while (a--)((r = i[a]).selected = w.inArray(w.valHooks.option.get(r), o) > -1) && (n = !0);
					return n || (e.selectedIndex = -1), o
				}
			}
		}
	}), w.each(["radio", "checkbox"], function() {
		w.valHooks[this] = {
			set: function(e, t) {
				if (Array.isArray(t)) return e.checked = w.inArray(w(e).val(), t) > -1
			}
		}, h.checkOn || (w.valHooks[this].get = function(e) {
			return null === e.getAttribute("value") ? "on" : e.value
		})
	}), h.focusin = "onfocusin" in e;
	var wt = /^(?:focusinfocus|focusoutblur)$/,
		Tt = function(e) {
			e.stopPropagation()
		};
	w.extend(w.event, {
		trigger: function(t, n, i, o) {
			var a, s, u, l, c, p, d, h, v = [i || r],
				m = f.call(t, "type") ? t.type : t,
				x = f.call(t, "namespace") ? t.namespace.split(".") : [];
			if (s = h = u = i = i || r, 3 !== i.nodeType && 8 !== i.nodeType && !wt.test(m + w.event.triggered) && (m.indexOf(".") > -1 && (m = (x = m.split(".")).shift(), x.sort()), c = m.indexOf(":") < 0 && "on" + m, t = t[w.expando] ? t : new w.Event(m, "object" == typeof t && t), t.isTrigger = o ? 2 : 3, t.namespace = x.join("."), t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + x.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = i), n = null == n ? [t] : w.makeArray(n, [t]), d = w.event.special[m] || {}, o || !d.trigger || !1 !== d.trigger.apply(i, n))) {
				if (!o && !d.noBubble && !y(i)) {
					for (l = d.delegateType || m, wt.test(l + m) || (s = s.parentNode); s; s = s.parentNode) v.push(s), u = s;
					u === (i.ownerDocument || r) && v.push(u.defaultView || u.parentWindow || e)
				}
				a = 0;
				while ((s = v[a++]) && !t.isPropagationStopped()) h = s, t.type = a > 1 ? l : d.bindType || m, (p = (J.get(s, "events") || {})[t.type] && J.get(s, "handle")) && p.apply(s, n), (p = c && s[c]) && p.apply && Y(s) && (t.result = p.apply(s, n), !1 === t.result && t.preventDefault());
				return t.type = m, o || t.isDefaultPrevented() || d._default && !1 !== d._default.apply(v.pop(), n) || !Y(i) || c && g(i[m]) && !y(i) && ((u = i[c]) && (i[c] = null), w.event.triggered = m, t.isPropagationStopped() && h.addEventListener(m, Tt), i[m](), t.isPropagationStopped() && h.removeEventListener(m, Tt), w.event.triggered = void 0, u && (i[c] = u)), t.result
			}
		},
		simulate: function(e, t, n) {
			var r = w.extend(new w.Event, n, {
				type: e,
				isSimulated: !0
			});
			w.event.trigger(r, null, t)
		}
	}), w.fn.extend({
		trigger: function(e, t) {
			return this.each(function() {
				w.event.trigger(e, t, this)
			})
		},
		triggerHandler: function(e, t) {
			var n = this[0];
			if (n) return w.event.trigger(e, t, n, !0)
		}
	}), h.focusin || w.each({
		focus: "focusin",
		blur: "focusout"
	}, function(e, t) {
		var n = function(e) {
			w.event.simulate(t, e.target, w.event.fix(e))
		};
		w.event.special[t] = {
			setup: function() {
				var r = this.ownerDocument || this,
					i = J.access(r, t);
				i || r.addEventListener(e, n, !0), J.access(r, t, (i || 0) + 1)
			},
			teardown: function() {
				var r = this.ownerDocument || this,
					i = J.access(r, t) - 1;
				i ? J.access(r, t, i) : (r.removeEventListener(e, n, !0), J.remove(r, t))
			}
		}
	});
	var Ct = e.location,
		Et = Date.now(),
		kt = /\?/;
	w.parseXML = function(t) {
		var n;
		if (!t || "string" != typeof t) return null;
		try {
			n = (new e.DOMParser).parseFromString(t, "text/xml")
		} catch (e) {
			n = void 0
		}
		return n && !n.getElementsByTagName("parsererror").length || w.error("Invalid XML: " + t), n
	};
	var St = /\[\]$/,
		Dt = /\r?\n/g,
		Nt = /^(?:submit|button|image|reset|file)$/i,
		At = /^(?:input|select|textarea|keygen)/i;

	function jt(e, t, n, r) {
		var i;
		if (Array.isArray(t)) w.each(t, function(t, i) {
			n || St.test(e) ? r(e, i) : jt(e + "[" + ("object" == typeof i && null != i ? t : "") + "]", i, n, r)
		});
		else if (n || "object" !== x(t)) r(e, t);
		else
			for (i in t) jt(e + "[" + i + "]", t[i], n, r)
	}
	w.param = function(e, t) {
		var n, r = [],
			i = function(e, t) {
				var n = g(t) ? t() : t;
				r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
			};
		if (Array.isArray(e) || e.jquery && !w.isPlainObject(e)) w.each(e, function() {
			i(this.name, this.value)
		});
		else
			for (n in e) jt(n, e[n], t, i);
		return r.join("&")
	}, w.fn.extend({
		serialize: function() {
			return w.param(this.serializeArray())
		},
		serializeArray: function() {
			return this.map(function() {
				var e = w.prop(this, "elements");
				return e ? w.makeArray(e) : this
			}).filter(function() {
				var e = this.type;
				return this.name && !w(this).is(":disabled") && At.test(this.nodeName) && !Nt.test(e) && (this.checked || !pe.test(e))
			}).map(function(e, t) {
				var n = w(this).val();
				return null == n ? null : Array.isArray(n) ? w.map(n, function(e) {
					return {
						name: t.name,
						value: e.replace(Dt, "\r\n")
					}
				}) : {
					name: t.name,
					value: n.replace(Dt, "\r\n")
				}
			}).get()
		}
	});
	var qt = /%20/g,
		Lt = /#.*$/,
		Ht = /([?&])_=[^&]*/,
		Ot = /^(.*?):[ \t]*([^\r\n]*)$/gm,
		Pt = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
		Mt = /^(?:GET|HEAD)$/,
		Rt = /^\/\//,
		It = {},
		Wt = {},
		$t = "*/".concat("*"),
		Bt = r.createElement("a");
	Bt.href = Ct.href;

	function Ft(e) {
		return function(t, n) {
			"string" != typeof t && (n = t, t = "*");
			var r, i = 0,
				o = t.toLowerCase().match(M) || [];
			if (g(n))
				while (r = o[i++]) "+" === r[0] ? (r = r.slice(1) || "*", (e[r] = e[r] || []).unshift(n)) : (e[r] = e[r] || []).push(n)
		}
	}

	function _t(e, t, n, r) {
		var i = {},
			o = e === Wt;

		function a(s) {
			var u;
			return i[s] = !0, w.each(e[s] || [], function(e, s) {
				var l = s(t, n, r);
				return "string" != typeof l || o || i[l] ? o ? !(u = l) : void 0 : (t.dataTypes.unshift(l), a(l), !1)
			}), u
		}
		return a(t.dataTypes[0]) || !i["*"] && a("*")
	}

	function zt(e, t) {
		var n, r, i = w.ajaxSettings.flatOptions || {};
		for (n in t) void 0 !== t[n] && ((i[n] ? e : r || (r = {}))[n] = t[n]);
		return r && w.extend(!0, e, r), e
	}

	function Xt(e, t, n) {
		var r, i, o, a, s = e.contents,
			u = e.dataTypes;
		while ("*" === u[0]) u.shift(), void 0 === r && (r = e.mimeType || t.getResponseHeader("Content-Type"));
		if (r)
			for (i in s)
				if (s[i] && s[i].test(r)) {
					u.unshift(i);
					break
				} if (u[0] in n) o = u[0];
		else {
			for (i in n) {
				if (!u[0] || e.converters[i + " " + u[0]]) {
					o = i;
					break
				}
				a || (a = i)
			}
			o = o || a
		}
		if (o) return o !== u[0] && u.unshift(o), n[o]
	}

	function Ut(e, t, n, r) {
		var i, o, a, s, u, l = {},
			c = e.dataTypes.slice();
		if (c[1])
			for (a in e.converters) l[a.toLowerCase()] = e.converters[a];
		o = c.shift();
		while (o)
			if (e.responseFields[o] && (n[e.responseFields[o]] = t), !u && r && e.dataFilter && (t = e.dataFilter(t, e.dataType)), u = o, o = c.shift())
				if ("*" === o) o = u;
				else if ("*" !== u && u !== o) {
			if (!(a = l[u + " " + o] || l["* " + o]))
				for (i in l)
					if ((s = i.split(" "))[1] === o && (a = l[u + " " + s[0]] || l["* " + s[0]])) {
						!0 === a ? a = l[i] : !0 !== l[i] && (o = s[0], c.unshift(s[1]));
						break
					} if (!0 !== a)
				if (a && e["throws"]) t = a(t);
				else try {
					t = a(t)
				} catch (e) {
					return {
						state: "parsererror",
						error: a ? e : "No conversion from " + u + " to " + o
					}
				}
		}
		return {
			state: "success",
			data: t
		}
	}
	w.extend({
		active: 0,
		lastModified: {},
		etag: {},
		ajaxSettings: {
			url: Ct.href,
			type: "GET",
			isLocal: Pt.test(Ct.protocol),
			global: !0,
			processData: !0,
			async: !0,
			contentType: "application/x-www-form-urlencoded; charset=UTF-8",
			accepts: {
				"*": $t,
				text: "text/plain",
				html: "text/html",
				xml: "application/xml, text/xml",
				json: "application/json, text/javascript"
			},
			contents: {
				xml: /\bxml\b/,
				html: /\bhtml/,
				json: /\bjson\b/
			},
			responseFields: {
				xml: "responseXML",
				text: "responseText",
				json: "responseJSON"
			},
			converters: {
				"* text": String,
				"text html": !0,
				"text json": JSON.parse,
				"text xml": w.parseXML
			},
			flatOptions: {
				url: !0,
				context: !0
			}
		},
		ajaxSetup: function(e, t) {
			return t ? zt(zt(e, w.ajaxSettings), t) : zt(w.ajaxSettings, e)
		},
		ajaxPrefilter: Ft(It),
		ajaxTransport: Ft(Wt),
		ajax: function(t, n) {
			"object" == typeof t && (n = t, t = void 0), n = n || {};
			var i, o, a, s, u, l, c, f, p, d, h = w.ajaxSetup({}, n),
				g = h.context || h,
				y = h.context && (g.nodeType || g.jquery) ? w(g) : w.event,
				v = w.Deferred(),
				m = w.Callbacks("once memory"),
				x = h.statusCode || {},
				b = {},
				T = {},
				C = "canceled",
				E = {
					readyState: 0,
					getResponseHeader: function(e) {
						var t;
						if (c) {
							if (!s) {
								s = {};
								while (t = Ot.exec(a)) s[t[1].toLowerCase()] = t[2]
							}
							t = s[e.toLowerCase()]
						}
						return null == t ? null : t
					},
					getAllResponseHeaders: function() {
						return c ? a : null
					},
					setRequestHeader: function(e, t) {
						return null == c && (e = T[e.toLowerCase()] = T[e.toLowerCase()] || e, b[e] = t), this
					},
					overrideMimeType: function(e) {
						return null == c && (h.mimeType = e), this
					},
					statusCode: function(e) {
						var t;
						if (e)
							if (c) E.always(e[E.status]);
							else
								for (t in e) x[t] = [x[t], e[t]];
						return this
					},
					abort: function(e) {
						var t = e || C;
						return i && i.abort(t), k(0, t), this
					}
				};
			if (v.promise(E), h.url = ((t || h.url || Ct.href) + "").replace(Rt, Ct.protocol + "//"), h.type = n.method || n.type || h.method || h.type, h.dataTypes = (h.dataType || "*").toLowerCase().match(M) || [""], null == h.crossDomain) {
				l = r.createElement("a");
				try {
					l.href = h.url, l.href = l.href, h.crossDomain = Bt.protocol + "//" + Bt.host != l.protocol + "//" + l.host
				} catch (e) {
					h.crossDomain = !0
				}
			}
			if (h.data && h.processData && "string" != typeof h.data && (h.data = w.param(h.data, h.traditional)), _t(It, h, n, E), c) return E;
			(f = w.event && h.global) && 0 == w.active++ && w.event.trigger("ajaxStart"), h.type = h.type.toUpperCase(), h.hasContent = !Mt.test(h.type), o = h.url.replace(Lt, ""), h.hasContent ? h.data && h.processData && 0 === (h.contentType || "").indexOf("application/x-www-form-urlencoded") && (h.data = h.data.replace(qt, "+")) : (d = h.url.slice(o.length), h.data && (h.processData || "string" == typeof h.data) && (o += (kt.test(o) ? "&" : "?") + h.data, delete h.data), !1 === h.cache && (o = o.replace(Ht, "$1"), d = (kt.test(o) ? "&" : "?") + "_=" + Et++ + d), h.url = o + d), h.ifModified && (w.lastModified[o] && E.setRequestHeader("If-Modified-Since", w.lastModified[o]), w.etag[o] && E.setRequestHeader("If-None-Match", w.etag[o])), (h.data && h.hasContent && !1 !== h.contentType || n.contentType) && E.setRequestHeader("Content-Type", h.contentType), E.setRequestHeader("Accept", h.dataTypes[0] && h.accepts[h.dataTypes[0]] ? h.accepts[h.dataTypes[0]] + ("*" !== h.dataTypes[0] ? ", " + $t + "; q=0.01" : "") : h.accepts["*"]);
			for (p in h.headers) E.setRequestHeader(p, h.headers[p]);
			if (h.beforeSend && (!1 === h.beforeSend.call(g, E, h) || c)) return E.abort();
			if (C = "abort", m.add(h.complete), E.done(h.success), E.fail(h.error), i = _t(Wt, h, n, E)) {
				if (E.readyState = 1, f && y.trigger("ajaxSend", [E, h]), c) return E;
				h.async && h.timeout > 0 && (u = e.setTimeout(function() {
					E.abort("timeout")
				}, h.timeout));
				try {
					c = !1, i.send(b, k)
				} catch (e) {
					if (c) throw e;
					k(-1, e)
				}
			} else k(-1, "No Transport");

			function k(t, n, r, s) {
				var l, p, d, b, T, C = n;
				c || (c = !0, u && e.clearTimeout(u), i = void 0, a = s || "", E.readyState = t > 0 ? 4 : 0, l = t >= 200 && t < 300 || 304 === t, r && (b = Xt(h, E, r)), b = Ut(h, b, E, l), l ? (h.ifModified && ((T = E.getResponseHeader("Last-Modified")) && (w.lastModified[o] = T), (T = E.getResponseHeader("etag")) && (w.etag[o] = T)), 204 === t || "HEAD" === h.type ? C = "nocontent" : 304 === t ? C = "notmodified" : (C = b.state, p = b.data, l = !(d = b.error))) : (d = C, !t && C || (C = "error", t < 0 && (t = 0))), E.status = t, E.statusText = (n || C) + "", l ? v.resolveWith(g, [p, C, E]) : v.rejectWith(g, [E, C, d]), E.statusCode(x), x = void 0, f && y.trigger(l ? "ajaxSuccess" : "ajaxError", [E, h, l ? p : d]), m.fireWith(g, [E, C]), f && (y.trigger("ajaxComplete", [E, h]), --w.active || w.event.trigger("ajaxStop")))
			}
			return E
		},
		getJSON: function(e, t, n) {
			return w.get(e, t, n, "json")
		},
		getScript: function(e, t) {
			return w.get(e, void 0, t, "script")
		}
	}), w.each(["get", "post"], function(e, t) {
		w[t] = function(e, n, r, i) {
			return g(n) && (i = i || r, r = n, n = void 0), w.ajax(w.extend({
				url: e,
				type: t,
				dataType: i,
				data: n,
				success: r
			}, w.isPlainObject(e) && e))
		}
	}), w._evalUrl = function(e) {
		return w.ajax({
			url: e,
			type: "GET",
			dataType: "script",
			cache: !0,
			async: !1,
			global: !1,
			"throws": !0
		})
	}, w.fn.extend({
		wrapAll: function(e) {
			var t;
			return this[0] && (g(e) && (e = e.call(this[0])), t = w(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map(function() {
				var e = this;
				while (e.firstElementChild) e = e.firstElementChild;
				return e
			}).append(this)), this
		},
		wrapInner: function(e) {
			return g(e) ? this.each(function(t) {
				w(this).wrapInner(e.call(this, t))
			}) : this.each(function() {
				var t = w(this),
					n = t.contents();
				n.length ? n.wrapAll(e) : t.append(e)
			})
		},
		wrap: function(e) {
			var t = g(e);
			return this.each(function(n) {
				w(this).wrapAll(t ? e.call(this, n) : e)
			})
		},
		unwrap: function(e) {
			return this.parent(e).not("body").each(function() {
				w(this).replaceWith(this.childNodes)
			}), this
		}
	}), w.expr.pseudos.hidden = function(e) {
		return !w.expr.pseudos.visible(e)
	}, w.expr.pseudos.visible = function(e) {
		return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
	}, w.ajaxSettings.xhr = function() {
		try {
			return new e.XMLHttpRequest
		} catch (e) {}
	};
	var Vt = {
			0: 200,
			1223: 204
		},
		Gt = w.ajaxSettings.xhr();
	h.cors = !!Gt && "withCredentials" in Gt, h.ajax = Gt = !!Gt, w.ajaxTransport(function(t) {
		var n, r;
		if (h.cors || Gt && !t.crossDomain) return {
			send: function(i, o) {
				var a, s = t.xhr();
				if (s.open(t.type, t.url, t.async, t.username, t.password), t.xhrFields)
					for (a in t.xhrFields) s[a] = t.xhrFields[a];
				t.mimeType && s.overrideMimeType && s.overrideMimeType(t.mimeType), t.crossDomain || i["X-Requested-With"] || (i["X-Requested-With"] = "XMLHttpRequest");
				for (a in i) s.setRequestHeader(a, i[a]);
				n = function(e) {
					return function() {
						n && (n = r = s.onload = s.onerror = s.onabort = s.ontimeout = s.onreadystatechange = null, "abort" === e ? s.abort() : "error" === e ? "number" != typeof s.status ? o(0, "error") : o(s.status, s.statusText) : o(Vt[s.status] || s.status, s.statusText, "text" !== (s.responseType || "text") || "string" != typeof s.responseText ? {
							binary: s.response
						} : {
							text: s.responseText
						}, s.getAllResponseHeaders()))
					}
				}, s.onload = n(), r = s.onerror = s.ontimeout = n("error"), void 0 !== s.onabort ? s.onabort = r : s.onreadystatechange = function() {
					4 === s.readyState && e.setTimeout(function() {
						n && r()
					})
				}, n = n("abort");
				try {
					s.send(t.hasContent && t.data || null)
				} catch (e) {
					if (n) throw e
				}
			},
			abort: function() {
				n && n()
			}
		}
	}), w.ajaxPrefilter(function(e) {
		e.crossDomain && (e.contents.script = !1)
	}), w.ajaxSetup({
		accepts: {
			script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
		},
		contents: {
			script: /\b(?:java|ecma)script\b/
		},
		converters: {
			"text script": function(e) {
				return w.globalEval(e), e
			}
		}
	}), w.ajaxPrefilter("script", function(e) {
		void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET")
	}), w.ajaxTransport("script", function(e) {
		if (e.crossDomain) {
			var t, n;
			return {
				send: function(i, o) {
					t = w("<script>").prop({
						charset: e.scriptCharset,
						src: e.url
					}).on("load error", n = function(e) {
						t.remove(), n = null, e && o("error" === e.type ? 404 : 200, e.type)
					}), r.head.appendChild(t[0])
				},
				abort: function() {
					n && n()
				}
			}
		}
	});
	var Yt = [],
		Qt = /(=)\?(?=&|$)|\?\?/;
	w.ajaxSetup({
		jsonp: "callback",
		jsonpCallback: function() {
			var e = Yt.pop() || w.expando + "_" + Et++;
			return this[e] = !0, e
		}
	}), w.ajaxPrefilter("json jsonp", function(t, n, r) {
		var i, o, a, s = !1 !== t.jsonp && (Qt.test(t.url) ? "url" : "string" == typeof t.data && 0 === (t.contentType || "").indexOf("application/x-www-form-urlencoded") && Qt.test(t.data) && "data");
		if (s || "jsonp" === t.dataTypes[0]) return i = t.jsonpCallback = g(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback, s ? t[s] = t[s].replace(Qt, "$1" + i) : !1 !== t.jsonp && (t.url += (kt.test(t.url) ? "&" : "?") + t.jsonp + "=" + i), t.converters["script json"] = function() {
			return a || w.error(i + " was not called"), a[0]
		}, t.dataTypes[0] = "json", o = e[i], e[i] = function() {
			a = arguments
		}, r.always(function() {
			void 0 === o ? w(e).removeProp(i) : e[i] = o, t[i] && (t.jsonpCallback = n.jsonpCallback, Yt.push(i)), a && g(o) && o(a[0]), a = o = void 0
		}), "script"
	}), h.createHTMLDocument = function() {
		var e = r.implementation.createHTMLDocument("").body;
		return e.innerHTML = "<form></form><form></form>", 2 === e.childNodes.length
	}(), w.parseHTML = function(e, t, n) {
		if ("string" != typeof e) return [];
		"boolean" == typeof t && (n = t, t = !1);
		var i, o, a;
		return t || (h.createHTMLDocument ? ((i = (t = r.implementation.createHTMLDocument("")).createElement("base")).href = r.location.href, t.head.appendChild(i)) : t = r), o = A.exec(e), a = !n && [], o ? [t.createElement(o[1])] : (o = xe([e], t, a), a && a.length && w(a).remove(), w.merge([], o.childNodes))
	}, w.fn.load = function(e, t, n) {
		var r, i, o, a = this,
			s = e.indexOf(" ");
		return s > -1 && (r = vt(e.slice(s)), e = e.slice(0, s)), g(t) ? (n = t, t = void 0) : t && "object" == typeof t && (i = "POST"), a.length > 0 && w.ajax({
			url: e,
			type: i || "GET",
			dataType: "html",
			data: t
		}).done(function(e) {
			o = arguments, a.html(r ? w("<div>").append(w.parseHTML(e)).find(r) : e)
		}).always(n && function(e, t) {
			a.each(function() {
				n.apply(this, o || [e.responseText, t, e])
			})
		}), this
	}, w.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(e, t) {
		w.fn[t] = function(e) {
			return this.on(t, e)
		}
	}), w.expr.pseudos.animated = function(e) {
		return w.grep(w.timers, function(t) {
			return e === t.elem
		}).length
	}, w.offset = {
		setOffset: function(e, t, n) {
			var r, i, o, a, s, u, l, c = w.css(e, "position"),
				f = w(e),
				p = {};
			"static" === c && (e.style.position = "relative"), s = f.offset(), o = w.css(e, "top"), u = w.css(e, "left"), (l = ("absolute" === c || "fixed" === c) && (o + u).indexOf("auto") > -1) ? (a = (r = f.position()).top, i = r.left) : (a = parseFloat(o) || 0, i = parseFloat(u) || 0), g(t) && (t = t.call(e, n, w.extend({}, s))), null != t.top && (p.top = t.top - s.top + a), null != t.left && (p.left = t.left - s.left + i), "using" in t ? t.using.call(e, p) : f.css(p)
		}
	}, w.fn.extend({
		offset: function(e) {
			if (arguments.length) return void 0 === e ? this : this.each(function(t) {
				w.offset.setOffset(this, e, t)
			});
			var t, n, r = this[0];
			if (r) return r.getClientRects().length ? (t = r.getBoundingClientRect(), n = r.ownerDocument.defaultView, {
				top: t.top + n.pageYOffset,
				left: t.left + n.pageXOffset
			}) : {
				top: 0,
				left: 0
			}
		},
		position: function() {
			if (this[0]) {
				var e, t, n, r = this[0],
					i = {
						top: 0,
						left: 0
					};
				if ("fixed" === w.css(r, "position")) t = r.getBoundingClientRect();
				else {
					t = this.offset(), n = r.ownerDocument, e = r.offsetParent || n.documentElement;
					while (e && (e === n.body || e === n.documentElement) && "static" === w.css(e, "position")) e = e.parentNode;
					e && e !== r && 1 === e.nodeType && ((i = w(e).offset()).top += w.css(e, "borderTopWidth", !0), i.left += w.css(e, "borderLeftWidth", !0))
				}
				return {
					top: t.top - i.top - w.css(r, "marginTop", !0),
					left: t.left - i.left - w.css(r, "marginLeft", !0)
				}
			}
		},
		offsetParent: function() {
			return this.map(function() {
				var e = this.offsetParent;
				while (e && "static" === w.css(e, "position")) e = e.offsetParent;
				return e || be
			})
		}
	}), w.each({
		scrollLeft: "pageXOffset",
		scrollTop: "pageYOffset"
	}, function(e, t) {
		var n = "pageYOffset" === t;
		w.fn[e] = function(r) {
			return z(this, function(e, r, i) {
				var o;
				if (y(e) ? o = e : 9 === e.nodeType && (o = e.defaultView), void 0 === i) return o ? o[t] : e[r];
				o ? o.scrollTo(n ? o.pageXOffset : i, n ? i : o.pageYOffset) : e[r] = i
			}, e, r, arguments.length)
		}
	}), w.each(["top", "left"], function(e, t) {
		w.cssHooks[t] = _e(h.pixelPosition, function(e, n) {
			if (n) return n = Fe(e, t), We.test(n) ? w(e).position()[t] + "px" : n
		})
	}), w.each({
		Height: "height",
		Width: "width"
	}, function(e, t) {
		w.each({
			padding: "inner" + e,
			content: t,
			"": "outer" + e
		}, function(n, r) {
			w.fn[r] = function(i, o) {
				var a = arguments.length && (n || "boolean" != typeof i),
					s = n || (!0 === i || !0 === o ? "margin" : "border");
				return z(this, function(t, n, i) {
					var o;
					return y(t) ? 0 === r.indexOf("outer") ? t["inner" + e] : t.document.documentElement["client" + e] : 9 === t.nodeType ? (o = t.documentElement, Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e])) : void 0 === i ? w.css(t, n, s) : w.style(t, n, i, s)
				}, t, a ? i : void 0, a)
			}
		})
	}), w.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function(e, t) {
		w.fn[t] = function(e, n) {
			return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
		}
	}), w.fn.extend({
		hover: function(e, t) {
			return this.mouseenter(e).mouseleave(t || e)
		}
	}), w.fn.extend({
		bind: function(e, t, n) {
			return this.on(e, null, t, n)
		},
		unbind: function(e, t) {
			return this.off(e, null, t)
		},
		delegate: function(e, t, n, r) {
			return this.on(t, e, n, r)
		},
		undelegate: function(e, t, n) {
			return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
		}
	}), w.proxy = function(e, t) {
		var n, r, i;
		if ("string" == typeof t && (n = e[t], t = e, e = n), g(e)) return r = o.call(arguments, 2), i = function() {
			return e.apply(t || this, r.concat(o.call(arguments)))
		}, i.guid = e.guid = e.guid || w.guid++, i
	}, w.holdReady = function(e) {
		e ? w.readyWait++ : w.ready(!0)
	}, w.isArray = Array.isArray, w.parseJSON = JSON.parse, w.nodeName = N, w.isFunction = g, w.isWindow = y, w.camelCase = G, w.type = x, w.now = Date.now, w.isNumeric = function(e) {
		var t = w.type(e);
		return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
	}, "function" == typeof define && define.amd && define("jquery", [], function() {
		return w
	});
	var Jt = e.jQuery,
		Kt = e.$;
	return w.noConflict = function(t) {
		return e.$ === w && (e.$ = Kt), t && e.jQuery === w && (e.jQuery = Jt), w
	}, t || (e.jQuery = e.$ = w), w
});

(function(e, t) {
	'object' == typeof exports && 'undefined' != typeof module ? module.exports = t() : 'function' == typeof define && define.amd ? define(t) : e.Popper = t()
})(this, function() {
	'use strict';

	function e(e) {
		return e && '[object Function]' === {}.toString.call(e)
	}

	function t(e, t) {
		if (1 !== e.nodeType) return [];
		var o = getComputedStyle(e, null);
		return t ? o[t] : o
	}

	function o(e) {
		return 'HTML' === e.nodeName ? e : e.parentNode || e.host
	}

	function n(e) {
		if (!e) return document.body;
		switch (e.nodeName) {
			case 'HTML':
			case 'BODY':
				return e.ownerDocument.body;
			case '#document':
				return e.body;
		}
		var i = t(e),
			r = i.overflow,
			p = i.overflowX,
			s = i.overflowY;
		return /(auto|scroll)/.test(r + s + p) ? e : n(o(e))
	}

	function r(e) {
		var o = e && e.offsetParent,
			i = o && o.nodeName;
		return i && 'BODY' !== i && 'HTML' !== i ? -1 !== ['TD', 'TABLE'].indexOf(o.nodeName) && 'static' === t(o, 'position') ? r(o) : o : e ? e.ownerDocument.documentElement : document.documentElement
	}

	function p(e) {
		var t = e.nodeName;
		return 'BODY' !== t && ('HTML' === t || r(e.firstElementChild) === e)
	}

	function s(e) {
		return null === e.parentNode ? e : s(e.parentNode)
	}

	function d(e, t) {
		if (!e || !e.nodeType || !t || !t.nodeType) return document.documentElement;
		var o = e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING,
			i = o ? e : t,
			n = o ? t : e,
			a = document.createRange();
		a.setStart(i, 0), a.setEnd(n, 0);
		var l = a.commonAncestorContainer;
		if (e !== l && t !== l || i.contains(n)) return p(l) ? l : r(l);
		var f = s(e);
		return f.host ? d(f.host, t) : d(e, s(t).host)
	}

	function a(e) {
		var t = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : 'top',
			o = 'top' === t ? 'scrollTop' : 'scrollLeft',
			i = e.nodeName;
		if ('BODY' === i || 'HTML' === i) {
			var n = e.ownerDocument.documentElement,
				r = e.ownerDocument.scrollingElement || n;
			return r[o]
		}
		return e[o]
	}

	function l(e, t) {
		var o = 2 < arguments.length && void 0 !== arguments[2] && arguments[2],
			i = a(t, 'top'),
			n = a(t, 'left'),
			r = o ? -1 : 1;
		return e.top += i * r, e.bottom += i * r, e.left += n * r, e.right += n * r, e
	}

	function f(e, t) {
		var o = 'x' === t ? 'Left' : 'Top',
			i = 'Left' == o ? 'Right' : 'Bottom';
		return parseFloat(e['border' + o + 'Width'], 10) + parseFloat(e['border' + i + 'Width'], 10)
	}

	function m(e, t, o, i) {
		return J(t['offset' + e], t['scroll' + e], o['client' + e], o['offset' + e], o['scroll' + e], ie() ? o['offset' + e] + i['margin' + ('Height' === e ? 'Top' : 'Left')] + i['margin' + ('Height' === e ? 'Bottom' : 'Right')] : 0)
	}

	function h() {
		var e = document.body,
			t = document.documentElement,
			o = ie() && getComputedStyle(t);
		return {
			height: m('Height', e, t, o),
			width: m('Width', e, t, o)
		}
	}

	function c(e) {
		return se({}, e, {
			right: e.left + e.width,
			bottom: e.top + e.height
		})
	}

	function g(e) {
		var o = {};
		if (ie()) try {
			o = e.getBoundingClientRect();
			var i = a(e, 'top'),
				n = a(e, 'left');
			o.top += i, o.left += n, o.bottom += i, o.right += n
		} catch (e) {} else o = e.getBoundingClientRect();
		var r = {
				left: o.left,
				top: o.top,
				width: o.right - o.left,
				height: o.bottom - o.top
			},
			p = 'HTML' === e.nodeName ? h() : {},
			s = p.width || e.clientWidth || r.right - r.left,
			d = p.height || e.clientHeight || r.bottom - r.top,
			l = e.offsetWidth - s,
			m = e.offsetHeight - d;
		if (l || m) {
			var g = t(e);
			l -= f(g, 'x'), m -= f(g, 'y'), r.width -= l, r.height -= m
		}
		return c(r)
	}

	function u(e, o) {
		var i = ie(),
			r = 'HTML' === o.nodeName,
			p = g(e),
			s = g(o),
			d = n(e),
			a = t(o),
			f = parseFloat(a.borderTopWidth, 10),
			m = parseFloat(a.borderLeftWidth, 10),
			h = c({
				top: p.top - s.top - f,
				left: p.left - s.left - m,
				width: p.width,
				height: p.height
			});
		if (h.marginTop = 0, h.marginLeft = 0, !i && r) {
			var u = parseFloat(a.marginTop, 10),
				b = parseFloat(a.marginLeft, 10);
			h.top -= f - u, h.bottom -= f - u, h.left -= m - b, h.right -= m - b, h.marginTop = u, h.marginLeft = b
		}
		return (i ? o.contains(d) : o === d && 'BODY' !== d.nodeName) && (h = l(h, o)), h
	}

	function b(e) {
		var t = e.ownerDocument.documentElement,
			o = u(e, t),
			i = J(t.clientWidth, window.innerWidth || 0),
			n = J(t.clientHeight, window.innerHeight || 0),
			r = a(t),
			p = a(t, 'left'),
			s = {
				top: r - o.top + o.marginTop,
				left: p - o.left + o.marginLeft,
				width: i,
				height: n
			};
		return c(s)
	}

	function w(e) {
		var i = e.nodeName;
		return 'BODY' === i || 'HTML' === i ? !1 : 'fixed' === t(e, 'position') || w(o(e))
	}

	function y(e, t, i, r) {
		var p = {
				top: 0,
				left: 0
			},
			s = d(e, t);
		if ('viewport' === r) p = b(s);
		else {
			var a;
			'scrollParent' === r ? (a = n(o(t)), 'BODY' === a.nodeName && (a = e.ownerDocument.documentElement)) : 'window' === r ? a = e.ownerDocument.documentElement : a = r;
			var l = u(a, s);
			if ('HTML' === a.nodeName && !w(s)) {
				var f = h(),
					m = f.height,
					c = f.width;
				p.top += l.top - l.marginTop, p.bottom = m + l.top, p.left += l.left - l.marginLeft, p.right = c + l.left
			} else p = l
		}
		return p.left += i, p.top += i, p.right -= i, p.bottom -= i, p
	}

	function E(e) {
		var t = e.width,
			o = e.height;
		return t * o
	}

	function v(e, t, o, i, n) {
		var r = 5 < arguments.length && void 0 !== arguments[5] ? arguments[5] : 0;
		if (-1 === e.indexOf('auto')) return e;
		var p = y(o, i, r, n),
			s = {
				top: {
					width: p.width,
					height: t.top - p.top
				},
				right: {
					width: p.right - t.right,
					height: p.height
				},
				bottom: {
					width: p.width,
					height: p.bottom - t.bottom
				},
				left: {
					width: t.left - p.left,
					height: p.height
				}
			},
			d = Object.keys(s).map(function(e) {
				return se({
					key: e
				}, s[e], {
					area: E(s[e])
				})
			}).sort(function(e, t) {
				return t.area - e.area
			}),
			a = d.filter(function(e) {
				var t = e.width,
					i = e.height;
				return t >= o.clientWidth && i >= o.clientHeight
			}),
			l = 0 < a.length ? a[0].key : d[0].key,
			f = e.split('-')[1];
		return l + (f ? '-' + f : '')
	}

	function O(e, t, o) {
		var i = d(t, o);
		return u(o, i)
	}

	function L(e) {
		var t = getComputedStyle(e),
			o = parseFloat(t.marginTop) + parseFloat(t.marginBottom),
			i = parseFloat(t.marginLeft) + parseFloat(t.marginRight),
			n = {
				width: e.offsetWidth + i,
				height: e.offsetHeight + o
			};
		return n
	}

	function x(e) {
		var t = {
			left: 'right',
			right: 'left',
			bottom: 'top',
			top: 'bottom'
		};
		return e.replace(/left|right|bottom|top/g, function(e) {
			return t[e]
		})
	}

	function S(e, t, o) {
		o = o.split('-')[0];
		var i = L(e),
			n = {
				width: i.width,
				height: i.height
			},
			r = -1 !== ['right', 'left'].indexOf(o),
			p = r ? 'top' : 'left',
			s = r ? 'left' : 'top',
			d = r ? 'height' : 'width',
			a = r ? 'width' : 'height';
		return n[p] = t[p] + t[d] / 2 - i[d] / 2, n[s] = o === s ? t[s] - i[a] : t[x(s)], n
	}

	function T(e, t) {
		return Array.prototype.find ? e.find(t) : e.filter(t)[0]
	}

	function D(e, t, o) {
		if (Array.prototype.findIndex) return e.findIndex(function(e) {
			return e[t] === o
		});
		var i = T(e, function(e) {
			return e[t] === o
		});
		return e.indexOf(i)
	}

	function C(t, o, i) {
		var n = void 0 === i ? t : t.slice(0, D(t, 'name', i));
		return n.forEach(function(t) {
			t['function'] && console.warn('`modifier.function` is deprecated, use `modifier.fn`!');
			var i = t['function'] || t.fn;
			t.enabled && e(i) && (o.offsets.popper = c(o.offsets.popper), o.offsets.reference = c(o.offsets.reference), o = i(o, t))
		}), o
	}

	function N() {
		if (!this.state.isDestroyed) {
			var e = {
				instance: this,
				styles: {},
				arrowStyles: {},
				attributes: {},
				flipped: !1,
				offsets: {}
			};
			e.offsets.reference = O(this.state, this.popper, this.reference), e.placement = v(this.options.placement, e.offsets.reference, this.popper, this.reference, this.options.modifiers.flip.boundariesElement, this.options.modifiers.flip.padding), e.originalPlacement = e.placement, e.offsets.popper = S(this.popper, e.offsets.reference, e.placement), e.offsets.popper.position = 'absolute', e = C(this.modifiers, e), this.state.isCreated ? this.options.onUpdate(e) : (this.state.isCreated = !0, this.options.onCreate(e))
		}
	}

	function k(e, t) {
		return e.some(function(e) {
			var o = e.name,
				i = e.enabled;
			return i && o === t
		})
	}

	function W(e) {
		for (var t = [!1, 'ms', 'Webkit', 'Moz', 'O'], o = e.charAt(0).toUpperCase() + e.slice(1), n = 0; n < t.length - 1; n++) {
			var i = t[n],
				r = i ? '' + i + o : e;
			if ('undefined' != typeof document.body.style[r]) return r
		}
		return null
	}

	function P() {
		return this.state.isDestroyed = !0, k(this.modifiers, 'applyStyle') && (this.popper.removeAttribute('x-placement'), this.popper.style.left = '', this.popper.style.position = '', this.popper.style.top = '', this.popper.style[W('transform')] = ''), this.disableEventListeners(), this.options.removeOnDestroy && this.popper.parentNode.removeChild(this.popper), this
	}

	function B(e) {
		var t = e.ownerDocument;
		return t ? t.defaultView : window
	}

	function H(e, t, o, i) {
		var r = 'BODY' === e.nodeName,
			p = r ? e.ownerDocument.defaultView : e;
		p.addEventListener(t, o, {
			passive: !0
		}), r || H(n(p.parentNode), t, o, i), i.push(p)
	}

	function A(e, t, o, i) {
		o.updateBound = i, B(e).addEventListener('resize', o.updateBound, {
			passive: !0
		});
		var r = n(e);
		return H(r, 'scroll', o.updateBound, o.scrollParents), o.scrollElement = r, o.eventsEnabled = !0, o
	}

	function I() {
		this.state.eventsEnabled || (this.state = A(this.reference, this.options, this.state, this.scheduleUpdate))
	}

	function M(e, t) {
		return B(e).removeEventListener('resize', t.updateBound), t.scrollParents.forEach(function(e) {
			e.removeEventListener('scroll', t.updateBound)
		}), t.updateBound = null, t.scrollParents = [], t.scrollElement = null, t.eventsEnabled = !1, t
	}

	function R() {
		this.state.eventsEnabled && (cancelAnimationFrame(this.scheduleUpdate), this.state = M(this.reference, this.state))
	}

	function U(e) {
		return '' !== e && !isNaN(parseFloat(e)) && isFinite(e)
	}

	function Y(e, t) {
		Object.keys(t).forEach(function(o) {
			var i = ''; - 1 !== ['width', 'height', 'top', 'right', 'bottom', 'left'].indexOf(o) && U(t[o]) && (i = 'px'), e.style[o] = t[o] + i
		})
	}

	function j(e, t) {
		Object.keys(t).forEach(function(o) {
			var i = t[o];
			!1 === i ? e.removeAttribute(o) : e.setAttribute(o, t[o])
		})
	}

	function F(e, t, o) {
		var i = T(e, function(e) {
				var o = e.name;
				return o === t
			}),
			n = !!i && e.some(function(e) {
				return e.name === o && e.enabled && e.order < i.order
			});
		if (!n) {
			var r = '`' + t + '`';
			console.warn('`' + o + '`' + ' modifier is required by ' + r + ' modifier in order to work, be sure to include it before ' + r + '!')
		}
		return n
	}

	function K(e) {
		return 'end' === e ? 'start' : 'start' === e ? 'end' : e
	}

	function q(e) {
		var t = 1 < arguments.length && void 0 !== arguments[1] && arguments[1],
			o = ae.indexOf(e),
			i = ae.slice(o + 1).concat(ae.slice(0, o));
		return t ? i.reverse() : i
	}

	function V(e, t, o, i) {
		var n = e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
			r = +n[1],
			p = n[2];
		if (!r) return e;
		if (0 === p.indexOf('%')) {
			var s;
			switch (p) {
				case '%p':
					s = o;
					break;
				case '%':
				case '%r':
				default:
					s = i;
			}
			var d = c(s);
			return d[t] / 100 * r
		}
		if ('vh' === p || 'vw' === p) {
			var a;
			return a = 'vh' === p ? J(document.documentElement.clientHeight, window.innerHeight || 0) : J(document.documentElement.clientWidth, window.innerWidth || 0), a / 100 * r
		}
		return r
	}

	function z(e, t, o, i) {
		var n = [0, 0],
			r = -1 !== ['right', 'left'].indexOf(i),
			p = e.split(/(\+|\-)/).map(function(e) {
				return e.trim()
			}),
			s = p.indexOf(T(p, function(e) {
				return -1 !== e.search(/,|\s/)
			}));
		p[s] && -1 === p[s].indexOf(',') && console.warn('Offsets separated by white space(s) are deprecated, use a comma (,) instead.');
		var d = /\s*,\s*|\s+/,
			a = -1 === s ? [p] : [p.slice(0, s).concat([p[s].split(d)[0]]), [p[s].split(d)[1]].concat(p.slice(s + 1))];
		return a = a.map(function(e, i) {
			var n = (1 === i ? !r : r) ? 'height' : 'width',
				p = !1;
			return e.reduce(function(e, t) {
				return '' === e[e.length - 1] && -1 !== ['+', '-'].indexOf(t) ? (e[e.length - 1] = t, p = !0, e) : p ? (e[e.length - 1] += t, p = !1, e) : e.concat(t)
			}, []).map(function(e) {
				return V(e, n, t, o)
			})
		}), a.forEach(function(e, t) {
			e.forEach(function(o, i) {
				U(o) && (n[t] += o * ('-' === e[i - 1] ? -1 : 1))
			})
		}), n
	}

	function G(e, t) {
		var o, i = t.offset,
			n = e.placement,
			r = e.offsets,
			p = r.popper,
			s = r.reference,
			d = n.split('-')[0];
		return o = U(+i) ? [+i, 0] : z(i, p, s, d), 'left' === d ? (p.top += o[0], p.left -= o[1]) : 'right' === d ? (p.top += o[0], p.left += o[1]) : 'top' === d ? (p.left += o[0], p.top -= o[1]) : 'bottom' === d && (p.left += o[0], p.top += o[1]), e.popper = p, e
	}
	for (var _ = Math.min, X = Math.floor, J = Math.max, Q = 'undefined' != typeof window && 'undefined' != typeof document, Z = ['Edge', 'Trident', 'Firefox'], $ = 0, ee = 0; ee < Z.length; ee += 1)
		if (Q && 0 <= navigator.userAgent.indexOf(Z[ee])) {
			$ = 1;
			break
		} var i, te = Q && window.Promise,
		oe = te ? function(e) {
			var t = !1;
			return function() {
				t || (t = !0, window.Promise.resolve().then(function() {
					t = !1, e()
				}))
			}
		} : function(e) {
			var t = !1;
			return function() {
				t || (t = !0, setTimeout(function() {
					t = !1, e()
				}, $))
			}
		},
		ie = function() {
			return void 0 == i && (i = -1 !== navigator.appVersion.indexOf('MSIE 10')), i
		},
		ne = function(e, t) {
			if (!(e instanceof t)) throw new TypeError('Cannot call a class as a function')
		},
		re = function() {
			function e(e, t) {
				for (var o, n = 0; n < t.length; n++) o = t[n], o.enumerable = o.enumerable || !1, o.configurable = !0, 'value' in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
			}
			return function(t, o, i) {
				return o && e(t.prototype, o), i && e(t, i), t
			}
		}(),
		pe = function(e, t, o) {
			return t in e ? Object.defineProperty(e, t, {
				value: o,
				enumerable: !0,
				configurable: !0,
				writable: !0
			}) : e[t] = o, e
		},
		se = Object.assign || function(e) {
			for (var t, o = 1; o < arguments.length; o++)
				for (var i in t = arguments[o], t) Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
			return e
		},
		de = ['auto-start', 'auto', 'auto-end', 'top-start', 'top', 'top-end', 'right-start', 'right', 'right-end', 'bottom-end', 'bottom', 'bottom-start', 'left-end', 'left', 'left-start'],
		ae = de.slice(3),
		le = {
			FLIP: 'flip',
			CLOCKWISE: 'clockwise',
			COUNTERCLOCKWISE: 'counterclockwise'
		},
		fe = function() {
			function t(o, i) {
				var n = this,
					r = 2 < arguments.length && void 0 !== arguments[2] ? arguments[2] : {};
				ne(this, t), this.scheduleUpdate = function() {
					return requestAnimationFrame(n.update)
				}, this.update = oe(this.update.bind(this)), this.options = se({}, t.Defaults, r), this.state = {
					isDestroyed: !1,
					isCreated: !1,
					scrollParents: []
				}, this.reference = o && o.jquery ? o[0] : o, this.popper = i && i.jquery ? i[0] : i, this.options.modifiers = {}, Object.keys(se({}, t.Defaults.modifiers, r.modifiers)).forEach(function(e) {
					n.options.modifiers[e] = se({}, t.Defaults.modifiers[e] || {}, r.modifiers ? r.modifiers[e] : {})
				}), this.modifiers = Object.keys(this.options.modifiers).map(function(e) {
					return se({
						name: e
					}, n.options.modifiers[e])
				}).sort(function(e, t) {
					return e.order - t.order
				}), this.modifiers.forEach(function(t) {
					t.enabled && e(t.onLoad) && t.onLoad(n.reference, n.popper, n.options, t, n.state)
				}), this.update();
				var p = this.options.eventsEnabled;
				p && this.enableEventListeners(), this.state.eventsEnabled = p
			}
			return re(t, [{
				key: 'update',
				value: function() {
					return N.call(this)
				}
			}, {
				key: 'destroy',
				value: function() {
					return P.call(this)
				}
			}, {
				key: 'enableEventListeners',
				value: function() {
					return I.call(this)
				}
			}, {
				key: 'disableEventListeners',
				value: function() {
					return R.call(this)
				}
			}]), t
		}();
	return fe.Utils = ('undefined' == typeof window ? global : window).PopperUtils, fe.placements = de, fe.Defaults = {
		placement: 'bottom',
		eventsEnabled: !0,
		removeOnDestroy: !1,
		onCreate: function() {},
		onUpdate: function() {},
		modifiers: {
			shift: {
				order: 100,
				enabled: !0,
				fn: function(e) {
					var t = e.placement,
						o = t.split('-')[0],
						i = t.split('-')[1];
					if (i) {
						var n = e.offsets,
							r = n.reference,
							p = n.popper,
							s = -1 !== ['bottom', 'top'].indexOf(o),
							d = s ? 'left' : 'top',
							a = s ? 'width' : 'height',
							l = {
								start: pe({}, d, r[d]),
								end: pe({}, d, r[d] + r[a] - p[a])
							};
						e.offsets.popper = se({}, p, l[i])
					}
					return e
				}
			},
			offset: {
				order: 200,
				enabled: !0,
				fn: G,
				offset: 0
			},
			preventOverflow: {
				order: 300,
				enabled: !0,
				fn: function(e, t) {
					var o = t.boundariesElement || r(e.instance.popper);
					e.instance.reference === o && (o = r(o));
					var i = y(e.instance.popper, e.instance.reference, t.padding, o);
					t.boundaries = i;
					var n = t.priority,
						p = e.offsets.popper,
						s = {
							primary: function(e) {
								var o = p[e];
								return p[e] < i[e] && !t.escapeWithReference && (o = J(p[e], i[e])), pe({}, e, o)
							},
							secondary: function(e) {
								var o = 'right' === e ? 'left' : 'top',
									n = p[o];
								return p[e] > i[e] && !t.escapeWithReference && (n = _(p[o], i[e] - ('right' === e ? p.width : p.height))), pe({}, o, n)
							}
						};
					return n.forEach(function(e) {
						var t = -1 === ['left', 'top'].indexOf(e) ? 'secondary' : 'primary';
						p = se({}, p, s[t](e))
					}), e.offsets.popper = p, e
				},
				priority: ['left', 'right', 'top', 'bottom'],
				padding: 5,
				boundariesElement: 'scrollParent'
			},
			keepTogether: {
				order: 400,
				enabled: !0,
				fn: function(e) {
					var t = e.offsets,
						o = t.popper,
						i = t.reference,
						n = e.placement.split('-')[0],
						r = X,
						p = -1 !== ['top', 'bottom'].indexOf(n),
						s = p ? 'right' : 'bottom',
						d = p ? 'left' : 'top',
						a = p ? 'width' : 'height';
					return o[s] < r(i[d]) && (e.offsets.popper[d] = r(i[d]) - o[a]), o[d] > r(i[s]) && (e.offsets.popper[d] = r(i[s])), e
				}
			},
			arrow: {
				order: 500,
				enabled: !0,
				fn: function(e, o) {
					var i;
					if (!F(e.instance.modifiers, 'arrow', 'keepTogether')) return e;
					var n = o.element;
					if ('string' == typeof n) {
						if (n = e.instance.popper.querySelector(n), !n) return e;
					} else if (!e.instance.popper.contains(n)) return console.warn('WARNING: `arrow.element` must be child of its popper element!'), e;
					var r = e.placement.split('-')[0],
						p = e.offsets,
						s = p.popper,
						d = p.reference,
						a = -1 !== ['left', 'right'].indexOf(r),
						l = a ? 'height' : 'width',
						f = a ? 'Top' : 'Left',
						m = f.toLowerCase(),
						h = a ? 'left' : 'top',
						g = a ? 'bottom' : 'right',
						u = L(n)[l];
					d[g] - u < s[m] && (e.offsets.popper[m] -= s[m] - (d[g] - u)), d[m] + u > s[g] && (e.offsets.popper[m] += d[m] + u - s[g]), e.offsets.popper = c(e.offsets.popper);
					var b = d[m] + d[l] / 2 - u / 2,
						w = t(e.instance.popper),
						y = parseFloat(w['margin' + f], 10),
						E = parseFloat(w['border' + f + 'Width'], 10),
						v = b - e.offsets.popper[m] - y - E;
					return v = J(_(s[l] - u, v), 0), e.arrowElement = n, e.offsets.arrow = (i = {}, pe(i, m, Math.round(v)), pe(i, h, ''), i), e
				},
				element: '[x-arrow]'
			},
			flip: {
				order: 600,
				enabled: !0,
				fn: function(e, t) {
					if (k(e.instance.modifiers, 'inner')) return e;
					if (e.flipped && e.placement === e.originalPlacement) return e;
					var o = y(e.instance.popper, e.instance.reference, t.padding, t.boundariesElement),
						i = e.placement.split('-')[0],
						n = x(i),
						r = e.placement.split('-')[1] || '',
						p = [];
					switch (t.behavior) {
						case le.FLIP:
							p = [i, n];
							break;
						case le.CLOCKWISE:
							p = q(i);
							break;
						case le.COUNTERCLOCKWISE:
							p = q(i, !0);
							break;
						default:
							p = t.behavior;
					}
					return p.forEach(function(s, d) {
						if (i !== s || p.length === d + 1) return e;
						i = e.placement.split('-')[0], n = x(i);
						var a = e.offsets.popper,
							l = e.offsets.reference,
							f = X,
							m = 'left' === i && f(a.right) > f(l.left) || 'right' === i && f(a.left) < f(l.right) || 'top' === i && f(a.bottom) > f(l.top) || 'bottom' === i && f(a.top) < f(l.bottom),
							h = f(a.left) < f(o.left),
							c = f(a.right) > f(o.right),
							g = f(a.top) < f(o.top),
							u = f(a.bottom) > f(o.bottom),
							b = 'left' === i && h || 'right' === i && c || 'top' === i && g || 'bottom' === i && u,
							w = -1 !== ['top', 'bottom'].indexOf(i),
							y = !!t.flipVariations && (w && 'start' === r && h || w && 'end' === r && c || !w && 'start' === r && g || !w && 'end' === r && u);
						(m || b || y) && (e.flipped = !0, (m || b) && (i = p[d + 1]), y && (r = K(r)), e.placement = i + (r ? '-' + r : ''), e.offsets.popper = se({}, e.offsets.popper, S(e.instance.popper, e.offsets.reference, e.placement)), e = C(e.instance.modifiers, e, 'flip'))
					}), e
				},
				behavior: 'flip',
				padding: 5,
				boundariesElement: 'viewport'
			},
			inner: {
				order: 700,
				enabled: !1,
				fn: function(e) {
					var t = e.placement,
						o = t.split('-')[0],
						i = e.offsets,
						n = i.popper,
						r = i.reference,
						p = -1 !== ['left', 'right'].indexOf(o),
						s = -1 === ['top', 'left'].indexOf(o);
					return n[p ? 'left' : 'top'] = r[o] - (s ? n[p ? 'width' : 'height'] : 0), e.placement = x(t), e.offsets.popper = c(n), e
				}
			},
			hide: {
				order: 800,
				enabled: !0,
				fn: function(e) {
					if (!F(e.instance.modifiers, 'hide', 'preventOverflow')) return e;
					var t = e.offsets.reference,
						o = T(e.instance.modifiers, function(e) {
							return 'preventOverflow' === e.name
						}).boundaries;
					if (t.bottom < o.top || t.left > o.right || t.top > o.bottom || t.right < o.left) {
						if (!0 === e.hide) return e;
						e.hide = !0, e.attributes['x-out-of-boundaries'] = ''
					} else {
						if (!1 === e.hide) return e;
						e.hide = !1, e.attributes['x-out-of-boundaries'] = !1
					}
					return e
				}
			},
			computeStyle: {
				order: 850,
				enabled: !0,
				fn: function(e, t) {
					var o = t.x,
						i = t.y,
						n = e.offsets.popper,
						p = T(e.instance.modifiers, function(e) {
							return 'applyStyle' === e.name
						}).gpuAcceleration;
					void 0 !== p && console.warn('WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!');
					var s, d, a = void 0 === p ? t.gpuAcceleration : p,
						l = r(e.instance.popper),
						f = g(l),
						m = {
							position: n.position
						},
						h = {
							left: X(n.left),
							top: X(n.top),
							bottom: X(n.bottom),
							right: X(n.right)
						},
						c = 'bottom' === o ? 'top' : 'bottom',
						u = 'right' === i ? 'left' : 'right',
						b = W('transform');
					if (d = 'bottom' == c ? -f.height + h.bottom : h.top, s = 'right' == u ? -f.width + h.right : h.left, a && b) m[b] = 'translate3d(' + s + 'px, ' + d + 'px, 0)', m[c] = 0, m[u] = 0, m.willChange = 'transform';
					else {
						var w = 'bottom' == c ? -1 : 1,
							y = 'right' == u ? -1 : 1;
						m[c] = d * w, m[u] = s * y, m.willChange = c + ', ' + u
					}
					var E = {
						"x-placement": e.placement
					};
					return e.attributes = se({}, E, e.attributes), e.styles = se({}, m, e.styles), e.arrowStyles = se({}, e.offsets.arrow, e.arrowStyles), e
				},
				gpuAcceleration: !0,
				x: 'bottom',
				y: 'right'
			},
			applyStyle: {
				order: 900,
				enabled: !0,
				fn: function(e) {
					return Y(e.instance.popper, e.styles), j(e.instance.popper, e.attributes), e.arrowElement && Object.keys(e.arrowStyles).length && Y(e.arrowElement, e.arrowStyles), e
				},
				onLoad: function(e, t, o, i, n) {
					var r = O(n, t, e),
						p = v(o.placement, r, t, e, o.modifiers.flip.boundariesElement, o.modifiers.flip.padding);
					return t.setAttribute('x-placement', p), Y(t, {
						position: 'absolute'
					}), o
				},
				gpuAcceleration: void 0
			}
		}
	}, fe
});

/*!
 * Bootstrap v4.1.3 (https://getbootstrap.com/)
 * Copyright 2011-2018 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
! function(t, e) {
	"object" == typeof exports && "undefined" != typeof module ? e(exports, require("jquery"), require("popper.js")) : "function" == typeof define && define.amd ? define(["exports", "jquery", "popper.js"], e) : e(t.bootstrap = {}, t.jQuery, t.Popper)
}(this, function(t, e, h) {
	"use strict";

	function i(t, e) {
		for (var n = 0; n < e.length; n++) {
			var i = e[n];
			i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i)
		}
	}

	function s(t, e, n) {
		return e && i(t.prototype, e), n && i(t, n), t
	}

	function l(r) {
		for (var t = 1; t < arguments.length; t++) {
			var o = null != arguments[t] ? arguments[t] : {},
				e = Object.keys(o);
			"function" == typeof Object.getOwnPropertySymbols && (e = e.concat(Object.getOwnPropertySymbols(o).filter(function(t) {
				return Object.getOwnPropertyDescriptor(o, t).enumerable
			}))), e.forEach(function(t) {
				var e, n, i;
				e = r, i = o[n = t], n in e ? Object.defineProperty(e, n, {
					value: i,
					enumerable: !0,
					configurable: !0,
					writable: !0
				}) : e[n] = i
			})
		}
		return r
	}
	e = e && e.hasOwnProperty("default") ? e.default : e, h = h && h.hasOwnProperty("default") ? h.default : h;
	var r, n, o, a, c, u, f, d, g, _, m, p, v, y, E, C, T, b, S, I, A, D, w, N, O, k, P, j, H, L, R, x, W, U, q, F, K, M, Q, B, V, Y, z, J, Z, G, $, X, tt, et, nt, it, rt, ot, st, at, lt, ct, ht, ut, ft, dt, gt, _t, mt, pt, vt, yt, Et, Ct, Tt, bt, St, It, At, Dt, wt, Nt, Ot, kt, Pt, jt, Ht, Lt, Rt, xt, Wt, Ut, qt, Ft, Kt, Mt, Qt, Bt, Vt, Yt, zt, Jt, Zt, Gt, $t, Xt, te, ee, ne, ie, re, oe, se, ae, le, ce, he, ue, fe, de, ge, _e, me, pe, ve, ye, Ee, Ce, Te, be, Se, Ie, Ae, De, we, Ne, Oe, ke, Pe, je, He, Le, Re, xe, We, Ue, qe, Fe, Ke, Me, Qe, Be, Ve, Ye, ze, Je, Ze, Ge, $e, Xe, tn, en, nn, rn, on, sn, an, ln, cn, hn, un, fn, dn, gn, _n, mn, pn, vn, yn, En, Cn, Tn, bn, Sn, In, An, Dn, wn, Nn, On, kn, Pn, jn, Hn, Ln, Rn, xn, Wn, Un, qn, Fn = function(i) {
			var e = "transitionend";

			function t(t) {
				var e = this,
					n = !1;
				return i(this).one(l.TRANSITION_END, function() {
					n = !0
				}), setTimeout(function() {
					n || l.triggerTransitionEnd(e)
				}, t), this
			}
			var l = {
				TRANSITION_END: "bsTransitionEnd",
				getUID: function(t) {
					for (; t += ~~(1e6 * Math.random()), document.getElementById(t););
					return t
				},
				getSelectorFromElement: function(t) {
					var e = t.getAttribute("data-target");
					e && "#" !== e || (e = t.getAttribute("href") || "");
					try {
						return document.querySelector(e) ? e : null
					} catch (t) {
						return null
					}
				},
				getTransitionDurationFromElement: function(t) {
					if (!t) return 0;
					var e = i(t).css("transition-duration");
					return parseFloat(e) ? (e = e.split(",")[0], 1e3 * parseFloat(e)) : 0
				},
				reflow: function(t) {
					return t.offsetHeight
				},
				triggerTransitionEnd: function(t) {
					i(t).trigger(e)
				},
				supportsTransitionEnd: function() {
					return Boolean(e)
				},
				isElement: function(t) {
					return (t[0] || t).nodeType
				},
				typeCheckConfig: function(t, e, n) {
					for (var i in n)
						if (Object.prototype.hasOwnProperty.call(n, i)) {
							var r = n[i],
								o = e[i],
								s = o && l.isElement(o) ? "element" : (a = o, {}.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase());
							if (!new RegExp(r).test(s)) throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + s + '" but expected type "' + r + '".')
						} var a
				}
			};
			return i.fn.emulateTransitionEnd = t, i.event.special[l.TRANSITION_END] = {
				bindType: e,
				delegateType: e,
				handle: function(t) {
					if (i(t.target).is(this)) return t.handleObj.handler.apply(this, arguments)
				}
			}, l
		}(e),
		Kn = (n = "alert", a = "." + (o = "bs.alert"), c = (r = e).fn[n], u = {
			CLOSE: "close" + a,
			CLOSED: "closed" + a,
			CLICK_DATA_API: "click" + a + ".data-api"
		}, f = "alert", d = "fade", g = "show", _ = function() {
			function i(t) {
				this._element = t
			}
			var t = i.prototype;
			return t.close = function(t) {
				var e = this._element;
				t && (e = this._getRootElement(t)), this._triggerCloseEvent(e).isDefaultPrevented() || this._removeElement(e)
			}, t.dispose = function() {
				r.removeData(this._element, o), this._element = null
			}, t._getRootElement = function(t) {
				var e = Fn.getSelectorFromElement(t),
					n = !1;
				return e && (n = document.querySelector(e)), n || (n = r(t).closest("." + f)[0]), n
			}, t._triggerCloseEvent = function(t) {
				var e = r.Event(u.CLOSE);
				return r(t).trigger(e), e
			}, t._removeElement = function(e) {
				var n = this;
				if (r(e).removeClass(g), r(e).hasClass(d)) {
					var t = Fn.getTransitionDurationFromElement(e);
					r(e).one(Fn.TRANSITION_END, function(t) {
						return n._destroyElement(e, t)
					}).emulateTransitionEnd(t)
				} else this._destroyElement(e)
			}, t._destroyElement = function(t) {
				r(t).detach().trigger(u.CLOSED).remove()
			}, i._jQueryInterface = function(n) {
				return this.each(function() {
					var t = r(this),
						e = t.data(o);
					e || (e = new i(this), t.data(o, e)), "close" === n && e[n](this)
				})
			}, i._handleDismiss = function(e) {
				return function(t) {
					t && t.preventDefault(), e.close(this)
				}
			}, s(i, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}]), i
		}(), r(document).on(u.CLICK_DATA_API, '[data-dismiss="alert"]', _._handleDismiss(new _)), r.fn[n] = _._jQueryInterface, r.fn[n].Constructor = _, r.fn[n].noConflict = function() {
			return r.fn[n] = c, _._jQueryInterface
		}, _),
		Mn = (p = "button", y = "." + (v = "bs.button"), E = ".data-api", C = (m = e).fn[p], T = "active", b = "btn", I = '[data-toggle^="button"]', A = '[data-toggle="buttons"]', D = "input", w = ".active", N = ".btn", O = {
			CLICK_DATA_API: "click" + y + E,
			FOCUS_BLUR_DATA_API: (S = "focus") + y + E + " blur" + y + E
		}, k = function() {
			function n(t) {
				this._element = t
			}
			var t = n.prototype;
			return t.toggle = function() {
				var t = !0,
					e = !0,
					n = m(this._element).closest(A)[0];
				if (n) {
					var i = this._element.querySelector(D);
					if (i) {
						if ("radio" === i.type)
							if (i.checked && this._element.classList.contains(T)) t = !1;
							else {
								var r = n.querySelector(w);
								r && m(r).removeClass(T)
							} if (t) {
							if (i.hasAttribute("disabled") || n.hasAttribute("disabled") || i.classList.contains("disabled") || n.classList.contains("disabled")) return;
							i.checked = !this._element.classList.contains(T), m(i).trigger("change")
						}
						i.focus(), e = !1
					}
				}
				e && this._element.setAttribute("aria-pressed", !this._element.classList.contains(T)), t && m(this._element).toggleClass(T)
			}, t.dispose = function() {
				m.removeData(this._element, v), this._element = null
			}, n._jQueryInterface = function(e) {
				return this.each(function() {
					var t = m(this).data(v);
					t || (t = new n(this), m(this).data(v, t)), "toggle" === e && t[e]()
				})
			}, s(n, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}]), n
		}(), m(document).on(O.CLICK_DATA_API, I, function(t) {
			t.preventDefault();
			var e = t.target;
			m(e).hasClass(b) || (e = m(e).closest(N)), k._jQueryInterface.call(m(e), "toggle")
		}).on(O.FOCUS_BLUR_DATA_API, I, function(t) {
			var e = m(t.target).closest(N)[0];
			m(e).toggleClass(S, /^focus(in)?$/.test(t.type))
		}), m.fn[p] = k._jQueryInterface, m.fn[p].Constructor = k, m.fn[p].noConflict = function() {
			return m.fn[p] = C, k._jQueryInterface
		}, k),
		Qn = (j = "carousel", L = "." + (H = "bs.carousel"), R = ".data-api", x = (P = e).fn[j], W = {
			interval: 5e3,
			keyboard: !0,
			slide: !1,
			pause: "hover",
			wrap: !0
		}, U = {
			interval: "(number|boolean)",
			keyboard: "boolean",
			slide: "(boolean|string)",
			pause: "(string|boolean)",
			wrap: "boolean"
		}, q = "next", F = "prev", K = "left", M = "right", Q = {
			SLIDE: "slide" + L,
			SLID: "slid" + L,
			KEYDOWN: "keydown" + L,
			MOUSEENTER: "mouseenter" + L,
			MOUSELEAVE: "mouseleave" + L,
			TOUCHEND: "touchend" + L,
			LOAD_DATA_API: "load" + L + R,
			CLICK_DATA_API: "click" + L + R
		}, B = "carousel", V = "active", Y = "slide", z = "carousel-item-right", J = "carousel-item-left", Z = "carousel-item-next", G = "carousel-item-prev", $ = ".active", X = ".active.carousel-item", tt = ".carousel-item", et = ".carousel-item-next, .carousel-item-prev", nt = ".carousel-indicators", it = "[data-slide], [data-slide-to]", rt = '[data-ride="carousel"]', ot = function() {
			function o(t, e) {
				this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this._config = this._getConfig(e), this._element = P(t)[0], this._indicatorsElement = this._element.querySelector(nt), this._addEventListeners()
			}
			var t = o.prototype;
			return t.next = function() {
				this._isSliding || this._slide(q)
			}, t.nextWhenVisible = function() {
				!document.hidden && P(this._element).is(":visible") && "hidden" !== P(this._element).css("visibility") && this.next()
			}, t.prev = function() {
				this._isSliding || this._slide(F)
			}, t.pause = function(t) {
				t || (this._isPaused = !0), this._element.querySelector(et) && (Fn.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null
			}, t.cycle = function(t) {
				t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval))
			}, t.to = function(t) {
				var e = this;
				this._activeElement = this._element.querySelector(X);
				var n = this._getItemIndex(this._activeElement);
				if (!(t > this._items.length - 1 || t < 0))
					if (this._isSliding) P(this._element).one(Q.SLID, function() {
						return e.to(t)
					});
					else {
						if (n === t) return this.pause(), void this.cycle();
						var i = n < t ? q : F;
						this._slide(i, this._items[t])
					}
			}, t.dispose = function() {
				P(this._element).off(L), P.removeData(this._element, H), this._items = null, this._config = null, this._element = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null
			}, t._getConfig = function(t) {
				return t = l({}, W, t), Fn.typeCheckConfig(j, t, U), t
			}, t._addEventListeners = function() {
				var e = this;
				this._config.keyboard && P(this._element).on(Q.KEYDOWN, function(t) {
					return e._keydown(t)
				}), "hover" === this._config.pause && (P(this._element).on(Q.MOUSEENTER, function(t) {
					return e.pause(t)
				}).on(Q.MOUSELEAVE, function(t) {
					return e.cycle(t)
				}), "ontouchstart" in document.documentElement && P(this._element).on(Q.TOUCHEND, function() {
					e.pause(), e.touchTimeout && clearTimeout(e.touchTimeout), e.touchTimeout = setTimeout(function(t) {
						return e.cycle(t)
					}, 500 + e._config.interval)
				}))
			}, t._keydown = function(t) {
				if (!/input|textarea/i.test(t.target.tagName)) switch (t.which) {
					case 37:
						t.preventDefault(), this.prev();
						break;
					case 39:
						t.preventDefault(), this.next()
				}
			}, t._getItemIndex = function(t) {
				return this._items = t && t.parentNode ? [].slice.call(t.parentNode.querySelectorAll(tt)) : [], this._items.indexOf(t)
			}, t._getItemByDirection = function(t, e) {
				var n = t === q,
					i = t === F,
					r = this._getItemIndex(e),
					o = this._items.length - 1;
				if ((i && 0 === r || n && r === o) && !this._config.wrap) return e;
				var s = (r + (t === F ? -1 : 1)) % this._items.length;
				return -1 === s ? this._items[this._items.length - 1] : this._items[s]
			}, t._triggerSlideEvent = function(t, e) {
				var n = this._getItemIndex(t),
					i = this._getItemIndex(this._element.querySelector(X)),
					r = P.Event(Q.SLIDE, {
						relatedTarget: t,
						direction: e,
						from: i,
						to: n
					});
				return P(this._element).trigger(r), r
			}, t._setActiveIndicatorElement = function(t) {
				if (this._indicatorsElement) {
					var e = [].slice.call(this._indicatorsElement.querySelectorAll($));
					P(e).removeClass(V);
					var n = this._indicatorsElement.children[this._getItemIndex(t)];
					n && P(n).addClass(V)
				}
			}, t._slide = function(t, e) {
				var n, i, r, o = this,
					s = this._element.querySelector(X),
					a = this._getItemIndex(s),
					l = e || s && this._getItemByDirection(t, s),
					c = this._getItemIndex(l),
					h = Boolean(this._interval);
				if (t === q ? (n = J, i = Z, r = K) : (n = z, i = G, r = M), l && P(l).hasClass(V)) this._isSliding = !1;
				else if (!this._triggerSlideEvent(l, r).isDefaultPrevented() && s && l) {
					this._isSliding = !0, h && this.pause(), this._setActiveIndicatorElement(l);
					var u = P.Event(Q.SLID, {
						relatedTarget: l,
						direction: r,
						from: a,
						to: c
					});
					if (P(this._element).hasClass(Y)) {
						P(l).addClass(i), Fn.reflow(l), P(s).addClass(n), P(l).addClass(n);
						var f = Fn.getTransitionDurationFromElement(s);
						P(s).one(Fn.TRANSITION_END, function() {
							P(l).removeClass(n + " " + i).addClass(V), P(s).removeClass(V + " " + i + " " + n), o._isSliding = !1, setTimeout(function() {
								return P(o._element).trigger(u)
							}, 0)
						}).emulateTransitionEnd(f)
					} else P(s).removeClass(V), P(l).addClass(V), this._isSliding = !1, P(this._element).trigger(u);
					h && this.cycle()
				}
			}, o._jQueryInterface = function(i) {
				return this.each(function() {
					var t = P(this).data(H),
						e = l({}, W, P(this).data());
					"object" == typeof i && (e = l({}, e, i));
					var n = "string" == typeof i ? i : e.slide;
					if (t || (t = new o(this, e), P(this).data(H, t)), "number" == typeof i) t.to(i);
					else if ("string" == typeof n) {
						if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
						t[n]()
					} else e.interval && (t.pause(), t.cycle())
				})
			}, o._dataApiClickHandler = function(t) {
				var e = Fn.getSelectorFromElement(this);
				if (e) {
					var n = P(e)[0];
					if (n && P(n).hasClass(B)) {
						var i = l({}, P(n).data(), P(this).data()),
							r = this.getAttribute("data-slide-to");
						r && (i.interval = !1), o._jQueryInterface.call(P(n), i), r && P(n).data(H).to(r), t.preventDefault()
					}
				}
			}, s(o, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}, {
				key: "Default",
				get: function() {
					return W
				}
			}]), o
		}(), P(document).on(Q.CLICK_DATA_API, it, ot._dataApiClickHandler), P(window).on(Q.LOAD_DATA_API, function() {
			for (var t = [].slice.call(document.querySelectorAll(rt)), e = 0, n = t.length; e < n; e++) {
				var i = P(t[e]);
				ot._jQueryInterface.call(i, i.data())
			}
		}), P.fn[j] = ot._jQueryInterface, P.fn[j].Constructor = ot, P.fn[j].noConflict = function() {
			return P.fn[j] = x, ot._jQueryInterface
		}, ot),
		Bn = (at = "collapse", ct = "." + (lt = "bs.collapse"), ht = (st = e).fn[at], ut = {
			toggle: !0,
			parent: ""
		}, ft = {
			toggle: "boolean",
			parent: "(string|element)"
		}, dt = {
			SHOW: "show" + ct,
			SHOWN: "shown" + ct,
			HIDE: "hide" + ct,
			HIDDEN: "hidden" + ct,
			CLICK_DATA_API: "click" + ct + ".data-api"
		}, gt = "show", _t = "collapse", mt = "collapsing", pt = "collapsed", vt = "width", yt = "height", Et = ".show, .collapsing", Ct = '[data-toggle="collapse"]', Tt = function() {
			function a(e, t) {
				this._isTransitioning = !1, this._element = e, this._config = this._getConfig(t), this._triggerArray = st.makeArray(document.querySelectorAll('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'));
				for (var n = [].slice.call(document.querySelectorAll(Ct)), i = 0, r = n.length; i < r; i++) {
					var o = n[i],
						s = Fn.getSelectorFromElement(o),
						a = [].slice.call(document.querySelectorAll(s)).filter(function(t) {
							return t === e
						});
					null !== s && 0 < a.length && (this._selector = s, this._triggerArray.push(o))
				}
				this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle()
			}
			var t = a.prototype;
			return t.toggle = function() {
				st(this._element).hasClass(gt) ? this.hide() : this.show()
			}, t.show = function() {
				var t, e, n = this;
				if (!this._isTransitioning && !st(this._element).hasClass(gt) && (this._parent && 0 === (t = [].slice.call(this._parent.querySelectorAll(Et)).filter(function(t) {
						return t.getAttribute("data-parent") === n._config.parent
					})).length && (t = null), !(t && (e = st(t).not(this._selector).data(lt)) && e._isTransitioning))) {
					var i = st.Event(dt.SHOW);
					if (st(this._element).trigger(i), !i.isDefaultPrevented()) {
						t && (a._jQueryInterface.call(st(t).not(this._selector), "hide"), e || st(t).data(lt, null));
						var r = this._getDimension();
						st(this._element).removeClass(_t).addClass(mt), this._element.style[r] = 0, this._triggerArray.length && st(this._triggerArray).removeClass(pt).attr("aria-expanded", !0), this.setTransitioning(!0);
						var o = "scroll" + (r[0].toUpperCase() + r.slice(1)),
							s = Fn.getTransitionDurationFromElement(this._element);
						st(this._element).one(Fn.TRANSITION_END, function() {
							st(n._element).removeClass(mt).addClass(_t).addClass(gt), n._element.style[r] = "", n.setTransitioning(!1), st(n._element).trigger(dt.SHOWN)
						}).emulateTransitionEnd(s), this._element.style[r] = this._element[o] + "px"
					}
				}
			}, t.hide = function() {
				var t = this;
				if (!this._isTransitioning && st(this._element).hasClass(gt)) {
					var e = st.Event(dt.HIDE);
					if (st(this._element).trigger(e), !e.isDefaultPrevented()) {
						var n = this._getDimension();
						this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", Fn.reflow(this._element), st(this._element).addClass(mt).removeClass(_t).removeClass(gt);
						var i = this._triggerArray.length;
						if (0 < i)
							for (var r = 0; r < i; r++) {
								var o = this._triggerArray[r],
									s = Fn.getSelectorFromElement(o);
								if (null !== s) st([].slice.call(document.querySelectorAll(s))).hasClass(gt) || st(o).addClass(pt).attr("aria-expanded", !1)
							}
						this.setTransitioning(!0);
						this._element.style[n] = "";
						var a = Fn.getTransitionDurationFromElement(this._element);
						st(this._element).one(Fn.TRANSITION_END, function() {
							t.setTransitioning(!1), st(t._element).removeClass(mt).addClass(_t).trigger(dt.HIDDEN)
						}).emulateTransitionEnd(a)
					}
				}
			}, t.setTransitioning = function(t) {
				this._isTransitioning = t
			}, t.dispose = function() {
				st.removeData(this._element, lt), this._config = null, this._parent = null, this._element = null, this._triggerArray = null, this._isTransitioning = null
			}, t._getConfig = function(t) {
				return (t = l({}, ut, t)).toggle = Boolean(t.toggle), Fn.typeCheckConfig(at, t, ft), t
			}, t._getDimension = function() {
				return st(this._element).hasClass(vt) ? vt : yt
			}, t._getParent = function() {
				var n = this,
					t = null;
				Fn.isElement(this._config.parent) ? (t = this._config.parent, "undefined" != typeof this._config.parent.jquery && (t = this._config.parent[0])) : t = document.querySelector(this._config.parent);
				var e = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]',
					i = [].slice.call(t.querySelectorAll(e));
				return st(i).each(function(t, e) {
					n._addAriaAndCollapsedClass(a._getTargetFromElement(e), [e])
				}), t
			}, t._addAriaAndCollapsedClass = function(t, e) {
				if (t) {
					var n = st(t).hasClass(gt);
					e.length && st(e).toggleClass(pt, !n).attr("aria-expanded", n)
				}
			}, a._getTargetFromElement = function(t) {
				var e = Fn.getSelectorFromElement(t);
				return e ? document.querySelector(e) : null
			}, a._jQueryInterface = function(i) {
				return this.each(function() {
					var t = st(this),
						e = t.data(lt),
						n = l({}, ut, t.data(), "object" == typeof i && i ? i : {});
					if (!e && n.toggle && /show|hide/.test(i) && (n.toggle = !1), e || (e = new a(this, n), t.data(lt, e)), "string" == typeof i) {
						if ("undefined" == typeof e[i]) throw new TypeError('No method named "' + i + '"');
						e[i]()
					}
				})
			}, s(a, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}, {
				key: "Default",
				get: function() {
					return ut
				}
			}]), a
		}(), st(document).on(dt.CLICK_DATA_API, Ct, function(t) {
			"A" === t.currentTarget.tagName && t.preventDefault();
			var n = st(this),
				e = Fn.getSelectorFromElement(this),
				i = [].slice.call(document.querySelectorAll(e));
			st(i).each(function() {
				var t = st(this),
					e = t.data(lt) ? "toggle" : n.data();
				Tt._jQueryInterface.call(t, e)
			})
		}), st.fn[at] = Tt._jQueryInterface, st.fn[at].Constructor = Tt, st.fn[at].noConflict = function() {
			return st.fn[at] = ht, Tt._jQueryInterface
		}, Tt),
		Vn = (St = "dropdown", At = "." + (It = "bs.dropdown"), Dt = ".data-api", wt = (bt = e).fn[St], Nt = new RegExp("38|40|27"), Ot = {
			HIDE: "hide" + At,
			HIDDEN: "hidden" + At,
			SHOW: "show" + At,
			SHOWN: "shown" + At,
			CLICK: "click" + At,
			CLICK_DATA_API: "click" + At + Dt,
			KEYDOWN_DATA_API: "keydown" + At + Dt,
			KEYUP_DATA_API: "keyup" + At + Dt
		}, kt = "disabled", Pt = "show", jt = "dropup", Ht = "dropright", Lt = "dropleft", Rt = "dropdown-menu-right", xt = "position-static", Wt = '[data-toggle="dropdown"]', Ut = ".dropdown form", qt = ".dropdown-menu", Ft = ".navbar-nav", Kt = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", Mt = "top-start", Qt = "top-end", Bt = "bottom-start", Vt = "bottom-end", Yt = "right-start", zt = "left-start", Jt = {
			offset: 0,
			flip: !0,
			boundary: "scrollParent",
			reference: "toggle",
			display: "dynamic"
		}, Zt = {
			offset: "(number|string|function)",
			flip: "boolean",
			boundary: "(string|element)",
			reference: "(string|element)",
			display: "string"
		}, Gt = function() {
			function c(t, e) {
				this._element = t, this._popper = null, this._config = this._getConfig(e), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners()
			}
			var t = c.prototype;
			return t.toggle = function() {
				if (!this._element.disabled && !bt(this._element).hasClass(kt)) {
					var t = c._getParentFromElement(this._element),
						e = bt(this._menu).hasClass(Pt);
					if (c._clearMenus(), !e) {
						var n = {
								relatedTarget: this._element
							},
							i = bt.Event(Ot.SHOW, n);
						if (bt(t).trigger(i), !i.isDefaultPrevented()) {
							if (!this._inNavbar) {
								if ("undefined" == typeof h) throw new TypeError("Bootstrap dropdown require Popper.js (https://popper.js.org)");
								var r = this._element;
								"parent" === this._config.reference ? r = t : Fn.isElement(this._config.reference) && (r = this._config.reference, "undefined" != typeof this._config.reference.jquery && (r = this._config.reference[0])), "scrollParent" !== this._config.boundary && bt(t).addClass(xt), this._popper = new h(r, this._menu, this._getPopperConfig())
							}
							"ontouchstart" in document.documentElement && 0 === bt(t).closest(Ft).length && bt(document.body).children().on("mouseover", null, bt.noop), this._element.focus(), this._element.setAttribute("aria-expanded", !0), bt(this._menu).toggleClass(Pt), bt(t).toggleClass(Pt).trigger(bt.Event(Ot.SHOWN, n))
						}
					}
				}
			}, t.dispose = function() {
				bt.removeData(this._element, It), bt(this._element).off(At), this._element = null, (this._menu = null) !== this._popper && (this._popper.destroy(), this._popper = null)
			}, t.update = function() {
				this._inNavbar = this._detectNavbar(), null !== this._popper && this._popper.scheduleUpdate()
			}, t._addEventListeners = function() {
				var e = this;
				bt(this._element).on(Ot.CLICK, function(t) {
					t.preventDefault(), t.stopPropagation(), e.toggle()
				})
			}, t._getConfig = function(t) {
				return t = l({}, this.constructor.Default, bt(this._element).data(), t), Fn.typeCheckConfig(St, t, this.constructor.DefaultType), t
			}, t._getMenuElement = function() {
				if (!this._menu) {
					var t = c._getParentFromElement(this._element);
					t && (this._menu = t.querySelector(qt))
				}
				return this._menu
			}, t._getPlacement = function() {
				var t = bt(this._element.parentNode),
					e = Bt;
				return t.hasClass(jt) ? (e = Mt, bt(this._menu).hasClass(Rt) && (e = Qt)) : t.hasClass(Ht) ? e = Yt : t.hasClass(Lt) ? e = zt : bt(this._menu).hasClass(Rt) && (e = Vt), e
			}, t._detectNavbar = function() {
				return 0 < bt(this._element).closest(".navbar").length
			}, t._getPopperConfig = function() {
				var e = this,
					t = {};
				"function" == typeof this._config.offset ? t.fn = function(t) {
					return t.offsets = l({}, t.offsets, e._config.offset(t.offsets) || {}), t
				} : t.offset = this._config.offset;
				var n = {
					placement: this._getPlacement(),
					modifiers: {
						offset: t,
						flip: {
							enabled: this._config.flip
						},
						preventOverflow: {
							boundariesElement: this._config.boundary
						}
					}
				};
				return "static" === this._config.display && (n.modifiers.applyStyle = {
					enabled: !1
				}), n
			}, c._jQueryInterface = function(e) {
				return this.each(function() {
					var t = bt(this).data(It);
					if (t || (t = new c(this, "object" == typeof e ? e : null), bt(this).data(It, t)), "string" == typeof e) {
						if ("undefined" == typeof t[e]) throw new TypeError('No method named "' + e + '"');
						t[e]()
					}
				})
			}, c._clearMenus = function(t) {
				if (!t || 3 !== t.which && ("keyup" !== t.type || 9 === t.which))
					for (var e = [].slice.call(document.querySelectorAll(Wt)), n = 0, i = e.length; n < i; n++) {
						var r = c._getParentFromElement(e[n]),
							o = bt(e[n]).data(It),
							s = {
								relatedTarget: e[n]
							};
						if (t && "click" === t.type && (s.clickEvent = t), o) {
							var a = o._menu;
							if (bt(r).hasClass(Pt) && !(t && ("click" === t.type && /input|textarea/i.test(t.target.tagName) || "keyup" === t.type && 9 === t.which) && bt.contains(r, t.target))) {
								var l = bt.Event(Ot.HIDE, s);
								bt(r).trigger(l), l.isDefaultPrevented() || ("ontouchstart" in document.documentElement && bt(document.body).children().off("mouseover", null, bt.noop), e[n].setAttribute("aria-expanded", "false"), bt(a).removeClass(Pt), bt(r).removeClass(Pt).trigger(bt.Event(Ot.HIDDEN, s)))
							}
						}
					}
			}, c._getParentFromElement = function(t) {
				var e, n = Fn.getSelectorFromElement(t);
				return n && (e = document.querySelector(n)), e || t.parentNode
			}, c._dataApiKeydownHandler = function(t) {
				if ((/input|textarea/i.test(t.target.tagName) ? !(32 === t.which || 27 !== t.which && (40 !== t.which && 38 !== t.which || bt(t.target).closest(qt).length)) : Nt.test(t.which)) && (t.preventDefault(), t.stopPropagation(), !this.disabled && !bt(this).hasClass(kt))) {
					var e = c._getParentFromElement(this),
						n = bt(e).hasClass(Pt);
					if ((n || 27 === t.which && 32 === t.which) && (!n || 27 !== t.which && 32 !== t.which)) {
						var i = [].slice.call(e.querySelectorAll(Kt));
						if (0 !== i.length) {
							var r = i.indexOf(t.target);
							38 === t.which && 0 < r && r--, 40 === t.which && r < i.length - 1 && r++, r < 0 && (r = 0), i[r].focus()
						}
					} else {
						if (27 === t.which) {
							var o = e.querySelector(Wt);
							bt(o).trigger("focus")
						}
						bt(this).trigger("click")
					}
				}
			}, s(c, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}, {
				key: "Default",
				get: function() {
					return Jt
				}
			}, {
				key: "DefaultType",
				get: function() {
					return Zt
				}
			}]), c
		}(), bt(document).on(Ot.KEYDOWN_DATA_API, Wt, Gt._dataApiKeydownHandler).on(Ot.KEYDOWN_DATA_API, qt, Gt._dataApiKeydownHandler).on(Ot.CLICK_DATA_API + " " + Ot.KEYUP_DATA_API, Gt._clearMenus).on(Ot.CLICK_DATA_API, Wt, function(t) {
			t.preventDefault(), t.stopPropagation(), Gt._jQueryInterface.call(bt(this), "toggle")
		}).on(Ot.CLICK_DATA_API, Ut, function(t) {
			t.stopPropagation()
		}), bt.fn[St] = Gt._jQueryInterface, bt.fn[St].Constructor = Gt, bt.fn[St].noConflict = function() {
			return bt.fn[St] = wt, Gt._jQueryInterface
		}, Gt),
		Yn = (Xt = "modal", ee = "." + (te = "bs.modal"), ne = ($t = e).fn[Xt], ie = {
			backdrop: !0,
			keyboard: !0,
			focus: !0,
			show: !0
		}, re = {
			backdrop: "(boolean|string)",
			keyboard: "boolean",
			focus: "boolean",
			show: "boolean"
		}, oe = {
			HIDE: "hide" + ee,
			HIDDEN: "hidden" + ee,
			SHOW: "show" + ee,
			SHOWN: "shown" + ee,
			FOCUSIN: "focusin" + ee,
			RESIZE: "resize" + ee,
			CLICK_DISMISS: "click.dismiss" + ee,
			KEYDOWN_DISMISS: "keydown.dismiss" + ee,
			MOUSEUP_DISMISS: "mouseup.dismiss" + ee,
			MOUSEDOWN_DISMISS: "mousedown.dismiss" + ee,
			CLICK_DATA_API: "click" + ee + ".data-api"
		}, se = "modal-scrollbar-measure", ae = "modal-backdrop", le = "modal-open", ce = "fade", he = "show", ue = ".modal-dialog", fe = '[data-toggle="modal"]', de = '[data-dismiss="modal"]', ge = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top", _e = ".sticky-top", me = function() {
			function r(t, e) {
				this._config = this._getConfig(e), this._element = t, this._dialog = t.querySelector(ue), this._backdrop = null, this._isShown = !1, this._isBodyOverflowing = !1, this._ignoreBackdropClick = !1, this._scrollbarWidth = 0
			}
			var t = r.prototype;
			return t.toggle = function(t) {
				return this._isShown ? this.hide() : this.show(t)
			}, t.show = function(t) {
				var e = this;
				if (!this._isTransitioning && !this._isShown) {
					$t(this._element).hasClass(ce) && (this._isTransitioning = !0);
					var n = $t.Event(oe.SHOW, {
						relatedTarget: t
					});
					$t(this._element).trigger(n), this._isShown || n.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), $t(document.body).addClass(le), this._setEscapeEvent(), this._setResizeEvent(), $t(this._element).on(oe.CLICK_DISMISS, de, function(t) {
						return e.hide(t)
					}), $t(this._dialog).on(oe.MOUSEDOWN_DISMISS, function() {
						$t(e._element).one(oe.MOUSEUP_DISMISS, function(t) {
							$t(t.target).is(e._element) && (e._ignoreBackdropClick = !0)
						})
					}), this._showBackdrop(function() {
						return e._showElement(t)
					}))
				}
			}, t.hide = function(t) {
				var e = this;
				if (t && t.preventDefault(), !this._isTransitioning && this._isShown) {
					var n = $t.Event(oe.HIDE);
					if ($t(this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
						this._isShown = !1;
						var i = $t(this._element).hasClass(ce);
						if (i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), $t(document).off(oe.FOCUSIN), $t(this._element).removeClass(he), $t(this._element).off(oe.CLICK_DISMISS), $t(this._dialog).off(oe.MOUSEDOWN_DISMISS), i) {
							var r = Fn.getTransitionDurationFromElement(this._element);
							$t(this._element).one(Fn.TRANSITION_END, function(t) {
								return e._hideModal(t)
							}).emulateTransitionEnd(r)
						} else this._hideModal()
					}
				}
			}, t.dispose = function() {
				$t.removeData(this._element, te), $t(window, document, this._element, this._backdrop).off(ee), this._config = null, this._element = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._scrollbarWidth = null
			}, t.handleUpdate = function() {
				this._adjustDialog()
			}, t._getConfig = function(t) {
				return t = l({}, ie, t), Fn.typeCheckConfig(Xt, t, re), t
			}, t._showElement = function(t) {
				var e = this,
					n = $t(this._element).hasClass(ce);
				this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.scrollTop = 0, n && Fn.reflow(this._element), $t(this._element).addClass(he), this._config.focus && this._enforceFocus();
				var i = $t.Event(oe.SHOWN, {
						relatedTarget: t
					}),
					r = function() {
						e._config.focus && e._element.focus(), e._isTransitioning = !1, $t(e._element).trigger(i)
					};
				if (n) {
					var o = Fn.getTransitionDurationFromElement(this._element);
					$t(this._dialog).one(Fn.TRANSITION_END, r).emulateTransitionEnd(o)
				} else r()
			}, t._enforceFocus = function() {
				var e = this;
				$t(document).off(oe.FOCUSIN).on(oe.FOCUSIN, function(t) {
					document !== t.target && e._element !== t.target && 0 === $t(e._element).has(t.target).length && e._element.focus()
				})
			}, t._setEscapeEvent = function() {
				var e = this;
				this._isShown && this._config.keyboard ? $t(this._element).on(oe.KEYDOWN_DISMISS, function(t) {
					27 === t.which && (t.preventDefault(), e.hide())
				}) : this._isShown || $t(this._element).off(oe.KEYDOWN_DISMISS)
			}, t._setResizeEvent = function() {
				var e = this;
				this._isShown ? $t(window).on(oe.RESIZE, function(t) {
					return e.handleUpdate(t)
				}) : $t(window).off(oe.RESIZE)
			}, t._hideModal = function() {
				var t = this;
				this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._isTransitioning = !1, this._showBackdrop(function() {
					$t(document.body).removeClass(le), t._resetAdjustments(), t._resetScrollbar(), $t(t._element).trigger(oe.HIDDEN)
				})
			}, t._removeBackdrop = function() {
				this._backdrop && ($t(this._backdrop).remove(), this._backdrop = null)
			}, t._showBackdrop = function(t) {
				var e = this,
					n = $t(this._element).hasClass(ce) ? ce : "";
				if (this._isShown && this._config.backdrop) {
					if (this._backdrop = document.createElement("div"), this._backdrop.className = ae, n && this._backdrop.classList.add(n), $t(this._backdrop).appendTo(document.body), $t(this._element).on(oe.CLICK_DISMISS, function(t) {
							e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" === e._config.backdrop ? e._element.focus() : e.hide())
						}), n && Fn.reflow(this._backdrop), $t(this._backdrop).addClass(he), !t) return;
					if (!n) return void t();
					var i = Fn.getTransitionDurationFromElement(this._backdrop);
					$t(this._backdrop).one(Fn.TRANSITION_END, t).emulateTransitionEnd(i)
				} else if (!this._isShown && this._backdrop) {
					$t(this._backdrop).removeClass(he);
					var r = function() {
						e._removeBackdrop(), t && t()
					};
					if ($t(this._element).hasClass(ce)) {
						var o = Fn.getTransitionDurationFromElement(this._backdrop);
						$t(this._backdrop).one(Fn.TRANSITION_END, r).emulateTransitionEnd(o)
					} else r()
				} else t && t()
			}, t._adjustDialog = function() {
				var t = this._element.scrollHeight > document.documentElement.clientHeight;
				!this._isBodyOverflowing && t && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !t && (this._element.style.paddingRight = this._scrollbarWidth + "px")
			}, t._resetAdjustments = function() {
				this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
			}, t._checkScrollbar = function() {
				var t = document.body.getBoundingClientRect();
				this._isBodyOverflowing = t.left + t.right < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth()
			}, t._setScrollbar = function() {
				var r = this;
				if (this._isBodyOverflowing) {
					var t = [].slice.call(document.querySelectorAll(ge)),
						e = [].slice.call(document.querySelectorAll(_e));
					$t(t).each(function(t, e) {
						var n = e.style.paddingRight,
							i = $t(e).css("padding-right");
						$t(e).data("padding-right", n).css("padding-right", parseFloat(i) + r._scrollbarWidth + "px")
					}), $t(e).each(function(t, e) {
						var n = e.style.marginRight,
							i = $t(e).css("margin-right");
						$t(e).data("margin-right", n).css("margin-right", parseFloat(i) - r._scrollbarWidth + "px")
					});
					var n = document.body.style.paddingRight,
						i = $t(document.body).css("padding-right");
					$t(document.body).data("padding-right", n).css("padding-right", parseFloat(i) + this._scrollbarWidth + "px")
				}
			}, t._resetScrollbar = function() {
				var t = [].slice.call(document.querySelectorAll(ge));
				$t(t).each(function(t, e) {
					var n = $t(e).data("padding-right");
					$t(e).removeData("padding-right"), e.style.paddingRight = n || ""
				});
				var e = [].slice.call(document.querySelectorAll("" + _e));
				$t(e).each(function(t, e) {
					var n = $t(e).data("margin-right");
					"undefined" != typeof n && $t(e).css("margin-right", n).removeData("margin-right")
				});
				var n = $t(document.body).data("padding-right");
				$t(document.body).removeData("padding-right"), document.body.style.paddingRight = n || ""
			}, t._getScrollbarWidth = function() {
				var t = document.createElement("div");
				t.className = se, document.body.appendChild(t);
				var e = t.getBoundingClientRect().width - t.clientWidth;
				return document.body.removeChild(t), e
			}, r._jQueryInterface = function(n, i) {
				return this.each(function() {
					var t = $t(this).data(te),
						e = l({}, ie, $t(this).data(), "object" == typeof n && n ? n : {});
					if (t || (t = new r(this, e), $t(this).data(te, t)), "string" == typeof n) {
						if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
						t[n](i)
					} else e.show && t.show(i)
				})
			}, s(r, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}, {
				key: "Default",
				get: function() {
					return ie
				}
			}]), r
		}(), $t(document).on(oe.CLICK_DATA_API, fe, function(t) {
			var e, n = this,
				i = Fn.getSelectorFromElement(this);
			i && (e = document.querySelector(i));
			var r = $t(e).data(te) ? "toggle" : l({}, $t(e).data(), $t(this).data());
			"A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault();
			var o = $t(e).one(oe.SHOW, function(t) {
				t.isDefaultPrevented() || o.one(oe.HIDDEN, function() {
					$t(n).is(":visible") && n.focus()
				})
			});
			me._jQueryInterface.call($t(e), r, this)
		}), $t.fn[Xt] = me._jQueryInterface, $t.fn[Xt].Constructor = me, $t.fn[Xt].noConflict = function() {
			return $t.fn[Xt] = ne, me._jQueryInterface
		}, me),
		zn = (ve = "tooltip", Ee = "." + (ye = "bs.tooltip"), Ce = (pe = e).fn[ve], Te = "bs-tooltip", be = new RegExp("(^|\\s)" + Te + "\\S+", "g"), Ae = {
			animation: !0,
			template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
			trigger: "hover focus",
			title: "",
			delay: 0,
			html: !(Ie = {
				AUTO: "auto",
				TOP: "top",
				RIGHT: "right",
				BOTTOM: "bottom",
				LEFT: "left"
			}),
			selector: !(Se = {
				animation: "boolean",
				template: "string",
				title: "(string|element|function)",
				trigger: "string",
				delay: "(number|object)",
				html: "boolean",
				selector: "(string|boolean)",
				placement: "(string|function)",
				offset: "(number|string)",
				container: "(string|element|boolean)",
				fallbackPlacement: "(string|array)",
				boundary: "(string|element)"
			}),
			placement: "top",
			offset: 0,
			container: !1,
			fallbackPlacement: "flip",
			boundary: "scrollParent"
		}, we = "out", Ne = {
			HIDE: "hide" + Ee,
			HIDDEN: "hidden" + Ee,
			SHOW: (De = "show") + Ee,
			SHOWN: "shown" + Ee,
			INSERTED: "inserted" + Ee,
			CLICK: "click" + Ee,
			FOCUSIN: "focusin" + Ee,
			FOCUSOUT: "focusout" + Ee,
			MOUSEENTER: "mouseenter" + Ee,
			MOUSELEAVE: "mouseleave" + Ee
		}, Oe = "fade", ke = "show", Pe = ".tooltip-inner", je = ".arrow", He = "hover", Le = "focus", Re = "click", xe = "manual", We = function() {
			function i(t, e) {
				if ("undefined" == typeof h) throw new TypeError("Bootstrap tooltips require Popper.js (https://popper.js.org)");
				this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this.element = t, this.config = this._getConfig(e), this.tip = null, this._setListeners()
			}
			var t = i.prototype;
			return t.enable = function() {
				this._isEnabled = !0
			}, t.disable = function() {
				this._isEnabled = !1
			}, t.toggleEnabled = function() {
				this._isEnabled = !this._isEnabled
			}, t.toggle = function(t) {
				if (this._isEnabled)
					if (t) {
						var e = this.constructor.DATA_KEY,
							n = pe(t.currentTarget).data(e);
						n || (n = new this.constructor(t.currentTarget, this._getDelegateConfig()), pe(t.currentTarget).data(e, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n)
					} else {
						if (pe(this.getTipElement()).hasClass(ke)) return void this._leave(null, this);
						this._enter(null, this)
					}
			}, t.dispose = function() {
				clearTimeout(this._timeout), pe.removeData(this.element, this.constructor.DATA_KEY), pe(this.element).off(this.constructor.EVENT_KEY), pe(this.element).closest(".modal").off("hide.bs.modal"), this.tip && pe(this.tip).remove(), this._isEnabled = null, this._timeout = null, this._hoverState = null, (this._activeTrigger = null) !== this._popper && this._popper.destroy(), this._popper = null, this.element = null, this.config = null, this.tip = null
			}, t.show = function() {
				var e = this;
				if ("none" === pe(this.element).css("display")) throw new Error("Please use show on visible elements");
				var t = pe.Event(this.constructor.Event.SHOW);
				if (this.isWithContent() && this._isEnabled) {
					pe(this.element).trigger(t);
					var n = pe.contains(this.element.ownerDocument.documentElement, this.element);
					if (t.isDefaultPrevented() || !n) return;
					var i = this.getTipElement(),
						r = Fn.getUID(this.constructor.NAME);
					i.setAttribute("id", r), this.element.setAttribute("aria-describedby", r), this.setContent(), this.config.animation && pe(i).addClass(Oe);
					var o = "function" == typeof this.config.placement ? this.config.placement.call(this, i, this.element) : this.config.placement,
						s = this._getAttachment(o);
					this.addAttachmentClass(s);
					var a = !1 === this.config.container ? document.body : pe(document).find(this.config.container);
					pe(i).data(this.constructor.DATA_KEY, this), pe.contains(this.element.ownerDocument.documentElement, this.tip) || pe(i).appendTo(a), pe(this.element).trigger(this.constructor.Event.INSERTED), this._popper = new h(this.element, i, {
						placement: s,
						modifiers: {
							offset: {
								offset: this.config.offset
							},
							flip: {
								behavior: this.config.fallbackPlacement
							},
							arrow: {
								element: je
							},
							preventOverflow: {
								boundariesElement: this.config.boundary
							}
						},
						onCreate: function(t) {
							t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t)
						},
						onUpdate: function(t) {
							e._handlePopperPlacementChange(t)
						}
					}), pe(i).addClass(ke), "ontouchstart" in document.documentElement && pe(document.body).children().on("mouseover", null, pe.noop);
					var l = function() {
						e.config.animation && e._fixTransition();
						var t = e._hoverState;
						e._hoverState = null, pe(e.element).trigger(e.constructor.Event.SHOWN), t === we && e._leave(null, e)
					};
					if (pe(this.tip).hasClass(Oe)) {
						var c = Fn.getTransitionDurationFromElement(this.tip);
						pe(this.tip).one(Fn.TRANSITION_END, l).emulateTransitionEnd(c)
					} else l()
				}
			}, t.hide = function(t) {
				var e = this,
					n = this.getTipElement(),
					i = pe.Event(this.constructor.Event.HIDE),
					r = function() {
						e._hoverState !== De && n.parentNode && n.parentNode.removeChild(n), e._cleanTipClass(), e.element.removeAttribute("aria-describedby"), pe(e.element).trigger(e.constructor.Event.HIDDEN), null !== e._popper && e._popper.destroy(), t && t()
					};
				if (pe(this.element).trigger(i), !i.isDefaultPrevented()) {
					if (pe(n).removeClass(ke), "ontouchstart" in document.documentElement && pe(document.body).children().off("mouseover", null, pe.noop), this._activeTrigger[Re] = !1, this._activeTrigger[Le] = !1, this._activeTrigger[He] = !1, pe(this.tip).hasClass(Oe)) {
						var o = Fn.getTransitionDurationFromElement(n);
						pe(n).one(Fn.TRANSITION_END, r).emulateTransitionEnd(o)
					} else r();
					this._hoverState = ""
				}
			}, t.update = function() {
				null !== this._popper && this._popper.scheduleUpdate()
			}, t.isWithContent = function() {
				return Boolean(this.getTitle())
			}, t.addAttachmentClass = function(t) {
				pe(this.getTipElement()).addClass(Te + "-" + t)
			}, t.getTipElement = function() {
				return this.tip = this.tip || pe(this.config.template)[0], this.tip
			}, t.setContent = function() {
				var t = this.getTipElement();
				this.setElementContent(pe(t.querySelectorAll(Pe)), this.getTitle()), pe(t).removeClass(Oe + " " + ke)
			}, t.setElementContent = function(t, e) {
				var n = this.config.html;
				"object" == typeof e && (e.nodeType || e.jquery) ? n ? pe(e).parent().is(t) || t.empty().append(e) : t.text(pe(e).text()) : t[n ? "html" : "text"](e)
			}, t.getTitle = function() {
				var t = this.element.getAttribute("data-original-title");
				return t || (t = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), t
			}, t._getAttachment = function(t) {
				return Ie[t.toUpperCase()]
			}, t._setListeners = function() {
				var i = this;
				this.config.trigger.split(" ").forEach(function(t) {
					if ("click" === t) pe(i.element).on(i.constructor.Event.CLICK, i.config.selector, function(t) {
						return i.toggle(t)
					});
					else if (t !== xe) {
						var e = t === He ? i.constructor.Event.MOUSEENTER : i.constructor.Event.FOCUSIN,
							n = t === He ? i.constructor.Event.MOUSELEAVE : i.constructor.Event.FOCUSOUT;
						pe(i.element).on(e, i.config.selector, function(t) {
							return i._enter(t)
						}).on(n, i.config.selector, function(t) {
							return i._leave(t)
						})
					}
					pe(i.element).closest(".modal").on("hide.bs.modal", function() {
						return i.hide()
					})
				}), this.config.selector ? this.config = l({}, this.config, {
					trigger: "manual",
					selector: ""
				}) : this._fixTitle()
			}, t._fixTitle = function() {
				var t = typeof this.element.getAttribute("data-original-title");
				(this.element.getAttribute("title") || "string" !== t) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""))
			}, t._enter = function(t, e) {
				var n = this.constructor.DATA_KEY;
				(e = e || pe(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), pe(t.currentTarget).data(n, e)), t && (e._activeTrigger["focusin" === t.type ? Le : He] = !0), pe(e.getTipElement()).hasClass(ke) || e._hoverState === De ? e._hoverState = De : (clearTimeout(e._timeout), e._hoverState = De, e.config.delay && e.config.delay.show ? e._timeout = setTimeout(function() {
					e._hoverState === De && e.show()
				}, e.config.delay.show) : e.show())
			}, t._leave = function(t, e) {
				var n = this.constructor.DATA_KEY;
				(e = e || pe(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), pe(t.currentTarget).data(n, e)), t && (e._activeTrigger["focusout" === t.type ? Le : He] = !1), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = we, e.config.delay && e.config.delay.hide ? e._timeout = setTimeout(function() {
					e._hoverState === we && e.hide()
				}, e.config.delay.hide) : e.hide())
			}, t._isWithActiveTrigger = function() {
				for (var t in this._activeTrigger)
					if (this._activeTrigger[t]) return !0;
				return !1
			}, t._getConfig = function(t) {
				return "number" == typeof(t = l({}, this.constructor.Default, pe(this.element).data(), "object" == typeof t && t ? t : {})).delay && (t.delay = {
					show: t.delay,
					hide: t.delay
				}), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), Fn.typeCheckConfig(ve, t, this.constructor.DefaultType), t
			}, t._getDelegateConfig = function() {
				var t = {};
				if (this.config)
					for (var e in this.config) this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
				return t
			}, t._cleanTipClass = function() {
				var t = pe(this.getTipElement()),
					e = t.attr("class").match(be);
				null !== e && e.length && t.removeClass(e.join(""))
			}, t._handlePopperPlacementChange = function(t) {
				var e = t.instance;
				this.tip = e.popper, this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(t.placement))
			}, t._fixTransition = function() {
				var t = this.getTipElement(),
					e = this.config.animation;
				null === t.getAttribute("x-placement") && (pe(t).removeClass(Oe), this.config.animation = !1, this.hide(), this.show(), this.config.animation = e)
			}, i._jQueryInterface = function(n) {
				return this.each(function() {
					var t = pe(this).data(ye),
						e = "object" == typeof n && n;
					if ((t || !/dispose|hide/.test(n)) && (t || (t = new i(this, e), pe(this).data(ye, t)), "string" == typeof n)) {
						if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
						t[n]()
					}
				})
			}, s(i, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}, {
				key: "Default",
				get: function() {
					return Ae
				}
			}, {
				key: "NAME",
				get: function() {
					return ve
				}
			}, {
				key: "DATA_KEY",
				get: function() {
					return ye
				}
			}, {
				key: "Event",
				get: function() {
					return Ne
				}
			}, {
				key: "EVENT_KEY",
				get: function() {
					return Ee
				}
			}, {
				key: "DefaultType",
				get: function() {
					return Se
				}
			}]), i
		}(), pe.fn[ve] = We._jQueryInterface, pe.fn[ve].Constructor = We, pe.fn[ve].noConflict = function() {
			return pe.fn[ve] = Ce, We._jQueryInterface
		}, We),
		Jn = (qe = "popover", Ke = "." + (Fe = "bs.popover"), Me = (Ue = e).fn[qe], Qe = "bs-popover", Be = new RegExp("(^|\\s)" + Qe + "\\S+", "g"), Ve = l({}, zn.Default, {
			placement: "right",
			trigger: "click",
			content: "",
			template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
		}), Ye = l({}, zn.DefaultType, {
			content: "(string|element|function)"
		}), ze = "fade", Ze = ".popover-header", Ge = ".popover-body", $e = {
			HIDE: "hide" + Ke,
			HIDDEN: "hidden" + Ke,
			SHOW: (Je = "show") + Ke,
			SHOWN: "shown" + Ke,
			INSERTED: "inserted" + Ke,
			CLICK: "click" + Ke,
			FOCUSIN: "focusin" + Ke,
			FOCUSOUT: "focusout" + Ke,
			MOUSEENTER: "mouseenter" + Ke,
			MOUSELEAVE: "mouseleave" + Ke
		}, Xe = function(t) {
			var e, n;

			function i() {
				return t.apply(this, arguments) || this
			}
			n = t, (e = i).prototype = Object.create(n.prototype), (e.prototype.constructor = e).__proto__ = n;
			var r = i.prototype;
			return r.isWithContent = function() {
				return this.getTitle() || this._getContent()
			}, r.addAttachmentClass = function(t) {
				Ue(this.getTipElement()).addClass(Qe + "-" + t)
			}, r.getTipElement = function() {
				return this.tip = this.tip || Ue(this.config.template)[0], this.tip
			}, r.setContent = function() {
				var t = Ue(this.getTipElement());
				this.setElementContent(t.find(Ze), this.getTitle());
				var e = this._getContent();
				"function" == typeof e && (e = e.call(this.element)), this.setElementContent(t.find(Ge), e), t.removeClass(ze + " " + Je)
			}, r._getContent = function() {
				return this.element.getAttribute("data-content") || this.config.content
			}, r._cleanTipClass = function() {
				var t = Ue(this.getTipElement()),
					e = t.attr("class").match(Be);
				null !== e && 0 < e.length && t.removeClass(e.join(""))
			}, i._jQueryInterface = function(n) {
				return this.each(function() {
					var t = Ue(this).data(Fe),
						e = "object" == typeof n ? n : null;
					if ((t || !/destroy|hide/.test(n)) && (t || (t = new i(this, e), Ue(this).data(Fe, t)), "string" == typeof n)) {
						if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
						t[n]()
					}
				})
			}, s(i, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}, {
				key: "Default",
				get: function() {
					return Ve
				}
			}, {
				key: "NAME",
				get: function() {
					return qe
				}
			}, {
				key: "DATA_KEY",
				get: function() {
					return Fe
				}
			}, {
				key: "Event",
				get: function() {
					return $e
				}
			}, {
				key: "EVENT_KEY",
				get: function() {
					return Ke
				}
			}, {
				key: "DefaultType",
				get: function() {
					return Ye
				}
			}]), i
		}(zn), Ue.fn[qe] = Xe._jQueryInterface, Ue.fn[qe].Constructor = Xe, Ue.fn[qe].noConflict = function() {
			return Ue.fn[qe] = Me, Xe._jQueryInterface
		}, Xe),
		Zn = (en = "scrollspy", rn = "." + (nn = "bs.scrollspy"), on = (tn = e).fn[en], sn = {
			offset: 10,
			method: "auto",
			target: ""
		}, an = {
			offset: "number",
			method: "string",
			target: "(string|element)"
		}, ln = {
			ACTIVATE: "activate" + rn,
			SCROLL: "scroll" + rn,
			LOAD_DATA_API: "load" + rn + ".data-api"
		}, cn = "dropdown-item", hn = "active", un = '[data-spy="scroll"]', fn = ".active", dn = ".nav, .list-group", gn = ".nav-link", _n = ".nav-item", mn = ".list-group-item", pn = ".dropdown", vn = ".dropdown-item", yn = ".dropdown-toggle", En = "offset", Cn = "position", Tn = function() {
			function n(t, e) {
				var n = this;
				this._element = t, this._scrollElement = "BODY" === t.tagName ? window : t, this._config = this._getConfig(e), this._selector = this._config.target + " " + gn + "," + this._config.target + " " + mn + "," + this._config.target + " " + vn, this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, tn(this._scrollElement).on(ln.SCROLL, function(t) {
					return n._process(t)
				}), this.refresh(), this._process()
			}
			var t = n.prototype;
			return t.refresh = function() {
				var e = this,
					t = this._scrollElement === this._scrollElement.window ? En : Cn,
					r = "auto" === this._config.method ? t : this._config.method,
					o = r === Cn ? this._getScrollTop() : 0;
				this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), [].slice.call(document.querySelectorAll(this._selector)).map(function(t) {
					var e, n = Fn.getSelectorFromElement(t);
					if (n && (e = document.querySelector(n)), e) {
						var i = e.getBoundingClientRect();
						if (i.width || i.height) return [tn(e)[r]().top + o, n]
					}
					return null
				}).filter(function(t) {
					return t
				}).sort(function(t, e) {
					return t[0] - e[0]
				}).forEach(function(t) {
					e._offsets.push(t[0]), e._targets.push(t[1])
				})
			}, t.dispose = function() {
				tn.removeData(this._element, nn), tn(this._scrollElement).off(rn), this._element = null, this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null
			}, t._getConfig = function(t) {
				if ("string" != typeof(t = l({}, sn, "object" == typeof t && t ? t : {})).target) {
					var e = tn(t.target).attr("id");
					e || (e = Fn.getUID(en), tn(t.target).attr("id", e)), t.target = "#" + e
				}
				return Fn.typeCheckConfig(en, t, an), t
			}, t._getScrollTop = function() {
				return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop
			}, t._getScrollHeight = function() {
				return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)
			}, t._getOffsetHeight = function() {
				return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height
			}, t._process = function() {
				var t = this._getScrollTop() + this._config.offset,
					e = this._getScrollHeight(),
					n = this._config.offset + e - this._getOffsetHeight();
				if (this._scrollHeight !== e && this.refresh(), n <= t) {
					var i = this._targets[this._targets.length - 1];
					this._activeTarget !== i && this._activate(i)
				} else {
					if (this._activeTarget && t < this._offsets[0] && 0 < this._offsets[0]) return this._activeTarget = null, void this._clear();
					for (var r = this._offsets.length; r--;) {
						this._activeTarget !== this._targets[r] && t >= this._offsets[r] && ("undefined" == typeof this._offsets[r + 1] || t < this._offsets[r + 1]) && this._activate(this._targets[r])
					}
				}
			}, t._activate = function(e) {
				this._activeTarget = e, this._clear();
				var t = this._selector.split(",");
				t = t.map(function(t) {
					return t + '[data-target="' + e + '"],' + t + '[href="' + e + '"]'
				});
				var n = tn([].slice.call(document.querySelectorAll(t.join(","))));
				n.hasClass(cn) ? (n.closest(pn).find(yn).addClass(hn), n.addClass(hn)) : (n.addClass(hn), n.parents(dn).prev(gn + ", " + mn).addClass(hn), n.parents(dn).prev(_n).children(gn).addClass(hn)), tn(this._scrollElement).trigger(ln.ACTIVATE, {
					relatedTarget: e
				})
			}, t._clear = function() {
				var t = [].slice.call(document.querySelectorAll(this._selector));
				tn(t).filter(fn).removeClass(hn)
			}, n._jQueryInterface = function(e) {
				return this.each(function() {
					var t = tn(this).data(nn);
					if (t || (t = new n(this, "object" == typeof e && e), tn(this).data(nn, t)), "string" == typeof e) {
						if ("undefined" == typeof t[e]) throw new TypeError('No method named "' + e + '"');
						t[e]()
					}
				})
			}, s(n, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}, {
				key: "Default",
				get: function() {
					return sn
				}
			}]), n
		}(), tn(window).on(ln.LOAD_DATA_API, function() {
			for (var t = [].slice.call(document.querySelectorAll(un)), e = t.length; e--;) {
				var n = tn(t[e]);
				Tn._jQueryInterface.call(n, n.data())
			}
		}), tn.fn[en] = Tn._jQueryInterface, tn.fn[en].Constructor = Tn, tn.fn[en].noConflict = function() {
			return tn.fn[en] = on, Tn._jQueryInterface
		}, Tn),
		Gn = (In = "." + (Sn = "bs.tab"), An = (bn = e).fn.tab, Dn = {
			HIDE: "hide" + In,
			HIDDEN: "hidden" + In,
			SHOW: "show" + In,
			SHOWN: "shown" + In,
			CLICK_DATA_API: "click" + In + ".data-api"
		}, wn = "dropdown-menu", Nn = "active", On = "disabled", kn = "fade", Pn = "show", jn = ".dropdown", Hn = ".nav, .list-group", Ln = ".active", Rn = "> li > .active", xn = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', Wn = ".dropdown-toggle", Un = "> .dropdown-menu .active", qn = function() {
			function i(t) {
				this._element = t
			}
			var t = i.prototype;
			return t.show = function() {
				var n = this;
				if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && bn(this._element).hasClass(Nn) || bn(this._element).hasClass(On))) {
					var t, i, e = bn(this._element).closest(Hn)[0],
						r = Fn.getSelectorFromElement(this._element);
					if (e) {
						var o = "UL" === e.nodeName ? Rn : Ln;
						i = (i = bn.makeArray(bn(e).find(o)))[i.length - 1]
					}
					var s = bn.Event(Dn.HIDE, {
							relatedTarget: this._element
						}),
						a = bn.Event(Dn.SHOW, {
							relatedTarget: i
						});
					if (i && bn(i).trigger(s), bn(this._element).trigger(a), !a.isDefaultPrevented() && !s.isDefaultPrevented()) {
						r && (t = document.querySelector(r)), this._activate(this._element, e);
						var l = function() {
							var t = bn.Event(Dn.HIDDEN, {
									relatedTarget: n._element
								}),
								e = bn.Event(Dn.SHOWN, {
									relatedTarget: i
								});
							bn(i).trigger(t), bn(n._element).trigger(e)
						};
						t ? this._activate(t, t.parentNode, l) : l()
					}
				}
			}, t.dispose = function() {
				bn.removeData(this._element, Sn), this._element = null
			}, t._activate = function(t, e, n) {
				var i = this,
					r = ("UL" === e.nodeName ? bn(e).find(Rn) : bn(e).children(Ln))[0],
					o = n && r && bn(r).hasClass(kn),
					s = function() {
						return i._transitionComplete(t, r, n)
					};
				if (r && o) {
					var a = Fn.getTransitionDurationFromElement(r);
					bn(r).one(Fn.TRANSITION_END, s).emulateTransitionEnd(a)
				} else s()
			}, t._transitionComplete = function(t, e, n) {
				if (e) {
					bn(e).removeClass(Pn + " " + Nn);
					var i = bn(e.parentNode).find(Un)[0];
					i && bn(i).removeClass(Nn), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1)
				}
				if (bn(t).addClass(Nn), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0), Fn.reflow(t), bn(t).addClass(Pn), t.parentNode && bn(t.parentNode).hasClass(wn)) {
					var r = bn(t).closest(jn)[0];
					if (r) {
						var o = [].slice.call(r.querySelectorAll(Wn));
						bn(o).addClass(Nn)
					}
					t.setAttribute("aria-expanded", !0)
				}
				n && n()
			}, i._jQueryInterface = function(n) {
				return this.each(function() {
					var t = bn(this),
						e = t.data(Sn);
					if (e || (e = new i(this), t.data(Sn, e)), "string" == typeof n) {
						if ("undefined" == typeof e[n]) throw new TypeError('No method named "' + n + '"');
						e[n]()
					}
				})
			}, s(i, null, [{
				key: "VERSION",
				get: function() {
					return "4.1.3"
				}
			}]), i
		}(), bn(document).on(Dn.CLICK_DATA_API, xn, function(t) {
			t.preventDefault(), qn._jQueryInterface.call(bn(this), "show")
		}), bn.fn.tab = qn._jQueryInterface, bn.fn.tab.Constructor = qn, bn.fn.tab.noConflict = function() {
			return bn.fn.tab = An, qn._jQueryInterface
		}, qn);
	! function(t) {
		if ("undefined" == typeof t) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
		var e = t.fn.jquery.split(" ")[0].split(".");
		if (e[0] < 2 && e[1] < 9 || 1 === e[0] && 9 === e[1] && e[2] < 1 || 4 <= e[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0")
	}(e), t.Util = Fn, t.Alert = Kn, t.Button = Mn, t.Carousel = Qn, t.Collapse = Bn, t.Dropdown = Vn, t.Modal = Yn, t.Popover = Jn, t.Scrollspy = Zn, t.Tab = Gn, t.Tooltip = zn, Object.defineProperty(t, "__esModule", {
		value: !0
	})
});

! function(a, b) {
	"use strict";
	if (!b) throw new Error("Filterizr requires jQuery to work.");
	var c = function(a) {
		this.init(a)
	};
	c.prototype = {
		init: function(a) {
			this.root = {
				x: 0,
				y: 0,
				w: a
			}
		},
		fit: function(a) {
			var b, c, d, e = a.length,
				f = e > 0 ? a[0].h : 0;
			for (this.root.h = f, b = 0; b < e; b++) d = a[b], (c = this.findNode(this.root, d.w, d.h)) ? d.fit = this.splitNode(c, d.w, d.h) : d.fit = this.growDown(d.w, d.h)
		},
		findNode: function(a, b, c) {
			return a.used ? this.findNode(a.right, b, c) || this.findNode(a.down, b, c) : b <= a.w && c <= a.h ? a : null
		},
		splitNode: function(a, b, c) {
			return a.used = !0, a.down = {
				x: a.x,
				y: a.y + c,
				w: a.w,
				h: a.h - c
			}, a.right = {
				x: a.x + b,
				y: a.y,
				w: a.w - b,
				h: c
			}, a
		},
		growDown: function(a, b) {
			var c;
			return this.root = {
				used: !0,
				x: 0,
				y: 0,
				w: this.root.w,
				h: this.root.h + b,
				down: {
					x: 0,
					y: this.root.h,
					w: this.root.w,
					h: b
				},
				right: this.root
			}, (c = this.findNode(this.root, a, b)) ? this.splitNode(c, a, b) : null
		}
	}, b.fn.filterizr = function() {
		var a = this,
			c = arguments;
		if (a._fltr || (a._fltr = b.fn.filterizr.prototype.init(a, "object" == typeof c[0] ? c[0] : void 0)), "string" == typeof c[0]) {
			if (c[0].lastIndexOf("_") > -1) throw new Error("Filterizr error: You cannot call private methods");
			if ("function" != typeof a._fltr[c[0]]) throw new Error("Filterizr error: There is no such function");
			a._fltr[c[0]](c[1], c[2])
		}
		return a
	}, b.fn.filterizr.prototype = {
		init: function(a, c) {
			var d = b(a).extend(b.fn.filterizr.prototype);
			return d.options = {
				animationDuration: .5,
				callbacks: {
					onFilteringStart: function() {},
					onFilteringEnd: function() {},
					onShufflingStart: function() {},
					onShufflingEnd: function() {},
					onSortingStart: function() {},
					onSortingEnd: function() {}
				},
				delay: 0,
				delayMode: "progressive",
				easing: "ease-out",
				filter: "all",
				filterOutCss: {
					opacity: 0,
					transform: "scale(0.5)"
				},
				filterInCss: {
					opacity: 1,
					transform: "scale(1)"
				},
				layout: "sameSize",
				setupControls: !0
			}, 0 === arguments.length && (c = d.options), 1 === arguments.length && "object" == typeof arguments[0] && (c = arguments[0]), c && d.setOptions(c), d.css({
				padding: 0,
				position: "relative"
			}), d._lastCategory = 0, d._isAnimating = !1, d._isShuffling = !1, d._isSorting = !1, d._mainArray = d._getFiltrItems(), d._subArrays = d._makeSubarrays(), d._activeArray = d._getCollectionByFilter(d.options.filter), d._toggledCategories = {}, d._typedText = b("input[data-search]").val() || "", d._uID = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(a) {
				var b = 16 * Math.random() | 0;
				return ("x" == a ? b : 3 & b | 8).toString(16)
			}), d._setupEvents(), d.options.setupControls && d._setupControls(), d.filter(d.options.filter), d
		},
		filter: function(a) {
			var b = this,
				c = b._getCollectionByFilter(a);
			b.options.filter = a, b.trigger("filteringStart"), b._handleFiltering(c), b._isSearchActivated() && b.search(b._typedText)
		},
		toggleFilter: function(a) {
			var b = this,
				c = [];
			b.trigger("filteringStart"), a && (b._toggledCategories[a] ? delete b._toggledCategories[a] : b._toggledCategories[a] = !0), b._multifilterModeOn() ? (c = b._makeMultifilterArray(), b._handleFiltering(c), b._isSearchActivated() && b.search(b._typedText)) : (b.filter("all"), b._isSearchActivated() && b.search(b._typedText))
		},
		search: function(a) {
			var b = this,
				c = b._multifilterModeOn() ? b._makeMultifilterArray() : b._getCollectionByFilter(b.options.filter),
				d = [],
				e = 0;
			if (b._isSearchActivated())
				for (e = 0; e < c.length; e++) {
					var f = c[e].text().toLowerCase().indexOf(a.toLowerCase()) > -1;
					f && d.push(c[e])
				}
			if (d.length > 0) b._handleFiltering(d);
			else if (b._isSearchActivated())
				for (e = 0; e < b._activeArray.length; e++) b._activeArray[e]._filterOut();
			else b._handleFiltering(c)
		},
		shuffle: function() {
			var a = this;
			a._isAnimating = !0, a._isShuffling = !0, a.trigger("shufflingStart"), a._mainArray = a._fisherYatesShuffle(a._mainArray), a._subArrays = a._makeSubarrays();
			var b = a._multifilterModeOn() ? a._makeMultifilterArray() : a._getCollectionByFilter(a.options.filter);
			a._isSearchActivated() ? a.search(a._typedText) : a._placeItems(b)
		},
		sort: function(a, b) {
			var c = this;
			if (a = a || "domIndex", b = b || "asc", c._isAnimating = !0, c._isSorting = !0, c.trigger("sortingStart"), "domIndex" !== a && "sortData" !== a && "w" !== a && "h" !== a)
				for (var e = 0; e < c._mainArray.length; e++) c._mainArray[e][a] = c._mainArray[e].data(a);
			c._mainArray.sort(c._comparator(a, b)), c._subArrays = c._makeSubarrays();
			var f = c._multifilterModeOn() ? c._makeMultifilterArray() : c._getCollectionByFilter(c.options.filter);
			c._isSearchActivated() ? c.search(c._typedText) : c._placeItems(f)
		},
		setOptions: function(a) {
			var b = this,
				c = 0;
			for (var d in a) b.options[d] = a[d];
			if (b._mainArray && (a.animationDuration || a.delay || a.easing || a.delayMode))
				for (c = 0; c < b._mainArray.length; c++) b._mainArray[c].css("transition", "all " + b.options.animationDuration + "s " + b.options.easing + " " + b._mainArray[c]._calcDelay() + "ms");
			a.callbacks && (a.callbacks.onFilteringStart || (b.options.callbacks.onFilteringStart = function() {}), a.callbacks.onFilteringEnd || (b.options.callbacks.onFilteringEnd = function() {}), a.callbacks.onShufflingStart || (b.options.callbacks.onShufflingStart = function() {}), a.callbacks.onShufflingEnd || (b.options.callbacks.onShufflingEnd = function() {}), a.callbacks.onSortingStart || (b.options.callbacks.onSortingStart = function() {}), a.callbacks.onSortingEnd || (b.options.callbacks.onSortingEnd = function() {})), b.options.filterInCss.transform || (b.options.filterInCss.transform = "translate3d(0,0,0)"), b.options.filterOutCss.transform || (b.options.filterOutCss.transform = "translate3d(0,0,0)")
		},
		_getFiltrItems: function() {
			var a = this,
				c = b(a.find(".filtr-item")),
				e = [];
			return b.each(c, function(c, f) {
				var g = b(f).extend(d)._init(c, a);
				e.push(g)
			}), e
		},
		_makeSubarrays: function() {
			for (var a = this, b = [], c = 0; c < a._lastCategory; c++) b.push([]);
			for (c = 0; c < a._mainArray.length; c++)
				if ("object" == typeof a._mainArray[c]._category)
					for (var d = a._mainArray[c]._category.length, e = 0; e < d; e++) b[a._mainArray[c]._category[e] - 1].push(a._mainArray[c]);
				else b[a._mainArray[c]._category - 1].push(a._mainArray[c]);
			return b
		},
		_makeMultifilterArray: function() {
			for (var a = this, b = [], c = {}, d = 0; d < a._mainArray.length; d++) {
				var e = a._mainArray[d],
					f = !1,
					g = e.domIndex in c == !1;
				if (Array.isArray(e._category)) {
					for (var h = 0; h < e._category.length; h++)
						if (e._category[h] in a._toggledCategories) {
							f = !0;
							break
						}
				} else e._category in a._toggledCategories && (f = !0);
				g && f && (c[e.domIndex] = !0, b.push(e))
			}
			return b
		},
		_setupControls: function() {
			var a = this;
			b("*[data-filter]").click(function() {
				var c = b(this).data("filter");
				a.options.filter !== c && a.filter(c)
			}), b("*[data-multifilter]").click(function() {
				var c = b(this).data("multifilter");
				"all" === c ? (a._toggledCategories = {}, a.filter("all")) : a.toggleFilter(c)
			}), b("*[data-shuffle]").click(function() {
				a.shuffle()
			}), b("*[data-sortAsc]").click(function() {
				var c = b("*[data-sortOrder]").val();
				a.sort(c, "asc")
			}), b("*[data-sortDesc]").click(function() {
				var c = b("*[data-sortOrder]").val();
				a.sort(c, "desc")
			}), b("input[data-search]").keyup(function() {
				a._typedText = b(this).val(), a._delayEvent(function() {
					a.search(a._typedText)
				}, 250, a._uID)
			})
		},
		_setupEvents: function() {
			var c = this;
			b(a).resize(function() {
				c._delayEvent(function() {
					c.trigger("resizeFiltrContainer")
				}, 250, c._uID)
			}), c.on("resizeFiltrContainer", function() {
				c._multifilterModeOn() ? c.toggleFilter() : c.filter(c.options.filter)
			}).on("filteringStart", function() {
				c.options.callbacks.onFilteringStart()
			}).on("filteringEnd", function() {
				c.options.callbacks.onFilteringEnd()
			}).on("shufflingStart", function() {
				c._isShuffling = !0, c.options.callbacks.onShufflingStart()
			}).on("shufflingEnd", function() {
				c.options.callbacks.onShufflingEnd(), c._isShuffling = !1
			}).on("sortingStart", function() {
				c._isSorting = !0, c.options.callbacks.onSortingStart()
			}).on("sortingEnd", function() {
				c.options.callbacks.onSortingEnd(), c._isSorting = !1
			})
		},
		_calcItemPositions: function() {
			var a = this,
				d = a._activeArray,
				e = 0,
				f = Math.round(a.width() / a.find(".filtr-item").outerWidth()),
				g = 0,
				h = d[0].outerWidth(),
				i = 0,
				j = 0,
				k = 0,
				l = 0,
				m = 0,
				n = [];
			if ("packed" === a.options.layout) {
				b.each(a._activeArray, function(a, b) {
					b._updateDimensions()
				});
				var o = new c(a.outerWidth());
				for (o.fit(a._activeArray), l = 0; l < d.length; l++) n.push({
					left: d[l].fit.x,
					top: d[l].fit.y
				});
				e = o.root.h
			}
			if ("horizontal" === a.options.layout)
				for (g = 1, l = 1; l <= d.length; l++) h = d[l - 1].outerWidth(), i = d[l - 1].outerHeight(), n.push({
					left: j,
					top: k
				}), j += h, e < i && (e = i);
			else if ("vertical" === a.options.layout) {
				for (l = 1; l <= d.length; l++) i = d[l - 1].outerHeight(), n.push({
					left: j,
					top: k
				}), k += i;
				e = k
			} else if ("sameHeight" === a.options.layout) {
				g = 1;
				var p = a.outerWidth();
				for (l = 1; l <= d.length; l++) {
					h = d[l - 1].width();
					var q = d[l - 1].outerWidth(),
						r = 0;
					d[l] && (r = d[l].width()), n.push({
						left: j,
						top: k
					}), m = j + h + r, m > p ? (m = 0, j = 0, k += d[0].outerHeight(), g++) : j += q
				}
				e = g * d[0].outerHeight()
			} else if ("sameWidth" === a.options.layout) {
				for (l = 1; l <= d.length; l++) {
					if (n.push({
							left: j,
							top: k
						}), l % f == 0 && g++, j += h, k = 0, g > 0)
						for (m = g; m > 0;) k += d[l - f * m].outerHeight(), m--;
					l % f == 0 && (j = 0)
				}
				for (l = 0; l < f; l++) {
					for (var s = 0, t = l; d[t];) s += d[t].outerHeight(), t += f;
					s > e ? (e = s, s = 0) : s = 0
				}
			} else if ("sameSize" === a.options.layout) {
				for (l = 1; l <= d.length; l++) n.push({
					left: j,
					top: k
				}), j += h, l % f == 0 && (k += d[0].outerHeight(), j = 0);
				g = Math.ceil(d.length / f), e = g * d[0].outerHeight()
			}
			return a.css("height", e), n
		},
		_handleFiltering: function(a) {
			for (var b = this, c = b._getArrayOfUniqueItems(b._activeArray, a), d = 0; d < c.length; d++) c[d]._filterOut();
			b._activeArray = a, b._placeItems(a)
		},
		_multifilterModeOn: function() {
			var a = this;
			return Object.keys(a._toggledCategories).length > 0
		},
		_isSearchActivated: function() {
			return this._typedText.length > 0
		},
		_placeItems: function(a) {
			var b = this;
			b._isAnimating = !0, b._itemPositions = b._calcItemPositions();
			for (var c = 0; c < a.length; c++) a[c]._filterIn(b._itemPositions[c])
		},
		_getCollectionByFilter: function(a) {
			var b = this;
			return "all" === a ? b._mainArray : b._subArrays[a - 1]
		},
		_makeDeepCopy: function(a) {
			var b = {};
			for (var c in a) b[c] = a[c];
			return b
		},
		_comparator: function(a, b) {
			return function(c, d) {
				return "asc" === b ? c[a] < d[a] ? -1 : c[a] > d[a] ? 1 : 0 : "desc" === b ? d[a] < c[a] ? -1 : d[a] > c[a] ? 1 : 0 : void 0
			}
		},
		_getArrayOfUniqueItems: function(a, b) {
			var f, g, c = [],
				d = {},
				e = b.length;
			for (f = 0; f < e; f++) d[b[f].domIndex] = !0;
			for (e = a.length, f = 0; f < e; f++) g = a[f], g.domIndex in d || c.push(g);
			return c
		},
		_delayEvent: function() {
			var b = {};
			return function(a, c, d) {
				if (null === d) throw Error("UniqueID needed");
				b[d] && clearTimeout(b[d]), b[d] = setTimeout(a, c)
			}
		}(),
		_fisherYatesShuffle: function(b) {
			for (var d, e, c = b.length; c;) e = Math.floor(Math.random() * c--), d = b[c], b[c] = b[e], b[e] = d;
			return b
		}
	};
	var d = {
		_init: function(a, b) {
			var c = this;
			return c._parent = b, c._category = c._getCategory(), c._lastPos = {}, c.domIndex = a, c.sortData = c.data("sort"), c.w = 0, c.h = 0, c._isFilteredOut = !0, c._filteringOut = !1, c._filteringIn = !1, c.css(b.options.filterOutCss).css({
				"-webkit-backface-visibility": "hidden",
				perspective: "1000px",
				"-webkit-perspective": "1000px",
				"-webkit-transform-style": "preserve-3d",
				position: "absolute",
				transition: "all " + b.options.animationDuration + "s " + b.options.easing + " " + c._calcDelay() + "ms"
			}), c.on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
				c._onTransitionEnd()
			}), c
		},
		_updateDimensions: function() {
			var a = this;
			a.w = a.outerWidth(), a.h = a.outerHeight()
		},
		_calcDelay: function() {
			var a = this,
				b = 0;
			return "progressive" === a._parent.options.delayMode ? b = a._parent.options.delay * a.domIndex : a.domIndex % 2 == 0 && (b = a._parent.options.delay), b
		},
		_getCategory: function() {
			var a = this,
				b = a.data("category");
			if ("string" == typeof b) {
				b = b.split(", ");
				for (var c = 0; c < b.length; c++) {
					if (isNaN(parseInt(b[c]))) throw new Error("Filterizr: the value of data-category must be a number, starting from value 1 and increasing.");
					parseInt(b[c]) > a._parent._lastCategory && (a._parent._lastCategory = parseInt(b[c]))
				}
			} else b > a._parent._lastCategory && (a._parent._lastCategory = b);
			return b
		},
		_onTransitionEnd: function() {
			var a = this;
			a._filteringOut ? (b(a).addClass("filteredOut"), a._isFilteredOut = !0, a._filteringOut = !1) : a._filteringIn && (a._isFilteredOut = !1, a._filteringIn = !1), a._parent._isAnimating && (a._parent._isShuffling ? a._parent.trigger("shufflingEnd") : a._parent._isSorting ? a._parent.trigger("sortingEnd") : a._parent.trigger("filteringEnd"), a._parent._isAnimating = !1)
		},
		_filterOut: function() {
			var a = this,
				b = a._parent._makeDeepCopy(a._parent.options.filterOutCss);
			b.transform += " translate3d(" + a._lastPos.left + "px," + a._lastPos.top + "px, 0)", a.css(b), a.css("pointer-events", "none"), a._filteringOut = !0
		},
		_filterIn: function(a) {
			var c = this,
				d = c._parent._makeDeepCopy(c._parent.options.filterInCss);
			b(c).removeClass("filteredOut"), c._filteringIn = !0, c._lastPos = a, c.css("pointer-events", "auto"), d.transform += " translate3d(" + a.left + "px," + a.top + "px, 0)", c.css(d)
		}
	}
}(this, jQuery);

(function() {
	var MutationObserver, Util, WeakMap, getComputedStyle, getComputedStyleRX,
		bind = function(fn, me) {
			return function() {
				return fn.apply(me, arguments);
			};
		},
		indexOf = [].indexOf || function(item) {
			for (var i = 0, l = this.length; i < l; i++) {
				if (i in this && this[i] === item) return i;
			}
			return -1;
		};

	Util = (function() {
		function Util() {}

		Util.prototype.extend = function(custom, defaults) {
			var key, value;
			for (key in defaults) {
				value = defaults[key];
				if (custom[key] == null) {
					custom[key] = value;
				}
			}
			return custom;
		};

		Util.prototype.isMobile = function(agent) {
			return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(agent);
		};

		Util.prototype.createEvent = function(event, bubble, cancel, detail) {
			var customEvent;
			if (bubble == null) {
				bubble = false;
			}
			if (cancel == null) {
				cancel = false;
			}
			if (detail == null) {
				detail = null;
			}
			if (document.createEvent != null) {
				customEvent = document.createEvent('CustomEvent');
				customEvent.initCustomEvent(event, bubble, cancel, detail);
			} else if (document.createEventObject != null) {
				customEvent = document.createEventObject();
				customEvent.eventType = event;
			} else {
				customEvent.eventName = event;
			}
			return customEvent;
		};

		Util.prototype.emitEvent = function(elem, event) {
			if (elem.dispatchEvent != null) {
				return elem.dispatchEvent(event);
			} else if (event in (elem != null)) {
				return elem[event]();
			} else if (("on" + event) in(elem != null)) {
				return elem["on" + event]();
			}
		};

		Util.prototype.addEvent = function(elem, event, fn) {
			if (elem.addEventListener != null) {
				return elem.addEventListener(event, fn, false);
			} else if (elem.attachEvent != null) {
				return elem.attachEvent("on" + event, fn);
			} else {
				return elem[event] = fn;
			}
		};

		Util.prototype.removeEvent = function(elem, event, fn) {
			if (elem.removeEventListener != null) {
				return elem.removeEventListener(event, fn, false);
			} else if (elem.detachEvent != null) {
				return elem.detachEvent("on" + event, fn);
			} else {
				return delete elem[event];
			}
		};

		Util.prototype.innerHeight = function() {
			if ('innerHeight' in window) {
				return window.innerHeight;
			} else {
				return document.documentElement.clientHeight;
			}
		};

		return Util;

	})();

	WeakMap = this.WeakMap || this.MozWeakMap || (WeakMap = (function() {
		function WeakMap() {
			this.keys = [];
			this.values = [];
		}

		WeakMap.prototype.get = function(key) {
			var i, item, j, len, ref;
			ref = this.keys;
			for (i = j = 0, len = ref.length; j < len; i = ++j) {
				item = ref[i];
				if (item === key) {
					return this.values[i];
				}
			}
		};

		WeakMap.prototype.set = function(key, value) {
			var i, item, j, len, ref;
			ref = this.keys;
			for (i = j = 0, len = ref.length; j < len; i = ++j) {
				item = ref[i];
				if (item === key) {
					this.values[i] = value;
					return;
				}
			}
			this.keys.push(key);
			return this.values.push(value);
		};

		return WeakMap;

	})());

	MutationObserver = this.MutationObserver || this.WebkitMutationObserver || this.MozMutationObserver || (MutationObserver = (function() {
		function MutationObserver() {
			if (typeof console !== "undefined" && console !== null) {
				console.warn('MutationObserver is not supported by your browser.');
			}
			if (typeof console !== "undefined" && console !== null) {
				console.warn('WOW.js cannot detect dom mutations, please call .sync() after loading new content.');
			}
		}

		MutationObserver.notSupported = true;

		MutationObserver.prototype.observe = function() {};

		return MutationObserver;

	})());

	getComputedStyle = this.getComputedStyle || function(el, pseudo) {
		this.getPropertyValue = function(prop) {
			var ref;
			if (prop === 'float') {
				prop = 'styleFloat';
			}
			if (getComputedStyleRX.test(prop)) {
				prop.replace(getComputedStyleRX, function(_, _char) {
					return _char.toUpperCase();
				});
			}
			return ((ref = el.currentStyle) != null ? ref[prop] : void 0) || null;
		};
		return this;
	};

	getComputedStyleRX = /(\-([a-z]){1})/g;

	this.WOW = (function() {
		WOW.prototype.defaults = {
			boxClass: 'wow',
			animateClass: 'animated',
			offset: 0,
			mobile: true,
			live: true,
			callback: null
		};

		function WOW(options) {
			if (options == null) {
				options = {};
			}
			this.scrollCallback = bind(this.scrollCallback, this);
			this.scrollHandler = bind(this.scrollHandler, this);
			this.resetAnimation = bind(this.resetAnimation, this);
			this.start = bind(this.start, this);
			this.scrolled = true;
			this.config = this.util().extend(options, this.defaults);
			this.animationNameCache = new WeakMap();
			this.wowEvent = this.util().createEvent(this.config.boxClass);
		}

		WOW.prototype.init = function() {
			var ref;
			this.element = window.document.documentElement;
			if ((ref = document.readyState) === "interactive" || ref === "complete") {
				this.start();
			} else {
				this.util().addEvent(document, 'DOMContentLoaded', this.start);
			}
			return this.finished = [];
		};

		WOW.prototype.start = function() {
			var box, j, len, ref;
			this.stopped = false;
			this.boxes = (function() {
				var j, len, ref, results;
				ref = this.element.querySelectorAll("." + this.config.boxClass);
				results = [];
				for (j = 0, len = ref.length; j < len; j++) {
					box = ref[j];
					results.push(box);
				}
				return results;
			}).call(this);
			this.all = (function() {
				var j, len, ref, results;
				ref = this.boxes;
				results = [];
				for (j = 0, len = ref.length; j < len; j++) {
					box = ref[j];
					results.push(box);
				}
				return results;
			}).call(this);
			if (this.boxes.length) {
				if (this.disabled()) {
					this.resetStyle();
				} else {
					ref = this.boxes;
					for (j = 0, len = ref.length; j < len; j++) {
						box = ref[j];
						this.applyStyle(box, true);
					}
				}
			}
			if (!this.disabled()) {
				this.util().addEvent(window, 'scroll', this.scrollHandler);
				this.util().addEvent(window, 'resize', this.scrollHandler);
				this.interval = setInterval(this.scrollCallback, 50);
			}
			if (this.config.live) {
				return new MutationObserver((function(_this) {
					return function(records) {
						var k, len1, node, record, results;
						results = [];
						for (k = 0, len1 = records.length; k < len1; k++) {
							record = records[k];
							results.push((function() {
								var l, len2, ref1, results1;
								ref1 = record.addedNodes || [];
								results1 = [];
								for (l = 0, len2 = ref1.length; l < len2; l++) {
									node = ref1[l];
									results1.push(this.doSync(node));
								}
								return results1;
							}).call(_this));
						}
						return results;
					};
				})(this)).observe(document.body, {
					childList: true,
					subtree: true
				});
			}
		};

		WOW.prototype.stop = function() {
			this.stopped = true;
			this.util().removeEvent(window, 'scroll', this.scrollHandler);
			this.util().removeEvent(window, 'resize', this.scrollHandler);
			if (this.interval != null) {
				return clearInterval(this.interval);
			}
		};

		WOW.prototype.sync = function(element) {
			if (MutationObserver.notSupported) {
				return this.doSync(this.element);
			}
		};

		WOW.prototype.doSync = function(element) {
			var box, j, len, ref, results;
			if (element == null) {
				element = this.element;
			}
			if (element.nodeType !== 1) {
				return;
			}
			element = element.parentNode || element;
			ref = element.querySelectorAll("." + this.config.boxClass);
			results = [];
			for (j = 0, len = ref.length; j < len; j++) {
				box = ref[j];
				if (indexOf.call(this.all, box) < 0) {
					this.boxes.push(box);
					this.all.push(box);
					if (this.stopped || this.disabled()) {
						this.resetStyle();
					} else {
						this.applyStyle(box, true);
					}
					results.push(this.scrolled = true);
				} else {
					results.push(void 0);
				}
			}
			return results;
		};

		WOW.prototype.show = function(box) {
			this.applyStyle(box);
			box.className = box.className + " " + this.config.animateClass;
			if (this.config.callback != null) {
				this.config.callback(box);
			}
			this.util().emitEvent(box, this.wowEvent);
			this.util().addEvent(box, 'animationend', this.resetAnimation);
			this.util().addEvent(box, 'oanimationend', this.resetAnimation);
			this.util().addEvent(box, 'webkitAnimationEnd', this.resetAnimation);
			this.util().addEvent(box, 'MSAnimationEnd', this.resetAnimation);
			return box;
		};

		WOW.prototype.applyStyle = function(box, hidden) {
			var delay, duration, iteration;
			duration = box.getAttribute('data-wow-duration');
			delay = box.getAttribute('data-wow-delay');
			iteration = box.getAttribute('data-wow-iteration');
			return this.animate((function(_this) {
				return function() {
					return _this.customStyle(box, hidden, duration, delay, iteration);
				};
			})(this));
		};

		WOW.prototype.animate = (function() {
			if ('requestAnimationFrame' in window) {
				return function(callback) {
					return window.requestAnimationFrame(callback);
				};
			} else {
				return function(callback) {
					return callback();
				};
			}
		})();

		WOW.prototype.resetStyle = function() {
			var box, j, len, ref, results;
			ref = this.boxes;
			results = [];
			for (j = 0, len = ref.length; j < len; j++) {
				box = ref[j];
				results.push(box.style.visibility = 'visible');
			}
			return results;
		};

		WOW.prototype.resetAnimation = function(event) {
			var target;
			if (event.type.toLowerCase().indexOf('animationend') >= 0) {
				target = event.target || event.srcElement;
				return target.className = target.className.replace(this.config.animateClass, '').trim();
			}
		};

		WOW.prototype.customStyle = function(box, hidden, duration, delay, iteration) {
			if (hidden) {
				this.cacheAnimationName(box);
			}
			box.style.visibility = hidden ? 'hidden' : 'visible';
			if (duration) {
				this.vendorSet(box.style, {
					animationDuration: duration
				});
			}
			if (delay) {
				this.vendorSet(box.style, {
					animationDelay: delay
				});
			}
			if (iteration) {
				this.vendorSet(box.style, {
					animationIterationCount: iteration
				});
			}
			this.vendorSet(box.style, {
				animationName: hidden ? 'none' : this.cachedAnimationName(box)
			});
			return box;
		};

		WOW.prototype.vendors = ["moz", "webkit"];

		WOW.prototype.vendorSet = function(elem, properties) {
			var name, results, value, vendor;
			results = [];
			for (name in properties) {
				value = properties[name];
				elem["" + name] = value;
				results.push((function() {
					var j, len, ref, results1;
					ref = this.vendors;
					results1 = [];
					for (j = 0, len = ref.length; j < len; j++) {
						vendor = ref[j];
						results1.push(elem["" + vendor + (name.charAt(0).toUpperCase()) + (name.substr(1))] = value);
					}
					return results1;
				}).call(this));
			}
			return results;
		};

		WOW.prototype.vendorCSS = function(elem, property) {
			var j, len, ref, result, style, vendor;
			style = getComputedStyle(elem);
			result = style.getPropertyCSSValue(property);
			ref = this.vendors;
			for (j = 0, len = ref.length; j < len; j++) {
				vendor = ref[j];
				result = result || style.getPropertyCSSValue("-" + vendor + "-" + property);
			}
			return result;
		};

		WOW.prototype.animationName = function(box) {
			var animationName;
			try {
				animationName = this.vendorCSS(box, 'animation-name').cssText;
			} catch (_error) {
				animationName = getComputedStyle(box).getPropertyValue('animation-name');
			}
			if (animationName === 'none') {
				return '';
			} else {
				return animationName;
			}
		};

		WOW.prototype.cacheAnimationName = function(box) {
			return this.animationNameCache.set(box, this.animationName(box));
		};

		WOW.prototype.cachedAnimationName = function(box) {
			return this.animationNameCache.get(box);
		};

		WOW.prototype.scrollHandler = function() {
			return this.scrolled = true;
		};

		WOW.prototype.scrollCallback = function() {
			var box;
			if (this.scrolled) {
				this.scrolled = false;
				this.boxes = (function() {
					var j, len, ref, results;
					ref = this.boxes;
					results = [];
					for (j = 0, len = ref.length; j < len; j++) {
						box = ref[j];
						if (!(box)) {
							continue;
						}
						if (this.isVisible(box)) {
							this.show(box);
							continue;
						}
						results.push(box);
					}
					return results;
				}).call(this);
				if (!(this.boxes.length || this.config.live)) {
					return this.stop();
				}
			}
		};

		WOW.prototype.offsetTop = function(element) {
			var top;
			while (element.offsetTop === void 0) {
				element = element.parentNode;
			}
			top = element.offsetTop;
			while (element = element.offsetParent) {
				top += element.offsetTop;
			}
			return top;
		};

		WOW.prototype.isVisible = function(box) {
			var bottom, offset, top, viewBottom, viewTop;
			offset = box.getAttribute('data-wow-offset') || this.config.offset;
			viewTop = window.pageYOffset;
			viewBottom = viewTop + Math.min(this.element.clientHeight, this.util().innerHeight()) - offset;
			top = this.offsetTop(box);
			bottom = top + box.clientHeight;
			return top <= viewBottom && bottom >= viewTop;
		};

		WOW.prototype.util = function() {
			return this._util != null ? this._util : this._util = new Util();
		};

		WOW.prototype.disabled = function() {
			return !this.config.mobile && this.util().isMobile(navigator.userAgent);
		};

		return WOW;

	})();

}).call(this);

/*
 * VenoBox - jQuery Plugin
 * version: 1.8.2
 * @requires jQuery >= 1.7.0
 *
 * Examples at http://veno.es/venobox/
 * License: MIT License
 * License URI: https://github.com/nicolafranchini/VenoBox/blob/master/LICENSE
 * Copyright 2013-2017 Nicola Franchini - @nicolafranchini
 *
 */
! function(e) {
	"use strict";
	var o, t, a, i, s, n, c, r, d, l, v, u, b, p, m, f, h, g, k, x, y, w, C, _, P, B, E, O, U, D, M, N, V, z, R, X, Y, j, W, q;
	e.fn.extend({
		venobox: function($) {
			var I = this,
				A = {
					arrowsColor: "#B6B6B6",
					autoplay: !1,
					bgcolor: "#fff",
					border: "0",
					closeBackground: "#161617",
					closeColor: "#d2d2d2",
					framewidth: "",
					frameheight: "",
					infinigall: !1,
					htmlClose: "&times;",
					htmlNext: "<span>Next</span>",
					htmlPrev: "<span>Prev</span>",
					numeratio: !1,
					numerationBackground: "#161617",
					numerationColor: "#d2d2d2",
					numerationPosition: "top",
					overlayClose: !0,
					overlayColor: "rgba(23,23,23,0.85)",
					spinner: "double-bounce",
					spinColor: "#d2d2d2",
					titleattr: "title",
					titleBackground: "#161617",
					titleColor: "#d2d2d2",
					titlePosition: "top",
					cb_pre_open: function() {
						return !0
					},
					cb_post_open: function() {},
					cb_pre_close: function() {
						return !0
					},
					cb_post_close: function() {},
					cb_post_resize: function() {},
					cb_after_nav: function() {},
					cb_init: function() {}
				},
				H = e.extend(A, $);
			return H.cb_init(I), this.each(function() {
				function $() {
					y = O.data("gall"), h = O.data("numeratio"), b = O.data("infinigall"), p = e('.vbox-item[data-gall="' + y + '"]'), w = p.eq(p.index(O) + 1), C = p.eq(p.index(O) - 1), w.length || b !== !0 || (w = p.eq(0)), p.length > 1 ? (U = p.index(O) + 1, a.html(U + " / " + p.length)) : U = 1, h === !0 ? a.show() : a.hide(), "" !== x ? i.show() : i.hide(), w.length || b === !0 ? (e(".vbox-next").css("display", "block"), _ = !0) : (e(".vbox-next").css("display", "none"), _ = !1), p.index(O) > 0 || b === !0 ? (e(".vbox-prev").css("display", "block"), P = !0) : (e(".vbox-prev").css("display", "none"), P = !1), (P === !0 || _ === !0) && (r.on(ne.DOWN, T), r.on(ne.MOVE, Z), r.on(ne.UP, F))
				}

				function A(e) {
					return e.length < 1 ? !1 : m ? !1 : (m = !0, g = e.data("overlay") || e.data("overlaycolor"), v = e.data("framewidth"), u = e.data("frameheight"), s = e.data("border"), t = e.data("bgcolor"), d = e.data("href") || e.attr("href"), o = e.data("autoplay"), x = e.attr(e.data("titleattr")) || "", e === C && r.addClass("animated").addClass("swipe-right"), e === w && r.addClass("animated").addClass("swipe-left"), void r.animate({
						opacity: 0
					}, 500, function() {
						k.css("background", g), r.removeClass("animated").removeClass("swipe-left").removeClass("swipe-right").css({
							"margin-left": 0,
							"margin-right": 0
						}), "iframe" == e.data("vbtype") ? J() : "inline" == e.data("vbtype") ? oe() : "ajax" == e.data("vbtype") ? G() : "video" == e.data("vbtype") || "vimeo" == e.data("vbtype") || "youtube" == e.data("vbtype") ? K(o) : (r.html('<img src="' + d + '">'), te()), O = e, $(), m = !1, H.cb_after_nav(O, U, w, C)
					}))
				}

				function Q(e) {
					27 === e.keyCode && S(), 37 == e.keyCode && P === !0 && A(C), 39 == e.keyCode && _ === !0 && A(w)
				}

				function S() {
					var o = H.cb_pre_close(O, U, w, C);
					return o === !1 ? !1 : (e("body").off("keydown", Q).removeClass("vbox-open"), O.focus(), void k.animate({
						opacity: 0
					}, 500, function() {
						k.remove(), m = !1, H.cb_post_close()
					}))
				}

				function T(e) {
					r.addClass("animated"), V = R = e.pageY, z = X = e.pageX, D = !0
				}

				function Z(e) {
					if (D === !0) {
						X = e.pageX, R = e.pageY, j = X - z, W = R - V;
						var o = Math.abs(j),
							t = Math.abs(W);
						o > t && 100 >= o && (e.preventDefault(), r.css("margin-left", j))
					}
				}

				function F(e) {
					if (D === !0) {
						D = !1;
						var o = O,
							t = !1;
						Y = X - z, 0 > Y && _ === !0 && (o = w, t = !0), Y > 0 && P === !0 && (o = C, t = !0), Math.abs(Y) >= q && t === !0 ? A(o) : r.css({
							"margin-left": 0,
							"margin-right": 0
						})
					}
				}

				function G() {
					e.ajax({
						url: d,
						cache: !1
					}).done(function(e) {
						r.html('<div class="vbox-inline">' + e + "</div>"), te()
					}).fail(function() {
						r.html('<div class="vbox-inline"><p>Error retrieving contents, please retry</div>'), ae()
					})
				}

				function J() {
					r.html('<iframe class="venoframe" src="' + d + '"></iframe>'), ae()
				}

				function K(e) {
					var o, t = L(d),
						a = e ? "?rel=0&autoplay=1" : "?rel=0",
						i = a + ee(d);
					"vimeo" == t.type ? o = "https://player.vimeo.com/video/" : "youtube" == t.type && (o = "https://www.youtube.com/embed/"), r.html('<iframe class="venoframe vbvid" webkitallowfullscreen mozallowfullscreen allowfullscreen frameborder="0" src="' + o + t.id + i + '"></iframe>'), ae()
				}

				function L(e) {
					if (e.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/), RegExp.$3.indexOf("youtu") > -1) var o = "youtube";
					else if (RegExp.$3.indexOf("vimeo") > -1) var o = "vimeo";
					return {
						type: o,
						id: RegExp.$6
					}
				}

				function ee(e) {
					var o = "",
						t = decodeURIComponent(e),
						a = t.split("?");
					if (void 0 !== a[1]) {
						var i, s, n = a[1].split("&");
						for (s = 0; s < n.length; s++) i = n[s].split("="), o = o + "&" + i[0] + "=" + i[1]
					}
					return encodeURI(o)
				}

				function oe() {
					r.html('<div class="vbox-inline">' + e(d).html() + "</div>"), ae()
				}

				function te() {
					N = r.find("img"), N.length ? N.each(function() {
						e(this).one("load", function() {
							ae()
						})
					}) : ae()
				}

				function ae() {
					i.html(x), r.find(">:first-child").addClass("figlio").css({
						width: v,
						height: u,
						padding: s,
						background: t
					}), e("img.figlio").on("dragstart", function(e) {
						e.preventDefault()
					}), ie(), r.animate({
						opacity: "1"
					}, "slow", function() {})
				}

				function ie() {
					var o = r.outerHeight(),
						t = e(window).height();
					f = t > o + 60 ? (t - o) / 2 : "30px", r.css("margin-top", f), r.css("margin-bottom", f), H.cb_post_resize()
				}
				if (O = e(this), O.data("venobox")) return !0;
				I.VBclose = function() {
					S()
				}, O.addClass("vbox-item"), O.data("framewidth", H.framewidth), O.data("frameheight", H.frameheight), O.data("border", H.border), O.data("bgcolor", H.bgcolor), O.data("numeratio", H.numeratio), O.data("infinigall", H.infinigall), O.data("overlaycolor", H.overlayColor), O.data("titleattr", H.titleattr), O.data("venobox", !0), O.on("click", function(b) {
					b.preventDefault(), O = e(this);
					var p = H.cb_pre_open(O);
					if (p === !1) return !1;
					switch (I.VBnext = function() {
							A(w)
						}, I.VBprev = function() {
							A(C)
						}, g = O.data("overlay") || O.data("overlaycolor"), v = O.data("framewidth"), u = O.data("frameheight"), o = O.data("autoplay") || H.autoplay, s = O.data("border"), t = O.data("bgcolor"), _ = !1, P = !1, m = !1, d = O.data("href") || O.attr("href"), l = O.data("css") || "", x = O.attr(O.data("titleattr")) || "", B = '<div class="vbox-preloader">', H.spinner) {
						case "rotating-plane":
							B += '<div class="sk-rotating-plane"></div>';
							break;
						case "double-bounce":
							B += '<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>';
							break;
						case "wave":
							B += '<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>';
							break;
						case "wandering-cubes":
							B += '<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>';
							break;
						case "spinner-pulse":
							B += '<div class="sk-spinner sk-spinner-pulse"></div>';
							break;
						case "three-bounce":
							B += '<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>';
							break;
						case "cube-grid":
							B += '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>'
					}
					return B += "</div>", E = '<a class="vbox-next">' + H.htmlNext + '</a><a class="vbox-prev">' + H.htmlPrev + "</a>", M = '<div class="vbox-title"></div><div class="vbox-num">0/0</div><div class="vbox-close">' + H.htmlClose + "</div>", n = '<div class="vbox-overlay ' + l + '" style="background:' + g + '">' + B + '<div class="vbox-container"><div class="vbox-content"></div></div>' + M + E + "</div>", e("body").append(n).addClass("vbox-open"), e(".vbox-preloader .sk-child, .vbox-preloader .sk-rotating-plane, .vbox-preloader .sk-rect, .vbox-preloader .sk-cube, .vbox-preloader .sk-spinner-pulse").css("background-color", H.spinColor), k = e(".vbox-overlay"), c = e(".vbox-container"), r = e(".vbox-content"), a = e(".vbox-num"), i = e(".vbox-title"), i.css(H.titlePosition, "-1px"), i.css({
						color: H.titleColor,
						"background-color": H.titleBackground
					}), e(".vbox-close").css({
						color: H.closeColor,
						"background-color": H.closeBackground
					}), e(".vbox-num").css(H.numerationPosition, "-1px"), e(".vbox-num").css({
						color: H.numerationColor,
						"background-color": H.numerationBackground
					}), e(".vbox-next span, .vbox-prev span").css({
						"border-top-color": H.arrowsColor,
						"border-right-color": H.arrowsColor
					}), r.html(""), r.css("opacity", "0"), k.css("opacity", "0"), $(), k.animate({
						opacity: 1
					}, 250, function() {
						"iframe" == O.data("vbtype") ? J() : "inline" == O.data("vbtype") ? oe() : "ajax" == O.data("vbtype") ? G() : "video" == O.data("vbtype") || "vimeo" == O.data("vbtype") || "youtube" == O.data("vbtype") ? K(o) : (r.html('<img src="' + d + '">'), te()), H.cb_post_open(O, U, w, C)
					}), e("body").keydown(Q), e(".vbox-prev").on("click", function() {
						A(C)
					}), e(".vbox-next").on("click", function() {
						A(w)
					}), !1
				});
				var se = ".vbox-overlay";
				H.overlayClose || (se = ".vbox-close"), e(document).on("click", se, function(o) {
					(e(o.target).is(".vbox-overlay") || e(o.target).is(".vbox-content") || e(o.target).is(".vbox-close") || e(o.target).is(".vbox-preloader")) && S()
				}), z = 0, X = 0, Y = 0, q = 50, D = !1;
				var ne = {
						DOWN: "touchmousedown",
						UP: "touchmouseup",
						MOVE: "touchmousemove"
					},
					ce = function(o) {
						var t;
						switch (o.type) {
							case "mousedown":
								t = ne.DOWN;
								break;
							case "mouseup":
								t = ne.UP;
								break;
							case "mouseout":
								t = ne.UP;
								break;
							case "mousemove":
								t = ne.MOVE;
								break;
							default:
								return
						}
						var a = de(t, o, o.pageX, o.pageY);
						e(o.target).trigger(a)
					},
					re = function(o) {
						var t;
						switch (o.type) {
							case "touchstart":
								t = ne.DOWN;
								break;
							case "touchend":
								t = ne.UP;
								break;
							case "touchmove":
								t = ne.MOVE;
								break;
							default:
								return
						}
						var a, i = o.originalEvent.touches[0];
						a = t == ne.UP ? de(t, o, null, null) : de(t, o, i.pageX, i.pageY), e(o.target).trigger(a)
					},
					de = function(o, t, a, i) {
						return e.Event(o, {
							pageX: a,
							pageY: i,
							originalEvent: t
						})
					};
				"ontouchstart" in window ? (e(document).on("touchstart", re), e(document).on("touchmove", re), e(document).on("touchend", re)) : (e(document).on("mousedown", ce), e(document).on("mouseup", ce), e(document).on("mouseout", ce), e(document).on("mousemove", ce)), e(window).resize(function() {
					e(".vbox-content").length && setTimeout(ie(), 800)
				})
			})
		}
	})
}(jQuery);



(function() {

	// Scroll Variables (tweakable)
	var defaultOptions = {

		// Scrolling Core
		frameRate: 150, // [Hz]
		animationTime: 400, // [ms]
		stepSize: 100, // [px]

		// Pulse (less tweakable)
		// ratio of "tail" to "acceleration"
		pulseAlgorithm: true,
		pulseScale: 4,
		pulseNormalize: 1,

		// Acceleration
		accelerationDelta: 50, // 50
		accelerationMax: 3, // 3

		// Keyboard Settings
		keyboardSupport: true, // option
		arrowScroll: 50, // [px]

		// Other
		fixedBackground: true,
		excluded: ''
	};

	var options = defaultOptions;


	// Other Variables
	var isExcluded = false;
	var isFrame = false;
	var direction = {
		x: 0,
		y: 0
	};
	var initDone = false;
	var root = document.documentElement;
	var activeElement;
	var observer;
	var refreshSize;
	var deltaBuffer = [];
	var isMac = /^Mac/.test(navigator.platform);

	var key = {
		left: 37,
		up: 38,
		right: 39,
		down: 40,
		spacebar: 32,
		pageup: 33,
		pagedown: 34,
		end: 35,
		home: 36
	};
	var arrowKeys = {
		37: 1,
		38: 1,
		39: 1,
		40: 1
	};

	/***********************************************
	 * INITIALIZE
	 ***********************************************/

	/**
	 * Tests if smooth scrolling is allowed. Shuts down everything if not.
	 */
	function initTest() {
		if (options.keyboardSupport) {
			addEvent('keydown', keydown);
		}
	}

	/**
	 * Sets up scrolls array, determines if frames are involved.
	 */
	function init() {

		if (initDone || !document.body) return;

		initDone = true;

		var body = document.body;
		var html = document.documentElement;
		var windowHeight = window.innerHeight;
		var scrollHeight = body.scrollHeight;

		// check compat mode for root element
		root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
		activeElement = body;

		initTest();

		// Checks if this script is running in a frame
		if (top != self) {
			isFrame = true;
		}

		/**
		 * Safari 10 fixed it, Chrome fixed it in v45:
		 * This fixes a bug where the areas left and right to 
		 * the content does not trigger the onmousewheel event
		 * on some pages. e.g.: html, body { height: 100% }
		 */
		else if (isOldSafari &&
			scrollHeight > windowHeight &&
			(body.offsetHeight <= windowHeight ||
				html.offsetHeight <= windowHeight)) {

			var fullPageElem = document.createElement('div');
			fullPageElem.style.cssText = 'position:absolute; z-index:-10000; ' +
				'top:0; left:0; right:0; height:' +
				root.scrollHeight + 'px';
			document.body.appendChild(fullPageElem);

			// DOM changed (throttled) to fix height
			var pendingRefresh;
			refreshSize = function() {
				if (pendingRefresh) return; // could also be: clearTimeout(pendingRefresh);
				pendingRefresh = setTimeout(function() {
					if (isExcluded) return; // could be running after cleanup
					fullPageElem.style.height = '0';
					fullPageElem.style.height = root.scrollHeight + 'px';
					pendingRefresh = null;
				}, 500); // act rarely to stay fast
			};

			setTimeout(refreshSize, 10);

			addEvent('resize', refreshSize);

			// TODO: attributeFilter?
			var config = {
				attributes: true,
				childList: true,
				characterData: false
				// subtree: true
			};

			observer = new MutationObserver(refreshSize);
			observer.observe(body, config);

			if (root.offsetHeight <= windowHeight) {
				var clearfix = document.createElement('div');
				clearfix.style.clear = 'both';
				body.appendChild(clearfix);
			}
		}

		// disable fixed background
		if (!options.fixedBackground && !isExcluded) {
			body.style.backgroundAttachment = 'scroll';
			html.style.backgroundAttachment = 'scroll';
		}
	}

	/**
	 * Removes event listeners and other traces left on the page.
	 */
	function cleanup() {
		observer && observer.disconnect();
		removeEvent(wheelEvent, wheel);
		removeEvent('mousedown', mousedown);
		removeEvent('keydown', keydown);
		removeEvent('resize', refreshSize);
		removeEvent('load', init);
	}


	/************************************************
	 * SCROLLING 
	 ************************************************/

	var que = [];
	var pending = false;
	var lastScroll = Date.now();

	/**
	 * Pushes scroll actions to the scrolling queue.
	 */
	function scrollArray(elem, left, top) {

		directionCheck(left, top);

		if (options.accelerationMax != 1) {
			var now = Date.now();
			var elapsed = now - lastScroll;
			if (elapsed < options.accelerationDelta) {
				var factor = (1 + (50 / elapsed)) / 2;
				if (factor > 1) {
					factor = Math.min(factor, options.accelerationMax);
					left *= factor;
					top *= factor;
				}
			}
			lastScroll = Date.now();
		}

		// push a scroll command
		que.push({
			x: left,
			y: top,
			lastX: (left < 0) ? 0.99 : -0.99,
			lastY: (top < 0) ? 0.99 : -0.99,
			start: Date.now()
		});

		// don't act if there's a pending queue
		if (pending) {
			return;
		}

		var scrollWindow = (elem === document.body);

		var step = function(time) {

			var now = Date.now();
			var scrollX = 0;
			var scrollY = 0;

			for (var i = 0; i < que.length; i++) {

				var item = que[i];
				var elapsed = now - item.start;
				var finished = (elapsed >= options.animationTime);

				// scroll position: [0, 1]
				var position = (finished) ? 1 : elapsed / options.animationTime;

				// easing [optional]
				if (options.pulseAlgorithm) {
					position = pulse(position);
				}

				// only need the difference
				var x = (item.x * position - item.lastX) >> 0;
				var y = (item.y * position - item.lastY) >> 0;

				// add this to the total scrolling
				scrollX += x;
				scrollY += y;

				// update last values
				item.lastX += x;
				item.lastY += y;

				// delete and step back if it's over
				if (finished) {
					que.splice(i, 1);
					i--;
				}
			}

			// scroll left and top
			if (scrollWindow) {
				window.scrollBy(scrollX, scrollY);
			} else {
				if (scrollX) elem.scrollLeft += scrollX;
				if (scrollY) elem.scrollTop += scrollY;
			}

			// clean up if there's nothing left to do
			if (!left && !top) {
				que = [];
			}

			if (que.length) {
				requestFrame(step, elem, (1000 / options.frameRate + 1));
			} else {
				pending = false;
			}
		};

		// start a new queue of actions
		requestFrame(step, elem, 0);
		pending = true;
	}


	/***********************************************
	 * EVENTS
	 ***********************************************/

	/**
	 * Mouse wheel handler.
	 * @param {Object} event
	 */
	function wheel(event) {

		if (!initDone) {
			init();
		}

		var target = event.target;

		// leave early if default action is prevented   
		// or it's a zooming event with CTRL 
		if (event.defaultPrevented || event.ctrlKey) {
			return true;
		}

		// leave embedded content alone (flash & pdf)
		if (isNodeName(activeElement, 'embed') ||
			(isNodeName(target, 'embed') && /\.pdf/i.test(target.src)) ||
			isNodeName(activeElement, 'object') ||
			target.shadowRoot) {
			return true;
		}

		var deltaX = -event.wheelDeltaX || event.deltaX || 0;
		var deltaY = -event.wheelDeltaY || event.deltaY || 0;

		if (isMac) {
			if (event.wheelDeltaX && isDivisible(event.wheelDeltaX, 120)) {
				deltaX = -120 * (event.wheelDeltaX / Math.abs(event.wheelDeltaX));
			}
			if (event.wheelDeltaY && isDivisible(event.wheelDeltaY, 120)) {
				deltaY = -120 * (event.wheelDeltaY / Math.abs(event.wheelDeltaY));
			}
		}

		// use wheelDelta if deltaX/Y is not available
		if (!deltaX && !deltaY) {
			deltaY = -event.wheelDelta || 0;
		}

		// line based scrolling (Firefox mostly)
		if (event.deltaMode === 1) {
			deltaX *= 40;
			deltaY *= 40;
		}

		var overflowing = overflowingAncestor(target);

		// nothing to do if there's no element that's scrollable
		if (!overflowing) {
			// except Chrome iframes seem to eat wheel events, which we need to 
			// propagate up, if the iframe has nothing overflowing to scroll
			if (isFrame && isChrome) {
				// change target to iframe element itself for the parent frame
				Object.defineProperty(event, "target", {
					value: window.frameElement
				});
				return parent.wheel(event);
			}
			return true;
		}

		// check if it's a touchpad scroll that should be ignored
		if (isTouchpad(deltaY)) {
			return true;
		}

		// scale by step size
		// delta is 120 most of the time
		// synaptics seems to send 1 sometimes
		if (Math.abs(deltaX) > 1.2) {
			deltaX *= options.stepSize / 120;
		}
		if (Math.abs(deltaY) > 1.2) {
			deltaY *= options.stepSize / 120;
		}

		scrollArray(overflowing, deltaX, deltaY);
		event.preventDefault();
		scheduleClearCache();
	}

	/**
	 * Keydown event handler.
	 * @param {Object} event
	 */
	function keydown(event) {

		var target = event.target;
		var modifier = event.ctrlKey || event.altKey || event.metaKey ||
			(event.shiftKey && event.keyCode !== key.spacebar);

		// our own tracked active element could've been removed from the DOM
		if (!document.body.contains(activeElement)) {
			activeElement = document.activeElement;
		}

		// do nothing if user is editing text
		// or using a modifier key (except shift)
		// or in a dropdown
		// or inside interactive elements
		var inputNodeNames = /^(textarea|select|embed|object)$/i;
		var buttonTypes = /^(button|submit|radio|checkbox|file|color|image)$/i;
		if (event.defaultPrevented ||
			inputNodeNames.test(target.nodeName) ||
			isNodeName(target, 'input') && !buttonTypes.test(target.type) ||
			isNodeName(activeElement, 'video') ||
			isInsideYoutubeVideo(event) ||
			target.isContentEditable ||
			modifier) {
			return true;
		}

		// [spacebar] should trigger button press, leave it alone
		if ((isNodeName(target, 'button') ||
				isNodeName(target, 'input') && buttonTypes.test(target.type)) &&
			event.keyCode === key.spacebar) {
			return true;
		}

		// [arrwow keys] on radio buttons should be left alone
		if (isNodeName(target, 'input') && target.type == 'radio' &&
			arrowKeys[event.keyCode]) {
			return true;
		}

		var shift, x = 0,
			y = 0;
		var overflowing = overflowingAncestor(activeElement);

		if (!overflowing) {
			// Chrome iframes seem to eat key events, which we need to 
			// propagate up, if the iframe has nothing overflowing to scroll
			return (isFrame && isChrome) ? parent.keydown(event) : true;
		}

		var clientHeight = overflowing.clientHeight;

		if (overflowing == document.body) {
			clientHeight = window.innerHeight;
		}

		switch (event.keyCode) {
			case key.up:
				y = -options.arrowScroll;
				break;
			case key.down:
				y = options.arrowScroll;
				break;
			case key.spacebar: // (+ shift)
				shift = event.shiftKey ? 1 : -1;
				y = -shift * clientHeight * 0.9;
				break;
			case key.pageup:
				y = -clientHeight * 0.9;
				break;
			case key.pagedown:
				y = clientHeight * 0.9;
				break;
			case key.home:
				y = -overflowing.scrollTop;
				break;
			case key.end:
				var scroll = overflowing.scrollHeight - overflowing.scrollTop;
				var scrollRemaining = scroll - clientHeight;
				y = (scrollRemaining > 0) ? scrollRemaining + 10 : 0;
				break;
			case key.left:
				x = -options.arrowScroll;
				break;
			case key.right:
				x = options.arrowScroll;
				break;
			default:
				return true; // a key we don't care about
		}

		scrollArray(overflowing, x, y);
		event.preventDefault();
		scheduleClearCache();
	}

	/**
	 * Mousedown event only for updating activeElement
	 */
	function mousedown(event) {
		activeElement = event.target;
	}


	/***********************************************
	 * OVERFLOW
	 ***********************************************/

	var uniqueID = (function() {
		var i = 0;
		return function(el) {
			return el.uniqueID || (el.uniqueID = i++);
		};
	})();

	var cache = {}; // cleared out after a scrolling session
	var clearCacheTimer;

	//setInterval(function () { cache = {}; }, 10 * 1000);

	function scheduleClearCache() {
		clearTimeout(clearCacheTimer);
		clearCacheTimer = setInterval(function() {
			cache = {};
		}, 1 * 1000);
	}

	function setCache(elems, overflowing) {
		for (var i = elems.length; i--;)
			cache[uniqueID(elems[i])] = overflowing;
		return overflowing;
	}

	//  (body)                (root)
	//         | hidden | visible | scroll |  auto  |
	// hidden  |   no   |    no   |   YES  |   YES  |
	// visible |   no   |   YES   |   YES  |   YES  |
	// scroll  |   no   |   YES   |   YES  |   YES  |
	// auto    |   no   |   YES   |   YES  |   YES  |

	function overflowingAncestor(el) {
		var elems = [];
		var body = document.body;
		var rootScrollHeight = root.scrollHeight;
		do {
			var cached = cache[uniqueID(el)];
			if (cached) {
				return setCache(elems, cached);
			}
			elems.push(el);
			if (rootScrollHeight === el.scrollHeight) {
				var topOverflowsNotHidden = overflowNotHidden(root) && overflowNotHidden(body);
				var isOverflowCSS = topOverflowsNotHidden || overflowAutoOrScroll(root);
				if (isFrame && isContentOverflowing(root) ||
					!isFrame && isOverflowCSS) {
					return setCache(elems, getScrollRoot());
				}
			} else if (isContentOverflowing(el) && overflowAutoOrScroll(el)) {
				return setCache(elems, el);
			}
		} while (el = el.parentElement);
	}

	function isContentOverflowing(el) {
		return (el.clientHeight + 10 < el.scrollHeight);
	}

	// typically for <body> and <html>
	function overflowNotHidden(el) {
		var overflow = getComputedStyle(el, '').getPropertyValue('overflow-y');
		return (overflow !== 'hidden');
	}

	// for all other elements
	function overflowAutoOrScroll(el) {
		var overflow = getComputedStyle(el, '').getPropertyValue('overflow-y');
		return (overflow === 'scroll' || overflow === 'auto');
	}


	/***********************************************
	 * HELPERS
	 ***********************************************/

	function addEvent(type, fn) {
		window.addEventListener(type, fn, false);
	}

	function removeEvent(type, fn) {
		window.removeEventListener(type, fn, false);
	}

	function isNodeName(el, tag) {
		return (el.nodeName || '').toLowerCase() === tag.toLowerCase();
	}

	function directionCheck(x, y) {
		x = (x > 0) ? 1 : -1;
		y = (y > 0) ? 1 : -1;
		if (direction.x !== x || direction.y !== y) {
			direction.x = x;
			direction.y = y;
			que = [];
			lastScroll = 0;
		}
	}

	var deltaBufferTimer;

	if (window.localStorage && localStorage.SS_deltaBuffer) {
		try { // #46 Safari throws in private browsing for localStorage 
			deltaBuffer = localStorage.SS_deltaBuffer.split(',');
		} catch (e) {}
	}

	function isTouchpad(deltaY) {
		if (!deltaY) return;
		if (!deltaBuffer.length) {
			deltaBuffer = [deltaY, deltaY, deltaY];
		}
		deltaY = Math.abs(deltaY);
		deltaBuffer.push(deltaY);
		deltaBuffer.shift();
		clearTimeout(deltaBufferTimer);
		deltaBufferTimer = setTimeout(function() {
			try { // #46 Safari throws in private browsing for localStorage
				localStorage.SS_deltaBuffer = deltaBuffer.join(',');
			} catch (e) {}
		}, 1000);
		return !allDeltasDivisableBy(120) && !allDeltasDivisableBy(100);
	}

	function isDivisible(n, divisor) {
		return (Math.floor(n / divisor) == n / divisor);
	}

	function allDeltasDivisableBy(divisor) {
		return (isDivisible(deltaBuffer[0], divisor) &&
			isDivisible(deltaBuffer[1], divisor) &&
			isDivisible(deltaBuffer[2], divisor));
	}

	function isInsideYoutubeVideo(event) {
		var elem = event.target;
		var isControl = false;
		if (document.URL.indexOf('www.youtube.com/watch') != -1) {
			do {
				isControl = (elem.classList &&
					elem.classList.contains('html5-video-controls'));
				if (isControl) break;
			} while (elem = elem.parentNode);
		}
		return isControl;
	}

	var requestFrame = (function() {
		return (window.requestAnimationFrame ||
			window.webkitRequestAnimationFrame ||
			window.mozRequestAnimationFrame ||
			function(callback, element, delay) {
				window.setTimeout(callback, delay || (1000 / 60));
			});
	})();

	var MutationObserver = (window.MutationObserver ||
		window.WebKitMutationObserver ||
		window.MozMutationObserver);

	var getScrollRoot = (function() {
		var SCROLL_ROOT;
		return function() {
			if (!SCROLL_ROOT) {
				var dummy = document.createElement('div');
				dummy.style.cssText = 'height:10000px;width:1px;';
				document.body.appendChild(dummy);
				var bodyScrollTop = document.body.scrollTop;
				var docElScrollTop = document.documentElement.scrollTop;
				window.scrollBy(0, 3);
				if (document.body.scrollTop != bodyScrollTop)
					(SCROLL_ROOT = document.body);
				else
					(SCROLL_ROOT = document.documentElement);
				window.scrollBy(0, -3);
				document.body.removeChild(dummy);
			}
			return SCROLL_ROOT;
		};
	})();


	/***********************************************
	 * PULSE (by Michael Herf)
	 ***********************************************/

	/**
	 * Viscous fluid with a pulse for part and decay for the rest.
	 * - Applies a fixed force over an interval (a damped acceleration), and
	 * - Lets the exponential bleed away the velocity over a longer interval
	 * - Michael Herf, http://stereopsis.com/stopping/
	 */
	function pulse_(x) {
		var val, start, expx;
		// test
		x = x * options.pulseScale;
		if (x < 1) { // acceleartion
			val = x - (1 - Math.exp(-x));
		} else { // tail
			// the previous animation ended here:
			start = Math.exp(-1);
			// simple viscous drag
			x -= 1;
			expx = 1 - Math.exp(-x);
			val = start + (expx * (1 - start));
		}
		return val * options.pulseNormalize;
	}

	function pulse(x) {
		if (x >= 1) return 1;
		if (x <= 0) return 0;

		if (options.pulseNormalize == 1) {
			options.pulseNormalize /= pulse_(1);
		}
		return pulse_(x);
	}


	/***********************************************
	 * FIRST RUN
	 ***********************************************/

	var userAgent = window.navigator.userAgent;
	var isEdge = /Edge/.test(userAgent); // thank you MS
	var isChrome = /chrome/i.test(userAgent) && !isEdge;
	var isSafari = /safari/i.test(userAgent) && !isEdge;
	var isMobile = /mobile/i.test(userAgent);
	var isIEWin7 = /Windows NT 6.1/i.test(userAgent) && /rv:11/i.test(userAgent);
	var isOldSafari = isSafari && (/Version\/8/i.test(userAgent) || /Version\/9/i.test(userAgent));
	var isEnabledForBrowser = (isChrome || isSafari || isIEWin7) && !isMobile;

	var wheelEvent;
	if ('onwheel' in document.createElement('div'))
		wheelEvent = 'wheel';
	else if ('onmousewheel' in document.createElement('div'))
		wheelEvent = 'mousewheel';

	if (wheelEvent && isEnabledForBrowser) {
		addEvent(wheelEvent, wheel);
		addEvent('mousedown', mousedown);
		addEvent('load', init);
	}


	/***********************************************
	 * PUBLIC INTERFACE
	 ***********************************************/

	function SmoothScroll(optionsToSet) {
		for (var key in optionsToSet)
			if (defaultOptions.hasOwnProperty(key))
				options[key] = optionsToSet[key];
	}
	SmoothScroll.destroy = cleanup;

	if (window.SmoothScrollOptions) // async API
		SmoothScroll(window.SmoothScrollOptions);

	if (typeof define === 'function' && define.amd)
		define(function() {
			return SmoothScroll;
		});
	else if ('object' == typeof exports)
		module.exports = SmoothScroll;
	else
		window.SmoothScroll = SmoothScroll;

})();

! function(a, b) {
	"use strict";
	if (!b) throw new Error("Filterizr requires jQuery to work.");
	var c = function(a) {
		this.init(a)
	};
	c.prototype = {
		init: function(a) {
			this.root = {
				x: 0,
				y: 0,
				w: a
			}
		},
		fit: function(a) {
			var b, c, d, e = a.length,
				f = e > 0 ? a[0].h : 0;
			for (this.root.h = f, b = 0; b < e; b++) d = a[b], (c = this.findNode(this.root, d.w, d.h)) ? d.fit = this.splitNode(c, d.w, d.h) : d.fit = this.growDown(d.w, d.h)
		},
		findNode: function(a, b, c) {
			return a.used ? this.findNode(a.right, b, c) || this.findNode(a.down, b, c) : b <= a.w && c <= a.h ? a : null
		},
		splitNode: function(a, b, c) {
			return a.used = !0, a.down = {
				x: a.x,
				y: a.y + c,
				w: a.w,
				h: a.h - c
			}, a.right = {
				x: a.x + b,
				y: a.y,
				w: a.w - b,
				h: c
			}, a
		},
		growDown: function(a, b) {
			var c;
			return this.root = {
				used: !0,
				x: 0,
				y: 0,
				w: this.root.w,
				h: this.root.h + b,
				down: {
					x: 0,
					y: this.root.h,
					w: this.root.w,
					h: b
				},
				right: this.root
			}, (c = this.findNode(this.root, a, b)) ? this.splitNode(c, a, b) : null
		}
	}, b.fn.filterizr = function() {
		var a = this,
			c = arguments;
		if (a._fltr || (a._fltr = b.fn.filterizr.prototype.init(a, "object" == typeof c[0] ? c[0] : void 0)), "string" == typeof c[0]) {
			if (c[0].lastIndexOf("_") > -1) throw new Error("Filterizr error: You cannot call private methods");
			if ("function" != typeof a._fltr[c[0]]) throw new Error("Filterizr error: There is no such function");
			a._fltr[c[0]](c[1], c[2])
		}
		return a
	}, b.fn.filterizr.prototype = {
		init: function(a, c) {
			var d = b(a).extend(b.fn.filterizr.prototype);
			return d.options = {
				animationDuration: .5,
				callbacks: {
					onFilteringStart: function() {},
					onFilteringEnd: function() {},
					onShufflingStart: function() {},
					onShufflingEnd: function() {},
					onSortingStart: function() {},
					onSortingEnd: function() {}
				},
				delay: 0,
				delayMode: "progressive",
				easing: "ease-out",
				filter: "all",
				filterOutCss: {
					opacity: 0,
					transform: "scale(0.5)"
				},
				filterInCss: {
					opacity: 1,
					transform: "scale(1)"
				},
				layout: "sameSize",
				setupControls: !0
			}, 0 === arguments.length && (c = d.options), 1 === arguments.length && "object" == typeof arguments[0] && (c = arguments[0]), c && d.setOptions(c), d.css({
				padding: 0,
				position: "relative"
			}), d._lastCategory = 0, d._isAnimating = !1, d._isShuffling = !1, d._isSorting = !1, d._mainArray = d._getFiltrItems(), d._subArrays = d._makeSubarrays(), d._activeArray = d._getCollectionByFilter(d.options.filter), d._toggledCategories = {}, d._typedText = b("input[data-search]").val() || "", d._uID = "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(a) {
				var b = 16 * Math.random() | 0;
				return ("x" == a ? b : 3 & b | 8).toString(16)
			}), d._setupEvents(), d.options.setupControls && d._setupControls(), d.filter(d.options.filter), d
		},
		filter: function(a) {
			var b = this,
				c = b._getCollectionByFilter(a);
			b.options.filter = a, b.trigger("filteringStart"), b._handleFiltering(c), b._isSearchActivated() && b.search(b._typedText)
		},
		toggleFilter: function(a) {
			var b = this,
				c = [];
			b.trigger("filteringStart"), a && (b._toggledCategories[a] ? delete b._toggledCategories[a] : b._toggledCategories[a] = !0), b._multifilterModeOn() ? (c = b._makeMultifilterArray(), b._handleFiltering(c), b._isSearchActivated() && b.search(b._typedText)) : (b.filter("all"), b._isSearchActivated() && b.search(b._typedText))
		},
		search: function(a) {
			var b = this,
				c = b._multifilterModeOn() ? b._makeMultifilterArray() : b._getCollectionByFilter(b.options.filter),
				d = [],
				e = 0;
			if (b._isSearchActivated())
				for (e = 0; e < c.length; e++) {
					var f = c[e].text().toLowerCase().indexOf(a.toLowerCase()) > -1;
					f && d.push(c[e])
				}
			if (d.length > 0) b._handleFiltering(d);
			else if (b._isSearchActivated())
				for (e = 0; e < b._activeArray.length; e++) b._activeArray[e]._filterOut();
			else b._handleFiltering(c)
		},
		shuffle: function() {
			var a = this;
			a._isAnimating = !0, a._isShuffling = !0, a.trigger("shufflingStart"), a._mainArray = a._fisherYatesShuffle(a._mainArray), a._subArrays = a._makeSubarrays();
			var b = a._multifilterModeOn() ? a._makeMultifilterArray() : a._getCollectionByFilter(a.options.filter);
			a._isSearchActivated() ? a.search(a._typedText) : a._placeItems(b)
		},
		sort: function(a, b) {
			var c = this;
			if (a = a || "domIndex", b = b || "asc", c._isAnimating = !0, c._isSorting = !0, c.trigger("sortingStart"), "domIndex" !== a && "sortData" !== a && "w" !== a && "h" !== a)
				for (var e = 0; e < c._mainArray.length; e++) c._mainArray[e][a] = c._mainArray[e].data(a);
			c._mainArray.sort(c._comparator(a, b)), c._subArrays = c._makeSubarrays();
			var f = c._multifilterModeOn() ? c._makeMultifilterArray() : c._getCollectionByFilter(c.options.filter);
			c._isSearchActivated() ? c.search(c._typedText) : c._placeItems(f)
		},
		setOptions: function(a) {
			var b = this,
				c = 0;
			for (var d in a) b.options[d] = a[d];
			if (b._mainArray && (a.animationDuration || a.delay || a.easing || a.delayMode))
				for (c = 0; c < b._mainArray.length; c++) b._mainArray[c].css("transition", "all " + b.options.animationDuration + "s " + b.options.easing + " " + b._mainArray[c]._calcDelay() + "ms");
			a.callbacks && (a.callbacks.onFilteringStart || (b.options.callbacks.onFilteringStart = function() {}), a.callbacks.onFilteringEnd || (b.options.callbacks.onFilteringEnd = function() {}), a.callbacks.onShufflingStart || (b.options.callbacks.onShufflingStart = function() {}), a.callbacks.onShufflingEnd || (b.options.callbacks.onShufflingEnd = function() {}), a.callbacks.onSortingStart || (b.options.callbacks.onSortingStart = function() {}), a.callbacks.onSortingEnd || (b.options.callbacks.onSortingEnd = function() {})), b.options.filterInCss.transform || (b.options.filterInCss.transform = "translate3d(0,0,0)"), b.options.filterOutCss.transform || (b.options.filterOutCss.transform = "translate3d(0,0,0)")
		},
		_getFiltrItems: function() {
			var a = this,
				c = b(a.find(".filtr-item")),
				e = [];
			return b.each(c, function(c, f) {
				var g = b(f).extend(d)._init(c, a);
				e.push(g)
			}), e
		},
		_makeSubarrays: function() {
			for (var a = this, b = [], c = 0; c < a._lastCategory; c++) b.push([]);
			for (c = 0; c < a._mainArray.length; c++)
				if ("object" == typeof a._mainArray[c]._category)
					for (var d = a._mainArray[c]._category.length, e = 0; e < d; e++) b[a._mainArray[c]._category[e] - 1].push(a._mainArray[c]);
				else b[a._mainArray[c]._category - 1].push(a._mainArray[c]);
			return b
		},
		_makeMultifilterArray: function() {
			for (var a = this, b = [], c = {}, d = 0; d < a._mainArray.length; d++) {
				var e = a._mainArray[d],
					f = !1,
					g = e.domIndex in c == !1;
				if (Array.isArray(e._category)) {
					for (var h = 0; h < e._category.length; h++)
						if (e._category[h] in a._toggledCategories) {
							f = !0;
							break
						}
				} else e._category in a._toggledCategories && (f = !0);
				g && f && (c[e.domIndex] = !0, b.push(e))
			}
			return b
		},
		_setupControls: function() {
			var a = this;
			b("*[data-filter]").click(function() {
				var c = b(this).data("filter");
				a.options.filter !== c && a.filter(c)
			}), b("*[data-multifilter]").click(function() {
				var c = b(this).data("multifilter");
				"all" === c ? (a._toggledCategories = {}, a.filter("all")) : a.toggleFilter(c)
			}), b("*[data-shuffle]").click(function() {
				a.shuffle()
			}), b("*[data-sortAsc]").click(function() {
				var c = b("*[data-sortOrder]").val();
				a.sort(c, "asc")
			}), b("*[data-sortDesc]").click(function() {
				var c = b("*[data-sortOrder]").val();
				a.sort(c, "desc")
			}), b("input[data-search]").keyup(function() {
				a._typedText = b(this).val(), a._delayEvent(function() {
					a.search(a._typedText)
				}, 250, a._uID)
			})
		},
		_setupEvents: function() {
			var c = this;
			b(a).resize(function() {
				c._delayEvent(function() {
					c.trigger("resizeFiltrContainer")
				}, 250, c._uID)
			}), c.on("resizeFiltrContainer", function() {
				c._multifilterModeOn() ? c.toggleFilter() : c.filter(c.options.filter)
			}).on("filteringStart", function() {
				c.options.callbacks.onFilteringStart()
			}).on("filteringEnd", function() {
				c.options.callbacks.onFilteringEnd()
			}).on("shufflingStart", function() {
				c._isShuffling = !0, c.options.callbacks.onShufflingStart()
			}).on("shufflingEnd", function() {
				c.options.callbacks.onShufflingEnd(), c._isShuffling = !1
			}).on("sortingStart", function() {
				c._isSorting = !0, c.options.callbacks.onSortingStart()
			}).on("sortingEnd", function() {
				c.options.callbacks.onSortingEnd(), c._isSorting = !1
			})
		},
		_calcItemPositions: function() {
			var a = this,
				d = a._activeArray,
				e = 0,
				f = Math.round(a.width() / a.find(".filtr-item").outerWidth()),
				g = 0,
				h = d[0].outerWidth(),
				i = 0,
				j = 0,
				k = 0,
				l = 0,
				m = 0,
				n = [];
			if ("packed" === a.options.layout) {
				b.each(a._activeArray, function(a, b) {
					b._updateDimensions()
				});
				var o = new c(a.outerWidth());
				for (o.fit(a._activeArray), l = 0; l < d.length; l++) n.push({
					left: d[l].fit.x,
					top: d[l].fit.y
				});
				e = o.root.h
			}
			if ("horizontal" === a.options.layout)
				for (g = 1, l = 1; l <= d.length; l++) h = d[l - 1].outerWidth(), i = d[l - 1].outerHeight(), n.push({
					left: j,
					top: k
				}), j += h, e < i && (e = i);
			else if ("vertical" === a.options.layout) {
				for (l = 1; l <= d.length; l++) i = d[l - 1].outerHeight(), n.push({
					left: j,
					top: k
				}), k += i;
				e = k
			} else if ("sameHeight" === a.options.layout) {
				g = 1;
				var p = a.outerWidth();
				for (l = 1; l <= d.length; l++) {
					h = d[l - 1].width();
					var q = d[l - 1].outerWidth(),
						r = 0;
					d[l] && (r = d[l].width()), n.push({
						left: j,
						top: k
					}), m = j + h + r, m > p ? (m = 0, j = 0, k += d[0].outerHeight(), g++) : j += q
				}
				e = g * d[0].outerHeight()
			} else if ("sameWidth" === a.options.layout) {
				for (l = 1; l <= d.length; l++) {
					if (n.push({
							left: j,
							top: k
						}), l % f == 0 && g++, j += h, k = 0, g > 0)
						for (m = g; m > 0;) k += d[l - f * m].outerHeight(), m--;
					l % f == 0 && (j = 0)
				}
				for (l = 0; l < f; l++) {
					for (var s = 0, t = l; d[t];) s += d[t].outerHeight(), t += f;
					s > e ? (e = s, s = 0) : s = 0
				}
			} else if ("sameSize" === a.options.layout) {
				for (l = 1; l <= d.length; l++) n.push({
					left: j,
					top: k
				}), j += h, l % f == 0 && (k += d[0].outerHeight(), j = 0);
				g = Math.ceil(d.length / f), e = g * d[0].outerHeight()
			}
			return a.css("height", e), n
		},
		_handleFiltering: function(a) {
			for (var b = this, c = b._getArrayOfUniqueItems(b._activeArray, a), d = 0; d < c.length; d++) c[d]._filterOut();
			b._activeArray = a, b._placeItems(a)
		},
		_multifilterModeOn: function() {
			var a = this;
			return Object.keys(a._toggledCategories).length > 0
		},
		_isSearchActivated: function() {
			return this._typedText.length > 0
		},
		_placeItems: function(a) {
			var b = this;
			b._isAnimating = !0, b._itemPositions = b._calcItemPositions();
			for (var c = 0; c < a.length; c++) a[c]._filterIn(b._itemPositions[c])
		},
		_getCollectionByFilter: function(a) {
			var b = this;
			return "all" === a ? b._mainArray : b._subArrays[a - 1]
		},
		_makeDeepCopy: function(a) {
			var b = {};
			for (var c in a) b[c] = a[c];
			return b
		},
		_comparator: function(a, b) {
			return function(c, d) {
				return "asc" === b ? c[a] < d[a] ? -1 : c[a] > d[a] ? 1 : 0 : "desc" === b ? d[a] < c[a] ? -1 : d[a] > c[a] ? 1 : 0 : void 0
			}
		},
		_getArrayOfUniqueItems: function(a, b) {
			var f, g, c = [],
				d = {},
				e = b.length;
			for (f = 0; f < e; f++) d[b[f].domIndex] = !0;
			for (e = a.length, f = 0; f < e; f++) g = a[f], g.domIndex in d || c.push(g);
			return c
		},
		_delayEvent: function() {
			var b = {};
			return function(a, c, d) {
				if (null === d) throw Error("UniqueID needed");
				b[d] && clearTimeout(b[d]), b[d] = setTimeout(a, c)
			}
		}(),
		_fisherYatesShuffle: function(b) {
			for (var d, e, c = b.length; c;) e = Math.floor(Math.random() * c--), d = b[c], b[c] = b[e], b[e] = d;
			return b
		}
	};
	var d = {
		_init: function(a, b) {
			var c = this;
			return c._parent = b, c._category = c._getCategory(), c._lastPos = {}, c.domIndex = a, c.sortData = c.data("sort"), c.w = 0, c.h = 0, c._isFilteredOut = !0, c._filteringOut = !1, c._filteringIn = !1, c.css(b.options.filterOutCss).css({
				"-webkit-backface-visibility": "hidden",
				perspective: "1000px",
				"-webkit-perspective": "1000px",
				"-webkit-transform-style": "preserve-3d",
				position: "absolute",
				transition: "all " + b.options.animationDuration + "s " + b.options.easing + " " + c._calcDelay() + "ms"
			}), c.on("transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd", function() {
				c._onTransitionEnd()
			}), c
		},
		_updateDimensions: function() {
			var a = this;
			a.w = a.outerWidth(), a.h = a.outerHeight()
		},
		_calcDelay: function() {
			var a = this,
				b = 0;
			return "progressive" === a._parent.options.delayMode ? b = a._parent.options.delay * a.domIndex : a.domIndex % 2 == 0 && (b = a._parent.options.delay), b
		},
		_getCategory: function() {
			var a = this,
				b = a.data("category");
			if ("string" == typeof b) {
				b = b.split(", ");
				for (var c = 0; c < b.length; c++) {
					if (isNaN(parseInt(b[c]))) throw new Error("Filterizr: the value of data-category must be a number, starting from value 1 and increasing.");
					parseInt(b[c]) > a._parent._lastCategory && (a._parent._lastCategory = parseInt(b[c]))
				}
			} else b > a._parent._lastCategory && (a._parent._lastCategory = b);
			return b
		},
		_onTransitionEnd: function() {
			var a = this;
			a._filteringOut ? (b(a).addClass("filteredOut"), a._isFilteredOut = !0, a._filteringOut = !1) : a._filteringIn && (a._isFilteredOut = !1, a._filteringIn = !1), a._parent._isAnimating && (a._parent._isShuffling ? a._parent.trigger("shufflingEnd") : a._parent._isSorting ? a._parent.trigger("sortingEnd") : a._parent.trigger("filteringEnd"), a._parent._isAnimating = !1)
		},
		_filterOut: function() {
			var a = this,
				b = a._parent._makeDeepCopy(a._parent.options.filterOutCss);
			b.transform += " translate3d(" + a._lastPos.left + "px," + a._lastPos.top + "px, 0)", a.css(b), a.css("pointer-events", "none"), a._filteringOut = !0
		},
		_filterIn: function(a) {
			var c = this,
				d = c._parent._makeDeepCopy(c._parent.options.filterInCss);
			b(c).removeClass("filteredOut"), c._filteringIn = !0, c._lastPos = a, c.css("pointer-events", "auto"), d.transform += " translate3d(" + a.left + "px," + a.top + "px, 0)", c.css(d)
		}
	}
}(this, jQuery);

/*
 Sticky-kit v1.1.3 | MIT | Leaf Corcoran 2015 | http://leafo.net
*/
(function() {
	var c, f;
	c = window.jQuery;
	f = c(window);
	c.fn.stick_in_parent = function(b) {
		var A, w, J, n, B, K, p, q, L, k, E, t;
		null == b && (b = {});
		t = b.sticky_class;
		B = b.inner_scrolling;
		E = b.recalc_every;
		k = b.parent;
		q = b.offset_top;
		p = b.spacer;
		w = b.bottoming;
		null == q && (q = 0);
		null == k && (k = void 0);
		null == B && (B = !0);
		null == t && (t = "is_stuck");
		A = c(document);
		null == w && (w = !0);
		L = function(a) {
			var b;
			return window.getComputedStyle ? (a = window.getComputedStyle(a[0]), b = parseFloat(a.getPropertyValue("width")) + parseFloat(a.getPropertyValue("margin-left")) +
				parseFloat(a.getPropertyValue("margin-right")), "border-box" !== a.getPropertyValue("box-sizing") && (b += parseFloat(a.getPropertyValue("border-left-width")) + parseFloat(a.getPropertyValue("border-right-width")) + parseFloat(a.getPropertyValue("padding-left")) + parseFloat(a.getPropertyValue("padding-right"))), b) : a.outerWidth(!0)
		};
		J = function(a, b, n, C, F, u, r, G) {
			var v, H, m, D, I, d, g, x, y, z, h, l;
			if (!a.data("sticky_kit")) {
				a.data("sticky_kit", !0);
				I = A.height();
				g = a.parent();
				null != k && (g = g.closest(k));
				if (!g.length) throw "failed to find stick parent";
				v = m = !1;
				(h = null != p ? p && a.closest(p) : c("<div />")) && h.css("position", a.css("position"));
				x = function() {
					var d, f, e;
					if (!G && (I = A.height(), d = parseInt(g.css("border-top-width"), 10), f = parseInt(g.css("padding-top"), 10), b = parseInt(g.css("padding-bottom"), 10), n = g.offset().top + d + f, C = g.height(), m && (v = m = !1, null == p && (a.insertAfter(h), h.detach()), a.css({
							position: "",
							top: "",
							width: "",
							bottom: ""
						}).removeClass(t), e = !0), F = a.offset().top - (parseInt(a.css("margin-top"), 10) || 0) - q, u = a.outerHeight(!0), r = a.css("float"), h && h.css({
							width: L(a),
							height: u,
							display: a.css("display"),
							"vertical-align": a.css("vertical-align"),
							"float": r
						}), e)) return l()
				};
				x();
				if (u !== C) return D = void 0, d = q, z = E, l = function() {
						var c, l, e, k;
						if (!G && (e = !1, null != z && (--z, 0 >= z && (z = E, x(), e = !0)), e || A.height() === I || x(), e = f.scrollTop(), null != D && (l = e - D), D = e, m ? (w && (k = e + u + d > C + n, v && !k && (v = !1, a.css({
									position: "fixed",
									bottom: "",
									top: d
								}).trigger("sticky_kit:unbottom"))), e < F && (m = !1, d = q, null == p && ("left" !== r && "right" !== r || a.insertAfter(h), h.detach()), c = {
									position: "",
									width: "",
									top: ""
								}, a.css(c).removeClass(t).trigger("sticky_kit:unstick")),
								B && (c = f.height(), u + q > c && !v && (d -= l, d = Math.max(c - u, d), d = Math.min(q, d), m && a.css({
									top: d + "px"
								})))) : e > F && (m = !0, c = {
								position: "fixed",
								top: d
							}, c.width = "border-box" === a.css("box-sizing") ? a.outerWidth() + "px" : a.width() + "px", a.css(c).addClass(t), null == p && (a.after(h), "left" !== r && "right" !== r || h.append(a)), a.trigger("sticky_kit:stick")), m && w && (null == k && (k = e + u + d > C + n), !v && k))) return v = !0, "static" === g.css("position") && g.css({
							position: "relative"
						}), a.css({
							position: "absolute",
							bottom: b,
							top: "auto"
						}).trigger("sticky_kit:bottom")
					},
					y = function() {
						x();
						return l()
					}, H = function() {
						G = !0;
						f.off("touchmove", l);
						f.off("scroll", l);
						f.off("resize", y);
						c(document.body).off("sticky_kit:recalc", y);
						a.off("sticky_kit:detach", H);
						a.removeData("sticky_kit");
						a.css({
							position: "",
							bottom: "",
							top: "",
							width: ""
						});
						g.position("position", "");
						if (m) return null == p && ("left" !== r && "right" !== r || a.insertAfter(h), h.remove()), a.removeClass(t)
					}, f.on("touchmove", l), f.on("scroll", l), f.on("resize", y), c(document.body).on("sticky_kit:recalc", y), a.on("sticky_kit:detach", H), setTimeout(l,
						0)
			}
		};
		n = 0;
		for (K = this.length; n < K; n++) b = this[n], J(c(b));
		return this
	}
}).call(this);


/*
Author       : theme_crazy
Template Name: Manali - Tour & Travels Agency Template
Version      : 1.0
*/

(function($) {
	"use strict";

	// Preloader
	jQuery(window).on('load', function() {
		preloader();

		// Gallery Filter
		if (jQuery('.gallery-outer .gallery-items').length > 0) {
			jQuery('.gallery-outer .gallery-items').filterizr();
		}
		jQuery('#filter-list li').on("click", function() {
			jQuery('#filter-list li').removeClass('active');
			jQuery(this).addClass('active');
		});
	});

	// Animation section
	if (jQuery('.wow').length) {
		var wow = new WOW({
			boxClass: 'wow', // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset: 0, // distance to the element when triggering the animation (default is 0)
			mobile: true, // trigger animations on mobile devices (default is true)
			live: true // act on asynchronously loaded content (default is true)
		});
		wow.init();
	}

	// Popup
	jQuery('.venobox').venobox();

	jQuery("#sidebar").stick_in_parent();

	// Back to top 		
	jQuery('.back-top a').on('click', function(event) {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 800);
		return false;
	});

	jQuery(window).on('scroll', function() {

		// Back to top 
		if (jQuery(this).scrollTop() > 150) {
			jQuery('.back-top').fadeIn();
		} else {
			jQuery('.back-top').fadeOut();
		}
	});

	// Preload
	function preloader() {
		jQuery(".preloaderimg").fadeOut();
		jQuery(".preloader").delay(200).fadeOut("slow").delay(200, function() {
			jQuery(this).remove();
		});
	}

	// Slider Caption Animation 
	function doAnimations(elems) {
		//Cache the animationend event in a variable
		var animEndEv = 'webkitAnimationEnd animationend';

		elems.each(function() {
			var $this = $(this),
				$animationType = $this.data('animation');
			$this.addClass($animationType).one(animEndEv, function() {
				$this.removeClass($animationType);
			});
		});
	}

	//Variables on page load 
	var $myCarousel = $('#banner'),
		$firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");

	//Initialize carousel 
	$myCarousel.carousel();

	//Animate captions in first slide on page load 
	doAnimations($firstAnimatingElems);

	//Pause carousel  
	$myCarousel.carousel('pause');


	//Other slides to be animated on carousel slide event 
	$myCarousel.on('slide.bs.carousel', function(e) {
		var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
		doAnimations($animatingElems);
	});

})(jQuery);

button = document.querySelector('button');
datalist = document.querySelector('datalist');
select = document.querySelector('select');
options = select.options;

/* on arrow button click, show/hide the DDL*/
button.addEventListener('click', toggle_ddl);

function toggle_ddl() {
  if (datalist.style.display === '') {
    datalist.style.display = 'block';
    this.textContent = "▲";
    /* If input already has a value, select that option from DDL */
    var val = input.value;
    for (var i = 0; i < options.length; i++) {
      if (options[i].text === val) {
        select.selectedIndex = i;
        break;
      }
    }
  } else hide_select();
}

/* when user selects an option from DDL, write it to text field */
select.addEventListener('change', fill_input);

function fill_input() {
  input.value = options[this.selectedIndex].value;
  hide_select();
}

/* when user wants to type in text field, hide DDL */
input = document.querySelector('input');
input.addEventListener('focus', hide_select);

function hide_select() {
  datalist.style.display = '';
  button.textContent = "▼";
}


//datepicker

$('.input-group.date').datepicker({format: "dd.mm.yyyy"});