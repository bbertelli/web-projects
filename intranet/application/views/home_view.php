<!DOCTYPE html>
<html class="no-js" lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width" />
		<title>{titulo_padrao}</title>
		<link rel="icon" href="ico/favicon.ico"/>
	    <link rel="shortcut icon" type="image/x-icon" href="ico/favicon.ico"/>
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/favicon.png">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/favicon.png">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/favicon.png">
	    <link rel="apple-touch-icon-precomposed" href="ico/favicon.png">
		{headerinc}
	</head>

	<body>
		<?php $this->load->view('includes/header') ?>	
		{menu}
		</div>
		<div class="container conteudo">			
			{conteudo}
		</div>
		<?php $this->load->view('includes/footer') ?>	
		{footerinc}
	</body>
</html>