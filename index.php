<?php
session_start();
    include_once('./entity/Noticia.class.php');
    include_once('./repository/NoticiaRepository.class.php');
    include_once('./util/Conexao.class.php');
    include_once('./util/funcoes.php');
    include_once './application/NoticiaService.class.php';
    $conexao = new Conexao();
    $noticiaService = new NoticiaService($conexao);
    $lista = $noticiaService->listarNoticias();
    
if(isset($_SESSION['usuarioID']) && isset($_SESSION['usuarioNome'])){
    
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  
    <title>Portal Noticias</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/estilo.css" rel="stylesheet">

    </head>
    <body>
        <!--teste  00000000000-->
        <div id="site" class="container">
        <div id="banner" >
                <img id="imgBanner" src="fotos/noticias-logo.png" alt="noticias" />
        </div>
        <div id="menu" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            
              <li class="active"><a href="index.php">Pagina Inicial</a></li>
              <li><a href="adicionarNoticia.php">Adicionar</a></li>
              <li><a href="mostrarNoticias.php">Mostrar Noticia</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
            
            <div id="conteudo" class="container">
                <div id="conteudo-menu-lateral" class="col-md-2">
                    menu lateral
                </div>
                <div id="conteudo-main-noticia" class="col-md-6">
                    <?php 
                        for($i=0; $i<1; $i++){
                           $noticia = $lista[0];
                    ?>
                    <h2><?= $noticia->getTitulo()?></h2>
                    
                    <p id="texto"><?= $noticia->getTexto()?></p> 
                    
                    <p> <b>Autor:</b> <?= $noticia->getAutor()?></p>
                  
                    
                    
                    <a href="mostar.php?id=<?php echo $noticia->getId()?>">[Saiba +]</a>
                    
                     <?php }?>
                </div>
                <div id="conteudo-sencodary-noticia" class="col-md-4">
                    
                        <?php 
                        for($i=1; $i< sizeof($lista); $i++){
                           $noticia = $lista[$i];
                            ?>                    
                            <h3><?= $noticia->getTitulo()?></h3>
                            <a href="mostar.php?id=<?php echo $noticia->getId()?>">[Saiba +]</a> 
                            <hr>        
                            
                    
                     <?php }?>
                     
                </div>
                
            </div>
        <hr> 
            <div id="rodape">
                <div class="footer">
                    <p>Todos os direitos reservados a equipe N3sf1t Developer Team.</p>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="offcanvas.js"></script>
  </body>
</html>
    <?php
    } else {
        header("Location: util/login.php");
        exit;
        }    
?>