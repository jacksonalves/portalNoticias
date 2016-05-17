<?php

class Conexao {
    
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "pagina_de_noticias";
    private $mysqli; 
    
    
    public function __construct() {
        $this->mysqli = new mysqli($this->host, $this->usuario,$this->senha,$this->banco);
        
    }
    
    public function getMysqli(){
        return $this->mysqli;
    }
    
    public function __destruct(){
        $this->mysqli->close();
    }
}
