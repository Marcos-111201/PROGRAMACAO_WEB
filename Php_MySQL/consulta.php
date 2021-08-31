<?php

  //Config. para o acesso no MySQL no InfinityFree
  $servername = "sql309.epizy.com";
  $username = "epiz_26899466";
  $password = "TtbkS6BfISRIRJl";
  $dbname = "epiz_26899466_atv_php_mysql";

  $conn = mysql_connect($servername, $username, $password);

  
  if (!$conn) {
      echo "Não foi possível conectar ao banco de dados: " . mysql_error();
      exit;
  }
  mysql_set_charset('UTF-8');

  // Selecionando banco
  if (!mysql_select_db($dbname)) {
      echo "Não foi possível selecionar empresa: " . mysql_error();
      exit;
  }


  $sql = "SELECT nome, salario FROM funcionarios";


  $result = mysql_query($sql);

  if (!$result) {
      echo "Não foi possível executar a consulta ($sql) no banco de dados: " . mysql_error();
      exit;
  }

  if (mysql_num_rows($result) == 0) {
      echo "Não foram encontradas linhas, nada para mostrar";
      exit;
  }

  // Enquanto uma linha de dados existir, coloca esta linha em $row como uma matriz associativa
  while ($row = mysql_fetch_assoc($result)) {
      echo 'Nome: '.$row["nome"]."<br>";
      echo 'Salario: '.$row["salario"].'<br><br>';
  }

  mysql_free_result($result);
?>

<html>
    <body>
    <a href = "interface.html">Voltar para Pagina Inicial</a>
    </body>
</html>
