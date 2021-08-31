<?php
    $q3 = $_GET['heroi'];
    setcookie("heroi",$q3);
?>

<head>
<meta charset="utf-8"/>
<head>

<body>
<form action="quiz4.php" method="GET">
    <h1 style="color: Snow; background-color: SteelBlue; text-align:center;">ATIVIDADE - QUIZ</h1>
    <h2>4)O papai noel é caracteristico de qual data comemorativa?</h2>
    
    <img src = "/imagens/papainoel.jpg" alt="Papai Noel"><br><br>
    <input type="text" name="data"  placeholder="Digite sua resposta aqui">

    <input type="submit" value="Enviar" name="submit">
</form>
  
</body>
</html>
