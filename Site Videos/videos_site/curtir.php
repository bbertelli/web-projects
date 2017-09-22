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

$video_id = $_POST['id'];

if ($sql = $con->prepare("UPDATE link SET curtido = curtido+1 WHERE id=?")){
	
	$sql->bind_param('s', $video_id); 
	$sql->execute();
	echo true;
}else{
	echo false;
}

?>
