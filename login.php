<?php require 'pages/header.php'; ?>

<div class="container">
<h1 class="mt-5">Login</h1>
<?php
    require 'classes'.DIRECTORY_SEPARATOR.'Usuarios.php';
    $u = new Usuarios($conn);
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = addslashes(MD5($_POST['senha']));
    
        if($u->login($email, $senha)){
?><!--Fecha PHP Linha 5-->
            <script type="text/javascript">
                window.location.href="./";
            </script>
<?php
        }else{
?><!--Fecha PHP Linha 17-->
        <div class="alert alert-danger">
            Usuário e/ou Senha errados!
        </div>
<?php
        }
    }
?><!--Fecha PHP Linha 23-->        
    <form method="POST">
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <input type="submit" value="Entrar" class="btn border bg-secondary text-light">
</form>
</div>

<?php require 'pages'.DIRECTORY_SEPARATOR.'footer.php'; ?> 