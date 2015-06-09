$(document).ready(function() 
{	
  //DIALOGS (finestre modali)
    //Inizializza i DIALOGS jQuery UI sugli oggetti identificati dalla classe CSS passata come parametro
    initialize_JQueryUI_ThemeDialogs('[class*="jq-dialog-"]','.jq-open-dialog');
    //initialize_JQueryUI_ThemeConfirms('[class*="jq-dialog_confirm-"]','.jq-open-dialog_confirm');
    
  //COLLAPSE (Box a scomparsa)
    //Inizializza i BOX A SCOMPARSA sugli oggetti identificati dalla classe CSS passata come parametro
    initialize_CollapsedItems('.jq-collapse','.jq-collapse-toggle');
    
  //AVVISI IN PAGINA
    //Inizializza i Box di Notifica in pagina
    initialize_BoxNotifiche('[class*="notifica-"]','.jq-box_notifica-open','#notifiche_container');

  //TABS
    //Inizializza le TABS jQuery UI sugli oggetti identificati dalla classe CSS passata come parametro
    initialize_JQueryUI_ThemeTabs('.jq-tabs');
  
  //ACCORDION
    //Inizializza gli ACCORDION jQuery UI sugli oggetti identificati dalla classe CSS passata come parametro
    initialize_JQueryUI_ThemeAccordion('.jq-accordion');  
  
  //POST-PROCESSING degli oggetti editoriali al fine di renderli RESPONSIVE
    makeResponsive_editorialElements();
    
  //TEXTAREA AUTO-EXPAND
    $('textarea').autoExpand();





 
    
    
    
  //Esegue il controllo della versione del Browser in uso e visualizza l'eventuale messaggio di avvertimento.
  /*
    showOLD_BrowsersWarningDialog();
  */  
  
  //Classe accessoria per stilizzare le Liste Ordinate OL
  /*
    $('#page-content ol li').wrapInner('<span class="ol-content"></span>');   //Così com'è funziona in SISAL. Verificare se serve anche qui, forse vale la pena solo come post-processing di un eventuale lista editoriale.
  */
  

  

  /*
  // Aggiunge le classi css per gestire il Responsive sugli elementi
  var sizes={'size_xs':480,'size_sm':769,'size_md':992,'size_lg':1200};

  set_BlockWidthClass(sizes);

  $(window).on('resize', function(){
    set_BlockWidthClass(sizes);
  });*/
});



/*** FUNZIONI RICHIAMATE AL READY DELLA PAGINA ***********************************************************/




function initialize_BoxNotifiche( DOM_object, buttonTriggered, container )        //Al momento non viene gestita la presenza di più avvisi accodati
{
  addClosingButtonToBoxNotifiche(DOM_object);
  
  $( DOM_object + '.hidden' ).hide();
  
  $(buttonTriggered).on('click',function(event)
  {
    event.preventDefault();
    var boxToBeOpened = $(this).attr('data-target');
    var position = $(this).attr('data-type');
    
    if( $(this).attr('data-fixed') )
      $(boxToBeOpened).addClass('fixed');
    else
      $(boxToBeOpened).appendTo(container);
    
    $(boxToBeOpened).slideDown().animate({opacity:1}, 1500);
    
    if( $(this).attr('data-autoclose') )
      $(boxToBeOpened).delay(3000).animate({opacity:0},1500).slideUp();
  });
  
  
  
  //Aggiunge pulsante di chiusura ai messaggi di avviso in pagina
  function addClosingButtonToBoxNotifiche(DOM_object)
  {  
    var classPrefix = DOM_object.replace('[class*="','').replace('"]','');
  
    //Per ogni Alert "dismissible" estrae dal nome della classe CSS il suffisso che indica il 'tipo' e usa questa informazione per creare un pulsante di chiusura un aspetto coerente
    $( DOM_object + '.dismissible' ).each(function() 
    {
      var className = this.className;

      var cls = $.map(this.className.split(' '), function (val, i) {
        if (val.indexOf(classPrefix) > -1) {
            return val.slice(classPrefix.length, val.length)
        }
      });

      var classSuffix = cls.join(' ');
    
      $(this).prepend("<button class='btn-"+classSuffix+" close-notifica sm' title='Chiudi'>X</button>");
    });
   
    $('.close-notifica').on('click',function()
    {
      $(this).closest(DOM_object).animate({opacity:0},1500).slideUp();
    });
  }
  
  
}


//Gestisce la creazione dei BOX A SCOMPARSA
function initialize_CollapsedItems( DOM_objectToBeOpened, buttonTriggered )
{
  $(buttonTriggered).wrap('<span class="jq-trigger-button_container"></span>').each(function() 
  {
    if( $(this).is('a') )
    {
      $(this).closest(".jq-trigger-button_container").prepend('<span class="icomoon-circle-right"></span>');
    }
    else
      $(this).prepend('<span class="icomoon-circle-right"></span>');
  });
  
  $(buttonTriggered).on('click',function(event)
  {
    event.preventDefault();
    $(this).closest(".jq-trigger-button_container").toggleClass('open');
    var boxToBeOpened = $(this).attr('data-target');
    $( boxToBeOpened ).toggleClass('opened');
  });
}






