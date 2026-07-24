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

  /* ---------- Storytelling de metodología: trazo de la línea + parallax de fondo ---------- */
  var storyActs = Array.prototype.slice.call(document.querySelectorAll("[data-story-act]"));
  var storySectionEl = document.querySelector("[data-story-slider]");
  var storyBgEls = storySectionEl ? Array.prototype.slice.call(storySectionEl.querySelectorAll(".story-bg")) : [];
  if (storyActs.length || storyBgEls.length) {
    var storyTicking = false;
    var updateStoryScroll = function () {
      storyActs.forEach(function (act) {
        var rect = act.getBoundingClientRect();
        var vh = window.innerHeight;
        var total = rect.height + vh * 0.6;
        var progress = Math.min(Math.max((vh * 0.85 - rect.top) / total, 0), 1);

        var line = act.querySelector(".story-moments-line");
        if (line) line.style.setProperty("--story-line-progress", (1 - progress).toFixed(3));
      });

      if (storyBgEls.length) {
        var sliderRect = storySectionEl.getBoundingClientRect();
        var vh2 = window.innerHeight;
        var bgProgress = Math.min(Math.max((vh2 - sliderRect.top) / (vh2 + sliderRect.height), 0), 1);
        var shift = (bgProgress - 0.5) * 60; // recorrido de -30px a 30px mientras se hace scroll de la sección
        storyBgEls.forEach(function (bg) { bg.style.setProperty("--story-bg-shift", shift.toFixed(1) + "px"); });
      }
    };
    updateStoryScroll();
    window.addEventListener("scroll", function () {
      if (storyTicking) return;
      storyTicking = true;
      requestAnimationFrame(function () { updateStoryScroll(); storyTicking = false; });
    }, { passive: true });
    window.addEventListener("resize", updateStoryScroll);
  }

  /* ---------- Slider: Qué hacemos / Cómo trabajamos ---------- */
  var storySlider = document.querySelector("[data-story-slider]");
  if (storySlider) {
    var storySlides = Array.prototype.slice.call(storySlider.querySelectorAll(".story-slide"));
    var storyTabs = Array.prototype.slice.call(document.querySelectorAll("[data-story-tab]"));
    var storyCurrent = storySlides.findIndex(function (s) { return s.classList.contains("is-active"); });
    if (storyCurrent < 0) storyCurrent = 0;
    var storyAnimating = false;
    var storyRevealSelector = ".reveal, .reveal-left, .reveal-right, .reveal-scale, .reveal-blur";

    var resetReveal = function (slide) {
      slide.querySelectorAll(storyRevealSelector).forEach(function (el) { el.classList.remove("is-visible"); });
    };
    var playReveal = function (slide) {
      slide.querySelectorAll(storyRevealSelector).forEach(function (el) { el.classList.add("is-visible"); });
    };
    var setActiveTab = function (index) {
      storyTabs.forEach(function (tab) {
        var isActive = parseInt(tab.getAttribute("data-story-tab"), 10) === index;
        tab.classList.toggle("is-active", isActive);
        tab.setAttribute("aria-selected", isActive ? "true" : "false");
      });
    };
    var setActiveBg = function (index) {
      storySlider.querySelectorAll(".story-bg").forEach(function (bg) {
        bg.classList.toggle("is-active", parseInt(bg.getAttribute("data-story-bg"), 10) === index);
      });
    };

    var goToStorySlide = function (nextIndex, dir) {
      if (storyAnimating || nextIndex === storyCurrent || !storySlides[nextIndex]) return;
      storyAnimating = true;
      setActiveTab(nextIndex);
      setActiveBg(nextIndex);
      storySlider.setAttribute("data-active-slide", String(nextIndex));
      var outgoing = storySlides[storyCurrent];
      var incoming = storySlides[nextIndex];

      incoming.classList.add("is-instant", "is-active");
      incoming.style.transform = "translateX(" + dir * 100 + "%)";
      resetReveal(incoming); // para que sus elementos vuelvan a aparecer
      void incoming.offsetWidth; // fuerza reflow antes de animar
      incoming.classList.remove("is-instant");

      requestAnimationFrame(function () {
        outgoing.style.transform = "translateX(" + -dir * 100 + "%)";
        incoming.style.transform = "translateX(0)";
      });
      // pequeño respiro real para que el navegador pinte el reseteo antes de reactivarlo
      window.setTimeout(function () { playReveal(incoming); }, 40);

      var finished = false;
      var finish = function () {
        if (finished) return;
        finished = true;
        incoming.removeEventListener("transitionend", onTransitionEnd);
        outgoing.classList.add("is-instant");
        outgoing.classList.remove("is-active");
        outgoing.style.transform = "";
        incoming.style.transform = "";
        resetReveal(outgoing); // listo para volver a aparecer la próxima vez
        void outgoing.offsetWidth; // fuerza reflow para que el reseteo no se anime
        outgoing.classList.remove("is-instant");
        storyCurrent = nextIndex;
        storyAnimating = false;
      };
      var onTransitionEnd = function (e) {
        if (e.target === incoming && e.propertyName === "transform") finish();
      };
      incoming.addEventListener("transitionend", onTransitionEnd);
      window.setTimeout(finish, 800); // red de seguridad si transitionend no llega
    };

    storyTabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        var target = parseInt(tab.getAttribute("data-story-tab"), 10);
        goToStorySlide(target, target > storyCurrent ? 1 : -1);
      });
    });
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

  /* ---------- Pestañas de categoría (instalaciones): cambia el grupo de fotos visible ---------- */
  var installationTabs = document.querySelectorAll("[data-installation-tab]");
  var installationGroups = Array.prototype.slice.call(document.querySelectorAll("[data-installation-category]"));
  if (installationTabs.length) {
    var installationRevealSelector = ".reveal, .reveal-left, .reveal-right, .reveal-scale, .reveal-blur";
    installationTabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        var category = tab.getAttribute("data-installation-tab");
        installationTabs.forEach(function (t) {
          var isActive = t === tab;
          t.classList.toggle("is-active", isActive);
          t.setAttribute("aria-selected", isActive ? "true" : "false");
        });
        installationGroups.forEach(function (group) {
          var isActive = group.getAttribute("data-installation-category") === category;
          group.classList.toggle("is-active", isActive);
          if (isActive) {
            // Reinicia y relanza la animación de entrada de las fotos cada vez que se muestra el grupo
            var items = group.querySelectorAll(installationRevealSelector);
            items.forEach(function (el) { el.classList.remove("is-visible"); });
            void group.offsetWidth;
            items.forEach(function (el) { el.classList.add("is-visible"); });
          }
        });
      });
    });
  }

  /* ---------- Tarjetas expandibles (equipamiento) ---------- */
  var expandCardsList = document.querySelector("[data-expand-cards]");
  if (expandCardsList) {
    var expandCards = Array.prototype.slice.call(expandCardsList.querySelectorAll("[data-expand-card]"));
    var setActiveExpandCard = function (card) {
      expandCards.forEach(function (c) { c.classList.toggle("is-active", c === card); });
    };
    expandCards.forEach(function (card) {
      card.addEventListener("mouseenter", function () { setActiveExpandCard(card); });
      card.addEventListener("focus", function () { setActiveExpandCard(card); });
      card.addEventListener("click", function () { setActiveExpandCard(card); });
    });
  }

  /* ---------- Pasos con imagen (atención al cliente) ---------- */
  var featureSteps = document.querySelector("[data-feature-steps]");
  if (featureSteps) {
    var featureItems = Array.prototype.slice.call(featureSteps.querySelectorAll("[data-feature-item]"));
    var featureImages = Array.prototype.slice.call(featureSteps.querySelectorAll("[data-feature-image]"));
    var featureCurrent = 0;
    var featureTimer = null;
    var featureAutoplayMs = 4000;

    var goToFeature = function (index) {
      if (index === featureCurrent) return;
      var prevImg = featureImages[featureCurrent];
      var nextImg = featureImages[index];

      featureItems.forEach(function (item, i) {
        item.classList.toggle("is-active", i === index);
        item.classList.toggle("is-done", i <= index);
      });

      if (prevImg && prevImg !== nextImg) {
        prevImg.classList.remove("is-active");
        prevImg.classList.add("is-leaving");
        window.setTimeout(function () { prevImg.classList.remove("is-leaving"); }, 550);
      }
      nextImg.classList.add("is-active");
      featureCurrent = index;
    };

    var nextFeature = function () {
      goToFeature((featureCurrent + 1) % featureItems.length);
    };

    var startFeatureAutoplay = function () {
      window.clearInterval(featureTimer);
      featureTimer = window.setInterval(nextFeature, featureAutoplayMs);
    };

    featureItems.forEach(function (item, i) {
      item.addEventListener("click", function () {
        goToFeature(i);
        startFeatureAutoplay();
      });
    });
    featureSteps.addEventListener("mouseenter", function () { window.clearInterval(featureTimer); });
    featureSteps.addEventListener("mouseleave", startFeatureAutoplay);

    startFeatureAutoplay();
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
