<?php
/**
 * Infinae — página principal
 * Contenido derivado literalmente del informe corporativo
 * "INFORME OFICINAS DE CALL CENTER INFINAE" (fuente única, sin datos inventados).
 */
$pageTitle = "Infinae — Call center B2B en Jerez de la Frontera";
$pageDescription = "Infinae gestiona llamadas salientes dirigidas a empresas para identificar oportunidades de colaboración, con un equipo formado, procesos medibles y tecnología propia en Jerez de la Frontera.";
$canonical = "https://infinaeconsulting.com/";
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $pageTitle; ?></title>
<meta name="description" content="<?php echo $pageDescription; ?>">
<link rel="canonical" href="<?php echo $canonical; ?>">

<!-- Open Graph -->
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $pageTitle; ?>">
<meta property="og:description" content="<?php echo $pageDescription; ?>">
<meta property="og:url" content="<?php echo $canonical; ?>">
<meta property="og:image" content="<?php echo $canonical; ?>assets/img/favicon.png">
<meta property="og:locale" content="es_ES">
<meta name="twitter:card" content="summary">

<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32.png">
<link rel="icon" type="image/png" sizes="512x512" href="assets/img/favicon.png">

<!-- Fuentes propias precargadas -->
<link rel="preload" href="assets/fonts/sora-variable.woff2" as="font" type="font/woff2" crossorigin>
<link rel="preload" href="assets/fonts/inter-variable.woff2" as="font" type="font/woff2" crossorigin>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/styles.css">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Infinae",
  "legalName": "Infinae Consulting",
  "url": "https://infinaeconsulting.com/",
  "image": "https://infinaeconsulting.com/assets/img/favicon.png",
  "telephone": "+34623456553",
  "email": "info@infinaeconsulting.com",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Avenida Chipiona, calle Crianza 15",
    "addressLocality": "Jerez de la Frontera",
    "postalCode": "11408",
    "addressCountry": "ES"
  },
  "sameAs": [
    "https://www.instagram.com/infinaeconsulting",
    "https://www.facebook.com/profile.php?id=61566405762113"
  ]
}
</script>
</head>
<body>

<div class="skip-link"><a href="#contenido">Saltar al contenido</a></div>

<header class="navbar-infinae" id="siteNavbar">
  <div class="container-custom">
    <a href="#top" class="nav-brand">
      <img src="assets/img/icon-navy.webp" alt="" width="51" height="24">
      INFINAE
    </a>
    <nav aria-label="Navegación principal">
      <ul class="nav-links" id="navLinks">
        <li><a href="#quienes-somos">Quiénes somos</a></li>
        <li><a href="#que-hacemos">Qué hacemos</a></li>
        <li><a href="#calidad">Compromiso con la calidad</a></li>
        <li><a href="#instalaciones">Instalaciones</a></li>
        <li><a href="#atencion-cliente">Atención al cliente</a></li>
        <li><a href="#contacto" class="btn-infinae btn-primary-gold" style="padding:.55rem 1.1rem;">Hablemos</a></li>
      </ul>
    </nav>
    <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="navLinks" aria-label="Abrir menú">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>