// -----------------------------------------------------------------------------------------

//Gestisce il POST-PROCESSING degli oggetti editoriali al fine di renderli RESPONSIVE
function makeResponsive_editorialElements() 
{
  //Tabelle
    $("table").width("").wrap( "<div class='table-responsive'></div>" );
    
  //Immagini
  /*$("body:not(.homepage) .journal-content-article").find('img').each(function( index )                                       //AL MOMENTO NON ESEGUITA!!!!!!!!!!!!!
  {  	
    //Rende tutte le immagini Responsive
      $(this).width("").height("").addClass( "img-responsive" );
    	
    //Le immagini flottanti sono marcate con una classe per gestire successivamente il loro comportamento in Responsive
      if ( $(this).css('float') == 'left' || $(this).css('float') == 'right' )
        $(this).addClass('originally-floated-image');
  });*/  
    
  //Eseguiamo la prima volta al Ready() in caso in cui il sito venga aperto direttamente in modalità Mobile
  //addClearingToImages_inResponsiveMode();                                                                                   //AL MOMENTO NON ESEGUITA!!!!!!!!!!!!!
    
  //Eseguiamo anche al Resize della finestra
  //$(window).resize( addClearingToImages_inResponsiveMode );                                                                 //AL MOMENTO NON ESEGUITA!!!!!!!!!!!!!
}

//Gestisce il comportamento delle immagini editoriali in Responsive
function addClearingToImages_inResponsiveMode()                                              //RICHIAMATA DALLA FUNZIONE PRECEDENTE. AL MOMENTO NON ESEGUITA!!!!!!!!!!!!!
{
  //Larghezza del contenitore
  var journalContentArticle_width = $('.journal-content-article').width();

  //$("body:not(.homepage) .journal-content-article").find('.originally-floated-image')
  $('.originally-floated-image').each(function( index ) 
  {
    //Larghezza della singola immagine
    var currentImage_width = $(this).width();
    var rapportoDimensioneContenitoreImmagine = journalContentArticle_width / currentImage_width;
      
    if ( rapportoDimensioneContenitoreImmagine <= 1.75)
      $( this ).addClass( "clear-in-responsive-mode" );
    else
      $( this ).removeClass( "clear-in-responsive-mode" );
  });
}









//Aggiunge le classi css per gestire il Responsive sugli elementi 
function set_BlockWidthClass(sizes)
{
  $('section').each(function()
  {
     var blockWidth = parseInt($(this).css('width'));
     
     $(this).removeClass('xs sm md lg');
     if( blockWidth <= sizes['size_xs'] )
       $(this).addClass('xs');
     else if( blockWidth <= sizes['size_sm'] )
       $(this).addClass('sm');
     else if( blockWidth <= sizes['size_md'] )
       $(this).addClass('md');
     else
       $(this).addClass('lg');
  });
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
















/**************************************************************/

function handleAJAXErrors(xhr,fun_name)
{
    if(environment=='dev')
       alert(inspectObject(xhr,'Errore in '+fun_name+'\n'));
}

function inspectObject(obj,str,indent,depth)
{
   if(typeof(str)=='undefined')
	  str='';

   var tmp=str;

   if(typeof(indent)=='undefined')
      indent=' ';
   else
      for(var j=0;j<depth;j++)
         indent+=' ';

   if(typeof(depth)=='undefined')
      depth=0;
   else
      depth++;

   for(i in obj)
   {
   	  //if(typeof(obj[i])=='object')
   	  //	 tmp+=inspectObject(obj,'',indent,depth);
      if(typeof(obj[i])!='function')
         tmp+=indent+i+' => '+obj[i]+'\n';
   }
   return(tmp);
}

function convertToCamelCase(str)
{
    if(str=='' || typeof(str)=='undefined' || str==null)
        return('');
        
    var str_array=str.split(' ');
    var camel_string='';
    for(var i=0;i<str_array.length;i++)
    {
//alert(str_array);
       if(str_array[i]==' ')    
          continue;
//alert('>'+str_array[i]+'<');
       var curr_str=str_array[i].toLowerCase();
       curr_str=curr_str[0].toUpperCase()+curr_str.substring(1,curr_str.length);
       
       camel_string+=curr_str;
       if(i<str_array.length-1)
           camel_string+=' ';
    }
   
    return(camel_string);
}

function intersect(a, b)
{
    var t;
    if (b.length > a.length) t = b, b = a, a = t; // indexOf to loop over shorter
    return a.filter(function (e) {
        if (b.indexOf(e) !== -1) return true;
    }).filter(function (e, i, c) { // extra step to remove duplicates
        return c.indexOf(e) === i;
    });
}