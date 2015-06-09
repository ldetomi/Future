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
  
  <title><?php print($nome_sito);?> DEMO Form</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
      
          <h2>Form Horizontal (Normale)</h2>
          
          <section>
            <form class="block-group form-horizontal">
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Denomin. / Insegna</label>
                <div class="block fields">
                  <p class="form-control-static">Punto Vendita "Lorem Ipsum"</p>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Tipologia Attività</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Bar Tabacchi</option>
                  </select>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block required">Richiesto</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Errore</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Errore di Validazione" class='form-control input_error'>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Disabilitato</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" disabled placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Commenti</label>
                <div class="block fields">
                  <textarea placeholder="Scrivi qui i tuoi commenti..." class='form-control'></textarea>
                </div>
              </div>
              <div class="block-group form-group">
                <div class="block fields form-buttons_container">
                  <button type="submit" class="btn btn-primary">Accedi</button>
                  <button type="submit" class="btn btn-primary" disabled>Accedi</button>
                  <button type="submit" class="btn btn-success lg">Grande</button>
                  <button type="submit" class="btn btn-default">Annulla</button>
                  <button type="submit" class="btn btn-info">Info</button>
                  <button type="submit" class="btn btn-info" disabled>Info</button>
                </div>
              </div>
            </form>
          </section>
          
          <br><br>
          
          <h2>Form Horizontal (piccola)</h2>
          
          <section>
            <form class="block-group form-horizontal form-sm">
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Denomin. / Insegna</label>
                <div class="block fields">
                  <p class="form-control-static">Punto Vendita "Lorem Ipsum"</p>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Tipologia Attività</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Bar Tabacchi</option>
                  </select>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block required">Indirizzo</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Disabilitato</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" disabled placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Commenti</label>
                <div class="block fields">
                  <textarea placeholder="Scrivi qui i tuoi commenti..." class='form-control'></textarea>
                </div>
              </div>
              <div class="block-group form-group">
                <div class="block fields form-buttons_container">
                  <button type="submit" class="btn btn-primary sm">Accedi</button>
                  <button type="submit" class="btn btn-primary sm" disabled>Accedi</button>
                  <button type="submit" class="btn btn-success">Normale</button>
                  <button type="submit" class="btn btn-default sm">Annulla</button>
                  <button type="submit" class="btn btn-info sm">Info</button>
                  <button type="submit" class="btn btn-info sm" disabled>Info</button>
                </div>
              </div>
            </form>
          </section>
          
          <br><br>
          
          <h2>Form Inline (Normale)</h2>
          
           <section>
            <form class="block-group form-inline">
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Tipologia Attività</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Bar Tabacchi</option>
                  </select>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block required">Indirizzo</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Tipologia Attività</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Bar Tabacchi</option>
                  </select>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block required">Indirizzo</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <div class="block fields form-buttons_container">
                  <button type="submit" class="btn btn-primary">Accedi</button>
                  <button type="submit" class="btn btn-success lg">Grande</button>
                  <button type="submit" class="btn btn-default">Annulla</button>
                </div>
              </div>
            </form>
          </section>
          
          <br><br>
          
          <h2>Form Inline (piccola)</h2>
          
           <section>
            <form class="block-group form-inline form-sm">
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Tipologia Attività</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Bar Tabacchi</option>
                  </select>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block required">Indirizzo</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block">Tipologia Attività</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Bar Tabacchi</option>
                  </select>
                </div>
              </div>
              <div class="block-group form-group">
                <label for="exampleInputEmail1" class="block required">Indirizzo</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Indirizzo" class='form-control'>
                </div>
              </div>
              <div class="block-group form-group">
                <div class="block fields form-buttons_container">
                  <button type="submit" class="btn btn-primary sm">Accedi</button>
                  <button type="submit" class="btn btn-success">Normale</button>
                  <button type="submit" class="btn btn-default sm">Annulla</button>
                </div>
              </div>
            </form>
          </section>
          
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