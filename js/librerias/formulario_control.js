var formulario = Class.create();
formulario.prototype = {
	_layer : typeof String,
	_input : typeof Array,
	
	initialize : function(){
		this._layer  = arguments[0];
		this._input  = new Array();
	//	this._select = new Array();
		
		this.field.initialize(this);
		this.form();
	},
	
	form : function(){
		var INPUT = this._layer.getElementsByTagName("input");
		for(var i=0;i<INPUT.length;i++){
			this._input[INPUT[i].name] = INPUT[i];
			
			this.field.fields(INPUT[i].name);
		}
		
		var SELECT = this._layer.getElementsByTagName("select");
		for(var i=0;i<SELECT.length;i++){
			this._input[SELECT[i].name] = SELECT[i];
			
			this.field.fields(SELECT[i].name);
		}
		
		var TEXTAREA = this._layer.getElementsByTagName("textarea");
		for(var i=0;i<TEXTAREA.length;i++){
			this._input[TEXTAREA[i].name] = TEXTAREA[i];
			
			this.field.fields(TEXTAREA[i].name);
		}
		
		/*var LABEL = this._layer.getElementsByTagName("label");
		for(var i=0;i<LABEL.length;i++){
			alert(LABEL[i].getAttribute("for"));
			//alert($(l).labelRef);//) = labels[i];
			$(l).labelRef.value = labels[i].innerHTML;
		}*/
	},
	
	/*getValue : function(){
		var property = arguments[0];
		
		return(this._input[property].value); 
	},*/
	
	setValue : function(){
		var property = arguments[0];
		
		switch(this._input[property].type){
			case "text":
				return(this._input[property].value);
			break;
			
			case "password":
				return(this._input[property].value);
			break;
			
			case "select-one":
				return(this._input[property].value);
			break;
			
			case "textarea":
				return(this._input[property].value);
			break;
		}
	},
	
	form_properties : function(){
		var property = arguments[0];
		
		switch(this._input[property].type){
			case "text":
				if(this.field._fields[property][1] > 0){
					this._input[property].className = "txt_obligatorio";
					this._input[property].readOnly = false;
				}else{
					if (this.field._fields[property][0]) {
						this._input[property].className = "txt_editables";
						this._input[property].readOnly = false;
					}else {
						this._input[property].className = "txt_no_editables";
						this._input[property].readOnly = true;
					}
				}
			break;
			
			case "password":
				if(!this.field._fields[property][1]){
					this._input[property].className = "txt_no_editables";
					this._input[property].readOnly = true;
				}else{
					if(this.field._fields[property][0]){
						this._input[property].className = "txt_obligatorio";
						this._input[property].readOnly = false;
					}else{
						this._input[property].className = "txt_editables";
						this._input[property].readOnly = false;
					}
				}
			break;
			
			case "select-one":
				if(!this.field._fields[property][1]){
					this._input[property].className = "txt_no_editables";
					this._input[property].readOnly = true;
				}else{
					if(this.field._fields[property][0]){
						this._input[property].className = "txt_obligatorio";
						this._input[property].readOnly = false;
					}else{
						this._input[property].className = "txt_editables";
						this._input[property].readOnly = false;
					}
				}
			break;
			
			case "textarea":
				if(!this.field._fields[property][1]){
					this._input[property].className = "txt_no_editables";
					this._input[property].readOnly = true;
				}else{
					if(this.field._fields[property][0]){
						this._input[property].className = "txt_obligatorio";
						this._input[property].readOnly = false;
					}else{
						this._input[property].className = "txt_editables";
						this._input[property].readOnly = false;
					}
				}
			break;
		}
	},
	
	validar: function(){
		var property = "";
		
		var INPUT = this._layer.getElementsByTagName("input");
		var SELECT = this._layer.getElementsByTagName("select");
		var TEXTAREA = this._layer.getElementsByTagName("textarea");
		
		for(var i=0;i<INPUT.length;i++){
			property = INPUT[i].name;
			
			if(this.field._fields[property][1]){
				if(this.setValue(property).length < this.field._fields[property][1]){
					alert(property + " debe tener a lo menos " + this.field._fields[property][1] + " caracteres");
					INPUT[i].focus();
					INPUT[i].className = "txt_obligatorio_error";
					
					return false;
				}else{
					INPUT[i].className = "txt_obligatorio";
				}
			}
		}
		
		for(var i=0;i<SELECT.length;i++){
			property = SELECT[i].name;
			
			if(this.field._fields[property][1]){
				if(this.setValue(property) < this.field._fields[property][1]){
					alert("El campo " +property+ " es obligatorio");
					SELECT[i].focus();
					SELECT[i].className = "txt_obligatorio_error";
					
					return false;
				}else{
					SELECT[i].className = "txt_obligatorio";
				}
			}
		}
		
		for(var i=0;i<TEXTAREA.length;i++){
			property = TEXTAREA[i].name;
			
			if(this.field._fields[property][1]){
				if(this.setValue(property) < this.field._fields[property][1]){
					alert("El campo " +property+ " es obligatorio");
					TEXTAREA[i].focus();
					TEXTAREA[i].className = "txt_obligatorio_error";
					
					return false;
				}else{
					TEXTAREA[i].className = "txt_obligatorio";
				}
			}
		}
		
		return true;
	}
}

formulario.prototype.field = {
	_parent	 : typeof Object,
	_fields  : typeof Array,
	_button  : typeof Array,
	
	_editable 		: typeof Boolean,
	_minLength 		: typeof Numeric,
	//_maxLength 	: typeof Numeric,
	//_defaultValue : typeof Object,
	//_validation   : typeof Function,
	
	initialize: function(){
		this._parent = arguments[0];
		this._fields = new Array();
		this._button = new Array();
		
		this._editable    = true;
		this._minLength   = 0;
		
		//this.configure();
	},
	
	configure : function(){
		this.propiedadesFormulario.initialize(this);
	},
	
	fields : function(){
		var property = arguments[0];
		
		this._fields[property] = new Array();
		
		this._fields[property][0] = this._editable; //editable
		this._fields[property][1] = this._minLength; //minlength
		
		this._parent.form_properties(property);
	}
}