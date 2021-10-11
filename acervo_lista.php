<?php
// Importar o arquivo de conexão
require_once 'conexao.php';
// Importar o arquivo responsável pelo modelo de dados da livraria
require_once 'livraria_db.php';

$pesquisa = filter_input(INPUT_GET, "pesquisa");
// Se foi feita uma pesquisa
if($pesquisa) {
    // Pesquisa na tabela acervo de acordo com o título
    $acervos = pesquisa_acervo_por_titulo($pesquisa);
}
else {
    // Buscar todos os acervos
    $acervos = filtrar_todos_acervos();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de acervos</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <style>
            .btn-secondary:hover {
                color:white;
                background-color: black;
                border-color: white;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Lista de Acervos</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div style="display: flex;">
                            <input type="text" name="pesquisa" placeholder="Pesquisar Título..." class="form-control"/>
                            <button type="submit" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                                </svg>
                            </button>   
                        </div>
                    </form>
                    <a href="acervo_form.php" class="btn btn-primary">Cadastrar Novo</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>TÍTULO</th>
                    <th>AUTOR(A)</th>
                    <th>ANO</th>
                    <th>PREÇO</th>
                    <th>QUANTIDADE</th>
                    <th>EDITORA</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $acervos as $acervo ) : ?>
                        <tr>
                            <td><?php echo $acervo['id']; ?></td>
                            <td><?php echo $acervo['titulo']; ?></td>
                            <td><?php echo $acervo['autor']; ?></td>
                            <td><?php echo $acervo['ano']; ?></td>
                            <td><?php echo $acervo['preco']; ?></td>
                            <td><?php echo $acervo['quantidade']; ?></td>
                            <td><?php echo retorna_editora($acervo['id_editora']); ?></td>
                            <td class="text-right">
                                <a href="acervo_form.php?id=<?php echo $acervo['id']; ?>" class="btn btn-primary">Editar</a>
                                <a href="acervo_processa.php?acao=excluir&id=<?php echo $acervo['id']; ?>" class="btn btn-danger" onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>