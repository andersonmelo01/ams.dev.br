<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CoffeeHand — Sistema para Cafeterias e Padarias</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;800;900&family=Nunito:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  :root {
    --espresso:   #2C1A0E;
    --dark-roast: #3D2314;
    --roast:      #5C3317;
    --caramel:    #9C5E28;
    --latte:      #C8874A;
    --honey:      #D4A05A;
    --cream:      #F5EAD7;
    --foam:       #FBF5EC;
    --white:      #FFFFFF;
    --text:       #2C1A0E;
    --muted:      #8B6347;
    --green:      #4A7C59;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }

  body {
    font-family: 'Nunito', sans-serif;
    background: var(--foam);
    color: var(--text);
    overflow-x: hidden;
  }

  /* grain overlay */
  body::before {
    content: '';
    position: fixed; inset: 0; z-index: 0; pointer-events: none;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
    opacity: 0.4;
  }

  /* ─── NAV ─── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 6vw;
    background: rgba(44,26,14,0.95);
    backdrop-filter: blur(16px);
    border-bottom: 1px solid rgba(200,135,74,0.15);
    transition: padding 0.3s;
  }
  .nav-logo {
    display: flex; align-items: center; gap: 11px;
    font-family: 'Playfair Display', serif;
    font-size: 1.45rem; font-weight: 900; color: var(--foam);
    letter-spacing: -0.5px;
  }
  .nav-logo .accent { color: var(--honey); }
  .logo-icon {
    width: 36px; height: 36px; background: var(--caramel);
    border-radius: 10px; display: grid; place-items: center; font-size: 1.1rem;
  }
  .nav-links { display: flex; gap: 30px; list-style: none; }
  .nav-links a {
    font-size: 0.88rem; color: rgba(251,245,236,0.65);
    text-decoration: none; font-weight: 600; transition: color 0.2s;
    letter-spacing: 0.2px;
  }
  .nav-links a:hover { color: var(--honey); }
  .nav-cta {
    background: var(--caramel); color: var(--white);
    border: none; padding: 10px 22px; border-radius: 50px;
    font-family: 'Nunito', sans-serif; font-weight: 700; font-size: 0.85rem;
    cursor: pointer; transition: all 0.2s; letter-spacing: 0.3px;
  }
  .nav-cta:hover { background: var(--latte); transform: scale(1.03); }

  /* ─── HERO ─── */
  .hero {
    min-height: 100vh;
    background:
      radial-gradient(ellipse 70% 80% at 75% 40%, rgba(156,94,40,0.22) 0%, transparent 65%),
      radial-gradient(ellipse 50% 50% at 10% 80%, rgba(92,51,23,0.4) 0%, transparent 60%),
      linear-gradient(160deg, var(--espresso) 0%, var(--dark-roast) 55%, #2A1208 100%);
    display: flex; align-items: center;
    padding: 130px 6vw 80px;
    position: relative; overflow: hidden;
  }

  /* decorative rings */
  .hero-ring {
    position: absolute; border-radius: 50%;
    border: 1px solid rgba(200,135,74,0.12); pointer-events: none;
  }
  .ring1 { width: 700px; height: 700px; right: -250px; top: -250px; }
  .ring2 { width: 450px; height: 450px; right: -100px; top: -50px; border-color: rgba(200,135,74,0.08); }
  .ring3 { width: 200px; height: 200px; left: 5%; bottom: 10%; border-color: rgba(200,135,74,0.1); }

  /* steam animation */
  .steam-wrap { position: absolute; right: 8vw; top: 0; bottom: 0; width: 420px; display: flex; align-items: center; z-index: 2; }
  .pos-mockup {
    background: rgba(251,245,236,0.06);
    border: 1px solid rgba(200,135,74,0.2);
    border-radius: 22px; padding: 26px;
    backdrop-filter: blur(20px);
    box-shadow: 0 40px 80px rgba(0,0,0,0.5), inset 0 1px 0 rgba(255,255,255,0.06);
    width: 100%;
    animation: floatUp 4s ease-in-out infinite;
  }
  @keyframes floatUp { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }

  .pos-topbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
  .pos-brand { font-family: 'Playfair Display', serif; font-weight: 800; font-size: 1rem; color: var(--honey); }
  .pos-time { font-size: 0.75rem; color: rgba(251,245,236,0.4); }

  .pos-order-items { display: flex; flex-direction: column; gap: 8px; margin-bottom: 18px; }
  .pos-item {
    display: flex; align-items: center; justify-content: space-between;
    background: rgba(255,255,255,0.05); border-radius: 10px; padding: 10px 14px;
    border: 1px solid rgba(200,135,74,0.1);
  }
  .pos-item-left { display: flex; align-items: center; gap: 10px; }
  .pos-item-emoji { font-size: 1rem; }
  .pos-item-name { font-size: 0.78rem; color: rgba(251,245,236,0.85); font-weight: 600; }
  .pos-item-qty { font-size: 0.65rem; color: rgba(251,245,236,0.4); }
  .pos-item-price { font-size: 0.8rem; font-weight: 700; color: var(--honey); font-family: 'Playfair Display', serif; }

  .pos-divider { height: 1px; background: rgba(200,135,74,0.15); margin: 14px 0; }
  .pos-total { display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px; }
  .pos-total-label { font-size: 0.8rem; color: rgba(251,245,236,0.5); font-weight: 600; }
  .pos-total-val { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 1.5rem; color: var(--foam); }

  .pos-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
  .pos-btn {
    padding: 10px; border-radius: 10px; border: none; cursor: pointer;
    font-weight: 700; font-size: 0.75rem; transition: all 0.2s;
  }
  .pos-btn-pix { background: var(--green); color: white; }
  .pos-btn-nfc { background: var(--caramel); color: white; }
  .pos-btn:hover { filter: brightness(1.15); }

  .pos-stats { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 8px; margin-top: 14px; }
  .pos-stat { background: rgba(255,255,255,0.04); border-radius: 8px; padding: 10px; text-align: center; border: 1px solid rgba(200,135,74,0.08); }
  .pos-stat-val { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1rem; color: var(--honey); }
  .pos-stat-lbl { font-size: 0.6rem; color: rgba(251,245,236,0.4); margin-top: 2px; }

  /* hero text */
  .hero-content { position: relative; z-index: 2; max-width: 580px; }
  .hero-eyebrow {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(156,94,40,0.25); border: 1px solid rgba(200,135,74,0.3);
    padding: 6px 16px; border-radius: 50px; margin-bottom: 28px;
    font-size: 0.78rem; font-weight: 700; color: var(--honey); letter-spacing: 1.5px; text-transform: uppercase;
    animation: fadeUp 0.6s ease both;
  }
  .eyebrow-dot { width: 6px; height: 6px; background: var(--honey); border-radius: 50%; animation: pulse 2s infinite; }
  @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.4} }

  h1 {
    font-family: 'Playfair Display', serif; font-weight: 900;
    font-size: clamp(2.6rem, 5.2vw, 4.2rem); line-height: 1.08;
    color: var(--foam); margin-bottom: 24px; letter-spacing: -1.5px;
    animation: fadeUp 0.6s 0.1s ease both;
  }
  h1 em { font-style: normal; color: var(--honey); }

  .hero-sub {
    font-size: 1.08rem; line-height: 1.75; color: rgba(251,245,236,0.65);
    margin-bottom: 40px; max-width: 480px;
    animation: fadeUp 0.6s 0.2s ease both;
  }
  .hero-actions {
    display: flex; gap: 14px; flex-wrap: wrap;
    animation: fadeUp 0.6s 0.3s ease both;
  }
  .btn-primary {
    background: linear-gradient(135deg, var(--caramel), var(--latte));
    color: var(--white); padding: 15px 34px; border-radius: 50px; border: none;
    font-family: 'Nunito', sans-serif; font-weight: 800; font-size: 0.95rem;
    cursor: pointer; transition: all 0.25s; display: flex; align-items: center; gap: 8px;
    box-shadow: 0 10px 30px rgba(156,94,40,0.4);
  }
  .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(156,94,40,0.5); filter: brightness(1.1); }
  .btn-outline {
    background: transparent; color: var(--foam);
    padding: 15px 30px; border-radius: 50px; border: 1.5px solid rgba(251,245,236,0.2);
    font-family: 'Nunito', sans-serif; font-weight: 700; font-size: 0.95rem;
    cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 8px;
  }
  .btn-outline:hover { border-color: var(--honey); color: var(--honey); }

  .hero-proof {
    display: flex; gap: 36px; margin-top: 56px; flex-wrap: wrap;
    animation: fadeUp 0.6s 0.4s ease both;
  }
  .proof-item { display: flex; flex-direction: column; }
  .proof-num { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 2rem; color: var(--foam); line-height: 1; }
  .proof-label { font-size: 0.78rem; color: rgba(251,245,236,0.45); margin-top: 4px; }

  .proof-sep { width: 1px; background: rgba(200,135,74,0.2); align-self: stretch; }

  @keyframes fadeUp { from{opacity:0;transform:translateY(22px)} to{opacity:1;transform:translateY(0)} }

  /* ─── STRIP ─── */
  .strip {
    background: var(--caramel); padding: 16px 0; overflow: hidden;
    border-top: 1px solid rgba(255,255,255,0.1); border-bottom: 1px solid rgba(0,0,0,0.1);
  }
  .strip-inner { display: flex; gap: 56px; animation: ticker 22s linear infinite; white-space: nowrap; }
  .strip-item { display: flex; align-items: center; gap: 10px; font-size: 0.82rem; font-weight: 700; color: rgba(255,255,255,0.85); letter-spacing: 1px; text-transform: uppercase; }
  .strip-item span { opacity: 0.5; }
  @keyframes ticker { from{transform:translateX(0)} to{transform:translateX(-50%)} }

  /* ─── SECTIONS ─── */
  .section { padding: 96px 6vw; position: relative; }
  .section-tag {
    display: inline-block; font-size: 0.72rem; font-weight: 800; letter-spacing: 2.5px;
    text-transform: uppercase; color: var(--caramel); margin-bottom: 12px;
  }
  .section-title {
    font-family: 'Playfair Display', serif; font-weight: 900;
    font-size: clamp(1.9rem, 3.5vw, 2.9rem); letter-spacing: -1px;
    color: var(--espresso); line-height: 1.15; margin-bottom: 16px;
  }
  .section-sub { font-size: 1.02rem; color: var(--muted); max-width: 500px; line-height: 1.75; }

  /* ─── FEATURES ─── */
  .features { background: var(--foam); }
  .feat-layout { display: grid; grid-template-columns: 1fr 1.1fr; gap: 80px; align-items: center; margin-top: 64px; }
  .feat-visual {
    background: linear-gradient(145deg, var(--dark-roast), var(--espresso));
    border-radius: 24px; padding: 36px; position: relative; overflow: hidden;
    box-shadow: 0 30px 70px rgba(44,26,14,0.25);
  }
  .feat-visual::before {
    content: ''; position: absolute; inset: 0; border-radius: 24px;
    background: radial-gradient(ellipse 70% 60% at 80% 20%, rgba(156,94,40,0.3), transparent);
  }
  .feat-visual > * { position: relative; z-index: 1; }

  .menu-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .menu-item {
    background: rgba(255,255,255,0.06); border-radius: 14px; padding: 16px;
    border: 1px solid rgba(200,135,74,0.15); transition: all 0.2s; cursor: pointer;
  }
  .menu-item:hover { background: rgba(200,135,74,0.12); border-color: rgba(200,135,74,0.3); }
  .menu-emoji { font-size: 1.8rem; margin-bottom: 8px; }
  .menu-name { font-size: 0.78rem; font-weight: 700; color: var(--foam); margin-bottom: 4px; }
  .menu-price { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1rem; color: var(--honey); }
  .menu-qty {
    display: flex; align-items: center; gap: 8px; margin-top: 8px;
    background: rgba(0,0,0,0.2); border-radius: 8px; padding: 4px 8px; width: fit-content;
  }
  .qty-btn { background: rgba(200,135,74,0.3); border: none; color: var(--honey); width: 18px; height: 18px; border-radius: 4px; cursor: pointer; font-size: 0.8rem; font-weight: 700; display: grid; place-items: center; }
  .qty-num { font-size: 0.75rem; font-weight: 700; color: var(--foam); min-width: 14px; text-align: center; }

  .order-summary {
    background: rgba(255,255,255,0.04); border-radius: 14px; padding: 18px;
    border: 1px solid rgba(200,135,74,0.1); margin-top: 14px;
  }
  .order-row { display: flex; justify-content: space-between; align-items: center; padding: 7px 0; border-bottom: 1px solid rgba(255,255,255,0.05); }
  .order-row:last-child { border: none; }
  .order-row-name { font-size: 0.78rem; color: rgba(251,245,236,0.7); }
  .order-row-val { font-size: 0.78rem; font-weight: 700; color: var(--honey); }
  .order-total-row { display: flex; justify-content: space-between; align-items: center; padding-top: 12px; margin-top: 4px; border-top: 1px solid rgba(200,135,74,0.2); }
  .order-total-lbl { font-size: 0.85rem; font-weight: 800; color: var(--foam); }
  .order-total-val { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 1.3rem; color: var(--honey); }

  .feat-list { display: flex; flex-direction: column; gap: 28px; }
  .feat-item { display: flex; gap: 18px; align-items: flex-start; }
  .feat-num {
    width: 42px; height: 42px; border-radius: 12px; flex-shrink: 0;
    background: linear-gradient(135deg, var(--caramel), var(--roast));
    display: grid; place-items: center; font-size: 1.1rem;
  }
  .feat-body {}
  .feat-title { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.05rem; color: var(--espresso); margin-bottom: 6px; }
  .feat-desc { font-size: 0.88rem; color: var(--muted); line-height: 1.65; }

  /* ─── MODULES ─── */
  .modules { background: var(--cream); }
  .modules-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 22px; margin-top: 60px; }
  .module-card {
    background: var(--white); border-radius: 20px; padding: 30px;
    border: 1.5px solid rgba(44,26,14,0.07);
    transition: all 0.25s; position: relative; overflow: hidden;
  }
  .module-card::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--caramel), var(--honey));
    transform: scaleX(0); transition: transform 0.3s; transform-origin: left;
  }
  .module-card:hover { transform: translateY(-5px); box-shadow: 0 16px 45px rgba(44,26,14,0.1); }
  .module-card:hover::after { transform: scaleX(1); }
  .module-icon {
    width: 50px; height: 50px; border-radius: 14px; margin-bottom: 18px;
    background: linear-gradient(135deg, var(--caramel), var(--roast));
    display: grid; place-items: center; font-size: 1.3rem;
  }
  .module-title { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.05rem; color: var(--espresso); margin-bottom: 8px; }
  .module-text { font-size: 0.87rem; color: var(--muted); line-height: 1.65; }
  .module-pills { display: flex; flex-wrap: wrap; gap: 6px; margin-top: 16px; }
  .pill { padding: 3px 10px; background: rgba(156,94,40,0.08); color: var(--caramel); border-radius: 50px; font-size: 0.7rem; font-weight: 700; border: 1px solid rgba(156,94,40,0.15); }

  /* ─── NUMBERS ─── */
  .numbers {
    background: linear-gradient(150deg, var(--espresso) 0%, var(--dark-roast) 100%);
    padding: 80px 6vw; position: relative; overflow: hidden;
  }
  .numbers::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse 70% 100% at 80% 50%, rgba(156,94,40,0.2), transparent);
  }
  .numbers-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1px; position: relative; z-index: 1; }
  .number-item { padding: 40px 30px; text-align: center; border-right: 1px solid rgba(200,135,74,0.1); }
  .number-item:last-child { border: none; }
  .number-val { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 3rem; color: var(--honey); line-height: 1; margin-bottom: 8px; }
  .number-label { font-size: 0.85rem; color: rgba(251,245,236,0.5); font-weight: 500; }

  /* ─── TESTIMONIALS ─── */
  .testimonials { background: var(--foam); }
  .testi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 22px; margin-top: 56px; }
  .testi-card {
    background: var(--white); border-radius: 20px; padding: 32px;
    border: 1.5px solid rgba(44,26,14,0.07); transition: transform 0.2s;
  }
  .testi-card:hover { transform: translateY(-4px); }
  .testi-stars { color: var(--honey); font-size: 0.9rem; letter-spacing: 3px; margin-bottom: 16px; }
  .testi-quote { font-size: 1.5rem; color: var(--caramel); line-height: 1; margin-bottom: 10px; font-family: 'Playfair Display', serif; }
  .testi-text { font-size: 0.92rem; color: #5C3D2A; line-height: 1.75; margin-bottom: 24px; }
  .testi-author { display: flex; align-items: center; gap: 13px; }
  .testi-av {
    width: 44px; height: 44px; border-radius: 50%; flex-shrink: 0;
    background: linear-gradient(135deg, var(--caramel), var(--roast));
    display: grid; place-items: center; font-weight: 800; font-size: 0.9rem; color: var(--white);
  }
  .testi-name { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 0.9rem; color: var(--espresso); }
  .testi-role { font-size: 0.77rem; color: var(--muted); margin-top: 2px; }

  /* ─── PLANS ─── */
  .plans { background: var(--cream); }
  .plans-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 22px; margin-top: 56px; max-width: 960px; margin-left: auto; margin-right: auto; }
  .plan {
    background: var(--white); border-radius: 24px; padding: 38px 32px;
    border: 1.5px solid rgba(44,26,14,0.08); position: relative; transition: transform 0.25s;
  }
  .plan:hover { transform: translateY(-5px); }
  .plan.hot {
    background: var(--espresso); border-color: var(--caramel);
    box-shadow: 0 30px 70px rgba(44,26,14,0.3);
    transform: scale(1.04);
  }
  .plan.hot:hover { transform: scale(1.04) translateY(-5px); }
  .hot-badge {
    position: absolute; top: -13px; left: 50%; transform: translateX(-50%);
    background: linear-gradient(135deg, var(--caramel), var(--honey));
    color: var(--white); font-size: 0.7rem; font-weight: 800; letter-spacing: 1px;
    padding: 5px 18px; border-radius: 50px; white-space: nowrap;
  }
  .plan-tier { font-size: 0.72rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; color: var(--caramel); margin-bottom: 12px; }
  .plan.hot .plan-tier { color: var(--honey); }
  .plan-price { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 2.8rem; color: var(--espresso); line-height: 1; margin-bottom: 5px; }
  .plan-price sub { font-size: 1rem; font-weight: 400; color: var(--muted); vertical-align: baseline; }
  .plan.hot .plan-price { color: var(--foam); }
  .plan.hot .plan-price sub { color: rgba(251,245,236,0.5); }
  .plan-desc { font-size: 0.82rem; color: var(--muted); margin-bottom: 26px; }
  .plan.hot .plan-desc { color: rgba(251,245,236,0.5); }
  .plan-hr { height: 1px; background: rgba(44,26,14,0.08); margin-bottom: 22px; }
  .plan.hot .plan-hr { background: rgba(200,135,74,0.2); }
  .plan-feats { list-style: none; display: flex; flex-direction: column; gap: 11px; margin-bottom: 30px; }
  .plan-feats li { display: flex; align-items: center; gap: 9px; font-size: 0.87rem; color: #5C3D2A; }
  .plan.hot .plan-feats li { color: rgba(251,245,236,0.8); }
  .check-icon { color: var(--green); font-weight: 700; font-size: 0.85rem; }
  .plan-btn {
    width: 100%; padding: 13px; border-radius: 12px;
    border: 2px solid var(--caramel); background: transparent;
    color: var(--caramel); font-family: 'Nunito', sans-serif;
    font-weight: 800; font-size: 0.9rem; cursor: pointer; transition: all 0.2s;
  }
  .plan-btn:hover { background: var(--caramel); color: var(--white); }
  .plan.hot .plan-btn { background: var(--caramel); color: var(--white); border-color: var(--caramel); box-shadow: 0 8px 25px rgba(156,94,40,0.4); }
  .plan.hot .plan-btn:hover { background: var(--latte); border-color: var(--latte); }

  /* ─── CTA ─── */
  .cta-section {
    background: linear-gradient(150deg, var(--dark-roast) 0%, var(--espresso) 60%, #1A0C06 100%);
    padding: 100px 6vw; text-align: center; position: relative; overflow: hidden;
  }
  .cta-section::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse 60% 70% at 50% 50%, rgba(156,94,40,0.25), transparent);
  }
  .cta-title {
    font-family: 'Playfair Display', serif; font-weight: 900;
    font-size: clamp(2rem, 4vw, 3.4rem); color: var(--foam);
    letter-spacing: -1.5px; line-height: 1.15; margin-bottom: 16px; position: relative;
  }
  .cta-title em { font-style: normal; color: var(--honey); }
  .cta-sub { font-size: 1.05rem; color: rgba(251,245,236,0.6); max-width: 500px; margin: 0 auto 40px; line-height: 1.75; position: relative; }
  .cta-form { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; max-width: 500px; margin: 0 auto; position: relative; }
  .cta-input {
    flex: 1; min-width: 200px; padding: 14px 22px; border-radius: 50px;
    border: 1.5px solid rgba(200,135,74,0.2); background: rgba(251,245,236,0.07);
    color: var(--foam); font-family: 'Nunito', sans-serif; font-size: 0.93rem;
    outline: none; backdrop-filter: blur(10px); transition: border 0.2s;
  }
  .cta-input::placeholder { color: rgba(251,245,236,0.35); }
  .cta-input:focus { border-color: var(--honey); }
  .cta-note { margin-top: 18px; font-size: 0.78rem; color: rgba(251,245,236,0.35); position: relative; }

  /* ─── CONTACT ─── */
  .contact { background: var(--cream); padding: 88px 6vw; }
  .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; max-width: 960px; margin: 0 auto; }
  .contact h2 { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 2.2rem; color: var(--espresso); margin-bottom: 14px; letter-spacing: -0.5px; }
  .contact-desc { color: var(--muted); line-height: 1.75; margin-bottom: 34px; }
  .contact-items { display: flex; flex-direction: column; gap: 16px; }
  .contact-row { display: flex; align-items: center; gap: 14px; }
  .c-icon {
    width: 46px; height: 46px; border-radius: 12px; flex-shrink: 0;
    background: linear-gradient(135deg, var(--caramel), var(--roast));
    display: grid; place-items: center; font-size: 1.1rem;
  }
  .c-detail small { display: block; font-size: 0.75rem; color: var(--muted); margin-bottom: 2px; }
  .c-detail span { font-weight: 700; color: var(--espresso); font-size: 0.9rem; }
  .contact-form-area {
    display: flex;
    flex-direction: column;
    gap: 0;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 32px rgba(44,26,14,0.07);
    padding: 32px 24px 18px 24px;
    margin-top: 18px;
    max-width: 420px;
    width: 100%;
  }
  .contact-form-area form {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .cf {
    padding: 14px 18px;
    border-radius: 10px;
    border: 1.5px solid rgba(44,26,14,0.13);
    background: #f9f6f2;
    font-family: 'Nunito', sans-serif;
    font-size: 0.97rem;
    color: var(--espresso);
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
    margin-bottom: 2px;
  }
  .cf:focus {
    border-color: var(--caramel);
    box-shadow: 0 0 0 2px #f5ead7;
  }
  .cf::placeholder { color: #B09080; }
  select.cf { color: #7a5a3a; background: #f9f6f2; }
  .cf-submit {
    margin-top: 10px;
    padding: 15px;
    background: linear-gradient(135deg, var(--caramel), var(--latte));
    color: var(--white);
    border: none;
    border-radius: 10px;
    font-family: 'Nunito', sans-serif;
    font-weight: 800;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 8px 25px rgba(156,94,40,0.13);
    letter-spacing: 0.2px;
  }
  .cf-submit:hover {
    filter: brightness(1.08);
    transform: translateY(-1px) scale(1.03);
  }
  .cf-note {
    font-size: 0.78rem;
    color: var(--muted);
    text-align: center;
    margin-top: 8px;
  }
  @media (max-width: 700px) {
    .contact-form-area {
      max-width: 100%;
      padding: 18px 6vw 12px 6vw;
    }
  }

  /* ─── FOOTER ─── */
  footer { background: var(--espresso); padding: 56px 6vw 30px; }
  .footer-grid { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 40px; margin-bottom: 44px; }
  .footer-brand-col { max-width: 270px; }
  .footer-logo { display: flex; align-items: center; gap: 10px; margin-bottom: 12px; }
  .footer-logo span { font-family: 'Playfair Display', serif; font-weight: 900; font-size: 1.3rem; color: var(--foam); }
  .footer-logo em { font-style: normal; color: var(--honey); }
  .footer-tagline { font-size: 0.84rem; color: rgba(251,245,236,0.4); line-height: 1.7; }
  .footer-col h4 { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 0.85rem; color: rgba(251,245,236,0.5); text-transform: uppercase; letter-spacing: 1px; margin-bottom: 16px; }
  .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }
  .footer-col a { font-size: 0.86rem; color: rgba(251,245,236,0.55); text-decoration: none; transition: color 0.2s; }
  .footer-col a:hover { color: var(--honey); }
  .footer-bottom { border-top: 1px solid rgba(200,135,74,0.1); padding-top: 24px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
  .footer-copy { font-size: 0.78rem; color: rgba(251,245,236,0.3); }
  .footer-link { font-size: 0.78rem; color: var(--honey); font-weight: 700; text-decoration: none; }

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
    .number-item { border-right: none; border-bottom: 1px solid rgba(200,135,74,0.1); }
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
    <div class="logo-icon">☕</div>
    Coffee<em class="accent">Hand</em>
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
    <div class="hero-eyebrow"><div class="eyebrow-dot"></div>NOVO SISTEMA PDV</div>
    <h1>Venda mais.<br>Desperdice <em>menos.</em><br>Cresça sempre.</h1>
    <p class="hero-sub">Sistema completo para cafeterias e padarias. Pedidos, caixa, NFC-e, estoque e muito mais — tudo em uma tela simples e rápida.</p>
    <div class="hero-actions">
      <button class="btn-primary" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">
        ☕ Solicitar demonstração grátis
      </button>
      <button class="btn-outline" onclick="document.getElementById('modulos').scrollIntoView({behavior:'smooth'})">
        Ver módulos ↓
      </button>
    </div>
    <div class="hero-proof">
      <div class="proof-item"><div class="proof-num">800+</div><div class="proof-label">Negócios ativos</div></div>
      <div class="proof-sep"></div>
      <div class="proof-item"><div class="proof-num">99%</div><div class="proof-label">Uptime garantido</div></div>
      <div class="proof-sep"></div>
      <div class="proof-item"><div class="proof-num">30s</div><div class="proof-label">Tempo médio de venda</div></div>
    </div>
  </div>

  <!-- POS MOCKUP -->
  <div class="steam-wrap">
    <div class="pos-mockup">
      <div class="pos-topbar">
        <div class="pos-brand">☕ CoffeeHand PDV</div>
        <div class="pos-time">Mesa 04 · 09:47</div>
      </div>
      <div class="pos-order-items">
        <div class="pos-item">
          <div class="pos-item-left"><div class="pos-item-emoji">☕</div><div><div class="pos-item-name">Cappuccino Grande</div><div class="pos-item-qty">x2</div></div></div>
          <div class="pos-item-price">R$ 19,00</div>
        </div>
        <div class="pos-item">
          <div class="pos-item-left"><div class="pos-item-emoji">🥐</div><div><div class="pos-item-name">Croissant de Presunto</div><div class="pos-item-qty">x1</div></div></div>
          <div class="pos-item-price">R$ 12,50</div>
        </div>
        <div class="pos-item">
          <div class="pos-item-left"><div class="pos-item-emoji">🍰</div><div><div class="pos-item-name">Fatia de Bolo Brownie</div><div class="pos-item-qty">x1</div></div></div>
          <div class="pos-item-price">R$ 15,00</div>
        </div>
      </div>
      <div class="pos-divider"></div>
      <div class="pos-total">
        <div class="pos-total-label">TOTAL DO PEDIDO</div>
        <div class="pos-total-val">R$ 46,50</div>
      </div>
      <div class="pos-btns">
        <button class="pos-btn pos-btn-pix">⚡ PIX Instantâneo</button>
        <button class="pos-btn pos-btn-nfc">💳 Cartão / NFC</button>
      </div>
      <div class="pos-stats">
        <div class="pos-stat"><div class="pos-stat-val">R$ 2.8k</div><div class="pos-stat-lbl">Hoje</div></div>
        <div class="pos-stat"><div class="pos-stat-val">47</div><div class="pos-stat-lbl">Pedidos</div></div>
        <div class="pos-stat"><div class="pos-stat-val">98%</div><div class="pos-stat-lbl">Pagos</div></div>
      </div>
    </div>
  </div>
</section>

<!-- STRIP -->
<div class="strip">
  <div class="strip-inner">
    <div class="strip-item">☕ Pedidos rápidos <span>·</span></div>
    <div class="strip-item">🧾 NFC-e integrado <span>·</span></div>
    <div class="strip-item">📦 Estoque em tempo real <span>·</span></div>
    <div class="strip-item">💳 PIX e Cartão <span>·</span></div>
    <div class="strip-item">📊 Relatórios detalhados <span>·</span></div>
    <div class="strip-item">🔒 Dados protegidos <span>·</span></div>
    <div class="strip-item">☕ Pedidos rápidos <span>·</span></div>
    <div class="strip-item">🧾 NFC-e integrado <span>·</span></div>
    <div class="strip-item">📦 Estoque em tempo real <span>·</span></div>
    <div class="strip-item">💳 PIX e Cartão <span>·</span></div>
    <div class="strip-item">📊 Relatórios detalhados <span>·</span></div>
    <div class="strip-item">🔒 Dados protegidos <span>·</span></div>
  </div>
</div>

<!-- FEATURES -->
<section class="section features" id="funcionalidades">
  <div class="reveal">
    <div class="section-tag">Por que CoffeeHand</div>
    <div class="section-title">Um PDV feito para o<br>ritmo da sua cozinha</div>
    <p class="section-sub">Cada clique foi pensado para reduzir o tempo de atendimento e aumentar sua receita sem complicação.</p>
  </div>
  <div class="feat-layout">
    <div class="feat-visual reveal d1">
      <div class="menu-grid">
        <div class="menu-item"><div class="menu-emoji">☕</div><div class="menu-name">Café Latte</div><div class="menu-price">R$ 12,00</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">2</div><button class="qty-btn">+</button></div></div>
        <div class="menu-item"><div class="menu-emoji">🥐</div><div class="menu-name">Croissant</div><div class="menu-price">R$ 8,50</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">1</div><button class="qty-btn">+</button></div></div>
        <div class="menu-item"><div class="menu-emoji">🍞</div><div class="menu-name">Pão de Queijo</div><div class="menu-price">R$ 5,00</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">3</div><button class="qty-btn">+</button></div></div>
        <div class="menu-item"><div class="menu-emoji">🍰</div><div class="menu-name">Bolo Brownie</div><div class="menu-price">R$ 15,00</div><div class="menu-qty"><button class="qty-btn">−</button><div class="qty-num">1</div><button class="qty-btn">+</button></div></div>
      </div>
      <div class="order-summary">
        <div class="order-row"><span class="order-row-name">2× Café Latte</span><span class="order-row-val">R$ 24,00</span></div>
        <div class="order-row"><span class="order-row-name">1× Croissant</span><span class="order-row-val">R$ 8,50</span></div>
        <div class="order-row"><span class="order-row-name">3× Pão de Queijo</span><span class="order-row-val">R$ 15,00</span></div>
        <div class="order-row"><span class="order-row-name">1× Bolo Brownie</span><span class="order-row-val">R$ 15,00</span></div>
        <div class="order-total-row"><span class="order-total-lbl">Total</span><span class="order-total-val">R$ 62,50</span></div>
      </div>
    </div>
    <div class="feat-list reveal d2">
      <div class="feat-item">
        <div class="feat-num">☕</div>
        <div class="feat-body">
          <div class="feat-title">Pedidos no balcão em segundos</div>
          <p class="feat-desc">Interface intuitiva otimizada para toque. Monte pedidos, aplique promoções e encaminhe para a cozinha sem sair da tela.</p>
        </div>
      </div>
      <div class="feat-item">
        <div class="feat-num">💳</div>
        <div class="feat-body">
          <div class="feat-title">Caixa com todos os meios de pagamento</div>
          <p class="feat-desc">PIX instantâneo, cartão de débito/crédito, dinheiro e voucher. Fechamento automático com relatório diário.</p>
        </div>
      </div>
      <div class="feat-item">
        <div class="feat-num">🧾</div>
        <div class="feat-body">
          <div class="feat-title">NFC-e integrado e sem complicação</div>
          <p class="feat-desc">Emita notas fiscais de consumidor com um toque. Conferência automática e envio por e-mail ou WhatsApp para o cliente.</p>
        </div>
      </div>
      <div class="feat-item">
        <div class="feat-num">📦</div>
        <div class="feat-body">
          <div class="feat-title">Estoque que se atualiza sozinho</div>
          <p class="feat-desc">A cada venda o estoque baixa automaticamente. Alertas de reposição antes de faltar e histórico completo de movimentações.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MODULES -->
<section class="section modules" id="modulos">
  <div class="reveal" style="text-align:center">
    <div class="section-tag">Módulos</div>
    <div class="section-title">Tudo que sua cafeteria precisa</div>
    <p class="section-sub" style="margin:0 auto">Cada módulo foi construído para o dia a dia de quem trabalha na linha de frente — rápido, simples e confiável.</p>
  </div>
  <div class="modules-grid">
    <div class="module-card reveal d1">
      <div class="module-icon">🛒</div>
      <div class="module-title">Pedidos e Balcão</div>
      <p class="module-text">Atendimento ágil com cardápio visual, combos, meia entrada e controle de fila. Menos espera, mais vendas.</p>
      <div class="module-pills"><span class="pill">Cardápio</span><span class="pill">Combos</span><span class="pill">Fila</span></div>
    </div>
    <div class="module-card reveal d2">
      <div class="module-icon">💰</div>
      <div class="module-title">Caixa e Vendas</div>
      <p class="module-text">Controle rápido do recebimento, múltiplos operadores, sangria, suprimento e relatório de fechamento de caixa.</p>
      <div class="module-pills"><span class="pill">PIX</span><span class="pill">Cartão</span><span class="pill">Dinheiro</span></div>
    </div>
    <div class="module-card reveal d3">
      <div class="module-icon">🧾</div>
      <div class="module-title">NFC-e e Fiscal</div>
      <p class="module-text">Emissão de nota fiscal do consumidor com homologação automática. Contingência offline para nunca parar de vender.</p>
      <div class="module-pills"><span class="pill">NFC-e</span><span class="pill">XML</span><span class="pill">SAT</span></div>
    </div>
    <div class="module-card reveal d1">
      <div class="module-icon">📦</div>
      <div class="module-title">Estoque e Produtos</div>
      <p class="module-text">Cadastro de produtos com fichas técnicas, controle de validade, alertas de reposição e inventário simplificado.</p>
      <div class="module-pills"><span class="pill">Alertas</span><span class="pill">Validade</span><span class="pill">Receitas</span></div>
    </div>
    <div class="module-card reveal d2">
      <div class="module-icon">📊</div>
      <div class="module-title">Relatórios e DRE</div>
      <p class="module-text">Visão completa do seu negócio: curva ABC, produtos mais vendidos, horários de pico e margem de contribuição.</p>
      <div class="module-pills"><span class="pill">DRE</span><span class="pill">ABC</span><span class="pill">Exportar</span></div>
    </div>
    <div class="module-card reveal d3">
      <div class="module-icon">📱</div>
      <div class="module-title">App para Gestão</div>
      <p class="module-text">Acompanhe vendas, estoque e equipe em tempo real de qualquer lugar pelo celular. Notificações de fechamento automáticas.</p>
      <div class="module-pills"><span class="pill">iOS</span><span class="pill">Android</span><span class="pill">Tempo real</span></div>
    </div>
  </div>
</section>

<!-- NUMBERS -->
<div class="numbers">
  <div class="numbers-grid">
    <div class="number-item reveal"><div class="number-val">800+</div><div class="number-label">Cafeterias e padarias</div></div>
    <div class="number-item reveal d1"><div class="number-val">4M+</div><div class="number-label">Pedidos processados/mês</div></div>
    <div class="number-item reveal d2"><div class="number-val">30s</div><div class="number-label">Tempo médio de venda</div></div>
    <div class="number-item reveal d3"><div class="number-val">99.9%</div><div class="number-label">Disponibilidade do sistema</div></div>
  </div>
</div>

<!-- TESTIMONIALS -->
<section class="section testimonials">
  <div class="reveal" style="text-align:center">
    <div class="section-tag">Depoimentos</div>
    <div class="section-title">Donos que transformaram<br>seu negócio com CoffeeHand</div>
  </div>
  <div class="testi-grid">
    <div class="testi-card reveal d1">
      <div class="testi-stars">★★★★★</div>
      <div class="testi-quote">"</div>
      <p class="testi-text">O caixa ficou três vezes mais rápido depois do CoffeeHand. Na hora do rush da manhã, isso faz toda a diferença. As filas sumiram e os clientes perceberam. Faturamento subiu 22% no primeiro mês.</p>
      <div class="testi-author">
        <div class="testi-av">MF</div>
        <div><div class="testi-name">Marina Ferreira</div><div class="testi-role">Proprietária — Café Aromas, Niterói/RJ</div></div>
      </div>
    </div>
    <div class="testi-card reveal d2">
      <div class="testi-stars">★★★★★</div>
      <div class="testi-quote">"</div>
      <p class="testi-text">A emissão de NFC-e era o meu maior pesadelo antes. Hoje saio com nota em 2 cliques. O suporte da equipe CoffeeHand me ajudou a configurar tudo em menos de uma hora. Recomendo demais.</p>
      <div class="testi-author">
        <div class="testi-av" style="background:var(--roast)">JP</div>
        <div><div class="testi-name">João Pedro Alves</div><div class="testi-role">Gerente — Padaria Trigo & Arte</div></div>
      </div>
    </div>
    <div class="testi-card reveal d3">
      <div class="testi-stars">★★★★★</div>
      <div class="testi-quote">"</div>
      <p class="testi-text">Controlo 2 unidades pelo app enquanto estou em casa. Vejo as vendas em tempo real, o estoque e os fechamentos de caixa. Nunca mais fui surpreendido por falta de produto no fim de semana.</p>
      <div class="testi-author">
        <div class="testi-av" style="background:var(--green)">RL</div>
        <div><div class="testi-name">Roberta Lima</div><div class="testi-role">Empreendedora — 2 cafeterias, SP</div></div>
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
      <div class="plan-tier">Básico</div>
      <div class="plan-price">R$ 149<sub>/mês</sub></div>
      <div class="plan-desc">Ideal para quiosques e cafés pequenos</div>
      <div class="plan-hr"></div>
      <ul class="plan-feats">
        <li><span class="check-icon">✓</span> PDV com 1 operador</li>
        <li><span class="check-icon">✓</span> Pedidos e caixa</li>
        <li><span class="check-icon">✓</span> Relatórios básicos</li>
        <li><span class="check-icon">✓</span> Suporte por chat</li>
        <li><span class="check-icon">✓</span> App de consulta</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Começar agora</button>
    </div>
    <div class="plan hot reveal d2">
      <div class="hot-badge">☕ MAIS PEDIDO</div>
      <div class="plan-tier">Profissional</div>
      <div class="plan-price">R$ 299<sub>/mês</sub></div>
      <div class="plan-desc">Para cafeterias e padarias em crescimento</div>
      <div class="plan-hr"></div>
      <ul class="plan-feats">
        <li><span class="check-icon">✓</span> Tudo do Básico</li>
        <li><span class="check-icon">✓</span> NFC-e ilimitado</li>
        <li><span class="check-icon">✓</span> Controle de estoque</li>
        <li><span class="check-icon">✓</span> Até 3 operadores</li>
        <li><span class="check-icon">✓</span> Relatórios completos + DRE</li>
        <li><span class="check-icon">✓</span> Suporte prioritário</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Começar agora</button>
    </div>
    <div class="plan reveal d3">
      <div class="plan-tier">Rede</div>
      <div class="plan-price">Sob<sub> consulta</sub></div>
      <div class="plan-desc">Múltiplas unidades e franquias</div>
      <div class="plan-hr"></div>
      <ul class="plan-feats">
        <li><span class="check-icon">✓</span> Tudo do Profissional</li>
        <li><span class="check-icon">✓</span> Múltiplas unidades</li>
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
    <button class="btn-primary">☕ Quero testar grátis</button>
  </div>
  <p class="cta-note reveal d3">✓ Sem compromisso &nbsp;·&nbsp; ✓ Suporte incluso &nbsp;·&nbsp; ✓ Dados protegidos (LGPD)</p>
</section>

<!-- CONTACT -->
<section class="contact" id="contato">
  <div class="contact-grid">
    <div>
      <div class="section-tag">Contato</div>
      <h2>Fale com nossa<br>equipe agora</h2>
      <p class="contact-desc">Agende uma demonstração gratuita e veja como o CoffeeHand funciona na prática no seu negócio. Retornamos em até 2 horas.</p>
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
        <form id="coffee-contact-form">
          <input class="cf" type="text" name="nome" placeholder="Seu nome" required>
          <input class="cf" type="email" name="email" placeholder="E-mail" required>
          <input class="cf" type="tel" name="telefone" placeholder="WhatsApp">
          <input class="cf" type="text" name="extra" placeholder="Nome do negócio (cafeteria, padaria, quiosque...)" required>
          <select class="cf" name="mensagem">
            <option value="" disabled selected>Quantos caixas você precisa?</option>
            <option>1 caixa</option>
            <option>2 a 3 caixas</option>
            <option>4 ou mais caixas</option>
            <option>Múltiplas unidades</option>
          </select>
          <button class="cf-submit" id="submit-btn" type="submit">☕ Solicitar demonstração gratuita →</button>
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
        <div class="logo-icon" style="width:30px;height:30px;font-size:0.95rem">☕</div>
        <span>Coffee<em>Hand</em></span>
      </div>
      <p class="footer-tagline">Sistema completo para cafeterias e padarias. Venda mais, desperdice menos, cresça sempre.</p>
    </div>
    <div class="footer-col">
      <h4>Sistema</h4>
      <ul>
        <li><a href="#funcionalidades">PDV e Pedidos</a></li>
        <li><a href="#modulos">NFC-e Fiscal</a></li>
        <li><a href="#modulos">Estoque</a></li>
        <li><a href="#modulos">Relatórios</a></li>
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
    <div class="footer-copy">© 2025 CoffeeHand. Todos os direitos reservados.</div>
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
      if(this.textContent === '+') val = Math.min(val + 1, 9);
      else val = Math.max(val - 1, 0);
      numEl.textContent = val;
    });
  });

  // Form submit AJAX para contato (SMTP)
  const coffeeForm = document.getElementById('coffee-contact-form');
  if (coffeeForm) {
    coffeeForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const btn = coffeeForm.querySelector('.cf-submit');
      btn.textContent = 'Enviando...';
      btn.disabled = true;
      const formData = new FormData(coffeeForm);
      fetch('send-contact-smtp.php', {
        method: 'POST',
        body: formData
      })
      .then(r => r.text())
      .then(resp => {
        if (resp.trim() === 'OK') {
          btn.textContent = '✓ Solicitação enviada! Entraremos em contato em breve.';
          btn.style.background = 'linear-gradient(135deg, #4A7C59, #3A6649)';
        } else {
          btn.textContent = resp;
          btn.style.background = '#d32f2f';
          btn.disabled = false;
        }
      })
      .catch(() => {
        btn.textContent = 'Erro ao enviar. Tente novamente.';
        btn.style.background = '#d32f2f';
        btn.disabled = false;
      });
    });
  }

  // CTA button
  document.querySelector('.cta-form .btn-primary').addEventListener('click', function() {
    this.textContent = '✓ Confira seu e-mail!';
    this.style.background = 'linear-gradient(135deg, #4A7C59, #3A6649)';
  });
</script>
</body>
</html>
