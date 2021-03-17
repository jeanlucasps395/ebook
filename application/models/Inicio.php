<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Model {

	function validarCadastrar($email,$cpf,$telefone){
		$dados = $this->db->query('select * from eb_usuario where email ="'.$email.'" or cpf ="'.$cpf.'" or telefone ="'.$telefone.'" ')->row_array();
		return $dados;
	}
	function cadastrar($dados){
		$this->db->insert('eb_usuario', $dados);
	}

	function logar($login, $senha){
		$dados = $this->db->get_where('eb_usuario',array('email' => $login, 'senha' => sha1($senha), 'ativo' => 1 ))->row_array();
		return $dados;
	}
  
}