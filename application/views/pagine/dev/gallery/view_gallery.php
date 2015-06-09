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
  
  <title><?php print($nome_sito);?> DEMO Gallery</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">

          <h3>Galleria a thumbnail separati</h3>
          
          <div class="gallery_thumbs-separati elastica block-group">
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid1.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid2.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid3.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid4.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid5.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid6.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
          </div>
          
          <br><br>
          
          <h3>Galleria a griglia semplice</h3>
          
          <div class="gallery_griglia-semplice elastica block-group">
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid1.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid2.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid3.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid4.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid5.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
            <div class="block">
              <figure>
                <div>
                  <a href='#'><img src="<?php print(base_url());?>application/views/pagine/dev/gallery/images/search_result_grid6.png" class="img-responsive"></a>
                </div>
                <figcaption>
                  Ultima Estrazione
                  <br>
                  <strong>Concorso n.129 del 27/10/2012</strong>
                  <br>
                  Superenalotto
                </figcaption>
              </figure>
            </div>
          </div>
          
          <br><br>
          
          <h3>Raccolta di Mega Links</h3>
          <div class="gallery_mega-links elastica block-group" style='width:80%;'>
            <div class="block">
              <a class="box" href="#">
                <h3>Domande Frequenti</h3>
              </a>
            </div>
            <div class="block">
              <a class="box" href="#">
                <h3>Testo pulsante megalink</h3>
              </a>
            </div>
            <div class="block">
              <a class="box" href="#">
                <h3>Domande Frequenti</h3>
              </a>
            </div>
            <div class="block">
              <a class="box" href="#">
                <h3>Testo pulsante megalink</h3>
              </a>
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