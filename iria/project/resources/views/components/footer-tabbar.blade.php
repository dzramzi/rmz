<!-- ✅ شريط سفلي احترافي مع SVG أيقونات -->
<div class="bottom-bar-modern">
  <a href="/" class="active">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-diamond"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M6 5h12l3 5l-8.5 9.5a.7 .7 0 0 1 -1 0l-8.5 -9.5l3 -5" /><path d="M10 12l-2 -2.2l.6 -1" /></svg>
    <span>Earn</span>
  </a>
  <a href="/cashout">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-premium-rights"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M13.867 9.75c-.246 -.48 -.708 -.769 -1.2 -.75h-1.334c-.736 0 -1.333 .67 -1.333 1.5c0 .827 .597 1.499 1.333 1.499h1.334c.736 0 1.333 .671 1.333 1.5c0 .828 -.597 1.499 -1.333 1.499h-1.334c-.492 .019 -.954 -.27 -1.2 -.75" /><path d="M12 7v2" /><path d="M12 15v2" /></svg>
    <span>Cash</span>
  </a>
  <a href="/missions">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-gift"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 8m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" /><path d="M12 8l0 13" /><path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" /><path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" /></svg>
    <span>Gift</span>
  </a>
  <a href="/invite">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users-plus"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4c.96 0 1.84 .338 2.53 .901" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M16 19h6" /><path d="M19 16v6" /></svg>
    <span>Refer</span>
  </a>
</div>

<style>
body {
  padding-bottom: 65px;
  background-color: #0f111a;
}

/* ===== تصميم الشريط السفلي ===== */
.bottom-bar-modern {
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: #131522;
  border-top: 1px solid rgba(255, 255, 255, 0.08);
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 16px 0;
  z-index: 9999;
  font-family: 'Inter', sans-serif;
  box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.4);
}

.bottom-bar-modern a {
  color: #7D7E9C;
  text-align: center;
  font-size: 13px;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s ease, transform 0.2s ease;
}

.bottom-bar-modern a svg {
  margin-bottom: 4px;
  transition: transform 0.25s ease, color 0.3s ease;
}

.bottom-bar-modern a span {
  font-size: 11px;
  color: #7D7E9C;
  font-weight: 400;
  letter-spacing: 0.3px;
}

.bottom-bar-modern a.active svg,
.bottom-bar-modern a.active span {
  color: #09C16F;
}

.bottom-bar-modern a.active svg {
  transform: scale(1.1);
}
</style>

<script>
const linksModern = document.querySelectorAll('.bottom-bar-modern a');
const currentPathModern = window.location.pathname;

linksModern.forEach(link => {
  link.classList.remove('active');
  const href = link.getAttribute('href');
  if ((href === "/" && (currentPathModern === "/" || currentPathModern === "/index.html")) ||
      (href !== "/" && currentPathModern.startsWith(href))) {
    link.classList.add('active');
  }
});
</script>