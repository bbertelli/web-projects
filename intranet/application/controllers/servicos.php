<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***
 *  Controle Home:
 *      -> carrega sistema
 *      -> método -> inicio -> carrega painel home (barra de titulo, menu inicial, conteudo e rodape)
 */

class Servicos extends CI_Controller {
    
	function __construct() {
		parent::__construct();
		$this->load->library('sistema');
		init_servicos();
	}
	
	public function index(){}

    
//====================  Funções administração de recados

    public function editar_recado(){
        if (esta_logado()):
             if(is_admin() || is_puser()):
                
                $this->form_validation->set_message('max_length', 'O tamanho para o %s foi excedido!');
                $this->form_validation->set_rules('recado','RECADO','required|max_length[240]');
                if($this->form_validation->run()==TRUE):
                    $dados['recado'] = $this->input->post('recado');
                    $this->info->update_recado($dados, array('id'=> '1'));
                    
                endif;
                set_tema('conteudo', load_modulo('telas','editar_recado'));
                load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }
    
    
//====================  Funções administração de agenda

    public function ver_agenda(){
        if (esta_logado()):
            set_tema('footerinc', load_js(array('data-table','table')), FALSE);
            set_tema('conteudo', load_modulo('telas','ver_agenda'));
            load_template();
        else:
            redirect('home');
        endif;
    }
    
    public function cadastro_agenda(){
        if (esta_logado()):
             if(is_admin() || is_puser()):
                 
                $this->form_validation->set_message('max_length', 'O tamanho para o %s foi excedido!');
                $this->form_validation->set_rules('titulo','TITULO','required|ucwords');
                $this->form_validation->set_rules('data','DATA','required');
                $this->form_validation->set_rules('hora','HORA','required');
                $this->form_validation->set_rules('obs','OBSERVAÇÃO','required|max_length[120]');
                if($this->form_validation->run()==TRUE):
                    $dados = elements(array('titulo','hora','obs'), $this->input->post());
                    $dataOriginal = $this->input->post('data');
                    $novaData = converte_data($dataOriginal); 
                    $dados['data'] = $novaData;
                    $this->info->insert_agenda($dados);
                endif;
                    set_tema('conteudo', load_modulo('telas','cadastro_agenda'));
                    load_template();
            else:
                //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;  
    }

    public function gerenciar_agenda(){
            if (esta_logado()):
                 if(is_admin() || is_puser()):
                    set_tema('footerinc', load_js(array('data-table','table')), FALSE);
                    set_tema('conteudo', load_modulo('telas','gerenciar_agenda'));
                    load_template();
                 else:
                     //set_msg('msgerro', 'Usuário não tem permissão','erro');
                     redirect('home');
                 endif;
            else:
                load_template();
            endif;
    }
    
    public function excluir_agenda(){
        if (esta_logado()):
             if(is_admin() || is_puser()):
                $id = $this->uri->segment(3);
                if ($id != NULL):
                    $query = $this->info->get_agenda_byid($id);
                    if($query->num_rows()==1):
                        $query = $query->row();
                        $this->info->delete_agenda(array('id'=>$query->id), FALSE);
                    else:
                        set_msg('msgerro', 'Evento não encontrado para exclusão','erro');
                    endif;
                else:
                    set_msg('msgerro', 'Escolha um evento para excluir','erro');
                endif;
                redirect('servicos/gerenciar_agenda');
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }

    public function editar_agenda(){
        if (esta_logado()):
             if(is_admin() || is_puser()):
                $this->form_validation->set_message('max_length', 'O tamanho para o %s foi excedido!');
                $this->form_validation->set_rules('titulo','TITULO','required|ucwords');
                $this->form_validation->set_rules('data','DATA','required');
                $this->form_validation->set_rules('hora','HORA','required');
                $this->form_validation->set_rules('obs','OBSERVAÇÃO','required|max_length[120]');
                if($this->form_validation->run()==TRUE):
                    $dados = elements(array('titulo','hora','obs'), $this->input->post());
                    $dataOriginal = $this->input->post('data');
                    $novaData = converte_data($dataOriginal); 
                    $dados['data'] = $novaData;
                    $this->info->update_agenda($dados, array('id'=>$this->input->post('id')));
                endif;
                set_tema('conteudo', load_modulo('telas','editar_agenda'));
                load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }

//====================  Envio de OSTI

    public function enviar_osti(){
        $CI =& get_instance();
        
        if (esta_logado()):
                $this->form_validation->set_message('max_length', 'O tamanho para o %s foi excedido!');
                $this->form_validation->set_rules('titulo','TITULO','required|ucwords');
                $this->form_validation->set_rules('des','DESCRIÇÃO','required|max_length[520]');
                $email = $CI->session->userdata('user_email');
                if($this->form_validation->run()==TRUE):
                    $titulo = $this->input->post('titulo');
                    $des = $this->input->post('des');
                    if ($this->sistema->enviar_email_osti($email, $titulo, $des)):
                        set_msg('msgok','OSTI enviada com sucesso!','sucesso');
                        redirect('servicos/enviar_osti');
                    else:
                        set_msg('msgerro','Erro ao enviar OSTI, contate o administrador','erro');
                        redirect('servicos/enviar_osti');
                    endif;
                
                endif;
                set_tema('conteudo', load_modulo('telas','enviar_osti'));
                load_template();
           
        else:
            load_template();
        endif;
    }

}

