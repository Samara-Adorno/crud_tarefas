<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                        <i class="bi bi-list-task"></i>
                        </center>
                        <h4>
                             Criar uma Tarefa ! 
                        </h4>
                        <center>
                        <a href="index.php" class="btn btn-danger"><i id="return" class="bi bi-arrow-counterclockwise"></i>Voltar</a>
                        </center>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">
                            <div class="mb-3">
                                <label for="txtNome">Nome</label> 
                                <input type="text" name="txtNome" id="txtNome" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="txtDescricao">Descrição</label>
                                <textarea rows="3" name="txtDescricao" id="txtDescricao" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="txtStatus">Status</label>
                                <select class="form-select" name="txtStatus" aria-label="Default select example">
                                <option selected>Status</option>
                               <option value="0" type="button" class="btn btn-danger">Pendente</option>
                                <option value="1" type="button" class="btn btn-warning">Em Execução ...</option>
                                <option value="2" type="button" class="btn btn-success">Concluída !</option>
                                </select>
                            </div>
                            <div class="mb-3"></div>
                            <div class="mb-3">
                                <label for="txtData_Limite">Data de Limite</label>
                                <input type="date" name="txtData_Limite" id="txtData_Limite" class="form-control">
                            </div>
                                <button type="submit" name="create_tarefa" class="btn btn-primary float-end">Criar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
