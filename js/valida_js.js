var validaJS = Class.create();
validaJS.prototype = {
	initialize : function(){
		
	},
	
	email : function(valor){
		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(valor)){
			return true;
		}else{
			return false;
		}
	}
}
