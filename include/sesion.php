<?php
	class sesion{
		var $idusuario;
		var $nombre_sesion = "";
		
		function sesion(){
			session_start();
		}
		
		function nombre_sesion(){
			session_name($this->nombre_sesion);
		}
		
		function crear(){
			global $datosBD;
			
			$query = "SELECT * FROM vw_datos_usuario WHERE idusuario = '" .$this->idusuario. "'";
			$result = $datosBD->query($query);
			
			if($datosBD->error() == ""){
				$row = $datosBD->object_result($result);
				
				$_SESSION["ss_usuario"] = $this->idusuario;
				$_SESSION["ss_pais"] = $row->pais;
			}else{
				session_unset();
				session_destroy();
			}
			
			return $datosBD->error();
		}
	}
	