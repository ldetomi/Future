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
  
  <title><?php print($nome_sito);?> DEMO Mixins LESS</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
          
          <h2>Mixins LESS</h2>
          <p>
            Alcuni effetti ottenuti attraverso i <strong>Mixins LESS</strong> possono essere mostrati solo creando elementi ad hoc, a cui vengono assegnati
            tali Mixins via CSS. Di seguito alcuni esempi.
          </p>
          <br>
          <h3>Centrare un DIV in un Contenitore sia verticalmente che orizzontalmente</h3>
          <p>
            Assegnando le classi CSS (o gli omonimi mixins) <code>.centra-blocco</code> e <code>.vertical-align</code> al DIV più interno, si ottiene la
            centratura sia orizzontale che verticale di tale DIV rispetto al suo contenitore.
          </p>
          <div id='centra-tutto_container'>
            <div id='centra-tutto'></div>
          </div>
          <br><br>
          <h3>Effetto BLUR che torna nitido all'Hover del Mouse</h3>
          <p>
            Assegnando il mixin <code>.blur(@radius)</code> si ottiene un effetto <em>Blur</em>. Qui è stato applicato insieme al mixin <code>.transizione_generica()</code>
            per ottenere un effetto animato di transizione all'hover del mouse.
          </p>
          <div id='blur'>
            <img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid1.png" class="img-responsive">
          </div>
          <br><br>
          <h3>Personalizzazione PlaceHolder di un campo di Form</h3>
          <p>
            Assegnando il mixin <code>.placeholder(@color)</code> è possibile cambiare il colore del placeholder dei campi di form.
          </p>
          <form class="block-group form-horizontal">
              <div class="block-group form-group">
                <label class="block">Richiesto</label>
                <div class="block fields">
                  <input type="text" id='placeholder' placeholder="Questo placeholder è personalizzato" class='form-control'>
                </div>
              </div>
          </form>
          <br><br>
          <h3>Suddividere un testo su più colonne</h3>
          <p>
            Assegnando il Mixins <code>.colonne(@width; @count; @gap)</code> a un DIV, si ottiene la suddivisione in colonne del testo.
          </p>
          <div id='colonne_container'>
            <div id='colonne'>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
          </div>
          <br><br>
          <h3>Effetto <strong>Ellipsis</strong></h3>
          <p>
            Assegnando il Mixins <code>.text-overflow()</code> a un Paragrafo, si ottiene l'effetto Ellipsis (è necessario forzare anche una <code>max-width</code> al paragrafo).
          </p>
          <p id='ellipsis'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et
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