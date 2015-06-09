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
  
  <title><?php print($nome_sito);?> DEMO Tabs</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
        
          <h2>Tabs</h2>

          <h3>Standard</h3>
          <p>Assegnando la classe <code>jq-tabs</code> si ottiene l'interfaccia a Tabs standard di jQuery UI</p>
          <div class='jq-tabs'>
            <ul>
		<li><a href="#contenuto1">Tab 1</a></li>
		<li><a href="#contenuto2">Tab 232</a></li>
		<li><a href="#contenuto3">Tab 3</a></li>
	    </ul>
	    <div id="contenuto1">
	    	<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto2">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto3">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
          </div>
          
          <h4>Piccola</h4>
          <p>Aggiungendo anche la classe <code>sm</code> si ottiene l'interfaccia a Tabs in versione ridotta</p>
          <div class='jq-tabs sm'>
            <ul>
		<li><a href="#contenuto1">Tab 1</a></li>
		<li><a href="#contenuto2">Tab 232</a></li>
		<li><a href="#contenuto3">Tab 3</a></li>
	    </ul>
	    <div id="contenuto1">
	    	<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto2">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto3">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
          </div>
          
          <br>
          
          <h3>Grafica Minimale</h3>
          <p>Aggiungendo a questa anche la classe <code>simple</code> (forse è da cambiare il nome) si ottiene una versione minimale, senza intestazione</p>
          <div class='jq-tabs simple'>
            <ul>
		<li><a href="#contenuto1">Tab 1</a></li>
		<li><a href="#contenuto2">Tab 232</a></li>
		<li><a href="#contenuto3">Tab 3</a></li>
	    </ul>
	    <div id="contenuto1">
	    	<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto2">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto3">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
          </div>
          
          <h4>Piccola</h4>
          <p>Aggiungendo anche la classe <code>sm</code> si ottiene l'interfaccia a Tabs in versione ridotta</p>
          <div class='jq-tabs simple sm'>
            <ul>
		<li><a href="#contenuto1">Tab 1</a></li>
		<li><a href="#contenuto2">Tab 232</a></li>
		<li><a href="#contenuto3">Tab 3</a></li>
	    </ul>
	    <div id="contenuto1">
	    	<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto2">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                </p>
	    </div>
	    <div id="contenuto3">
		<p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                  ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                  mollit anim id est laborum.
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