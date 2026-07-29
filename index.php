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
<meta property="og:image" content="<?php echo $canonical; ?>assets/img/favicon.webp">
<meta property="og:locale" content="es_ES">
<meta name="twitter:card" content="summary">

<?php include __DIR__ . '/includes/favicon.php'; ?>

<!-- Fuentes propias precargadas -->
<link rel="preload" href="assets/fonts/bricolage-latin.woff2" as="font" type="font/woff2" crossorigin>
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
  "image": "https://infinaeconsulting.com/assets/img/favicon.webp",
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

<?php include __DIR__ . '/includes/nav.php'; ?>

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
        <h1>Optimizamos cada<br><em class="hero-em">interacción</em> para<br><span class="text-accent">resultados medibles</span><br>y sostenibles.</h1>
        <p class="lede">Gestionamos llamadas salientes dirigidas a empresas: identificamos oportunidades de colaboración, recabamos necesidades laborales y construimos conexiones que impulsan el desarrollo comercial.</p>
        <div class="hero-cta">
          <a href="#contacto" class="btn-infinae btn-primary-gold">Hablemos</a>
          <a href="#que-hacemos" class="btn-infinae btn-outline-brand">Cómo trabajamos</a>
        </div>
        <div class="hero-badges">
          <span class="badge-infinae">Jerez de la Frontera</span>
          <span class="badge-infinae">CRM propio</span>
          <span class="badge-infinae">Fibra óptica dedicada</span>
        </div>
      </div>
      <div class="hero-mark reveal">
        <div class="hero-mark-photo">
          <img src="assets/img/agente-atencion-hero.webp" alt="Agente de Infinae con auriculares atendiendo una llamada en el call center" width="1600" height="1600">
          <span class="hero-mark-scrim" aria-hidden="true"></span>
          <div class="hero-mark-logo" aria-hidden="true">
            <img src="assets/img/icon-white.webp" alt="" class="hero-mark-logo-icon">
            <span class="hero-mark-logo-text">INFINAE</span>
          </div>
        </div>
        <span class="hero-mark-chip" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 13a8 8 0 0 1 16 0"/><path d="M4 13v4a2 2 0 0 0 2 2h1v-6H5a1 1 0 0 0-1 1Z"/><path d="M20 13v4a2 2 0 0 1-2 2h-1v-6h1a1 1 0 0 1 1 1Z"/></svg>
        </span>
        <div class="hero-status-card reveal-scale stagger-2" aria-hidden="true">
          <span class="hero-status-dot"></span>
          <span class="hero-status-text">
            <span class="hero-status-eyebrow">En llamada</span>
            <span class="hero-status-label">Atención activa en directo</span>
          </span>
        </div>
      </div>
    </div>
    <a href="#quienes-somos" class="hero-scroll-cue" aria-label="Desplázate para ver más contenido">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 5v14M5 12l7 7 7-7"/></svg>
    </a>
  </section>

  <!-- MARQUEE DE SERVICIOS -->
  <div class="marquee-section" aria-label="Servicios de Infinae">
    <div class="marquee-track">
      <ul class="marquee-group">
        <li>Llamadas salientes B2B</li>
        <li>Prospección comercial</li>
        <li>Necesidades laborales</li>
        <li>Enriquecimiento de datos</li>
        <li>Programas de empleo</li>
        <li>Atención estructurada</li>
      </ul>
      <ul class="marquee-group" aria-hidden="true">
        <li>Llamadas salientes B2B</li>
        <li>Prospección comercial</li>
        <li>Necesidades laborales</li>
        <li>Enriquecimiento de datos</li>
        <li>Programas de empleo</li>
        <li>Atención estructurada</li>
      </ul>
    </div>
  </div>

  <!-- QUIÉNES SOMOS -->
  <section class="section about-section" id="quienes-somos">
    <div class="container-custom">
      <div class="row align-items-center g-5">
        <div class="col-lg-7 order-lg-2 reveal-right about-text">
          <div class="eyebrow">01 · Nuestro equipo</div>
          <h2 class="section-title">¿Quiénes <span class="text-accent">somos</span>?</h2>
          <p class="lede">Infinae se posiciona como una empresa especializada en servicios de atención telefónica, con un enfoque claro en optimizar cada interacción para alcanzar resultados medibles y sostenibles.</p>
          <p>La base de nuestro desempeño está en el equipo humano que conforma Infinae. Contamos con un grupo de profesionales con perfiles diversos, seleccionados y formados específicamente en ámbitos clave.</p>
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
            <div class="about-media-tilt" data-tilt>
              <img class="reveal-blur" src="assets/img/team-wide.webp" alt="Equipo de Infinae en las oficinas de Jerez" loading="lazy" width="1408" height="1600">
            </div>
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
    <div class="story-slider" data-story-slider data-active-slide="0">
      <div class="story-bg story-bg--que is-active" data-story-bg="0" aria-hidden="true"></div>
      <div class="story-bg story-bg--como" data-story-bg="1" aria-hidden="true"></div>

      <div class="story-intro reveal">
        <div class="container-custom">
          <span class="eyebrow">02 · Metodología</span>
          <h2 class="visually-hidden">Qué hacemos y cómo trabajamos</h2>
          <div class="story-tabs" role="tablist" aria-label="Cambiar entre qué hacemos y cómo trabajamos">
            <button type="button" class="story-tab is-active" data-story-tab="0" role="tab" aria-selected="true">¿Qué hacemos?</button>
            <button type="button" class="story-tab" data-story-tab="1" role="tab" aria-selected="false">¿Cómo trabajamos?</button>
          </div>
        </div>
      </div>

      <div class="story-track" data-story-track>

    <article class="story-act story-slide is-active" data-story-act data-story-slide="0">
      <div class="container-custom">
        <div class="story-act-grid">
          <div class="story-act-content">
            <h2 class="story-act-title reveal-blur">¿Qué<br><span class="text-accent">hacemos?</span></h2>
            <p class="story-act-text reveal-blur">Desde nuestro call center gestionamos llamadas salientes dirigidas a empresas, siguiendo un método claro en tres fases.</p>

            <div class="story-steps">
              <article class="story-step reveal-blur stagger-1">
                <span class="story-step-num">01</span>
                <div class="story-step-body">
                  <h3 class="story-step-title">Gestionamos llamadas salientes dirigidas a empresas</h3>
                  <p class="story-step-desc">Con el objetivo de identificar oportunidades de colaboración y abrir puertas comerciales concretas.</p>
                </div>
                <span class="story-step-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
              </article>
              <article class="story-step reveal-blur stagger-2">
                <span class="story-step-num">02</span>
                <div class="story-step-body">
                  <h3 class="story-step-title">Recabamos información sobre necesidades laborales</h3>
                  <p class="story-step-desc">Escuchamos a cada organización para entender su realidad y anticipar los perfiles y servicios que necesita.</p>
                </div>
                <span class="story-step-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
              </article>
              <article class="story-step reveal-blur stagger-3">
                <span class="story-step-num">03</span>
                <div class="story-step-body">
                  <h3 class="story-step-title">Enriquecemos nuestra base de datos</h3>
                  <p class="story-step-desc">Alimentamos programas de empleo y desarrollo comercial con datos vivos, cualificados y actualizados.</p>
                </div>
                <span class="story-step-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
              </article>
            </div>
          </div>

          <div class="story-act-media reveal-right">
            <div class="story-act-photo">
              <img src="assets/img/agent-portrait.webp" alt="Agente de Infinae en plena llamada" loading="lazy" width="1200" height="1504">
              <div class="story-act-photo-overlay">
                <span class="story-act-photo-eyebrow">Cada llamada</span>
                <span class="story-act-photo-title">es una oportunidad</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>

    <article class="story-act story-act--alt story-slide" data-story-act data-story-slide="1">
      <div class="container-custom">
        <div class="story-act-grid">
          <div class="story-act-media reveal-left">
            <div class="story-act-photo">
              <img src="assets/img/headset.webp" alt="Agente de Infinae siguiendo el guion de llamada con diadema profesional" loading="lazy" width="1008" height="1200">
              <div class="story-act-photo-overlay">
                <span class="story-act-photo-eyebrow">Cada equipo</span>
                <span class="story-act-photo-title">sigue un método</span>
              </div>
            </div>
          </div>

          <div class="story-act-content">
            <h2 class="story-act-title reveal-blur">¿Cómo<br><span class="text-accent">trabajamos?</span></h2>
            <p class="story-act-text reveal-blur">Aplicamos una metodología estructurada, basada en guiones adaptables y un protocolo claro de actuación.</p>

            <div class="story-steps">
              <article class="story-step reveal-blur stagger-1">
                <span class="story-step-num">04</span>
                <div class="story-step-body">
                  <h3 class="story-step-title">Personalización en el trato</h3>
                  <p class="story-step-desc">Combinamos guiones adaptables con escucha activa, para que cada llamada suene cercana y nunca a guion genérico.</p>
                </div>
                <span class="story-step-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
              </article>
              <article class="story-step reveal-blur stagger-2">
                <span class="story-step-num">05</span>
                <div class="story-step-body">
                  <h3 class="story-step-title">Uso adecuado de herramientas digitales</h3>
                  <p class="story-step-desc">Apoyamos cada gestión en CRM y software especializado en llamadas, con acceso ordenado a la información de cada empresa contactada.</p>
                </div>
                <span class="story-step-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
              </article>
              <article class="story-step reveal-blur stagger-3">
                <span class="story-step-num">06</span>
                <div class="story-step-body">
                  <h3 class="story-step-title">Seguimiento sistemático de cada interacción</h3>
                  <p class="story-step-desc">Registramos el resultado de cada llamada para no perder ninguna oportunidad y dar continuidad a cada conversación iniciada.</p>
                </div>
                <span class="story-step-arrow" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
              </article>
            </div>
          </div>
        </div>
      </div>
    </article>

      </div>
    </div>
  </section>

  <!-- COMPROMISO CON LA CALIDAD -->
  <section class="section calidad-section section-brand" id="calidad">
    <div class="container-custom">
      <div class="section-header section-header-minimal reveal">
        <div class="section-header-row">
          <div class="eyebrow">02 · Compromiso con la calidad</div>
          <span class="stat-badge reveal-scale"><span class="stat-num" data-count-to="3">0</span>pilares de calidad</span>
        </div>
        <h2 class="section-title">Cómo garantizamos la <span class="text-accent">calidad</span> en cada llamada</h2>
      </div>
      <div class="quality-grid">
        <article class="quality-card reveal-scale stagger-1">
          <img class="quality-card-img" src="assets/img/supervision.webp" alt="Analizamos cada llamada" loading="lazy" width="1408" height="1008">
          <span class="quality-card-scrim" aria-hidden="true"></span>
          <span class="quality-card-tag">
            <span class="quality-card-tag-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V10M12 19V5M20 19v-7"/></svg></span>
            Evaluación
          </span>
          <div class="quality-card-content">
            <h3 class="quality-card-title">Analizamos cada llamada</h3>
            <p class="quality-card-text">Análisis constante de resultados, tiempos de respuesta y cumplimiento de objetivos para identificar áreas de mejora y ajustar la estrategia a tiempo.</p>
          </div>
        </article>
        <article class="quality-card reveal-scale stagger-3">
          <img class="quality-card-img" src="assets/img/team-wide.webp" alt="Acompañamos en tiempo real" loading="lazy" width="1408" height="1600">
          <span class="quality-card-scrim" aria-hidden="true"></span>
          <span class="quality-card-tag">
            <span class="quality-card-tag-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg></span>
            Supervisión
          </span>
          <div class="quality-card-content">
            <h3 class="quality-card-title">Acompañamos en tiempo real</h3>
            <p class="quality-card-text">Un equipo de coordinación monitoriza las campañas activas, resuelve incidencias y garantiza que cada interacción cumpla nuestros estándares.</p>
          </div>
        </article>
        <article class="quality-card reveal-scale stagger-5">
          <img class="quality-card-img" src="assets/img/training.webp" alt="Equipos que evolucionan" loading="lazy" width="1408" height="1008">
          <span class="quality-card-scrim" aria-hidden="true"></span>
          <span class="quality-card-tag">
            <span class="quality-card-tag-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c0 1.5 2.7 3 6 3s6-1.5 6-3v-5"/></svg></span>
            Formación continua
          </span>
          <div class="quality-card-content">
            <h3 class="quality-card-title">Equipos que evolucionan</h3>
            <p class="quality-card-text">Plan formativo permanente: los profesionales se actualizan en técnicas de comunicación, gestión y herramientas propias del sector.</p>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- INSTALACIONES Y EQUIPAMIENTO -->
  <section class="section section-mist instalaciones-section" id="instalaciones">
    <div class="container-custom">
      <div class="section-header reveal">
        <div class="eyebrow">03 · Instalaciones y equipamiento</div>
        <h2 class="section-title">Dónde y con qué <span class="text-accent">trabajamos</span></h2>
        <p class="lede">La oficina de Infinae en Jerez está diseñada para el rendimiento óptimo del equipo: sala principal de operaciones y salas auxiliares, área de descanso con microondas, dos aseos habilitados —incluido acceso para personas con movilidad reducida— y equipamiento de seguridad (extintores, climatización y radiadores eléctricos).</p>
      </div>

      <div class="installation-tabs reveal-scale" role="tablist" aria-label="Categorías de instalaciones" data-installation-tabs>
        <button class="installation-tab is-active" type="button" role="tab" aria-selected="true" data-installation-tab="zona-trabajo">Zona de trabajo</button>
        <button class="installation-tab" type="button" role="tab" aria-selected="false" data-installation-tab="equipos">Equipos informáticos</button>
        <button class="installation-tab" type="button" role="tab" aria-selected="false" data-installation-tab="banos">Baños</button>
      </div>

      <div class="installation-photos is-active" data-installation-category="zona-trabajo">
        <div class="installation-photo installation-photo--large reveal-scale stagger-1">
          <img src="assets/img/zonas-trabajo/21.webp" alt="Sala principal de operaciones con varias filas de puestos de trabajo" loading="lazy" width="1024" height="768">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">01</span>Sala principal de operaciones</span>
        </div>
        <div class="installation-photo reveal-scale stagger-2">
          <img src="assets/img/zonas-trabajo/9.webp" alt="Puestos de trabajo equipados con auriculares y monitores" loading="lazy" width="768" height="1024">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">02</span>Puestos con auriculares y monitores</span>
        </div>
        <div class="installation-photo reveal-scale stagger-3">
          <img src="assets/img/zonas-trabajo/8.webp" alt="Fila de puestos de trabajo con monitores" loading="lazy" width="615" height="461">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">03</span>Fila de puestos de trabajo</span>
        </div>
        <div class="installation-photo reveal-scale stagger-4">
          <img src="assets/img/zonas-trabajo/11.webp" alt="Puesto de trabajo individual con monitor, teclado y auriculares" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">04</span>Puesto de trabajo individual</span>
        </div>
      </div>

      <div class="installation-photos installation-photos--equipos" data-installation-category="equipos">
        <div class="installation-photo installation-photo--large reveal-scale stagger-1">
          <img src="assets/img/equipos-informaticos/5.webp" alt="Sala equipada con ordenadores y monitores" loading="lazy" width="615" height="461">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">01</span>Sala equipada con ordenadores y monitores</span>
        </div>
        <div class="installation-photo reveal-scale stagger-2">
          <img src="assets/img/equipos-informaticos/6.webp" alt="Equipos informáticos en cada puesto de trabajo" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">02</span>Equipos informáticos en cada puesto</span>
        </div>
        <div class="installation-photo reveal-scale stagger-3">
          <img src="assets/img/equipos-informaticos/10.webp" alt="Ordenador individual con monitor y teclado" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">03</span>Ordenador individual</span>
        </div>
      </div>

      <div class="installation-photos" data-installation-category="banos">
        <div class="installation-photo installation-photo--large reveal-scale stagger-1">
          <img src="assets/img/baños/17.webp" alt="Aseo con inodoro, urinarios y lavabos" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">01</span>Aseo con inodoro, urinarios y lavabos</span>
        </div>
        <div class="installation-photo reveal-scale stagger-2">
          <img src="assets/img/baños/16.webp" alt="Lavabo con módulo de almacenaje auxiliar" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">02</span>Lavabo con módulo de almacenaje</span>
        </div>
        <div class="installation-photo reveal-scale stagger-3">
          <img src="assets/img/baños/18.webp" alt="Aseo individual con inodoro y lavabo" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">03</span>Aseo individual</span>
        </div>
        <div class="installation-photo reveal-scale stagger-4">
          <img src="assets/img/baños/19.webp" alt="Módulo de almacenaje junto al inodoro" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">04</span>Módulo de almacenaje</span>
        </div>
        <div class="installation-photo reveal-scale stagger-5">
          <img src="assets/img/baños/20.webp" alt="Lavabo individual" loading="lazy" width="615" height="820">
          <span class="installation-photo-scrim" aria-hidden="true"></span>
          <span class="installation-photo-caption"><span class="installation-photo-num">05</span>Lavabo individual</span>
        </div>
      </div>

      <div class="equipment-intro reveal">
        <div class="eyebrow">Equipamiento</div>
        <h3 class="equipment-title">Con qué trabajamos cada día</h3>
        <p class="lede">Contamos con los recursos tecnológicos necesarios para garantizar un trabajo ágil, preciso y eficiente, con un seguimiento organizado y personalizado de cada interacción.</p>
      </div>

      <ul class="expand-cards reveal-scale" data-expand-cards>
        <li class="expand-card is-active" data-expand-card tabindex="0">
          <img class="expand-card-img" src="assets/img/equipamiento-ordenadores.webp" alt="Ordenadores de sobremesa equipados con CRM y software de gestión de llamadas" loading="lazy" width="2048" height="1536">
          <span class="expand-card-scrim" aria-hidden="true"></span>
          <div class="expand-card-body">
            <span class="expand-card-label">Ordenadores</span>
            <div class="expand-card-content">
              <span class="expand-card-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="1.5"/><path d="M8 20h8M12 16v4"/></svg></span>
              <h4 class="expand-card-title">Ordenadores de sobremesa</h4>
              <p class="expand-card-text">Equipos con acceso a CRM y software especializado en gestión de llamadas, para un seguimiento organizado de cada interacción.</p>
            </div>
          </div>
        </li>
        <li class="expand-card" data-expand-card tabindex="0">
          <img class="expand-card-img" src="assets/img/equipamiento-software.webp" alt="Software de gestión y herramientas ofimáticas para el análisis de datos" loading="lazy" width="2048" height="1536">
          <span class="expand-card-scrim" aria-hidden="true"></span>
          <div class="expand-card-body">
            <span class="expand-card-label">Software de gestión</span>
            <div class="expand-card-content">
              <span class="expand-card-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="8" height="8" rx="1"/><rect x="13" y="3" width="8" height="8" rx="1"/><rect x="3" y="13" width="8" height="8" rx="1"/><rect x="13" y="13" width="8" height="8" rx="1"/></svg></span>
              <h4 class="expand-card-title">Software de gestión (CRM)</h4>
              <p class="expand-card-text">Herramientas ofimáticas y sistemas de gestión de datos que facilitan el trabajo administrativo y el análisis en tiempo real.</p>
            </div>
          </div>
        </li>
        <li class="expand-card" data-expand-card tabindex="0">
          <img class="expand-card-img" src="assets/img/equipamiento-auriculares.webp" alt="Auriculares con cancelación de ruido para una comunicación clara" loading="lazy" width="2048" height="1536">
          <span class="expand-card-scrim" aria-hidden="true"></span>
          <div class="expand-card-body">
            <span class="expand-card-label">Auriculares</span>
            <div class="expand-card-content">
              <span class="expand-card-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 13a8 8 0 0 1 16 0"/><path d="M4 13v4a2 2 0 0 0 2 2h1v-6H5a1 1 0 0 0-1 1Z"/><path d="M20 13v4a2 2 0 0 1-2 2h-1v-6h1a1 1 0 0 1 1 1Z"/></svg></span>
              <h4 class="expand-card-title">Auriculares con cancelación de ruido</h4>
              <p class="expand-card-text">Fundamentales para asegurar una comunicación clara y sin interferencias, incluso en entornos de alta actividad.</p>
            </div>
          </div>
        </li>
        <li class="expand-card" data-expand-card tabindex="0">
          <img class="expand-card-img" src="assets/img/equipamiento-fibra.webp" alt="Conexión a internet por fibra óptica de alta velocidad" loading="lazy" width="2048" height="1536">
          <span class="expand-card-scrim" aria-hidden="true"></span>
          <div class="expand-card-body">
            <span class="expand-card-label">Fibra óptica</span>
            <div class="expand-card-content">
              <span class="expand-card-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.5a10 10 0 0 1 14 0M8 15.8a6 6 0 0 1 8 0M11.5 19a2 2 0 0 1 1 0"/><circle cx="12" cy="19.3" r=".6" fill="currentColor" stroke="none"/></svg></span>
              <h4 class="expand-card-title">Fibra óptica de alta velocidad</h4>
              <p class="expand-card-text">Garantiza estabilidad en la operativa diaria y una respuesta inmediata a las demandas del servicio.</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <!-- ATENCIÓN AL CLIENTE -->
  <section class="section atencion-section" id="atencion-cliente">
    <div class="container-custom">
      <div class="section-header reveal">
        <div class="eyebrow">04 · Atención al cliente</div>
        <h2 class="section-title">Cómo cuidamos cada <span class="text-accent">contacto</span></h2>
        <span class="stat-badge reveal-scale"><span class="stat-num" data-count-to="3">0</span>pasos del proceso</span>
      </div>
      <div class="feature-steps" data-feature-steps>
        <div class="feature-list">
          <div class="feature-item is-active is-done" data-feature-item data-feature-index="0">
            <span class="feature-badge" aria-hidden="true">
              <span class="feature-badge-num">1</span>
              <svg class="feature-badge-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            </span>
            <div class="feature-item-body">
              <h4>Procesos eficientes</h4>
              <p>Todas las llamadas se gestionan siguiendo protocolos claros y definidos: atención ágil, estructurada y profesional, con tiempos de respuesta optimizados sin comprometer la calidad.</p>
            </div>
          </div>
          <div class="feature-item" data-feature-item data-feature-index="1">
            <span class="feature-badge" aria-hidden="true">
              <span class="feature-badge-num">2</span>
              <svg class="feature-badge-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            </span>
            <div class="feature-item-body">
              <h4>Enfoque personalizado</h4>
              <p>Valoramos la singularidad de cada empresa contactada. Escuchamos activamente y adaptamos nuestras propuestas a sus características, necesidades y objetivos específicos.</p>
            </div>
          </div>
          <div class="feature-item" data-feature-item data-feature-index="2">
            <span class="feature-badge" aria-hidden="true">
              <span class="feature-badge-num">3</span>
              <svg class="feature-badge-check" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
            </span>
            <div class="feature-item-body">
              <h4>Resolución ágil</h4>
              <p>Respondemos con rapidez a cualquier duda o incidencia, con empatía y determinación, reforzando la confianza desde el primer contacto.</p>
            </div>
          </div>
        </div>

        <div class="feature-visual reveal-right">
          <img class="feature-visual-img is-active" data-feature-image data-feature-index="0" src="assets/img/atencion-procesos.webp" alt="Agente de atención al cliente siguiendo un protocolo claro y estructurado" loading="lazy" width="2048" height="1536">
          <img class="feature-visual-img" data-feature-image data-feature-index="1" src="assets/img/atencion-enfoque.webp" alt="Agente de atención al cliente escuchando con atención personalizada" loading="lazy" width="2048" height="1536">
          <img class="feature-visual-img" data-feature-image data-feature-index="2" src="assets/img/atencion-resolucion.webp" alt="Agente de atención al cliente resolviendo una incidencia con rapidez" loading="lazy" width="2048" height="1536">
          <span class="feature-visual-scrim" aria-hidden="true"></span>
        </div>
      </div>
    </div>
  </section>

  <!-- CIFRAS CLAVE -->
  <section class="stats-section" aria-label="Cifras clave de Infinae">
    <div class="container-custom">
      <div class="stats-grid">
        <div class="stats-item reveal-scale stagger-1">
          <span class="stats-num" data-count-to="3">0</span>
          <span class="stats-label">Ámbitos clave de especialización</span>
        </div>
        <div class="stats-item reveal-scale stagger-2">
          <span class="stats-num">B2B</span>
          <span class="stats-label">Enfoque comercial exclusivo</span>
        </div>
        <div class="stats-item reveal-scale stagger-3">
          <span class="stats-num">Tiempo real</span>
          <span class="stats-label">Supervisión continua de llamadas</span>
        </div>
        <div class="stats-item reveal-scale stagger-4">
          <span class="stats-num">Fibra óptica</span>
          <span class="stats-label">Conectividad dedicada de alta velocidad</span>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACTO -->
  <section class="section section-brand contacto-section" id="contacto">
    <div class="container-custom">
      <div class="contact-grid">
        <div class="reveal-left">
          <div class="eyebrow">06 · Contacto</div>
          <h2 class="section-title"><span class="text-accent">Hablemos</span></h2>
          <p class="lede">¿Quieres saber cómo podemos ayudar a tu empresa? Escríbenos o llámanos y te contamos.</p>

          <div class="contact-info-grid" data-tilt-group>
            <div class="contact-info-item contact-info-item--wide reveal-scale stagger-1" data-tilt>
              <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s7-6.4 7-11.5A7 7 0 0 0 5 9.5C5 14.6 12 21 12 21Z"/><circle cx="12" cy="9.5" r="2.3"/></svg></div>
              <div><h4>Dirección</h4><p>Avenida Chipiona, calle Crianza 15<br>Jerez de la Frontera, CP 11408</p></div>
            </div>
            <div class="contact-info-row">
              <div class="contact-info-item reveal-scale stagger-2" data-tilt>
                <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L14 13l5 2v4a2 2 0 0 1-2 2C9.5 21 3 14.5 3 6a2 2 0 0 1 1-2Z"/></svg></div>
                <div><h4>Teléfono</h4><p><a href="tel:+34623456553">623 456 553</a></p></div>
              </div>
              <div class="contact-info-item reveal-scale stagger-3" data-tilt>
                <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 13a8 8 0 0 1 16 0"/><path d="M4 13v4a2 2 0 0 0 2 2h1v-6H5a1 1 0 0 0-1 1Z"/><path d="M20 13v4a2 2 0 0 1-2 2h-1v-6h1a1 1 0 0 1 1 1Z"/></svg></div>
                <div><h4>Horario</h4><p>L–V · 9:00 – 18:00</p></div>
              </div>
              <div class="contact-info-item contact-info-item--wide reveal-scale stagger-4" data-tilt>
                <div class="pillar-icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m4 7 8 6 8-6"/></svg></div>
                <div><h4>Email</h4><p><a href="mailto:info@infinaeconsulting.com">info@infinaeconsulting.com</a></p></div>
              </div>
            </div>
          </div>
          <div class="contact-map reveal-scale stagger-5">
            <iframe src="https://www.google.com/maps?q=Avenida+Chipiona,+Calle+Crianza+15,+11408+Jerez+de+la+Frontera&amp;output=embed" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Mapa de ubicación de Infinae en Jerez de la Frontera"></iframe>
          </div>
        </div>

        <form class="contact-form reveal-right" id="contactForm" novalidate>
          <div class="form-row-grid">
            <div class="form-row">
              <label for="nombre">Nombre</label>
              <input type="text" id="nombre" name="nombre" autocomplete="name" placeholder="Cómo te llamas" required>
              <p class="form-error">Escribe tu nombre.</p>
            </div>
            <div class="form-row">
              <label for="empresa">Empresa</label>
              <input type="text" id="empresa" name="empresa" autocomplete="organization" placeholder="Tu empresa">
            </div>
          </div>
          <div class="form-row">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" autocomplete="email" placeholder="tu@email.com" required>
            <p class="form-error">Introduce un email válido.</p>
          </div>
          <div class="form-row">
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" name="mensaje" placeholder="Cuéntanos qué necesitas" required></textarea>
            <p class="form-error">Cuéntanos brevemente qué necesitas.</p>
          </div>
          <div class="form-row form-consent">
            <label class="form-checkbox">
              <input type="checkbox" id="privacidad" name="privacidad" required>
              <span class="form-checkbox-box" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M5 13l4 4L19 7"/></svg>
              </span>
              <span class="form-checkbox-text">He leído y acepto la <a href="politica-privacidad.php" target="_blank" rel="noopener">política de privacidad</a>.</span>
            </label>
            <p class="form-error">Debes aceptar la política de privacidad para continuar.</p>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn-infinae btn-primary-gold form-submit btn-magnetic">
              <span class="btn-magnetic-label">
                <span class="spinner" aria-hidden="true"></span>
                <span class="submit-label">Enviar mensaje</span>
              </span>
            </button>
            <p class="form-note">Respondemos en menos de 24 horas laborables.</p>
          </div>
          <div class="form-status" id="formStatus" role="status" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </section>
</main>

<?php include __DIR__ . '/includes/footer.php'; ?>

<?php include __DIR__ . '/includes/privacy-widget.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js" defer></script>
</body>
</html>
