<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta name="Description" content="Ebooks">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, height=device-height">
  <meta name="theme-color" content="#2E3192">
  <title>Ebook</title>
  <meta name="robots" content="index,follow">

  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800&display=swap" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('style/css/') ?>style.css">
  <link href="<?= base_url('style/css/header.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('style/css/footer.css'); ?>" rel="stylesheet">
  <link href="<?= base_url('style/css/theme-animate.css'); ?>" rel="stylesheet">

  <link href="<?= base_url('style/css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
  <script src="<?= base_url('style/js/jquery.js'); ?>"></script>
  <script src="<?= base_url('style/js/bootstrap/bootstrap.min.js'); ?>"></script>

  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy6fwubO922dAiPyjWjZbAvgVtOX8Z9u4&libraries=geometry"></script>


  <link rel="stylesheet" type="text/css" href="https://kit-pro.fontawesome.com/releases/v5.10.1/css/pro.min.css">

  <style>
    body {
      font-family: 'roboto' !important;
    }

    textarea:focus,
    input:focus,
    select:focus {
      /*box-shadow: 0px 0px 2px #041239;*/
      /*border: 0px solid #041239;*/
      outline: 0px;
    }
  </style>

  <!-- Ancora -->
  <script>
    $(document).ready(function() {
      $(function() {
        $('.atAnc').on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
          }, 500, 'linear');
          closeMenuXS();
        });
      });
    });
  </script>

</head>

<body>


  <!-- mobile menu -->
  <div class="mobileMenu">
    <div class="mobilemenu-block">
      <p class="mobilemenu-block__times"><i class="far fa-times" onclick="closeMenuXS()"></i></p>
      <!-- <img src="<?= base_url('style/img/logo.png'); ?>" class="header-block__logo block__logo--mobile"> -->
      logo
      <p>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('home/index'); ?>">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('home/meusPedidosPesquisa'); ?>">Meus pedidos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('home/produtos'); ?>">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link atAnc" href="#Contatos">Fale conosco</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://api.whatsapp.com/send?1=pt_BR&phone=5511998887212"> <i class="fab fa-whatsapp"></i> Contato via Whatsapp </a>
          <a class="nav-link" href="tel:5511998887212"><i class="fad fa-phone"></i> Ligar pra Wf Colchões</a>
        </li>
      </ul>
      </p>
    </div>
  </div>

  <div class="background-header">

    <nav class="navbar navbar-expand-md navbar-dark header-block widthPadrao">

      <div class="col-xl-7 col-lg-5 col-md-4 col-sm-6 col-6">
        <a class="navbar-brand" href="<?= base_url('home/index'); ?>">
          <!-- <img src="<?= base_url('style/img/logo.png'); ?>" class="header-block__logo"> -->
          logo
        </a>
      </div>

      <div class="col-xl-5 col-lg-7 col-md-8 col-sm-6 col-6 p0">

        <div class="d-none d-sm-block">
          <button class="navbar-toggler header-block_toogle" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <button type="button" onclick="openMenuXS()" class="botaoXSmenu d-block d-sm-none">
          <i class="fad fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/meusPedidosPesquisa'); ?>">Contatos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/produtos'); ?>">Quem somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link atAnc" href="#Contatos">Entrar</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>

  <!-- <div>
  <input type="" id="login" name="login">
  <input type="password" id="senha" name="login">
  <button onclick="acesso()">Enviar</button>
</div> -->

  <script type="text/javascript">
    function acesso() {
      let login = document.getElementById('login').value;
      let senha = document.getElementById('senha').value;
      var settings = {
        "async": true,
        "crossDomain": true,
        "url": "<?php echo base_url('home/loginAPI'); ?>",
        "method": "POST",
        "headers": {
          "cache-control": "no-cache",
        },
        "data": {
          "login": login,
          "senha": senha
        }
      }
      $.ajax(settings).done(function(response) {
        console.log(response);
        if (response == 'true') {
          var url = "<?php echo base_url('home/logando'); ?>" + "?login=" + login + "&senha=" + senha;
          window.location.href = url;
        }
      });
    }
  </script>