var Videos = Class.create();

Videos.prototype = {
	divVideos : typeof Object,
	
	initialize : function(){
		this.divVideos = $("videos");
		this.obtenerVideos();
		/*this.crearContenedor();*/
	},
	
	obtenerVideos : function(){
		control.pasarInformacion.envio("form/command.php&cmd=obtener_videos");
		resp = control.pasarInformacion.respuesta();
		
		for(i=0;resp.numrows;i++){
			control.pasarInformacion.datos("ranking",i);
		}
	},
	
	crearContenedor : function(){
		try{
			var divContenedor = document.createElement("div");
			var divVideoYoutube = document.createElement("div");
			var divRanking = document.createElement("div");
			var divPie = document.createElement("div");
			
			var spanRanking = document.createElement("span");
			var spanTitulo = document.createElement("span");
			var spanUsuario = document.createElement("span");
			var spanVotos = document.createElement("span");
			var spanVotar = document.createElement("span");
			
			spanRanking.setAttribute("id","spRanking");
			spanRanking.setAttribute("style","float:left;text-align:left;width:25px;");
			
			spanTitulo.setAttribute("id","spTitulo");
			spanTitulo.setAttribute("style","float:center;text-align:center;width:400px;");
			
			spanUsuario.setAttribute("id","spUsuario");
			spanUsuario.setAttribute("style","float:left;text-align:left;width:150px;");
			
			spanVotos.setAttribute("id","spVotos");
			spanVotos.setAttribute("style","float:left;text-align:left;width:100px;");
			
			spanVotar.setAttribute("id","spVotar");
			spanVotar.setAttribute("style","float:left;text-align:right;");
			
			divVideoYoutube.innerHTML = "<object width='425' height='344'><param name='movie' value='http://www.youtube.com/v/Q5RrORtDZuQ&hl=es&fs=1'></param><param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param><embed src='http://www.youtube.com/v/Q5RrORtDZuQ&hl=es&fs=1' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' width='425' height='344'></embed></object>";
			divVideoYoutube.setAttribute("id","video1");
			
			divContenedor.setAttribute("style","width:430px;");
			
			spanRanking.innerHTML = "1";
			spanTitulo.innerHTML = "primero";
			spanUsuario.innerHTML = "chechex";
			spanVotos.innerHTML = "100";
			spanVotar.innerHTML = "vota";
			
			divContenedor.appendChild(spanRanking);
			divContenedor.appendChild(spanTitulo);
			divContenedor.appendChild(divVideoYoutube);
			divContenedor.appendChild(spanUsuario);
			divContenedor.appendChild(spanVotos);
			divContenedor.appendChild(spanVotar);
			
			this.divVideos.appendChild(divContenedor);
		}catch(e){
			alert(e);	
		}
	}
}