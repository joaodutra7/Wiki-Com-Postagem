<?php
session_start();

include './conexao.php';

$nivelacesso[1] = "Basico";
$nivelacesso[2] = "Admin";

if($_SESSION['permissao_id']==2){
echo "";}
else{
    header("location: ../dashboard.php");
}
?>

<!doctype html>
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
    <link href="../css/admin.css" rel="stylesheet">
    <link rel="icon" href="../img/icon.ico"/>
    
</head>
<body>
    <div class="container">
      <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">

          <div class="col-4 text-center">
              <a class="blog-header-logo text-white" href="../dashboard.php">SA Wiki</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
              <a class="btn btn-sm btn-outline-secondary border-white text-white" href="../Includes/SessionStart.php">Sign out</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 link-secondary" href="../dashboard.php">Home</a>
            <a class="p-2 link-secondary" href="../posts.php">Posts</a>
            <a class="p-2 link-secondary" href="../aliens.php">Aliens</a>
            <a class="p-2 link-secondary" href="../meus_posts.php">Meus Posts</a>
            <a class="p-2 link-secondary" href="mostrar_usuarios.php">Admin</a>
        </nav>
      </div>
    </div>

    <main class="container">
      <br><h2 style="text-align: center">PAINEL - ADMIN</h2><br>
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
      <table border="1" id="customers"> 
        <tr style="color: white">
          <td>ID</td> 
          <td>Nome</td> 
          <td>E-mail</td>
          <td>Permissao</td>
          <td>Data de criação</td>
          <td>Modificado</td>
          <td>Ação</td>
        </tr> 
        <?php 
        
        if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
        }
        
        $query_usuario = "SELECT * FROM usuarios";
        $resultado_usuario = $conn ->prepare($query_usuario);
        $resultado_usuario-> execute();
        if(($resultado_usuario) AND ($resultado_usuario->rowCount() != 0)) 
        {
            while($row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC)) 
        
        {?> 
        <tr style="color: white"> 
          <td><?php echo $row_usuario['id']; ?></td>
          <td><?php echo $row_usuario['usuario']; ?></td> 
          <td><?php echo $row_usuario['email']; ?></td>
          <td><?php echo $nivelacesso[$row_usuario['permissao_id']]; ?></td>
          <td><?php echo date('d/m/Y H:i:s', strtotime($row_usuario['created'])); ?></td>
          <td><?php echo date('d/m/Y H:i:s', strtotime($row_usuario['modified'])); ?></td> 
          <td> 
            <a class="btn btn-primary" href="editar_usuario.php?id=<?php echo $row_usuario['id']; ?>">Editar</a> 
            <a style="background-color: red; border-color: red" class="btn btn-primary" href="excluir_usuario.php?id=<?php echo $row_usuario['id']; ?>">Excluir</a>
            <a style="background-color: green; border-color: green" class="btn btn-primary" href="../adm/gerenciar_posts.php?id=<?php echo $row_usuario['id']; ?>">Posts</a>
          </td> 
        </tr> 
        <?php 
        
        }
        
        }
        else
        {
        echo "<p style='color:red'>Nenhum usuário encontrado</p>";
        }
        ?> 
        <?php
            if (isset($_SESSION['msg']))
            {           
             echo $_SESSION['msg'];
             unset($_SESSION['msg']);
            }
            
        ?>
      </table> 
      </div>
    
    <footer class="blog-footer">
      <p>
        <a href="#">Voltar para o topo</a>
      </p>
    </footer>
      
    </main>
</body>
</html>

