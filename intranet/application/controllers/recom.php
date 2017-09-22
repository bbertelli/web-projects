<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/***
 *  Controle Home:
 *      -> carrega sistema
 *      -> método -> inicio -> carrega painel home (barra de titulo, menu inicial, conteudo e rodape)
 */

class Recom extends CI_Controller {
    
	function __construct() {
		parent::__construct();
		$this->load->library('sistema');
		init_servicos();
	}
	
	public function index(){}

    
    //====================  Funções de RECOM

    public function nova(){
        if (esta_logado()):
            $numLinha = $this->input->post('linha');
            $validado = $this->input->post('validado');
            $id_ger = $this->input->post('id_ger');
            $id_sup = $this->input->post('id_sup');
            $nome_req = $this->session->userdata('user_nome');
            $email_req = $this->session->userdata('user_email');
            
            if($validado == 1):
                $query_info_ger = $this->usuarios->get_byid($id_ger)->row();
                $nome_ger_dest  = $query_info_ger->nome;
                $email_ger_dest = $query_info_ger->email;
                
                $query_info_sup = $this->usuarios->get_byid($id_sup)->row();
                $email_sup_dest = $query_info_sup->email;
                
                $query_num_recom = $this->recom->get_recom_lastid()->row();
                $num_recom = $query_num_recom->id;
                $num_recom = $num_recom + 1;
                
                if($num_recom != null || $num_recom != ''){
                                      
                    $sta = 0;
                    $titulo = "e-Doc :: RECOM - ".$num_recom;
                    $user_id = $this->input->post('user_id');
                    $user_id_dpto = $this->input->post('user_id_dpto');
                    $msg = $this->input->post('msg');
                    
                    // dados do sistema
                    $hora = date("H:i:s");
                    $data = date("Y/m/d");
                    $ip   = $_SERVER['REMOTE_ADDR']; 
                    
                    $recom_array = array(
                                    'id'=>$num_recom,
                                    'user_id'=>$user_id,
                                    'user_id_dpto'=>$user_id_dpto,
                                    'ger_id'=>$id_ger,
                                    'data'=>$data,
                                    'hora'=>$hora,
                                    'ip'=>$ip,
                                    'msg'=>$msg,
                                    'sta'=>$sta);
                    
                    $msg_recom_array = array(
                                    'recom_id'=>$num_recom,
                                    'user_id'=>$user_id,
                                    'data'=>$data,
                                    'hora'=>$hora,
                                    'msg'=>$msg);                                    
                    
                    $id_item = 1;
                    $p_itens_array = array();    
                    
                        for ($i=0; $i < $numLinha; $i++) {
                           
                            $cod = $this->input->post('cod'.$i);
                            $qtd = $this->input->post('qtd'.$i);
                            $un  = $this->input->post('un'.$i);
                            $des = $this->input->post('des'.$i);
                            $cc  = $this->input->post('cc'.$i);
                            $pra = $this->input->post('pra'.$i);
                            $pra = converte_data($pra);
    
                            $itens_array[] = array(
                                            'id_recom'=>$num_recom,
                                            'id_item'=>$id_item,
                                            'cod'=>$cod,
                                            'qtd'=>$qtd,
                                            'saldo'=>$qtd,
                                            'un'=>$un,
                                            'des'=>$des,
                                            'cc'=>$cc,
                                            'pra'=>$pra,
                                            'sta'=>$sta);
                            
                            // array do email                                        
                            $p_itens_array['id_item'][$i] = $id_item;
                            $p_itens_array['cod'][$i] = $cod;
                            $p_itens_array['qtd'][$i] = $qtd;
                            $p_itens_array['un'][$i] = $un;
                            $p_itens_array['des'][$i] = $des;
                            $p_itens_array['cc'][$i] = $cc;
                            $p_itens_array['pra'][$i] = converte_data_br($pra);                                            
                                            
                            $id_item ++;
                        }
                        
                        //insere dados da recom na base
                        $this->recom->do_insert_recom($recom_array,$msg_recom_array,$itens_array);
                        
                        //montagem do corpo do e-mail de recom
                        include('./application/views/mail/e_nova_recom.php');
                        //envio de e-mail
                        if ($this->sistema->enviar_email_nova_recom($email_req, $email_ger_dest, $email_sup_dest, $titulo, $message)):
                            set_msg('msgok','RECOM - '.$num_recom.' enviada com sucesso! ','sucesso');
                            redirect(current_url());                 
                        else:
                            set_msg('msgerro','Erro ao enviar RECOM, contate o administrador','erro');
                            redirect(current_url());
                        endif;
                        
                }else{
                    set_msg('msgerro', 'Erro ao gerar número da Recom','erro');
                    load_template();
                }    

           endif;
            set_tema('conteudo', load_modulo('telas_recom','nova'));
            load_template();
        else:
            load_template();
        endif;
    }

