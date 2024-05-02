<?php
include 'conexao.php';


//echo "<pre>";
//print_r($_SERVER);
//echo"</pre>";
//exit;
 if($_SERVER['REQUEST_METHOD'] == "POST"){
    //capturar os dados digitado no form e salva em variaveis
    // para facilitar a manipulacao dos dados 
  $nome = $_POST['nome'];
  $sobrenome = $_POST['sobrenome'];
  $nascimento = $_POST['nascimento'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];


  // vamos abrir a conexao com o banco de dados 
  $conexaoComBanco = abrirBanco();

 // vamos criar o sql para realizar o insert dos dados no BD
    $sql = "INSERT INTO pessoa (nome, sobrenome,nascimento, endereco,telefone)
    VALUES
    ('$nome','$sobrenome','$nascimento','$endereco','$telefone')";
  
   if($conexaoComBanco->query($sql)===true){
        echo":)Sucesso ao cadastrar o contato :)";
   }else{
    echo":( erro ao cadastrar o contato :(";
   }
 }
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agenda</title>
</head>
<body>
 
    <h1>agenda de contatos</h1>
</header>  
<nav>
    <ul>
        <li> <a href="index.php"> home</a></li>
        <li> <a href="cadastrar.php"> cadastrar</a></li>
    </ul>
</nav>
<header>
    <section>
        <h2>cadastrar contato</h2>
        <form action = "" method = "post" enctype="multipart/form.data">
        <label for="nome">nome</label>
        <input type=" text" id="nome" name="nome" required>
    
        <label for="sobrenome">sobrenome</label>
        <input type=" text" id="sobrenome" name="sobrenome" required>
    
        <label for="nascimento">nascimento</label>
        <input type="date" id="nascimento" name="nascimento" required>
    
        <label for="endereco">endereco</label>
        <input type=" text" id="endereco" name="endereco" required>
    
        <label for="telefone">telefone</label>
        <input type=" text" id="telefone" name="telefone" required>
    
        <button type="submit"> cadastrar</button>
        </form>
    </section>
</body>
</html>