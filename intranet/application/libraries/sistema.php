<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* 
 * inicialize o atributos do sistema
 */

class SMB_Sistema {
	
	protected $CI;
	public $tema = array();
    public $primeiro_login = TRUE;
    public $pesq;
	
	function __construct() {
		$this->CI =& get_instance();
		$this->CI->load->helper('functions');
	}
    
    //função de enviar email ao gerar OSTI
    public function enviar_email_osti($solicitante, $titulo, $mensagem, $formato='html'){
        $this->CI->load->library('email');
        $config['mailtype'] = $formato;
        $this->CI->email->initialize($config);
        $this->CI->email->from($solicitante);
        $this->CI->email->to('spiceworks@coppersteel.com.br');
        $this->CI->email->subject($titulo);
        $this->CI->email->message($mensagem);
        if ($this->CI->email->send()):
            return TRUE;
        else:
            return $this->CI->email->print_debugger();
        endif;
        
    }
    
    //função de enviar email ao gerar RECOM
    public function enviar_email_nova_recom($solicitante, $destinatario, $replicar, $titulo, $mensagem, $formato='html'){
        $this->CI->load->library('email');
        $config['mailtype'] = $formato;
        $this->CI->email->initialize($config);
        $this->CI->email->from($solicitante);
        $this->CI->email->to($destinatario);
        $this->CI->email->cc($replicar);
        $this->CI->email->bcc($solicitante);
        $this->CI->email->subject($titulo);
        $this->CI->email->message($mensagem);
        if ($this->CI->email->send()):
            return TRUE;
        else:
            return $this->CI->email->print_debugger();
        endif;
        
    }
    
    function setPesq($pesq_form){
        $this->pesq = "";
        $this->pesq = $pesq_form;
    }
    
    function getPesq(){
        return $this->pesq;
    }
    
}