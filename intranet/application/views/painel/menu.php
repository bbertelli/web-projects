<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Carga do Menu Inicial do Site 
 */


	switch ($tela):
        
        /* Menu do painel inicial */
		case 'home':
			
            echo'<div class="menu">     
                        <div class="navbar navbar-default">
                            <div class="navbar-form navbar-right">';
                                echo anchor('home/load_login', '<span class="glyphicon glyphicon-cog" aria-hidden="true"></span> SERVIÇOS', 'class="btn btn-primary btn-sm btn-adm"'); echo'
                            </div>  
                            <div>
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menubar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div>
                                        <div class="collapse navbar-collapse" id="menubar">
                                            <ul class="nav navbar-nav">
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span>'); echo'</li>
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-earphone" aria-hidden="true"> RAMAIS</span>'); echo'</li>
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-info-sign" aria-hidden="true"> SOBRE</span>'); echo'</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>   
                </div>';
		break;
        
        
        /* Menu de serviços para usuários */
        case 'usuarios':
            
            echo'<div class="menu">     
                        <div class="navbar navbar-default">
                            <div>
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menubar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div>
                                        <div class="collapse navbar-collapse" id="menubar">
                                            <ul class="nav navbar-nav">
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-stats" aria-hidden="true"> SGQ</span>'); echo'</li>
                                                <li class="dropdown">
                                                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> RECOM</span> <span class="caret"></span></a>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li>'; echo anchor('recom/nova','<span class="glyphicon glyphicon-plus" aria-hidden="true"> NOVA</span>'); echo'</li>
                                                    <li>'; echo anchor('recom/consultar','<span class="glyphicon glyphicon-search" aria-hidden="true"> CONSULTAR</span>'); echo'</li>
                                                    <li>'; echo anchor('recom/gerenciar','<span class="glyphicon glyphicon-th-list" aria-hidden="true"> GERENCIAR</span>'); echo'</li>
                                                  </ul>
                                                </li>
                                                <li>'; echo anchor('servicos/enviar_osti','<span class="glyphicon glyphicon-blackboard" aria-hidden="true"> OSTI</span>'); echo'</li>
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-wrench" aria-hidden="true"> OSM</span>'); echo'</li>
                                                <li>'; echo anchor('servicos/ver_agenda','<span class="glyphicon glyphicon-calendar" aria-hidden="true"> AGENDA</span>'); echo'</li>
                                            </ul>                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>   
                </div>';
        break;
        
        /* Menu de serviços para puser */
        case 'puser':
            
            echo'<div class="menu">     
                        <div class="navbar navbar-default">
                            <div>
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menubar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div>
                                        <div class="collapse navbar-collapse" id="menubar">
                                            <ul class="nav navbar-nav">
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-stats" aria-hidden="true"> SGQ</span>'); echo'</li>
                                                <li class="dropdown">
                                                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> RECOM</span> <span class="caret"></span></a>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li>'; echo anchor('recom/nova','<span class="glyphicon glyphicon-plus" aria-hidden="true"> NOVA</span>'); echo'</li>
                                                    <li>'; echo anchor('recom/consultar','<span class="glyphicon glyphicon-search" aria-hidden="true"> CONSULTAR</span>'); echo'</li>
                                                    <li>'; echo anchor('recom/gerenciar','<span class="glyphicon glyphicon-th-list" aria-hidden="true"> GERENCIAR</span>'); echo'</li>
                                                  </ul>
                                                </li>
                                                <li>'; echo anchor('servicos/enviar_osti','<span class="glyphicon glyphicon-blackboard" aria-hidden="true"> OSTI</span>'); echo'</li>
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-wrench" aria-hidden="true"> OSM</span>'); echo'</li>
                                                <li>'; echo anchor('servicos/editar_recado','<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"> RECADO</span>'); echo'</li>
                                                <li class="dropdown">
                                                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-calendar" aria-hidden="true"> AGENDA</span> <span class="caret"></span></a>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li>'; echo anchor('servicos/cadastro_agenda','<span class="glyphicon glyphicon-pencil" aria-hidden="true"> CADASTRAR</span>'); echo'</li>
                                                    <li>'; echo anchor('servicos/gerenciar_agenda','<span class="glyphicon glyphicon-th-list" aria-hidden="true"> GERENCIAR</span>'); echo'</li>
                                                  </ul>
                                                </li>
                                            </ul>                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>   
                </div>';
        break;
        
        /* Menu de serviços para administradores */
        case 'admin':
            
            echo'<div class="menu">     
                        <div class="navbar navbar-default">
                            <div>
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menubar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div>
                                        <div class="collapse navbar-collapse" id="menubar">
                                            <ul class="nav navbar-nav">
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-stats" aria-hidden="true"> SGQ</span>'); echo'</li>
                                                <li class="dropdown">
                                                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"> RECOM</span> <span class="caret"></span></a>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li>'; echo anchor('recom/nova','<span class="glyphicon glyphicon-plus" aria-hidden="true"> NOVA</span>'); echo'</li>
                                                    <li>'; echo anchor('recom/consultar','<span class="glyphicon glyphicon-search" aria-hidden="true"> CONSULTAR</span>'); echo'</li>
                                                    <li>'; echo anchor('recom/gerenciar','<span class="glyphicon glyphicon-th-list" aria-hidden="true"> GERENCIAR</span>'); echo'</li>
                                                  </ul>
                                                </li>
                                                <li>'; echo anchor('servicos/enviar_osti','<span class="glyphicon glyphicon-blackboard" aria-hidden="true"> OSTI</span>'); echo'</li>
                                                <li>'; echo anchor('home','<span class="glyphicon glyphicon-wrench" aria-hidden="true"> OSM</span>'); echo'</li>
                                                <li class="dropdown">
                                                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-pencil" aria-hidden="true"> CADASTRAR</span> <span class="caret"></span></a>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li>'; echo anchor('admin/cadastro_usuario','<span class="glyphicon glyphicon-user" aria-hidden="true"> USUÁRIO</span>'); echo'</li>
                                                    <li>
                                                        <a><span class="glyphicon glyphicon-object-align-bottom" aria-hidden="true"> EMPRESA&nbsp</span><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></a>
                                                        <ul class="dropdown-menu sub-menu">
                                                            <li class="divider"></li>
                                                            <li>'; echo anchor('admin/cadastro_departamento','<span class="glyphicon glyphicon-folder-close" aria-hidden="true"> DEPARTAMENTOS</span>'); echo'</li>
                                                            <li>'; echo anchor('admin/cadastro_funcao','<span class="glyphicon glyphicon-briefcase" aria-hidden="true"> GRUPOS</span>'); echo'</li>
                                                            <li class="divider"></li>    
                                                        </ul>
                                                    </li> 
                                                    <li class="divider"></li>
                                                    <li>'; echo anchor('servicos/cadastro_agenda','<span class="glyphicon glyphicon-calendar" aria-hidden="true"> AGENDA</span>'); echo'</li>
                                                    <li>'; echo anchor('servicos/editar_recado','<span class="glyphicon glyphicon-bullhorn" aria-hidden="true"> RECADO</span>'); echo'</li>                                       
                                                  </ul>
                                                </li>
                                                <li class="dropdown">
                                                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th-list" aria-hidden="true"> GERENCIAR</span> <span class="caret"></span></a>
                                                  <ul class="dropdown-menu" role="menu">
                                                    <li>'; echo anchor('admin/gerenciar_usuario','<span class="glyphicon glyphicon-user" aria-hidden="true"> USUÁRIO</span>'); echo'</li>
                                                    <li>
                                                        <a><span class="glyphicon glyphicon-object-align-bottom" aria-hidden="true"> EMPRESA&nbsp</span><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></a>
                                                        <ul class="dropdown-menu sub-menu">
                                                            <li class="divider"></li>
                                                            <li>'; echo anchor('admin/gerenciar_departamento','<span class="glyphicon glyphicon-folder-close" aria-hidden="true"> DEPARTAMENTOS</span>'); echo'</li>
                                                            <li>'; echo anchor('admin/gerenciar_funcao','<span class="glyphicon glyphicon-briefcase" aria-hidden="true"> GRUPOS</span>'); echo'</li>
                                                            <li class="divider"></li>    
                                                        </ul>
                                                    </li>    
                                                    <li>
                                                        <a><span class="glyphicon glyphicon-cog" aria-hidden="true"> SISTEMA&nbsp</span><span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></a>
                                                        <ul class="dropdown-menu sub-menu">
                                                            <li class="divider"></li>
                                                            <li>'; echo anchor('admin/gerenciar_permissoes','<span class="glyphicon glyphicon-lock" aria-hidden="true"> PERMISSÕES&nbsp</span>'); echo'</li>
                                                            <li>'; echo anchor('admin/gerenciar_permissoes_tela','<span class="glyphicon glyphicon-modal-window" aria-hidden="true"> TELAS</span>'); echo'</li>
                                                            <li>'; echo anchor('admin/gerenciar_sistema','<span class="glyphicon glyphicon-cog" aria-hidden="true"> PARÂMETROS</span>'); echo'</li>
                                                            <li class="divider"></li>    
                                                        </ul>
                                                    </li>     
                                                    <li class="divider"></li>
                                                    <li>'; echo anchor('servicos/gerenciar_agenda','<span class="glyphicon glyphicon-calendar" aria-hidden="true"> AGENDA</span>'); echo'</li> 
                                                    <li class="divider"></li>
                                                  </ul>
                                                </li>          
                                            </ul>                             
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>   
                </div>';
        break;
			
		default:
			echo '<div class="alert-box alert"><p>A tela solicitada não existe</p></div>';
		break;
	endswitch;