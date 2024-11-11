<?php
session_start();
require_once('conexao.php');

$tarefa = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
} else {

    $tarefaId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM tarefa WHERE id = '{$tarefaId}'";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Erro" . mysqli_error($conn));
    }

    if (mysqli_num_rows($query) > 0) {
        $tarefa = mysqli_fetch_array($query);
    } else {
        $_SESSION['message'] = "Tarefa não encontrada.";
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Tarefas</title>
    <link rel="stylesheet" href="./CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<style>
    body{
    background-image: url('./IMG/fundo.jpg')
}
</style>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <i class="bi bi-list-task"></i>
                        </center>
                        <h4>
                            Edite uma Tarefa !
                        </h4>
                        <center>
                        <a href="index.php" class="btn btn-danger"><i id="return" class="bi bi-arrow-counterclockwise"></i>  Voltar</a>
                        </center>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($tarefa) :
                        ?>
                        <form action="acoes.php" method="POST">
                        <input type="hidden" name="tarefa_id" value="<?php echo $tarefa['id']; ?>">

            <!-- Nome da Tarefa -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome da Tarefa:</label>
                <input type="text" id="nome" name="txtNome" class="form-control" value="<?php echo htmlspecialchars($tarefa['nome']); ?>" required>
            </div>

            <!-- Descrição -->
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea id="descricao" name="txtDescricao" class="form-control" required><?php echo htmlspecialchars($tarefa['descricao']); ?></textarea>
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="txtStatus" class="form-label">Status:</label>
                <select class="form-select" name="txtStatus" id="txtStatus" required>
                    <option value="0" <?php echo ($tarefa['status'] == 1) ? 'selected' : ''; ?>>Pendente</option>
                    <option value="1" <?php echo ($tarefa['status'] == 2) ? 'selected' : ''; ?>>Em Execução ...</option>
                    <option value="2" <?php echo ($tarefa['status'] == 3) ? 'selected' : ''; ?>>Concluída !</option>
                </select>
            </div>

            <!-- Data Limite -->
            <div class="mb-3">
                <label for="data_limite" class="form-label">Data Limite:</label>
                <input type="date" id="data_limite" name="txtDataLimite" class="form-control" value="<?php echo $tarefa['data_limite']; ?>" required>
            </div>

            <!-- Botão para salvar alterações -->
            <button type="submit" name="edit_tarefa" class="btn btn-primary">Salvar Alterações</button>
        </form>
                        <?php
                        else:
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Tarefa não encontrada
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
