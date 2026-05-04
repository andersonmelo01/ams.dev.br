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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;500;700&family=Exo+2:wght@300;400;600;700;800&display=swap" rel="stylesheet">
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
  --bg:     #030508;
  --bg2:    #070B10;
  --bg3:    #0A0F18;
  --bg4:    #0D1520;
  --cyan:   #00D4FF;
  --cyan2:  #00AACC;
  --blue:   #0A84FF;
  --green:  #00FF88;
  --green2: #00CC6A;
  --orange: #FF6B00;
  --text:   #E8F4FF;
  --muted:  #4A6080;
  --muted2: #7A9BB8;
  --brd:    rgba(0,212,255,0.08);
  --brd2:   rgba(0,212,255,0.18);
  --r: 4px; --r-lg: 8px;
}
html { scroll-behavior: smooth; }
body {
  font-family: 'Exo 2', sans-serif;
  background: var(--bg); color: var(--text);
  font-size: 16px; line-height: 1.65; overflow-x: hidden;
}
body::before {
  content: ''; position: fixed; inset: 0; pointer-events: none; z-index: 999;
  background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.025) 2px, rgba(0,0,0,0.025) 4px);
}
.grid-bg {
  position: fixed; inset: 0; pointer-events: none; z-index: 0;
  background-image:
    linear-gradient(rgba(0,212,255,0.035) 1px, transparent 1px),
    linear-gradient(90deg, rgba(0,212,255,0.035) 1px, transparent 1px);
  background-size: 52px 52px;
}
#particles-canvas { position: fixed; inset: 0; pointer-events: none; z-index: 0; opacity: 0.45; }

/* ── NAV ── */
nav {
  position: fixed; top: 0; left: 0; right: 0; z-index: 500;
  height: 66px; padding: 0 2rem;
  display: flex; align-items: center;
  background: rgba(3,5,8,0.82);
  backdrop-filter: blur(22px);
  border-bottom: 1px solid var(--brd2);
  transition: background 0.3s;
}
nav::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, transparent 0%, var(--cyan) 25%, var(--green) 75%, transparent 100%);
  opacity: 0.35;
}
.nav-inner { width: 100%; max-width: 1280px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; }
.logo {
  font-family: 'JetBrains Mono', monospace; font-weight: 700; font-size: 1.05rem;
  color: var(--text); text-decoration: none;
  display: flex; align-items: center; gap: 10px; letter-spacing: 0.05em;
}
.logo-hex svg { width: 30px; height: 30px; display: block; }
.logo .brand { color: var(--cyan); }
.nav-links { display: flex; align-items: center; gap: 0.1rem; list-style: none; }
.nav-links a {
  padding: 6px 13px; border-radius: var(--r);
  color: var(--muted2); text-decoration: none; font-size: 0.8rem; font-weight: 500;
  font-family: 'JetBrains Mono', monospace; letter-spacing: 0.03em;
  transition: color 0.18s; position: relative;
}
.nav-links a:hover { color: var(--cyan); }
.nav-links a::after {
  content: ''; position: absolute; bottom: 3px; left: 13px; right: 13px; height: 1px;
  background: var(--cyan); transform: scaleX(0); transition: transform 0.2s;
}
.nav-links a:hover::after { transform: scaleX(1); }
.nav-cta {
  padding: 8px 20px !important; background: transparent !important;
  border: 1px solid var(--cyan) !important; color: var(--cyan) !important;
  font-weight: 700 !important;
  clip-path: polygon(8px 0%,100% 0%,calc(100% - 8px) 100%,0% 100%);
  transition: background 0.2s !important, box-shadow 0.2s !important;
}
.nav-cta:hover { background: rgba(0,212,255,0.1) !important; box-shadow: 0 0 22px rgba(0,212,255,0.25) !important; }
.nav-cta::after { display: none !important; }
.nav-toggle { display: none; background: none; border: 1px solid var(--brd2); color: var(--text); padding: 6px 10px; border-radius: var(--r); cursor: pointer; font-size: 1.05rem; }

/* ── HERO ── */
.hero {
  min-height: 100vh; display: flex; align-items: center;
  padding: 9rem 2.5rem 5rem; position: relative; overflow: hidden;
}
.hero-orb1 { position: absolute; top: -15%; left: -8%; width: 680px; height: 680px; border-radius: 50%; background: radial-gradient(circle, rgba(0,212,255,0.055) 0%, transparent 65%); pointer-events: none; }
.hero-orb2 { position: absolute; bottom: -15%; right: -8%; width: 550px; height: 550px; border-radius: 50%; background: radial-gradient(circle, rgba(0,255,136,0.045) 0%, transparent 65%); pointer-events: none; }
.hero-inner {
  position: relative; z-index: 2; max-width: 1280px; margin: 0 auto; width: 100%;
  display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;
}
.hero-tag {
  display: inline-flex; align-items: center; gap: 8px;
  font-family: 'JetBrains Mono', monospace; font-size: 0.7rem; font-weight: 500;
  letter-spacing: 0.12em; text-transform: uppercase; color: var(--cyan);
  margin-bottom: 2rem; padding: 5px 14px;
  border: 1px solid rgba(0,212,255,0.28); background: rgba(0,212,255,0.05);
  clip-path: polygon(6px 0%,100% 0%,calc(100% - 6px) 100%,0% 100%);
}
.hero-dot { width: 5px; height: 5px; background: var(--green); border-radius: 50%; animation: pdot 1.8s infinite; }
@keyframes pdot { 0%,100%{opacity:1;box-shadow:0 0 0 0 rgba(0,255,136,0.5)} 50%{opacity:0.7;box-shadow:0 0 0 5px rgba(0,255,136,0)} }
.hero h1 {
  font-family: 'Exo 2', sans-serif; font-size: clamp(2.4rem, 4.5vw, 4rem);
  font-weight: 800; letter-spacing: -0.01em; line-height: 1.1; color: var(--text); margin-bottom: 1.5rem;
}
.hero h1 .gradient {
  display: block;
  background: linear-gradient(90deg, var(--cyan), var(--green));
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.hero-sub {
  font-size: 1rem; color: var(--muted2); max-width: 440px; margin-bottom: 2.75rem;
  line-height: 1.85; border-left: 2px solid var(--cyan); padding-left: 1.25rem;
}
.hero-btns { display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 0; }
.btn-primary {
  padding: 13px 30px; font-size: 0.88rem; font-weight: 700;
  background: linear-gradient(135deg, var(--cyan), var(--blue));
  color: var(--bg); border: none; cursor: pointer;
  text-decoration: none; display: inline-flex; align-items: center; gap: 9px;
  transition: opacity 0.2s, transform 0.15s, box-shadow 0.2s;
  clip-path: polygon(10px 0%,100% 0%,calc(100% - 10px) 100%,0% 100%);
  font-family: 'Exo 2', sans-serif; letter-spacing: 0.03em;
  box-shadow: 0 0 30px rgba(0,212,255,0.3);
}
.btn-primary:hover { opacity: 0.88; transform: translateY(-2px); box-shadow: 0 0 50px rgba(0,212,255,0.5); }
.btn-ghost {
  padding: 12px 28px; font-size: 0.88rem; font-weight: 600;
  background: transparent; color: var(--muted2); border: 1px solid var(--brd2);
  cursor: pointer; text-decoration: none; display: inline-flex; align-items: center; gap: 9px;
  transition: color 0.18s, border-color 0.18s, background 0.18s, box-shadow 0.18s;
  clip-path: polygon(8px 0%,100% 0%,calc(100% - 8px) 100%,0% 100%);
  font-family: 'Exo 2', sans-serif;
}
.btn-ghost:hover { color: var(--cyan); border-color: var(--cyan); background: rgba(0,212,255,0.05); box-shadow: 0 0 20px rgba(0,212,255,0.1); }

/* STATS */
.hero-stats { display: flex; gap: 0; margin-top: 3.5rem; position: relative; z-index: 2; }
.stat-block {
  padding: 1.25rem 2rem; border: 1px solid var(--brd);
  border-right: none; background: rgba(7,11,16,0.8); position: relative;
}
.stat-block:first-child { border-radius: var(--r) 0 0 var(--r); }
.stat-block:last-child { border-right: 1px solid var(--brd); border-radius: 0 var(--r) var(--r) 0; }
.stat-block::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--cyan), transparent); opacity: 0.5;
}
.stat-num { font-family: 'Exo 2', sans-serif; font-size: 1.9rem; font-weight: 800; color: var(--text); line-height: 1; }
.stat-num em { font-style: normal; color: var(--cyan); }
.stat-label { font-family: 'JetBrains Mono', monospace; font-size: 0.66rem; color: var(--muted); text-transform: uppercase; letter-spacing: 0.1em; margin-top: 4px; }

