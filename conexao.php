<?php

 // criar contantes para amarzenar as informações de acesso ao banco de dados
    define ("DB_HOST", "localhost");
    define ("DB_USER", "root");
    define ("DB_PASS", "");
    define ("DB_NAME", "agenda");
    define ("DB_PORT", 3306);


function abrirbanco(){ 

   /**
    * abre uma conexao com o banco de dados e retorna um objeto de conexao.
    * @return mysqli - retornar a objeto de conexao mysql.
    */
    $conexaoComBanco = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

    // verificar se ocorre algu erro durante a conexao

    if($conexaoComBanco->connect_error){
        die("falha na conexao :" . $conexaoComBanco->connect_error);
    }
    return $conexaoComBanco;
}
/**
 * fecha a conexao com o banco de dados
 */

function fecharBanco($conexaoComBanco){
    $conexaoComBanco->close();
}
?>