<?php

require_once "conexao.php";

$conexao = novaConexao();

$sql = "CREATE TABLE IF NOT EXISTS Contatos(
    id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    numero INT,
    anotaçao VARCHAR(100)
)";

$resultado = $conexao->query($sql);

if($resultado){
    echo "Sucesso :)";
}else{
    $conexao->error;
}
$conexao->close();
