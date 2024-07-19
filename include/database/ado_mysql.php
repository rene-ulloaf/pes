<?php
	class DBManager{
		var $coneccion;
		
		var $host;
		var $user;
		var $pass;
		var $db;
		
		function DBManager(){
		}

		function conectarse_mysql(){
			//if(!($link = @mysql_connect("$host","$user","$pass"))){
			if(!($link = @mysql_connect($this->host,$this->user,$this->pass))){
				return "Error: No se pudo conectar a la base de datos";
				exit();
			}
			if(!(mysql_select_db($this->db,$link))){
				return "Error en tiempo de ejecución.";
				exit();
			}
			
			$this->coneccion = $link;
			return true;
		}
	}
	
	class datosManager extends DBManager{
		function datosManager(){
			/*if($this->error() != ""){
				die("ERROR N° " .$this->error_nro(). " : " .$this->error());
			}*/
		}
		
		function query($query){
			$this->result = mysql_query($query);
			return $this->result;
		}
		
		function error(){
			$this->result = mysql_error();
			return $this->result;
		}
		
		function error_nro(){
			$this->result = mysql_errno();
			return $this->result;
		}
		
		function array_result($query){
			$this->result = mysql_fetch_array($query);
			return $this->result;
		}
		
		function object_result($query){
			$this->result = mysql_fetch_object($query);
			return $this->result;
		}
		
		function num_rows($result){
			$this->result = mysql_num_rows($result);
			return $this->result;
		}
		
		function num_fields($result){
			$this->result = mysql_num_fields($result);
			return $this->result;
		}
		
		function fetch_field($result,$indice){
			$this->result = mysql_fetch_field($result,$indice);
			return $this->result;
		}
		
		function close(){
			mysql_close($this->coneccion);
		}
	}
?>
