<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Usuários Model
 */

class Info_model extends CI_Model {
  
//====================  Funções administração de agenda
    
    // Método -> Inserir na agenda
    public function insert_agenda($dados=NULL, $redir=TRUE){
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
    
    // Método -> Pega agenda por id
    public function get_agenda_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('agenda');
        else:
            return FALSE;
        endif;
        
    }
    
    // Método -> Pega todos os eventos da agenda
    public function get_agenda_all(){
        return $this->db->get('agenda');
    }
    
    // Método -> Pega eventos da agenda que correspondem a 7 dias
    public function get_agenda_week(){
        $dataAtual = date('Ymd');
        $dataFutura  = addDayIntoDate($dataAtual,7);
        $sql = "SELECT titulo, data, hora, obs FROM agenda WHERE data >= ? AND data <= ? ORDER BY data, hora DESC";
        return $this->db->query($sql, array($dataAtual, $dataFutura));
    }
    
    // Método -> Deleta agenda
    public function delete_agenda($condicao=NULL, $redir=TRUE){
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
    
    // Método -> Update agenda
    public function update_agenda($dados=NULL, $condicao=NULL, $redir=TRUE){
        if ($dados != NULL && is_array($condicao)):
            $this->db->update('agenda', $dados, $condicao);
            if ($this->db->affected_rows()>0):
                set_msg('msgok','Alteração efetuada com sucesso','sucesso');
            else:
                set_msg('msgerro','Erro ao atualizar dados','erro');
            endif;  
            if($redir) redirect(current_url());
        endif;
    }



//====================  Funções administração de recados    
    
    // Método -> Update recados
    public function update_recado($dados=NULL, $condicao=NULL, $redir=TRUE){
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
	
}