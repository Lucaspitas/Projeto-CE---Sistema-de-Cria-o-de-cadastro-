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
//isset==existir
if(isset($_POST['confirmar'])){
//registro
if (!isset($_SESSION)) 
	session_start();

	//criando sessão correspondente, percorre todos os post's
	foreach ($_POST as $key => $value) 
		$_SESSION[$key]=$value;
	

	//validação
	//tamanho da sessão
		if (strlen($_SESSION['nome'])==0) 
		$error[]="Preencha o nome corretamente!";
		
if (strlen($_SESSION['valor'])==0) 
		$error[]="Preencha o valor corretamente!";

	if (strlen($_SESSION['quantidade'])==0) 
		$error[]="Preencha o quantidade corretamente!";

	if (strlen($_SESSION['idTipo'])==0) 
		$error[]="Preencha o quantidade corretamente!";

$nome_temporario=$_FILES["arquivo"]["tmp_name"];
$nome_real=$_FILES["arquivo"]["name"];
copy($nome_temporario,"imagens/$nome_real");
$arquivo = $_FILES['arquivo']["name"];
	//inserção
if (count($error)==0) {
	$sql = "INSERT INTO produto (nome,valor,quantidade,img,idTipo)
VALUES ('$_SESSION[nome]', '$_SESSION[valor]','$_SESSION[quantidade]','imagens/$arquivo','$_SESSION[idTipo]')";

$confirma=$conn->query($sql)or die($conn->error);
if ($confirma) {
	unset($_SESSION[nome], $_SESSION[valor],$_SESSION[quantidade],$_SESSION[idTipo]);
	header("location: select.php");
}else{$error[] = $confirma;}


}
if (count($error)>0) {
	echo "<div class='erro'>";
	 foreach ($error as $value)
	  echo "$valor <br>"; 
	echo "</div>";
	
}


}
$sql1 = "SELECT idTipo,Tipo FROM Tipo_Produto";
$result1 = $conn->query($sql1);

?>
<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
<script type="text/javascript">
$(document).ready(function(){
 $("#valor").mask("(00) 0000-0000");
});
</script>

<form action="#" method="POST">
    <fieldset>
<legend>CADASTRO DE PRODUTOS</legend>
	<label>Nome:</label><br><br>
	<input type="text" name="nome"><br><br>
	<label>Valor:<label><br><br>
	<input type="text" name="valor" id="valor"><br><br>
    <label>Quantidade:<label><br><br>
    <input type="text" name="quantidade"><br><br>
        <label>Imagem:<label><br><br>
    <input type="file" name="arquivo"><br><br>
		<label>Tipo:<label><br><br>
 <select name="idTipo">

            <?php while($row1 = mysqli_fetch_array($result1)):;?>

            <option value="<?php echo $row1['idTipo'];?>" ><?php echo $row1['Tipo'];?></option>

            <?php endwhile;?>

        </select>
	<input type="submit" name="confirmar" value="Enviar" id="Enviar"><br><br></fieldset>
</form>
<center><a href="select.php" class="btn">Visualizar dados</a>
<a href="../index.php" class="btn"> Pagina Principal</a>
<a href="../TipoProduto/select.php" class="btn"> Visualizar Tipo</a>
</center>
<style type="text/css">
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
form #Enviar {
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
form #Enviar:hover {
   box-shadow: inset 0 0 0 5px lightgreen;

}
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
</style>