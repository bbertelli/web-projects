<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Carga dos Conteúdos de telas  
 */

	switch ($tela):
        
//====================  Telas RECOM        
			
		// Tela de Nova Recom
		case 'nova':
			echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
			echo form_open('recom/nova',array('class'=>'form-padrao form-recom-user', 'id'=>'form_recom'));
			erros_validacao();
			get_msg('msgok');
            get_msg('msgerro');
           
            echo '<div id="error"></div>';
            
            echo '<div class="form-group">';
			echo form_label('<i class="fa fa-user"></i> Requisitante:'); echo'<br>';
			echo form_input(array('name'=>'req', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('req',$this->session->userdata('user_nome')));
            echo '</div>';
            
            echo '<div class="form-inline">';     
                echo '<div class="form-group">';
                echo form_label('<i class="fa fa-user-md"></i> Gerência:'); echo'<br>';
                
                $nome_tela = $this->uri->segment(2);
                $query_perm = $this->perm->get_perm_tela_bynome("recom")->row();
                $id_tela = $query_perm->id;
                $query_user_ger = $this->perm->get_tela_byid($id_tela)->result();
                $ger_array = array('Selecione um Gerente');
                foreach ($query_user_ger as $linha_ger):
                    if($linha_ger->perm == 1){
                        $id_user = $linha_ger->usuario_id;
                        $query_usuario = $this->usuarios->get_byid($id_user)->row();
                        $ger_array[$linha_ger->id] = $query_usuario->nome;
                    }                
                endforeach; 
                echo form_dropdown('id_ger', $ger_array,'','class="form-control campo4", id="id_ger"');   
                echo '</div>';  
                echo '<div class="form-group">';
                echo '<span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>';
                echo '</div>';  
                echo '<div class="form-group">';
                echo form_label('<i class="fa fa-share"></i> Replicar para:'); echo'<br>';
                $query_id_cargo = $this->perm->get_perm_cargo_bystatus('sup')->row();
                $query_user_sup = $this->usuarios->get_all_bypermcargo($query_id_cargo->id)->result();
                $sup_array = array('Selecione um Contato');
                foreach ($query_user_sup as $linha_sup):
                    $sup_array[$linha_sup->id] = $linha_sup->nome;                
                endforeach; 
                echo form_dropdown('id_sup', $sup_array,'','class="form-control campo4", id="id_sup"');   
                echo '</div>';
            echo '</div><br />';              
               //<td class="col-md-1">';echo form_input(array('id'=>'pra0', 'class'=>'form-control form-control-table'), set_value('pra'));echo'</td>
            echo '<div class="form-group">';
			echo '<table id="products-table" class="table table-bordered">
                    <thead>
                     <tr>
                       <th>Código</th>
                       <th>Qtd</th>
                       <th>Unidade</th>
                       <th>Descrição do Material</th>
                       <th>CC</th>
                       <th>Prazo</th>
                       <th>&nbsp;</th>
                     </tr>
                    </thead>
                    <tbody>
                     <tr>
                       <td class="col-md-1">';echo form_input(array('id'=>'cod0', 'name'=>'cod0', 'class'=>'form-control form-control-table', 'placeholder'=>'000000'), set_value('cod0'));echo'</td>
                       <td class="col-md-1">';echo form_input(array('id'=>'qtd0', 'name'=>'qtd0', 'class'=>'form-control form-control-table', 'placeholder'=>'0,00'), set_value('qtd0'));echo'</td>
                       <td class="col-md-1">';echo form_input(array('id'=>'un0', 'name'=>'un0', 'class'=>'form-control form-control-table', 'placeholder'=>'___'), set_value('un0'));echo'</td>
                       <td class="col-md-4">';echo form_input(array('id'=>'des0', 'name'=>'des0', 'class'=>'form-control form-control-table', 'placeholder'=>'Digite o nome do material'), set_value('des0'));echo'</td>
                       <td class="col-md-1">';echo form_input(array('id'=>'cc0', 'name'=>'cc0', 'class'=>'form-control form-control-table', 'placeholder'=>'C.Custo'), set_value('cc0'));echo'</td>                  
                       <td class="col-md-2">';
                        echo '<div class="input-group date form_date form-control-table" data-date="" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">'; 
                        echo form_input(array('id'=>'pra0', 'name'=>'pra0', 'class'=>'form-control form-control-table'), set_value('pra0'), 'readonly');
                        echo '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';
                        echo '</div></td>'; echo'
                       <td class="col-md-1">&nbsp;</td>
                     </tr>
                    </tbody>
                    <tfoot>
                     <tr>
                       <td colspan="8" style="text-align: left;">
                         <button class="btn btn-xs btn-success" onclick="AddTableRow()" type="button"><i class="fa fa-plus-circle"></i> Adicionar Produto</button>
                       </td>
                     </tr>
                    </tfoot>
                    </table>';
            echo '</div>';
            echo '<div class="form-group">';
            echo form_label('<i class="fa fa-comment-o"></i> Detalhes:'); echo '<i> [máx. de 520 caracteres]</i>';
            echo form_textarea(array('id'=>'msg','name'=>'msg', 'class'=>'form-control', 'style'=>'height:100px', 'placeholder'=>'Digite uma observação (opcional)'), set_value('msg'));
            echo '</div>'; 
            echo '<input type="hidden" name="validado" value="0" id="validado">';
            echo '<input type="hidden" name="linha" value="1" id="linha">';
            echo form_hidden('user_id',$this->session->userdata('user_id'));
            echo form_hidden('user_id_dpto',$this->session->userdata('user_id_dpto'));
            echo '<hr>';           
            echo anchor('recom/gerenciar','<i class="fa fa-reply"></i> Listar recom',array('class'=>'btn btn-primary btn-padrao'));          
            ?><button name="nova" class="btn btn-success btn-padrao" type="button" onclick="GetTableError()"><i class="fa fa-floppy-o"></i> Salvar Dados</button>
            <script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script>
            <script type="text/javascript">
                    $('.form_date').datetimepicker({
                        language:  'pt-BR',
                        weekStart: 1,
                        todayBtn:  1,
                        autoclose: 1,
                        todayHighlight: 1,
                        startView: 2,
                        minView: 2,
                        forceParse: 0
                    });
                    
                   
            </script>
            <?php
            
			echo form_close();
            
		break;
        
        
        // Tela de Consultar Recom
        case 'consultar':
            echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
            echo form_open('recom/consultar',array('class'=>'form-padrao form-recom-user', 'id'=>'form_consultar_recom'));
            erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');
            
            $pesq = $this->sistema->getPesq();
            ?>
            <table class="table table-striped table-bordered form-padrao data-table-consrecom">
                    <thead>
                        <tr>
                            <th>Recom</th>
                            <th>Usuário</th>
                            <th>Código</th>
                            <th>Descrição do Material</th>
                            <th>Data</th>
                            <th>Qtd</th>
                            <th>Pedido</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                            if($pesq != null || $pesq != ""):
                            $query = $this->recom->get_itens_bykey($pesq)->result();
                                foreach ($query as $linha) {
                                    
                                $id_recom = $linha->id_recom;
                                $query_recom = $this->recom->get_recom_byid($id_recom)->row();
                                $user_id = $query_recom->user_id;
                                $query_user = $this->usuarios->get_byid($user_id)->row();   
                                    
                                    
               $sta = $linha->sta;
             
                    echo '<tr>';
                 
                      printf('<td>%s</td>', $linha->id_recom);
                                printf('<td>%s</td>', $query_user->nome);
                                printf('<td>%s</td>', $linha->cod);
                                printf('<td>%s</td>', $linha->des);
                                printf('<td>%s</td>', converte_data_br($query_recom->data));
                                printf('<td>%s</td>', $linha->qtd);
                                printf('<td>%s</td>', $linha->pedido);                           
               
                       if($sta == 0){
                           echo '
                           <td class="col-md-2">em aberto</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/aberto.png" />');
                       }else if($sta == 1){
                           echo '
                           <td class="col-md-2">aprovado</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/aprovado.png" />');
                       }else if($sta == 2){
                           echo '
                           <td class="col-md-2">comprado</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/comprado.png" />');
                       }else if($sta == 4){
                           echo '
                           <td class="col-md-2">recebido parcial</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/recebido.png" />');
                       }else if($sta == 5){
                           echo '
                           <td class="col-md-2">recebido total</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/recebido.png" />');
                       }else if($sta == 9){
                           echo '
                           <td class="col-md-2">cancelado</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/cancelado.png" />');
                       }
                       echo'</td>
                     </tr>';
            } 
                            /*foreach ($query as $linha):
                                $id_recom = $linha->id_recom;
                                $query_recom = $this->recom->get_recom_byid($id_recom)->row();
                                $user_id = $query_recom->user_id;
                                $query_user = $this->usuarios->get_byid($user_id)->row();
                                echo '<tr>';
                                printf('<td>%s</td>', $linha->id_recom);
                                printf('<td>%s</td>', $query_user->nome);
                                printf('<td>%s</td>', $linha->cod);
                                printf('<td>%s</td>', $linha->des);
                                printf('<td>%s</td>', converte_data_br($query_recom->data));
                                printf('<td>%s</td>', $linha->qtd);
                                printf('<td>%s</td>', $linha->pedido);
                                echo '</tr>';
                            endforeach;*/
                            endif;
                            
                        ?>
                    </tbody>
                </table>
            <?php
            echo form_close();
        break;
        
        
        // Tela de Gerenciar Recom
        case 'gerenciar':

                    echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                    get_msg('msgok');
                    get_msg('msgerro');
                ?>
                <div class="form-padrao form-recom-user">
                <table class="table table-striped table-bordered form-padrao data-table-gerrecom">
                    <thead>
                        <tr>
                            <th>Recom</th>
                            <th>Data</th>
                            <th>Usuário</th>
                            <th>Status</th>
                            <th>Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // parametros para testar a mudança de tela de acordo com a permissão da tela
                            $id_dpto = $this->session->userdata('user_id_dpto');                            
                            $query_tela = $this->perm->get_perm_tela_bynome('recom')->row();
                            $id_tela = $query_tela->id;
                            $id_usuario = $this->session->userdata('user_id');  
                            $query_perm_user_tela = $this->perm->get_tela_byidtela_idusuario($id_tela,$id_usuario)->row();
                            if(!isset($query_perm_user_tela->perm)){
                                $id_perm_user_tela = 0;
                            }else{
                                $id_perm_user_tela = $query_perm_user_tela->perm;
                            }
                            
                            if($id_perm_user_tela == 0){ $query = $this->recom->get_recom_open_bydpto($id_dpto)->result(); } //usuário
                            if($id_perm_user_tela == 1){ $query = $this->recom->get_recom_open_bygerid($id_usuario)->result(); } //gerente
                            if($id_perm_user_tela == 2){ $query = $this->recom->get_recom_open_aprovadas()->result(); } //comprador
                            if($id_perm_user_tela == 3){ $query = $this->recom->get_recom_open_compradas_recebidas()->result(); } //recebedor
                                                       
                            foreach ($query as $linha):
                                $user_id = $linha->user_id;
                                $query_user = $this->usuarios->get_byid($user_id)->row();
                                echo '<tr>';
                                printf('<td>%s</td>', $linha->id);
                                printf('<td>%s</td>', converte_data_br($linha->data));
                                printf('<td>%s</td>', $query_user->nome);
                                $sta = $linha->sta;
                                switch ($sta) {
                                    case '0': printf('<td><img width="24px" height="24px" src="ico/aberto.png">&nbsp; em aberto</td>'); break; //aberto
                                    case '1': printf('<td><img width="24px" height="24px" src="ico/aprovado.png">&nbsp; vistado pela gerência</td>'); break; //aprovado p/ compra
                                    case '2': printf('<td><img width="24px" height="24px" src="ico/comprado.png">&nbsp; comprado parcial</td>'); break; //comprado
                                    case '3': printf('<td><img width="24px" height="24px" src="ico/comprado.png">&nbsp; comprado total</td>'); break; //comprado
                                    case '4': printf('<td><img width="24px" height="24px" src="ico/recebido.png">&nbsp; recebido parcial</td>'); break; //recebido
                                    case '5': printf('<td><img width="24px" height="24px" src="ico/recebido.png">&nbsp; recebido total</td>'); break; //recebido
                                    case '9': printf('<td><img width="24px" height="24px" src="ico/cancelado.png">&nbsp; cancelado</td>'); break; //cancelado
                                default: printf('<td><img width="24px" height="24px" src="ico/aberto.png">&nbsp; em aberto</td>'); break;
                                }
                                printf('<td>%s</td>', anchor("recom/visualizar/$linha->id", '<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>', array('class'=>'table-actions', 'title'=>'Visualizar')));
                                echo '</tr>';
                            endforeach;
                        ?>
                    </tbody>
                </table>
                </div>
            <?php
        break;  	       
        
        
        // Tela de Visualizar Itens Recom
        case 'visualizar':

            $id_recom = $this->uri->segment(3);
            if($id_recom==NULL):
                set_msg('msgerro', 'Escolha uma RECOM para visualizar','erro');
                redirect('recom/gerenciar');
            endif;
            echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
            $query_recom = $this->recom->get_recom_byid($id_recom)->row();
            $user_id = $query_recom->user_id;
            $ger_id = $query_recom->ger_id;
            $query_usuario = $this->usuarios->get_byid($user_id)->row();
            $query_ger = $this->usuarios->get_byid($ger_id)->row();
            
            echo form_open('recom/atualizar_recom',array('class'=>'form-padrao form-recom-user', 'id'=>'form_visualizar_recom'));
            erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');
            echo '<div id="error"></div>';
            
            echo '<div class="form-inline">';
                echo '<div class="form-group" style="float:right">';
                echo form_label('<i class="fa fa-ticket fa-2x"></i> RECOM Nº: '.$id_recom,'',array('style'=>'font-size:18px'));
                echo '</div>'; 
                echo '<div class="form-group">';
                echo form_label('<i class="fa fa-user"></i> Requisitante:'); echo'<br>';
                echo form_input(array('name'=>'req', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('req', $query_usuario->nome));
                echo '</div>';  
                echo '<div class="form-group">';
                echo '<span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</span>';
                echo '</div>'; 
                echo '<div class="form-group">';
                echo form_label('<i class="fa fa-user-md"></i> Gerente:'); echo'<br>';
                echo form_input(array('name'=>'ger', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('ger', $query_ger->nome));
                echo '</div>';
            echo '</div><br />';
            echo '<div class="form-group">';
            echo '<table id="products-table" class="table table-bordered">
                    <tbody>
                     <tr>';
                     
            // parametros para testar a mudança de tela de acordo com a permissão da tela          
            $query_tela = $this->perm->get_perm_tela_bynome('recom')->row();
            $id_tela = $query_tela->id;
            $id_usuario = $this->session->userdata('user_id');
            $query_perm_user_tela = $this->perm->get_tela_byidtela_idusuario($id_tela,$id_usuario)->row();
            if(!isset($query_perm_user_tela->perm)){
                $id_perm_user_tela = 0;
            }else{
                $id_perm_user_tela = $query_perm_user_tela->perm;
            }
      
            $query_itens_recom = $this->recom->get_itens_byid($id_recom)->result();
            $i=0;
            
            echo '<input type="hidden" name="marcador" value="0" id="marcador">';
            echo '<input type="hidden" name="itens_array" value="" id="itens_array">';
            echo '<input type="hidden" name="nlinha" value="" id="nlinha">';
            echo '<input type="hidden" name="perm" value="'.$id_perm_user_tela.'" id="perm">';
            echo '<input type="hidden" name="id_recom" value="'.$id_recom.'" id="id_recom">';  
            
            //usuário
            if($id_perm_user_tela == 0){
                echo ' <th>Código</th>
                       <th>Qtd Solicitada</th>
                       <th>Saldo</th>
                       <th>Unidade</th>
                       <th>Descrição do Material</th>
                       <th>CC</th>
                       <th>Prazo</th>
                       <th>Status</th>
                       <th></th>
                     </tr>';
            foreach ($query_itens_recom as $linha) {
               echo '<tr>
                       <td class="col-md-1">'.$linha->cod.'</td>                       
                       <td class="col-md-1">'.$linha->qtd.'</td>
                       <td class="col-md-1">'.$linha->saldo.'</td>
                       <td class="col-md-1">'.$linha->un.'</td>
                       <td class="col-md-4">'.$linha->des.'</td>
                       <td class="col-md-1">'.$linha->cc.'</td>                  
                       <td class="col-md-2">'.converte_data_br($linha->pra).'</td>
                       <td class="col-md-1" style="text-align:center">';
                           $sta = $linha->sta;
                            switch ($sta) {
                                case '0': printf('em aberto'); break; //aberto
                                case '1': printf('aprovado'); break; //aprovado p/ compra
                                case '2': printf('comprado'); break; //comprado
                                case '4': printf('recebido parcial'); break; //recebido
                                case '5': printf('recebido total'); break; //recebido
                                case '9': printf('cancelado'); break; //cancelado
                            default: break;
                            }
                       echo'</td>
                       <td class="col-md-1" style="text-align:center">';
                           $sta = $linha->sta;
                            switch ($sta) {
                                case '0': printf('<img width="24px" height="24px" src="ico/aberto.png" />'); break; //aberto
                                case '1': printf('<img width="24px" height="24px" src="ico/aprovado.png" />'); break; //aprovado p/ compra
                                case '2': printf('<img width="24px" height="24px" src="ico/comprado.png" />'); break; //comprado
                                case '4': printf('<img width="24px" height="24px" src="ico/recebido.png" />'); break; //recebido
                                case '5': printf('<img width="24px" height="24px" src="ico/recebido.png" />'); break; //recebido
                                case '9': printf('<img width="24px" height="24px" src="ico/cancelado.png" />'); break; //cancelado
                            default: break;
                            }
                       echo'</td>
                     </tr>';
                    $i++;
            } 
            echo '</tbody>
                  </table>';
            echo '</div>';
            }
              
            //gerente
            if($id_perm_user_tela == 1){
                //carregando script de funções da recom
                include('./application/views/painel/recom_func_ger.php'); 
                
                echo ' <th>Código</th>
                       <th>Qtd</th>
                       <th>Unidade</th>
                       <th>Descrição do Material</th>
                       <th>CC</th>
                       <th>Prazo</th>
                       <th><a href="javascript:" class="btn btn-xs btn-danger" id="desmarcar_todos" name="desmarcar_todos" onclick="AprovarTodosItens(this)">Reprovar todos</a></th>
                     </tr>';
            $i = 1;
            foreach ($query_itens_recom as $linha) {
               
               echo '<tr>
                       <td id="id_item_'.$i.'" style="display:none;">'.$linha->id.'</td>
                       <td class="col-md-1">'.$linha->cod.'</td>
                       <td class="col-md-1">'.$linha->qtd.'</td>
                       <td class="col-md-1">'.$linha->un.'</td>
                       <td class="col-md-4">'.$linha->des.'</td>
                       <td class="col-md-1">'.$linha->cc.'</td>                  
                       <td class="col-md-2">'.converte_data_br($linha->pra).'</td>
                       <td class="col-md-1" style="text-align:center">
                       <a href="javascript:" class="table-actions gl-dark-green fa fa-thumbs-up fa-2x" name="Marcar" id="'.$i.'" onclick="AprovarItens(this)"></a>
                      </td>
                     </tr>';
                    $i++;
            } 
            echo '</tbody>
                  </table>';
            echo '</div>';
            ?><script>CriarArray();</script><?php
            }

            //comprador
            if($id_perm_user_tela == 2){
                //carregando script de funções da recom
                include('./application/views/painel/recom_func_com.php'); 
                
                echo ' <th>Código</th>
                       <th>Qtd</th>
                       <th>Unidade</th>
                       <th>Descrição do Material</th>
                       <th>CC</th>
                       <th>Prazo</th>
                       <th>Pedido</th>
                       ';
                       if($query_recom->sta == 3){
                            echo '<th>Status</th>';
                       }else{   
                            echo'<th>Operações</th>';
                       }
                     echo'
                     </tr>';  
            
            foreach ($query_itens_recom as $linha) {
                $sta = $linha->sta;
                if($sta == 9 || $sta == 2){
                    echo '<tr style="background-color: #A4A4A4;">';
                }else{
                    echo '<tr>';
                }     
                       echo'
                       <td id="id_item_'.$i.'" style="display:none;">'.$linha->id.'</td>
                       <td id="sta_'.$i.'" style="display:none;">'.$linha->sta.'</td>
                       <td class="col-md-1">'.$linha->cod.'</td>
                       <td class="col-md-1">'.$linha->qtd.'</td>
                       <td class="col-md-1">'.$linha->un.'</td>
                       <td class="col-md-4">'.$linha->des.'</td>
                       <td class="col-md-1">'.$linha->cc.'</td>                  
                       <td class="col-md-2">'.converte_data_br($linha->pra).'</td>';
                    
                       if($sta == 2){
                           echo '
                           <td class="col-md-1"><div style="width:110%;">';echo form_input(array('id'=>'ped'.$linha->id, 'name'=>'ped'.$linha->id, 'class'=>'form-control form-control-table-ped', 'disabled'=>'disabled', 'onblur'=>'PerdeFocoInput('.$linha->id.')'), set_value('ped'.$linha->id, $linha->pedido));
                           echo'<a href="javascript:" class="fa fa-pencil" id="'.$linha->id.'" name="btn_desabilitado" onclick="InserirPedido(this)" onmouseover="MouseOverBtn(this)"></a></div></td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/comprado.png" />');
                       }else if($sta == 9){
                           echo '
                           <td class="col-md-1"></td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/cancelado.png" />');
                       }else{
                           echo '
                           <td class="col-md-1"><div style="width:110%;">';echo form_input(array('id'=>'ped'.$linha->id, 'name'=>'ped'.$linha->id, 'class'=>'form-control form-control-table-ped', 'onfocus'=>'GanhaFocoInput('.$linha->id.')'), set_value('ped'.$linha->id));echo'</div></td>
                           <td class="col-md-1" style="text-align:center">';
                           echo'<a href="javascript:" class="fa fa-cart-arrow-down fa-2x" id="'.$linha->id.'" name="comprar_item" title="Comprar" onclick="ValidarCompra(this)"></a> 
                           &nbsp&nbsp&nbsp&nbsp';
                           echo anchor("recom/cancelar_item/$linha->id", '<i class="fa fa-times fa-2x"></i>', array('class'=>'table-actions gl-red', 'title'=>'Cancelar'));
                       }
                       echo'</td>
                     </tr>';
                    $i++;
            } 
            echo '</tbody>
                  </table>';
            echo '</div>';
            }

            //recebedor
            if($id_perm_user_tela == 3){
                //carregando script de funções da recom
                include('./application/views/painel/recom_func_rec.php'); 
                
                echo ' <th>Código</th>
                       <th>Qtd</th>
                       <th>Saldo</th>
                       <th>Unidade</th>
                       <th>Descrição do Material</th>
                       <th>CC</th>
                       <th>Prazo</th>
                       <th>Receber</th>
                       <th>Operações</th>
                     </tr>';
            foreach ($query_itens_recom as $linha) {
               $sta = $linha->sta;
                if($sta == 9 || $sta == 5 || $sta == 1){
                    echo '<tr style="background-color: #A4A4A4;">';
                }else{
                    echo '<tr>';
                } 
                       echo '
                       <td class="col-md-1">'.$linha->cod.'</td>
                       <td class="col-md-1">'.$linha->qtd.'</td>
                       <td class="col-md-1">'.$linha->saldo.'</td>
                       <td class="col-md-1">'.$linha->un.'</td>
                       <td class="col-md-4">'.$linha->des.'</td>
                       <td class="col-md-1">'.$linha->cc.'</td>                  
                       <td class="col-md-2">'.converte_data_br($linha->pra).'</td>';
                       echo '<input type="hidden" name="saldo'.$linha->id.'" value="'.$linha->saldo.'" id="saldo'.$linha->id.'">';
                       if($sta == 5){
                           echo '
                           <td class="col-md-1">recebido</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/recebido.png" />');
                       }else if($sta == 4){
                           echo '
                           <td class="col-md-1"><div style="width:110%;">';echo form_input(array('id'=>'qtdrec'.$linha->id, 'name'=>'qtdrec'.$linha->id, 'class'=>'form-control form-control-table-ped', 'onblur'=>'PerdeFocoInput('.$linha->id.')'), set_value('qtdrec'.$linha->id));
                           echo'</div></td>
                           <td class="col-md-1" style="text-align:center">';
                           echo'<a href="javascript:" class="fa fa-truck fa-2x" id="'.$linha->id.'" name="receber_item" title="Receber" onclick="ValidarReceber(this)"></a>';
                       }else if($sta == 9){
                           echo '
                           <td class="col-md-1">cancelado</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/cancelado.png" title="Item Cancelado" />');
                       }else if($sta == 1){
                           echo '
                           <td class="col-md-1">aguardando</td>
                           <td class="col-md-1" style="text-align:center">';
                           printf('<img width="24px" height="24px" src="ico/aprovado.png" title="Item Aprovado" />');
                       }else{
                           echo '
                           <td class="col-md-1"><div style="width:110%;">';echo form_input(array('id'=>'qtdrec'.$linha->id, 'name'=>'qtdrec'.$linha->id, 'class'=>'form-control form-control-table-ped', 'onblur'=>'PerdeFocoInput('.$linha->id.')'), set_value('qtdrec'.$linha->id));
                           echo'</div></td>
                           <td class="col-md-1" style="text-align:center">';
                           echo'<a href="javascript:" class="fa fa-truck fa-2x" id="'.$linha->id.'" name="receber_item" title="Receber" onclick="ValidarReceber(this)"></a>';
                       }
                       echo'</td>
                     </tr>';
                    $i++;
            } 
            echo '</tbody>
                  </table>';
            echo '</div>';
            }
 
            echo form_label('<i class="fa fa-history"></i> Histórico:');
            echo '<table class="table table-striped table-bordered form-padrao data-table-consrecom" style="margin-top: 0px;">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Comentário</th>
                        </tr>
                    </thead>
                    <tbody>';
                            $query_msg_recom = $this->recom->get_msg_byid($id_recom)->result();
                            foreach ($query_msg_recom as $linha):
                                $user_id = $linha->user_id;
                                $query_user = $this->usuarios->get_byid($user_id)->row();
                                echo '<tr>';
                                printf('<td>%s</td>', $query_user->nome);
                                printf('<td>%s</td>', converte_data_br($linha->data));
                                printf('<td>%s</td>', $linha->hora);
                                printf('<td>%s</td>', $linha->msg);
                                echo '</tr>';
                            endforeach;
                            
            echo '</tbody>
                </table>';
            echo '<hr><div class="form-group">';
            echo form_label('<i class="fa fa-comment-o"></i> Adicionar comentário:'); echo '<i> [máx. de 520 caracteres]</i>';
            echo form_textarea(array('id'=>'msg','name'=>'msg', 'class'=>'form-control', 'style'=>'height:100px', 'placeholder'=>'Digite uma observação (opcional)'), set_value('msg'));
            echo '</div>';
            if($id_perm_user_tela >= 2){ 
                echo anchor('admin/','Salvar Comentário',array('class'=>'btn btn-xs btn-success'));
            }
            echo '<input type="hidden" name="id_recom" value="'.$id_recom.'" id="id_recom">';
            echo '<hr>';
            if($id_perm_user_tela == 0){
                 echo anchor('recom/gerenciar','<i class="fa fa-reply"></i> Listar Recoms',array('class'=>'btn btn-primary'));
                 echo '&nbsp&nbsp'; 
                 ?><button class="btn btn-success" onclick="AtualizarRecom(this)" type="button"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php
            }
            if($id_perm_user_tela == 1){
                 echo anchor('recom/gerenciar','<i class="fa fa-reply"></i> Listar Recoms',array('class'=>'btn btn-primary'));
                 echo '&nbsp&nbsp'; 
                 ?><button class="btn btn-success" onclick="AtualizarRecom(this)" type="button"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php
            }
            if($id_perm_user_tela == 2){
                 echo anchor('recom/gerenciar','<i class="fa fa-reply"></i> Listar Recoms',array('class'=>'btn btn-primary'));
                 echo '&nbsp&nbsp';
                 echo anchor('recom/cancelar_recom','<i class="fa fa-trash-o"></i> Cancelar Recom',array('class'=>'btn btn-danger'));
            }
            if($id_perm_user_tela == 3){
                 echo anchor('recom/gerenciar','<i class="fa fa-reply"></i> Listar Recoms',array('class'=>'btn btn-primary'));
            }
            echo form_close();
            
            ?><script type="text/javascript" src="../../assets/js/jquery.mask.min.js"></script><?php
            
        break;
	   			
			default:
				echo '<div class="alert-box alert"><p>A tela solicitada não existe</p></div>';
			break;           
	endswitch;