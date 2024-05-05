
<?php
include_once("connection.php");

if(isset($_POST['update']) && isset($_POST['idmens']) && isset($_POST['nova']))
{	
	$nova=$_POST['nova'];
	$id=$_POST['idmens'];
	echo ola.$nova;
	if($nova == 'S'){
			mysqli_query($mysqli, "UPDATE mensagens SET nova='N' WHERE id_mensagem = $id");
			header("Location: vernovas.php");
		}else{
			 header("Location: vertodas.php");
		}

}
?>

<?php
$id_mensagem = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM mensagens WHERE id_mensagem = $id_mensagem");
while($res = mysqli_fetch_array($result))
{
	$nome = $res['nome'];
	$email = $res['email'];
	$mensagem= $res['mensagem'];
	$nova= $res['nova'];
}  
?>
<html>
<head>	                                 
	<title>LER MENSAGENS</title>
</head>
<body>
<br><br>
	
	<form name="form1" method="post" action="">
		<table border="0">
			<tr> 
				<td>Nome Remetente</td>
				<td><input type="text" name="nome1" size = "40" value="<?php echo utf8_encode($nome);?>"></td>
			</tr>
			<tr> 
				<td>Email Remetente</td>
				<td><input type="text" name="email" size = "40" value="<?php echo utf8_encode($email);?>"></td>
			</tr>
			<tr> 
				<td>Mensagem</td>
				<td><textarea type="text"  name="mensagem" cols="50" rows="8"> <?php echo utf8_encode($mensagem);?></textarea></td>
			</tr>
			<tr>
				<td><input type="hidden" name="idmens"  value="<?php echo $id_mensagem;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="nova"  value="<?php echo $nova;?>"></td>
			</tr>
			<tr>
				<td><input type="submit" name="update" value="Fechar Mensagem"></td>
			</tr>
		</table>
	</form>
</body>
</html>
