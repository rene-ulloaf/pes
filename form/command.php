<?PHP
	while(!file_exists($POSICION."conexion.php"))$POSICION.="../";
	include_once($POSICION."include/funcionesphp.php");
	
	session_start();
	
	$funciones = new funcionesPHP();
	
	switch($cmd){
		case "verificar_usuario":
			$usuario = "'" .addslashes($_POST["usuario"]). "'";
			$pass 	 = "'" .md5(addslashes($_POST["pass"])). "'";
			
			$query = "SELECT fn_verificar_usuario(" .$usuario. "," .$pass. ") AS respuesta;";
			//die($query);
		break;
		
		case "sesion":
			include($POSICION. "include/sesion.php");
			$idusuario = addslashes($_POST["idusuario"]);
			
			$sesion = new sesion();
			
			$sesion->idusuario = $idusuario;
			//$sesion->nomre = "usuario";
			
			//$sesion->nombre_sesion = "usuario";
			if($sesion->crear() == ""){
				die("OK");
			}else{
				die("NO");
			}
		break;
		
		case "ingreso_usuario":
			$idusuario 	 = "'" .strtolower(addslashes($_POST["idusuario"])). "'";
			$pass 		 = "md5('" .addslashes($_POST["pass"]). "')";
			$pass2 		 = "md5('" .addslashes($_POST["pass2"]). "')";
			$nombres 	 = "'" .addslashes($_POST["nombres"]). "'";
			$apellidouno = "'" .addslashes($_POST["apellidouno"]). "'";
			$apellidodos = "'" .addslashes($_POST["apellidodos"]). "'";
			$pais 		 = "'" .addslashes($_POST["pais"]). "'";
			$email 		 = "'" .addslashes($_POST["email"]). "'";
			
			if($pass != $pass2){
				die("Las Contrase'\u00f1as deben ser iguales");
			}
			
			if($funciones->valida_email($email)){
				die("El e-mail no es v?lido");
			}
			
			$query = "SELECT count(idusuario) AS cont FROM usuarios WHERE idusuario = " .$idusuario;
			$result = $datosBD->query($query);
			$result = $datosBD->object_result($result);
			
			if($result->cont > 0){
				die("Usuario " .$idusuario. " Ya Existe");
			}
			
			$query = "
				SELECT fn_crear_usuario(
					 '" .$idusuario. "'
					," .$pass. "
					," .$nombres. "
					," .$apellidouno. "
					," .$apellidodos. "
					," .$pais. "
					," .$email. "
				) AS guardado;
			";
			//die(nl2br($query));
		break;
		
		case "guardarVideo":
			$version_juego    = addslashes($_POST["version_juego"]);
			$tipo_partido     = addslashes($_POST["tipo_partido"]);
			$dificultad    	  = addslashes($_POST["dificultad"]);
			$equipo    		  = "'".addslashes(trim($_POST["equipo"]))."'";
			$equipo_contrario = "'".addslashes(trim($_POST["equipo_contrario"]))."'";
			$jugador    	  = "'".addslashes(trim($_POST["jugador"]))."'";
			$seccion    	  = addslashes($_POST["seccion"]);
			$link   		  = addslashes(trim($_POST["link"]));
			
			if($_SESSION["ss_usuario"] == ""){
				die("Debe estar registrado para ingresar videos");
			}else{
				if($funciones->valida_url_youtube($link)){
					$query = "SELECT fn_guarda_video(
						 '".$_SESSION["ss_usuario"]. "'
						," .$version_juego. "
						," .$tipo_partido. "
						," .$dificultad. "
						," .$equipo. "
						," .$equipo_contrario. "
						," .$jugador . "
						," .$seccion. "
						,'" .$link. "'
					) AS guardado;";
					//die($query);
				}
			}
		break;
		
		case "obtener_videos":
			$query = "Select * From videos";
			//die($query);
		break;
		
		default:
			echo "Comando no V�lido.";
		break;
	}
?>