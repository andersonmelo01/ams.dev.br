<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRM Médico Inteligente — Gestão Completa para Clínicas e Consultórios</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:ital,wght@0,700;0,900;1,700&display=swap" rel="stylesheet">
<style>
:root {
  --blue:       #1a6fd4;
  --blue-dark:  #0f4fa0;
  --blue-deep:  #071e45;
  --blue-mid:   #0d3272;
  --cyan:       #22c5e8;
  --green:      #16a34a;
  --white:      #ffffff;
  --off:        #f0f6ff;
  --gray:       #64748b;
  --border:     rgba(26,111,212,0.12);
}
*{margin:0;padding:0;box-sizing:border-box;}
html{scroll-behavior:smooth;}
body{font-family:'Plus Jakarta Sans',sans-serif;background:var(--white);color:var(--blue-deep);overflow-x:hidden;}
 
nav{
  position:fixed;top:0;left:0;right:0;z-index:200;
  display:flex;align-items:center;justify-content:space-between;
  padding:14px 5vw;
  background:rgba(255,255,255,0.94);
  backdrop-filter:blur(14px);
  border-bottom:1px solid var(--border);
}
.logo{display:flex;align-items:center;gap:10px;}
.logo-icon{
  width:38px;height:38px;border-radius:10px;
  background:linear-gradient(135deg,var(--blue),var(--blue-dark));
  display:flex;align-items:center;justify-content:center;
  font-size:1.2rem;
}
.logo-text{font-family:'Fraunces',serif;font-weight:900;font-size:1.15rem;color:var(--blue-deep);}
.logo-text span{color:var(--blue);}
.nav-btn{
  background:var(--blue);color:#fff;
  padding:10px 22px;border-radius:50px;
  font-weight:700;font-size:.88rem;
  text-decoration:none;border:none;cursor:pointer;
  transition:background .2s,transform .15s,box-shadow .2s;
  box-shadow:0 4px 14px rgba(26,111,212,0.3);
}
.nav-btn:hover{background:var(--blue-dark);transform:translateY(-1px);box-shadow:0 8px 22px rgba(26,111,212,.4);}
 