/* TERMINAL */
.hero-terminal {
  background: var(--bg2); border: 1px solid var(--brd2); border-radius: var(--r-lg);
  overflow: hidden; box-shadow: 0 0 60px rgba(0,212,255,0.07), 0 40px 80px rgba(0,0,0,0.5);
  position: relative;
}
.hero-terminal::before {
  content: ''; position: absolute; inset: 0; pointer-events: none;
  background: linear-gradient(180deg, rgba(0,212,255,0.025) 0%, transparent 35%);
}
.term-bar {
  background: var(--bg3); padding: 0.75rem 1.25rem;
  display: flex; align-items: center; gap: 0.6rem; border-bottom: 1px solid var(--brd);
}
.term-dot { width: 10px; height: 10px; border-radius: 50%; }
.td-r { background: #FF5F57; } .td-y { background: #FEBC2E; } .td-g { background: #28C840; }
.term-title { font-family: 'JetBrains Mono', monospace; font-size: 0.7rem; color: var(--muted); margin: 0 auto; }
.term-body { padding: 1.5rem; font-family: 'JetBrains Mono', monospace; font-size: 0.78rem; line-height: 2; }
.tl { display: block; }
.tp { color: var(--green2); } .tc { color: var(--text); }
.to { color: var(--muted2); } .tok { color: var(--green); } .tcy { color: var(--cyan); }
.tcursor { display: inline-block; width: 8px; height: 14px; background: var(--cyan); animation: bcur 1s step-end infinite; vertical-align: middle; margin-left: 2px; }
@keyframes bcur { 0%,100%{opacity:1} 50%{opacity:0} }

/* ── SECTION BASE ── */
section { padding: 7rem 2.5rem; position: relative; z-index: 2; }
.container { max-width: 1280px; margin: 0 auto; }
.ey {
  font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; font-weight: 500;
  letter-spacing: 0.15em; text-transform: uppercase; color: var(--cyan);
  display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;
}
.ey span { width: 28px; height: 1px; background: linear-gradient(90deg, var(--cyan), transparent); }
.section-title {
  font-family: 'Exo 2', sans-serif; font-size: clamp(1.8rem, 3.5vw, 2.8rem); font-weight: 800;
  margin-bottom: 1.25rem; letter-spacing: -0.01em; color: var(--text);
}
.section-sub { font-size: 0.95rem; color: var(--muted2); max-width: 500px; line-height: 1.85; }

/* ── SOBRE ── */
#sobre { background: var(--bg2); border-top: 1px solid var(--brd); }
.sobre-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 5rem; align-items: center; margin-top: 4rem; }
.pilares { display: grid; grid-template-columns: 1fr 1fr; gap: 1px; background: var(--brd2); border: 1px solid var(--brd2); }
.pilar {
  background: var(--bg3); padding: 1.5rem; transition: background 0.22s; position: relative; overflow: hidden;
}
.pilar::before {
  content: ''; position: absolute; top: 0; left: 0; width: 3px; height: 0;
  background: linear-gradient(180deg, var(--cyan), var(--green)); transition: height 0.32s;
}
.pilar:hover { background: var(--bg4); }
.pilar:hover::before { height: 100%; }
.pilar-code { font-family: 'JetBrains Mono', monospace; font-size: 0.62rem; color: var(--cyan); opacity: 0.55; margin-bottom: 0.55rem; }
.pilar h5 { font-size: 0.875rem; font-weight: 700; color: var(--text); margin-bottom: 0.3rem; }
.pilar p { font-size: 0.78rem; color: var(--muted); }

