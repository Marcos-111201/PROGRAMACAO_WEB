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

  

  $nome = $_GET["nome"];
  $salario = $_GET["salario"];
  $nome2 = $_GET["nome2"];
  $button = $_GET["submit-button"];
  
  // INSERIR
  if ($button == "Inserir")
  {
    $sql = "INSERT INTO funcionarios (nome, salario) VALUES ('$nome', $salario)";
    $result = mysql_query($sql);

    if ($result) {
        echo "Os registros foram inseridos com sucesso.";
    } else {
        echo "Não foi possível executar ($sql) no banco de dados: " . mysql_error();
        exit;
    }
  
    mysql_free_result($result);
  }


  // ATUALIZAR 
  if ($button == "Atualizar")
  {
    $sql = "UPDATE funcionarios SET nome = '$nome', salario = $salario WHERE nome = '$nome2' ";
    
    $result = mysql_query($sql);

    if ($result) {
        echo "Os registros foram alterados com sucesso.";
    } else {
        echo "Não foi possível executar ($sql) no banco de dados: " . mysql_error();
        exit;
    }
  
    mysql_free_result($result);
  }


  // EXCLUIR
  if ($button == "Excluir")
  {
    $sql = "DELETE FROM funcionarios WHERE nome = '$nome'";

    $result = mysql_query($sql);

    if ($result) {
        echo "Os registros foram excluidos com sucesso.";
    } else {
        echo "Não foi possível executar ($sql) no banco de dados: " . mysql_error();
        exit;
    }
  
    mysql_free_result($result);
  }        
?>

<html>
    <body>
    <br><br><br><a href = "consulta.php">Consultar Dados</a><br><br>
    <br><a href = "interface.html">Voltar para Pagina Inicial</a>
    </body>
</html>