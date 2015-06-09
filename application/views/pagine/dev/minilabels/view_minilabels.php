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
  
  <title><?php print($nome_sito);?> DEMO Mini Labels</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
          
          <h3>Mini Labels</h3>
          <p>
            Assegnando le classi <code>minilabel-default</code>, <code>minilabel-primary</code>, ecc. si ottengono delle "Mini Labels" che seguono il rispettivo tema
            colore.
            <br>
            Aggiungendo a tali classi, la classe <code>outline</code> si ottiene lo stesso effetto ma evidenziando solo i bordi.
          </p>
          <span class="minilabel-default">Default</span>
          <span class="minilabel-primary">Primary</span>
          <span class="minilabel-success">Success</span>
          <span class="minilabel-info">Info</span>
          <span class="minilabel-warning">Warning</span>
          <span class="minilabel-danger">Danger</span>
          <br>
          <span class="minilabel-default outline">Default</span>
          <span class="minilabel-primary outline">Primary</span>
          <span class="minilabel-success outline">Success</span>
          <span class="minilabel-info outline">Info</span>
          <span class="minilabel-warning outline">Warning</span>
          <span class="minilabel-danger outline">Danger</span>
          <br><br>
          <p>
            Aggiungendo la classe <code>rounded</code> si ottengono gli angoli arrotondati, utile ad esempio per creare dei <em>Badge</em> con all'interno dei
            numeri utili ad esempio per notificare il numero di numero di "messaggi non letti" o cose simili.
          </p>
          <span class="minilabel-default rounded">Default</span>
          <span class="minilabel-primary rounded">Primary</span>
          <span class="minilabel-success rounded">Success</span>
          <span class="minilabel-info rounded">Info</span>
          <span class="minilabel-warning rounded">Warning</span>
          <span class="minilabel-danger rounded">Danger</span>
          <br>
          <span class="minilabel-default outline rounded">Default</span>
          <span class="minilabel-primary outline rounded">Primary</span>
          <span class="minilabel-success outline rounded">Success</span>
          <span class="minilabel-info outline rounded">Info</span>
          <span class="minilabel-warning outline rounded">Warning</span>
          <span class="minilabel-danger outline rounded">Danger</span>
          <br><br>
          <span class="minilabel-default rounded">42</span>
          <span class="minilabel-primary rounded">100</span>
          <span class="minilabel-success rounded">7</span>
          <span class="minilabel-info outline rounded">11</span>
          <span class="minilabel-warning outline rounded">1250</span>
          <span class="minilabel-danger outline rounded">55</span>
          <br>
          <p>
            Le Mini-Labels possono essere aggiunte anche all'interno di oggetti "titolo" o in generale stringhe di testo con dimensioni differenti da quelle standard.
            Le loro dimensioni verranno automaticamenti adattate.
          </p>
          <h1>Titolo H1 <span class="minilabel-default">New</span></h1>
          <h2>Titolo H2 <span class="minilabel-primary outline">New</span></h2>
          <h3>Titolo H3 <span class="minilabel-success rounded">New</span></h3>
          <h4>Titolo H4 <span class="minilabel-info">New</span></h4>
          <br>
          <p>
            Aggiungendo la classe <code>sm</code> si ottiene una versione <strong>che rimane sempre "piccola" e NON si adatta</strong> alla dimensione dell'oggetto
            in cui è contenuta.
          </p>
          <span class="minilabel-default sm">Default</span>
          <span class="minilabel-primary rounded sm">Primary</span>
          <span class="minilabel-success sm">Success</span>
          <span class="minilabel-info outline rounded sm">Info</span>
          <span class="minilabel-warning outline sm">Warning</span>
          <span class="minilabel-danger outline rounded sm">Danger</span>
          <br>
          <h1>Titolo H1 <span class="minilabel-success sm">New</span></h1>
          <h2>Titolo H2 <span class="minilabel-warning outline sm">New</span></h2>
          <h3>Titolo H3 <span class="minilabel-success rounded sm">New</span></h3>
          <h4>Titolo H4 <span class="minilabel-info sm">New</span></h4>
          <br>
          <p>
            Se una mini-label è vuota, allora "<em>collassa</em>" ovvero non occupa alcuno spazio e diventa invisibile (controllare con l'inspector, dopo questo
            testo è presenta una mini-label invisibile in quanto vuota).
            <br>
            Sempre utile quando utilizzato in abbinamento al numero di "messaggi non letti" o cose simili.
          </p>
          <span class="minilabel-primary"></span>  <!-- Se è vuoto, collassa -->
                
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