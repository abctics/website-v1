<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title><?php if(!empty($pageTitle)) echo $pageTitle . " - "; ?>ABC<?php if(empty($pageTitle)) echo " – Desarrollo ABC"; ?></title>  <meta name="description" content="">
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
<header class="main-header">
      <div class="container-header">
       <div class="parent-logo">
       <div class="container-logo">
        <a href="/index#" class="logo"><img src="img/logo.png" alt="abc" class="logo-img"></a>
        <h1 class="company-title">Desarrollo ABC</h1>
       </div>
       <div class="container-hamburger">
        <span id="btn-menu" class="icon-menu">☰</span>       
       </div>
       </div>
       <div class="parent-menu">
        <nav class="main-menu">
          <ul>
          <li class="main-menu-item"><a class="main-menu-link active" href="/index#">inicio</a></li>
          <li class="main-menu-item"><a class="main-menu-link" href="#" data-toggle="modal" data-target="#modalRegisterForm">Registrarse</a></li>
          <li class="main-menu-item"><a class="main-menu-link" href="#" data-toggle="modal" data-target="#elegantModalForm">Iniciar sesión</a></li>
          <li class="main-menu-item"><a class="main-menu-link" href="#" data-toggle="modal" data-target="#modalContactForm">contacto</a></li>
          </ul>
        </nav>       
       </div>
      </div>
    </header>
    <section class="header-responsive">
       <div class="parent-menu-responsive">
        <nav class="menu-responsive">
          <ul>
          <li class="menu-item-responsive active"><a class="menu-link-responsive" href="/index#">inicio</a></li>
          <li class="menu-item-responsive" data-toggle="modal" data-target="#modalRegisterForm"><a class="menu-link-responsive" href="#" >Registrarse</a></li>
          <li class="menu-item-responsive" data-toggle="modal" data-target="#elegantModalForm"><a class="menu-link-responsive" href="#" >Iniciar sesión</a></li>
          <li class="menu-item-responsive" data-toggle="modal" data-target="#modalContactForm"><a class="menu-link-responsive" href="#" >contacto</a></li>
          </ul>
        </nav>       
       </div>
    </section>
