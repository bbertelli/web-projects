<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Carga dos Conteúdos de telas  
 */

	switch ($tela):
        
//====================  Telas Usuários        
			
		// Tela de Nova Senha
		case 'nova_senha':
			echo '<div class="five columns centered">';
			echo form_open('admin/nova_senha',array('class'=>'custom loginform'));
			echo form_fieldset('Recuperação de senha');
			erros_validacao();
			get_msg('msgok');
			get_msg('msgerro');			
			echo form_label('Seu e-mail');
			echo form_input(array('name'=>'email'), set_value('email'), 'autofocus');
			echo form_submit(array('name'=>'novasenha','class'=>'button radius right'), 'Enviar nova senha');
			echo '<p>'.anchor('admin/login','Fazer login').'</p>';
			echo form_fieldset_close();
			echo form_close();
			echo '</div>';
		break;
			
		// Tela de Cadastro
		case 'cadastro_usuario':
			echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
			echo form_open('admin/cadastro_usuario',array('class'=>'form-padrao'));
			erros_validacao();
			get_msg('msgok');
            get_msg('msgerro');
            echo '<div class="form-group">';
			echo form_label('Nome Completo');
			echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome'), 'autofocus');
            echo '</div>';
            echo '<div class="form-group">';
			echo form_label('E-mail');
			echo form_input(array('name'=>'email', 'class'=>'form-control campo6'), set_value('email'));
            echo '</div>';
            echo '<div class="form-group">';
			echo form_label('Login');
			echo form_input(array('name'=>'login', 'class'=>'form-control campo4'), set_value('login'));
            echo '</div>';
            echo '<div class="form-group">';
			echo form_label('Senha');
			echo form_password(array('name'=>'senha', 'class'=>'form-control campo4'), set_value('senha'));
            echo '</div>';
            echo '<div class="form-group">';
			echo form_label('Repita a Senha');
			echo form_password(array('name'=>'senha2', 'class'=>'form-control campo4'), set_value('senha2'));
            echo '</div><hr>';
            echo '<div class="form-group">';
            echo form_label('<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Permissões Sistema:'); echo'<br>';
            $query_perm_sis = $this->perm->get_perm_sis_all()->result();
            foreach ($query_perm_sis as $linha_perm):
                $linha_perm->nome;                
                echo form_radio(array('name'=>'id_perm_sis'), $linha_perm->id).'&nbsp'.$linha_perm->nome.'&nbsp&nbsp';              
            endforeach;         
            echo '</div>';
            echo '<div class="form-group">';
            echo form_label('<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Departamento:'); echo'<br>';
            $query_dpto = $this->dpto->get_dpto_all()->result();
            $dpto_array = array('Escolha uma opção');
            foreach ($query_dpto as $linha_dpto):
                $dpto_array[$linha_dpto->id] = $linha_dpto->nome;                
            endforeach; 
            echo form_dropdown('id_dpto', $dpto_array);   
            echo '</div>';
            echo '<div class="form-group">';
            echo form_label('<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Grupo:'); echo'<br>';
            $query_perm_cargo = $this->perm->get_perm_cargo_all()->result();
            foreach ($query_perm_cargo as $linha_perm):
                $linha_perm->nome;                
                echo form_radio(array('name'=>'id_perm_cargo'), $linha_perm->id).'&nbsp'.$linha_perm->nome.'&nbsp&nbsp';              
            endforeach;                             
            echo '</div>';
            echo '<hr>';
            echo anchor('admin/gerenciar_usuario','<i class="fa fa-reply"></i> Listar usuários',array('class'=>'btn btn-primary btn-padrao'));          
            ?><button name="cadastro_usuario" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php
			echo form_close();
		break;
		
		// Tela de Gerenciar
		case 'gerenciar_usuario':
			?>
				<?php 
					echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
					get_msg('msgok');
					get_msg('msgerro');
				?>
				<div class="form-padrao">
				<table class="table table-striped table-bordered form-padrao data-table">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Login</th>
							<th>E-mail</th>
							<th>Ativo</th>
							<th>Departamento</th>
							<th>Função</th>
							<th>Perm. Sistema</th>
							<th>Operações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $this->usuarios->get_all()->result();
							foreach ($query as $linha):
                                $id_dpto           = $linha->id_dpto;
                                $id_perm_cargo     = $linha->id_perm_cargo;
                                $id_perm_sis       = $linha->id_perm_sis;
                                $query_dpto        = $this->dpto->get_dpto_byid($id_dpto)->row();
                                $query_perm_cargo  = $this->perm->get_perm_cargo_byid($id_perm_cargo)->row();
                                $query_perm_sis    = $this->perm->get_perm_sis_byid($id_perm_sis)->row();
								echo '<tr>';
								printf('<td>%s</td>', $linha->nome);
								printf('<td>%s</td>', $linha->login);
								printf('<td>%s</td>', $linha->email);
                                printf('<td>%s</td>', ($linha->ativo==0)? '<span class="glyphicon glyphicon-ban-circle gl-red" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-ok-circle gl-green" aria-hidden="true"></span>');
								printf('<td>%s</td>', $query_dpto->nome);
                                printf('<td>%s</td>', $query_perm_cargo->nome);
								printf('<td>%s</td>', $query_perm_sis->nome);
								printf('<td>%s %s %s</td>', anchor("admin/editar/$linha->id", '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class'=>'table-actions', 'title'=>'Editar')),
								anchor("admin/alterar_senha/$linha->id", '<i class="fa fa-key"></i>', array('class'=>'table-actions gl-yellow', 'title'=>'Alterar Senha')),
								anchor("admin/excluir/$linha->id", '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('class'=>'table-actions deletareg gl-red', 'onclick'=>'return confirm(\'Deseja realmente desativar este USUÁRIO no sistema?\')', 'title'=>'Desativar')));
								echo '</tr>';
							endforeach;
						?>
					</tbody>
				</table>
				</div>
			<?php
		break;
		
		// Tela de Alterar Senha
		case 'alterar_senha':
			$iduser = $this->uri->segment(3);
			if($iduser==NULL):
				set_msg('msgerro', 'Escolha um usuário para alterar','erro');
				redirect('admin/gerenciar_usuario');
			endif;
			echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
			$query = $this->usuarios->get_byid($iduser)->row();
			echo form_open(current_url(), array('class'=>'form-padrao'));
            erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');		
            echo '<div class="form-group">';
			echo form_label('Nome Completo');
			echo form_input(array('name'=>'nome', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('nome', $query->nome));
			echo '</div>';
            echo '<div class="form-group">';
			echo form_label('E-mail');
			echo form_input(array('name'=>'email', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('email', $query->email));
			echo '</div>';
            echo '<div class="form-group">';
			echo form_label('Login');
			echo form_input(array('name'=>'login', 'class'=>'form-control campo4', 'disabled'=>'disabled'), set_value('login', $query->login));
			echo '</div>';
            echo '<div class="form-group">';
			echo form_label('Nova Senha');
			echo form_password(array('name'=>'senha', 'class'=>'form-control campo4'), set_value('senha'), 'autofocus');
			echo '</div>';
            echo '<div class="form-group">';
			echo form_label('Repita a Senha');
			echo form_password(array('name'=>'senha2', 'class'=>'form-control campo4'), set_value('senha2'));
            echo '</div>';
            echo '<hr>';
            echo anchor('admin/gerenciar_usuario','<i class="fa fa-reply"></i> Listar usuários',array('class'=>'btn btn-primary btn-padrao'));          
            ?><button name="alterarsenha" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php	
			echo form_hidden('idusuario', $iduser);
			echo form_close();	 	
			break;
			
			// Tela de Editar
			case 'editar':
			$iduser = $this->uri->segment(3);
			if($iduser==NULL):
				set_msg('msgerro', 'Escolha um usuário para alterar','erro');
				redirect('admin/gerenciar_usuario');
			endif;
			echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
			$query = $this->usuarios->get_byid($iduser)->row();
			echo form_open(current_url(), array('class'=>'form-padrao'));
			erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');
            echo '<div class="form-group">';
			echo form_label('Nome Completo:');
			echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome', $query->nome), 'autofocus');
			echo '</div>';
            echo '<div class="form-group">';
			echo form_label('E-mail:');
			echo form_input(array('name'=>'email', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('email', $query->email));
			echo '</div>';
            echo '<div class="form-group">';
			echo form_label('Login:');
			echo form_input(array('name'=>'login', 'class'=>'form-control campo4', 'disabled'=>'disabled'), set_value('login', $query->login));
            echo '</div><hr>';
            echo '<div class="form-group">';
            echo form_checkbox(array('name'=>'ativo'), '1', $query->ativo==1 ? TRUE : FALSE).' Ativo no Sistema&nbsp&nbsp';
            echo '</div>';
            echo '<div class="form-group">';
            echo form_label('<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Permissões Sistema:'); echo'<br>';			
            $query_perm_sis = $this->perm->get_perm_sis_all()->result();
            foreach ($query_perm_sis as $linha_perm):
                $linha_perm->nome;                              
                echo form_radio(array('name'=>'id_perm_sis'), $linha_perm->id, $query->id_perm_sis==$linha_perm->id ? TRUE : FALSE).'&nbsp'.$linha_perm->nome.'&nbsp&nbsp'; 
            endforeach; 
            echo '</div>';
            echo '<div class="form-group">';
            echo form_label('<span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> Departamento:'); echo'<br>';
            $query_dpto = $this->dpto->get_dpto_all()->result();
            $dpto_array = array();
            foreach ($query_dpto as $linha_dpto):
                $dpto_array[$linha_dpto->id] = $linha_dpto->nome;                
                if($linha_dpto->id==$query->id_dpto){$id_selecionado=$linha_dpto->id;}
            endforeach; 
            echo form_dropdown('id_dpto', $dpto_array, $id_selecionado);                     
            echo '</div>';
            echo '<div class="form-group">';
            echo form_label('<span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Função:'); echo'<br>';
            $query_perm_cargo = $this->perm->get_perm_cargo_all()->result();
            foreach ($query_perm_cargo as $linha_perm):
                $linha_perm->nome;                              
                echo form_radio(array('name'=>'id_perm_cargo'), $linha_perm->id, $query->id_perm_cargo==$linha_perm->id ? TRUE : FALSE).'&nbsp'.$linha_perm->nome.'&nbsp&nbsp'; 
            endforeach; 
            echo '</div>';            
			echo form_hidden('idusuario', $iduser);
            echo '<hr>';          
            echo anchor('admin/gerenciar_usuario','<i class="fa fa-reply"></i> Listar usuários',array('class'=>'btn btn-primary btn-padrao'));          
            ?><button name="editar" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php    
			echo form_close();		
			break;
            
            
            
//====================  Telas Departamento

            // Tela de Cadastro Dpto
            case 'cadastro_departamento':
                echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                echo form_open('admin/cadastro_departamento',array('class'=>'form-padrao'));
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo '<div class="form-group">';
                echo form_label('Departamento');
                echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome'), 'autofocus');
                echo '</div>';
                echo '<div class="form-group">';
                echo form_label('Status');
                echo form_input(array('name'=>'status', 'class'=>'form-control campo6'), set_value('status'));
                echo '</div>';    
                echo '<hr>';
                echo anchor('admin/gerenciar_departamento','<i class="fa fa-reply"></i> Listar departamentos',array('class'=>'btn btn-primary btn-padrao'));          
                ?><button name="cadastro_departamento" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php
                echo form_close();
            break;
                    
                    
            // Tela de Gerenciar Dpto
            case 'gerenciar_departamento':
                ?>
                    <?php 
                        echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                        get_msg('msgok');
                        get_msg('msgerro');
                    ?>
                    <div class="form-padrao">
                    <table class="table table-striped table-bordered form-padrao data-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Status</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->dpto->get_dpto_all()->result();
                                foreach ($query as $linha):
                                    echo '<tr>';
                                    printf('<td>%s</td>', $linha->nome);
                                    printf('<td>%s</td>', $linha->status);
                                    printf('<td>%s %s</td>', 
                                    anchor("admin/editar_departamento/$linha->id", '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class'=>'table-actions', 'title'=>'Editar')),
                                    anchor("admin/excluir_departamento/$linha->id", '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('class'=>'table-actions deletareg gl-red', 'onclick'=>'return confirm(\'Deseja realmente excluir este DEPARTAMENTO?\')', 'title'=>'Excluir')));
                                    echo '</tr>';
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                    </div>
                <?php
            break;
                    
            
            // Tela de Editar
            case 'editar_departamento':
            $id_dpto = $this->uri->segment(3);
            if($id_dpto==NULL):
                set_msg('msgerro', 'Escolha um departamento para alterar','erro');
                redirect('admin/gerenciar_departamento');
            endif;
            echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
            $query = $this->dpto->get_dpto_byid($id_dpto)->row();
            echo form_open(current_url(), array('class'=>'form-padrao'));
            erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');
            echo '<div class="form-group">';
            echo form_label('Departamento:');
            echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome', $query->nome), 'autofocus');
            echo '</div>';
            echo '<div class="form-group">';
            echo form_label('Status:');
            echo form_input(array('name'=>'status', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('status', $query->status));
            echo '</div>';  
            echo form_hidden('id_dpto', $id_dpto);
            echo '<hr>';           
            echo anchor('admin/gerenciar_departamento','<i class="fa fa-reply"></i> Listar departamentos',array('class'=>'btn btn-primary btn-padrao'));          
            ?><button name="editar_departamento" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php
            echo form_close();      
            break;


//====================  Telas Permissões

            // Tela de Cadastro Perm
            case 'cadastro_permissoes':
                echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                echo form_open('admin/cadastro_permissoes',array('class'=>'form-padrao'));
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo '<div class="form-group">';
                echo form_label('Permissão');
                echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome'), 'autofocus');
                echo '</div>';
                echo '<div class="form-group">';
                echo form_label('Status');
                echo form_input(array('name'=>'status', 'class'=>'form-control campo6'), set_value('status'));
                echo '</div>';     
                echo '<hr>';                
                echo anchor('admin/gerenciar_permissoes','<i class="fa fa-reply"></i> Listar permissões',array('class'=>'btn btn-primary btn-padrao'));          
                ?><button name="cadastro_permissoes" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php
                echo form_close();
            break;
                    
                    
            // Tela de Gerenciar Perm
            case 'gerenciar_permissoes':
                ?>
                    <?php 
                        echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                        get_msg('msgok');
                        get_msg('msgerro');
                    ?>
                    <div class="form-padrao">
                    <table class="table table-striped table-bordered form-padrao data-table">
                        <thead>
                            <tr>
                                <th>Permissão</th>
                                <th>Status</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->perm->get_perm_sis_all()->result();
                                foreach ($query as $linha):
                                    echo '<tr>';
                                    printf('<td>%s</td>', $linha->nome);
                                    printf('<td>%s</td>', $linha->status);
                                    printf('<td>%s</td>', 
                                    anchor("admin/editar_permissoes/$linha->id", '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class'=>'table-actions', 'title'=>'Editar')));
                                    echo '</tr>';
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                    </div>
                <?php
            break;
                    
            
            // Tela de Editar permissões
            case 'editar_permissoes':
            $id_perm_sis = $this->uri->segment(3);
            if($id_perm_sis==NULL):
                set_msg('msgerro', 'Escolha uma permissão para alterar','erro');
                redirect('admin/gerenciar_permissoes');
            endif;
            echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
            $query = $this->perm->get_perm_sis_byid($id_perm_sis)->row();
            echo form_open(current_url(), array('class'=>'form-padrao'));
            erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');
            echo '<div class="form-group">';
            echo form_label('Permissão:');
            echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome', $query->nome), 'autofocus');
            echo '</div>'; 
            echo '<div class="form-group">';
            echo form_label('Status:');
            echo form_input(array('name'=>'status', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('status', $query->status));
            echo '</div>';  
            echo form_hidden('id_perm_sis', $id_perm_sis);
            echo '<hr>';
            echo anchor('admin/gerenciar_permissoes','<i class="fa fa-reply"></i> Listar permissões',array('class'=>'btn btn-primary btn-padrao'));          
            ?><button name="editar_permissoes" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php   
            echo form_close();      
            break;
                                
                    
//====================  Tela Recado

            // Tela de Editar Recado
            case 'editar_recado':
                echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                $query = $this->info->get_recado_byid(1)->row();
                echo form_open(current_url(), array('class'=>'form-padrao'));
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo '<div class="form-group">';
                echo form_label('Digite o recado:'); echo '<i> [máx. de 240 caracteres]</i>';
                echo form_textarea(array('name'=>'recado', 'class'=>'form-control campo6'), set_value('recado', $query->recado), 'autofocus');
                echo '</div>';     
                echo '<hr>';
                echo anchor('home','<i class="fa fa-reply"></i> Voltar',array('class'=>'btn btn-primary btn-padrao'));          
                ?><button name="editar_recado" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php         
                echo form_close();      
            break;
                    
                    
//====================  Tela Agenda

            // Tela de Cadastro Agenda
            case 'cadastro_agenda':                   
                echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                echo form_open('servicos/cadastro_agenda',array('class'=>'form-padrao'));
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo '<div class="form-group">';
                echo form_label('Título:');
                echo form_input(array('name'=>'titulo', 'class'=>'form-control campo6'), set_value('titulo'), 'autofocus');
                echo '</div>';
                echo '<div class="form-group">';
                echo form_label('Data:');
                echo '<div class="input-group date form_date campo6" data-date="" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">'; 
                echo form_input(array('name'=>'data', 'class'=>'form-control campo6'), set_value('data'), 'readonly');
                echo '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';
                echo '</div></div>';                      
                echo '<div class="form-group">';
                echo form_label('Horário:');
                echo '<div class="input-group date form_time campo6" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">';
                echo form_input(array('name'=>'hora', 'class'=>'form-control campo6'), set_value('hora'), 'readonly');
                echo '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>';
                echo '</div></div>';
                
                ?>
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
                    $('.form_time').datetimepicker({
                        language:  'pt-BR',
                        weekStart: 1,
                        todayBtn:  1,
                        autoclose: 1,
                        todayHighlight: 1,
                        startView: 1,
                        minView: 0,
                        maxView: 1,
                        forceParse: 0
                    });
                </script>
                
                <?php
                echo '<div class="form-group">';
                echo form_label('Observação:');
                echo form_input(array('name'=>'obs', 'class'=>'form-control campo6'), set_value('obs'));
                echo '</div>';
                echo '<hr>';                
                echo anchor('servicos/gerenciar_agenda','<i class="fa fa-reply"></i> Listar agenda',array('class'=>'btn btn-primary btn-padrao'));          
                ?><button name="cadastro_agenda" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php          
                echo form_close();
            break;


            // Tela de Editar Agenda
            case 'editar_agenda':
               $id = $this->uri->segment(3);
                if($id==NULL):
                    set_msg('msgerro', 'Escolha um evento para alterar','erro');
                    redirect('servicos/gerenciar_agenda');
                endif;
                echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                $query = $this->info->get_agenda_byid($id)->row();
                echo form_open(current_url(), array('class'=>'form-padrao'));
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo '<div class="form-group">';
                echo form_label('Título:');
                echo form_input(array('name'=>'titulo', 'class'=>'form-control campo6'), set_value('titulo', $query->titulo), 'autofocus');
                echo '</div>';
                echo '<div class="form-group">';
                echo form_label('Data:');
                $data_br = converte_data_br($query->data);
                echo '<div class="input-group date form_date campo6" data-date="" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">'; 
                echo form_input(array('name'=>'data', 'class'=>'form-control campo6'), set_value('data', $data_br), 'readonly');
                echo '<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>';
                echo '</div></div>';                      
                echo '<div class="form-group">';
                echo form_label('Horário:');
                echo '<div class="input-group date form_time campo6" data-date="" data-date-format="hh:ii" data-link-field="dtp_input3" data-link-format="hh:ii">';
                echo form_input(array('name'=>'hora', 'class'=>'form-control campo6'), set_value('hora', $query->hora), 'readonly');
                echo '<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>';
                echo '</div></div>';
                echo form_hidden('id', $id);
                ?>
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
                    $('.form_time').datetimepicker({
                        language:  'pt-BR',
                        weekStart: 1,
                        todayBtn:  1,
                        autoclose: 1,
                        todayHighlight: 1,
                        startView: 1,
                        minView: 0,
                        maxView: 1,
                        forceParse: 0
                    });
                </script>
                
                <?php
                echo '<div class="form-group">';
                echo form_label('Observação:');
                echo form_input(array('name'=>'obs', 'class'=>'form-control campo6'), set_value('obs', $query->obs));
                echo '</div>';
                echo '<hr>';               
                echo anchor('servicos/gerenciar_agenda','<i class="fa fa-reply"></i> Listar agenda',array('class'=>'btn btn-primary btn-padrao'));          
                ?><button name="editar_agenda" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php
                echo form_close();
            break;
                    
                    
            // Tela de Gerenciar Agenda
            case 'gerenciar_agenda':
                ?>
                <?php 
                    echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                    get_msg('msgok');
                    get_msg('msgerro');
                ?>
                <div class="form-padrao">
                <table class="table table-striped table-bordered form-padrao data-table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Observação</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query = $this->info->get_agenda_all()->result();
                            foreach ($query as $linha):
                                echo '<tr>';
                                printf('<td>%s</td>', $linha->titulo);
                                printf('<td>%s</td>', $linha->data);
                                printf('<td>%s</td>', $linha->hora);
                                printf('<td>%s</td>', $linha->obs);
                                printf('<td>%s %s</td>', 
                                anchor("servicos/editar_agenda/$linha->id", '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class'=>'table-actions', 'title'=>'Editar')),
                                anchor("servicos/excluir_agenda/$linha->id", '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('class'=>'table-actions deletareg gl-red', 'onclick'=>'return confirm(\'Deseja realmente excluir este EVENTO?\')', 'title'=>'Excluir')));
                                echo '</tr>';
                            endforeach;
                        ?>
                    </tbody>
                </table>
                </div>
                <?php
            break;
                    
                    
            // Tela de Visualização de Agenda para usuários comuns
            case 'ver_agenda':
                ?>
                     <h4><img src="gl/glyphicons-46-calendar.png"> Agenda Completa</h4><hr>
                     <table class="table table-striped table-bordered form-padrao data-table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Observação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->info->get_agenda_all()->result();
                                foreach ($query as $linha):
                                    echo '<tr>';
                                    printf('<td>%s</td>', $linha->titulo);
                                    printf('<td>%s</td>', $linha->data);
                                    printf('<td>%s</td>', $linha->hora);
                                    printf('<td>%s</td>', $linha->obs);
                                    echo '</tr>';
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                <?php
            break;
            

//====================  Telas tela
     
            // Tela de Gerenciar Perm Tela
            case 'gerenciar_permissoes_tela':
                                
                    echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                    get_msg('msgok');
                    get_msg('msgerro');
                    ?>
                    <div class="form-padrao">
                    <table class="table table-striped table-bordered form-padrao data-table">
                        <thead>
                            <tr>
                                <th>Nome da tela</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->perm->get_perm_tela_all()->result();
                                foreach ($query as $linha):
                                    echo '<tr>';
                                    printf('<td>%s</td>', $linha->nome);
                                    printf('<td>%s</td>', 
                                    anchor("admin/editar_permissoes_tela/$linha->id", '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class'=>'table-actions', 'title'=>'Adicionar Usuário')));
                                    echo '</tr>';
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                    </div>
                <?php
            break;
                    
            
            // Tela de Editar permissões tela
            case 'editar_permissoes_tela':
                
            $id_tela = $this->uri->segment(3);
            if($id_tela==NULL):
                set_msg('msgerro', 'Escolha uma permissão para alterar','erro');
                redirect('admin/gerenciar_permissoes_tela');
            endif;
            echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
            $query = $this->perm->get_perm_tela_byid($id_tela)->row();
            echo form_open(current_url(), array('class'=>'form-padrao'));
            erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');
            echo '<div class="form-group">';
            echo form_label('Nome da tela:');
            echo form_input(array('name'=>'tela', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('tela', $query->nome));
            echo '</div>'; 
            echo '<div class="form-group">';
            echo form_label('Legenda de permissão:');echo '<br />';
            echo '<p>'.$query->obs.'</p>';
            echo '</div><hr>';
            ?>
            <table class="table table-striped table-bordered form-padrao">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Ativo</th>
                            <th>Departamento</th>
                            <th>Função</th>
                            <th>Nível de Acesso</th>
                            <th>Operações</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $query_perm = $this->perm->get_tela_byid($id_tela)->result();
                            foreach ($query_perm as $linha_perm):
                                $id_usuario        = $linha_perm->usuario_id;
                                $query_usuario     = $this->usuarios->get_byid($id_usuario)->row();
                                $id_dpto           = $query_usuario->id_dpto;
                                $id_perm_cargo     = $query_usuario->id_perm_cargo;
                                $query_dpto        = $this->dpto->get_dpto_byid($id_dpto)->row();
                                $query_perm_cargo  = $this->perm->get_perm_cargo_byid($id_perm_cargo)->row();
                                echo '<tr>';
                                printf('<td>%s</td>', $query_usuario->nome);
                                printf('<td>%s</td>', ($query_usuario->ativo==0)? '<span class="glyphicon glyphicon-ban-circle gl-red" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-ok-circle gl-green" aria-hidden="true"></span>');
                                printf('<td>%s</td>', $query_dpto->nome);
                                printf('<td>%s</td>', $query_perm_cargo->nome);
                                printf('<td>Nível %s</td>', $linha_perm->perm);
                                printf('<td>%s</td>', anchor("admin/excluir_permissoes_tela/".$id_tela."/".$id_usuario, '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', array('class'=>'table-actions table-delete deletareg gl-red', 'onclick'=>'return confirm(\'Deseja realmente remover a permissão desse USUÁRIO?\')', 'title'=>'Remover da Tela')));
                                echo '</tr>';
                            endforeach;
                       ?>
                    </tbody>
                    <tfoot>
                     <tr>
                       <td colspan="8" style="text-align: left;">
                         <?php echo anchor('admin/adicionar_usuarios_tela/'.$id_tela,'<i class="fa fa-plus-circle"></i> Adicionar Usuário',array('class'=>'btn btn-xs btn-success'));?>
                       </td>
                     </tr>
                    </tfoot>
                </table>
            <?php
            echo form_hidden('id_tela', $id_tela);
            echo '<hr>';
            echo anchor('admin/gerenciar_permissoes_tela','<i class="fa fa-reply"></i> Listar telas',array('class'=>'btn btn-primary btn-padrao'));          
            echo form_close();      
            break;  
            
            
            // Tela de Adicionar usuários da Tela
        case 'adicionar_usuarios_tela':
            ?>
            
                <script type="text/javascript">                
                    var user_array = [];
                    
                    function SelecionarUsuario(btn){

                        if(btn.value == "Marcar"){
                            $("#error").empty();                                                        
                            var linha = btn.id;
                            var id_tela = $("#id_tela").val();
                            var id_usuario = $("#id_usuario_"+linha).val();
                            var id_perm_tela = $("#id_perm_tela_"+linha).val();
                            
                            if(id_perm_tela == 0){
                                var msg = '<div class="alert alert-danger" role="alert"><p>Escolha um NÍVEL DE PERMISSÃO para selecionar o usuário!<br /></div>';
                                $("#error").append(msg);
                            }else{
                                btn.setAttribute("class","btn btn-xs btn-danger"); 
                                btn.value="Desmarcar";
                                
                                user_array.push([id_tela,id_usuario,id_perm_tela]);                        
                                console.log(user_array);
                            }
                        }else{
                           var linha = btn.id;
                           var id_usuario = $("#id_usuario_"+linha).val();

                            for(var i = 0; i < user_array.length; i++) {
                               if(user_array[i][1] == id_usuario) {
                                   user_array.splice(i, 1);
                               }
                            }
                            console.log(user_array);
                            btn.setAttribute("class","btn btn-xs btn-primary"); 
                            btn.value="Marcar";
                            document.getElementById('id_perm_tela_'+linha).value=0;
                        }                           
                    }
                    
                    function EnviarUsuario(btn){
                        $("#error").empty(); 
                        if(user_array.length == 0){
                            var msg = '<div class="alert alert-danger" role="alert"><p>Selecione pelo menos um USUÁRIO para adicionar à tela!<br /></div>';
                            $("#error").append(msg);
                        }else{
                           var json_user_array = JSON.stringify(user_array);
                           document.getElementById('user_array').value = json_user_array;
                           document.getElementById('nlinha').value = user_array.length;
                           $("#form_adicionar_usuario").submit();
                        }
                    }
                </script>         
            
                <?php
                    $id_tela = $this->uri->segment(3); 
                    echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                    echo form_open('admin/adicionar_usuario', array('class'=>'form-padrao', 'id'=>'form_adicionar_usuario'));
                    get_msg('msgok');
                    get_msg('msgerro');
                    $query_tela = $this->perm->get_perm_tela_byid($id_tela)->row();
                    $query_usuario_tela = $this->perm->get_tela_byid($id_tela)->result();
                    foreach ($query_usuario_tela as $linha):
                        $usuario_com_perm[] = $linha->usuario_id;
                    endforeach;   
                                         
                    echo '<div class="form-group">';
                    echo form_label('Nome da tela:');
                    echo form_input(array('name'=>'tela', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('tela', $query_tela->nome));
                    echo '</div>'; 
                    echo '<div class="form-group">';
                    echo form_label('Legenda de permissão:');echo '<br />';
                    echo '<p>'.$query_tela->obs.'</p>';
                    echo '</div><hr>';
                    echo '<div id="error"></div>'; 
                ?>
                
                <table class="table table-striped table-bordered form-padrao data-table-nosorting">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nome</th>
                            <th>Ativo</th>
                            <th>Departamento</th>
                            <th>Função</th>
                            <th>Nível de permissão</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(!isset($usuario_com_perm)){
                                $query = $this->usuarios->get_all_orderbydpto()->result();
                            }else{
                                $query = $this->usuarios->get_all_orderbydpto_parm($usuario_com_perm)->result();
                            }
                            $i = 0;
                            foreach ($query as $linha):
                                $id_dpto           = $linha->id_dpto;
                                $id_perm_cargo     = $linha->id_perm_cargo;
                                $id_perm_sis       = $linha->id_perm_sis;
                                $query_dpto        = $this->dpto->get_dpto_byid($id_dpto)->row();
                                $query_perm_cargo  = $this->perm->get_perm_cargo_byid($id_perm_cargo)->row();
                                $query_perm_sis    = $this->perm->get_perm_sis_byid($id_perm_sis)->row();
                                echo '<tr>';
                                printf('<td>%s</td>', $i);
                                printf('<td>%s</td>', $linha->nome);
                                printf('<td>%s</td>', ($linha->ativo==0)? '<span class="glyphicon glyphicon-ban-circle gl-red" aria-hidden="true"></span>' : '<span class="glyphicon glyphicon-ok-circle gl-green" aria-hidden="true"></span>');
                                printf('<td>%s</td>', $query_dpto->nome);
                                printf('<td>%s</td>', $query_perm_cargo->nome);
                                echo '<td>';

                                
                                $perm_tela_array = array('0' => 'Escolha um nível de acesso',
                                                          '1' => 'Nível 1',
                                                          '2' => 'Nível 2',
                                                          '3' => 'Nível 3',
                                                          '4' => 'Nível 4',
                                                          '5' => 'Nível 5');
                                echo form_dropdown('id_perm_tela_'.$i, $perm_tela_array,'','id=id_perm_tela_'.$i).'<span>&nbsp;</span>';
                                ?>
                                <!-- adicionar icone ao botão -->
                                <input class="btn btn-xs btn-primary" onclick="SelecionarUsuario(this)" type="button" value="Marcar" id="<?php echo $i ?>"></input>
                                <input type="hidden" name="<?php echo 'id_usuario_'.$i ?>" value="<?php echo $linha->id ?>" id="<?php echo 'id_usuario_'.$i ?>">
                                
                                <?php   
                                echo '</td>';
                                echo '</tr>';
                                $i++;
                            endforeach;
                            
                        ?>
                    </tbody>
                    <td colspan="8" style="text-align: left;">
                         <button class="btn btn-xs btn-success" onclick="EnviarUsuario(this)" type="button"><i class="fa fa-plus-circle"></i> Adicionar Usuário(s)</button>
                    </td>
                </table>
                <input type="hidden" name="id_tela" value="<?php echo $id_tela ?>" id="id_tela">
                <input type="hidden" name="user_array" value="" id="user_array">
                <input type="hidden" name="nlinha" value="" id="nlinha">                      
            <?php
            echo form_close();  
        break;
            
            
//====================  Telas GRUPO

            // Tela de Cadastro GRUPO
            case 'cadastro_funcao':
                echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                echo form_open('admin/cadastro_funcao',array('class'=>'form-padrao'));
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo '<div class="form-group">';
                echo form_label('Grupo');
                echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome'), 'autofocus');
                echo '</div>';
                echo '<div class="form-group">';
                echo form_label('Status');
                echo form_input(array('name'=>'status', 'class'=>'form-control campo6'), set_value('status'));
                echo '</div>';
                echo '<hr>';                
                echo anchor('admin/gerenciar_funcao','<i class="fa fa-reply"></i> Listar grupos',array('class'=>'btn btn-primary btn-padrao'));          
                ?><button name="cadastro_funcao" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php      
                echo form_close();
            break;
                    
                    
            // Tela de Gerenciar GRUPO
            case 'gerenciar_funcao':
                
                        echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                        get_msg('msgok');
                        get_msg('msgerro');
                    ?>
                    <div class="form-padrao">
                    <table class="table table-striped table-bordered form-padrao data-table">
                        <thead>
                            <tr>
                                <th>Grupo</th>
                                <th>Status</th>
                                <th>Operações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query = $this->perm->get_perm_cargo_all()->result();
                                foreach ($query as $linha):
                                    echo '<tr>';
                                    printf('<td>%s</td>', $linha->nome);
                                    printf('<td>%s</td>', $linha->status);
                                    printf('<td>%s', anchor("admin/editar_funcao/$linha->id", '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>', array('class'=>'table-actions', 'title'=>'Editar')));
                                    $msg  = "Deseja realmente excluir este GRUPO?";
                                    $link = "../../admin/excluir_funcao/".$linha->id;
                                    echo'<a href="javascript:" class="glyphicon glyphicon-remove gl-red" name="btn_excluir" title="Excluir" onclick="ConfirmMsg(\''.$msg.'\',\''.$link.'\')"></a></td>';                                    
                                    echo '</tr>';
                                endforeach;
                            ?>
                        </tbody>
                    </table>
                    </div>
                <?php
            break;
                    
            
            // Tela de Editar GRUPO
            case 'editar_funcao':
            $id_perm_cargo = $this->uri->segment(3);
            if($id_perm_cargo==NULL):
                set_msg('msgerro', 'Escolha uma função para alterar','erro');
                redirect('admin/gerenciar_funcao');
            endif;
            echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
            $query = $this->perm->get_perm_cargo_byid($id_perm_cargo)->row();
            echo form_open(current_url(), array('class'=>'form-padrao'));
            erros_validacao();
            get_msg('msgok');
            get_msg('msgerro');
            echo '<div class="form-group">';
            echo form_label('Grupo:');
            echo form_input(array('name'=>'nome', 'class'=>'form-control campo6'), set_value('nome', $query->nome), 'autofocus');
            echo '</div>'; 
            echo '<div class="form-group">';
            echo form_label('Status:');
            echo form_input(array('name'=>'status', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('status', $query->status));
            echo '</div>';  
            echo form_hidden('id_perm_cargo', $id_perm_cargo);
            echo '<hr>';
            echo anchor('admin/gerenciar_funcao','<i class="fa fa-reply"></i> Listar grupos',array('class'=>'btn btn-primary btn-padrao'));          
            ?><button name="editar_funcao" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-floppy-o"></i> Salvar Dados</button><?php         
            echo form_close();      
            break;      
            
            
//====================  Tela OSTI

            // Tela de envio de OSTI
            case 'enviar_osti':
                $CI =& get_instance();
                echo '<ol class="breadcrumb caminho">'.breadcrumb().'</ol>';
                echo form_open(current_url(), array('class'=>'form-padrao'));
                erros_validacao();
                get_msg('msgok');
                get_msg('msgerro');
                echo '<h4><img src="gl/glyphicons-87-display.png"> Ordem de Solicitação de TI</h4>';
                echo '<hr>';
                echo '<div class="form-group">';
                echo form_label('Título do problema:');
                echo form_input(array('name'=>'titulo', 'class'=>'form-control campo6', 'placeholder'=>'Digite o assunto da solicitação'), set_value('titulo'), 'autofocus');
                echo '</div>';  
                echo '<div class="form-group">';
                echo form_label('<i class="fa fa-comment-o"></i> Descrição do problema:'); echo '<i> [máx. de 520 caracteres]</i>';
                echo form_textarea(array('name'=>'des', 'class'=>'form-control campo6', 'placeholder'=>'Digite os detalhes da solicitação'), set_value('des'));
                echo '</div>';
                echo '<div class="form-group">';
                echo form_label('E-mail do solicitante:');
                echo form_input(array('name'=>'email', 'class'=>'form-control campo6', 'disabled'=>'disabled'), set_value('email', $CI->session->userdata('user_email')));
                echo '</div>';       
                echo '<hr>';
                echo anchor('home','<i class="fa fa-reply"></i> Voltar',array('class'=>'btn btn-primary btn-padrao'));          
                ?><button name="enviar_osti" class="btn btn-success btn-padrao" type="submit"><i class="fa fa-share"></i> Enviar</button><?php            
                echo form_close();      
            break;               
	   			
			default:
				echo '<div class="alert-box alert"><p>A tela solicitada não existe</p></div>';
			break;           
	endswitch;