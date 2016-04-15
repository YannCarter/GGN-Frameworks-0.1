<?php global $GLANG; ?>/* GougnonJS.Gabarit, version : 0.1, update : 160122#1050, Copyright GOBOU Y. Yannick 2015 */

(function(A,P,I){var API;

	if(!Gougnon.support('nightly 0.1')){alert('La version de GougnonJS n\'est pas compatible avec GGabarit 0.1 ');return false;}

	API=G.API({

		name:'Gabarit'

		,static:{
			
			version:'0.1 nightly, Feb 2016, 160219.0802'
			
			,Status:false
			
			,LetWheelNow:false
			
			,C:0
			
			,Built:[]
			
			,Els:[]
			
			,CallBack:[]

			,UI : { 

				Y : 'direction.y'

				,X : 'direction.x'

				,Loading : {

					Wait : function(lb){

						var bx={};

						bx.ui = G('body').create({cn:'x320-w-min x64-h-min gui flex row center text-x14'})

							, bx.circle = bx.ui.create({cn:'gui loading circle x32 text-color-hover margin-x12'})

							, bx.label = bx.ui.create({cn:''}).append(lb)

						;

						return bx;

					}

				}

				,ShineFlat : {

					IN : function(f,cat,cn,axe){return this.I(f||false,cat||false,cn||false,axe||false,'0%','100%');}

					,OUT : function(f,cat,cn,axe){return this.I(f||false,cat||false,cn||false,axe||false,'100%','0%');}

					,I : function(f,cat,cn,axe,dp,arr){

						var bx={},f=f||G.F(),ax = axe||'y',cn=cn||'primary',cs='gui gui-transition _w10 pos-absolute bg-', c=cs, d=cs,l=cs, cat=cat||150, dp=dp||'0%', arr=arr||'100%';

						c+=cn;

						d+=cn; d+='-d';

						l+=cn; l+='-l';

						bx.ui = G('body').create({cn:'gui _w10 _h10 pos-relative'})

							bx.c0 = bx.ui.create({cn:l}).css({'height':dp,'z-index':'1'})

							bx.c1 = bx.ui.create({cn:c}).css({'height':dp,'z-index':'2'})

							bx.c2 = bx.ui.create({cn:d}).css({'height':dp,'z-index':'3'})

						;

						bx.trigger = function(){

							var _o = this;

							G(function(){

								bx.c0.css({height:arr});

								G(function(){

									bx.c1.css({height:arr});

									G(function(){

										bx.c2.css({height:arr});

										G(function(){

											if(isFunc(f)){f(_o);}

										}).timeout(cat);

									}).timeout(cat);

								}).timeout(cat);

							}).timeout(100);

						};

						return bx;

					}

				}

			}
			
			,Attr:function(ge,n){return ge.attrib(n);}

			, Last : {}


			,Date : {

				Label : function(t){

					var o = this

						,D = new Date()

						,Dt = ''

						,_D = new Date()

						,_ct = _D.getTime()

						,doy = _D.dayOfYear().floor()

						,_t = doy -  _D.HtS

						,_hr = _t -  _D.HtS

						,_tf = doy

						, Dn = ''

					;


					D.setTime(t);

					Dn += D._dayName[D.getDay()]||''

					Dn += ' ';

					Dn += (D.getMonth()*1+1).zeroBefore(2);

					Dn += '/';

					Dn += (D.getFullYear()).zeroBefore(2);

					Dt += (_t < t && t <= _tf) ? D._labelToDay : ( (_hr < t && t <= _t) ? D._labelYesterDay : Dn);

					Dt += ' ';

					Dt += ', ';

					Dt += (D.getHours()*1+1).zeroBefore(2);

					Dt += ':';

					Dt += (D.getMinutes()).zeroBefore(2);
					
					Dt += ':';

					Dt += (D.getSeconds()).zeroBefore(2);


					return Dt;

				}

			}

			,Scroll : {

				doc : function(){ return G.getDocElement(); }


				,Slide : function(n,d){

					var o=this
						
						,d=d||y
						
						,scr= (d == G.Gabarit.UI.Y) ? 'scrollTop': 'scrollLeft'
						
						,s=o.doc()[scr]

					;

					var AMP = G.AMP({

						from : s

						,to : n

						,timeline : 256

						,hit : function(){

							o.doc()[scr] = this.level;

						}

					}).init().start();

				}

			}

			,Toggle:{

				Handler:function(e){

				var o=G.Gabarit, ge=G(e)

					tgs=o.Attr(ge,'gabarit-toggle')

					// ,tgcst=(o.Attr(ge,'toggle-copy-size-to')||'').split(',')
			
					,frms=o.Attr(ge,'toggle-from')||'close'
			
					,tos=o.Attr(ge,'toggle-to')||'open'
			
					,its=(o.Attr(ge,'toggle-in-timeout')||'').split(',')
			
					,ots=(o.Attr(ge,'toggle-out-timeout')||'').split(',')
			
					,tmrs=(o.Attr(ge,'toggle-timer')||'').split(',')
			
					ct=0
			
					;

				if(isString(tgs) && isString(frms) && isString(tos)){

					G.foreach(tgs.split(','), function(tg,k){

						if(!isString(tg)){return false;}

						var bx=G(tg.trim()), sta,it,ot,tmr=tmrs[k]||tmrs[0]||1 ;


						G(function(){

							if(isObject(bx)){
								it=its[k]||its[0]||false;
								ot=ots[k]||ots[0]||false;
								sta=bx.attrib('gabarit-toggle-status'),ds=bx.css('display')||'block';
								sta=(sta=='true') ? true : false;

								if(sta==true){
									G.foreach(frms.split(','), function(frm){bx.addClass(frm);},false,false,'.');
									o.Ex(function(o){G.foreach(tos.split(','), function(to){bx.removeClass(to);},false,false,'.');},o,ot);
								}

								if(sta==false){
									G.foreach(frms.split(','), function(frm){bx.removeClass(frm);},false,false,'.');
									o.Ex(function(){G.foreach(tos.split(','), function(to){bx.addClass(to);},false,false,'.');},o,it);
								}

								bx.attrib('gabarit-toggle-status', (!sta).toString() );
								GEvent(e).prevent(true);
							}

						}).timeout(tmr+ct);

						ct+=tmr*1;

					});

				}

				}

			}

			,Input:{

				Handler:function(e){
			
					var ge=G(e), o=G.Gabarit
			
						,tgs=o.Attr(ge,'gabarit-focus')
			
						,fns=(o.Attr(ge,'focus-class')||'focus').split(',')
			
						,ft=o.Attr(ge,'focus-timeout')||false
			
						,bt=o.Attr(ge,'blur-timeout')||100
			
					;

					G.foreach(tgs.split(','),function(tg,kg){

						if(isString(tg)){
			
							var bx=G(tg);
			
							if(isObject(bx)){

								var fss = fns[kg]||fns[0]||'focus';

								G.foreach(fss.split(','),function(fn){

									o.Ex(function(){bx.addClass(fn);},o,ft);

								},false,false,'.');

							}

						}

					},false,false,'.');

					var fnc = function(){

						G.foreach(tgs.split(','),function(tg,kg){

						if(isString(tg)){

							var bx=G(tg);

							if(isObject(bx)){

								var fss = fns[kg]||fns[0]||'focus';

								G.foreach(fss.split(','),function(fn){

									o.Ex(function(){bx.removeClass(fn);},false,bt); 

								},false,false,'.');

							}
						}
						},false,false,'.');

						GEvent(ge).removeListener('blur',fnc); 
						
					};

					GEvent(ge).listen('blur',fnc); 
					

				}

			}


			, Form:{

				CheckBox:{

					Handler:function(e){

						var ge=G(e), o=G.Gabarit
				
							,fml=o.Attr(ge,'checkbox-set-scope')||''

							,on=o.Attr(ge,'checkbox-on')||'tout décocher'

							,onc=o.Attr(ge,'checkbox-active-class')||'active'

							,off=o.Attr(ge,'checkbox-off')||'tout cocher'

							,f=G(ge.form)

							,sT=f.data('gabarit-checkbox-status')||'false'

							,els, ln='[checkbox-scope~="'

						;

						sT = sT=='true' ? true: false;

						ln+=fml; ln+='"]';

						els=f.child(ln)


						G.foreach(els,function(inp){

							inp.checked = !sT;

						},false,false,{});
						

						if(sT===true){ge.value = off; ge.removeClass(onc);}

						if(sT!==true){ge.value = on; ge.addClass(onc);}

						f.data('gabarit-checkbox-status', (!sT).toString() );

					}

				}


				, TextArea:{

					Flexible:{

						Handler : function(e){

							var ge=G(e)

								,min,max,of,h,sh, val,hf

							;

							if(isObj(e)){

								min=ge.css('min-height').stripAlphaChar()*1;

								max=ge.css('max-height').stripAlphaChar()*1;

								of = ge.offset();

								h = of.height;

								val = ge.value;

								hf = '';

								sh = of.scrollHeight;

								if(sh>h && sh>min && sh<max){

									hf+=sh; hf+='px';

									ge.css({'height':hf});

								}

								else{

									if(sh>max){
										ge.css({'overflow-y':'auto !important'});
									}

									if(val.isEmpty()){

										hf+=min; hf+='px';

										ge.css({'height':hf});

									}

								}

							}

						}
					}

				}


			}


			,Ajax:{

				Target:false

				,Capture:false

				,ActiveHistory:false

				,CallBack:false

				,DefaultTitle:false

				,Events : false

				,host:'<?php echo HTTP_HOST; ?>'

				,Handler : function(e){

					var ge=G(e), o=G.Gabarit, o_=this

						,hrf=o.Attr(ge,'href')||o.Attr(ge,'ajax-href')||false

						,cap=o.Attr(e,'ajax-capture')||o_.Capture||false

						,his=o.Attr(ge,'ajax-history')||o_.ActiveHistory||false

						,tarid=o.Attr(ge,'ajax-target')||o_.Target||false

						,tar

						,cb=o.Attr(ge,'ajax-callback')||o_.CallBack||false

						,dat=o.Attr(ge,'ajax-data')||null

					;

					o_.Events.detect('handler', o_);

					if(cap){

						o_.Events.detect('capture', o_);

						tar = G(tarid);

						o_.Jx(hrf,dat,tar,cb,his,tarid,false,ge);

						return false;

					}


					location.href = hrf;

				}

				, Init : function(){

					var o=this
				
						,l=location.href
				
						,ex = l.split('?')
				
						,g=ex[1]||null

						,cc={}

						,t = G.D.title
						
					;

					o.Events = GEvent(o);


					GEvent(A).listen('popstate',function(e){

						var s = e.state;

						o.Events.detect('popstate',e);

						if(s){

							o.Jx(s.hrf, s.data, G(s.target), s.callback, s.his, s.target, true, false);

						}

						else{

							location.href = location.href;

						}


					});

				}

				, Jx : function(hrf,dat,tar,cb,his,tarid,noPut,ge){

					var o=this;

					o.Events.detect('wait', this);

					var noPut=noPut||false, jxs=G.Ajax({

						URI:hrf

						,data:dat

						, headers : {'X-Requested-Width':'XMLHttpRequest' }

						,success:function(){

							var xhr = this.xhr, ttl;

							res=xhr.responseText;

							o.Events.detect('success', xhr, ge);
							
							if(isObj(tar)){

								o.Events.detect('change', xhr, ge, hrf, this);

								tar.html(res).execScript();

								ttl = G.Gabarit.Ajax.DefaultTitle||"<?php echo \_native::varn('SITENAME'); ?>";

								G.D.title = ttl;

							}
							
							if(isFunc(cb)){

								o.Events.detect('callback', xhr, ge);

								o.exec(['',cb, '("',res.addSlashes(),'");'].join(''));

							}

							if(his&&!noPut){

								var cc = {};

									cc.target = tarid;

									cc.data = dat;

									cc.callback = cb;

									cc.his = his;

									cc.hrf = hrf;

									cc.ttl = ttl||"<?php echo \_native::varn('SITENAME'); ?>";

								o.Events.detect('put.history', xhr, ge);

								history.pushState(cc, ttl, hrf);

							}
							

						}
						
						,fail:function(ev){

							o.Events.detect('fail', ev, this);

							GToast("Impossible de retrouver la page demandée !").error();

						}
						
						,error:function(ev){

							o.Events.detect('error', ev, this);

							GToast("Erreur lors du chargement de la page").warning();

						}

						,loadend:function(ev){

							o.Events.detect('wait.end', ev, this);

						}

					}).XHR();


					jxs.send();


				}


			}

		}

		,constructor:function(){
		
			var o=this;
		
				o.args = arguments[0]||[];
		
				o.Box = o.args[0]||[];
		
				o.event = G.Event(o);
		
		}

	}).create();


	API.static('Launch', function(){

		var o=this;

			o.dyn = G.Gabarit;
			
			o.Ajax.Init();

			GAction('handler:Gabarit.Form.TextArea.Flexible').listen('keyup',function(e){

				o.Form.TextArea.Flexible.Handler(e);

			});

			GAction('handler:Gabarit.Input.Focus').listen('focus',function(e){
				
				o.Input.Handler(e);

			});

			GAction('handler:Gabarit.Toggle').listen('click',function(e,ev){

				if(GEvent(ev).isLeftClick()){o.Toggle.Handler(e);}

			});

			GAction('handler:Gabarit.Form.CheckBox').listen('click',function(e,ev){

				if(GEvent(ev).isLeftClick()){o.Form.CheckBox.Handler(e);}

			});

			GAction('handler:Gabarit.Ajax').listen('click',function(e,ev){

				if(GEvent(ev).isLeftClick()){o.Ajax.Handler(e);}

			});


		return o;
	})


	.static('Ex', function(f){
		var o=this
	
			, ar=arguments
	
			, a=ar[1]||o
	
			, t=ar[2]||10
	
		;

		if(isFunction(f||'')){
	
			G(function(){
	
				f(a);
	
			}).timeout(isNaN(t*1)?10:t*1);
	
		}

		return o;
	});


	;


	return GGabarit;

})(window,document,navigator).Launch();
