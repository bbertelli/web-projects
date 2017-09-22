<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***
 *  Controle Usuários:
 *      -> se esta logado 
 *      -> método -> inicio -> carrega painel gerenciamento
 *      -> login, logoff -> cadastrar, excluir, editar, alterar senha, nova senha e gerenciar
 */

class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('sistema');
		init_admin();
	}
    
    public function index(){}
	
	
//====================  Funções administração de usuários
	
	public function cadastro_usuario(){
		if (esta_logado()):
             if(is_admin()):
        		$this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
        		$this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s');
                $this->form_validation->set_message('is_natural_no_zero', 'Escolha uma opção para o %s');
        		$this->form_validation->set_rules('nome','NOME','trim|required|ucwords');
        		$this->form_validation->set_rules('email','E-MAIL','trim|required|valid_email|is_unique[usuarios.email]|strtolower');
        		$this->form_validation->set_rules('login','LOGIN','trim|required|min_length[4]|is_unique[usuarios.login]|strtolower');
        		$this->form_validation->set_rules('senha','SENHA','trim|required|min_length[4]|strtolower');
        		$this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|min_length[4]|strtolower|matches[senha]');
                $this->form_validation->set_rules('id_dpto','DEPARTAMENTO','required|is_natural_no_zero');
                $this->form_validation->set_rules('id_perm_sis','PERMISSÃO SISTEMA','required|is_natural_no_zero');
                $this->form_validation->set_rules('id_perm_cargo','FUNÇÃO','required|is_natural_no_zero');
        		if($this->form_validation->run()==TRUE):
        			$dados = elements(array('nome','email','login','id_dpto','id_perm_cargo','id_perm_sis'), $this->input->post());
        			$dados['senha'] = md5($this->input->post('senha'));		
        			$this->usuarios->do_insert($dados);
        		endif;
        		set_tema('conteudo', load_modulo('telas','cadastro_usuario'));
        		load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;	
	}

	public function gerenciar_usuario(){
        if (esta_logado()):
             if(is_admin()):
                set_tema('footerinc', load_js(array('data-table','table')), FALSE);
                set_tema('conteudo', load_modulo('telas','gerenciar_usuario'));
                load_template();
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
	}
	
	public function alterar_senha(){
        if (esta_logado()):
             if(is_admin()):
        		$this->form_validation->set_message('matches', 'O campo %s está diferente do campo %s');
        		$this->form_validation->set_rules('senha','SENHA','trim|required|min_length[4]|strtolower');
        		$this->form_validation->set_rules('senha2','REPITA A SENHA','trim|required|min_length[4]|strtolower|matches[senha]');
        		if($this->form_validation->run()==TRUE):
        			$dados['senha'] = md5($this->input->post('senha'));
        			$this->usuarios->do_update($dados, array('id'=>$this->input->post('idusuario')));
        		endif;
        		set_tema('conteudo', load_modulo('telas','alterar_senha'));
        		load_template();
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
	}
	
	public function editar(){
		if (esta_logado()):
             if(is_admin()):
                $this->form_validation->set_message('is_natural_no_zero', 'Escolha uma opção para o %s');
                $this->form_validation->set_rules('nome','NOME','trim|required|ucwords');
                $this->form_validation->set_rules('id_dpto','DEPARTAMENTO','required|is_natural_no_zero');
                $this->form_validation->set_rules('id_perm_sis','PERMISSÃO SISTEMA','required|is_natural_no_zero');
                $this->form_validation->set_rules('id_perm_cargo','FUNÇÃO','required|is_natural_no_zero');
        		if($this->form_validation->run()==TRUE):
        			$dados['nome']          = $this->input->post('nome');
        			$dados['ativo']         = $this->input->post('ativo'); 
                    $dados['id_dpto']       = $this->input->post('id_dpto');    
                    $dados['id_perm_cargo'] = $this->input->post('id_perm_cargo');                                                   
        			$dados['id_perm_sis']   = $this->input->post('id_perm_sis');
        			$this->usuarios->do_update($dados, array('id'=>$this->input->post('idusuario')));
                    
        		endif;
        		set_tema('conteudo', load_modulo('telas','editar'));
        		load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
	}
	
	public function excluir(){
		if (esta_logado()):
             if(is_admin()):
    			$iduser = $this->uri->segment(3);
    			if ($iduser != NULL):
    				$query = $this->usuarios->get_byid($iduser);
    				if($query->num_rows()==1):
    					$query = $query->row();
    					if($query->id != 1):
                            $dados['ativo'] = 0;                   
                            $this->usuarios->desativar($dados, array('id'=>$query->id));
    					else:
    						set_msg('msgerro', 'Este usuário não pode ser exluído','erro');
    					endif;
    				else:
    					set_msg('msgerro', 'Usuário não encontrado para exclusão','erro');
    				endif;
    			else:
    				set_msg('msgerro', 'Escolha um usuário para excluir','erro');
    			endif;
        		redirect('admin/gerenciar_usuario');
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
	}
        
    