/* ── SAAS ── */
#saas { background: var(--bg); }
.saas-top { display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1.5rem; margin-bottom: 0; }
.saas-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--brd); border: 1px solid var(--brd2); margin-top: 3.5rem; }
.saas-card {
  background: var(--bg2); padding: 2rem; display: flex; flex-direction: column;
  transition: background 0.22s; position: relative; overflow: hidden;
}
.saas-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 1px;
  background: linear-gradient(90deg, transparent, var(--cyan), transparent); opacity: 0; transition: opacity 0.3s;
}
.saas-card:hover { background: var(--bg3); }
.saas-card:hover::before { opacity: 1; }
.saas-card.featured {
  background: linear-gradient(145deg, rgba(0,212,255,0.045) 0%, var(--bg2) 100%);
  border-left: 2px solid var(--cyan);
}
.saas-card.featured::before { opacity: 1; background: linear-gradient(90deg, var(--cyan), var(--green)); }
.card-badge {
  display: inline-flex; align-items: center; gap: 5px;
  font-family: 'JetBrains Mono', monospace; font-size: 0.63rem; font-weight: 500;
  text-transform: uppercase; letter-spacing: 0.09em; padding: 3px 10px; margin-bottom: 1.25rem;
  background: rgba(0,212,255,0.07); color: var(--cyan); border: 1px solid rgba(0,212,255,0.2);
  clip-path: polygon(5px 0%,100% 0%,calc(100% - 5px) 100%,0% 100%);
}
.card-badge.hot { background: rgba(0,255,136,0.07); color: var(--green); border-color: rgba(0,255,136,0.2); }
.saas-card h3 { font-size: 1.05rem; font-weight: 700; color: var(--text); margin-bottom: 0.6rem; }
.saas-card > p { font-size: 0.85rem; color: var(--muted2); margin-bottom: 1.25rem; line-height: 1.75; flex: 1; }
.feature-list { list-style: none; margin-bottom: 1.75rem; }
.feature-list li {
  font-family: 'JetBrains Mono', monospace; font-size: 0.73rem; color: var(--muted2);
  padding: 0.35rem 0; display: flex; align-items: center; gap: 9px; border-bottom: 1px solid var(--brd);
}
.feature-list li:last-child { border-bottom: none; }
.feature-list li::before { content: '>'; color: var(--green2); font-weight: 700; }
.card-actions { display: flex; gap: 0.6rem; flex-wrap: wrap; margin-top: auto; }
.btn-card {
  flex: 1; min-width: 110px; padding: 9px 14px; font-size: 0.77rem; font-weight: 700;
  text-decoration: none; text-align: center; transition: all 0.18s; display: inline-block;
  font-family: 'Exo 2', sans-serif; letter-spacing: 0.03em;
  clip-path: polygon(6px 0%,100% 0%,calc(100% - 6px) 100%,0% 100%);
}
.btn-card-primary { background: linear-gradient(135deg, var(--cyan), var(--blue)); color: var(--bg); }
.btn-card-primary:hover { opacity: 0.85; box-shadow: 0 0 20px rgba(0,212,255,0.3); }
.btn-card-outline { background: transparent; color: var(--muted2); border: 1px solid var(--brd2); clip-path: none; }
.btn-card-outline:hover { color: var(--cyan); border-color: var(--cyan); }

/* ── DIFERENCIAIS ── */
#diferenciais { background: var(--bg2); border-top: 1px solid var(--brd); border-bottom: 1px solid var(--brd); }
.dif-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 4rem; }
.dif-card {
  background: var(--bg3); border: 1px solid var(--brd);
  padding: 2rem; position: relative; overflow: hidden; transition: border-color 0.25s, box-shadow 0.25s;
}
.dif-card::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--cyan), var(--green));
  transform: scaleX(0); transform-origin: left; transition: transform 0.35s;
}
.dif-card:hover { border-color: rgba(0,212,255,0.3); box-shadow: 0 0 40px rgba(0,212,255,0.06); }
.dif-card:hover::after { transform: scaleX(1); }
.dif-num {
  position: absolute; top: 1.25rem; right: 1.5rem;
  font-family: 'JetBrains Mono', monospace; font-size: 2.5rem; font-weight: 700;
  color: rgba(0,212,255,0.04); line-height: 1;
}
.dif-icon {
  width: 46px; height: 46px; margin-bottom: 1.5rem;
  border: 1px solid rgba(0,212,255,0.22); display: flex; align-items: center; justify-content: center;
  font-size: 1.2rem; background: rgba(0,212,255,0.06);
  clip-path: polygon(8px 0%,100% 0%,calc(100% - 8px) 100%,0% 100%);
}
.dif-card h4 { font-size: 1rem; font-weight: 700; margin-bottom: 0.6rem; color: var(--text); }
.dif-card p { font-size: 0.855rem; color: var(--muted2); line-height: 1.8; }

/* ── SERVIÇOS ── */
#servicos { background: var(--bg); }
.serv-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1px; background: var(--brd); border: 1px solid var(--brd2); margin-top: 3.5rem; }
.serv-card {
  background: var(--bg2); padding: 2rem; transition: background 0.2s; position: relative;
}
.serv-card:hover { background: var(--bg3); }
.serv-id { font-family: 'JetBrains Mono', monospace; font-size: 0.62rem; color: var(--cyan); opacity: 0.55; margin-bottom: 0.75rem; display: block; letter-spacing: 0.1em; }
.serv-card h4 { font-size: 0.95rem; font-weight: 700; margin-bottom: 0.4rem; color: var(--text); }
.serv-card p { font-size: 0.84rem; color: var(--muted); line-height: 1.75; }
.serv-arrow { position: absolute; bottom: 1.5rem; right: 1.5rem; color: var(--brd2); font-size: 0.85rem; transition: color 0.2s, transform 0.2s; }
.serv-card:hover .serv-arrow { color: var(--cyan); transform: translate(3px, -3px); }

/* ── PLANOS ── */
#planos { background: var(--bg2); }
.planos-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; margin-top: 3.5rem; }
.plano-card {
  background: var(--bg3); border: 1px solid var(--brd);
  padding: 2.5rem 2rem; display: flex; flex-direction: column; position: relative;
  transition: border-color 0.25s, box-shadow 0.25s; overflow: hidden;
}
.plano-card:hover { border-color: var(--brd2); }
.plano-card.destaque {
  border-color: rgba(0,212,255,0.38);
  background: linear-gradient(155deg, rgba(0,212,255,0.055) 0%, var(--bg3) 55%);
  box-shadow: 0 0 60px rgba(0,212,255,0.07);
}
.plano-corner {
  position: absolute; top: 0; right: 0; width: 0; height: 0;
  border-style: solid; border-width: 0 36px 36px 0;
  border-color: transparent var(--brd2) transparent transparent;
}
.destaque .plano-corner { border-color: transparent rgba(0,212,255,0.38) transparent transparent; }
.plano-tag {
  position: absolute; top: -1px; left: 50%; transform: translateX(-50%);
  background: linear-gradient(90deg, var(--cyan), var(--green));
  color: var(--bg); font-size: 0.62rem; font-weight: 800; text-transform: uppercase;
  letter-spacing: 0.1em; padding: 4px 18px;
  clip-path: polygon(6px 0%,100% 0%,calc(100% - 6px) 100%,0% 100%);
  font-family: 'JetBrains Mono', monospace; white-space: nowrap;
}
.plano-name { font-family: 'JetBrains Mono', monospace; font-size: 0.68rem; color: var(--cyan); letter-spacing: 0.12em; text-transform: uppercase; margin-bottom: 0.35rem; }
.plano-title { font-size: 1.5rem; font-weight: 800; color: var(--text); margin-bottom: 0.35rem; }
.plano-desc { font-size: 0.82rem; color: var(--muted); margin-bottom: 1.75rem; }
.plano-div { height: 1px; background: linear-gradient(90deg, var(--cyan), transparent); margin-bottom: 1.75rem; opacity: 0.28; }
.destaque .plano-div { opacity: 0.65; }
.plano-itens { list-style: none; flex: 1; margin-bottom: 2rem; }
.plano-itens li {
  font-size: 0.84rem; color: var(--muted2); padding: 0.45rem 0;
  border-bottom: 1px solid var(--brd); display: flex; align-items: center; gap: 10px;
}
.plano-itens li:last-child { border-bottom: none; }
.plano-itens li .chk { color: var(--green); font-size: 0.85rem; flex-shrink: 0; }
.btn-plano {
  width: 100%; padding: 12px; font-size: 0.85rem; font-weight: 700;
  text-align: center; text-decoration: none; display: block; transition: all 0.2s;
  background: transparent; color: var(--muted2); border: 1px solid var(--brd2);
  font-family: 'Exo 2', sans-serif; letter-spacing: 0.04em;
  clip-path: polygon(8px 0%,100% 0%,calc(100% - 8px) 100%,0% 100%);
}
.btn-plano:hover { color: var(--cyan); border-color: var(--cyan); background: rgba(0,212,255,0.05); }
.btn-plano.destaque { background: linear-gradient(135deg, var(--cyan), var(--blue)); border-color: transparent; color: var(--bg); box-shadow: 0 0 28px rgba(0,212,255,0.22); }
.btn-plano.destaque:hover { opacity: 0.85; box-shadow: 0 0 50px rgba(0,212,255,0.4); }

