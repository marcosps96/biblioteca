<?php

// host, indica o endereço base do sistema de livros
$host = 'http://localhost/sistema_livros/';

$db_name = 'biblioteca'; // db, Define o nome do banco de dados que será utilizado, nesse caso, biblioteca.
$db_host = 'localhost'; /*Define o host do banco de dados, que neste caso é localhost, 
                        indicando que o banco de dados está sendo executado na mesma máquina que o código PHP.*/
$db_user = 'root'; //Define o nome de usuário do banco de dados, que neste caso é root.
$db_pass = ''; //Define a senha do usuário do banco de dados. Neste caso, a senha está vazia. 


//Este bloco tenta estabelecer uma conexão com o banco de dados usando a função mysqli_connect(). 
//Se ocorrer algum erro durante a conexão, ele é capturado pelo bloco catch e lançado novamente.
try {
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    /*Esta linha tenta estabelecer a conexão com o banco de dados MySQL utilizando as informações de host, 
usuário, senha e nome do banco de dados definidos anteriormente. O resultado da conexão é armazenado na variável $conn, 
que pode ser usada posteriormente para realizar consultas e outras operações no banco de dados.*/

} catch (\Throwable $th) {
    throw $th;
} 
?>
