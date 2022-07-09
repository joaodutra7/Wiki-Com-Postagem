<?php
session_start();
include_once './config/conexao.php';

if($_SESSION['usuario']){
echo "";}
else{
    header("location: index.php");
}

$id = $_GET['id'];
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
              <a class="btn btn-sm btn-outline-secondary border-white text-white" href="Includes/SessionStart.php">Sign out</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
          <nav class="nav d-flex justify-content-between">
          <a class="p-2 link-secondary" href="dashboard.php">Home</a>
          <a class="p-2 link-secondary" href="posts.php">Posts</a>
          <a class="p-2 link-secondary" href="aliens.php">Aliens</a>
          <a class="p-2 link-secondary" href="meus_posts.php">Meus Posts</a>
        </nav>
      </div>
    </div>

    <main class="container">
    <?php
    $query_posts = "SELECT autor, nome, descricao, imagem, created FROM posts WHERE id='$id'";
    $result_posts = $conn -> prepare($query_posts);
    $result_posts ->execute();


    while($row_posts = $result_posts->fetch(PDO::FETCH_ASSOC)){ 
    ?>
    <div style="padding-right: 1200px; padding-top: 40px">
        <a href="posts.php"><img src="img/93634.png" width="35" height="35" alt="alt"/></a>
    </div>
    <p>
        <h2><a href="#"><?php echo $row_posts['nome']?></a></h2>
    </p>
    <p>
        por <b><?php echo $row_posts['autor']; ?></b>
        em <b><?php echo date('d/m/Y', strtotime($row_posts['created'])) ?></b> 
    </p>
    
    <p>
        <?php echo $row_posts['descricao'];?>
    </p>
    
    <p>
        <img height="250" src="imagem/<?php echo $id ?>/<?php echo $row_posts['imagem'];?>" alt=""><br>
    </p>

    
    <?php
        }
    ?>
    
    <footer class="blog-footer">
      <p>
        <a href="#">Voltar para o topo</a>
      </p>
    </footer>
    
    </main>

</body>
</html>





