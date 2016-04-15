<?php global $_Gougnon; ?> /* GougnonJS.Subscribe, version : 0.1, update : 140624#1153, Copyright GOBOU Y. Yannick 2014 */
(function(A,P,I){var API;

	if(!Gougnon.support('nightly 0.1')){
		alert('La version de GougnonJS n\'est pas compatible avec Subscribe 0.1 ');
		return false;
	}



	API=G.API({
		name:'Subscribe'
		,static:{
			version:'0.1'
			,events:'submit wait done success load loadend fail error fieldError'
			,varsinit:'host redirect captcha'
			,getter:{version:'0.1'
				,userstrader:'createusers?mod=manager.robot.62'
			}
			,init:{version:'0.1'
				,firstname:{min:<?php echo _native::varn('USER_FIRSTNAME_LENGTH_MIN'); ?>, max:<?php echo _native::varn('USER_FIRSTNAME_LENGTH_MAX'); ?>}
				,lastname:{min:<?php echo _native::varn('USER_LASTNAME_LENGTH_MIN'); ?>, max:<?php echo _native::varn('USER_LASTNAME_LENGTH_MAX'); ?>}
				,username:{min:<?php echo _native::varn('LOGIN_USERNAME_LENGTH_MIN'); ?>, max:<?php echo _native::varn('LOGIN_USERNAME_LENGTH_MAX'); ?>}
				,password:{min:<?php echo _native::varn('LOGIN_PASSWORD_LENGTH_MIN'); ?>, max:<?php echo _native::varn('LOGIN_PASSWORD_LENGTH_MAX'); ?>}
				,birthyear:{min:<?php echo date('Y') - _native::varn('USER_BIRTHYEAR_REQUIRE'); ?>, max:<?php echo date('Y') - _native::varn('USER_BIRTHYEAR_REQUIRE_MAX'); ?>, year:<?php echo _native::varn('USER_BIRTHYEAR_REQUIRE'); ?>}
			}
		}
		,constructor:function(){
			var o=this;
			o.STC=o.STATIC;
			o.instance=o.ARGS[0]||false;
			o.hote=G(o.instance)||false;
			o.event=G.Event(o);
			o.callBack={};
			o.validates={};
		}
	}).create();



	API.dynamic('fieldError', function(){var o=this;
		o.captchaRefresh();
		o.onFieldError();
		o.event.detect('fieldError',[o]);
	});




	API.dynamic('errorManagerNoticeRemoveError', function(n){var o=this;
		if(typeof o.elements[n]=='object'){
			var e=G(o.elements[n]),ntc=G(['#notice',n].join('-'));
			if(typeof e.removeClass=='function'){e.removeClass('error');}
			if(typeof ntc=='object'){ntc.removeClass('error');}
		}
	});





	API.dynamic('CaptchaKey', 0);
	API.dynamic('captchaRefresh', function(){var o=this;
		var s=[o.host,"captcha?name="
				,o.captcha.name,"&textcolor=%23"
				,o.captcha.textcolor,"&bgcolor=%23"
				,o.captcha.bgcolor,"&refeshKey="
				,o.CaptchaKey
			].join("");
		o.captcha.box.element.src=s;
		o.captcha.box.css({display:'block'});
		o.CaptchaKey++;
	});

	API.dynamic('initCaptcha', function(){var o=this;
		o.captcha = o.captcha||{};
		o.captcha.controller = o.captcha.controller||false;
		o.captcha.box = o.captcha.box||false;
		o.captcha.name = o.captcha.name||'';
		o.captcha.textcolor = o.captcha.textcolor||'';
		o.captcha.bgcolor = o.captcha.bgcolor||'';

		if(typeof o.captcha['box']=='object'){
			o.captchaRefresh();
		}


		if(typeof o.captcha['controller']=='object'){
			o.captcha.controller.click(function(){
				o.captchaRefresh();
			});
		}
	});




	API.dynamic('errorManagerNotice', function(n,txt){var o=this;

		if(typeof o.elements[n]=='object'){
			var e=G(o.elements[n]),ntc=G(['#notice',n].join('-'));
			o.errorManagerNoticeRemoveError(n);
			

			if(typeof e.addClass=='function'){
				e.addClass('error');
			}

			if(typeof ntc=='object'){ntc.addClass('error');ntc.html(txt);}
			if(typeof e.focus=='function'){
				e.focus(function(){
					o.errorManagerNoticeRemoveError(n);
				});
			}

		}
	});



	API.dynamic('subscribeNotice', function(txt){var o=this,a=arguments,note=G([o.instance,'submit-notice'].join('-'))||false,cls=a[1]||false;
		if(typeof note=='object'){
			note.cn('notice');
			if(typeof cls=='string'){note.addClass(cls);}
			note.html(txt);
		}
	});



	API.dynamic('lockElements', function(){var o=this,a=arguments,els=o.elements;
		G.foreach(els,function(v){v.setAttribute('disabled','true');},false,false,{});
	});


	API.dynamic('unlockElements', function(){var o=this,a=arguments,els=o.elements;
		G.foreach(els,function(v){v.removeAttribute('disabled');},false,false,{});
	});




	API.dynamic('setup', function(){var o=this;
		if(typeof o.hote!='object'){return false;}
		if(typeof o.hote["element"]!="object"){GToast("Impossible de retrouver le formulaire").bubble();return false;}
		o.elements=[];

		G.foreach(o.hote.element.elements, function(v){
			if(typeof v!='object'){return false;}
			if(typeof v['name']!='string'){return false;}
			if(typeof v['type']!='string'){return false;}
			o.elements[v.name] = v;
		});

		var varsinit=o.STC.varsinit.split(' '),events=o.STC.events.split(' ');
		o.cfg=arguments[0]||{};

		o.form=o.hote;
		G.foreach(events,function(v){var _n='on';_n+=v.ucfirst();o[_n]=o[_n]||o.cfg[v]||G.F();});
		G(varsinit).foreach(function(v){o[v]=o[v]||o.cfg[v]||false;});
		G.foreach(o.elements,function(v){
			var n=v.name,vt=v.type.toString().lower(),vn=v.tagName.lower();
			if(vt=='text'||vt=='password'){
				v.onblur=function(){o.errorManager(this,n);};
			}
			else{
				if(vn=='select'){
					v.onchange=function(){o.errorManagerNoticeRemoveError(n);o.errorManager(this,n);};
				}
			}
		});

		o.host=(typeof o.host=='string')?o.host: '<?php echo HTTP_HOST; ?>';

		o.initCaptcha();
		o.unlockElements();
		o.hote.submit(function(){var f=this,els=f.elements,ov=0,ovi=0;

			G(els).foreach(function(v){
				var n=v['name']||false,typ=v['type']||false,vald;

				if(n!=false&&typ!=false){o.errorManager(v,n);ov++;
 					vald=o.validates[n]||false;
					if(vald===true){ovi++;}
				}
				
			});


			if(ovi!=ov){
				o.subscribeNotice('Formulaire incomplet','error');
				return false;
			}


			o.lockElements();
			o.subscribeNotice('Traitement...','wait');


			
			o.URLTrader = [o.host,o.STC.getter.userstrader].join('');
			o.ajax=GAjax({URI:o.URLTrader,crossDomaine:false,mode:'POST'}).XHR();

			if(o.ajax==false){
				o.event.detect('error',[o,'-ajax.object.failed']);
				if(typeof o.onError=='function'){o.onError('-ajax.object.failed');}
				return false;
			}


			if(o.ajax!=false){
				o.event.detect('wait',[o]);
				if(typeof o.onWait=='function'){o.onWait();}

				// alert('stop'); return false;

				o.ajax.onSuccess=function(ev){ var res=this.xhr.responseText.lower().trim().split(':'),r=res[0]||false,at=res[1]||false;

					// alert(['result : ',this.xhr.responseText].join('\n=====================\n'));

					if(r=='-add.success'){
						o.lockElements();
						o.userLevel=at;
						o.event.detect('success',[o,ev]);
						if(typeof o.onSuccess=='function'){o.onSuccess(ev);}
					}
					else{
						o.captchaRefresh();
						o.event.detect('error',[o,r,ev]);
						if(typeof o.onError=='function'){o.onError(r,ev);}
					}

				};

				o.ajax.onFail=function(ev){
					o.event.detect('fail',[o,ev]);
					if(typeof o.onFail=='function'){o.onFail(ev);}
				};

				o.ajax.onLoad=function(ev){
					o.subscribeNotice('');
					o.unlockElements();
					o.event.detect('load',[o,ev]);
					if(typeof o.onLoad=='function'){o.onLoad(ev);}
				};

				o.ajax.onLoadend=function(ev){
					o.event.detect('loadend',[o,ev]);
					if(typeof o.onLoadend=='function'){o.onLoadend(ev);}
				};

				o.ajax.onError=function(ev){
					var r='-ajax.error';
					o.event.detect('error',[o,r,ev]);
					if(typeof o.onError=='function'){o.onError(r,ev);}
				};

				o.ajax.data=o.hote.stringToSend();

				o.ajax.send();
			}



			return false;
		});

	
		return o;
	});

	

	// alert('Subscribe.Handler')


})(window,screen,navigator);