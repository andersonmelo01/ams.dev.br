<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ZipFood — Seu Delivery Mais Rápido, Simples e Completo</title>
<link href="https://fonts.googleapis.com/css2?family=Syne:wght@700;800&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
  :root {
    --orange: #F26522;
    --orange-dark: #d9541a;
    --navy: #0F1F3D;
    --navy-light: #162848;
    --cream: #FFF8F2;
    --white: #ffffff;
    --gray: #6B7280;
    --light: #F9FAFB;
    --green: #16A34A;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--navy);
    overflow-x: hidden;
  }

  /* ── NAV ── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 16px 6vw;
    background: rgba(255,248,242,0.92);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(242,101,34,0.12);
  }
  .nav-logo { display: flex; align-items: center; gap: 10px; }
  .nav-logo svg { width: 38px; height: 38px; }
  .nav-brand { font-family: 'Syne', sans-serif; font-size: 1.35rem; font-weight: 800; color: var(--navy); }
  .nav-brand span { color: var(--orange); }
  .nav-cta {
    background: var(--orange); color: #fff; font-family: 'DM Sans', sans-serif;
    font-weight: 600; font-size: 0.9rem; padding: 10px 22px; border-radius: 50px;
    text-decoration: none; transition: background .2s, transform .15s;
    border: none; cursor: pointer;
  }
  .nav-cta:hover { background: var(--orange-dark); transform: translateY(-1px); }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    background: var(--navy);
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 0;
    padding: 100px 6vw 60px;
    position: relative;
    overflow: hidden;
  }
  .hero::before {
    content: '';
    position: absolute; top: -120px; right: -120px;
    width: 600px; height: 600px;
    background: radial-gradient(circle, rgba(242,101,34,0.28) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
  }
  .hero::after {
    content: '';
    position: absolute; bottom: -80px; left: -80px;
    width: 400px; height: 400px;
    background: radial-gradient(circle, rgba(242,101,34,0.12) 0%, transparent 70%);
    border-radius: 50%;
    pointer-events: none;
  }
  .hero-text { position: relative; z-index: 2; }
  .hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(242,101,34,0.15); border: 1px solid rgba(242,101,34,0.4);
    color: var(--orange); font-size: 0.82rem; font-weight: 600;
    padding: 6px 16px; border-radius: 50px;
    margin-bottom: 28px;
    animation: fadeUp .6s ease both;
  }
  .hero-badge::before { content: '🚀'; }
  h1 {
    font-family: 'Syne', sans-serif;
    font-size: clamp(2.4rem, 4.5vw, 4rem);
    font-weight: 800; line-height: 1.08;
    color: var(--white);
    animation: fadeUp .7s .1s ease both;
  }
  h1 em { color: var(--orange); font-style: normal; }
  .hero-sub {
    margin-top: 22px;
    font-size: 1.1rem; line-height: 1.7;
    color: rgba(255,255,255,0.65);
    max-width: 480px;
    animation: fadeUp .7s .2s ease both;
  }
  .hero-actions {
    margin-top: 36px; display: flex; gap: 14px; flex-wrap: wrap;
    animation: fadeUp .7s .3s ease both;
  }
  .btn-primary {
    background: var(--orange); color: #fff;
    padding: 16px 32px; border-radius: 50px;
    font-family: 'DM Sans', sans-serif; font-weight: 700; font-size: 1rem;
    text-decoration: none; border: none; cursor: pointer;
    transition: background .2s, transform .15s, box-shadow .2s;
    box-shadow: 0 8px 32px rgba(242,101,34,0.4);
  }
  .btn-primary:hover { background: var(--orange-dark); transform: translateY(-2px); box-shadow: 0 12px 40px rgba(242,101,34,0.5); }
  .btn-outline {
    background: transparent; color: #fff;
    padding: 15px 30px; border-radius: 50px;
    font-family: 'DM Sans', sans-serif; font-weight: 600; font-size: 1rem;
    text-decoration: none; border: 1.5px solid rgba(255,255,255,0.3);
    transition: border-color .2s, background .2s;
    cursor: pointer;
  }
  .btn-outline:hover { border-color: var(--orange); background: rgba(242,101,34,0.08); }

  .hero-stats {
    display: flex; gap: 32px; margin-top: 44px;
    animation: fadeUp .7s .4s ease both;
  }
  .stat { display: flex; flex-direction: column; gap: 2px; }
  .stat-num { font-family: 'Syne', sans-serif; font-size: 1.9rem; font-weight: 800; color: var(--orange); }
  .stat-label { font-size: 0.8rem; color: rgba(255,255,255,0.5); font-weight: 500; }

  /* phone mockup */
  .hero-visual {
    position: relative; z-index: 2;
    display: flex; justify-content: center; align-items: center;
    animation: fadeUp .8s .2s ease both;
  }
  .phone-wrap {
    position: relative;
    width: 260px;
  }
  .phone-frame {
    width: 260px; background: #1a2a4a;
    border-radius: 36px;
    border: 6px solid rgba(255,255,255,0.1);
    padding: 18px;
    box-shadow: 0 40px 80px rgba(0,0,0,0.5), 0 0 0 1px rgba(255,255,255,0.05);
  }
  .phone-screen { background: #0F1F3D; border-radius: 22px; overflow: hidden; }
  .phone-topbar {
    background: var(--navy-light); padding: 14px 16px 10px;
    display: flex; justify-content: space-between; align-items: center;
  }
  .phone-topbar .greeting { color: rgba(255,255,255,0.5); font-size: 0.7rem; }
  .phone-topbar .rest { color: #fff; font-size: 0.85rem; font-weight: 600; }
  .phone-metrics {
    display: grid; grid-template-columns: 1fr 1fr; gap: 8px;
    padding: 12px;
  }
  .metric-card {
    background: #162848; border-radius: 12px; padding: 12px;
  }
  .metric-card .label { font-size: 0.62rem; color: rgba(255,255,255,0.4); margin-bottom: 4px; }
  .metric-card .value { font-family: 'Syne', sans-serif; font-size: 1.4rem; font-weight: 800; color: #fff; }
  .metric-card .value.money { font-size: 1rem; color: var(--orange); }
  .badge-up { display: inline-block; font-size: 0.6rem; color: var(--green); font-weight: 600; margin-top: 2px; }
  .phone-orders { padding: 0 12px 12px; display: flex; flex-direction: column; gap: 6px; }
  .order-row {
    background: #162848; border-radius: 10px; padding: 10px 12px;
    display: flex; justify-content: space-between; align-items: center;
  }
  .order-id { font-size: 0.7rem; font-weight: 600; color: #fff; }
  .order-time { font-size: 0.6rem; color: rgba(255,255,255,0.35); margin-top: 2px; }
  .order-status { font-size: 0.62rem; font-weight: 700; padding: 3px 8px; border-radius: 20px; }
  .status-entregue { background: rgba(22,163,74,0.2); color: #4ade80; }
  .status-preparo { background: rgba(242,101,34,0.2); color: var(--orange); }
  .status-saiu { background: rgba(59,130,246,0.2); color: #60a5fa; }
  .order-val { font-size: 0.72rem; font-weight: 700; color: #fff; }

  .float-badge {
    position: absolute; right: -50px; top: 40px;
    background: var(--green); color: #fff;
    border-radius: 16px; padding: 10px 16px;
    font-size: 0.72rem; font-weight: 700;
    box-shadow: 0 8px 24px rgba(22,163,74,0.4);
    white-space: nowrap;
    animation: float 3s ease-in-out infinite;
  }
  .float-badge2 {
    position: absolute; left: -60px; bottom: 60px;
    background: var(--orange); color: #fff;
    border-radius: 16px; padding: 10px 16px;
    font-size: 0.72rem; font-weight: 700;
    box-shadow: 0 8px 24px rgba(242,101,34,0.4);
    white-space: nowrap;
    animation: float 3s 1.5s ease-in-out infinite;
  }

  /* ── FEATURES STRIP ── */
  .strip {
    background: var(--orange);
    padding: 18px 6vw;
    display: flex; gap: 40px; justify-content: center; flex-wrap: wrap;
    overflow: hidden;
  }
  .strip-item {
    display: flex; align-items: center; gap: 10px;
    color: #fff; font-weight: 600; font-size: 0.9rem; white-space: nowrap;
  }
  .strip-item span { font-size: 1.2rem; }

  /* ── SECTION BASE ── */
  section { padding: 80px 6vw; }
  .section-label {
    display: inline-block; font-size: 0.78rem; font-weight: 700; letter-spacing: .12em;
    text-transform: uppercase; color: var(--orange);
    background: rgba(242,101,34,0.1); padding: 5px 14px; border-radius: 50px;
    margin-bottom: 16px;
  }
  h2 {
    font-family: 'Syne', sans-serif; font-size: clamp(1.9rem, 3.5vw, 2.8rem);
    font-weight: 800; line-height: 1.15; color: var(--navy);
    max-width: 600px;
  }
  h2 em { color: var(--orange); font-style: normal; }
  .section-desc { margin-top: 14px; color: var(--gray); font-size: 1.05rem; line-height: 1.7; max-width: 560px; }

  /* ── WHY ── */
  .why { background: var(--white); }
  .why-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 20px; margin-top: 50px;
  }
  .why-card {
    background: var(--cream); border-radius: 20px; padding: 28px;
    border: 1.5px solid rgba(242,101,34,0.12);
    transition: transform .2s, border-color .2s, box-shadow .2s;
    position: relative; overflow: hidden;
  }
  .why-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: var(--orange); opacity: 0; transition: opacity .2s;
  }
  .why-card:hover { transform: translateY(-5px); border-color: var(--orange); box-shadow: 0 16px 40px rgba(242,101,34,0.12); }
  .why-card:hover::before { opacity: 1; }
  .why-icon { font-size: 2rem; margin-bottom: 14px; }
  .why-title { font-family: 'Syne', sans-serif; font-size: 1.05rem; font-weight: 700; margin-bottom: 8px; color: var(--navy); }
  .why-desc { font-size: 0.88rem; color: var(--gray); line-height: 1.65; }

  /* ── BENEFITS ── */
  .benefits {
    background: var(--navy);
    display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;
  }
  .benefits h2 { color: var(--white); }
  .benefits h2 em { color: var(--orange); }
  .benefits .section-label { background: rgba(242,101,34,0.15); }
  .benefits .section-desc { color: rgba(255,255,255,0.55); }
  .benefit-list { margin-top: 36px; display: flex; flex-direction: column; gap: 18px; }
  .benefit-item {
    display: flex; gap: 16px; align-items: flex-start;
    padding: 18px 20px; border-radius: 16px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.07);
    transition: background .2s;
  }
  .benefit-item:hover { background: rgba(242,101,34,0.08); border-color: rgba(242,101,34,0.25); }
  .benefit-check {
    width: 28px; height: 28px; flex-shrink: 0;
    background: var(--green); border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 0.75rem; color: #fff; font-weight: 700;
  }
  .benefit-title { font-weight: 600; font-size: 0.95rem; color: #fff; margin-bottom: 4px; }
  .benefit-desc { font-size: 0.83rem; color: rgba(255,255,255,0.5); line-height: 1.5; }

  .benefits-visual {
    background: rgba(255,255,255,0.03); border-radius: 24px;
    border: 1px solid rgba(255,255,255,0.08);
    padding: 32px; display: flex; flex-direction: column; gap: 16px;
  }
  .bv-label { font-size: 0.78rem; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--orange); margin-bottom: 8px; }
  .compare-row { display: flex; flex-direction: column; gap: 10px; }
  .compare-item {
    display: flex; align-items: center; justify-content: space-between;
    padding: 14px 18px; border-radius: 12px;
  }
  .compare-item.bad { background: rgba(239,68,68,0.08); border: 1px solid rgba(239,68,68,0.15); }
  .compare-item.good { background: rgba(22,163,74,0.1); border: 1px solid rgba(22,163,74,0.2); }
  .compare-text { font-size: 0.88rem; font-weight: 500; }
  .compare-item.bad .compare-text { color: rgba(255,255,255,0.5); }
  .compare-item.good .compare-text { color: #fff; }
  .compare-ico { font-size: 1.1rem; }
  .bv-highlight {
    background: var(--orange); border-radius: 16px; padding: 20px 22px;
    text-align: center; margin-top: 8px;
  }
  .bv-highlight .big { font-family: 'Syne', sans-serif; font-size: 2rem; font-weight: 800; color: #fff; display: block; }
  .bv-highlight .small { font-size: 0.85rem; color: rgba(255,255,255,0.85); margin-top: 4px; display: block; }

  /* ── PLANS ── */
  .plans { background: var(--light); }
  .plans-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 24px; margin-top: 50px;
  }
  .plan-card {
    background: var(--white); border-radius: 24px; padding: 32px;
    border: 1.5px solid rgba(0,0,0,0.07);
    transition: transform .2s, box-shadow .2s;
    position: relative;
  }
  .plan-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(0,0,0,0.1); }
  .plan-card.featured {
    background: var(--navy); border-color: var(--orange);
    box-shadow: 0 8px 40px rgba(242,101,34,0.25);
  }
  .plan-badge {
    position: absolute; top: -12px; left: 50%; transform: translateX(-50%);
    background: var(--orange); color: #fff; font-size: 0.72rem; font-weight: 700;
    padding: 4px 14px; border-radius: 20px; white-space: nowrap;
  }
  .plan-icon { font-size: 2rem; margin-bottom: 16px; }
  .plan-name { font-family: 'Syne', sans-serif; font-size: 1.1rem; font-weight: 800; color: var(--navy); margin-bottom: 8px; }
  .plan-card.featured .plan-name { color: #fff; }
  .plan-desc { font-size: 0.85rem; color: var(--gray); line-height: 1.6; margin-bottom: 20px; }
  .plan-card.featured .plan-desc { color: rgba(255,255,255,0.55); }
  .plan-feature { display: flex; gap: 8px; align-items: center; font-size: 0.85rem; color: var(--navy); margin-bottom: 10px; }
  .plan-card.featured .plan-feature { color: rgba(255,255,255,0.8); }
  .plan-feature::before { content: '✓'; color: var(--green); font-weight: 700; flex-shrink: 0; }
  .plan-cta {
    display: block; text-align: center; margin-top: 24px;
    background: var(--orange); color: #fff;
    padding: 13px; border-radius: 50px; font-weight: 700; font-size: 0.9rem;
    text-decoration: none; transition: background .2s, transform .15s;
    border: none; cursor: pointer;
  }
  .plan-cta:hover { background: var(--orange-dark); transform: translateY(-1px); }
  .plan-cta.outline {
    background: transparent; border: 1.5px solid rgba(0,0,0,0.15); color: var(--navy);
  }
  .plan-cta.outline:hover { border-color: var(--orange); color: var(--orange); background: rgba(242,101,34,0.05); }

  /* ── STRATEGY ── */
  .strategy { background: var(--white); }
  .strategy-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px; margin-top: 50px;
  }
  .strat-card {
    border-radius: 20px; padding: 26px;
    background: linear-gradient(135deg, var(--cream) 0%, rgba(242,101,34,0.06) 100%);
    border: 1.5px solid rgba(242,101,34,0.1);
    transition: transform .2s;
  }
  .strat-card:hover { transform: translateY(-4px); }
  .strat-num { font-family: 'Syne', sans-serif; font-size: 2.5rem; font-weight: 800; color: rgba(242,101,34,0.15); line-height: 1; margin-bottom: 12px; }
  .strat-title { font-family: 'Syne', sans-serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin-bottom: 8px; }
  .strat-desc { font-size: 0.85rem; color: var(--gray); line-height: 1.6; }

  /* ── CTA FINAL ── */
  .cta-final {
    background: var(--navy);
    text-align: center; padding: 90px 6vw;
    position: relative; overflow: hidden;
  }
  .cta-final::before {
    content: '';
    position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
    width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(242,101,34,0.2) 0%, transparent 65%);
    border-radius: 50%; pointer-events: none;
  }
  .cta-final h2 { color: var(--white); max-width: 640px; margin: 0 auto; font-size: clamp(2rem, 4vw, 3rem); }
  .cta-final .sub { color: rgba(255,255,255,0.55); margin: 16px auto 36px; font-size: 1.05rem; max-width: 500px; }
  .cta-contacts {
    display: flex; gap: 24px; justify-content: center; flex-wrap: wrap;
    margin-top: 36px;
  }
  .contact-item {
    display: flex; align-items: center; gap: 10px;
    color: rgba(255,255,255,0.7); font-size: 0.9rem;
  }
  .contact-item .ico { font-size: 1.2rem; }
  .contact-item a { color: rgba(255,255,255,0.85); text-decoration: none; font-weight: 500; }
  .contact-item a:hover { color: var(--orange); }

  /* ── FOOTER ── */
  footer {
    background: #080f20; color: rgba(255,255,255,0.35);
    text-align: center; padding: 24px 6vw;
    font-size: 0.82rem; border-top: 1px solid rgba(255,255,255,0.05);
  }
  footer a { color: var(--orange); text-decoration: none; }
  footer strong { color: rgba(255,255,255,0.6); }

  /* ── ANIMATIONS ── */
  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to   { opacity: 1; transform: translateY(0); }
  }
  @keyframes float {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-10px); }
  }

  /* scroll reveal */
  .reveal {
    opacity: 0; transform: translateY(32px);
    transition: opacity .6s ease, transform .6s ease;
  }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* ── RESPONSIVE ── */
  @media (max-width: 860px) {
    .hero { grid-template-columns: 1fr; padding-top: 110px; text-align: center; }
    .hero-sub { margin: 16px auto 0; }
    .hero-actions { justify-content: center; }
    .hero-stats { justify-content: center; }
    .hero-visual { margin-top: 40px; }
    .float-badge, .float-badge2 { display: none; }
    .benefits { grid-template-columns: 1fr; }
    h2 { max-width: 100%; }
  }
  @media (max-width: 560px) {
    .plan-card { padding: 24px 20px; }
    .strip { gap: 20px; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="nav-logo">
    <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect width="40" height="40" rx="10" fill="#F26522"/>
      <text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" font-family="'Syne',sans-serif" font-size="20" font-weight="800" fill="white">Z</text>
    </svg>
    <span class="nav-brand">Zip<span>Food</span></span>
  </div>
  <a href="#contato" class="nav-cta">Solicitar Demo Grátis</a>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-text">
    <div class="hero-badge">Sistema completo para restaurantes</div>
    <h1>Seu delivery <em>mais rápido,</em> simples e completo.</h1>
    <p class="hero-sub">Venda mais, fidelize clientes e tenha controle total do negócio — sem depender de iFood ou marketplaces.</p>
    <div class="hero-actions">
      <a href="#contato" class="btn-primary">🚀 Quero uma demo grátis</a>
      <a href="#planos" class="btn-outline">Ver planos</a>
    </div>
    <div class="hero-stats">
      <div class="stat"><span class="stat-num">0%</span><span class="stat-label">Taxa por pedido</span></div>
      <div class="stat"><span class="stat-num">100%</span><span class="stat-label">Do lucro é seu</span></div>
      <div class="stat"><span class="stat-num">24h</span><span class="stat-label">Suporte especializado</span></div>
    </div>
  </div>
  <div class="hero-visual">
    <div class="phone-wrap">
      <div class="float-badge">📈 +18% de pedidos hoje</div>
      <div class="phone-frame">
        <div class="phone-screen">
          <div class="phone-topbar">
            <div><div class="greeting">Olá,</div><div class="rest">Restaurante!</div></div>
            <span style="color:var(--orange);font-size:1.1rem;">🔔</span>
          </div>
          <div class="phone-metrics">
            <div class="metric-card">
              <div class="label">Pedidos hoje</div>
              <div class="value">23</div>
              <div class="badge-up">▲ +18% vs ontem</div>
            </div>
            <div class="metric-card">
              <div class="label">Faturamento</div>
              <div class="value money">R$ 1.248,90</div>
              <div class="badge-up">▲ +12%</div>
            </div>
          </div>
          <div class="phone-orders">
            <div style="font-size:.65rem;font-weight:700;color:rgba(255,255,255,.4);padding:0 2px 4px;">Pedidos recentes</div>
            <div class="order-row">
              <div><div class="order-id">Pedido #1025</div><div class="order-time">10:42</div></div>
              <span class="order-status status-entregue">Entregue</span>
              <div class="order-val">R$ 58,90</div>
            </div>
            <div class="order-row">
              <div><div class="order-id">Pedido #1024</div><div class="order-time">10:28</div></div>
              <span class="order-status status-preparo">Em preparo</span>
              <div class="order-val">R$ 42,00</div>
            </div>
            <div class="order-row">
              <div><div class="order-id">Pedido #1023</div><div class="order-time">10:15</div></div>
              <span class="order-status status-saiu">Saiu p/ entrega</span>
              <div class="order-val">R$ 67,50</div>
            </div>
          </div>
        </div>
      </div>
      <div class="float-badge2">💰 Sem taxas abusivas</div>
    </div>
  </div>
</section>

<!-- STRIP -->
<div class="strip">
  <div class="strip-item"><span>⚡</span> Pedidos rápidos</div>
  <div class="strip-item"><span>📊</span> Relatórios em tempo real</div>
  <div class="strip-item"><span>🔔</span> Notificações automáticas</div>
  <div class="strip-item"><span>🏪</span> Cardápio digital</div>
  <div class="strip-item"><span>💳</span> Pagamentos seguros</div>
  <div class="strip-item"><span>🛡️</span> Dados 100% seus</div>
</div>

<!-- WHY -->
<section class="why">
  <div class="section-label">Por que o ZipFood?</div>
  <h2>Tudo que seu negócio precisa <em>em um só lugar</em></h2>
  <p class="section-desc">Sistema completo para restaurantes, lanchonetes, padarias, docerias e muito mais.</p>
  <div class="why-grid">
    <div class="why-card reveal">
      <div class="why-icon">⚡</div>
      <div class="why-title">Pedidos Rápidos</div>
      <div class="why-desc">Reduza erros e entregue com mais agilidade. Receba e gerencie pedidos em tempo real sem complicação.</div>
    </div>
    <div class="why-card reveal">
      <div class="why-icon">🗂️</div>
      <div class="why-title">Gestão Completa</div>
      <div class="why-desc">Controle de pedidos, cardápio, clientes e entregas em uma única tela intuitiva.</div>
    </div>
    <div class="why-card reveal">
      <div class="why-icon">📈</div>
      <div class="why-title">Relatórios e Vendas</div>
      <div class="why-desc">Acompanhe resultados e tome decisões melhores baseadas em dados reais do seu negócio.</div>
    </div>
    <div class="why-card reveal">
      <div class="why-icon">🔔</div>
      <div class="why-title">Notificações em Tempo Real</div>
      <div class="why-desc">Fique por dentro de cada pedido e entrega, do momento que entra até a porta do cliente.</div>
    </div>
  </div>
</section>

<!-- BENEFITS -->
<section class="benefits">
  <div class="reveal">
    <div class="section-label">Vantagens</div>
    <h2>Mais lucro. <em>Mais controle.</em> Mais resultados.</h2>
    <p class="section-desc">Pare de pagar taxas abusivas para marketplaces. Com o ZipFood, cada centavo é seu.</p>
    <div class="benefit-list">
      <div class="benefit-item">
        <div class="benefit-check">✓</div>
        <div>
          <div class="benefit-title">Mais lucro por pedido</div>
          <div class="benefit-desc">Sem taxas abusivas de marketplaces. O lucro vai inteiro para o seu bolso.</div>
        </div>
      </div>
      <div class="benefit-item">
        <div class="benefit-check">✓</div>
        <div>
          <div class="benefit-title">Canal próprio de vendas</div>
          <div class="benefit-desc">Seu app + seu site + seus clientes. Independência total do iFood e similares.</div>
        </div>
      </div>
      <div class="benefit-item">
        <div class="benefit-check">✓</div>
        <div>
          <div class="benefit-title">Fidelização automática</div>
          <div class="benefit-desc">Histórico, promoções e recompra — clientes que voltam sempre.</div>
        </div>
      </div>
      <div class="benefit-item">
        <div class="benefit-check">✓</div>
        <div>
          <div class="benefit-title">Controle total do negócio</div>
          <div class="benefit-desc">Pedidos, clientes, entregas e financeiro — tudo em uma plataforma.</div>
        </div>
      </div>
    </div>
  </div>
  <div class="benefits-visual reveal">
    <div class="bv-label">Compare a diferença</div>
    <div class="compare-row">
      <div class="compare-item bad">
        <span class="compare-text">iFood / Marketplace</span>
        <span class="compare-ico">❌</span>
      </div>
      <div style="display:flex;flex-direction:column;gap:6px;padding-left:8px;">
        <div style="font-size:.75rem;color:rgba(255,255,255,.35);">→ Taxa de 12–30% por pedido</div>
        <div style="font-size:.75rem;color:rgba(255,255,255,.35);">→ Clientes não são seus</div>
        <div style="font-size:.75rem;color:rgba(255,255,255,.35);">→ Dependência total da plataforma</div>
      </div>
      <div class="compare-item good" style="margin-top:12px;">
        <span class="compare-text">ZipFood — Sistema Próprio</span>
        <span class="compare-ico">✅</span>
      </div>
      <div style="display:flex;flex-direction:column;gap:6px;padding-left:8px;">
        <div style="font-size:.75rem;color:rgba(255,255,255,.5);">→ 0% de taxa por pedido</div>
        <div style="font-size:.75rem;color:rgba(255,255,255,.5);">→ Seus dados, sua base</div>
        <div style="font-size:.75rem;color:rgba(255,255,255,.5);">→ Sistema com sua marca</div>
      </div>
    </div>
    <div class="bv-highlight">
      <span class="big">100%</span>
      <span class="small">do lucro vai para o seu bolso — sem taxa por pedido.</span>
    </div>
  </div>
</section>

<!-- STRATEGY -->
<section class="strategy">
  <div class="section-label">Estratégia</div>
  <h2>Transforme seu delivery em uma <em>máquina de vendas</em></h2>
  <p class="section-desc">Um sistema completo de estratégia para atrair, fidelizar e lucrar mais todos os dias.</p>
  <div class="strategy-grid">
    <div class="strat-card reveal">
      <div class="strat-num">01</div>
      <div class="strat-title">Atraia mais clientes</div>
      <div class="strat-desc">Cardápio digital, promoções e fácil divulgação pelas redes sociais e WhatsApp.</div>
    </div>
    <div class="strat-card reveal">
      <div class="strat-num">02</div>
      <div class="strat-title">Fidelize e aumente o ticket</div>
      <div class="strat-desc">Programas de fidelidade, cupons e ofertas exclusivas para clientes que voltam sempre.</div>
    </div>
    <div class="strat-card reveal">
      <div class="strat-num">03</div>
      <div class="strat-title">Decisões baseadas em dados</div>
      <div class="strat-desc">Relatórios completos para você entender o negócio e lucrar mais todos os dias.</div>
    </div>
    <div class="strat-card reveal">
      <div class="strat-num">04</div>
      <div class="strat-title">Implantação em dias</div>
      <div class="strat-desc">Seu sistema funcionando rapidinho, com suporte próximo, humano e ágil em cada passo.</div>
    </div>
  </div>
</section>

<!-- PLANS -->
<section class="plans" id="planos">
  <div style="text-align:center;">
    <div class="section-label" style="display:inline-block;">Planos</div>
    <h2 style="margin:0 auto;">Planos acessíveis para <em>qualquer negócio</em></h2>
    <p class="section-desc" style="margin:14px auto 0;">Invista de acordo com seu faturamento. Sem surpresas, sem letras miúdas.</p>
  </div>
  <div class="plans-grid">
    <div class="plan-card reveal">
      <div class="plan-icon">🌱</div>
      <div class="plan-name">Starter</div>
      <div class="plan-desc">Ideal para quem está começando e quer sair do marketplace sem complicação.</div>
      <div class="plan-feature">Cardápio digital</div>
      <div class="plan-feature">Gestão de pedidos</div>
      <div class="plan-feature">Notificações automáticas</div>
      <div class="plan-feature">Suporte via WhatsApp</div>
      <a href="#contato" class="plan-cta outline">Falar com consultor</a>
    </div>
    <div class="plan-card featured reveal">
      <div class="plan-badge">⭐ Mais popular</div>
      <div class="plan-icon">🚀</div>
      <div class="plan-name">Pro</div>
      <div class="plan-desc" style="color:rgba(255,255,255,.55);">Para restaurantes que querem crescer de verdade com canais próprios e fidelização.</div>
      <div class="plan-feature">Tudo do Starter</div>
      <div class="plan-feature">App próprio com sua marca</div>
      <div class="plan-feature">Programa de fidelidade</div>
      <div class="plan-feature">Relatórios avançados</div>
      <div class="plan-feature">Cupons e promoções</div>
      <a href="#contato" class="plan-cta">Quero o plano Pro</a>
    </div>
    <div class="plan-card reveal">
      <div class="plan-icon">🏆</div>
      <div class="plan-name">Enterprise</div>
      <div class="plan-desc">Para redes e franquias com volume alto e necessidades específicas de integração.</div>
      <div class="plan-feature">Tudo do Pro</div>
      <div class="plan-feature">Multi-unidades</div>
      <div class="plan-feature">Integrações personalizadas</div>
      <div class="plan-feature">Gerente de conta dedicado</div>
      <a href="#contato" class="plan-cta outline">Falar com especialista</a>
    </div>
  </div>
  <p style="text-align:center;margin-top:30px;font-size:0.85rem;color:var(--gray);">
    🛡️ Todos os planos são <strong>sem taxa por pedido</strong>. Investimento de acordo com o seu faturamento.
  </p>
</section>

<!-- CTA FINAL -->
<section class="cta-final" id="contato">
  <div style="position:relative;z-index:2;">
    <div class="section-label" style="display:inline-block;background:rgba(242,101,34,0.2);">Comece hoje mesmo</div>
    <h2 style="max-width:640px;margin:16px auto 0;">Solicite uma <em>demonstração gratuita</em> e veja como é fácil</h2>
    <p class="sub">Transforme seu delivery em uma máquina de vendas. Mais clientes. Mais pedidos. Mais lucro para você.</p>
    <a href="https://wa.me/5521982846871" target="_blank" class="btn-primary" style="display:inline-flex;align-items:center;gap:10px;font-size:1.05rem;padding:18px 38px;">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="white"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
      Falar no WhatsApp
    </a>
    <div class="cta-contacts">
      <div class="contact-item">
        <span class="ico">✉️</span>
        <a href="mailto:amssistemas95@gmail.com">amssistemas95@gmail.com</a>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <strong>ZipFood</strong> — Sistema de Delivery · Mais do que um sistema, <a href="#contato">uma parceria para o crescimento do seu negócio.</a>
  <br><span style="margin-top:8px;display:inline-block;">© 2025 AMS Sistemas · <a href="https://www.ams.dev.br" target="_blank">www.ams.dev.br</a></span>
</footer>

<script>
  // Scroll reveal
  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, i) => {
      if (entry.isIntersecting) {
        setTimeout(() => entry.target.classList.add('visible'), i * 80);
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  reveals.forEach(el => observer.observe(el));

  // Smooth nav
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth' }); }
    });
  });
