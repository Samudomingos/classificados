<?php  
require'config.php';

if (empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require_once 'classes'.DIRECTORY_SEPARATOR.'Anuncios.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$a = new Anuncios($conn);
	$a->excluirAnuncio($_GET['id']);	
}

header("Location: meus-anuncios.php");




