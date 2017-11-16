/*
	Photon by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		xlarge: '(max-width: 1680px)',
		large: '(max-width: 1140px)',
		medium: '(max-width: 980px)',
		small: '(max-width: 736px)',
		xsmall: '(max-width: 480px)',
		xxsmall: '(max-width: 320px)'
	});

	$(function() {

		var	$window = $(window),
			$body = $('body');

		// Disable animations/transitions until the page has loaded.
			$body.addClass('is-loading');

			$window.on('load', function() {
				window.setTimeout(function() {
					$body.removeClass('is-loading');
				}, 250);
			});

		// Fix: Placeholder polyfill.
			$('form').placeholder();

		// Prioritize "important" elements on mobile.
			skel.on('+mobile -mobile', function() {
				$.prioritize(
					'.important\\28 mobile\\29',
					skel.breakpoint('mobile').active
				);
			});

		// Scrolly.
			$('.scrolly').scrolly();

	});


	$(".skil").hover(function(){

		var conteudo = "<ul>";

		$(".area-vantagens").html("");

		if($(this).hasClass('php')){

			conteudo += "<li>Sintaxe básica</li>";
			conteudo += "<li>POO</li>";
			conteudo += "<li>CRUD utilizando MYSQL_QUERY</li>";
			conteudo += "<li>CRUD utilizando PDO</li>";
			conteudo += "<li>Manipulação de dados utilizando XML</li>";
			conteudo += "<li>Manipulação de dados utilizando JSON</li>";
			conteudo += "<li>Implementação em arquitetura MVC</li>";
			conteudo += "<li>Framework ZEND 1.9</li>";
			conteudo += "<li>Integração Web service utilizando cURL</li>";
			conteudo += "<li>Envio de email utilizando PHPMAILER</li>";
			conteudo += "<li>Geração de gráficos utilizando highchart</li>";
			conteudo += "<li>Geração de PDF utilizando FPDF e MPDF</li>";
			conteudo += "<li>Manipulação de tabelas utilizando datatables</li>";

		}else if($(this).hasClass('bd')){

			conteudo += "<li>Afinidade com MYSQL E SQL SERVER ORACLE</li>";
			conteudo += "<li>CRUD (insert,select, update, delete)</li>";
			conteudo += "<li>Montando querys e subquerys</li>";
			conteudo += "<li>Joins</li>";
			conteudo += "<li>Estrutura de seleção em select</li>";
			conteudo += "<li>Triggers</li>";
			conteudo += "<li>Procedures</li>";
			conteudo += "<li>Job</li>";
			conteudo += "<li>Functions</li>";
			conteudo += "<li>Views</li>";
			conteudo += "<li>GRANTS e SYNONYMOUS</li>";
			conteudo += "<li>Sequences</li>";

		}else if($(this).hasClass('git')){

			conteudo += "<li>Afinidade com TORTOISE e GIT</li>";
			conteudo += "<li>Trabalho em equipe utilizando modelos centralizados e descentralizados</li>";
			conteudo += "<li>Conhecimento teórico em Working directory, Staging area e Repository aplicado ao GIT</li>";
			conteudo += "<li>BRANCH, TAGS, STASHS, etc.</li>";
			
		}else if($(this).hasClass('html')){

			conteudo += "<li>Afinidade com HTML 5 e CSS 3</li>";
			conteudo += "<li>Criação de listas</li>";
			conteudo += "<li>Criação de tabelas</li>";
			conteudo += "<li>Criação de formulário</li>";
			conteudo += "<li>manipulação utilizando BOOTSTRAP</li>";
			conteudo += "<li>icones utilizando FONTAWESOME</li>";
			conteudo += "<li>Técnicas de SEO e otimização de sites</li>";
			conteudo += "<li>Criação e manipulação de SVG</li>";
			
		}else if($(this).hasClass('server')){
		
			conteudo += "<li>CPANEL</li>";			
			conteudo += "<li>Configuração de dominios e subdominios</li>";			
			conteudo += "<li>SSL e SSH</li>";			
			conteudo += "<li>Configuração de FTP</li>";			
			conteudo += "<li>Configuração de SMTP</li>";			
			conteudo += "<li>Manipulação básica do php.ini</li>";			

		}else if($(this).hasClass('js')){
			
			conteudo += "<li>Sintaxe básica</li>";
			conteudo += "<li>Jquery</li>";
			conteudo += "<li>Eventos jquery</li>";
			conteudo += "<li>Manipulação de dados utilizando JSON</li>";
			conteudo += "<li>$.POST e $.GET</li>";
			conteudo += "<li>AngularJS 2.0</li>";
			conteudo += "<li>Diretivas utilizando angular</li>";
			conteudo += "<li>Ajax</li>";
			conteudo += "<li>XMLHttpRequest</li>";

		}else if($(this).hasClass('BI')){
			
			conteudo += "<li>Técnicas de BI utilizando spoon do pentaho</li>";
			conteudo += "<li>Criação e manipulação de transformações e jobs</li>";
			conteudo += "<li>Execuções de Transformações utilizando java, CMD e PHP</li>";
			conteudo += "<li>Execuções de JOBS utilizando CMD e PHP</li>";

		}

		conteudo += "</ul>";
		
		$(".area-vantagens").html(conteudo);


	});

	$(".skil").mouseout(function(){
		$(".area-vantagens").html("<ul class='major-icons'><li><span class='icon style4 major fa-html5'></span></li><li><span class='icon style5 major fa-css3'></span></li><li><span class='icon style1 major fa-code'></span></li><li><span class='icon style2 major fa-gitlab'></span></li><li><span class='icon style3 major fa-database'></span></li><li><span class='icon style6 major fa-server'></span></li></ul>");
	});

	$(".enviar-email").click(function(){

		$(this).prop("disabled", true );
		$(this).val("Enviando mensagem...");
		var validado = true;

		// validar dados		
		if($("#demo-name").val() == '' || $("#demo-email").val() == '' || $("#demo-message").val() == ''){
			alert('Voce precisa preencher todos os dados!');
			validado = false;						
		}

		if(validado){
			$.post('enviar-email.php' , {'nome' : $("#demo-name").val(), 'email' : $("#demo-email").val() , 'mensagem' : $("#demo-message").val()}, function(data){

			});
			$(".enviar-email").val("Enviado com sucesso!");
		}
		else{
			$(this).prop("disabled", false );
			$(this).val("Enviar mensagem");
		}
		

	});


})(jQuery);
