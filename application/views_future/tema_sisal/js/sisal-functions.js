$( document ).ready(function() {
	
	//Esegue il controllo della versione del Browser in uso e visualizza l'eventuale messaggio di avvertimento.
	showOLD_BrowsersWarningDialog();
	
	//BREADCRUMBS REPLACEMENT
	
	//Rimuove preventivamente i links inutili
	$( '.breadcrumb a:contains("home") ').parent().remove();
	$( '.breadcrumb a:contains("pubblica") ').parent().remove();
	
	var breadcrumb_home = $('#breadcrumb_home').html();
	
	$('.breadcrumb .first').removeClass('first').before($(breadcrumb_home))
	
	$('.breadcrumb .last a').text( $('#titolo_pagina').text() );
	
	// Rimuove i nodi duplicati delle breadcrumb
	var N = $('.breadcrumb li').length;
	for( var num_li=N; num_li>0; num_li-- )
	  cleanDuplicateBreadcrumbs(num_li);

	
	
    // MEGAMENU e DROPDOWN MENU
    
	$('#main-navigation_container').booNavigation({
		slideSpeed: 600,
		fadeSpeed: 400,
		delay: 500
    });
    
    
    $(document).click(function(){
		$('#centro-messaggi').slideUp();
		$('#logged-user_dropdown').slideUp();
		$('#login-user_dropdown').slideUp();
	});
	
	$('.number-messages').click(function (e) {
         $('#centro-messaggi').slideToggle(600);
         e.stopPropagation();
    });
    
    $('#login-user_dropdown').click(function (e) {
         e.stopPropagation();
    });
            
    $('#icona-utente').click(function (e) {
    	if( $('body').hasClass('signed-in') )
    	{
        	$('#logged-user_dropdown').slideToggle(600);
        }
        else if ( $('body').hasClass('signed-out') )
        {
        	$('#login-user_dropdown').slideToggle(600);
        }
        e.stopPropagation();
    });
    
    $(window).on('resize', function(){
    	if ( $(window).width() >= 750)
    	{
    		$('#logged-user_dropdown').hide();
    		$('#login-user_dropdown').hide();
    		$('#centro-messaggi').slideUp();
    	}
	});
    
    
    //CAROSELLI
    
	$("#hp-pubblica_main_carousel").owlCarousel({
		loop:true,
		items:1,
		margin:10,
		nav:true,
		navText:["<span class='icomoon-arrow-left' aria-hidden='true'></span>","<span class='icomoon-arrow-right' aria-hidden='true'></span>"],
		onInitialized:background_Check,
		onTranslated:BackgroundCheck.refresh
	});
  
	$("#hp-privata_main_carousel").owlCarousel({
		loop:true,
		items:1,
		margin:10,
		responsiveRefreshRate:50,
		nav:false,
		dotData:true,
		dotsData:true,
		dotsContainer:"#links_laterali"
	});
  
	$("#iniziative-e-novita").owlCarousel({
		loop:true,
		margin:30,
		nav:true,
		navText:["<span class='icomoon-arrow-left' aria-hidden='true'></span>","<span class='icomoon-arrow-right' aria-hidden='true'></span>"],
		responsive:{
		  0:{
		      items:1
		  },
		  600:{  //Questo � un breakpoint aggiuntivo per questo carosello, non � comune al resto del sito
		      items:2
		  },
		  768:{
		      items:2
		  },
		  992:{
		      items:3
		  },
		  1200:{
		      items:4
		  }
		}
	});

    /* ------------------------------- */
    
    //Post-processing degli oggetti Editoriali, per renderli Responsive
    
    //Tabelle
    $(".journal-content-article").find('.sisal-table').width("").wrap( "<div class='table-responsive'></div>" );
    
    
    //Immagini
    $("body:not(.homepage) .journal-content-article").find('img').each(function( index ) {
    	
    	//Rende tutte le immagini Responsive
    	$( this ).removeAttr("width").removeAttr("height").css({'width':"",'height':""}).addClass( "img-responsive" );
    	//$( this ).width("").height("").addClass( "img-responsive" );
    	
    	//Le immagini flottanti sono marcate con una classe per gestire successivamente il loro comportamento in Responsive
    	if ( $(this).css('float') == 'left' || $(this).css('float') == 'right')
    		$(this).addClass('originally-floated-image');
    });  
    
    //Eseguiamo la prima volta al Ready() in caso in cui il sito venga aperto direttamente in modalit� Mobile
    addClearingToImages_inResponsiveMode();
    
    //Eseguiamo anche al Resize della finestra
    $(window).resize( addClearingToImages_inResponsiveMode );
    
    function addClearingToImages_inResponsiveMode()
    {
    	//Larghezza del contenitore
    	var journalContentArticle_width = $('#page-content .journal-content-article').width();
    	
    	//$("body:not(.homepage) .journal-content-article").find('.originally-floated-image')
    	$('.originally-floated-image').each(function( index ) {
    			
    			//Larghezza della singola immagine
    	    	var currentImage_width = $(this).width();
    			
    	    	var rapportoDimensioneContenitoreImmagine = journalContentArticle_width / currentImage_width;
    	    	
    	    	//console.log("Contenitore: " + journalContentArticle_width);
    	    	//console.log("Immagine " + index + ": " + currentImage_width);
    	    	//console.log("Rapporto IMG " + index + ": " + rapportoDimensioneContenitoreImmagine);
    			
    			if ( rapportoDimensioneContenitoreImmagine <= 1.75)
    				$( this ).addClass( "clear-in-responsive-mode" );
    			else
    				$( this ).removeClass( "clear-in-responsive-mode" );
    	});
    }
    
    // -----------------------------------------------------------------------------------------------
    
    // TABS
    $( ".sisal-tabs" ).tabs();
    
    //TEXTAREA AUTO-EXPAND
    $('textarea').autoExpand();
    
    //Classe accessoria per stilizzare le Liste Ordinate OL
    $('#page-content ol li').wrapInner('<span class="ol-content"></span>');
	    
	    // ACCORDION
    
    // Lo Script seguente esegue i classici Accordion jQuery UI
    /*var icons = {
		header: "ui-icon-carat-1-s",
		activeHeader: "ui-icon-carat-1-n"
	};
    
    $( ".sisal-accordion" ).accordion({
      collapsible: true,
      heightStyle: "content",
      icons: icons,
      activate: function (event, ui) {
	        var scrollTop = $(".accordion").scrollTop();
	        if(!ui.newHeader.length) return;
	        var top = $(ui.newHeader).offset().top;
	        $("html,body").animate({
	            scrollTop: scrollTop + top - 35
	        }, "medium");
	    }
    });*/
    
    //Lo script seguente IMITA gli Accordion jQuery UI aggiungendo dinamicamente le classi apposite, ma consente anche l'apertura simultanea di pi� sezioni
    	    
    $(".sisal-accordion").addClass("ui-accordion ui-widget ui-helper-reset").find("> h2")
        .addClass("ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all").hover(function() { 
             $(this).toggleClass("ui-state-hover"); 
        })
        .prepend('<span class="ui-accordion-header-icon ui-icon ui-icon-carat-1-s"></span>').click(function() {
             $(this).toggleClass("ui-accordion-header-active ui-state-active ui-state-default ui-corner-bottom").find("> .ui-icon")
             	.toggleClass("ui-icon-carat-1-s ui-icon-carat-1-n").end().next().toggleClass("ui-accordion-content-active").slideToggle();
             
             //Eseguiamo la funzione che valuta la responsivit� delle immagini floattanti ogni volta che viene aperto un Accordion
             addClearingToImages_inResponsiveMode;
             
             return false;
    	})
        .next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();
    
    //Apre la prima Sezione al READY della pagina
    $(".sisal-accordion > h2:first-of-type").click();
    
    
    
    /*---------------- */
    
    // LOGOUT CONFIRMATION
    $( "#logout-confirm" ).dialog({
    	autoOpen: false,
    	draggable: false,
     	width: 'auto', // overcomes width:'auto' and maxWidth bug
        maxWidth: 600,
        height: 'auto',
        modal: true,
        fluid: true, //new option
        resizable: false,
     	
    	show: {
        	effect: "fade",
        	duration: 500
        },
        hide: {
        	effect: "fade",
        	duration: 500
        },
        
    	buttons : {
    		"logout": {
                click: function () {
                	var doLogout = $(this).data('doLogoutLink').href; // Get the stored result
                    $(location).attr('href', doLogout);
                },
                text: 'Logout',
                class: 'pulsante-conferma'
            },
            "cancel": {
                click: function () {
                	$(this).dialog("close");
                },
                text: 'Annulla',
                class: 'pulsante-annulla'
            }
    	},
    	
    	open:function() { replaceJQueryUIButtonsClass(); }

    });
    
	$( ".logout-link a" ).click(function(e) {
		e.preventDefault();
	    $( "#logout-confirm" ).data('doLogoutLink', this).dialog("open");
	});
	
	
	// Gestisce la comparsa del messaggio di errore in caso di USER o PASSWORD errate
	var login = getParameterByName('login');
	if (login=="failed"){
		$(".remember_me").before("<div class='text-error'>User ID o Password errata</div>");
	}
	if (login=="pwdExpired"){
		$(".remember_me").before("<div class='text-error'>Password Scaduta - Contattare l'amministratore di sistema</div>");
	}
	//Gestisce il redirecto alla home, nel caso da NON loggato si prova accedere a qualche pagina privata
	if ((getParameterByName("p_p_state") == "maximized") && ($("#_58_codice_ricevitoria").val() == "" && $("#_58_passowrd").val() == "")){
		window.location.href = updateQueryStringParameter(document.URL, "p_p_state", "normal");
	}
	
	// Gestisce la comparsa della form di PASSWORD DIMENTICATA
	$('.fakeInputText').keyup(function() {
		$('.fakeInputText').val($(this).val());
		$('#_58_screenName').val($('.fakeInputText').val());
	});
	        
	$(".fakeSubmitNextButton").click(function(){
		$(".realSubmit").click();
	});
	
	$('header .taglib-icon').hide();
	$('header .remember_me .taglib-icon').show();
	
	//Triggera automaticamente il secondo step della procedura di FORGOT PASSWORD
	if ( $('.forgotPasswordForm #_58_confirm').val() == 'true' )
	{
		$(".forgotPasswordForm .sendResetMail").click();
	}
	
	//Personalizzazione della portlet di CAMBIO PASSWORD AL PRIMO ACCESSO
	if( $('#portlet_new-password legend').length >0 )
	{
	   beautify_PortletNewPassword();
	}
	
	//Appende l'indicatore di LOADING al submit di tutte le FORM
	$('form').css('position','relative').append('<div class="bg-overlay" style="display:none;"><img src="/sisal-portal-responsive-theme/images/loading.gif"></div>');
	
	$('form .btn-primary').closest('form').submit(function (e) {
		showOverlayOnFormExecution(this,true);
	});
	
	//Rimuove il Loading dalla Form di Default di ForgotPassword che � nascosta
	$('form.forgotPasswordForm .bg-overlay').remove();
	

});






