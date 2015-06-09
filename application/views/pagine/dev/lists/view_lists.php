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
  
  <title><?php print($nome_sito);?> DEMO Lists</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">

          <h2>Unordered Lists - UL</h2>
          <ul>
            <li>list item 1</li>
            <li>list item 1
              <ul>
                <li>list item 2</li>
                <li>list item 2
                  <ul>
                    <li>list item 3</li>
                    <li>list item 3</li>
                  </ul>
                </li>
                <li>list item 2</li>
                <li>list item 2</li>
              </ul>
            </li>
            <li>list item 1</li>
            <li>list item 1</li>
          </ul>
          
          <br>

          <h2>Ordered Lists - OL</h2>
          <ol>
            <li>list item 1</li>
            <li>list item 1
              <ol>
                <li>list item 2</li>
                <li>list item 2
                  <ol>
                    <li>list item 3</li>
                    <li>list item 3</li>
                  </ol>
                </li>
                <li>list item 2</li>
                <li>list item 2</li>
              </ol>
            </li>
            <li>list item 1</li>
            <li>list item 1</li>
          </ol>
          
          <ol>
            <li><span class='ol-content'>list item 1</span></li>
            <li><span class='ol-content'>list item 1</span>
              <ol>
                <li><span class='ol-content'>list item 2</span></li>
                <li><span class='ol-content'>list item 2</span>
                  <ol>
                    <li><span class='ol-content'>list item 3</span></li>
                    <li><span class='ol-content'>list item 3</span></li>
                  </ol>
                </li>
                <li><span class='ol-content'>list item 2</span></li>
                <li><span class='ol-content'>list item 2</span></li>
              </ol>
            </li>
            <li><span class='ol-content'>list item 1</span></li>
            <li><span class='ol-content'>list item 1</span></li>
          </ol>
          
          <br>
          
          <h2>Definition Lists - DL (dt, dd)</h2>

          <dl>
            <dt>Term 1</dt>
            <dd>Description 1</dd>
            <dt>Term 2</dt>
            <dd>Description 2</dd>
            <dt>Term 3</dt>
            <dd>Description 3</dd>
          </dl>



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