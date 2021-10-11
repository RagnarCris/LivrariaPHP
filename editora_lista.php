<?php
// Importar o arquivo de conexão
require_once 'conexao.php';
// Importar o arquivo responsável pelo modelo de dados da livraria
require_once 'livraria_db.php';
// Buscar todos os editoras
$editoras = filtrar_todas_editoras();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de editoras</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="page-header">
                <h1>Lista de Editoras</h1>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="acervo_lista.php" class="btn btn-primary">Visualizar Acervos</a>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $editoras as $editora ) : ?>
                        <tr>
                            <td><?php echo $editora['id']; ?></td>
                            <td><?php echo $editora['nome']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>