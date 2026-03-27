<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Do Usuario</title>
</head>

<body>
    <!--Código para efetuar o cadastro de Usuário-->
    <?php
        include "conexao.php";

        $nome = $_POST['nome'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $sql = $conn->prepare("INSERT INTO usuario(nome,usuario,senha)
                        VALUES('{$nome}','{$usuario}','{$senha}')");
        $sql->execute();

        // Verifica se a inserção foi bem-sucedida
        if ($sql->rowCount() > 0) {
            echo "<script>alert('Usuário(a): Inseridos Com Sucesso! ! !')</script>";
            //echo "<script>window.location.href = 'usuario.php'</script>";
        } else {
            echo "<script>alert('Erro ao Inserir Usuário(a)! ! !')</script>";
            //echo "<script>window.location.href = 'usuario.php'</script>";
        }
    ?>
    <button><a href="usuario.php">Voltar</a></button>
</body>

</html>