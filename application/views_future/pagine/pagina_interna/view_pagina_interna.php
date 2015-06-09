<?php print($doc_type); ?>

<?php $_CI =& get_instance(); ?>

<html class='aui'>
<head>
  
  <link rel="stylesheet" href="<?php print(base_url());?>application/views/tema/css/alloy-bootstrap/bootstrap-2.3.2.min.css">
  
  <?php
    if(isset($meta_tags) && is_array($meta_tags))
      foreach ($meta_tags as $tag)
          print(html_entity_decode($tag)."\n");

   /* Carica fogli di stile e librerie javascript, comuni e specifiche */
    if(isset($js_headers) && is_array($js_headers))
      foreach ($js_headers as $script)
          print(html_entity_decode($script)."\n");
  ?>
  
  <link rel="stylesheet" href="<?php print(base_url());?>application/views/tema/js/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="<?php print(base_url());?>application/views/tema/js/owl-carousel/assets/owl.theme.default.css">
  
  <script src="<?php print(base_url());?>application/third_party/ckeditor/ckeditor.js"></script>
  <script src="<?php print(base_url());?>application/third_party/ckeditor/adapters/jquery.js"></script>
  <script src="<?php print(base_url());?>application/JS/content_editable/content_editable.js"></script>

  <title><?php print($nome_sito);?> Pagina interna</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- SECOND LEVEL NAVIGATION -->
      <div id="multi-level-navigation_container" class="block-group">
        <?php print($second_level_navigation);?>
      </div>

      <!-- PAGE CONTENT -->
      <article class="block-group tre-colonne">
        <div id='page-content' class="block-group">

          <!-- Contenuti preso da DB -->
          <?php $_CI->buildCustomTextBlock('section','first_paragraph','environment_is_dev','environment_is_dev');?>
          <?php $_CI->buildCustomTextBlock('section','second_paragraph','environment_is_dev','environment_is_dev');?>
          <br><br>
          <?php $_CI->buildCustomTextBlock('section','third_paragraph','environment_is_dev','environment_is_dev');?>
          
          <br><br>
          
          <?php $_CI->buildCustomTextBlock('section','table_quote','environment_is_dev','environment_is_dev');?>
          
          <section>    
            <h1>QUOTE</h1>
            <div class="table-responsive">
              <table class='sisal-table'>
                <tr>
                  <th>CATEGORIA</th>
                  <th>VINCITORI</th>
                  <th>QUOTE</th>
                </tr>
                <tr class='odd'>
                  <td>6 numeri</td>
                  <td>nessuna</td>
                  <td>-</td>
                </tr>
                <tr class='even'>
                  <td>5 numeri e il jolly</td>
                  <td>nessuna</td>
                  <td>-</td>
                </tr>
                <tr class='odd'>
                  <td>5 numeri </td>
                  <td>24</td>
                  <td>17.989 &euro;</td>
                </tr>
                <tr class='even'>
                  <td>4 numeri </td>
                  <td>132</td>
                  <td>2.009 &euro;</td>
                </tr>
                <tr class='odd'>
                  <td>6 numeri</td>
                  <td>nessuna</td>
                  <td>-</td>
                </tr>
                <tr class='even'>
                  <td>5 numeri e il jolly</td>
                  <td>nessuna</td>
                  <td>-</td>
                </tr>
                <tr class='odd'>
                  <td>5 numeri </td>
                  <td>24</td>
                  <td>17.989 &euro;</td>
                </tr>
                <tr class='even'>
                  <td>4 numeri </td>
                  <td>132</td>
                  <td>2.009 &euro;</td>
                </tr>
              </table>
            </div>
          </section><!--/span-->
          
          <section>
            <form class="block-group form-horizontal">
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Denomin. / Insegna</label>
                <div class="block fields">
                  <p class="form-control-static">Punto Vendita "Lorem Ipsum"</p>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Tipologia Attività</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Bar Tabacchi</option>
                  </select>
                </div>
              </div>
              <br>
              <h2>Informazioni sul Punto Vendita</h2>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Indirizzo</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Provincia</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Milano</option>
                  </select>
                </div>
              </div>
              <div class="block-group control-group">
                <div class="block fields form-buttons_container">
                  <button type="submit" class="btn btn-primary">Accedi</button>
                  <button type="submit" class="btn btn-success btn-lg">Diventa retailer sisal</button>
                  <button type="submit" class="btn btn-default btn-sm">Annulla</button>
                </div>
              </div>
            </form>
          </section>
          
          <section>
            <h1>QUOTE</h1>
            <div class="block-group gallery">
              <div class="block">
                <figure>
                  <div><img src="<?php print(base_url());?>application/views/pagine/pagina_interna/gallery/search_result_grid1.png" class="img-responsive"></div>
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
                  <div><img src="<?php print(base_url());?>application/views/pagine/pagina_interna/gallery/search_result_grid2.png" class="img-responsive"></div>
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
                  <div><img src="<?php print(base_url());?>application/views/pagine/pagina_interna/gallery/search_result_grid3.png" class="img-responsive"></div>
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
                  <div><img src="<?php print(base_url());?>application/views/pagine/pagina_interna/gallery/search_result_grid4.png" class="img-responsive"></div>
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
                  <div><img src="<?php print(base_url());?>application/views/pagine/pagina_interna/gallery/search_result_grid5.png" class="img-responsive"></div>
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
                  <div><img src="<?php print(base_url());?>application/views/pagine/pagina_interna/gallery/search_result_grid6.png" class="img-responsive"></div>
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
          </section>
        </div>
        
        <!-- ASIDE -->
        <?php print($aside);?>
        
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
