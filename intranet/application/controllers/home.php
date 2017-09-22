<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***
 *  Controle Home:
 *      -> carrega sistema
 *      -> método -> inicio -> carrega painel home (barra de titulo, menu inicial, conteudo e rodape)
 */

class Home extends CI_Controller {
    
	function __construct() {
		parent::__construct();
		$this->load->library('sistema');
		init_home();
        
	}
	
	public function index(){
		$this->inicio();
	}
	
    // método inicio -> testa se esta logado
	public function inicio(){
		if (esta_logado(FALSE)):
             if(is_admin()):
                    //auditoria('Login no sistema', 'Login efetuado com sucesso');
                    set_tema('menu', load_modulo('menu','admin'));
                    set_tema('conteudo', '<ol class="breadcrumb caminho"><li>'.anchor('home', 'Início').'</li></ol><p>Escolha um menu para iniciar</p>');
                    load_template();
                elseif(is_puser()):
                    //auditoria('Login no sistema', 'Login efetuado com sucesso');
                    set_tema('menu', load_modulo('menu','puser'));
                    set_tema('conteudo', '<ol class="breadcrumb caminho"><li>'.anchor('home', 'Início').'</li></ol><p>Escolha um menu para iniciar</p>');
                    load_template();
                else:
                    //auditoria('Login no sistema', 'Login efetuado com sucesso');
                    set_tema('menu', load_modulo('menu','usuarios'));
                    set_tema('conteudo', '<ol class="breadcrumb caminho"><li>'.anchor('home', 'Início').'</li></ol><p>Escolha um menu para iniciar</p>');
                    load_template();
                endif;
		else:
			load_template();
		endif;
	}
	
	//carregar o módulo usuários e mostrar a tela de login
	public function login(){         
		$this->form_validation->set_rules('usuario','USUÁRIO','trim|required|min_length[4]|strtolower');
		$this->form_validation->set_rules('senha','SENHA','trim|required|min_length[4]|strtolower');
		if($this->form_validation->run()==TRUE):
			$usuario = $this->input->post('usuario', TRUE);
			$senha = md5($this->input->post('senha', TRUE));
			//$redirect = $this->input->post('redirect', TRUE);
			if ($this->usuarios->do_login($usuario, $senha) == TRUE):
				$query = $this->usuarios->get_bylogin($usuario)->row();
				$dados = array(
					'user_id'          => $query->id,
					'user_nome'        => $query->nome,
					'user_email'       => $query->email,
					'user_id_perm_sis' => $query->id_perm_sis,
                    'user_id_dpto'     => $query->id_dpto,
					'user_logado'      => TRUE,
					
				);
				$this->session->set_userdata($dados);
                /* Teste para tipos de menu */
                if(is_admin()):
                    //auditoria('Login no sistema', 'Login efetuado com sucesso');
                    set_tema('menu', load_modulo('menu','admin'));
                    set_tema('conteudo', '<ol class="breadcrumb caminho"><li>'.anchor('home', 'Início').'</li></ol><p>Escolha um menu para iniciar</p>');
                    load_template();
                elseif(is_puser()):
                    //auditoria('Login no sistema', 'Login efetuado com sucesso');
                    set_tema('menu', load_modulo('menu','puser'));
                    set_tema('conteudo', '<ol class="breadcrumb caminho"><li>'.anchor('home', 'Início').'</li></ol><p>Escolha um menu para iniciar</p>');
                    load_template();
                else:
                    //auditoria('Login no sistema', 'Login efetuado com sucesso');
                    set_tema('menu', load_modulo('menu','usuarios'));
                    set_tema('conteudo', '<ol class="breadcrumb caminho"><li>'.anchor('home', 'Início').'</li></ol><p>Escolha um menu para iniciar</p>');
                    load_template();
                endif;                   
                
			else:
				$query = $this->usuarios->get_bylogin($usuario)->row();
				if(empty($query)):
					set_msg('errologin', 'Usuário Inexistente', 'erro');
				elseif($query->senha != $senha):
					set_msg('errologin', 'Senha Incorreta', 'erro');
				elseif($query->ativo == 0):
					set_msg('errologin', 'Este usuário está inativo', 'erro');
				else:
					set_msg('errologin', 'Erro desconhecido, contate o Administrador do sistema', 'erro');
				endif;
                redirect('home/login');					  
            endif; 
        else:
            set_tema('conteudo', load_modulo('conteudo','login'));
            load_template();
        endif;              
        
	}

    //Arrumar problema ao clicar em voltar no navegador
    public function load_login(){
        $CI =& get_instance();
        $CI->load->library('sistema');
        
        if(esta_logado(FALSE)):
            redirect('home');
        else:
            if($CI->sistema->primeiro_login || !esta_logado(FALSE)):
                set_tema('conteudo', load_modulo('conteudo','login'));
                load_template();
                $CI->sistema->primeiro_login = FALSE;
            endif;
        endif;  
    }
    
    // Encerra a sessão do usuário
     public function logoff(){
        auditoria('Logoff no sistema', 'Logoff efetuado com sucesso');
        $this->session->unset_userdata(array('user_id'=>'','user_nome'=>'','user_admin'=>'','user_logado'=>FALSE));    
        $this->session->sess_destroy();
        $this->session->sess_create();
        set_msg('logoffok', 'Logoff efetuado com sucesso', 'sucesso');  
        redirect('home');
    }

}

