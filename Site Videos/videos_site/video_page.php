<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
// definições de host, database, usuário e senha
$host = "localhost";
$db   = "vds";
$user = "root";
$pass = "root";

// conecta ao banco de dados
$con = new mysqli($host, $user, $pass, $db);

// Verifica se ocorreu algum erro
if (mysqli_connect_errno()) {
    die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
    exit();
}

$video_id = $_GET['id'];

//query para incrementar o numero de visualizacoes do video
$query_incrementar_visualizacao = $con->query("UPDATE link SET visualizado = visualizado+1 WHERE id=".$video_id);

// executa a instrução SQL que vai selecionar os dados
$dados_video = $con->query("SELECT * FROM link WHERE id=".$video_id);
$linha = mysqli_fetch_assoc($dados_video);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Site Name</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/custom.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

  <script>
		$(document).ready(function(){
			// cria o evento on click
			$("#curtir").on("click", function(){
				var btn = $(this);

				// verifica se o botão já está desabilitado; se sim, retorna;
				if($(btn).hasClass("disabled")){
					return;
				}

				// desabilita o botão
				$(btn).addClass("disabled");

				// chama o arquivo curtir.php através de post e passa o id do vídeo atual via parametro ($_POST['id']) e recebe o retorno através da variável data
				$.post("curtir.php", {id: $(btn).data("id") }, function(data){
					// echo true ou echo false;
					// se data for false, reabilita o botão; senão não faz nada
					if(!data){
						$(btn).removeClass("disabled");
						return;
					}

					$(btn).html('Thank you!');
					$("#label_curtir").html(parseInt($("#label_curtir").data("id"))+1 +' likes');
				});
			});
		});
	</script>

	<div class="navbar navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="brand" href="index.php">Site Name</a>
    			<ul class="nav">
    			<li class="divider-vertical"></li>
    			</ul>
        </div>
      </div>
    </div>

    <div class="container">
	<div class="entry-content">

		<div class="video-container">
			<iframe src="<?=$linha['link']?>" allowfullscreen frameborder="0" width="560" height="315"></iframe>
		</div>

		<div class="align-left">
			<h2>
        <small class="align-left"><?=$linha['titulo']?></small>
      </h2>
      <br />
      <h4><small class="align-left"><?=$linha['visualizado']?> views</small></h4>

			<? $str = $linha['tags']?>
			<span class="badge"><?$str?></span>
		</div>

		<div class="align-right">
			<h2>
        <a class="btn btn-small align-right" href="javascript:void(0);" id="curtir" data-id="<?=$video_id?>"><i class="icon-heart"></i></a>
				<h4>
          <small id="label_curtir" data-id="<?=$linha['curtido']?>">
            <?=$linha['curtido']?> likes
          </small>
        </h4>
			</h2>
		</div>

	</div>

    </div> 
	
    <script src="assets/js/bootstrap-transition.js"></script>
    <script src="assets/js/bootstrap-alert.js"></script>
    <script src="assets/js/bootstrap-modal.js"></script>
    <script src="assets/js/bootstrap-dropdown.js"></script>
    <script src="assets/js/bootstrap-scrollspy.js"></script>
    <script src="assets/js/bootstrap-tab.js"></script>
    <script src="assets/js/bootstrap-tooltip.js"></script>
    <script src="assets/js/bootstrap-popover.js"></script>
    <script src="assets/js/bootstrap-button.js"></script>
    <script src="assets/js/bootstrap-collapse.js"></script>
    <script src="assets/js/bootstrap-carousel.js"></script>
    <script src="assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
