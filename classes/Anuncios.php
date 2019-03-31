<?php

Class Anuncios{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getMeusAnuncios():array
    {
        $array = array();
        $sql = $this->conn->prepare("SELECT *, (select anuncios_imagens.url from anuncios_imagens where anuncios_imagens.id_anuncios = anuncios.id limit 1) as url FROM anuncios WHERE id_usuario = :id_usuario");
        
        $sql->bindValue(":id_usuario",$_SESSION['cLogin']);
        $sql->execute();

        if ($sql->rowCount()>0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }

}



?>