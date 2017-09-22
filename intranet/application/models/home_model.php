<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Usuários Model
 */

class Home_model extends CI_Model {
    
    /* Funções de recado */
    
    // Método -> Update
    public function do_update($dados=NULL, $condicao=NULL, $redir=TRUE){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('recado', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Alteração efetuada com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao atualizar dados','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Pega recado por id
    public function get_recado_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('recado');
        else:
            return FALSE;
        endif;
        
    }
	
    
    /* Funções de agenda */
        
	// Método -> Insert
	public function do_insert($dados=NULL, $redir=TRUE){
		if($dados != NULL):
			$this->db->insert('agenda', $dados);
			if ($this->db->affected_rows()>0):
				set_msg('msgok','Cadastro efetuado com sucesso','sucesso');
			else:
				set_msg('msgerro','Erro ao inserir dados','erro');
			endif;	
			
			if($redir) redirect(current_url());
		endif;
	}

	// Método -> Delete
    public function do_delete($condicao=NULL, $redir=TRUE){
        if($condicao != NULL && is_array($condicao)):
            $this->db->delete('agenda', $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok', 'Registro excluído com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao excluir registro','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
	
	// Método -> Result All
	public function get_all(){
		return $this->db->get('agenda');
	}

}