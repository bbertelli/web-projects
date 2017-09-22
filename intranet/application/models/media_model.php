<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Media_model extends CI_Model {
	
	public function do_insert($dados=NULL, $redir=TRUE){
		if($dados != NULL):
			$this->db->insert('media', $dados);
			if ($this->db->affected_rows()>0):
				set_msg('msgok','Cadastro efetuado com sucesso','sucesso');
			else:
				set_msg('msgerro','Erro ao inserir dados','erro');
			endif;	
			
			if($redir) redirect(current_url());
		endif;
	}
	
	public function do_upload($campo){
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if($this->upload->do_upload($campo)):
			return $this->upload->data();
		else:
			return $this->upload->display_errors();
		endif;
	}
	
}