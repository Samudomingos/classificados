<?php  

require'config.php';

if (empty($_SESSION['cLogin'])) {
	header("Location: login.php");
	exit;
}

require_once 'classes'.DIRECTORY_SEPARATOR.'Anuncios.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
	$a = new Anuncios($conn);
	$id_anuncio = $a->excluirFoto($_GET['id']);	
}
if (isset($id_anuncio)) {
	
	header("Location: editar-anuncios.php?id=".$id_anuncio);
} else{
	header("Location: meus-anuncios.php");
}

?>