/* ── CTA ── */
.cta-band {
  padding: 7rem 2.5rem; text-align: center; background: var(--bg);
  border-top: 1px solid var(--brd); position: relative; overflow: hidden; z-index: 2;
}
.cta-band::before {
  content: ''; position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);
  width: 800px; height: 400px;
  background: radial-gradient(ellipse, rgba(0,212,255,0.065) 0%, transparent 65%); pointer-events: none;
}
.cta-inner { position: relative; max-width: 640px; margin: 0 auto; }
.cta-band h2 { font-family: 'Exo 2', sans-serif; font-size: clamp(1.8rem, 4vw, 3rem); font-weight: 800; margin-bottom: 1rem; color: var(--text); }
.cta-band h2 em { font-style: normal; background: linear-gradient(90deg, var(--cyan), var(--green)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.cta-band p { color: var(--muted2); margin-bottom: 2.5rem; font-size: 1rem; }

/* ── CONTATO ── */
#contato { background: var(--bg2); border-top: 1px solid var(--brd); }
.contato-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 5rem; align-items: start; margin-top: 4rem; }
.contato-info p { color: var(--muted2); margin-bottom: 2.5rem; line-height: 1.85; font-size: 0.95rem; }
.ci-item { display: flex; align-items: flex-start; gap: 1rem; padding: 1rem 0; border-bottom: 1px solid var(--brd); }
.ci-item:first-of-type { border-top: 1px solid var(--brd); }
.ci-ico {
  width: 36px; height: 36px; flex-shrink: 0;
  background: rgba(0,212,255,0.07); border: 1px solid rgba(0,212,255,0.2);
  display: flex; align-items: center; justify-content: center; font-size: 0.9rem;
  clip-path: polygon(6px 0%,100% 0%,calc(100% - 6px) 100%,0% 100%);
}
.ci-item h5 { font-size: 0.875rem; font-weight: 700; margin-bottom: 0.2rem; color: var(--text); }
.ci-item p { font-size: 0.8rem; color: var(--muted); margin: 0; }
.form-card {
  background: var(--bg3); border: 1px solid var(--brd2);
  padding: 2.5rem; position: relative; overflow: hidden;
}
.form-card::before {
  content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px;
  background: linear-gradient(90deg, var(--cyan), var(--green), var(--blue));
}
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
.form-group { margin-bottom: 1.1rem; }
.form-group label {
  display: block; font-family: 'JetBrains Mono', monospace;
  font-size: 0.66rem; font-weight: 500; color: var(--cyan);
  margin-bottom: 0.45rem; text-transform: uppercase; letter-spacing: 0.1em;
}
.form-control {
  width: 100%; padding: 11px 15px; background: var(--bg2); border: 1px solid var(--brd2);
  color: var(--text); font-size: 0.875rem; font-family: 'Exo 2', sans-serif; outline: none;
  transition: border-color 0.18s, box-shadow 0.18s;
}
.form-control:focus { border-color: var(--cyan); box-shadow: 0 0 0 2px rgba(0,212,255,0.1); }
.form-control::placeholder { color: var(--muted); }
textarea.form-control { resize: vertical; min-height: 110px; }
.form-control option { background: var(--bg2); }
.btn-submit {
  width: 100%; padding: 13px;
  background: linear-gradient(135deg, var(--cyan), var(--blue));
  color: var(--bg); border: none; font-size: 0.92rem; font-weight: 800;
  cursor: pointer; font-family: 'Exo 2', sans-serif; letter-spacing: 0.05em;
  transition: opacity 0.18s, transform 0.15s, box-shadow 0.2s;
  display: flex; align-items: center; justify-content: center; gap: 9px;
  margin-top: 0.5rem; clip-path: polygon(10px 0%,100% 0%,calc(100% - 10px) 100%,0% 100%);
  box-shadow: 0 0 28px rgba(0,212,255,0.2);
}
.btn-submit:hover { opacity: 0.88; transform: translateY(-1px); box-shadow: 0 0 50px rgba(0,212,255,0.4); }

/* ── FOOTER ── */
footer {
  background: var(--bg); border-top: 1px solid var(--brd);
  padding: 2.5rem; text-align: center;
  color: var(--muted); font-size: 0.78rem;
  font-family: 'JetBrains Mono', monospace; position: relative; z-index: 2;
}
footer a { color: var(--cyan); text-decoration: none; }
footer a:hover { text-shadow: 0 0 8px rgba(0,212,255,0.5); }
.footer-brand { font-size: 0.72rem; color: rgba(0,212,255,0.28); margin-bottom: 0.75rem; letter-spacing: 0.12em; }

/* ── BOT ── */
.bot-fab {
  position: fixed; bottom: 2rem; right: 2rem; z-index: 600;
  width: 54px; height: 54px; background: #25D366; color: #fff; border: none; cursor: pointer;
  font-size: 1.3rem; display: flex; align-items: center; justify-content: center;
  box-shadow: 0 0 28px rgba(37,211,102,0.38); transition: transform 0.2s, box-shadow 0.2s;
  clip-path: polygon(8px 0%,100% 0%,calc(100% - 8px) 100%,0% 100%);
}
.bot-fab:hover { transform: scale(1.06); box-shadow: 0 0 50px rgba(37,211,102,0.55); }
.bot-window {
  position: fixed; bottom: 5.5rem; right: 2rem; z-index: 600;
  width: 318px; background: var(--bg2); border: 1px solid var(--brd2);
  box-shadow: 0 20px 60px rgba(0,0,0,0.5); overflow: hidden;
  display: none; flex-direction: column;
}
.bot-window.open { display: flex; }
.bot-window::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, var(--green), var(--cyan)); }
.bot-head { background: #075E54; padding: 1rem 1.25rem; display: flex; align-items: center; justify-content: space-between; }
.bot-head-info { display: flex; align-items: center; gap: 10px; }
.bot-avatar { width: 32px; height: 32px; background: #25D366; display: flex; align-items: center; justify-content: center; font-size: 0.85rem; clip-path: polygon(5px 0%,100% 0%,calc(100% - 5px) 100%,0% 100%); }
.bot-head-text h5 { font-size: 0.875rem; font-weight: 600; margin: 0; color: #fff; }
.bot-head-text small { font-size: 0.7rem; color: rgba(255,255,255,0.6); }
.bot-close { background: none; border: none; color: #fff; cursor: pointer; font-size: 1.1rem; opacity: 0.65; transition: opacity 0.18s; }
.bot-close:hover { opacity: 1; }
.bot-body { padding: 1.25rem; max-height: 300px; overflow-y: auto; }
.bot-msg { background: var(--bg3); border: 1px solid var(--brd); border-left: 2px solid var(--green); padding: 0.75rem 1rem; margin-bottom: 1rem; font-size: 0.84rem; color: var(--text); line-height: 1.65; }
.bot-btns { display: flex; flex-direction: column; gap: 0.45rem; }
.bot-btn { padding: 9px 13px; font-size: 0.8rem; font-weight: 500; background: var(--bg3); border: 1px solid var(--brd2); color: var(--muted2); cursor: pointer; text-align: left; transition: background 0.18s, border-color 0.18s, color 0.18s; font-family: 'Exo 2', sans-serif; }
.bot-btn:hover { background: rgba(0,212,255,0.06); border-color: var(--cyan); color: var(--cyan); }

/* ── REVEAL ── */
.reveal { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease, transform 0.6s ease; }
.reveal.visible { opacity: 1; transform: none; }

/* ── MOBILE ── */
@media (max-width: 1024px) {
  .hero-inner { grid-template-columns: 1fr; }
  .hero-terminal { display: none; }
}
@media (max-width: 900px) {
  .sobre-grid, .contato-grid { grid-template-columns: 1fr; gap: 3rem; }
  .dif-grid, .serv-grid, .planos-grid { grid-template-columns: 1fr 1fr; }
  .saas-grid { grid-template-columns: 1fr 1fr; }
  .form-row { grid-template-columns: 1fr; }
}
@media (max-width: 640px) {
  .nav-links { display: none; flex-direction: column; position: absolute; top: 66px; left: 0; right: 0; background: rgba(3,5,8,0.97); padding: 1rem; border-bottom: 1px solid var(--brd2); }
  .nav-links.active { display: flex; }
  .nav-links li { width: 100%; }
  .nav-links a { display: block; padding: 11px 14px; }
  .nav-toggle { display: block; }
  .dif-grid, .serv-grid, .planos-grid, .saas-grid { grid-template-columns: 1fr; }
  .pilares { grid-template-columns: 1fr; }
  section { padding: 5rem 1.5rem; }
  .hero { padding: 7rem 1.5rem 4rem; }
  .hero-stats { flex-wrap: wrap; }
  .stat-block { border-right: 1px solid var(--brd) !important; }
  .form-card { padding: 1.75rem; }
}
</style>
</head>
<body>
<div class="grid-bg"></div>
<canvas id="particles-canvas"></canvas>

<!-- NAV -->
<nav id="main-nav">
  <div class="nav-inner">
    <a class="logo" href="#">
      <div class="logo-hex">
        <svg viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
          <polygon points="15,2 27,8.5 27,21.5 15,28 3,21.5 3,8.5" fill="none" stroke="#00D4FF" stroke-width="1.4"/>
          <polygon points="15,7 22,11 22,19 15,23 8,19 8,11" fill="rgba(0,212,255,0.1)"/>
          <circle cx="15" cy="15" r="3" fill="#00D4FF"/>
          <line x1="15" y1="7" x2="15" y2="12" stroke="#00D4FF" stroke-width="0.8" opacity="0.5"/>
          <line x1="15" y1="18" x2="15" y2="23" stroke="#00D4FF" stroke-width="0.8" opacity="0.5"/>
          <line x1="8" y1="11" x2="12" y2="13" stroke="#00D4FF" stroke-width="0.8" opacity="0.5"/>
          <line x1="18" y1="17" x2="22" y2="19" stroke="#00D4FF" stroke-width="0.8" opacity="0.5"/>
          <line x1="22" y1="11" x2="18" y2="13" stroke="#00D4FF" stroke-width="0.8" opacity="0.5"/>
          <line x1="12" y1="17" x2="8" y2="19" stroke="#00D4FF" stroke-width="0.8" opacity="0.5"/>
        </svg>
      </div>
      AMS<span class="brand">_</span>SISTEMAS
    </a>
    <button class="nav-toggle" id="navToggle" aria-label="Menu"><i class="bi bi-list"></i></button>
    <ul class="nav-links" id="navLinks">
      <li><a href="#sobre">// sobre</a></li>
      <li><a href="#saas">// sistemas</a></li>
      <li><a href="#servicos">// serviços</a></li>
      <li><a href="#planos">// planos</a></li>
      <li><a href="#contato" class="nav-cta">[ orçamento ]</a></li>
    </ul>
  </div>
</nav>

<!-- HERO -->
<header class="hero">
  <div class="hero-orb1"></div>
  <div class="hero-orb2"></div>
  <div class="hero-inner">
    <div class="hero-left">
      <div class="hero-tag"><span class="hero-dot"></span>SISTEMAS SAAS &amp; INFRAESTRUTURA TI</div>
      <h1>
        Tecnologia que<br>
        <span class="gradient">escala o seu negócio</span>
        de verdade
      </h1>
      <p class="hero-sub">Automatize operações, escale vendas e gerencie sua infraestrutura com sistemas robustos desenvolvidos para crescer com você.</p>
      <div class="hero-btns">
        <a href="#saas" class="btn-primary"><i class="bi bi-grid-1x2-fill"></i> VER SISTEMAS</a>
        <a href="#contato" class="btn-ghost"><i class="bi bi-terminal"></i> SOLICITAR ORÇAMENTO</a>
      </div>
      <div class="hero-stats">
        <div class="stat-block"><div class="stat-num">8<em>+</em></div><div class="stat-label">SISTEMAS SAAS</div></div>
        <div class="stat-block"><div class="stat-num">99<em>%</em></div><div class="stat-label">UPTIME</div></div>
        <div class="stat-block"><div class="stat-num">24<em>h</em></div><div class="stat-label">SUPORTE</div></div>
      </div>
    </div>
    <div class="hero-terminal reveal">
      <div class="term-bar">
        <div class="term-dot td-r"></div><div class="term-dot td-y"></div><div class="term-dot td-g"></div>
        <div class="term-title">ams-sistemas ~ system-monitor</div>
      </div>
      <div class="term-body">
        <span class="tl"><span class="tp">root@ams</span><span class="tc"> ~ $ system-status --all</span></span>
        <span class="tl tc"> </span>
        <span class="tl tcy">[ AMS SISTEMAS v4.2.1 — DASHBOARD ]</span>
        <span class="tl tc"> </span>
        <span class="tl to">Verificando serviços...</span>
        <span class="tl tok">✔  delivery.saas       ONLINE   [99.9% uptime]</span>
        <span class="tl tok">✔  pdv.system          ONLINE   [99.8% uptime]</span>
        <span class="tl tok">✔  crm.medico          ONLINE   [100% uptime]</span>
        <span class="tl tok">✔  infra.monitor       ONLINE   [24/7 active]</span>
        <span class="tl tok">✔  backup.daily        OK       [last: 2h ago]</span>
        <span class="tl tc"> </span>
        <span class="tl to">Verificando segurança...</span>
        <span class="tl tok">✔  ssl.certificates    VALID    [365d]</span>
        <span class="tl tok">✔  firewall.rules      ACTIVE   [256 rules]</span>
        <span class="tl tok">✔  intrusion.detect    ARMED</span>
        <span class="tl tc"> </span>
        <span class="tl tcy">Todos os sistemas operacionais. SLA: 99.9%</span>
        <span class="tl tc"> </span>
        <span class="tl"><span class="tp">root@ams</span><span class="tc"> ~ $ <span class="tcursor"></span></span></span>
      </div>
    </div>
  </div>
</header>

<!-- SOBRE -->
<section id="sobre">
  <div class="container">
    <div class="sobre-grid">
      <div class="reveal">
        <div class="ey"><span></span>QUEM SOMOS</div>
        <h2 class="section-title">Especialistas em tecnologia para negócios</h2>
        <p style="color:var(--muted2);line-height:1.9;margin-bottom:1.25rem;">Somos uma empresa focada em <strong style="color:var(--text)">desenvolvimento de sistemas</strong>, <strong style="color:var(--text)">soluções web</strong> e <strong style="color:var(--text)">infraestrutura de TI</strong>, entregando estabilidade, segurança e crescimento para cada cliente.</p>
        <p style="color:var(--muted);font-size:0.9rem;line-height:1.85;">Atendemos desde a criação de sites e sistemas personalizados até a administração completa de servidores, redes corporativas e suporte técnico contínuo — com documentação, boas práticas e proximidade real.</p>
      </div>
      <div class="reveal">
        <div class="pilares">
          <div class="pilar"><div class="pilar-code">// 01</div><h5>Código escalável</h5><p>Desenvolvimento profissional com boas práticas</p></div>
          <div class="pilar"><div class="pilar-code">// 02</div><h5>Infra segura</h5><p>Servidores monitorados e protegidos</p></div>
          <div class="pilar"><div class="pilar-code">// 03</div><h5>Suporte direto</h5><p>Atendimento próximo e sem burocracia</p></div>
          <div class="pilar"><div class="pilar-code">// 04</div><h5>Sob medida</h5><p>Soluções pensadas para cada negócio</p></div>
          <div class="pilar" style="grid-column:1/-1"><div class="pilar-code">// 05</div><h5>Foco em resultado</h5><p>Tecnologia que funciona de verdade, com continuidade</p></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SAAS -->
<section id="saas">
  <div class="container">
    <div class="saas-top reveal">
      <div><div class="ey"><span></span>PLATAFORMAS</div><h2 class="section-title" style="margin-bottom:0">Sistemas para cada segmento</h2></div>
      <p class="section-sub" style="max-width:320px;margin:0">Prontos para uso, com suporte e atualizações incluídos.</p>
    </div>
    <div class="saas-grid">
      <div class="saas-card featured reveal">
        <div class="card-badge hot">🔥 MAIS PROCURADO</div>
        <h3>Sistema de Delivery</h3>
        <p>Plataforma completa para restaurantes com pedidos online e integração nativa com WhatsApp.</p>
        <ul class="feature-list"><li>Cardápio digital interativo</li><li>Pedido automático via WhatsApp</li><li>Gestão de entregas em tempo real</li><li>Relatórios de vendas detalhados</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing/landing.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
      <div class="saas-card reveal">
        <div class="card-badge">SISTEMA PDV</div>
        <h3>Sistema de Vendas</h3>
        <p>Controle completo de vendas, estoque e financeiro para qualquer tipo de loja.</p>
        <ul class="feature-list"><li>PDV completo e intuitivo</li><li>Controle de estoque</li><li>Relatórios financeiros</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing/pdv.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
      <div class="saas-card reveal">
        <div class="card-badge">SAÚDE</div>
        <h3>CRM Médico</h3>
        <p>Gestão completa para clínicas e consultórios com prontuário digital.</p>
        <ul class="feature-list"><li>Agenda médica online</li><li>Cadastro de pacientes</li><li>Prontuário eletrônico</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing/crm.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
      <div class="saas-card reveal">
        <div class="card-badge">FOOD &amp; BEVERAGE</div>
        <h3>Cafeterias e Padarias</h3>
        <p>Comandas eletrônicas, controle de mesas e integração com delivery.</p>
        <ul class="feature-list"><li>Controle de mesas</li><li>Estoque de insumos</li><li>Relatórios de vendas</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing/coffeehand.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
      <div class="saas-card reveal">
        <div class="card-badge">FOOD &amp; BEVERAGE</div>
        <h3>Açaiteria e Sorveterias</h3>
        <p>Monte seu produto, controle sabores, adicionais, estoque e vendas.</p>
        <ul class="feature-list"><li>Montagem personalizada</li><li>Controle de estoque</li><li>Relatórios detalhados</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing/acaiteria.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
      <div class="saas-card reveal">
        <div class="card-badge">CONSTRUÇÃO</div>
        <h3>Material de Construção</h3>
        <p>Gestão de estoque, vendas, orçamentos, clientes e fornecedores.</p>
        <ul class="feature-list"><li>Controle de estoque</li><li>Emissão de orçamentos</li><li>Clientes e fornecedores</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing/construcao.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
      <div class="saas-card reveal">
        <div class="card-badge">CONDOMÍNIOS</div>
        <h3>Gestão Condominial</h3>
        <p>Administração de condomínios com boletos, reservas e assembleias online.</p>
        <ul class="feature-list"><li>Gestão de moradores</li><li>Emissão de boletos</li><li>Reservas de áreas comuns</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing/condominio.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
      <div class="saas-card reveal">
        <div class="card-badge">AGENDAMENTO</div>
        <h3>Agendamento On-line</h3>
        <p>Agende serviços, consultas ou reservas para qualquer segmento de negócio.</p>
        <ul class="feature-list"><li>Agenda online</li><li>Notificações automáticas</li><li>Gestão de profissionais</li></ul>
        <div class="card-actions"><a href="#contato" class="btn-card btn-card-primary">QUERO ESSE SISTEMA</a><a href="landing.php" class="btn-card btn-card-outline">Ver produto</a></div>
      </div>
    </div>
  </div>
</section>

<!-- DIFERENCIAIS -->
<section id="diferenciais">
  <div class="container">
    <div class="reveal" style="max-width:520px"><div class="ey"><span></span>POR QUE NOS ESCOLHER</div><h2 class="section-title">Construído para durar</h2></div>
    <div class="dif-grid">
      <div class="dif-card reveal"><div class="dif-num">01</div><div class="dif-icon">💻</div><h4>Código Profissional</h4><p>Projetos desenvolvidos com boas práticas, documentação completa e arquitetura escalável para crescer com seu negócio.</p></div>
      <div class="dif-card reveal"><div class="dif-num">02</div><div class="dif-icon">🖥️</div><h4>Infraestrutura Sólida</h4><p>Servidores Windows e Linux configurados para alta disponibilidade, máxima performance e zero interrupções.</p></div>
      <div class="dif-card reveal"><div class="dif-num">03</div><div class="dif-icon">🔒</div><h4>Segurança Total</h4><p>Proteção de dados, backups automáticos, monitoramento contínuo e hardening de servidores para você dormir tranquilo.</p></div>
    </div>
  </div>
</section>

<!-- SERVIÇOS -->
<section id="servicos">
  <div class="container">
    <div class="reveal"><div class="ey"><span></span>SERVIÇOS</div><h2 class="section-title">O que fazemos</h2></div>
    <div class="serv-grid">
      <div class="serv-card reveal"><span class="serv-id">SRV_001</span><h4>Desenvolvimento Web</h4><p>Sites institucionais, landing pages e sistemas web modernos, rápidos e responsivos.</p><span class="serv-arrow"><i class="bi bi-arrow-up-right"></i></span></div>
      <div class="serv-card reveal"><span class="serv-id">SRV_002</span><h4>Sistemas Desktop</h4><p>Desenvolvimento de sistemas desktop sob medida para automação e controle interno.</p><span class="serv-arrow"><i class="bi bi-arrow-up-right"></i></span></div>
      <div class="serv-card reveal"><span class="serv-id">SRV_003</span><h4>Sistemas Web / ERP / CRM</h4><p>Plataformas personalizadas para gestão, relatórios e processos empresariais.</p><span class="serv-arrow"><i class="bi bi-arrow-up-right"></i></span></div>
      <div class="serv-card reveal"><span class="serv-id">SRV_004</span><h4>Administração de Servidores</h4><p>Gerenciamento de servidores Windows e Linux, VPS, cloud, backups e segurança.</p><span class="serv-arrow"><i class="bi bi-arrow-up-right"></i></span></div>
      <div class="serv-card reveal"><span class="serv-id">SRV_005</span><h4>Infraestrutura de TI</h4><p>Redes, monitoramento, suporte técnico e organização do ambiente corporativo.</p><span class="serv-arrow"><i class="bi bi-arrow-up-right"></i></span></div>
      <div class="serv-card reveal"><span class="serv-id">SRV_006</span><h4>Suporte e Manutenção</h4><p>Acompanhamento contínuo, melhorias, atualizações e suporte técnico especializado.</p><span class="serv-arrow"><i class="bi bi-arrow-up-right"></i></span></div>
    </div>
  </div>
</section>

<!-- PLANOS -->
<section id="planos">
  <div class="container">
    <div class="reveal" style="max-width:520px"><div class="ey"><span></span>PREÇOS</div><h2 class="section-title">Plano certo para cada estágio</h2><p class="section-sub">Todos os planos podem ser personalizados. Sem taxas ocultas.</p></div>
    <div class="planos-grid">
      <div class="plano-card reveal">
        <div class="plano-corner"></div>
        <div class="plano-name">TIER_01</div><div class="plano-title">Start</div>
        <div class="plano-desc">Ideal para pequenos negócios</div>
        <div class="plano-div"></div>
        <ul class="plano-itens">
          <li><span class="chk"><i class="bi bi-check2"></i></span>Site institucional</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Manutenção básica</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Correções simples</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Backup mensal</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Suporte via WhatsApp</li>
        </ul>
        <a href="#contato" class="btn-plano">FALAR COM ESPECIALISTA</a>
      </div>
      <div class="plano-card destaque reveal">
        <div class="plano-corner"></div>
        <div class="plano-tag">MAIS POPULAR</div>
        <div class="plano-name">TIER_02</div><div class="plano-title">Pro</div>
        <div class="plano-desc">Para empresas em crescimento</div>
        <div class="plano-div"></div>
        <ul class="plano-itens">
          <li><span class="chk"><i class="bi bi-check2"></i></span>Site ou sistema web</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Manutenção contínua</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Suporte prioritário</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Monitoramento básico</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Backup semanal</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Atualizações de segurança</li>
        </ul>
        <a href="#contato" class="btn-plano destaque">FALAR COM ESPECIALISTA</a>
      </div>
      <div class="plano-card reveal">
        <div class="plano-corner"></div>
        <div class="plano-name">TIER_03</div><div class="plano-title">Enterprise</div>
        <div class="plano-desc">Infraestrutura e TI completa</div>
        <div class="plano-div"></div>
        <ul class="plano-itens">
          <li><span class="chk"><i class="bi bi-check2"></i></span>Administração de servidores</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Windows e Linux</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Monitoramento 24/7</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Backups diários</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Segurança e hardening</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>Suporte técnico dedicado</li>
          <li><span class="chk"><i class="bi bi-check2"></i></span>SLA empresarial</li>
        </ul>
        <a href="#contato" class="btn-plano">FALAR COM ESPECIALISTA</a>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cta-band reveal">
  <div class="cta-inner">
    <h2>Pronto para levar sua empresa<br>ao <em>próximo nível</em>?</h2>
    <p>Fale com nossos especialistas e receba um orçamento personalizado em até 24h.</p>
    <a href="#contato" class="btn-primary" style="display:inline-flex;font-size:0.95rem;padding:14px 36px"><i class="bi bi-arrow-right-circle-fill"></i>SOLICITAR ORÇAMENTO GRÁTIS</a>
  </div>
</div>

<!-- CONTATO -->
<section id="contato">
  <div class="container">
    <div class="contato-grid">
      <div class="reveal">
        <div class="ey"><span></span>CONTATO</div>
        <h2 class="section-title">Vamos conversar sobre seu projeto</h2>
        <p>Preencha o formulário e entraremos em contato via WhatsApp em instantes. Sem compromisso.</p>
        <div class="ci-item"><div class="ci-ico">⚡</div><div><h5>Resposta rápida</h5><p>Retorno em até 30 minutos via WhatsApp</p></div></div>
        <div class="ci-item"><div class="ci-ico">🎯</div><div><h5>Diagnóstico gratuito</h5><p>Analisamos sua necessidade sem custo</p></div></div>
        <div class="ci-item"><div class="ci-ico">🔧</div><div><h5>Solução sob medida</h5><p>Cada proposta é personalizada para você</p></div></div>
      </div>
      <div class="reveal">
        <div class="form-card">
          <form id="whatsappForm">
            <div class="form-row">
              <div class="form-group"><label for="nome">NOME</label><input id="nome" name="nome" class="form-control" placeholder="Seu nome completo" required></div>
              <div class="form-group"><label for="email">E-MAIL</label><input id="email" name="email" type="email" class="form-control" placeholder="seu@email.com" required></div>
            </div>
            <div class="form-group">
              <label for="servico">SERVIÇO DE INTERESSE</label>
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
            <div class="form-group"><label for="mensagem">MENSAGEM</label><textarea id="mensagem" class="form-control" rows="4" placeholder="Descreva brevemente sua necessidade..." required></textarea></div>
            <button type="submit" class="btn-submit"><i class="bi bi-whatsapp"></i>ENVIAR VIA WHATSAPP</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-brand">AMS_SISTEMAS // TECH_DIVISION // v4.2.1</div>
  <p style="margin-bottom:0.5rem">© 2026 AMS Sistemas &bull; Todos os direitos reservados</p>
  <a href="politica.html">Política de Privacidade</a>
</footer>

<!-- BOT -->
<div class="bot-window" id="botWindow">
  <div class="bot-head">
    <div class="bot-head-info">
      <div class="bot-avatar">🤖</div>
      <div class="bot-head-text"><h5>Assistente AMS</h5><small>Online agora</small></div>
    </div>
    <button class="bot-close" id="botClose">✕</button>
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
<button class="bot-fab" id="botOpen" aria-label="WhatsApp"><i class="bi bi-whatsapp"></i></button>

<script>
  window.GOOGLE_ADS_SEND_TO = '<?= $config['google_ads_id'] ?>/<?= $config['gtag_conversion_label'] ?>';

  document.getElementById('navToggle').addEventListener('click', () => document.getElementById('navLinks').classList.toggle('active'));
  document.querySelectorAll('#navLinks a').forEach(a => a.addEventListener('click', () => document.getElementById('navLinks').classList.remove('active')));
  window.addEventListener('scroll', () => {
    document.getElementById('main-nav').style.background = window.scrollY > 40 ? 'rgba(3,5,8,0.97)' : 'rgba(3,5,8,0.82)';
  });

  const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if(e.isIntersecting){ e.target.classList.add('visible'); obs.unobserve(e.target); } });
  }, { threshold: 0.07 });
  document.querySelectorAll('.reveal').forEach(el => obs.observe(el));

  // Particles
  (function(){
    const canvas = document.getElementById('particles-canvas');
    const ctx = canvas.getContext('2d');
    let W, H;
    function resize(){ W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
    resize(); window.addEventListener('resize', resize);
    function rand(a,b){ return Math.random()*(b-a)+a; }
    const COLORS = ['#00D4FF','#00FF88','#0A84FF'];
    class P {
      constructor(){ this.reset(); }
      reset(){ this.x=rand(0,W); this.y=rand(0,H); this.vx=rand(-0.12,0.12); this.vy=rand(-0.12,0.12); this.r=rand(1,2.2); this.a=rand(0.3,0.75); this.c=COLORS[Math.floor(Math.random()*3)]; }
      tick(){ this.x+=this.vx; this.y+=this.vy; if(this.x<0||this.x>W||this.y<0||this.y>H) this.reset(); }
      draw(){ ctx.save(); ctx.globalAlpha=this.a; ctx.fillStyle=this.c; ctx.shadowColor=this.c; ctx.shadowBlur=7; ctx.beginPath(); ctx.arc(this.x,this.y,this.r,0,Math.PI*2); ctx.fill(); ctx.restore(); }
    }
    const pts = Array.from({length:75}, ()=>new P());
    function frame(){
      ctx.clearRect(0,0,W,H);
      for(let i=0;i<pts.length;i++){
        pts[i].tick(); pts[i].draw();
        for(let j=i+1;j<pts.length;j++){
          const dx=pts[i].x-pts[j].x, dy=pts[i].y-pts[j].y, d=Math.sqrt(dx*dx+dy*dy);
          if(d<110){ ctx.save(); ctx.globalAlpha=(1-d/110)*0.13; ctx.strokeStyle='#00D4FF'; ctx.lineWidth=0.5; ctx.beginPath(); ctx.moveTo(pts[i].x,pts[i].y); ctx.lineTo(pts[j].x,pts[j].y); ctx.stroke(); ctx.restore(); }
        }
      }
      requestAnimationFrame(frame);
    }
    frame();
  })();

  document.getElementById('whatsappForm').addEventListener('submit', function(e){
    e.preventDefault();
    const nome=document.getElementById('nome').value, email=document.getElementById('email').value;
    const servico=document.getElementById('servico').value, mensagem=document.getElementById('mensagem').value;
    const text=encodeURIComponent(`Olá! Meu nome é ${nome}.\nE-mail: ${email}\nServiço: ${servico}\n\n${mensagem}`);
    if(typeof gtag!=='undefined'&&window.GOOGLE_ADS_SEND_TO) gtag('event','conversion',{send_to:window.GOOGLE_ADS_SEND_TO});
    window.open(`https://wa.me/5521000000000?text=${text}`,'_blank');
  });

  const botOpen=document.getElementById('botOpen'), botClose=document.getElementById('botClose');
  const botWindow=document.getElementById('botWindow'), botBody=document.getElementById('botBody');
  botOpen.addEventListener('click',()=>botWindow.classList.toggle('open'));
  botClose.addEventListener('click',()=>botWindow.classList.remove('open'));
  botBody.querySelectorAll('.bot-btn').forEach(btn=>{
    btn.addEventListener('click',function(){
      const val=this.dataset.value;
      botBody.innerHTML=`<div class="bot-msg">Ótimo! Você quer saber sobre <strong>${val}</strong>.<br><br>Clique abaixo para continuar no WhatsApp 👇</div><div class="bot-btns"><button class="bot-btn" onclick="window.open('https://wa.me/5521000000000?text=${encodeURIComponent('Olá! Tenho interesse em: '+val)}','_blank')">Continuar no WhatsApp ↗</button></div>`;
    });
  });
</script>
</body>
</html>