<?php
include_once './config/conexao.php';

session_start();

if($_SESSION['usuario']){
echo "";}
else{
    header("location: index.php");
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

    <!-- Custom styles -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/icon.ico"/>
    
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
            
    <?php
    
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
   ?>
        
    
    <?php
        $id=$_SESSION['id'];
        $query_posts = "SELECT id, autor, nome, descricao, imagem, created FROM posts WHERE usuario_id = $id ORDER BY created DESC";
        $result_posts = $conn -> prepare($query_posts);
        $result_posts ->execute();
        
        
        while($row_posts = $result_posts->fetch(PDO::FETCH_ASSOC)){ 
    ?>
      
    <h2><a href="exibe_meus_posts.php?id=<?php echo $row_posts['id']; ?>"><?php echo $row_posts['nome']?></a></h2>
    
    <p>
        por <b><?php echo $row_posts['autor']; ?></b>
        em <b><?php echo date('d/m/Y', strtotime($row_posts['created'])) ?></b> 
    </p>
    
    <p style="overflow: auto; height:100px; width:700px; word-wrap:normal; word-wrap:break-word;">
        <?php echo $row_posts['descricao'];?>
    </p>
    
    <p>
        <img height="150" src="imagem/<?php echo $row_posts['id'] ?>/<?php echo $row_posts['imagem'];?>" alt=""><br>
    </p>
    
    <p>
        <a class="btn btn-sm btn-primary" href="edit_post.php?id=<?php echo $row_posts['id']; ?>"><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
        <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
        </svg></a>
        <a class="btn btn-sm btn-danger" href="valida/valida_excluir.php?id=<?php echo $row_posts['id']; ?>"><svg xmlns='http://www.w3.org/2000/svg%27width=%2716' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
        <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
        </svg>
        </a>
    </p>
    <hr>
    
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
