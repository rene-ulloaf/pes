<?PHP
	include_once("include/database/ado_mysql.php");
	
	$datosBD = new datosManager;
	
	$datosBD->host = "localhost";
	$datosBD->user = "root";
	$datosBD->pass = "Che-cheX";
	$datosBD->db   = "pes";
	
	$datosBD->conectarse_mysql();
?>
