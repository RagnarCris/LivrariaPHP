<?php
    // Variáveis de conexão
    $host = 'localhost';
    $usuario = 'root';
    $senha = '';
    $banco = 'livraria';
    // Tornando global a variável $conexao permitindo
    // ser usada dentro de funções e classes
    global $conexao;
    // Conectar com o banco de dados
    $conexao = mysqli_connect($host, $usuario, $senha, $banco);
    // Verificar se a conexão foi bem sucedida
    if (mysqli_connect_errno()) {
        die('Falha ao tentar conectar com o ' .
            'banco de dados MySQL: ' . mysqli_connect_error());
    }
    // Conexão bem sucedida
    echo 'Conexão realizada com sucesso!'
?>