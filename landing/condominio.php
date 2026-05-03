<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CondoHand — Sistema de Gestão Condominial</title>
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
<style>
  :root {
    --navy: #0D1B3E;
    --navy-mid: #162650;
    --blue: #1A3A8F;
    --accent: #2E6AF6;
    --sky: #5B9BFF;
    --cream: #F5F2EC;
    --warm: #EDE8DD;
    --gold: #D4A84B;
    --text: #0D1B3E;
    --muted: #6B7BA4;
    --white: #FFFFFF;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

  html { scroll-behavior: smooth; }

  body {
    font-family: 'DM Sans', sans-serif;
    background: var(--cream);
    color: var(--text);
    overflow-x: hidden;
  }

  /* ─── NAV ─── */
  nav {
    position: fixed; top: 0; left: 0; right: 0; z-index: 100;
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 6vw;
    background: rgba(13,27,62,0.96);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid rgba(255,255,255,0.06);
  }
  .nav-logo {
    display: flex; align-items: center; gap: 10px;
    font-family: 'Sora', sans-serif; font-weight: 800;
    font-size: 1.35rem; color: var(--white); letter-spacing: -0.5px;
  }
  .nav-logo .dot { color: var(--sky); }
  .nav-icon {
    width: 34px; height: 34px; background: var(--accent);
    border-radius: 8px; display: grid; place-items: center;
  }
  .nav-links { display: flex; gap: 32px; list-style: none; }
  .nav-links a {
    font-size: 0.88rem; color: rgba(255,255,255,0.7);
    text-decoration: none; font-weight: 500; transition: color 0.2s;
  }
  .nav-links a:hover { color: var(--white); }
  .nav-cta {
    background: var(--accent); color: var(--white);
    border: none; padding: 10px 22px; border-radius: 50px;
    font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.85rem;
    cursor: pointer; transition: background 0.2s, transform 0.15s;
  }
  .nav-cta:hover { background: var(--sky); transform: scale(1.03); }

  /* ─── HERO ─── */
  .hero {
    min-height: 100vh;
    background: linear-gradient(145deg, var(--navy) 0%, var(--navy-mid) 50%, #0E2070 100%);
    display: flex; align-items: center;
    padding: 120px 6vw 80px;
    position: relative; overflow: hidden;
  }
  .hero::before {
    content: '';
    position: absolute; inset: 0;
    background: radial-gradient(ellipse 80% 60% at 70% 50%, rgba(46,106,246,0.18) 0%, transparent 70%);
  }
  .hero-grid {
    position: absolute; inset: 0;
    background-image:
      linear-gradient(rgba(91,155,255,0.05) 1px, transparent 1px),
      linear-gradient(90deg, rgba(91,155,255,0.05) 1px, transparent 1px);
    background-size: 60px 60px;
  }
  .hero-orb {
    position: absolute; border-radius: 50%;
    filter: blur(80px); pointer-events: none;
  }
  .orb1 { width: 500px; height: 500px; background: rgba(46,106,246,0.25); right: -100px; top: -100px; }
  .orb2 { width: 300px; height: 300px; background: rgba(91,155,255,0.12); left: 10%; bottom: 5%; }

  .hero-content { position: relative; z-index: 2; max-width: 620px; }
  .hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(46,106,246,0.2); border: 1px solid rgba(46,106,246,0.4);
    padding: 6px 16px; border-radius: 50px; margin-bottom: 28px;
    font-size: 0.8rem; font-weight: 600; color: var(--sky); letter-spacing: 0.5px;
    animation: fadeUp 0.6s ease both;
  }
  .badge-dot { width: 6px; height: 6px; background: var(--sky); border-radius: 50%; animation: pulse 2s infinite; }
  @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:0.5;transform:scale(0.8)} }

  .hero h1 {
    font-family: 'Sora', sans-serif; font-weight: 800;
    font-size: clamp(2.4rem, 5vw, 3.8rem); line-height: 1.1;
    color: var(--white); margin-bottom: 22px; letter-spacing: -1.5px;
    animation: fadeUp 0.6s 0.1s ease both;
  }
  .hero h1 .highlight {
    background: linear-gradient(135deg, var(--sky), var(--gold));
    -webkit-background-clip: text; -webkit-text-fill-color: transparent;
  }
  .hero p {
    font-size: 1.1rem; line-height: 1.7; color: rgba(255,255,255,0.72);
    margin-bottom: 40px; max-width: 500px;
    animation: fadeUp 0.6s 0.2s ease both;
  }
  .hero-actions {
    display: flex; gap: 16px; flex-wrap: wrap;
    animation: fadeUp 0.6s 0.3s ease both;
  }
  .btn-primary {
    background: var(--accent); color: var(--white);
    padding: 15px 32px; border-radius: 50px; border: none;
    font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.95rem;
    cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 8px;
    box-shadow: 0 8px 30px rgba(46,106,246,0.4);
  }
  .btn-primary:hover { background: var(--sky); transform: translateY(-2px); box-shadow: 0 12px 40px rgba(46,106,246,0.5); }
  .btn-secondary {
    background: transparent; color: var(--white);
    padding: 15px 32px; border-radius: 50px; border: 1px solid rgba(255,255,255,0.25);
    font-family: 'Sora', sans-serif; font-weight: 600; font-size: 0.95rem;
    cursor: pointer; transition: all 0.2s; display: flex; align-items: center; gap: 8px;
  }
  .btn-secondary:hover { background: rgba(255,255,255,0.08); border-color: rgba(255,255,255,0.5); }

  .hero-stats {
    display: flex; gap: 40px; margin-top: 60px; flex-wrap: wrap;
    animation: fadeUp 0.6s 0.4s ease both;
  }
  .stat { border-left: 2px solid var(--accent); padding-left: 18px; }
  .stat-num {
    font-family: 'Sora', sans-serif; font-weight: 800; font-size: 1.8rem;
    color: var(--white); line-height: 1;
  }
  .stat-label { font-size: 0.8rem; color: rgba(255,255,255,0.5); margin-top: 4px; }

  .hero-visual {
    position: absolute; right: 5vw; top: 50%; transform: translateY(-50%);
    width: 420px; z-index: 2;
    animation: fadeIn 0.9s 0.4s ease both;
  }
  .dashboard-mockup {
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 20px; padding: 24px;
    backdrop-filter: blur(20px);
    box-shadow: 0 40px 80px rgba(0,0,0,0.4);
  }
  .mock-header {
    display: flex; align-items: center; justify-content: space-between;
    margin-bottom: 20px;
  }
  .mock-title { font-family: 'Sora', sans-serif; font-weight: 700; color: var(--white); font-size: 0.9rem; }
  .mock-dots { display: flex; gap: 5px; }
  .mock-dot { width: 8px; height: 8px; border-radius: 50%; }
  .md1{background:#FF5F57;} .md2{background:#FEBC2E;} .md3{background:#28C840;}

  .mock-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; margin-bottom: 16px; }
  .mock-card {
    background: rgba(255,255,255,0.08); border-radius: 12px; padding: 14px;
    border: 1px solid rgba(255,255,255,0.08);
  }
  .mock-card-label { font-size: 0.7rem; color: rgba(255,255,255,0.5); margin-bottom: 6px; }
  .mock-card-value { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1.2rem; color: var(--white); }
  .mock-card-sub { font-size: 0.65rem; color: #4CAF50; margin-top: 3px; }

  .mock-chart { background: rgba(255,255,255,0.04); border-radius: 10px; padding: 12px; height: 80px; position: relative; overflow: hidden; }
  .mock-bars { display: flex; align-items: flex-end; gap: 4px; height: 100%; }
  .mock-bar { flex: 1; border-radius: 3px 3px 0 0; opacity: 0.8; }

  .mock-list { margin-top: 14px; }
  .mock-item {
    display: flex; align-items: center; gap: 10px;
    padding: 8px 0; border-bottom: 1px solid rgba(255,255,255,0.06);
  }
  .mock-item:last-child { border: none; }
  .mock-avatar { width: 28px; height: 28px; border-radius: 50%; background: var(--accent); display: grid; place-items: center; font-size: 0.65rem; font-weight: 700; color: var(--white); flex-shrink: 0; }
  .mock-item-text { flex: 1; }
  .mock-item-name { font-size: 0.75rem; color: var(--white); font-weight: 500; }
  .mock-item-sub { font-size: 0.65rem; color: rgba(255,255,255,0.4); }
  .mock-badge { padding: 3px 8px; border-radius: 50px; font-size: 0.6rem; font-weight: 600; }
  .badge-ok { background: rgba(76,175,80,0.2); color: #4CAF50; }
  .badge-pend { background: rgba(255,193,7,0.2); color: #FFC107; }
  .badge-at { background: rgba(46,106,246,0.2); color: var(--sky); }

  @keyframes fadeUp { from{opacity:0;transform:translateY(24px)} to{opacity:1;transform:translateY(0)} }
  @keyframes fadeIn { from{opacity:0;transform:translateY(-50%) scale(0.95)} to{opacity:1;transform:translateY(-50%) scale(1)} }

  /* ─── LOGOS STRIP ─── */
  .strip {
    background: var(--navy); padding: 20px 6vw;
    border-top: 1px solid rgba(255,255,255,0.06);
    border-bottom: 1px solid rgba(255,255,255,0.06);
    display: flex; align-items: center; gap: 40px; overflow: hidden;
  }
  .strip-label { font-size: 0.78rem; color: rgba(255,255,255,0.35); white-space: nowrap; font-weight: 500; letter-spacing: 0.5px; }
  .strip-logos { display: flex; gap: 48px; align-items: center; animation: scroll 20s linear infinite; white-space: nowrap; }
  .strip-logo { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.85rem; color: rgba(255,255,255,0.3); letter-spacing: 1px; }
  @keyframes scroll { from{transform:translateX(0)} to{transform:translateX(-50%)} }

  /* ─── FEATURES ─── */
  .section { padding: 100px 6vw; }
  .section-label {
    display: inline-block; font-size: 0.75rem; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase; color: var(--accent);
    margin-bottom: 14px;
  }
  .section-title {
    font-family: 'Sora', sans-serif; font-weight: 800;
    font-size: clamp(1.8rem, 3.5vw, 2.8rem); letter-spacing: -1px;
    color: var(--navy); line-height: 1.15; margin-bottom: 16px;
  }
  .section-sub { font-size: 1.05rem; color: var(--muted); max-width: 520px; line-height: 1.7; }

  .features-grid {
    display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 24px; margin-top: 64px;
  }
  .feature-card {
    background: var(--white); border-radius: 20px; padding: 32px;
    border: 1px solid rgba(13,27,62,0.08);
    transition: transform 0.25s, box-shadow 0.25s;
    position: relative; overflow: hidden;
  }
  .feature-card::before {
    content: ''; position: absolute; top: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--accent), var(--sky));
    opacity: 0; transition: opacity 0.25s;
  }
  .feature-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(13,27,62,0.1); }
  .feature-card:hover::before { opacity: 1; }
  .feat-icon {
    width: 52px; height: 52px; border-radius: 14px;
    background: linear-gradient(135deg, var(--accent), var(--blue));
    display: grid; place-items: center; margin-bottom: 20px; font-size: 1.3rem;
  }
  .feat-title { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1.05rem; color: var(--navy); margin-bottom: 10px; }
  .feat-text { font-size: 0.9rem; color: var(--muted); line-height: 1.65; }
  .feat-tags { display: flex; flex-wrap: wrap; gap: 7px; margin-top: 18px; }
  .feat-tag {
    padding: 4px 12px; border-radius: 50px; font-size: 0.72rem; font-weight: 600;
    background: rgba(46,106,246,0.08); color: var(--accent); border: 1px solid rgba(46,106,246,0.15);
  }

  /* ─── HOW IT WORKS ─── */
  .how { background: var(--navy); padding: 100px 6vw; }
  .how .section-title { color: var(--white); }
  .how .section-sub { color: rgba(255,255,255,0.55); }
  .steps { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 0; margin-top: 64px; position: relative; }
  .steps::before {
    content: ''; position: absolute; top: 34px; left: 15%; right: 15%; height: 2px;
    background: linear-gradient(90deg, var(--accent), var(--sky));
    z-index: 0;
  }
  .step { text-align: center; padding: 0 20px; position: relative; z-index: 1; }
  .step-num {
    width: 68px; height: 68px; border-radius: 50%;
    background: var(--navy-mid); border: 2px solid var(--accent);
    display: grid; place-items: center; margin: 0 auto 24px;
    font-family: 'Sora', sans-serif; font-weight: 800; font-size: 1.4rem; color: var(--sky);
    position: relative;
  }
  .step-num::after {
    content: ''; position: absolute; inset: -6px; border-radius: 50%;
    border: 1px solid rgba(46,106,246,0.25);
  }
  .step-title { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 1rem; color: var(--white); margin-bottom: 10px; }
  .step-text { font-size: 0.87rem; color: rgba(255,255,255,0.5); line-height: 1.6; }

  /* ─── TESTIMONIALS ─── */
  .testimonials { background: var(--warm); padding: 100px 6vw; }
  .testi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; margin-top: 56px; }
  .testi-card {
    background: var(--white); border-radius: 20px; padding: 32px;
    border: 1px solid rgba(13,27,62,0.07);
    transition: transform 0.2s;
  }
  .testi-card:hover { transform: translateY(-4px); }
  .stars { color: var(--gold); font-size: 0.9rem; letter-spacing: 2px; margin-bottom: 16px; }
  .testi-text { font-size: 0.95rem; color: #3D4A6B; line-height: 1.75; font-style: italic; margin-bottom: 24px; }
  .testi-author { display: flex; align-items: center; gap: 12px; }
  .testi-avatar {
    width: 42px; height: 42px; border-radius: 50%;
    background: linear-gradient(135deg, var(--accent), var(--sky));
    display: grid; place-items: center; font-weight: 700; font-size: 0.9rem; color: var(--white);
  }
  .testi-name { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.88rem; color: var(--navy); }
  .testi-role { font-size: 0.78rem; color: var(--muted); }

  /* ─── PRICING ─── */
  .pricing { padding: 100px 6vw; }
  .pricing-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-top: 56px; max-width: 1000px; margin-left: auto; margin-right: auto; }
  .plan {
    border-radius: 24px; padding: 40px 32px;
    border: 1px solid rgba(13,27,62,0.1);
    background: var(--white); position: relative; transition: transform 0.25s;
  }
  .plan:hover { transform: translateY(-6px); }
  .plan.featured {
    background: var(--navy); border-color: var(--navy);
    box-shadow: 0 30px 80px rgba(13,27,62,0.25);
    transform: scale(1.04);
  }
  .plan.featured:hover { transform: scale(1.04) translateY(-6px); }
  .popular-badge {
    position: absolute; top: -14px; left: 50%; transform: translateX(-50%);
    background: linear-gradient(135deg, var(--accent), var(--sky));
    color: var(--white); font-size: 0.72rem; font-weight: 700; letter-spacing: 1px;
    padding: 5px 18px; border-radius: 50px; white-space: nowrap;
  }
  .plan-name { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.85rem; letter-spacing: 1px; text-transform: uppercase; color: var(--accent); margin-bottom: 12px; }
  .plan.featured .plan-name { color: var(--sky); }
  .plan-price { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 2.8rem; color: var(--navy); line-height: 1; margin-bottom: 6px; }
  .plan.featured .plan-price { color: var(--white); }
  .plan-price span { font-size: 1rem; font-weight: 400; color: var(--muted); }
  .plan.featured .plan-price span { color: rgba(255,255,255,0.5); }
  .plan-sub { font-size: 0.82rem; color: var(--muted); margin-bottom: 28px; }
  .plan.featured .plan-sub { color: rgba(255,255,255,0.5); }
  .plan-divider { height: 1px; background: rgba(13,27,62,0.08); margin-bottom: 24px; }
  .plan.featured .plan-divider { background: rgba(255,255,255,0.1); }
  .plan-features { list-style: none; display: flex; flex-direction: column; gap: 12px; margin-bottom: 32px; }
  .plan-features li { display: flex; align-items: center; gap: 10px; font-size: 0.88rem; color: #3D4A6B; }
  .plan.featured .plan-features li { color: rgba(255,255,255,0.8); }
  .check { color: #4CAF50; font-size: 0.85rem; }
  .plan-btn {
    width: 100%; padding: 14px; border-radius: 12px; border: 2px solid var(--accent);
    background: transparent; color: var(--accent); font-family: 'Sora', sans-serif;
    font-weight: 700; font-size: 0.9rem; cursor: pointer; transition: all 0.2s;
  }
  .plan-btn:hover { background: var(--accent); color: var(--white); }
  .plan.featured .plan-btn {
    background: var(--accent); color: var(--white); border-color: var(--accent);
    box-shadow: 0 8px 25px rgba(46,106,246,0.4);
  }
  .plan.featured .plan-btn:hover { background: var(--sky); border-color: var(--sky); }

  /* ─── CTA SECTION ─── */
  .cta-section {
    background: linear-gradient(135deg, var(--navy) 0%, #0E2070 100%);
    padding: 100px 6vw; text-align: center; position: relative; overflow: hidden;
  }
  .cta-section::before {
    content: ''; position: absolute; inset: 0;
    background: radial-gradient(ellipse 60% 80% at 50% 50%, rgba(46,106,246,0.2) 0%, transparent 70%);
  }
  .cta-section > * { position: relative; z-index: 1; }
  .cta-title {
    font-family: 'Sora', sans-serif; font-weight: 800;
    font-size: clamp(2rem, 4vw, 3.2rem); color: var(--white);
    letter-spacing: -1px; margin-bottom: 16px; line-height: 1.15;
  }
  .cta-sub { font-size: 1.05rem; color: rgba(255,255,255,0.65); max-width: 520px; margin: 0 auto 40px; line-height: 1.7; }
  .cta-form { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; max-width: 520px; margin: 0 auto; }
  .cta-input {
    flex: 1; min-width: 220px; padding: 15px 22px; border-radius: 50px;
    border: 1px solid rgba(255,255,255,0.15); background: rgba(255,255,255,0.08);
    color: var(--white); font-family: 'DM Sans', sans-serif; font-size: 0.95rem;
    outline: none; transition: border 0.2s;
    backdrop-filter: blur(10px);
  }
  .cta-input::placeholder { color: rgba(255,255,255,0.4); }
  .cta-input:focus { border-color: var(--sky); }
  .cta-guarantee { margin-top: 20px; font-size: 0.8rem; color: rgba(255,255,255,0.4); }
  .cta-guarantee span { color: rgba(255,255,255,0.7); }

  /* ─── CONTACT ─── */
  .contact { background: var(--warm); padding: 80px 6vw; }
  .contact-inner { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; max-width: 1000px; margin: 0 auto; }
  .contact h2 { font-family: 'Sora', sans-serif; font-weight: 800; font-size: 2rem; color: var(--navy); margin-bottom: 16px; letter-spacing: -0.5px; }
  .contact p { color: var(--muted); line-height: 1.7; margin-bottom: 32px; }
  .contact-items { display: flex; flex-direction: column; gap: 16px; }
  .contact-item { display: flex; align-items: center; gap: 14px; }
  .contact-icon {
    width: 44px; height: 44px; border-radius: 12px;
    background: linear-gradient(135deg, var(--accent), var(--blue));
    display: grid; place-items: center; font-size: 1.1rem; flex-shrink: 0;
  }
  .contact-detail { font-size: 0.9rem; color: var(--navy); font-weight: 500; }
  .contact-detail small { display: block; color: var(--muted); font-size: 0.78rem; margin-bottom: 2px; font-weight: 400; }
  .contact-form {
    display: flex;
    flex-direction: column;
    gap: 0;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 4px 32px rgba(13,27,62,0.07);
    padding: 32px 24px 18px 24px;
    margin-top: 18px;
    max-width: 420px;
    width: 100%;
  }
  .contact-form form {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }
  .form-field {
    padding: 14px 18px;
    border-radius: 10px;
    border: 1.5px solid rgba(13,27,62,0.13);
    background: #f9fafd;
    font-family: 'DM Sans', sans-serif;
    font-size: 0.97rem;
    color: var(--navy);
    outline: none;
    transition: border 0.2s, box-shadow 0.2s;
    margin-bottom: 2px;
  }
  .form-field:focus {
    border-color: var(--accent);
    box-shadow: 0 0 0 2px #e3eaff;
  }
  .form-field::placeholder { color: #A0AABF; }
  .form-submit {
    margin-top: 10px;
    padding: 15px;
    background: linear-gradient(135deg, var(--accent), var(--sky));
    color: var(--white);
    border: none;
    border-radius: 10px;
    font-family: 'Sora', sans-serif;
    font-weight: 700;
    font-size: 1.05rem;
    cursor: pointer;
    transition: all 0.2s;
    box-shadow: 0 8px 25px rgba(46,106,246,0.13);
    letter-spacing: 0.2px;
  }
  .form-submit:hover {
    filter: brightness(1.08);
    transform: translateY(-1px) scale(1.03);
  }
  @media (max-width: 700px) {
    .contact-form {
      max-width: 100%;
      padding: 18px 6vw 12px 6vw;
    }
  }

  /* ─── FOOTER ─── */
  footer {
    background: var(--navy); padding: 56px 6vw 32px;
    border-top: 1px solid rgba(255,255,255,0.06);
  }
  .footer-top { display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 40px; margin-bottom: 48px; }
  .footer-brand { max-width: 280px; }
  .footer-logo {
    display: flex; align-items: center; gap: 10px; margin-bottom: 14px;
    font-family: 'Sora', sans-serif; font-weight: 800; font-size: 1.2rem; color: var(--white);
  }
  .footer-desc { font-size: 0.85rem; color: rgba(255,255,255,0.45); line-height: 1.7; }
  .footer-links h4 { font-family: 'Sora', sans-serif; font-weight: 700; font-size: 0.8rem; letter-spacing: 1px; text-transform: uppercase; color: rgba(255,255,255,0.5); margin-bottom: 18px; }
  .footer-links ul { list-style: none; display: flex; flex-direction: column; gap: 10px; }
  .footer-links a { font-size: 0.87rem; color: rgba(255,255,255,0.6); text-decoration: none; transition: color 0.2s; }
  .footer-links a:hover { color: var(--white); }
  .footer-bottom { border-top: 1px solid rgba(255,255,255,0.07); padding-top: 28px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; }
  .footer-copy { font-size: 0.8rem; color: rgba(255,255,255,0.3); }
  .footer-site { font-size: 0.8rem; color: var(--sky); font-weight: 600; text-decoration: none; }

  /* ─── RESPONSIVE ─── */
  @media (max-width: 900px) {
    .hero-visual { display: none; }
    .hero-content { max-width: 100%; }
    .steps::before { display: none; }
    .contact-inner { grid-template-columns: 1fr; }
    .nav-links { display: none; }
  }
  @media (max-width: 600px) {
    .section, .how, .testimonials, .pricing, .cta-section, .contact { padding: 70px 5vw; }
    .plan.featured { transform: scale(1); }
  }

  /* ─── SCROLL ANIMATIONS ─── */
  .reveal {
    opacity: 0; transform: translateY(30px);
    transition: opacity 0.6s ease, transform 0.6s ease;
  }
  .reveal.visible { opacity: 1; transform: translateY(0); }
  .reveal-delay-1 { transition-delay: 0.1s; }
  .reveal-delay-2 { transition-delay: 0.2s; }
  .reveal-delay-3 { transition-delay: 0.3s; }
</style>
</head>
<body>

<!-- NAV -->
<nav>
  <div class="nav-logo">
    <div class="nav-icon">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round">
        <rect x="3" y="3" width="18" height="18" rx="3"/><path d="M9 3v18M15 9h3M15 15h3M3 9h6M3 15h6"/>
      </svg>
    </div>
    Condo<span class="dot">Hand</span>
  </div>
  <ul class="nav-links">
    <li><a href="#funcionalidades">Funcionalidades</a></li>
    <li><a href="#como-funciona">Como Funciona</a></li>
    <li><a href="#planos">Planos</a></li>
    <li><a href="#contato">Contato</a></li>
  </ul>
  <button class="nav-cta" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Demonstração grátis →</button>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-grid"></div>
  <div class="hero-orb orb1"></div>
  <div class="hero-orb orb2"></div>

  <div class="hero-content">
    <div class="hero-badge"><div class="badge-dot"></div> NOVO SISTEMA CONDOMINIAL</div>
    <h1>Seu condomínio<br><span class="highlight">mais organizado,</span><br>mais valorizado.</h1>
    <p>Gestão completa para síndicos, administradoras e moradores. Financeiro, comunicação, manutenção e muito mais — tudo em um só lugar.</p>
    <div class="hero-actions">
      <button class="btn-primary" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 3l14 9-14 9V3z"/></svg>
        Solicitar demonstração
      </button>
      <button class="btn-secondary" onclick="document.getElementById('funcionalidades').scrollIntoView({behavior:'smooth'})">
        Ver funcionalidades ↓
      </button>
    </div>
    <div class="hero-stats">
      <div class="stat"><div class="stat-num">500+</div><div class="stat-label">Condomínios ativos</div></div>
      <div class="stat"><div class="stat-num">98%</div><div class="stat-label">Satisfação dos clientes</div></div>
      <div class="stat"><div class="stat-num">24/7</div><div class="stat-label">Acesso de qualquer lugar</div></div>
    </div>
  </div>

  <div class="hero-visual">
    <div class="dashboard-mockup">
      <div class="mock-header">
        <div class="mock-title">📊 Painel CondoHand</div>
        <div class="mock-dots"><div class="mock-dot md1"></div><div class="mock-dot md2"></div><div class="mock-dot md3"></div></div>
      </div>
      <div class="mock-cards">
        <div class="mock-card">
          <div class="mock-card-label">ARRECADAÇÃO</div>
          <div class="mock-card-value">R$ 42.8k</div>
          <div class="mock-card-sub">↑ 12% este mês</div>
        </div>
        <div class="mock-card">
          <div class="mock-card-label">INADIMPLÊNCIA</div>
          <div class="mock-card-value">3.2%</div>
          <div class="mock-card-sub">↓ Melhorou 5%</div>
        </div>
        <div class="mock-card">
          <div class="mock-card-label">MORADORES</div>
          <div class="mock-card-value">148</div>
          <div class="mock-card-sub">↑ 4 novos</div>
        </div>
        <div class="mock-card">
          <div class="mock-card-label">CHAMADOS</div>
          <div class="mock-card-value">7</div>
          <div class="mock-card-sub">→ 3 em aberto</div>
        </div>
      </div>
      <div class="mock-chart">
        <div class="mock-bars">
          <div class="mock-bar" style="height:50%;background:var(--accent)"></div>
          <div class="mock-bar" style="height:70%;background:var(--accent)"></div>
          <div class="mock-bar" style="height:45%;background:var(--accent)"></div>
          <div class="mock-bar" style="height:90%;background:var(--sky)"></div>
          <div class="mock-bar" style="height:65%;background:var(--accent)"></div>
          <div class="mock-bar" style="height:80%;background:var(--accent)"></div>
          <div class="mock-bar" style="height:75%;background:var(--accent)"></div>
        </div>
      </div>
      <div class="mock-list">
        <div class="mock-item">
          <div class="mock-avatar">AP</div>
          <div class="mock-item-text"><div class="mock-item-name">Apto 201 — Reserva Salão</div><div class="mock-item-sub">Hoje, 14:00–18:00</div></div>
          <span class="mock-badge badge-ok">Confirmado</span>
        </div>
        <div class="mock-item">
          <div class="mock-avatar" style="background:#D4A84B">BL</div>
          <div class="mock-item-text"><div class="mock-item-name">Manutenção Portão</div><div class="mock-item-sub">Amanhã, 09:00</div></div>
          <span class="mock-badge badge-pend">Pendente</span>
        </div>
        <div class="mock-item">
          <div class="mock-avatar" style="background:#4CAF50">CO</div>
          <div class="mock-item-text"><div class="mock-item-name">Boleto Apto 305</div><div class="mock-item-sub">Vence em 3 dias</div></div>
          <span class="mock-badge badge-at">Atenção</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- LOGOS STRIP -->
<div class="strip">
  <div class="strip-label">CONFIADO POR</div>
  <div class="strip-logos">
    <div class="strip-logo">RESIDENCIAL VILLA</div>
    <div class="strip-logo">COND. PANORAMA</div>
    <div class="strip-logo">TORRES DO LAGO</div>
    <div class="strip-logo">GARDEN PARK</div>
    <div class="strip-logo">EDIF. MONACO</div>
    <div class="strip-logo">CENTRAL HOMES</div>
    <div class="strip-logo">RESIDENCIAL VILLA</div>
    <div class="strip-logo">COND. PANORAMA</div>
    <div class="strip-logo">TORRES DO LAGO</div>
    <div class="strip-logo">GARDEN PARK</div>
    <div class="strip-logo">EDIF. MONACO</div>
    <div class="strip-logo">CENTRAL HOMES</div>
  </div>
</div>

<!-- FEATURES -->
<section class="section" id="funcionalidades">
  <div class="reveal">
    <div class="section-label">Funcionalidades</div>
    <div class="section-title">Tudo que seu condomínio<br>precisa em um sistema</div>
    <p class="section-sub">Cada módulo foi pensado para simplificar a gestão e melhorar a experiência de síndicos, administradoras e moradores.</p>
  </div>
  <div class="features-grid">
    <div class="feature-card reveal reveal-delay-1">
      <div class="feat-icon">💰</div>
      <div class="feat-title">Financeiro e Cobrança</div>
      <p class="feat-text">Emissão de boletos, controle completo de inadimplência e conciliação bancária automática. Gestão financeira sem complicação.</p>
      <div class="feat-tags"><span class="feat-tag">Boletos</span><span class="feat-tag">Conciliação</span><span class="feat-tag">Relatórios</span></div>
    </div>
    <div class="feature-card reveal reveal-delay-2">
      <div class="feat-icon">💬</div>
      <div class="feat-title">Comunicação Eficiente</div>
      <p class="feat-text">Avisos, comunicados, reservas de áreas comuns e enquetes direto no app. Todos sempre informados e conectados.</p>
      <div class="feat-tags"><span class="feat-tag">Avisos</span><span class="feat-tag">Reservas</span><span class="feat-tag">Enquetes</span></div>
    </div>
    <div class="feature-card reveal reveal-delay-3">
      <div class="feat-icon">👥</div>
      <div class="feat-title">Gestão de Moradores</div>
      <p class="feat-text">Cadastro completo, controle de acesso por facial/QR, registro de veículos e visitantes com histórico detalhado.</p>
      <div class="feat-tags"><span class="feat-tag">Cadastro</span><span class="feat-tag">Acesso</span><span class="feat-tag">Visitantes</span></div>
    </div>
    <div class="feature-card reveal reveal-delay-1">
      <div class="feat-icon">🔧</div>
      <div class="feat-title">Manutenção e Serviços</div>
      <p class="feat-text">Ordens de serviço com acompanhamento em tempo real, histórico completo de manutenções e alertas preventivos.</p>
      <div class="feat-tags"><span class="feat-tag">OS</span><span class="feat-tag">Histórico</span><span class="feat-tag">Alertas</span></div>
    </div>
    <div class="feature-card reveal reveal-delay-2">
      <div class="feat-icon">📋</div>
      <div class="feat-title">Atas e Documentos</div>
      <p class="feat-text">Armazene e gerencie atas de assembleias, contratos e documentos do condomínio com segurança na nuvem.</p>
      <div class="feat-tags"><span class="feat-tag">Atas</span><span class="feat-tag">Contratos</span><span class="feat-tag">Nuvem</span></div>
    </div>
    <div class="feature-card reveal reveal-delay-3">
      <div class="feat-icon">📱</div>
      <div class="feat-title">App para Todos</div>
      <p class="feat-text">Aplicativo dedicado para síndicos, moradores e staff. Acesso fácil de qualquer lugar, a qualquer hora, com segurança total.</p>
      <div class="feat-tags"><span class="feat-tag">iOS</span><span class="feat-tag">Android</span><span class="feat-tag">Web</span></div>
    </div>
  </div>
</section>

<!-- HOW IT WORKS -->
<section class="how" id="como-funciona">
  <div class="reveal" style="text-align:center">
    <div class="section-label" style="color:var(--sky)">Como Funciona</div>
    <div class="section-title">Implantação simples,<br>resultado imediato</div>
    <p class="section-sub" style="margin:0 auto">Em menos de uma semana seu condomínio já está operando no CondoHand com toda a equipe treinada.</p>
  </div>
  <div class="steps">
    <div class="step reveal reveal-delay-1">
      <div class="step-num">01</div>
      <div class="step-title">Demonstração</div>
      <p class="step-text">Apresentamos o sistema completo, respondemos suas dúvidas e customizamos para o seu condomínio.</p>
    </div>
    <div class="step reveal reveal-delay-2">
      <div class="step-num">02</div>
      <div class="step-title">Cadastro e Configuração</div>
      <p class="step-text">Nossa equipe cuida de toda a implantação, importação de dados e personalização do sistema.</p>
    </div>
    <div class="step reveal reveal-delay-3">
      <div class="step-num">03</div>
      <div class="step-title">Treinamento</div>
      <p class="step-text">Capacitamos síndico, administradora e equipe para usar todas as funcionalidades com confiança.</p>
    </div>
    <div class="step reveal reveal-delay-1">
      <div class="step-num">04</div>
      <div class="step-title">Operação</div>
      <p class="step-text">Seu condomínio online com suporte dedicado e atualizações constantes sem custo adicional.</p>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials">
  <div class="reveal" style="text-align:center">
    <div class="section-label">Depoimentos</div>
    <div class="section-title">Síndicos que transformaram<br>sua gestão com CondoHand</div>
  </div>
  <div class="testi-grid">
    <div class="testi-card reveal reveal-delay-1">
      <div class="stars">★★★★★</div>
      <p class="testi-text">"A inadimplência do nosso condomínio caiu de 15% para menos de 3% em 4 meses. Os boletos automáticos e lembretes fizeram toda a diferença. Não consigo imaginar voltar à planilha."</p>
      <div class="testi-author">
        <div class="testi-avatar">CM</div>
        <div><div class="testi-name">Carlos Mendes</div><div class="testi-role">Síndico — Res. Panorama, RJ</div></div>
      </div>
    </div>
    <div class="testi-card reveal reveal-delay-2">
      <div class="stars">★★★★★</div>
      <p class="testi-text">"A comunicação com os moradores ficou muito mais ágil. Antes levava dias para divulgar um aviso, hoje todos recebem em segundos pelo app. As reclamações sobre falta de informação zeraram."</p>
      <div class="testi-author">
        <div class="testi-avatar" style="background:var(--gold)">AS</div>
        <div><div class="testi-name">Ana Souza</div><div class="testi-role">Administradora — Cond. Villa Verde</div></div>
      </div>
    </div>
    <div class="testi-card reveal reveal-delay-3">
      <div class="stars">★★★★★</div>
      <p class="testi-text">"Gerencio 3 condomínios ao mesmo tempo pela mesma plataforma. Antes era um caos de planilhas e WhatsApp. Hoje tenho tudo centralizado e o suporte da equipe CondoHand é excelente."</p>
      <div class="testi-author">
        <div class="testi-avatar" style="background:#4CAF50">RL</div>
        <div><div class="testi-name">Roberto Lima</div><div class="testi-role">Síndico Profissional — SP</div></div>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="pricing" id="planos">
  <div class="reveal" style="text-align:center">
    <div class="section-label">Planos</div>
    <div class="section-title">Investimento que se paga<br>no primeiro mês</div>
    <p class="section-sub" style="margin:0 auto 0">Planos flexíveis para condomínios de todos os portes. Sem contrato de fidelidade.</p>
  </div>
  <div class="pricing-grid">
    <div class="plan reveal reveal-delay-1">
      <div class="plan-name">Starter</div>
      <div class="plan-price">Sob<span>Consulta</span></div>
      <div class="plan-sub">Até 50 unidades</div>
      <div class="plan-divider"></div>
      <ul class="plan-features">
        <li><span class="check">✓</span> Financeiro e boletos</li>
        <li><span class="check">✓</span> Comunicados e avisos</li>
        <li><span class="check">✓</span> Cadastro de moradores</li>
        <li><span class="check">✓</span> App para moradores</li>
        <li><span class="check">✓</span> Suporte por chat</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Começar agora</button>
    </div>

    <div class="plan featured reveal reveal-delay-2">
      <div class="popular-badge">🔥 MAIS POPULAR</div>
      <div class="plan-name">Profissional</div>
      <div class="plan-price">Sob<span>Consulta</span></div>
      <div class="plan-sub">Até 200 unidades</div>
      <div class="plan-divider"></div>
      <ul class="plan-features">
        <li><span class="check">✓</span> Tudo do Starter</li>
        <li><span class="check">✓</span> Reservas de áreas comuns</li>
        <li><span class="check">✓</span> Controle de acesso avançado</li>
        <li><span class="check">✓</span> Ordens de serviço</li>
        <li><span class="check">✓</span> Atas e documentos</li>
        <li><span class="check">✓</span> Suporte prioritário</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Começar agora</button>
    </div>

    <div class="plan reveal reveal-delay-3">
      <div class="plan-name">Enterprise</div>
      <div class="plan-price">Sob<span> consulta</span></div>
      <div class="plan-sub">Condomínios grandes e redes</div>
      <div class="plan-divider"></div>
      <ul class="plan-features">
        <li><span class="check">✓</span> Tudo do Profissional</li>
        <li><span class="check">✓</span> Múltiplos condomínios</li>
        <li><span class="check">✓</span> API e integrações</li>
        <li><span class="check">✓</span> Relatórios personalizados</li>
        <li><span class="check">✓</span> Gerente de conta dedicado</li>
      </ul>
      <button class="plan-btn" onclick="document.getElementById('contato').scrollIntoView({behavior:'smooth'})">Falar com especialista</button>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-section">
  <div class="reveal">
    <div class="section-label" style="color:var(--sky);display:block;text-align:center">Comece hoje</div>
    <div class="cta-title">30 dias grátis.<br>Sem cartão de crédito.</div>
    <p class="cta-sub">Experimente o CondoHand completo por 30 dias e veja como a gestão do seu condomínio pode ser transformada.</p>
    <div class="cta-form">
      <input class="cta-input" type="email" placeholder="Seu melhor e-mail">
      <button class="btn-primary" style="white-space:nowrap">Começar grátis →</button>
    </div>
    <p class="cta-guarantee">✓ Sem compromisso &nbsp;·&nbsp; ✓ Dados protegidos &nbsp;·&nbsp; <span>✓ Suporte incluído</span></p>
  </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contato">
  <div class="contact-inner">
    <div>
      <div class="section-label">Contato</div>
      <h2>Fale com nosso<br>time de especialistas</h2>
      <p>Agende uma demonstração gratuita e veja como o CondoHand pode transformar a gestão do seu condomínio.</p>
      <div class="contact-items">
        <div class="contact-item">
          <div class="contact-icon">📱</div>
          <div class="contact-detail"><small>Celular / WhatsApp</small>(21) 98284-6871</div>
        </div>
        <div class="contact-item">
          <div class="contact-icon">✉️</div>
          <div class="contact-detail"><small>E-mail</small>andersonmelo01@gmail.com</div>
        </div>
        <div class="contact-item">
          <div class="contact-icon">🌐</div>
          <div class="contact-detail"><small>Site</small>www.ams.dev.br</div>
        </div>
      </div>
    </div>
    <div>
      <div class="contact-form">
        <form id="condo-contact-form">
          <input class="form-field" type="text" name="nome" placeholder="Nome completo" required>
          <input class="form-field" type="email" name="email" placeholder="E-mail" required>
          <input class="form-field" type="tel" name="telefone" placeholder="WhatsApp / Telefone">
          <input class="form-field" type="text" name="extra" placeholder="Nome do condomínio e nº de unidades">
          <textarea class="form-field" name="mensagem" placeholder="Mensagem (opcional)" style="display:none"></textarea>
          <button class="form-submit" type="submit">Solicitar demonstração gratuita →</button>
          <p style="font-size:0.75rem;color:var(--muted);text-align:center">Retornamos em até 2 horas em horário comercial</p>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <div class="footer-top">
    <div class="footer-brand">
      <div class="footer-logo">
        <div class="nav-icon" style="width:30px;height:30px">
          <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round"><rect x="3" y="3" width="18" height="18" rx="3"/><path d="M9 3v18M15 9h3M15 15h3M3 9h6M3 15h6"/></svg>
        </div>
        CondoHand
      </div>
      <p class="footer-desc">Sistema completo de gestão condominial para síndicos, administradoras e moradores.</p>
    </div>
    <div class="footer-links">
      <h4>Sistema</h4>
      <ul>
        <li><a href="#funcionalidades">Financeiro</a></li>
        <li><a href="#funcionalidades">Comunicação</a></li>
        <li><a href="#funcionalidades">Moradores</a></li>
        <li><a href="#funcionalidades">Manutenção</a></li>
      </ul>
    </div>
    <div class="footer-links">
      <h4>Empresa</h4>
      <ul>
        <li><a href="#">Sobre nós</a></li>
        <li><a href="#planos">Planos</a></li>
        <li><a href="#contato">Contato</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
    </div>
    <div class="footer-links">
      <h4>Suporte</h4>
      <ul>
        <li><a href="#">Central de Ajuda</a></li>
        <li><a href="#">Documentação</a></li>
        <li><a href="#">Status do Sistema</a></li>
        <li><a href="#">Privacidade</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="footer-copy">© 2025 CondoHand. Todos os direitos reservados.</div>
    <a href="https://www.ams.dev.br" target="_blank" class="footer-site">www.ams.dev.br</a>
  </div>
</footer>

<script>
  // Scroll reveal
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  // Form submit AJAX para contato (SMTP)
  const condoForm = document.getElementById('condo-contact-form');
  if (condoForm) {
    condoForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const btn = condoForm.querySelector('.form-submit');
      btn.textContent = 'Enviando...';
      btn.disabled = true;
      const formData = new FormData(condoForm);
      fetch('send-contact-smtp.php', {
        method: 'POST',
        body: formData
      })
      .then(r => r.text())
      .then(resp => {
        if (resp.trim() === 'OK') {
          btn.textContent = '✓ Solicitação enviada! Entraremos em contato.';
          btn.style.background = '#4CAF50';
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
  document.querySelector('.cta-form .btn-primary').addEventListener('click', function() {
    this.textContent = '✓ Verifique seu e-mail!';
    this.style.background = '#4CAF50';
  });

  // Navbar scroll effect
  window.addEventListener('scroll', () => {
    document.querySelector('nav').style.padding = window.scrollY > 50 ? '12px 6vw' : '18px 6vw';
  });
</script>
</body>
</html>