// ----------------------------------------------------------------------------------------------------------------

//Sostituisce i pulsanti jQueryUI nei Dialogs con i corrispondenti pulsanti del sito

function replaceJQueryUIButtonsClass()
{
	$( ".ui-dialog .pulsante-conferma" ).removeClass().addClass('btn btn-primary');
	$( ".ui-dialog .pulsante-annulla" ).removeClass().addClass('btn btn-default');
}

// Sostituisce i caratteri '_' con i caratteri '-' per splittare la stringa in una jtable

function replaceUnderscoreName(name){
	
	if(name.indexOf("__") > 0){
		name = name.replace(new RegExp('__','g'),'-');		
	}
	
	if(name.indexOf('_') > 0){	
		
		name = name.replace(new RegExp('_','g'),'-');
	}
	
	return name;
}

/* Le funzioni seguenti servono a rendere responsive e fluido il Dialog Jquery UI */

// on window resize run function
$(window).resize(function () {
    fluidDialog();
});

// catch dialog if opened within a viewport smaller than the dialog width
$(document).on("dialogopen", ".ui-dialog", function (event, ui) {
    fluidDialog();
});

function fluidDialog() {
    var $visible = $(".ui-dialog:visible");
    // each open dialog
    $visible.each(function () {
        var $this = $(this);
        var dialog = $this.find(".ui-dialog-content").data("ui-dialog");
        // if fluid option == true
        if (dialog.options.fluid) {
            var wWidth = $(window).width();
            // check window width against dialog width
            if (wWidth < (parseInt(dialog.options.maxWidth) + 50))  {
                // keep dialog from filling entire screen
                $this.css("max-width", "90%");
            } else {
                // fix maxWidth bug
                $this.css("max-width", dialog.options.maxWidth + "px");
            }
            //reposition dialog
            dialog.option("position", dialog.options.position);
        }
    });
}


