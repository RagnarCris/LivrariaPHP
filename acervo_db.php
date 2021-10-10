<?php
/*
 * Script responsável pelo modelo de dados de acervos
 */
// Buscar acervo por id
function filtrar_acervo_por_id( $id ) {
    global $conexao;
    // Impedir SQL Injection
    $id = mysqli_real_escape_string( $conexao, $id );
    // Comando SQL para selecionar registro por ID
    $sql = "SELECT * FROM acervo WHERE id = '$id'";
    // Executa comando SQL
    $resultado = mysqli_query( $conexao, $sql );
    // Retorna registro encontrado
    return mysqli_fetch_assoc( $resultado );
}
// Buscar todos os acervos
function filtrar_todos_acervos() {
    global $conexao;
    // Comando SQL para selecionar todos os registros
    $sql = "SELECT * FROM acervo";
    // Executa comando SQL
    $acervos = mysqli_query( $conexao, $sql );
    // Retorna todos os registros encontrados
    return $acervos;
}
// Inserir acervo
function inserir_acervo( $acervo ) {
    global $conexao;
    // Impedir SQL Injection
    $id_editora = mysqli_real_escape_string( $conexao, $acervo['id_editora'] );
    $titulo = mysqli_real_escape_string( $conexao, $acervo['titulo'] );
    $autor = mysqli_real_escape_string( $conexao, $acervo['autor'] );
    $ano = mysqli_real_escape_string( $conexao, $acervo['ano'] );
    $preco = mysqli_real_escape_string( $conexao, $acervo['preco'] );
    $quantidade = mysqli_real_escape_string( $conexao, $acervo['quantidade'] );
    $tipo = mysqli_real_escape_string( $conexao, $acervo['tipo'] );
 
    // Comando SQL para selecionar todos os registros
    $sql = "INSERT INTO acervo (id_editora, titulo, autor, ano, preco, quantidade, tipo) " .
    "VALUES ('$id_editora', '$titulo', '$autor', '$ano', '$preco', '$quantidade', '$tipo')";
    // Executa comando SQL
    $resultado = mysqli_query( $conexao, $sql );
    // Retorna resultado da transação
    return $resultado;
}
// Alterar dados do acervo
function alterar_acervo( $acervo ) {
    global $conexao;
    // Impedir SQL Injection
    $id = mysqli_real_escape_string( $conexao, $acervo['id'] );
    $id_editora = mysqli_real_escape_string( $conexao, $acervo['id_editora'] );
    $titulo = mysqli_real_escape_string( $conexao, $acervo['titulo'] );
    $autor = mysqli_real_escape_string( $conexao, $acervo['autor'] );
    $ano = mysqli_real_escape_string( $conexao, $acervo['ano'] );
    $preco = mysqli_real_escape_string( $conexao, $acervo['preco'] );
    $quantidade = mysqli_real_escape_string( $conexao, $acervo['quantidade'] );
    $tipo = mysqli_real_escape_string( $conexao, $acervo['tipo'] );
 
    // Comando SQL para selecionar todos os registros
    $sql = "
    UPDATE acervo
    SET id_editora = '$id_editora',
    titulo = '$titulo',
    autor = '$autor',
    ano = '$ano',
    preco = '$preco',
    quantidade = '$quantidade',
    tipo = '$tipo'
    WHERE id = '$id'
    ";
    // Executa comando SQL
    $resultado = mysqli_query( $conexao, $sql );
    // Retorna resultado da transação
    return $resultado;
}
// Excluir acervo
function excluir_acervo( $id ) {
    global $conexao;
    // Impedir SQL Injection
    $id = mysqli_real_escape_string( $conexao, $id );
    // Comando SQL para selecionar todos os registros
    $sql = "DELETE FROM acervo WHERE id = '$id'";
    // Executa comando SQL
    $resultado = mysqli_query( $conexao, $sql );
    // Retorna resultado da transação
    return $resultado;
}