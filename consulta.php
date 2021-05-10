<?php

include_once("connect.php");

//Operador ternário: (SE 'filtro' for FALSE ele usa 'VAZIO', se não, usa o valor do input)
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";

//Seleciona tudo* da tabela usuarios na coluna(where) nome for como(like) '(pode ter algo antes)valor do input(pode ter algo depois)'
$sql = "select * from usuarios where name like '%$filtro%'";

//Aplica o comando no banco mysqli_query(conxão com o db, ação a ser executada)
$consulta = mysqli_query($connect, $sql);

//Conta quantas linhas foram encontradas
$registros = mysqli_num_rows($consulta);

//Fecha uma conecção aberta anteriormente com o banco de dados
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all" />

</head>

<body>
    <header>
        <nav class="nav nav-pills flex-column flex-sm-row">
            <a class="flex-sm-fill text-sm-center nav-link" href="index.html">Cadastro</a>
            <a class="flex-sm-fill text-sm-center nav-link active" href="consulta.php">Consulta</a>
        </nav>
    </header>

    <section>
        <h1 style='margin: 10px 0px 0px 10px;'>Conlsultas de cadastro</h1>

        <form method="get" action="" style='margin: 10px 0px 0px 10px;'>
            Filtrar por nome<br><br> <input type="text" name="filtro" required autofocus>
            <input type="submit" value="Pesquisar">
        </form>
        <br>



        <?php

        //Exibe o valor procurado pelo usuário
        //Exibe o numero de resultados encontrados $registros = (mysqli_num_rows)

        echo ($filtro == "") ? "<p style='margin: 10px 0px 0px 10px;'>Exibindo todos os resultados - <strong>$registros registros encontrados</strong><br><br></p>" : "<p style='margin: 10px 0px 0px 10px;'>Resultado da pesquisa para $filtro - <strong>$registros registros encontrados.</p><br><br><br>";


        echo "<table class='table table-striped'>
        <thead>
          <tr>
            <th>Nome</th>
            <th></th>
          </tr>
        </thead>
        <tbody>";
        //Cria um array com os dados encontrados
        //Enquanto existir resultados, ele captura os dados dos indices [0], [1] e [2]
        while ($exibirRegistros = mysqli_fetch_array($consulta)) {

            if ($registros == 0) {
                echo "<td><a>Nenhum resultado encontrado</a></td><td></td>";
            } else {
                //Captura o valor de ID do resultado
                $code = $exibirRegistros[0];

                //Captura o valor de Nome do resultado
                $name   = $exibirRegistros[1];

                //Imprime os resultados encontrados
                //Nome do contato
                echo "<tr>";


                echo "<td>$name</td><br>";
                echo "<td><a class='btn btn-success' href='registerPage.php?id=$code' style='margin: 10px 0px 0px 10px;'>Ver Mais</a>";
                echo "<a class='btn btn-danger' href='excluir.php?id=$code' style='margin: 10px 0px 0px 10px;'>Excluir</a></td>";
            }
            echo "</tr>";
        };
        echo "  </tbody>
        </table>";
        ?>

    </section>



    <script src="assets/js/JavaScript1.js"></script>
    <script src="assets/libs/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>