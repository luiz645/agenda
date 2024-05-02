<?php
// incluir o conexao na pagina e todo o seu conteudo"
include  'conexao.php';
if(isset($_GET['acao']) && $_GET['acao'] == 'excluir'){
    echo"eu quero deletar alguem do meu sistema ";
    exit;

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agenda</title>
</head>
<body>
    <header>
        <h1>agenda de contatos 
            <nav>
                <ul>
                    <li><a href="index.php">home</a></li>
                    <li><a href="cadastrar.php">cadastrar</a></li>
                </ul>
            </nav>
        </h1>
        
    </header>
    <header>
        <section>
            <h2>lista de contatos</h2>
            <table border="1">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>nome</td>
                    <td>sobrenome</td>
                    <td>nascimento</td>
                    <td>endereco</td>
                    <td>telefone</td>
                    <td>ações</td>

                </tr>
                   </thead>
                   <tbody>
                    <?php
                    //abrir a conexao com banco de dados 
                        $conexaoComBanco = abrirBanco();
                    //preparar a consulta SQL para selecionar os dados no BD
                        $query = "SELECT id,nome , sobrenome, nascimento, endereco, telefone 
                        FROM pessoa";
                    // executar a query (o SQL no banco)
                    $result = $conexaoComBanco->query($query);
                    //$registro = $result->fetch_assoc();
                    
                    // verificar se a query retornou o registros

                    if($result->num_rows >0){
                        // tem registro no banco

                        while($registro = $result->fetch_assoc()){

                            
                        ?>
                        <tr>
                            <td><?= $registro['id']?></td>
                            <td><?= $registro['nome']?></td>
                            <td><?= $registro['sobrenome']?></td>
                            <td><?= date("d/m/Y", strtotime($registro['nascimento']))?></td>
                            <td><?= $registro['endereco']?></td>
                            <td><?= $registro['telefone']?></td>
                            <td>
                                <a href="#"><button>editar</button></a>
                                <a href="acao=excluir&id=<?= $registro['id'] ?>" onclick="return confirm('tem certeza que deseja excluir?')"><button>Excluir</button></a>
                            </td>
                        </tr>
                        <?php

                        }
                    }else{
                        ?>
                        // nao tem registro no banco
                        echo("<tr><td colspan = '7'>nenhum registro encontrado no banco</td></tr>");

                            <?php
                    }
                    
                

                    // criar um laco de repeticao para preencher a tabela 
                    ?>
                   </tbody>
                   
            </table>
        </section>
    </header>
</body>
</html>