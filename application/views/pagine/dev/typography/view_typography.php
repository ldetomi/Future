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
  
  <title><?php print($nome_sito);?> DEMO Typography</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">

          <h1>Titolo H1</h1>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
          </p>
          
          <h2>Titolo H2</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
          </p>
          
          <h3>Titolo H3</h3>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
          </p>
          
          <h4>Titolo H4</h4>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
          </p>
            
          <hr>
          
          <br><br>
          
          <h3>Classe "lead"</h3>
          <p class='lead'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
          </p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
          </p>
          <h3>Small</h3>
          <p>
            <small>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
              ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </small>
          </p>
          <h3>Big</h3>
          <p>
            <big>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
              ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.
            </big>
          </p>
                    
          <br><br>
          
          <!-- ADDRESS -->
          <h4>Address Tag</h4>
          <address>
            <strong>Company</strong>
            <br>PO Box 77899
            <br>Vancouver, WA 23456
            <br>USA
            <br>
          </address>
          
          <br>

          <h4>Elementi Inline (e relativo tag a fianco)</h4>

          <p>
            <abbr title="Cascading Style Sheets">CSS</abbr> - <code>&lt;abbr&gt;</code>
          </p>
          <p>
            <cite>Cite</cite> - <code>&lt;cite&gt;</code>
          </p>
          <p>
            <code>Code tag</code> - <code>&lt;code&gt;</code>
          </p>
          <p>
            <samp>Sample tag</samp> - <code>&lt;samp&gt;</code>
          </p>
          <p>
            <var>Variable tag</var> - <code>&lt;var&gt;</code>
          </p>
          <p><i>Italic</i> - <code>&lt;i&gt;</code>
          </p>
          <p>
            <em>Emphasis</em> - <code>&lt;em&gt;</code>
          </p>
          <p>
            <strong>Highlighted text</strong> - <code>&lt;strong&gt;</code>
          </p>
          <p>
            <b>Bold text</b> - <code>&lt;b&gt;</code>
          </p>
          <p>
            <mark>Mark text</mark> - <code>&lt;mark&gt;</code>
          </p>
          <p>
            <kbd>Ctrl + Shift + i</kbd> - <code>&lt;kbd&gt;</code>
          </p>
          <p>
            <del>Deleted text</del> - <code>&lt;del&gt;</code>
          </p>
          <p>
            x<sup>superscript</sup> - <code>&lt;sup&gt;</code>
          </p>
          <p>
            x<sub>subscript</sub> - <code>&lt;sub&gt;</code>
          </p>
          <p>
            <small>small text</small> - <code>&lt;small&gt;</code>
          </p>
          
          <br>

          <h4>Elementi Block</h4>
          <output>
            output text
            <code>&lt;output&gt;</code>
          </output>
          
          <br>

          <h4>Blockquotes</h4>
          <p>Utilizzando il tag <code>&lt;blockquote&gt;</code> è possibile inserire una citazione</p>
          <blockquote>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
          </blockquote>
          
          <br>

          <h4>Author &amp; Source</h4>
          <p>Se si desiderano aggiungere alla citazione anche l'autore e la fonte, utilizzare il tag <code>&lt;small&gt;</code> per l'autore e il <code>&lt;cite&gt;</code> per la fonte</p>
          <blockquote>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
            <br>
            <small>Author</small> - <cite>Source</cite>
          </blockquote>
          
          <br>

          <h4>Citazione storica</h4>
          <p>Abbinando al tag <code>&lt;blockquote&gt;</code> anche la classe <code>citazione-storica</code> è possibile ottenere una citazione in stile "storico"</p>
          <blockquote class='citazione-storica'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do <a href='#' class='esterno'>eiusmod tempor</a> incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor in <a href='#'>reprehenderit</a> in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
            mollit anim id est laborum.
            <br>
            <small>Author</small> - <cite>Source</cite>
          </blockquote>
          
          <br>

          <!-- PREFORMATTED -->
          <h4>Preformatted Text</h4>
          <p>Utilizzando il tag <code>pre</code> è possibile inserire un paragrafo di testo pre-formattato</p>
          <pre>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
	          velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </pre>
          
          <br><br>
          
          <h3>Contesti</h3>
          <p>
            Assegnando le classi <code>text-default</code>, <code>text-primary</code>, ecc. si colora il testo in base all'omonimo contesto.
            <br>
            Aggiungendo a tali classi, la classe <code>outline</code> si ottiene lo stesso effetto ma evidenziando solo i bordi.
          </p>
          <p><span class="text-default">Testo nel contesto Default</span> - <span class="text-default outline">Testo nel contesto Default OUTLINE</span></p>
          <p><span class="text-primary">Testo nel contesto Primary</span> - <span class="text-primary outline">Testo nel contesto Primary OUTLINE</span></p>
          <p><span class="text-success">Testo nel contesto Success</span> - <span class="text-success outline">Testo nel contesto Success OUTLINE</span></p>
          <p><span class="text-info">Testo nel contesto Info</span> - <span class="text-info outline">Testo nel contesto Info OUTLINE</span></p>
          <p><span class="text-warning">Testo nel contesto Warning</span> - <span class="text-warning outline">Testo nel contesto Warning OUTLINE</span></p>
          <p><span class="text-danger">Testo nel contesto Danger</span> - <span class="text-danger outline">Testo nel contesto Danger OUTLINE</span></p>
                
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