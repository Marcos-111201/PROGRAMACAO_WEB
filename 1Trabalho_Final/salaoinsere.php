<!-- **** Inserção SQL com comandos preparados **** -->

<html>
  <head>
    <title>INSERIR SALAO</title>
    <meta charset="utf-8"/> 
    <link rel="stylesheet" type="text/css" href="estilo.css">
  </head>
    
<body> 

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



if (!mysqli_select_db($conn, $dbname)) 
{
    echo "Não foi possível selecionar base de dados \"$dbname\": " . mysqli_error($conn);
    exit;
}
    
$stmt = mysqli_stmt_init($conn);



$stmt_prepared_okay =  mysqli_stmt_prepare($stmt, "INSERT INTO rifa (nome, dia, horario, created_at,Validade) VALUES (?, ?, ?, ?, ?)");   

if ($stmt_prepared_okay) 
{
  
    mysqli_stmt_bind_param($stmt, "sssss", $nome, $dia, $horario, $hora_agendamento,$validade);

    $nome = $_GET['nome'];
    $dia= $_GET['dia'];
    $horario = $_GET['horario'];
    $hora_agendamento= date ("H :i:s");
    $validade=date("H :i:s" , strtotime('+ 4 minute'));
    $stmt_executed_okay = mysqli_stmt_execute($stmt);

    if ($stmt_executed_okay) 
    {
	   echo "<div id= 'container4'> 
                <h3><br><br>Seu horário foi agendado com sucesso.</h3><br>
                <h3> Não se esqueça de confirmar seu horário.<br><br><br> Caso contrário você perderá sua vaga! </h3><br>   
                <button onclick=\"window.location.href ='salaoconsulta.php'\" class=\"submit\">Verificar Horários</button><br><br>
             </div>";

    } else {
        echo "<div id= 'container4'> 
                <h3><br>Não foi possível agendar seu horário!</h3> <h3>Provavelmente o Horário já está reservado ou algum campo nao foi preenchido
                corretamente!!<br><br>Verifique quais horários ainda estão disponíveis ou retorne para a página inicial!</h3>
                <button onclick=\"window.location.href ='salaoconsulta.php'\" class=\"submit\">Verificar Horários</button><br><br>
                <button onclick=\"window.location.href ='interfacesalao.html'\" class=\"submit\">Voltar para Página Inicial</button><br><br>
              </div>";

             mysqli_error($conn);
        // exit;
    }
      mysqli_stmt_close($stmt);
}

/* fecha a conexão */
mysqli_close($conn);    

?>
    
</body>
</html>