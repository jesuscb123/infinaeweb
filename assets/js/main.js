/**
 * Infinae — interacciones del sitio (vanilla JS, sin dependencias).
 */
(function () {
  "use strict";

  /* ---------- Navbar: fondo sólido al hacer scroll ---------- */
  var navbar = document.getElementById("siteNavbar");
  var backToTop = document.getElementById("backToTop");
  var lastScrollState = false;
  function onScroll() {
    var scrolled = window.scrollY > 40;
    if (navbar && scrolled !== lastScrollState) {
      navbar.classList.toggle("is-scrolled", scrolled);
      lastScrollState = scrolled;
    }
    if (backToTop) backToTop.classList.toggle("is-visible", window.scrollY > 480);
  }
  window.addEventListener("scroll", onScroll, { passive: true });

  /* ---------- Menú móvil ---------- */
  var navToggle = document.getElementById("navToggle");
  var navLinks = document.getElementById("navLinks");
  if (navToggle && navLinks) {
    navToggle.addEventListener("click", function () {
      var isOpen = navLinks.classList.toggle("is-open");
      navToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
      navToggle.setAttribute("aria-label", isOpen ? "Cerrar menú" : "Abrir menú");
      document.body.style.overflow = isOpen ? "hidden" : "";
    });
    navLinks.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        navLinks.classList.remove("is-open");
        navToggle.setAttribute("aria-expanded", "false");
        document.body.style.overflow = "";
      });
    });
  }

  /* ---------- Revelado de secciones al hacer scroll ---------- */
  var revealTargets = document.querySelectorAll(".reveal, .reveal-left, .reveal-right, .reveal-scale, .reveal-blur");
  if ("IntersectionObserver" in window) {
    var revealObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            revealObserver.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.15, rootMargin: "0px 0px -60px 0px" }
    );
    revealTargets.forEach(function (el) { revealObserver.observe(el); });
  } else {
    revealTargets.forEach(function (el) { el.classList.add("is-visible"); });
  }

  /* ---------- Tarjetas apiladas + swipe + popup (compromiso con la calidad) ---------- */
  var qualityModal = document.getElementById("qualityModal");
  var qualityStack = document.querySelector("[data-quality-stack]");
  var qualityCards = Array.prototype.slice.call(document.querySelectorAll("[data-quality-card]"));
  if (qualityModal && qualityStack && qualityCards.length) {
    var qualityPanel = qualityModal.querySelector(".quality-modal-panel");
    var qualityModalIcon = document.getElementById("qualityModalIcon");
    var qualityModalTitle = document.getElementById("qualityModalTitle");
    var qualityModalText = document.getElementById("qualityModalText");
    var qualityDots = Array.prototype.slice.call(document.querySelectorAll("[data-quality-dot]"));
    var prefersReducedMotion = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    var activeQualityCard = null;

    /* Orden de la pila: order[0] = tarjeta delantera (índice en qualityCards) */
    var order = qualityCards.map(function (_, i) { return i; });
    var isAnimatingSwipe = false;

    var layoutStack = function () {
      qualityCards.forEach(function (card, i) {
        var pos = order.indexOf(i);
        card.dataset.stackPos = String(pos);
        card.setAttribute("tabindex", pos === 0 ? "0" : "-1");
        card.setAttribute("aria-hidden", pos === 0 ? "false" : "true");
      });
      qualityDots.forEach(function (dot, i) {
        dot.classList.toggle("is-active", order[0] === i);
      });
    };
    layoutStack();

    var goToCard = function (cardIndex) {
      if (isAnimatingSwipe) return;
      var pos = order.indexOf(cardIndex);
      order.splice(pos, 1);
      order.unshift(cardIndex);
      layoutStack();
    };
    qualityDots.forEach(function (dot, i) {
      dot.addEventListener("click", function () { goToCard(i); });
    });

    var flyTransform = function (fromEl, toEl) {
      var fromRect = fromEl.getBoundingClientRect();
      var toRect = toEl.getBoundingClientRect();
      var scaleX = fromRect.width / toRect.width;
      var scaleY = fromRect.height / toRect.height;
      var dx = (fromRect.left + fromRect.width / 2) - (toRect.left + toRect.width / 2);
      var dy = (fromRect.top + fromRect.height / 2) - (toRect.top + toRect.height / 2);
      return "translate(" + dx.toFixed(1) + "px, " + dy.toFixed(1) + "px) scale(" + scaleX.toFixed(3) + ", " + scaleY.toFixed(3) + ")";
    };

    var openQualityModal = function (card) {
      activeQualityCard = card;
      var iconHtml = card.querySelector(".quality-card-icon").innerHTML;
      qualityModalIcon.innerHTML = iconHtml;
      qualityModalTitle.textContent = card.querySelector(".quality-card-title").textContent;
      qualityModalText.textContent = card.querySelector(".quality-card-text").textContent;

      card.classList.add("is-open");
      qualityModal.classList.add("is-open");
      qualityModal.setAttribute("aria-hidden", "false");
      document.body.style.overflow = "hidden";

      if (prefersReducedMotion) {
        qualityModal.classList.add("is-visible");
        qualityPanel.focus();
        return;
      }

      qualityPanel.style.transition = "none";
      qualityPanel.style.transform = flyTransform(card, qualityPanel);
      void qualityPanel.offsetWidth;
      qualityPanel.style.transition = "";
      requestAnimationFrame(function () {
        qualityModal.classList.add("is-visible");
        qualityPanel.style.transform = "";
        qualityPanel.focus();
      });
    };

    var closeQualityModal = function () {
      if (!activeQualityCard) return;
      var card = activeQualityCard;
      qualityModal.classList.remove("is-visible");
      qualityModal.setAttribute("aria-hidden", "true");
      document.body.style.overflow = "";

      var finish = function () {
        qualityModal.classList.remove("is-open");
        qualityPanel.style.transform = "";
        card.classList.remove("is-open");
        card.focus();
        activeQualityCard = null;
      };

      if (prefersReducedMotion) {
        finish();
        return;
      }

      qualityPanel.style.transform = flyTransform(card, qualityPanel);
      var onEnd = function (e) {
        if (e.target !== qualityPanel || e.propertyName !== "transform") return;
        qualityPanel.removeEventListener("transitionend", onEnd);
        finish();
      };
      qualityPanel.addEventListener("transitionend", onEnd);
      window.setTimeout(function () {
        qualityPanel.removeEventListener("transitionend", onEnd);
        if (activeQualityCard === card) finish();
      }, 600);
    };

    /* ---------- Arrastrar para pasar a la siguiente / pulsar para abrir ---------- */
    var CLICK_MAX_MOVE = 6;
    var SWIPE_THRESHOLD = 90;
    var drag = null;

    qualityStack.addEventListener("pointerdown", function (e) {
      if (isAnimatingSwipe || qualityModal.classList.contains("is-open")) return;
      var card = e.target.closest && e.target.closest("[data-quality-card]");
      if (!card || card.dataset.stackPos !== "0") return;
      drag = { card: card, startX: e.clientX, startY: e.clientY, dx: 0, dy: 0, moved: false, pointerId: e.pointerId };
      card.setPointerCapture(e.pointerId);
      card.classList.add("is-dragging");
    });

    qualityStack.addEventListener("pointermove", function (e) {
      if (!drag || e.pointerId !== drag.pointerId) return;
      drag.dx = e.clientX - drag.startX;
      drag.dy = e.clientY - drag.startY;
      if (!drag.moved && (Math.abs(drag.dx) > CLICK_MAX_MOVE || Math.abs(drag.dy) > CLICK_MAX_MOVE)) drag.moved = true;
      if (!drag.moved) return;
      var rotate = drag.dx * 0.035;
      drag.card.style.transform = "translate(-50%, -50%) translate(" + drag.dx.toFixed(1) + "px, " + drag.dy.toFixed(1) + "px) rotate(" + rotate.toFixed(2) + "deg)";
    });

    var endDrag = function (e) {
      if (!drag || e.pointerId !== drag.pointerId) return;
      var card = drag.card;
      var dx = drag.dx;
      var dy = drag.dy;
      var moved = drag.moved;
      card.classList.remove("is-dragging");
      if (card.hasPointerCapture(drag.pointerId)) card.releasePointerCapture(drag.pointerId);
      drag = null;

      if (!moved) {
        card.style.transform = "";
        openQualityModal(card);
        return;
      }

      if (Math.abs(dx) > SWIPE_THRESHOLD) {
        isAnimatingSwipe = true;
        var cardIndex = qualityCards.indexOf(card);
        order.splice(order.indexOf(cardIndex), 1);
        order.push(cardIndex);
        layoutStack();
        card.style.transform = "";
        var settled = false;
        var onSwipeEnd = function (ev) {
          if (ev.target !== card || ev.propertyName !== "transform" || settled) return;
          settled = true;
          card.removeEventListener("transitionend", onSwipeEnd);
          isAnimatingSwipe = false;
        };
        card.addEventListener("transitionend", onSwipeEnd);
        window.setTimeout(function () {
          if (settled) return;
          settled = true;
          card.removeEventListener("transitionend", onSwipeEnd);
          isAnimatingSwipe = false;
        }, 550);
      } else {
        card.style.transition = "";
        card.style.transform = "";
      }
    };
    qualityStack.addEventListener("pointerup", endDrag);
    qualityStack.addEventListener("pointercancel", endDrag);

    qualityCards.forEach(function (card) {
      card.addEventListener("keydown", function (e) {
        if ((e.key === "Enter" || e.key === " ") && card.dataset.stackPos === "0") {
          e.preventDefault();
          openQualityModal(card);
        }
      });
    });
    qualityModal.querySelectorAll("[data-quality-close]").forEach(function (el) {
      el.addEventListener("click", closeQualityModal);
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && qualityModal.classList.contains("is-open")) closeQualityModal();
    });
  }

  /* ---------- Contadores animados (cifras reales del contenido) ---------- */
  var counterEls = document.querySelectorAll("[data-count-to]");
  if (counterEls.length) {
    if ("IntersectionObserver" in window) {
      var counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          counterObserver.unobserve(entry.target);
          var el = entry.target;
          var target = parseInt(el.getAttribute("data-count-to"), 10) || 0;
          var duration = 800;
          var start = null;
          function step(ts) {
            if (start === null) start = ts;
            var progress = Math.min((ts - start) / duration, 1);
            var eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = String(Math.round(eased * target));
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = String(target);
          }
          requestAnimationFrame(step);
        });
      }, { threshold: 0.4 });
      counterEls.forEach(function (el) { counterObserver.observe(el); });
    } else {
      counterEls.forEach(function (el) { el.textContent = el.getAttribute("data-count-to"); });
    }
  }

  /* ---------- Storytelling de metodología: paralaje del numeral + trazo de la línea ---------- */
  var storyActs = Array.prototype.slice.call(document.querySelectorAll("[data-story-act]"));
  if (storyActs.length) {
    var prefersReducedMotionStory = window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    var storyTicking = false;
    var updateStoryScroll = function () {
      storyActs.forEach(function (act) {
        var rect = act.getBoundingClientRect();
        var vh = window.innerHeight;
        var total = rect.height + vh * 0.6;
        var progress = Math.min(Math.max((vh * 0.85 - rect.top) / total, 0), 1);

        if (!prefersReducedMotionStory) {
          var numeral = act.querySelector(".story-act-numeral");
          if (numeral) numeral.style.transform = "translateY(" + ((progress - 0.5) * -46).toFixed(1) + "px)";
        }

        var line = act.querySelector(".story-moments-line");
        if (line) line.style.setProperty("--story-line-progress", (1 - progress).toFixed(3));
      });
    };
    updateStoryScroll();
    window.addEventListener("scroll", function () {
      if (storyTicking) return;
      storyTicking = true;
      requestAnimationFrame(function () { updateStoryScroll(); storyTicking = false; });
    }, { passive: true });
    window.addEventListener("resize", updateStoryScroll);
  }

  /* ---------- Tilt 3D delegado (galería, equipamiento, tarjetas de contacto) ---------- */
  var TILT_MAX_DEG = 6;
  document.querySelectorAll("[data-tilt-group]").forEach(function (container) {
    container.addEventListener("pointermove", function (e) {
      var target = e.target.closest ? e.target.closest("[data-tilt]") : null;
      if (!target || !container.contains(target)) return;
      var rect = target.getBoundingClientRect();
      var px = (e.clientX - rect.left) / rect.width;
      var py = (e.clientY - rect.top) / rect.height;
      var tiltX = (0.5 - py) * (TILT_MAX_DEG * 2);
      var tiltY = (px - 0.5) * (TILT_MAX_DEG * 2);
      target.style.setProperty("--tilt-x", tiltX.toFixed(2) + "deg");
      target.style.setProperty("--tilt-y", tiltY.toFixed(2) + "deg");
    });
    container.addEventListener("pointerleave", function () {
      container.querySelectorAll("[data-tilt]").forEach(function (t) {
        t.style.setProperty("--tilt-x", "0deg");
        t.style.setProperty("--tilt-y", "0deg");
      });
    }, true);
  });

  /* ---------- Botones magnéticos ---------- */
  document.querySelectorAll(".btn-magnetic").forEach(function (btn) {
    var label = btn.querySelector(".btn-magnetic-label") || btn;
    btn.addEventListener("pointermove", function (e) {
      var rect = btn.getBoundingClientRect();
      var mx = (e.clientX - rect.left - rect.width / 2) * 0.3;
      var my = (e.clientY - rect.top - rect.height / 2) * 0.3;
      label.style.setProperty("--mx", mx.toFixed(1) + "px");
      label.style.setProperty("--my", my.toFixed(1) + "px");
    });
    btn.addEventListener("pointerleave", function () {
      label.style.setProperty("--mx", "0px");
      label.style.setProperty("--my", "0px");
    });
  });

  /* ---------- Línea de progreso del timeline (scroll-scrubbed) ---------- */
  var timelineEl = document.querySelector(".process-timeline");
  var timelineStepCount = timelineEl ? timelineEl.querySelectorAll(".process-step").length : 0;
  if (timelineEl && timelineStepCount) {
    var timelineTicking = false;
    var updateTimelineProgress = function () {
      var rect = timelineEl.getBoundingClientRect();
      var vh = window.innerHeight;
      var total = rect.height + vh * 0.55;
      var progressed = vh * 0.85 - rect.top;
      var progress = Math.min(Math.max(progressed / total, 0), 1);
      for (var i = 1; i <= timelineStepCount; i++) {
        var segProgress = Math.min(Math.max(progress * timelineStepCount - (i - 1), 0), 1);
        timelineEl.style.setProperty("--progress-" + i, segProgress.toFixed(3));
      }
    };
    var onTimelineScroll = function () {
      if (timelineTicking) return;
      timelineTicking = true;
      requestAnimationFrame(function () {
        updateTimelineProgress();
        timelineTicking = false;
      });
    };
    updateTimelineProgress();
    window.addEventListener("scroll", onTimelineScroll, { passive: true });
    window.addEventListener("resize", onTimelineScroll);
  }

  /* ---------- Botón volver arriba ---------- */
  if (backToTop) {
    backToTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ---------- Banner de cookies (localStorage, 1 año) ---------- */
  var COOKIE_KEY = "infinae_cookie_consent";
  var ONE_YEAR_MS = 365 * 24 * 60 * 60 * 1000;
  var cookieBanner = document.getElementById("cookieBanner");
  var cookieAccept = document.getElementById("cookieAccept");
  var cookieReject = document.getElementById("cookieReject");

  function getConsent() {
    try {
      var raw = localStorage.getItem(COOKIE_KEY);
      if (!raw) return null;
      var data = JSON.parse(raw);
      if (Date.now() - data.ts > ONE_YEAR_MS) return null;
      return data.value;
    } catch (e) {
      return null;
    }
  }
  function setConsent(value) {
    try {
      localStorage.setItem(COOKIE_KEY, JSON.stringify({ value: value, ts: Date.now() }));
    } catch (e) { /* localStorage no disponible: se preguntará de nuevo */ }
    if (cookieBanner) cookieBanner.classList.remove("is-visible");
  }
  if (cookieBanner && getConsent() === null) {
    window.setTimeout(function () { cookieBanner.classList.add("is-visible"); }, 700);
  }
  if (cookieAccept) cookieAccept.addEventListener("click", function () { setConsent("accepted"); });
  if (cookieReject) cookieReject.addEventListener("click", function () { setConsent("rejected"); });

  /* ---------- Galería / lightbox ---------- */
  var lightbox = document.getElementById("lightbox");
  var lightboxImg = document.getElementById("lightboxImg");
  var lightboxCaption = document.getElementById("lightboxCaption");
  var lightboxClose = document.getElementById("lightboxClose");
  var lastFocusedEl = null;

  if (lightbox && lightboxImg && lightboxCaption && lightboxClose) {
    document.querySelectorAll(".gallery-item").forEach(function (item) {
      item.setAttribute("tabindex", "0");
      item.setAttribute("role", "button");
      item.setAttribute("aria-label", "Ampliar foto: " + item.getAttribute("data-caption"));
      function open() {
        lastFocusedEl = document.activeElement;
        var img = item.querySelector("img");
        lightboxImg.src = img.src;
        lightboxImg.alt = img.alt;
        lightboxCaption.textContent = item.getAttribute("data-caption") || "";
        lightbox.classList.add("is-open");
        lightboxClose.focus();
      }
      item.addEventListener("click", open);
      item.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") { e.preventDefault(); open(); }
      });
    });
    var closeLightbox = function () {
      lightbox.classList.remove("is-open");
      lightboxImg.src = "";
      if (lastFocusedEl) lastFocusedEl.focus();
    };
    lightboxClose.addEventListener("click", closeLightbox);
    lightbox.addEventListener("click", function (e) {
      if (e.target === lightbox) closeLightbox();
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && lightbox.classList.contains("is-open")) closeLightbox();
    });
  }

  /* ---------- Filtro de categorías (galería de instalaciones) ---------- */
  var installationTabs = document.querySelectorAll("[data-installation-tab]");
  var installationItems = document.querySelectorAll(".installation-item");
  if (installationTabs.length && installationItems.length) {
    installationTabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        var category = tab.getAttribute("data-installation-tab");
        installationTabs.forEach(function (t) {
          var isActive = t === tab;
          t.classList.toggle("is-active", isActive);
          t.setAttribute("aria-selected", isActive ? "true" : "false");
        });
        installationItems.forEach(function (item) {
          item.classList.toggle("is-active", item.getAttribute("data-category") === category);
        });
      });
    });
  }

  /* ---------- Formulario de contacto ---------- */
  var form = document.getElementById("contactForm");
  if (form) {
    var formStatus = document.getElementById("formStatus");
    var submitBtn = form.querySelector(".form-submit");
    var submitLabel = submitBtn.querySelector(".submit-label");

    var validateField = function (field) {
      var row = field.closest(".form-row");
      var valid = field.checkValidity();
      row.classList.toggle("has-error", !valid);
      return valid;
    };

    form.querySelectorAll("input[required], textarea[required]").forEach(function (field) {
      field.addEventListener("blur", function () { validateField(field); });
    });

    form.addEventListener("submit", function (e) {
      e.preventDefault();
      var fields = form.querySelectorAll("input[required], textarea[required]");
      var allValid = true;
      fields.forEach(function (field) {
        if (!validateField(field)) allValid = false;
      });

      formStatus.className = "form-status";
      formStatus.textContent = "";

      if (!allValid) {
        formStatus.textContent = "Revisa los campos marcados antes de enviar.";
        formStatus.classList.add("is-error");
        return;
      }

      var payload = {
        nombre: form.nombre.value.trim(),
        empresa: form.empresa.value.trim(),
        email: form.email.value.trim(),
        mensaje: form.mensaje.value.trim()
      };

      submitBtn.setAttribute("disabled", "disabled");
      submitLabel.textContent = "Enviando…";

      fetch("api/contacto.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload)
      })
        .then(function (res) { return res.json().then(function (data) { return { ok: res.ok, data: data }; }); })
        .then(function (result) {
          if (result.ok && result.data.success) {
            formStatus.textContent = "Mensaje enviado. Te responderemos lo antes posible.";
            formStatus.classList.add("is-success");
            form.reset();
          } else {
            formStatus.textContent = result.data.message || "No se pudo enviar el mensaje. Inténtalo de nuevo.";
            formStatus.classList.add("is-error");
          }
        })
        .catch(function () {
          formStatus.textContent = "Error de conexión. Inténtalo de nuevo en unos minutos.";
          formStatus.classList.add("is-error");
        })
        .finally(function () {
          submitBtn.removeAttribute("disabled");
          submitLabel.textContent = "Enviar mensaje";
        });
    });
  }
})();
