<?php
session_start();
ob_start();
include_once './conexao.php';

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if (empty($id)) 
{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: \Projeto_10\config\mostrar_usuarios.php");
    exit();
}

$query_usuario = "SELECT id, usuario, senha, email FROM usuarios WHERE id = $id LIMIT 1";
$result_usuario = $conn->prepare($query_usuario);
$result_usuario->execute();

if (($result_usuario) AND ($result_usuario->rowCount() != 0)) 
{
    $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    //var_dump($row_usuario);
} 
else 
{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
    header("Location: \Projeto_10\config\mostrar_usuarios.php");
    exit();
}
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>SA Wiki</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/blog/">

        <link href="../bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <link rel="shortcut icon" href=""/>
    
</head>
<body>
    <div class="container">
      <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">

          <div class="col-4 text-center">
              <a class="blog-header-logo text-white" href="../dashboard.php">SA Wiki</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="link-secondary" href="#" aria-label="Search">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
            </a>
            <a class="btn btn-sm btn-outline-secondary border-white text-white" href="Includes/SessionStart.php">Sign out</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="../adm/dashboard_adm.php">Home</a>
            <a class="p-2 link-secondary" href="../posts.php">Posts</a>
            <a class="p-2 link-secondary" href="../aliens.php">Aliens</a>
            <a class="p-2 link-secondary" href="../meus_posts.php">Meus Posts</a>
          
        </nav>
      </div>
    </div>

    <main class="container">
      <br>
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
      <div class="col-md-6 px-0">
        <a href="mostrar_usuarios.php">Listar</a> |
        <a href="../adm/cadastrar.php">Cadastrar</a><br><br>

            <h2>Editar</h2><br>

        <?php
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Verificar se o usuário clicou no botão
        if (!empty($dados['EditUsuario'])) 
        {
            $empty_input = false;
            $dados = array_map('trim', $dados);
            if (in_array("", $dados)) 
            {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher todos campos!</p>";
            } 
            elseif (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) 
            {
                $empty_input = true;
                echo "<p style='color: #f00;'>Erro: Necessário preencher com e-mail válido!</p>";
            }

            if (!$empty_input) 
            {
                $query_up_usuario= "UPDATE usuarios SET usuario=:nome, email=:email, senha=:senha,permissao_id=:permissao,modified=NOW() WHERE id=:id";
                $edit_usuario = $conn->prepare($query_up_usuario);
                $edit_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':senha', $dados['senha'], PDO::PARAM_STR);
                $edit_usuario->bindParam(':permissao', $dados['permissao'], PDO::PARAM_INT);
                $edit_usuario->bindParam(':id', $id, PDO::PARAM_INT);
                if($edit_usuario->execute())
                {
                    $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
                    header("Location: \Projeto_10\config\mostrar_usuarios.php");
                }
                else
                {
                    echo "<p style='color: #f00;'>Erro: Usuário não editado!</p>";
                }
            }
        }
        ?>

        <form id="edit-usuario" method="POST" action="">
            <label>Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php
            if (isset($dados['usuario'])) 
            {
                echo $dados['usuario'];
            } 
            elseif (isset($row_usuario['usuario'])) 
            {
                echo $row_usuario['usuario'];
            }
            ?>" ><br><br>

            <label>E-mail: </label>
            <input type="email" name="email" id="email" placeholder="Melhor e-mail" value="<?php
                   if (isset($dados['email'])) 
                   {
                       echo $dados['email'];
                   } 
                   elseif (isset($row_usuario['email'])) 
                   {
                       echo $row_usuario['email'];
                   }
                   ?>" ><br><br>
            
            <label>senha: </label>
            <input type="text" name="senha" id="senha" placeholder="senha" value="<?php
                   if (isset($dados['senha'])) 
                   {
                       echo $dados['senha'];
                   } 
                   elseif (isset($row_usuario['senha'])) 
                   {
                       echo $row_usuario['senha'];
                   }
                   ?>" ><br><br>
                        
            <label>Permisao :</label>
            <select name="permissao">
            <option>Selecione</option>     
            <option value=1>Basico</option> 
            <option value=2>Admin</option>
            </select><br><br>

            <input style="background-color: green;border-color: green" class="btn btn-primary" type="submit" value="Salvar" name="EditUsuario">
        </form>
        </div>
      </div>
      <br>
    </body>
</html>

