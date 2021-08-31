<!DOCTYPE HTML>  
<html>
<head>
<meta charset="utf-8"/>
</head>
<body>  


<?PHP

$nome = $_GET['txNome'];
$sexo = $_GET['rdSexo'];
$email = $_GET['txEmail'];
$webSite = $_GET['txWebsite'];
$comentario = $_GET['txAreaComentario'];

echo "Parâmetros da Requisição: " . "<br> <br>";

echo "Nome: "     . $nome      . "<br>"; 
echo "Sexo: "     . $sexo      . "<br>";
echo "E-mail: "    . $email     . "<br>";
echo "Website: "   . $webSite   . "<br>";

echo "Comentário: $comentario <br>";

?>

