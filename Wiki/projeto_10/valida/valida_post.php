<?php

session_start();
include_once '../config/conexao.php';

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}


$cad_produto = filter_input(INPUT_POST,'publicar',FILTER_SANITIZE_STRING);


if(!empty($cad_produto)){
    $autor = $_SESSION['usuario'];
    $nome= filter_input(INPUT_POST, 'titulo',FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'conteudo',FILTER_SANITIZE_STRING);
    $imagem = $_FILES['arquivo']['name'];
    $usuario_id = $_SESSION['id'];
 
    $novoNome = uniqid();  
    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
    $img_insert = $novoNome. "." .$extensao;
    
    
    $query_prod = "INSERT INTO posts( autor, nome, descricao, imagem, usuario_id, created) VALUES ('$autor','$nome','$descricao','$img_insert','$usuario_id',NOW())";
    $result_cad_prod = $conn -> prepare($query_prod);
    $result_cad_prod ->execute();
    
    
    
    if(($result_cad_prod) AND ($result_cad_prod->rowCount()!=0)){
        $row_cad = $result_cad_prod -> fetch(PDO::FETCH_ASSOC);
        echo"Deu certo";
        header("Location:\projeto_10\posts.php");
        
        $last_insert = $conn ->lastInsertId();
        
        $pasta ="../imagem/".$last_insert .'/';
        
        mkdir('../imagem/'.$last_insert.'/');
        
        if(move_uploaded_file($_FILES['arquivo']['tmp_name'],$pasta . $novoNome . "."  . $extensao)){
            echo"Imagem salva";
        }else{
            echo"Não salvou.";
        }
        
    }else{
        $_SESSION['msg'] = "<p style='color:red'> Erro ao salvar os dados!</p>";
        header("Location:\projeto_10\posts.php");
    }
    
}else{
    echo"não rolou..";
}