<?php
  $q1= $_GET['imagem'];
  setcookie("imagem", $q1);
?>
 
<html>

<head>
<meta charset="utf-8"/>
<head>
    
<body>
<form  action="quiz2.php" method="GET">
    <h1 style="color: Snow; background-color: SteelBlue; text-align:center;">ATIVIDADE - QUIZ</h1>
    <h2>2)Qual dessas empresas vende sapatos?</h2> 

    <input type="radio" value="Mc Donalds" name="logo">Mc Donalds<br>
    <img src = "/imagens/mcdonalds.png"><br><br>

    <input type="radio" value="Burguer King" name="logo">Burguer King<br><br>
    <img src = "/imagens/burguerking.png" width="170" height="150"><br><br><br>

    <input type="radio" value="Nike" name="logo">Nike<br>
    <img src = "/imagens/nike.png"><br>
    
    <input type="radio" value="Toyota" name="logo">Toyota<br>
    <img src = "/imagens/toyota.png"><br><br>

    <input type="submit" value="Enviar" name="submit-button">
</form>

</body>
</html>
