<?php
$host = 'localhost'; #127.0.0.1
$tarefa = 'root';
$senha = '';
$banco = 'tarefas';

$conn = mysqli_connect($host, $tarefa, $senha, $banco) or die('Não foi possível conectar');

?>