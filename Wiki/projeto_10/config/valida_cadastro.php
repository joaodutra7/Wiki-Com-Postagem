<?php
session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['bt_cadastro'])){
    $query_cadastro="INSERT INTO usuarios(usuario, senha, email, permissao_id, created) VALUES ('".$dados['nome']."','".$dados['senha']."','".$dados['email']."',1,NOW())";
    $result_usuario = $conn->prepare($query_cadastro);
    $result_usuario->execute();
    
    if(($result_usuario)AND($result_usuario->rowCount()!=0)){ //verifica se recebeu algum dado
        $row_users = $result_usuario->fetch(PDO::FETCH_ASSOC); //variavel para receber cada linha do array
        $_SESSION['msg']="<p style='color:green'>Cadastrado com sucesso!</p>";
        header("Location: \projeto_10\index.php");
        
    } else {
        $_SESSION['msg']="<p style='color:red'>Não foi possível inserir usuário!</p>";
        header("Location: \projeto_10\adm\cadastrar.php");
    }    
}else{
    $_SESSION['msg'] = "<h2><p style='color: red'>Não foi possível cadastrar!</p></h2>"; //caso esteja vazio a mensagem de erro será exibida
    
    header("Location: \projeto_10\adm\cadastrar.php");
}