.hero{
  min-height:100vh;
  background:linear-gradient(145deg,var(--blue-deep) 0%,var(--blue-mid) 55%,#1245a0 100%);
  padding:110px 5vw 80px;
  display:grid;grid-template-columns:1.1fr 0.9fr;gap:50px;align-items:center;
  position:relative;overflow:hidden;
}
.cross{position:absolute;font-size:8rem;opacity:.04;color:#fff;pointer-events:none;font-weight:900;line-height:1;}
.cross.a{top:6%;right:5%;}
.cross.b{bottom:12%;left:3%;font-size:5rem;}
.hero::after{
  content:'';position:absolute;bottom:-1px;left:0;right:0;height:80px;
  background:var(--white);clip-path:ellipse(55% 100% at 50% 100%);
}
.eyebrow{
  display:inline-flex;align-items:center;gap:8px;
  background:rgba(34,197,232,.15);border:1px solid rgba(34,197,232,.35);
  color:var(--cyan);font-size:.78rem;font-weight:700;letter-spacing:.08em;text-transform:uppercase;
  padding:6px 16px;border-radius:50px;margin-bottom:22px;
  animation:fadeUp .6s ease both;
}
h1{
  font-family:'Fraunces',serif;
  font-size:clamp(2.3rem,4vw,3.6rem);font-weight:900;line-height:1.06;
  color:var(--white);animation:fadeUp .7s .1s ease both;
}
h1 em{color:var(--cyan);font-style:normal;}
.hero-sub{
  margin-top:18px;font-size:1.05rem;line-height:1.75;
  color:rgba(255,255,255,.62);max-width:500px;
  animation:fadeUp .7s .2s ease both;
}
.hero-actions{margin-top:30px;display:flex;gap:14px;flex-wrap:wrap;animation:fadeUp .7s .3s ease both;}
.btn-primary{
  background:var(--cyan);color:var(--blue-deep);
  padding:16px 30px;border-radius:50px;font-weight:800;font-size:1rem;
  text-decoration:none;border:none;cursor:pointer;
  box-shadow:0 8px 28px rgba(34,197,232,.45);
  transition:transform .15s,box-shadow .2s;
  display:inline-flex;align-items:center;gap:8px;
}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 14px 36px rgba(34,197,232,.55);}
.btn-ghost{
  background:transparent;color:#fff;padding:15px 28px;border-radius:50px;
  font-weight:600;font-size:1rem;text-decoration:none;
  border:1.5px solid rgba(255,255,255,.28);cursor:pointer;
  transition:border-color .2s,background .2s;
}
.btn-ghost:hover{border-color:var(--cyan);background:rgba(34,197,232,.08);}
.hero-proof{display:flex;gap:28px;margin-top:36px;flex-wrap:wrap;animation:fadeUp .7s .4s ease both;}
.proof-item{display:flex;flex-direction:column;gap:2px;}
.proof-num{font-family:'Fraunces',serif;font-size:2rem;font-weight:900;color:var(--cyan);}
.proof-label{font-size:.72rem;color:rgba(255,255,255,.42);font-weight:500;}
 
.hero-visual{animation:fadeUp .8s .2s ease both;position:relative;}
.dash-frame{
  background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);
  border-radius:20px;padding:18px;backdrop-filter:blur(6px);
  box-shadow:0 40px 80px rgba(0,0,0,.4),inset 0 1px 0 rgba(255,255,255,.1);
}
.dash-topbar{display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;}
.dash-dots{display:flex;gap:6px;}
.dash-dot{width:10px;height:10px;border-radius:50%;}
.dash-dot.r{background:#ef4444;}.dash-dot.y{background:#f59e0b;}.dash-dot.g{background:#22c55e;}
.dash-title-bar{font-size:.7rem;color:rgba(255,255,255,.35);font-weight:600;}
.dash-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;margin-bottom:12px;}
.dash-card{background:rgba(255,255,255,.06);border-radius:12px;padding:12px;}
.dc-label{font-size:.58rem;color:rgba(255,255,255,.35);font-weight:600;text-transform:uppercase;letter-spacing:.06em;margin-bottom:5px;}
.dc-value{font-family:'Fraunces',serif;font-size:1.5rem;font-weight:900;color:#fff;}
.dc-delta{font-size:.6rem;color:#4ade80;font-weight:700;margin-top:3px;}
.dash-list{display:flex;flex-direction:column;gap:7px;}
.dash-item{
  background:rgba(255,255,255,.05);border-radius:10px;padding:10px 12px;
  display:flex;align-items:center;justify-content:space-between;
}
.di-name{font-size:.7rem;font-weight:600;color:rgba(255,255,255,.8);}
.di-time{font-size:.58rem;color:rgba(255,255,255,.32);margin-top:2px;}
.di-tag{font-size:.6rem;font-weight:700;padding:3px 8px;border-radius:20px;}
.tag-c{background:rgba(34,197,232,.18);color:var(--cyan);}
.tag-g{background:rgba(22,163,74,.2);color:#4ade80;}
.tag-o{background:rgba(245,158,11,.18);color:#fbbf24;}
.float-a{
  position:absolute;right:-18px;top:28px;
  background:var(--green);color:#fff;border-radius:14px;padding:10px 16px;
  font-size:.72rem;font-weight:700;box-shadow:0 8px 24px rgba(22,163,74,.5);
  white-space:nowrap;animation:float 3s ease-in-out infinite;
}
.float-b{
  position:absolute;left:-22px;bottom:48px;
  background:#fff;color:var(--blue-deep);border-radius:14px;padding:10px 16px;
  font-size:.72rem;font-weight:700;box-shadow:0 8px 24px rgba(0,0,0,.2);
  white-space:nowrap;animation:float 3s 1.5s ease-in-out infinite;
}
 
.strip{
  background:var(--blue);padding:16px 5vw;
  display:flex;gap:32px;justify-content:center;flex-wrap:wrap;
}
.strip-item{display:flex;align-items:center;gap:8px;color:#fff;font-weight:600;font-size:.86rem;white-space:nowrap;}
 
section{padding:80px 5vw;}
.section-tag{
  display:inline-block;font-size:.72rem;font-weight:700;letter-spacing:.12em;
  text-transform:uppercase;color:var(--blue);
  background:rgba(26,111,212,.09);padding:5px 14px;border-radius:50px;margin-bottom:14px;
}
h2{font-family:'Fraunces',serif;font-size:clamp(1.8rem,3vw,2.6rem);font-weight:900;line-height:1.14;color:var(--blue-deep);max-width:600px;}
h2 em{color:var(--blue);font-style:normal;}
.sec-desc{margin-top:12px;color:var(--gray);font-size:1rem;line-height:1.72;max-width:540px;}
 
.features{background:var(--white);}
.feat-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px;margin-top:46px;}
.feat-card{
  background:var(--off);border-radius:18px;padding:26px;
  border:1.5px solid var(--border);
  transition:transform .2s,border-color .2s,box-shadow .2s;
  position:relative;overflow:hidden;
}
.feat-card::after{
  content:'';position:absolute;top:0;left:0;right:0;height:3px;
  background:linear-gradient(90deg,var(--blue),var(--cyan));
  opacity:0;transition:opacity .2s;
}
.feat-card:hover{transform:translateY(-5px);border-color:rgba(26,111,212,.3);box-shadow:0 16px 40px rgba(26,111,212,.1);}
.feat-card:hover::after{opacity:1;}
.feat-icon{
  width:42px;height:42px;border-radius:12px;
  background:linear-gradient(135deg,var(--blue),var(--blue-dark));
  display:flex;align-items:center;justify-content:center;font-size:1.15rem;margin-bottom:14px;
}
.feat-title{font-weight:700;font-size:.93rem;color:var(--blue-deep);margin-bottom:7px;}
.feat-desc{font-size:.82rem;color:var(--gray);line-height:1.6;}
 
.compare-sec{
  background:var(--blue-deep);
  display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;
}
.compare-sec h2{color:#fff;}
.compare-sec h2 em{color:var(--cyan);}
.compare-sec .section-tag{background:rgba(34,197,232,.12);color:var(--cyan);}
.compare-sec .sec-desc{color:rgba(255,255,255,.5);}
.compare-table{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:20px;overflow:hidden;margin-top:38px;}
.compare-header{
  display:grid;grid-template-columns:1fr 1fr 1fr;
  background:rgba(255,255,255,.06);padding:13px 18px;
  font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.07em;
}
.compare-header .col{color:rgba(255,255,255,.38);}
.compare-header .col.good{color:var(--cyan);}
.compare-row-item{
  display:grid;grid-template-columns:1fr 1fr 1fr;
  padding:13px 18px;border-top:1px solid rgba(255,255,255,.05);align-items:center;
}
.feat-name{font-size:.8rem;color:rgba(255,255,255,.6);font-weight:500;}
.cell{display:flex;justify-content:center;}
.ix{color:#f87171;font-weight:700;}
.ic{color:#4ade80;font-weight:700;}
 
.cta-box{
  background:linear-gradient(135deg,var(--blue),var(--cyan));
  border-radius:20px;padding:28px;margin-top:34px;text-align:center;
}
.cta-box .big{font-family:'Fraunces',serif;font-size:2.2rem;font-weight:900;color:#fff;display:block;}
.cta-box .sm{font-size:.84rem;color:rgba(255,255,255,.82);margin-top:4px;display:block;}
.cta-box .note{font-size:.68rem;color:rgba(255,255,255,.5);margin-top:8px;display:block;}
 
.benefits{background:var(--off);}
.benefits-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;margin-top:46px;}
.benefit-card{
  background:var(--white);border-radius:18px;padding:24px;
  border:1.5px solid var(--border);
  display:flex;gap:14px;align-items:flex-start;
  transition:transform .2s,box-shadow .2s;
}
.benefit-card:hover{transform:translateY(-4px);box-shadow:0 12px 36px rgba(26,111,212,.1);}
.benefit-ico{
  width:42px;height:42px;border-radius:12px;flex-shrink:0;
  background:linear-gradient(135deg,rgba(26,111,212,.1),rgba(34,197,232,.1));
  display:flex;align-items:center;justify-content:center;font-size:1.25rem;
}
.benefit-title{font-weight:700;font-size:.92rem;color:var(--blue-deep);margin-bottom:5px;}
.benefit-desc{font-size:.81rem;color:var(--gray);line-height:1.6;}
 
.results{background:var(--white);}
.results-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:20px;margin-top:46px;}
.result-card{
  background:linear-gradient(145deg,var(--blue-deep),var(--blue-mid));
  border-radius:20px;padding:28px;text-align:center;
  border:1px solid rgba(255,255,255,.07);transition:transform .2s;
}
.result-card:hover{transform:translateY(-5px);}
.result-num{font-family:'Fraunces',serif;font-size:2.8rem;font-weight:900;color:var(--cyan);}
.result-label{font-size:.83rem;color:rgba(255,255,255,.55);margin-top:6px;line-height:1.5;}
.result-note{font-size:.68rem;color:rgba(255,255,255,.28);margin-top:8px;}
 
.plans{background:var(--off);}
.plans-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(250px,1fr));gap:22px;margin-top:46px;}
.plan-card{
  background:var(--white);border-radius:22px;padding:28px;
  border:1.5px solid var(--border);
  position:relative;transition:transform .2s,box-shadow .2s;
}
.plan-card:hover{transform:translateY(-5px);box-shadow:0 20px 50px rgba(26,111,212,.12);}
.plan-card.featured{background:var(--blue-deep);border-color:var(--cyan);box-shadow:0 12px 40px rgba(26,111,212,.3);}
.plan-badge-pill{
  position:absolute;top:-12px;left:50%;transform:translateX(-50%);
  background:var(--cyan);color:var(--blue-deep);
  font-size:.7rem;font-weight:800;padding:4px 14px;border-radius:20px;white-space:nowrap;
}
.plan-icon{font-size:2rem;margin-bottom:14px;}
.plan-name{font-family:'Fraunces',serif;font-size:1.15rem;font-weight:900;color:var(--blue-deep);margin-bottom:8px;}
.plan-card.featured .plan-name{color:#fff;}
.plan-desc{font-size:.82rem;color:var(--gray);line-height:1.6;margin-bottom:16px;}
.plan-card.featured .plan-desc{color:rgba(255,255,255,.48);}
.plan-feat{display:flex;gap:8px;align-items:center;font-size:.82rem;color:var(--blue-deep);margin-bottom:8px;}
.plan-card.featured .plan-feat{color:rgba(255,255,255,.8);}
.plan-feat::before{content:'✓';color:var(--green);font-weight:800;flex-shrink:0;}
.plan-cta{
  display:block;text-align:center;margin-top:20px;
  background:var(--blue);color:#fff;padding:13px;border-radius:50px;
  font-weight:700;font-size:.88rem;text-decoration:none;cursor:pointer;border:none;
  transition:background .2s,transform .15s;
}
.plan-cta:hover{background:var(--blue-dark);transform:translateY(-1px);}
.plan-cta.outline{background:transparent;border:1.5px solid rgba(0,0,0,.15);color:var(--blue-deep);}
.plan-cta.outline:hover{border-color:var(--blue);color:var(--blue);background:rgba(26,111,212,.05);}
 
.final-cta{
  background:linear-gradient(145deg,var(--blue-deep),var(--blue-mid));
  text-align:center;padding:90px 5vw;position:relative;overflow:hidden;
}
.final-cta::before{
  content:'';position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);
  width:700px;height:700px;
  background:radial-gradient(circle,rgba(34,197,232,.18) 0%,transparent 65%);
  border-radius:50%;pointer-events:none;
}
.final-cta h2{color:#fff;max-width:660px;margin:0 auto;font-size:clamp(2rem,4vw,3rem);}
.final-sub{color:rgba(255,255,255,.52);margin:16px auto 34px;font-size:1.04rem;max-width:480px;}
.contacts{display:flex;gap:24px;justify-content:center;flex-wrap:wrap;margin-top:28px;}
.contact-item{display:flex;align-items:center;gap:10px;color:rgba(255,255,255,.7);font-size:.88rem;}
.contact-item a{color:rgba(255,255,255,.85);text-decoration:none;font-weight:500;}
.contact-item a:hover{color:var(--cyan);}
 
.foot-strip{
  background:#060f22;padding:18px 5vw;
  display:flex;gap:24px;justify-content:center;flex-wrap:wrap;
  border-top:1px solid rgba(255,255,255,.05);
}
.fs-item{display:flex;flex-direction:column;align-items:center;gap:4px;min-width:90px;}
.fs-icon{font-size:1.3rem;}
.fs-title{font-size:.7rem;font-weight:700;color:rgba(255,255,255,.55);text-align:center;}
.fs-desc{font-size:.62rem;color:rgba(255,255,255,.28);text-align:center;}
footer{background:#060f22;color:rgba(255,255,255,.28);text-align:center;padding:18px 5vw;font-size:.78rem;border-top:1px solid rgba(255,255,255,.04);}
footer a{color:var(--blue);text-decoration:none;}
 
@keyframes fadeUp{from{opacity:0;transform:translateY(28px);}to{opacity:1;transform:translateY(0);}}
@keyframes float{0%,100%{transform:translateY(0);}50%{transform:translateY(-10px);}}
.reveal{opacity:0;transform:translateY(30px);transition:opacity .6s ease,transform .6s ease;}
.reveal.visible{opacity:1;transform:translateY(0);}
 
@media(max-width:860px){
  .hero{grid-template-columns:1fr;padding-top:110px;text-align:center;}
  .hero-sub{margin:14px auto 0;}
  .hero-actions{justify-content:center;}
  .hero-proof{justify-content:center;}
  .hero-visual{margin-top:36px;}
  .float-a,.float-b{display:none;}
  .compare-sec{grid-template-columns:1fr;}
  h2{max-width:100%;}
}
</style>
</head>
<body>
 
<nav>
  <div class="logo">
    <div class="logo-icon">🏥</div>
    <div class="logo-text">CRM <span>Médico</span></div>
  </div>
  <a href="#contato" class="nav-btn">Solicitar Demo Grátis</a>
</nav>
 
<section class="hero">
  <div class="cross a">+</div>
  <div class="cross b">+</div>
  <div>
    <div class="eyebrow">Para Clínicas e Consultórios</div>
    <h1>CRM Médico <em>Inteligente.</em><br>Gestão completa.</h1>
    <p class="hero-sub">Mais tempo para o que importa: seus pacientes. Automatize, organize e cresça com controle total da sua operação.</p>
    <div class="hero-actions">
      <a href="#contato" class="btn-primary">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        Quero uma demonstração
      </a>
      <a href="#funcionalidades" class="btn-ghost">Ver funcionalidades</a>
    </div>
    <div class="hero-proof">
      <div class="proof-item"><span class="proof-num">−40%</span><span class="proof-label">Redução de faltas</span></div>
      <div class="proof-item"><span class="proof-num">24h</span><span class="proof-label">Agendamento online</span></div>
      <div class="proof-item"><span class="proof-num">100%</span><span class="proof-label">Digital e seguro</span></div>
    </div>
  </div>
  <div class="hero-visual">
    <div class="float-a">📅 +23 consultas hoje</div>
    <div class="dash-frame">
      <div class="dash-topbar">
        <div class="dash-dots">
          <div class="dash-dot r"></div><div class="dash-dot y"></div><div class="dash-dot g"></div>
        </div>
        <div class="dash-title-bar">CRM Médico Inteligente</div>
        <div></div>
      </div>
      <div class="dash-grid">
        <div class="dash-card">
          <div class="dc-label">Consultas Hoje</div>
          <div class="dc-value">23</div>
          <div class="dc-delta">▲ +18% vs ontem</div>
        </div>
        <div class="dash-card">
          <div class="dc-label">Faturamento</div>
          <div class="dc-value" style="font-size:1.05rem;">R$ 4.820</div>
          <div class="dc-delta">▲ +12%</div>
        </div>
        <div class="dash-card">
          <div class="dc-label">Faltas</div>
          <div class="dc-value" style="color:#4ade80;">2</div>
          <div class="dc-delta">▼ −40%</div>
        </div>
        <div class="dash-card">
          <div class="dc-label">Pacientes Ativos</div>
          <div class="dc-value">342</div>
          <div class="dc-delta">▲ +8 novos</div>
        </div>
      </div>
      <div class="dash-list">
        <div style="font-size:.58rem;font-weight:700;color:rgba(255,255,255,.28);padding:2px 4px 6px;letter-spacing:.08em;text-transform:uppercase;">Próximas consultas</div>
        <div class="dash-item">
          <div><div class="di-name">Maria Santos</div><div class="di-time">09:00 · Cardiologia</div></div>
          <span class="di-tag tag-c">Confirmada</span>
        </div>
        <div class="dash-item">
          <div><div class="di-name">João Almeida</div><div class="di-time">10:30 · Clínico Geral</div></div>
          <span class="di-tag tag-g">Online</span>
        </div>
        <div class="dash-item">
          <div><div class="di-name">Ana Lima</div><div class="di-time">11:00 · Dermatologia</div></div>
          <span class="di-tag tag-o">Pendente</span>
        </div>
      </div>
    </div>
    <div class="float-b">🔔 Lembrete enviado via WhatsApp</div>
  </div>
</section>
 
<div class="strip">
  <div class="strip-item">📅 Agendamento 100% Online</div>
  <div class="strip-item">🔔 Lembretes Automáticos</div>
  <div class="strip-item">📋 Prontuário Digital</div>
  <div class="strip-item">💰 Gestão Financeira</div>
  <div class="strip-item">📊 Relatórios Detalhados</div>
  <div class="strip-item">🔒 Dados Seguros</div>
</div>
 
<section class="features" id="funcionalidades">
  <div class="section-tag">Funcionalidades</div>
  <h2>Tudo que sua clínica precisa <em>em um só sistema</em></h2>
  <p class="sec-desc">Solução completa para clínicas que querem crescer. Mais produtividade, menos faltas, controle total.</p>
  <div class="feat-grid">
    <div class="feat-card reveal">
      <div class="feat-icon">📅</div>
      <div class="feat-title">Pré-agendamento 100% Online</div>
      <div class="feat-desc">Seus pacientes agendam quando e onde quiserem, diretamente pelo celular ou computador.</div>
    </div>
    <div class="feat-card reveal">
      <div class="feat-icon">🗓️</div>
      <div class="feat-title">Agenda Inteligente</div>
      <div class="feat-desc">Visão completa da agenda, horários e salas. Organize o fluxo de atendimento com facilidade.</div>
    </div>
    <div class="feat-card reveal">
      <div class="feat-icon">📋</div>
      <div class="feat-title">Prontuário Digital Completo</div>
      <div class="feat-desc">Histórico clínico seguro e sempre disponível. Acesse o prontuário de qualquer dispositivo.</div>
    </div>
    <div class="feat-card reveal">
      <div class="feat-icon">👥</div>
      <div class="feat-title">Controle de Pacientes</div>
      <div class="feat-desc">Cadastros, histórico, retornos e acompanhamento completo de cada paciente.</div>
    </div>
    <div class="feat-card reveal">
      <div class="feat-icon">💰</div>
      <div class="feat-title">Gestão Financeira Integrada</div>
      <div class="feat-desc">Contas a receber, pagamentos e fluxo de caixa na palma da sua mão.</div>
    </div>
    <div class="feat-card reveal">
      <div class="feat-icon">📊</div>
      <div class="feat-title">Relatórios Detalhados</div>
      <div class="feat-desc">Dados estratégicos para decisões mais inteligentes e crescimento sustentável.</div>
    </div>
    <div class="feat-card reveal">
      <div class="feat-icon">👨‍⚕️</div>
      <div class="feat-title">Cadastro de Médicos e Equipe</div>
      <div class="feat-desc">Permissões e acessos personalizados para cada membro da equipe.</div>
    </div>
    <div class="feat-card reveal">
      <div class="feat-icon">💬</div>
      <div class="feat-title">Integração com WhatsApp</div>
      <div class="feat-desc">Lembretes automáticos e comunicação ágil diretamente com seus pacientes.</div>
    </div>
  </div>
</section>
 
<section class="compare-sec">
  <div class="reveal">
    <div class="section-tag">Comparativo</div>
    <h2>Pare de perder tempo com planilhas e processos <em>manuais</em></h2>
    <p class="sec-desc">Automatize. Organize. Cresça. A diferença que um sistema profissional faz na prática.</p>
    <div class="cta-box">
      <span class="big">−40%</span>
      <span class="sm">de faltas com lembretes automáticos por WhatsApp</span>
      <span class="note">*Resultados podem variar de acordo com o perfil da clínica</span>
    </div>
  </div>
  <div class="reveal">
    <div class="compare-table">
      <div class="compare-header">
        <div class="col">Recurso</div>
        <div class="col" style="text-align:center;">Sem sistema</div>
        <div class="col good" style="text-align:center;">Com CRM Médico</div>
      </div>
      <div class="compare-row-item"><div class="feat-name">Processos organizados</div><div class="cell"><span class="ix">✗</span></div><div class="cell"><span class="ic">✓</span></div></div>
      <div class="compare-row-item"><div class="feat-name">Controle total</div><div class="cell"><span class="ix">✗</span></div><div class="cell"><span class="ic">✓</span></div></div>
      <div class="compare-row-item"><div class="feat-name">Economia de tempo</div><div class="cell"><span class="ix">✗</span></div><div class="cell"><span class="ic">✓</span></div></div>
      <div class="compare-row-item"><div class="feat-name">Gestão profissional</div><div class="cell"><span class="ix">✗</span></div><div class="cell"><span class="ic">✓</span></div></div>
      <div class="compare-row-item"><div class="feat-name">Tudo em um só lugar</div><div class="cell"><span class="ix">✗</span></div><div class="cell"><span class="ic">✓</span></div></div>
      <div class="compare-row-item"><div class="feat-name">Mais lucro e resultados</div><div class="cell"><span class="ix">✗</span></div><div class="cell"><span class="ic">✓</span></div></div>
    </div>
  </div>
</section>
 
<section class="benefits">
  <div style="text-align:center;">
    <div class="section-tag" style="display:inline-block;">Benefícios</div>
    <h2 style="max-width:100%;margin:0 auto;">O que sua clínica ganha <em>na prática</em></h2>
    <p class="sec-desc" style="margin:12px auto 0;">Estratégia completa para atrair, fidelizar e crescer com mais produtividade.</p>
  </div>
  <div class="benefits-grid">
    <div class="benefit-card reveal">
      <div class="benefit-ico">📈</div>
      <div><div class="benefit-title">Mais pacientes atendidos</div><div class="benefit-desc">Organização que permite atender mais com qualidade e menos esforço operacional.</div></div>
    </div>
    <div class="benefit-card reveal">
      <div class="benefit-ico">🔔</div>
      <div><div class="benefit-title">Redução de faltas</div><div class="benefit-desc">Lembretes automáticos por WhatsApp reduzem no-shows em até 40%, garantindo mais receita.</div></div>
    </div>
    <div class="benefit-card reveal">
      <div class="benefit-ico">🌐</div>
      <div><div class="benefit-title">Agendamento online 24h</div><div class="benefit-desc">Mais comodidade para o paciente e mais agendamentos para sua clínica, sem depender de ligações.</div></div>
    </div>
    <div class="benefit-card reveal">
      <div class="benefit-ico">❤️</div>
      <div><div class="benefit-title">Fidelização automática</div><div class="benefit-desc">Acompanhe o paciente e crie relacionamentos duradouros com histórico completo e retornos programados.</div></div>
    </div>
    <div class="benefit-card reveal">
      <div class="benefit-ico">💹</div>
      <div><div class="benefit-title">Controle total do negócio</div><div class="benefit-desc">Gestão financeira, relatórios e indicadores na palma da mão para decisões mais inteligentes.</div></div>
    </div>
    <div class="benefit-card reveal">
      <div class="benefit-ico">🔒</div>
      <div><div class="benefit-title">Segurança de dados</div><div class="benefit-desc">Proteção e sigilo completo das informações dos seus pacientes com tecnologia de ponta.</div></div>
    </div>
  </div>
</section>
 
<section class="results">
  <div style="text-align:center;">
    <div class="section-tag" style="display:inline-block;">Resultados</div>
    <h2 style="max-width:100%;margin:0 auto;">Sua clínica mais organizada, <em>produtiva e lucrativa</em></h2>
  </div>
  <div class="results-grid">
    <div class="result-card reveal"><div class="result-num">−40%</div><div class="result-label">Redução de faltas com lembretes automáticos</div><div class="result-note">*Pode variar por perfil de clínica</div></div>
    <div class="result-card reveal"><div class="result-num">+30%</div><div class="result-label">Mais pacientes atendidos com a mesma equipe</div></div>
    <div class="result-card reveal"><div class="result-num">100%</div><div class="result-label">Prontuários e agendas digitais, sem papel</div></div>
    <div class="result-card reveal"><div class="result-num">24h</div><div class="result-label">Agendamento disponível online para seus pacientes</div></div>
  </div>
</section>
 
<section class="plans" id="planos">
  <div style="text-align:center;">
    <div class="section-tag" style="display:inline-block;">Planos</div>
    <h2 style="max-width:100%;margin:0 auto;">Planos acessíveis para <em>clínicas de todos os portes</em></h2>
    <p class="sec-desc" style="margin:12px auto 0;">Implantação rápida, treinamento incluso e suporte contínuo. Sem complicação — pronto para usar!</p>
  </div>
  <div class="plans-grid">
    <div class="plan-card reveal">
      <div class="plan-icon">🌱</div>
      <div class="plan-name">Starter</div>
      <div class="plan-desc">Ideal para consultórios individuais que querem sair das planilhas.</div>
      <div class="plan-feat">Agendamento online</div>
      <div class="plan-feat">Prontuário digital</div>
      <div class="plan-feat">Controle de pacientes</div>
      <div class="plan-feat">Suporte via WhatsApp</div>
      <a href="#contato" class="plan-cta outline">Falar com consultor</a>
    </div>
    <div class="plan-card featured reveal">
      <div class="plan-badge-pill">⭐ Mais popular</div>
      <div class="plan-icon">🚀</div>
      <div class="plan-name">Clínica Pro</div>
      <div class="plan-desc">Para clínicas que querem crescer com automação e gestão completa.</div>
      <div class="plan-feat">Tudo do Starter</div>
      <div class="plan-feat">Lembretes automáticos WhatsApp</div>
      <div class="plan-feat">Gestão financeira integrada</div>
      <div class="plan-feat">Relatórios detalhados</div>
      <div class="plan-feat">Múltiplos médicos e salas</div>
      <a href="#contato" class="plan-cta">Quero o Clínica Pro</a>
    </div>
    <div class="plan-card reveal">
      <div class="plan-icon">🏥</div>
      <div class="plan-name">Enterprise</div>
      <div class="plan-desc">Para redes de clínicas com volume alto e necessidades específicas.</div>
      <div class="plan-feat">Tudo do Pro</div>
      <div class="plan-feat">Multi-unidades</div>
      <div class="plan-feat">Integrações personalizadas</div>
      <div class="plan-feat">Gerente de conta dedicado</div>
      <a href="#contato" class="plan-cta outline">Falar com especialista</a>
    </div>
  </div>
  <p style="text-align:center;margin-top:26px;font-size:.84rem;color:var(--gray);">🛡️ Todos os planos incluem <strong>implantação rápida + treinamento incluso + suporte contínuo</strong></p>
</section>
 
<section class="final-cta" id="contato">
  <div style="position:relative;z-index:2;">
    <div class="section-tag" style="display:inline-block;background:rgba(34,197,232,.15);color:var(--cyan);">Comece hoje</div>
    <h2 style="max-width:660px;margin:16px auto 0;">Solicite uma <em>demonstração gratuita</em> e conheça todos os benefícios</h2>
    <p class="final-sub">Menos tempo com gestão, mais tempo com pacientes. Transforme sua clínica agora.</p>
    <a href="https://wa.me/5521982846871" target="_blank" class="btn-primary" style="font-size:1.05rem;padding:18px 36px;">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
      Falar no WhatsApp
    </a>
    <div class="contacts">
      <div class="contact-item"><span>✉️</span><a href="mailto:amssistemas95@gmail.com">amssistemas95@gmail.com</a></div>
    </div>
  </div>
</section>
 
<div class="foot-strip">
  <div class="fs-item"><div class="fs-icon">🔔</div><div class="fs-title">Lembretes Automáticos</div><div class="fs-desc">Por WhatsApp e e-mail</div></div>
  <div class="fs-item"><div class="fs-icon">🔒</div><div class="fs-title">Segurança de Dados</div><div class="fs-desc">Proteção e sigilo total</div></div>
  <div class="fs-item"><div class="fs-icon">🎧</div><div class="fs-title">Atendimento Humanizado</div><div class="fs-desc">Suporte próximo e especializado</div></div>
  <div class="fs-item"><div class="fs-icon">🔄</div><div class="fs-title">Atualizações Constantes</div><div class="fs-desc">Sempre com as melhores funcionalidades</div></div>
</div>
 
<footer>
  <strong style="color:rgba(255,255,255,.5);">CRM Médico Inteligente</strong> — Sua clínica mais organizada, produtiva e lucrativa.<br>
  <span style="margin-top:8px;display:inline-block;">© 2025 AMS Sistemas · <a href="https://www.ams.dev.br" target="_blank">www.ams.dev.br</a> </span>
</footer>

<!-- Assistente Virtual Flutuante com Respostas Técnicas -->
<style>
  .crm-chatbot-btn {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9998;
    background: var(--blue);
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 60px;
    height: 60px;
    font-size: 2rem;
    box-shadow: 0 4px 18px rgba(26,111,212,0.18);
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background .2s;
  }
  .crm-chatbot-btn:hover { background: var(--blue-dark); }
  .crm-chatbot-box {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 9999;
    width: 350px;
    max-width: 95vw;
    height: 500px;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(26,111,212,0.18);
    border: 1.5px solid var(--border);
    display: flex;
    flex-direction: column;
    overflow: hidden;
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  .crm-chatbot-header {
    background: var(--blue);
    color: #fff;
    padding: 16px;
    font-weight: 700;
    font-size: 1.1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .crm-chatbot-close {
    background: none;
    border: none;
    color: #fff;
    font-size: 1.3rem;
    cursor: pointer;
  }
  .crm-chatbot-messages {
    flex: 1;
    padding: 14px;
    overflow-y: auto;
    background: #f8fbff;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .crm-chatbot-msg {
    max-width: 80%;
    padding: 10px 16px;
    border-radius: 16px;
    font-size: .98rem;
    line-height: 1.5;
    word-break: break-word;
  }
  .crm-chatbot-msg.user {
    align-self: flex-end;
    background: var(--blue);
    color: #fff;
    border-bottom-right-radius: 4px;
  }
  .crm-chatbot-msg.bot {
    align-self: flex-start;
    background: #fff;
    color: var(--blue-deep);
    border-bottom-left-radius: 4px;
    border: 1px solid var(--border);
  }
  .crm-chatbot-input {
    display: flex;
    border-top: 1px solid var(--border);
    background: #fff;
  }
  .crm-chatbot-input input {
    flex: 1;
    border: none;
    padding: 14px;
    font-size: 1rem;
    border-radius: 0 0 0 18px;
    outline: none;
    background: #fff;
  }
  .crm-chatbot-input button {
    background: var(--blue);
    color: #fff;
    border: none;
    padding: 0 22px;
    font-size: 1.1rem;
    cursor: pointer;
    border-radius: 0 0 18px 0;
    transition: background .2s;
  }
  .crm-chatbot-menu {
    display: flex;
    flex-wrap: wrap;
    gap: 3px;
    margin-bottom: 2px;
    margin-top: 1px;
    justify-content: flex-start;
    padding: 0 1px;
    align-items: flex-start;
  }
  .crm-chatbot-menu-btn {
    background: linear-gradient(135deg, var(--cyan) 60%, var(--blue) 100%);
    color: #fff;
    border: none;
    border-radius: 6px;
    padding: 2px 5px 2px 5px;
    font-size: 0.74rem;
    font-weight: 500;
    cursor: pointer;
    box-shadow: 0 1px 2px rgba(26,111,212,0.06);
    transition: background .18s, color .18s, transform .12s, box-shadow .18s;
    display: flex;
    align-items: center;
    gap: 2px;
    letter-spacing: .01em;
    outline: none;
    border-bottom: 1px solid var(--blue-dark);
    position: relative;
    min-width: 54px;
    max-width: 100%;
    white-space: nowrap;
    word-break: break-word;
    text-align: center;
    justify-content: center;
    line-height: 1.1;
    margin: 0;
  }
  .crm-chatbot-menu-btn:hover {
    background: linear-gradient(135deg, var(--blue-dark) 60%, var(--cyan) 100%);
    color: #fff;
    transform: translateY(-1px) scale(1.03);
    box-shadow: 0 3px 10px rgba(26,111,212,0.13);
    border-bottom: 2px solid var(--cyan);
  }
  .crm-chatbot-menu-btn .menu-icon {
    font-size: 0.95em;
    margin-right: 1px;
    display: inline-block;
  }
  .crm-chatbot-menu-btn.whatsapp {
    background: linear-gradient(135deg,#25d366,#128c7e);
    border-bottom: 1px solid #128c7e;
    font-size: 0.72rem;
    padding: 2px 5px 2px 5px;
  }
  .crm-chatbot-menu-btn.whatsapp:hover {
    background: linear-gradient(135deg,#128c7e,#25d366);
    border-bottom: 1px solid #25d366;
    color: #fff;
  }
  .crm-chatbot-input button:hover { background: var(--blue-dark); }
  @media (max-width: 600px) {
    .crm-chatbot-box {
      width: 98vw;
      height: 70vh;
      right: 1vw;
      bottom: 1vw;
    }
    .crm-chatbot-btn {
      right: 2vw;
      bottom: 2vw;
    }
  }
</style>

<button class="crm-chatbot-btn" id="openCrmChatbot" aria-label="Abrir assistente virtual" style="display:block;">🤖</button>
<div class="crm-chatbot-box" id="crmChatbotBox" style="display:none;">
  <div class="crm-chatbot-header">
    Assistente CRM Médico
    <button class="crm-chatbot-close" id="closeCrmChatbot" title="Fechar">×</button>
  </div>
  <div class="crm-chatbot-messages" id="crmChatbotMessages"></div>
  <form class="crm-chatbot-input" id="crmChatbotForm" autocomplete="off">
    <input type="text" id="crmChatbotInput" placeholder="Digite sua dúvida técnica..." required />
    <button type="submit">Enviar</button>
  </form>
</div>

<script>
  // Temas do menu
  const menuTemas = [
    { label: 'Agendamento Online', pergunta: 'Como funciona o agendamento online?' },
    { label: 'Prontuário Digital', pergunta: 'O prontuário digital é seguro?' },
    { label: 'Lembretes WhatsApp', pergunta: 'Como funcionam os lembretes automáticos?' },
    { label: 'Financeiro', pergunta: 'Quais recursos financeiros o sistema oferece?' },
    { label: 'LGPD e Segurança', pergunta: 'Como o sistema trata a LGPD e segurança de dados?' },
    { label: 'Relatórios', pergunta: 'Quais relatórios estão disponíveis?' },
    { label: 'Integrações', pergunta: 'O sistema integra com outros softwares?' },
    { label: 'Planos e Preços', pergunta: 'Quais são os planos e valores?' },
    { label: 'Cadastro de Pacientes', pergunta: 'Como é feito o cadastro de pacientes?' },
    { label: 'Suporte', pergunta: 'Como funciona o suporte e treinamento?' },
  ];
  // Respostas técnicas prontas para clínicas e consultórios
  const respostasTecnicas = [
    { pergunta: /agendamento|marcar consulta|agenda online/i, resposta: "Nosso sistema permite agendamento online 24h, com confirmação automática por WhatsApp e e-mail. Você pode configurar horários, profissionais e tipos de consulta facilmente." },
    { pergunta: /prontu[aá]rio|prontuario|hist[oó]rico cl[ií]nico/i, resposta: "O prontuário digital é seguro, criptografado e acessível apenas por usuários autorizados. Permite anexar exames, registrar evoluções e acessar o histórico completo do paciente." },
    { pergunta: /lembrete|whatsapp|notifica[cç][aã]o/i, resposta: "O CRM envia lembretes automáticos por WhatsApp e e-mail para reduzir faltas. Você pode personalizar as mensagens e horários de envio." },
    { pergunta: /financeiro|pagamento|boleto|faturamento|contas a receber/i, resposta: "A gestão financeira inclui controle de contas a receber, emissão de boletos, relatórios de faturamento e integração com sistemas bancários." },
    { pergunta: /seguran[cç]a|lgpd|dados|privacidade/i, resposta: "O sistema segue as normas da LGPD, com criptografia de dados, backups automáticos e controle de acesso por perfil de usuário." },
    { pergunta: /relat[oó]rio|indicador|dashboard/i, resposta: "Os relatórios incluem indicadores de produtividade, financeiro, faltas, novos pacientes e muito mais. Tudo em dashboards visuais e exportáveis." },
    { pergunta: /suporte|treinamento|ajuda|d[úu]vida/i, resposta: "Oferecemos suporte técnico via WhatsApp, e-mail e treinamento completo na implantação. Nossa equipe está pronta para ajudar!" },
    { pergunta: /integra[cç][aã]o|api|outros sistemas|softwares?/i, resposta: "O CRM possui API para integração com laboratórios, sistemas bancários e outras plataformas. Consulte nossa documentação técnica para detalhes." },
    { pergunta: /planos?|pre[çc]o|valor|mensalidade/i, resposta: "Temos planos para todos os portes de clínica. Consulte a seção 'Planos' ou fale com nosso time comercial para uma proposta personalizada." },
    { pergunta: /cadastro|paciente|m[ée]dico|equipe/i, resposta: "O cadastro de pacientes e equipe é simples, com campos personalizáveis, permissões de acesso e histórico de atendimentos." },
    { pergunta: /obrigado|valeu|agrade[çc]o/i, resposta: "De nada! Se precisar de mais alguma informação técnica, é só perguntar." },
    { pergunta: /.*/, resposta: "Desculpe, não encontrei uma resposta técnica para sua dúvida. Por favor, detalhe mais ou fale com nosso suporte especializado!" }
  ];

  const openBtn = document.getElementById('openCrmChatbot');
  const box = document.getElementById('crmChatbotBox');
  const closeBtn = document.getElementById('closeCrmChatbot');
  const messages = document.getElementById('crmChatbotMessages');
  const form = document.getElementById('crmChatbotForm');
  const input = document.getElementById('crmChatbotInput');

  function addMsg(text, sender) {
    const div = document.createElement('div');
    div.className = 'crm-chatbot-msg ' + sender;
    div.textContent = text;
    messages.appendChild(div);
    messages.scrollTop = messages.scrollHeight;
  }

  function showMenu() {
    // Remove menus anteriores
    Array.from(messages.querySelectorAll('.crm-chatbot-menu')).forEach(e => e.remove());
    const menuDiv = document.createElement('div');
    menuDiv.className = 'crm-chatbot-menu';
    // Ícones para cada tema (opcional, pode expandir)
    const icons = [
      '📅','📋','🔔','💰','🔒','📊','🔗','💸','👤','🛠️'
    ];
    menuTemas.forEach((item, idx) => {
      const btn = document.createElement('button');
      btn.className = 'crm-chatbot-menu-btn';
      btn.innerHTML = `<span class="menu-icon">${icons[idx]||'❓'}</span> ${item.label}`;
      btn.onclick = (e) => {
        e.preventDefault();
        addMsg(item.pergunta, 'user');
        responder(item.pergunta);
        menuDiv.remove();
      };
      menuDiv.appendChild(btn);
    });
    // Botão WhatsApp
    const btnZap = document.createElement('a');
    btnZap.href = 'https://wa.me/5521982846871';
    btnZap.target = '_blank';
    btnZap.className = 'crm-chatbot-menu-btn whatsapp';
    btnZap.style.display = 'inline-flex';
    btnZap.style.alignItems = 'center';
    btnZap.innerHTML = '<span class="menu-icon">&#128241;</span> Falar no WhatsApp';
    menuDiv.appendChild(btnZap);
    // Inserir o menu sempre no fundo
    messages.appendChild(menuDiv);
    messages.scrollTop = messages.scrollHeight;
  }

  function responder(userMsg) {
    let resposta = respostasTecnicas.find(r => r.pergunta.test(userMsg));
    if (!resposta) resposta = respostasTecnicas[respostasTecnicas.length-1];
    setTimeout(() => addMsg(resposta.resposta, 'bot'), 600);
    setTimeout(() => showMenu(), 1200);
  }

  openBtn.onclick = () => {
    box.style.display = 'flex';
    openBtn.style.display = 'none';
    if (!messages.hasChildNodes()) {
      setTimeout(() => addMsg('Olá! 👋 Sou o assistente técnico do CRM Médico. Escolha um tema ou digite sua dúvida:', 'bot'), 200);
      setTimeout(() => showMenu(), 600);
    }
  };
  closeBtn.onclick = () => {
    box.style.display = 'none';
    openBtn.style.display = 'block';
  };
  form.onsubmit = (e) => {
    e.preventDefault();
    const userMsg = input.value.trim();
    if (!userMsg) return;
    addMsg(userMsg, 'user');
    input.value = '';
    responder(userMsg);
  };
</script>
 
<script>
  const reveals = document.querySelectorAll('.reveal');
  const obs = new IntersectionObserver((entries) => {
    entries.forEach((e, i) => {
      if (e.isIntersecting) {
        setTimeout(() => e.target.classList.add('visible'), i * 90);
        obs.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  reveals.forEach(el => obs.observe(el));
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const t = document.querySelector(a.getAttribute('href'));
      if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth' }); }
    });
  });
</script>
</body>
</html>