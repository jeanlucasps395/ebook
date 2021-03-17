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
            $user = $this->inicio->logar($login, $senha);
            if(isset($user)){
                return 'true';
            }else{
                return 'false';
            }
        }
        function logando($email = null, $senha_pass = null){
            
            if($this->input->get('login') != null ){
                $login = $this->input->get('login');
                $senha = $this->input->get('senha');
            }   
            else{
                $login = $email;
                $senha = $senha_pass;
            } 

            $validate = $this->logar($login, $senha);

            if($validate == 'true'){
                $user = $this->buscarUsuario($login, $senha);
                $this->session->set_userdata($user);
                $this->session->unset_userdata('senha');
                if($this->validate_session() == true) {
                    header("location: ".base_url('home/areaLogada'));
                } 
            }else{
                return false;
            }
        }
        function buscarUsuario($login, $senha){
            return $this->inicio->logar($login, $senha);;
        }
        function validate_session(){
            if($this->session->userdata('email') != null){
                return true;
            }else{
                header("location : ".base_url('home/index'));
            }
        }


        // Cadastrar usuario
        function cadastrar(){
            $dados = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),  
                'cpf' => $this->input->post('cpf'),  
                'telefone' => $this->input->post('telefone'),
                'senha' => sha1($this->input->post('senha')), 
                'fk_tipo_usr' => 1,
                'ativo' => 1,
                'dt_criacao' => date('Y-m-d')
            );

            $validacao = $this->inicio->validarCadastrar($this->input->post('email'),  
                    $this->input->post('cpf'), 
                    $this->input->post('telefone')
            );
            if(isset($validacao)){
                echo '<script>alert("Dados já utilizados por outro usuário");location="'.base_url().'home/index'.'"</script>';
            }else{
                $this->inicio->cadastrar($dados);    
                $dado = $this->logando($this->input->post('email'), $this->input->post('senha'));
            }
            
        }


        // Area logada
        function areaLogada(){
            $this->validate_session();
            $this->load->view('estrutura/header');
            $this->load->view('search');
            $this->load->view('estrutura/footer-v2');
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

        function sair(){
            $this->session->sess_destroy();
            header("location: ".base_url('home/index'));
        }        

    }
