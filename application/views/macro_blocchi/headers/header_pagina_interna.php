<div id="header-mobile_container">
      <header>
        <!-- HEADER -->
        <div id='logo-login_container'>
          <button type="button" id='toggle-nav' class="pull-left btn btn-primary btn-xs">
            <span class="sr-only">Toggle Nav</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div id='logo'>
            <img src="http://www.mediagate.it/future/application/views/pagine/pagina_interna/images/logo.png" class="pull-left img-responsive" alt='logo'>
          </div>
          <div id='icona-utente' class="block-group booNavigation">
            <a href='#' class='navItem block'>
              <span class="icomoon-user" aria-hidden="true"></span>
            </a>
            <ul class="navContent">
              <li>
                <div class='users-name pull-left'>Mario Rossi</div>
                <div class='number-messages pull-right'>3</div>
              </li>
            </ul>
          </div>
          <div id='login-box_container' class='pull-right'>
            <div class='users-name pull-left'>Mario Rossi</div>
            <div class='number-messages pull-right'>3</div>
          </div>
        </div>  
        
        <!-- PAGE TITLE -->
        <div id='page-title' class='pull-left'>
          <h1>Totocalcio</h1>
        </div>
          
        <!-- MAIN NAVIGATION -->
        <?php print($main_navigation);?>

      </header> 
      
      <button id='view_buttons' style='position:absolute; left:50%; top:30px;'>VISUALIZZA PULSANTI DI EDIT</button>
      <select id='select_language' style='position:absolute; right:5%; top:5px;'>
        <option value='it'>Italiano</option>
        <option value='en'>Inglese</option>
      </select>

      <!-- FIRST LEVEL NAVIGATION -->
      <?php print($first_level_navigation);?>
</div>