<?php
session_start();

include_once './config/conexao.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/login2.css"/>
        <link rel="stylesheet" href="css/ajusta_text_login.css"/>
        <link rel="shortcut icon" href="img/icon.ico"/>
        <title>Login</title>
    </head>
    <body> 
        <img src="img/SpaceCat.png" style="width:20%; border:0px solid; margin-left: 20px" class="right">
        <img src="img/SpaceCat.png" style="width:15%; border:0px solid; margin-left: 20px" class="right2">
        <img src="img/SpaceCat.png" style="width:28%; border:0px solid; margin-left: 20px" class="right3">

        <div class= "center1">
            <?php
                if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
                }
            ?>
        </div>

        <div class="center">       
            <h1>Login</h1>
            <form method="POST" action="config/valida_login.php">

                <div class="txt_field">
                    <input type="text" name="usuario" required>
                    <label>Usuário</label>
                </div>

                <div class="txt_field">
                    <input type="password" name="senha" required>
                    <label>Senha</label>
                </div>

                <input type="submit" name="bt_login" value="Logar">

                <div class="signup_link">
                    Não tem conta? <a href="adm/cadastrar.php">Cadastrar</a>
                </div>
            </form>
        </div>
    </body>
</html>
