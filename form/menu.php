<?PHP
	while(!file_exists($POSICION."conexion.php"))$POSICION.="../";
	require($POSICION."cabecera.html");
?>

<script type='text/javascript' src='<?=$POSICION?>componentes/prototype.js'></script>
<script type='text/javascript' src='<?=$POSICION?>js/librerias/iu.js'></script>
		
<link rel='stylesheet' type='text/css' href='<?=$POSICION?>componentes/menu_dock/styles.css' />
<script type='text/javascript' src='<?=$POSICION?>componentes/menu_dock/hide_menu.js'></script>

<?PHP require($POSICION."centro.html"); ?>

		<div id="hit_area" onmouseover="iu.menu.toggleDown();"></div>
		<div id="menu_holder">
			<div id="nav">
				<ul>
					<li><a href="<?=$POSICION?>index.php?pagina=principal.php" target="paginas">Inicio</a></li>
					<li><a href="<?=$POSICION?>index.php?pagina=video/videos.php" target="paginas">Videos</a></li>
					<li><a href="<?=$POSICION?>index.php?pagina=video/guarda_video.php" target="paginas">Subir Video</a></li>
					<li><a href=# target="paginas">Tutorial</a></li>
					<li><a href=# target="paginas">Foro</a></li>
				</ul>
			</div>
		</div>
		<div id="hit_area2" onmouseover="iu.menu.toggleUp();">&nbsp;</div>
		
		<script type="text/javascript">
			var iu = new iu();
		</script>
	</body>
</html>