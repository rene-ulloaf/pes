var control = Class.create();
control.prototype = {
	initialize : function(){
		/*this._HTML = arguments[0];
		
		this.formulario = new formulario(this._HTML);*/
		this.formulario = formulario;
		this.pasarInformacion.initialize(this);
	},
}

control.prototype.pasarInformacion = {
	initialize : function(){
		this.parent = arguments[0];
		this.resp = new String();
	},
	
	envio : function(){
		claseAjax.enviar("commandfile=" +arguments[0]);
	},
	
	respuesta : function(){
		return claseAjax.BD.getResult();
	},
	
	datos : function(){
		alert(arguments[0]+ " - "+arguments[1]);
		return claseAjax.BD.getField(arguments[0],arguments[1]);
	}
}
/*
	function main(){
	document.getElementById("ingreso").onclick = function(){
		var a = new Ajax();
		
		a.enviar("command.php", "cmd=prueba");
		a.xmlHttp.onreadystatechange = ac;
		
		function ac(){
		//alert(a.xmlHttp.readyState);
			var mensaje = document.getElementById("mensaje");
			
			if(a.xmlHttp.readyState == 0){
				mensaje.innerHTML = "Cargando... 0%";
			}
			if(a.xmlHttp.readyState == 1){
				mensaje.innerHTML = "Cargando... 25%";
			}
			if(a.xmlHttp.readyState == 2){
				mensaje.innerHTML = "Cargando... 50%";
			}
			if(a.xmlHttp.readyState == 3){
				mensaje.innerHTML = "Cargando... 75%";
			}
			if(a.xmlHttp.readyState == 4){
				mensaje.innerHTML = a.xmlHttp.responseText;
			}
			/*if(a.xmlHttp.readyState == 4){
				mensaje.innerHTML = a.xmlHttp.responseText;
			}else{
				mensaje.innerHTML = "Cargando...";
			}
		}
	}
}
}*/