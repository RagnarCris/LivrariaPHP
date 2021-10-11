<?php
// Importar o arquivo de conexão
require_once 'conexao.php';
// Importar o arquivo responsável pelo modelo de dados da livraria
require_once 'livraria_db.php';
// Certificar que uma ação foi requisitada
if ( ! isset( $_REQUEST['acao'] ) )
    return header( 'Location: acervo_lista.php' );
// Executar ação
switch ( $_REQUEST['acao'] ) {

    case 'salvar':
        // Pegar ID do registro
        $id = $_POST['id'];

        // Validar campos obrigatórios
        if ( empty( $_POST['titulo'] ) || empty( $_POST['autor'] ) || empty( $_POST['preco'] ) || empty( $_POST['quantidade'] ) ) {
            return header( 'Location: acervo_form.php?erro=1' . ( ! empty($id ) ? "&id=$id" : '' ) );
        }
        
        // Verificar se o registro é novo
        if ( empty( $id ) ){
            if(empty($_POST['id_editora']))
                inserir_acervo_sem_editora( $_POST );
            else
                inserir_acervo( $_POST );
        }
        else
            alterar_acervo( $_POST );
        break;

    case 'excluir':
        excluir_acervo( $_GET['id'] );
        break; 
    default:
        break;
}
// Redirecionar para a página acervo_lista.php
header( 'Location: acervo_lista.php' );
?>