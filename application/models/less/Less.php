<?php

class Less extends CI_Model
{
   private $_less_path=[];
   
   function __construct()
   {
      parent::__construct();
      $this->config->load('less/dati_less');
      $less_data=$this->config->item('less');
      $this->_less_path=$less_data['less_path'];
   }

   /*******************************************************************************/
   /********* INIZIO DELLE LE FUNZIONI CHIAMABILI DA CONTROLLERS E MODELS *********/
   /*******************************************************************************/

   function set_headers_js(&$js_headers)
   {

         $js_headers[]='  <script type="text/javascript">
                             less = {
                             env: "development", // or "production"
                             //async: false,       // load imports async
                             //fileAsync: false,   // load imports async when in a page under a file protocol
                             poll: 1000,         // when in watch mode, time in ms between polls
                             dumpLineNumbers: "all" // or "mediaQuery" or "comments"
                             //functions: {},      // user functions, keyed by name
                             
                             };
                          </script>
                          <style>
                             .less-error-message
                             {
                                position:absolute;
                                left:30%;
                             }
                          </style>';
                           
         $this->javascripts->add_data_and_get_headers($this->_less_path,$js_headers,true);
         
         $js_headers[]='  <script type="text/javascript">
                            //less.watch();
                          </script>';

      
      
   }   
}

?>
