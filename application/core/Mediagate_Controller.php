<?php 

/* LA VARIABILE $this->_view_data conterra' i seguenti campi:
 * 
 * meta_tags: (array) tutti i meta tags da caricare nell'HEAD
 * doc_type: (stringa) il doc_type
 * js_headers: (array) le librerie
 * header: (stringa) il blocco header
 * main_navigation, first_level_navigation, second_level_navigation: (stringhe) i blocchi di navigazione
 * aside: (stringa) il blocco aside
 * footer: (stringa) il blocco footer
 * page_tag: (stringa) il nome della classe del controller di pagina
 * title: (stringa) il title della pagina (specificato nel db, via admin main control)
 * year_activation: (int) l'anno di attivazione (specificato nel db, via admin main control)
 * customized_texts: (array) tutti i testi dei blocchi customizzabili
 */

class Mediagate_Controller extends CI_Controller 
{
   public $_main_config_data=[];
   public $_js_headers=[]; 
   public $_is_first_access=true;
   //public $_form_validation='';
   public $_view_data;
   public $_is_connected_to_internet;
   public $_less_enabled;
   public $_profile;
   
   /***************************************/
   public $_editable_block_ids=[];
   /***************************************/
   
   public function __construct()
   {
      parent::__construct();

      $this->init(); 
      
      $this->loadBlocks();
   }

   public function init()
   {

       /*************************** LOAD MAIN CONFIG DATA DAL DB ************************************/
       /*                    CARICA I DATI DI CONFIGURAZIONE DEL SISTEMA DAL DB                     */
       $this->elementi_comuni->loadMainConfigDataFromDb($this->_main_config_data);       
       $this->_view_data['title']=$this->_main_config_data['title'];
       $this->_view_data['year_activation']=$this->_main_config_data['year_activation'];
       
       /***************************************** RESET AJAX ****************************************/
       /*          CANCELLA LE CHIAMATE AJAX PENDENTI AL MOMENTO DELLA CHIAMATA AL CONTROLLER       */
       $this->elementi_comuni->getKillPendingAjaxJSCode($this->_js_headers);
       
       /************************************** PRIMO ACCESSO ****************************************/
       /*                  STORA UN BOOLEANO CHE IDENTIFICA IL PRIMO ACCESSO AL SITO                */       
       $this->_is_first_access=$this->elementi_comuni->isFirstAccess();
       
       /********************************* CONNESSIONE A INTERNET ************************************/
       /*            STORA UN BOOLEANO CHE VERIFICA SE LA CONNESSIONE INTERNET E' ATTIVA            */
       $this->_is_connected_to_internet=$this->elementi_comuni->isConnectedToInternet();
       
       /****************************************** LESS *********************************************/
       /*        GESTISCE LESS (setLess deve essere eseguito prima di loadDefaultLibs)              */  
       $enable_less=$this->_main_config_data['less_css']=='less';
       $this->elementi_comuni->setLess($this->_js_headers,$enable_less);       
       
       /*********************************** CARICA LE LIBRERIE  *************************************/
       /*          COSTRUISCE I COLLEGAMENTI AI FILES JS, CSS, LESS, IMG DA METTERE IN <HEAD>       */ 
       $this->elementi_comuni->loadDefaultLibs($this->_js_headers);
       
       /************************************* CARICA IL TEMA  ***************************************/
       /*                      CARICA IL TEMA SPECIFICATO NEL DB (ADMIN DATA)                       */ 
       $this->elementi_comuni->loadTheme($this->_js_headers);
       
       /*********************************** CARICA I METATAGS  **************************************/
       /* META TAGS DISPONIBILI: 'meta', 'IE8_standard_mode', 'Fix_html5_IE', 'robots_dev' (SOLO DEV)
                                 'robots_prod' (SOLO PROD), 'favicon', 'no_js', 
                                 'facebook' (VUOTO), 'google_analytics' (SOLO PROD), 'viewport'     */
       $this->_view_data['meta_tags']=$this->elementi_comuni->getDefaultMetaTags();
       $this->_view_data['doc_type']=$this->elementi_comuni->getDocTypeString();
       $this->_view_data['nome_sito']=$this->_main_config_data['title'];
               
       /********************************* SET JS GLOBAL VARS ****************************************/
       /*          SETTA ALCUNE VARIABILI GLOBALI, AD ESEMPIO BASE_URL, PER L'UTILIZZO IN JS        */
       $this->elementi_comuni->setJSGlobalVars($this->_view_data['meta_tags']['global_vars']);       
       
       /*********************************** CACHE ***************************************************/
       /*                              ABILITA LA CACHE                                             */
       /* 'enabled' => (true|false) abilita o disabilita la cache su TUTTI i controllers            */
       /* 'min' => se 'enabled' e' true, setta il numero di minuti di vita per i files di cache     */
       
       $enable_cache=$this->_main_config_data['environment']=='prod' && (!$this->_main_config_data['force_disable_cache']);
       $this->elementi_comuni->setCache($enable_cache,10);
       
       /**************************************** INFO_BROWSER POPUP **********************************/
       /*                       COTRUISCE LA FINESTRA POPUP INFO_BROWSER                             */         
       //$this->elementi_comuni->buildInfoBrowserDialog($this->_view_data,$this->_js_headers,true);

       /******************************************* EMAIL ********************************************/
       /*                            COSTRUISCE LA FINESTRA POPUP EMAIL                              */         
       //$this->elementi_comuni->buildEmailFormDialog($this->_view_data,$this->_js_headers,'mediagate');
       
       /**********************************************************************************************/
       
       $this->_view_data['js_headers']=$this->_js_headers;
       
       $this->_view_data['editable_js']='<script type="text/javascript">
                                                   jQuery(document).ready(function()
                                                   {
                                                      alert("add js code for CKeditor");
                                                   });
                                                 </script>';
   }
   
