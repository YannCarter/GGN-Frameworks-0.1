/* GougnonJS.KeyShot, version : 0.1, update : 160329#1918, Copyright GOBOU Y. Yannick 2014 */
(function(A,P,I,gAPI){var api; if(!Gougnon.support('nightly 0.1')){alert('La version de GougnonJS n\'est pas compatible avec KeyShot 0.1 ');return false;} api=gAPI({name:'KeyShot',static:{version:'0.1',update:'160329.1918',varsini:'button',varsevent:'show close click',_keys:'BACKSPACE TAB ENTER SHIFT CTRL ALT PAUSE.BREAK CAPS.LOCK ESCAPE PAGE.UP PAGE.DOWN END HOME LEFT.ARROW UP.ARROW RIGHT.ARROW DOWN.ARROW INSERT DELETE 0 1 2 3 4 5 6 7 8 9 A B C D E F G H I J K L M N O P Q R S T U V W X Y Z LEFT.WINDOW.KEY RIGHT.WINDOW.KEY CONTEXT.MENU.KEY NUMPAD.0 NUMPAD.1 NUMPAD.2 NUMPAD.3 NUMPAD.4 NUMPAD.5 NUMPAD.6 NUMPAD.7 NUMPAD.8 NUMPAD.9 MULTIPLY ADD SUBTRACT DECIMAL.POINT DIVIDE F1 F2 F3 F4 F5 F6 F7 F8 F9 F10 F11 F12 NUM.LOCK SCROLL.LOCK SEMI.COLON EQUAL.SIGN COMMA DASH PERIOD FORWARD.SLASH GRAVE.ACCENT OPEN.BRACKET BACK.SLASH CLOSE.BRAKET SINGLE.QUOTE',_codes:'8 9 13 16 17 18 19 20 27 33 34 35 36 37 38 39 40 45 46 48 49 50 51 52 53 54 55 56 57 65 66 67 68 69 70 71 72 73 74 75 76 77 78 79 80 81 82 83 84 85 86 87 88 89 90 91 92 93 96 97 98 99 100 101 102 103 104 105 106 107 109 110 111 112 113 114 115 116 117 118 119 120 121 122 123 144 145 186 187 188 189 190 191 192 219 220 221 222'} ,constructor:function(){var o=this; o.Stc=this.STATIC; o.args=o.ARGS||[]; o.instance=o.args[0]||false; o._keys=o.Stc._keys.split(' '); o._codes=o.Stc._codes.split(' '); o.counter=0; o.event=GEvent(o); } }).create(); api.dynamic('getCodeByKey',function(ka){var o=this ,a=arguments ,ret=false; if(typeof a[0]!='string'){return false;} for(var k in o._keys){var c=o._keys[k];if(c==ka.upper()){ret=o._codes[k]*1;break;}else{}}; return ret; }); api.dynamic('getKeyByCode',function(ka){var o=this ,a=arguments ,ret=false; ka*=1; for(var k in o._codes){var c=o._codes[k];if(c==ka){ret=o._keys[k];break;}else{}}; return ret; }); 

	api.dynamic('key',function(){var o=this,a=arguments; if(typeof a[0]!='string'){return o;} o.keyChar=a[0]; o.keyCode=o.getCodeByKey(o.keyChar); return o; }); 

	api.dynamic('code',function(evt){var o=this,a=arguments;return ((evt.which)?evt.which:evt.keyCode);}); 

	api.dynamic('detect',function(){
		var o=this,a=arguments; 
		if(typeof o['instance']!='function'){return false;} 
		if(typeof a[0]!='object'){return false;} 

		var evt=a[0]||A.event
			,kyc=(evt.which)?evt.which:evt.keyCode
			,lp=a[1]||false
			,kc=o.keyCode||false
			,kch=o.keyChar
			,fa=o.instance
			,uc=evt['charCode']||evt['keyCode']
			,kych=String.fromCharCode(uc)
		; 

		o._unicode=uc;
		o._keyCode=kyc;
		o._keyChar=kych; 
		if(lp==false&&o.counter>=1){return false;} 
		o.callF=fa; 
		if(typeof lp=='number'&&lp<=o.counter){return false;} 
		if(kc==kyc||kych==kch){
			if(typeof fa=='function'){
				o.callF(evt);
				o.event.detect('execute',o,evt);
				o.counter++;
				return true;
			}
		} 

		return o; 
			
	}); 

	api.dynamic('shortcuts',function(){var o=this,cmds=arguments; if(typeof o['instance']!='object'){return false;}
		if(typeof cmds.length<2){return false;} 

		var cmd=cmds[0]||false
		,phz=[]
		,fa=o.args[1]||G.F()
		,ret=(typeof o.args[2]=='boolean')?((o.args[2]===false)?false:true):true; 

		o.__destroyShortcuts=false;
		o.commands=cmds;
		o.detected={};
		o.returnValue = ret;
		o.returnEvent = false;

		o.resetShortCuts = function(){var o=this,ret=o.returnValue; G.foreach(o.detected,function(d,k){d.counter=0;}); };

		o.stopEvent = function(e){var o=this; if(ret===false&&isObject(e)){GEvent(e).prevent(false);}};

		G.foreach(cmds,function(v,x){var ks=(typeof cmds[x]=='string')?cmds[x]:'',ksu=ks.upper(); phz[x]=(ksu=='CTRL'||ksu=='SHIFT'||ksu=='ALT') ?function(p){var suit=o.Stc(function(evt){var pn=p+1;if(typeof phz[pn]=='function'){phz[pn](pn);}}).key(cmds[p]); 

			GEvent(o.instance).listen('keydown',function(e){if(!o.__destroyShortcuts){suit.detect(e,false);}}, false); o.detected[x]=suit; } :function(p){var suit=o.Stc(function(evt){var pn=p+1,lim=cmds.length-1; if(typeof phz[pn]=='function'&&lim>p){phz[pn](pn);} else{if(typeof fa=='function'){o.stopEvent(evt);fa();o.event.detect('execute',o,evt);o.resetShortCuts();}} }).key(cmds[p]); 

			GEvent(o.instance).listen('keydown',function(e){if(!o.__destroyShortcuts){suit.detect(e, false);}}, false); o.detected[x]=suit; }; }); if(typeof phz[0]=='function'){phz[0](0);} return o; })

	api.dynamic('destroyShortcuts', function(){

		var o=this;

		o.__destroyShortcuts = true;

		return o;

	})
;

})(window,screen,navigator,GAPI);