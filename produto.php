<?php
require 'pages'.DIRECTORY_SEPARATOR.'header.php';
?>
<?php 
	require_once 'classes'.DIRECTORY_SEPARATOR.'Anuncios.php';
	require_once 'classes'.DIRECTORY_SEPARATOR.'Usuarios.php';
	$a = new Anuncios($conn);
	$u = new Usuarios($conn);

	

	if (isset($_GET['id']) && !empty($_GET['id'])) {
		$id = addslashes($_GET['id']);
		$info = $a->getAnuncios($id);
	}else {
?>
 <script tipe="text/javascript">window.location.href="login.php";
</script>   
<?php
	exit;
	}
?>

<div class="container">

    <div class="row mt-5">
        <div class="col-sm-5">
        	<div class="carousel slide" data-ride="carousel" id="carousel">
        		<div class="carousel-inner" role="listbox">
        			<?php foreach($info['fotos'] as $chave => $foto): ?>
        				<div class="carousel-item <?php echo ($chave=='0')?'active':''; ?>">
        					<img class="d-block w-100" src="assets/images/anuncios/<?php echo $foto['url']; ?>">
        				</div>
        			<?php endforeach; ?>
        			<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
        			<a class="carousel-control-next" href="#carousel" role="button" data-slide="prev"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
        		</div>
        	</div>

        </div>
        
        <div class="col-sm-7">
        	<h1 class=""><?php echo utf8_encode($info['titulo']); ?></h1>
        	<h4><?php echo utf8_encode($info['categoria']); ?></h4>
        	<p><?php echo $info['descricao']; ?></p>
        	<br>
        	<h4>R$ <?php echo utf8_encode($info['valor']); ?></h4>
        	<h5>Telefone: <?php echo $info['telefone'] ?></h5>
        </div>
    </div>
</div>
<?php
require 'pages'.DIRECTORY_SEPARATOR.'footer.php';

?>