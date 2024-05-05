<?php
include_once("connection.php");
$result = mysqli_query($mysqli, "SELECT * FROM mensagens order by nova desc");
?>

<html>
<head>
<title>Ver Mensagens</title>
 <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	
</head>

<body>
	<a href="Mensagem.html">Voltar Para o Envio De Mensagens</a> | <a href="vernovas.php">Ver Mensagens Novas</a> 
	<br><br>
	
	<table width='90%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Nome</td>
			<td>Email</td>
			<td>Mensagem</td>
			<td>Nova?</td>
			<td>Acção</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".utf8_encode($res['nome'])."</td>";
			echo "<td>".utf8_encode($res['email'])."</td>";
			echo "<td>".utf8_encode($res['mensagem'])."</td>";
			echo "<td>".utf8_encode($res['nova'])."</td>";			
			echo "<td><a href=\"lermensagem.php?id=$res[id_mensagem]\">Ler Mensagem</a> | <a href=\"eliminar.php?id=$res[id_mensagem]\" onClick=\"return confirm('Tem a certeza que quer eliminar este produto?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
