<?php
include_once APPPATH.'/third_party/pag/PagSeguroAssinaturas.php';
use CWG\PagSeguro\PagSeguroAssinaturas;
    class Painel extends CI_Controller{
        function __construct() {

            parent::__construct();
            // $this->load->model('login');
            $this->load->model('inicio');
            $this->load->model('painel_mod');
            $this->load->library('session');

        }


         function index(){
            if( isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ) {
                
            }
            else{
                $URL_ATUAL= "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                header('Location: '.$URL_ATUAL.'');
            }
           $this->load->view('painel/login');
        }
        function login(){
            $dados = $this->input->post();

            $dados = array(
                'usuario' =>  $this->input->post('usuario'),
                'senha' =>  sha1($this->input->post('senha')),
            );
            $user = $this->painel_mod->buscarUsuario($dados);

            if(empty($user)){
                header('Location: '.base_url().'painel/index?erro=true');
            }else{
                $dados_sessao = array (
                    'id_admin' => $user['id_admin'],
                    'usuario' => $user['usuario']
                );
                $this->session->set_userdata($dados_sessao);
                header('Location: '.base_url().'painel/dashboard');
            }
        }
        function dashboard(){
            if(!empty($this->session->userdata('id_admin'))){
                $this->load->view('painel/header');
                $this->load->view('painel/dashboard');
            }else{
                header('Location: '.base_url().'painel/index');
            }
        }


        // Cursos
        function cadastrar_curso(){
            if(!empty($this->session->userdata('id_admin'))){
                $this->load->view('painel/header');
                $this->load->view('painel/cursos/cadastrar');
            }else{
                header('Location: '.base_url().'painel/index');
            }
        }

        function cadastrar_curso_form(){

            $last_id = $this->painel_mod->last_id();
            $endereco =  $_SERVER['DOCUMENT_ROOT']."".base_url().'upload/cursos/curso_'.($last_id['id_curso']+1);        
            
            if (!file_exists($endereco)) {
                mkdir($endereco, 0777, true);
                move_uploaded_file($_FILES['capa']['tmp_name'], $endereco."/capa.png");
                move_uploaded_file($_FILES['ebook']['tmp_name'], $endereco."/ebook.pdf");
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'valor' => $this->input->post('valor'),
                'postador' => $this->input->post('postador'),
                'sorteio' => $this->input->post('sorteio'),
                'n_sorteio' => $this->input->post('n_sorteio'),
                'avaliacao' => '0',
                'capa' => $endereco."/capa.png",
                'arquivo' => $endereco."/ebook.pdf",
                'data_postagem' => date("Y-m-d"),
                'ativo' => 1
            );

            $this->painel_mod->cadastrar_curso($dados);
            echo '<script>alert("Curso cadastrado!");location="'.base_url().'painel/cadastrar_curso'.'"</script>';
        }


         function editar_curso_list(){
            if(!empty($this->session->userdata('id_admin'))){
                $dados['cursos'] = $this->painel_mod->lista_curso();
                $this->load->view('painel/header');
                $this->load->view('painel/cursos/editar_curso_list',$dados);
            }else{
                header('Location: '.base_url().'painel/index');
            }
        }

        function editar_curso_form(){
            $id = $this->input->get('id');
            if($id != null){

            }else{
                header('Location: '.base_url().'painel/index');
            }

            if(!empty($this->session->userdata('id_admin'))){
                $dados['curso'] = $this->painel_mod->lista_curso_editar($id);
                $this->load->view('painel/header');
                $this->load->view('painel/cursos/editar_curso_form',$dados);
            }else{
                header('Location: '.base_url().'painel/index');
            }
        }
        function editar_curso_form_input(){
            $endereco =  $_SERVER['DOCUMENT_ROOT']."".base_url().'upload/cursos/curso_'.$this->input->post('id_curso'); 
            $uploads = 'id_curso';
            $upload = $this->input->post('id_curso');
            $uploadsPDF = 'id_curso';
            $uploadPDF = $this->input->post('id_curso');

            if(isset($_FILES['capa']['tmp_name'] )){
                if($_FILES['capa']['size'] != 0 ){
                    move_uploaded_file($_FILES['capa']['tmp_name'], $endereco."/capa.png");
                    $uploads = 'capa';
                    $upload =  $endereco."/capa.png";
                }
            }   

            if(isset($_FILES['ebook']['tmp_name'])){
                if($_FILES['ebook']['size'] != 0 ){
                    move_uploaded_file($_FILES['ebook']['tmp_name'], $endereco."/ebook.pdf");  
                    $uploadsPDF = 'arquivo';
                    $uploadPDF =  $endereco."/ebook.pdf"; 
                }
            }

            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'descricao' => $this->input->post('descricao'),
                'valor' => $this->input->post('valor'),
                'postador' => $this->input->post('postador'),
                'sorteio' => $this->input->post('sorteio'),
                'n_sorteio' => $this->input->post('n_sorteio'),
                $uploads => $upload,
                $uploadsPDF => $uploadPDF,
            );


            $this->painel_mod->editar_curso($this->input->post('id_curso'),$dados);
            echo '<script>alert("Curso alterado!");location="'.base_url().'painel/editar_curso_list'.'"</script>';
        }

        function apagar_imagem_curso(){
            $id_curso = $this->input->get('id_curso');
            $tipo = $this->input->get('tipo');
            $endereco =  $_SERVER['DOCUMENT_ROOT']."".base_url().'upload/cursos/curso_'.$id_curso; 
            if($tipo == 'capa'){
                unlink($endereco.'/capa.png');  
                $this->painel_mod->apagar_imagem_curso($id_curso,$tipo); 
            }
            else if($tipo == 'arquivo'){
                unlink($endereco.'/ebook.pdf');    
                $this->painel_mod->apagar_imagem_curso($id_curso,$tipo); 
            }else{
                echo '<script>alert("Nenhum arquivo encontrado");location="'.base_url().'painel/editar_curso_list'.'"</script>';
            }
            
            echo '<script>location="'.base_url().'painel/editar_curso_form?id='.$id_curso.'"</script>';   
        }

        function apagar_curso(){
          if(!empty($this->session->userdata('id_admin'))){
                $dados['cursos'] = $this->painel_mod->lista_curso();
                $this->load->view('painel/header');
                $this->load->view('painel/cursos/apagar_curso_list',$dados);
            }else{
                header('Location: '.base_url().'painel/index');
            } 
        }

        function apagar_carro_form(){
            $id_curso = $this->input->get('id_curso');
            $this->painel_mod->apagar_curso($id_curso); 
            echo '<script>alert("Curso apagado!");location="'.base_url().'painel/apagar_curso'.'"</script>';

        }
      

    }
?>