var Registro = Class.create();
Registro.prototype = {
	_form: typeof String,
	
	initialize: function(){
		this._form = $(arguments[0]);
		this.formulario = new control.formulario(this._form);
		
		this.configure();
	},
	
	configure: function(){
		this.formulario.field._minLength = 3;
		this.formulario.field.fields("nombres");
		
		this.formulario.field._minLength = 3;
		this.formulario.field.fields("apellidouno");
		
		this.formulario.field._minLength = -1;
		this.formulario.field.fields("pais");
		
		this.formulario.field._minLength = 3;
		this.formulario.field.fields("nombresusuario");
		
		this.formulario.field._minLength = 3;
		this.formulario.field.fields("nombres");
		
		this.formulario.field._minLength = 6;
		this.formulario.field.fields("passuno");
		
		this.formulario.field._minLength = 6;
		this.formulario.field.fields("passdos");
		
		this.formulario.field._minLength = 6;
		this.formulario.field.fields("email");
		
		$("registrar").onclick = function(){
			registro.guardar();
		}
		
		$("cancelar").onclick = function(){
			
		}
	},
	
	validar : function(){
		if(this.formulario.validar()){
			if(this.formulario.setValue("passuno") != this.formulario.setValue("passdos")){
				alert("Las contrase\u00f1as deben ser iguales");
				return false;
			}else if(!valida.email(this.formulario.setValue("email"))){
				alert("El e-mail no es v�lido");
				return false;
			}
			
			return true;
		}else{
			return false;
		}
	},
	
	guardar : function(){
		if(this.validar()){
			control.pasarInformacion.envio(
				"form/command.php&cmd=ingreso_usuario&idusuario=" +this.formulario.setValue("nombresusuario")+
				"&pass=" +this.formulario.setValue("passuno")+
				"&pass2=" +this.formulario.setValue("passdos")+
				"&nombres=" +this.formulario.setValue("nombres")+
				"&apellidouno=" +this.formulario.setValue("apellidouno")+
				"&apellidodos=" + this.formulario.setValue("apellidodos")+
				"&pais=" +this.formulario.setValue("pais")+
				"&email=" +this.formulario.setValue("email")
			);
			respuesta = control.pasarInformacion.respuesta();
			
			if(respuesta.error == ""){
				if(control.pasarInformacion.datos("guardado", 0) == true){
					alert("Registro Exitoso");
					location.href = POSICION+"index.php";
				}else{
					alert("error");
				}
			}else{
				alert(respuesta.error);
			}
				
		}
	}
}
