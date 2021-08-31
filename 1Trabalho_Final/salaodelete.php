<!-- **** Excluir SQL com comandos preparados **** -->

<html>
  <head>
    <title>EXCLUIR SALÃO</title>
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
// echo "Conectado com Sucesso <BR><BR>";

// Selecionando banco
if (!mysqli_select_db($conn,$dbname)) {
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}

//stmt = statment ou comando
//stmt é o comando a ser preparado    
$stmt = mysqli_stmt_init($conn);

//devolve um boolen indicando se a string do stmt está ok

$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "DELETE FROM rifa WHERE confirmed = false and created_at < DATE_SUB(CONVERT_TZ(NOW(),'+00:00','+02:00'), interval 2 MINUTE)");   

if ($stmt_prepared_okay) {


    /* atribui os parâmetros aos marcadores */
    /*tipos possíveis de marcadores:
      i - integer
      d - double
      s - string
      b - BLOB*/
    mysqli_stmt_bind_param($stmt, "s",$del_horario);
    
    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) {
	   echo "Os registros foram Deletados com sucesso.";
    } else {
        echo "Não foi possível executar a exclusão";
         
             mysqli_error($conn);
        exit;
    }
      mysqli_stmt_close($stmt);
}

/* fecha a conexão */
mysqli_close($conn);
?>
</body>
</html>