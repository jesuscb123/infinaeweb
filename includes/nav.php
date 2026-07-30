<?php
/**
 * Cabecera / navegación principal — Infinae.
 * Detecta la página actual para decidir si los enlaces del menú apuntan a
 * anclas locales (index.php) o a "index.php#ancla" (resto de páginas), y si
 * el header arranca con el estilo "scrolled" (páginas sin hero de vídeo).
 */
$infinaePage   = basename($_SERVER['PHP_SELF']);
$infinaeIsHome = $infinaePage === 'index.php';
$infinaeAnchor = $infinaeIsHome ? '' : '/index.php';
?>
<header class="navbar-infinae<?php echo $infinaeIsHome ? '' : ' is-scrolled'; ?>" id="siteNavbar">
  <div class="container-custom">
    <a href="<?php echo $infinaeIsHome ? '#top' : '/index.php'; ?>" class="nav-brand">
      <img src="/assets/img/icon-navy.webp" alt="" width="51" height="24">
      INFINAE
    </a>
    <nav aria-label="Navegación principal">
      <ul class="nav-links" id="navLinks">
        <li><a href="<?php echo $infinaeAnchor; ?>#quienes-somos">Quiénes somos</a></li>
        <li><a href="<?php echo $infinaeAnchor; ?>#que-hacemos">Qué hacemos</a></li>
        <li><a href="<?php echo $infinaeAnchor; ?>#calidad">Compromiso con la calidad</a></li>
        <li><a href="<?php echo $infinaeAnchor; ?>#instalaciones">Instalaciones</a></li>
        <li><a href="<?php echo $infinaeAnchor; ?>#atencion-cliente">Atención al cliente</a></li>
        <li><a href="<?php echo $infinaeAnchor; ?>#contacto" class="btn-infinae btn-primary-gold" style="padding:.55rem 1.1rem;">Hablemos</a></li>
      </ul>
    </nav>
    <button class="nav-toggle" id="navToggle" aria-expanded="false" aria-controls="navLinks" aria-label="Abrir menú">
      <span></span><span></span><span></span>
    </button>
  </div>
</header>
