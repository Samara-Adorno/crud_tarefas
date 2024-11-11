<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_tarefa'])) {
    $nome = trim($_POST['txtNome']);
    $descricao = trim($_POST['txtDescricao']);
    $status = intval($_POST['txtStatus']);
    $dataLimite = trim($_POST['txtData_Limite']);

    $sql = "INSERT INTO tarefa (nome, descricao, status, data_limite) VALUES('$nome', '$descricao', '$status', '$dataLimite')";
    
    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

if (isset($_POST['edit_tarefa'])) {
    // Receber os dados do formulário
    $tarefaId = mysqli_real_escape_string($conn, $_POST['tarefa_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['txtDescricao']);
    $status = mysqli_real_escape_string($conn, $_POST['txtStatus']);
    $dataLimite = mysqli_real_escape_string($conn, $_POST['txtDataLimite']);

    // Atualizar a tarefa no banco de dados
    $sql = "UPDATE tarefa SET nome = '{$nome}', descricao = '{$descricao}', status = '{$status}', data_limite = '{$dataLimite}' WHERE id = '{$tarefaId}'";

    if (mysqli_query($conn, $sql)) {
        // Se a atualização for bem-sucedida
        $_SESSION['message'] = "Tarefa {$tarefaId} atualizada com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        // Caso contrário, exibir uma mensagem de erro
        $_SESSION['message'] = "Não foi possível atualizar a tarefa {$tarefaId}. Erro: " . mysqli_error($conn);
        $_SESSION['type'] = 'error';
    }

    // Redirecionar de volta para a página de tarefas (ex: index.php)
    header("Location: index.php");
    exit();
}

if (isset($_POST['delete_tarefa'])) {
    $tarefaId = mysqli_real_escape_string($conn, $_POST['delete_tarefa']);
    $sql = "DELETE FROM tarefa WHERE id = '$tarefaId'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa com ID {$tarefaId} excluída com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Ops! Não foi possível excluir a tarefa";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}
?>
