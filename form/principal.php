<?PHP
	while(!file_exists($POSICION."conexion.php"))$POSICION.="../";
?>
	
	<link rel="stylesheet" type="text/css" href="css/inicio.css" />
	<script type="text/javascript" src="form/login.js"></script>
	<?PHP include("centro.html");?>

<div id="PRINCIPAL" class="texto" style="Padding-left:20px; Padding-right:20px">
	<div id="PRINCIPAL_usuario" class="usuarioBienvenida"><span id="PRINCIPAL_usuario_idusario"></span></div>
	
	<div id="PRINCIPAL_bienvenida" class="cajaBienvenida">
		Esta Página esta hecha para que todos decidamos el Ranking de lo mejor del PES.
	</div>
	
	<div id="PRINCIPAL_login">
		<div class="head">Usuarios Registrados</div>
		<div class="tablaLogin">
			<div class="celdas"><label for="usuario">Nombre de Usuario</label></div>
			<div class="celdas"><input type="text" name="usuario" /></div>
			<div class="celdas"><label for="password">Password</label></div>
			<div class="celdas"><input type="password" name="password" /></div>
			<div class="celdas"><button type="button" name="ingresar" id="ingresar" class="textonegro">Ingresar</button></div>
		</div>
		<div class="foot"><a href="index.php?pagina=registro/index.php">Registrarse</a></div>
	</div>
</div>

<script type="text/javascript">
	var login = new Login("PRINCIPAL_login","<?=$_SESSION["ss_usuario"]?>");
</script>

<?php
/*echo "<pre>";
print_r($_SERVER);
echo "</pre>";
$archivo = "contador.txt"; 
$contador = 0; 

$fp = fopen($archivo,"r"); 
$contador = fgets($fp, 26); 
fclose($fp); 

++$contador; 

$fp = fopen($archivo,"w+"); 
fwrite($fp, $contador, 26); 
fclose($fp); 

echo "Esta página ha sido visitada $contador veces";*/
?>  
