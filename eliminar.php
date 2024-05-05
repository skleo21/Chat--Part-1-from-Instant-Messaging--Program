<?php
include("connection.php");
$id = $_GET['id'];
$result=mysqli_query($mysqli, "DELETE FROM mensagens WHERE id_mensagem=$id");
header("Location:Mensagem.html");
?>

