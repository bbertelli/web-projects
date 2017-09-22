<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	switch ($tela):
			
		case 'cadastrar':
			echo '<div class="twelve columns">';
			echo breadcrumb();
			erros_validacao();
			get_msg('msgok');
			get_msg('msgerro');
			echo form_open_multipart('media/cadastrar',array('class'=>'custom'));
			echo form_fieldset('Upload de media');	
			echo form_label('Nome para exibição');
			echo form_input(array('name'=>'nome', 'class'=>'five'), set_value('nome'), 'autofocus');
			echo form_label('Descrição');
			echo form_input(array('name'=>'descricao', 'class'=>'five'), set_value('descricao'));
			echo form_label('Arquivo');
			echo form_upload(array('name'=>'arquivo', 'class'=>'twelve'), set_value('arquivo'));
			echo anchor('media/gerenciar','Cancelar',array('class'=>'button radius alert espaco'));			
			echo form_submit(array('name'=>'cadastrar','class'=>'button radius'), 'Salvar Dados');
			echo form_fieldset_close();
			echo form_close();
			echo '</div>';
		break;
		
		case 'gerenciar':
			?>
			<script type="text/javascript">
				$(function(){
					$('.deletareg').click(function(){
						if(confirm("Deseja realmente excluir este registro?\nEsta operação não podera ser desfeita!")) return true; else return false;
					});
				});
			</script>
			<div class="twelve columns">
				<?php 
					echo breadcrumb();
					get_msg('msgok');
					get_msg('msgerro');
				?>
				<table class="twelve data-table">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Login</th>
							<th>E-mail</th>
							<th>Ativo / ADM</th>
							<th>Operações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $this->usuarios->get_all()->result();
							foreach ($query as $linha):
								echo '<tr>';
								printf('<td>%s</td>', $linha->nome);
								printf('<td>%s</td>', $linha->login);
								printf('<td>%s</td>', $linha->email);
								printf('<td>%s / %s</td>', ($linha->ativo==0)? 'Não' : 'Sim', ($linha->adm==0)? 'Não' : 'Sim');
								printf('<td class="text-center">%s%s%s</td>', anchor("usuarios/editar/$linha->id", ' ', array('class'=>'table-actions table-edit', 'title'=>'Editar')),
								anchor("usuarios/alterar_senha/$linha->id", ' ', array('class'=>'table-actions table-pass', 'title'=>'Alterar Senha')),
								anchor("usuarios/excluir/$linha->id", ' ', array('class'=>'table-actions table-delete deletareg', 'title'=>'Excluir')));
								echo '</tr>';
							endforeach;
						?>
					</tbody>
				</table>
			</div>
			<?php
		break;
		
		case 'alterar_senha':
			$iduser = $this->uri->segment(3);
			if($iduser==NULL):
				set_msg('msgerro', 'Escolha um usuário para alterar','erro');
				redirect('usuarios/gerenciar');
			endif; ?>
			<div class="twelve columns">
				<?php
					echo breadcrumb(); 
					if (is_admin() || $iduser == $this->session->userdata('user_id')):
						$query = $this->usuarios->get_byid($iduser)->row();
						erros_validacao();
						get_msg('msgok');
						echo form_open(current_url(), array('class'=>'custom'));
						echo form_fieldset('Alterar senha');
						echo form_label('Nome Completo');
						echo form_input(array('name'=>'nome', 'class'=>'five', 'disabled'=>'disabled'), set_value('nome', $query->nome));
						echo form_label('E-mail');
						echo form_input(array('name'=>'email', 'class'=>'five', 'disabled'=>'disabled'), set_value('email', $query->email));
						echo form_label('Login');
						echo form_input(array('name'=>'login', 'class'=>'three', 'disabled'=>'disabled'), set_value('login', $query->login));
						echo form_label('Nova Senha');
						echo form_password(array('name'=>'senha', 'class'=>'three'), set_value('senha'), 'autofocus');
						echo form_label('Repita a Senha');
						echo form_password(array('name'=>'senha2', 'class'=>'three'), set_value('senha2'));
						echo anchor('usuarios/gerenciar','Cancelar',array('class'=>'button radius alert espaco'));			
						echo form_submit(array('name'=>'alterarsenha','class'=>'button radius'), 'Salvar Dados');
						echo form_hidden('idusuario', $iduser);
						echo form_fieldset_close();
						echo form_close();		
					else:
						set_msg('msgerro', 'Seu usuário não tem permissão para executar esta operação','erro');
						redirect('usuarios/gerenciar');
					endif; ?>
			</div>
			<?php
			break;
			
			case 'editar':
			$iduser = $this->uri->segment(3);
			if($iduser==NULL):
				set_msg('msgerro', 'Escolha um usuário para alterar','erro');
				redirect('usuarios/gerenciar');
			endif; ?>
			<div class="twelve columns">
				<?php
					echo breadcrumb(); 
					if (is_admin() || $iduser == $this->session->userdata('user_id')):
						$query = $this->usuarios->get_byid($iduser)->row();
						erros_validacao();
						get_msg('msgok');
						echo form_open(current_url(), array('class'=>'custom'));
						echo form_fieldset('Alterar usuário');
						echo form_label('Nome Completo');
						echo form_input(array('name'=>'nome', 'class'=>'five'), set_value('nome', $query->nome), 'autofocus');
						echo form_label('E-mail');
						echo form_input(array('name'=>'email', 'class'=>'five', 'disabled'=>'disabled'), set_value('email', $query->email));
						echo form_label('Login');
						echo form_input(array('name'=>'login', 'class'=>'three', 'disabled'=>'disabled'), set_value('login', $query->login));
						echo form_checkbox(array('name'=>'ativo'), '1', $query->ativo==1 ? TRUE : FALSE).' Ativo no Sistema<br /><br />';
						echo form_checkbox(array('name'=>'adm'), '1', $query->adm==1 ? TRUE : FALSE).' Permissão de Administrador<br /><br />';
						echo anchor('usuarios/gerenciar','Cancelar',array('class'=>'button radius alert espaco'));			
						echo form_submit(array('name'=>'editar','class'=>'button radius'), 'Salvar Dados');
						echo form_hidden('idusuario', $iduser);
						echo form_fieldset_close();
						echo form_close();		
					else:
						set_msg('msgerro', 'Seu usuário não tem permissão para executar esta operação','erro');
						redirect('usuarios/gerenciar');
					endif; ?>
			</div>
			<?php
			break;
				
			default:
				echo '<div class="alert-box alert"><p>A tela solicitada não existe</p></div>';
			break;
	endswitch;