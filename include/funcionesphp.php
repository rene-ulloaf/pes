<?php
	class funcionesPHP{
		
		function funcionesPHP(){
		
		}
		
		function valida_email($email){
		    if((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
				if((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))){
					//miro si tiene caracter .
					if(substr_count($email,".") >= 1){
						//obtengo la terminacion del dominio
						$term_dom = substr(strrchr($email,'.'),1);
						//compruebo que la terminación del dominio sea correcta
						if(strlen($term_dom) > 1 && strlen($term_dom) < 5 && (!strstr($term_dom,"@"))){
							//compruebo que lo de antes del dominio sea correcto
							$antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
							$caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
							
							if($caracter_ult != "@" && $caracter_ult != "."){
								return true;
							}else{
								return false;
							}
						}
					}
				}
		    }
		}
		
		function valida_url_youtube($url){
			if($url){
				if(substr($url,0,7) != "http://"){
					$url = "http://".$url;
					
					return false;
				}
				
				if(substr($url,7,15) != "www.youtube.com"){
					die("La URL debe empezar con 'www.youtube.com'.");
					
					return false;
				}
				
				if(substr($url,22,9) != '/watch?v='){
					die("La URL no es valida.");
					
					return false;
				}
				
				if(strlen(substr($url,31)) != 11){
					die("El ID del Video no es valido.");
					
					return false;
				}
				
				if(substr($url,0,31) != "http://www.youtube.com/watch?v="){
					die("La URL no es valida.");
					
					return false;
				}
				
				return true;
			}
		}
		
		function pais_ip(){
			$procedencia_xml = ""; 
			//$procedencia_xml = file_get_contents("http://api.hostip.info/get_xml.php?ip=" .$_SERVER["REMOTE_ADDR"]);
			$procedencia_xml = file_get_contents("http://api.hostip.info/get_xml.php?ip=200.28.4.130");
			
			if(empty($procedencia_xml)){
				return "No encontrado";
			}else{
				preg_match_all("|<Hostip>(.*)</Hostip>|sU",$procedencia_xml,$items);
				$lista_nodos = array();
				
				foreach($items[1] as $key => $item){
					preg_match("|<gml:name>(.*)</gml:name>|s",$item,$mi_lugar);
					preg_match("|<countryName>(.*)</countryName>|s",$item,$mi_pais);
					preg_match("|<countryAbbrev>(.*)</countryAbbrev>|s",$item,$mi_sigla);
					
					//$lista_nodos[$key]['mi_pais'] = $mi_pais[1];
					//$lista_nodos[$key]['mi_lugar'] = $mi_lugar[1];
					$lista_nodos[$key]['mi_sigla'] = $mi_sigla[1];
				}
				
				for($i=0;$i<1;$i++){
					return strtolower($lista_nodos[$i]['mi_sigla']);
				}
			}
		}
		
		function combobox($name,$tipo,$select=""){
			global $datosBD;
			$option = "";
			
			$sql = "SELECT valor,texto FROM valorflexible WHERE tipo = '" .$tipo."' ORDER BY orden;";
			//die($sql);
			$result = $datosBD->query($sql);
			
			$option .= "<select name='" .$name. "' id='" .$name. "'>";
			while($row = $datosBD->object_result($result)){
				$selected = $select == $row->texto ? "selected='selected'" : "";
				$option .= "<option value='" .$row->valor. "' " .$selected. ">" .$row->texto. "</option>";
			}
			$option .= "</select>";
			
			return $option;
		}
	}
?>