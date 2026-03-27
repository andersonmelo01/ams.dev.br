<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        body {
            background-color: rgb(55, 114, 140);
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 2.2rem;
            /* Aumenta o tamanho da fonte para 1.2 rem (12px) */
            line-height: 1.6;
            /* Aumenta o espaçamento entre linhas */
            font-weight: 400;
            /* Define o peso da fonte como normal */
            font-style: normal;
            /* Aplica estilo normal */
        }

        h1 {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 3.2rem;
        }

        .h1ti {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 4.2rem;
        }

        input:not(:placeholder-shown) {
            border-color: green;
            /*background-color:rgb(15, 171, 116);*/
        }

        /*input:placeholder-shown {
            border-color: red;
            /*background-color:rgb(199, 98, 98);*/

        input[type=submit] {
            display: block;
            background-color: #ccc;
            height: 35px;
            border: none;
            outline: 0;
            cursor: pointer;
            width: 100px;
            margin: 0 auto;
            text-align: center;
            border-radius: 15px;
        }
    </style>

</head>

<body>
    <header>
        <div class="col">
            <h1 class="d-flex justify-content-center h1ti">PORTAL AMS</h1>
        </div>
    </header>

    <h1 class="d-flex justify-content-center">Login</h1>
    <div class="container" style="width: 500px;">
        <form method="post" action="principal.php" class="border border-white border-5 rounded d-flex justify-content-center align-self-center col-md-auto">
            <div class="row">
                <div class="m-2">
                    <label for="Usuario" class="form-label">Nome</label>
                    <input type="text" class="form-control" placeholder="Usuario" style="width: 300px;" name="usuario" required>

                    <label for="Senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" aria-label="Last name" style="width: 300px;" name="senha">
                    <button type="submit" class="btn btn-dark m-2 p-2" name="acao">Entrar</button>
                    <button onclick="alert('Fazer contato com Administrador para criar Senha: amssistemas95@gmail.com')" class=" btn btn-dark m-2 p-2" name="acao">Fazer Cadastro</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>