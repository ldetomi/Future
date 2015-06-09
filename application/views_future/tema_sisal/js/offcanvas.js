$( document ).ready(function() 
{
  //Eseguiamo la prima volta al Ready() in caso in cui il sito venga aperto direttamente in modalità Mobile
  move_firstLevelNavigation();
  
  //Eseguiamo anche al Resize della finestra
  $(window).resize( move_firstLevelNavigation );
  
  $('#toggle-nav').click(function()
  {
    $('#main-content').toggleClass('menu-opened');
  });
  
});

function move_firstLevelNavigation()
{
  if ( $(window).width() <= 768)
  {
    $('#first-level-navigation').insertBefore('#second-level-navigation');
    //$('#first-level-navigation_container .breadcrumb').insertAfter('#main-navigation_container');
    var navColumnHeight = $('#multi-level-navigation_container').height();
    $('#main-content').css( 'min-height' , navColumnHeight+'px' );
  } 
  else
  {
    $('#first-level-navigation').insertBefore('#first-level-navigation_container .breadcrumb');
    //$('header breadcrumb').insertAfter('#main-navigation_container');
    $('#main-content').css( 'min-height' , '' );
  } 
}


