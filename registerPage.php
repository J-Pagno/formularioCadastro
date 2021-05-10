<?php

//Inclui um arquivo caso ele já não esteja incluso
include_once("connect.php");

//Captura os valores dos inputs 'nome' e 'phone'

$id = $_GET['id'];

//Seleciona tudo* da tabela usuarios na coluna(where) nome for como(like) '(pode ter algo antes)valor do input(pode ter algo depois)'
$sql = "select * from usuarios where id like $id";

//Aplica o comando no banco mysqli_query(conxão com o db, ação a ser executada)
$consulta = mysqli_query($connect, $sql);

//Fecha uma conecção aberta anteriormente com o banco de dados
mysqli_close($connect);

$userData = mysqli_fetch_array($consulta);

$name = $userData[1];

?>

<!DOCTYPE html>
<html>

<head>
  <title><?php echo $userData[1]; ?></title>
  <meta charset="utf-8" />
  <link href="assets/css/index.css" rel="stylesheet" media="all" />
  <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all" />
</head>

<body>

  <h1>Detalhes do Cadastro</h1>

  <ul>

    <li>
      <h2 class="form-control" type="text" id="nomeid" placeholder="Fulano de Tal" required="required" name="name"><strong>Nome:</strong> <?php echo $userData[1]; ?></h2>
    </li>

    <li>
      <h2 class="form-control" type="email" id="foneid" placeholder="fulano@mail.com" name="email"><strong>Email:</strong> <?php echo $userData[2]; ?></h2>
    </li>

    <li>
      <h2 class="form-control" type="number" id="emailid" placeholder="xxx.xxx.xxx-xx" name="cpf_cnpj"><strong>CPF/CNPJ:</strong> <?php echo $userData[3]; ?></h2>
    </li>

    <li>
      <h2 class="form-control" type="phone" id="nomeid" placeholder="(xx) x xxxx-xxxx" required="required" name="phone"><strong>Telefone:</strong> <?php echo $userData[4]; ?></h2>
    </li>
    <li>
      <h2 class="form-control" type="text" id="nomeid" placeholder="xxxxx-xxx" required="required" name="CEP"><strong>CEP:</strong> <?php echo $userData[5]; ?></h2>
    </li>
    <li>
      <h2 class="form-control" type="text" id="nomeid" placeholder="Tiago Vale" name="public_place"><strong>Logradouro:</strong> <?php echo $userData[6]; ?></h2>
    </li>
    <li>
      <h2 class="form-control" type="number" id="nomeid" placeholder="Tiago Vale" required="required" name="house_number"><strong>Número:</strong> <?php echo $userData[7]; ?></h2>
    </li>
    <li>
      <h2 class="form-control" type="text" id="nomeid" placeholder="Tiago Vale" required="required" name="district"><strong>Bairro:</strong> <?php echo $userData[8]; ?></h2>
    </li>
    <li>
      <h2 class="form-control" type="text" id="nomeid" placeholder="Tiago Vale" required="required" name="city"><strong>Cidade:</strong> <?php echo $userData[9]; ?></h2>
    </li>
    <li>
      <h2 class="form-control" type="text" id="nomeid" placeholder="Tiago Vale" required="required" name="state"><strong>Estado:</strong> <?php echo $userData[10]; ?></h2>
    </li>
  </ul>

  <a href="consulta.php" class="btn btn-danger" type="submit" style="margin-left: 3%">Voltar</a>

  <script src="assets/libs/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>