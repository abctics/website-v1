<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <title><?php if(!empty($pageTitle)) echo $pageTitle . " - "; ?>ABC<?php if(empty($pageTitle)) echo " – Alexander Benavides"; ?></title>  <meta name="description" content="">
 <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
    <!--bootstrap-->
  <link rel="stylesheet" href="/css/bootstrap/css/bootstrap.min.css">
    <!--fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:fixed;width:100%;margin:0 auto;z-index:3;top:0;">
    <a class="navbar-brand" href="/index#"><img src="/img/logo.png" alt="" width="40px"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/index#">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/signup">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Iniciar sesión</a>
        </li>
      </ul>
      <!--<form class="form-inline my-2 my-lg-0" action="<?php echo $_SERVER['REQUEST_URI'];?>">-->
        <div class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" autocomplete="off" type="search" placeholder="Busca un tema o curso" aria-label="Search">
          <button class="btn nav-link-1 my-2 my-sm-0" type="submit" style="border:1px solid #ced4da;">Buscar</button>
      <!-- </form> -->
       </div>
    </div>
  </nav>
