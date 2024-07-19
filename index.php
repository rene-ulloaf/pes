<?PHP
	include_once("conexion.php");
	include("include/sesion.php");
	include_once("include/funcionesphp.php");
	
	$sesion = new sesion();
	$funciones = new funcionesPHP();
	
	$pagina = $_GET["pagina"] == ""  ? "index.php" : $_GET["pagina"];
	
	require_once("cabecera.html");
	
	require_once("header.php");
	
	require_once("form/".$pagina);
	
	require_once("pie.php");
?>