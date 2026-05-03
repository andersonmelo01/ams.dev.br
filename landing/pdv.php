<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>maxhand PDV – Sistema de Vendas para Qualquer Negócio</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
<style>
  :root {
    --orange: #F5A623;
    --orange-dark: #D4881A;
    --orange-light: #FFCF6B;
    --navy: #1A2B5C;
    --navy-dark: #0F1A3A;
    --navy-mid: #243577;
    --cream: #FDF8EF;
    --white: #FFFFFF;
    --text-dark: #1A1A2E;
    --text-mid: #4A4A6A;
    --text-light: #8888AA;
  }

  * { margin: 0; padding: 0; box-sizing: border-box; }
  html { scroll-behavior: smooth; }
  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--text-dark);
    overflow-x: hidden;
  }

  /* ── NAV ── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 6%;
    background: rgba(26,43,92,0.96);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(245,166,35,0.2);
  }
  .nav-logo {
    font-family: 'Sora', sans-serif;
    font-weight: 800; font-size: 1.5rem;
    color: var(--white);
    letter-spacing: -0.5px;
  }
  .nav-logo span { color: var(--orange); }
  .nav-links { display: flex; gap: 32px; list-style: none; }
  .nav-links a {
    color: rgba(255,255,255,0.75);
    text-decoration: none;
    font-size: 0.9rem; font-weight: 500;
    transition: color 0.2s;
  }
  .nav-links a:hover { color: var(--orange-light); }
  .nav-cta {
    background: var(--orange);
    color: var(--navy-dark);
    padding: 10px 24px;
    border-radius: 8px;
    font-family: 'Sora', sans-serif;
    font-weight: 700; font-size: 0.9rem;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s;
  }
  .nav-cta:hover { background: var(--orange-light); transform: translateY(-1px); }

  /* ── HERO ── */
  .hero {
    min-height: 100vh;
    background: var(--navy-dark);
    position: relative;
    display: flex; align-items: center;
    overflow: hidden;
    padding: 120px 6% 80px;
  }
  .hero-bg-circles { position: absolute; inset: 0; pointer-events: none; }
  .hero-bg-circles span {
    position: absolute; border-radius: 50%;
    opacity: 0.08; background: var(--orange);
    animation: float 8s ease-in-out infinite;
  }
  .hero-bg-circles span:nth-child(1) { width: 600px; height: 600px; top: -200px; right: -150px; animation-delay: 0s; }
  .hero-bg-circles span:nth-child(2) { width: 300px; height: 300px; bottom: -80px; left: 10%; animation-delay: 3s; opacity: 0.05; }
  .hero-bg-circles span:nth-child(3) { width: 180px; height: 180px; top: 30%; right: 30%; animation-delay: 5s; opacity: 0.06; }

  @keyframes float {
    0%, 100% { transform: translateY(0) scale(1); }
    50% { transform: translateY(-20px) scale(1.03); }
  }

  .hero-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 60px; align-items: center;
    max-width: 1200px; margin: 0 auto; width: 100%;
  }

  .hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(245,166,35,0.15);
    border: 1px solid rgba(245,166,35,0.4);
    padding: 6px 16px; border-radius: 100px;
    font-size: 0.8rem; font-weight: 600;
    color: var(--orange-light);
    margin-bottom: 24px;
    animation: fadeUp 0.6s ease both;
  }
  .hero-badge::before {
    content: ''; width: 8px; height: 8px;
    border-radius: 50%; background: var(--orange);
    animation: pulse 1.5s infinite;
  }
  @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.5;transform:scale(0.8)} }

  .hero-title {
    font-family: 'Sora', sans-serif;
    font-weight: 800;
    font-size: clamp(2.4rem, 4vw, 3.8rem);
    line-height: 1.1; color: var(--white);
    margin-bottom: 20px;
    animation: fadeUp 0.6s 0.1s ease both;
  }
  .hero-title .highlight { color: var(--orange); }

  .hero-sub {
    font-size: 1.1rem; color: rgba(255,255,255,0.65);
    line-height: 1.7; max-width: 500px;
    margin-bottom: 36px;
    animation: fadeUp 0.6s 0.2s ease both;
  }

  .hero-actions {
    display: flex; gap: 16px; flex-wrap: wrap;
    animation: fadeUp 0.6s 0.3s ease both;
  }
  .btn-primary {
    background: var(--orange); color: var(--navy-dark);
    padding: 16px 36px; border-radius: 10px;
    font-family: 'Sora', sans-serif;
    font-weight: 700; font-size: 1rem;
    text-decoration: none; transition: all 0.2s;
    box-shadow: 0 8px 30px rgba(245,166,35,0.35);
  }
  .btn-primary:hover { background: var(--orange-light); transform: translateY(-2px); box-shadow: 0 12px 40px rgba(245,166,35,0.45); }
  .btn-ghost {
    background: transparent; color: var(--white);
    padding: 16px 36px; border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.25);
    font-family: 'Sora', sans-serif;
    font-weight: 600; font-size: 1rem;
    text-decoration: none; transition: all 0.2s;
  }
  .btn-ghost:hover { border-color: var(--orange); color: var(--orange-light); }

  @keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
  }

  /* HERO VISUAL */
  .hero-visual {
    display: flex; justify-content: center; align-items: center;
    animation: fadeUp 0.7s 0.15s ease both;
  }
  .pdv-mockup {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 20px; padding: 24px;
    width: 100%; max-width: 440px;
    backdrop-filter: blur(8px);
    box-shadow: 0 40px 80px rgba(0,0,0,0.4);
  }
  .mockup-topbar { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
  .mockup-dots { display: flex; gap: 6px; }
  .mockup-dots span { width: 10px; height: 10px; border-radius: 50%; }
  .mockup-dots span:nth-child(1){ background:#FF5F56; }
  .mockup-dots span:nth-child(2){ background:#FFBD2E; }
  .mockup-dots span:nth-child(3){ background:#27C93F; }
  .mockup-title { color: rgba(255,255,255,0.4); font-size: 0.75rem; flex: 1; text-align: center; }
  .mockup-body { display: flex; flex-direction: column; gap: 12px; }
  .mock-row { display: flex; gap: 10px; }
  .mock-card {
    flex: 1;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 12px; padding: 14px;
  }
  .mock-card-label { font-size: 0.65rem; color: rgba(255,255,255,0.4); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; }
  .mock-card-value { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1.2rem; color: var(--white); }
  .mock-card-value.orange { color: var(--orange); }
  .mock-card-sub { font-size: 0.65rem; color: rgba(255,255,255,0.3); margin-top: 3px; }
  .mock-list { flex: 2; }
  .mock-item {
    display: flex; align-items: center; justify-content: space-between;
    padding: 8px 12px;
    background: rgba(255,255,255,0.05);
    border-radius: 8px; margin-bottom: 6px;
  }
  .mock-item:last-child { margin-bottom: 0; }
  .mock-item-name { font-size: 0.78rem; color: rgba(255,255,255,0.7); }
  .mock-item-price { font-size: 0.78rem; font-weight: 600; color: var(--orange-light); }
  .mock-total {
    background: var(--orange); border-radius: 10px;
    padding: 14px 16px;
    display: flex; justify-content: space-between; align-items: center;
  }
  .mock-total-label { font-size: 0.85rem; font-weight: 600; color: var(--navy-dark); }
  .mock-total-value { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 1.3rem; color: var(--navy-dark); }

  /* STATS BAR */
  .stats-bar { background: var(--navy); padding: 28px 6%; }
  .stats-inner {
    max-width: 1200px; margin: 0 auto;
    display: flex; gap: 0; justify-content: space-around; flex-wrap: wrap;
  }
  .stat-item {
    text-align: center; padding: 12px 24px;
    border-right: 1px solid rgba(255,255,255,0.1);
  }
  .stat-item:last-child { border-right: none; }
  .stat-num { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 2rem; color: var(--orange); }
  .stat-label { font-size: 0.8rem; color: rgba(255,255,255,0.5); margin-top: 2px; }

  /* ── SECTIONS ── */
  section { padding: 100px 6%; }

  .section-header { text-align: center; margin-bottom: 64px; }
  .section-tag {
    display: inline-block;
    background: rgba(245,166,35,0.12);
    color: var(--orange-dark);
    border: 1px solid rgba(245,166,35,0.3);
    padding: 4px 14px; border-radius: 100px;
    font-size: 0.78rem; font-weight: 600;
    margin-bottom: 16px;
    text-transform: uppercase; letter-spacing: 1px;
  }
  .section-title {
    font-family: 'Sora', sans-serif;
    font-weight: 800; font-size: clamp(1.8rem, 3vw, 2.8rem);
    color: var(--navy-dark); line-height: 1.2; margin-bottom: 16px;
  }
  .section-desc {
    font-size: 1.05rem; color: var(--text-mid);
    max-width: 580px; margin: 0 auto; line-height: 1.7;
  }

  /* FEATURES */
  .features-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 24px; max-width: 1200px; margin: 0 auto;
  }
  .feat-card {
    background: var(--white);
    border: 1px solid rgba(0,0,0,0.07);
    border-radius: 18px; padding: 32px 28px;
    transition: all 0.3s; position: relative; overflow: hidden;
  }
  .feat-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    opacity: 0; transition: opacity 0.3s;
  }
  .feat-card:hover { transform: translateY(-6px); box-shadow: 0 24px 60px rgba(26,43,92,0.1); }
  .feat-card:hover::before { opacity: 1; }
  .feat-icon {
    width: 56px; height: 56px; border-radius: 14px;
    background: rgba(245,166,35,0.1);
    display: flex; align-items: center; justify-content: center;
    font-size: 1.6rem; margin-bottom: 20px; transition: background 0.3s;
  }
  .feat-card:hover .feat-icon { background: var(--orange); }
  .feat-name { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1.05rem; color: var(--navy-dark); margin-bottom: 10px; }
  .feat-desc { font-size: 0.9rem; color: var(--text-mid); line-height: 1.65; }

  /* NICHES */
  .niches-section { background: var(--navy-dark); }
  .niches-section .section-title { color: var(--white); }
  .niches-section .section-desc { color: rgba(255,255,255,0.5); }
  .niches-section .section-tag { background: rgba(245,166,35,0.15); border-color: rgba(245,166,35,0.3); color: var(--orange-light); }
  .niches-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 16px; max-width: 1200px; margin: 0 auto;
  }
  .niche-pill {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 14px; padding: 20px 18px;
    display: flex; align-items: center; gap: 14px;
    transition: all 0.25s; cursor: default;
  }
  .niche-pill:hover { background: rgba(245,166,35,0.12); border-color: rgba(245,166,35,0.35); transform: translateY(-3px); }
  .niche-icon { font-size: 1.4rem; }
  .niche-name { font-size: 0.88rem; font-weight: 500; color: rgba(255,255,255,0.8); }

  /* HOW IT WORKS */
  .how-section { background: var(--cream); }
  .steps-row {
    display: flex; gap: 0;
    max-width: 1000px; margin: 0 auto;
    position: relative;
  }
  .steps-row::before {
    content: ''; position: absolute;
    top: 36px; left: 10%; right: 10%; height: 2px;
    background: linear-gradient(90deg, var(--orange), var(--orange-light));
    z-index: 0;
  }
  .step { flex: 1; text-align: center; padding: 0 16px; position: relative; z-index: 1; }
  .step-num {
    width: 72px; height: 72px; border-radius: 50%;
    background: var(--orange); color: var(--navy-dark);
    font-family: 'Sora', sans-serif; font-weight: 800; font-size: 1.4rem;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
    box-shadow: 0 8px 24px rgba(245,166,35,0.4);
    border: 4px solid var(--cream);
  }
  .step-title { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1rem; color: var(--navy-dark); margin-bottom: 8px; }
  .step-desc { font-size: 0.86rem; color: var(--text-mid); line-height: 1.6; }

  /* PRICING */
  .pricing-section { background: var(--white); }
  .plans-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 24px; max-width: 1000px; margin: 0 auto; align-items: start;
  }
  .plan-card {
    border: 1px solid rgba(0,0,0,0.08);
    border-radius: 20px; padding: 36px 28px;
    position: relative; transition: all 0.3s; background: var(--white);
  }
  .plan-card.featured {
    background: var(--navy-dark); border-color: var(--orange);
    transform: scale(1.05);
    box-shadow: 0 30px 70px rgba(26,43,92,0.3);
  }
  .plan-badge {
    position: absolute; top: -14px; left: 50%; transform: translateX(-50%);
    background: var(--orange); color: var(--navy-dark);
    font-family: 'Sora', sans-serif; font-size: 0.72rem; font-weight: 800;
    padding: 4px 16px; border-radius: 100px;
    text-transform: uppercase; letter-spacing: 1px; white-space: nowrap;
  }
  .plan-name { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1rem; color: var(--text-mid); margin-bottom: 16px; }
  .plan-card.featured .plan-name { color: rgba(255,255,255,0.6); }
  .plan-price { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 2.4rem; color: var(--navy-dark); margin-bottom: 4px; }
  .plan-price sub { font-size: 1rem; font-weight: 600; }
  .plan-card.featured .plan-price { color: var(--orange); }
  .plan-period { font-size: 0.78rem; color: var(--text-light); margin-bottom: 28px; }
  .plan-card.featured .plan-period { color: rgba(255,255,255,0.35); }
  .plan-features { list-style: none; margin-bottom: 32px; }
  .plan-features li {
    padding: 9px 0;
    border-bottom: 1px solid rgba(0,0,0,0.05);
    font-size: 0.88rem; color: var(--text-mid);
    display: flex; align-items: center; gap: 10px;
  }
  .plan-card.featured .plan-features li { color: rgba(255,255,255,0.65); border-bottom-color: rgba(255,255,255,0.07); }
  .plan-features li::before { content: '✓'; color: var(--orange); font-weight: 700; flex-shrink: 0; }
  .plan-btn {
    display: block; text-align: center; padding: 14px; border-radius: 10px;
    font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.92rem;
    text-decoration: none; transition: all 0.2s;
  }
  .plan-btn-outline { border: 1.5px solid var(--navy); color: var(--navy); }
  .plan-btn-outline:hover { background: var(--navy); color: var(--white); }
  .plan-btn-fill { background: var(--orange); color: var(--navy-dark); box-shadow: 0 6px 20px rgba(245,166,35,0.4); }
  .plan-btn-fill:hover { background: var(--orange-light); transform: translateY(-1px); }

  /* TESTIMONIALS */
  .testimonials-section { background: var(--cream); }
  .testimonials-grid {
    display: grid; grid-template-columns: repeat(3, 1fr);
    gap: 24px; max-width: 1200px; margin: 0 auto;
  }
  .testi-card {
    background: var(--white); border-radius: 18px; padding: 28px;
    border: 1px solid rgba(0,0,0,0.06); transition: all 0.3s;
  }
  .testi-card:hover { box-shadow: 0 16px 48px rgba(26,43,92,0.08); transform: translateY(-4px); }
  .testi-stars { color: var(--orange); font-size: 0.9rem; margin-bottom: 14px; }
  .testi-text { font-size: 0.92rem; color: var(--text-mid); line-height: 1.7; margin-bottom: 20px; font-style: italic; }
  .testi-author { display: flex; align-items: center; gap: 12px; }
  .testi-avatar {
    width: 42px; height: 42px; border-radius: 50%; background: var(--navy);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1rem;
    color: var(--orange); flex-shrink: 0;
  }
  .testi-name { font-weight: 600; font-size: 0.88rem; color: var(--navy-dark); }
  .testi-biz { font-size: 0.78rem; color: var(--text-light); }

  /* CTA FINAL */
  .cta-section {
    background: var(--orange); padding: 100px 6%;
    text-align: center; position: relative; overflow: hidden;
  }
  .cta-section::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse at center, rgba(255,255,255,0.15) 0%, transparent 70%);
  }
  .cta-section .section-title { color: var(--navy-dark); position: relative; }
  .cta-section .section-desc { color: rgba(26,43,92,0.65); position: relative; }
  .cta-buttons {
    display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;
    margin-top: 36px; position: relative;
  }
  .cta-btn-dark {
    background: var(--navy-dark); color: var(--white);
    padding: 18px 44px; border-radius: 12px;
    font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1rem;
    text-decoration: none; transition: all 0.2s;
    box-shadow: 0 8px 30px rgba(26,43,92,0.3);
  }
  .cta-btn-dark:hover { background: var(--navy-mid); transform: translateY(-2px); }
  .cta-btn-white {
    background: var(--white); color: var(--navy-dark);
    padding: 18px 44px; border-radius: 12px;
    font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1rem;
    text-decoration: none; transition: all 0.2s;
  }
  .cta-btn-white:hover { background: var(--cream); transform: translateY(-2px); }

  /* FOOTER */
  footer { background: var(--navy-dark); padding: 60px 6% 32px; color: rgba(255,255,255,0.5); }
  .footer-top {
    display: flex; justify-content: space-between; gap: 48px;
    max-width: 1200px; margin: 0 auto 48px; flex-wrap: wrap;
  }
  .footer-brand .nav-logo { font-size: 1.4rem; margin-bottom: 12px; display: block; }
  .footer-brand p { font-size: 0.85rem; line-height: 1.7; max-width: 260px; }
  .footer-col h4 {
    font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.88rem;
    color: var(--white); margin-bottom: 16px;
    text-transform: uppercase; letter-spacing: 0.5px;
  }
  .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
  .footer-col ul a { color: rgba(255,255,255,0.45); text-decoration: none; font-size: 0.85rem; transition: color 0.2s; }
  .footer-col ul a:hover { color: var(--orange-light); }
  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.08);
    padding-top: 28px; text-align: center; font-size: 0.8rem;
    max-width: 1200px; margin: 0 auto;
  }

  /* RESPONSIVE */
  @media (max-width: 900px) {
    .hero-grid { grid-template-columns: 1fr; }
    .hero-visual { display: none; }
    .features-grid { grid-template-columns: repeat(2,1fr); }
    .niches-grid { grid-template-columns: repeat(2,1fr); }
    .plans-grid { grid-template-columns: 1fr; }
    .plan-card.featured { transform: scale(1); }
    .testimonials-grid { grid-template-columns: 1fr; }
    .steps-row { flex-direction: column; gap: 32px; }
    .steps-row::before { display: none; }
    .footer-top { flex-direction: column; }
    nav .nav-links { display: none; }
  }
  @media (max-width: 600px) {
    .features-grid { grid-template-columns: 1fr; }
    .niches-grid { grid-template-columns: repeat(2,1fr); }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="nav-logo">MaxHand<span>PDV</span></div>
  <ul class="nav-links">
    <li><a href="#features">Funcionalidades</a></li>
    <li><a href="#niches">Nichos</a></li>
    <li><a href="#pricing">Planos</a></li>
    <li><a href="#contact">Contato</a></li>
  </ul>
  <a href="#contact" class="nav-cta">Teste Grátis</a>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-bg-circles">
    <span></span><span></span><span></span>
  </div>
  <div class="hero-grid">
    <div>
      <div class="hero-badge">✦ Sistema Completo de Vendas</div>
      <h1 class="hero-title">
        Venda mais.<br>Controle tudo.<br>
        <span class="highlight">Qualquer negócio.</span>
      </h1>
      <p class="hero-sub">
        O maxhand PDV é o sistema de ponto de venda mais completo do Brasil.
        Do caixa ao estoque, do fiscal ao relatório — tudo em uma tela, para qualquer nicho.
      </p>
      <div class="hero-actions">
        <a href="#contact" class="btn-primary">🚀 Começar agora grátis</a>
        <a href="#features" class="btn-ghost">Ver funcionalidades</a>
      </div>
    </div>
    <div class="hero-visual">
      <div class="pdv-mockup">
        <div class="mockup-topbar">
          <div class="mockup-dots"><span></span><span></span><span></span></div>
          <div class="mockup-title">maxhand PDV · Caixa Principal</div>
        </div>
        <div class="mockup-body">
          <div class="mock-row">
            <div class="mock-card">
              <div class="mock-card-label">Vendas hoje</div>
              <div class="mock-card-value orange">R$ 4.820</div>
              <div class="mock-card-sub">↑ 18% vs ontem</div>
            </div>
            <div class="mock-card">
              <div class="mock-card-label">Pedidos</div>
              <div class="mock-card-value">37</div>
              <div class="mock-card-sub">12 em aberto</div>
            </div>
          </div>
          <div class="mock-row">
            <div class="mock-card mock-list">
              <div class="mock-card-label">Últimas vendas</div>
              <div class="mock-item"><span class="mock-item-name">Produto A – 3×</span><span class="mock-item-price">R$ 89,70</span></div>
              <div class="mock-item"><span class="mock-item-name">Produto B – 1×</span><span class="mock-item-price">R$ 45,00</span></div>
              <div class="mock-item"><span class="mock-item-name">Produto C – 2×</span><span class="mock-item-price">R$ 130,00</span></div>
            </div>
          </div>
          <div class="mock-total">
            <span class="mock-total-label">💳 Total da venda atual</span>
            <span class="mock-total-value">R$ 264,70</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STATS BAR -->
<div class="stats-bar">
  <div class="stats-inner">
    <div class="stat-item"><div class="stat-num">+5.000</div><div class="stat-label">Empresas ativas</div></div>
    <div class="stat-item"><div class="stat-num">R$ 2bi+</div><div class="stat-label">Em vendas processadas</div></div>
    <div class="stat-item"><div class="stat-num">99,9%</div><div class="stat-label">Uptime garantido</div></div>
    <div class="stat-item"><div class="stat-num">4,9 ★</div><div class="stat-label">Avaliação média</div></div>
  </div>
</div>

<!-- FEATURES -->
<section id="features">
  <div class="section-header">
    <div class="section-tag">Funcionalidades</div>
    <h2 class="section-title">Tudo que você precisa para vender bem</h2>
    <p class="section-desc">Do caixa à nota fiscal, controle seu negócio inteiro sem sair do maxhand PDV.</p>
  </div>
  <div class="features-grid">
    <div class="feat-card">
      <div class="feat-icon">🖥️</div>
      <div class="feat-name">Caixa e PDV</div>
      <div class="feat-desc">Interface rápida e intuitiva para registrar vendas, aplicar descontos, parcelar e fechar o caixa com total segurança.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">📦</div>
      <div class="feat-name">Estoque Inteligente</div>
      <div class="feat-desc">Controle de entradas e saídas, alertas de estoque mínimo, múltiplos depósitos e histórico completo de movimentações.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">🧾</div>
      <div class="feat-name">NF-e e NFC-e</div>
      <div class="feat-desc">Emissão de notas fiscais eletrônicas com um clique. Contingência offline, XML automático e integração com a SEFAZ.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">👥</div>
      <div class="feat-name">Clientes e CRM</div>
      <div class="feat-desc">Cadastro completo de clientes, histórico de compras, crédito em conta e programa de fidelidade personalizável.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">💳</div>
      <div class="feat-name">Múltiplas Formas de Pagamento</div>
      <div class="feat-desc">Dinheiro, cartão, Pix, crédito na conta, boleto e vales. Integração com as principais maquininhas do mercado.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">📊</div>
      <div class="feat-name">Relatórios e Dashboards</div>
      <div class="feat-desc">Curva ABC, DRE, comissão de vendedores, ticket médio, ranking de produtos — dados que geram decisões reais.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">📱</div>
      <div class="feat-name">Acesso Remoto</div>
      <div class="feat-desc">Acompanhe as vendas de qualquer lugar pelo celular. Autorize descontos, veja o caixa e gerencie sem precisar estar na loja.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">🔐</div>
      <div class="feat-name">Permissões de Acesso</div>
      <div class="feat-desc">Defina o que cada operador pode fazer. Histórico de ações, senha supervisor e auditoria completa por usuário.</div>
    </div>
    <div class="feat-card">
      <div class="feat-icon">🔗</div>
      <div class="feat-name">Integrações</div>
      <div class="feat-desc">Conecte com seu e-commerce, marketplaces, sistemas de contabilidade e ERPs pela nossa API aberta e documentada.</div>
    </div>
  </div>
</section>

<!-- NICHES -->
<section id="niches" class="niches-section">
  <div class="section-header">
    <div class="section-tag">Para todo nicho</div>
    <h2 class="section-title">Funciona para qualquer tipo de negócio</h2>
    <p class="section-desc">O maxhand PDV foi projetado para se adaptar a qualquer setor, sem configurações complicadas.</p>
  </div>
  <div class="niches-grid">
    <div class="niche-pill"><span class="niche-icon">🏗️</span><span class="niche-name">Materiais de Construção</span></div>
    <div class="niche-pill"><span class="niche-icon">🛒</span><span class="niche-name">Supermercado e Mercearia</span></div>
    <div class="niche-pill"><span class="niche-icon">👗</span><span class="niche-name">Moda e Vestuário</span></div>
    <div class="niche-pill"><span class="niche-icon">🍕</span><span class="niche-name">Restaurante e Lanchonete</span></div>
    <div class="niche-pill"><span class="niche-icon">💊</span><span class="niche-name">Farmácia e Drogaria</span></div>
    <div class="niche-pill"><span class="niche-icon">🔧</span><span class="niche-name">Ferragens e Auto Peças</span></div>
    <div class="niche-pill"><span class="niche-icon">🌿</span><span class="niche-name">Pet Shop e Veterinária</span></div>
    <div class="niche-pill"><span class="niche-icon">💈</span><span class="niche-name">Salão de Beleza e Barbearia</span></div>
    <div class="niche-pill"><span class="niche-icon">📚</span><span class="niche-name">Papelaria e Livraria</span></div>
    <div class="niche-pill"><span class="niche-icon">⚡</span><span class="niche-name">Elétrica e Hidráulica</span></div>
    <div class="niche-pill"><span class="niche-icon">🎮</span><span class="niche-name">Games e Eletrônicos</span></div>
    <div class="niche-pill"><span class="niche-icon">🌾</span><span class="niche-name">Agropecuária</span></div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how-section">
  <div class="section-header">
    <div class="section-tag">Como funciona</div>
    <h2 class="section-title">Do cadastro ao lucro em 4 passos</h2>
    <p class="section-desc">Configuração simples e suporte dedicado para você começar a vender hoje mesmo.</p>
  </div>
  <div class="steps-row">
    <div class="step">
      <div class="step-num">1</div>
      <div class="step-title">Crie sua conta</div>
      <div class="step-desc">Teste grátis por 14 dias, sem cartão de crédito. Configuração em minutos.</div>
    </div>
    <div class="step">
      <div class="step-num">2</div>
      <div class="step-title">Cadastre produtos</div>
      <div class="step-desc">Importe por planilha ou cadastre manualmente. Código de barras, foto e preço.</div>
    </div>
    <div class="step">
      <div class="step-num">3</div>
      <div class="step-title">Configure o caixa</div>
      <div class="step-desc">Adicione operadores, formas de pagamento e conecte a maquininha.</div>
    </div>
    <div class="step">
      <div class="step-num">4</div>
      <div class="step-title">Comece a vender</div>
      <div class="step-desc">Pronto! Venda, emita nota e acompanhe os resultados em tempo real.</div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section id="pricing" class="pricing-section">
  <div class="section-header">
    <div class="section-tag">Planos e preços</div>
    <h2 class="section-title">Simples, justo e sem surpresas</h2>
    <p class="section-desc">Escolha o plano ideal para o tamanho do seu negócio. Cancele quando quiser.</p>
  </div>
  <div class="plans-grid">
    <div class="plan-card">
      <div class="plan-name">Essencial</div>
      <div class="plan-price">Sob<sub>Consulta</sub></div>
      <div class="plan-period">por mês · 1 caixa</div>
      <ul class="plan-features">
        <li>1 usuário operador</li>
        <li>PDV completo</li>
        <li>Controle de estoque</li>
        <li>Relatórios básicos</li>
        <li>Suporte por chat</li>
      </ul>
      <a href="#contact" class="plan-btn plan-btn-outline">Começar grátis</a>
    </div>
    <div class="plan-card featured">
      <div class="plan-badge">⭐ Mais popular</div>
      <div class="plan-name">Profissional</div>
      <div class="plan-price">Sob<sub>Consulta</sub></div>
      <div class="plan-period">por mês · até 3 caixas</div>
      <ul class="plan-features">
        <li>Usuários ilimitados</li>
        <li>NF-e e NFC-e incluídas</li>
        <li>CRM de clientes</li>
        <li>Comissão de vendedores</li>
        <li>Acesso remoto mobile</li>
        <li>Integrações básicas</li>
        <li>Suporte prioritário</li>
      </ul>
      <a href="#contact" class="plan-btn plan-btn-fill">Começar grátis</a>
    </div>
    <div class="plan-card">
      <div class="plan-name">Enterprise</div>
      <div class="plan-price">Sob<sub>Consulta</sub></div>
      <div class="plan-period">por mês · caixas ilimitados</div>
      <ul class="plan-features">
        <li>Multi-loja e filiais</li>
        <li>API aberta completa</li>
        <li>Dashboard customizado</li>
        <li>Integração ERP / E-com</li>
        <li>Onboarding dedicado</li>
        <li>SLA 99,9% garantido</li>
      </ul>
      <a href="#contact" class="plan-btn plan-btn-outline">Falar com vendas</a>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials-section">
  <div class="section-header">
    <div class="section-tag">Depoimentos</div>
    <h2 class="section-title">Quem usa, recomenda</h2>
    <p class="section-desc">Mais de 5.000 empresas já transformaram suas vendas com o maxhand PDV.</p>
  </div>
  <div class="testimonials-grid">
    <div class="testi-card">
      <div class="testi-stars">★★★★★</div>
      <p class="testi-text">"Antes perdia horas no caixa e no estoque. Hoje, tudo é automático. Em 3 meses minhas vendas cresceram 32% porque tenho mais tempo para atender bem."</p>
      <div class="testi-author">
        <div class="testi-avatar">CA</div>
        <div>
          <div class="testi-name">Carlos Alves</div>
          <div class="testi-biz">Ferragens e Materiais – São Paulo</div>
        </div>
      </div>
    </div>
    <div class="testi-card">
      <div class="testi-stars">★★★★★</div>
      <p class="testi-text">"A emissão de NFC-e ficou tão simples que até minha atendente faz sozinha. O suporte resolveu minha dúvida em menos de 5 minutos. Recomendo demais!"</p>
      <div class="testi-author">
        <div class="testi-avatar">MF</div>
        <div>
          <div class="testi-name">Mariana Ferreira</div>
          <div class="testi-biz">Loja de Roupas – Belo Horizonte</div>
        </div>
      </div>
    </div>
    <div class="testi-card">
      <div class="testi-stars">★★★★★</div>
      <p class="testi-text">"Tenho 4 lojas e consigo acompanhar tudo pelo celular. O relatório de comissão dos vendedores me poupou horas de planilha todo mês. Sistema indispensável."</p>
      <div class="testi-author">
        <div class="testi-avatar">RO</div>
        <div>
          <div class="testi-name">Roberto Oliveira</div>
          <div class="testi-biz">Rede de Pet Shops – Rio de Janeiro</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FINAL CTA -->
<section id="contact" class="cta-section">
  <h2 class="section-title" style="margin-bottom:16px;">Pronto para vender mais e controlar melhor?</h2>
  <p class="section-desc">Comece gratuitamente hoje. Sem cartão de crédito. Sem burocracia. Com todo o suporte que você precisa.</p>
  <div class="cta-buttons">
    <a href="https://wa.me/5521982846871" target="_blank" rel="noopener noreferrer" class="cta-btn-dark">💬 Falar no WhatsApp</a>
    <a href="mailto:amssistemas95@gmail.com" class="cta-btn-white">✉️ Solicitar demonstração</a>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-top">
    <div class="footer-brand">
      <span class="nav-logo">MaxHand<span>PDV</span></span>
      <p>Sistema de vendas completo para qualquer tipo de negócio. Rápido, confiável e feito para o Brasil.</p>
    </div>
    <div class="footer-col">
      <h4>Produto</h4>
      <ul>
        <li><a href="#">Funcionalidades</a></li>
        <li><a href="#">Planos</a></li>
        <li><a href="#">Integrações</a></li>
        <li><a href="#">API</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Empresa</h4>
      <ul>
        <li><a href="#">Sobre nós</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Parceiros</a></li>
        <li><a href="#">Carreiras</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Suporte</h4>
      <ul>
        <li><a href="#">Central de ajuda</a></li>
        <li><a href="#">Tutoriais em vídeo</a></li>
        <li><a href="#">Status do sistema</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© 2026 maxhand PDV. Todos os direitos reservados.</p>
  </div>
</footer>

</body>
</html>