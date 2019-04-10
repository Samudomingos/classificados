<?php
require 'pages'.DIRECTORY_SEPARATOR.'header.php';
?>
<?php 
require_once 'classes'.DIRECTORY_SEPARATOR.'Anuncios.php';
require_once 'classes'.DIRECTORY_SEPARATOR.'Usuarios.php';
require_once 'classes'.DIRECTORY_SEPARATOR.'Categorias.php';
$a = new Anuncios($conn);
$u = new Usuarios($conn);
$c = new Categorias($conn);

$filtros = array(
    'categoria' => '',
    'preco' => '',
    'estado' => ''
);

if (isset($_GET['filtros'])) {
    $filtros = $_GET['filtros'];
}

$total_anuncios = $a->getTotalAnuncios();
$total_usuarios = $u->getTotalUsuarios();

$p = 1;
if (isset($_GET['p']) && !empty($_GET['p'])) {
    $p = addslashes($_GET['p']);
}
$por_pagina = 3;
$total_paginas = ceil($total_anuncios / $por_pagina);

$anuncios = $a->getUltimosAnuncios($p, $por_pagina, $filtros);
$categorias = $c->getLista();
?>
<div class="container-fluid">
    <div class="jumbotron mt-3">
        <h2>Nós temos hoje <?php echo $total_anuncios ?> anúncios.</h2>
        <p>E mais de <?php echo $total_usuarios ?> usuários cadastrados.</p>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <h4>Pesquisa Avançada</h4>
            <form method="GET">
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id ="categoria" name="filtros[categoria]" class="form-control">
                        <option></option>
                        <?php foreach($categorias as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>" <?php echo ($cat['id'] == $filtros['categoria'])?'selected="selected"':""; ?>> <?php echo utf8_encode($cat['nome']) ?></option>
                        <?php endforeach; ?>    
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="preco">Preço:</label>
                    <select id ="preco" name="filtros[preco]" class="form-control">
                        <option></option>
                        <option value="0-50" <?php echo ($filtros['preco'] == "0-50")?'selected="selected"':'';?>>R$ 0 - 50</option> 
                        <option value="51-100" <?php echo ($filtros['preco'] == "51-100")?'selected="selected"':'';?>>R$ 51 - 100</option>
                        <option value="101-200" <?php echo ($filtros['preco'] =="101-200")?'selected="selected"':'';?>>R$ 101 - 200</option>
                        <option value="201-500" <?php echo ($filtros['preco'] == "200-500")?'selected="selected"':'';?>>R$ 201 - 500</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado de Conservação:</label>
                    <select id ="estado" name="filtros[estado]" class="form-control">
                        <option></option>
                        <option value="0" <?php echo ($filtros['estado']=='0')?'selected="selected"':'';?>>Ruim</option> 
                        <option value="1" <?php echo ($filtros['estado']=='1')?'selected="selected"':'';?>>Bom</option>
                        <option value="2" <?php echo ($filtros['estado']=='2')?'selected="selected"':'';?>>Otimo</option>
                    </select>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-info" value="Filtrar">  
                </div>                                
            </form>




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
                                <a href="produto.php?id=<?php echo $anuncio['id'] ?>"><?php echo utf8_encode($anuncio['titulo']); ?></a><br>
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