<main id="contenido">
  <span id="top"></span>

  <!-- HERO -->
  <section class="hero">
    <video class="hero-video" autoplay muted loop playsinline preload="auto" poster="assets/video/hero-poster.webp" aria-hidden="true">
      <source src="assets/video/hero-bg.mp4" type="video/mp4">
      <source src="assets/video/hero-bg.webm" type="video/webm">
    </video>
    <div class="hero-scrim" aria-hidden="true"></div>
    <div class="container-custom">
      <div>
        <div class="eyebrow hero-eyebrow">Call center B2B · Jerez de la Frontera</div>
        <h1>Optimizamos cada interacción para <span class="text-accent">resultados medibles y sostenibles</span></h1>
        <p class="lede">Gestionamos llamadas salientes dirigidas a empresas: identificamos oportunidades de colaboración, recabamos necesidades laborales y construimos conexiones que impulsan el desarrollo comercial.</p>
        <div class="hero-cta">
          <a href="#contacto" class="btn-infinae btn-primary-gold">Hablemos</a>
          <a href="#que-hacemos" class="btn-infinae btn-outline-brand">Cómo trabajamos</a>
        </div>
        <div class="hero-badges">
          <span class="badge-infinae">Jerez de la Frontera</span>
          <span class="badge-infinae">CRM propio</span>
          <span class="badge-infinae">Fibra óptica de alta velocidad</span>
        </div>
      </div>
      <div class="hero-mark reveal">
        <img src="assets/img/logo.webp" alt="Isotipo de Infinae — dos eslabones entrelazados">
        <span class="hero-mark-chip" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 13a8 8 0 0 1 16 0"/><path d="M4 13v4a2 2 0 0 0 2 2h1v-6H5a1 1 0 0 0-1 1Z"/><path d="M20 13v4a2 2 0 0 1-2 2h-1v-6h1a1 1 0 0 1 1 1Z"/></svg>
        </span>
      </div>
    </div>
    <a href="#quienes-somos" class="hero-scroll-cue" aria-label="Desplázate para ver más contenido">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
    </a>
  </section>

  <!-- QUIÉNES SOMOS -->
  <section class="section about-section" id="quienes-somos">
    <div class="container-custom">
      <div class="row align-items-center g-5">
        <div class="col-lg-7 order-lg-2 reveal-right about-text">
          <div class="eyebrow">01 · Nuestro equipo</div>
          <h2 class="section-title">¿Quiénes somos?</h2>
          <p class="lede">Infinae se posiciona como una empresa especializada en servicios de atención telefónica, con un enfoque claro en optimizar cada interacción para alcanzar resultados medibles y sostenibles.</p>
          <p>La base de nuestro desempeño está en el equipo humano que conforma Infinae. Contamos con un grupo de profesionales con perfiles diversos, seleccionados y formados específicamente en ámbitos clave como:</p>
          <ul class="about-skills">
            <li class="reveal-scale stagger-1"><span class="about-skills-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span>Atención al cliente</li>
            <li class="reveal-scale stagger-2"><span class="about-skills-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span>Comunicación efectiva</li>
            <li class="reveal-scale stagger-3"><span class="about-skills-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg></span>Gestión comercial</li>
          </ul>
          <blockquote class="pull-quote reveal">
            <p>Esta variedad de competencias nos permite abordar cada proyecto con una mirada estratégica, adaptándonos a las necesidades particulares de cada campaña y asegurando un trato cercano, profesional y orientado a resultados.</p>
          </blockquote>
        </div>
        <div class="col-lg-5 order-lg-1 reveal-left">
          <div class="about-media" data-tilt-group>
            <img class="reveal-blur" data-tilt src="assets/img/quienes-somos.webp" alt="Equipo de Infinae trabajando con auriculares en la sala de operaciones del call center" loading="lazy" width="1254" height="1254">
            <span class="about-media-chip" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M17 20v-1.5a3.5 3.5 0 0 0-3.5-3.5h-5A3.5 3.5 0 0 0 5 18.5V20"/><circle cx="9.5" cy="8" r="3.2"/><path d="M16.5 8.3a3 3 0 1 1 1.9 5.4"/><path d="M19 20v-1.5a3 3 0 0 0-1.7-2.7"/></svg>
            </span>
            <div class="about-floating-card reveal-scale stagger-2">
              <span class="stat-num-lg" data-count-to="3">0</span>
              <span class="about-floating-card-label">Ámbitos clave de especialización</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- QUÉ HACEMOS + CÓMO TRABAJAMOS -->
  <section class="story-section" id="que-hacemos">
    <div class="story-intro reveal">
      <div class="container-custom">
        <span class="eyebrow">Metodología</span>
        <h2 class="visually-hidden">Qué hacemos y cómo trabajamos</h2>
      </div>
    </div>

    <article class="story-act" data-story-act>
      <span class="story-act-numeral story-act-numeral--left" aria-hidden="true">01</span>
      <div class="container-custom">
        <div class="story-act-grid">
          <div class="story-act-content">
            <h3 class="story-act-title reveal-blur">¿Qué hacemos?</h3>
            <p class="story-act-text reveal-blur">Desde nuestro call center gestionamos llamadas salientes dirigidas a empresas.</p>

            <div class="story-moments">
              <svg class="story-moments-line" viewBox="0 0 60 320" preserveAspectRatio="none" aria-hidden="true">
                <defs>
                  <linearGradient id="story-line-gradient-1" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#2D4085"/>
                    <stop offset="1" stop-color="#B98A46"/>
                  </linearGradient>
                </defs>
                <path data-story-line stroke="url(#story-line-gradient-1)" pathLength="1" d="M6 8 C 58 55, 4 110, 40 165 S 10 275, 46 312" />
              </svg>
              <div class="story-moment reveal-blur" data-story-moment>
                <span class="story-moment-num">01</span>
                <span class="story-moment-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
                <p class="story-moment-text">Identificar oportunidades de colaboración</p>
              </div>
              <div class="story-moment reveal-blur" data-story-moment>
                <span class="story-moment-num">02</span>
                <span class="story-moment-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M7 3h7l4 4v14H7z"/><path d="M14 3v4h4M9 13h6M9 17h6"/></svg></span>
                <p class="story-moment-text">Recabar información sobre necesidades laborales</p>
              </div>
              <div class="story-moment reveal-blur" data-story-moment>
                <span class="story-moment-num">03</span>
                <span class="story-moment-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v14c0 1.7 3.6 3 8 3s8-1.3 8-3V5"/><path d="M4 12c0 1.7 3.6 3 8 3s8-1.3 8-3"/></svg></span>
                <p class="story-moment-text">Enriquecer nuestra base de datos para programas de empleo y desarrollo comercial</p>
              </div>
            </div>
          </div>

          <div class="story-act-media reveal-right">
            <div class="story-act-photo">
              <img src="assets/img/zonas-trabajo/9.jpg" alt="Equipo de Infinae gestionando llamadas salientes en la sala de operaciones" loading="lazy" width="768" height="1024">
            </div>
          </div>
        </div>
      </div>
    </article>

    <article class="story-act story-act--alt" data-story-act>
      <span class="story-act-numeral story-act-numeral--right" aria-hidden="true">02</span>
      <div class="container-custom">
        <div class="story-act-grid">
          <div class="story-act-media reveal-left">
            <div class="story-act-photo">
              <img src="assets/img/equipos-informaticos/10.jpg" alt="Puesto de trabajo individual con equipo informático, reflejo de la atención personalizada de Infinae" loading="lazy" width="615" height="820">
            </div>
          </div>

          <div class="story-act-content">
            <h3 class="story-act-title reveal-blur">¿Cómo trabajamos?</h3>
            <p class="story-act-text reveal-blur">Aplicamos una metodología estructurada, basada en guiones adaptables y un protocolo claro de actuación.</p>

            <div class="story-moments">
              <svg class="story-moments-line" viewBox="0 0 60 320" preserveAspectRatio="none" aria-hidden="true">
                <defs>
                  <linearGradient id="story-line-gradient-2" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#2D4085"/>
                    <stop offset="1" stop-color="#B98A46"/>
                  </linearGradient>
                </defs>
                <path data-story-line stroke="url(#story-line-gradient-2)" pathLength="1" d="M6 8 C 58 55, 4 110, 40 165 S 10 275, 46 312" />
              </svg>
              <div class="story-moment reveal-blur" data-story-moment>
                <span class="story-moment-num">04</span>
                <span class="story-moment-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="7" r="4"/></svg></span>
                <p class="story-moment-text">Personalización en el trato</p>
              </div>
              <div class="story-moment reveal-blur" data-story-moment>
                <span class="story-moment-num">05</span>
                <span class="story-moment-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="1.5"/><path d="M8 20h8M12 16v4"/></svg></span>
                <p class="story-moment-text">Uso adecuado de herramientas digitales</p>
              </div>
              <div class="story-moment reveal-blur" data-story-moment>
                <span class="story-moment-num">06</span>
                <span class="story-moment-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></span>
                <p class="story-moment-text">Seguimiento sistemático de cada interacción</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  </section>

  <!-- COMPROMISO CON LA CALIDAD -->
  <section class="section calidad-section" id="calidad">
    <div class="container-custom">
      <div class="section-header reveal">
        <div class="eyebrow">02 · Compromiso con la calidad</div>
        <h2 class="section-title">Cómo garantizamos la calidad en cada llamada</h2>
        <span class="stat-badge reveal-scale"><span class="stat-num" data-count-to="3">0</span>pilares de calidad</span>
      </div>
      <div class="mini-badge-row reveal" style="margin-bottom:1.6rem;">
        <span class="mini-badge">Evaluación</span>
        <span class="mini-badge">Supervisión</span>
        <span class="mini-badge">Formación continua</span>
      </div>
      <div class="quality-stack reveal-scale" data-quality-stack>
        <div class="quality-card" data-quality-card tabindex="0" role="button" aria-haspopup="dialog">
          <div class="quality-card-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V10M12 19V5M20 19v-7"/></svg>
          </div>
          <h3 class="quality-card-title">Evaluación</h3>
          <p class="quality-card-text">Análisis constante de los resultados obtenidos en las llamadas, los tiempos de respuesta y el cumplimiento de los objetivos establecidos, para identificar áreas de mejora y ajustar la estrategia a tiempo.</p>
          <span class="quality-card-cue" aria-hidden="true">Pulsa para ver más</span>
        </div>
        <div class="quality-card" data-quality-card tabindex="0" role="button" aria-haspopup="dialog">
          <div class="quality-card-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
          </div>
          <h3 class="quality-card-title">Supervisión</h3>
          <p class="quality-card-text">Nuestros coordinadores siguen la operativa en tiempo real, ofrecen retroalimentación continua al personal, resuelven incidencias de forma ágil y velan por el mantenimiento de los estándares de calidad.</p>
          <span class="quality-card-cue" aria-hidden="true">Pulsa para ver más</span>
        </div>
        <div class="quality-card" data-quality-card tabindex="0" role="button" aria-haspopup="dialog">
          <div class="quality-card-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c0 1.5 2.7 3 6 3s6-1.5 6-3v-5"/></svg>
          </div>
          <h3 class="quality-card-title">Formación continua</h3>
          <p class="quality-card-text">Plan de desarrollo profesional con actualizaciones periódicas en herramientas, técnicas de comunicación efectiva y tendencias del sector, para una atención moderna y en constante evolución.</p>
          <span class="quality-card-cue" aria-hidden="true">Pulsa para ver más</span>
        </div>
      </div>
      <div class="quality-dots" data-quality-dots>
        <button class="quality-dot is-active" type="button" data-quality-dot="0" aria-label="Ir a Evaluación"></button>
        <button class="quality-dot" type="button" data-quality-dot="1" aria-label="Ir a Supervisión"></button>
        <button class="quality-dot" type="button" data-quality-dot="2" aria-label="Ir a Formación continua"></button>
      </div>
      <p class="quality-stack-hint">Desliza la tarjeta para pasar a la siguiente · pulsa para ver los detalles</p>
    </div>
  </section>

  <!-- Popup de tarjeta de calidad -->
  <div class="quality-modal" id="qualityModal" aria-hidden="true">
    <div class="quality-modal-backdrop" data-quality-close></div>
    <div class="quality-modal-panel" role="dialog" aria-modal="true" aria-labelledby="qualityModalTitle" tabindex="-1">
      <button class="quality-modal-close" type="button" data-quality-close aria-label="Cerrar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
      </button>
      <div class="quality-modal-icon" id="qualityModalIcon" aria-hidden="true"></div>
      <h3 class="quality-modal-title" id="qualityModalTitle"></h3>
      <p class="quality-modal-text" id="qualityModalText"></p>
    </div>
  </div>

  <!-- INSTALACIONES Y EQUIPAMIENTO -->
  <section class="section section-mist instalaciones-section" id="instalaciones">
    <div class="container-custom">
      <div class="section-header reveal">
        <div class="eyebrow">03 · Instalaciones y equipamiento</div>
        <h2 class="section-title">Dónde y con qué trabajamos</h2>
        <p class="lede">La oficina de Infinae en Jerez está diseñada para el rendimiento óptimo del equipo: sala principal de operaciones y salas auxiliares, área de descanso con microondas, dos aseos habilitados —incluido acceso para personas con movilidad reducida— y equipamiento de seguridad (extintores, climatización y radiadores eléctricos).</p>
      </div>

      <div class="installation-tabs reveal-scale" role="tablist" aria-label="Categorías de instalaciones" data-installation-tabs>
        <button class="installation-tab is-active" type="button" role="tab" aria-selected="true" data-installation-tab="zona-trabajo">Zona de trabajo</button>
        <button class="installation-tab" type="button" role="tab" aria-selected="false" data-installation-tab="equipos">Equipos informáticos</button>
        <button class="installation-tab" type="button" role="tab" aria-selected="false" data-installation-tab="banos">Baños</button>
      </div>

      <div class="installation-track" id="galleryGrid" data-tilt-group data-installation-track>
        <div class="gallery-item installation-item is-active" data-tilt data-category="zona-trabajo" data-caption="Fila de puestos de trabajo equipados">
          <img src="assets/img/zonas-trabajo/8.jpg" alt="Fila de puestos de trabajo con monitores en la sala principal" loading="lazy" width="615" height="461">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Fila de puestos de trabajo</span>
        </div>
        <div class="gallery-item installation-item is-active" data-tilt data-category="zona-trabajo" data-caption="Zona de trabajo con equipos y auriculares">
          <img src="assets/img/zonas-trabajo/9.jpg" alt="Zona de trabajo con monitores y auriculares, con roll-ups de Infinae y Almina Eventos" loading="lazy" width="768" height="1024">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Zona de trabajo con auriculares</span>
        </div>
        <div class="gallery-item installation-item is-active" data-tilt data-category="zona-trabajo" data-caption="Puesto de trabajo con monitor y auriculares">
          <img src="assets/img/zonas-trabajo/11.jpg" alt="Puesto de trabajo individual con monitor Dell y auriculares" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Puesto de trabajo individual</span>
        </div>
        <div class="gallery-item installation-item is-active" data-tilt data-category="zona-trabajo" data-caption="Sala de trabajo con varias filas de puestos">
          <img src="assets/img/zonas-trabajo/21.jpg" alt="Sala de trabajo amplia con varias filas de puestos y señalización de salida" loading="lazy" width="1024" height="768">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Sala de trabajo</span>
        </div>

        <div class="gallery-item installation-item" data-tilt data-category="equipos" data-caption="Puestos informáticos en la sala de operaciones">
          <img src="assets/img/equipos-informaticos/5.jpg" alt="Puestos informáticos en la sala de operaciones, con monitores y CPU de sobremesa" loading="lazy" width="615" height="461">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Puestos informáticos</span>
        </div>
        <div class="gallery-item installation-item" data-tilt data-category="equipos" data-caption="Equipos informáticos con auriculares">
          <img src="assets/img/equipos-informaticos/6.jpg" alt="Equipos informáticos de sobremesa con monitores y auriculares en fila" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Equipos con auriculares</span>
        </div>
        <div class="gallery-item installation-item" data-tilt data-category="equipos" data-caption="Equipo informático individual">
          <img src="assets/img/equipos-informaticos/10.jpg" alt="Equipo informático individual con monitor Samsung, teclado y ratón" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Equipo informático individual</span>
        </div>

        <div class="gallery-item installation-item" data-tilt data-category="banos" data-caption="Aseo con lavabo y estantería">
          <img src="assets/img/baños/16.jpg" alt="Aseo con lavabo y estantería de almacenaje" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Aseo con lavabo y estantería</span>
        </div>
        <div class="gallery-item installation-item" data-tilt data-category="banos" data-caption="Aseo con urinarios y lavabos">
          <img src="assets/img/baños/17.jpg" alt="Aseo con urinarios y lavabos en fila" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Aseo con urinarios y lavabos</span>
        </div>
        <div class="gallery-item installation-item" data-tilt data-category="banos" data-caption="Aseo individual con inodoro y lavabo">
          <img src="assets/img/baños/18.jpg" alt="Aseo individual con inodoro, mampara y lavabo" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Aseo individual</span>
        </div>
        <div class="gallery-item installation-item" data-tilt data-category="banos" data-caption="Aseo con inodoro y estantería">
          <img src="assets/img/baños/19.jpg" alt="Aseo con inodoro y estantería de almacenaje" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Aseo con estantería</span>
        </div>
        <div class="gallery-item installation-item" data-tilt data-category="banos" data-caption="Lavabo del aseo">
          <img src="assets/img/baños/20.jpg" alt="Lavabo suspendido en la pared del aseo" loading="lazy" width="615" height="820">
          <span class="gallery-zoom-cue" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="10.5" cy="10.5" r="6.5"/><path d="m21 21-4.35-4.35"/></svg></span>
          <span class="gallery-caption">Lavabo del aseo</span>
        </div>
      </div>
    </div>
  </section>

  <!-- ATENCIÓN AL CLIENTE -->
  <section class="section atencion-section" id="atencion-cliente">
    <div class="container-custom">
      <div class="section-header reveal">
        <div class="eyebrow">04 · Atención al cliente</div>
        <h2 class="section-title">Cómo cuidamos cada contacto</h2>
        <span class="stat-badge reveal-scale"><span class="stat-num" data-count-to="3">0</span>pasos del proceso</span>
      </div>
      <div class="process-timeline">
        <div class="process-step reveal-scale stagger-1">
          <div class="process-step-head">
            <div class="process-num">1</div>
            <div class="process-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="13" r="8"/><path d="M12 9v4l3 2"/><path d="M9 2h6"/></svg></div>
          </div>
          <h4>Procesos eficientes</h4>
          <p>Todas las llamadas se gestionan siguiendo protocolos claros y definidos: atención ágil, estructurada y profesional, con tiempos de respuesta optimizados sin comprometer la calidad.</p>
        </div>
        <div class="process-step reveal-scale stagger-3">
          <div class="process-step-head">
            <div class="process-num">2</div>
            <div class="process-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3.2"/></svg></div>
          </div>
          <h4>Enfoque personalizado</h4>
          <p>Valoramos la singularidad de cada empresa contactada. Escuchamos activamente y adaptamos nuestras propuestas a sus características, necesidades y objetivos específicos.</p>
        </div>
        <div class="process-step reveal-scale stagger-5">
          <div class="process-step-head">
            <div class="process-num">3</div>
            <div class="process-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2 4 14h7l-1 8 9-12h-7l1-8Z"/></svg></div>
          </div>
          <h4>Resolución ágil</h4>
          <p>Respondemos con rapidez a cualquier duda o incidencia, con empatía y determinación, reforzando la confianza desde el primer contacto.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACTO -->
  <section class="section section-brand contacto-section" id="contacto">
    <div class="container-custom">
      <div class="contact-grid">
        <div class="reveal-left">
          <div class="eyebrow">Contacto</div>
          <h2 class="section-title">Hablemos</h2>
          <p class="lede">¿Quieres saber cómo podemos ayudar a tu empresa? Escríbenos o llámanos.</p>

          <div class="contact-info-grid" data-tilt-group>
            <div class="contact-info-item reveal-scale stagger-1" data-tilt>
              <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.4 7-11.5A7 7 0 0 0 5 9.5C5 14.6 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.3"/></svg></div>
              <div><h4>Dirección</h4><p>Avenida Chipiona, calle Crianza 15<br>Jerez de la Frontera, CP 11408</p></div>
            </div>
            <div class="contact-info-item reveal-scale stagger-2" data-tilt>
              <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L14 13l5 2v4a2 2 0 0 1-2 2C9.5 21 3 14.5 3 6a2 2 0 0 1 1-2Z"/></svg></div>
              <div><h4>Teléfono</h4><p><a href="tel:+34623456553">623 456 553</a></p></div>
            </div>
            <div class="contact-info-item reveal-scale stagger-3" data-tilt>
              <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></div>
              <div><h4>Email</h4><p><a href="mailto:info@infinaeconsulting.com">info@infinaeconsulting.com</a></p></div>
            </div>
            <div class="contact-info-item reveal-scale stagger-4" data-tilt>
              <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3a14 14 0 0 1 0 18 14 14 0 0 1 0-18Z"/></svg></div>
              <div><h4>Redes sociales</h4>
                <div class="social-links" style="margin-top:.4rem;">
                  <a href="https://www.instagram.com/infinaeconsulting" target="_blank" rel="noopener" aria-label="Instagram de Infinae">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1"/></svg>
                  </a>
                  <a href="https://www.facebook.com/profile.php?id=61566405762113" target="_blank" rel="noopener" aria-label="Facebook de Infinae">
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 4h-2a4 4 0 0 0-4 4v3H7v4h2v7h4v-7h3l1-4h-4V8a1 1 0 0 1 1-1h3Z"/></svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="contact-map reveal-scale stagger-5">
            <iframe src="https://www.google.com/maps?q=Avenida+Chipiona,+Calle+Crianza+15,+11408+Jerez+de+la+Frontera&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Mapa de ubicación de Infinae en Jerez de la Frontera"></iframe>
          </div>
        </div>

        <form class="contact-form reveal-right" id="contactForm" novalidate>
          <div class="form-row">
            <input type="text" id="nombre" name="nombre" autocomplete="name" placeholder=" " required>
            <label for="nombre">Nombre</label>
            <p class="form-error">Escribe tu nombre.</p>
          </div>
          <div class="form-row">
            <input type="text" id="empresa" name="empresa" autocomplete="organization" placeholder=" ">
            <label for="empresa">Empresa</label>
          </div>
          <div class="form-row">
            <input type="email" id="email" name="email" autocomplete="email" placeholder=" " required>
            <label for="email">Email</label>
            <p class="form-error">Introduce un email válido.</p>
          </div>
          <div class="form-row">
            <textarea id="mensaje" name="mensaje" placeholder=" " required></textarea>
            <label for="mensaje">Mensaje</label>
            <p class="form-error">Cuéntanos brevemente qué necesitas.</p>
          </div>
          <button type="submit" class="btn-infinae btn-primary-gold form-submit btn-magnetic">
            <span class="btn-magnetic-label">
              <span class="spinner" aria-hidden="true"></span>
              <span class="submit-label">Enviar mensaje</span>
            </span>
          </button>
          <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </section>
