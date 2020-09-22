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
$idProduto=filter_input(INPUT_GET, 'idProduto', FILTER_SANITIZE_NUMBER_INT);
$idTipo=filter_input(INPUT_GET, 'idTipo', FILTER_SANITIZE_NUMBER_INT);
$valor=filter_input(INPUT_GET, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);
$quantidade=filter_input(INPUT_GET, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$nome=filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
session_start();

$sql = "SELECT idProduto,nome,valor,quantidade,idTipo FROM produto WHERE idProduto='$idProduto'";
$result = $conn->query($sql);
$rowusuario=mysqli_fetch_assoc($result);

?>

<?php
if (isset($_SESSION['msg'])) {
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
$sql1 = "SELECT idTipo,Tipo FROM Tipo_Produto";
$result1 = $conn->query($sql1);

?>

<form action="processa_up.php " method="POST">
	<fieldset>
	
<legend><h1>EDITAR PRODUTOS</h1>
</legend>
	<input type="hidden" name="idProduto" value="<?php echo $rowusuario['idProduto']; ?>">
	<label>Nome:</label>
	<input type="text" name="nome" value="<?php echo $rowusuario['nome']; ?>">
	<label>Valor:</label>
	<input type="text" name="valor" value="<?php echo $rowusuario['valor']; ?>">
	<label>Quantidade:</label>
	<input type="text" name="quantidade" value="<?php echo $rowusuario['quantidade']; ?>">
     <label>Tipo:</label><select name="idTipo" value="$rowusuario['idTipo'];">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1['idTipo'];?>" ><?php echo $row1['Tipo'];?></option>

            <?php endwhile;?>

        </select>
	
	
	<input type="submit" name="confirmar" value="Editar" id="editar"></fieldset>
</form>
<center>
<a href="select.php" class="btn">Visualizar dados</a>
<a href="../index.php" class="btn"> Pagina Principal</a>	</center>
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

    body{margin: auto;
        font-family: 'Karla', sans-serif; }
    form {
    width: 100%;
    margin-top: 40px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
form fieldset {
    width: 100%;
    max-width: 500px;
    border: 1px solid #CCC;
    padding: 10px 20px 20px 20px;
}
form fieldset legend {
    font-weight: bold;
}
form fieldset label {
    width: 100%;
}
form fieldset input {
    width: calc(100% - 22px);
    height: 40px;
    font-size: 12px;
    background-color: #FFF;
    border: 1px solid #CCC;
    margin-bottom: 10px;
    padding: 0 10px;
}
form fieldset textarea {
    width: calc(100% - 22px);
    height: 120px;
    font-size: 12px;
    background-color: #FFF;
    border: 1px solid #CCC;
    padding: 10px;
}
form #editar {
    height: 40px;
    background-color: green;
    color: #FFF;
    font-size: 20px;
    margin-top: 10px;
    padding: 0 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}
form #editar:hover {
   box-shadow: inset 0 0 0 5px lightgreen;

}
</style>