<?php
	while(!file_exists($POSICION."conexion.php"))$POSICION.="../";
	require_once($POSICION."conexion.php");
	
	$commandfile = $POSICION.$_POST["commandfile"];
	$cmd 		 = $_POST["cmd"];
	$query		 = "";
	$_error		 = "";
	
	if($_SERVER['HTTP_USER_AGENT'] == "Che-Chex"){
		function crear_XML(){
			global $datosBD,$query;
			$records = "";
			$field_name = "";
			
			if($datosBD->conectarse_mysql()){
				$datosBD->query("BEGIN;");
				
				$result = $datosBD->query($query);
				$_error = $datosBD->error();
				
				if($_error == ""){
					$datosBD->query("COMMIT;");
					
					$numfields = $datosBD->num_fields($result);
					$numrows   = $datosBD->num_rows($result);
					
					while($campo = $datosBD->array_result($result)){
						$records .= "<record>";
						for($i=0;$i<$numfields;$i++){
							$field_name = $datosBD->fetch_field($result,$i);
							$field_value = $campo[$i];
							
							$records .= "<" .$field_name->name. ">" .$field_value. "</" .$field_name->name. ">";
						}
						$records .= "</record>";
						
						$i++;
					}
					
					return '<table numfields="' .$numfields. '" numrows="' .$numrows. '" error="">' .$records. '</table>';
				}else{
					$result = $datosBD->query("ROLLBACK;");
					die($datosBD->error_nro(). " : " .$_error);
				}
			}else{
				echo $datosBD;
			}
			
			$datosBD->close();
		}
		
		if(is_file($commandfile)){
			include($commandfile);// Carga el archivos de comandos
		}else{
			$_error = "ERROR: Archivo de comandos no v�lido [" .$commandfile. "]";
		}
		
		if($_error == ""){
			if($query != ""){
				$xmlDoc = crear_XML();
			}
		}
		
		if($xmlDoc != ""){
			header("Content-Type: text/xml");
			echo '<?xml version="1.0" encoding="iso-8859-1"?>';
			//echo '<ROOT>';
			echo trim($xmlDoc);
			//echo '</ROOT>';
		}
		
		//die($_error);
	}else{
?>

var Ajax = Class.create();

Ajax.prototype = {
	initialize : function(){
		this.xmlHttp = false;
		
		//this.BD.initialize(this);
		//this.crearXMLHttpRequest();
	},
	
	enviar : function(){
		this.url = "<?=$_SERVER['PHP_SELF'];?>";
		this.cmd = arguments[0];
		
		this.crearXMLHttpRequest();
		
		if(!this.xmlHttp){
			alert("Error de coneccion.\nIntentenlo mas tarde");
		}else{
			this.xmlHttp.open("POST",this.url,false);
			this.xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded;charset=ISO-8859-1;");
			this.xmlHttp.setRequestHeader("User-Agent","Che-Chex");
			this.xmlHttp.send(this.cmd);
			
			this.respuesta();
		}
	},
	
	respuesta : function(){
		if(this.xmlHttp.readyState == 4){
			try{
				switch(this.xmlHttp.status){
					case 200:
						this.BD.initialize(this.xmlHttp);
					break;
					case 404:
						alert("NO se pude encontrar la url.");
					break;
					case 414:
						alert("Los valores enviados por GET superan los 512 bytes");
					break;
					case 500:
						alert("Error en el Servidor");
					break;
					default:
						alert("Error desconocido");
				}
			}catch(e){
				alert(e);
			}
		}else{
			//
		}
	},
	
	crearXMLHttpRequest : function(){
		if(window.ActiveXObject){
			try{
				this.xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(e){
				try{
					this.xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}catch(e){
					this.xmlHttp = false;
				}
			}
		}else if(window.XMLHttpRequest){
			try{
				this.xmlHttp = new XMLHttpRequest();
			}catch(e){
				this.xmlHttp = false;
			}
		}
	}
}

Ajax.prototype.BD = {
	
	initialize : function(){
		this.xml 	= arguments[0];
		this.result = new Object();
	},
	
	getResult : function(){
		this.result.data = null;
		this.result.numfields = 0;
		this.result.numrows = 0;
		this.result.error = "";
		
		try{
			this.result.data 	 = this.xml.responseXML.getElementsByTagName("table")[0];
			
			this.result.numfields = unescape(this.result.data.getAttribute("numfields"));
			this.result.numrows   = unescape(this.result.data.getAttribute("numrows"));
			this.result.error 	  = unescape(this.result.data.getAttribute("error"));
		}catch(ex){
			this.result.error = this.xml.responseText;
		}
		
		return this.result;
	},
	
	getField : function(){
		var campo  = arguments[0];
		var indice = arguments[1];
		var valor = null;
		
		try{
			if(isNaN(campo)){
				valor = unescape(this.result.data.getElementsByTagName("record")[indice].getElementsByTagName(campo)[0].firstChild.nodeValue);
			}else{
				valor = unescape(RS.data.getElementsByTagName("record")[0].childNodes[campo].firstChild.nodeValue);
			}
			
			valor = valor.replace('#NULL#','') ;
		}catch(exception){
			alert("Error: No se puede leer el valor de " +campo);
			valor = null;
		}
		return valor;
	}
}

<?php
	}
?>