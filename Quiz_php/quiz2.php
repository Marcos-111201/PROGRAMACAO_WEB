<?php
  $q2= $_GET['logo'];
  setcookie("logo", $q2);
?>

<head>
<meta charset="utf-8"/>
<head>

<body>
<form action="quiz3.php" method="GET">
    <h1 style="color: Snow; background-color: SteelBlue; text-align:center;">ATIVIDADE - QUIZ</h1>
    <h2>3)Qual desses super herois nao usa capa?</h2>
    
    <img src = "/imagens/nada-de-capas.jpg" alt = "Nada de Capas" width="460" height="290"><br><br>
    <input type="checkbox" value="Superman" name="heroi">Superman <br><br>
    <input type="checkbox" value="Batman" name="heroi">Batman <br><br>
    <input type="checkbox" value="Homem Aranha" name="heroi">Homem Aranha <br><br>
    <input type="checkbox" value="Doutor Estranho" name="heroi">Doutor Estranho <br><br>

    <input type="submit" value="Enviar" name="submit-button">
</form>
  
</body>
</html>
