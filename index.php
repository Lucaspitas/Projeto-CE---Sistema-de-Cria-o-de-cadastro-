<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Mercado";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
 ?>
<!DOCTYPE html>
<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
	<title>Projeto compras</title>
</head>
<body>

<header>
<h1>Bem-Vindo a Lista de produtos</h1>
<h2>Comece a organizar as suas compras!</h2><br><br><br>
<h2>HOME</h2>
<h2><?php if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else{echo "+CONEXÃO ATIVA+";}?></h2>
</header>
<fieldset>
<legend>
	<h3>
ESCOLHA PARA ONDE DESEJA IR:</h3></legend>

<center><a href="Produto/select.php" class="btn">Produto</a>
<a href="TipoProduto/select.php" class="btn">Tipo Produto</a></center></fieldset>
<footer><p>DESENVOLVIDO POR LUCAS PITAS BAPTISTA</p></footer>
</body>
</html>
<style type="text/css">
body{font-family: 'Karla', sans-serif;}

	header{
		text-align: center;
	background-color:red;
 color:#FFF;
height: 100%;}

footer{margin-top: 200px;
text-align: center;}

p:hover{background-color: red;
color: white;}

fieldset{border-color: red;}

h3{background-color: red;
color:white;}

.btn {
    display: inline-block;
    color: black;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 32px;
    margin-left: 20px;
    opacity: 0.9;
    border-bottom:solid 1px #CCC;
}
.btn:hover{background-color:red;
cursor:pointer; color:#FFF;}

a {

	margin-top: 40px;
    color: inherit;
}
a {
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
*, *:before, *:after {
    box-sizing: inherit;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}
</style>