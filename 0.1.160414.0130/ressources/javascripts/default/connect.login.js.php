/* G.Login Suite for Thème, Copyright GOBOU Y. Yannick 2014 */<?php global $_Gougnon; ?>

var GLoginSuite=function(Lgn){


	if(typeof Lgn!=='object'){
		GToast('Erreur Variable Système introuvable').bubble();
		return false;
	}

	var sheet=G('body')
		,waitBox=G('#login-wait-box')
		,submitBox=G('#login-submit-box')
		// ,response=G(G.DOC.body).createElement({id:['Gougnon','Login','Responses','pad'].join('--'),tag:'div'})
		,responses=function(txt){
			Lgn.waitOut();Lgn.unlockElements();
			Lgn.LSh.awk.onClose=function(){var f=Lgn.form||{};
				if(typeof Lgn.lastFocus=='object'){
					if(typeof Lgn.lastFocus.focus=='function'){
						Lgn.lastFocus.focus();
					}
				}
			};
			Lgn.LSh.message('<?php echo _native::varn("SITENAME"); ?>',['<div class="alert-mini">',txt,'</div>'].join('') );

		};



	Lgn.lastFocus=false;
	Lgn.username.onfocus=function(){Lgn.lastFocus=this;};
	// Lgn.username.onblur=function(){Lgn.lastFocus=false;};

	Lgn.password.onfocus=function(){Lgn.lastFocus=this;};
	// Lgn.password.onblur=function(){Lgn.lastFocus=false;};


	Lgn.LSh=GAwakeConfirm(
		'Confirm.Box'
		,{
			hote:sheet
			,locked:true
			,width:480
			,height:256
		}
	);


	Lgn.lockElements=function(){var o=this,a=arguments,els=o.form.elements;
		G.foreach(els,function(v){
			if(typeof v!='object'){return false;}
			v.setAttribute('disabled','true');
		},false,false,{});
	};

	Lgn.unlockElements=function(){var o=this,a=arguments,els=o.form.elements;
		G.foreach(els,function(v){
			if(typeof v!='object'){return false;}
			v.removeAttribute('disabled');
		},false,false,{});
	};

	/* Détection : Submit */
	Lgn.onSubmit=function(){var o=this;
		o.lockElements();

	};

	/* Wait */
	Lgn.waitIn=function(){
		submitBox.attrib('disabled','disabled');
		waitBox.css({display:'block'});
	};

	Lgn.waitOut=function(){
		submitBox.removeAttrib('disabled');
		waitBox.css({display:'none'});
	};

	/* Détection : Wait */
	Lgn.onWait=function(){
		this.waitIn();
	};

	/* Détection : URL Fail */
	Lgn.onFail=function(){
		responses('Impossible d\'atteindre la page de traitement');
	};

	/* Détection : USER success */
	Lgn.onSuccess=function(){var o=this,h=''
		,prev=(typeof o.previous=='object')?o.previous:{value:false}
		,next=(typeof o.next=='object')?o.next:{}
		,redir=(typeof o.redirect=='object')?o.redirect:{value:false};


		var h0 = ''
			,p=((prev!==false)?{label:'Retour',click:function(){location.href = prev.value||G.domaineName; } }:false)
			,n=((next!==false)?{label:'Continuer',click:function(){location.href = next.value||G.domaineName; }, focus:true}:false)
			, isJs = (next.value||'').toString().substr(0, 11) == 'javascript:'
			;

			if(isJs){


				location.href = next.value||G.domaineName;

			}

			if(!isJs){

				h0+='<div class="alert x320-w-min">Vous êtes maintenant connectés</div>';

				Lgn.LSh.awk.onClose=G.F();

				Lgn.LSh.message('<?php echo _native::varn("SITENAME"); ?>',h0,{
					prev:p
					,redir:{label:redir['name']||'',click:function(){location.href = redir.url; }, focus:true}
					,next:n
				});

			}


	};

	/* Détection : Erreur */
	Lgn.onError=function(id){
		var o=this,$id=id.trim()
		,txt=false;

		try{

			if($id=='attempt.failed' || $id=='attempt.login.failed'){
				txt='La tentative de connexion à echoué';
			}
			
			G.foreach(['username','password'], function(v,n){
				if(txt!==false){return false;}
				var err=GLogin.error[v]||false,ns=v.substr(0,4);

				if(typeof err=='object'){
					if($id==err.objectFailed){txt=['Impossible de retrouver l\'object du ',(o[ns].label||'').lower(),'.'].join('');return false;}
					if($id==err.empty){txt=['Le ',(o[ns].label||'').lower(),' ne doit pas être vide.'].join('');}
					if($id==err.min){var mn=o[ns].min;
						txt=['Le ',(o[ns].label||'').lower(),' doit compter au miminum '].join(''); txt+=mn; txt+=' caractère'; txt+=(mn>1)?'s':'';
						return false;
					}
					if($id==err.max){var mx=o[ns].max;
						txt=['Le ',(o[ns].label||'').lower(),' doit compter au maximum '].join(''); txt+=mx; txt+=' caractère'; txt+=(mx>1)?'s':''; 
						return false;
					}
				}
				else{
					txt='Erreur : variable "ERROR" introuvable';
				}


			},false,false,'.');

			if($id=='-user.not.activated'){
				txt='Vous devez activer votre compte pour continuer';
			}

			if($id=='-any.responses'){
				txt='Aucune réponse trouvée suite à votre requête d\'authentication';
			}

			if($id=='-username.not.found'||$id=='-password.not.found'||$id=='-user.not.found'){
				txt='Le nom d\'utilisateur ou le mot de passe est incorrect';
			}

			if($id=='data.unavailable'){
				txt='Les informations que vous avez postées sont invalides';
			}

			if($id=='login.session.failed'){
				txt='Impossible de créer une session pour cet utilisateur';
			}

			if($id=='-ajax.error'){
				txt='Erreur loars de l\'execution du XHR';
			}


			responses((txt===false)?'Erreur un problème est survenu lors de la tentative de connexion':txt);

		}catch(e){

			GToast(['Erreur JS Détecté lors du traitement : ', e.message].join('')).bubble();
		}


	};

	
};




