<?php

//Inclui um arquivo caso ele já não esteja incluso
include_once("connect.php");

//Captura os valores dos inputs 'nome' e 'phone'

$id = $_GET['id'];

//Exclui no banco de dados 'usuarios' onde o id for igual à $id
$sql  = "DELETE FROM usuarios WHERE id = $id";

//Faz uma busca no banco de dados
$salvar = mysqli_query($connect, $sql);

//Fecha uma conecção aberta anteriormente com o banco de dados
mysqli_close($connect);

//Redireciona novamente para a aba de consulta
header('Location: consulta.php');