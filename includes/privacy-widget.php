<!-- Centro de Privacidad: botón flotante + banner de cookies + modal -->
<button id="privacyFab" type="button" class="privacy-fab" aria-label="Abrir Centro de Privacidad" aria-haspopup="dialog">
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3Z"/></svg>
</button>

<div id="cookieBanner" class="cookie-banner" role="dialog" aria-live="polite" aria-label="Aviso de cookies" aria-describedby="cookieBannerDesc" hidden>
  <div class="container-custom cookie-banner-inner">
    <div class="cookie-banner-icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="9" cy="10" r="1" fill="currentColor" stroke="none"/><circle cx="14" cy="9" r="1" fill="currentColor" stroke="none"/><circle cx="15" cy="14" r="1" fill="currentColor" stroke="none"/><circle cx="10" cy="15" r="1" fill="currentColor" stroke="none"/></svg>
    </div>
    <div class="cookie-banner-content">
      <p class="cookie-banner-title">Usamos cookies</p>
      <p class="cookie-banner-text" id="cookieBannerDesc">Utilizamos cookies propias y de terceros para mejorar tu experiencia, analizar el uso del sitio y ofrecerte contenido personalizado. Consulta nuestra <a href="/politica-cookies.php">política de cookies</a> y <a href="/politica-privacidad.php">política de privacidad</a>.</p>
    </div>
    <div class="cookie-banner-actions" role="group" aria-label="Opciones de consentimiento de cookies">
      <button type="button" id="cookieReject" class="cookie-banner-btn cookie-banner-btn--ghost">Rechazar</button>
      <button type="button" id="cookieConfigure" class="cookie-banner-btn cookie-banner-btn--outline" data-bs-toggle="modal" data-bs-target="#privacyModal" aria-haspopup="dialog">Configurar</button>
      <button type="button" id="cookieAccept" class="cookie-banner-btn cookie-banner-btn--primary">Aceptar todas</button>
    </div>
  </div>
</div>

