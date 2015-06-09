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
  
  <title><?php print($nome_sito);?> DEMO Accordions</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
                  
          <h2>Accordion</h2>
          
          <h3>Una sola sezione aperta alla volta</h3>
          <p>Aggiungendo la classe <code>jq-accordion</code> si ottiene l'accordion standard di jQuery UI</p>
          <div class="jq-accordion">
	    <h2>Sezione 1</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 2</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 3</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>	
         </div>
         
         <br>
         
         <h4>Versione piccola</h4>
          <p>Aggiungendo anche la classe <code>sm</code> si ottiene la versione di piccole dimensioni</p>
          <div class="jq-accordion sm">
	    <h2>Sezione 1</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 2</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 3</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>	
         </div>
         
         <br>
         
         <h3>Più sezioni aperte contemporaneamente</h3>
         <p>
           Aggiungendo l'attributo booleano <code>data-multi_open='true'</code> si ottiene una imitazione dell'accordion standard di jQuery UI che però 
           può avere più sezioni aperte contemporaneamente
         </p>
          <div class="jq-accordion" data-multi_open='true'>
	    <h2>Sezione 1</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 2</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 3</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>	
         </div>
         
         <br>
         
         <h4>Versione piccola</h4>
          <p>Anche in questo caso, è possibile aggiungere la classe <code>sm</code> per ottenere la versione di piccole dimensioni</p>
          <div class="jq-accordion sm" data-multi_open='true'>
	    <h2>Sezione 1</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 2</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>
            <h2>Sezione 3</h2>
            <div>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                mollit anim id est laborum.
              </p>
            </div>	
         </div>
                   
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