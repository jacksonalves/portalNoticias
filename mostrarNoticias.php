<?php
    session_start();
    include_once('./entity/Noticia.class.php');
    include_once('./repository/NoticiaRepository.class.php');
    include_once('./util/Conexao.class.php');
    include_once('./util/funcoes.php');
    $conexao = new Conexao();
    $noticiaRepository = new NoticiaRepository($conexao);
    $lista = $noticiaRepository->listarNoticias();
    
   
    if(isset($_SESSION['usuarioID']) && isset($_SESSION['usuarioNome'])){
    
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Noticia</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style type="text/css" src="css/css_todas_noticias.css" ></style>
            
    </head>
    <body>
        <div id="site" class="container">
            <div id="banner" >
                <img id="imgBanner" src="fotos/noticias-logo.png" alt="noticias" />
        </div>
        <nav class="navbar navbar-inverse">
               <ul class="nav navbar-nav">
            
                    <li class="active"><a href="index.php">Pagina Inicial</a></li>
                    <li><a href="adicionarNoticia.php">Adicionar</a></li>
                    <li><a href="mostrarNoticias.php">Mostrar Noticia</a></li>
          
          
                </ul> 
            </nav>  
        <div id="mostraTodas">
            <h1>TODAS AS NOTICIAS</h1>
           <?php 
		for($i=0; $i < sizeof($lista); $i++){
                            $noticia = $lista[$i];
                 ?>
                 <div class="container">
                     <div id="todasNoticias">
                        <div><h2><?= $noticia->getTitulo()?></h2></div>
                        <figure id="img">
                            <img  src="fotos/<?= $noticia->getImagem()?> " width="250px" height="250px"/>
                        </figure>
                        <div><?= $noticia->getTexto()?></div> <br/>
                        <div>
                            <p><b>Autor:</b> <?= $noticia->getAutor()?></p>
                            <p ><b>Publicada: </b><?= datetobr($noticia->getData())?></p>
                        </div>
                  
                     </div>
                     <hr/>
                 </div>
                </div>
            <?php }?>
                 
        </div>    
        
     
                
    </body>
</html>
<?php
    } else {
        header("Location: util/login.php");
        exit;
        }    
?>