/* =====================================================
   BARRA DE PESQUISA COM SCROLL SUAVE
===================================================== */
document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('searchInput');

    if (searchInput) {
        const sections = [
            { id: 'sobre', keywords: ['sobre', 'empresa', 'quem somos', 'historia'] },
            { id: 'servicos', keywords: ['serviço', 'servicos', 'web', 'sistema', 'infra', 'ti'] },
            { id: 'planos', keywords: ['plano', 'planos', 'preço', 'valor'] },
            { id: 'contato', keywords: ['contato', 'orçamento', 'email', 'falar'] }
        ];

        searchInput.addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                const query = searchInput.value.toLowerCase().trim();
                let found = false;

                for (const section of sections) {
                    for (const keyword of section.keywords) {
                        if (query.includes(keyword)) {
                            const el = document.getElementById(section.id);
                            if (el) {
                                el.scrollIntoView({ behavior: 'smooth' });
                                found = true;
                            }
                            break;
                        }
                    }
                    if (found) break;
                }

                if (!found) {
                    alert('Seção não encontrada!');
                }
            }
        });
    }

    /* =====================================================
       FORMULÁRIO WHATSAPP + GOOGLE ADS CONVERSION
    ===================================================== */
    const form = document.getElementById('whatsappForm');

    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const nome = document.getElementById('nome')?.value || '';
            const email = document.getElementById('email')?.value || '';
            const servico = document.getElementById('servico')?.value || '';
            const mensagem = document.getElementById('mensagem')?.value || '';

            const numeroWhatsApp = '5521982846871'; // número no formato internacional
            const texto =
                `Olá, meu nome é ${nome}.\n` +
                `E-mail: ${email}\n` +
                `Serviço: ${servico}\n` +
                `Mensagem: ${mensagem}`;

            const url = `https://api.whatsapp.com/send?phone=${numeroWhatsApp}&text=${encodeURIComponent(texto)}`;

            // Abre WhatsApp
            window.open(url, '_blank');

            // ===== Google Ads Conversion =====
            if (typeof gtag === 'function' && window.GOOGLE_ADS_SEND_TO) {
                gtag('event', 'conversion', {
                    send_to: window.GOOGLE_ADS_SEND_TO,
                    value: 1.0,
                    currency: 'BRL'
                });

                console.log('[Google Ads] Conversão disparada com sucesso');
            } else {
                console.warn('[Google Ads] gtag ou GOOGLE_ADS_SEND_TO não encontrados');
            }

            // ===== GA4 Event =====
            if (typeof gtag === 'function') {
                gtag('event', 'generate_lead', {
                    method: 'whatsapp',
                    form_name: 'Formulario WhatsApp'
                });

                console.log('[GA4] Evento generate_lead enviado');
            } else {
                console.log('[GA4] Evento generate_lead não encontrado');
            }
        });
    }

    /* =====================================================
   BOT WHATSAPP COM PERGUNTAS EM ETAPAS
===================================================== */

    const botOpen = document.getElementById('botOpen');
    const botWhats = document.getElementById('botWhats');
    const botClose = document.getElementById('botClose');
    const botBody = document.getElementById('botBody');

    let lead = {
        servico: '',
        urgencia: '',
        tamanho: ''
    };

    if (botOpen && botWhats && botBody) {

        botOpen.onclick = () => botWhats.style.display = 'block';
        botClose.onclick = () => botWhats.style.display = 'none';

        botBody.addEventListener('click', function (e) {
            if (!e.target.matches('button')) return;

            const step = e.target.dataset.step;
            const value = e.target.dataset.value;

            // =====================
            // ETAPA 1 – SERVIÇO
            // =====================
            if (step === '1') {
                lead.servico = value;

                botBody.innerHTML = `
                <p><strong>2️⃣ Qual a urgência?</strong></p>
                <button data-step="2" data-value="Urgente">🚨 Urgente</button>
                <button data-step="2" data-value="Em breve">📆 Em breve</button>
                <button data-step="2" data-value="Só orçamento">💬 Só orçamento</button>
            `;
            }

            // =====================
            // ETAPA 2 – URGÊNCIA
            // =====================
            if (step === '2') {
                lead.urgencia = value;

                botBody.innerHTML = `
                <p><strong>3️⃣ Qual o porte do projeto?</strong></p>
                <button data-step="3" data-value="Autônomo / Pequeno negócio">👤 Pequeno</button>
                <button data-step="3" data-value="Empresa média">🏢 Média</button>
                <button data-step="3" data-value="Empresa grande">🏭 Grande</button>
            `;
            }

            // =====================
            // ETAPA 3 – FINAL
            // =====================
            if (step === '3') {
                lead.tamanho = value;

                const numeroWhatsApp = '5521982846871';

                const texto =
                    `Olá! Vim pelo site 🤖\n\n` +
                    `📌 Serviço: ${lead.servico}\n` +
                    `⏱️ Urgência: ${lead.urgencia}\n` +
                    `🏢 Porte: ${lead.tamanho}\n\n` +
                    `Aguardo retorno.`;

                const url = `https://api.whatsapp.com/send?phone=${numeroWhatsApp}&text=${encodeURIComponent(texto)}`;

                // ===== GA4 =====
                if (typeof gtag === 'function') {
                    gtag('event', 'generate_lead', {
                        method: 'bot_whatsapp',
                        service: lead.servico,
                        urgency: lead.urgencia,
                        company_size: lead.tamanho
                    });
                }

                // ===== Google Ads =====
                if (typeof gtag === 'function' && window.GOOGLE_ADS_SEND_TO) {
                    gtag('event', 'conversion', {
                        send_to: window.GOOGLE_ADS_SEND_TO,
                        value: 1,
                        currency: 'BRL'
                    });
                }

                window.open(url, '_blank');
            }
        });
    }


});
