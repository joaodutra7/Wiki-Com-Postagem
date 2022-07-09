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
    <title>SA Wiki</title>

    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/jquery-3.3.1.slim.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>

    <!-- Custom styles -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles -->
    <link href="css/posts.css" rel="stylesheet">   
    <link rel="icon" href="img/icon.ico"/>
    
</head>
<body>
    <div class="musica">
        <embed src="music/musica.mp3" loop="false" hidden="true" autostart="true">
    </div>   
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
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">Criar Post</h1>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLongoExemplo">
            Criar post
          </button>
        </div>
      </div>
      
    <div class="modal fade" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
     <div class="modal-dialog" role="document">
       <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title text-dark align-items-end" id="TituloModalLongoExemplo">Criar Post</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
             <span aria-hidden="true">&times;</span>
           </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="valida/valida_post.php" enctype="multipart/form-data">
               <p>
                   <label class="text-dark">Titulo</label><br>
                   <input type="text" name="titulo" required>
               </p>
            
               <p style='color:black'>
                   <label class="text-dark">Autor</label><br>
                   <?php echo $_SESSION['usuario'];?>
               </p>

               <p class="text-dark">
                    <label>Anexar imagem:</label><br>
                    <input type='file' name='arquivo' accept='image/*'>
               </p>

               <p>
                   <label class="text-dark">Conteúdo</label><br>
                   <textarea name="conteudo" cols="50" rows="15" required></textarea>
               </p>
               </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary" name="publicar" value="Publicar">Publicar</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <?php
        $query_posts = "SELECT id, autor, nome, descricao, imagem, created FROM posts ORDER BY created DESC";
        $result_posts = $conn -> prepare($query_posts);
        $result_posts ->execute();
        
        
        while($row_posts = $result_posts->fetch(PDO::FETCH_ASSOC)){ 
    ?>
      
    <h2><a href="exibe.php?id=<?php echo $row_posts['id']; ?>"><?php echo $row_posts['nome']?></a></h2>
    
    <p>
        por <b><?php echo $row_posts['autor']; ?></b>
        em <b><?php echo date('d/m/Y', strtotime($row_posts['created'])) ?></b> 
    </p>

    <p style="overflow: auto; height:100px; width:700px; word-wrap:normal; word-wrap:break-word;"><?php echo $row_posts['descricao'];?></p>
            
    <p>
        <img height="150" src="imagem/<?php echo $row_posts['id'] ?>/<?php echo $row_posts['imagem'];?>" alt=""><br>
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

