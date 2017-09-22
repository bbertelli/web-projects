<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Usuários Model
 */

class Usuarios_model extends CI_Model {
    
    
//====================  Funcções administração de usuários    
	    
	// Método -> Insert
	public function do_insert($dados=NULL, $redir=TRUE){
		if($dados != NULL):
			$this->db->insert('usuarios', $dados);
			if ($this->db->affected_rows()>0):
				set_msg('msgok','Cadastro efetuado com sucesso','sucesso');
			else:
				set_msg('msgerro','Erro ao inserir dados','erro');
			endif;	
			
			if($redir) redirect(current_url());
		endif;
	}

	// Método -> Update
	public function do_update($dados=NULL, $condicao=NULL, $redir=TRUE){
		if ($dados != NULL && is_array($condicao)):
			$this->db->update('usuarios', $dados, $condicao);
			if ($this->db->affected_rows()>0):
				set_msg('msgok','Alteração efetuada com sucesso','sucesso');
			else:
				set_msg('msgerro','Erro ao atualizar dados','erro');
			endif;	
			if($redir) redirect(current_url());
		endif;
	}

    // Método -> Desativar usuário
    public function desativar($dados=NULL, $condicao=NULL){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('usuarios', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Alteração efetuada com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao atualizar dados','erro');
            endif;  
        endif;
    }
	
	/*// Método -> Delete
	public function do_delete($condicao=NULL, $redir=TRUE){
		if($condicao != NULL && is_array($condicao)):
			$this->db->delete('usuarios', $condicao);
			if ($this->db->affected_rows()>0):
				set_msg('msgok', 'Registro excluído com sucesso', 'sucesso');
			else:
				set_msg('msgerro','Erro ao excluir registro','erro');
			endif;	
			if($redir) redirect(current_url());
		endif;
	}*/

	// Método -> Login
	public function do_login($usuario=NULL, $senha=NULL){
		if ($usuario && $senha):
			$this->db->where('login', $usuario);
			$this->db->where('senha', $senha);
			$this->db->where('ativo', 1);
			$query = $this->db->get('usuarios');
			if($query->num_rows == 1):
				return TRUE;
			else:
				return FALSE;
			endif;
		else:
			return FALSE;
		endif;
		
	}

	// Método -> Result All
    public function get_all(){
        return $this->db->get('usuarios');
    }
    
    // Método -> Result All order by id_dpto
    public function get_all_orderbydpto(){
        $this->db->order_by("id_dpto");
        return $this->db->get('usuarios');
    }
    
    // Método -> Result All order by id_dpto com parametro
    public function get_all_orderbydpto_parm($usuario_com_perm){
        $this->db->where_not_in("id", $usuario_com_perm);
        $this->db->order_by("id_dpto");
        return $this->db->get('usuarios');
    }

	// Método -> Result Login
	public function get_bylogin($login=NULL){
		if ($login != NULL):
			$this->db->where('login', $login);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
		
	}
	
	// Método -> Result Email
	public function get_byemail($email=NULL){
		if ($email != NULL):
			$this->db->where('email', $email);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
		
	}
	
	// Método -> Result Id
	public function get_byid($id=NULL){
		if ($id != NULL):
			$this->db->where('id', $id);
			$this->db->limit(1);
			return $this->db->get('usuarios');
		else:
			return FALSE;
		endif;
		
	}
    
    // Método -> Result cargo
    public function get_all_bypermcargo($id=NULL){
        if ($id != NULL):
            $this->db->where('id_perm_cargo', $id);
            return $this->db->get('usuarios');
        else:
            return FALSE;
        endif;
        
    }
    

//====================  Funções genéricas   
    
    // Método -> Result dependencia entre tabelas
    public function get_byid_rel($id_selecionado=NULL, $id_tabela=NULL, $tabela=NULL){
        if ($id_selecionado != NULL && $id_tabela != NULL && $tabela != NULL):
            $this->db->where($id_tabela, $id_selecionado);
            $this->db->limit(1);
            return $this->db->get($tabela);
        else:
            return FALSE;
        endif;
        
    }
	
}