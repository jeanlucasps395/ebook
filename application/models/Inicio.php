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

	function buscar_curso_destaque(){
		$dados = $this->db->query('SELECT * FROM eb_curso WHERE ativo = 1 and destaque = 1 ')->result_array();
		return $dados;
	}
  	
  	function cursos_search_pag(){
  		$dados = $this->db->query('SELECT * FROM eb_curso WHERE ativo = 1 order by id_curso desc  limit 0,6')->result_array();
		return $dados;
  	}
  	function buscar_curso_pg($id){
  		$dados = $this->db->query('SELECT * FROM eb_curso WHERE ativo = 1 and id_curso = '.$id.'')->row_array();
		return $dados;	
  	}
  	function searchCurso($search){
  		$dados = $this->db->query("SELECT * FROM eb_curso WHERE ativo = 1 and titulo like '%".$search."%' ")->result_array();
  		// echo $this->db->last_query();
  		// die();
		return $dados;		
  	}
}