<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 1.2rem;
            /* Aumenta o tamanho da fonte para 1.2 rem (12px) */
            line-height: 1.6;
            /* Aumenta o espaçamento entre linhas */
            font-weight: 400;
            /* Define o peso da fonte como normal */
            font-style: normal;
            /* Aplica estilo normal */
        }
    </style>
</head>

<body>
    <h1 class="d-flex justify-content-center">Cadastro de Usuário</h1>
    <div class="container">
        <form action="Cadastrousuario.php" method="post" class="border border-primary border-5 p-2">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" placeholder="Nome Completo" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" placeholder="usuario" name="usuario" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" placeholder="senha" name="senha" required>
            </div>
            <div class="mb-3 d-flex">
                <input type="submit" class="btn btn-success m-1 p-2">
                <br>
                <a class="btn btn-primary btn-lg m-1 p-2" href="principal.php" role="button">Voltar para o inicio</a>
            </div>
        </form>
    </div>
    <!-- Código para Consulta de usuario-->
    <?php
    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";

    //$sql = $conn->prepare("SELECT * FROM usuario WHERE nome LIKE '%$pesquisa%'");
    $sql = $conn->prepare("SELECT * FROM usuario WHERE nome LIKE '%$pesquisa%'");
    $sql->execute();
    ?>

    <div class=" container">
                    <div class="row">
                        <div class="col">
                            <h1>Vizualizar e Concultar Usuários</h1>
                            <nav class="navbar navbar-light bg-light">
                                <form class="d-flex form-inline border border-primary border-5 p-2" action="usuario.php" method="POST">
                                    <input class=" form-control mr-sm-2" type="search" placeholder="Nome da Pessoa" aria-label="Search" name="busca" autofocus>
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                                    <button class="btn btn-outline-success my-2 my-sm-0" onclick="window.location.reload()">Atualizar</button>
                                </form>
                            </nav>
                            <table class=" table table-success table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Usuário</th>
                                        <th scope="col">Senha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($linha = $sql->fetch(PDO::FETCH_ASSOC)) {
                                        $id = $linha['id'];
                                        $nome = $linha['nome'];
                                        $usuario = $linha['usuario'];
                                        $senha = $linha['senha'];
                                        echo "<tr>
                                        <td>$id</td>
                                        <th scope='row'>$nome</th>
                                        <td>$usuario</td>
                                        <td>$senha</td>
                                        <td><a href='usuario.php?id=$id' class='btn btn-success btn-sm'>Editar</a>
                                        <a href='excluir_cadastro.php?id=$id' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#modal_confirma'
                                        onclick=" . '"' . "pegar_dados($id, '$nome')" . '"' . ">Excluir</a></td>
                                    </tr>";
                                    }
                                    ?>
                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>