<?php
session_start();

try {
    $conn = new PDO("mysql:dbname=classificados;host=localhost","root","");
} catch (PDOexception $e) {
    echo "Falhou: ".$e->getMessage();
    exit;
}


?>