//====================  Funções administração de departamento

    public function cadastro_departamento(){
            if (esta_logado()):
                 if(is_admin()):
                    $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
                    $this->form_validation->set_rules('nome','NOME','trim|required|ucwords|is_unique[dpto.nome]');
                    $this->form_validation->set_rules('status','STATUS','trim|required|strtolower|is_unique[dpto.status]');
                    if($this->form_validation->run()==TRUE):
                        $dados = elements(array('nome','status'), $this->input->post());                      
                        $this->dpto->insert_dpto($dados);
                    endif;
                     set_tema('conteudo', load_modulo('telas','cadastro_departamento'));
                     load_template();
                else:
                    //set_msg('msgerro', 'Usuário não tem permissão','erro');
                    redirect('home');
                 endif;
            else:
                load_template();
            endif;  
        }
    
    public function gerenciar_departamento(){
            if (esta_logado()):
                 if(is_admin()):
                    set_tema('footerinc', load_js(array('data-table','table')), FALSE);
                    set_tema('conteudo', load_modulo('telas','gerenciar_departamento'));
                    load_template();
                 else:
                     //set_msg('msgerro', 'Usuário não tem permissão','erro');
                     redirect('home');
                 endif;
            else:
                load_template();
            endif;
    }
    
    public function excluir_departamento(){
        if (esta_logado()):
             if(is_admin()):
                $id_dpto = $this->uri->segment(3);
                if ($id_dpto != NULL):
                    $query = $this->dpto->get_dpto_byid($id_dpto);
                    if($query->num_rows()==1):
                        $query = $query->row();
                        // teste de dependencia na base de dados
                        if($this->usuarios->get_byid_rel($id_dpto,'id_dpto','usuarios')->num_rows()==1):
                            set_msg('msgerro', 'Departamento não pode ser excluído, existe um usuário neste departamento!','erro');
                        else:
                            $this->dpto->delete_dpto(array('id'=>$query->id), FALSE);
                        endif;
                        // fim do teste
                    else:
                        set_msg('msgerro', 'Departamento não encontrado para exclusão','erro');
                    endif;
                else:
                    set_msg('msgerro', 'Escolha um departamento para excluir','erro');
                endif;
                redirect('admin/gerenciar_departamento');
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }

    public function editar_departamento(){
        if (esta_logado()):
             if(is_admin()):
                $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
                $this->form_validation->set_rules('nome','NOME','trim|required|ucwords|is_unique[dpto.nome]');
                $this->form_validation->set_rules('status','STATUS','trim|required|strtolower|is_unique[dpto.status]');
                if($this->form_validation->run()==TRUE):
                    $dados['nome']    = $this->input->post('nome');
                    $dados['status']   = $this->input->post('status');                   
                    $this->dpto->update_dpto($dados, array('id'=>$this->input->post('id_dpto')));
                    
                endif;
                set_tema('conteudo', load_modulo('telas','editar_departamento'));
                load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }


