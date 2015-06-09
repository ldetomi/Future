<?php print($doc_type); ?>

<?php $_CI =& get_instance(); ?>

<html class='aui'>
<head>
  
  <link rel="stylesheet" href="<?php print(base_url());?>application/views/tema/css/alloy-bootstrap/bootstrap-2.3.2.min.css">
  
  <?php
    if(isset($meta_tags) && is_array($meta_tags))
      foreach ($meta_tags as $tag)
          print(html_entity_decode($tag)."\n");

   /* Carica fogli di stile e librerie javascript, comuni e specifiche */
    if(isset($js_headers) && is_array($js_headers))
      foreach ($js_headers as $script)
          print(html_entity_decode($script)."\n");
  ?>
  
  <link rel="stylesheet" href="<?php print(base_url());?>application/views/tema/js/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="<?php print(base_url());?>application/views/tema/js/owl-carousel/assets/owl.theme.default.css">
  
  <script src="<?php print(base_url());?>application/third_party/ckeditor/ckeditor.js"></script>
  <script src="<?php print(base_url());?>application/third_party/ckeditor/adapters/jquery.js"></script>
  <script src="<?php print(base_url());?>application/JS/content_editable/content_editable.js"></script>

  <title><?php print($nome_sito);?> Pagina 1 Colonna</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
            <h1>Lorem ipsum dolor</h1>
            <p>
              <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
              <br><br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?
            </p>
            <p>
              <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
              <br><br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?
            </p>
            <ul>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do? Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?</li>
            </ul>
            <p>
              <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
              <br><br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?
            </p>
            <ul>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do? Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?</li>
            </ul>
            <p>
              <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
              <br><br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?
            </p>
          
        </div>        
      </article>
    
    </div>
  
  </div>
  
  <?php print($footer);?>
 
  <!-- JS -->
  <script src="<?php print(base_url());?>application/views/tema/js/offcanvas.js"></script>
  <script src="<?php print(base_url());?>application/views/tema/js/mega-menu/booNavigation.js"></script>
  <script>
    $('.booNavigation').booNavigation({
        slideSpeed: 600,
        fadeSpeed: 400,
        delay: 200
    });
</script>
  
</body>
</html>
