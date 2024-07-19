<?PHP
	while(!file_exists($POSICION."conexion.php"))$POSICION.="../";
	include_once($POSICION."include/funcionesphp.php");
	
	$funciones = new funcionesPHP();
?>

	<script type="text/javascript" src="form/video/ingreso_video.js"></script>
	<?PHP include("centro.html");?>

	<div id="FORM_GUARDA_VIDEO" align="center">
		<fieldset>
			<legend>Datos del Juego</legend>
			<table>
				<tr>
					<td>
						<label>Version del Juego</label><br />
						<?=$funciones->combobox("version_juego","VERSION","");?>
					</td>
					<td>
						<label>Tipo de Partido</label><br />
						<?=$funciones->combobox("tipo_partido","TIPOPARTIDO","");?>
					</td>
					<td>
						<label>Dificultad</label><br />
						<?=$funciones->combobox("dificultad","DIFICULTAD","");?>
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Nombre Equipo</label><br />
						<input type="text" name="equipo" id="equipo" />
					</td>
					<td>
						<label>Nombre Equipo Contrario</label><br />
						<input type="text" name="equipo_contrario" id="equipo_contrario" />
					</td>
					<td>
						<label>Nombre del Jugador</label><br />
						<input type="text" name="jugador" id="jugador" />
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Datos del Juego</legend>
			<table>
				<tr>
					<td>
						<label>Sección</label><br />
						<?=$funciones->combobox("seccion","SECCION","");?>
					</td>
				</tr>
				
				<tr>
					<td colspan="3">
						<label>Link Youtube</label><br />
						<textarea name="link" id="link" rows="4" cols="55">http://www.youtube.com/</textarea>
					</td>
				</tr>
				
				<tr>
					<td colspan="3" align="center">
						<button name="ingreso" id="ingreso">Subir Video</button>
					</td>
				</tr>
			</table>
		</fieldset>
	</div>
	
	<script type="text/javascript">
		var video = new ingresoVideo("FORM_GUARDA_VIDEO");
	</script>