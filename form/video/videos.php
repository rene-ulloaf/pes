<?PHP
	while(!file_exists($POSICION."conexion.php"))$POSICION.="../";
?>

<script type="text/javascript" src="form/video/crea_video.js"></script>

<?PHP include("centro.html");?>

<div id="videos" align="center"></div>

<script type="text/javascript">
	var vid = new Videos();
</script>