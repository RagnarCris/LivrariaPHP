<?php
// Importar o arquivo de conexão
require_once 'conexao.php';
// Importar o arquivo responsável pelo modelo de dados da livraria
require_once 'livraria_db.php';
// acervo em vetor
$acervo = array(
 'id' => '',
 'id_editora' => '',
 'titulo' => '',
 'autor' => '',
 'ano' => '',
 'preco' => '',
 'quantidade' => '',
 'tipo' => ''
);
// Verifica que o ID do acervo foi passado via URL
if ( isset( $_GET['id'] ) && ! empty( $_GET['id'] ) ) {
    // Buscar acervo pelo ID
    $acervo = filtrar_acervo_por_id( $_GET['id'] );
}
?>
<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <title>Cadastro de acervos</title>

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container">
                <div class="page-header">
                    <h1>Cadastro de acervos</h1>
                </div>
                <?php if ( isset($_GET['erro']) && $_GET['erro'] == '1' ) : ?>
                    <div class="alert alert-danger">
                        Verifique os campos obrigatórios
                    </div>
                <?php endif; ?>
                <form action="acervo-processa.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $acervo['id']; ?>">
                    <input type="hidden" name="acao" value="salvar">
                    <div class="form-group">
                        <label for="id_editora">ID Editora</label>
                        <input type="text" name="id_editora" id="id_editora" class="form-control" value="<?php echo $acervo['id_editora']; ?>" maxlength="11">
                    </div>
                    <div class="form-group">
                        <label for="titulo">titulo *</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $acervo['titulo']; ?>" maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="autor">autor</label>
                        <input type="text" name="autor" id="autor" class="form-control" value="<?php echo $acervo['autor']; ?>" maxlength="9">
                    </div>
                    <div class="form-group">
                        <label for="ano">Endereço</label>
                        <input type="text" name="ano" id="ano" class="form-control" value="<?php echo $acervo['ano']; ?>" maxlength="60">
                    </div>
                    <div class="form-group">
                        <label for="preco">Número</label>
                        <input type="number" name="preco" id="preco" class="form-control" value="<?php echo $acervo['preco']; ?>" min="1"
                        max="99999999">
                    </div>
                    <div class="form-group">
                        <label for="quantidade">quantidade</label>
                        <input type="text" name="quantidade" id="quantidade" class="form-control" value="<?php echo $acervo['quantidade']; ?>" maxlength="45">
                    </div>
                    <div class="form-group">
                        <label for="tipo">tipo</label>
                        <input type="text" name="tipo" id="tipo" class="form-control" value="<?php echo $acervo['tipo']; ?>" maxlength="45">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </form>
                <br>
            </div>
        </body>
    </html>