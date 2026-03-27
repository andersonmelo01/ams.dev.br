<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">

</head>

<body>
    <?php
        $pesquisa = $_POST['usuario'] ?? '';
        include "conexao.php";
        //$sql = $conn->prepare("SELECT * FROM usuario WHERE nome LIKE '%$pesquisa%'");
        $sql = $conn->prepare("SELECT * FROM usuario WHERE usuario LIKE '%$pesquisa%'");
        $sql->execute();
        while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
            $id = $linha['id'];
            $nome = $linha['nome'];
            $usuario = $linha['usuario'];
            $senha = $linha['senha'];
        }

        if (isset($usuario)){
            echo "<script>alert('Acesso permitido com sucesso ! ! !')</script>";
            echo "<script>document.getElementById('select').focus()</script>";
        }
        else{
            echo "<script>alert('Usuário informado não existe!')</script>";
            echo "<script>window.location.href = 'index.php'</script>";
        } 

        echo "Olá, " . $nome;
    ?>
    <header class="mb-3 border border-primary border-1">
        <div class="btn-group">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="select">
                Dropdown
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="Usuario.php">Cadatro de Usuário</a></li>
                <li><a class="dropdown-item" href="iso.php">Controle de Qualidade</a></li>
                <li><a class="dropdown-item" href="index.php">Voltar</a></li>
            </ul>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>