//Funzioni utilizzate per gestire la comparsa del messaggio di errore in caso di USER o PASSWORD errate

function loginFailureRedirect(){
	$(".alert-error").hide();
	window.location.href='/web/portale-ricevitori/home?login=failed';
}

function pwdExpiredRedirect(){
	$(".alert-error").hide();
	window.location.href='/web/portale-ricevitori/home?login=pwdExpired';
}

function updateQueryStringParameter(uri, key, value) {
	  var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
	  var separator = uri.indexOf('?') !== -1 ? "&" : "?";
	  if (uri.match(re)) {
	    return uri.replace(re, '$1' + key + "=" + value + '$2');
	  }
	  else {
	    return uri + separator + key + "=" + value;
	  }
	}


function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}


//Personalizzazione della portlet di CAMBIO PASSWORD AL PRIMO ACCESSO
function beautify_PortletNewPassword()
{
	var $portletNewPassword = $('#portlet_new-password');
	
	
	$portletNewPassword.parent('#main-content').addClass('main-container block-group');
	
	$portletNewPassword.wrap('<article class="block-group una-colonna"><div id="page-content" class="block-group">');
	
	$portletNewPassword.find('.portlet-content, header, h1').removeClass();
	
	$portletNewPassword.find('.alert-info').hide();
	
	$portletNewPassword.find('legend').replaceWith( $('<h2>Modifica Password</h2>') );
	
	$portletNewPassword.find('h2').after('<p>' +
										 '  Di seguito &egrave; possibile impostare la password di accesso alla propria area personale.' +
										 '  <br>' +
										 '  &Egrave; necessario rispettare le seguenti regole:' +
										 '</p>' +
										 '<ul>' +
										 '  <li>Utilizzare da <strong>8</strong> a <strong>15</strong> caratteri</li>' +
										 '  <li>Almeno una lettera <strong>minuscola</strong></li>' +
										 '  <li>Almeno una lettera <strong>maiuscola</strong></li>' + 
										 '  <li>Almeno una <strong>cifra</strong></li>' + 
										 '</ul>' +
										 '<br><br>');
	
	var $form = $portletNewPassword.find('form');
	
	$form.addClass('block-group form-horizontal')
	
	$form.find('label').addClass('block');
	$form.find('input').addClass('form-control').wrap('<div class="block fields"></div>');
	$form.find('button').wrap('<div class="block-group control-group"><div class="block fields form-buttons_container"></div></div>');
	
	  //Le righe seguenti spostano la Portlet in questione in una modale
	  $('#page-content').height( $('#page-content').height() );
	  var mainContainerWidth = $('.main-container').width();
	
	  $('#portlet_new-password').dialog({
	    	autoOpen: true,
	    	draggable: false,
	     	width: mainContainerWidth, // overcomes width:'auto' and maxWidth bug
	      maxWidth: 900,
	      dialogClass:'main-container',
	      height: 'auto',
	      closeOnEscape: false,
	      modal: true,
	      fluid: true, //new option
	      resizable: false,
	      title: "Nuova Password",
	      open:function() {
	        $('.ui-dialog-titlebar-close').hide();
	        $('#portlet_new-password').removeClass('portlet').css('padding','0 30px');
	      }
	  });  
	
}

