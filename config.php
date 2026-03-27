<?php
session_start();

/**
 * Painel de Configuração em Tempo Real
 * Acessar: /config.php
 * Uso no site: $config = include 'config.php';
 */

/* =========================
   CONFIG LOGIN
========================= */
$LOGIN_USER = 'admin';
$LOGIN_PASS = '123456'; // Altere para uma senha forte

/* =========================
   CAMINHO DOS DADOS
========================= */
$dataFile = __DIR__ . '/config-data.php';

/* =========================
   CARREGAR DADOS
========================= */
$configData = file_exists($dataFile)
    ? include $dataFile
    : [
        'ga4_id' => '',
        'google_ads_id' => '',
        'gtag_conversion_label' => '',
        'adsense_client_id' => ''
    ];

/* =========================
   SE FOR INCLUÍDO NO SITE
========================= */
if (basename(__FILE__) !== basename($_SERVER['SCRIPT_FILENAME'])) {
    return $configData;
}

/* =========================
   LOGIN
========================= */
if (!isset($_SESSION['auth'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
        if (
            $_POST['user'] === $LOGIN_USER &&
            $_POST['pass'] === $LOGIN_PASS
        ) {
            $_SESSION['auth'] = true;
            header("Location: config.php");
            exit;
        } else {
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <title>Login Configurações</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background: #020617;
                color: #fff
            }

            .card {
                background: #0f172a;
                border: 1px solid #1e293b
            }
        </style>
    </head>

    <body class="d-flex align-items-center justify-content-center" style="height:100vh;">
        <div class="card p-4 shadow" style="width:350px;">
            <h4 class="text-center mb-3">🔐 Acesso Restrito</h4>
            <?php if (isset($erro)): ?>
                <div class="alert alert-danger"><?= $erro ?></div>
            <?php endif; ?>
            <form method="POST">
                <input type="hidden" name="login" value="1">
                <input class="form-control mb-3" name="user" placeholder="Usuário" required>
                <input type="password" class="form-control mb-3" name="pass" placeholder="Senha" required>
                <button class="btn btn-primary w-100">Entrar</button>
            </form>
        </div>
    </body>

    </html>
<?php
    exit;
}

/* =========================
   LOGOUT
========================= */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // redireciona para a home
    exit;
}


/* =========================
   CSRF TOKEN
========================= */
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}

/* =========================
   FUNÇÃO SALVAR
========================= */
function saveConfigData($file, $data)
{
    $export = var_export($data, true);
    $content = "<?php\nreturn $export;\n";
    file_put_contents($file, $content, LOCK_EX);
}

/* =========================
   SALVAR CONFIG
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {

    if (!hash_equals($_SESSION['token'], $_POST['token'])) {
        die('Token CSRF inválido!');
    }

    $newData = [
        'ga4_id' => trim($_POST['ga4_id'] ?? ''),
        'google_ads_id' => trim($_POST['google_ads_id'] ?? ''),
        'gtag_conversion_label' => trim($_POST['gtag_conversion_label'] ?? ''),
        'adsense_client_id' => trim($_POST['adsense_client_id'] ?? '')
    ];

    saveConfigData($dataFile, $newData);

    header("Location: config.php?saved=1");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Configurações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #020617);
            color: #fff;
        }

        .card {
            background: rgba(15, 23, 42, .85);
            border: 1px solid rgba(255, 255, 255, .05);
            backdrop-filter: blur(10px);
        }

        .form-control {
            background: #020617;
            border: 1px solid #1e293b;
            color: #fff;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: none;
        }
    </style>
</head>

<body>

    <div class="container py-5" style="max-width:700px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">⚙️ Configurações do Google</h2>
            <a href="?logout=1" class="btn btn-danger btn-sm">Sair</a>
        </div>

        <?php if (isset($_GET['saved'])): ?>
            <div class="alert alert-success">Configurações salvas em tempo real!</div>
        <?php endif; ?>

        <form method="POST" class="card p-4 shadow-lg">
            <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
            <input type="hidden" name="save" value="1">

            <h5 class="mb-3">Google Analytics (GA4)</h5>
            <input type="text" name="ga4_id" class="form-control mb-4"
                placeholder="Ex: G-XXXXXXXX"
                value="<?= htmlspecialchars($configData['ga4_id']) ?>">

            <h5 class="mb-3">Google Ads</h5>
            <input type="text" name="google_ads_id" class="form-control mb-3"
                placeholder="Ex: AW-XXXXXXXXX"
                value="<?= htmlspecialchars($configData['google_ads_id']) ?>">

            <input type="text" name="gtag_conversion_label" class="form-control mb-4"
                placeholder="Conversion Label"
                value="<?= htmlspecialchars($configData['gtag_conversion_label']) ?>">

            <h5 class="mb-3">Google AdSense</h5>
            <input type="text" name="adsense_client_id" class="form-control mb-4"
                placeholder="Ex: ca-pub-xxxxxxxxxxxx"
                value="<?= htmlspecialchars($configData['adsense_client_id']) ?>">

            <button type="submit" class="btn btn-primary w-100 fw-bold">
                💾 Salvar Configurações
            </button>
        </form>

        <p class="text-center mt-4 text-muted small">
            Acesse: <strong>/config.php</strong><br>
            Alterações aplicadas imediatamente no site.
        </p>
    </div>

</body>

</html>