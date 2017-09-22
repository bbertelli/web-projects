<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***
 *  Helper Functions:
 *      -> carrega sistema, módulos de tela, cabeçalho, rodape, conteudo  
 *         carga de css, js, breadcrumb, msg
 *         
 */
 
	//carrega um módulo do sistema devolvendo a tela solicitada
	function load_modulo($modulo=NULL, $tela=NULL, $diretorio='painel'){
		$CI =& get_instance();
		if ($modulo !=NULL):
			return $CI->load->view("$diretorio/$modulo", array('tela'=>$tela), TRUE);
		else:
			return FALSE;
		endif;
	}
			
	//seta valores ao array $tema da classe sistema
	function set_tema($prop, $valor, $replace=TRUE){
		$CI =& get_instance();
		$CI->load->library('sistema');
		if ($replace):
			$CI->sistema->tema[$prop] = $valor;
		else:
			if (!isset($CI->sistema->tema[$prop])) $CI->sistema->tema[$prop] = '';
			$CI->sistema->tema[$prop] .= $valor;
		endif;
	}
	
	//retorna os valores do array $tema da classe sistema
	function get_tema(){
		$CI =& get_instance();
		$CI->load->library('sistema');
		return $CI->sistema->tema;
	}
	
    //inicialize o painel home carregando tela inicial
	function init_home(){
	    carrega_parametros_home(); 		
		set_tema('titulo_padrao', 'SISTEMA INTRANET');
		set_tema('menu', load_modulo('menu','home'));
		set_tema('conteudo', load_modulo('conteudo','home'));
		set_tema('template', 'home_view');
	}

    //inicialize o painel admin
    function init_admin(){
        carrega_parametros();         
        set_tema('titulo_padrao', 'SISTEMA INTRANET');
        set_tema('menu', load_modulo('menu','admin'));
        set_tema('conteudo', '<ol class="breadcrumb caminho">'.breadcrumb().'</ol><p>Escolha um menu para iniciar</p>');
        set_tema('template', 'home_view');
    }
    
    //inicializa tela serviços com menu em função do usuário
    function init_servicos(){
        carrega_parametros();
        set_tema('titulo_padrao', 'SISTEMA INTRANET');
        if(is_admin()):
            set_tema('menu', load_modulo('menu','admin'));
            set_tema('conteudo', '<ol class="breadcrumb caminho">'.breadcrumb().'</ol><p>Escolha um menu para iniciar</p>');
            set_tema('template', 'home_view');
        elseif(is_puser()):
            set_tema('menu', load_modulo('menu','puser'));
            set_tema('conteudo', '<ol class="breadcrumb caminho">'.breadcrumb().'</ol><p>Escolha um menu para iniciar</p>');
            set_tema('template', 'home_view');
        else:
            set_tema('menu', load_modulo('menu','usuarios'));
            set_tema('conteudo', '<ol class="breadcrumb caminho">'.breadcrumb().'</ol><p>Escolha um menu para iniciar</p>');
            set_tema('template', 'home_view');
        endif;
    }
	
	//carrega um template passando o array $tema como parâmetro
	function load_template(){
		$CI =& get_instance();
		$CI->load->library('sistema');
		$CI->parser->parse($CI->sistema->tema['template'], get_tema());
	}
	
	//carregar arquivos .css de uma pasta
	function load_css($arquivo=NULL, $pasta='assets/css', $media='all'){
		if($arquivo != NULL):
			$CI =& get_instance();
			$CI->load->helper('url');
			$retorno = '';
			if (is_array($arquivo)):
				foreach ($arquivo as $css):
					$retorno .= '<link rel="stylesheet" type"text/css" href="'.base_url("$pasta/$css").'" media="'.$media.'" />';
				endforeach;
			else:
				$retorno .= '<link rel="stylesheet" type"text/css" href="'.base_url("$pasta/$arquivo").'" media="'.$media.'" />';
			endif;
		endif;
		return $retorno;
	}
	
	//carregar arquivos .js de uma pasta
	function load_js($arquivo=NULL, $pasta='assets/js', $remoto=FALSE){
		if($arquivo != NULL):
			$CI =& get_instance();
			$CI->load->helper('url');
			$retorno = '';
			if (is_array($arquivo)):
				foreach ($arquivo as $js):
					if ($remoto):
						$retorno .= '<script type="text/javascript" src="'.$js.'"></script>';
					else:
						$retorno .= '<script type="text/javascript" src="'.base_url("$pasta/$js.js").'"></script>';
					endif;
				endforeach;
			else:
				if ($remoto):
					$retorno .= '<script type="text/javascript" src="'.$arquivo.'"></script>';
				else:
					$retorno .= '<script type="text/javascript" src="'.base_url("$pasta/$arquivo.js").'"></script>';
				endif;
			endif;
		endif;
		return $retorno;
	}

	//mostra erros de validação em forms
	function erros_validacao(){
		if(validation_errors()) echo '<div class="alert alert-danger" role="alert">'.validation_errors('<p>','</p>').'</div>';
	}
	
	//verifica se o usuário está logado no sistema
	function esta_logado($redir=TRUE){
		$CI =& get_instance();
		$CI->load->library('session');
		$user_status = $CI->session->userdata('user_logado');
		if (!isset($user_status) || $user_status != TRUE):
			if($redir):
				$CI->session->set_userdata(array('redir_para'=>current_url()));
				set_msg('errologin','Acesso restrito, faça login antes de prosseguir!','erro');
				redirect('home');
			else:
				return FALSE;
			endif;
		else:
			return TRUE;
		endif;
		
	}
	
	//define uma mensagem para ser exibida na próxima tela carregada
	function set_msg($id='msgerro', $msg=NULL, $tipo='erro'){
		$CI =& get_instance();
		switch ($tipo):
			case 'erro':
				$CI->session->set_flashdata($id, '<div class="alert alert-danger alerta" role="alert"><p>'.$msg.'</p></div>');
				break;
			case 'sucesso':
				$CI->session->set_flashdata($id, '<div class="alert alert-success alerta" role="alert"><p>'.$msg.'</p></div>');
				break;
			default:
				$CI->session->set_flashdata($id, '<div class="alert alert-info alerta" role="alert"><p>'.$msg.'</p></div>');
				break;
		endswitch;
	}
	
	//verifica se existe uma mensagem para ser exibida na tela atual
	function get_msg($id, $printar=TRUE){
		$CI =& get_instance();
		if ($CI->session->flashdata($id)):
			if($printar):
				echo $CI->session->flashdata($id);
				//$CI->session->sess_destroy();
				return TRUE;
			else:
				return $CI->session->flashdata($id);
			endif;			
		endif;
		return FALSE;
		
	}
	
	//verifica se o usuário é administrador
	function is_admin($set_msg=FALSE){
		$CI =& get_instance();
		$id_perm_sis = $CI->session->userdata('user_id_perm_sis');
        $query = $CI->perm->get_perm_sis_byid($id_perm_sis)->row();
        $status_usu = $query->status;
        if($status_usu == 'adm'):
            return TRUE;
        else:
            if($set_msg) set_msg('msgerro', 'Seu usuário não tem permissão para executar esta operação','erro');
            return FALSE;
        endif;	
	}
	
	//verifica se o usuário é poweruser
    function is_puser($set_msg=FALSE){
        $CI =& get_instance();
        $id_perm_sis = $CI->session->userdata('user_id_perm_sis');
        $query = $CI->perm->get_perm_sis_byid($id_perm_sis)->row();
        $status_usu = $query->status;
        if($status_usu == 'sup'):
            return TRUE;
        else:
            if($set_msg) set_msg('msgerro', 'Seu usuário não tem permissão para executar esta operação','erro');
            return FALSE;
        endif;  
    }
	
	//verifica o departamento do usuário
    function get_dpto(){
        $CI =& get_instance();
        $id_dpto = $CI->session->userdata('user_iddpto');
        $query = $CI->dpto->get_dpto_byid($id_dpto)->row();
        $status_dpto = $query->status;
        return $status_dpto;      
    }

	//gera um breadcrumb com base no controller atual
	function breadcrumb(){
		$CI =& get_instance();
		$CI->load->helper('url');
		$classe = ucfirst($CI->router->class);
		if($classe == 'Painel'):
			$classe = anchor($CI->router->class, 'Início');
		else:
			$classe = anchor($CI->router->class, $classe);
		endif;
		$metodo = ucwords(str_replace('_', ' ', $CI->router->method));
		if($metodo && $metodo != 'Index'):
			$metodo = "<li>".anchor($CI->router->class."/".$CI->router->method, $metodo)."</li>";
		else:
			$metodo = '';
		endif;
		return '<li>'.anchor('home', 'Início').'</li>'.'<li>'.$classe.$metodo.'</li>';
	}
   
   //carrega parâmetros do sistema 
   function carrega_parametros(){
        $CI =& get_instance();
        $CI->load->library(array('sistema','session','form_validation'));
        $CI->load->helper(array('form','url','array','text'));
        //carregamento dos models
        $CI->load->model('usuarios_model','usuarios');
        $CI->load->model('home_model','home');
        $CI->load->model('dpto_model','dpto');
        $CI->load->model('info_model','info');
        $CI->load->model('perm_model','perm');
        $CI->load->model('recom_model','recom');
        set_tema('headerinc', load_css(array('bootstrap.min.css','dataTables.bootstrap.css','jquery.dataTables.min.css','bootstrap-responsive.min.css','app.css','bootstrap-theme.min.css','bootstrap-datetimepicker.min.css','font-awesome.min.css')), FALSE);
        set_tema('headerinc', load_js(array(
            'jquery.min',
            'jquery.dataTables.min',
            'dataTables.bootstrap',
            'table',
            'bootstrap.min',
            'bootstrap-datetimepicker.min',
            'bootstrap-datetimepicker.pt-BR',
            'bootbox.min',
            'app',
            )), FALSE);
        set_tema('footerinc', '');
    }
   
   //carrega parâmetros do sistema 
   function carrega_parametros_home(){
        $CI =& get_instance();
        $CI->load->library(array('sistema','session','form_validation'));
        $CI->load->helper(array('form','url','array','text'));
        //carregamento dos models
        $CI->load->model('usuarios_model','usuarios');
        $CI->load->model('home_model','home');
        $CI->load->model('dpto_model','dpto');
        $CI->load->model('info_model','info');
        $CI->load->model('perm_model','perm');
        $CI->load->model('recom_model','recom');
        set_tema('headerinc', load_css(array('bootstrap.min.css','dataTables.bootstrap.css','jquery.dataTables.min.css','bootstrap-responsive.min.css','app.css','bootstrap-theme.min.css','bootstrap-datetimepicker.min.css','font-awesome.min.css')), FALSE);
        set_tema('headerinc', load_js(array(
            'jquery.min',
            'jquery.dataTables.min',
            'dataTables.bootstrap',
            'bootstrap.min',
            'bootstrap-datetimepicker.min',
            'bootstrap-datetimepicker.pt-BR',
            )), FALSE);
        set_tema('footerinc', '');
    }
	
	//seta um registro na tabela de auditoria
	function auditoria($operacao, $obs, $query=TRUE){
		$CI =& get_instance();
		$CI->load->library('session');
		$CI->load->model('auditoria_model', 'auditoria');
		if(esta_logado(FALSE)):
			$user_id = $CI->session->userdata('user_id');
			$user_login = $CI->usuarios->get_byid($user_id)->row()->login;
		else:
			$user_login = 'Desconhecido';
		endif;
		if($query):
			$last_query = $CI->db->last_query();
		else:
			$last_query = '';
		endif;
		$dados = array(
			'usuario'	=>$user_login,
			'operacao' 	=>$operacao,
			'query'		=>$last_query,
			'observacao'=>$obs,
		);
		$CI->auditoria->do_insert($dados);
	}
    
    // Converte BR dd-mm-yyyy para yyyy-mm-dd (BR -> EN)
    function converte_data($y){
        $data_inverter = explode("/",$y);
        $x = $data_inverter[2].'-'. $data_inverter[1].'-'. $data_inverter[0];
        return $x;
    }

    // Converte EN yyyy-mm-dd para dd-mm-yyyy (EN -> BR)
    function converte_data_br($y){
        $data_inverter = explode("-",$y);
        $x = $data_inverter[2].'/'. $data_inverter[1].'/'. $data_inverter[0];
        return $x;
    }

    // Cálculo de diferença de datas
    function diffDate($d1, $d2){
        $ret = intval((strtotime($d1) - strtotime($d2))/86400);
        return $ret;
    }
    
    // Adiciona dias à data atual
    function addDayIntoDate($date,$days) {
                 $thisyear  = substr ( $date, 0, 4 );
                 $thismonth = substr ( $date, 4, 2 );
                 $thisday   = substr ( $date, 6, 2 );
                 $nextdate  = mktime ( 0, 0, 0, $thismonth, $thisday + $days, $thisyear );
                 return strftime("%Y%m%d", $nextdate);
    }
    
    // Subtrai dias à data atual
    function subDayIntoDate($date,$days) {
         $thisyear  = substr ( $date, 0, 4 );
         $thismonth = substr ( $date, 4, 2 );
         $thisday   = substr ( $date, 6, 2 );
         $nextdate  = mktime ( 0, 0, 0, $thismonth, $thisday - $days, $thisyear );
         return strftime("%Y%m%d", $nextdate);
    }
	