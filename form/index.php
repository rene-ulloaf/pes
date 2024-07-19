<?PHP
	while(!file_exists($POSICION."conexion.php"))$POSICION.="../";
	include("centro.html");
?>
	<iframe src="form/menu.php" name="menu" style="width:99%; height:130px; border:0" scrolling="no"></iframe>
	
	<iframe src="<?=$POSICION?>index.php?pagina=principal.php" id="paginas" name="paginas" style="width:99%; height:400px; border:0"></iframe>
	
	<script type="text/javascript">
		var _iframe = $("paginas");
		var _height = screen.height-130;
		
		_iframe.style.height = _height + "px";
	</script>