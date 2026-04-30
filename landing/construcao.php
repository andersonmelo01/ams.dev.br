<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Construx — Sistema de Gestão para Lojas de Material de Construção</title>
<link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800;900&family=Barlow:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --steel-dark:  #0D1A0F;
    --steel-deep:  #152218;
    --green:       #1A6B2E;
    --green-mid:   #2A8C42;
    --green-light: #3AAD5A;
    --lime:        #7ED348;
    --cream:       #F2F5EF;
    --foam:        #F8FAF6;
    --white:       #FFFFFF;
    --text:        #0D1A0F;
    --muted:       #4A6B52;
    --orange:      #E07020;
    --yellow:      #F5C030;
    --rust:        #B84020;
    --concrete:    #C8D0C2;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }
  body {
    font-family: 'Barlow', sans-serif;
    background: var(--foam);
    color: var(--text);
    overflow-x: hidden;
  }

  /* grain */
  body::before {
    content: '';
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
    opacity: 0.5;
  }

  /* ─── NAV ─── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 6vw;
    background: rgba(13,26,15,0.97);
    backdrop-filter: blur(16px);
    border-bottom: 1px solid rgba(58,173,90,0.15);
    transition: padding 0.3s;
  }
  .nav-logo {
    display: flex; align-items: center; gap: 11px;
    font-family: 'Barlow Condensed', sans-serif;
    font-size: 1.7rem; font-weight: 900; color: var(--foam);
    letter-spacing: 1px; text-transform: uppercase;
  }
  .nav-logo .accent { color: var(--lime); }
  .logo-icon {
    width: 36px; height: 36px; background: var(--green);
    border-radius: 8px; display: grid; place-items: center; font-size: 1.1rem;
  }
  .nav-links { display: flex; gap: 30px; list-style: none; }
  .nav-links a {
    font-size: 0.88rem; color: rgba(248,250,246,0.6);
    text-decoration: none; font-weight: 600; transition: color 0.2s;
    letter-spacing: 0.5px; text-transform: uppercase;
  }
  .nav-links a:hover { color: var(--lime); }
  .nav-cta {
    background: var(--green); color: var(--white);
    border: none; padding: 10px 22px; border-radius: 6px;
    font-family: 'Barlow', sans-serif; font-weight: 700; font-size: 0.85rem;
    cursor: pointer; transition: all 0.2s; letter-spacing: 0.3px; text-transform: uppercase;
  }
  .nav-cta:hover { background: var(--green-light); transform: scale(1.03); }

  /* ─── HERO ─── */
  .hero {
    min-height: 100vh;
    background:
      radial-gradient(ellipse 70% 80% at 75% 40%, rgba(42,140,66,0.22) 0%, transparent 65%),
      radial-gradient(ellipse 50% 50% at 10% 80%, rgba(26,107,46,0.35) 0%, transparent 60%),
      linear-gradient(160deg, var(--steel-dark) 0%, var(--steel-deep) 55%, #080F09 100%);
    display: flex; align-items: center;
    padding: 130px 6vw 80px;
    position: relative; overflow: hidden;
  }

  /* diagonal stripe texture */
  .hero::after {
    content: '';
    position: absolute; inset: 0; pointer-events: none;
    background-image: repeating-linear-gradient(
      -55deg,
      transparent,
      transparent 30px,
      rgba(58,173,90,0.025) 30px,
      rgba(58,173,90,0.025) 31px
    );
  }

  .hero-ring {
    position: absolute; border-radius: 50%;
    border: 1px solid rgba(58,173,90,0.1); pointer-events: none;
  }
  .ring1 { width: 700px; height: 700px; right: -250px; top: -250px; }
  .ring2 { width: 450px; height: 450px; right: -100px; top: -50px; border-color: rgba(58,173,90,0.06); }
  .ring3 { width: 200px; height: 200px; left: 5%; bottom: 10%; border-color: rgba(58,173,90,0.08); }

  .steam-wrap { position: absolute; right: 8vw; top: 0; bottom: 0; width: 420px; display: flex; align-items: center; z-index: 2; }
  .pos-mockup {
    background: rgba(248,250,246,0.05);
    border: 1px solid rgba(58,173,90,0.2);
    border-radius: 16px; padding: 26px;
    backdrop-filter: blur(20px);
    box-shadow: 0 40px 80px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.06);
    width: 100%;
    animation: floatUp 4s ease-in-out infinite;
  }
  @keyframes floatUp { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }

  .pos-topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
  .pos-brand { font-family: 'Barlow Condensed', sans-serif; font-weight: 800; font-size: 1.1rem; color: var(--lime); letter-spacing: 1px; text-transform: uppercase; }
  .pos-time { font-size: 0.75rem; color: rgba(248,250,246,0.4); }

  .pos-order-items { display: flex; flex-direction: column; gap: 8px; margin-bottom: 18px; }
  .pos-item {
    display: flex; align-items: center; justify-content: space-between;
    background: rgba(255,255,255,0.04); border-radius: 8px; padding: 10px 14px;
    border: 1px solid rgba(58,173,90,0.1);
  }
  .pos-item-left { display: flex; align-items: center; gap: 10px; }
  .pos-item-emoji { font-size: 1rem; }
  .pos-item-name { font-size: 0.78rem; color: rgba(248,250,246,0.85); font-weight: 600; }
  .pos-item-qty { font-size: 0.65rem; color: rgba(248,250,246,0.4); }
  .pos-item-price { font-size: 0.8rem; font-weight: 700; color: var(--lime); font-family: 'Barlow Condensed', sans-serif; }

  .pos-divider { height: 1px; background: rgba(58,173,90,0.15); margin: 14px 0; }
  .pos-total { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
  .pos-total-label { font-size: 0.8rem; color: rgba(248,250,246,0.5); font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px; }
  .pos-total-val { font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 1.6rem; color: var(--foam); }

  .pos-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
  .pos-btn {
    padding: 10px; border-radius: 8px; border: none; cursor: pointer;
    font-weight: 700; font-size: 0.75rem; transition: all 0.2s; text-transform: uppercase; letter-spacing: 0.5px;
  }
  .pos-btn-pix { background: #1B7A2A; color: white; }
  .pos-btn-nfc { background: var(--orange); color: white; }
  .pos-btn:hover { filter: brightness(1.15); }

  .pos-stats { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px; margin-top: 14px; }
  .pos-stat { background: rgba(255,255,255,0.03); border-radius: 6px; padding: 10px; text-align: center; border: 1px solid rgba(58,173,90,0.08); }
  .pos-stat-val { font-family: 'Barlow Condensed', sans-serif; font-weight: 700; font-size: 1rem; color: var(--lime); }
  .pos-stat-lbl { font-size: 0.6rem; color: rgba(248,250,246,0.4); margin-top: 2px; text-transform: uppercase; letter-spacing: 0.3px; }

  /* hero text */
  .hero-content { position: relative; z-index: 2; max-width: 580px; }
  .hero-eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(42,140,66,0.2); border: 1px solid rgba(58,173,90,0.3);
    padding: 6px 16px; border-radius: 4px; margin-bottom: 28px;
    font-size: 0.75rem; font-weight: 700; color: var(--lime); letter-spacing: 2px; text-transform: uppercase;
    animation: fadeUp 0.6s ease both;
  }
  .eyebrow-dot { width: 6px; height: 6px; background: var(--lime); border-radius: 50%; animation: pulse 2s infinite; }
  @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }

  h1 {
    font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
    font-size: clamp(3rem, 5.5vw, 5rem); line-height: 0.96;
    color: var(--foam); margin-bottom: 24px; letter-spacing: 1px; text-transform: uppercase;
    animation: fadeUp 0.6s 0.1s ease both;
  }
  h1 em { font-style: normal; color: var(--lime); }

  .hero-sub {
    font-size: 1.08rem; line-height: 1.75; color: rgba(248,250,246,0.6);
    margin-bottom: 40px; max-width: 480px;
    animation: fadeUp 0.6s 0.2s ease both;
  }
  .hero-actions {
    display: flex; gap: 14px; flex-wrap: wrap;
    animation: fadeUp 0.6s 0.3s ease both;
  }
  .btn-primary {
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: var(--white); padding: 15px 34px; border-radius: 6px; border: none;
    font-family: 'Barlow', sans-serif; font-weight: 800; font-size: 0.95rem;
    cursor: pointer; transition: all 0.25s; display: flex; align-items: center; gap: 8px;
    box-shadow: 0 10px 30px rgba(42,140,66,0.4); text-transform: uppercase; letter-spacing: 0.5px;
  }
  .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(42,140,66,0.5); filter: brightness(1.1); }
  .btn-outline {
    background: transparent; color: var(--foam);
    padding: 15px 30px; border-radius: 6px; border: 1.5px solid rgba(248,250,246,0.2);
    font-family: 'Barlow', sans-serif; font-weight: 700; font-size: 0.95rem;
    cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 8px;
    text-transform: uppercase; letter-spacing: 0.5px;
  }
  .btn-outline:hover { border-color: var(--lime); color: var(--lime); }

  .hero-proof {
    display: flex; gap: 36px; margin-top: 56px; flex-wrap: wrap;
    animation: fadeUp 0.6s 0.4s ease both;
  }
  .proof-item { display: flex; flex-direction: column; }
  .proof-num { font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 2.2rem; color: var(--foam); line-height: 1; }
  .proof-label { font-size: 0.78rem; color: rgba(248,250,246,0.45); margin-top: 4px; }
  .proof-sep { width: 1px; background: rgba(58,173,90,0.2); align-self: stretch; }

  @keyframes fadeUp { from{opacity:0;transform:translateY(22px)} to{opacity:1;transform:translateY(0)} }

  /* ─── STRIP ─── */
  .strip {
    background: var(--green); padding: 14px 0; overflow: hidden;
    border-top: 1px solid rgba(0,0,0,0.15); border-bottom: 1px solid rgba(0,0,0,0.15);
  }
  .strip-inner { display: flex; gap: 56px; animation: ticker 22s linear infinite; white-space: nowrap; }
  .strip-item { display: flex; align-items: center; gap: 10px; font-size: 0.8rem; font-weight: 700; color: rgba(255,255,255,0.9); letter-spacing: 1.5px; text-transform: uppercase; }
  .strip-item span { opacity: 0.5; }
  @keyframes ticker { from{transform:translateX(0)} to{transform:translateX(-50%)} }

  /* ─── SECTIONS ─── */
  .section { padding: 96px 6vw; position: relative; }
  .section-tag {
    display: inline-block; font-size: 0.72rem; font-weight: 800; letter-spacing: 3px;
    text-transform: uppercase; color: var(--green-mid); margin-bottom: 12px;
    border-left: 3px solid var(--lime); padding-left: 10px;
  }
  .section-title {
    font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
    font-size: clamp(2rem, 3.8vw, 3.2rem); letter-spacing: 0.5px; text-transform: uppercase;
    color: var(--steel-dark); line-height: 1.05; margin-bottom: 16px;
  }
  .section-sub { font-size: 1.02rem; color: var(--muted); max-width: 500px; line-height: 1.75; }

  /* ─── FEATURES ─── */
  .features { background: var(--foam); }
  .feat-layout { display: grid; grid-template-columns: 1fr 1.1fr; gap: 80px; align-items: center; margin-top: 64px; }
  .feat-visual {
    background: linear-gradient(145deg, var(--steel-deep), var(--steel-dark));
    border-radius: 16px; padding: 36px; position: relative; overflow: hidden;
    box-shadow: 0 30px 70px rgba(13,26,15,0.3);
  }
  .feat-visual::before {
    content: ''; position: absolute; inset: 0; border-radius: 16px;
    background: radial-gradient(ellipse 70% 60% at 80% 20%, rgba(42,140,66,0.25), transparent);
  }
  .feat-visual::after {
    content: ''; position: absolute; inset: 0; border-radius: 16px;
    background-image: repeating-linear-gradient(-55deg, transparent, transparent 20px, rgba(58,173,90,0.02) 20px, rgba(58,173,90,0.02) 21px);
    pointer-events: none;
  }
  .feat-visual > * { position: relative; z-index: 1; }

  .menu-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .menu-item {
    background: rgba(255,255,255,0.05); border-radius: 10px; padding: 16px;
    border: 1px solid rgba(58,173,90,0.12); transition: all 0.2s; cursor: pointer;
  }
  .menu-item:hover { background: rgba(58,173,90,0.1); border-color: rgba(58,173,90,0.3); }
  .menu-emoji { font-size: 1.6rem; margin-bottom: 8px; }
  .menu-name { font-size: 0.75rem; font-weight: 700; color: var(--foam); margin-bottom: 4px; text-transform: uppercase; letter-spacing: 0.3px; }
  .menu-price { font-family: 'Barlow Condensed', sans-serif; font-weight: 700; font-size: 1rem; color: var(--lime); }
  .menu-qty {
    display: flex; align-items: center; gap: 8px; margin-top: 8px;
    background: rgba(0,0,0,0.2); border-radius: 6px; padding: 4px 8px; width: fit-content;
  }
  .qty-btn { background: rgba(58,173,90,0.3); border: none; color: var(--lime); width: 18px; height: 18px; border-radius: 3px; cursor: pointer; font-size: 0.8rem; font-weight: 700; display: grid; place-items: center; }
  .qty-num { font-size: 0.75rem; font-weight: 700; color: var(--foam); min-width: 14px; text-align: center; }

  .order-summary {
    background: rgba(255,255,255,0.04); border-radius: 10px; padding: 18px;
    border: 1px solid rgba(58,173,90,0.1); margin-top: 14px;
  }
  .order-row { display: flex; justify-content: space-between; align-items: center; padding: 7px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
  .order-row:last-child { border: none; }
  .order-row-name { font-size: 0.78rem; color: rgba(248,250,246,0.7); }
  .order-row-val { font-size: 0.78rem; font-weight: 700; color: var(--lime); }
  .order-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 12px; margin-top: 4px; border-top: 1px solid rgba(58,173,90,0.2); }
  .order-total-lbl { font-size: 0.85rem; font-weight: 800; color: var(--foam); text-transform: uppercase; }
  .order-total-val { font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 1.4rem; color: var(--lime); }

  .feat-list { display: flex; flex-direction: column; gap: 28px; }
  .feat-item { display: flex; gap: 18px; align-items: flex-start; }
  .feat-num {
    width: 44px; height: 44px; border-radius: 8px; flex-shrink: 0;
    background: linear-gradient(135deg, var(--green-mid), var(--green));
    display: grid; place-items: center; font-size: 1.2rem;
  }
  .feat-title { font-family: 'Barlow Condensed', sans-serif; font-weight: 800; font-size: 1.15rem; color: var(--steel-dark); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px; }
  .feat-desc { font-size: 0.88rem; color: var(--muted); line-height: 1.65; }

  /* ─── MODULES ─── */
  .modules { background: var(--cream); }
  .modules-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 22px; margin-top: 60px; }
  .module-card {
    background: var(--white); border-radius: 12px; padding: 30px;
    border: 1.5px solid rgba(13,26,15,0.07);
    transition: all 0.25s; position: relative; overflow: hidden;
  }
  .module-card::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--green), var(--lime));
    transform: scaleX(0); transition: transform 0.3s; transform-origin: left;
  }
  .module-card:hover { transform: translateY(-5px); box-shadow: 0 16px 45px rgba(13,26,15,0.1); }
  .module-card:hover::after { transform: scaleX(1); }
  .module-icon {
    width: 50px; height: 50px; border-radius: 10px; margin-bottom: 18px;
    background: linear-gradient(135deg, var(--green-mid), var(--green));
    display: grid; place-items: center; font-size: 1.3rem;
  }
  .module-title { font-family: 'Barlow Condensed', sans-serif; font-weight: 800; font-size: 1.1rem; color: var(--steel-dark); margin-bottom: 8px; text-transform: uppercase; letter-spacing: 0.5px; }
  .module-text { font-size: 0.87rem; color: var(--muted); line-height: 1.65; }
  .module-pills { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 16px; }
  .pill { padding: 3px 10px; background: rgba(42,140,66,0.08); color: var(--green-mid); border-radius: 4px; font-size: 0.7rem; font-weight: 700; border: 1px solid rgba(42,140,66,0.15); text-transform: uppercase; letter-spacing: 0.5px; }

  /* ─── NUMBERS ─── */
  .numbers {
    background: linear-gradient(150deg, var(--steel-dark) 0%, var(--steel-deep) 100%);
    padding: 80px 6vw; position: relative; overflow: hidden;
  }
  .numbers::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse 70% 100% at 80% 50%, rgba(42,140,66,0.15), transparent);
  }
  .numbers::after {
    content: ''; position: absolute; inset: 0;
    background-image: repeating-linear-gradient(-55deg, transparent, transparent 30px, rgba(58,173,90,0.02) 30px, rgba(58,173,90,0.02) 31px);
  }
  .numbers-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1px; position: relative; z-index: 1; }
  .number-item { padding: 40px 30px; text-align: center; border-right: 1px solid rgba(58,173,90,0.1); }
  .number-item:last-child { border: none; }
  .number-val { font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 3.2rem; color: var(--lime); line-height: 1; margin-bottom: 8px; }
  .number-label { font-size: 0.85rem; color: rgba(248,250,246,0.5); font-weight: 500; }

  /* ─── TESTIMONIALS ─── */
  .testimonials { background: var(--foam); }
  .testi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 22px; margin-top: 56px; }
  .testi-card {
    background: var(--white); border-radius: 12px; padding: 32px;
    border: 1.5px solid rgba(13,26,15,0.07); transition: transform 0.2s;
  }
  .testi-card:hover { transform: translateY(-4px); }
  .testi-stars { color: var(--yellow); font-size: 0.9rem; letter-spacing: 3px; margin-bottom: 16px; }
  .testi-quote { font-size: 2rem; color: var(--green-mid); line-height: 1; margin-bottom: 10px; font-family: 'Barlow Condensed', sans-serif; font-weight: 900; }
  .testi-text { font-size: 0.92rem; color: #1A3A20; line-height: 1.75; margin-bottom: 24px; }
  .testi-author { display: flex; align-items: center; gap: 13px; }
  .testi-av {
    width: 44px; height: 44px; border-radius: 8px; flex-shrink: 0;
    background: linear-gradient(135deg, var(--green-mid), var(--green));
    display: grid; place-items: center; font-weight: 800; font-size: 0.9rem; color: var(--white);
    font-family: 'Barlow Condensed', sans-serif;
  }
  .testi-name { font-family: 'Barlow Condensed', sans-serif; font-weight: 700; font-size: 1rem; color: var(--steel-dark); text-transform: uppercase; letter-spacing: 0.5px; }
  .testi-role { font-size: 0.77rem; color: var(--muted); margin-top: 2px; }

  /* ─── PLANS ─── */
  .plans { background: var(--cream); }
  .plans-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 22px; margin-top: 56px; max-width: 960px; margin-left: auto; margin-right: auto; }
  .plan {
    background: var(--white); border-radius: 16px; padding: 38px 32px;
    border: 1.5px solid rgba(13,26,15,0.08); position: relative; transition: transform 0.25s;
  }
  .plan:hover { transform: translateY(-5px); }
  .plan.hot {
    background: var(--steel-dark); border-color: var(--green-mid);
    box-shadow: 0 30px 70px rgba(13,26,15,0.3);
    transform: scale(1.04);
  }
  .plan.hot:hover { transform: scale(1.04) translateY(-5px); }
  .hot-badge {
    position: absolute; top: -13px; left: 50%; transform: translateX(-50%);
    background: linear-gradient(135deg, var(--green-mid), var(--lime));
    color: var(--steel-dark); font-size: 0.7rem; font-weight: 800; letter-spacing: 1px;
    padding: 5px 18px; border-radius: 4px; white-space: nowrap; text-transform: uppercase;
  }
  .plan-tier { font-size: 0.72rem; font-weight: 800; letter-spacing: 2.5px; text-transform: uppercase; color: var(--green-mid); margin-bottom: 12px; }
  .plan.hot .plan-tier { color: var(--lime); }
  .plan-price { font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 2.8rem; color: var(--steel-dark); line-height: 1; margin-bottom: 5px; }
  .plan-price sub { font-size: 1rem; font-weight: 400; color: var(--muted); vertical-align: baseline; }
  .plan.hot .plan-price { color: var(--foam); }
  .plan.hot .plan-price sub { color: rgba(248,250,246,0.5); }
  .plan-desc { font-size: 0.82rem; color: var(--muted); margin-bottom: 26px; }
  .plan.hot .plan-desc { color: rgba(248,250,246,0.5); }
  .plan-hr { height: 1px; background: rgba(13,26,15,0.08); margin-bottom: 22px; }
  .plan.hot .plan-hr { background: rgba(58,173,90,0.2); }
  .plan-feats { list-style: none; display: flex; flex-direction: column; gap: 11px; margin-bottom: 30px; }
  .plan-feats li { display: flex; align-items: center; gap: 9px; font-size: 0.87rem; color: #1A3A20; }
  .plan.hot .plan-feats li { color: rgba(248,250,246,0.8); }
  .check-icon { color: var(--green-mid); font-weight: 700; font-size: 0.85rem; }
  .plan-btn {
    width: 100%; padding: 13px; border-radius: 8px;
    border: 2px solid var(--green-mid); background: transparent;
    color: var(--green-mid); font-family: 'Barlow', sans-serif;
    font-weight: 800; font-size: 0.9rem; cursor: pointer; transition: all 0.2s;
    text-transform: uppercase; letter-spacing: 0.5px;
  }
  .plan-btn:hover { background: var(--green-mid); color: var(--white); }
  .plan.hot .plan-btn { background: var(--green-mid); color: var(--white); border-color: var(--green-mid); box-shadow: 0 8px 25px rgba(42,140,66,0.4); }
  .plan.hot .plan-btn:hover { background: var(--green-light); border-color: var(--green-light); }

  /* ─── CTA ─── */
  .cta-section {
    background: linear-gradient(150deg, var(--steel-deep) 0%, var(--steel-dark) 60%, #040A05 100%);
    padding: 100px 6vw; text-align: center; position: relative; overflow: hidden;
  }
  .cta-section::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse 60% 70% at 50% 50%, rgba(42,140,66,0.2), transparent);
  }
  .cta-section::after {
    content: ''; position: absolute; inset: 0;
    background-image: repeating-linear-gradient(-55deg, transparent, transparent 30px, rgba(58,173,90,0.02) 30px, rgba(58,173,90,0.02) 31px);
  }
  .cta-title {
    font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
    font-size: clamp(2.2rem, 4.5vw, 4rem); color: var(--foam);
    letter-spacing: 1px; line-height: 1; margin-bottom: 16px; position: relative;
    text-transform: uppercase;
  }
  .cta-title em { font-style: normal; color: var(--lime); }
  .cta-sub { font-size: 1.05rem; color: rgba(248,250,246,0.6); max-width: 500px; margin: 0 auto 40px; line-height: 1.75; position: relative; }
  .cta-form { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; max-width: 500px; margin: 0 auto; position: relative; }
  .cta-input {
    flex: 1; min-width: 200px; padding: 14px 22px; border-radius: 6px;
    border: 1.5px solid rgba(58,173,90,0.2); background: rgba(248,250,246,0.07);
    color: var(--foam); font-family: 'Barlow', sans-serif; font-size: 0.93rem;
    outline: none; backdrop-filter: blur(10px); transition: border 0.2s;
  }
  .cta-input::placeholder { color: rgba(248,250,246,0.35); }
  .cta-input:focus { border-color: var(--lime); }
  .cta-note { margin-top: 18px; font-size: 0.78rem; color: rgba(248,250,246,0.35); position: relative; }

  /* ─── CONTACT ─── */
  .contact { background: var(--cream); padding: 88px 6vw; }
  .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; max-width: 960px; margin: 0 auto; }
  .contact h2 { font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 2.4rem; color: var(--steel-dark); margin-bottom: 14px; letter-spacing: 0.5px; text-transform: uppercase; }
  .contact-desc { color: var(--muted); line-height: 1.75; margin-bottom: 34px; }
  .contact-items { display: flex; flex-direction: column; gap: 16px; }
  .contact-row { display: flex; align-items: center; gap: 14px; }
  .c-icon {
    width: 46px; height: 46px; border-radius: 10px; flex-shrink: 0;
    background: linear-gradient(135deg, var(--green-mid), var(--green));
    display: grid; place-items: center; font-size: 1.1rem;
  }
  .c-detail small { display: block; font-size: 0.75rem; color: var(--muted); margin-bottom: 2px; text-transform: uppercase; letter-spacing: 0.5px; }
  .c-detail span { font-weight: 700; color: var(--steel-dark); font-size: 0.9rem; }
  .contact-form-area {
    display: flex; flex-direction: column; gap: 0;
    background: #fff; border-radius: 14px;
    box-shadow: 0 4px 32px rgba(13,26,15,0.07);
    padding: 32px 24px 18px 24px; margin-top: 18px;
    max-width: 420px; width: 100%;
    border-top: 4px solid var(--green);
  }
  .contact-form-area form { display: flex; flex-direction: column; gap: 16px; }
  .cf {
    padding: 14px 18px; border-radius: 8px;
    border: 1.5px solid rgba(13,26,15,0.13);
    background: #F4F8F4; font-family: 'Barlow', sans-serif;
    font-size: 0.97rem; color: var(--steel-dark); outline: none;
    transition: border 0.2s, box-shadow 0.2s; margin-bottom: 2px;
  }
  .cf:focus { border-color: var(--green-mid); box-shadow: 0 0 0 2px rgba(42,140,66,0.12); }
  .cf::placeholder { color: #6A8C70; }
  select.cf { color: #2A5A32; background: #F4F8F4; }
  .cf-submit {
    margin-top: 10px; padding: 15px;
    background: linear-gradient(135deg, var(--green), var(--green-light));
    color: var(--white); border: none; border-radius: 8px;
    font-family: 'Barlow', sans-serif; font-weight: 800; font-size: 1.05rem;
    cursor: pointer; transition: all 0.2s;
    box-shadow: 0 8px 25px rgba(42,140,66,0.2); letter-spacing: 0.5px;
    text-transform: uppercase;
  }
  .cf-submit:hover { filter: brightness(1.08); transform: translateY(-1px) scale(1.02); }
  .cf-note { font-size: 0.78rem; color: var(--muted); text-align: center; margin-top: 8px; }
  @media (max-width: 700px) {
    .contact-form-area { max-width: 100%; padding: 18px 5vw 12px 5vw; }
  }

  /* ─── FOOTER ─── */
  footer { background: var(--steel-dark); padding: 56px 6vw 30px; }
  .footer-grid { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 40px; margin-bottom: 44px; }
  .footer-brand-col { max-width: 270px; }
  .footer-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
  .footer-logo span { font-family: 'Barlow Condensed', sans-serif; font-weight: 900; font-size: 1.5rem; color: var(--foam); text-transform: uppercase; letter-spacing: 1px; }
  .footer-logo em { font-style: normal; color: var(--lime); }
  .footer-tagline { font-size: 0.84rem; color: rgba(248,250,246,0.4); line-height: 1.7; }
  .footer-col h4 { font-family: 'Barlow Condensed', sans-serif; font-weight: 700; font-size: 0.85rem; color: rgba(248,250,246,0.5); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 16px; }
  .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }
  .footer-col a { font-size: 0.86rem; color: rgba(248,250,246,0.5); text-decoration: none; transition: color 0.2s; }
  .footer-col a:hover { color: var(--lime); }
  .footer-bottom { border-top: 1px solid rgba(58,173,90,0.1); padding-top: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
  .footer-copy { font-size: 0.78rem; color: rgba(248,250,246,0.3); }
  .footer-link { font-size: 0.78rem; color: var(--lime); font-weight: 700; text-decoration: none; }

  /* ─── REVEAL ─── */
  .reveal { opacity: 0; transform: translateY(28px); transition: opacity 0.65s ease, transform 0.65s ease; }
  .reveal.vis { opacity: 1; transform: translateY(0); }
  .d1{transition-delay:0.1s}.d2{transition-delay:0.2s}.d3{transition-delay:0.3s}

  /* ─── RESPONSIVE ─── */
  @media (max-width: 960px) {
    .steam-wrap { display: none; }
    .feat-layout { grid-template-columns: 1fr; gap: 40px; }
    .contact-grid { grid-template-columns: 1fr; gap: 44px; }
    .nav-links { display: none; }
    .plan.hot { transform: scale(1); }
    .numbers-grid { grid-template-columns: 1fr 1fr; }
    .number-item { border-right: none; border-bottom: 1px solid rgba(58,173,90,0.1); }
  }
  @media (max-width: 600px) {
    .section { padding: 68px 5vw; }
    .hero { padding: 110px 5vw 70px; }
  }
</style>
</head>
<body>

<!-- NAV -->
<nav id="top-nav">
  <div class="nav-logo">
    <div class="logo-icon">🏗️</div>
    Con<em class="accent">strux</em>
  </div>
  <ul class="nav-links">
    <li><a href="#funcionalidades">Funcionalidades</a></li>
    <li><a href="#modulos">Módulos</a></li>
    <li><a href="#planos">Planos</a></li>
    <li><a href="#contato">Contato</a></li>
  </ul>
  <button class="nav-cta" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Ver demonstração →</button>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-ring ring1"></div>
  <div class="hero-ring ring2"></div>
  <div class="hero-ring ring3"></div>

  <div class="hero-content">
    <div class="hero-eyebrow"><div class="eyebrow-dot"></div>SISTEMA PDV PARA CONSTRUÇÃO</div>
    <h1>Venda mais.<br>Controle <em>tudo.</em><br>Entregue rápido.</h1>
    <p class="hero-sub">Sistema completo para lojas de material de construção. PDV, orçamentos, estoque de obras, NFC-e, crediário e muito mais — tudo em uma tela simples e ágil.</p>
    <div class="hero-actions">
      <button class="btn-primary" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">
        🏗️ Solicitar demonstração grátis
      </button>
      <button class="btn-outline" onclick="document.getElementById('modulos').scrollIntoView({behavior:'smooth'})">
        Ver módulos ↓
      </button>
    </div>
    <div class="hero-proof">
      <div class="proof-item"><div class="proof-num">800+</div><div class="proof-label">Lojas ativas</div></div>
      <div class="proof-sep"></div>
      <div class="proof-item"><div class="proof-num">99%</div><div class="proof-label">Uptime garantido</div></div>
      <div class="proof-sep"></div>
      <div class="proof-item"><div class="proof-num">30s</div><div class="proof-label">Tempo médio de orçamento</div></div>
    </div>
  </div>

  <!-- POS MOCKUP -->
  <div class="steam-wrap">
    <div class="pos-mockup">
      <div class="pos-topbar">
        <div class="pos-brand">🏗️ Construx PDV</div>
        <div class="pos-time">Caixa 01 · 10:47</div>
      </div>
      <div class="pos-order-items">
        <div class="pos-item">
          <div class="pos-item-left"><div class="pos-item-emoji">🧱</div><div><div class="pos-item-name">Cimento CP-II 50kg</div><div class="pos-item-qty">×10 sacos</div></div></div>
          <div class="pos-item-price">R$ 340,00</div>
        </div>
        <div class="pos-item">
          <div class="pos-item-left"><div class="pos-item-emoji">🪣</div><div><div class="pos-item-name">Tinta Látex 18L Branca</div><div class="pos-item-qty">×3 latas</div></div></div>
          <div class="pos-item-price">R$ 387,00</div>
        </div>
        <div class="pos-item">
          <div class="pos-item-left"><div class="pos-item-emoji">🔩</div><div><div class="pos-item-name">Parafuso Sextavado 5/16</div><div class="pos-item-qty">×100 pçs</div></div></div>
          <div class="pos-item-price">R$ 48,00</div>
        </div>
      </div>
      <div class="pos-divider"></div>
      <div class="pos-total">
        <div class="pos-total-label">Total do Pedido</div>
        <div class="pos-total-val">R$ 775,00</div>
      </div>
      <div class="pos-btns">
        <button class="pos-btn pos-btn-pix">⚡ PIX Instantâneo</button>
        <button class="pos-btn pos-btn-nfc">📋 Crediário / NF</button>
      </div>
      <div class="pos-stats">
        <div class="pos-stat"><div class="pos-stat-val">R$ 12k</div><div class="pos-stat-lbl">Hoje</div></div>
        <div class="pos-stat"><div class="pos-stat-val">38</div><div class="pos-stat-lbl">Pedidos</div></div>
        <div class="pos-stat"><div class="pos-stat-val">5</div><div class="pos-stat-lbl">Entregas</div></div>
      </div>
    </div>
  </div>
</section>

<!-- STRIP -->
<div class="strip">
  <div class="strip-inner">
    <div class="strip-item">🧱 Controle de Estoque <span>·</span></div>
    <div class="strip-item">🧾 NF-e / NFC-e <span>·</span></div>
    <div class="strip-item">📋 Orçamentos Rápidos <span>·</span></div>
    <div class="strip-item">💳 PIX e Crediário <span>·</span></div>
    <div class="strip-item">🚚 Gestão de Entregas <span>·</span></div>
    <div class="strip-item">📊 Relatórios e DRE <span>·</span></div>
    <div class="strip-item">🧱 Controle de Estoque <span>·</span></div>
    <div class="strip-item">🧾 NF-e / NFC-e <span>·</span></div>
    <div class="strip-item">📋 Orçamentos Rápidos <span>·</span></div>
    <div class="strip-item">💳 PIX e Crediário <span>·</span></div>
    <div class="strip-item">🚚 Gestão de Entregas <span>·</span></div>
    <div class="strip-item">📊 Relatórios e DRE <span>·</span></div>
  </div>
</div>

<!-- FEATURES -->
<section class="section features" id="funcionalidades">
  <div class="reveal">
    <div class="section-tag">Por que Construx</div>
    <div class="section-title">Um sistema feito para o<br>ritmo da sua loja</div>
    <p class="section-sub">Cada funcionalidade foi pensada para reduzir o tempo de atendimento, evitar rupturas de estoque e aumentar seu faturamento sem complicação.</p>
  </div>
  <div class="feat-layout">
    <div class="feat-visual reveal d1">
      <div class="menu-grid">
        <div class="menu-item"><div class="menu-emoji">🧱</div><div class="menu-name">Cimento CP-II</div><div class="menu-price">R$ 34,00</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">10</div><button class="qty-btn">+</button></div></div>
        <div class="menu-item"><div class="menu-emoji">🪵</div><div class="menu-name">Madeira 3×7 3m</div><div class="menu-price">R$ 28,90</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">5</div><button class="qty-btn">+</button></div></div>
        <div class="menu-item"><div class="menu-emoji">🪣</div><div class="menu-name">Tinta Látex 18L</div><div class="menu-price">R$ 129,00</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">2</div><button class="qty-btn">+</button></div></div>
        <div class="menu-item"><div class="menu-emoji">⚡</div><div class="menu-name">Cabo Flexível 2,5mm</div><div class="menu-price">R$ 3,50/m</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">50</div><button class="qty-btn">+</button></div></div>
      </div>
      <div class="order-summary">
        <div class="order-row"><span class="order-row-name">10× Cimento CP-II 50kg</span><span class="order-row-val">R$ 340,00</span></div>
        <div class="order-row"><span class="order-row-name">5× Madeira 3×7 3m</span><span class="order-row-val">R$ 144,50</span></div>
        <div class="order-row"><span class="order-row-name">2× Tinta Látex 18L</span><span class="order-row-val">R$ 258,00</span></div>
        <div class="order-row"><span class="order-row-name">50m Cabo Flexível 2,5mm</span><span class="order-row-val">R$ 175,00</span></div>
        <div class="order-total-row"><span class="order-total-lbl">Total</span><span class="order-total-val">R$ 917,50</span></div>
      </div>
    </div>
    <div class="feat-list reveal d2">
      <div class="feat-item">
        <div class="feat-num">📋</div>
        <div class="feat-body">
          <div class="feat-title">Orçamentos em segundos</div>
          <p class="feat-desc">Monte orçamentos completos por obra ou cliente com busca por código de barras, descrição ou fornecedor. Envie por WhatsApp ou e-mail com um toque.</p>
        </div>
      </div>
      <div class="feat-item">
        <div class="feat-num">💳</div>
        <div class="feat-body">
          <div class="feat-title">Caixa com crediário e todos os meios de pagamento</div>
          <p class="feat-desc">PIX, cartão, dinheiro, boleto e crediário próprio. Controle de contas a receber, inadimplência e lembretes automáticos por WhatsApp.</p>
        </div>
      </div>
      <div class="feat-item">
        <div class="feat-num">🧾</div>
        <div class="feat-body">
          <div class="feat-title">NF-e e NFC-e integrado e sem complicação</div>
          <p class="feat-desc">Emita notas fiscais de consumidor e produto com homologação automática. Contingência offline para nunca parar de vender.</p>
        </div>
      </div>
      <div class="feat-item">
        <div class="feat-num">🚚</div>
        <div class="feat-body">
          <div class="feat-title">Controle de entregas e romaneio</div>
          <p class="feat-desc">Gerencie o roteiro de entregas do caminhão, status em tempo real e confirmação de entrega com foto ou assinatura digital do cliente.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MODULES -->
<section class="section modules" id="modulos">
  <div class="reveal" style="text-align:center">
    <div class="section-tag">Módulos</div>
    <div class="section-title">Tudo que sua loja precisa</div>
    <p class="section-sub" style="margin:0 auto">Cada módulo foi construído para o dia a dia de quem trabalha na linha de frente — rápido, simples e confiável.</p>
  </div>
  <div class="modules-grid">
    <div class="module-card reveal d1">
      <div class="module-icon">🛒</div>
      <div class="module-title">PDV e Balcão</div>
      <p class="module-text">Atendimento ágil com busca por código, orçamentos por obra, combos de material e controle de fila de caixa. Menos espera, mais vendas.</p>
      <div class="module-pills"><span class="pill">Balcão</span><span class="pill">Orçamento</span><span class="pill">Código de Barras</span></div>
    </div>
    <div class="module-card reveal d2">
      <div class="module-icon">💰</div>
      <div class="module-title">Caixa e Crediário</div>
      <p class="module-text">Controle rápido do recebimento, múltiplos operadores, crediário próprio com parcelas, sangria e relatório de fechamento automático.</p>
      <div class="module-pills"><span class="pill">PIX</span><span class="pill">Crediário</span><span class="pill">Boleto</span></div>
    </div>
    <div class="module-card reveal d3">
      <div class="module-icon">🧾</div>
      <div class="module-title">NF-e e Fiscal</div>
      <p class="module-text">Emissão de NF-e e NFC-e com homologação automática pela SEFAZ. Contingência offline para nunca parar de vender em queda de internet.</p>
      <div class="module-pills"><span class="pill">NF-e</span><span class="pill">NFC-e</span><span class="pill">XML</span><span class="pill">SAT</span></div>
    </div>
    <div class="module-card reveal d1">
      <div class="module-icon">🏗️</div>
      <div class="module-title">Estoque e Compras</div>
      <p class="module-text">Controle de milhares de SKUs com curva ABC, alertas de ponto de pedido, recebimento de NF de fornecedor e sugestão automática de compra.</p>
      <div class="module-pills"><span class="pill">SKU</span><span class="pill">Compras</span><span class="pill">Curva ABC</span></div>
    </div>
    <div class="module-card reveal d2">
      <div class="module-icon">📊</div>
      <div class="module-title">Relatórios e DRE</div>
      <p class="module-text">Visão completa do negócio: produtos mais vendidos, margem por departamento, inadimplência do crediário e DRE mensal exportável.</p>
      <div class="module-pills"><span class="pill">DRE</span><span class="pill">Margem</span><span class="pill">Exportar</span></div>
    </div>
    <div class="module-card reveal d3">
      <div class="module-icon">📱</div>
      <div class="module-title">App para Gestão</div>
      <p class="module-text">Acompanhe vendas, estoque crítico e entregas em tempo real de qualquer lugar pelo celular. Notificações automáticas de fechamento de caixa.</p>
      <div class="module-pills"><span class="pill">iOS</span><span class="pill">Android</span><span class="pill">Tempo real</span></div>
    </div>
  </div>
</section>

<!-- NUMBERS -->
<div class="numbers">
  <div class="numbers-grid">
    <div class="number-item reveal"><div class="number-val">800+</div><div class="number-label">Lojas de material de construção</div></div>
    <div class="number-item reveal d1"><div class="number-val">5M+</div><div class="number-label">Pedidos processados/mês</div></div>
    <div class="number-item reveal d2"><div class="number-val">30s</div><div class="number-label">Tempo médio de orçamento</div></div>
    <div class="number-item reveal d3"><div class="number-val">99.9%</div><div class="number-label">Disponibilidade do sistema</div></div>
  </div>
</div>

<!-- TESTIMONIALS -->
<section class="section testimonials">
  <div class="reveal" style="text-align:center">
    <div class="section-tag">Depoimentos</div>
    <div class="section-title">Donos que transformaram<br>seu negócio com Construx</div>
  </div>
  <div class="testi-grid">
    <div class="testi-card reveal d1">
      <div class="testi-stars">★★★★★</div>
      <div class="testi-quote">"</div>
      <p class="testi-text">O orçamento que antes levava 10 minutos agora fica pronto em 30 segundos. A fila no balcão sumiu e o faturamento subiu 32% já no primeiro mês com o Construx.</p>
      <div class="testi-author">
        <div class="testi-av">MC</div>
        <div><div class="testi-name">Marcos Carvalho</div><div class="testi-role">Proprietário — Carvalho Materiais, Niterói/RJ</div></div>
      </div>
    </div>
    <div class="testi-card reveal d2">
      <div class="testi-stars">★★★★★</div>
      <div class="testi-quote">"</div>
      <p class="testi-text">O crediário era um caos. Hoje controlo tudo pelo sistema, mando cobrança automática no WhatsApp e a inadimplência caiu 60%. A equipe foi incrível na implantação.</p>
      <div class="testi-author">
        <div class="testi-av" style="background:var(--green)">AS</div>
        <div><div class="testi-name">Ana Souza</div><div class="testi-role">Gerente — Depósito Central Sul</div></div>
      </div>
    </div>
    <div class="testi-card reveal d3">
      <div class="testi-stars">★★★★★</div>
      <div class="testi-quote">"</div>
      <p class="testi-text">Controlo 4 filiais pelo app enquanto estou em casa. Vejo o estoque crítico em tempo real e nunca mais fiquei sem produto no fim de semana de obra.</p>
      <div class="testi-author">
        <div class="testi-av" style="background:var(--orange)">RP</div>
        <div><div class="testi-name">Roberto Pinto</div><div class="testi-role">Empreendedor — 4 lojas, MG</div></div>
      </div>
    </div>
  </div>
</section>

<!-- PLANS -->
<section class="section plans" id="planos">
  <div class="reveal" style="text-align:center">
    <div class="section-tag">Planos</div>
    <div class="section-title">Preço justo que cabe<br>no seu negócio</div>
    <p class="section-sub" style="margin:0 auto">Sem fidelidade, sem surpresas. Cancele quando quiser.</p>
  </div>
  <div class="plans-grid">
    <div class="plan reveal d1">
      <div class="plan-tier">Essencial</div>
      <div class="plan-price">Sob<sub> consulta</sub></div>
      <div class="plan-desc">Ideal para lojas pequenas e depósitos</div>
      <div class="plan-hr"></div>
      <ul class="plan-feats">
        <li><span class="check-icon">✓</span> PDV com 1 operador</li>
        <li><span class="check-icon">✓</span> Orçamentos e caixa</li>
        <li><span class="check-icon">✓</span> Estoque básico</li>
        <li><span class="check-icon">✓</span> Relatórios básicos</li>
        <li><span class="check-icon">✓</span> Suporte por chat</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Falar com especialista</button>
    </div>
    <div class="plan hot reveal d2">
      <div class="hot-badge">🏗️ MAIS PEDIDO</div>
      <div class="plan-tier">Profissional</div>
      <div class="plan-price">Sob<sub> consulta</sub></div>
      <div class="plan-desc">Para lojas em crescimento com crediário</div>
      <div class="plan-hr"></div>
      <ul class="plan-feats">
        <li><span class="check-icon">✓</span> Tudo do Essencial</li>
        <li><span class="check-icon">✓</span> NF-e e NFC-e ilimitado</li>
        <li><span class="check-icon">✓</span> Crediário próprio</li>
        <li><span class="check-icon">✓</span> Até 3 operadores</li>
        <li><span class="check-icon">✓</span> Gestão de entregas</li>
        <li><span class="check-icon">✓</span> Relatórios + DRE</li>
        <li><span class="check-icon">✓</span> Suporte prioritário</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Falar com especialista</button>
    </div>
    <div class="plan reveal d3">
      <div class="plan-tier">Rede</div>
      <div class="plan-price">Sob<sub> consulta</sub></div>
      <div class="plan-desc">Múltiplas filiais e redes de depósitos</div>
      <div class="plan-hr"></div>
      <ul class="plan-feats">
        <li><span class="check-icon">✓</span> Tudo do Profissional</li>
        <li><span class="check-icon">✓</span> Múltiplas filiais</li>
        <li><span class="check-icon">✓</span> Gestão centralizada</li>
        <li><span class="check-icon">✓</span> API e integrações</li>
        <li><span class="check-icon">✓</span> Gerente de conta dedicado</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Falar com especialista</button>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="cta-title reveal">Experimente por<br><em>30 dias grátis.</em></div>
  <p class="cta-sub reveal d1">Sem cartão de crédito, sem burocracia. Configure em minutos e comece a vender mais ainda hoje.</p>
  <div class="cta-form reveal d2">
    <input class="cta-input" type="email" placeholder="Seu melhor e-mail">
    <button class="btn-primary">🏗️ Quero testar grátis</button>
  </div>
  <p class="cta-note reveal d3">✓ Sem compromisso &nbsp;·&nbsp; ✓ Suporte incluso &nbsp;·&nbsp; ✓ Dados protegidos (LGPD)</p>
</section>

<!-- CONTACT -->
<section class="contact" id="contato">
  <div class="contact-grid">
    <div>
      <div class="section-tag">Contato</div>
      <h2>Fale com nossa<br>equipe agora</h2>
      <p class="contact-desc">Agende uma demonstração gratuita e veja como o Construx funciona na prática no seu negócio. Retornamos em até 2 horas.</p>
      <div class="contact-items">
        <div class="contact-row">
          <div class="c-icon">📱</div>
          <div class="c-detail"><small>WhatsApp / Celular</small><span>(21) 98284-6871</span></div>
        </div>
        <div class="contact-row">
          <div class="c-icon">✉️</div>
          <div class="c-detail"><small>E-mail</small><span>andersonmelo01@gmail.com</span></div>
        </div>
        <div class="contact-row">
          <div class="c-icon">🌐</div>
          <div class="c-detail"><small>Site</small><span>www.ams.dev.br</span></div>
        </div>
      </div>
    </div>
    <div>
      <div class="contact-form-area">
        <form id="construx-contact-form">
          <input class="cf" type="text" name="nome" placeholder="Seu nome" required>
          <input class="cf" type="email" name="email" placeholder="E-mail" required>
          <input class="cf" type="tel" name="telefone" placeholder="WhatsApp">
          <input class="cf" type="text" name="extra" placeholder="Nome da loja / depósito" required>
          <select class="cf" name="mensagem">
            <option value="" disabled selected>Quantos caixas você precisa?</option>
            <option>1 caixa</option>
            <option>2 a 3 caixas</option>
            <option>4 ou mais caixas</option>
            <option>Múltiplas filiais</option>
          </select>
          <button class="cf-submit" id="submit-btn" type="submit">🏗️ Solicitar demonstração gratuita →</button>
          <p class="cf-note">Retornamos em até 2 horas em horário comercial</p>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-grid">
    <div class="footer-brand-col">
      <div class="footer-logo">
        <div class="logo-icon" style="width:30px;height:30px;font-size:0.95rem">🏗️</div>
        <span>Con<em>strux</em></span>
      </div>
      <p class="footer-tagline">Sistema completo para lojas de material de construção. Venda mais, controle tudo, entregue rápido.</p>
    </div>
    <div class="footer-col">
      <h4>Sistema</h4>
      <ul>
        <li><a href="#funcionalidades">PDV e Orçamentos</a></li>
        <li><a href="#modulos">NF-e / NFC-e Fiscal</a></li>
        <li><a href="#modulos">Estoque e Compras</a></li>
        <li><a href="#modulos">Crediário</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Empresa</h4>
      <ul>
        <li><a href="#">Sobre nós</a></li>
        <li><a href="#planos">Planos</a></li>
        <li><a href="#contato">Contato</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Suporte</h4>
      <ul>
        <li><a href="#">Central de Ajuda</a></li>
        <li><a href="#">Status do Sistema</a></li>
        <li><a href="#">Privacidade (LGPD)</a></li>
        <li><a href="#">Termos de Uso</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-copy">© 2025 Construx. Todos os direitos reservados.</div>
    <a href="https://www.ams.dev.br" target="_blank" class="footer-link">www.ams.dev.br</a>
  </div>
</footer>

<script>
  // Scroll reveal
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('vis'); });
  }, { threshold: 0.1 });
  document.querySelectorAll('.reveal').forEach(el => io.observe(el));

  // Navbar shrink
  window.addEventListener('scroll', () => {
    document.getElementById('top-nav').style.padding = window.scrollY > 60 ? '12px 6vw' : '18px 6vw';
  });

  // Menu qty buttons
  document.querySelectorAll('.qty-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const numEl = this.parentElement.querySelector('.qty-num');
      let val = parseInt(numEl.textContent);
      if(this.textContent === '+') val = Math.min(val + 1, 999);
      else val = Math.max(val - 1, 0);
      numEl.textContent = val;
    });
  });

  // Form submit AJAX
  const construxForm = document.getElementById('construx-contact-form');
  if (construxForm) {
    construxForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const btn = construxForm.querySelector('.cf-submit');
      btn.textContent = 'Enviando...';
      btn.disabled = true;
      const formData = new FormData(construxForm);
      fetch('send-contact-smtp.php', {
        method: 'POST',
        body: formData
      })
      .then(r => r.text())
      .then(resp => {
        if (resp.trim() === 'OK') {
          btn.textContent = '✓ Solicitação enviada! Entraremos em contato em breve.';
          btn.style.background = 'linear-gradient(135deg, #1A6B2E, #2A8C42)';
        } else {
          btn.textContent = resp;
          btn.style.background = '#B84020';
          btn.disabled = false;
        }
      })
      .catch(() => {
        btn.textContent = 'Erro ao enviar. Tente novamente.';
        btn.style.background = '#B84020';
        btn.disabled = false;
      });
    });
  }

  // CTA button
  document.querySelector('.cta-form .btn-primary').addEventListener('click', function() {
    this.textContent = '✓ Confira seu e-mail!';
    this.style.background = 'linear-gradient(135deg, #1A6B2E, #2A8C42)';
  });
</script>
</body>
</html>