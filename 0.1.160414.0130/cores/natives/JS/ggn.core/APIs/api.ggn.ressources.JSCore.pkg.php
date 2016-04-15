/* GougnonJS.Ressources, version : 0.1, update : 160408#1106, Copyright GOBOU Y. Yannick 2015 */

(function(A,P,I){var API;

	if(!Gougnon.support('nightly 0.1')){alert('La version de GougnonJS n\'est pas compatible avec GRessources 0.1 ');return false;}


	if(!G['COM']){

		GScript.package('ggn.com');

	}

	GScript.check('GCOM', function(){


		API=G.API({

			name:'Ressources'
			
			,static:{
				
				version:'0.1 nightly, Avril 2016, 160408.1104'
				
				, Users : false

				, Vars : {

					I : 'hote choose multiple importTo Awk user confidentiality'

				}

				, Service : {

					Name : 'ggn.ressources'

					, Title : 'GGN Ressources'

					, Obj : false

					, Init : function(){return this.Obj||G.COM.Service(this.Name).Init({Title:this.Title});}

				}

				, UI : {

					Import : {

						Build : function(f,c){

							var bx = {}, f=f||false,c=c||{};

							c.multiple = c.multiple||false;

							c.accept = c.accept||'*';

							bx.form = G('body').create({tag:'form', cn:'ggn-rsrc-ui-import-form'})

								.attrib('action', '#')

								.attrib('method', 'POST')

								.attrib('enctype', 'multipart/form-data')

							;

							bx.input = bx.form.create({tag:'input', cn:'disable'})

								.attrib('type', 'file')

								.attrib('name', 'rsrc')

								.attrib('accept', c.accept)

								.on('change', (isFunc(f)) ? f : G.F() )

							;

							if(c.multiple){

								bx.input.attrib('multiple', 'multiple');

							}
								
							bx.choose = bx.form.create({cn:'choose x192-w-min x128-h-min gui flex column cursor-pointer box-rounded-normal'})

								.on('click', function(){

									bx.input.click();

								})

							;

								bx.icon = bx.choose.create({cn:'gui icon import text-x32 padding-x16 col-0 gui flex column end '});

								bx.label = bx.choose.create({cn:'text-x16 text-ellipsis text-center padding-t-x8 padding-b-x16 padding-lr-x16'}).append('Depuis votre ordinateur');


							return bx;

						}

					}

				}

			}

			,constructor:function(){
			
				var o=this, GAB = G.Gabarit;

					o.Stc = o.STATIC;

					o.Service = o.Stc.Service.Init();

					o.oBody = G('body');

					o.event = G.Event(o);

					o.cfg = o.ARGS[1]||{};

					o.type = o.ARGS[0]||'*';
					


				G.foreach(o.Stc.Vars.I.split(' '), function(n){o[n]=o.cfg[n]||false; });

				var bx={}

					, h=o.hote || o.oBody

					, Wk = o.Awk || {}

					,wait = G.Gabarit.UI.Loading.Wait('Patientez...')

				;



				wait.ui.replaceClass('row', 'column').replaceClass('text-x14', 'text-x3-vw').addClass('color-light-d text-thin');
				
				Wk.follow = Wk.follow || true;

				Wk.depth = Wk.depth || 'gray-blur';

				Wk.locked = true;


				bx.p = h.create({cn:'ggn-rsrc-ui vw9 vh9 gui flex column box-shadow-black'})

					,bx.h = bx.p.create({cn:'head gui flex row center bg-primary color-light-l'})

						,bx.icn = bx.h.create({cn:'gui icon'})

						,bx.ttl = bx.h.create({cn:'title col-0 text-x16 padding-tb-x12 padding-lr-x16'})

						,bx.cls = bx.h.create({cn:'close gui icon close padding- padding-r-x16 text-x14 cursor-pointer'})

					,bx.uh = bx.p.create({cn:'uhead gui-transition bg-primary-d text-x14 color-light-l gui flex column'})

					,bx.ctnr = bx.p.create({cn:'container col-0 pos-relative enable-y-auto-scrollbar'})

						,bx.ctn = bx.ctnr.create({cn:'content gui flex center full '})

							.append(wait.ui)

				;


				bx._tls = [];

				o.bx = bx;

				o.BOCBx = false;

				o.BOCBy = false;

				o.Awk = GAwake(bx.p ,Wk);


				o.Awk.event.add('before.show', function(){

					var bdy = o.oBody;

					o.BOCBx = bdy.css('overflow-x');

					o.BOCBy = bdy.css('overflow-y');

					bdy.css({'overflow-x':'hidden', 'overflow-y':'hidden'});

				});


				o.Awk.event.add('close', function(){

					var bdy = o.oBody;

					bdy.css({'overflow-x':o.BOCBx, 'overflow-y':o.BOCBy});

				});


				bx.cls.on('click', function(){o.close();});


				o.__Tools();

				o.__Title();

				o.__Import();

				o.__Choose();

			}

		})

			.create()


			.dynamic('__Tools', function(ev,o){

				var o = this,bx=o.bx;

				bx.tls = bx.uh.create({cn:'tools gui flex row wrap x32-h-min'});

				bx.Uh = bx.uh.create({cn:'uh gui-transition'});

				return o;

			})


			.dynamic('__Title', function(ev,o){

				var o = this,bx=o.bx

					,ttl = o._titleFc().toString()

				;

				ttl+='les ';

				ttl+=o._titleLb();

				ttl+='s';

				ttl = ttl.ucFirst();

				bx.ttl.html(ttl);

				return o;

			})


			.dynamic('__Import', function(ev,o){

				var o = this,bx=o.bx;

				if(o.importTo){

					o
						._tool({

							label : '<span class="gui icon import"></span> Importer'

							, focus : true

							, click : o._UIImportTo

						})
					;
					
				}

				return o;

			})


			.dynamic('__Choose', function(ev,o){

				var o = this,bx=o.bx;

				if(o.choose){

					bx.tlslb = bx.tls.create({cn:'tool label align-right text-x16'})

						.append('Aucun élèment sélèctionné')

					;
					
				}

				return o;

			})



			.dynamic('_UIImportTo', function(ev,o){

				var bx = o.bx,bu,inp,acc = o.type ,Uha ,Uh;

				Uh = o._Uha().bx.Uh;

				acc += (acc=='*') ? '': '/*';


				if(o._Uha_===true){

					bu = o.Stc.UI.Import.Build(

						function(){

							o._UIImportEl(this.files||false);

						}

						,{

							multiple : o.multiple

							, accept : acc

						}

					);

					Uh.addClass('gui flex center full').append(bu.form);

				}

				else{

					Uh.removeClass('gui flex center');

					Uh.html('');

				}

			})


			.dynamic('_UIImportEl', function(files){

				var o = this,bx=o.bx,fs=files||false;

				if(isObj(fs)){

					var l = fs.length, ht='';

					ht += (l.toString());

					ht += (' élément');

					ht += ( ((l > 1) ? 's' : '') );
				
					ht += (' sélèctionné');

					ht += ( ((l > 1) ? 's' : ' ') );


					bx.uh.html('');

					o._maxu(false);

					var strt = bx.uh.create({cn:'gui flex center full'}).html('<span class="gui icon import text-x8-vh"></span>');



					G(function(){

						strt.remove();

						// bx.uh.removeClass('gui flex center');

						var sh = G.Gabarit.UI.ShineFlat.IN(function(_o){	

							bx.uh.addClass('bg-primary-d').html('<span class="gui icon more-alt text-x7-vw"></span>');

							G(function(){o._UIImportElItm(fs);}).timeout(300);

						});

						bx.uh.append(sh.ui);

						sh.trigger();

					}).timeout(500);

				}

				return o;

			})



			.dynamic('_UIImportElItm', function(fs){

				var o = this,bx=o.bx,fs=fs||false;

				bx.uh.html('');

				if(isObj(fs)){

					o.imported = [];

					var itms = bx.uh.create({cn:'import-items _w10 gui flex start wrap enable-y-auto-scrollbar opacity-x10 gui-transition'})

						,lay = function(){

							var po=bx.p.offset()
								
								,ho=bx.h.offset()

								,h=po.height - ho.height

							;

							h+='px';

							itms.css({height:h});

						}

					;

					lay();

					GEvent(window).listen('resize', function(){lay();});
					
					G.foreach(fs, function(f,k0){

						var k = k0*1;

						G(function(){

							var it = itms.create({cn:'item mi-col-15 li-col-15 s-col-16 m-col-7 l-col-7 col-3 x128-h gui flex center row align-top'}).css({padding:'1% 2%'})

								,th = it.create({cn:'thumb box-circle x96-w x96-h gui margin-r-x16 gui flex center'}).html('<div class="gui loading circle x32"></div>')

								,prg = it.create({cn:'progress col-10 gui _h10 flex column center '})
									
									,per = prg.create({cn:'percent text-thin text-left text-x48 col-15 padding-b-x8'}).append('0%')

									,bar = prg.create({cn:'bar col-15'})

										,trck = bar.create({cn:'track col-null gui _h10 gui-transition'})

									,lb = prg.create({cn:'label col-15 text-x12 text-ellipsis text-left padding-tb-x8 padding-lr-x16'}).append(f.name)

								,space = it.create({cn:'space col-0'})

								// ,acts = it.create({cn:'actions x80-w gui _h10 flex column center'})

							;

							it.animation({
						
								0 : {'transform' : 'translateY(-50%) rotateX(90deg)','opacity' : '0.01'}
						
								,100 : {'transform' : 'translateY(0%) rotateX(0deg)','opacity' : '1'}
						
							}, 768, 'ease');


							o.imported[k] = it;

							G(function(){

								o._loadFile(f,th,per,trck,lb,it, (k0*1)==(fs.length-1) );
								
							}).timeout(512*(k||1) );


						}).timeout(300*(k+1) );

					},false,false,{});

					itms.replaceClass('opacity-x10','opacity-cancel');

				}

				else{

					var err = bx.uh.create({cn:'gui flex column center full'}).html('<div class="gui icon close text-x8-vh padding-x32"></div><div class="text-x5-vw">Vide</div>');

				}

				return o;

			})



			.dynamic('_loadFile', function(f,th,per,trck,lb,it,St){

				var o = this,Ho={}, f=f||false,th=th||false,per=per||false,trck=trck||false;

				if(isObj(f)){

					var R  = new FileReader(), Ev = GEvent(R), h,u ='import?user=', dat='file=';


					u+=(o.user||false).toString();

					u+='&confidentiality='; u+=(o.confidentiality||false).toString();

					u+='&type='; u+=(o.type||false).toString();


					trck.css({width:'0%'});

					Ho.pbar = function(p){

						p = (p*1).virgule(1);

						p+='%';

						per.html(p);

						trck.css({width:p});

					};

					Ho.error = function(txt, icn){

						per.replaceClass('text-x48 text-thin','text-x14').html(txt||'Echec');

						th.replaceClass('more-alt', icn||'na');

					};


					Ev.listen('progress', function(ev){

						if(ev.lengthComputable===true){

							Ho.pbar((ev.loaded/ev.total) * 100);

						}
						
					});

					Ev.listen('fail', function(){

						Ho.error('Echec lors de la lecture', 'close');

					});

					Ev.listen('error', function(){

						Ho.error('Erreur lors de la lecture');

					});

					Ev.listen('load', function(){

						var img = this.result;

						Ho.pbar(100);

						per.html('...');

						th.html('').addClass('icon more-alt text-x32');

						dat+=img;

						var itms = it.parentNode, off = it.offset();

						itms.scrollTop = off.top - off.height;

						h = o.Service.Open(u,{

							data : dat

							,success : function(rec){

								var r = rec.response, imp = rec.imported||{}, re = imp.response||false;

								if(r==true && re=='import.success'){

									per.html('100%');

									th.replaceClass('more-alt', 'check');

									// console.log(JSON.stringify(rec))

									if(St===true){

										o._maxu(true);

									}

								}

								else{

									Ho.error('Impossible d\'enregistrer', 'close');

								}


							}

							,fail : function(){

								Ho.error('Echec lors de l\'enregistrement', 'close');

							}

							,error : function(){

								Ho.error('Erreur lors de l\'enregistrement');

							}

						});


						// console.log('loaded, Save now // \n ');


					});


					R.readAsDataURL(f);


				}

				return o;

			})



			.dynamic('_maxu', function(p){

				var o = this,bx=o.bx,p=p||false, cuh = 'gui flex center col-0', cctnr = 'disable';

				if(p===false){

					bx.uh.addClass(cuh);

					bx.ctnr.addClass(cctnr);

					bx.ttl.html('Importation');

				}

				else{

					bx.ctnr.removeClass(cctnr);

					bx.uh.removeClass(cuh).html('');

					o.__Tools().__Title().__Import().__Choose()._Uha();

				}

				return o;

			})



			.dynamic('_titleLb', function(){

				var o = this,t=o.type,r=' fichier ';

				if(t=='doc'){r = ' document ';}

				else{r = t;}

				return r;

			})


			.dynamic('_Uha', function(){

				var o = this,bx = o.bx, s = o._Uha_||false;

				if(s===false){

					bx.Uh.addClass('open');

					o._Uha_ = true;

				}

				else{

					bx.Uh.removeClass('open');

					o._Uha_ = false;

				}

				return o;

			})


			.dynamic('_tool', function(tl){

				var o = this,bx = o.bx;

				if(isObj(bx.tls) && isObj(tl)){

					var k0 = bx._tls.len()
				
						, k = tl.name || k0

						, lb = (tl.label||'').toString()
				
						,t

						,fc = focus || false
				
						,clck = tl.click||null
				
					;


					t = bx.tls.create({tag:'button',cn:'tool button cursor-pointer'})

						.html((lb.isEmpty()) ? '#' : lb)

						.on('click', clck, o)

					;

					if(fc){t.addClass('active')._focus();}

					bx._tls[k] = t;

				}

				return o;

			})


			.dynamic('_titleFc', function(){

				var o = this,r='';

				if(o.choose){r = 'sélèctionner parmi ';}

				return r;

			})


			.dynamic('open', function(){

				var o = this;

				o.Awk.show();

				return o;

			})


			.dynamic('close', function(){

				var o = this, bdy = o.oBody;

				o.Awk.close();

				return o;

			})

		;


	});


})(window,document,navigator);
