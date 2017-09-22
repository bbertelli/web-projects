<?php
error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);

// definições de host, database, usuário e senha
$host = "localhost";
$db   = "vds";
$user = "root";
$pass = "root";

$filtro_ano = $_GET['year'];
$filtro_data = $_GET['filter'];
$filtro_all = $_GET['show'];
$filtro_categoria = $_GET['category'];

//seta parametros default
if($filtro_ano == ''){$filtro_ano = null;}
if($filtro_data == ''){$filtro_data = null;}
if($filtro_all == ''){$filtro_all = null;}
if($filtro_categoria == ''){$filtro_categoria = null;}

// conecta ao banco de dados
$con = new mysqli($host, $user, $pass, $db);

// Verifica se ocorreu algum erro
if (mysqli_connect_errno()) {
    die('Não foi possível conectar-se ao banco de dados: ' . mysqli_connect_error());
    exit();
}
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
  <script type="text/javascript">
		$(document).ready(function(){
			$(".divPai").on("click", function(){
				var id = $(this).data("id");

				window.open('video_page.php?id='+id, '_blank');
			});
		});
	</script>

	<div class="navbar navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="index.php">Site Name</a>

			  <ul class="nav">
			    <li class="divider-vertical"></li>

          
          <!-- dropdown filter by date -->
          <li class="dropdown">
          
          <?php if($filtro_all != null){?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-calendar"></i> Showing all dates<b class="caret"></b></a>
          <?php } ?>
          <?php if($filtro_ano != null){?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-calendar"></i> Showing videos in: <?=$filtro_ano?><b class="caret"></b></a>
          <?php } ?>
          <?php if($filtro_data != null){?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-calendar"></i> Showing videos in: <?=$filtro_data?><b class="caret"></b></a>
          <?php } ?>
          <?php if($filtro_data == null && $filtro_ano == null && $filtro_all == null){?>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-calendar"></i> Filter by date<b class="caret"></b></a>
          <?php } ?>
            <ul class="dropdown-menu">
              <li><a href="index.php?show=all&year=&filter=&category=<?=$filtro_categoria?>">All Dates</a></li>
              <li class="divider"></li>
              <li class="nav-header">Year</li>
              <?php
                if($query_anos = $con->query("SELECT YEAR(data) AS anos FROM `link` GROUP BY anos ORDER BY data DESC")){
                  $dados_anos = mysqli_fetch_assoc($query_anos);
                }

                do {?>
              <li class="dropdown-submenu">
                <a tabindex="-1" href="index.php?year=<?=$dados_anos['anos']?>&filter=&category=<?=$filtro_categoria?>&show="><?=$dados_anos['anos']?></a>
                  <ul class="dropdown-menu">
                    <?php
                      $verificar_janeiro = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-01'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_fevereiro = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-02'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_marco = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-03'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_abril = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-04'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_maio = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-05'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_junho = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-06'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_julho = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-07'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_agosto = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-08'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_setembro = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-09'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_outubro = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-10'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_novembro = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-11'."%\" GROUP BY data ORDER BY data DESC";
                      $verificar_dezembro = "SELECT data FROM `link` WHERE data LIKE \"".$dados_anos['anos'].'-12'."%\" GROUP BY data ORDER BY data DESC";

                      $query_verificar_janeiro = $con->query($verificar_janeiro);
                      if (mysqli_num_rows($query_verificar_janeiro) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-01&category=<?=$filtro_categoria?>&year=&show=">January</a></li><?php
                      }
                      $query_verificar_fevereiro = $con->query($verificar_fevereiro);
                      if (mysqli_num_rows($query_verificar_fevereiro) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-02&category=<?=$filtro_categoria?>&year=&show=">February</a></li><?php
                      }
                      $query_verificar_marco = $con->query($verificar_marco);
                      if (mysqli_num_rows($query_verificar_marco) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-03&category=<?=$filtro_categoria?>&year=&show=">March</a></li><?php
                      }
                      $query_verificar_abril = $con->query($verificar_abril);
                      if (mysqli_num_rows($query_verificar_abril) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-04&category=<?=$filtro_categoria?>&year=&show=">April</a></li><?php
                      }
                      $query_verificar_maio = $con->query($verificar_maio);
                      if (mysqli_num_rows($query_verificar_maio) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-05&category=<?=$filtro_categoria?>&year=&show=">May</a></li><?php
                      }
                      $query_verificar_junho = $con->query($verificar_junho);
                      if (mysqli_num_rows($query_verificar_junho) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-06&category=<?=$filtro_categoria?>&year=&show=">June</a></li><?php
                      }
                      $query_verificar_julho = $con->query($verificar_julho);
                      if (mysqli_num_rows($query_verificar_julho) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-07&category=<?=$filtro_categoria?>&year=&show=">July</a></li><?php
                      }
                      $query_verificar_agosto = $con->query($verificar_agosto);
                      if (mysqli_num_rows($query_verificar_agosto) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-08&category=<?=$filtro_categoria?>&year=&show=">August</a></li><?php
                      }
                      $query_verificar_setembro = $con->query($verificar_setembro);
                      if (mysqli_num_rows($query_verificar_setembro) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-09&category=<?=$filtro_categoria?>&year=&show=">September</a></li><?php
                      }
                      $query_verificar_outubro = $con->query($verificar_outubro);
                      if (mysqli_num_rows($query_verificar_outubro) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-10&category=<?=$filtro_categoria?>&year=&show=">October</a></li><?php
                      }
                      $query_verificar_novembro = $con->query($verificar_novembro);
                      if (mysqli_num_rows($query_verificar_novembro) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-11&category=<?=$filtro_categoria?>&year=&show=">November</a></li><?php
                      }
                      $query_verificar_dezembro = $con->query($verificar_dezembro);
                      if (mysqli_num_rows($query_verificar_dezembro) > 0)
                      {
                      ?><li><a href="index.php?filter=<?=$dados_anos['anos']?>-12&category=<?=$filtro_categoria?>&year=&show=">December</a></li><?php
                      }
                      ?>
                  </ul>
              </li>
                <?php
                }while($dados_anos = mysqli_fetch_assoc($query_anos)); ?>
            </ul>
          </li>
          <!-- close dropdown filter by date -->

          <!-- dropdown category -->
          <li class="dropdown">
            <?php if($filtro_categoria == null){?>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th-list"></i> Filter by Category<b class="caret"></b></a>
            <?php } ?>
            <?php if($filtro_categoria != null){
                if($filtro_categoria == "all"){?>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th-list"></i> All Categories<b class="caret"></b></a>
            <?php }else{ ?>
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-th-list"></i> <?=$filtro_categoria?><b class="caret"></b></a>
            <?php } ?>
            <?php } ?>
            <ul class="dropdown-menu">
              <li><a href="index.php?category=all&filter=<?=$filtro_data?>&year=<?=$filtro_ano?>&show=<?=$filtro_all?>">All Categories</a></li>
              <li class="divider"></li>
              <?php
                if($query_categorias = $con->query("SELECT categoria FROM `link` GROUP BY categoria ORDER BY categoria ASC")){
                  $dados_categorias = mysqli_fetch_assoc($query_categorias);
                }

                do {?>
              <li><a href="index.php?category=<?=$dados_categorias['categoria']?>&filter=<?=$filtro_data?>&year=<?=$filtro_ano?>&show=<?=$filtro_all?>"><?=$dados_categorias['categoria']?></a></li>
                <?php
                  }while($dados_categorias = mysqli_fetch_assoc($query_categorias)); ?>
            </ul>
          </li>
          <!-- close dropdown category -->

        </ul><!-- close navbar -->
      </div>
    </div>
  </div>

  <div class="container">

  <?php
    //exibir todos os links
    if ($filtro_all != null || $filtro_all == null && $filtro_ano == null && $filtro_data == null) {
      if($filtro_categoria == "all" || $filtro_categoria == null){
        $sql_exibir_todos = "SELECT data FROM `link` GROUP BY data ORDER BY data DESC";
      }else{
        $sql_exibir_todos = "SELECT data FROM `link` WHERE categoria LIKE \"".$filtro_categoria."\" GROUP BY data ORDER BY data DESC";
      }
      
      $query_meses = $con->query($sql_exibir_todos);

      while($dados_meses = mysqli_fetch_assoc($query_meses)) {?>
        <h2><small><?=date_format(date_create($dados_meses['data']),"F Y");?></small></h2>
        <ul class="thumbnails">
          <?php
            $mes_de_busca = date_format(date_create($dados_meses['data']),"Y-m");
            $query_links_por_mes = $con->query("SELECT * FROM link WHERE data LIKE \"".$mes_de_busca."%\"");

            while($dados_link_por_mes = mysqli_fetch_assoc($query_links_por_mes)) {?>
              <li class="span3">
					      <div class="divPai" data-id="<?=$dados_link_por_mes['id']?>">
						      <div class="divFilho"></div>
						      <iframe width="260" height="180" src="<?=$dados_link_por_mes['link']?>" frameborder="0" allowfullscreen></iframe>
					      </div>
				      </li>
            <?php } ?>
        </ul>
    	<?php } } ?>

  <?php
    //exibir links pelo ano selecionado
    if ($filtro_ano != null) {
      if($filtro_categoria == "all" || $filtro_categoria == null){
        $sql_exibir_ano_selecionado = "SELECT data FROM `link` WHERE data LIKE \"".$filtro_ano."%\" GROUP BY data ORDER BY data DESC";
      }else{
        $sql_exibir_ano_selecionado = "SELECT data FROM `link` WHERE categoria LIKE \"".$filtro_categoria."\" AND data LIKE \"".$filtro_ano."%\" GROUP BY data ORDER BY data DESC";
      }
        
      $query_meses = $con->query($sql_exibir_ano_selecionado);

      while($dados_meses = mysqli_fetch_assoc($query_meses)) {?>
        <h2><small><?=date_format(date_create($dados_meses['data']),"F Y");?></small></h2>
        <ul class="thumbnails">
          <?php
            $mes_de_busca = date_format(date_create($dados_meses['data']),"Y-m");
            $query_links_por_mes = $con->query("SELECT * FROM link WHERE data LIKE \"".$mes_de_busca."%\"");

            while($dados_link_por_mes = mysqli_fetch_assoc($query_links_por_mes)) {?>
              <li class="span3">
                <div class="divPai" data-id="<?=$dados_link_por_mes['id']?>">
                  <div class="divFilho"></div>
                  <iframe width="260" height="180" src="<?=$dados_link_por_mes['link']?>" frameborder="0" allowfullscreen></iframe>
                </div>
              </li>
            <?php } ?>
        </ul>
      <?php } } ?>

  <?php
    //exibir links pelo ano e mês selecionado
    if ($filtro_data != null) {
      if($filtro_categoria == "all" || $filtro_categoria == null){
        $sql_exibir_ano_mes_selecionado = "SELECT data FROM `link` WHERE data LIKE \"".$filtro_data."%\" GROUP BY data ORDER BY data DESC";
      }else{
        $sql_exibir_ano_mes_selecionado = "SELECT data FROM `link` WHERE categoria LIKE \"".$filtro_categoria."\" AND data LIKE \"".$filtro_data."%\" GROUP BY data ORDER BY data DESC";
      }

      $query_meses = $con->query($sql_exibir_ano_mes_selecionado);

      while($dados_meses = mysqli_fetch_assoc($query_meses)) {?>
        <h2><small><?=date_format(date_create($dados_meses['data']),"F Y");?></small></h2>
        <ul class="thumbnails">
          <?php
            $mes_de_busca = date_format(date_create($dados_meses['data']),"Y-m");
            $query_links_por_mes = $con->query("SELECT * FROM link WHERE data LIKE \"".$mes_de_busca."%\"");

            while($dados_link_por_mes = mysqli_fetch_assoc($query_links_por_mes)) {?>
              <li class="span3">
                <div class="divPai" data-id="<?=$dados_link_por_mes['id']?>">
                  <div class="divFilho"></div>
                  <iframe width="260" height="180" src="<?=$dados_link_por_mes['link']?>" frameborder="0" allowfullscreen></iframe>
                </div>
              </li>
            <?php } ?>
        </ul>
      <?php } } ?>

  </div><!-- close div container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>

  </body>
</html>