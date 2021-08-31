<!DOCTYPE HTML>  

<html>

<head>
<meta charset="utf-8"/>
</head>

<body>  

<?PHP

$frase = $_GET['txfrase'];

echo "<h2>CONFIRMAÇÃO DOS DADOS</h2>"     . "<br> <br>";

echo "Frase: "                            .  $frase                 . "<br>"; 
echo "Número de caracteres da frase: "    .  strlen($frase)         . "<br>";
echo "Número de palavras da frase: "      .  str_word_count($frase) . "<br>";
echo "Posição da palavra IFCE: "          .  strpos($frase, "IFCE") . "<br>";

?>

<br><a href = "formulario.html" ign: inherit> Voltar para a pagina inicial </a>

</body>
</html>

