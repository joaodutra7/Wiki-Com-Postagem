<?php
include_once './config/conexao.php';
session_start();

$id = $_GET['id'];

if (empty($id)) 
{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Post não encontrado!</p>";
    header("Location:\Projeto_10\dashboard.php");
    exit();
}

$query_posts = "SELECT autor, nome, descricao, imagem, created FROM posts WHERE id='$id'";
$result_posts = $conn -> prepare($query_posts);
$result_posts ->execute();

if (($result_posts) AND ($result_posts->rowCount() != 0)) 
{
    $row_posts = $result_posts->fetch(PDO::FETCH_ASSOC);

} 
else 
{
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Post não encontrado!</p>";
    header("Location:\Projeto_10\dashboard.php");
    exit();
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

    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/exibe.css" rel="stylesheet">
    <!-- Custom styles -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/dashboard.css" rel="stylesheet">   
</head>
<body>
    <div class="container">
      <header class="blog-header lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">

          <div class="col-4 text-center">
              <a class="blog-header-logo text-white" href="dashboard.php">SA Wiki</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="btn btn-sm btn-outline-secondary border-white text-white" href="#">Sign out</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 link-secondary" href="dashboard.php">Home</a>
          <a class="p-2 link-secondary" href="posts.php">Posts</a>
          <a class="p-2 link-secondary" href="aliens.php">Aliens</a>
          <a class="p-2 link-secondary" href="meus_posts.php">Meus Posts</a>
          <?php
          if ($_SESSION['permissao_id'] == 2){
          ?>   
          <a class="p-2 link-secondary" href="config/mostrar_usuarios.php">Admin</a>
          <?php
          }
          ?>
        </nav>
      </div>
    </div>

    <main class="container">
        <br>
        
        <div style="padding-right: 1200px; padding-top: 40px">
            <a href="meus_posts.php"><img src="img/93634.png" width="35" height="35" alt="alt"/></a>
        </div>
        
        <br><br>
        
        <form id="edit-post" method="POST" action="valida/valida_edit.php" enctype="multipart/form-data">
            
            <label class="text-white">Nome: </label>
            <input type="text" name="nome" id="nome" value="<?php echo $row_posts['nome'];?>" required><br><br>

            <label class="text-white" for="descricao">Descrição: </label><br>
            <textarea cols="50" rows="15" name="descricao" id="descricao" required><?php echo $row_posts['descricao'];?></textarea><br><br>
            
            <label class="text-white" for="arquivo">Inserir nova imagem: </label><br>
            <input type='file' name='arquivo' accept='image/*' value = "<?php echo $row_posts['imagem']; ?>"><br>
            
            <input type ="hidden" name="id" value="<?php echo $id; ?>"><br>
            
            <input class="btn btn-primary" type="submit" value="Salvar" name="EditPost"><br><br>
                   
        </form><br>

        <footer class="blog-footer">
          <p>
            <a href="#">Voltar para o topo</a>
          </p>
        </footer>
        
    </main>

</body>
</html>