// Rimuove i duplicati delle breadcrumb
function cleanDuplicateBreadcrumbs(num_li)
{
	  
  var textToBeChecked=$('.breadcrumb li:nth-of-type('+num_li+') a').text();

  var objectChecked=$('.breadcrumb li:nth-of-type('+(num_li-1)+') a');

  if(objectChecked.text() == textToBeChecked)
  {
		objectChecked.parent().hide();
  }
}

// Questa funzione pu� essere richiamata nelle chiamate Ajax per mostrare uno sfondo bianco a tutto schermo durante l'esecuzione.

/*function showOverlayOnAjaxExecution(pulsante, showOrNot) 
{
	if(showOrNot == 1)
	{
		//Aggiunge il "contenuto" di #bg-overlay_container (copiandolo) alla form che contiene il pulsante cliccato 
		$(pulsante).closest('form').css('position','relative').append( $('#bg-overlay_container').html() );
	}
	else
		$('form').remove( $('.bg-overlay') );
}*/

//Questa funzione viene eseguita al submit di una qualsiasi FORM per mostrare uno sfondo bianco a tutto schermo durante l'esecuzione.

function showOverlayOnFormExecution(pulsante, showOrNot) 
{
	if(showOrNot == 1)
	{
		//Aggiunge il "contenuto" di #bg-overlay_container (copiandolo) alla form che contiene il pulsante cliccato 
		$(pulsante).closest('form').find('.bg-overlay').show();
	}
	else
		$('form .bg-overlay').hide();
}

