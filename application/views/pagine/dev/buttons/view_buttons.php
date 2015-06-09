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
  
  <title><?php print($nome_sito);?> DEMO Buttons</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
      
          <h3>Classe "btn-primary"</h3>
          <h4>Normale</h4>
          <button class="btn-primary">Primary</button>
          <button class="btn-primary">X</button>
          <button class="btn-primary" disabled>Disabled</button>
          <button class="btn-primary outline">Outline</button>
          <button class="btn-primary outline" disabled>Outline disabled</button>
          <h4>Piccolo</h4>
          <button class="btn-primary sm">Small</button>
          <button class="btn-primary sm">X</button>
          <button class="btn-primary sm" disabled>Disabled</button>
          <button class="btn-primary sm outline">Outline</button>
          <button class="btn-primary sm outline" disabled>Outline disabled</button>
          <h4>Grande</h4>
          <button class="btn-primary lg">Large</button>
          <button class="btn-primary lg">X</button>
          <button class="btn-primary lg" disabled>Disabled</button>
          <button class="btn-primary lg outline">Outline</button>
          <button class="btn-primary lg outline" disabled>Outline disabled</button>
          
          <br><br>
          
          <h3>Classe "btn-success"</h3>
          <h4>Normale</h4>
          <button class="btn-success">Success</button>
          <button class="btn-success">X</button>
          <button class="btn-success" disabled>Disabled</button>
          <button class="btn-success outline">Outline</button>
          <button class="btn-success outline" disabled>Outline disabled</button>
          <h4>Piccolo</h4>
          <button class="btn-success sm">Small</button>
          <button class="btn-success sm">X</button>
          <button class="btn-success sm" disabled>Disabled</button>
          <button class="btn-success sm outline">Outline</button>
          <button class="btn-success sm outline" disabled>Outline disabled</button>
          <h4>Grande</h4>
          <button class="btn-success lg">Large</button>
          <button class="btn-success lg">X</button>
          <button class="btn-success lg" disabled>Disabled</button>
          <button class="btn-success lg outline">Outline</button>
          <button class="btn-success lg outline" disabled>Outline disabled</button>
          
          <br><br>
          
          <h3>Classe "btn-info"</h3>
          <h4>Normale</h4>
          <button class="btn-info">Info</button>
          <button class="btn-info">X</button>
          <button class="btn-info" disabled>Disabled</button>
          <button class="btn-info outline">Outline</button>
          <button class="btn-info outline" disabled>Outline disabled</button>
          <h4>Piccolo</h4>
          <button class="btn-info sm">Small</button>
          <button class="btn-info sm">X</button>
          <button class="btn-info sm" disabled>Disabled</button>
          <button class="btn-info sm outline">Outline</button>
          <button class="btn-info sm outline" disabled>Outline disabled</button>
          <h4>Grande</h4>
          <button class="btn-info lg">Large</button>
          <button class="btn-info lg">X</button>
          <button class="btn-info lg" disabled>Disabled</button>
          <button class="btn-info lg outline">Outline</button>
          <button class="btn-info lg outline" disabled>Outline disabled</button>
          
          <br><br>
          
          <h3>Classe "btn-default"</h3>
          <h4>Normale</h4>
          <button class="btn-default">Default</button>
          <button class="btn-default">X</button>
          <button class="btn-default" disabled>Disabled</button>
          <button class="btn-default outline">Outline</button>
          <button class="btn-default outline" disabled>Outline disabled</button>
          <h4>Piccolo</h4>
          <button class="btn-default sm">Small</button>
          <button class="btn-default sm">X</button>
          <button class="btn-default sm" disabled>Disabled</button>
          <button class="btn-default sm outline">Outline</button>
          <button class="btn-default sm outline" disabled>Outline disabled</button>
          <h4>Grande</h4>
          <button class="btn-default lg">Large</button>
          <button class="btn-default lg">X</button>
          <button class="btn-default lg" disabled>Disabled</button>
          <button class="btn-default lg outline">Outline</button>
          <button class="btn-default lg outline" disabled>Outline disabled</button>
          
          <br><br>
          
          <h3>Classe "btn-warning"</h3>
          <h4>Normale</h4>
          <button class="btn-warning">warning</button>
          <button class="btn-warning">X</button>
          <button class="btn-warning" disabled>Disabled</button>
          <button class="btn-warning outline">Outline</button>
          <button class="btn-warning outline" disabled>Outline disabled</button>
          <h4>Piccolo</h4>
          <button class="btn-warning sm">Small</button>
          <button class="btn-warning sm">X</button>
          <button class="btn-warning sm" disabled>Disabled</button>
          <button class="btn-warning sm outline">Outline</button>
          <button class="btn-warning sm outline" disabled>Outline disabled</button>
          <h4>Grande</h4>
          <button class="btn-warning lg">Large</button>
          <button class="btn-warning lg">X</button>
          <button class="btn-warning lg" disabled>Disabled</button>
          <button class="btn-warning lg outline">Outline</button>
          <button class="btn-warning lg outline" disabled>Outline disabled</button>
          
          <br><br>
          
          <h3>Classe "btn-danger"</h3>
          <h4>Normale</h4>
          <button class="btn-danger">danger</button>
          <button class="btn-danger">X</button>
          <button class="btn-danger" disabled>Disabled</button>
          <button class="btn-danger outline">Outline</button>
          <button class="btn-danger outline" disabled>Outline disabled</button>
          <h4>Piccolo</h4>
          <button class="btn-danger sm">Small</button>
          <button class="btn-danger sm">X</button>
          <button class="btn-danger sm" disabled>Disabled</button>
          <button class="btn-danger sm outline">Outline</button>
          <button class="btn-danger sm outline" disabled>Outline disabled</button>
          <h4>Grande</h4>
          <button class="btn-danger lg">Large</button>
          <button class="btn-danger lg">X</button>
          <button class="btn-danger lg" disabled>Disabled</button>
          <button class="btn-danger lg outline">Outline</button>
          <button class="btn-danger lg outline" disabled>Outline disabled</button>
          
          <br><br>
          
          <h2>Links con aspetto di Pulsanti</h2>
          <a href='#' class="btn-primary">Link Button</a>
          <a href='#' class="btn-success" disabled>Link Button</a>
          <a href='#' class="btn-info sm">Link Button</a>
          <a href='#' class="btn-danger outline">Link Button</a>
          
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