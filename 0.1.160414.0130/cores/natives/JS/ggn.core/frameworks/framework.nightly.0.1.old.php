/* GougnonJS Build #1505,version : 0.1 Nightly,update : 160205.1003,Copyright GOBOU Y. Yannick 2013 2014 */
(function(W,D,S,N,_AUN){

	"use strict";

	var _native,_c,_,Nat;
		W.Gougnon=undefined;W.GAUN=undefined;

	_native={
		version:'nightly 0.1,update 160205.1003'
		,compilatorMode:'-x.debug'
		,support:function(ver){var g0=this.version,_g=g0.stripSpace().stripSpecialChar().stripAlphaChar(),v0=[ver].join(''),v=v0.stripSpace().stripSpecialChar().stripAlphaChar(),i=G(_g).compare(v),ga=false,fg=(i===true||i===null);if(fg===true){if((/nightly/gi).test(v0)&&(/nightly/).test(g0)){ga=true;}if((/nightly/gi).test(v0)&&(/stable/).test(g0)){ga=true;}if((/stable/gi).test(v0)&&(/stable/).test(g0)){ga=true;}if((/stable/gi).test(v0)&&(/nightly/).test(g0)){ga=false;}else{ga=fg;}}return ga;}
		,domaineName:"<?php echo HTTP_HOST; ?>"
		,__:{}
		,DOC:D
		,DocElement:document.documentElement
		,getDocElement:function(){return (GBrowser().get('applewebkit')===true)?G.DOC.body:G.DocElement;}
		,Document:D
		,Window:W
		,Scrn:S
		,Nav:N
		,F:function(){return new Function();}
		,N:function(){return new Number();}
		,console:function(){if(typeof console!='undefined'){console.log(arguments[0]||'');}}
		,eval:function(f){return this.Try(function(_f){return eval(_f);},f||false,arguments[1]);}
		,Try:function(f){var der=function(er){Nat.console(['Erreur Observée : ',er.message].join(''));},err=arguments[2]||der,ar=arguments[1]||[],r='',md=(G||Nat).compilatorMode;f=typeof f=='function'?f:der;err=typeof err=='function'?err:der;if(md=='-x.release'){try{r=f(ar);}catch(e){err(e);}}if(md=='-x.debug'){r=f(ar);}return r;}
		,foreach:function(a,f){var o=this,_a=arguments||false ,a=_a[0]||{},f=_a[1]||o.F(),s=_a[2]||0 ,e=_a[3]||a.length||0 ,l=0;e=_a[3]||false;for(var n in a){var ss=l>=s,se=e===false?true:l<=e;if(ss&&se){f(a[n],n,a);}l++;};return a;}

	,merge:function(b,a){Nat.foreach(a,function(v,n){b[n]=v;});return b;}
	,merges:function(a,b){Nat.merge(a,b);return Nat.merge;}
	,typeOf:function(t,a){return (typeof t==a);}
	,OBJs:{El:{rec:{cr:[]},kl:[]}}
	,HTMLEventsName:'dragdrop move readystatechange'
	,HTMLElementPath:function(ob){
		var r=this.browseHTMLElementPath(ob,function(e){return e.tagName;}).reverse();
		return r;
	}
	,browseHTMLElementPath:function(ob,func){
		var o=this,r=[],f=(typeof func=='function')?func:o.F();

		while(ob){
			r[r.length]=f(ob);
			if(G.isObject(ob.offsetParent||'')){
				if(G.isString(ob.offsetParent.tagName||null)){
					ob=ob.offsetParent;
				}
			}
			else{ob=false;break;}
		}
		return r;
	}
		
	,getObjectType:function(tf1){var tf=[tf1].join('').toLowerCase(),it=typeof tf1;if(tf.match(/object(.*)event/gi)||tf.match(/gougnon eventobject/gi)){it='-eventobject';}else if(tf.match(/object object/gi)||tf.match(/gougnon pureobject/gi)){it='-pureobject';}else if(tf=='[object]'){if(_(ou.top).is('object')&&_(ou.frames).is('object')&&_(ou.location).is('object')&&ou===G.Window){it='-windowobject';};if(('nodeName'in ou)&&('nodeValue'in ou)&&('lastChild'in ou)&&('dir'in ou)){it='-htmlelement';}if(('fromElement'in ou)&&('toElement'in ou)&&('dataTransfer'in ou)&&('srcElement'in ou)){it='-eventobject';}if(('location'in ou)&&('parentNode'in ou)&&ou===G.DOC){it='-documentobject';}}else if(tf.match(/gougnon browserobject/gi)){it='-browserobject';}else if(tf.match(/gougnon html(.*)element/gi)){it='-htmlelement';}else if(tf.match(/object window/gi)||tf.match(/gougnon windowobject/gi)){it='-windowobject';}else if(tf.match(/object htmldocument/gi)||tf.match(/gougnon documentobject/gi)){it='-documentobject';}return it;}};

	W.requestAnimationFrame = W['requestAnimationFrame']||W['webkitRequestAnimationFrame']||W['mozRequestAnimationFrame']||W['oRequestAnimationFrame']||W['msRequestAnimationFrame']||function(f,element){W.setTimeout(f,1000/48);};


	Nat=_native;if(_native.typeOf(Nat,'undefined')){return false;}
	Nat.foreach(('string number object array boolean function undefined').split(' '), function(v){
		var nv = ['is', v.substr(0,1).toUpperCase(), v.substr(1).toLowerCase()].join('');Nat[nv] = function(r,t){return typeof r==v.lower();};
	});
	Nat.Function=Nat.F;
	Nat.Number=Nat.N;

	if(typeof window.__defineGetter__!='undefined'){window.__defineGetter__('__LINE__',function(){var e=new Error(),s=(e.stack||'').split('\n'),l=(s[1]||''),b=GBrowser();if(b.chrome){l=(s[2]||'');}return l.split(':')[2]||false;});}

	_c=function(){var Cl=this;Cl.args=arguments||[];Cl.__a=Cl.args[0]||undefined;Cl.is=function(a){var Cl=this;return Nat.typeOf(Cl.__a,a);};};_=function(){return new _c(arguments[0]||undefined);};Nat.merges(_,{});Nat.cores={};_.krnl='element array object eventObject event browser window document action animatedProcess script style screen move drop mouse toast ajax lockbox api';(function(o,n){var ln=n.split(' ');for(var x=0;x<ln.length;x++){o[ln[x]]={};}})(Nat.cores,_.krnl);_.kl={};


	_.kl.element=function(){
		var o={};o._a=arguments||[];

		o._nl=([o._a[0]].join('').toLowerCase().match(/object nodelist/gi))?o._a[0]:false;

		var trnsNd=function(cc){
			var nn=[];
			for(var x=0;x<cc.length;x++){
				nn.push(new _.kl.element(cc[x]));
			};
			return (nn.length<=1)?cc:nn;
		};

		o._nodeList=trnsNd(o._nl); 
		o.element=(o._nodeList!==false)?o._nodeList[0]:o._a[0]||{};

		// console.log([o._nodeList, o.element, o._a[0] ].join(' - '))

		o.toString=function(){return ['[Gougnon HTML',(this.element)?((this.element.tagName||'').ucfirst()||''):'','Element]'].join('');};
		o.node=function(){
			var o=this,a=arguments,k=(typeof a[0]=='undefined')?false:a[0],l=o._nodeList,no=[];

			if(G.isObject(l)){
				G.foreach(l,function(v){
					if(G.isObject(v||'')){no[no.length]=G(v);}
				});
			}

			return (k!==false)?no[k]||false:no;
		};
		return Nat.merge(o,Nat.cores.element);
	};


	_.kl.array=function(){var o={};o._a=arguments||[];o.array=o._a[0]||[];return Nat.merge(o,Nat.cores.array);};
	_.kl.object=function(){var o={};o._a=arguments||[];o.object=o._a[0]||{};o.toString=function(){return '[Gougnon PureObject]';};return Nat.merge(o,Nat.cores.object);};
	_.kl.eventOj=function(){var o={};o._a=arguments||[];o.event=o._a[0]||{};o.toString=function(){return '[Gougnon EventObject]';};return Nat.merge(o,Nat.cores.eventObject);};
	_.kl.wind=function(){var o={};o._a=arguments||[];o.window=o._a[0]||{};o.toString=function(){return '[Gougnon WindowObject]';};return Nat.merge(o,Nat.cores.window);};
	_.kl.doc=function(){var o={};o.args=arguments;o.__a=o.args[0]||[];o.typeOf=typeof o.__a[0];o.doc=document;o.document=o.doc;
		o.toString=function(){return '[Gougnon DocumentObject]';};
		o.href=function(u){var o=this;(o.__a[0]||o.doc).location.href=u;};
		o.refresh=function(u,t){var o=this;G(function(){o.href(u);}).timeout(t);};
		o.title=function(t){var o=this;(o.__a[0]||o.doc).title=t||o.doc.title;};
		if(o.typeOf=='function'){o.__a[0]((typeof o.__a[1]!='undefined')?o.__a[1]:[]);}

		return Nat.merge(o,Nat.cores.document);
	};

		Nat._doc=function(){return _.kl.doc(arguments);};
		W.GDocument=_native._doc;
		W.GDoc=W.GDOC=GDocument();

	_.kl.evt=function(){var o={};o.args=arguments;o.__a=o.args[0]||[];o.hote=o.__a[0]||Nat.DOC;o.handler=[];o.handler.name=[];o.handler.ft=[];o.toString=function(){return '[Gougnon EventHandler]';};return Nat.merge(o,Nat.cores.event);};Nat.Event=function(){return _.kl.evt(arguments);};W.GEvent=_native.Event;

	var _noactsH={
		version:'0.1'
		,Handlers:[]
		,HandlerEvents:false
		,Handler:function(){
			var o=this,a=arguments,f=a[0]||o.HandlerEvents,as;
			
			if(!G.isString(f)){return false;}
			else{
				as=G(f.split(' ')).purge();
				o.HandlerEvents=f;

				G.foreach(as,function(v,n){

					GEvent(document).listen(v,function(ev){
						var el=G(ev).source(),ge=G(el),nn='ggn-handler-',nnn='handler-',ac,isa=el.nodeName.upper() == 'A';

						if(G.isFunction(ge.attrib||false) || isa){

							nn+=v;
							nnn+=v;

							if(!isa){ac=ge.attrib(nn)||ge.attrib(nnn)||false; }
							if(isa){ac=el.getAttribute(nn)||el.getAttribute(nnn)||false; }

							if(G.isString(ac)){
								G.foreach(GAction.Handlers[v],function(od,nd){if(ac==nd){G.foreach(od, function(fnc){if(G.isFunction(fnc||'')){fnc(ge);}});}});
							}

						}


					}, false);
				});
				return true;
			}
		}
	};
	_.kl.acts=function(){var o={};o.args=arguments;o.__a=o.args[0]||[];

		o.Static=Nat.Action;
		o.Hote=false;
		o.getInstance=function(i){var spl=i.split(':');
			return {type:spl[0].trim(),value:spl[1]||false,split:spl};
		};

		o.getHote=function(p0){
			var h=p0,p=[h].join('').toLowerCase(),tf=Nat.getObjectType(p0);if(tf=='-htmlelement'){h=p0.element||p0;}else if(tf=='-windowobject'){h=p0.window||p0;}else if(tf=='-documentobject'){h=p0.document||p0;}else if(tf=='-pureobject'){h=p0.object||p0;}else if(typeof p0=='string'){ h=G(p0).element||p0;} return h;
		};

		o.instance=o.getInstance(o.__a[0]);
		o.type=o.instance.type||false;
		if(o.type===false){
			o.Hote=o.getHote(o.__a[0])||Nat.DOC;
		}
		else if(o.type=='handler'){
		}

		o.toString=function(){return '[Gougnon ActionAPI]';};
		o.on=function(n,f){var o=this;o.Hote[['on',n].join('')]=f;};return Nat.merge(o,Nat.cores.action);
	};

	Nat.Action=function(){return _.kl.acts(arguments);};

	Nat.merge(_native.Action,_noactsH);
	W.GAction=_native.Action;
	
	

	_.kl.brwsr=function(){var o={};o.name=N.appName;o.cname="<?php echo CLIENT_BROWSER; ?>";o.agent=N.userAgent.toString().toLowerCase();o.version=N.appVersion;o.platform=N.platform;

		o.get=function(n){
			var o=this;

			if((o.agent.indexOf(arguments[0]||'')||(-1))>=0){
				var su=n.substr(-1)=='/';
				o.name = n.replace(/\//gi, '');
				return true;
			}
			else{
				return false;
			}

		};

			o.MAC=o.get('mac');
			o.Win32=(o.platform=='Win32');
			o.JAVA=N.javaEnabled();
			o.flashShockwave=o.flash=function(){var m=navigator.mimeTypes["application/x-shockwave-flash"];return m && m.enabledPlugin;};
			o.gecko=o.get('gecko');
			o.likeGecko=o.get('like gecko')||o.gecko;
			o.appleWebkit=o.get('applewebkit');
			o.khtml=o.get('khtml');
			o.ie=o.IE=(o.get('trident/')&&o.get('clr')&&o.get('.net'))||o.get('msie')||o.get('Microsoft Internet Explorer');
			o.firefox=o.get('firefox/');
			o.chrome=o.get('chrome/');
			o.safari=o.get('safari/');
			o.opera=o.get('opera')||o.get('opr/');
			o.ie6=o.IE6=o.get('msie 6');
			o.ie7=o.IE7=o.get('msie 7');
			o.ie8=o.IE8=o.get('msie 8');
			o.ie9=o.IE9=o.get('msie 9');
			o.ie10=o.IE10=o.get('msie 10');
			o.ie11=o.IE11=(o.ie&&o.get('rv:11'));
			o.iemobile=o.get('iemobile/');
			o.xbox=o.get('xbox');
			o.xBoxOne=o.get('xbox one');
			o.toString=function(){return '[Gougnon BrowserObject]';};return Nat.merge(o,Nat.cores.browser);
		};
		Nat.Browser=function(){return _.kl.brwsr(arguments);};Nat._Brower=_native.Browser();W.GBrowser=_native.Browser;W._GBrowser=_native._Brower;

	name

	W.G=function(){
		var __a=arguments||false
			,tf=typeof (__a[0]||undefined)
			,out,output;

			out=__a[0]||undefined;
			output=out;
			var gotype=function(ou){var tf=[ou].join('').toLowerCase();if(tf.match(/object(.*)event/gi)){return _.kl.eventOj(ou);} else if(tf.match(/object object/gi)){return _.kl.object(ou);} else if(tf=='[object]'){if(_(ou.top).is('object')&&_(ou.frames).is('object')&&_(ou.location).is('object')&&ou===G.Window){return _.kl.wind(ou)};if(('nodeName'in ou)&&('nodeValue'in ou)&&('lastChild'in ou)&&('dir'in ou)){return _.kl.element(ou);}if(('fromElement'in ou)&&('toElement'in ou)&&('dataTransfer'in ou)&&('srcElement'in ou)){return _.kl.eventOj(ou);}if(('location'in ou)&&('parentNode'in ou)&&ou===G.DOC){return _.kl.doc(ou);}}else if(tf.match(/object window/gi)){return _.kl.wind(ou);}else if(tf.match(/object htmldocument/gi)){return _.kl.doc(ou);}return ou;};

			if(_(out).is('string')){
				var stobj=false;

				try{stobj=D.querySelectorAll(out);}catch(e){}

				output=(_(stobj).is('object'))?_.kl.element(stobj):out;
			}

			if(_(out).is('object')&&typeof out['length']!='undefined'){
				if(out['length']>=0){
					output=_.kl.array(out);
				}
			}

			if(_(out).is('object')&&typeof out['length']=='undefined'){
				var o=out
				,go=[o].join('').toLowerCase().match(/object(.*)html(.*)element/gi)||false;
				output=(go)?_.kl.element(out):gotype(out);
			}

		return output;
	};

	Gougnon=G;var __={};_.__=function(o){return o['prototype'];};_._={st:_.__(String),oj:Nat.cores.object,evoj:Nat.cores.eventObject,ft:_.__(Function),nu:_.__(Number),el:Nat.cores.element,ar:Nat.cores.array,evt:Nat.cores.event,brwsr:Nat.cores.browser,wind:Nat.cores.window,doc:Nat.cores.document,acts:Nat.cores.action};_.liB={version:'0.1'};var inj={},__injct=function(){var o={};return (function(Cl,ar){Cl.Sto=ar[0]||{};Cl._=function(n,f){var o=this,n0=n.toString().split('|');Nat.foreach(n0,function(v){o.Sto[v]=f||undefined;});return o;};return Cl;})(o,arguments);},_injct=function(){return (function(ar){return __injct(ar[0]||false);})(arguments);};inj.wind=_injct(_._.wind);Nat._doc(function(){for(var n in W){var on=n.substr(0,2);if(on=='on'){var n1=n.substr(2);Nat._doc(function(a){var a=a,an=a[0]||'',ai=a[1]||'';inj.wind._(ai,function(f0){this.window[an]=f0;});},[n,n1]);Nat.HTMLEventsName+=' ';Nat.HTMLEventsName+=n1;}};});inj.doc=_injct(_._.doc);Nat._doc(function(){for(var n in D){var on=n.substr(0,2);if(on=='on'){var n1=n.substr(2);Nat._doc(function(a){var a=a,an=a[0]||'',ai=a[1]||'';inj.doc._(ai,function(f0){this.document[an]=f0;});},[n,n1]);Nat.HTMLEventsName+=' ';Nat.HTMLEventsName+=n1;}};});

	inj.acts=_injct(_._.acts)
	._('touchSlide',function(){if(typeof this.Hote!='object'&&o.type!=false){return this;}var o=this,ev=Nat.Event(o.Hote);o.startMouse=false;o.endMouse=false;o.activate=false;o.slideX=false;o.slideY=false;o.actOn=false;o.actOnDrg=false;o.fcall=arguments[0]||G.F();ev.listen('mousedown',function(ev0){var elc=G(ev0).source();o.startMouse=Nat.Mouse(ev0).position();o.actOn=elc;o.activate=true;});ev.listen('mouseup',function(ev1){o.endMouse=Nat.Mouse(ev1).position();var m0=o.startMouse,mf=o.endMouse;if(o.activate===true){if(typeof m0.x=='number'&&typeof mf.x=='number'){o.slideX=mf.x-m0.x;o.slideY=mf.y-m0.y;if((o.slideX!=0||o.slideY!=0)&&typeof o.fcall=='function'){o.fcall(o.slideX,o.slideY);}}}o.actOn=false;o.activate=false;});return o;})
	._('touchSlideRight',function(){if(typeof this.Hote!='object'&&o.type!=false){return this;}var o=this;o.fcallr=arguments[0]||G.F();o.touchSlide(function(x,y){var _o=this;if(x>0&&typeof o.fcallr=='function'){o.fcallr(Math.abs(x));}});return o;})
	._('touchSlideLeft',function(){if(typeof this.Hote!='object'&&o.type!=false){return this;}var o=this;o.fcalll=arguments[0]||G.F();o.touchSlide(function(x,y){var _o=this;if(x<0&&typeof o.fcalll=='function'){o.fcalll(Math.abs(x));}});return o;})
	._('touchSlideTop',function(){if(typeof this.Hote!='object'&&o.type!=false){return this;}var o=this;o.fcallt=arguments[0]||G.F();o.touchSlide(function(x,y){var _o=this;if(y<0&&typeof o.fcallt=='function'){o.fcallt(Math.abs(y));}});return o;})
	._('touchSlideDown',function(){if(typeof this.Hote!='object'&&o.type!=false){return this;}var o=this;o.fcalld=arguments[0]||G.F();o.touchSlide(function(x,y){var _o=this;if(y>0&&typeof o.fcalld=='function'){o.fcalld(Math.abs(y));}});return o;})
	._('listen',function(){var o=this,a=arguments;
		if(o.type=='handler'){
			var inst=o.instance.value,od=GAction.Handlers,ev=(a[0]||'').split('|'),f=a[1];

			G.foreach(ev, function(evt){
				var ik;
				od[evt] = od[evt]||[];
				od[evt][inst] = od[evt][inst]||[];ik=od[evt][inst];
				od[evt][inst][ik.length] = f||G.F();
				GAction.Handlers=od;
			});

		}
	})
	;


	inj.str=_injct(_._.st)._('ucfirst|ucFirst',function(){return [this.substr(0,1).upper(),this.substr(1)].join('');}) ._('trim',function(){return this.replace(/ /gi,'');}) ._('empty|isEmpty',function(){var str=(this.trim().length==0)?true:false;return str;}) ._('addSlashes',function(){var str=this.replace(/["]/gi,'\\"').replace(/[']/gi,"\\'");return str;}) ._('stripSlashes',function(){var str=this.replace(/[\.]/gi,'');return str;}) ._('stripQuote',function(){var str=this.replace(/["]/gi,'').replace(/[']/gi,'');return str;}) ._('replaceURL',function(){var a=arguments,m=a[0]||false,s=this,us=s.getURL(),r=s;for(var x=0;x<us.length;x++){r=(m===false)?'':r.replace(/http/gi,'http').replace(us[x],m.replace(/[$]/gi,us[x]));}return r;}) ._('fullSpace',function(){var a=arguments,s='',b=GBrowser(); if(b.ie5||b.ie6||b.ie7){s=(['<table style="width:100%;height:100%;" cellspacing="0" cellpadding="0"><tr><td>',this,'</td></tr></table>'].join(''));} else{s=(['<div style="display:table;width:100%;height:100%;"><div style="display:table-cell;vertical-align:middle;width:100%;height:100%;">',this,'</div></div>'].join(''));} return s; }) ._('getURL',function(){var o=this,ht,st,str=o.replace(/http/gi,'http'),hta=[];ht=(str.match(/(http)/gi)||'').length;st=str;for(var x=0;x<ht;x++){var s=st.indexOf('http'),u=st.match(/(\w+):\/\/([\w.:-]+)(\/|)(\S*)/)||false;if(u!=false){var u0=u[0]||'';hta[hta.length]=u0;st=st.replace(u0,'');}}return hta;}) ._('ucwords|ucWords',function(){var s=this,ss=s.split(' '),output='';for(var x=0;x<ss.length;x++){var sss=G(ss[x])||false;output+=(typeof sss=='string')?sss.ucfirst():'';output+=' ';};return output.substr(0,output.length-1);}) ._('email',function(){return (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/).test(this);}) ._('lower',function(){return this.toLowerCase();}) ._('upper',function(){return this.toUpperCase();})._('aboutBlank',function(){return W.open((arguments[0]||""),this,(arguments[1]||null));})._('escape',function(){return escape(this);})._('unescape',function(){return unescape(this);})._('stripSpecialChar',function(){return this.replace(/[&\/\\#\.,+()$~%.'":*?<>{}@áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœ]/gi,'');})._('stripAlphaChar',function(){return this.replace(/[a-z]/gi,'');})._('stripNumericChar',function(){return this.replace(/[0-9]/gi,'');})._('stripSpace',function(){return this.replace(/ /gi,'');})._('hasSpecialChar',function(){return (/[a-z0-9 ]/gi).test(this);})._('hasAlphaChar',function(){return (/[a-z]/gi).test(this);})._('hasNumericChar',function(){return (/[0-9]/gi).test(this);})._('hasSpace',function(){return (/ /gi).test(this);})._('compare',function(n){var n=[n].join(''),a=this.replace(/[.]/gi,''),b=n.replace(/[.]/gi,'');a=a.stripSpace().stripSpecialChar().stripAlphaChar();b=b.stripSpace().stripSpecialChar().stripAlphaChar();return (a>b)?true:((a<b)?false:null);});

	inj.nu=_injct(_._.nu)
	._('math',function(nm){var _m=Math,_n=_m[nm]||false,ar=arguments[1]||[],r=ar.length;if(_(_n).is('function')){if(r<=0){return _n(this);}if(r==1){return _n(this,ar[0]);}if(r>1){var arn=Nat.merge([],ar);return eval(['Math["',nm,'"](',arn.join(','),');'].join(''));}}else if(!_(_n).is('boolean')){return _n;}});

	if(typeof Object.getOwnPropertyNames=='function'){Nat._doc(function(){var _m=Math,_p=[],m=Object.getOwnPropertyNames(_m).filter(function(p){_p[p]=_m[p];});for(var n in _p){if(!_(_m[n]).is('boolean')){Nat[n]=_m[n];}if(_(_m[n]).is('function')){Nat._doc(function(nm){inj.nu._(nm,function(){return this.math(nm,arguments);})},n);}}});}

	inj.nu._('nuspacer',function(n){return((this-((typeof n=='undefined')?NaN:n))/2);})
	._('degreeInRadians',function(){return(this*Math.PI)/180;})
	._('purcent|percent',function(n){return(this/n)*100;})
	._('cpurcent|unPurcent|cpercent|unPercent',function(n){return(this*n)/100;})
	._('pair',function(n){var c=[this].join(''),n=eval(c.charAt(c.length-1));return(n%2===0)?true:false;})
	._('virgule',function(n){var a=[this].join(''),s=a.split("."),va=(typeof s[1]=='undefined')?s[0]*1:[s[0],'.',s[1].substr(0,n)].join('')*1;return va;})
	._('clearOut',function(){return W.clearTimeout(this);})
	._('clearInt|clearIntv',function(){return W.clearInterval(this);})
	._('glength',function(){var o=this,s=[this].join('').split(''),ut=[],r='1';Nat.foreach(s,function(v,n){ut.push('0');});r+=ut.join('');return 1*r;})
	._('zeroBefore',function(){
		var o=this,s=[this].join(''),a=arguments,l=a[0]||0,n='',ls=s.length;
		
		if(ls<l){
			for(var x=0;x<Math.abs(l-ls);x++){
				n+='0';
			}
		}

		return n+s;
	})
	;


	inj.ft=_injct(_._.ft)

	._('timeout',function(t){var t=(new _.kl.brwsr().ie)?((t<1)?1:t):t,f=this;return setTimeout(f,t);})._('interval',function(t){var t=(new _.kl.brwsr().ie)?((t<1)?1:t):t,f=this;return setInterval(f,t);});

	inj.evoj=_injct(_._.evoj)
	._('source',function(){var e=this.event;if(e==null){e=O.event;} return e.target||e.srcElement||false;})
	._('clickType',function(){var e=this.event,ret=false;if(e.which===1){ret='mouse.click.left';}if(e.which===2){ret='mouse.click.middle';}if(e.which===3){ret='mouse.click.right';}return ret;})
	;





	inj.evt=_injct(_._.evt)

	._('add',function(n,f){var o=this;o.handler.name[o.handler.name.length]=([n].join(''));o.handler.ft[o.handler.ft.length]=(f);return o;})

	._('detect',function(n){
		var o=this,ar=arguments,Ns=o.handler.name,Ft=o.handler.ft,n=ar[0]||false;

		if(n===false){return o;}
		n=n.lower();
		Nat.foreach(Ns,function(v,k){
			var v=v.lower();
			if(v==n){
				if(_(Ft[k]).is('function')){
					var a=[];
					Nat.foreach(ar,function(v){
						a[a.length]=v;
					},1);

					Ft[k](a);
				}
			}
		});
		return o;
	})

	._('list',function(n){var o=this,args=arguments,Ns=o.handler.name,Ft=o.handler.ft,n=args[0]||false;if(n===false){return o;}n=n.lower();o.item=[];Nat.foreach(Ns,function(v,k){var v=[v].join('').lower();if(v==n){if(_(Ft[k]).is('function')){o.item[o.item.length]=(Ft[k]);}}});return o.item;})._('lists',function(n){var o=this,Ns=o.handler.name,Ft=o.handler.ft;o.item=[];Nat.foreach(Ns,function(v,k){if(_(Ft[k]).is('function')){o.item[o.item.length]=(Ft[k]);}});return o.item;})
	._('remove|reset',function(n){var o=this,a=arguments,Ns=o.handler.name,Ft=o.handler.ft,n=a[0]||false;if(n===false){return o;}n=n.lower();Nat.foreach(Ns,function(v,k){var v=[v].join('').lower();if(v==n){if(_(Ft[k]||false).is('function')){o.handler.name[k]=undefined,o.handler.ft[k]=undefined;}}});return o;})
	._('removeAll|resetAll',function(){var o=this,Ns=o.handler.name;Nat.foreach(Ns,function(v,k){var v=[v].join('').lower();o.handler.name[k]=undefined,o.handler.ft[k]=undefined;});return o;})

	._('listen',function(){
		var o=this,h=o.hote||Nat.DOC,a=arguments,ev=(a[0]||'').split('|'),f=a[1]||G.F();

		G.foreach(ev, function(evt){

			if(typeof h.attachEvent!='undefined'){h.attachEvent(['on',evt].join(''),f);return o;}
			else if(typeof h.addEventListener!='undefined'){h.addEventListener(evt,f,arguments[2]||false);return o;}

		});

		return false;
	})

	._('prevent',function(r){var ev=this.hote;r=(r===true)?false:true;if(ev.preventDefault){ev.preventDefault();}ev.returnValue=r;return this;})
	._('stop',function(r){var ev=this.hote;if(ev.stopPropagation){ev.stopPropagation();}return this;})
	;







	inj.el=_injct(_._.el);
	Nat._doc(function(){var sto=Nat.HTMLEventsName.split(' ');for(var n in sto){Nat._doc(function(an){inj.el._(an,function(f0){if(this.element){this.element[['on',an.lower()].join('')]=f0;}});},sto[n]);};});

	inj.el
	._('Offset|offset',function(){var o=this.element,b=typeof arguments[0]=='undefined',n=arguments[1]||false,ln='width height top left scrollTop scrollLeft scrollWidth scrollHeight',l='offsetWidth offsetHeight offsetTop offsetLeft scrollTop scrollLeft scrollWidth scrollHeight',a={parent:o.offsetParent},sln=ln.split(' '),sl=l.split(' ');for(var x=0;x<sln.length;x++){var v=(n===false?100:n).unPurcent(o[sl[x]]);a[sln[x]]=v;}return (b===true)?a:(a[arguments[0]]||a);})

	._('toggle',function(){var o=this,fx=arguments[0]||false;return o.hide(fx)||o.show(fx)||false;})
	._('animation',function(){
		var o=this,fx=arguments[0]||false,cfg=arguments[1]||{},evts=_noprcH.events.split(' ');o.animatesControllers=[];if(typeof fx=='object'){G(fx).foreach(function(v,n,oj){if(typeof v=='object'){var an=v.value||false,pat=v.pattern||false;if(typeof an=='string'){var x=an.trim().split(':'),fto=(x[0]||'').split('->'),u=x[1]||'',x0_=fto[0]*1,x1_=fto[1]*1,x0=(!isNaN(x0_))?fto[0]*1:false,x1=(!isNaN(x1_))?fto[1]*1:false,p={},prc,ohit,sn=[x0].join('').substr(0,1);if(x0!==false&&x1===false){var _xl,__xl=o.css(n),_x0=Math.abs(x0),_xi;if(__xl!==false){_xl=(__xl).stripAlphaChar()*1;_xi=_xl;if(sn=='+'){_xl+=_x0;}if(sn=='-'){_xl-=_x0;}if(sn=='*'){_xl*=_x0;}if(sn=='/'){_xl/=_x0;}else if(sn!='+'&&sn!='-'&&sn!='*'&&sn!='/'){_xl=_x0;}}x0=_xi;x1=_xl;}p.from=x0;p.to=x1;p.loop=v.loop||cfg.loop||false;p.timeline=v.timeline||cfg.timeline||150;G(evts).foreach(function(_v,_n,_oj){p[_v]=v[_v]||cfg[_v]||G.F();});ohit=p.hit;p.hit=function(){var _o=this,c={};if(typeof _o.__ohit=='function'){_o.__ohit();}if(typeof pat=='string'){c[n]=pat.replace(/LEVEL/gi,_o.level).replace(/UNIT/gi,u);}if(typeof pat!='string'){c[n]=_o.level;c[n]+=u;}o.css(c);};prc=Nat.AnimatedProcess(p).init();prc.__ohit=ohit;prc.start();o.animatesControllers[o.animatesControllers.length]=prc;}}});}
		return o;
	})

	._('hide',function(){var o=this,h=o.Offset().height,s=o.data('hide-show-status')||'-h',ar=arguments[0]||false,p={};if(typeof h!='number'){h=o.data('hide-show-height');}if(typeof h=='number'){o.data('hide-show-height',h);}if(s=='-s'){o.css({overflow:'hidden'});ar.onDone=ar.onDone||false;if(ar.fx=='fade'){var fxn='opacity';p[fxn]={};p[fxn].value='0.999->0.0';}else{var pfx=h,fxn='height';p[fxn]={};pfx+='->0:px';p[fxn].value=pfx;}p[fxn].timeline=ar.timeline||150;p[fxn].done=function(){if(typeof ar.onDone=='function'){ar.onDone();}o.css({height:'0px'});o.data('hide-show-status','-h');};o.animation(p);return true;}return false;})
	
	._('show',function(){var o=this,h=o.data('hide-show-height')||o.Offset().height,s=o.data('hide-show-status')||'-h',ar=arguments[0]||false,p={};

		if(s=='-h'){var _h=h;_h+='px';o.css({overflow:'hidden'});ar.onDone=ar.onDone||false;if(ar.fx=='fade'){var fxn='opacity';p[fxn]={};p[fxn].value='0.000->0.999';o.css({height:_h});}else{var pfx='0->',fxn='height';p[fxn]={};pfx+=h;pfx+=':px';p[fxn].value=pfx;}

			p[fxn].timeline=ar.timeline||150;
			p[fxn].done=function(){if(typeof ar.onDone=='function'){ar.onDone();}o.data('hide-show-status','-s');o.css({height:_h});};

			o.animation(p);

		return true;}

		return false;})

	._('children|Children',function(){var eo=this.element,c=[],a=arguments,s=a[0]||'*',t=a[1]||false,m=a[2]||false,cn=[];
		try{if(typeof eo.querySelectorAll!='undefined'){c=eo.querySelectorAll(s);}}
		catch(e){};

		if(c.length>0){for(var x=0;x<c.length;x++){
			var el=c[x],ele=((m===false)?el:G(el));

			if(G.isObject(el.parentNode||false)){
				if(t===true){cn[cn.length]=ele;}
				else{if(el.parentNode==eo){cn[cn.length]=ele;}}
			}

		};}
		return cn;
	})
	._('html',function(){var o=this ,ob=o.element||false ,s=(typeof arguments[0]=='undefined')?false:[arguments[0]].join('');if(typeof ob!='object'){return o;}if(s!==false){ob.innerHTML=s;}o.inner=ob.innerHTML;o.outer=ob.outerHTML;return o;})
	._('append',function(){var o=this ,ob=o.element||false,a=arguments,s=a[0]||false,ap=s; 
		if(typeof s=='string'){ap=D.createTextNode(s);} 
		if(typeof ap=='object'){ob.appendChild(ap); } 
		return o;
	})

	._('insertBefore',function(){var o=this ,ob=o.element||false,a=arguments,s=(typeof a[0]=='undefined')?false:a[0], xf=a[1]||false; 
		if(G.isObject(s)){ob.insertBefore(s,xf); } 
		return o;
	})

	._('fullSpace',function(){var o=this,ob=o.element,s=arguments[0]||'',b=GBrowser(); if(G.isString(s||null)){o.html(s.fullSpace());} return o;})
	._('cn|Class',function(){var o=this.element;o.className=arguments[0]||'';return o;})
	._('addClass',function(){var o=this,ob=o.element,a=arguments||[],c=a[0]||'',q=c.split(' ');if(ob!=false&&typeof ob.classList!='undefined'){for(var x=0;x<q.length;x++){ob.classList.add(q[x]);};}else{o.cn([ob.className,c].join(' '));}return o;})
	._('hasClass',function(){
		var o=this,ob=o.element,a=arguments||[],c=a[0]||false,cns=ob['classList']||ob.className||false,r=false;
		// if(ob!=false&&typeof ob.classList!='undefined'){for(var x=0;x<q.length;x++){ob.classList.remove(q[x]);};}
		// else{o.cn(ob.className.replace(Nat.eval(["/( |)",c,"( |)/gi"].join('')),''));}

		cns = G.isObject(cns||'')? cns: (G.isString(cns||'') ? G.isString(cns||'').split(' '): false);
		if(Nat.isString(c) && cns!=false){
			Nat.foreach(cns, function(v,k){
				if(!G.isString(v)){return false;}
				if(c==v){r=true;}
			});
		}

		return r;
	})
	._('removeClass',function(){var o=this,ob=o.element,a=arguments||[],c=a[0]||'',q=c.split(' ');if(ob!=false&&typeof ob.classList!='undefined'){for(var x=0;x<q.length;x++){ob.classList.remove(q[x]);};}else{o.cn(ob.className.replace(Nat.eval(["/( |)",c,"( |)/gi"].join('')),''));}return o;})
	._('replaceClass',function(){var o=this,ob=o.element,a=arguments||[],c0=a[0]||'',c1=a[1]||'',cc0=ob.className,cc1=' ';;if(ob!=false&&typeof ob.classList!='undefined'){o.removeClass(c0);o.addClass(c1);}else{cc1+=c1;o.cn(ob.className.replace(Nat.eval(["/( |)",c0,"( |)/gi"].join('')),cc1));}return o;})
	._('computedStyle',function(){var o=this,ob=o.element,ro=false;if(ob&&typeof W.getComputedStyle!='undefined'){ro=W.getComputedStyle(ob)||false;}return ro;})
	._('absCenterOf',function(){var o=this,args=arguments,a=args[0]||{},t,l,psz,sz,css={};sz=o.offset(false,100);psz=a.offset(false,100);l=(psz.width||0).nuspacer(sz.width);t=(psz.height||0).nuspacer(sz.height);css.top=t;css.top+='px';css.left=l;css.left+='px';o.css(css);})
	
	._('css',function(){var o=this,ob=o.element,args=arguments,a=args[0]||{},c=a||{},larg=args.length,r=o,sty=GStyle; 
		if(typeof a==='object'&&larg===1){sty.update(o,c); }
		else{
			var cs=o.computedStyle()||false; 
			if(typeof cs=='object'){
				r=[]; 
				G.foreach(args,function(v,k){
					var va=v||''; 
					if(typeof va=='object'){o.css(va);} 
					if(typeof va=='string'){r[r.length]=((cs.getPropertyValue(va))||undefined);} 
				}); 
				
				if(larg===1){r=r[0]||undefined;} 
			} 
		} 
		return r;
		})
	
	._('createElement',function(){
		var o=this,ob=o.element,a=arguments,c,obb,e,ins;

			c=a[0]||{}
			,obb=false
			,e=null
			,ins=false;

			c.id=c.id||false;
			c.tag=c.tag||'div';
			c.tag=(typeof c.tag=='string')?c.tag:'div';
			c.cn=c.cn||false;
			c.html=c.html||false;
			c.css=c.css||false;

			if(typeof c.id=='string'){if(typeof G(['#',c.id].join('')).element=='object'){ins=G(['#',c.id].join('')),e=obb.element;}}
			if(typeof obb!='object'){e=D.createElement(c.tag),ins=_.kl.element(e);}
			if(ob.appendChild){ob.appendChild(e);}
			if(e&&ins){if(typeof c.id=='string'){e.id=c.id;}if(typeof c.html=='string'){ins.html(c.html);}if(typeof c.cn=='string'){ins.cn(c.cn);}if(typeof c.css=='object'){ins.css(c.css);}}

			return ins;
	})
	._('ui',function(n,v){var o=this,a=arguments,_n='gui',_v=a[1]||false;_n+='-';_n+=[n].join('');return o.attrib(_n,_v);})
	._('listen',function(){
		var o=this,a=arguments,r=a[2]||false,a=arguments,ev=(a[0]||'').split('|'),f=a[1]||G.F();

		G.foreach(ev, function(n){
			Nat.Event(o.element).listen(n,f,r);
		});

		return o;
	})
	._('attrib',function(){var o=this,ob=o.element,a=arguments,g=a[0]||false,s=a[1]||false,m=(s!==false)?'-s':'-g';if(typeof ob['setAttribute']!='function'){return false;}if(m=='-s'&&g!==false){ob.setAttribute(g,s);return o;}return (typeof g=='string')?(ob.getAttribute(g)||false):o;})
	._('attributes',function(){var o=this,ob=o.element;return ob.attributes||false;})
	._('elementsByAttrib',function(){var o=this,chls=o.children('*',true,true),a=arguments,att=a[0]||false,r=false;
		if(G.isString(att)){
			Nat.foreach(chls,function(chl){
				var atts=chl.attributes();
				Nat.foreach(atts, function(at){
					if(G.isString(at.name||false)){
						if(at.name==att){
							r=chl;
						}
					}

				});
			});
		}
		return r;
	})
	._('removeAttrib',function(){var o=this,a=arguments[0]||false,ob=o.element; if(typeof a=='string'){ob.removeAttribute(a);}return o;})
	._('prop|property',function(){var o=this,ob=o.element,k=arguments[0]||false;return (typeof k=='string')?(ob[k]||ob):ob;})
	._('opacity',function(s){var atn='opacity',o=this,ob=o.element,a=arguments,s=a[0]||false,r=o.data(atn)||o.css('opacity')||null,v=(s||100)/100;if(s!==false&&typeof s=='number'){r=o.css({opacity:v},'opacity');o.data(atn,r);}return r;})
	._('cancelOpacity',function(s){var atn='opacity',o=this,ob=o.element,r,v=null;r=o.css({opacity:v},'opacity');o.data(atn,r);return r;})
	._('appendChild',function(s){var o=this,ob=o.element,a=arguments;ob.appendChild(a[0]||null);return ob;})

	._('execScript',function(s){var o=this,ob=o.element,a=arguments,els,scr_=G.Script; els=ob.getElementsByTagName('script'); for(var xes=0;xes<els.length;xes++){scr_.exec(els[xes].innerHTML); }; return o; })

	._('remove',function(){var o=this,ob=o.element; ob.parentNode.removeChild(ob); return o; })
	._('replace',function(nob){var o=this,ob=o.element; if(G.isObject(nob||null)){ob.parentNode.replaceChild(nob,ob);} return o; })

	._('bind',function(n,f){var o=this,ob=o.element;ob[n]=f;return o;})
	._('data',function(n){var o=this,ob=o.element,a=arguments,nx='ggn-data-',f=(typeof a[1]=='undefined')?false:a[1];nx+=a[0]||'undefined';if(f!==false){o.attrib(nx,f);}return o.attrib(nx);})
	._('getChildNodesCSS',function(){var o=this,ob=o.element,a=arguments[0]||false,r=[];if(typeof a=='string'){var els=ob.querySelectorAll('*');for(var x=0;x<els.length;x++){var _o=_.kl.element(els[x]),c=_o.css(a);r[r.length]=c;}}return r;})
	._('stringToSend',function(){var o=this,ob=o.element,str=[];if(typeof ob.elements!='object'){return false;}Nat.foreach(ob.elements,function(v){if(typeof v!='object'){return false;}if(typeof v.name=='string'){if(!v.name.empty()){if((v.type).lower()=='checkbox'||(v.type).lower()=='radio'){if(v.checked===true){var s='';s+=v.name;s+='=';s+=escape(v.value);str[str.length]=s;}}else{var s='';s+=v.name;s+='=';s+=escape(v.value);str[str.length]=s;}}}});return str.join('&');})
	;

	inj.ar=_injct(_._.ar)
	._('foreach|forEach',function(){var o=this,ar=o.array,a=arguments||false,f=a[0]||Nat.F(),s=a[1]||0,e=a[2]||ar.length||0;return (f&&ar.length)?Nat.foreach(ar,function(v,n,oj){if(n in oj){f(v,n,oj);}},s,e):false;})
	._('hasPropertyValue',function(f){var r=false,se=arguments[1]||false;se=typeof se=='boolean'?se:false;this.foreach(function(v,n,oj){if(se===true){if([v].join('').lower()==[f].join('').lower()){r=n;}}else{if(v==f){r=n;}}});return r;})
	._('purge',function(){var o=this,ar=o.array,nv=[],vv=[]; G.foreach(ar,function(v){if(!(v in nv)){nv[v]=v; vv[vv.length]=v;}});return vv; })
	._('remove',function(k){var o=this,ar=o.array,nv=[],lim=ar.length; 

		console.log(['remove : ', k, ' limit=', lim, ' limit2=',ar.length].join(' '))

		G.foreach(ar,function(v,n){
			if(n>=k){
				if(n==k){

				}
				else{
					if(n<=lim){
						var k0=n-1;
						nv[k0] = v;
					}
				}

			}
			else{
				nv[nv.length] = v;
			}
		});

		o.array=nv;
		return nv;
	})
	; 

	inj.oj=_injct(_._.oj)._('hasProperty',function(n){return n in this.object;}) ._('Length',function(){var l=0;Nat.foreach(this.object,function(){l++;});return l;}) ._('JSONToString',function(){var l=[];Nat.foreach(this.object,function(v,n){var r='';r+='"';r+=[n].join('').escape();r+='"';r+=':"';r+=[v].join('').escape();r+='"';l[l.length]=r;});return l.join('\n');}) ._('foreach|forEach',function(){var Cl=this,o=Cl.object,a=arguments||false,f=a[0]||Nat.F(),s=a[1]||0,e=a[2]||Cl.Length()||false;return (f&&!o.length)?Nat.foreach(o,function(v,n,oj){if(Cl.hasProperty(n)){f(v,n,oj);}},s,e):false;}) ._('hasPropertyValue',function(f){var r=false,se=arguments[1]||false;se=typeof se=='boolean'?se:false;this.foreach(function(v,n,oj){if(se===true){if([v].join('').lower()==[f].join('').lower()){r=n;}}else{if(v==f){r=n;}}});return r;}) ; 



	var _noscrpH={version:'0.1',checkedTypes:[]}; 
	var _noscrp=function(){var o={};o.toString=function(){return '[Gougnon ScriptAPI]'};
	return Nat.merge(o,Nat.cores.script);}; 
	Nat.Script=function(){return (function(){return new _noscrp(arguments[0]);})(arguments);};
	_noscrpH.doc=function(){return G.DOC.body||false;};


	_noscrpH._loaded=[];

	_noscrpH.load=function(u){
		var o=this,k=u.escape(),deo=o.isLoaded(u),a=arguments,f=a[1]||false;

		if(G.isObject(deo)){
			if(!f){return false;}
			else{deo.remove();}
		}

		var h=o.doc(),e=G(h).createElement({tag:'script'});
		e.attrib('type','text/javascript').attrib('src',u||'');
		o._loaded[k]=e;
		return e;
	}; 

	_noscrpH.unload=function(u){
		var o=this,deo=o.isLoaded(u);
		if(G.isObject(deo)){
			deo.removeAttrib('type').removeAttrib('src');
			return false;
		}
		return o;
	}; 

	_noscrpH.isLoaded=function(u){
		var o=this,k=u.escape(),de=o._loaded;
		if(k in de){if(G.isObject(de[k])){return de[k];}}
		return false;
	};

	_noscrpH.exec=function(){
		var h=this.doc(),e=G(h).createElement({tag:'script'}),txt=arguments[0]||false;
		if(G.isFunction(e.appendChild||null)&&G.isFunction(D.createTextNode||null)){e.appendChild(D.createTextNode(txt));}
		else{eval(txt);}
		return e;
	}; 


	_noscrpH.package=function(){
		var o=this,a=arguments, e,p=a[0]||false,styl=a[2]||false,u=a[1]||G.domaineName
			,ul=[u,'jsFramework?version=&api=',p, ((G.isString(styl))?['&style=',styl].join(''):'') ].join('');
		o.element=o.load(ul);
		return o;
	}; 

	_noscrpH.checkEle=[];
	_noscrpH.checkedTypes=[];

	_noscrpH.check=function(){
		var o=this,a=arguments,ob=a[0]||undefined,fct=a[1]||G.F(),typ,k=a[2]||escape(ob),elm=o.checkEle;
		
		if(G.isString(ob)){elm[k]=o.exec(['GScript.checkedTypes["',k,'"] = typeof ',ob,';'].join(''));}

		typ=(G.isString(ob||false))?o.checkedTypes[k]: (G.isFunction(ob||'')?typeof ob(o):false);

		
		if(typ=='undefined'){G(function(){_noscrpH.check(ob,fct,k); }).timeout(100);return o;}
		if(typ!='undefined'){if(G.isFunction(fct)){fct(o);}}
		

		if(k in elm){elm[k].remove();}
		return o;
	}; 

	Nat.merge(_native.Script,_noscrpH);
	W.GScript=Nat.Script; 



	var _nostlH={version:'0.1',_browserKeys:'webkit Moz ms O'}; 
	var _nostl=function(){var o={};o._args=arguments;o.args=o._args[0];o.toString=function(){return '[Gougnon StyleAPI]'};return Nat.merge(o,Nat.cores.style);}; 
	Nat.Style=function(){return (function(){return new _nostl(arguments[0]);})(arguments);};
	_nostlH.doc=function(){return G.DOC.head||G.DOC.body||false;};
	_nostlH.sheet=function(){var h=this.doc(),ss=h.getElementsByTagName('style'),e=ss[0]||false;if(e===false){var oe=G(h).createElement({tag:'style'});e=oe.element;oe.attrib('type','text/css').attrib('g-style-sheet','-self');}if(!_(ss.firstChild).is('undefined')){h.insertBefore(e,ss.firstChild);}return G.DOC.styleSheets[0]||false;};
	_nostlH.rules=function(){var s=this.sheet()||false;return (s===false)?false:((typeof s.cssRules=='object')?s.cssRules:s.rules);};
	_nostlH.getKeyOfBrowser=function(n){var o=this,a={},ks=o._browserKeys.split(' '),b=Nat.Browser(),_n='';if(b.firefox===true||b.gecko===true||b.likeGecko===true){_n=ks[1];}if(b.appleWebkit===true||b.chrome===true){_n=ks[0];}if(b.ie===true){_n=ks[2];}if(b.opera===true){_n=ks[3];}_n+=n.ucFirst();return _n;};

	_nostlH.browserKey=function(n,d){var o=this,a={},_n='';_n=o.getKeyOfBrowser(n);a[_n]=d;return a;};
	_nostlH.load=function(){var h=this.doc(),e=G(h).createElement({tag:'link'}),b=GBrowser(),u=arguments[0]||false;e.attrib('type','text/css').attrib('rel','stylesheet').attrib('href',u||'');return e;}; 
	_nostlH.__aSltr=[];
	_nostlH.addSelector=function(){var h=this.doc() ,sh=this.sheet() ,s=arguments[0]||false ,c=arguments[1]||false;
		if(_(s).is('string')&&_(c).is('object')){
			this.__aSltr[s]=this.__aSltr[s]||{css:'',k:0};var db=this.__aSltr[s],_c='',k=db.k;
			G.foreach(c,function(v,n){
				_c+=[n.replace(/([A-Z].*)$/g,"-$1"),':',v,';'].join('');
			});
			if(typeof sh.addRule=='object'){sh.addRule(s,_c);} 
			if(typeof sh.insertRule=='function'){sh.insertRule([s,'{',_c,'}'].join(''),0);}
			db.k++;db.css+=_c;
		}
		return sh;
	};

	_nostlH.updateSelector=function(){var o=this,h=this.doc() ,sh=this.sheet() ,r ,s=arguments[0]||false ,c=arguments[1]||false,rul;r = sh.cssRules || sh.rules;var rul=o.getSelector(s) ,se=rul.selectorText;for(k in c){rul.style[k.replace(/([A-Z].*)$/g,"-$1")]=c[k];} };

	_nostlH.update=function(){var o=this,a=arguments,g=a[0]||false,c=a[1]||{}; if(G.isObject(g||'')&&G.isObject(c||'')){var ob=g.element||false,rx1=(/(.*):(.*);$/g); 

		if(G.isFunction(g.attrib||'')){

			var _c='',rgm=/([A-Z].*)$/g, nc={};

			G.merge(nc,g.element.style);G.merge(nc,c);

			G.foreach(nc, function(r,k){
				var kk=k*1;
				if(G.isString(r) && isNaN(kk) && !rgm.test(k) && k!='cssText'){
					if(!r.isEmpty()){
						if(c[k]){
							_c+=[k,':',c[k],';'].join('');
						}
						else{
							_c+=[k,':',r,';'].join(''); 
						}
					}
				}
				else{
					if(c[k]){
						var kr=k.replace(/([A-Z].*)$/g,"-$1");
						_c+=[kr,':',r.toString(),';'].join(''); 
					}

				}
			});

		g.attrib('style', _c); 

	} } };

	_nostlH.getSelector=function(){var h=this.doc() ,sh=this.sheet(),r ,s=arguments[0]||false;r = sh.cssRules || sh.rules;
		for(n in r){var rul=r[n] ,se=rul.selectorText;
			if(se==s){return rul;break;} 
		} 
	return false;}; 

	_nostlH.package=function(){
		var o=this,a=arguments, e,p=a[0]||false,styl=a[2]||false,u=a[1]||G.domaineName
			,ul=[u,'cssFramework?version=&api=',p, ((G.isString(styl))?['&style=',styl].join(''):'') ].join('');
		o.element=o.load(ul);
		return o;
	}; 

	Nat.cores.style.change=function(sty){
		var o=this,a=o.args,ob=G(a[0])||false,u,cu,nu;
		if(!G.isObject(ob||'')){return false;}
		u=ob.attrib('href')||false;

		if(G.isString(u)){
			nu=[];
			cu=u.split('&');
			G.foreach(cu,function(p){
				var cp=p.split('=');
				if(cp[0].lower()=='style'){cp[1]=sty;}
				nu[nu.length]=cp.join('=');
			});
			ob.attrib('href', nu.join('&'));
		}

		return o;
	}; 



	Nat.merge(_native.Style,_nostlH);
	W.GStyle=Nat.Style; 



	var _noprcH={version:'0.1',objects:[],events:'start restart play pause stop hit done end',moment:{status:true,__callBack:[],callBack:{saver:[],add:function(n,o){this.saver[n]=o;},reboot:function(){var o=this;G(o.saver).foreach(function(v,n,oj){if(typeof v=='object'){if(typeof v.play=='function'){if(v.status=='-pause'){v.play();}}}});}},activate:function(){if(this.status===false){this.status=true;this.callBack.reboot();}},deactivate:function(){this.status=false;},toggle:function(){this.status=!this.status;if(this.status===true){this.callBack.reboot();}}}}; 

	var _noprc=function(){ 
		var o={};
		o.args=arguments;
		o.toString=function(){
			return '[Gougnon AnimatedProcessAPI]';
		};

		o.instance=o.args[0]||false;
		o.keyName=_noprcH.objects.length;
		o.player=function(_o,f,c){
			var o=this; 
			if(typeof _o.to=='number'&&typeof _o.from=='number'&&typeof _o.sens=='boolean'&&typeof _o.level=='number'&&typeof _o.hit=='number'){

				f=typeof f=='function'?f:G.F(); 
				c=typeof c=='function'?c:G.F(); 
				var t=_o.getTimeBehavior(); 

				_o.timeOutCallee = function(){
					var ht=_o.getHitBehavior()*1
						,l=_o.level
						,_l=(_o.sens===true)?l+ht:l-ht
						,stp
						,tim=_o.getTimeBehavior()
						; 
					_l*=1;
					_l=_l.virgule(3);
					stp=((_o.counter+1)>=_o._ht);
					_o.behaviorTime=tim;
					_o.behaviorHit=ht;
					_o.setPurcentListener(_o.counter);

					if(stp===true){_o.level=_o.to;_o.counter=_o._ht;f(_o,l);G(_o._player).clearInt();c(_o,l);}
					else{
						if(_noprcH.moment.status===false&&_o.forge===false&&_o.status.lower()=='-play'){_noprcH.moment.callBack.add(_o.keyName,_o);_o.pause();return false;}
						_o.level=_l;
						f(_o,l);
						_o._player=G(function(){_o.timeOutCallee();}).timeout(tim);
						_o.counter++;
					} 
				};

			_o._player=G(function(){_o.timeOutCallee();}).timeout(t);

			} 
		}; 

		o.init=function(){
		 	var o=this;
		 	o.status=false;
		 	o.cfg=o.instance[0]||{};
		 	o.from=o.from||o.cfg.from||0;
		 	o.to=o.to||o.cfg.to||0;
		 	o.loop=o.loop||o.cfg.loop||false;
		 	o.forge=o.forge||o.cfg.forge||false;
		 	o.tbr=o.tbr||o.cfg.timeBeforeRestarting||10;
		 	o._lrw=1;
		 	o.tbehavior=o.tbehavior||o.cfg.timeBehavior||{};
		 	o.hbehavior=o.hbehavior||o.cfg.hitBehavior||{};
		 	o.timeline=o.timeline||o.cfg.timeline||1;
		 	o.__ons=_noprcH.events.split(' ');
		 	o.callBack={};
		 	o._e=GEvent();
		 	o.event=o._e;
		 	o.behaviorTime=0;
		 	o.ecart=function(){
		 		var o=this;return Math.abs(o.to-o.from);
		 	};
		 	o._ht=(o.timeline>=1000)?100:(o.timeline/10);
		 	o._hti=(o._ht/10);
		 	o._tmln=1;
		 	o.getSens=function(){
		 		var o=this;return o.from<o.to;
		 	};
		 	o._hit=function(){
		 		var o=this;return (o.ecart()/o._ht);
		 	};
		 	o._timeTrame=function(){
		 		var o=this;
		 		return ((o._hit()*o.timeline)/o.ecart()).virgule(1);
		 	};
		 	o.hit=o._hit();
		 	o.timer=o._timeTrame();
		 	o.sens=o.getSens();
		 	o.level=o.from;
		 	o.counter=0;
		 	o.purcent=0;
		 	o.pAsd=[];
		 	o._purcents=function(){var o=this,xk=o._hti,a=[];for(var x=0;x<=100;x++){var xa=Math.floor((x*xk)/10);a[xa]=a[xa]||[];a[xa].push(x);if(!(x in o.pAsd)){o.pAsd[x]=xa;}};return a;};
		 	o.purcents=o._purcents();
		 	o.getPurcent=function(){var o=this;return o.purcents[(typeof arguments[0]=='undefined')?o.counter:arguments[0]]||false;};
		 	o.purcentListener=[];
		 	o.onPurcent=function(l,f){var o=this;o.purcentListener[l]=f;return o;};
		 	o.SPLCBF=false;
		 	o.setPurcentListener=function(c){var o=this,k=(typeof arguments[0]=='undefined')?o.counter:c,a=o.purcents[k]||false,tbl=o.purcentListener;if(a!=false&&tbl.length>0){for(var x=0;x<a.length;x++){var l=a[x];if(l in tbl){o.SPLCBF=tbl[l];if(typeof o.SPLCBF=='function'){o.SPLCBF(l);}}}}};
		 	o.getTimeBehavior=function(){var o=this;return o.timeBehaviors[o.counter];};
		 	o.getHitBehavior=function(){var o=this;return o.hitBehaviors[o.counter];};
		 	o.timeBehaviors=[];
		 	o.hitBehaviors=[];
		 	o.initBehaviors=function(B,I,II,IV){var o=this,k=o.counter,a=[],m=0,xs=0,e=IV,lm=e,lim=B*o._ht;for(var x=0;x<=o._ht;x++){var lim,ax=o.getBehaviorBy(B,I,II,x,'x');a+=' ';a+=(typeof ax=='number')?(ax*1).virgule(0):ax;if(ax=='x'){xs++;}if(ax!='x'){m+=ax;}}var xz=(Math.abs(e-m)/((xs!=0)?xs:1)).virgule(3),r='';r+=a.substr(1).replace(/[x]/gi,xz);return r.split(' ');};
		 	o.initTimeBehaviors=function(B,I,II){var o=this;o.timeBehaviors=o.initBehaviors(o.timer,'tbehavior','_tbehavior',o.timeline);return o;};
		 	o.initHitBehaviors=function(B,I,II){var o=this;o.hitBehaviors=o.initBehaviors(o.hit,'hbehavior','_hbehavior',o.ecart());return o;};
		 	o.getBehaviorBy=function(B,I,II,III,IV){var III=(typeof arguments[3]=='undefined')?false:arguments[3],IV=(typeof arguments[4]=='undefined')?false:arguments[4],o=this,be=o[I]||false,hit=o.callBack[I]||B;if(typeof be=='object'||typeof o.callBack[I]=='number'){var k=o.getPurcent(III),bec=false;for(var x=0;x<k.length;x++){bec=be[k[x]]||false;if(bec!==false){break;}};if(typeof bec=='string'||typeof o.callBack[II]=='number'){var c,b0=bec.trim(),_h,ht=hit,b,p,n,s,h;c=b0.substr(0,1);b=b0.substr(1);p=b.substr(0,1);s=b.substr(-1);n=Math.abs(b.substr(0,b.length-1)*1);n=(typeof n=='number')?n:0;h=0;_h=B;if(!isNaN(n)&&typeof ht=='number'){if(s=='%'){h=(n!==0)?n.cpurcent(ht):ht;}if(s=='x'){h=n;}if(p==='+'){_h+=h;}if(p==='-'){_h-=h;}if(p==='*'){_h*=h;}if(p==='/'){_h/=h;}}if(c=='_'){o.callBack[I]=_h;o.callBack[II]=bec||o.callBack[II];}if(c=='/'){o.callBack[I]+=_h;o.callBack[II]=bec||o.callBack[II];}if(c==('\ ').trim()){o.callBack[I]-=_h;o.callBack[II]=bec||o.callBack[II];}if(c!='_'&&c!='/'&&c!=('\ ').trim()&&typeof o.callBack[I]!='undefined'&&typeof o.callBack[II]!='undefined'){o.callBack[I]=undefined;o.callBack[II]=undefined;}hit=_h;}}return (hit==B)?((IV===false)?hit:IV):hit;};
		 	G(o.__ons).foreach(function(v,n,oj){
		 		var on=['on',v.ucfirst()].join('');o[on]=o[on]||o.cfg[v]||G.F();
		 	});

		 	return o.initTimeBehaviors().initHitBehaviors();
		}; 


	 _noprcH.objects[o.keyName]=o;

	 return Nat.merge(o,Nat.cores.animatedProcess);

	};

	__.proc=Nat.cores.animatedProcess;Nat.AnimatedProcess=function(){return (function(){return _noprc(arguments[0]);})(arguments);}; 

	inj.proc=_injct(__.proc)
	
	._('start',function(){var o=this;o.status='-start';o._e.detect('start',o);o.onStart();o.play();return o;}) 
	
	._('restart',function(){var o=this;o.status='-restart';o._e.detect('restart',o);o.onRestart();G(function(){var lpr=o._lrw,co=o.init().start();co._lrw=lpr+1;}).timeout(o.tbr);}) 
	
	._('pause',function(){var o=this;o.status='-pause'; try{G(o._player).clearInt();}catch(err){} o._e.detect('pause',o);o.onPause(); }) 

	._('stop',function(){
		var o=this;
		o.status='-stop';
		o.level=o.from;
		try{G(o._player).clearInt();}catch(err){} 
		o._e.detect('stop',o);
		o.onStop();
	}) ._('play',function(){var o=this;o.status='-play';o._e.detect('play',o);o.onPlay();o.player(o,function(_o,l){_o.callBack.level=l;_o._e.detect('hit',o);_o.onHit();},function(_o,l){_o._e.detect('done',o);_o.onDone();if(_o.loop!==false){if(typeof _o.loop=='number'||_o.loop===true){if((_o._lrw<_o.loop)||(_o.loop===true)){_o.restart();}if((_o._lrw>=_o.loop)||(_o.loop===true)){_o._e.detect('end',o);_o.onEnd();}}}else{_o._e.detect('end',o);_o.onEnd();}});});
	
	Nat.merge(Nat.AnimatedProcess,_noprcH);W.GAnimatedProcess=_native.AnimatedProcess;



	var _noscrnH={
		version:'0.1'
		,xid:'GougnonJSScreenOffsetX'
		,xoj:false
		,yid:'GougnonJSScreenOffsetY'
		,yoj:false
		,pixelDepth:function(n){return G((typeof n=='number')?n:100).unPurcent(S.pixelDepth);}
		,colorDepth:function(n){return G((typeof n=='number')?n:100).unPurcent(S.colorDepth);}
		,width:function(n){return G((typeof n=='number')?n:100).unPurcent(S.width);}
		,height:function(n){return G((typeof n=='number')?n:100).unPurcent(S.height);}
		,XOffset:function(n){return G((typeof n=='number')?n:100).unPurcent(G.getDocElement().offsetWidth);}
		,YOffset:function(n){return G((typeof n=='number')?n:100).unPurcent(G.getDocElement().offsetHeight);}

		,Offset:function(p){
			var o=this
				,b=typeof arguments[0]=='undefined'
				,n=arguments[1]||false
				,a={width:o.XOffset(n),height:o.YOffset(n)};

				return (b===true)?a:(a[p]||a);
		}
	};

		var _noscrn=function(){var o={};o.screen=GScreen||_noscrnH;o.args=arguments;o.__a=o.args[0]||[];o.instance=G(o.__a[0]||false);o.toString=function(){return '[Gougnon ScreenAPI]';};return Nat.merge(o,Nat.cores.screen);};
		__.scrn=Nat.cores.screen;Nat.Screen=function(){return (function(){return _noscrn(arguments[0]);})(arguments);};


		inj.scrn=_injct(__.scrn)

	._('setCenter',function(){var o=this;if(typeof o.instance.element!='object'){return false;}var eo=o.instance,e=eo.element,w=e.offsetWidth,h=e.offsetHeight,t,l,s=o.screen,c={},p0=arguments[0]||false,a=o.__a[1]||{};t=(s.YOffset(100)).nuspacer(h),l=(s.XOffset(100)).nuspacer(w);t+='px',l+='px';a.x=a['x']||false;a.x=(a.x.toString().lower()=='right')?'right':'left';a.y=a['y']||false;a.y=(a.y.toString().lower()=='bottom')?'bottom':'top';c[a.x]=l;c[a.y]=t;if(typeof p0=='string'){c.position=p0;}eo.css(c);return o;})
	._('alwaysOn',function(x,y){
		if(typeof this.instance.element!='object'){return false;}
		var o=this
			,eo=o.instance
			,sof=o.screen.Offset(false,100)
			,eof=eo.Offset(false,100)
			,a=o.__a[1]||{},xy=a['xy']||[0,0],sur=a['surface']||[sof.width,sof.height],padd=a['padding']||[0,0],_x,_y,_w=eof.width,_h=eof.height,x=typeof arguments[0]=='number'?arguments[0]:0,y=typeof arguments[1]=='number'?arguments[1]:0,lx,ly,c={};a.x=a['x']||'left';a.x=(a.x.lower()=='right')?a.x:'left';a.y=a['y']||'top';a.y=(a.y.lower()=='bottom')?a.y:'top';_x=x+_w;_y=y+_h;xy[0]=xy[0]||0;xy[1]=xy[1]||xy[0]||0;sur[0]=sur[0]||sof.width;sur[1]=sur[1]||sur[0]||sof.height;padd[0]=padd[0]||0;padd[1]=padd[1]||padd[0]||0;lx=xy[0]+sur[0]*1;ly=xy[1]+sur[1]*1;var __x=(xy[0]+x),__y=(xy[1]+y),__xw=__x+_w,__yh=__y+_h;if(_x>lx||__xw>lx){__x=lx-_w-padd[0];}if(_y>ly||__yh>ly){__y=ly-_h-padd[1];}if(__x<xy[0]){__x=xy[0];}if(__y<xy[1]){__y=xy[1];}__x+='px';__y+='px';c[a.x]=__x;c[a.y]=__y;eo.css(c);
	})

	._('coordinate',function(){
		var o=this;
		if(typeof o.instance!='object'){return false;}
		if(typeof o.instance.element!='object'){return false;}
		var oi=o.instance,oe=oi.element,x=0,y=0,ob=oe,of=oi.Offset();
			x=of.left;
			y=of.top;
		while(ob.offsetParent){x+=ob.offsetParent.offsetLeft;y+=ob.offsetParent.offsetTop;if(ob==G('body').node(0).element){break;}else{ob=ob.offsetParent;}}
		o.x=x;o.y=y;
		return o;
	});

	Nat.merge(_native.Screen,_noscrnH);W.GScreen=Nat.Screen;


	var _nomuseH={version:'0.1',DOMWheel:function(){return (GBrowser().firefox===true)?"DOMMouseScroll":"mousewheel";}};
	var _nomuse=function(){var o={};o.static=G.Mouse||Nat.Mouse||_nomuseH;o.args=arguments;o.__a=o.args[0]||[];o.instance=o.__a[0]||false;o.browser=Nat.Browser();o.toString=function(){return '[Gougnon MouseAPI]';};return Nat.merge(o,Nat.cores.mouse);};

	__.muse=Nat.cores.mouse;Nat.Mouse=function(){return (function(){return _nomuse(arguments[0]);})(arguments);};

	inj.mouse=_injct(__.muse)

	._('position',function(){var o=this,oi=o.instance||false;if(typeof oi!='object'){return false;}o.event=oi;o.x=oi.clientX||0;o.y=oi.clientY||0;o._x=oi.pageX||0;o._y=oi.pageY||0;return o;})
	._('wheel',function(){var o=this,oi=o.instance||false,fa=arguments[0]||G.F();if(typeof oi!='object'){return false;}var EVt=GEvent||Nat.Event;o.hote=G(oi);o.callF=fa;EVt(o.hote.prop()).listen(o.static.DOMWheel(),function(e){var dv=e['detail']?e['detail']*(-1):(e['wheelDelta']?e['wheelDelta']:0),u=Math.abs(dv),dvi=120 ,un=(e['detail'])?((u<=3)?dvi:dvi*2):u;o.delta=(e['detail'])?(e.detail*(-1)):((e['wheelDelta'])?e.wheelDelta:false);o._delta=(dv>0)?un:((dv<0)?un*(-1):0);o.event=e;o.callF(e);});return o;})
	;

	Nat.merge(Nat.Mouse,_nomuseH);

	W.GMouse=_native.Mouse;

	var _nomveH={version:'0.1',events:'start move stop',moment:{selected:false}};
	var _nomve=function(){var o={};o.args=arguments;o.__a=o.args[0]||[];o.instance=G(o.__a[0]||false);o.event=Nat.Event();o.toString=function(){return '[Gougnon DragAPI]';};o.evts=_nomveH.events.split(' ');return Nat.merge(o,Nat.cores.move);};
	__.move=Nat.cores.move;

	Nat.Move=function(){return (function(){return _nomve(arguments[0]);})(arguments);};inj.move=_injct(__.move)

		._('init',function(){
			var o=this
				,oi=o.instance||false
				,eo
			;

			if(typeof oi.element!='object'){return false;}

			eo=oi.element;
			o.hote=eo;
			o.ctrllr=GDocument();
			o.cfg=arguments[0]||{};
			o.moving=(o.cfg.moving===true)?true:((typeof o.cfg.moving=='boolean')?o.cfg.moving:true);
			o.droppable=(typeof o.cfg.droppable=='undefined')?true:o.cfg.droppable;
			o.backPosition=o.cfg.backPosition||false;
			o.axe=o.cfg.axe||'x:y';
			o.axe=o.axe.lower();
			o.area=o.cfg.area||false;

			if(typeof o.area=='object'){
				o.area.x='left';
				o.area.y='top';
				o.area.xy=o.area.xy||false;
				o.area.surface=o.area.surface||false;
			}

			G(o.evts).foreach(function(v,n,oj){var on=['on',v.ucfirst()].join('');o[on]=o[on]||o.cfg[v]||G.F();});

			o.mousePosition=function(evt){var o=this;o.mouse=Nat.Mouse(evt).position();o.mouseX=o.mouse.x;o.mouseY=o.mouse.y;return o;};

			o.ini_={};
			o.__draggable=false;
			o.off_=oi.Offset();

			o.dragging=function(el,evt){
				var o=this; o.of_=oi.offset();

				var lk=arguments[2]||[0,0]
					,x0=o.off_.left
					,x1=o.of_.left
					,y0=o.off_.top
					,y1=o.of_.top
					, axeX=o.axe=='x:y'||o.axe=='x'
					, axX=o.axe=='x'
					, axeY=o.axe=='x:y'||o.axe=='y'
					, axY=o.axe=='y'
					;

					o.mousePosition(evt);
					o.x=o._x=x0;
					o.y=o._y=y0;
					o._x+='px';
					o._y+='px';

					if(axeX){
						o.x=o._x=o.mouseX-lk[0];o._x+='px';
					}
					if(axeY){
						o.y=o._y=(o.droppable===true)?o.mouseY:o.mouseY-lk[1];o._y+='px';
					}

					if(o.droppable===true){_nomveH.moment.selected=o;}

					if(o.moving===false){return o;}

					el.draggable=!o.__draggable;

					o.instance.css({left:o._x,top:o._y});

					// if(typeof o.area!='object'){}

					// if(typeof o.area=='object'){
					// 	var x=o.x,y=o.y, x_, y_;

					// 		x_=(axY?x1:o.area.xy[0]||0);
					// 		y_=(axX?y1:o.area.xy[1]||0);

					// 		x-=x_;
					// 		y-=y_;

					// 		x-=(o.x>x)?o.x:x;
					// 		y-=(o.y>y)?o.y:y;
							
					// 		x=(axY?x1:x)
					// 		y=(axX?y1:y)

					// 		console.log(x,y, x_,y_, x1,y1);

					// 		x+='px';
					// 		y+='px';

					// 		Nat.Screen(o.instance,o.area).alwaysOn(x,y);
					// }

				return o;
			};

			eo.draggable=!o.__draggable;
			o.__backPosition=function(x,y,xf,yf){var o=this,fx,xx,yy;xx=xf;xx+='->';xx+=x;xx+=':px';yy=yf;yy+='->';yy+=y;yy+=':px';fx=o.instance.animation({left:{value:xx},top:{value:yy}},{timeline:150});return o;};

			o.mdwn=oi.mousedown(function(evt0){o.NDP=GScreen(eo).coordinate();var el0=this,_DRAG_INSIDE_=true,l,t,l0=o.NDP.x,t0=o.NDP.y;eo.draggable=o.__draggable;o.mousePosition(evt0);
				t=(o.mouseY-t0);
				l=(o.mouseX-l0);
				o.ini_={x:eo.offsetLeft,y:eo.offsetTop,left:eo.offsetLeft,top:eo.offsetTop};
				o.event.detect('start',evt0,o);o.onStart(evt0);

				o.ctrllr.mousemove(function(evt1,e0){
					var el1=this;
					el0.draggable=!o.__draggable;
					o.dragging(el0,evt1,[l,t]);
					o.event.detect('move',evt1,o);
					o.onMove(evt1);
					return false;
				});

				o.ctrllr.mouseup(function(evt2){
					var el2=this;
					o.event.detect('stop',evt2,o);
					o.onStop(evt2);
					if(o.backPosition===true){o.__backPosition(o.ini_.left,o.ini_.top,o.x,o.y);}
					_nomveH.moment.selected=false;
					el0.draggable=false;
					_DRAG_INSIDE_=false;
					o.ctrllr.mousemove(null);
					o.ctrllr.mouseup(null);
					return false;
				});

					return false;
			});
				
				return o;
		});

Nat.merge(Nat.Move,_nomveH);W.GMove=_native.Move;



	var _nodrpH={version:'0.1',events:'start enter leave drop leave'};
	var _nodrp=function(){
		var o={};
		o.args=arguments;
		o.__a=o.args[0]||[];
		o.instance=G(o.__a[0]||false);
		o.event=Nat.Event();
		o.toString=function(){return '[Gougnon DropAPI]';};
		o.evts=_nodrpH.events.split(' ');
		return Nat.merge(o,Nat.cores.drop);
	};

	__.drp=Nat.cores.drop;
	Nat.Drop=function(){return (function(){return _nodrp(arguments[0]);})(arguments);};

	inj.drp=_injct(__.drp)

	._('init',function(){
		var o=this,oi=o.instance||false,oe,ar=arguments[0]||{};if(typeof oi.element!='object'){return false;}oe=oi.element;o.oi=oi;o.oe=oe;o.cfg=ar;o.format=o.format||o.cfg.format||'Text';G(o.evts).foreach(function(v){var _n='on';_n+=v.ucfirst();o[_n]=o[_n]||o.cfg[v]||G.F();});o.__enter=function(ev,src,_o){var o=this,src=src||G(ev).source(),_o=_o||_nomveH.moment.selected||false;if(typeof _o=='object'){if(typeof o.onEnter=='function'){o.onEnter(ev,_o);}}};o.__leave=function(ev,src,_o){var o=this,src=src||G(ev).source(),_o=_o||_nomveH.moment.selected||false;if(typeof _o=='object'){if(typeof o.onLeave=='function'){o.onLeave(ev,_o);}}};o.__over=function(ev,src,_o){var o=this,src=src||G(ev).source(),_o=_o||_nomveH.moment.selected||false;if(typeof _o=='object'){if(typeof o.onOver=='function'){o.onOver(ev,_o);}}};o.__drop=function(ev,src,_o){var o=this,src=src||G(ev).source(),_o=_o||_nomveH.moment.selected||false;if(typeof _o=='object'){if(typeof o.onDrop=='function'){o.onDrop(ev,_o);}}};Nat.Event(oe).listen('mouseenter',function(ev){o.__enter(ev,G(ev).source(),_nomveH.moment.selected||false);},false);Nat.Event(oe).listen('mousemove',function(ev){o.__over(ev,G(ev).source(),_nomveH.moment.selected||false);},false);Nat.Event(oe).listen('mouseleave',function(ev){o.__leave(ev,G(ev).source(),_nomveH.moment.selected||false);},false);Nat.Event(oe).listen('mouseup',function(ev){o.__drop(ev,G(ev).source(),_nomveH.moment.selected||false);},false);Nat.Event(D).listen('mouseup',function(ev){_nomveH.moment.selected=false;},false);var oeev=Nat.Event(oe);oeev.listen('dragstart',function(ev){if(typeof o.onStart=='function'){o.onStart(false,ev);}},false);oeev.listen('dragenter',function(ev){if(typeof o.onEnter=='function'){o.onEnter(false,ev);}},false);oeev.listen('dragover',function(ev){  ev.dataTransfer.dropEffect='move';if(typeof o.onOver=='function'){o.onOver(false,ev);}if(ev.preventDefault){ev.preventDefault();}return false;},false);oeev.listen('dragleave',function(ev){if(typeof o.onLeave=='function'){o.onLeave(false,ev);}},false);oeev.listen('drop',function(ev){if(typeof o.onDrop=='function'){o.onDrop(false,ev);}if(ev.stopPropagation){ev.stopPropagation();}if(ev.preventDefault){ev.preventDefault();}return false;},false);oeev.listen('dragend',function(ev){if(typeof o.onDragend=='function'){o.onDragend(false,ev);}return false;},false);
		return o;
	});

	Nat.merge(Nat.Drop,_nodrp);
	W.GDrop=_native.Drop;



	var _nontcH={version:'0.1',objects:[],events:'run close',ids:'GougnonToastAPI-',_heights:10,_margin:5,_delay:3000,_bubbleInFx:(function(){}),_bubbleOutFx:(function(){}),_slideInFx:(function(){}),_slideOutFx:(function(){})};
	var _nontc=function(){
		var o={};o.args=arguments;o.__a=o.args[0]||[];o.text=o.__a[0]||'';o.event=Nat.Event();o.toString=function(){return '[Gougnon ToastAPI]';};o.evts=_nontcH.events.split(' ');o.key=_nontcH.objects.length;_nontcH.objects[o.key]=o;return Nat.merge(o,Nat.cores.toast);
	};

		__.ntc=Nat.cores.toast;

		Nat.Toast=function(){return (function(){return _nontc(arguments[0]);})(arguments);};

		inj.ntc=_injct(__.ntc)._('bubble',function(){
			var o=this,offs,scr=Nat.Screen.Offset()
				,l
				,ar=arguments[0]||{};
				if(typeof o.boj!='object'){var k=_nontcH.ids;k+='Bubble-';k+=o.key;k+='-Box';o.boj=G(G.DOC.body).createElement({id:k,tag:'div'});}

				o.delay=ar.delay||_nontcH._delay||3000;
				o.onOpen=ar.onOpen||G.F();
				o.onClose=ar.onClose||G.F();
				o.cfg=ar;
				o.close=function(evt){var o=this;_nontcH._heights=Math.abs(_nontcH._heights-(o._Offset.height+_nontcH._margin));_nontcH._bubbleOutFx(o);o.event.detect('close',o,evt);if(typeof o.onClose=='function'){o.onClose(evt);}o.boj.css({display:'none'});o._Offset=o.boj.Offset();G(o.closingTimer).clearOut();return o;};

				o.open=function(){
					var o=this,t=_nontcH._heights;
					o.event.detect('open',o);
					if(typeof o.onOpen=='function'){o.onOpen();}
					o.boj.css({position:'fixed',display:'block'});
					o.boj.cn('gui toast-api bubble');
					o.boj.html(o.text);
					offs=o.boj.Offset();

					l=scr.width.nuspacer(offs.width)-(12*0);
					l+='px';t+='px';
					o.boj.css({position:'fixed',bottom:t,left:l});
					o._Offset=o.boj.Offset();_nontcH._heights+=o._Offset.height+_nontcH._margin;_nontcH._bubbleInFx(o);o.closingTimer=G(function(evt){o.close(evt);}).timeout(o.delay);return o;};

				return o.open();
		})

		._('slide',function(){var o=this,ar=arguments,l,scr=Nat.Screen.Offset();o.cfg=ar[0]||{};o.size=o.cfg.size||Nat.Screen.XOffset(60);o.delay=o.cfg.delay||_nontcH._delay||3000;o.loop=o.cfg.loop||false;o.onOpen=o.cfg.onOpen||G.F();o.onClose=o.cfg.onClose||G.F();if(typeof o.soj!='object'){var k=_nontcH.ids;k+='Slide-';k+=o.key;k+='-box';o.soj=G(G.DOC.body).createElement({id:k,tag:'div'});}if(typeof o.trck!='object'){var k0=o.soj.element.id;k0+='track-';k0+=o.key;k0+='-box';o.trck=G(o.soj.element).createElement({id:k0,tag:'div'});}o.close=function(){var o=this;_nontcH._heights=Math.abs(_nontcH._heights-(o._Offset.height+_nontcH._margin));_nontcH._slideOutFx(o);o.event.detect('close',o);if(typeof o.onClose=='function'){o.onClose();}o.soj.css({display:'none'});o._Offset=o.soj.Offset();o.controller.stop();return o;};o.initAnimatedProcess=function(s,e){var o=this,prc={},ctrllr;prc.loop=o.loop;prc.from=s;prc.to=(-1)*Math.abs(e);prc.timeline=o.delay;prc.hit=function(){var l=this.level;l+='px';o.trck.css({left:l});};prc.end=function(){o.close();};ctrllr=Nat.AnimatedProcess(prc).init();ctrllr.start();o.controller=ctrllr;return o;};o.open=function(){var o=this,sz=o.size,offs,t=_nontcH._heights;sz+='px';o.event.detect('open',o);if(typeof o.onOpen=='function'){o.onOpen();}o.soj.css({position:'fixed',display:'block',overflow:'hidden',width:sz});o.trck.css({position:'absolute',whiteSpace:'nowrap',overflow:'hidden'});o.soj.cn('gui toast-api slide');o.trck.cn('track');o.trck.html(o.text);offs=o.soj.Offset();l=G(scr.width).nuspacer(offs.width)-(12*0);l+='px';t+='px';o.soj.css({position:'fixed',bottom:t,left:l});o._Offset=o.soj.Offset();_nontcH._heights+=o._Offset.height+_nontcH._margin;_nontcH._slideInFx(o);o.initAnimatedProcess(o.size,o.soj.element.scrollWidth+o.size);return o;};return o.open();});Nat.merge(Nat.Toast,_nontcH);

	W.GToast=_native.Toast;


	var _noajxH={version:'0.1',events:'load progress error abort loadend success fail wait',xhrvars:'data mode contentType mime charset headers'};
	var _noajx=function(){var o={};o.args=arguments;o.__a=o.args[0]||[];o.instance=o.__a[0]||false;o.event=Nat.Event();o.toString=function(){return '[Gougnon AjaxAPI]';};o.evts=_noajxH.events.split(' ');return Nat.merge(o,Nat.cores.ajax);};__.ajx=Nat.cores.ajax;Nat.Ajax=function(){return (function(){return _noajx(arguments[0]);})(arguments);};

	inj.ajx=_injct(__.ajx)._('__xhrCD',function(){var o=this;return (function(oo){return (!oo)?((W.XMLHttpRequest)?new XMLHttpRequest():null):new XDomainRequest();})(W.XDomainRequest||false);})._('__xhr',function(){var o=this;return (function(oo){var ieo=function(){try{var x=null;var x=new ActiveXObject("Msxml2.XMLHTTP");}catch(e){var x=new ActiveXObject("Microsoft.XMLHTTP");}return x;};return (oo===false)?((W.ActiveXObject)?ieo():null):new XMLHttpRequest();})(W.XMLHttpRequest||false);})

	._('XHR',function(){var o=this,x=null;o.working=false; o.toString=function(){return '[Gougnon Ajax.XHR.API]';};o.__novars=_noajxH.xhrvars.split(' ');o.cfg=o.instance||{};o.URI=o.URI||o.cfg.URI||o.cfg.uri||false;o.crossDomaine=o.crossDomaine||o.cfg.crossDomaine||false;o.crossDomaine=(typeof o.crossDomaine=='boolean')?o.crossDomaine:false;if(o.URI===false){return false;}G(o.__novars).forEach(function(v,n,oj){o[v]=o[v]||o.cfg[v]||false;});o.mode=[o.mode||'get'].join('').upper();o.contentType=o.contentType||'application/x-www-form-urlencoded';o.mime=o.mime||'text/xml';x=(o.crossDomaine==false)?o.__xhr():o.__xhrCD();if(x==null){return false;}o.xhr=x;o._EL=GEvent(o.xhr);G(o.evts).forEach(function(v,n,oj){var _n='on';_n+=[v].join('').ucfirst();o[_n]=o[_n]||o.cfg[v]||G.F();if(v!=='load'&&v!=='success'&&v!=='fail'){o._EL.listen(v,function(ev){o.resultEvent=ev;o.event.detect(v,o);((typeof o[_n]=='function')?o[_n]():G.F()());},false);}});o._EL.listen('load',function(ev){o.event.detect('load',o);o.onLoad();
		o.resultEvent=ev;
		if(o.xhr.readyState==4&&o.xhr.status==200){
			o.working=false;
			o.event.detect('success',o);((typeof o['onSuccess']=='function')?o.onSuccess():G.F()());
			return false;
		}
		if(o.xhr.readyState==4&&o.xhr.status==404){o.event.detect('fail',o);((typeof o['onFail']=='function')?o.onFail():G.F()());return false;}else{o.event.detect('error',o);((typeof o['onError']=='function')?o.onError():G.F()());}},false);o._EL.listen('progress',function(ev){o.event.detect('progress',o);o.onProgress(ev);},false);o._EL.listen('abort',function(ev){o.event.detect('abort',o);o.onAbort(ev);},false);o.xhr.open(o.mode,o.URI,true);

	o.send=function(){var o=this;
		if(o.xhr.overrideMimeType && o.charset!=false){o.xhr.overrideMimeType([o.mime,';charset=',o.charset].join(''));}

		o.xhr.setRequestHeader('Content-type',[o.contentType,' charset=',((typeof o.charset!='string')?'utf-8':o.charset),';'].join(''));

		if(G.isObject(o.headers||false)){
			G.foreach(o.headers, function(h,n){
				o.xhr.setRequestHeader(n,h);
			});
		}

		o.event.detect('wait',o);o.onWait();
		o.xhr.send(arguments[0]||o.data||null);
		o.working=true;
		return o;
	};

		return o;});Nat.merge(Nat.Ajax,_noajxH);

	W.GAjax=_native.Ajax;


	var _nolckbxH={
			version:'0.1'
			,objects:[]
			,ids:(['Gougnon','LockBox','API'].join('-'))
			,param:{
				min:'position cssSelectorName left top width height'
				,evt:'show lock close'
			}
			,stl:{
				handler:GStyle
				,orign:'div[gui-api="g.lockbox"]'
				,add:function(s,fn,c){
					var o=this,ar=arguments;
					Nat.API.addOn.addSelector(o.orign,ar[0],ar[1],ar[2]);
					return ar.callee;
				}
			}
		};

	var _nolckbx=function(){var o={};o._self=_nolckbxH;o.args=arguments;o.__a=o.args[0]||[];o.hote=G(o.__a[0]||'body');o.cfg=o.__a[1]||{};o.event=Nat.Event();o.toString=function(){return '[Gougnon LockBoxAPI]';};o.callBack={};o.key=o._self.objects.length;o._self.objects[o.key]=o;return Nat.merge(o,Nat.cores.lockbox);};

	__.lockbox=Nat.cores.lockbox;

	Nat.LockBox=function(){return (function(){return _nolckbx(arguments[0]);})(arguments);};

	inj.lockbox=_injct(__.lockbox)

	._('init',function(n,f){var o=this;if(typeof o.hote!='object'){return o;}o.status=false;var ht=o.hote,oe=ht.element,Pv0=ht.css('position')||'',c0={},c1={},c2={},prm=o._self.param.min.split(' '),prme=o._self.param.evt.split(' ');o.cfg=arguments[0]||{};o.name='entry_';o.name+=o.key;G(prm).foreach(function(v,n){o[v]=o[v]||o.cfg[v]||false;});G(prme).foreach(function(v,n){var _n='on';_n+=v.ucfirst();o[_n]=o[_n]||o.cfg[v]||G.F();});o.csssn=o.cssSelectorName||o.name;o.csssn=(typeof o.csssn!='string')?[o.csssn].join(''):o.csssn;o.locked=o.locked||o.cfg['locked']||(((o.cfg['locked']===false)||(o.locked===false))?false:true);o._big=[o._self.ids,oe.id,o.key,'big','box'].join('-');o._lgh=[o._self.ids,oe.id,o.key,'light','box'].join('-');o._bx=[o._self.ids,oe.id,o.key,'write','box'].join('-');o.big=ht.createElement({id:o._big,tag:'div'});o.lgh=o.big.createElement({id:o._lgh,tag:'div'});o.bx=o.big.createElement({id:o._bx,tag:'div'});o._cssbig='big ';o._cssbig+=o.csssn.trim();o._csslgh='light ';o._csslgh+=o.csssn.trim();o._cssbx='box ';o._cssbx+=o.csssn.trim();o._slcbig=o._cssbig.split(' ').join('.');o._slclgh=o._csslgh.split(' ').join('.');o._slcbx=o._cssbx.split(' ').join('.');if(Pv0=='static'){o.callBack.position=Pv0;ht.css({position:'relative'});}

		c1.position=c2.position='absolute !important';
		c0.position=o.position||'absolute';

		c0.left=c1.left=c0.top=c1.top='0px !important';c0.height=c1.height=c0.width=c1.width='100% !important';o.c0=c0;o.c1=c1;o.c2=c2;o.getZIndex=function(){var o=this,ht=o.hote,oe=ht.element,lst=ht.getChildNodesCSS('z-index'),vf=0;G(lst).foreach(function(v,n){var va=v.lower(),vfi=v*1;if(va=='auto'){vf+=2;}if(vfi>vf){vf=vfi;}});return vf+100;};o.callBack.width=o.width;o.callBack.height=o.height; o.__close=function(){var o=this; o.big.animation({opacity:{value:'0.999->0.000',done:function(){ o.bx.html(''); o.big.css({display:'none'}); o.status=false;}} }); }; 

		o.close=function(){var o=this;o.status=false;o.event.detect('close',o); o.hote.removeAttrib('ggn-lockbox-active-api'); o.hote.attrib('ggn-lockbox-api', 'ggn.fx.parent'); o.big.replaceClass('ggn-lockbox-fx-in', 'ggn-lockbox-fx-out'); if(typeof o['onClose']=='function'){if(o.onClose()===false){return o;} } o.__close();return o;};

		return o;
	})

._('_RespectLayout', function(){var o=this,ht=o.hote,off_,scr_, c2={};off_=ht.Offset();scr_=Nat.Screen.Offset();o.width=o.width||(off_.width).cpurcent(80)||200;o.height=o.height||(off_.height).cpurcent(80)||150;var w=o.height, h=o.height;o.width=(o.width<scr_.width)?o.width:((scr_.width<=0)?w:scr_.width);o.height=(o.height<scr_.height)?o.height:((scr_.height<=0)?h:scr_.height);o.top=o.top||(off_.height).nuspacer(o.height);o.left=o.left||(off_.width).nuspacer(o.width);c2.width=o.width;c2.width+='px';c2.height=o.height;c2.height+='px';
	c2.top=o.top;c2.top+='px';c2.left=o.left;c2.left+='px';
	o.bx.css(c2);
})

._('status',false)

._('show',function(){var o=this; if(o.status===true){return o;} var ht=o.hote,oe=ht.element,zi=o.getZIndex();o.big.css({display:'block'});o.c0.zIndex=zi;o.big.cn(o._cssbig);o.lgh.cn(o._csslgh);o.bx.cn(o._cssbx); 

		o.big.ui('api','g.lockbox'); o.lgh.ui('api-lockbox','ultra.light'); o.bx.ui('api-lockbox','ultra.box'); o.slcbg=['div.',o._slcbig,'[gui-api="g.lockbox"]'].join('');o.slclg=['div.',o._slclgh,'[gui-api-lockbox="ultra.light"]'].join('');o.slcbx=['div.',o._slcbx,'[gui-api-lockbox="ultra.box"]'].join(''); o.big.cancelOpacity(); o.big.replaceClass('ggn-lockbox-fx-out','ggn-lockbox-fx-in'); o.hote.removeAttrib('ggn-lockbox-api'); o.hote.attrib('ggn-lockbox-active-api', 'ggn.fx.parent'); o.status=true; Nat.Style.addSelector(o.slcbg,o.c0); Nat.Style.addSelector(o.slclg,o.c1); Nat.Style.addSelector(o.slcbx,o.c2); o.big.addClass('ggn-lockbox'); o.lgh.addClass('ggn-lockbox'); o.bx.addClass('ggn-lockbox'); 
		o._RespectLayout();
		o.status=true;

		if(G.isFunction(G['KeyShot']||false)){
			var ky = GKeyShot(function(){o.close();}).key('ESCAPE');GEvent(document).listen('keypress',function(evt){if(o.locked===false){ky.detect(evt, false);}});
		}

		Nat.Event(window).listen('resize',function(){
			o.top=false;o.left=false;o.width=o.callBack.width||false;o.height=o.callBack.height||false;
			o._RespectLayout();
		});

		o.event.detect('show',o);o.onShow();o.lgh.click(function(){if(o.locked===true){var h=o._self.stl.handler,fx0,fx1,hit,s=1000,e=900;hit=function(){var po=this,l='scale(';l+=po.level/1000;l+=')';o.bx.css(h.browserKey('transform',l));};fx0=GAnimatedProcess({from:s,to:e,timeline:100,hit:hit}).init();fx1=GAnimatedProcess({from:e,to:s,timeline:100,hit:hit}).init();fx0.onDone=function(){fx1.start();};fx0.start();o.event.detect('lock',o);o.onLock();} else{o.close();} });return o;})

._('container',function(){var o=this;return((typeof o.big=='object')?o.big:false);})

._('light',function(){var o=this;return((typeof o.lgh=='object')?o.lgh:false);})

._('content',function(){var o=this;return((typeof o.bx=='object')?o.bx:false);})

._('textContent',function(){var o=this;if(o.content()!==false){var h=arguments[0]||'';o.bx.html(h);}});

Nat.merge(Nat.LockBox,_nolckbxH);W.GLockBox=_native.LockBox;



var _noapiH={
	version:'0.1'
	,APIs:{}
	,constuctors:[]
	,capiv:'name static constructor'
	,Instances:[]
	,Get:function(n){
		var o=this,klss;

		for(var k in o.Instances){
			var ob=o.Instances[k]||'';

			if(Nat.isObject(ob)){

				if(Nat.isString(ob['name']||false) && Nat.isString(n)){
					if(ob.name==n){
						klss=ob; break;
					}
				}
				else{
					if(Nat.isObject(n)){
						if(ob===n){
							klss=ob['name']||k; break;
						}
					}
				}
			}

		}

		return klss;
	}
};

var _noapi=function(){
	var o={};
	o._self=_noapiH;
	o.args=arguments;
	o.__a=o.args[0]||[];
	o.instance=o.__a[0]||false;
	o.toString=function(){return '[Gougnon API.Handler]';};


	o._self.Instances[o._self.Instances.length]=o;
	return Nat.merge(o,Nat.cores.api);
};

__.api=Nat.cores.api;

(function(o,n){
	var ln=n.split(' ');
	for(var x=0;x<ln.length;x++){var lnx=ln[x],olnx=o[lnx]||false;if(typeof olnx=='object'){_noapiH.APIs[lnx]=olnx;}};
})(Nat.cores,_.krnl);

Nat.API=function(){return (function(){return _noapi(arguments[0]);})(arguments);};

inj.api=_injct(__.api)
	._('create',function(){var o=this,cfg=o.instance||false,vrs=_noapiH.capiv.split(' ');cfg=(typeof cfg=='object')?cfg:false;if(cfg===false){return false;}G.foreach(vrs,function(v){o[v]=cfg[v]||false;});o.GName='G';o.GName+=o.name;G.API.APIs[o.name]=G.cores[o.name]={};G[o.name]=function(){return (function(){var _o={},ar=arguments[0]||false;_o.toString=function(){return ['[Gougnon API.',o.name,']'].join('');};_o.arguments=arguments[0]||false;_o.apiName=o.name;_o.apiConstructor=o.constructor;_o.apiConstructor(_o.arguments);return G.merge(_o,G.cores[_o.apiName]);})(arguments);};G.merge(G[o.name],o.static);W[o.GName]=G[o.name];return o;})
	._('method',function(n,f){var o=this,r=o,cr=o._self.APIs[o.name]||false,ar=arguments,d=ar[2]||false;if(typeof cr!='object'){return r;}if(typeof n===false){return r;}if(d==true){r=cr[n];}if(d!=true){cr[n]=f;}return r;})
	._('property',function(n,f){var o=this,nt=G[o.name]||false,a={},ar=arguments,d=ar[2]||false,r=o;if(typeof nt!='function'){return o;}if(typeof n!='string'){return o;}if(d==true){r=a[n];}if(d!=true){a[n]=f;Nat.merge(nt,a);}return r;});

	Nat.merge(Nat.API,_noapiH);W.GAPI=_native.API;



	Nat.merges(G,_native)(Gougnon,G);
	

	
	
	GAction.Handler(Nat.HTMLEventsName);

})(window,document,screen,navigator,{version:'0.1',core:undefined});