//====================  Funções administração de permissões

    public function cadastro_permissoes(){
            if (esta_logado()):
                 if(is_admin()):
                    $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
                    $this->form_validation->set_rules('nome','NOME','trim|required|ucwords|is_unique[perm_sis.nome]');
                    $this->form_validation->set_rules('status','STATUS','trim|required|strtolower|is_unique[perm_sis.status]');
                    if($this->form_validation->run()==TRUE):
                        $dados = elements(array('nome','status'), $this->input->post());                      
                        $this->perm->insert_perm_sis($dados);
                    endif;
                     set_tema('conteudo', load_modulo('telas','cadastro_permissoes'));
                     load_template();
                else:
                    //set_msg('msgerro', 'Usuário não tem permissão','erro');
                    redirect('home');
                 endif;
            else:
                load_template();
            endif;  
        }
    
    public function gerenciar_permissoes(){
            if (esta_logado()):
                 if(is_admin()):
                    set_tema('footerinc', load_js(array('data-table','table')), FALSE);
                    set_tema('conteudo', load_modulo('telas','gerenciar_permissoes'));
                    load_template();
                 else:
                     //set_msg('msgerro', 'Usuário não tem permissão','erro');
                     redirect('home');
                 endif;
            else:
                load_template();
            endif;
    }
    
    public function excluir_permissoes(){
        if (esta_logado()):
             if(is_admin()):
                $id_perm = $this->uri->segment(3);
                if ($id_perm != NULL):
                    $query = $this->perm->get_perm_sis_byid($id_perm);
                    if($query->num_rows()==1):
                        $query = $query->row();
                        // teste de dependencia na base de dados
                        if($this->usuarios->get_byid_rel($id_perm,'id_perm_sis','usuarios')->num_rows()==1):
                            set_msg('msgerro', 'Permissão não pode ser excluída, existe um usuário com esta permissão!','erro');
                        else:
                            $this->perm->delete_perm_sis(array('id'=>$query->id), FALSE);
                        endif;
                        // fim do teste
                    else:
                        set_msg('msgerro', 'Permissão não encontrada para exclusão','erro');
                    endif;
                else:
                    set_msg('msgerro', 'Escolha uma permissão para excluir','erro');
                endif;
                redirect('admin/gerenciar_permissoes');
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }

    public function editar_permissoes(){
        if (esta_logado()):
             if(is_admin()):
                $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
                $this->form_validation->set_rules('nome','NOME','trim|required|ucwords|is_unique[perm_sis.nome]');
                $this->form_validation->set_rules('status','STATUS','trim|required|strtolower|is_unique[perm_sis.status]');
                if($this->form_validation->run()==TRUE):
                    $dados['nome']    = $this->input->post('nome');
                    $dados['status']  = $this->input->post('status');
                    $this->perm->update_perm_sis($dados, array('id'=>$this->input->post('id_perm_sis')));
                    
                endif;
                set_tema('conteudo', load_modulo('telas','editar_permissoes'));
                load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }
    
    
    
