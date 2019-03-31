<?php
require 'config.php';?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Classificados</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
  <a class="navbar-brand" href="#">Classificados</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])):?>
      <li class="nav-item"><a class="nav-link" href="meus-anuncios.php">Meus Anuncios<span class="sr-only">(current)</span></a></li>
      <li class="nav-item"><a class="nav-link" href="sair.php">Sair</a></li>
      <?php else: ?>
      <li class="nav-item"><a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a></li>
      <li class="nav-item"><a class="nav-link" href="cadastre-se.php">Cadastre-se</a></li>
        <?php endif; ?>
    </ul>
  </div>
</nav>