// 281 Production — 全站互動（唔用任何 library）

// 未放圖片時，標記出嚟等 CSS 顯示 placeholder 檔名
addEventListener('error', e => {
  if (e.target.tagName === 'IMG') e.target.classList.add('missing');
}, true);
// 上面個 listener 趕唔切接住 script 之前已經失敗嘅圖（例如 hero），要補掃一次
document.querySelectorAll('img').forEach(img => {
  if (img.complete && !img.naturalWidth) img.classList.add('missing');
});

// 手機選單
const toggle = document.querySelector('.nav-toggle');
const nav = document.getElementById('nav');
toggle?.addEventListener('click', () => {
  const open = toggle.getAttribute('aria-expanded') === 'true';
  toggle.setAttribute('aria-expanded', String(!open));
  nav.classList.toggle('open', !open);
});

// 首頁 header：捲過 hero 之後由透明變實色
if (document.body.classList.contains('home')) {
  const solid = () => document.body.classList.toggle('nav-solid', scrollY > innerHeight * .8);
  addEventListener('scroll', solid, { passive: true });
  addEventListener('resize', solid, { passive: true });
  // 瀏覽器還原捲動位置 / bfcache 返回都唔會觸發 scroll，要另外補一次
  addEventListener('pageshow', () => requestAnimationFrame(solid));
  solid();
}

// Footer 年份
document.querySelectorAll('[data-year]').forEach(el => el.textContent = new Date().getFullYear());

// 捲到就淡入
const io = new IntersectionObserver((entries, obs) => {
  entries.forEach(en => {
    if (!en.isIntersecting) return;
    en.target.classList.add('in');
    obs.unobserve(en.target);
  });
}, { rootMargin: '0px 0px -12% 0px' });
document.querySelectorAll('.service, .about-grid, .card, .work-item, .svc-list li, .stat, blockquote, .section-head')
  .forEach(el => {
    el.classList.add('reveal');
    // 同一組兄弟逐個遲少少出，做梯級感
    el.style.setProperty('--i', [...el.parentElement.children].indexOf(el) % 6);
    io.observe(el);
  });

// 首頁服務列表：hover / focus 換左邊嘅預覽圖
const preview = document.querySelector('.svc-preview');
if (preview) {
  const show = key => preview.querySelectorAll('.frame').forEach(f =>
    f.classList.toggle('is-active', f.dataset.for === key));
  document.querySelectorAll('.svc-list a').forEach(a => {
    a.addEventListener('pointerenter', () => show(a.dataset.svc));
    a.addEventListener('focus', () => show(a.dataset.svc));
  });
}

// Contact 頁：contact.php 出錯會 redirect 返嚟帶 ?error=，喺度顯示返
const formError = document.getElementById('form-error');
if (formError) {
  const msg = {
    invalid: '稱呼或者 email 填得唔完整，麻煩再檢查一次。',
    send: '系統一時寄唔出去，唔好意思。可以直接 WhatsApp 或者 email 我，一樣快。',
  }[new URLSearchParams(location.search).get('error')];
  if (msg) {
    formError.textContent = msg;
    formError.hidden = false;
  }
}

// Portfolio 分類篩選（同一頁做曬，唔開八個 category page）
const filters = document.querySelector('.filters');
if (filters) {
  const cards = [...document.querySelectorAll('.grid .card')];
  const apply = cat => {
    cards.forEach(c => c.hidden = cat !== 'all' && c.dataset.cat !== cat);
    filters.querySelectorAll('button').forEach(b =>
      b.setAttribute('aria-pressed', String(b.dataset.filter === cat)));
    history.replaceState(null, '', cat === 'all' ? location.pathname : '#' + cat);
  };
  filters.addEventListener('click', e => {
    const btn = e.target.closest('button[data-filter]');
    if (btn) apply(btn.dataset.filter);
  });
  // 由 index.html 嘅 #wedding 之類連結入嚟，直接套用分類
  const hash = location.hash.slice(1);
  apply(filters.querySelector(`[data-filter="${CSS.escape(hash)}"]`) ? hash : 'all');
}
