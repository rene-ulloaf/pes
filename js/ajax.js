var Ajax = Class.create();

Ajax.prototype = {
	initialize : function(){
		this.xmlHttp = false;
		
		this.BD.initialize(this);
		this.crearXMLHttpRequest();
	},
	
	enviar : function(){
		this.url = arguments[0];
		this.cmd = arguments[1];
		
		if(!this.xmlHttp){
			alert("Error de conección. \n Intentenlo más tarde");
		}else{
			//this.xmlHttp.onreadystatechange = this.procesarEventos(this.xmlHttp);
			this.xmlHttp.open("POST",this.url,false);
			this.xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
			this.xmlHttp.setRequestHeader("User-Agent","Che-Chex");
			this.xmlHttp.send(this.cmd);
		}
	},
	
	respuesta : function(){
		try{
			switch(this.xmlHttp.status){
				case 200:
					if(this.xmlHttp.responseText != "OK"){
						return this.xmlHttp.responseText;
					}else{
						return true;
					}
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
		this.parent = arguments[0];
	},
	
	query : function(){
		
	},
	
	error : function(){
		
	}
}