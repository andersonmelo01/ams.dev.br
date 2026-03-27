<?php
$server = "mysql:host=localhost;dbname=ams";
$user = "root";
$pass = "admin";

try{
    $conn = new PDO($server, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura o modo de erro
    
    //echo "Conectado com sucesso!";
} catch(PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
}

function mensagem($texto, $tipo)
{
    echo "<div class='alert alert-$tipo' role='alert'>
                $texto 
        </div>";
}

function mostra_data($data)
{
    $d = explode('-', $data);
    $escrever = $d[2] . "/" . $d[1] . "/" . $d[0];
    return $escrever;
}
