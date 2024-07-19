var Login = Class.create();
Login.prototype = {
	_form	  : typeof String,
	idusuario : typeof string,
	
	initialize : function(){
		this._form = $(arguments[0]);
		this.formulario = new control.formulario(this._form);
		this.idusuario = "";
		this.nombreUsuario = arguments[1];
		
		this.datos_usuario();
		this.configure();
	},
	
	datos_usuario : function(){
		if(this.idusuario != ""){
			$("PRINCIPAL_usuario_idusario").innerHTML = "Bienvenido " +this.nombreUsuario;
		}
	},
	
	configure : function(){
		this.formulario.field._minLength = 3;
		this.formulario.field.fields("usuario");
		
		this.formulario.field._minLength = 6;
		this.formulario.field.fields("password");
		
		$("ingresar").onclick = function(){
			login.guardar();
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
		var respuesta;
		this.idusuario = this.formulario.setValue("usuario");
		
		if(this.validar()){
			control.pasarInformacion.envio("form/command.php&cmd=verificar_usuario&usuario=" +this.idusuario+ "&pass=" +this.formulario.setValue("password"));
			respuesta = control.pasarInformacion.respuesta();
			
			if(respuesta.error == ""){
				if(control.pasarInformacion.datos("respuesta",0) == true){
					control.pasarInformacion.envio("form/command.php&cmd=sesion&idusuario=" +this.idusuario);
					respuesta = control.pasarInformacion.respuesta();
					
					if(respuesta.error == "OK"){
						this.nombreUsuario = this.idusuario.toLowerCase();
						
						this.datos_usuario();
					}else{
						alert("Ocurri\u00f3 un error en tiempo de ejecuci\u00f3n, int\u00e9ntelo nuevamente.");
					}
				}else{
					alert("Nombre de usuario y/o Contrase\u00f1a Incorrectos.");
				}
			}else{
				alert(respuesta.error);
			}
		}
	}
}