//====================  Funções administração de permissões do tela

    public function cadastro_permissoes_tela(){
            if (esta_logado()):
                 if(is_admin()):
                    $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
                    $this->form_validation->set_rules('nome','NOME','trim|required|strtolower|is_unique[perm_tela.nome]');
                    if($this->form_validation->run()==TRUE):
                        $dados = elements(array('nome','ativo'), $this->input->post());                      
                        $this->perm->insert_perm_tela($dados);
                    endif;
                     set_tema('conteudo', load_modulo('telas','cadastro_permissoes_tela'));
                     load_template();
                else:
                    //set_msg('msgerro', 'Usuário não tem permissão','erro');
                    redirect('home');
                 endif;
            else:
                load_template();
            endif;  
        }
    
    public function gerenciar_permissoes_tela(){
            if (esta_logado()):
                 if(is_admin()):
                    set_tema('footerinc', load_js(array('data-table','table')), FALSE);
                    set_tema('conteudo', load_modulo('telas','gerenciar_permissoes_tela'));
                    load_template();
                 else:
                     //set_msg('msgerro', 'Usuário não tem permissão','erro');
                     redirect('home');
                 endif;
            else:
                load_template();
            endif;
    }
    
    public function excluir_permissoes_tela(){
        if (esta_logado()):
             if(is_admin()):
                $id_tela = $this->uri->segment(3);
                $id_usuario = $this->uri->segment(4);
                if ($id_tela != NULL && $id_usuario != NULL):
                    $this->perm->delete_perm_tela($id_tela,$id_usuario);                       
                else:
                    set_msg('msgerro', 'Escolha um usuário para remover','erro');
                endif;
                redirect('admin/editar_permissoes_tela/'.$id_tela);
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }

    public function editar_permissoes_tela(){
        if (esta_logado()):
             if(is_admin()):
                set_tema('conteudo', load_modulo('telas','editar_permissoes_tela'));
                load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }
    
    public function adicionar_usuarios_tela(){
        if (esta_logado()):
             if(is_admin()):
                set_tema('footerinc', load_js(array('data-table','table')), FALSE);
                set_tema('conteudo', load_modulo('telas','adicionar_usuarios_tela'));
                load_template();
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }
    
    public function adicionar_usuario(){
        if (esta_logado()):
             if(is_admin()):
                $nlinha = $this->input->post('nlinha');
                $id_tela = $this->input->post('id_tela');
                $user_hidden_array = $this->input->post('user_array');
                $user_json_array = json_decode(str_replace('\\', '', $user_hidden_array));
                
                for ($i=0; $i < $nlinha; $i++) {
                    $user_array[] = array(
                        'tela_id'    => $user_json_array[$i][0],
                        'usuario_id' => $user_json_array[$i][1],
                        'perm'       => $user_json_array[$i][2]);
                }
                
                $this->perm->do_insert_user_tela($user_array);
                 redirect('admin/editar_permissoes_tela/'.$id_tela);
                //set_tema('conteudo', load_modulo('telas','editar_permissoes_tela/'));
                //load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }


//====================  Funções administração de cargo

    public function cadastro_funcao(){
            if (esta_logado()):
                 if(is_admin()):
                    $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
                    $this->form_validation->set_rules('nome','NOME','trim|required|ucwords|is_unique[perm_cargo.nome]');
                    $this->form_validation->set_rules('status','STATUS','trim|required|strtolower|is_unique[perm_cargo.status]');
                    if($this->form_validation->run()==TRUE):
                        $dados = elements(array('nome','status'), $this->input->post());                      
                        $this->perm->insert_perm_cargo($dados);
                    endif;
                     set_tema('conteudo', load_modulo('telas','cadastro_funcao'));
                     load_template();
                else:
                    //set_msg('msgerro', 'Usuário não tem permissão','erro');
                    redirect('home');
                 endif;
            else:
                load_template();
            endif;  
        }
    
    public function gerenciar_funcao(){
            if (esta_logado()):
                 if(is_admin()):
                    set_tema('footerinc', load_js(array('data-table','table')), FALSE);
                    set_tema('conteudo', load_modulo('telas','gerenciar_funcao'));
                    load_template();
                 else:
                     //set_msg('msgerro', 'Usuário não tem permissão','erro');
                     redirect('home');
                 endif;
            else:
                load_template();
            endif;
    }
    
    public function excluir_funcao(){
        if (esta_logado()):
             if(is_admin()):
                $id_perm = $this->uri->segment(3);
                if ($id_perm != NULL):
                    $query = $this->perm->get_perm_cargo_byid($id_perm);
                    if($query->num_rows()==1):
                        $query = $query->row();
                        // teste de dependencia na base de dados
                        if($this->usuarios->get_byid_rel($id_perm,'id_perm_cargo','usuarios')->num_rows()==1):
                            set_msg('msgerro', 'Permissão não pode ser excluída, existe um usuário com esta permissão!','erro');
                        else:
                            $this->perm->delete_perm_cargo(array('id'=>$query->id), FALSE);
                        endif;
                        // fim do teste
                    else:
                        set_msg('msgerro', 'Permissão não encontrada para exclusão','erro');
                    endif;
                else:
                    set_msg('msgerro', 'Escolha uma permissão para excluir','erro');
                endif;
                redirect('admin/gerenciar_funcao');
             else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }

    public function editar_funcao(){
        if (esta_logado()):
             if(is_admin()):
                $this->form_validation->set_message('is_unique', 'Este %s já está cadastrado no sistema');
                $this->form_validation->set_rules('nome','NOME','trim|required|ucwords|is_unique[perm_cargo.nome]');
                $this->form_validation->set_rules('status','STATUS','trim|required|strtolower|is_unique[perm_cargo.status]');
                if($this->form_validation->run()==TRUE):
                    $dados['nome']    = $this->input->post('nome');
                    $dados['status']  = $this->input->post('status');
                    $this->perm->update_perm_cargo($dados, array('id'=>$this->input->post('id_perm_cargo')));
                    
                endif;
                set_tema('conteudo', load_modulo('telas','editar_funcao'));
                load_template();
            else:
                 //set_msg('msgerro', 'Usuário não tem permissão','erro');
                 redirect('home');
             endif;
        else:
            load_template();
        endif;
    }
    
}