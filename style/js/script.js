$(document).ready(function(){

	/*Botões*/

	//Função para abrir um dropdown-menu de nível 3 ou mais.
	(function($){
		$(document).ready(function(){
			$('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
				event.preventDefault(); 
				event.stopPropagation(); 
				$(this).parent().siblings().removeClass('open');
				$(this).parent().toggleClass('open');
			});
		});
	})(jQuery);

	/*Notificações Navegador*/
	if (Notification.permission!=='default') {		
		$('#notificar').hide();
		console.log(Notification.permission);
	}

	$('#notificar').click(function(){

		Notification.requestPermission().then(function(p){
          	if (p === 'denied') {
          		sweetAlert("=/", 'Notificações Não Aceitas.', "error");
          	} else if (p === 'granted') {
          		notificar = new Notification('=D',{
	                'body' : 'Notificações Aceitas.',
	                'icon' : '".base_url()."style/img/favicon.ico',
	                'tag' : '1'
	            });

	            setTimeout(notificar.close.bind(notificar), 5000);
          	}
        });

	});
	/*Notificações Navegador*/

	$('#voltar').click(function() {
    	history.back()
	});

	$('select').select2({ width: '100%' });
	//Campos selects que não devem ter o select 2
	$(".semSelect2").select2('destroy'); 

	$('#recarregar').click(function() {

		swal({
		  title: "RECARREGAR TELA",
		  text: 'Dados inseridos ou alterados serão perdidos.',
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  cancelButtonText: "CANCELAR",
		  confirmButtonText: "OK",
		  closeOnConfirm: false
		},function(){
		  	//Pega o link atual e joga na memoria, antes de recarregar.
			/*Esse procedimento é feito, pois a cada acesso a uma nova tela é memorizado o 
			link da tela anterior, da lista, isso para que o botão voltar funcione*/
			history.replaceState({pagina: 1}, "Recarregado", $('#recarregar').attr('url'));
			location.reload();
		});
    	
	});

	$("#apagar").click(function(){
		//Zera os campos imputs, tira formatação.

		event.preventDefault();

		swal({
		  title: "LIMPAR CAMPOS",
		  text: 'Todos os campos editáveis ficarão em branco.',
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  cancelButtonText: "CANCELAR",
		  confirmButtonText: "LIMPAR",
		  closeOnConfirm: false
		},function(){

			$('input').each(function(){
				if($(this).attr('readonly')!="readonly" && 
				   $(this).attr('disabled')!="disabled" && 
				   $(this).prop('type')!="hidden"){

					$(this).closest('.form-group').removeClass('has-success');
					$(this).closest('.form-group').removeClass('has-error');
					$(this).closest('.form-group').removeClass('has-warning');

					if ($(this).prop('checked')) {
						$(this).prop("checked",false);
					} else {
						$(this).val("");
					}

				}		
			});

			//Zera os selects
			$('select').each(function(){
				if($(this).attr('readonly')!="readonly" && $(this).attr('disabled')!="disabled"){
					$(this).closest('.form-group').removeClass('has-success');
					$(this).closest('.form-group').removeClass('has-error');
					$(this).closest('.form-group').removeClass('has-warning');
					$(this).prop('selectedIndex',0).trigger('change');
				}
			});

			swal({
			  title: "PRONTO",
			  text: "Campos Limpos",
			  type: "success",
			  timer: 1300,
			  showConfirmButton: false
			});

		}); 

	});

	/*Botões*/

	//caso o usuário tente digitar mais do que o campo comporta
	$("input").keyup(function(){
		if($(this).val().length == $(this).attr('maxlength') && !$(this).hasClass('semMaxLength')){
			$(this).finish();
			$(this).prop("data-toggle","tooltip");
			$(this).prop("data-placement","top");
			$(this).prop("title","Limite de Caracteres ("+$(this).attr('maxlength')+"/"+$(this).attr('maxlength')+") atingido");
			$(this).tooltip('show');
		} else {
			$(this).tooltip('hide');
		}

	});

	/*Validações de campos*/

	var erro_email = false;
	var erro_cpf = false;
	var erro_cnpj = false;

	//Validando E-mail
	$(".validar_email").focusout(function(){

		console.log('Validando E-mail...');

      if($(this).val() != "") { 

         var filtro = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

         if(!filtro.test($(this).val())) {
		
         	toast('E-mail', 'E-mail inválido!','error');
         	erro_email = true;
         	$(this).closest('.form-group').removeClass('has-success');
			    $(this).closest('.form-group').addClass('has-error');
        	return false;

         } else {

         	$(this).closest('.form-group').removeClass('has-error');
			    $(this).closest('.form-group').addClass('has-success');	
         	erro_email = false;

         }

      } else {

      	erro_email = false;

      }

   });

	// Aceita somente números
	$(".validar_numeros").keyup(function() {
		var $this = $( this ); //armazeno o ponteiro em uma variavel
		var valor = $this.val().replace(/[^1234567890+-]+/g,'');
		$this.val( valor );
	});

	// Aceita somente números com . ou ,
	$(".validar_decimais").keyup(function() {
		var $this = $( this ); //armazeno o ponteiro em uma variavel
		var valor = $this.val().replace(/[^1234567890.,+-]+/g,'');
		$this.val( valor );
	});

	// Validador de CPF
	$(".validar_cpf").focusout(function(){

		if($(this).val() != '') {

		valor = jQuery.trim($(this).val());

        exp = /\.|\-|\//g;
	    cpf = valor.toString().replace(exp, "" );

        while(cpf.length < 11) cpf = "0"+ cpf;
        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;
        for (i=0; i<11; i++){
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
        }
        if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11-x }
        b = 0;
        c = 11;
        for (y=0; y<10; y++) b += (a[y] * c--);
        if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11-x; }
	        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) {

	         	toast('CPF', 'CPF inválido!','error');
	         	erro_cpf = true;
	         	$(this).closest('.form-group').removeClass('has-success');
			    $(this).closest('.form-group').addClass('has-error');

	     	} else { 

	     		erro_cpf = false;
	     		$(this).closest('.form-group').removeClass('has-error');
			    $(this).closest('.form-group').addClass('has-success');	

	     	}	

        } else {

        	erro_cpf = false;

        }
        
		  
	});
	
	// Validador de CNPJ
	$(".validar_cnpj").focusout(function(){

		if($(this).val() != '') {

			cnpj = $(this).val();
	        valida = new Array(6,5,4,3,2,9,8,7,6,5,4,3,2);
	        dig1= new Number;
	        dig2= new Number;

	        exp = /\.|\-|\//g;
	        cnpj = cnpj.toString().replace(exp, "" ); 
	        digito = new Number(eval(cnpj.charAt(12)+cnpj.charAt(13)));

	        for(i = 0; i<valida.length; i++){
	                dig1 += (i>0? (cnpj.charAt(i-1)*valida[i]):0);  
	                dig2 += cnpj.charAt(i)*valida[i];       
	        }
	        dig1 = (((dig1%11)<2)? 0:(11-(dig1%11)));
	        dig2 = (((dig2%11)<2)? 0:(11-(dig2%11)));

	        if(((dig1*10)+dig2) != digito)  {

	        	toast('CNPJ', 'CNPJ inválido!','error');
	        	erro_cnpj = true;
	         	$(this).closest('.form-group').removeClass('has-success');
			    $(this).closest('.form-group').addClass('has-error');

	        } else {

				erro_cnpj = false;
         		$(this).closest('.form-group').removeClass('has-error');
			    $(this).closest('.form-group').addClass('has-success');	

	        }

	    } else {

			erro_cnpj = false; 

	    }
                


	});

	$('.range_timestamp').daterangepicker({
		 "showDropdowns": true,
		 "timePicker": true,
		 "timePicker24Hour": true,
		 "timePickerIncrement": 1,
	    ranges: {
           'Hoje': [moment(), moment()],
           'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
           'Últimos 15 Dias': [moment().subtract(14, 'days'), moment()],
           'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
           'Este Mês': [moment().startOf('month'), moment().endOf('month')],
           'Último Mês': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
           'Último trimestre': [moment().subtract(89, 'days'), moment()],
           'Último semestre': [moment().subtract(179, 'days'), moment()],
           'Último ano': [moment().subtract(364, 'days'), moment()]
        },
	    "locale": {
	        "format": "DD/MM/YYYY H:mm",
	        "separator": " até ",
	        "applyLabel": "Aplicar",
	        "cancelLabel": "Cancelar",
	        "fromLabel": "De",
	        "toLabel": "para",
	        "customRangeLabel": "Customizado",
	        "weekLabel": "S",
	        "daysOfWeek": [
	            "Dom",
	            "Seg",
	            "Ter",
	            "Qua",
	            "Qui",
	            "Sex",
	            "Sab"
	        ],
	        "monthNames": [
	            "Janeiro",
	            "Fevereiro",
	            "Março",
	            "Abril",
	            "Maio",
	            "Junho",
	            "Julho",
	            "Agosto",
	            "Setembro",
	            "Outubro",
	            "Novembro",
	            "Dezembro"
	        ],
	        "firstDay": 1
	    }
	});

	$('.range_data').daterangepicker({
		 "showDropdowns": true,
	    ranges: {
           'Hoje': [moment(), moment()],
           'Últimos 7 Dias': [moment().subtract(6, 'days'), moment()],
           'Últimos 15 Dias': [moment().subtract(14, 'days'), moment()],
           'Últimos 30 Dias': [moment().subtract(29, 'days'), moment()],
           'Este Mês': [moment().startOf('month'), moment().endOf('month')],
           'Último Mês': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
           'Último trimestre': [moment().subtract(89, 'days'), moment()],
           'Último semestre': [moment().subtract(179, 'days'), moment()],
           'Último ano': [moment().subtract(364, 'days'), moment()]
        },
	    "locale": {
	        "format": "DD/MM/YYYY",
	        "separator": " até ",
	        "applyLabel": "Aplicar",
	        "cancelLabel": "Cancelar",
	        "fromLabel": "De",
	        "toLabel": "para",
	        "customRangeLabel": "Customizado",
	        "weekLabel": "S",
	        "daysOfWeek": [
	            "Dom",
	            "Seg",
	            "Ter",
	            "Qua",
	            "Qui",
	            "Sex",
	            "Sab"
	        ],
	        "monthNames": [
	            "Janeiro",
	            "Fevereiro",
	            "Março",
	            "Abril",
	            "Maio",
	            "Junho",
	            "Julho",
	            "Agosto",
	            "Setembro",
	            "Outubro",
	            "Novembro",
	            "Dezembro"
	        ],
	        "firstDay": 1
	    }
	});

	//Adiciona mascaras a todos
	colocarMascaras(null);

	/*Calendário com datepicker*/
	$('.mascara_data').datepicker({
		dateFormat: "dd/mm/yy",
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
	    nextText: 'Próximo',
	    prevText: 'Anterior'
	}).prop('placeholder','__/__/___');
	//Máscaras

	/*Filtro Dinamico*/
	$('#filtro_campo').select2({
		tags: false,
		tokenSeparators: [';', ' '],
		width: '100%'
	});

	$('#filtro_limite').select2({
		tags: true,
		tokenSeparators: [';', ' '],
		width: '100%'
	});

	$('#filtro_ordenacao').select2({
		tags: false,
		tokenSeparators: [';', ' '],
		width: '100%'
	});

	/*Validações de campos*/
	//Deixar mais claro os campos obrigatórios
	$('.obrigatorio').each(function(){

		$(this).attr('placeholder','* '+$(this).attr('placeholder'))
			   .attr('title','Este campo é obrigatório');

		if($(this).val() != ''){
			$(this).closest('.form-group').addClass('has-success');
		}

	});

	//Comparar senhas
	$("#confirmacaoSenha, #senha_usuario").change(function(){

		if($("#confirmacaoSenha").val() != $("#senha_usuario").val() && $("#confirmacaoSenha").val() != '' && $("#senha_usuario").val() != ''){
			toast('Senha', 'Senhas não conferem!','error');
			$('#confirmacaoSenha, #senha_usuario').closest('.form-group').removeClass('has-success');
			$('#confirmacaoSenha, #senha_usuario').closest('.form-group').addClass('has-error');

		} else if ($("#confirmacaoSenha").val() != '' && $("#senha_usuario").val() != '') {
			$('#confirmacaoSenha, #senha_usuario').closest('.form-group').removeClass('has-error');
			$('#confirmacaoSenha, #senha_usuario').closest('.form-group').addClass('has-success');
		}

	});

	//Verifica um campo input assim que perde o foco
	$(document).on("keyup change",'.obrigatorio',function(e){

		//Garante que só será validado se a tecla pressionada não for o TAB.
		if (e.keyCode != 9) {

			var aviso = $(this).attr('aviso');

			if($(this).val() == '' || $(this).val() == "Selecione...") {

				/*Quando possui a mascara_data e o usuário preenche a data com o calendário, 
				ele primeiro verifica se está vazio para depois colocar um valor, sendo assim para evitar esse erro deixo essa validação
				só para o momento de envio do formulário */

				if(!$(this).hasClass("mascara_data")) {

					toast('Campo em Branco', 'Campo '+aviso+' deve ser preenchido!','error');
			        $(this).closest('.form-group').removeClass('has-success');
				    $(this).closest('.form-group').addClass('has-error');


				}

			} else {
				//Em alguns casos não deve ficar verde ainda, pois pode não passar na validação.
				if(!$(this).hasClass("validar_cnpj") && !$(this).hasClass("validar_cpf") && !$(this).hasClass("validar_email")){
					$(this).closest('.form-group').removeClass('has-error');
				    $(this).closest('.form-group').addClass('has-success');		
				}			

			}
		}

	});
	
		//Valida o envio dos dados
		$('#validar_Enviar').click(function(e){
			
			e.preventDefault();
			var erros = 0;

			mensagem = '';
			
			//Percorre todos inputs com essa classe
			$(".obrigatorio").each(function(){

				var aviso = $(this).attr('aviso');

				if($(this).val() == "" || $(this).val() == "Selecione...") {
					erros++;

					if(mensagem == '') { //Garante que não irá se repetir.
						mensagem = 'O(s) Campo(s): ' + '<li><strong>' + aviso.toUpperCase() + '</strong></li>';
						$(this).focus();
					} else {
						mensagem = mensagem + '<li><strong>' + aviso.toUpperCase() + '</strong></li>';
					}
					
			        $(this).closest('.form-group').removeClass('has-success');
			    	$(this).closest('.form-group').addClass('has-error');
				}
				
			}); //Fecha o percorre input

			if(erro_cnpj || erro_cpf || erro_email) { //Garante que não existem erros na tela

				swal('Campo(s) em Branco', 'Existe(m) campo(s) com erro(s) de preenchimento!','error');
			
				return false;
					

			} else if(erros > 0) {

				swal({
				  title: "Campo(s) em Branco",
				  text: "<div align=\"left\" style=\"margin-left: 20px;\">"+mensagem+"Deve(m) ser preenchido(s)!</div>",
				  imageUrl: "../../style/img/obrigatorios.png",
				  html: true
				});

				return false;

			} else { //OK, enviar formulário

				$('.principal').hide();
				$( "#load_geral" ).fadeIn( "slow", function() {
		        });

				$('.mascara_data').mask("?99/99/9999"); // Precisa passar com as barras.
				removerMascaras();
				$("form").submit();

			}

	}); //Fecha o validar enviar

	function colocarMascaras(Campo){

		$('.mascara_data').mask("99/99/9999");

		var classes =  ['mascara_cel'    ,'mascara_tel'   ,'mascara_cnpj'      ,'mascara_cpf'    ,'mascara_rg'  ,'mascara_cep','mascara_placa',  'mascara_hora'];
		var mascaras = ['(99) 99999-9999','(99) 9999-9999','99.999.999/9999-99','999.999.999-99','99.999.999-A','99999-999'      ,'AAA-9999', '99:99:99'];

		if (Campo === null) {
			console.log('Adicionar Mascaras a Todos os campos');
			$('input, td').each(function(){

				for (var i = 0; i < classes.length; i++) {
					if($(this).hasClass(classes[i])){
						$("."+classes[i]).mask(mascaras[i], {'translation': {
		                                        A: {pattern: /[A-Za-z0-9]/}
		                                      }
		                                },{reverse: true}); 
					}
				}

			});
		} else {
			console.log('Adicionar Mascara ao Campo '+Campo.attr('aviso'));
			for (var i = 0; i < classes.length; i++) {
				if(Campo.hasClass(classes[i])){
					$("."+classes[i]).mask(mascaras[i], {'translation': {
	                                        A: {pattern: /[A-Za-z0-9]/}
	                                      }
	                                },{reverse: true}); 
				}
			}

		}

		

		$('.mascara_monetaria').priceFormat({});

	}

	function removerMascaras(){

		var classes =  ['mascara_cel'    ,'mascara_tel'   ,'mascara_cnpj'      ,'mascara_cpf'    ,'mascara_rg'  ,'mascara_cep','mascara_placa'];

		$('input').each(function(){

			for (var i = 0; i < classes.length; i++) {

				if($(this).hasClass(classes[i])){
				
					var exp = /\.|\.|\-|\(|\)|\-|\ |\//g;
					var valor = $(this).val();
		        	valor = valor.toString().replace(exp,""); 
		        	$(this).val(valor);

				}
			}

		});

		//Deixando a mascara igual o banco aceita
		$('.mascara_monetaria').priceFormat({
										prefix: '',
					    				thousandsSeparator: '',
					    				centsSeparator: '.',
					    				centsLimit: 3
					    			});

	}

	function toast(titulo,mensagem,tipo){

		$.toast().reset('all');

		$.toast({
		    heading: titulo,
		    text: mensagem,
		    showHideTransition: 'fade',
		    position: 'top-right',
		    hideAfter : 5000,  
		    icon: tipo
		});

	}


});