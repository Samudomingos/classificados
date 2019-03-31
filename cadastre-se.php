<?php require 'pages/header.php'; ?>

<div class="container">
<h1 class="mt-5">Cadastre-se</h1>
<?php
    require 'classes'.DIRECTORY_SEPARATOR.'Usuarios.php';
    $u = new Usuarios($conn);
    if (isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes(MD5($_POST['senha']));
        $tel = addslashes($_POST['tel']);
        
        if (!empty($nome) && !empty($email) && !empty($senha)) {
            if($u->cadastrar($nome, $email, $senha, $tel)){
?><!--FECHA PHP LINHA 5-->
            <div class="alert alert-success">
                <strong>Parabéns!</strong> Cadastrado com sucesso. <a href="login.php" class="alert-link"> Faça o login agora!</a>
            </div>
<?php   
            } else{
?><!--FECHA PHP LINHA 19-->
            <div class="alert alert-warning">
                <strong>Erro!</strong> Este úsuario já existe. <a href="login.php" class="alert-link"> Faça o login agora!</a>
            </div>
<?php 
            }
        } else {
?><!--FECHA PHP LINHA 25-->
            <div class="alert alert-warning">
                Preencha todos os campos
            </div>
<?php
        }
    }
?> <!--FECHA PHP LINHA 26-->
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <div class="form-group">
            <label for="tel">Telefone:</label>
            <input type="text" name="tel" id="tel" class="form-control">
        </div>
        <input type="submit" value="Cadastrar" class="btn border bg-secondary text-light">
</form>
</div>

<?php require 'pages'.DIRECTORY_SEPARATOR.'footer.php'; ?> 