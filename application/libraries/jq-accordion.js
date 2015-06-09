//Gestisce la creazione degli ACCORDION jQuery UI
function initialize_JQueryUI_ThemeAccordion(DOM_object)
{
  $(DOM_object).each(function()
  {
    if( $(this).attr('data-multi_open') )
    {
      initialize_JQueryUI_ThemeAccordionMultiOpen(this);
    }
    else
    {  
      var icons = {
		header: "ui-icon-carat-1-s",
		activeHeader: "ui-icon-carat-1-n"
	};
    
      $(this).accordion({
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
      });
    }
  });
  
  
  
  //Gestisce la creazione dei "finti" ACCORDION jQuery UI (con possibilità di avere più sezioni aperte contemporaneamente)
  function initialize_JQueryUI_ThemeAccordionMultiOpen(DOM_object)
  {
    //Lo script seguente IMITA gli Accordion jQuery UI aggiungendo dinamicamente le classi apposite, ma consente anche l'apertura simultanea di più sezioni
  
    $(DOM_object).addClass("ui-accordion ui-widget ui-helper-reset").find("> h2")
      .addClass("ui-accordion-header ui-state-default ui-accordion-icons ui-corner-all").hover(function() 
      { 
        $(this).toggleClass("ui-state-hover"); 
      })
      .prepend('<span class="ui-accordion-header-icon ui-icon ui-icon-carat-1-s"></span>').click(function() 
      {
        $(this).toggleClass("ui-accordion-header-active ui-state-active ui-corner-all ui-corner-top")
               .find("> .ui-icon").toggleClass("ui-icon-carat-1-s ui-icon-carat-1-n").end().next().toggleClass("ui-accordion-content-active").slideToggle();
         
        //Eseguiamo la funzione che valuta la responsività delle immagini floattanti ogni volta che viene aperto un Accordion
        //addClearingToImages_inResponsiveMode;   //Utilizzata in Sisal. Per il momento qui non serve
         
        return false;
      })
      .next().addClass("ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom").hide();
  
    //Apre la prima Sezione al READY della pagina
    $( DOM_object ).find(" > h2:first-of-type").click();
  }
  
}