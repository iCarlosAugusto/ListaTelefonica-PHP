<?php
     require "./bancoDeDados/conexao.php";

    if(count($_POST) > 0){
        $dados = $_POST;
        $erros = [];

        if(!filter_var($dados['numero'], FILTER_VALIDATE_INT)){
            $erros[] = "É necessário que você coloque algum número";
        }

        if(trim($dados['nome']) == ""){
            $erros[] = "É necessário colocar algum nome";
        }

       foreach($erros as $erro){
          echo "<p> $erro </p>";
       }

       if(count($erros) == 0){
      
           $conexao = novaConexao();

           $dadosArray = [
               $dados['nome'],
               $dados['numero'],
               $dados['anotaçao']
           ];

            $sql = "INSERT INTO contatos (nome, numero, anotaçao) VALUES (?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sis",...$dadosArray);
            
            if($stmt->execute()){
                echo "Registrado :)";
            }

       }
        
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  
    <div class="main">
        <head class="titulo-main">
            <h1> Lista Telefonica PHP</h1>
        </head>

        <section>
            <form action="#" method="POST">
                <head>
                    <h3> Adicione um novo contato</h3>
                </head>
                
                <input type="number" name="numero" id="numero" placeholder="Número">
                <input type="text" name="nome" id="nome" placeholder="Nome">
                <textarea name="anotaçao" id="anotaçao" placeholder="Anotação"> </textarea> 
                <button> Adicionar Contato</button> 
            </form>
        </section>
    </div>
    
    
</body>
</html>
