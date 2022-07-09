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
      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">Página Principal</h1>
          <p class="lead my-3">Aqui falamos um pouco sobre nosso jogo.</p>
          <p class="lead mb-0"><a href="#" class="text-white fw-bold"></a></p>
        </div>
      </div>

      <article class="blog-post">
      <h2 class="blog-post-title mb-1">Fase de testes</h2>
      <p class="blog-post-meta">16 de maio, 2022 por <a href="sobre.php">Dev's</a></p>
      <p style="text-align: justify">&emsp;Na fase de testes, sendo a nossa primeira fase de desenvolvimento, criamos um mapa que continua até o jogador perder. A fase consiste em acumular pontos pela quantidade de tempo que o jogador consegue ficar vivo e sobreviver ao ataque alienígena, não podendo deixar eles encostarem no jogador e nem deixá-los passar e chegar ao final da tela.</p>
      <p style="text-align: justify">&emsp;Temos planos em adicionar outros elementos a esta fase, como, por exemplo, uma maior quantidade de inimigos conforme o tempo sobrevivido, e bosses (Chefões) em determinadas quantidades de pontos.</p>
      <div class="post1-img">
        <img src="img/telagame.PNG" width="720" height="580"/>
      </div>
      <hr>
      <p style="text-align: justify">&emsp;No começo do desenvolvimento pretendíamos primeiro começar tendo uma história em nosso jogo, tanto que, já tínhamos uma ideia para todo o backstory de nosso jogo, mas com a quantidade de tempo limitada que tínhamos para o desenvolvimento do projeto, optamos por criar um nível infinito por sua simplicidade enquanto que desenvolvíamos o banco de dados junto ao jogo em si, suas mecânicas e design, sim, design! Grande parte das sprites do jogo foram criados pelo nosso pequeno time, utilizando de recursos grátis na internet.</p>
      <br>
      
    <footer class="blog-footer">
      <p>Nada aqui.</p>
      <p>
        <a href="#">Voltar para o topo</a>
      </p>
    </footer>
    </main>

</body>
</html>

