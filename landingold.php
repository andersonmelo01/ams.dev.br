<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ZipFood - Sistema de Delivery</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
    margin: 0;
    background: #f5f7fb;
    color: #0f172a;
}

/* CONTAINER */
.container {
    max-width: 1200px;
    margin: auto;
    padding: 0 20px;
}

/* HEADER */
.header {
    background: #fff;
    border-bottom: 1px solid #eee;
}
.header-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
}
.logo img {
    height: 36px;
}
.nav a {
    margin-left: 25px;
    text-decoration: none;
    color: #475569;
    font-weight: 500;
}
.nav a:hover {
    color: #ff6a00;
}

/* HERO */
.hero {
    display: grid;
    grid-template-columns: 1.1fr 1fr;
    gap: 60px;
    align-items: center;
    padding: 80px 0;
}

.hero h1 {
    font-size: 3.2rem;
    line-height: 1.1;
}
.hero h1 span {
    color: #ff6a00;
}

.hero p {
    margin: 25px 0;
    font-size: 1.1rem;
    color: #475569;
}

/* CTA */
.cta {
    background: linear-gradient(135deg, #ff6a00, #ff8c42);
    color: #fff;
    padding: 16px 34px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 600;
    display: inline-block;
    box-shadow: 0 10px 25px rgba(255,106,0,0.3);
    transition: 0.2s;
}
.cta:hover {
    transform: translateY(-2px);
}

/* HERO IMG */
.hero-img img {
    width: 100%;
    border-radius: 20px;
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
}

/* FEATURES */
.features {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-top: 40px;
}
.feature {
    background: #fff;
    padding: 20px;
    border-radius: 14px;
    border: 1px solid #eee;
    text-align: center;
}
.feature h4 {
    margin-top: 10px;
}

/* BANNER */
.banner {
    margin-top: 80px;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: #fff;
    padding: 50px;
    border-radius: 20px;
    display: flex;
    justify-content: space-between;
}
.banner span {
    color: #ff6a00;
}

/* GRID */
.grid {
    margin-top: 80px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 25px;
}
.card {
    background: #fff;
    padding: 25px;
    border-radius: 14px;
    border: 1px solid #eee;
}
.card h3 {
    color: #ff6a00;
}
.whatsapp {
    background: #25D366;
    box-shadow: 0 10px 25px rgba(37,211,102,0.3);
}

.whatsapp:hover {
    background: #1ebe5d;
    transform: translateY(-2px);
}

/* CTA FINAL */
.cta-final {
    margin-top: 80px;
    background: linear-gradient(135deg, #ff6a00, #ff8c42);
    padding: 50px;
    border-radius: 20px;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* FOOTER */
.footer {
    margin-top: 60px;
    text-align: center;
    padding: 30px;
    color: #64748b;
}

/* RESPONSIVO */
@media(max-width: 900px){
    .hero {
        grid-template-columns: 1fr;
        text-align: center;
    }
    .features {
        grid-template-columns: 1fr 1fr;
    }
    .grid {
        grid-template-columns: 1fr;
    }
    .banner,
    .cta-final {
        flex-direction: column;
        text-align: center;
        gap: 20px;
    }
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
  <div class="container header-content">
      <div class="logo">
          <img src="logo-zipfood.svg" alt="ZipFood">
      </div>
      <div class="nav">
          <a href="#">Recursos</a>
          <a href="#">Planos</a>
          <a href="#">Entrar</a>
      </div>
  </div>
</div>

<div class="container">

<!-- HERO -->
<div class="hero">
    <div>
        <h1>Seu delivery, <span>mais rápido</span>, simples e completo.</h1>
        <p>Sistema completo para restaurantes que querem vender mais, fidelizar clientes e ter controle total do negócio.</p>
        <a href="#" class="cta">Começar grátis agora →</a>
    </div>

    <div class="hero-img">
        <img src="delivery.jpeg" alt="Sistema ZipFood">
    </div>
</div>

<!-- FEATURES -->
<div class="features">
    <div class="feature">
        ⚡
        <h4>Pedidos rápidos</h4>
        <p>Mais agilidade no atendimento</p>
    </div>
    <div class="feature">
        📦
        <h4>Gestão completa</h4>
        <p>Controle total do negócio</p>
    </div>
    <div class="feature">
        📊
        <h4>Relatórios</h4>
        <p>Decisões com dados</p>
    </div>
    <div class="feature">
        🔔
        <h4>Notificações</h4>
        <p>Tempo real</p>
    </div>
</div>

<!-- BANNER -->
<div class="banner">
    <div>
        <h2>Mais controle.<br>Mais entregas.<br><span>Mais resultados.</span></h2>
    </div>
    <div>
        Ideal para restaurantes, lanchonetes, pizzarias e muito mais.
    </div>
</div>

<!-- GRID -->
<div class="grid">
    <div class="card">
        <h3>Mais lucro por pedido</h3>
        <p>Sem taxas abusivas de marketplace</p>
    </div>
    <div class="card">
        <h3>Implantação rápida</h3>
        <p>Seu sistema funcionando em poucos dias</p>
    </div>
    <div class="card">
        <h3>Mais clientes</h3>
        <p>Estratégias para crescer seu delivery</p>
    </div>
</div>

<!-- CTA FINAL -->
<div class="cta-final">
    <div>
        <h2>Comece hoje mesmo</h2>
        <p>Solicite uma demonstração gratuita</p>
    </div>
    <a href="https://wa.me/5521982846871" class="cta whatsapp" target="_blank">
    💬 Falar no WhatsApp
    </a>
</div>

<!-- FOOTER -->
<div class="footer">
    © 2026 ZipFood - Todos os direitos reservados
</div>

</div>

</body>
</html>