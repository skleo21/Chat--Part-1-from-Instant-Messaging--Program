<html>
<head>
	<title>insere Mensagem</title>
</head>

<body>
<a href="Mensagem.html">Voltar</a> <br />
<?php
include("connection.php");

if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['mensagem'])) {
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$mensagem = $_POST['mensagem'];
	mysqli_query($mysqli, "INSERT INTO mensagens(nome, email, mensagem, nova) VALUES ('$nome', '$email', '$mensagem', 'S') ")
			or die("Não foi possivel executar o pedido.");
	echo "Mensagem Enviada Com Sucesso, Obrigado Pelo Seu Contacto.";
} else {
echo 'não consegui';
}
?>
</body>
</html>
