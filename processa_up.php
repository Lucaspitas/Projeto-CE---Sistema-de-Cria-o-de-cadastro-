<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Mercado";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$idProduto=filter_input(INPUT_POST, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
$idTipo=filter_input(INPUT_POST, 'idTipo', FILTER_SANITIZE_NUMBER_INT);
$valor=filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);
$quantidade=filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
session_start();

$sql = "UPDATE produto SET nome='$nome', valor='$valor',quantidade='$quantidade',idTipo='$idTipo' WHERE idProduto='$idProduto'";
$result = $conn->query($sql);
$rowusuario=mysqli_fetch_assoc($result);

if (mysqli_affected_rows($conn)) {
	$_SESSION['msg']="<p> USUARIO EDITADO COM SUCESSO!</p>";
	header("location:select.php");
}else{
	$_SESSION['msg']="<p> HOUVE UM ERRO AO EDITAR O USUARIO</p>";
	header("location:update.php");
}
?>
