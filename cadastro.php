<?php

//Inclui um arquivo caso ele já não esteja incluso
include_once("connect.php");

//Captura os valores dos inputs
$name = $_POST['name'];
$email = $_POST['email'];
$cpf_cnpj = $_POST['cpf_cnpj'];
$phone = $_POST['phone'];
$CEP = $_POST['CEP'];
$public_place = $_POST['public_place'];
$house_number = $_POST['house_number'];
$district = $_POST['district'];
$city = $_POST['city'];
$state = $_POST['state'];

//Insere no banco de dados os valores das variáveis
$sql  = "INSERT INTO usuarios (name, email, cpf_cnpj, phone, CEP, public_place, house_number, district, city, state) VALUES('$name', '$email', '$cpf_cnpj', '$phone', '$CEP', '$public_place', '$house_number', '$district', '$city', '$state')";

//Faz uma busca no banco de dados
$salvar = mysqli_query($connect, $sql);

//Retorna o número de linhas afetadas pela operação MySQL anterior (Verifica a quantidade de resultado encontrados)
$linhas = mysqli_affected_rows($connect);

//Fecha uma conecção aberta anteriormente com o banco de dados
mysqli_close($connect);

header('Location: consulta.php');