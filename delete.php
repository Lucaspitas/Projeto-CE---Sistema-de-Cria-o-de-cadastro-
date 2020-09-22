<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mercado";

$idProduto=filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to delete a record
$sql = "DELETE FROM produto WHERE idProduto='$idProduto'";

if ($conn->query($sql) === TRUE) {
    echo "<center><h1>Delete realizado com sucesso!</h1></center>";
} else {
    echo "<center><h1>Error deleting record: " . $conn->error."</h1></center>";
}

$conn->close();

?>
<center>
<br><a href="../index.php" class="btn"> Pagina Principal</a>
<a href="select.php" class="btn">Visualizar dados</a></center>
<style type="text/css">
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


</style>