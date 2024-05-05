<?php 
session_start(); 
function Mostramensagem($mensagem) {
	echo '<script type="text/javascript">alert("' . $mensagem . '")</script>';
}

?>

<?php
include_once("connection.php");
if ($mysqli)
{
	if(isset($_POST['update']))
	{	
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$username = $_POST['username'];	
		if(empty($nome) || empty($email) || empty($username)) {

			if(empty($nome)) {
				echo "<font color='red'>O campo do Nome encontra-se vazio.</font><br/>";
			}

			if(empty($quantidade)) {
				echo "<font color='red'>O campo da Email encontra-se vazio.</font><br/>";
			}

			if(empty($preco)) {
				echo "<font color='red'>O campo do Username encontra-se vazio.</font><br/>";
			}		
		} else {	
			$result = mysqli_query($mysqli, "UPDATE login SET nome='$nome', email='$email', username='$username' WHERE idLogin=$id");
			if($result){
				Mostramensagem("O Utilizador foi atualizado com sucesso.");
				header('Refresh: 1; URL=ver.php');
				die();
			}else{
				Mostramensagem("Lamentamos mas a atualização do Utilizador falhou.");
				header('Refresh: 1; URL=ver.php');
				die();
			}

		}
	}
	?>
	<?php
	$id = $_GET['id'];
	$result = mysqli_query($mysqli, "SELECT * FROM Login WHERE idLogin=$id");
	if($result)
	{
		while($res = mysqli_fetch_array($result))
		{
			$nome = $res['nome'];
			$email = $res['email'];
			$username = $res['username'];
		}
		?>
		<html>
		<head>	
			<title>CRUD EM PHP</title>
			<link href="style.css" rel="stylesheet" type="text/css">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		</head>

		<body>

			<form name="form1" method="post" action="editar.php">
				<table class="tabela">
					<thead>
						<tr>
							<th>Atributos</th>
							<th>Valores</th>
						</tr>
					</thead>
					<tbody>
						<tr> 
							<td>Nome</td>
							<td><input type="text" name="nome" value="<?php echo $nome;?>" style="width: 287px"></td>
						</tr>
						<tr> 
							<td>Email</td>
							<td><input type="text" name="email" value="<?php echo $email;?>" style="width: 287px"></td>
						</tr>
						<tr> 
							<td>Username</td>
							<td><input type="text" name="username" value="<?php echo $username;?>" style="width: 287px"></td>
						</tr>
						<tr>
							<!--<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>-->
							<td><input type="hidden" name="id" value="<?php echo $id;?>"></td>
							<td><input type="submit" name="update" value="Update" onClick="return confirm('Tem a certeza que quer alterar este Utilizador?')"></td>
						</tr>
					</tbody>
				</table>
			</form>
		<?php }else{
			Mostramensagem("Lamentamos mas a atualização do utilizador falhou.");
			header('Refresh: 1; URL=ver.php');
			die();
		}
	} 
	else{
Mostramensagem("Impossivel Ligar à Base de Dados.");
exit;
}
?>
</body>
</html>
