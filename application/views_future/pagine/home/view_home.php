<?php print($doc_type);?>
<html class='aui'>
<head> 
  
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/css/alloy-bootstrap/bootstrap-2.3.2.min.css">
  
 <?php
    /* Carica fogli di stile e librerie javascript, comuni e specifiche */

    if(isset($meta_tags) && is_array($meta_tags))
      foreach ($meta_tags as $tag)
          print(html_entity_decode($tag)."\n");

    if(isset($js_headers) && is_array($js_headers))
      foreach ($js_headers as $script)
          print(html_entity_decode($script)."\n");
  ?>
  
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/js/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/js/owl-carousel/assets/owl.theme.default.css">
  
  <title><?php print($nome_sito);?></title>
</head>
<body id='<?php print($page_tag);?>' class='homepage'>

  <?php print($header);?>
   
  <div id='barra_rete-sisal'>
    <div class="main-container">
      <button type="button" class="btn btn-success btn-lg">Diventa Retailer Sisal</button>
      <h1>Entra anche tu nella rete di punti vendita Sisal<h1>
    </div>
  </div>
  
  <div id="hp-pubblica_main_carousel" class="owl-carousel">
    <div><img src="http://www.mediagate.it/future/application/views/pagine/home/images/hp-pubblica_main_carousel_2.png" alt="hp-pubblica_main_carousel.png - 764,8 KB" /></div>
    <div><img src="http://www.mediagate.it/future/application/views/pagine/home/images/hp-pubblica_main_carousel_3.png" alt="hp-pubblica_main_carousel.png - 764,8 KB" /></div>
  </div>
  
  <div id='contenuto-centrale'>
    <div class="main-container">
          
      <div id="blocchi_canale" class="block-group">
        <div class="block">
          <a href='#' class="box">
            <div class='logo_canale'>
              <img src="http://www.mediagate.it/future/application/views/pagine/home/images/hp-pubblica_logo-canale_1.png" alt="hp-pubblica_logo-canale.png - 12,5 KB" />
            </div>
            <div class='contenuto'>
              <h3>Eat Drink Play</h3>
              Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Lorem ipsum dolor sit amet, consectetur adipisci elit, sed 
            </div>
          </a>
        </div>
        <div class="block">
          <a href='#' class="box">
            <div class='logo_canale'>
              <img src="http://www.mediagate.it/future/application/views/pagine/home/images/hp-pubblica_logo-canale_2.png" alt="hp-pubblica_logo-canale.png - 12,5 KB" />
            </div>
            <div class='contenuto'>
              <h3>Il Punto vincente del Gioco</h3>
              Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Lorem ipsum dolor sit amet, consectetur adipisci elit, sed 
            </div>
          </a>
        </div>
        <div class="block">
          <a href='#' class="box">
            <div class='logo_canale'>
              <img src="http://www.mediagate.it/future/application/views/pagine/home/images/hp-pubblica_logo-canale_3.png" alt="hp-pubblica_logo-canale.png - 12,5 KB" />
            </div>
            <div class='contenuto'>
              <h3>Giochi e servizi con un touch in più</h3>
              Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Lorem ipsum dolor sit amet, consectetur adipisci elit, sed 
            </div>
          </a>
        </div>
        <div class="block">
          <a href='#' class="box">
            <div class='logo_canale'>
              <img src="http://www.mediagate.it/future/application/views/pagine/home/images/hp-pubblica_logo-canale_4.png" alt="hp-pubblica_logo-canale.png - 12,5 KB" />
            </div>
            <div class='contenuto'>
              <h3>Punti di Vendita affiliati</h3>
              Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat. Lorem ipsum dolor sit amet, consectetur adipisci elit, sed 
            </div>
          </a>
        </div>
      </div>
      
      <div id='box_info-utili'>
        <img src="http://www.mediagate.it/future/application/views/pagine/home/images/hp-pubblica_banner_info-utili.png" alt="hp-pubblica_banner_info-utili.png - 90,8 KB" />
      </div>
      
    </div>
  </div>

  <?php print($footer);?>
 
  <!-- JS -->
  <script src="http://www.mediagate.it/future/application/views/tema/js/offcanvas.js"></script>
  <script src="http://www.mediagate.it/future/application/views/tema/js/mega-menu/booNavigation.js"></script>
  <script>
    $('.booNavigation').booNavigation({
        slideSpeed: 600,
        fadeSpeed: 400,
        delay: 200
    });
</script>
<script src="http://www.mediagate.it/future/application/views/tema/js/owl-carousel/owl.carousel.js"></script>
<script src="http://www.mediagate.it/future/application/views/tema/js/background-check/background-check.js"></script>
<script>
    $(document).ready(function() {
      
      $("#hp-pubblica_main_carousel").owlCarousel({
        loop:true,
        items:1,
        margin:10,
        nav:true,
        navText:["<span class='icomoon-arrow-left' aria-hidden='true'></span>","<span class='icomoon-arrow-right' aria-hidden='true'></span>"],
        onInitialized:background_Check,
        onTranslated:BackgroundCheck.refresh
      });
      
    });
</script>
  <!-- JS -->
  
</body>
</html>
