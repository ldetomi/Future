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
  
  <title><?php print($nome_sito);?> DEMO Tables</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">

          <h3>Tabella con griglia invisibile</h3>
          <p>Assegnando la classe <code>invisible-grid-table</code> alla tabella, si ottengono dati tabulati ma con griglia invisibile</p>
          <table class="invisible-grid-table">
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
          </table>

          <br>

          <h3>Tabella del Tema</h3>
          <p>Assegnando la classe <code>theme-table</code> alla tabella, si applica un tema coerente con il sito</p>
          <table class="theme-table">
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
          </table>
          
          <br>
          
          <h3>Tabella del Tema con righe STRIPED</h3>
          <p>Aggiungendo anche la classe <code>horizontal-striped</code> alla tabella, si ottiene l'alternanza di colore tra RIGHE pari e dispari</p>
          <table class="theme-table horizontal-striped">
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
          </table>
          
          <br>
          
          <h3>Tabella del Tema con colonne STRIPED</h3>
          <p>Aggiungendo invece la classe <code>vertical-striped</code> alla tabella, si ottiene l'alternanza di colore tra COLONNE pari e dispari</p>
          <table class="theme-table vertical-striped">
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
          </table>
          
          <br>
          
          <h3>Tabella del Tema con colonne e righe STRIPED</h3>
          <p>Aggiungendo entrambe le classi <code>vertical-striped</code> e <code>horizontal-striped</code> alla tabella, si ottiene la combinazione dei due effetti precedenti</p>
          <table class="theme-table horizontal-striped vertical-striped">
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
          </table>
          
          <br>
          
          <h3>Tabella del Tema con righe STRIPED e GRUPPI di colonne (il colore è alternato automaticamente pari-dispari)</h3>
          <p>Utilizzando i tag <code>colgroup</code> alla tabella, si ottiene l'alternanza di colore tra GRUPPI DI COLONNE pari e dispari</p>
          <table class="theme-table horizontal-striped">
            <colgroup>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <th colspan='2'>gruppo_1</th>
              <th colspan='3'>gruppo_2</th>
              <th colspan='3'>gruppo_3</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
          </table>
          
          <br>
          
          <h3>Tabella del Tema con GRUPPI di colonne (ciascuno con un nome di classe)</h3>
          <p>Utilizzando i tag <code>colgroup</code> con specifiche classi css (da impostare di volta in volta) alla tabella, si ottiene un colore di sfondo specifico per ciascun GRUPPO DI COLONNE</p>
          <table class="theme-table">
            <colgroup class='gruppo_1'>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup class='gruppo_2'>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup class='gruppo_3'>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <th colspan='2'>gruppo_1</th>
              <th colspan='3'>gruppo_2</th>
              <th colspan='3'>gruppo_3</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
          </table>
          
          <br>
          
          <h3>Tabella del Tema con righe STRIPED e GRUPPI di colonne (ciascuno con un nome di classe)</h3>
          <p>
            Utilizzando sia i tag <code>colgroup</code> con specifiche classi css, sia la classe <code>horizontal-striped</code> si ottiene la combinazione dei 2 effetti: notare che l'uso di colori semi-trasparenti rende
            possibile conservare la differenza di colore anche nei punti di intersezione
          </p>
          <table class="theme-table horizontal-striped">
            <colgroup class='gruppo_1'>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup class='gruppo_2'>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup class='gruppo_3'>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <th colspan='2'>gruppo_1</th>
              <th colspan='3'>gruppo_2</th>
              <th colspan='3'>gruppo_3</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
          </table>
          
          <br>
          
          <h3>Tabella del Tema con GRUPPI di colonne (di cui uno <a href='#' id='mostra'>nascosto</a>)</h3>
          <p>
            
          </p>
          <table id='gruppo_nascosto' class="theme-table horizontal-striped">
            <colgroup>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <colgroup>
              <col></col>
              <col></col>
              <col></col>
            </colgroup>
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <th colspan='2'>gruppo_1</th>
              <th colspan='3'>gruppo_2</th>
              <th colspan='3'>gruppo_3</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
          </table>
          
          <script>
            $('#mostra').click(function(e){
              e.preventDefault();
              $('#gruppo_nascosto').find('td:nth-of-type(3)').toggle();
              $('#gruppo_nascosto').find('td:nth-of-type(4)').toggle();
              $('#gruppo_nascosto').find('td:nth-of-type(5)').toggle();
            });
          </script>
          
          <br>

          <h3>Tabella Hovered</h3>
          <p>Aggiungendo la classe <code>row-hover</code> alla tabella, si ottiene l'evidenziazione di ciascuna riga all'hover</p>
          <table class="theme-table horizontal-striped row-hover">
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri e il jolly</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td>4 numeri</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
          </table>
          
          <br>

          <h3>Tabella del Tema con doppia riga di intestazione, e classi specifiche alle singole celle o intere righe</h3>
          <p>
            Nella tabella seguente, sono state applicate varie classi CSS per dare uno stile differenziato alle singole celle o ad intere righe. Aggiungendo la classe <code>cell-warning</code> a livello di un'intera riga,
            si ottiene una riga di colore coerente con il tema "warning" definito a livello dell'intero sito. Su tale riga è stata applicata anche la classe <code>centra</code> per formattare coerentemente il testo.
            <br>
            La classe <code>cell-danger</code> è stata invece aggiunta a una specifica cella per poter evidenziare con il tema "danger" la cella, ma in questo caso agendo sui bordi e non sullo sfondo, grazie alla presenza
            della classe <code>outline</code>.
            <br>
            La classe <code>cell-success</code> è stata aggiunta sempre a livello di singola cella, insieme alla classe <code>destra</code> per ottenere l'effetto desiderato.
            <br>
            E' possibile anche inserire immagini all'interno delle celle di tabella, continuando a utilizzare le classi CSS <code>centra</code> e <code>destra</code> per ottenere il relativo effetto anche su questo tipo di
            elementi. Il fatto che le immagini abbiano o meno la classe <code>img-responsive</code> (necessaria per renderle responsive) è stato reso ininfluente.
            <br>
            Infine la classe <code>cell-primary</code> senza altre classi associate, si limita a colorare l'ultima riga secondo il tema "Primary" senza agire su altri aspetti della formattazione
          </p>
          <table class="theme-table">
            <tr>
              <th colspan='2'>PRIMA INTESTAZIONE</th>
              <th>NUMERI</th>
            </tr>
            <tr>
              <th>CATEGORIA</th>
              <th>VINCITORI</th>
              <th>QUOTE</th>
            </tr>
            <tr>
              <td>6 numeri</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr class='cell-warning centra'>
              <td>classe "cell-warning" e "centra" su intera riga</td>
              <td>nessuna</td>
              <td>-</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td class='cell-danger outline'>classe "cell-danger" e "outline"</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td class='cell-success destra'>classe "cell-success" e "destra"</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
            <tr>
              <td>5 numeri</td>
              <td>24</td>
              <td>17.989 â¬</td>
            </tr>
            <tr>
              <td><img src='<?php print(base_url());?>application/views/tema/images/file_extensions-icons/bmp-icon.png'></td>
              <td class='centra'><img src='<?php print(base_url());?>application/views/tema/images/file_extensions-icons/pdf-icon.png' class='img-responsive'></td>
              <td class='destra'><img src='<?php print(base_url());?>application/views/tema/images/file_extensions-icons/zip-icon.png'></td>
            </tr>
            <tr class='cell-primary'>
              <td>classe "cell-primary" su intera riga</td>
              <td>132</td>
              <td>2.009 â¬</td>
            </tr>
          </table>

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