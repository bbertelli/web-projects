<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Usuários Model
 */

class Perm_model extends CI_Model {
  
//====================  Funções administração de permissões do sistema
    
    // Método -> Insert
    public function insert_perm_sis($dados=NULL, $redir=TRUE){
        if($dados != NULL):
            $this->db->insert('perm_sis', $dados);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Cadastro efetuado com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao inserir dados','erro');
            endif;  
            
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Pega permissões
    public function get_perm_sis_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('perm_sis');
        else:
            return FALSE;
        endif;
        
    }
    
    // Método -> Pega permissões all
    public function get_perm_sis_all(){
        return $this->db->get('perm_sis');
    }
    
    // Método -> Deleta permissões
    public function delete_perm_sis($condicao=NULL, $redir=TRUE){
        if($condicao != NULL && is_array($condicao)):
            $this->db->delete('perm_sis', $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok', 'Registro excluído com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao excluir registro','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Update permissões
    public function update_perm_sis($dados=NULL, $condicao=NULL, $redir=TRUE){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('perm_sis', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Alteração efetuada com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao atualizar dados','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
	
    
//====================  Funções administração de permissões do tela
    
    // Método -> Inserir usuários da tela
    public function do_insert_user_tela($user_array){
        $this->db->trans_begin();
        if($user_array != NULL):
           $this->db->insert_batch('usuarios_perm_tela', $user_array);
        endif;
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
        }
        else
        {
            $this->db->trans_commit();
        }
    }
    
    // Método -> Pega permissões tela por id
    public function get_perm_tela_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('perm_tela');
        else:
            return FALSE;
        endif;
        
    }

    // Método -> Pega permissões tela por nome
    public function get_perm_tela_bynome($nome=NULL){
        if ($nome != NULL):
            $this->db->where('nome', $nome);
            $this->db->limit(1);
            return $this->db->get('perm_tela');
        else:
            return FALSE;
        endif;
        
    }
    
    // Método -> Pega permissões tela all
    public function get_perm_tela_all(){
        return $this->db->get('perm_tela');
    }
    
    // Método -> Deleta permissões tela
    public function delete_perm_tela($id_tela, $id_usuario){
            
            $this->db->where('tela_id', $id_tela);
            $this->db->where('usuario_id', $id_usuario);
            $this->db->delete('usuarios_perm_tela');
            if ($this->db->affected_rows()>0):
                set_msg('msgok', 'Registro excluído com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao excluir registro','erro');
            endif;  
    }
    
    // Método -> Update permissões tela
    public function update_perm_tela($dados=NULL, $condicao=NULL, $redir=TRUE){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('perm_tela', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Alteração efetuada com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao atualizar dados','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Pega usuários e permissões tela por id da permissão
    public function get_usuarios_perm_tela_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            return $this->db->get('usuarios_perm_tela');
        else:
            return FALSE;
        endif;
        
    }
    
    // Método -> Pega usuários e permissões tela por id da tela
    public function get_tela_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('tela_id', $id);
            return $this->db->get('usuarios_perm_tela');
        else:
            return FALSE;
        endif;
        
    }

    // Método -> Pega usuários e permissões tela por id da tela e id usuário
    public function get_tela_byidtela_idusuario($id_tela=NULL, $id_usuario=NULL){
        if ($id_tela != NULL && $id_usuario != NULL):
            $this->db->where('tela_id', $id_tela);
            $this->db->where('usuario_id', $id_usuario);
            return $this->db->get('usuarios_perm_tela');
        else:
            return FALSE;
        endif;
        
    }


//====================  Funções administração de permissões do cargo    
    
    // Método -> Insert permissões cargo
    public function insert_perm_cargo($dados=NULL, $redir=TRUE){
        if($dados != NULL):
            $this->db->insert('perm_cargo', $dados);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Cadastro efetuado com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao inserir dados','erro');
            endif;  
            
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Update permissões cargo
    public function update_perm_cargo($dados=NULL, $condicao=NULL, $redir=TRUE){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('perm_cargo', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Alteração efetuada com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao atualizar dados','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
    
    // Método -> Deleta permissões cargo
    public function delete_perm_cargo($condicao=NULL, $redir=TRUE){
        if($condicao != NULL && is_array($condicao)):
            $this->db->delete('perm_cargo', $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok', 'Registro excluído com sucesso', 'sucesso');
            else:
                set_msg('msgerro','Erro ao excluir registro','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }
    
    
    // Método -> Pega cargo all
    public function get_perm_cargo_all(){
        return $this->db->get('perm_cargo');
    }    

    // Método -> Pega cargo por id
    public function get_perm_cargo_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('perm_cargo');
        else:
            return FALSE;
        endif;
        
    }
    
    // Método -> Pega cargo por id
    public function get_perm_cargo_bystatus($status=NULL){
        if ($status != NULL):
            $this->db->where('status', $status);
            $this->db->limit(1);
            return $this->db->get('perm_cargo');
        else:
            return FALSE;
        endif;
        
    }
    
    
    
}