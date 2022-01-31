<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo $base . '/assets/icons/scs.ico'; ?>" type="image/x-icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/reset.css' ?>" />
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/header.css' ?>" />
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/main.css' ?>">
  <link rel="stylesheet" href="<?php echo $base . '/assets/css/components/footer.css' ?>">
  <title>PSI - Sicoob Centro-sul</title>
</head>

<body>
  <header class="header">
    <div class="container-header">
      <div class="logo">
       <img src="<?php echo $base . '/assets/icons/logo-sicoob.png' ?>" alt="Logo PSI-Sicoob Centro-sul" width="30px" style="object-fit:contain">
       Psi-Sicoob Centro-sul
      </div>
      <nav class="menu">
        <ul>
          <li><a href="<?php echo $base . '/' ?>">Home</a></li>
          <li><a href="#sobre">Sobre</a></li>
          <li><a href="#servicos">Serviços</a></li>
          <li><a href="#psi">Psicólogos</a></li>
        </ul>
      </nav>
    
      <div class="menu-area">
        <a href="<?php echo $base.'/signin';?>" class="button-blue">Entrar</a>
        <a href="<?php echo $base.'/signup';?>">Registrar</a>
      </div>
    </div>
  </header>