<?php
require 'pages'.DIRECTORY_SEPARATOR.'header.php';
require 'classes'.DIRECTORY_SEPARATOR.'Anuncios.php';
?>
<?php
if (empty($_SESSION['cLogin'])) {
 ?>
 <script tipe="text/javascript">window,location.href="login.php";</script>   
<?php
exit;
}
?>
<div class="container">
    <h1 class="mt-5">Meus Anúncios</h1>

    <a href="add-anuncio.php" class="btn btn-secondary text-light mt-2 mb-4">Adicionar Anúncio</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Titulo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <?php
            $a = new Anuncios($conn);
            $anuncios = $a->getMeusAnuncios();   
            foreach ($anuncios as $anuncio):
        ?>
        <tr>
            <td><img src="asset/images/anuncios/<?php echo $anuncios['url']; ?>" border="0"></td>
            <td><?php echo $anuncio['titulo']?></td>
            <td>R$ <?php echo number_format($anuncio['valor'], 2)?></td>
            <td></td>
            <?php endforeach; ?>
        </tr>        
    </table>
</div>
<?php
require 'pages'.DIRECTORY_SEPARATOR.'footer.php';
?>