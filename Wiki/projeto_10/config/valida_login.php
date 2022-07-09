<?php
session_start();

include_once './conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados['bt_login'])){
    $query_usuario = "SELECT id,usuario,senha,email,permissao_id,created,modified FROM usuarios WHERE usuario=:usuario LIMIT 1";
    
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindparam(':usuario',$dados['usuario']);
    $result_usuario->execute();
    
    if(($result_usuario)AND($result_usuario->rowCount()!=0)){
        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        
        if($dados['senha'] == $row_usuario['senha']){
            $_SESSION['id'] = $row_usuario['id'];
            $_SESSION['usuario'] = $row_usuario['usuario'];
            $_SESSION['senha'] = $row_usuario['senha'];
            $_SESSION['email'] = $row_usuario['email'];
            $_SESSION['permissao_id'] = $row_usuario['permissao_id'];
            
            header("Location:\projeto_10\dashboard.php");
        }
        else{
            $_SESSION['msg'] = "<p style='color:red'>Senha inválida!</p>";
            header("Location:../index.php");
        }
        
    }
    else{
        $_SESSION['msg'] = "<p style='color:red'>Usuário inválido!</p>";
        header("Location:../index.php");
    }
}
else{
    $_SESSION['msg'] = "<p style='color:red'>Não recebi valores no formulário!</p>";
   header("Location:../index.php");
}




