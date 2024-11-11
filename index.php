<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM tarefa";
$tarefas = mysqli_query($conn, $sql);

?>

<style>
    body{
    background-image: url('./IMG/fundo.jpg');
}
h4{
    background: #cdb4db;
}
</style>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
    <link rel="stylesheet" href="./CSS/tarefas.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                        <i class="bi bi-card-checklist"></i>
                        </center>
                        <h4>
                            Segue abaixo abaixo a sua Lista de Tarefas !
                        </h4>
                        <center>
                        <a href="tarefa-create.php" class="btn btn-primary"><i id="criar" class="bi bi-file-earmark-plus-fill"></i> Adicionar Tarefa</a>
                        </center>
                        <?php include('mensagem.php'); ?>
                    </div>

                    <div id="cards">
                    <div class="card-body" id="tarefas">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <?php foreach ($tarefas as $tarefa): ?>
                                    
                                   <div class="card text-center">
                                    <div class="card-header" id="cabecalho">
                                <h3><?php echo $tarefa['id']; ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title" id="nome"><strong><?php echo $tarefa['nome']; ?></strong></h5>
                                        <p class="card-text" id="descricao"><strong>Descrição: </strong><?php echo $tarefa['descricao']; ?></p>
                                        <?php 
                                                    if ($tarefa['status'] == 0) {
                                                        echo '<button type="button" class="btn btn-danger"><i class="bi bi-hourglass-split"></i> Pendente</button>' ;
                                                    } elseif ($tarefa['status'] == 1) {
                                                        echo '<button type="button" class="btn btn-warning"><i class="bi bi-arrow-repeat"></i> Em execução ...</button>' ;
                                                    } elseif ($tarefa['status'] == 2) {
                                                        echo '<button type="button" class="btn btn-success"><i class="bi bi-clipboard2-check"></i> Concluída !</button>';
                                                    } else {
                                                        echo '<button type="button" class="btn btn-secondary"><i class="bi bi-exclamation-triangle-fill"></i> Indefinida</button>';
                                                    }
                                        ?>
                                        </p>
                                    </div>
                                    <div class="card-footer text-body-secondary" id="rodape">
                                    <p class="data"><strong>Data Limite:</strong> <?php echo date('d/m/Y', strtotime($tarefa['data_limite'])); ?></p>
                                </div>
                                <div id="botoes">
                                    <a href="tarefa-edit.php?id=<?=$tarefa['id']?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-square" id="editar"></i>  Editar</a>
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                <button onclick="return confirm('Tem certeza que deseja excluir a tarefa?')" name="delete_tarefa" type="submit" value="<?=$tarefa['id']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill" id="excluir"></i> Excluir</button>
                                            </form>
                                </div>
                                   </div>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
