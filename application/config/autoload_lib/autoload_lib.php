<?php
   /* Il vettore specifica le librerie JS che si desidera caricare in TUTTE le view (se nel controller viene chiamata la funzione
      $this->javascripts->add_data_and_get_headers($header_data,&$js_headers)). 
   
      I files (<LIB.js>) di libreria costituiscono le chiavi dell'array,
      mentre le loro path (<PATH>) definiscono i values. Le librerie vengono inserite nell'HEAD di ciascuna view come segue:
      
   <script src='<ROOT_PATH><PATH>/<LIB.js>' type='text/javascript'></script>
   
   <ROOT_PATH> e' la radice come configurata nel file di configurazione config.php.
   
     
     Come chiavi speciali e' possibile utilizzare:
     
     'literal' => che inserisce il value come se fosse una path completa (utile per links remoti), in tal caso il file incluso
                  viene considerato un css se appare la sottostringa 'css' nel value, altrimenti viene considerato file js
     'exec'    => che inserisce il value fra tags <script></script> per immediata esecuzione
     
     Sono specificabili due array di files, quello con chiave 'autoload_high_priority' viene sempre e comunque printato prima degli altri
     nell'header. L'altro, 'autoload_low_priority' puo' essere ritardato passando il parametro 'true' alla funzione add_data_and_get_headers(...)
     Si veda il file Elementi_comuni.php e come viene trattato less per un esempio pratico
    
    
    
    */

   $config['autoload_high_priority']=['jquery'=>[
                                                  'jquery_1_11_2'=>['jquery-1.11.2.min.js'=>'application/libraries/librerie_JS/jquery'],
                                                  'jquery_2_1_3'=>['jquery-2.1.3.min.js'=>'application/libraries/librerie_JS/jquery']
                                                ],
                         
                                      'jquery_ui'=>[
                                                     'jquery_ui_1_11_1'=>['jquery-ui.min.js'=>'application/libraries/librerie_JS/jquery_ui/jquery-ui-1.11.1',
                                                                          'jquery-ui.min.css'=>'application/libraries/librerie_JS/jquery_ui/jquery-ui-1.11.1',
                                                                          'jquery.ui.datepicker-it.min.js'=>'application/libraries/librerie_JS/jquery_ui/jquery-ui-1.10.4/development-bundle/ui/minified/i18n']
                                                   ]
       
                                      //'fonts'=>['fonts_google'=>['literal'=>'http://fonts.googleapis.com/css?family=Lemon']]
                                     ];

   $config['autoload_low_priority']=[
                                      'default_libs'=>['elementi_comuni'=>[
                                                                            'elementi_comuni.js'=>'application/libraries',
                                                                            'jq-dialogs.js'=>'application/libraries',
                                                                            'jq-tabs.js'=>'application/libraries',
                                                                            'jq-accordion.js'=>'application/libraries'
                                                                          ]
                                                      ],
                                      'textarea_autoexpand'=>['jquery_autoexpand'=>['jquery.autoexpand.js'=>'application/libraries/librerie_JS/jquery_plugins/jquery-autoexpand_1.0.2']]
                                    ];
   
   /*****************************************************************************************************************************************************/
   /*********************************************************** FALLBACKS DI CONNESSIONI REMOTE *********************************************************/
   /*****************************************************************************************************************************************************/   
   
   /* una libreria di fallback dovrebbe essere prevista per ogni libreria con tag 'literal' negli array precedenti */
   $config['autoload_fallback']=['jquery_1_11_2'=>['jquery-1.11.2.min.js'=>'application/libraries/librerie_JS/jquery']];
   
   /*****************************************************************************************************************************************************/
   /**************************************** DEFINIRE QUI SOTTO LE LIBRERIE DA CARICARE IN AUTOLOAD *****************************************************/
   /*****************************************************************************************************************************************************/
   
   $config['autoload_DEFAULTS']['dev']=[
                                         'jquery'=>'jquery_1_11_2',
                                         'jquery_ui'=>'jquery_ui_1_11_1',
                                         //'fonts'=>'fonts_google',
                                         'style'=>'stile_home',
                                         'default_libs'=>'elementi_comuni',
                                         'textarea_autoexpand'=>'jquery_autoexpand'
                                       ];
   
   $config['autoload_DEFAULTS']['prod']=[
                                          'jquery'=>'jquery_1_11_2',
                                          'jquery_ui'=>'jquery_ui_1_11_1',
                                          //'fonts'=>'fonts_google',
                                          'style'=>'stile_home',
                                          'default_libs'=>'elementi_comuni',
                                          'textarea_autoexpand'=>'jquery_autoexpand'
                                        ];
 
 
 
 
?>