//Nel caso in cui il LOADING debba essere mostrato al click di un pulsante durante una chiamata AJAX, deve essere richiamata MANUALMENTE questa funzione al lancio della chiamata passando
//il valore TRUE, e al termine della chiamata AJAX passando FALSE per spegnere l'immagine

function showOverlayOnButtonClick(pulsante, showOrNot) 
{
	if(showOrNot == 1)
	{
		//Aggiunge il "contenuto" di #bg-overlay_container (copiandolo) alla form che contiene il pulsante cliccato 
		$(pulsante).parent().css('position','relative').append('<div class="bg-overlay"><img src="/sisal-portal-responsive-theme/images/loading.gif" style="transform:scale(0.5,0.5)"></div>');
	}
	else
		$('.bg-overlay').hide();
}




//Funzione per il controllo della versione del Browser in uso

function showOLD_BrowsersWarningDialog()
{
	$.reject({  
	    reject: {  
	        /*safari: true, // Apple Safari  
	        chrome: true, // Google Chrome  
	        firefox: true, // Mozilla Firefox  
	        msie: true, // Microsoft Internet Explorer  
	        opera: true, // Opera  
	        konqueror: true, // Konqueror (Linux)  
	        unknown: true // Everything else*/
	    	msie: 8 // Covers MSIE <= 6 (Blocked by default) 
	    },
	    browserInfo: { // Settings for which browsers to display  
	        chrome: {  
	            // Text below the icon  
	            text: 'Google Chrome 15.0',  
	            // URL For icon/text link  
	            url: 'http://www.google.com/chrome/',  
	            // (Optional) Use "allow" to customized when to show this option  
	            // Example: to show chrome only for IE users  
	            // allow: { all: false, msie: true }  
	        },  
	        firefox: {  
	            text: 'Mozilla Firefox 15.0',  
	            url: 'http://www.mozilla.com/firefox/'  
	        },  
	        safari: {  
	            text: 'Safari 5.0',  
	            url: 'http://www.apple.com/safari/download/'  
	        },  
	        opera: {  
	            text: 'Opera 10.0',  
	            url: 'http://www.opera.com/download/'  
	        },  
	        msie: {  
	            text: 'Internet Explorer 9.0',  
	            url: 'http://www.microsoft.com/windows/Internet-explorer/'  
	        }  
	    }, 
        // Path where images are located  
	    imagePath: '/sisal-portal-responsive-theme/js/jReject-master/images/',
	    
	    header: 'ATTENZIONE! Stai utilizzando un Browser obsoleto', // Header Text  
	    paragraph1: 'Stai tentando di accedere al sito utilizzando un Browser molto vecchio e di conseguenza non &egrave; garantita la corretta visualizzazione.<br>Il sito &egrave; utilizzabile comunque, ma la visione migliore si otterr&agrave; utilizzando uno dei seguenti browser aggiornati (a partire <u>almeno</u> dalle versioni indicate):', // Paragraph 1  
	    paragraph2: '<strong>In generale, l\'aggiornamento all\'ultima versione disponibile di uno qualsiasi dei Browser indicati &egrave; caldamente consigliato, non solo per ottenere una resa grafica ottimale, ma anche perch&eacute; un <u>Browser obsoleto</u>  &egrave; maggiormente <u>vulnerabile agli attacchi dall\'esterno</u>.</strong>',
	    closeMessage: '<em>Chiudendo questa finestra senza aggiornare il Browser,<br>prendi atto che &egrave; possibile che il sito non venga visualizzato correttamente</em>', // Message below close window link
	    closeLink: 'Chiudi questa finestra',
	    
	    // Allows closing of window with esc key  
	    closeESC: true,  
	    // Use cookies to remmember if window was closed previously?  
	    closeCookie: false
	});
}
