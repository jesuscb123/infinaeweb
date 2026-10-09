<?php
/**
 * Pie de página — Infinae.
 * En index.php muestra los datos comerciales (Jerez) y los enlaces sociales;
 * en el resto de páginas muestra los datos fiscales/legales (Badajoz) y
 * marca con aria-current el documento legal que se está viendo.
 */
$infinaePage   = basename($_SERVER['PHP_SELF']);
$infinaeIsHome = $infinaePage === 'index.php';
$infinaeAnchor = $infinaeIsHome ? '' : '/';
?>
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
          <li><a href="<?php echo $infinaeAnchor; ?>#quienes-somos">Quiénes somos</a></li>
          <li><a href="<?php echo $infinaeAnchor; ?>#que-hacemos">Qué hacemos</a></li>
          <li><a href="<?php echo $infinaeAnchor; ?>#calidad">Compromiso con la calidad</a></li>
          <li><a href="<?php echo $infinaeAnchor; ?>#instalaciones">Instalaciones</a></li>
          <li><a href="<?php echo $infinaeAnchor; ?>#atencion-cliente">Atención al cliente</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h5>Contacto</h5>
<?php if ($infinaeIsHome): ?>
        <ul>
          <li><a href="tel:+34623456553">623 456 553</a></li>
          <li><a href="mailto:info@infinaeconsulting.com">info@infinaeconsulting.com</a></li>
          <li>Avenida Chipiona, calle Crianza 15,<br>Jerez de la Frontera, CP 11408</li>
        </ul>
<?php else: ?>
        <ul>
          <li><a href="tel:+34657611291">657 61 12 91</a></li>
          <li><a href="mailto:administracion@infinaeconsulting.com">administracion@infinaeconsulting.com</a></li>
          <li>C/ General Prim 14,<br>CP 06007, Badajoz</li>
        </ul>
<?php endif; ?>
      </div>
      <div class="footer-col">
        <h5>Legal</h5>
        <ul>
          <li><a href="aviso-legal"<?php echo $infinaePage === 'aviso-legal.php' ? ' aria-current="page"' : ''; ?>>Aviso legal</a></li>
          <li><a href="politica-privacidad"<?php echo $infinaePage === 'politica-privacidad.php' ? ' aria-current="page"' : ''; ?>>Política de privacidad</a></li>
          <li><a href="politica-cookies"<?php echo $infinaePage === 'politica-cookies.php' ? ' aria-current="page"' : ''; ?>>Política de cookies</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© <?php echo date("Y"); ?> Infinae Consulting. Todos los derechos reservados.</span>
<?php if ($infinaeIsHome): ?>
      <div class="social-links">
        <a href="https://www.instagram.com/infinaeconsulting" target="_blank" rel="noopener" aria-label="Instagram de Infinae">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1"/></svg>
        </a>
        <a href="https://www.facebook.com/profile.php?id=61566405762113" target="_blank" rel="noopener" aria-label="Facebook de Infinae">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M15 4h-2a4 4 0 0 0-4 4v3H7v4h2v7h4v-7h3l1-4h-4V8a1 1 0 0 1 1-1h3Z"/></svg>
        </a>
      </div>
<?php endif; ?>
    </div>
  </div>
</footer>
