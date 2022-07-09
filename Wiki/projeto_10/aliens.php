<?php
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

    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/alien.css"/>
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

      <article class="blog-post">
      <h2 class="blog-post-title mb-1">CTHULHU</h2>
      <p class="blog-post-meta">16 de maio, 2022 por <a href="#">Dev's</a></p>
      <p style="text-align: justify">&emsp;Esse é o cthulhu, um misterioso monstro, não se sabe ao certo da sua origem e qual o seu objetivo na terra, a unica certeza que temos sobre ele é que ele deseja destruir a raça humana.</p>
      <p style="text-align: justify">&emsp; Essa especia de alienigena, possui uma velocidade normal, porém sua aparencia pode ser amedrontadora, não deixe ela o atrapalhar!</p>
      <div class="post1-img">
          <img src="AliensIMG/cthulhu.png" width="350" height="350"/>
      </div>
      <hr>
  
      <br>
      </article>
      
      <!-- Segundo alien -->
      
      
      <article class="blog-post">
      <h2 class="blog-post-title mb-1">LITTLE CTHULHU</h2>
      <p class="blog-post-meta">16 de maio, 2022 por <a href="#">Dev's</a></p>
      <p style="text-align: justify">&emsp;Essa criatura estranha, é uma especie de alienigena, estudiosos especulam que ele veio do mesmo lugar que o CTHULHU, devido a sua semelhança.</p>
      <p style="text-align: justify">&emsp;Ele é menor, e menos resistente que o cthulhu, porém não se engane, ele é periculoso, e possui o mesmo objetivo que todos os outros aliens, o de destruir a raça humana.</p>
      <div class="post1-img">
          <img src="AliensIMG/cthulhu2.png" width="350" height="350"/>
      </div>
      <hr>
      <!--<p>&emsp;.   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   .</p>-->
      <br>
      </article>
      
      <!-- Terceiro alien -->  

      <article class="blog-post">
      <h2 class="blog-post-title mb-1">LULA</h2>
      <p class="blog-post-meta">16 de maio, 2022 por <a href="#">Dev's</a></p>
      <p style="text-align: justify">&emsp; Não, não é um ex presidente, esse alienígena desconhecido, possui 6 tentáculos e uma cor amarela que é de dar medo, sua velocidade se diferencia das demais, sendo muito rapido, a dificuldade de acertar disparos nele é alta.</p>
      <p style="text-align: justify">&emsp;Esse alien que vem do além, tem seu diferencial na velocidade, as vezes pode passar despercebido por você, então você deve redobrar sua atenção.</p>
      <div class="post1-img">
          <img src="AliensIMG/lula2.png" width="350" height="350"/>
      </div>

      <!--<p>&emsp;.   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   ..   .   .</p>-->
      <br>
      </article>
      
     <footer class="blog-footer">
        <p>
          <a href="#">Voltar para o topo</a>
        </p>
     </footer>
    </main>
    

</body>
</html>
