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
  <script src="<?= base_url('style/js/') ?>script.js"></script>

  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" />

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBy6fwubO922dAiPyjWjZbAvgVtOX8Z9u4&libraries=geometry"></script>

  <!-- SLICK -->
  <!-- <link rel="stylesheet" type="text/css" href="<?= base_url('style/scss/') ?>slick.scss" /> -->
  <script type="text/javascript" src="<?= base_url('style/js/') ?>slick.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.min.js"></script>

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

  <script type="text/javascript">
    function openMenuXS() {
      $('.mobilemenu-block').css('display', 'block');
    }

    function closeMenuXS() {
      $('.mobilemenu-block').css('display', 'none');
    }
  </script>

  <!-- Ancora -->
  <script>
    $(document).ready(function() {
      $(function() {
        $('.atAnc').on('click', function(e) {
          e.preventDefault();
          $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
          }, 100, 'linear');
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
      <img src="<?= base_url('style/img/logo-footer.png'); ?>" class="header-block__logo block__logo--mobile">

      <p>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link atAnc" href="#contato">Contatos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link atAnc" href="#quemSomos">Quem Somos</a>
        </li>
        <?php if($this->session->userdata('email') != null){ ?> 
          <li class="nav-item">
            <a class="nav-link color-green" href="#"><?= $this->session->userdata('nome'); ?></a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="<?= base_url('home/sair'); ?>">Sair</a>
          </li>
        <?php } else { ?>
          <li class="nav-item">
              <a class="nav-link" id="modalLogin" href="#">Entrar</a>
          </li>
        <?php } ?>

      </ul>
      </p>
    </div>
  </div>

  <div class="background-header container-fluid">

    <nav class="navbar navbar-expand-md navbar-dark header-block">

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
              <a class="nav-link" href="#contato">Contatos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#quemSomos">Quem somos</a>
            </li>

            <?php if($this->session->userdata('email') != null){ ?> 
              <li class="nav-item">
                <a class="nav-link color-green" href="#"><?= $this->session->userdata('nome'); ?></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('home/sair'); ?>">Sair</a>
              </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link" id="modalLogin" href="#">Entrar</a>
            </li>
            <?php } ?>

          </ul>
        </div>
      </div>
    </nav>

  </div>

  <!-- background -->
  <div class="blackout">
  </div>
  <!-- background -->
  <div class="modal__body">
    <div class="modal__close"><i id="close" class="fas fa-times"></i></div>
    <div class="modal__title">
      <p>Acessar minha conta</p>
    </div>
    <div class="modal__inputs">
      <label for="login">E-mail</label>
      <input type="" id="login" name="login" placeholder="Digite seu e-mail de acesso">
    </div>
    <div class="modal__inputs">
      <label for="login">Senha</label>
      <input type="password" id="senha" name="login" placeholder="Digite sua senha">
    </div>
    <div class="modal__login d-flex">
      <a href="#" class="col-6">Esqueci minha senha</a>
      <button class="col-6" onclick="acesso()">Enviar</button>
    </div>
    <div class="modal__footer">
      <a href="#">Ainda não tenho uma conta</a>
    </div>
  </div>







  <!-- Modal provisoria sorteio -->
  <div id="modalSorteio">
    <div class="modalSorteio__background" onclick="closeModalSorteio()"></div>
    <div class="modalSorteio__body">
        <p class="modalSorteio__body--title">Parabéns pela compra <span><?= $this->session->userdata('nome'); ?></span>, seu número é:</p>
        <p class="modalSorteio__body--number" id="numerosorte">00000</p>
        <p class="modalSorteio__body--obs">O seu número de sorteio é único, estamos te enviando por email também, guarde-o com seguranaça.</p>
    </div>
  </div>

  <style type="text/css">
    #modalSorteio{
      display: none;
    }
    .modalSorteio__background{
      position: fixed;
      background: #000;
      opacity: .40;
      width: 100%;
      height: 150%;
      z-index: 99;
      margin-top: -150px;
    }
    .modalSorteio__body{
      position: fixed;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 0 4px rgb(0,0,0,0.2);
      padding: 45px 20px 30px 20px;
      width: 600px;
      margin-left: 50%;
      left: -300px;
      z-index: 999;
      margin-top: 50px;
    }
    .modalSorteio__body--title{
      text-align: center;
      font-size: 20px;
    }
    .modalSorteio__body--title span{
      text-transform: capitalize;
    }
    .modalSorteio__body--number{
      text-align: center;
      font-size: 35px;
      font-weight: bolder;
      letter-spacing: 5px;
      color: #FF2C0D; 
    }
    .modalSorteio__body--obs{
      text-align: center;
      font-size: 20px;
    }
  </style>




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
        if (response == '"true"') {
          var atualUrl = window.location.href;
          var url = "<?php echo base_url('home/logando'); ?>" + "?login=" + login + "&senha=" + senha + "&url=" + atualUrl;
          window.location.href = url;
        }else{
          alert('usuário não encontrado');
        }
      });
    }

    function requestLogin(){
      window.scrollTo(0, 0);
      $('#modalLogin').trigger('click');
    }





    // Modal provisoria sorteio
    function oepnModalLook(){

      var settings_num = {
        "async": true,
        "crossDomain": true,
        "url": "<?php echo base_url('home/gerarnumero'); ?>",
        "method": "GET",
        "headers": {
          "cache-control": "no-cache",
        }
      }
      $.ajax(settings_num).done(function(response) {
        $('#numerosorte').html(response);
      });

      $('#modalSorteio').css('display','block');
    }
    function closeModalSorteio(){
      $('#modalSorteio').css('display','none');
    }

  </script>