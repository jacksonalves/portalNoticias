<?php 
session_start();
    if(isset($_SESSION['usuarioID']) && isset($_SESSION['usuarioNome'])){
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Adicionat Noticias</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/categoria.js"></script>
        
        <script type="text/javascript">
            function mask_date(field){
                if(document.getElementById(field).value.length == 2){
                    document.getElementById(field).value = document.getElementById(field).value +"/";
                }
                if(document.getElementById(field).value.length == 5){
                    document.getElementById(field).value = document.getElementById(field).value +"/";
                }
            }
        </script>
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
            <h1>Cadastro de Noticia</h1>
            <form action="servidor.php" method="POST" enctype="multipart/form-data">
            <table>			
				<tr>
					<td>GENERO:</td>
					<td>
						<select id="genero" name="genero">
							<option>::SELECIONE::</option>

                                                <?php
                                                include 'util/conexao.php'; 
                                                $select = "SELECT id_genero, nome FROM genero";
                                                $result = mysql_query($select);
                                                while ($row = mysql_fetch_array($result)) {                    
                                                    $id = $row['id_genero'];
                                                    $nome = $row['nome'];                                                    
                                                    echo"<option value='$id'>$nome</option>";
                                                }
                                                ?>
							
						</select>
					</td>
				</tr>
				<tr>
					<td>CATEGORIA:</td>
					<td>
						<select id="categoria" name="categoria">
                                                    <option>::AGUARDE::</option>

						</select>
					</td>
				</tr>					
			</table>

                
                <div class="form-inline">
                    <label for="titulo" >Titulo:</label>
                    <input type="text" name="titulo" class="form-control" >
                </div><br/>
                
                <div class="form-group-lg">
                    <label for="text" >Noticia:</label>
                    <textarea type="text" class="form-control" rows="8" name="texto"></textarea>
                </div><br/>
                
                <div class="form-inline">
                    <label for="img">Imagem:</label>
                    <input type="file" name="img"/>
                </div><br/>
                
                <div class="form-inline">
                    <label for="autor" >Autor:</label>
                    <input type="text" name="autor" class="form-control">
                </div><br/>
                
                <div class="form-inline">
                    <label for="data" >Data:</label>
                    <input type="text" id="data" name="data" class="form-control" onkeyup="mask_date(this.id);">
                </div></br>
        
                <button type="submit" class="btn btn-primary">Adicionar</button>
        
            </form>
    </div>
    </body>
</html>
<?php
    } else {
        header("Location: util/login.php");
        exit;
        }    
?>