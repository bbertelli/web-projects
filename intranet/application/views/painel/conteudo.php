<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * Carga do Conteúdo Inicial do Site 
 */

	switch ($tela):
		case 'home':
		    get_msg('logoffok'); ?>
            
              <div id="myCarousel" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li class="item1 active"></li>
                  <li class="item2"></li>
                  <li class="item3"></li>
                </ol>
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                  <div class="item active">
                    <img src="carousel/slide-01.jpg">
                  </div>
            
                  <div class="item">
                    <img src="carousel/slide-02.jpg">
                  </div>
                
                  <div class="item">
                    <img src="carousel/slide-03.jpg">
                  </div>
                </div>
            
              </div>
            
            <script>
            $(document).ready(function(){
                // Activate Carousel
                $("#myCarousel").carousel({interval: 2000, wrap: true});
                
                // Enable Carousel Indicators
                $(".item1").click(function(){
                    $("#myCarousel").carousel(0);
                });
                $(".item2").click(function(){
                    $("#myCarousel").carousel(1);
                });
                $(".item3").click(function(){
                    $("#myCarousel").carousel(2);
                });               
            });
            </script>
		    
            <!--<div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="carousel/slide-01.jpg" alt="">
                        <div class="carousel-caption">
                            <h3>Chania</h3>
                            <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
                        </div>
                    </div>
                </div>                                        
            </div>-->
                 
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row-fluid">
                        <div class="span12">
                            <h4><img src="gl/glyphicons-356-bullhorn.png"> Recados</h4>
                            <?php
                                $query_dpto = $this->home->get_recado_byid(1)->row();
                                printf('<p>%s</p>', $query_dpto->recado); 
                            ?>    
                            
                        </div>
                    </div>
                    <hr />
                    <div class="row-fluid">
                        <div class="span12">
                            <h4><img src="gl/glyphicons-46-calendar.png"> Eventos da Semana</h4>
                             <table class="table table-striped table-bordered form-padrao data-table">
                                <th>Título</th>
                                <th>Data</th>
                                <th>Hora</th>
                                <th>Observação</th>
                                <?php
                                    $query = $this->info->get_agenda_week()->result();
                                    foreach ($query as $linha):
                                        echo '<tr>';
                                        printf('<td>%s</td>', $linha->titulo);
                                        printf('<td>%s</td>', converte_data_br($linha->data));
                                        printf('<td>%s</td>', $linha->hora);
                                        printf('<td>%s</td>', $linha->obs);
                                        echo '</tr>';
                                    endforeach;
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>               
            
        <?php    
	    break;
		
        case 'login':

            echo '<div class="container">';
            echo form_open('home/login',array('class'=>'form-signin'));
            echo form_label('<h2 class="form-signin-heading">Acesso ao Sistema</h2>','','');
            erros_validacao();
            get_msg('logoffok');
            get_msg('errologin'); 
            echo form_input(array('name'=>'usuario','placeholder'=>'Digite seu usuário','class'=>'form-control'), set_value('usuario'), 'autofocus'); 
            echo form_password(array('name'=>'senha','placeholder'=>'Digite sua senha','class'=>'form-control'), set_value('senha'));
            //echo form_hidden('redirect', $this->session->userdata('redir_para')); 
            echo form_submit(array('name'=>'logar','class'=>'btn btn-lg btn-primary btn-block'), 'Entrar');
            echo form_fieldset_close();
            echo form_close();
            echo '</div>';
                                    
    	break;
        
        /* Carrega o painel de serviços */
        case 'painel':

            echo '<div class="container">';
            
            echo '</div>';
            
                                    
        break;
        	
		default:
			echo '<div class="alert-box alert"><p>A tela solicitada não existe</p></div>';
		break;
        
        
	endswitch;