<div class="modal fade" id="privacyModal" tabindex="-1" role="dialog" aria-labelledby="privacyModalTitle" aria-modal="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg privacy-modal-dialog">
    <div class="modal-content privacy-modal-content">

      <div class="modal-header privacy-modal-header">
        <div class="privacy-modal-header-inner">
          <div class="privacy-modal-header-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3Z"/></svg>
          </div>
          <div>
            <h2 class="privacy-modal-title" id="privacyModalTitle">Centro de Privacidad</h2>
            <p class="privacy-modal-subtitle">Controla cómo usamos tus datos y personaliza tu experiencia</p>
          </div>
        </div>
        <button type="button" class="privacy-modal-close" data-bs-dismiss="modal" aria-label="Cerrar Centro de Privacidad">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </button>
      </div>

      <div class="modal-body privacy-modal-body">
        <div class="privacy-modal-categories" role="list" aria-label="Categorías de cookies">

          <div class="privacy-cat privacy-cat--required" role="listitem">
            <div class="privacy-cat-header">
              <div class="privacy-cat-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="11" width="14" height="9" rx="2"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></svg>
              </div>
              <div class="privacy-cat-info">
                <h3 class="privacy-cat-title">Cookies necesarias</h3>
                <p class="privacy-cat-desc">Esenciales para el funcionamiento del sitio. No pueden desactivarse.</p>
              </div>
              <div class="privacy-cat-toggle">
                <div class="form-check form-switch mb-0 d-flex align-items-center gap-2">
                  <input class="form-check-input privacy-switch" type="checkbox" id="cookie-necessary" checked disabled aria-label="Cookies necesarias, siempre activas">
                  <span class="privacy-always-on" aria-hidden="true">Siempre activo</span>
                </div>
              </div>
            </div>
            <p class="privacy-cat-detail">Incluyen el registro de tu consentimiento y las preferencias básicas de navegación. Sin ellas el sitio no puede funcionar correctamente.</p>
          </div>

          <div class="privacy-cat" role="listitem">
            <div class="privacy-cat-header">
              <div class="privacy-cat-icon privacy-cat-icon--analytics" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19V10M12 19V5M20 19v-7"/></svg>
              </div>
              <div class="privacy-cat-info">
                <h3 class="privacy-cat-title">Cookies analíticas</h3>
                <p class="privacy-cat-desc">Nos ayudan a entender cómo interactúan los visitantes con el sitio.</p>
              </div>
              <div class="privacy-cat-toggle">
                <div class="form-check form-switch mb-0">
                  <input class="form-check-input privacy-switch" type="checkbox" id="cookie-analytics" name="cookie-analytics" role="switch" aria-label="Activar cookies analíticas" aria-describedby="desc-analytics">
                </div>
              </div>
            </div>
            <p class="privacy-cat-detail" id="desc-analytics">Nos permiten medir el número de visitantes, las páginas más visitadas y el origen del tráfico. Todos los datos son anónimos y agregados.</p>
          </div>

          <div class="privacy-cat" role="listitem">
            <div class="privacy-cat-header">
              <div class="privacy-cat-icon privacy-cat-icon--preferences" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="7" x2="19" y2="7"/><circle cx="15" cy="7" r="2"/><line x1="5" y1="12" x2="19" y2="12"/><circle cx="9" cy="12" r="2"/><line x1="5" y1="17" x2="19" y2="17"/><circle cx="14" cy="17" r="2"/></svg>
              </div>
              <div class="privacy-cat-info">
                <h3 class="privacy-cat-title">Cookies de preferencias</h3>
                <p class="privacy-cat-desc">Recuerdan tus elecciones para personalizar tu experiencia.</p>
              </div>
              <div class="privacy-cat-toggle">
                <div class="form-check form-switch mb-0">
                  <input class="form-check-input privacy-switch" type="checkbox" id="cookie-preferences" name="cookie-preferences" role="switch" aria-label="Activar cookies de preferencias" aria-describedby="desc-preferences">
                </div>
              </div>
            </div>
            <p class="privacy-cat-detail" id="desc-preferences">Guardan configuraciones como el idioma o la disposición de pantalla para que no tengas que ajustarlas en cada visita.</p>
          </div>

          <div class="privacy-cat" role="listitem">
            <div class="privacy-cat-header">
              <div class="privacy-cat-icon privacy-cat-icon--marketing" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 10v4a1 1 0 0 0 1 1h2l7 4V5L6 9H4a1 1 0 0 0-1 1Z"/><path d="M17 9a3 3 0 0 1 0 6"/><path d="M6 15v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-3"/></svg>
              </div>
              <div class="privacy-cat-info">
                <h3 class="privacy-cat-title">Cookies de marketing</h3>
                <p class="privacy-cat-desc">Permiten mostrar publicidad relevante según tus intereses.</p>
              </div>
              <div class="privacy-cat-toggle">
                <div class="form-check form-switch mb-0">
                  <input class="form-check-input privacy-switch" type="checkbox" id="cookie-marketing" name="cookie-marketing" role="switch" aria-label="Activar cookies de marketing" aria-describedby="desc-marketing">
                </div>
              </div>
            </div>
            <p class="privacy-cat-detail" id="desc-marketing">Se utilizarían para medir la eficacia de campañas y mostrar anuncios personalizados en otras webs.</p>
          </div>

        </div>

        <div class="privacy-modal-legal">
          <h3 class="privacy-modal-legal-title">Información legal</h3>
          <div class="row g-3">
            <div class="col-sm-4">
              <a href="/politica-privacidad.php" class="privacy-legal-card">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 3h7l4 4v14H7Z"/><path d="M14 3v4h4"/><path d="M9.5 12.5l1.8 1.8L15 10.5"/></svg>
                <span>Política de Privacidad</span>
                <svg class="privacy-legal-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="/politica-cookies.php" class="privacy-legal-card">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><circle cx="9" cy="10" r="1" fill="currentColor" stroke="none"/><circle cx="14" cy="9" r="1" fill="currentColor" stroke="none"/><circle cx="15" cy="14" r="1" fill="currentColor" stroke="none"/><circle cx="10" cy="15" r="1" fill="currentColor" stroke="none"/></svg>
                <span>Política de Cookies</span>
                <svg class="privacy-legal-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="/aviso-legal.php" class="privacy-legal-card">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m14 6 4 4"/><path d="m3 21 7-7"/><path d="m6 13 5 5"/><path d="M10.5 9.5 15 5l4 4-4.5 4.5Z"/></svg>
                <span>Aviso Legal</span>
                <svg class="privacy-legal-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="modal-footer privacy-modal-footer">
        <button type="button" id="privacyReject" class="privacy-footer-btn privacy-footer-btn--reject">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="m5.5 5.5 13 13"/></svg>
          Rechazar todas
        </button>
        <div class="privacy-modal-footer-right">
          <button type="button" id="privacySave" class="privacy-footer-btn privacy-footer-btn--save">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h11l3 3v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1Z"/><path d="M8 4v5h8V4"/><path d="M8 14h8v6H8Z"/></svg>
            Guardar preferencias
          </button>
          <button type="button" id="privacyAccept" class="privacy-footer-btn privacy-footer-btn--accept">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="m8.5 12.5 2.5 2.5 5-5"/></svg>
            Aceptar todas
          </button>
        </div>
      </div>

    </div>
  </div>
</div>

<button class="back-to-top" id="backToTop" aria-label="Volver arriba">
  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19V5M5 12l7-7 7 7"/></svg>
</button>
