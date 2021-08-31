<!-- ************ Confirmar SQL com comandos preparados ******** -->

<html>
  <head>
    <title>Confirmar - SALAO</title>
    <meta charset="utf-8"/> 
  </head>
    
<body>


<?php

//Config. para acesso ao mySql localmente 
$servername = "sql311.epizy.com";
$username = "epiz_26899374";
$password = "iz4yyWJRXkG";
$dbname = "epiz_26899374_andrynne"; 

$conn = mysqli_connect($servername, $username, $password);


if (!$conn) {
  die("Falha na Conexão: " . mysqli_connect_error());
}
echo "Conectado com Sucesso <BR><BR>";

// Selecionando banco
if (!mysqli_select_db($conn,$dbname)) {
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}

//stmt = statment ou comando
//stmt é o comando a ser preparado    
$stmt = mysqli_stmt_init($conn);

//devolve um boolen indicando se a string do stmt está ok
$up_hora= $_GET['horario'];
$up_dia= $_GET['dia'];
$stmt_prepared_okay =  mysqli_stmt_prepare($stmt,  "UPDATE rifa SET confirmed = 1 Where horario = '$up_hora' and dia = '$up_dia' ");   

if ($stmt_prepared_okay) {
    /* atribui os parâmetros aos marcadores */
    /*tipos possíveis de marcadores:
      i - integer
      d - double
      s - string
      b - BLOB*/
    mysqli_stmt_bind_param($stmt, "s",$up_horario);
    
    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
	   echo "Seu horário foi confirmado.";
    } else {
        echo "Não foi possível realizar a confirmação";
         
             mysqli_error($conn);
        exit;
    }
      mysqli_stmt_close($stmt);
}

/* fecha a conexão */
mysqli_close($conn);

header("Location: salaoconsulta.php");

?>

<br><a href="salaoconsulta.php">consultar</a><br>
</body>
</html>
