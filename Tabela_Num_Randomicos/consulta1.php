<!-- ************ Consulta SQL com comandos preparados ******** -->

<html>
  <head>
        <title>CONSULTA BD</title>
        <meta charset="utf-8"/> 
        <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 65%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 4px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>
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


$sql = "SELECT num_concurso, data_concurso, num_01, num_02, num_03 FROM tabela";

//stmt = statment ou comando
//stmt é o comando a ser preparado    
$stmt = mysqli_stmt_init($conn);    
$stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);  
  
/* create a prepared statement */
if ($stmt_prepared_okay) 
{
    /* Liga parametros com os marcadores */
    mysqli_stmt_bind_param($stmt, "i", $numc);

    /* executa a query */
    mysqli_stmt_execute($stmt);

    /* liga as variávais de resultado */
    mysqli_stmt_bind_result($stmt, $numc, $data, $num1, $num2, $num3);

    /* busca os valores */
    while(mysqli_stmt_fetch($stmt))
    {
        echo "
        <table>
            <tr>
            <th>Número do Bilhete</th>
            <th>Data de Emissão</th>
            <th>Número 1</th>
            <th>Número 2</th>
            <th>Número 3</th>
            <th>Excluir</th>
            </tr>

            <tr>
            <td> $numc</td>
            <td> $data</td>
            <td> $num1</td>
            <td> $num2</td>
            <td> $num3</td>
            <td> <a href=deletar.php?numc=$numc><button>Deletar</button></a></td>
            </tr>
        </table>";
    }

    /* close statement */
    mysqli_stmt_close($stmt);
}    
    
?>

  <b><br>
  <a href = "interface1.php">Voltar para Página Inicial</a></b>
</body>
</html> 