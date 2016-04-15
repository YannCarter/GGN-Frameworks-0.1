<?php global $_Gougnon; ?>/* G.Login Suite for Thème, Copyright GOBOU Y. Yannick 2014 */
(function(W,D){



	GScript.package("ggn.com.service").check("GCOMService", function(){

		G(function(){


			var form = G('#ggn-subscribe-form')

				, box = G('#ggn-subscribe-box')

				, AWK = GAwakeConfirm(
					'<h1>AWK</h1>'
					,{
						hote : box
						,locked : true
						,width : '80%'
					}
				)

				, Connect = GSubscribe(form)
					.Setup({
						host:'<?php echo HTTP_HOST; ?>'
						,redirect:'userGetStarted?subscribe'
						,captcha:G('#ggn-subscribe-captcha')
						,captchaCtrl:G('#ggn-subscribe-captcha-ctrl')
					})

			;


			Connect.onSuccess = function(){

				var o=this, tx = '<div class="textual text-x14">';

				tx+='Votre compte a été correctement crée <br>Un mail a été envoyé a votre adresse <b class="color-primary">';
				tx+=o.form.email.value;
				tx+='</b> pour validation. <br>Pensez à finaliser l\'opération d\'inscription en suivant les instructions contenus dans ce mail.';
				tx+='</div>';

				AWK.message('Succès', tx, {

					'Continue':{
						'label':'Connectez-vous pour continuer&nbsp;&nbsp;&nbsp;<span class="gui iconx ">arrow_forward</span>'
						,'click':function(){
							var u=o.host;
							u+=o.redirect;
							location.href = u;
						}
					}

				});


				o.form.reset();

			};


			Connect.onError = function(ar){
				var o=this,c=ar[0]||false,ev=ar[1]||false,t='Erreur Inscription',m='Une erreur inconnu à été détectée!';
				
				if(isStr(c)){

					if(c=='username.failed'){
						t='Echec Nom d\'utilisateur ';
						m='Le nom d\'utilisateur doit contenir que les caractères alphabetique, numérique et les symboles "." et "-"';
					}

					if(c=='pwd.empty'){
						t='Echec Mot de Passe ';
						m='Le mot de passe ne doit pas être vide';
					}

					if(c=='pwd.confirm.failed'){
						t='Echec Confirmation Mot de Passe ';
						m='Les deux (02) mot de passe ne sont pas identique';
					}

					if(c=='email.failed'){
						t='Echec Email';
						m='Veuillez indiquer une adresse mail valide';
					}

					if(c=='captcha.failed'){
						t='Code de sécurité';
						m='Erreur du captcha';
					}

					if(c=='attempt.failed' || c=='attempt.subscribe.failed'){
						t='Echec Tentative';
						m='Une erreur empêche la finalisation de la tentative d\'inscription ';
					}

					if(c=='user.exists'){
						t='Cet Utilisateur ou cette adresse mail existe';
						m='Veuillez changer de nom d\'utilisateur ou d\'email, car celui que vous avez indiquez existe déjà';
					}


				}

				GToast({title:t ,text:m ,delay:10000}).error();

			};

			// alert('manager')

			// form.on('submit', function(ev){

			// 	var toast = G.Toast('Un instant...').bubble();




			// 	GEvent(ev).prevent(true);

			// });


}).timeout(340);


	});

})(window,document);


