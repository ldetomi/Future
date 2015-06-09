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
  
  <title><?php print($nome_sito);?> DEMO Avvisi</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
          
          <h3>Box di Avviso</h3>
          <p> 
            E' possibile creare dei "Box di notifica in pagina", aggiungendo le classi <code>notifica-default</code>, <code>notifica-primary</code>, ecc.  Viene automaticamente
            creato un box che segue il rispettivo tema colore. Aggiungendo ANCHE la classe <code>dismissible</code>, viene creato anche un pulsantino in tema che una volta
            cliccato chiude con un effetto temporizzato il relativo box.
          </p>
          <div class="notifica-default">
            <strong>Default!</strong> Notifica Standard.
          </div>            
          <div class="notifica-primary dismissible">
            <strong>Primary</strong> Il salvataggio è avvenuto correttamente.
          </div>
          <div class="notifica-success">
            <strong>Well done!</strong> You successfully read this important alert message.
          </div>
          <div class="notifica-info dismissible">
            <strong>Notifica chiudibile</strong> Applicando la classe 'dismissible' il box diventa chiudibile al click sul pulsante.
          </div>
          <div class="notifica-warning">
            <strong>Warning!</strong> Better check yourself, you're not looking too good.
          </div>
          <div class="notifica-danger dismissible">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
          </div>
          <br>
          <p>Aggiungendo a tali classi, la classe <code>outline</code> si ottiene lo stesso effetto ma evidenziando solo i bordi</p>
          <div class="notifica-default outline">
            <strong>Default!</strong> Notifica Standard.
          </div>
          <div class="notifica-primary outline dismissible">
            <strong>Primary</strong> Il salvataggio è avvenuto correttamente.
          </div>
          <div class="notifica-success outline">
            <strong>Well done!</strong> You successfully read this important alert message.
          </div>
          <div class="notifica-info outline dismissible fade-out">
            <strong>Notifica chiudibile</strong> Applicando la classe 'dismissible' il box diventa chiudibile al click sul pulsante.
          </div>
          <div class="notifica-warning outline">
            <strong>Warning!</strong> Better check yourself, you're not looking too good.
          </div>
          <div class="notifica-danger outline dismissible">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
          </div>
          <br>
          <p>Aggiungendo la classe <code>sm</code> si ottengono le rispettive versioni a dimensione ridotte tema colore.</p>
          <div class="notifica-default sm">
            <strong>Default!</strong> Notifica Standard.
          </div>            
          <div class="notifica-primary sm dismissible">
            <strong>Primary</strong> Il salvataggio è avvenuto correttamente.
          </div>
          <div class="notifica-success sm">
            <strong>Well done!</strong> You successfully read this important alert message.
          </div>
          <div class="notifica-info sm dismissible">
            <strong>Notifica chiudibile</strong> Applicando la classe 'dismissible' il box diventa chiudibile al click sul pulsante.
          </div>
          <div class="notifica-warning sm">
            <strong>Warning!</strong> Better check yourself, you're not looking too good.
          </div>
          <div class="notifica-danger sm dismissible">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
          </div>
          <div class="notifica-default sm outline">
            <strong>Default!</strong> Notifica Standard.
          </div>
          <div class="notifica-primary sm outline dismissible">
            <strong>Primary</strong> Il salvataggio è avvenuto correttamente.
          </div>
          <div class="notifica-success sm outline">
            <strong>Well done!</strong> You successfully read this important alert message.
          </div>
          <div class="notifica-info outline sm dismissible fade-out">
            <strong>Notifica chiudibile</strong> Applicando la classe 'dismissible' il box diventa chiudibile al click sul pulsante.
          </div>
          <div class="notifica-warning sm outline">
            <strong>Warning!</strong> Better check yourself, you're not looking too good.
          </div>
          <div class="notifica-danger outline sm dismissible">
            <strong>Oh snap!</strong> Change a few things up and try submitting again.
          </div>
          
          <br><br>
          
          <h2>Box di notifica attivati da un pulsante</h2>
          <p>
            E' possibile mostrare le notifiche alla pressione di un pulsante. Per collegare tale pulsante al relativo <em>Box di notifica</em> che deve essere aperto
            è necessario assegnargli la classe CSS <code>jq-box_notifica-open</code> e passare come valore del parametro html <code>data-target</code> l'ID del
            relativo Box. E' possibile inpostare anche il parametro opzionale <code>data-type='fixed'</code> mediante il quale si stabilisce che il Box di Notifica
            deve essere visualizzato con posizione <var>fixed</var> a schermo. In caso contrario, il box comparirà all'interno di uno specifico DIV predisposto in pagina
            come <em>container</em>, identificato dall'ID <code>notifiche_container</code>.
          </p>
          <div id='notifiche_container' style='width:50%;'></div>
          
          <div id='notifica_in_pagina' class="notifica-success hidden dismissible">
            <strong>Well done!</strong> You successfully read this important alert message.
          </div>
          <div id='notifica_fixed' class="notifica-success hidden dismissible">
            <strong>Well done!</strong> You successfully read this important alert message.
          </div>
          <button type='button' class='btn-success jq-box_notifica-open' data-target='#notifica_in_pagina'>Notifica in pagina</button>
          <button type='button' class='btn-warning jq-box_notifica-open' data-target='#notifica_fixed' data-fixed='true'>Notifica fissa su schermo</button>
          
          <br>
          
          <p>
            Aggiungendo anche l'attributo <code>data-autoclose='true'</code>, il box si chiuderà automaticamente dopo un certo tempo prestabilito.
          </p>
          <button type='button' class='btn-primary jq-box_notifica-open' data-target='#notifica_in_pagina' data-autoclose='true'>Autochiusura in pagina</button>
          <button type='button' class='btn-danger jq-box_notifica-open' data-target='#notifica_fixed' data-fixed='true' data-autoclose='true'>Autochiusura a schermo</button>

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