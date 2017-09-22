<!-- Cabeçalho Geral 
    -> a primiera <div> fica aberta...    
-->
<base href="//copper26/intra/assets/img/"/>
<div class="panel-titulo">				 	
    <div class="container">		
        <div class="pull-left">
            <!--{logo}--> <img class="img-titulo" alt="Brand" src="toplogo.png">
        </div>
        <!--<div><p class="navbar-brand titulo">COPPERSTEEL</p></div>-->
        <div id="panel-logado">
            <p class="subtitulo"><?php if(isset($titulo)): ?>{titulo} | <?php endif; ?><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> {titulo_padrao}</p>
            <?php if(esta_logado(FALSE)): ?>
                <p class="logado"><strong class="subtitulo"><span class="glyphicon glyphicon-user gl-green" aria-hidden="true"></span>&nbsp;<?php echo $this->session->userdata('user_nome'); ?></strong>&nbsp;
                <?php echo anchor('home/logoff', '<i class="fa fa-sign-out"></i> Sair', 'class="btn btn-warning btn-xs"'); ?></p>
            <?php endif; ?>
        </div>