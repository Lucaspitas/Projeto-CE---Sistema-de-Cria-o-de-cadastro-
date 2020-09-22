<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mercado";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT idProduto,nome,valor,quantidade,img,idTipo FROM produto";
$result = $conn->query($sql);


   
$conn->close();
?>
<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
<body>
<center><h1>VISUALIZAÇÃO DE PRODUTOS</h1></center>
<table border="1" cellpadding="10">
	<tr class="titulo">
	<td>ID</td>
	<td>NOME</td>
	<td>VALOR</td>
	<td>QUANTIDADE</td>
	<td>IMAGEM</td>
	<td>TIPO</td>
	<td>AÇÃO</td>
	</tr>
	<?php
	if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
	?>
	<tr>
	<td><?php echo $row["idProduto"] ?></td>
	<td><?php echo $row["nome"] ?></td>
	<td><?php echo $row["valor"] ?></td>
	<td><?php echo $row["quantidade"] ?></td>
	<td><img src="<?php $row["img"] ?>"></td>
	<td><?php echo $row["idTipo"] ?></td>
	<td><?php echo "<a href='delete.php?idProduto=". $row['idProduto']."'>Deletar</a>";?>
		<?php echo "<a href='update.php?idProduto=". $row['idProduto']."'>Update</a>";?></td>
	</tr>
	<?php 
		}
	}else {
    echo "0 results";
}
	?>
</table>
<center>
<a href="insert.php" class="btn">Cadastrar Produto</a>
<a href="../index.php" class="btn"> Pagina Principal</a>
<a href="../TipoProduto/select.php" class="btn"> Visualizar Tipo</a></center></body>
<style type="text/css">
	body{margin: auto;
	font-family: 'Karla', sans-serif;}

.btn {
    display: inline-block;
    background-color: #f44336;
    color: #FFFFFF;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 16px;
    margin-left: 20px;
    opacity: 0.9;
}
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


table {
width: 100%;
border-collapse: collapse;
}


th {
background-color:#CCC;
font-size: 12px;
color:#484848;
padding-left:4px;
padding-right:4px;
border-bottom:solid 1px #CCC;
height:26px;
padding-right:5px;

	}
tr:nth-child(odd) {
		background-color:#F3F3F3;
}

tr:nth-child(even) {
		background-color:#FFF;

}

tr, td {
height:26px;
padding-left:4px;
padding-right:2px;
font-family: 'Karla', sans-serif;
font-size:12px;
white-space:nowrap;
border-bottom:solid 1px #E1E1E1;
}
tr:hover {
background-color:red;
cursor:pointer; color:#FFF;
}
</style>