<?php 
session_start(); 
function Mostramensagem($mensagem) {
	echo '<script type="text/javascript">alert("' . $mensagem . '")</script>';
}

?>

<?php
include("connection.php");
if ($mysqli)
{

	$id = $_GET['id'];
	$result=mysqli_query($mysqli, "DELETE FROM Login WHERE idLogin=$id");
	if($result){
		Mostramensagem("Utilizador eliminado com sucesso.");
		header('Refresh: 1; URL=ver.php');
		die();
	}else{
		Mostramensagem("Lamentamos mas a eliminação do Utilizador falhou.");
		header('Refresh: 1; URL=ver.php');
		die();
	}
} 
else{
Mostramensagem("Impossivel Ligar à Base de Dados.");
exit;
}
?>

