//Gestisce la creazione delle TABS jQuery UI
function initialize_JQueryUI_ThemeTabs( DOM_object )
{
  $(DOM_object).tabs({
    show: 
    {
      effect: "fade",
      duration: 1000
    },
    hide: 
    {
      effect: "slide",
      duration: 1000
    }
  });
}