</main>

<footer class="site-footer">
  <div class="container-custom">
    <div class="footer-grid">
      <div>
        <div class="footer-brand">
          <img src="assets/img/icon-white.webp" alt="" width="51" height="24">
          <span>INFINAE</span>
        </div>
        <p style="font-size:.88rem;max-width:32ch;">Call center especializado en llamadas salientes B2B, con sede en Jerez de la Frontera.</p>
      </div>
      <div class="footer-col">
        <h5>Navegación</h5>
        <ul>
          <li><a href="#quienes-somos">Quiénes somos</a></li>
          <li><a href="#que-hacemos">Qué hacemos</a></li>
          <li><a href="#calidad">Compromiso con la calidad</a></li>
          <li><a href="#instalaciones">Instalaciones</a></li>
          <li><a href="#atencion-cliente">Atención al cliente</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Contacto</h5>
        <ul>
          <li><a href="tel:+34623456553">623 456 553</a></li>
          <li><a href="mailto:info@infinaeconsulting.com">info@infinaeconsulting.com</a></li>
          <li>Avenida Chipiona, calle Crianza 15,<br>Jerez de la Frontera, CP 11408</li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Legal</h5>
        <ul>
          <li><a href="aviso-legal.php">Aviso legal</a></li>
          <li><a href="politica-privacidad.php">Política de privacidad</a></li>
          <li><a href="politica-cookies.php">Política de cookies</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© <?php echo date("Y"); ?> Infinae Consulting. Todos los derechos reservados.</span>
      <div class="social-links">
        <a href="https://www.instagram.com/infinaeconsulting" target="_blank" rel="noopener" aria-label="Instagram de Infinae">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1"/></svg>
        </a>
        <a href="https://www.facebook.com/profile.php?id=61566405762113" target="_blank" rel="noopener" aria-label="Facebook de Infinae">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 4h-2a4 4 0 0 0-4 4v3H7v4h2v7h4v-7h3l1-4h-4V8a1 1 0 0 1 1-1h3Z"/></svg>
        </a>
      </div>
    </div>
  </div>
</footer>

<!-- Banner de cookies -->
<div class="cookie-banner" id="cookieBanner" role="dialog" aria-live="polite" aria-label="Aviso de cookies">
  <p>Usamos cookies propias y de terceros para mejorar tu experiencia. Puedes aceptarlas, rechazarlas o consultar nuestra <a href="politica-cookies.php">política de cookies</a>.</p>
  <div class="cookie-actions">
    <button class="btn-infinae btn-primary-gold" id="cookieAccept">Aceptar</button>
    <button class="btn-infinae btn-outline-brand" id="cookieReject">Rechazar</button>
  </div>
</div>

<!-- Lightbox de galería -->
<div class="lightbox" id="lightbox">
  <button class="lightbox-close" id="lightboxClose" aria-label="Cerrar imagen">&times;</button>
  <img id="lightboxImg" src="" alt="">
  <p class="lightbox-caption" id="lightboxCaption"></p>
</div>

<button class="back-to-top" id="backToTop" aria-label="Volver arriba">
  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>

<script src="assets/js/main.js" defer></script>
</body>
</html>