// Assistente Virtual Simples
const chatWidget = document.createElement('div');
chatWidget.innerHTML = `
  <style>
    .chatbot-btn { position: fixed; bottom: 32px; right: 32px; z-index: 9999; background: var(--orange); color: #fff; border: none; border-radius: 50%; width: 60px; height: 60px; box-shadow: 0 4px 24px rgba(0,0,0,0.18); font-size: 2rem; cursor: pointer; display: flex; align-items: center; justify-content: center; }
    .chatbot-window { position: fixed; bottom: 110px; right: 32px; width: 320px; max-width: 95vw; background: #fff; border-radius: 18px; box-shadow: 0 8px 32px rgba(0,0,0,0.18); z-index: 9999; display: none; flex-direction: column; overflow: hidden; }
    .chatbot-header { background: var(--orange); color: #fff; padding: 14px 18px; font-weight: 700; font-size: 1.1rem; }
    .chatbot-messages { padding: 16px; height: 220px; overflow-y: auto; background: #f9fafb; font-size: 0.98rem; display: flex; flex-direction: column; gap: 10px; }
    .chatbot-msg { background: #fff; border-radius: 12px; padding: 8px 12px; max-width: 85%; box-shadow: 0 2px 8px rgba(0,0,0,0.04); }
    .chatbot-msg.user { align-self: flex-end; background: var(--orange); color: #fff; }
    .chatbot-msg.bot { align-self: flex-start; background: #fff; color: #222; }
    .chatbot-input-wrap { display: flex; border-top: 1px solid #eee; }
    .chatbot-input { flex: 1; border: none; padding: 12px; font-size: 1rem; border-radius: 0 0 0 18px; outline: none; }
    .chatbot-send { background: var(--orange); color: #fff; border: none; padding: 0 18px; font-size: 1.2rem; border-radius: 0 0 18px 0; cursor: pointer; }
  </style>
  <button class="chatbot-btn" title="Assistente Virtual">💬</button>
  <div class="chatbot-window">
    <div class="chatbot-header">Assistente Virtual</div>
    <div class="chatbot-messages"></div>
    <form class="chatbot-input-wrap"><input class="chatbot-input" type="text" placeholder="Digite sua pergunta..." autocomplete="off" /><button class="chatbot-send" type="submit">➤</button></form>
  </div>
`;
document.body.appendChild(chatWidget);

