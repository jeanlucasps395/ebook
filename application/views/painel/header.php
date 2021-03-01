<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
     <meta name = "Description" content = "Ebook" >    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, height=device-height">
    <meta name="theme-color" content="#2E3192">
    <title>Ebook</title>
    <meta name="robots" content="index,follow">
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">

    <link href="<?= base_url('style/css/header.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('style/css/theme-animate.css'); ?>" rel="stylesheet">

    <link href="<?= base_url('style/css/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('style/js/jquery.js'); ?>"></script>
    <script src="<?= base_url('style/js/bootstrap/bootstrap.min.js'); ?>"></script>

    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"/>


    <link href="<?= base_url('style/css/painel/home.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('style/css/painel/dashboard.css'); ?>" rel="stylesheet">
  


    <link rel="stylesheet" type="text/css" href="https://kit-pro.fontawesome.com/releases/v5.10.1/css/pro.min.css">

    <style>
        body{
            font-family: 'roboto' !important;
        }
        textarea:focus, input:focus, select:focus {
            /*box-shadow: 0px 0px 2px #041239;*/
            /*border: 0px solid #041239;*/
            outline: 0px;
        }
    </style>

</head>


<style type="text/css">
    .bg-light-header{
        background: #292929;
        color: #292929;
        padding: 15px 0 !important;
    }
    .bg-light-header .nav-item .dropdown-item{
        color: #292929 !important;
    }
    .link-menu-default{
        margin:0 20px;
        margin-top: 8px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light-header">
    <div class="widhtPadrao">
      <!-- <a class="navbar-brand" href="<?php echo base_url('painel/dashboard'); ?>">Dashboard</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item link-menu-default">
            <a  class="" href="<?php echo base_url('painel/dashboard'); ?>">Logo</a>
          </li>
          <li class="nav-item link-menu-default">
            <a  class="" href="<?php echo base_url('painel/dashboard'); ?>">Dashboard</a>
          </li>

           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Cursos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Aprovar Curso</a>
              <a class="dropdown-item" href="<?php echo base_url('painel/cadastrar_curso'); ?>">Cadastrar Curso</a>
              <a class="dropdown-item" href="<?php echo base_url('painel/editar_curso_list'); ?>">Editar Curso</a>
              <a class="dropdown-item" href="<?php echo base_url('painel/apagar_curso'); ?>">Apagar Curso</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <!-- <a class="dropdown-item" href="#">Cadastrar Usuario</a> -->
              <a class="dropdown-item" href="#">Editar Usuario</a>
              <a class="dropdown-item" href="#">Apagar Usuario</a>
            </div>
          </li>


        </ul>
      </div>
    </div>
</nav> 
