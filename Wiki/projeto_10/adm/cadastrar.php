<?php
session_start();

if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset ($_SESSION['msg']);
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        
        <link rel="shortcut icon" href="../img/icon.ico">
        <link rel="stylesheet" href="../css/cadastro2.css">
        <title>Cadastro</title>
    </head>
    <body>                 

        <div class ="center">
            <?php
            if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset ($_SESSION['msg']);
            }

            ?>
            <h1>Cadastro</h1>
            <form method ="POST" action="../config/valida_cadastro.php">
                <div class="txt_field">
                    <input type="text" name="nome"  required>
                    <label>Usuário</label>
                </div>                
                <div class="txt_field">
                    <input type="password" name="senha" required>
                    <label>Senha</label>
                </div>
                <div class="txt_field">
                    <input type="email" name="email" required>
                    <label>E-mail</label>
                </div>

                <input type="submit" name="bt_cadastro" value="Cadastrar">
                <div class="signup_link">
                    Já possui uma conta? <a href="../index.php">Login</a>
                </div>
            </form>

        </div>
    </body>
</html>
