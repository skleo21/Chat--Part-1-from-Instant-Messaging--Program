<?php 
session_start(); 
function Mostramensagem($mensagem) {
	echo '<script type="text/javascript">alert("' . $mensagem . '")</script>';
}

?>

<?php
include("connection.php");
if($mysqli){
	$result = mysqli_query($mysqli, "SELECT * FROM login ORDER BY idLogin ASC");
	if($result){
		?>

		<html>
		<head>

			<title>CRUD EM PHP</title>
			<link href="style.css" rel="stylesheet" type="text/css">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		</head>

		<body>
			<table class="tabela">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Username</th>
						<th>Atualizar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($res = mysqli_fetch_array($result)) {		
						echo "<tr>";
						echo "<td>".$res['nome']."</td>";
						echo "<td>".$res['email']."</td>";
						echo "<td>".$res['username']."</td>";
						echo "<td><a href=\"editar.php?id=$res[idLogin]\">Editar</a> | <a href=\"eliminar1.php?id=$res[idLogin]\" onClick=\"return confirm('Tem a certeza que quer eliminar este produto?')\">Eliminar</a></td>";		
					}
					?>
				</tbody>
			</table>

			<?php
		}else
		{
			Mostramensagem("Lamentamos mas neste momento não podemos mostrar os seus dados.");
					}

	}
	else
	{
		Mostramensagem("Impossivel Ligar à Base de Dados.");
		header('Refresh: 1; URL=index.php');
		exit;
	}
	?>	

</body>
</html>