const btn = chatWidget.querySelector('.chatbot-btn');
const win = chatWidget.querySelector('.chatbot-window');
const messages = chatWidget.querySelector('.chatbot-messages');
const form = chatWidget.querySelector('.chatbot-input-wrap');
const input = chatWidget.querySelector('.chatbot-input');

btn.onclick = () => { win.style.display = win.style.display === 'flex' ? 'none' : 'flex'; if(win.style.display==='flex'){input.focus();} };

function addMsg(text, sender) {
  const msg = document.createElement('div');
  msg.className = 'chatbot-msg ' + sender;
  msg.textContent = text;
  messages.appendChild(msg);
  messages.scrollTop = messages.scrollHeight;
}

function botReply(q) {
  const txt = q.toLowerCase();
  if(txt.includes('preço')||txt.includes('valor')||txt.includes('custa')) return 'Nossos planos variam conforme o seu negócio. Clique em "Ver planos" ou solicite uma demonstração para receber uma proposta personalizada!';
  if(txt.includes('suporte')) return 'Oferecemos suporte 24h via WhatsApp para todos os clientes.';
  if(txt.includes('funciona')||txt.includes('como usar')) return 'O ZipFood é um sistema completo para gerenciar pedidos, clientes e entregas. Você pode testar clicando em "Quero uma demo grátis".';
  if(txt.includes('contato')||txt.includes('falar')||txt.includes('whatsapp')) return 'Você pode falar conosco pelo WhatsApp: (21) 98284-6871 ou pelo e-mail amssistemas95@gmail.com.';
  if(txt.includes('taxa')) return 'No ZipFood você não paga taxa por pedido! Todo o lucro é seu.';
  if(txt.includes('app')||txt.includes('aplicativo')) return 'Sim! Oferecemos app próprio com sua marca no plano Pro.';
  if(txt.includes('entrega')) return 'Você pode gerenciar entregas em tempo real pelo sistema, com status atualizado para o cliente.';
  if(txt.includes('teste')||txt.includes('demo')) return 'Solicite uma demonstração gratuita clicando em "Quero uma demo grátis".';
  if(txt.includes('pagamento')||txt.includes('pagar')) return 'Aceitamos pagamentos online e presenciais, com total segurança.';
  if(txt.includes('integrar')||txt.includes('integração')) return 'Temos integrações personalizadas no plano Enterprise. Fale com um especialista!';
  if(txt.length < 3) return 'Como posso ajudar? Pergunte sobre planos, suporte, taxas, integração, etc.';
  return 'Desculpe, não entendi. Por favor, reformule sua pergunta ou fale conosco pelo WhatsApp.';
}

form.onsubmit = e => {
  e.preventDefault();
  const q = input.value.trim();
  if(!q) return;
  addMsg(q, 'user');
  setTimeout(() => addMsg(botReply(q), 'bot'), 600);
  input.value = '';
};
</script>
</body>
</html>
