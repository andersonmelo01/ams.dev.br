<?php
$config = include 'config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Soluções em Tecnologia | Desenvolvimento e Infraestrutura</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $config['google_ads_id'] ?>"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y5GYZ94XHE">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-Y5GYZ94XHE');
    </script>
    <!-- Google AdSense -->
    <script async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=<?= $config['adsense_client_id'] ?>"
        crossorigin="anonymous">
    </script>


</head>

<body>
    <!-- MENU -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="logo" width="120" height="50" class="d-inline-block align-text-top">
                <!--AMS <span>Sistemas</span>-->
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuPrincipal">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sobre">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicos">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#planos">Planos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Contato</a>
                    </li>
                    <li class="nav-item ms-lg-3">
                        <input type="text" id="searchInput" class="form-control search-input" placeholder="Pesquisar...">
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <header class="hero">
        <div class="container">

            <span class="badge badge-tech mb-3">
                🚀 Infraestrutura + Sistemas SaaS
            </span>

            <h1 class="display-4 fw-bold">
                Tecnologia completa para
                <span class="text-gradient">empresas que precisam de estabilidade</span>
            </h1>

            <p class="lead mt-4">
                Automatize seu negócio com sistemas de <strong>Delivery</strong>,
                <strong>Vendas</strong> e <strong>CRM Médico</strong>,
                enquanto cuidamos de toda sua infraestrutura.
            </p>

            <div class="mt-5 d-flex justify-content-center gap-3 flex-wrap">
                <a href="#saas" class="btn btn-primary btn-lg">
                    🚀 Ver Sistemas
                </a>

                <a href="#contato" class="btn btn-outline-light btn-lg">
                    💬 Solicitar Orçamento
                </a>
            </div>

        </div>
    </header>
    <!-- Anúncio AdSense -->
    <!--<div class="container my-5 text-center">
        <ins class="adsbygoogle"
            style="display:block"
            data-ad-client="<?= $config['adsense_client_id'] ?>"
            data-ad-slot="1234567890"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
    </div>-->

    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    <!-- SOBRE -->
    <section id="sobre">
        <div class="container">
            <h2 class="section-title fw-bold">Sobre a Empresa</h2>

            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <p class="text-muted fs-5">
                        Somos uma empresa de tecnologia especializada em
                        <strong>desenvolvimento de sistemas</strong>,
                        <strong>soluções web</strong> e
                        <strong>infraestrutura de TI</strong>,
                        atuando com foco total em estabilidade, segurança e crescimento sustentável.
                    </p>

                    <p class="text-muted">
                        Atendemos empresas que precisam de soluções confiáveis,
                        desde a criação de sites e sistemas personalizados até
                        a administração completa de servidores Windows e Linux,
                        redes corporativas e suporte técnico contínuo.
                    </p>

                    <p class="text-muted">
                        Nosso compromisso é entregar tecnologia que funcione de verdade,
                        com organização, boas práticas, documentação e suporte próximo ao cliente.
                    </p>
                </div>

                <div class="col-md-6">
                    <div class="card p-4">
                        <h5 class="fw-bold mb-3">Nossos Pilares</h5>

                        <ul class="list-unstyled">
                            <li class="mb-2">✔ Desenvolvimento profissional e escalável</li>
                            <li class="mb-2">✔ Infraestrutura segura e monitorada</li>
                            <li class="mb-2">✔ Atendimento técnico transparente</li>
                            <li class="mb-2">✔ Soluções sob medida para cada empresa</li>
                            <li class="mb-2">✔ Foco em resultado e continuidade</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SISTEMAS SAAS -->
    <section id="saas">
        <div class="container">
            <h2 class="section-title fw-bold">Sistemas SaaS</h2>

            <div class="row g-4">

                <!-- DELIVERY -->
                <div class="col-md-4">
                    <div class="card p-4 h-100 highlight">
                        <span class="badge badge-tech mb-2">🔥 Mais procurado</span>

                        <h5 class="fw-bold">Sistema de Delivery</h5>

                        <p class="text-muted">
                            Plataforma completa para restaurantes com pedidos online
                            e integração com WhatsApp.
                        </p>

                        <ul>
                            <li>✔ Cardápio digital</li>
                            <li>✔ Pedido automático</li>
                            <li>✔ Gestão de entregas</li>
                        </ul>

                        <a href="#contato" class="btn btn-primary mt-3">
                            Quero esse sistema
                        </a>
                    </div>
                </div>

                <!-- VENDAS -->
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="fw-bold">Sistema de Vendas</h5>

                        <p class="text-muted">
                            Controle completo de vendas, estoque e financeiro.
                        </p>

                        <ul>
                            <li>✔ PDV completo</li>
                            <li>✔ Estoque</li>
                            <li>✔ Relatórios</li>
                        </ul>

                        <a href="#contato" class="btn btn-primary mt-3">
                            Quero esse sistema
                        </a>
                    </div>
                </div>

                <!-- CRM -->
                <div class="col-md-4">
                    <div class="card p-4 h-100">
                        <h5 class="fw-bold">CRM Médico</h5>

                        <p class="text-muted">
                            Gestão completa para clínicas e consultórios.
                        </p>

                        <ul>
                            <li>✔ Agenda médica</li>
                            <li>✔ Pacientes</li>
                            <li>✔ Prontuário</li>
                        </ul>

                        <a href="#contato" class="btn btn-primary mt-3">
                            Quero esse sistema
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- DIFERENCIAIS -->
    <section>
        <div class="container">
            <h2 class="section-title fw-bold">Por que escolher nossa empresa?</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4 text-center">
                        <div class="icon-box"><i class="bi bi-code-slash"></i></div>
                        <h5 class="fw-bold">Código Profissional</h5>
                        <p class="text-muted">Projetos desenvolvidos com boas práticas, escaláveis e seguros.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4 text-center">
                        <div class="icon-box"><i class="bi bi-server"></i></div>
                        <h5 class="fw-bold">Infraestrutura Sólida</h5>
                        <p class="text-muted">Servidores Windows e Linux configurados para alta disponibilidade.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4 text-center">
                        <div class="icon-box"><i class="bi bi-shield-lock"></i></div>
                        <h5 class="fw-bold">Segurança e Confiabilidade</h5>
                        <p class="text-muted">Proteção de dados, backups e monitoramento contínuo.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVIÇOS -->
    <section class="bg-light" id="servicos">
        <div class="container">
            <h2 class="section-title fw-bold">Nossos Serviços</h2>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="fw-bold">Desenvolvimento Web</h5>
                        <p class="text-muted">
                            Sites institucionais, landing pages e sistemas web modernos,
                            rápidos e responsivos.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="fw-bold">Sistemas Desktop</h5>
                        <p class="text-muted">
                            Desenvolvimento de sistemas desktop sob medida
                            para automação e controle interno.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="fw-bold">Sistemas Web / ERP / CRM</h5>
                        <p class="text-muted">
                            Plataformas personalizadas para gestão,
                            relatórios e processos empresariais.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="fw-bold">Administração de Servidores</h5>
                        <p class="text-muted">
                            Gerenciamento de servidores Windows e Linux,
                            VPS, cloud, backups e segurança.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="fw-bold">Infraestrutura de TI</h5>
                        <p class="text-muted">
                            Redes, monitoramento, suporte técnico
                            e organização do ambiente corporativo.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card p-4">
                        <h5 class="fw-bold">Suporte e Manutenção</h5>
                        <p class="text-muted">
                            Acompanhamento contínuo, melhorias,
                            atualizações e suporte técnico especializado.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PLANOS -->
    <section id="planos" class="bg-light">
        <div class="container">
            <h2 class="section-title fw-bold">Planos e Preços</h2>
            <p class="text-center text-muted mb-5">
                Escolha o plano ideal para sua empresa. Todos podem ser personalizados conforme a necessidade.
            </p>

            <div class="row g-4">

                <!-- PLANO START -->
                <div class="col-md-4">
                    <div class="card p-4 text-center h-100">
                        <h5 class="fw-bold">Plano Start</h5>
                        <p class="text-muted">Ideal para pequenos negócios</p>

                        <div class="price mb-3">R$ 197<span class="fs-6">/mês</span></div>

                        <ul class="list-unstyled text-start mt-4">
                            <li>✔ Site institucional</li>
                            <li>✔ Manutenção básica</li>
                            <li>✔ Correções simples</li>
                            <li>✔ Backup mensal</li>
                            <li>✔ Suporte via WhatsApp</li>
                        </ul>

                        <a href="#contato" class="btn btn-primary mt-4">
                            Contratar Plano
                        </a>
                    </div>
                </div>

                <!-- PLANO PRO (DESTAQUE) -->
                <div class="col-md-4">
                    <div class="card p-4 text-center h-100 highlight">
                        <h5 class="fw-bold">Plano Pro</h5>
                        <p class="text-muted">Mais contratado</p>

                        <div class="price mb-3">R$ 497<span class="fs-6">/mês</span></div>

                        <ul class="list-unstyled text-start mt-4">
                            <li>✔ Site ou sistema web</li>
                            <li>✔ Manutenção contínua</li>
                            <li>✔ Suporte prioritário</li>
                            <li>✔ Monitoramento básico</li>
                            <li>✔ Backup semanal</li>
                            <li>✔ Atualizações de segurança</li>
                        </ul>

                        <a href="#contato" class="btn btn-primary mt-4">
                            Contratar Plano
                        </a>
                    </div>
                </div>

                <!-- PLANO ENTERPRISE -->
                <div class="col-md-4">
                    <div class="card p-4 text-center h-100">
                        <h5 class="fw-bold">Plano Enterprise</h5>
                        <p class="text-muted">Infraestrutura e TI completa</p>

                        <div class="price mb-3">R$ 1.200<span class="fs-6">/mês</span></div>

                        <ul class="list-unstyled text-start mt-4">
                            <li>✔ Administração de servidores</li>
                            <li>✔ Windows e Linux</li>
                            <li>✔ Monitoramento 24/7</li>
                            <li>✔ Backups diários</li>
                            <li>✔ Segurança e hardening</li>
                            <li>✔ Suporte técnico dedicado</li>
                            <li>✔ SLA empresarial</li>
                        </ul>

                        <a href="#contato" class="btn btn-primary mt-4">
                            Falar com Especialista
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- CTA -->
    <section class="text-center">
        <div class="container">
            <h2 class="fw-bold mb-4">
                Precisa de tecnologia confiável para sua empresa?
            </h2>
            <a href="#contato" class="btn btn-primary btn-lg">
                Falar com Especialista
            </a>
        </div>
    </section>

    <!-- CONTATO -->
    <section id="contato" class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <h2 class="section-title fw-bold">Solicite um Orçamento</h2>

                    <form class="card p-4" id="whatsappForm">
                        <input id="nome" name="nome" class="form-control mb-3" placeholder="Nome" required>
                        <input id="email" name="email" type="email" class="form-control mb-3" placeholder="E-mail" required>

                        <!-- Seleção de serviço -->
                        <select id="servico" name="servico" class="form-control mb-3" required>
                            <option value="" disabled selected>Selecione o serviço</option>
                            <option value="Desenvolvimento Web">Desenvolvimento Web</option>
                            <option value="Sistemas Desktop">Sistemas Desktop</option>
                            <option value="Sistemas Web / ERP / CRM">Sistemas Web / ERP / CRM</option>
                            <option value="Administração de Servidores">Administração de Servidores</option>
                            <option value="Infraestrutura de TI">Infraestrutura de TI</option>
                            <option value="Suporte e Manutenção">Suporte e Manutenção</option>
                        </select>

                        <textarea id="mensagem" class="form-control mb-3" rows="4" placeholder="Descreva sua necessidade"
                            required></textarea>

                        <button type="submit" class="btn btn-primary btn-lg w-100">Enviar via WhatsApp</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="py-4 text-center">
        © 2026 • Empresa de Tecnologia • Todos os direitos reservados
        <br>
        <a href="politica.html" class="text-decoration-none" style="color: #2563eb;">Política de Privacidade</a>
    </footer>

    <!-- BOT WHATSAPP -->
    <div id="botWhats" class="bot-whatsapp">
        <div class="bot-header">
            🤖 Assistente AMS
            <span id="botClose">×</span>
        </div>

        <div class="bot-body" id="botBody">
            <p><strong>Olá 👋</strong><br>Vou te ajudar em poucos passos.</p>
            <p><strong>1️⃣ Qual serviço você procura?</strong></p>

            <button data-step="1" data-value="Desenvolvimento Web">🌐 Desenvolvimento Web</button>
            <button data-step="1" data-value="Sistemas / ERP / CRM">💻 Sistemas / ERP / CRM</button>
            <button data-step="1" data-value="Infraestrutura de TI">🖧 Infraestrutura de TI</button>
            <button data-step="1" data-value="Suporte Técnico">🛠️ Suporte Técnico</button>
        </div>

    </div>

    <button id="botOpen" class="bot-open">
        <i class="bi bi-whatsapp"></i>
    </button>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        //O restante do seu código (barra de pesquisa, scroll suave) continua igual, sem alterações.
        //Agora, cada envio do formulário via WhatsApp dispara uma conversão no Google Ads.

        window.GOOGLE_ADS_SEND_TO = '<?= $config['google_ads_id'] ?>/<?= $config['gtag_conversion_label'] ?>';
    </script>

    <script src="script.js"></script>
</body>

</html>