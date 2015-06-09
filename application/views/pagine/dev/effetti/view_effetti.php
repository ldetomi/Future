<?php print($doc_type); ?>

<?php $_CI =& get_instance(); ?>

<html class='aui'>
<head>
  
  <!-- <link rel="stylesheet" href="<?php print(base_url());?>application/views/tema/css/alloy-bootstrap/bootstrap-2.3.2.min.css"> -->
  
  <?php
    if(isset($meta_tags) && is_array($meta_tags))
      foreach ($meta_tags as $tag)
          print(html_entity_decode($tag)."\n");

   /* Carica fogli di stile e librerie javascript, comuni e specifiche */
    if(isset($js_headers) && is_array($js_headers))
      foreach ($js_headers as $script)
          print(html_entity_decode($script)."\n");
  ?>
  
  <title><?php print($nome_sito);?> DEMO Effetti</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
        
          <h3>Classe "animated-zoom"</h3>
          <p>Assegnando la classe <code>animated-zoom</code> si ottiene un'animazione sullo zoom della scritta.</p>
          <p class='animated-zoom'>
            ATTENZIONE!!! Questo messaggio ha un effetto Zoom.
          </p>
          <br>
          
          <h3>Classe "blink"</h3>
          <p>Assegnando le classi <code>blink-default</code>, <code>blink-primary</code>, ecc. si ottiene un effetto "Blink" animato sulle scritte, che segue il rispettivo tema colore.</p>
          <p class='blink-default'>
            Caricamento in corso - (DEFAULT)...
          </p>
          <p class='blink-primary'>
            Caricamento in corso - (PRIMARY)...
          </p>
          <p class='blink-success'>
            Caricamento in corso - (SUCCESS)...
          </p>
          <p class='blink-info'>
            Caricamento in corso - (INFO)...
          </p>
          <p class='blink-warning'>
            Caricamento in corso - (WARNING)...
          </p>
          <p class='blink-danger'>
            Caricamento in corso - (DANGER)...
          </p>
          <br><br>
          <p>E' possibile combinare le 2 animazione semplicemente aggiungendo entrambe le classi CSS.</p>
          <p class='blink-default animated-zoom'>
            Caricamento in corso - (DEFAULT)...
          </p>
          <br>
          <p class='blink-primary animated-zoom'>
            Caricamento in corso - (PRIMARY)...
          </p>
          <br>
          <p class='animated-zoom blink-success'>
            Caricamento in corso - (SUCCESS)...
          </p>
          <br>
          <p class='blink-info animated-zoom'>
            Caricamento in corso - (INFO)...
          </p>
          <br>
          <p class='animated-zoom blink-warning'>
            Caricamento in corso - (WARNING)...
          </p>
          <br>
          <p class='blink-danger animated-zoom'>
            Caricamento in corso - (DANGER)...
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