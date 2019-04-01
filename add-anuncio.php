<?php require_once 'pages'.DIRECTORY_SEPARATOR.'header.php';?>
<?php
if (empty($_SESSION['cLogin'])) {
 ?>
 <script tipe="text/javascript">window,location.href="login.php";</script>   
<?php
exit;
}

require_once 'classes'.DIRECTORY_SEPARATOR.'Anuncios.php';
if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
	$titulo = addslashes($_POST['titulo']);
	$categoria = addslashes($_POST['categoria']);
	$valor = addslashes($_POST['valor']);
	$descricao = addslashes($_POST['descricao']);
	$estado = addslashes($_POST['estado']);

	$a = new Anuncios($conn);
	$a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
?>
	<div class="alert alert-success mt-4">Produto adicionado com sucesso!</div>
<?php 
}
?>
<div class="container">
	<h1 class="mt-5">Adicionar Anúncio</h1>

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group">
			<label for="categoria">Categoria:</label>
				<select name="categoria" id="categoria" class="form-control">
				<?php 
				require_once 'classes'.DIRECTORY_SEPARATOR.'Categorias.php';
				$c = new Categorias($conn);
				$cats = $c->getLista();
				foreach($cats as $cat):
				?>	
				<option value="<?php echo $cat['id']; ?>">
					<?php echo utf8_encode($cat['nome']); ?>
				</option>
				<?php endforeach; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="titulo">Titulo:</label>
			<input type="text" name="titulo" id="titulo" class="form-control">
		</div>
		
		<div class="form-group">	
			<label for="valor">Valor:</label>
			<input type="text" name="valor" id="valor" class="form-control">
		</div>	
		<div class="form-group">
			<label for="descricao">Descrição:</label>
			<textarea class="form-control" id="descricao" name="descricao"></textarea>
		</div>
		<div class="form-group">
			<label for="estado">Estado de Conservação:</label>
			<select name="estado" id="estado" class="form-control">
				<option></option>
				<option value="0">Ruim</option>
				<option value="1">Bom</option>
				<option value="2">Ótimo</option>
			</select>
		</div>
		<input type="submit" value="Adicionar" class="btn btn-secondary border-1">
	</form>
</div>
<?php require_once 'pages'.DIRECTORY_SEPARATOR.'footer.php'; ?>


