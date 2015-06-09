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
  
  <title><?php print($nome_sito);?> DEMO Finestre Modali</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
          
         <h2>Finestre modali</h2>  
         <div id='alert_1' class='jq-dialog-warning' title='Attenzione!'>
           Si è verificato un errore! Premi il pulsante per chiudere questa finestra.
         </div>
         <p>
           Assegnando la classe <code>jq-open-dialog</code> a un pulsante o a un link, esso sarà in grado di aprire una finestra modale di tipo <em>Alert</em>.
           <br>
           E' però necessario specificare anche "quale" Dialog deve essere aperto: tale risultato si può ottenere in modi differenti:
           <ul>
             <li>Passando l'ID di un DIV presente in pagina come valore dell'attributo html <code>data-target</code> del pulsante</li>
             <li>Passando direttamente l'html in linea all'interno dell'attributo <code>data-content</code> del pulsante</li>
             <li>Passando l'URK di una view presente in un file esterno nell'attributo <code>data-remote</code> del pulsante</li>
           </ul>
         </p> 
         
         <a href='#' class='btn-primary jq-open-dialog' 
                     data-target='#alert_1' 
                     data-type='alert' 
                     title='Apri una finestra tipo Alert'>
                       DIV in pagina
         </a>
         <a href='#' class='btn-success jq-open-dialog' 
                     data-content='<strong>Attenzione!</strong> questo è un contenuto passato direttamente come attributo html del pulsante'
                     data-type='alert' 
                     title='Apri una finestra tipo Alert'>
                       Contenuto in linea
         </a>
         <a href='#' class='btn-info jq-open-dialog' 
                     data-remote='http://www.google.com'
                     data-type='alert' 
                     title='Apri una finestra tipo Alert'>
                       File remoto
         </a>
         
         <br><br>
         
         <p>
           Tutto questo può essere applicato non solo ai link <code>a href</code> ma anche ai <code>button</code>. Qualora siano presenti <strong>contemporaneamente</strong>
           i vari attributi, essi vengono applicati con il seguente ordine di priorità: <code>data-target</code>, <code>data-content</code>, <code>data-remote</code>
           <br>
         </p>

         <button type='button' class='btn-warning jq-open-dialog'
                               data-target='#alert_1' 
                               data-content='<strong>Attenzione!</strong> questo è un contenuto passato direttamente come attributo html del pulsante'
                               data-remote='http://www.google.com'
                               data-type='alert' 
                               title='Apri una finestra tipo Alert'>
                                 Button con più attributi
         </button>
         
         <br><br>
         
         <!-- 
         <div id='confirm_1' class='jq-dialog_confirm' title='Sei sicuro?'>
           Sei sicuro di voler compiere questa operazione?
         </div>
         <p>
           Assegnando la classe <code>jq-dialog_confirm-open</code> a un pulsante o a un link, esso sarà in grado di aprire una finestra modale di tipo
           <em>Confirm</em>.
           --- TO DO --- Da completare la funzionalità
         </p>       
         
         <a href='http://www.google.com' class='btn-success jq-open-dialog_confirm'
                                         data-target='#confirm_1' 
                                         data-type='confirm' 
                                         title='Apri una finestra tipo Confirm'>
                                           Link Apri Confirm
         </a>
         
         <button type='button' class='btn-success jq-open-dialog_confirm' 
                               data-target='#confirm_1' 
                               data-type='confirm' 
                               data-action='{"callback_yes": "mia_funzione_yes", "callback_no": "mia_funzione_no"}' 
                               title='Apri una finestra tipo Confirm'>
                                 Button Apri Confirm
         </button>
         -->
          
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