    public function consultar(){
        if (esta_logado()):
                $this->form_validation->set_rules('pesq','PESQUISAR','required');
                if($this->form_validation->run()==TRUE):
                    $pesq_form = $this->input->post('pesq');
                    $this->sistema->setPesq($pesq_form);
                endif;
                set_tema('conteudo', load_modulo('telas_recom','consultar'));
                load_template();
        else:
            load_template();
        endif;
    }
    
    public function gerenciar(){
        if (esta_logado()):
            set_tema('conteudo', load_modulo('telas_recom','gerenciar'));
            load_template();
        else:
            load_template();
        endif;
    }
    
    public function visualizar(){
        if (esta_logado()):
            set_tema('conteudo', load_modulo('telas_recom','visualizar'));
            load_template();
        else:
            load_template();
        endif;
    }
    
    public function atualizar_recom(){
        if (esta_logado()):
            $perm = $this->input->post('perm');
            $nlinha = $this->input->post('nlinha');
            $id_recom = $this->input->post('id_recom');
            $itens_hidden_array = $this->input->post('itens_array');
            $itens_json_array = json_decode(str_replace('\\', '', $itens_hidden_array));
            
            if($perm == 1):
                
                for ($i=0; $i < $nlinha; $i++) {
                    $valor_array[] = array(
                    'id' => $itens_json_array[$i][0],
                    'sta' => $itens_json_array[$i][1]); 
                }
                
                 $this->recom->do_update_recom_ger(array('id'=>$id_recom), array('sta'=>1), $valor_array);
                 redirect('recom/gerenciar');
                 
            endif;
         else:
            load_template();
         endif;
    }

    public function comprar_item_recom(){
        if (esta_logado()):
            $id_item  = $this->uri->segment(3);
            $pedido   = $this->uri->segment(4);
            $id_recom = $this->uri->segment(5);
            $dados = array('sta' => 2,'pedido' => $pedido);
            
            $this->recom->do_update_item_recom($id_item, $dados);
            $query_count = $this->recom->get_itens_count(1,$id_recom)->row();
            $contador = $query_count->contador;
            
            if($contador == 0){
                $this->recom->do_update_recom_com(array('sta'=>3), array('id'=>$id_recom));
                set_msg('msgok','Compra TOTAL da RECOM: '.$id_recom.' com sucesso','sucesso');
                redirect('recom/gerenciar');
            }else{
                $this->recom->do_update_recom_com(array('sta'=>2), array('id'=>$id_recom));
                set_msg('msgok','Item comprado com sucesso','sucesso');
                redirect('recom/visualizar/'.$id_recom);
            }
            
         else:
            load_template();
         endif;
    }

    public function mudar_pedido_item(){
        if (esta_logado()):
            $id_item  = $this->uri->segment(3);
            $pedido   = $this->uri->segment(4);
            $id_recom = $this->uri->segment(5);
            $dados = array('pedido' => $pedido);
            
            $this->recom->do_update_pedido_item_recom($id_item, $dados);
            redirect('recom/visualizar/'.$id_recom);
        else:
            load_template();
        endif;
    }
    
    public function receber_item_recom(){
        if (esta_logado()):
            $id_item      = $this->uri->segment(3);
            $saldo_atual  = $this->uri->segment(4);
            $id_recom     = $this->uri->segment(5);
            
            if($saldo_atual == 0){
                $dados = array('sta' => 5,'saldo' => $saldo_atual);
            }else{
                $dados = array('sta' => 4,'saldo' => $saldo_atual);
            }
            
            $this->recom->do_update_item_recom($id_item, $dados);
            $query_count = $this->recom->get_itens_count_rec($id_recom)->row();
            $contador = $query_count->contador;
            
            if($contador == 0){
                $this->recom->do_update_recom_com(array('sta'=>5), array('id'=>$id_recom));
                set_msg('msgok','Recebimento TOTAL da RECOM: '.$id_recom.' com sucesso','sucesso');
                redirect('recom/gerenciar');
            }else{
                $this->recom->do_update_recom_com(array('sta'=>4), array('id'=>$id_recom));
                set_msg('msgok','Item recebido com sucesso ','sucesso');
                redirect('recom/visualizar/'.$id_recom);
            }
            
         else:
            load_template();
         endif;
    }
    
}