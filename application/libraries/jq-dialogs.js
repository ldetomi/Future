//Gestisce la creazione dei DIALOGS jQuery UI
function initialize_JQueryUI_ThemeDialogs( DOM_objectToBeOpened, buttonTriggered )
{
  $(buttonTriggered).on('click',function(event)
  {
    event.preventDefault();
    var dataTarget = $(this).attr('data-target');
    var dataContent = $(this).attr('data-content');
    var dataRemote = $(this).attr('data-remote');
    
    if( dataTarget != undefined )
      $(dataTarget).dialog("open");
      
    else if( dataContent != undefined )
      $('<div />').html(dataContent).dialog();
      
    else if( dataRemote != undefined )
      alert('Dovrebbe aprire il dialog da un url remoto');
    
  });

  $(DOM_objectToBeOpened).dialog({
    autoOpen: false,
    draggable: false,
    width: 'auto', // overcomes width:'auto' and maxWidth bug
    maxWidth: 600,
    height: 'auto',
    modal: true,
    fluid: true, //new option
    resizable: false,
    show: 
    {
      effect: "fade",
      duration: 500
    },
    hide: 
    {
      effect: "fade",
      duration: 500
    },
    buttons: 
    {
      "chiudi": 
      {
        click: function () 
        {
          $(this).dialog("close");
	},
        text: 'Chiudi',
        class: 'pulsante-annulla'
      }
    },
    open:function() 
    { 
      //var classPrefix = DOM_objectToBeOpened.replace('[class*="','').replace('"]','');
      //$(this).closest('.ui-dialog').addClass(classPrefix + '_container');
      replaceJQueryUIButtonsClass(); 
    }
  });
}

/*
//Gestisce la creazione dei CONFIRMS jQuery UI al click di un link                     // (valutare di unire tutto in una sola funzione, controllando il valore dell'attributo data-open-type)
function initialize_JQueryUI_ThemeConfirms( DOM_objectToBeOpened, buttonTriggered )
{
  $(buttonTriggered).on('click',function(event)
  {
    event.preventDefault();
    var dataAction;
    var dialogToBeOpened = $(this).attr('data-target');
    
    console.log($(this).attr('data-action'));
    
    //if(typeof $(this).attr('data-action') !== undefined && $(this).attr('data-action') !== false)
     // dataAction = $.parseJSON($(this).attr('data-action'));

   
 //(data.callback)();

      
      
    $(dialogToBeOpened).data('goToLink', this).dialog("open");
  });

  $(DOM_objectToBeOpened).dialog({
    autoOpen: false,
    draggable: false,
    width: 'auto', // overcomes width:'auto' and maxWidth bug
    maxWidth: 600,
    height: 'auto',
    modal: true,
    fluid: true, //new option
    resizable: false,
    show: 
    {
      effect: "fade",
      duration: 500
    },
    hide: 
    {
      effect: "fade",
      duration: 500
    },    
    buttons:
    {
      "link":
      {
        click: function () 
        {
            var goTo = $(this).data('goToLink').href;
            $(location).attr('href', goTo);
        },
        text: 'OK',
        class: 'pulsante-conferma'
      },
      "chiudi": 
      {
        click: function () 
        {
          $(this).dialog("close");
        },
        text: 'Annulla',
        class: 'pulsante-annulla'
      }
    },
    open:function() { replaceJQueryUIButtonsClass(); }
  });
}*/


//Sostituisce i pulsanti jQueryUI nei Dialogs con i corrispondenti pulsanti del sito
function replaceJQueryUIButtonsClass()
{
  $( ".ui-dialog .pulsante-conferma" ).removeClass().addClass('btn btn-primary');
  $( ".ui-dialog .pulsante-annulla" ).removeClass().addClass('btn btn-default');
}

// Le funzioni seguenti servono a rendere responsive e fluido il Dialog Jquery UI

// on window resize run function
$(window).resize(function () {
  fluidDialog();
});

// catch dialog if opened within a viewport smaller than the dialog width
$(document).on("dialogopen", ".ui-dialog", function (event, ui) {
  fluidDialog();
});

function fluidDialog() 
{
  var $visible = $(".ui-dialog:visible");
  // each open dialog
  $visible.each(function () 
  {
    var $this = $(this);
    var dialog = $this.find(".ui-dialog-content").data("ui-dialog");
    // if fluid option == true
    if (dialog.options.fluid) 
    {
      var wWidth = $(window).width();
      // check window width against dialog width
      if (wWidth < (parseInt(dialog.options.maxWidth) + 50))
      {
        // keep dialog from filling entire screen
        $this.css("max-width", "90%");
      }
      else 
      {
        // fix maxWidth bug
        $this.css("max-width", dialog.options.maxWidth + "px");
      }
      //reposition dialog
      dialog.option("position", dialog.options.position);
    }
  });
}