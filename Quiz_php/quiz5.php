<?php
    session_start();
    $_SESSION["filme"] = $_GET['filme'];
    
    $q1 = $_COOKIE["imagem"];
    $q2 = $_COOKIE["logo"];
    $q3 = $_COOKIE["heroi"];
    $q4 = $_SESSION["data"];
    $q5 = $_SESSION["filme"];

    $total = 0;

    if ($q1 == "Janela"){
        $total = 2;}
    if ($q2 == "Nike"){
      $total = $total + 2;}
    if ($q3 == "Homem Aranha"){
      $total = $total + 2;}
    if ($q4 == "Natal" or $q4 == "natal"){
      $total = $total + 2;}
    if ($q5 == "Toy Story"){
      $total = $total + 2;}
?>

<html>
<head>
<meta charset="utf-8"/>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>

<body>
<h1 style="color:White; background-color: SteelBlue; text-align:center;">PAGINA DE RESPOSTAS</h1><br><br><br>

<?php
  echo "<table>
    <tr>
      <th>Perguntas</th>
      <th>Suas Respostas</th>
      <th>Respostas Corretas</th>
    </tr>
    <tr>
      <td>Clique na imagem que é de uma janela com gotas de chuva</td>
      <td>$q1</td>
      <td>Janela</td>
    </tr>
    <tr>
      <td>Qual dessas empresas vende sapatos?</td>
      <td>$q2</td>
      <td>Nike</td>
    </tr>
    <tr>
      <td>Qual desses super herois nao usa capa?</td>
      <td>$q3</td>
      <td>Homem Aranha</td>
    </tr>
    <tr>
      <td>O papai noel é caracteristico de qual data comemorativa?</td>
      <td>$q4</td>
      <td>Natal / natal</td>
    </tr>
    <tr>
      <td>Qual desses filmes é um filme da Pixar?</td>
      <td>$q5</td>
      <td>Toy Story</td>
    </tr>
  </table><br><br>

  <table>
  <tr>
      <th>Pontuação Total</th>
      <th>Sua pontuação</th>
  </tr>
  <tr>
      <td>10</td>
      <td>$total</td>
  </tr>
  </table>";
?>

</body>
</html>
