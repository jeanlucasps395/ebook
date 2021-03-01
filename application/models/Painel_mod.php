<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class painel_mod extends CI_Model {

	// public function categorias(){
 //        $dados = $this->db->get('categorias')->result_array();
	// 	return  $dados;
	// }
  
  public function last_id(){
       $this->db->select('id_curso');
       $this->db->order_by('id_curso','DESC');
       $dados = $this->db->get('eb_curso')->row_array();

       if(empty($dados)){
       	$dados = array ( 'id' => 0 );
       }

      return  $dados;
      
  }
   

    function buscarUsuario($dados){
        return $this->db->get_where('admin',$dados)->row_array();
    }

    // Curso
    function cadastrar_curso($dados){
        $this->db->insert('eb_curso', $dados);
    }

    function lista_curso(){
        return $this->db->query('select * from eb_curso where ativo = "1"')->result_array();
    }

    function lista_curso_editar($id){
        return $this->db->query('select * from eb_curso where id_curso = '.$id.'')->row_array();
    }
    function editar_curso($id,$dados){
         $this->db->where('id_curso',$id);
        return $this->db->update('eb_curso', $dados);
    }
    function apagar_imagem_curso($id_curso,$tipo){
        $dados = array($tipo => null);
        $this->db->where('id_curso',$id_curso);
        return $this->db->update('eb_curso', $dados);   
    } 
    function apagar_curso($id){
        $dados = array ('ativo' => 0);
        $this->db->where('id_curso',$id);
        return $this->db->update('eb_curso', $dados);
    }

    // function cadastrarCarros($dados){
    //     $this->db->insert('veiculos', $dados);
    // }


    // function buscarVeiculos(){
    //           $this->db->order_by('id','DESC');
    //    return $this->db->get_where('veiculos',array('carroAtivo' => 1))->result_array();
    // }

    // function buscarVeiculos_edit($id){
    //     return $this->db->get_where('veiculos',array('id' => $id))->row_array();   
    // }

    // function ediarVeiculo($dados,$id){
    //     $this->db->where('id',$id);
    //     return $this->db->update('veiculos', $dados);
    // }

    // function apagarVeiculo($id){
    //     $this->db->delete('veiculos', array('id' => $id));
    // }


    // noticias
    // function last_id_noticias(){
    //     $this->db->select('id_noticia');
    //     $this->db->order_by('id_noticia','DESC');
    //      $dados = $this->db->get('noticias')->row_array();

    //      if(empty($dados)){
    //         $dados = array ( 'id' => 0 );
    //      }

    //     return  $dados;
    // }
    // function cadastrarNoticia($dados){
    //     $this->db->insert('noticias', $dados);
    // }
    // function buscarNoticias(){
    //         $this->db->order_by('id_noticia','DESC');
    //    return $this->db->get('noticias')->result_array();
    // }

    // function apagarNoticia($id){
    //     $this->db->delete('noticias', array('id_noticia' => $id));
    // }
    // function buscarNoticia_edit($id){
    //     return $this->db->get_where('noticias',array('id_noticia' => $id))->row_array();   
    // }
    // function ediarNoticia($dados,$id){
    //     $this->db->where('id_noticia',$id);
    //     return $this->db->update('noticias', $dados);
    // }
}