<?PHP
	while(!file_exists($POSICION."cabecera.html"))$POSICION.="../";
	require_once($POSICION."conexion.php");
	
	$datosBD = new datosManager;
	$cmd = $_POST["cmd"];
	
	$result = $datosBD->query("BEGIN;");
	
	if($datosBD->conectarse_mysql()){
		switch($cmd){
			case "verificar_usuario":
				$usuario = "'".addslashes($_POST["usuario"])."'";
				$pass = "'".MD5(addslashes($_POST["pass"]))."'";
				
				$query = "SELECT fn_verificar_usuario(" .$usuario. "," .$pass. ") AS respuesta;";
				//die($query);
			break;
			
			case "ingresar_usuario":
				$nombres = $_POST["nombres"];
				$apellidouno = $_POST["apellidouno"];
				$apellidodos = $_POST["apellidodos"];
				$pais = $_POST["pais"];
				$nombresusuario = $_POST["nombresusuario"];
				$pass = $_POST["pass"];
				$email = $_POST["email"];
				
				$query = "SELECT fn_crear_usuario('" .$nombres. "','" .$apellidouno. "','" .$apellidodos. "','" .$email. "') AS idusuario;";
				$result = $datosBD->query($query);
				$respuesta = $datosBD->object_result($result);
				
				if($datosBD->error() == ""){
					$query = "SELECT fn_crear_user(" .$respuesta->idusuario. ",'" .$nombresusuario. "','" .md5($pass). "');";
				}else{
					$result = $datosBD->query("ROLLBACK;");
					die($datosBD->error_nro(). " : " .$datosBD->error());
				}
			break;
			
			case "guardarVideo":
				$iduser = "'".$_POST["iduser"]."'";
				$link   = "'".$_POST["link"]."'";
				
				$query = "INSERT INTO videos(iduser, link)VALUES(" .$iduser. "," .$link. ")";
				//die($query);
			break;
			
			default:
				echo "Comando no Válido.";
			break;
		}
		
		$result = $datosBD->query($query);
		
		if($datosBD->error() == ""){
			$respuesta = $datosBD->object_result($result);
			$result = $datosBD->query("COMMIT;");
			
			die(true);
		}else{
			$result = $datosBD->query("ROLLBACK;");
			die($datosBD->error_nro(). " : " .$datosBD->error());
		}
	}else{
		echo $datosBD;
	}
?>