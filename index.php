<?php
$config = include 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>AMS Sistemas | Tecnologia para Empresas que Crescem</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Sistemas SaaS e infraestrutura de TI para empresas. Delivery, Vendas, CRM Médico e muito mais.">

<link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

<script async src="https://www.googletagmanager.com/gtag/js?id=<?= $config['google_ads_id'] ?>"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y5GYZ94XHE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-Y5GYZ94XHE');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?= $config['adsense_client_id'] ?>" crossorigin="anonymous"></script>
<?php if (!empty($config['facebook_pixel_id'])): ?>
<script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
  fbq('init','<?= $config['facebook_pixel_id'] ?>');fbq('track','PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?= $config['facebook_pixel_id'] ?>&ev=PageView&noscript=1"/></noscript>
<?php endif; ?>

<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  :root {
    --brand: #0A84FF;
    --brand-dark: #0062CC;
    --brand-glow: rgba(10,132,255,0.18);
    --accent: #00E5A0;
    --bg: #07090F;
    --bg2: #0D1117;
    --bg3: #111720;
    --surface: rgba(255,255,255,0.04);
    --surface2: rgba(255,255,255,0.07);
    --border: rgba(255,255,255,0.08);
    --border2: rgba(255,255,255,0.14);
    --text: #F0F4FF;
    --muted: #7E8A9A;
    --muted2: #B0BCCC;
    --radius: 14px;
    --radius-lg: 20px;
    --shadow: 0 24px 64px rgba(0,0,0,0.5);
  }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--bg);
    color: var(--text);
    font-size: 16px;
    line-height: 1.65;
    overflow-x: hidden;
  }

  h1,h2,h3,h4,h5 { font-family: 'Syne', sans-serif; line-height: 1.2; }

  /* ─── NOISE OVERLAY ─── */
  body::before {
    content: '';
    position: fixed; inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
    pointer-events: none; z-index: 0;
  }

  /* ─── NAV ─── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    padding: 0 2rem;
    backdrop-filter: blur(20px) saturate(180%);
    background: rgba(7,9,15,0.75);
    border-bottom: 1px solid var(--border);
    height: 64px;
    display: flex; align-items: center;
    transition: background 0.3s;
  }
  .nav-inner {
    width: 100%; max-width: 1200px; margin: 0 auto;
    display: flex; align-items: center; justify-content: space-between;
  }
  .logo {
    font-family: 'Syne', sans-serif;
    font-weight: 800; font-size: 1.3rem;
    color: var(--text); text-decoration: none;
    display: flex; align-items: center; gap: 8px;
  }
  .logo-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--brand); display: inline-block; }
  .nav-links { display: flex; align-items: center; gap: 0.25rem; list-style: none; }
  .nav-links a {
    padding: 6px 14px; border-radius: 8px;
    color: var(--muted2); text-decoration: none; font-size: 0.9rem; font-weight: 500;
    transition: color 0.2s, background 0.2s;
  }
  .nav-links a:hover { color: var(--text); background: var(--surface2); }
  .nav-cta {
    padding: 8px 20px; border-radius: 10px;
    background: var(--brand); color: #fff !important;
    font-weight: 600; font-size: 0.875rem;
    transition: background 0.2s, transform 0.15s !important;
  }
  .nav-cta:hover { background: var(--brand-dark) !important; transform: translateY(-1px); }
  .nav-toggle { display: none; background: none; border: 1px solid var(--border2); color: var(--text); padding: 6px 10px; border-radius: 8px; cursor: pointer; font-size: 1.1rem; }

  /* ─── HERO ─── */
  .hero {
    min-height: 100vh;
    display: flex; align-items: center; justify-content: center;
    text-align: center;
    padding: 7rem 2rem 5rem;
    position: relative;
    overflow: hidden;
  }
  .hero-glow {
    position: absolute; top: 10%; left: 50%; transform: translateX(-50%);
    width: 700px; height: 500px;
    background: radial-gradient(ellipse, rgba(10,132,255,0.15) 0%, transparent 65%);
    pointer-events: none;
  }
  .hero-glow2 {
    position: absolute; bottom: 0; right: 10%;
    width: 400px; height: 400px;
    background: radial-gradient(ellipse, rgba(0,229,160,0.07) 0%, transparent 70%);
    pointer-events: none;
  }
  .hero-inner { position: relative; max-width: 820px; }
  .hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(10,132,255,0.12);
    border: 1px solid rgba(10,132,255,0.3);
    color: #60A5FA; font-size: 0.8rem; font-weight: 600;
    padding: 6px 16px; border-radius: 100px; letter-spacing: 0.05em;
    margin-bottom: 2rem; text-transform: uppercase;
  }
  .hero-badge span { width: 6px; height: 6px; border-radius: 50%; background: var(--brand); animation: pulse 2s infinite; }
  @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.5;transform:scale(1.3)} }
  .hero h1 {
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    font-weight: 800; letter-spacing: -0.03em;
    margin-bottom: 1.5rem;
    color: var(--text);
  }
  .hero h1 em {
    font-style: normal;
    background: linear-gradient(135deg, #60A5FA 0%, #00E5A0 100%);
    -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
  }
  .hero-sub {
    font-size: 1.15rem; color: var(--muted2); max-width: 580px; margin: 0 auto 3rem;
    line-height: 1.8;
  }
  .hero-btns { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
  .btn-primary {
    padding: 14px 32px; border-radius: 12px; font-size: 1rem; font-weight: 600;
    background: var(--brand); color: #fff; border: none; cursor: pointer;
    text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 0 24px rgba(10,132,255,0.35);
  }
  .btn-primary:hover { background: var(--brand-dark); transform: translateY(-2px); box-shadow: 0 0 36px rgba(10,132,255,0.5); }
  .btn-ghost {
    padding: 14px 32px; border-radius: 12px; font-size: 1rem; font-weight: 500;
    background: transparent; color: var(--muted2); border: 1px solid var(--border2);
    cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;
    transition: color 0.2s, border-color 0.2s, background 0.2s;
  }
  .btn-ghost:hover { color: var(--text); border-color: rgba(255,255,255,0.3); background: var(--surface2); }
  .hero-stats {
    margin-top: 4.5rem; display: flex; gap: 3rem; justify-content: center; flex-wrap: wrap;
    padding-top: 3rem; border-top: 1px solid var(--border);
  }
  .stat { text-align: center; }
  .stat-num { font-family: 'Syne', sans-serif; font-size: 2rem; font-weight: 800; color: var(--text); }
  .stat-num em { font-style: normal; color: var(--brand); }
  .stat-label { font-size: 0.8rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.06em; margin-top: 2px; }

  /* ─── SECTION BASE ─── */
  section { padding: 7rem 2rem; position: relative; }
  .container { max-width: 1200px; margin: 0 auto; }
  .section-label {
    font-size: 0.75rem; font-weight: 700; letter-spacing: 0.12em;
    text-transform: uppercase; color: var(--brand);
    display: flex; align-items: center; gap: 8px; margin-bottom: 1rem;
  }
  .section-label::before { content:''; width:24px; height:1px; background:var(--brand); }
  .section-title { font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; margin-bottom: 1.5rem; letter-spacing: -0.02em; }
  .section-sub { font-size: 1.05rem; color: var(--muted2); max-width: 560px; line-height: 1.8; }

  /* ─── SOBRE ─── */
  #sobre { background: var(--bg2); }
  #sobre::before {
    content:''; position:absolute; top:0; left:0; right:0; height:1px;
    background: linear-gradient(90deg, transparent, var(--border2), transparent);
  }
  .sobre-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center; margin-top: 4rem; }
  .pilares { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-top: 2.5rem; }
  .pilar {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: var(--radius); padding: 1.25rem;
    transition: border-color 0.25s, background 0.25s;
  }
  .pilar:hover { border-color: rgba(10,132,255,0.35); background: var(--surface2); }
  .pilar-icon { font-size: 1.25rem; margin-bottom: 0.5rem; }
  .pilar h5 { font-size: 0.875rem; font-weight: 600; color: var(--text); margin-bottom: 0.25rem; }
  .pilar p { font-size: 0.8rem; color: var(--muted); }

  /* ─── SISTEMAS SAAS ─── */
  #saas { background: var(--bg); }
  .saas-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(340px, 1fr)); gap: 1.5rem; margin-top: 4rem; }
  .saas-card {
    background: var(--bg2); border: 1px solid var(--border);
    border-radius: var(--radius-lg); padding: 2rem;
    display: flex; flex-direction: column;
    transition: border-color 0.25s, transform 0.2s, box-shadow 0.25s;
    position: relative; overflow: hidden;
  }
  .saas-card::before {
    content:''; position:absolute; top:0; left:0; right:0; height:2px;
    background: linear-gradient(90deg, transparent, var(--brand), transparent);
    opacity:0; transition:opacity 0.3s;
  }
  .saas-card:hover { border-color: rgba(10,132,255,0.35); transform:translateY(-4px); box-shadow: 0 20px 60px rgba(0,0,0,0.4); }
  .saas-card:hover::before { opacity:1; }
  .saas-card.featured { border-color: rgba(10,132,255,0.4); }
  .saas-card.featured::before { opacity:1; }
  .card-badge {
    display: inline-block; font-size: 0.7rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: 0.08em;
    padding: 3px 10px; border-radius: 100px;
    background: rgba(10,132,255,0.15); color: #60A5FA;
    border: 1px solid rgba(10,132,255,0.3); margin-bottom: 1.25rem;
  }
  .card-badge.hot { background: rgba(255,80,80,0.12); color: #FF8080; border-color: rgba(255,80,80,0.25); }
  .saas-card h3 { font-size: 1.2rem; font-weight: 700; color: var(--text); margin-bottom: 0.75rem; }
  .saas-card p { font-size: 0.9rem; color: var(--muted2); margin-bottom: 1.5rem; line-height: 1.7; }
  .feature-list { list-style: none; margin-bottom: 2rem; flex: 1; }
  .feature-list li {
    font-size: 0.875rem; color: var(--muted2); padding: 0.4rem 0;
    display: flex; align-items: center; gap: 8px;
    border-bottom: 1px solid var(--border);
  }
  .feature-list li:last-child { border-bottom: none; }
  .feature-list li::before { content:''; width:5px; height:5px; border-radius:50%; background:var(--accent); flex-shrink:0; }
  .card-actions { display: flex; gap: 0.75rem; flex-wrap: wrap; }
  .btn-card {
    flex: 1; min-width: 120px; padding: 10px 18px; border-radius: 10px;
    font-size: 0.85rem; font-weight: 600; text-decoration: none;
    text-align: center; transition: all 0.2s; display: inline-block;
  }
  .btn-card-primary { background: var(--brand); color:#fff; }
  .btn-card-primary:hover { background: var(--brand-dark); }
  .btn-card-outline { background: transparent; color: var(--muted2); border: 1px solid var(--border2); }
  .btn-card-outline:hover { color: var(--text); border-color: rgba(255,255,255,0.3); background: var(--surface2); }

  /* ─── DIFERENCIAIS ─── */
  #diferenciais { background: var(--bg3); }
  #diferenciais::before {
    content:''; position:absolute; top:0; left:0; right:0; height:1px;
    background: linear-gradient(90deg, transparent, var(--border2), transparent);
  }
  .dif-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 4rem; }
  .dif-card {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: var(--radius-lg); padding: 2rem; text-align: center;
    transition: border-color 0.25s;
  }
  .dif-card:hover { border-color: rgba(10,132,255,0.3); }
  .dif-icon {
    width: 56px; height: 56px; border-radius: 14px; margin: 0 auto 1.25rem;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; background: rgba(10,132,255,0.12);
  }
  .dif-card h4 { font-size: 1.05rem; font-weight: 700; margin-bottom: 0.75rem; }
  .dif-card p { font-size: 0.875rem; color: var(--muted2); line-height: 1.7; }

  /* ─── SERVIÇOS ─── */
  #servicos { background: var(--bg2); }
  .serv-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; margin-top: 4rem; }
  .serv-card {
    background: var(--bg3); border: 1px solid var(--border);
    border-radius: var(--radius); padding: 1.75rem;
    transition: border-color 0.25s, background 0.25s;
  }
  .serv-card:hover { border-color: rgba(10,132,255,0.3); background: var(--bg2); }
  .serv-num {
    font-family: 'Syne', sans-serif; font-size: 2rem; font-weight: 800;
    color: var(--border2); margin-bottom: 1rem; display: block;
  }
  .serv-card h4 { font-size: 1rem; font-weight: 700; margin-bottom: 0.5rem; }
  .serv-card p { font-size: 0.85rem; color: var(--muted); line-height: 1.7; }

  /* ─── PLANOS ─── */
  #planos { background: var(--bg); }
  .planos-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 4rem; }
  .plano-card {
    background: var(--bg2); border: 1px solid var(--border);
    border-radius: var(--radius-lg); padding: 2.5rem 2rem;
    display: flex; flex-direction: column; position: relative;
    transition: border-color 0.25s, transform 0.2s;
  }
  .plano-card:hover { transform: translateY(-4px); }
  .plano-card.destaque {
    border-color: rgba(10,132,255,0.5);
    background: linear-gradient(160deg, rgba(10,132,255,0.06) 0%, var(--bg2) 60%);
    box-shadow: 0 0 60px rgba(10,132,255,0.12);
  }
  .plano-tag {
    position: absolute; top: -14px; left: 50%; transform: translateX(-50%);
    background: var(--brand); color: #fff;
    font-size: 0.7rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em;
    padding: 4px 16px; border-radius: 100px;
  }
  .plano-nome { font-size: 0.85rem; font-weight: 600; color: var(--muted); text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 0.5rem; }
  .plano-desc { font-size: 0.875rem; color: var(--muted); margin-bottom: 2rem; }
  .plano-preco { margin-bottom: 2rem; }
  .plano-cifrao { font-size: 1rem; color: var(--muted2); vertical-align: top; margin-top: 8px; display: inline-block; }
  .plano-valor { font-family: 'Syne', sans-serif; font-size: 3rem; font-weight: 800; color: var(--text); line-height: 1; }
  .plano-periodo { font-size: 0.85rem; color: var(--muted); }
  .plano-itens { list-style: none; flex: 1; margin-bottom: 2.5rem; }
  .plano-itens li {
    font-size: 0.875rem; color: var(--muted2); padding: 0.5rem 0;
    border-bottom: 1px solid var(--border);
    display: flex; align-items: center; gap: 10px;
  }
  .plano-itens li:last-child { border-bottom: none; }
  .plano-itens li .check { color: var(--accent); font-size: 0.9rem; flex-shrink: 0; }
  .btn-plano {
    width: 100%; padding: 13px; border-radius: 11px; font-size: 0.95rem; font-weight: 600;
    text-align: center; text-decoration: none; display: block; transition: all 0.2s;
    border: 1px solid var(--border2); background: transparent; color: var(--muted2);
  }
  .btn-plano:hover { color: var(--text); border-color: rgba(255,255,255,0.3); background: var(--surface2); }
  .btn-plano.destaque { background: var(--brand); border-color: var(--brand); color: #fff; box-shadow: 0 0 24px rgba(10,132,255,0.4); }
  .btn-plano.destaque:hover { background: var(--brand-dark); }

  /* ─── CTA BAND ─── */
  .cta-band {
    padding: 5rem 2rem; text-align: center;
    background: linear-gradient(180deg, var(--bg) 0%, rgba(10,132,255,0.05) 50%, var(--bg) 100%);
    position: relative; overflow: hidden;
  }
  .cta-band::before {
    content:''; position:absolute; top:50%; left:50%; transform:translate(-50%,-50%);
    width:600px; height:400px;
    background: radial-gradient(ellipse, rgba(10,132,255,0.1), transparent 70%);
    pointer-events:none;
  }
  .cta-band h2 { font-size: clamp(1.8rem, 4vw, 2.8rem); font-weight: 800; margin-bottom: 1rem; }
  .cta-band p { color: var(--muted2); margin-bottom: 2.5rem; font-size: 1.05rem; }

  /* ─── CONTATO ─── */
  #contato { background: var(--bg2); }
  .contato-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 5rem; align-items: start; margin-top: 4rem; }
  .contato-info h3 { font-size: 1.5rem; font-weight: 700; margin-bottom: 1.5rem; }
  .contato-info p { color: var(--muted2); margin-bottom: 2rem; line-height: 1.8; }
  .contato-destaque {
    background: var(--surface); border: 1px solid var(--border);
    border-radius: var(--radius); padding: 1.5rem; margin-bottom: 1rem;
    display: flex; align-items: flex-start; gap: 1rem;
  }
  .contato-destaque-icon { font-size: 1.3rem; flex-shrink: 0; }
  .contato-destaque h5 { font-size: 0.9rem; font-weight: 600; margin-bottom: 0.25rem; }
  .contato-destaque p { font-size: 0.825rem; color: var(--muted); margin: 0; }
  .form-card {
    background: var(--bg3); border: 1px solid var(--border);
    border-radius: var(--radius-lg); padding: 2.5rem;
  }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
  .form-group { margin-bottom: 1.25rem; }
  .form-group label { display: block; font-size: 0.8rem; font-weight: 600; color: var(--muted); margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.06em; }
  .form-control {
    width: 100%; padding: 12px 16px;
    background: var(--bg2); border: 1px solid var(--border2);
    border-radius: 10px; color: var(--text); font-size: 0.9rem;
    font-family: 'DM Sans', sans-serif;
    transition: border-color 0.2s, box-shadow 0.2s;
    outline: none;
  }
  .form-control:focus { border-color: var(--brand); box-shadow: 0 0 0 3px rgba(10,132,255,0.15); }
  .form-control::placeholder { color: var(--muted); }
  textarea.form-control { resize: vertical; min-height: 120px; }
  .form-control option { background: var(--bg2); }
  .btn-submit {
    width: 100%; padding: 14px; background: var(--brand); color: #fff;
    border: none; border-radius: 11px; font-size: 1rem; font-weight: 600;
    cursor: pointer; font-family: 'DM Sans', sans-serif;
    transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    box-shadow: 0 0 24px rgba(10,132,255,0.3);
    display: flex; align-items: center; justify-content: center; gap: 8px;
  }
  .btn-submit:hover { background: var(--brand-dark); transform: translateY(-1px); box-shadow: 0 0 36px rgba(10,132,255,0.45); }

  /* ─── FOOTER ─── */
  footer {
    background: var(--bg); border-top: 1px solid var(--border);
    padding: 3rem 2rem; text-align: center;
    color: var(--muted); font-size: 0.875rem;
  }
  footer a { color: var(--brand); text-decoration: none; }
  footer a:hover { text-decoration: underline; }

  /* ─── BOT WHATSAPP ─── */
  .bot-fab {
    position: fixed; bottom: 2rem; right: 2rem; z-index: 200;
    width: 60px; height: 60px; border-radius: 50%;
    background: #25D366; color: #fff; border: none; cursor: pointer;
    font-size: 1.5rem; display: flex; align-items: center; justify-content: center;
    box-shadow: 0 8px 32px rgba(37,211,102,0.4);
    transition: transform 0.2s, box-shadow 0.2s;
  }
  .bot-fab:hover { transform: scale(1.08); box-shadow: 0 12px 40px rgba(37,211,102,0.5); }
  .bot-window {
    position: fixed; bottom: 6rem; right: 2rem; z-index: 200;
    width: 330px; background: var(--bg2);
    border: 1px solid var(--border2); border-radius: var(--radius-lg);
    box-shadow: var(--shadow); overflow: hidden;
    display: none; flex-direction: column;
  }
  .bot-window.open { display: flex; }
  .bot-head {
    background: #075E54; padding: 1rem 1.25rem;
    display: flex; align-items: center; justify-content: space-between;
  }
  .bot-head-info { display: flex; align-items: center; gap: 10px; }
  .bot-avatar {
    width: 36px; height: 36px; border-radius: 50%; background: #25D366;
    display: flex; align-items: center; justify-content: center; font-size: 1rem;
  }
  .bot-head-text h5 { font-size: 0.9rem; font-weight: 600; margin: 0; color: #fff; }
  .bot-head-text small { font-size: 0.75rem; color: rgba(255,255,255,0.7); }
  .bot-close { background: none; border: none; color: #fff; cursor: pointer; font-size: 1.2rem; opacity: 0.7; transition: opacity 0.2s; }
  .bot-close:hover { opacity: 1; }
  .bot-body { padding: 1.25rem; max-height: 320px; overflow-y: auto; }
  .bot-msg {
    background: rgba(255,255,255,0.06); border-radius: 0 12px 12px 12px;
    padding: 0.75rem 1rem; margin-bottom: 1rem; font-size: 0.875rem;
    color: var(--text); line-height: 1.6;
  }
  .bot-btns { display: flex; flex-direction: column; gap: 0.5rem; }
  .bot-btn {
    padding: 10px 14px; border-radius: 10px; font-size: 0.85rem; font-weight: 500;
    background: rgba(10,132,255,0.12); border: 1px solid rgba(10,132,255,0.25);
    color: #60A5FA; cursor: pointer; text-align: left;
    transition: background 0.2s, border-color 0.2s;
  }
  .bot-btn:hover { background: rgba(10,132,255,0.22); border-color: rgba(10,132,255,0.4); }

  /* ─── MOBILE ─── */
  @media (max-width: 900px) {
    .sobre-grid, .contato-grid { grid-template-columns: 1fr; gap: 3rem; }
    .dif-grid, .serv-grid, .planos-grid { grid-template-columns: 1fr 1fr; }
    .form-row { grid-template-columns: 1fr; }
  }
  @media (max-width: 640px) {
    .nav-links { display: none; flex-direction: column; position: absolute; top: 64px; left: 0; right: 0; background: rgba(7,9,15,0.97); padding: 1rem; border-bottom: 1px solid var(--border); gap: 0; }
    .nav-links.active { display: flex; }
    .nav-links li { width: 100%; }
    .nav-links a { display: block; padding: 12px 16px; border-radius: 8px; }
    .nav-toggle { display: block; }
    .dif-grid, .serv-grid, .planos-grid, .saas-grid { grid-template-columns: 1fr; }
    .pilares { grid-template-columns: 1fr; }
    section { padding: 4rem 1.25rem; }
    .hero { padding: 6rem 1.25rem 4rem; }
    .hero-stats { gap: 2rem; }
  }

  /* ─── SCROLL REVEAL ─── */
  .reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.6s ease, transform 0.6s ease; }
  .reveal.visible { opacity: 1; transform: none; }
</style>
</head>
<body>

<!-- NAV -->
<nav id="main-nav">
  <div class="nav-inner">
    <a class="logo" href="#">
      <span class="logo-dot"></span>
      AMS Sistemas
    </a>
    <button class="nav-toggle" id="navToggle" aria-label="Menu">
      <i class="bi bi-list"></i>
    </button>
    <ul class="nav-links" id="navLinks">
      <li><a href="#sobre">Sobre</a></li>
      <li><a href="#saas">Sistemas</a></li>
      <li><a href="#servicos">Serviços</a></li>
      <li><a href="#planos">Planos</a></li>
      <li><a href="#contato" class="nav-cta">Solicitar Orçamento</a></li>
    </ul>
  </div>
</nav>

<!-- HERO -->
<header class="hero">
  <div class="hero-glow"></div>
  <div class="hero-glow2"></div>
  <div class="hero-inner">
    <div class="hero-badge"><span></span> Sistemas SaaS &amp; Infraestrutura de TI</div>
    <h1>Tecnologia que faz<br>sua empresa <em>crescer de verdade</em></h1>
    <p class="hero-sub">Automatize operações, escale vendas e gerencie sua infraestrutura com sistemas robustos desenvolvidos para o seu negócio.</p>
    <div class="hero-btns">
      <a href="#saas" class="btn-primary"><i class="bi bi-grid-1x2"></i> Ver Sistemas</a>
      <a href="#contato" class="btn-ghost"><i class="bi bi-chat-text"></i> Solicitar Orçamento</a>
    </div>
    <div class="hero-stats">
      <div class="stat"><div class="stat-num">8<em>+</em></div><div class="stat-label">Sistemas SaaS</div></div>
      <div class="stat"><div class="stat-num">99<em>%</em></div><div class="stat-label">Uptime garantido</div></div>
      <div class="stat"><div class="stat-num">24<em>h</em></div><div class="stat-label">Suporte Enterprise</div></div>
    </div>
  </div>
</header>

<!-- SOBRE -->
<section id="sobre">
  <div class="container">
    <div class="sobre-grid">
      <div class="reveal">
        <div class="section-label">Quem somos</div>
        <h2 class="section-title">Especialistas em tecnologia para negócios</h2>
        <p style="color:var(--muted2);line-height:1.9;margin-bottom:1.25rem;">Somos uma empresa focada em <strong style="color:var(--text)">desenvolvimento de sistemas</strong>, <strong style="color:var(--text)">soluções web</strong> e <strong style="color:var(--text)">infraestrutura de TI</strong>, entregando estabilidade, segurança e crescimento para cada cliente.</p>
        <p style="color:var(--muted);font-size:0.9rem;line-height:1.8;">Atendemos desde a criação de sites e sistemas personalizados até a administração completa de servidores, redes corporativas e suporte técnico contínuo — com documentação, boas práticas e proximidade real.</p>
      </div>
      <div class="reveal">
        <div class="pilares">
          <div class="pilar"><div class="pilar-icon">⚙️</div><h5>Código escalável</h5><p>Desenvolvimento profissional com boas práticas</p></div>
          <div class="pilar"><div class="pilar-icon">🛡️</div><h5>Infraestrutura segura</h5><p>Servidores monitorados e protegidos</p></div>
          <div class="pilar"><div class="pilar-icon">💬</div><h5>Suporte transparente</h5><p>Atendimento próximo e sem burocracia</p></div>
          <div class="pilar"><div class="pilar-icon">📐</div><h5>Sob medida</h5><p>Soluções pensadas para cada negócio</p></div>
          <div class="pilar" style="grid-column:1/-1"><div class="pilar-icon">🎯</div><h5>Foco em resultado</h5><p>Tecnologia que funciona de verdade, com continuidade</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SISTEMAS SAAS -->
<section id="saas">
  <div class="container">
    <div class="reveal" style="text-align:center;max-width:620px;margin:0 auto 0;">
      <div class="section-label" style="justify-content:center">Plataformas</div>
      <h2 class="section-title">Sistemas para cada segmento</h2>
      <p class="section-sub" style="margin:0 auto">Escolha o sistema ideal para o seu negócio. Todos prontos para uso, com suporte e atualizações incluídos.</p>
    </div>
    <div class="saas-grid">
      <div class="saas-card featured reveal">
        <div class="card-badge hot">🔥 Mais procurado</div>
        <h3>Sistema de Delivery</h3>
        <p>Plataforma completa para restaurantes com pedidos online e integração nativa com WhatsApp.</p>
        <ul class="feature-list">
          <li>Cardápio digital interativo</li>
          <li>Pedido automático via WhatsApp</li>
          <li>Gestão de entregas em tempo real</li>
          <li>Relatórios de vendas detalhados</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="landing/landing.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>

      <div class="saas-card reveal">
        <div class="card-badge">Sistema PDV</div>
        <h3>Sistema de Vendas</h3>
        <p>Controle completo de vendas, estoque e financeiro para qualquer tipo de loja.</p>
        <ul class="feature-list">
          <li>PDV completo e intuitivo</li>
          <li>Controle de estoque</li>
          <li>Relatórios financeiros</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="pdv.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>

      <div class="saas-card reveal">
        <div class="card-badge">Saúde</div>
        <h3>CRM Médico</h3>
        <p>Gestão completa para clínicas e consultórios com prontuário digital.</p>
        <ul class="feature-list">
          <li>Agenda médica online</li>
          <li>Cadastro de pacientes</li>
          <li>Prontuário eletrônico</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="landing/crm.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>

      <div class="saas-card reveal">
        <div class="card-badge">Food &amp; Beverage</div>
        <h3>Cafeterias e Padarias</h3>
        <p>Comandas eletrônicas, controle de mesas e integração com delivery.</p>
        <ul class="feature-list">
          <li>Controle de mesas</li>
          <li>Estoque de insumos</li>
          <li>Relatórios de vendas</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="landing/coffeehand.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>

      <div class="saas-card reveal">
        <div class="card-badge">Food &amp; Beverage</div>
        <h3>Açaiteria e Sorveterias</h3>
        <p>Monte seu produto, controle sabores, adicionais, estoque e vendas.</p>
        <ul class="feature-list">
          <li>Montagem personalizada</li>
          <li>Controle de estoque</li>
          <li>Relatórios detalhados</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="landing/acaiteria.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>

      <div class="saas-card reveal">
        <div class="card-badge">Construção</div>
        <h3>Material de Construção</h3>
        <p>Gestão de estoque, vendas, orçamentos, clientes e fornecedores.</p>
        <ul class="feature-list">
          <li>Controle de estoque</li>
          <li>Emissão de orçamentos</li>
          <li>Clientes e fornecedores</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="landing/construcao.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>

      <div class="saas-card reveal">
        <div class="card-badge">Condomínios</div>
        <h3>Gestão Condominial</h3>
        <p>Administração de condomínios com boletos, reservas e assembleias online.</p>
        <ul class="feature-list">
          <li>Gestão de moradores</li>
          <li>Emissão de boletos</li>
          <li>Reservas de áreas comuns</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="landing/condominio.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>

      <div class="saas-card reveal">
        <div class="card-badge">Agendamento</div>
        <h3>Agendamento On-line</h3>
        <p>Agende serviços, consultas ou reservas para qualquer segmento de negócio.</p>
        <ul class="feature-list">
          <li>Agenda online</li>
          <li>Notificações automáticas</li>
          <li>Gestão de profissionais</li>
        </ul>
        <div class="card-actions">
          <a href="#contato" class="btn-card btn-card-primary">Quero esse sistema</a>
          <a href="landing.php" class="btn-card btn-card-outline">Ver produto</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- DIFERENCIAIS -->
<section id="diferenciais">
  <div class="container">
    <div class="reveal" style="text-align:center;max-width:560px;margin:0 auto 0">
      <div class="section-label" style="justify-content:center">Por que nos escolher</div>
      <h2 class="section-title">Construído para durar</h2>
    </div>
    <div class="dif-grid">
      <div class="dif-card reveal">
        <div class="dif-icon">💻</div>
        <h4>Código Profissional</h4>
        <p>Projetos desenvolvidos com boas práticas, documentação completa e arquitetura escalável.</p>
      </div>
      <div class="dif-card reveal">
        <div class="dif-icon">🖥️</div>
        <h4>Infraestrutura Sólida</h4>
        <p>Servidores Windows e Linux configurados para alta disponibilidade e máxima performance.</p>
      </div>
      <div class="dif-card reveal">
        <div class="dif-icon">🔒</div>
        <h4>Segurança Total</h4>
        <p>Proteção de dados, backups automáticos, monitoramento contínuo e hardening de servidores.</p>
      </div>
    </div>
  </div>
</section>

<!-- SERVIÇOS -->
<section id="servicos">
  <div class="container">
    <div class="reveal">
      <div class="section-label">Serviços</div>
      <h2 class="section-title">O que fazemos</h2>
    </div>
    <div class="serv-grid">
      <div class="serv-card reveal">
        <span class="serv-num">01</span>
        <h4>Desenvolvimento Web</h4>
        <p>Sites institucionais, landing pages e sistemas web modernos, rápidos e responsivos.</p>
      </div>
      <div class="serv-card reveal">
        <span class="serv-num">02</span>
        <h4>Sistemas Desktop</h4>
        <p>Desenvolvimento de sistemas desktop sob medida para automação e controle interno.</p>
      </div>
      <div class="serv-card reveal">
        <span class="serv-num">03</span>
        <h4>Sistemas Web / ERP / CRM</h4>
        <p>Plataformas personalizadas para gestão, relatórios e processos empresariais.</p>
      </div>
      <div class="serv-card reveal">
        <span class="serv-num">04</span>
        <h4>Administração de Servidores</h4>
        <p>Gerenciamento de servidores Windows e Linux, VPS, cloud, backups e segurança.</p>
      </div>
      <div class="serv-card reveal">
        <span class="serv-num">05</span>
        <h4>Infraestrutura de TI</h4>
        <p>Redes, monitoramento, suporte técnico e organização do ambiente corporativo.</p>
      </div>
      <div class="serv-card reveal">
        <span class="serv-num">06</span>
        <h4>Suporte e Manutenção</h4>
        <p>Acompanhamento contínuo, melhorias, atualizações e suporte técnico especializado.</p>
      </div>
    </div>
  </div>
</section>

<!-- PLANOS -->
<section id="planos">
  <div class="container">
    <div class="reveal" style="text-align:center;max-width:560px;margin:0 auto 0">
      <div class="section-label" style="justify-content:center">Preços</div>
      <h2 class="section-title">Plano certo para cada estágio</h2>
      <p class="section-sub" style="margin:0 auto">Todos os planos podem ser personalizados. Sem taxas ocultas.</p>
    </div>
    <div class="planos-grid">
      <div class="plano-card reveal">
        <div class="plano-nome">Start</div>
        <div class="plano-desc">Ideal para pequenos negócios</div>
        <div class="plano-preco">
          <!--<span class="plano-cifrao">R$</span>-->
          <span class="plano-valor"></span>
          <span class="plano-periodo">Sob consulta</span>
        </div>
        <ul class="plano-itens">
          <li><span class="check"><i class="bi bi-check2"></i></span> Site institucional</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Manutenção básica</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Correções simples</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Backup mensal</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Suporte via WhatsApp</li>
        </ul>
        <a href="#contato" class="btn-plano">Falar com especialista</a>
      </div>

      <div class="plano-card destaque reveal">
        <div class="plano-tag">Mais popular</div>
        <div class="plano-nome">Pro</div>
        <div class="plano-desc">Para empresas em crescimento</div>
        <div class="plano-preco">
          <!--<span class="plano-cifrao">R$</span>-->
          <span class="plano-valor"></span>
          <span class="plano-periodo">Sob consulta</span>
        </div>
        <ul class="plano-itens">
          <li><span class="check"><i class="bi bi-check2"></i></span> Site ou sistema web</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Manutenção contínua</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Suporte prioritário</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Monitoramento básico</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Backup semanal</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Atualizações de segurança</li>
        </ul>
        <a href="#contato" class="btn-plano destaque">Falar com especialista</a>
      </div>

      <div class="plano-card reveal">
        <div class="plano-nome">Enterprise</div>
        <div class="plano-desc">Infraestrutura e TI completa</div>
        <div class="plano-preco">
          <!--<span class="plano-cifrao">R$</span>-->
          <span class="plano-valor"></span>
          <span class="plano-periodo">Sob consulta</span>
        </div>
        <ul class="plano-itens">
          <li><span class="check"><i class="bi bi-check2"></i></span> Administração de servidores</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Windows e Linux</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Monitoramento 24/7</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Backups diários</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Segurança e hardening</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> Suporte técnico dedicado</li>
          <li><span class="check"><i class="bi bi-check2"></i></span> SLA empresarial</li>
        </ul>
        <a href="#contato" class="btn-plano">Falar com especialista</a>
      </div>
    </div>
  </div>
</section>

<!-- CTA BAND -->
<div class="cta-band reveal">
  <div class="container">
    <h2>Pronto para levar sua<br>empresa ao próximo nível?</h2>
    <p>Fale com nossos especialistas e receba um orçamento personalizado em até 24h.</p>
    <a href="#contato" class="btn-primary" style="font-size:1.05rem;padding:16px 40px">
      <i class="bi bi-arrow-right-circle"></i> Solicitar Orçamento Grátis
    </a>
  </div>
</div>

<!-- CONTATO -->
<section id="contato">
  <div class="container">
    <div class="contato-grid">
      <div class="reveal">
        <div class="section-label">Contato</div>
        <h2 class="section-title">Vamos conversar sobre seu projeto</h2>
        <p style="color:var(--muted2);font-size:0.95rem;line-height:1.9;margin-bottom:2rem;">Preencha o formulário e entraremos em contato via WhatsApp em instantes. Sem compromisso.</p>
        <div class="contato-destaque">
          <div class="contato-destaque-icon">⚡</div>
          <div><h5>Resposta rápida</h5><p>Retorno em até 30 minutos via WhatsApp</p></div>
        </div>
        <div class="contato-destaque">
          <div class="contato-destaque-icon">🎯</div>
          <div><h5>Diagnóstico gratuito</h5><p>Analisamos sua necessidade sem custo</p></div>
        </div>
        <div class="contato-destaque">
          <div class="contato-destaque-icon">🔧</div>
          <div><h5>Solução sob medida</h5><p>Cada proposta é personalizada para você</p></div>
        </div>
      </div>
      <div class="reveal">
        <div class="form-card">
          <form id="whatsappForm">
            <div class="form-row">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input id="nome" name="nome" class="form-control" placeholder="Seu nome completo" required>
              </div>
              <div class="form-group">
                <label for="email">E-mail</label>
                <input id="email" name="email" type="email" class="form-control" placeholder="seu@email.com" required>
              </div>
            </div>
            <div class="form-group">
              <label for="servico">Serviço de interesse</label>
              <select id="servico" name="servico" class="form-control" required>
                <option value="" disabled selected>Selecione o serviço</option>
                <option value="Desenvolvimento Web">Desenvolvimento Web</option>
                <option value="Sistemas Desktop">Sistemas Desktop</option>
                <option value="Sistemas Web / ERP / CRM">Sistemas Web / ERP / CRM</option>
                <option value="Administração de Servidores">Administração de Servidores</option>
                <option value="Infraestrutura de TI">Infraestrutura de TI</option>
                <option value="Suporte e Manutenção">Suporte e Manutenção</option>
              </select>
            </div>
            <div class="form-group">
              <label for="mensagem">Como podemos ajudar?</label>
              <textarea id="mensagem" class="form-control" rows="4" placeholder="Descreva brevemente sua necessidade..." required></textarea>
            </div>
            <button type="submit" class="btn-submit">
              <i class="bi bi-whatsapp"></i> Enviar via WhatsApp
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p style="margin-bottom:0.5rem">© 2026 AMS Sistemas &bull; Todos os direitos reservados</p>
  <a href="politica.html">Política de Privacidade</a>
</footer>

<!-- BOT WHATSAPP -->
<div class="bot-window" id="botWindow">
  <div class="bot-head">
    <div class="bot-head-info">
      <div class="bot-avatar">🤖</div>
      <div class="bot-head-text"><h5>Assistente AMS</h5><small>Online agora</small></div>
    </div>
    <button class="bot-close" id="botClose" aria-label="Fechar">✕</button>
  </div>
  <div class="bot-body" id="botBody">
    <div class="bot-msg"><strong>Olá 👋</strong><br>Vou te ajudar em poucos passos.<br><br><strong>Qual serviço você procura?</strong></div>
    <div class="bot-btns">
      <button class="bot-btn" data-value="Desenvolvimento Web">🌐 Desenvolvimento Web</button>
      <button class="bot-btn" data-value="Sistemas / ERP / CRM">💻 Sistemas / ERP / CRM</button>
      <button class="bot-btn" data-value="Infraestrutura de TI">🖧 Infraestrutura de TI</button>
      <button class="bot-btn" data-value="Suporte Técnico">🛠️ Suporte Técnico</button>
    </div>
  </div>
</div>
<button class="bot-fab" id="botOpen" aria-label="Abrir chat WhatsApp">
  <i class="bi bi-whatsapp"></i>
</button>

<script>
  window.GOOGLE_ADS_SEND_TO = '<?= $config['google_ads_id'] ?>/<?= $config['gtag_conversion_label'] ?>';

  // Nav toggle mobile
  document.getElementById('navToggle').addEventListener('click', () => {
    document.getElementById('navLinks').classList.toggle('active');
  });

  // Close nav on link click
  document.querySelectorAll('#navLinks a').forEach(a => {
    a.addEventListener('click', () => document.getElementById('navLinks').classList.remove('active'));
  });

  // Nav scroll style
  window.addEventListener('scroll', () => {
    document.getElementById('main-nav').style.background =
      window.scrollY > 40 ? 'rgba(7,9,15,0.95)' : 'rgba(7,9,15,0.75)';
  });

  // Scroll reveal
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(e => { if(e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); } });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

  // WhatsApp form
  document.getElementById('whatsappForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const nome = document.getElementById('nome').value;
    const email = document.getElementById('email').value;
    const servico = document.getElementById('servico').value;
    const mensagem = document.getElementById('mensagem').value;
    const text = encodeURIComponent(
      `Olá! Meu nome é ${nome}.\nE-mail: ${email}\nServiço: ${servico}\n\n${mensagem}`
    );
    if(typeof gtag !== 'undefined' && window.GOOGLE_ADS_SEND_TO) {
      gtag('event', 'conversion', { send_to: window.GOOGLE_ADS_SEND_TO });
    }
    window.open(`https://wa.me/5521000000000?text=${text}`, '_blank');
  });

  // Bot WhatsApp
  const botOpen = document.getElementById('botOpen');
  const botClose = document.getElementById('botClose');
  const botWindow = document.getElementById('botWindow');
  const botBody = document.getElementById('botBody');

  botOpen.addEventListener('click', () => botWindow.classList.toggle('open'));
  botClose.addEventListener('click', () => botWindow.classList.remove('open'));

  botBody.querySelectorAll('.bot-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const val = this.dataset.value;
      botBody.innerHTML = `
        <div class="bot-msg">Ótimo! Você quer saber sobre <strong>${val}</strong>.<br><br>Clique abaixo para continuar no WhatsApp 👇</div>
        <div class="bot-btns">
          <button class="bot-btn" onclick="window.open('https://wa.me/5521000000000?text=${encodeURIComponent('Olá! Tenho interesse em: ' + val)}','_blank')">
            Continuar no WhatsApp ↗
          </button>
        </div>`;
    });
  });
</script>
</body>
</html>