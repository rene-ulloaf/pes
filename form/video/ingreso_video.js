var ingresoVideo = Class.create();

ingresoVideo.prototype = {
	initialize : function(){
		this._form = $(arguments[0]);
		this.formulario = new control.formulario(this._form);
		
		this.configure();
	},
	
	configure : function(){
		this.formulario.field._minLength = 1;
		this.formulario.field.fields("version_juego");
		
		this.formulario.field._minLength = 1;
		this.formulario.field.fields("tipo_partido");
		
		this.formulario.field._minLength = -1;
		this.formulario.field.fields("dificultad");
		
		this.formulario.field._minLength = 1;
		this.formulario.field.fields("seccion");
		
		this.formulario.field._minLength = 1;
		this.formulario.field.fields("link");
		
		$("ingreso").onclick = function(){
			video.guardar();
		}
	},
	
	validar : function(){
		if(this.formulario.validar()){
			return true;
		}else{
			return false;
		}
	},
	
	guardar : function(){
		if(this.validar()){
			control.pasarInformacion.envio(
				"form/command.php&cmd=guardarVideo&version_juego=" +this.formulario.setValue("version_juego")+
				"&tipo_partido=" +this.formulario.setValue("tipo_partido")+
				"&dificultad=" +this.formulario.setValue("dificultad")+
				"&equipo=" +this.formulario.setValue("equipo")+
				"&equipo_contrario=" +this.formulario.setValue("equipo_contrario")+
				"&jugador=" +this.formulario.setValue("jugador")+
				"&seccion=" +this.formulario.setValue("seccion")+
				"&link=" +this.formulario.setValue("link")
			);
			respuesta = control.pasarInformacion.respuesta();
			
			if(respuesta.error == ""){
				alert("el Video ha sido súbido correctamente.");
			}else{
				alert(respuesta.error);
				//alert("Ocurri\u00f3 un error en tiempo de ejecuci\u00f3n, int\u00e9ntelo nuevamente.");
			}
		}
	}
}