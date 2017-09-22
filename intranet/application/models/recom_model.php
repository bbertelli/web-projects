<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * Usuários Model
 */

class Recom_model extends CI_Model {
  
//====================  Funções administração de agenda
    
    // Método -> Inserir nova recom
    public function do_insert_recom($recom_array, $msg_recom_array, $itens_array, $redir=TRUE){
        $this->db->trans_begin();
        if($recom_array != NULL && $itens_array != NULL):
           $this->db->insert('recom', $recom_array);
           $this->db->insert('tline_recom', $msg_recom_array);
           $this->db->insert_batch('itens_recom', $itens_array); 
        endif;
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            //set_msg('msgerro','Erro ao inserir dados','erro');
            //if($redir) redirect(current_url());
        }
        else
        {
            $this->db->trans_commit();
            //set_msg('msgok','Cadastro efetuado com sucesso','sucesso');
            //if($redir) redirect(current_url());
        }
    }
    
    // Método -> Update Recom quando gerente
    public function do_update_recom_ger($id_recom=NULL, $sta=NULL, $valor_array=NULL){
        $this->db->trans_begin();
        if (is_array($id_recom) && is_array($sta) && is_array($valor_array)):
            $this->db->update('recom', $sta, $id_recom);
            $this->db->update_batch('itens_recom', $valor_array, 'id');
        endif;
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            set_msg('msgerro','Erro ao vistar Recom','erro');
        }
        else
        {
            $this->db->trans_commit();
            set_msg('msgok','Recom vistada com sucesso','sucesso');
        }
    }
    
    // Método -> Update item individual da recom quando comprador
    public function do_update_item_recom($id_item=NULL, $dados=NULL){
        $this->db->trans_begin();
        if ($id_item != NULL && is_array($dados)):
            $this->db->where('id', $id_item);
            $this->db->update('itens_recom', $dados);
        endif;
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else{$this->db->trans_commit();}
    }
    
    // Método -> Update item individual da recom quando comprador
    public function do_update_pedido_item_recom($id_item=NULL, $dados=NULL){
        $this->db->trans_begin();
        if ($id_item != NULL && is_array($dados)):
            $this->db->where('id', $id_item);
            $this->db->update('itens_recom', $dados);
        endif;
        if ($this->db->trans_status() === FALSE)
        {
            $this->db->trans_rollback();
            set_msg('msgerro','Erro ao alterar Pedido','erro');
        }
        else
        {
            $this->db->trans_commit();
            set_msg('msgok','Pedido alterado com sucesso','sucesso');
        }
    }
    
    // Método -> Update recom quando comprador
    public function do_update_recom_com($sta=NULL, $id_recom=NULL){
        $this->db->trans_begin();
        if (is_array($sta) && is_array($id_recom)):            
                $this->db->update('recom', $sta, $id_recom);
        endif;
        if ($this->db->trans_status() === FALSE)
            {$this->db->trans_rollback();}
        else{$this->db->trans_commit();}
    }

    // Método -> Contador dos itens vistados
    public function get_itens_count($sta, $id_recom){
       $sql = 'SELECT COUNT(id) as contador FROM itens_recom WHERE sta = ? AND id_recom = ?';
       return $this->db->query($sql, array($sta,$id_recom));
    }
    
    // Método -> Contador dos itens vistados
    public function get_itens_count_rec($id_recom){
       $sql = 'SELECT COUNT(id) as contador FROM itens_recom WHERE sta <= 4 AND id_recom = ?';
       return $this->db->query($sql, $id_recom);
    }
    
    // Método -> Pega ultima recom por id
    public function get_recom_lastid(){
       return $this->db->query('SELECT MAX(id) as id FROM recom;');
    }
    
    // Método -> Pega recom por id
    public function get_recom_byid($id=NULL){
        if ($id != NULL):
            $this->db->where('id', $id);
            $this->db->limit(1);
            return $this->db->get('recom');
        else:
            return FALSE;
        endif;
        
    }
    
    // Método -> Pega todas as recoms abertas para gerentes
    public function get_recom_open_bygerid($id_usuario){
        $sql = "SELECT id, user_id, data, sta FROM recom WHERE sta >= 0 AND sta < 1 AND ger_id = ?";
        return $this->db->query($sql, array($id_usuario));   
    }
    
    // Método -> Pega todas as recoms aprovadas
    public function get_recom_open_aprovadas(){
        $sql = "SELECT id, user_id, data, sta FROM recom WHERE sta >= 1 AND sta < 4";
        return $this->db->query($sql);   
    }
    
    // Método -> Pega todas as recoms compradas e recebidas
    public function get_recom_open_compradas_recebidas(){
        $sql = "SELECT id, user_id, data, sta FROM recom WHERE sta >= 2 AND sta <= 4";
        return $this->db->query($sql);   
    }
    
    // Método -> Pega todas as recoms abertas
    public function get_recom_open_bydpto($id_dpto){
        $sql = "SELECT id, user_id, data, sta FROM recom WHERE sta >= 0 AND sta < 4 AND user_id_dpto = ?";
        return $this->db->query($sql, array($id_dpto));   
    }
    
    // Método -> Pega itens de recom por palavra chave pesquisada
    public function get_itens_bykey($key){
        if ($key != NULL):
            $this->db->like('id_recom', $key); 
            $this->db->limit(50);
            return $this->db->get('itens_recom');
        else:
            return FALSE;
        endif;
    }
    
    // Método -> Pega itens de recom por id
    public function get_itens_byid($id){
        if ($id != NULL):
            $this->db->where('id_recom', $id); 
            return $this->db->get('itens_recom');
        else:
            return FALSE;
        endif;
    }
    
    // Método -> Pega itens de recom por id
    public function get_msg_byid($id){
        if ($id != NULL):
            $this->db->where('recom_id', $id);
            $this->db->order_by('data','desc');
            $this->db->order_by('hora','desc'); 
            return $this->db->get('tline_recom');
        else:
            return FALSE;
        endif;
    }
	
}