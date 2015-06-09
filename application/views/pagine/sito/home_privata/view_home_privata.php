<?php
print($doc_type);
$_CI =& get_instance();
?>
<html class='aui'>
<head>
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/css/alloy-bootstrap/bootstrap-2.3.2.min.css">
  
 <?php

    if(isset($meta_tags) && is_array($meta_tags))
      foreach ($meta_tags as $tag)
          print(html_entity_decode($tag)."\n");


    /* Carica fogli di stile e librerie javascript, comuni e specifiche */
    if(isset($js_headers) && is_array($js_headers))
      foreach ($js_headers as $script)
          print(html_entity_decode($script)."\n");
  ?>
  
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/js/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/js/owl-carousel/assets/owl.theme.default.css">
  
  <title><?php print($nome_sito);?></title>
</head>

<body id='<?php print($page_tag);?>' class='homepage'>
  <div class="main-container">
    <?php print($header);?>
  </div>

  <div id="main-carousel_container" class='block-group'>
    <div class="main-container" class='block-group'>
      <div id='links_laterali' class='block'></div>
      <div id="contenitore_carosello" class='block'>
        <div id="hp-privata_main_carousel" class="owl-carousel">
          <div data-dot="<div class='item-link_laterale owl-dot'><span>In Primo Piano</span></div>">
            <img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_main_carousel.png" alt="hp-privata_main_carousel.png - 216,1 KB" />
          </div>
          <div data-dot="<div class='item-link_laterale owl-dot'><span>Allestimento</span></div>">
            <img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_main_carousel.png" alt="hp-privata_main_carousel.png - 216,1 KB" />
          </div>
          <div data-dot="<div class='item-link_laterale owl-dot'><span>Iniziative Speciali</span></div>">
            <img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_main_carousel.png" alt="hp-privata_main_carousel.png - 216,1 KB" />
          </div>
          <div data-dot="<div class='item-link_laterale owl-dot'><span>Help Center</span></div>">
            <img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_main_carousel.png" alt="hp-privata_main_carousel.png - 216,1 KB" />
          </div>
          <div data-dot="<div class='item-link_laterale owl-dot'><span>Procedure</span></div>">
            <img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_main_carousel.png" alt="hp-privata_main_carousel.png - 216,1 KB" />
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div id='contenuto-centrale'>
    <div class="main-container">
    
      <div id="iniziative-e-novita_container" class="block-group">
        <h1>Iniziative e novità</h1>
        <div id="iniziative-e-novita" class="owl-carousel">
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_1.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_2.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_3.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_4.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_1.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_2.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_3.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
          <div><img src="http://www.mediagate.it/future/application/views/pagine/home_privata/images/hp-privata_iniziative-e-novita_carousel_4.png" alt="hp-privata_iniziative-e-novita_carousel.png - 43,8 KB" /></div>
        </div>
      </div>
      
      <div id="my-homepages_container">
        <div id="my-homepages" class="block-group">
          <h1>My HomePage</h1>
          <p class='maggiori_indicazioni'>
            <?php $_CI->buildCustomTextBlock('span','benvenuto','environment_is_dev','environment_is_dev');?>
          </p>
          <div class="block">
            <a href='#' class="box">
              <h3>Il mio Punto di Vendita</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <button type="submit" class="btn btn-default">X</button>
            </a>
          </div>
          <div class="block">
            <a href='#' class="box">
              <h3>Periodo Contabile</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <button type="submit" class="btn btn-default">X</button>
            </a>
          </div>
          <div class="block">
            <a href='#' class="box">
              <h3>Le mie Locandine</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <button type="submit" class="btn btn-default">X</button>
            </a>
          </div>
          <div class="block">
            <a href='#' class="box">
              <h3>Superenalotto</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
              <button type="submit" class="btn btn-default">X</button>
            </a>
          </div>
        </div>
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
      
    });
</script>
  <!-- JS -->
  
</body>
</html>
