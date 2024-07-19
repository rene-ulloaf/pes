var ingresoVideo = Class.create();

ingresoVideo.prototype = {
	initialize : function(){
		this.configure();
	},
	
	configure : function(){
		$("ingreso").onclick = function(){
			ingresoVideo.guardar();
		}
	},
	
	guardar : function(){
		control.pasarInformacion.envio("form/command.php","guardarVideo&iduser=1&link="+$("link").value);
		alert(control.pasarInformacion.respuesta());
	}
}