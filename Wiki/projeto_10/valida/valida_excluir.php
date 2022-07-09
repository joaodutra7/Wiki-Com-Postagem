<?php

session_start();
include_once '../config/conexao.php';

$id = $_GET['id'];

if(!empty($id)){   
    $query_excluir = "DELETE FROM posts WHERE id = $id";
    $result_excluir = $conn -> prepare($query_excluir);
    $result_excluir ->execute();
    header("Location:\projeto_10\meus_posts.php");
    $_SESSION['msg'] = "<p style='color: green;'>Post apagado com sucesso!</p>";
}