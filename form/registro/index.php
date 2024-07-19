<?PHP
	while(!file_exists($POSICION."cabecera.html"))$POSICION.="../";
?>

<link rel="stylesheet" type="text/css" href="css/registro.css" />
<script type="text/javascript" src="form/registro/registro.js"></script>

<?PHP include("centro.html");?>

<div id="REGISTRO">
	<div id="REGISTRO_titulo" class="titulo">
		Registro
	</div>
	
	<div id="REGISTRO_datospersonales_form">
		<fieldset>
			<legend>Datos Personales</legend>
			<table>
				<tr>
					<td>
						<label>Nombres:</label>
					</td>
					<td colspan="3">
						<input type="text" name="nombres" style="width:400px" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Primer Apellido:</label>
					</td>
					<td colspan="3">
						<input type="text" name="apellidouno" style="width:250px" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Segundo Apellido:</label>
					</td>
					<td colspan="3">
						<input type="text" name="apellidodos" style="width:250px" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Pais:</label>
					</td>
					<td>
						<select name="pais">
							<?php
								$idpais =  $funciones->pais_ip();
								$result = $datosBD->query("SELECT idpais,nombre_pais FROM paises;");
								
								while($row = $datosBD->object_result($result)){
									$idpais == $row->idpais ? $select = "selected='selected'" : $select = "";
									echo "<option value='" .$row->idpais. "' " .$select. ">" .$row->nombre_pais. "</option>";
								}
							?>
						</select>
					</td>
				</tr>
				<tr style="display:none">
					<td>
						<label>Ciudad:</label>
					</td>
					<td>
						<input type="text" name="ciudad" />
					</td>
					<td>
						<label>Comuna:</label>
					</td>
					<td>
						<input type="text" name="comuna" />
					</td>
				</tr>
			</table>
		</fieldset>
		
		<fieldset>
			<legend>Datos de Registro</legend>
			<table>
				<tr>
					<td>
						<label>Nombre de Usuario:</label>
					</td>
					<td colspan="3">
						<input type="text" name="nombresusuario" style="width:400px" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Contraseña:</label>
					</td>
					<td colspan="2">
						<input type="password" name="passuno" style="width:250px" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>Repetir Contraseña:</label>
					</td>
					<td colspan="2">
						<input type="password" name="passdos" style="width:250px" />
					</td>
				</tr>
				
				<tr>
					<td>
						<label>E-Mail:</label>
					</td>
					<td>
						<input type="text" name="email" style="width:250px" />
					</td>
				</tr>
			</table>
		</fieldset>
		
		<table align="center">
			<tr>
				<td>
					<button type="button" id="registrar" name="registrar" class="textonegro">Registro</button>
					<button type="button" id="cancelar" name="cancelar" class="textonegro">Cancelar</button>
				</td>
			</tr>
		</table>
	</div>
</div>

<script type="text/javascript">
	var POSICION = "<?=$POSICION;?>";
	var registro = new Registro("REGISTRO_datospersonales_form");
</script>