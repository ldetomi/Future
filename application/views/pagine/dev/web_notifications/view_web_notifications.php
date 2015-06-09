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
  
  <title><?php print($nome_sito);?> DEMO WEB Notifications</title>
</head>

<body id='<?php print($page_tag);?>'>
  <div class="main-fluid-container">

    <?php print($header);?>
  
    <div id='main-content' class="block-group">
      <!-- PAGE CONTENT -->
      <article class="block-group una-colonna">
        <div id='page-content' class="block-group">
        
          <script>           
            window.addEventListener('load', function () 
            {
              // At first, let's check if we have permission for notification
              // If not, let's ask for it
              if (window.Notification && Notification.permission !== "granted") 
              {
                Notification.requestPermission(function (status) 
                {
                  // This lets us use Notification.permission with Chrome/Safari
                  if (Notification.permission !== status)
                    Notification.permission = status;
                    
                  console.log(status); // notifications will only be displayed if "granted"
                  var n = new Notification("Hai accettato le Notifiche", {body: "D'ora in poi questa pagina potrà inviare notifiche al tuo Desktop"}); // this also shows the notification
                });
              }

              var button = document.getElementById("pulsante-notifica");

              button.addEventListener('click', function () 
              {
                // Se l'utente ha accettato le notifiche dal sito
                if (window.Notification && Notification.permission === "granted") 
                {
                  var n = new Notification("Nuova Notifica");
                }

                // Se l'utente non ha ancora specificato se accetta le Notifiche Desktop o meno
                // NOTA: a causa di Chrome, non siamo sicuri che la property "Permission" sia settata, quindi non è sicuro testare per il valore "default".
                else if (window.Notification && Notification.permission !== "denied") 
                {
                  Notification.requestPermission(function (status) 
                  {
                    if (Notification.permission !== status)
                      Notification.permission = status;

                    // Se risponde "OK"
                    if (status === "granted")
                      var n = new Notification("Finalmenta hai accettato di ricevere le notifiche. Bravo!!!!");

                    // Aaltrimenti, utilizziamo un tradizionale ALERT come fallback
                    else
                      alert("Alert di Fallback");
                  });
                }

                // Se invece l'utente rifiuta le notifiche
                else {
                  // Utilizziamo un tradizonale Alert come Fallback
                  alert("Hai rifiutato le notifiche Desktop e quindi visualizzi questo Alert");
                }
              });
            });
            
          </script>
          
          <h3>Web Notification</h3>
          <button id='pulsante-notifica' class='btn-primary'>Apri la notifica</button>
                
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