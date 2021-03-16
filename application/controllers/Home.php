<?php

// include_once APPPATH.'/third_party/pag/PagSeguroAssinaturas.php';
// use CWG\PagSeguro\PagSeguroAssinaturas;

    class Home extends CI_Controller{

        function __construct() {

            parent::__construct();
            
            $this->load->model('inicio');
            // $this->load->model('pagseguro_control');
            $this->load->library('session');

        }


        function index(){
            $this->load->view('estrutura/header');
            $this->load->view('home');
            $this->load->view('estrutura/footer');
        }

        // Area de login e autenticacao
        function loginAPI(){
            $login = $this->input->post('login');
            $senha = $this->input->post('senha');
            echo json_encode($this->logar($login, $senha));
        }

        function logar($login, $senha){
            // consultar se o usuairo pode logar
            return true;
        }
        function logando(){
            $login = $this->input->get('login');
            $senha = $this->input->get('senha');
            $validate = $this->logar($login, $senha);
            if($validate == true){
                $user = $this->buscarUsuario($login, $senha);
                $this->session->set_userdata($user);
                if($this->validate_session() == true) {
                    header("location: ".base_url('home/areaLogada'));
                }
                echo $this->session->userdata('nome');   
                echo $this->session->userdata('email');   
            }
        }
        function buscarUsuario($login, $senha){
            return array('nome' => 'jean','email' => 'jean.lucas@teste.com');
        }
        function validate_session(){
            if($this->session->userdata('email') != null){
                return true;
            }else{
                header("location : ".base_url('home/index'));
            }
        }

        // Area logada
        function areaLogada(){
            $this->validate_session();
            // $this->load->view('estrutura/header');
            // $this->load->view('home');
            echo "area logada";
            // $this->load->view('estrutura/footer');
        }

        function pgCursos(){
            $this->load->view('estrutura/header');
            $this->load->view('pgCursos');
            $this->load->view('estrutura/footer-v2');
        }
        function search(){
            $this->load->view('estrutura/header');
            $this->load->view('search');
            $this->load->view('estrutura/footer-v2');
        }

    }