   /* Carica i blocchi per la visualizzazione nella view */
   public function loadBlocks()
   {
       $this->_view_data['header']=$this->loadHeader('header');
       $this->_view_data['main_navigation']=$this->loadMainNavigation('main_navigation');
       $this->_view_data['first_level_navigation']=$this->loadFirstLevelNavigation('first_level_navigation');
       $this->_view_data['second_level_navigation']=$this->loadSecondLevelNavigation('second_level_navigation');
       $this->_view_data['aside']=$this->loadAside('aside');
       $this->_view_data['footer']=$this->loadFooter('footer');
       /* ...add missing blocks...  */
   }

   /********************************************************************************/
   /********************************************************************************/
   /******************************** GESTIONE TESTI ********************************/   
   
   /* public */
   function buildCustomTextBlock($block_type,$block_id,$profile_to_display='',$profile_to_edit='')
   {
      $text_block='<'.$block_type.' id="'.$block_id.'" class="'. $this->checkEditable($block_id,$profile_to_edit).'" >';
      $text_block.=$this->getText($block_id,$profile_to_display);
      $text_block.='</'.$block_type.'>';
      
      print($text_block);
   }
   
   /* private */
   function checkEditable($block_id,$profile_to_edit)
   {
       if(is_string($profile_to_edit) && $profile_to_edit!='' && $this->elementi_comuni->doIRespectProfile($profile_to_edit))
       {
           $this->_editable_block_ids[]=$block_id;
               
           return("editableElement");
       }
   }
   
   function getText($block_id,$profile_to_display='')
   {
       
       if(is_string($profile_to_display) && $profile_to_display!='' && $this->elementi_comuni->doIRespectProfile($profile_to_display))
          return($this->_view_data['customized_texts'][$block_id]);
   }
   
   /********************************************************************************/
   /********************************************************************************/
   /********************************** SHORTCUTS ***********************************/
   public function loadHeader($filename,$data=[])
   {
       return($this->elementi_comuni->loadHeader($filename,$data));
   }

   public function loadMainNavigation($filename,$data=[])
   {
       return($this->elementi_comuni->loadMainNavigation($filename,$data));
   }

   public function loadFirstLevelNavigation($filename,$data=[])
   {
       return($this->elementi_comuni->loadFirstLevelNavigation($filename,$data));
   }

   public function loadSecondLevelNavigation($filename,$data=[])
   {
       return($this->elementi_comuni->loadSecondLevelNavigation($filename,$data));
   }

   public function loadAside($filename,$data=[])
   {
       return($this->elementi_comuni->loadAside($filename,$data));
   }

   public function loadFooter($filename,$data=[])
   {
       return($this->elementi_comuni->loadFooter($filename,$data));
   }
   /* ...add missing shortcuts...  */
   
   /********************************************************************************/
   /********************************************************************************/   
   /****************************** SAFE FORMS EXTENSIONS ***************************/
   public function check_data($string,$param)
   {
       return($this->safe_forms->check_data($string,$param));
   }   
   
}

   /********************************************************************************/
   /********************************************************************************/
   /************************ CONTROLLERS INTERMEDI *********************************/

      include_once('Private_Controller.php');
      include_once('Public_Controller.php');


?>
