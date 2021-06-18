<?php
// include_once('../sdkpagseguro/PagSeguroLibrary');
include_once APPPATH.'/sdkpagseguro/PagSeguroLibrary/PagSeguroLibrary.php';
// use CWG\PagSeguro\PagSeguroAssinaturas;

class Home extends CI_Controller
{

    function __construct()
    {

        parent::__construct();

        $this->load->model('inicio');
        // $this->load->model('pagseguro_control');
        $this->load->library('session');
    }

    function index()
    {
        $dados['cursos_destaque'] = $this->inicio->buscar_curso_destaque();
        $this->load->view('estrutura/header');
        $this->load->view('home', $dados);
        $this->load->view('estrutura/footer');
    }

    // Area de login e autenticacao
    function loginAPI()
    {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');
        echo json_encode($this->logar($login, $senha)); 
    }

    function logar($login, $senha)
    {
        // consultar se o usuairo pode logar
        $user = $this->inicio->logar($login, $senha);
        if (isset($user)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    function logando($email = null, $senha_pass = null)
    {

        if ($this->input->get('login') != null) {
            $login = $this->input->get('login');
            $senha = $this->input->get('senha');
            $url_atual = $this->input->get('url');
        } else {
            $login = $email;
            $senha = $senha_pass;
        }

        $validate = $this->logar($login, $senha);

        if ($validate == 'true') {
            $user = $this->buscarUsuario($login, $senha);
            $this->session->set_userdata($user);
            $this->session->unset_userdata('senha');
            if ($this->validate_session() == true) {
                if (isset($url_atual)) {
                    header("location: " . $url_atual);
                } else {
                    header("location: " . base_url('home/areaLogada'));
                }
            }
        } else {
            return false;
        }
    }

    function buscarUsuario($login, $senha)
    {
        return $this->inicio->logar($login, $senha);;
    }

    function validate_session()
    {
        if ($this->session->userdata('email') != null) {
            return true;
        } else {
            header("location : " . base_url('home/index'));
        }
    }

    // Cadastrar usuario
    function cadastrar()
    {
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

        $validacao = $this->inicio->validarCadastrar(
            $this->input->post('email'),
            $this->input->post('cpf'),
            $this->input->post('telefone')
        );
        if (isset($validacao)) {
            echo '<script>alert("Dados já utilizados por outro usuário");location="' . base_url() . 'home/index' . '"</script>';
        } else {
            $this->inicio->cadastrar($dados);
            $dado = $this->logando($this->input->post('email'), $this->input->post('senha'));
        }
    }

    // Area logada
    function areaLogada()
    {
        $this->validate_session();
        header("location: " . base_url('home/index'));
        // $dados['cursos_destaque'] = $this->inicio->buscar_curso_destaque();
        // $this->load->view('estrutura/header');
        // $this->load->view('search',$dados);
        // $this->load->view('estrutura/footer-v2');
    }

    function pgCursos()
    {
        $dados = [];
        if ($this->input->get('id') != null) {
            $id = $this->input->get('id');
            $dados['curso'] = $this->inicio->buscar_curso_pg($id);
        } else {
            header("location: " . base_url('home/search'));
        }
        $this->load->view('estrutura/header');
        $this->load->view('pgCursos', $dados);
        $this->load->view('estrutura/footer-v2');
    }

    function search()
    {
        $dados['cursos_destaque'] = $this->inicio->buscar_curso_destaque();
        $dados['cursos_search_pag'] = $this->inicio->cursos_search_pag();
        $this->load->view('estrutura/header');
        $this->load->view('search', $dados);
        $this->load->view('estrutura/footer-v2');
    }

    function sair()
    {
        $this->session->sess_destroy();
        header("location: " . base_url('home/index'));
    }

    function gerarnumero()
    {
        $ch = curl_init("http://127.0.0.1/ebook-rifas/rifas/home/compraefetuada");

        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_exec($ch);

        curl_close($ch);

        echo json_encode($ch);
    }

    // Checkout - pagamento
    function checkout()
    {


        $paymentRequest = new PagSeguroPaymentRequest();  
        $paymentRequest->addItem('0001', 'Ebook - Engenharia da computação',  1, 10.00); 
        $paymentRequest->setCurrency("BRL");  

        // Referenciando a transação do PagSeguro em seu sistema  
        $paymentRequest->setReference("REF");  
        
        // URL para onde o comprador será redirecionado (GET) após o fluxo de pagamento  
        $paymentRequest->setRedirectUrl("https://ragaparticipacoes.com.br/home/myEbooks");  
        
        // URL para onde serão enviadas notificações (POST) indicando alterações no status da transação  
        $paymentRequest->addParameter('notificationURL', 'https://ragaparticipacoes.com.br/home/notificacoes'); 
        
        try {  

            $credentials = PagSeguroConfig::getAccountCredentials(); // getApplicationCredentials()  
            $checkoutUrl = $paymentRequest->register($credentials); 
            
            // echo "<a href='{$checkoutUrl}'>Pagar agora!</a>";
            header("location: " . $checkoutUrl);
            
            } catch (PagSeguroServiceException $e) {  
                die($e->getMessage());  
            }  



        // $this->load->view('estrutura/header');
        // $this->load->view('checkout');
        // $this->load->view('estrutura/footer-v2');
    }

    function myEbooks()
    {
        $this->load->view('estrutura/header');
        $this->load->view('myEbooks');
        $this->load->view('estrutura/footer-v2');
    }

    function buscarCursos(){
        echo json_encode($this->inicio->searchCurso($this->input->post('search'))); 
    }

    function notificacoes(){

    }
}
