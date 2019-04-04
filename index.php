<?php
require 'pages'.DIRECTORY_SEPARATOR.'header.php';
?>
<?php 
require_once 'classes'.DIRECTORY_SEPARATOR.'Anuncios.php';
require_once 'classes'.DIRECTORY_SEPARATOR.'Usuarios.php';
$a = new Anuncios($conn);
$u = new Usuarios($conn);

$total_anuncios = $a->getTotalAnuncios();
$total_usuarios = $u->getTotalUsuarios();

$p = 1;
if (isset($_GET['p']) && !empty($_GET['p'])) {
    $p = addslashes($_GET['p']);
}
$por_pagina = 3;
$total_paginas = ceil($total_anuncios / $por_pagina);

$anuncios = $a->getUltimosAnuncios($p, $por_pagina);

?>
<div class="container-fluid">
    <div class="jumbotron mt-3">
        <h2>Nós temos hoje <?php echo $total_anuncios ?> anúncios.</h2>
        <p>E mais de <?php echo $total_usuarios ?> usuários cadastrados.</p>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h4>Pesquisa Avançada</h4>
        </div>
        <div class="col-sm-9">
            <h4>Últimos Anúncios</h4>
            <table class="table table-striped">
                <tbody>
                    <?php foreach ($anuncios as $anuncio):?>
                        <tr>
                            <td>
                                 <?php if(!empty($anuncio['url'])): ?>
                                    <img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" border="0" height="70">
                                <?php else: ?>
                                    <img src="assets/images/Default.png" height="70">
                                <?php endif ?>
                            </td>
                            <td>
                                <a href="produto.php?id=<?php echo $anuncios['id'] ?>"><?php echo utf8_encode($anuncio['titulo']); ?></a><br>
                                <?php echo utf8_encode($anuncio['categoria']); ?>
                            </td>
                            <td>
                                R$ <?php echo number_format($anuncio['valor'], 2)?>
                            </td>
                        </tr>
                    
                    <?php endforeach; ?>    
                </tbody>
            </table>

            <ul class="pagination">
                <?php for ($q=1; $q<=$total_paginas;$q++):?>
                    <li class="page-item <?php echo ($p==$q)?'active':''; ?>">
                        <a class="page-link" href="index.php?p=<?php echo $q ?>"><?php echo $q; ?></a>
                    </li>
                <?php endfor; ?>    
            </ul>
        </div>
    </div>
</div>
<?php
require 'pages'.DIRECTORY_SEPARATOR.'footer.php';

?>