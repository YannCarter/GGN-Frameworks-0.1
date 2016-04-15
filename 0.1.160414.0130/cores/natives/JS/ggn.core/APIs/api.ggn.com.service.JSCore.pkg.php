/* GougnonJS.COM.Service, version : 0.1, update : 151201#1835, Copyright GOBOU Y. Yannick 2014 */
(function(A,P,I){var API;

if(!Gougnon.support('nightly 0.1.150527')){alert('La version de GougnonJS n\'est pas compatible avec COMService 0.1.150527'); return false; }

if(!isFunction(G.COM||null)){GScript.package('ggn.com.initialize');}

GScript.check('G.COM', function(){

	API=G.API({

		name:'COMService'

		,static:{

			version:'0.1'

			,Pkg:'ggn.com.service'

			,Host:'<?php echo HTTP_HOST; ?>'

			,XHRVars:[GAjax.xhrvars,''].join('')

			,EventsVar:GAjax.events

			,Toast:false

			, fURL : function(url){

				var sl = url.toString().substr(-1), u = url;

				u+=sl=='/' ? '' : '/'

				return u;

			}

		}

		,constructor:function(){

			var o=this;

			o.Stc=o.STATIC;

			o.args=arguments[0]||[];

			o.name=o.args[0]||false;

			o.event=G.Event(o);

			o.ajax=false;

		}

	}).create();

	

	API.dynamic('Init', function(){var o=this,a=arguments,Opt=a[0]||{};

		Opt.Title=Opt.Title||'GGN COM SERVICE';
		
		o.Path='com.services/';

		o.Path+=o.name;

		o.Path+='/';

		o.Opt=Opt;

		o.Opt.HideError = o.Opt.HideError || false;
		
		return o;

	});
	

	API.dynamic('Open', function(u,xh,dmn,gt){var o=this,a=arguments,u=u||'',xh=xh||{},dmn=dmn||false,xr={};
		
		G.foreach(o.Stc.XHRVars.split(' '), function(v){o[v]=xh[v]||false;xr[v]=xh[v]||false;},false,false,'.');

		xh.sData = xh.sData||false;
		
		G.foreach(o.Stc.EventsVar.split(' '), function(v){var n='On';n+=v.ucFirst();o[n]=xh[v]||o[n]||G.F();xr[v]=xh[v]||o[n]||G.F();},false,false,'.');


		xr.URI=o.Stc.fURL(dmn||o.Stc.Host);

		xr.URI+=o.Path;

		xr.URI+=u;
		
		xr.mode='POST';

		xr.crossDomaine=true;

		o.type=((isString(o.type)?o.type:false)||'-normal').lower();

		xr.success=function(evt){var o1=this,xhr=this.xhr, r=xhr.responseText, h='';

			// alert(r);
			// console.log(r);

			try{
				var obj=JSON.parse(r);

				if(isObject(obj)){

					var res=obj.response;

					if(res=='require.login'){

						h+=('Vous devez être connecté pour acceder à ce service');

						location.href = ['<?php echo _native::setvar(_native::varn("LOGIN_PAGE")) . "?next=',escape(location.href),'"; ?>'].join('');

					}

					else if(res=='data.not.found'){h+=('Aucune donnée détecté pour traitement');}

					else if(res=='query.fail'){h+=('Echec lors de l\'execution de la requette');}

				}

				else{

					h+=('Le retour du service n\'est pas valide');
					
				}

				o1.OnSuccess=o.OnSuccess;o1.OnSuccess(obj,evt);
				
			}

			catch(e){

				console.log(e);

				h+=('Une erreur a été detecté lors de l\'ouverture du service');

			}

			if(!h.isEmpty() && o.Opt.HideError===false){
				o.Stc.Toast = GToast(h).bubble();
			}

		};

		xr.fail=function(){var o1=this;

			if(o.Opt.HideError===false){

				if(o.Stc.Toast){o.Stc.Toast.close();}

				o.Stc.Toast = GToast('Service introuvable').bubble();

			}

			o1.OnFail=o.OnFail;o1.OnFail();

		};

		xr.error=function(){var o1=this;

			if(o.Opt.HideError===false){

				if(o.Stc.Toast){o.Stc.Toast.close();}

				o.Stc.Toast = GToast('Erreur lors du chargement du service').bubble();

			}

			o1.OnError=o.OnError;o1.OnError();

		};


		var jx=GAjax(xr).XHR().send(xh.sData);

		o.ajax = jx;
		
		return o;
	});


	GCOM.Service = G.COMService;
});


})(window,screen,navigator);