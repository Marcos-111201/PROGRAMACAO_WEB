<!-- **** Consulta SQL com comandos preparados **** -->

<html>
  <head>
        <title>CONSULTA SALAO</title>
        <meta charset="utf-8"/> 
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <style>
        table {
            margin: auto;
            font-weight: bold;
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 72%;
        }

        td, th {
            color: snow;
            border: 1px solid #dddddd;
            text-align: center;
            padding: 4px;
        }

        tr:nth-child(even) {
            color: snow;
            background-color: rgba(73, 71, 71, 0.705);
        }

        tr:nth-child(odd) {
            color: snow;
            background-color: #960000;
        }
        </style>
  </head>
    
<body> 

    <div id="container1">
        <h1>HORÁRIOS MARCADOS</h1>
    </div><br><br><br>

<?php

//Config. para acesso ao mySql localmente 
$servername = "sql311.epizy.com";
$username = "epiz_26899374";
$password = "iz4yyWJRXkG";
$dbname = "epiz_26899374_andrynne";

$conn = mysqli_connect($servername, $username, $password);


if (!$conn) 
{
  die("Falha na Conexão: " . mysqli_connect_error());
}
// echo "Conectado com Sucesso <BR><BR>";


// Selecionando banco
if (!mysqli_select_db($conn, $dbname)) 
{
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}


$sql = "SELECT nome,dia, horario,created_at, confirmed, Validade FROM rifa";

//stmt = statment ou comando
//stmt é o comando a ser preparado    
$stmt = mysqli_stmt_init($conn);    
$stmt_prepared_okay = mysqli_stmt_prepare($stmt, $sql);  
  
/* create a prepared statement */
if ($stmt_prepared_okay) 
{
    /* Liga parametros com os marcadores */
    mysqli_stmt_bind_param($stmt, "ss",$dia, $horario);

    /* executa a query */
    mysqli_stmt_execute($stmt);

    /* liga as variávais de resultado */
    mysqli_stmt_bind_result($stmt, $nome, $dia, $horario,$hora_agendamento, $confirmed,$validade);

    /* busca os valores */
    while(mysqli_stmt_fetch($stmt))
    {
        echo "
        <table>
            <tr>
            <th>Nome do Cliente</th>
            <th>Horário Marcado</th>
            <th>Momento do Agendamento</th>
            <th>Validade</th>
            <th>Status</th>
            </tr>

            <tr>
            <td> $nome</td>
            <td> $dia às $horario</td>
            <td> $hora_agendamento</td>
            <td> $validade</td>
            <td>";

             if ($confirmed == 0) { 
                echo " <a href=confirmar_horario.php?horario=$horario&dia=$dia><button>Confirmar</button></a>";                
            }
            else{
                echo "Confirmado";
            }
            echo "
            </td>
            </tr>
        </table>";
    }

    /* close statement */
    mysqli_stmt_close($stmt);
}    

    
?>

    <br><br>
    <button onclick="window.location.href ='interfacesalao.html'" class="submit2">Voltar para Página Inicial</button>
  <br><br>
  
</body>
</html>