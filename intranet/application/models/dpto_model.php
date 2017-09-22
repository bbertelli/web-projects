<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Usuários Model
 */

class Dpto_model extends CI_Model {
  
//====================  Funcções administração de departamento
    
    // Método -> Insert
    public function insert_dpto($dados=NULL, $redir=TRUE){
        if($dados != NULL):
            $this->db->insert('dpto', $dados);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Cadastro efetuado com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao inserir dados','erro');
            endif;  
            
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Pega departamento
    public function get_dpto_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('dpto');
        else:
            return FALSE;
        endif;
        
    }
    
    // Método -> Pega departamento all
    public function get_dpto_all(){
        return $this->db->get('dpto');
    }
    
    // Método -> Deleta departamento
    public function delete_dpto($condicao=NULL, $redir=TRUE){
        if($condicao != NULL && is_array($condicao)):
            $this->db->delete('dpto', $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok', 'Registro excluído com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao excluir registro','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Update departamento
    public function update_dpto($dados=NULL, $condicao=NULL, $redir=TRUE){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('dpto', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Alteração efetuada com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao atualizar dados','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
	
}