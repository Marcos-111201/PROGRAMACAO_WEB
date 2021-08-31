<!-- ************ Inserção SQL com comandos preparados ******** -->

<html>
  <head>
    <title>INSERIR BD</title>
    <meta charset="utf-8"/> 
  </head>
    
<body> 

<?php

//Config. para acesso ao mySql localmente 
$servername = "sql309.epizy.com";
$username = "epiz_26899466";
$password = "TtbkS6BfISRIRJl";
$dbname = "epiz_26899466_atv_php_mysql";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) 
{
  die("Falha na Conexão: " . mysqli_connect_error());
}
echo "Conectado com Sucesso <BR><BR>";


// Selecionando banco
if (!mysqli_select_db($conn, $dbname)) 
{
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}

//stmt = statment ou comando
//stmt é o comando a ser preparado    
$stmt = mysqli_stmt_init($conn);


//devolve um boolen indicando se a string do stmt está ok
$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO tabela (num_concurso, data_concurso, num_01, num_02, num_03) VALUES (?, ?, ?, ?, ?)");   

if ($stmt_prepared_okay) 
{
    /* atribui os parâmetros aos marcadores */
    /*tipos possíveis de marcadores:
      i - integer
      d - double
      s - string
      b - BLOB*/
    mysqli_stmt_bind_param($stmt, "isiii", $numc, $data, $num1, $num2, $num3);
    
    //// Variaveis para armazenar os valores
    $numc = 0;                  
    $data = date('y/m/d');       
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $num3 = rand(0, 100);

    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) 
    {
	   echo "Os registros foram inseridos com sucesso.";

    } else {
        echo "Não foi possível executar a inserção de ".
             "$nome $salario no banco de dados" . 
             mysqli_error($conn);
        exit;
    }
      mysqli_stmt_close($stmt);
}

/* fecha a conexão */
mysqli_close($conn);    

?>
    <br><br><br><b>
    <a href = "consulta1.php">Consultar Bilhetes</a><br><br><br>
    <a href = "interface1.php">Voltar para Página Inicial</a></b>
</body>
</html>