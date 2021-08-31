<?php
  session_start();
  $_SESSION["data"] = $_GET['data'];
?>

<head>
<meta charset="utf-8"/>
<head>

<body>
<form action="quiz5.php" method="GET">
    <h1 style="color: Snow; background-color: SteelBlue; text-align:center;">ATIVIDADE - QUIZ</h1>
    <h2>5)Qual desses filmes é um filme da Pixar?</h2>
    
    <img src = "/imagens/pixar.jpg" alt="Papai Noel"><br><br>
    <label for="filme"></label>
    <select name="filme">
        <option value="Frozen">Frozen</option>
        <option value="Toy Story">Toy Story</option>
        <option value="Harry Potter">Harry Potter</option>
        <option value="Titanic">Titanic</option>
    </select>

    <input type="submit" value="Enviar" name="submit">
</form>
  
</body>
</html>
