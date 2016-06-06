<?php
session_start();
include_once('./entity/Noticia.class.php');
include_once('./repository/NoticiaRepository.class.php');
include_once ('./util/Conexao.class.php');
include_once ('./application/NoticiaService.class.php');


    if(isset($_SESSION['usuarioID']) && isset($_SESSION['usuarioNome'])){
    
    
function datetobr($data){
        $data = explode("-", $data);
        return $data[2]."/".$data[1]."/".$data[0];
    }

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id'])){
        $conexao = new Conexao();
    $noticiaService = new NoticiaService($conexao);
    $lista = $noticiaService->MostrarNoti($_GET['id']);
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Noticia</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/css_todas_noticias.css" rel="stylesheet">
  </head>
  <body>
      <div id="mostrarN" class="container">
      <div id="banner" >
                <img id="imgBanner" src="./fotos/noticias-logo.png" alt="noticias" />
        </div>
       <nav class="navbar navbar-inverse">
               <ul class="nav navbar-nav">
            
                    <li class="active"><a href="index.php">Pagina Inicial</a></li>
                    <li><a href="adicionarNoticia.php">Adicionar</a></li>
                    <li><a href="mostrarNoticias.php">Mostrar Noticia</a></li>
          
          
                </ul> 
            </nav>  
      <?php
        for($i=0; $i<1; $i++){
            $noticia = $lista[0];
            if($noticia==$_GET["id"]){
                
            }
        ?>
         <h2><?= $noticia->getTitulo()?></h2>
         <div id="textoNoticias"><?= $noticia->getTexto()?></div>
         <img  src="fotos/<?= $noticia->getImagem()?> " width="250px" height="250px"/>
         <div>
           <p><b>Autor:</b> <?= $noticia->getAutor()?></p>
           <p ><b>Publicada: </b><?= datetobr($noticia->getData())?></p>
           <a href="atualizaNoticia.php?id=<?php echo $noticia->getId()?>">Atualizar</a>
         </div>
         
           
        <?php } ?>
      
      
      </div>
  </body>     
</html>
<?php
    } else {
        header("Location: util/login.php");
        exit;
        }    
?>