<?php print($doc_type);?>
<html class='aui'>
<head>

  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/css/alloy-bootstrap/bootstrap-2.3.2.min.css">
  
 <?php

    if(isset($meta_tags) && is_array($meta_tags))
      foreach ($meta_tags as $tag)
          print(html_entity_decode($tag)."\n");

    /* Carica fogli di stile e librerie javascript, comuni e specifiche */
    if(isset($js_headers) && is_array($js_headers))
      foreach ($js_headers as $script)
          print(html_entity_decode($script)."\n");
  ?>
  
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/js/owl-carousel/assets/owl.carousel.css">
  <link rel="stylesheet" href="http://www.mediagate.it/future/application/views/tema/js/owl-carousel/assets/owl.theme.default.css">
  
  <title><?php print($nome_sito);?></title>
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
          <section>
            <!--  <div style='height:1px; background:red; width:1000%; position:absolute; top:10px;'></div>  -->
            <h1>Pagina Pubblica</h1>
            <img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/images/image_gallery.png" class="img-responsive">
             <p>
              <strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit</strong>
              <br><br>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?
            </p>
            <ul>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?</li>
              <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do? Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et do?</li>
            </ul>
            
            
            <br>
            <p><a class="btn btn-primary" href="#" role="button">Link as Button</a></p>
            <h3>Pulsanti nelle 2 dimensioni</h3>
            <button type="button" class="btn btn-primary">Normale</button>
            <button type="button" class="btn btn-primary btn-lg">Grande</button>
            <br>
            <h3>Stato Attivo/Disattivo dei vari colori</h3>
            <button type="button" class="btn btn-primary">Attivo</button>
            <button type="button" class="btn btn-primary" disabled="disabled">Disattivo</button>
            <br><br>
            <button type="button" class="btn btn-success">Attivo</button>
            <button type="button" class="btn btn-success" disabled="disabled">Disattivo</button>
            <br><br>
            <button type="button" class="btn btn-info">Attivo</button>
            <button type="button" class="btn btn-info" disabled="disabled">Disattivo</button>
            <br><br>
            <button type="button" class="btn btn-default">Attivo</button>
            <button type="button" class="btn btn-default" disabled="disabled">Disattivo</button>
           
            <br><br><br><br> 
            
            <span class="icomoon-home aria-hidden="true"></span>
            
            <div class="sisal-accordion">
              <h2>Seminario Giochi Numerici - 30 marzo - Milano</h2>
              <div>
                <h3>Contingentamento</h3>
                  <p>
                    <em>Decreto Prot. n. 2011/30011/giochi/UD del 27 luglio 2011</em>.
                    Sono individuati i parametri numerico quantitativi per l'installazione degli apparecchi di cui all'articolo 110, comma 6 del TULPS all'interno delle singole ubicazioni.
                    (<a href='#'>Scarica il documento in PDF</a>)
                  </p>
                  <p>
                    <strong>Elenco dei soggetti che svolgono attività in materia di apparecchi da intrattenimento</strong>
                    <em>Decreto Prot. n. 2011/11181/Giochi/ADI del 9 settembre 2011</em>.
                    I concetti espressi dalla Mission sono diversi e tutti importanti.Decreto Prot. n. 2011/11181/Giochi/ADI del 9 settembre 2011 A decorrere dal 1 gennaio 2011 è instituito l'elenco unico a livello nazionale per i soggetti che svolgono le attività in materia di AWP e VLT. L'iscrizione all'elenco costituisce titolo abilitativo per operare nel settore.
                    (<a href='#'>Scarica il documento in PDF</a>)
                  </p>
                  <h3>Provvedimenti AWP</h3>
                  <p>
                    <strong>Regole tecniche di produzione e verifica tecnica degli apparecchi e congegni da divertimento ed intrattenimento di cui all'art. 110, comma 6 del T.U.L.P.S</strong>.
                    <em>Decreto Direttoriale 4 dicembre 2003</em>.
                    Sono definite tutte le caratteristiche tecniche e le modalità di funzionamento degli apparecchi AWP nonché le funzionalità del protocollo di comunicazione per l'accesso ai dati, anche ai fini del successivo collegamento di rete. Gli esemplari di modelli degli apparecchi ed i congegni stessi devono essere sottoposti alla verifica tecnica di cui all'articolo 38, comma 3, della legge 23 dicembre 2000, n. 388, e successive modificazioni ed integrazioni, per consentirne la produzione o l'importazione.
                    (<a href='#'>Scarica il documento in PDF</a>)
                  </p>
                  <h3>Provvedimenti VLT</h3>
                  <p>
                    <strong>Disciplina dei requisiti tecnici e di funzionamento dei sistemi di gioco VLT, di cui all'articolo 110, comma 6, lettera b) del T.U.L.P.S.</strong>
                    <em>Decreto Direttoriale 22 gennaio 2010</em>.
                    Sono definiti i requisiti minimi, le caratteristiche tecniche e la modalità di funzionamento dei sistemi di gioco, della rete telematica di collegamento del sistema di gioco e della rete telematica di collegamento tra il sistema di gioco e il sistema di controllo.
                    (<a href='#'>Scarica il documento in PDF</a>)
                  </p>
              </div>
              <h2>Evento Ricevitori Scommesse Sportive - 23 marzo - Torino</h2>
              <div>
                <p>
                  Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                  purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                  velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                  suscipit faucibus urna.
                </p>
              </div>
            </div>

          </section><!--/span-->
          
          <br><br>
          
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
            <h1>QUOTE</h1>
            <div class="table-responsive">
              <table class='sisal-table'>
                <tr>
                  <th>ID</th>
                  <th>DATA APERTURA</th>
                  <th>RICHIESTA</th>
                  <th>STATO</th>
                  <th>TEMPO RISOL. STIMATO</th>
                  <th>AZIONI</th>
                </tr>
                <tr class='odd'>
                  <td>12345</td>
                  <td>23/07/2014</td>
                  <td><strong>Malfunzionamento AVP</strong></td>
                  <td>In lavorazione</td>
                  <td>8 ore</td>
                  <td>
                    <button type="submit" class="btn btn-info">Contesta</button>
                    <button type="submit" class="btn btn-default">Chiudi</button>
                  </td>
                </tr>
                <tr class='even'>
                  <td>12346</td>
                  <td>24/07/2014</td>
                  <td><strong>Malfunzionamento POS</strong></td>
                  <td>In attesa</td>
                  <td>4 ore</td>
                  <td>
                    <button type="submit" class="btn btn-info">Contesta</button>
                    <button type="submit" class="btn btn-default">Chiudi</button>
                  </td>
                </tr>
                <tr class='odd'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class='even'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class='odd'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class='even'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class='odd'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class='even'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class='odd'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr class='even'>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
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
                <label for="exampleInputEmail1" class="block control-label">CAP</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="CAP" class='form-control'>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Codice Punto di Vendita</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Codice Punto Vendita" class='form-control'>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Password</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Password" class='form-control'>
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
                <label for="exampleInputEmail1" class="block control-label">Comune</label>
                <div class="block fields">
                  <select class='form-control'>
                    <option>Cinisello Balsamo</option>
                  </select>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Telefono</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Telefono" class='form-control'>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Fax</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Fax" class='form-control'>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">E-mail</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="E-mail" class='form-control'>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">MQ Dedicati</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="MQ Dedicati" class='form-control'>
                </div>
              </div>
              <div class="block-group control-group">
                <label for="exampleInputEmail1" class="block control-label">Orari Apertura-Chiusura</label>
                <div class="block fields">
                  <input type="text" id="exampleInputEmail1" placeholder="Orari" class='form-control'>
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
                  <div><img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/gallery/search_result_grid1.png" class="img-responsive"></div>
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
                  <div><img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/gallery/search_result_grid2.png" class="img-responsive"></div>
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
                  <div><img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/gallery/search_result_grid3.png" class="img-responsive"></div>
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
                  <div><img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/gallery/search_result_grid4.png" class="img-responsive"></div>
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
                  <div><img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/gallery/search_result_grid5.png" class="img-responsive"></div>
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
                  <div><img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/gallery/search_result_grid6.png" class="img-responsive"></div>
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
  <script src="http://www.mediagate.it/future/application/views/tema/js/offcanvas.js"></script>
  <script src="http://www.mediagate.it/future/application/views/tema/js/mega-menu/booNavigation.js"></script>
  <script>
    $('.booNavigation').booNavigation({
        slideSpeed: 600,
        fadeSpeed: 400,
        delay: 200
    });
</script>
  
</body>
</html>

