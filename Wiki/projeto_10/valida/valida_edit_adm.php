<?php
session_start();

include_once '../config/conexao.php';

if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}


$edita_cad_produto = filter_input(INPUT_POST, 'EditPost', FILTER_SANITIZE_STRING);

if (!empty($edita_cad_produto)) {
    //recebe dados do formulario
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
    $id_prod = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);
    $imagem = $_FILES['arquivo']['name'];
    
    $novoNome = uniqid();  
    $extensao = strtolower(pathinfo($imagem, PATHINFO_EXTENSION));
    $img_insert = $novoNome. "." .$extensao;
    
    //insere dados no bd
    $query_edita_produtos = "UPDATE posts SET nome='$nome', descricao='$descricao', imagem='$img_insert', modified=NOW() WHERE id='$id_prod'";
    
    $result_edita_prod = $conn->prepare($query_edita_produtos);
    $result_edita_prod->execute();

    //verifica se os dados foram inseridos
    if (($result_edita_prod) AND ($result_edita_prod->rowCount() != 0)) {
        $row_edita_produto = $result_edita_prod->fetch(PDO::FETCH_ASSOC);
        $_SESSION['msg'] = "<p style= 'color:green'>Post atualizado!</p>";
        header("Location:\projeto_10\config\mostrar_usuarios.php");

        //recuperar o ultimo insert
        //$last_insert = $conn->lastInsertId();

        //pasta onde a imagem será salva
        $pasta = "../imagem/". $id_prod .'/';

        ///criar a pasta dentro da pasta de imagens         
        mkdir('../imagem/'. $id_prod .'/');

        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $pasta . $novoNome . "."  . $extensao)) {
            echo"deu certo";
        } else {
            echo"não deu certo";
        }
    } else {
        $_SESSION['msg'] = "<p style= 'color:red'>Erro ao salvar os dados!</p>";
        header("Location:\projeto_10\config\mostrar_usuarios.php");
    }
} else {
    $_SESSION['msg'] = "<p style= 'color:red'>Erro ao salvar os dados!</p>";
   //header("Location:\projeto_login\index.php");
}


