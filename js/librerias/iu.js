var iu = Class.create();
iu.prototype = {
	initialize : function(){
		this.menu.initialize(this);
	}
}

iu.prototype.menu = {
	initialize : function(){
		this.parent = arguments[0];
		this.down = false;
	},
	
	toggleDown : function(){
		if(!this.down){
			this.down = true;
			t1 = new Tween(document.getElementById('menu_holder').style, 'top', Tween.strongEaseOut, -58, 0, .6, 'px');
			t1.start();
		}
	},
	
	toggleUp : function(){
		if(this.down){
			this.down = false;
			t1 = new Tween(document.getElementById('menu_holder').style, 'top', Tween.strongEaseIn, 0, -58, .4, 'px');
			t1.start();
		}
	}
}