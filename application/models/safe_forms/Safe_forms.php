<?php

/* 
 * 
    UTILIZZO:
    ========

Questo model nasce per aggiungere un layer di validazione PHP e JS ad un form definito senza alcuna validazione. Gli elementi fondamentali sono:
  
 1) Una view che contiene il form da validare (UN SOLO form per view). Tale view puo' essere assolutamente generale, contenere un numero arbitrario di campi input, attributi e classi a piacere, layout arbitrari
    e anche codice javascript.
  
 2) CONVENZIONI FILE FORM
 
    - Il form deve avere un ID (il NAME e' facoltativo) e deve essere nella forma:
      <FORM id='id_form' name='name_form' method='POST'>
      NON deve contenere l'action, che viene aggiunto automaticamente (o passato in fase di chiamata a build_safe_forms)
 
    - Ogni input deve avere definito un ID e un NAME, sebbene non indispensabile e' meglio che ID e NAME siano identici (a parte per checkbox e radio dove i NAME hanno le parentesi quadre []), 
      Le opzioni dei select possono non avere un name ma devono avere almeno l'ID
 
    - I pulsanti di submit NON devono essere di tipo SUBMIT! Possono essere qualunque cosa cliccabile, l'evento submit al click viene aggiunto automaticamente 
 
 3) GESTIONE ERRORI 
 
    - Gestione degli errori PHP: devono forzatamente essere aggiunti al DOM via php e non via JS (ovviamente). Questo fa si che eventuali container
      di errori DEBBANO essere gia' definiti nella view del form (o comunque nel DOM della pagina che conterra' il form) e non possono essere creati al volo in javascript.
      Sono supportate due tipologie di container per gli errori PHP: 

        - Un singolo container globale che raggruppa tutti gli errori generati dalla validazione su tutti i campi
          OPPURE
        - N containers strettamente legati al singolo input che riportano gli errori dell'input corrispondente (si veda la spiegazione qui sotto del file di configurazione per le convenzioni adottate).
    
 4) FUNZIONAMENTO 
 
    - Il presente model carica in memoria il file di view contenente il form, lo processa per mezzo degli strumenti messi a disposizione da 'simple html dom' e genera una stringa che contiene 
      il form di input aggiornato in alcuni dettagli. In particolare:
  
    VALIDAZIONE PHP 
    ===============

    Sono applicabili le seguenti regole di validazione di CodeIgniter:
 
    Rule            Parameter     Description                                                                                                                   Example
    ----            ---------     -----------      
                                                                                                              -------
   required            No         Returns FALSE if the form element is empty.      
   matches             Yes        Returns FALSE if the form element does not match the one in the parameter.                                                    matches[form_item]
   is_unique           Yes        Returns FALSE if the form element is not unique to the table and field name in the parameter.                                 is_unique[table.field]
   min_length          Yes        Returns FALSE if the form element is shorter then the parameter value.                                                        min_length[6]
   max_length          Yes        Returns FALSE if the form element is longer then the parameter value.                                                         max_length[12]
   exact_length        Yes        Returns FALSE if the form element is not exactly the parameter value.                                                         exact_length[8]
   greater_than        Yes        Returns FALSE if the form element is less than the parameter value or not numeric.                                            greater_than[8]
   less_than           Yes        Returns FALSE if the form element is greater than the parameter value or not numeric.                                         less_than[8]
   alpha               No         Returns FALSE if the form element contains anything other than alphabetical characters.      
   alpha_numeric       No         Returns FALSE if the form element contains anything other than alpha-numeric characters.     
   alpha_dash          No         Returns FALSE if the form element contains anything other than alpha-numeric characters, underscores or dashes.      
   numeric             No         Returns FALSE if the form element contains anything other than numeric characters.   
   integer             No         Returns FALSE if the form element contains anything other than an integer.   
   decimal             Yes        Returns FALSE if the form element is not exactly the parameter value.    
   is_natural          No         Returns FALSE if the form element contains anything other than a natural number: 0, 1, 2, 3, etc.    
   is_natural_no_zero  No         Returns FALSE if the form element contains anything other than a natural number, but not zero: 1, 2, 3, etc.     
   valid_email         No         Returns FALSE if the form element does not contain a valid email address.    
   valid_emails        No         Returns FALSE if any value provided in a comma separated list is not a valid email.      
   valid_ip            No         Returns FALSE if the supplied IP is not valid. Accepts an optional parameter of "IPv4" or "IPv6" to specify an IP format.    
   valid_base64        No         Returns FALSE if the supplied string contains anything other than valid Base64 characters. 
  
    Cui si aggiungono le seguenti funzioni di 'prepping'
 
    Name           Parameter   Description
    ----           ---------   -----------

   xss_clean          No       Runs the data through the XSS filtering function, described in the Input Class page.
   prep_for_form      No       Converts special characters so that HTML data can be shown in a form field without breaking it.
   prep_url           No       Adds "http://" to URLs if missing.
   strip_image_tags   No       Strips the HTML from image tags leaving the raw URL.
   encode_php_tags    No       Converts PHP tags to entities.
  
 
  ATTENZIONE: E' possibile aggiungere validazioni personalizzate. Questo e' uno strumento molto potente e permette di validare il singolo input in base a qualunque
              criterio. Le funzioni sono disponibili in application/core/Mediagate_Controller.php. 
  
              Al momento le funzioni disponibili sono:
  
                 - check_data($pattern) => permette di validare una data in base a un pattern. La regola PHP si scrive 'callback_check_data[pattern]'
                                           in cui pattern e', ad esempio gg/mm/aaaa. In generale il pattern puo' essere qualunque combinazione di giorni
                                           ('g' o 'd'), mesi ('m') e anni ('a' o 'y') separati da un separatore. 
  
    VALIDAZIONE JS 
    ==============
 
   E' implementato il plugin jQuery 'validationEngine', si veda la pagina https://github.com/posabsolute/jQuery-Validation-Engine per info
 
    CAPTCHA
    =======
  
   E' implementato e disponibile il plugin jQuery 'motionCaptcha', si veda la pagina https://github.com/josscrowcroft/MotionCAPTCHA per info
 
 
    FILE CONFIGURAZIONE:
    ===================

   Il file di configurazione prevede che le validazioni siano associate a singoli form, con la sintassi:
  
   $config['safe_forms']['LABEL_FORM_1']=array(...);
   $config['safe_forms']['LABEL_FORM_2']=array(...);
   ...
 
   In cui LABEL_FORM_X e' la label passata come primo parametro alla funzione build_safe_forms() e identifica i dati del form corrente nel file di configurazione
 
   L'array di configurazione per ciascun form e' il seguente:
 
   'form_view_file' => file contenente la view del form da validare, si assume che la path di riferimento sia application/views (ex: 'sito/pagine/home/forms/form_mailing_list.php'),

   'php_validation' => Configurazione globale della validazione JS, accetta due valori:

                       'enabled'          => booleano che abilita o disabilita la validazione PHP (true per default)

                       'php_errors'       =>  array per la gestione degli errori lato server (CodeIgniter), permette di specificare le sotto-opzioni:
                           'show_errors'  =>  e' un booleano che specifica se printare gli errori di validazione o meno. La validazione viene comunque eseguita, solo l'output puo' venire soppresso
                           'mode'  =>  specifica la modalita' per la descrizione degli errori: 'all' per un unico container per tutti gli errori di tutti gli input
                                                                                               'individual' per N container di errori, ognuno associato ad uno specifico input
                                                                                               IN ENTRAMBI I CASI I CONTAINER DEVONO GIA' ESSERE PRESENTI NEL FILE DELLA VIEW DEL FORM
                           'error_container_id'  =>  ID del container che ospitera' TUTTI i messaggi d'errore in caso si sia specificato 'all' al'opzione precedente. Se invece
                                                     si e' specificato 'individual' allora i singoli messaggi verranno associati a N container con ID "$name_ERROR_CONTAINER_ID"
                                                     in cui $nome e' il name dell'input corrente mentre ERROR_CONTAINER_ID e' il value associato a 'error_container_id'

   'js_validation'  => Configurazione globale della validazione JS, accetta due valori:

                       'enabled'                       => booleano che abilita o disabilita la validazione JS (true per default)
                       'field_classes_on_validation'   => aggiunge al campo corrente le classi specificate a seconda dell'esito della validazione
                       'submit_id'                     => specifica l'ID del pulsante (o link) sul cui click si desidera l'evento submit

   'motion_captcha' => Configurazione (opzionale) del motion Captcha (il container del captcha deve essere gia' incluso nella view)
                      
                       'enabled'      =>  booleano che specifica se si desidera (true) o meno (false) la presenza del captcha
                       'container_id' =>  ID del container del captcha, predefinito nella view del form
                       'title'        =>  titolo descrittivo del captcha,
                       'error_msg'    =>  messaggio in caso di errore
                       'success_msg'  =>  messaggio in caso di successo
  
   'autocomplete' => abilita/disabilita l'autocomplete dei campi input (booleano)
 
   'char_counter' => abilita la visualizzazione di un contatore di caratteri su ogni input e textarea di una form
                     
                     'enable'            => booleano, abilita la visualizzazione dei contatori
                     'mode'              => stringa, puo' essere: 'missing' (indica solo il num di caratteri mancanti per raggiungere il max_length)
                                                       'written_total' (indica il numero di caratteri immessi rispetto al totale nella forma X/Y)
                     'counter_div_class' => classe applicata al div contenitore dei contatori
 
   'alert_submission_ok' => Configurazione (opzionale) di un alert che si apre in caso di submit senza errori
 
                            'enabled'   =>  booleano che abilita (mostra) o disabilita l'alert
                            'auto_call' =>  booleano che apre l'alert automaticamente in caso di submit con validazione ok. Altrimenti l'alert puo' essere invocato dall'esterno 
                                            lanciando la funzione get_alert_submission_ok() che ritorna la stringa JS per l'esecuzione dell'alert. 
                            'options'   =>  opzioni per il dialog dell'alert
                            'message'   =>  messaggio dell'alert
 
   'confirm_before_submission'=> Configurazione (opzionale) di un confirm al submit. Puo' essere usato semplicemente per chiedere conferma dell'operazione di sottomissione oppure,
                                 ad esempio, per generare un report dei dati immessi. All'OK il form viene effettivamente sottomesso
 
                                 'enable'  =>  booleano che specifica se si desidera (true) o meno (false) la presenza del confirm
                                 'message' =>  array che specifica il contenuto del messaggio del confirm. E' possibile inserire tre tipi di contenuti:
 
                                               'source_mode' => Puo' assumere tre valori: 'direct' | 'view' | 'container_selector'. Il primo permette di specificare un contenuto diretto (adatto
                                                                per messaggi molto semplici, ad esempio 'sei sicuro di voler continuare?'), il secondo permette di specificare un file di view da cui
                                                                caricare i contenuti, il terzo permette di specificare un selector jQuery di un container che contiene il messaggio da printare (in questo
                                                                caso il container deve essere incluso nel DOM)
                                               'content'     => a seconda di quanto specificato nel parametro precedente puo' essere un messaggio diretto, un file di view (path completa senza base_url()
                                                                o un selector jQuery
                                 dialog_options'=> eventuali opzioni per il dialog di jQuery UI,
  
   'inputs'  => array che specifica le opzioni per ciascun input del form corrente, le chiavi principali dell'array sono i name degli input.

                <name dell'input> => array di opzioni per l'input corrente:
 
                                     'label'          => descrizione 'umana' del campo corrente
                                     'php_rules'      => stringa di opzioni per la validazione PHP secondo la sintassi di CodeIgniter
                                     'js_rules'       => stringa di opzioni per la validazione JS, la stringa viene applicata all'attributo class di ciascun input
                                     'promptPosition' => posizione del tooltip della validazione JS per l'input corrente. Sintassi: '<POSIZIONE>:<SHIFT_X>,<SHIFT_Y>'
                                                         in cui <POSIZIONE> e' uno dei seguenti valori:  "topLeft", "topRight", "bottomLeft", "centerRight", "bottomRight", "inline". 
                                                         Si veda https://github.com/posabsolute/jQuery-Validation-Engine per ulteriori info
                                                         <SHIFT_X>,<SHIFT_Y> sono degli shift rispetto alla posizione default in pixel, sono consentiti anche numeri negativi
                                     'db'             => vedi prossima sezione 
  
    INTERAZIONE COL DATABASE:
    ========================

   Per ogni input possono essere specificate 7 opzioni per l'interazione col database ('db'), ex:

   'db'=>array('db_enabled' => false,
               'db_group'   => 'default',
               'db_table'   => 'dati_login',
               'db_field'   => 'password',
               'db_where'   => array('id'=>'1'),
               'db_parsing_function' => 'parse_name',
               'db_save_action'      => 'update' || 'insert' || 'insert_once')

   In cui:

   'db_enabled'                                => true|false (rispettivamente abilita e disabilita l'interazione col db)            
   'db_disable_if_some_other_validation_fails' => l'interazione col db avviene solo se la validazione del campo in questione NON fallisce (ovviamente). Tuttavia
                                                  per quanto riguarda le validazioni degli altri campi si puo' decidere di essere meno restrittivi. In caso di
                                                  valore 'true' l'interazione viene DISABILITATA se anche solo uno degli altri campi verificati non passa la validazione.
                                                  Viceversa, se 'false' l'interazione viene ABILITATA indipendentemente dalle altre validazioni    
   'db_table'                                  => la tabella che contiene i dati per l'input corrente
   'db_field'                                  => il campo che contiene i dati per l'input corrente
   'db_where'                                  => un array che specifica i filtri per l'estrazione dei dati, le chiavi sono i campi di filtro 
                   ATTENZIONE 1: e' possibile anche specificare una variabile nei valori dell'array, ad esempio:
                                 array('user_id'=>'$_SESSION["user_id"]') permette di specificare il where con 
                                 la seguente sintassi MySql:
                                 ... WHERE user_id=<valore della variabile php $_SESSION["user_id"]>.
                                 Altre opzioni sono date da:
                                 array('user_id'=>'$this->session->userdata("user_id")') => come prima, ma sfruttando le sessioni di codeigniter
                                 array('id'=>'$CURR_ID') => ID massimo fra i record della tabella corrente (utile per fare update nell'ultimo
                                                            record inserito)

                   ATTENZIONE 2: Normalmente e' necessario salvare N campi nello stesso record di db. Questo si puo' fare
                                 in due modi: o usando una variabile pre-registrata sia nel db che in una variabile di sistema
                                 (ad esempio come mostrato sopra, mediante $_SESSION['user_id'] che e' disponibile sia in php
                                 che nel db MySql) che identifichi lo stesso record del db per i campi 'db_where' di diversi input, 
                                 oppure mediante una variabile specifica chiamata $CURR_ID. In pratica e'
                                 possibile salvare N campi in un unico record applicando l'opzione "insert" a "db_save_action"
                                 per il PRIMO campo da salvare nel db (che corrisponde al primo specificato in questo file).
                                 Gli altri campi avranno un'opzione "db_save_action" uguale a "update" e in piu' un'opzione
                                 'db_where'=>array('id','$CURR_ID'). Questa usa l'ID del record appena salvato e lo usa nel where
                                 per tutti i record update.
   
   'db_parsing_function'                       => specifica il NOME (senza parentesi ne' argomenti) di una funzione contenuta nel file 
                                                  .../libraries/safe_forms/validazione/Db_parsing_functions.php per il parsing dei dati da e per il database.
                                                  questo parsing NON effettua validazione, questa e' fatta a monte se la funzionalita' e' attivata.
                                                  vedere il file Db_parsing_functions.php per esempi di funzioni di parsing.
   'db_save_action'                            => insert|insert_once|update (specifica l'azione da compiere in fase di salvataggio dei dati, "insert" aggiunge un nuovo
                                                  record, "insert_once" lo aggiunge solo se non gia' presente nel db, "update" aggiorna i dati 
                                                  in corrispondenza di quanto specificato in 'db_where')
  
*/

include_once("application/helpers/DOM_parser/simple_html_dom.php");
class Safe_forms extends CI_Model 
{
   private $_dati;
   private $_all_validation_errors=array();
   private $_individual_validation_errors=array();
   private $_validation_is_ok=array();
   private $_db_id;
   private $_alert_submission_ok='';
   
   function __construct()
   {
      // Call the Model constructor
      parent::__construct();
      $this->config->load('safe_forms/dati_safe_forms');
      $this->_dati=$this->config->item('safe_forms');
         
      $this->config->set_item('language', 'italian');   
      
      $this->load->library('safe_forms/validazione/db_parsing_functions');
    
      $this->_db_id=$this->load->database('default',TRUE);
      //$this->load->helper('htmlpurifier/htmlpurifier');
   }

   /*******************************************************************************/
   /********* INIZIO DELLE LE FUNZIONI CHIAMABILI DA CONTROLLERS E MODELS *********/
   /*******************************************************************************/

   function set_headers(&$js_headers)
   {
      $curr_headers=$this->_dati['headers'];
      $this->javascripts->add_data_and_get_headers($curr_headers,$js_headers);
   }
   
   function build_safe_forms($label,$form_view_data=array(),$form_action='')
   {
      $form_validation='form_validation_'.$label;
//print($label.': '.isset(get_instance()->_form_validation).'<br>');  
      if(isset(get_instance()->_form_validation))
         get_instance()->_form_validation=$form_validation;
      
//print('form:validation loaded? '.($this->load->is_loaded('form_validation')).'<br>');
//print('   Loading: '.$form_validation.'<br>');
      $this->load->library('form_validation',array(),$form_validation); 
       
      $curr_form_data=$this->_dati[$label]; 
      $captcha_data=$curr_form_data['motion_captcha'];
      
      /* disabilitazione da admin control */
      if((bool)get_instance()->_main_config_data['force_disable_form_validation'])
      {
         $curr_form_data['js_validation']['enabled']=false;
         $curr_form_data['php_validation']['enabled']=false;   
         $captcha_data['enabled']=false;
      }
      
    
      /********************************************************************************************************************************************************************/
      /***                                             CARICA LA VIEW CONTENENTE IL FORM, ESEGUE IL PARSING CON SIMPLE HTML DOM                                         ***/   
      /********************************************************************************************************************************************************************/    
      /* Caricare la view in questo modo permette di passare parametri php, cosa altrimenti impossibile se la view fosse stata caricata nel simple html dom direttamente
         con "file_get_html" */
      $form_view_as_string=$this->load->view($curr_form_data['form_view_file'],$form_view_data,true);
      
      $html = str_get_html($form_view_as_string);
      $form=$html->find('form',0);
      
      /********************************************************************************************************************************************************************/
      /***                                                          SETTA LE REGOLE DI VALIDAZIONE PER TUTTI GLI INPUT DEL FORM                                         ***/
      /********************************************************************************************************************************************************************/
      $input_names=array();
      //$input_types=array();
      //$input_values=array();
      
      $fields_to_be_validated=array_keys($curr_form_data['inputs']);
      
//var_dump($fields_to_be_validated);
      //foreach($html->find('[class*=validate]') as $element)//($html->find('input') as $element)
      for($i=0;$i<sizeof($fields_to_be_validated);$i++)
      {
         $element=$html->find('[name='.$fields_to_be_validated[$i].']',0);
         if(!sizeof($element))
            continue;
         //print('Element '.'[name='.$fields_to_be_validated[$i].']: ');
         //print(sizeof($element));print('<BR><br><br>'); 
          
         //if($element->type=='submit' || $element->type=='hidden')
         //      continue;
            
         $name=$element->name;
         $input_names[]=$name;  
                   
         //if(!isset($curr_form_data['inputs'][$name])) 
         //   continue;          
                   
         $input_label=$curr_form_data['inputs'][$name]['label'];
         $php_rules=$curr_form_data['inputs'][$name]['php_rules'];
//print('setting rule: '.$php_rules.' for input: '.$name.'<br>');         
         $this->$form_validation->set_rules($name, $input_label,$php_rules);  
      }

      /********************************************************************************************************************************************************************/
      /***                                                                      ESEGUE LA VALIDAZIONE                                                                   ***/
      /********************************************************************************************************************************************************************/
//get_instance()->call('check_data',array('12/12/','reservations_form,dd/mm/yyyy'));
      $php_validation_alert="";
      if($curr_form_data['php_validation']['enabled'])
         $this->_validation_is_ok[$label]=$this->$form_validation->run();
      else
      {
         $php_validation_alert="<SCRIPT type='text/javascript'>\n
                                   jQuery(document).ready(function(){\n
                                      run_dialog_as_alert({modal: true},'<DIV>ATTENZIONE: VALIDAZIONE PHP DISATTIVATA</DIV>',function(){},'safe_forms_disabled_validation');\n
                                   });\n
                                </SCRIPT>\n";
         $this->_validation_is_ok[$label]=true;
      }
//print($label.' >'.($this->_validation_is_ok[$label]).'< <br> ');
      /********************************************************************************************************************************************************************/
      /*** AGGIUNGE I VALORI PRECOMPILATI AI CAMPI VIA JAVASCRIPT (PER UN PROBLEMA DEL PARSER DOM NON E' POSSIBILE FARLO VIA $current_input->setAttribute('value',...)) ***/
      /********************************************************************************************************************************************************************/
      $form_repopulation="<SCRIPT type='text/javascript'>\n";
      $form_repopulation.="jQuery(document).ready(function(){\n";      
      
      //foreach($html->find('[class*=validate]') as $element)//($html->find('input') as $element)
//print('1) setvalue: '.set_value('responsabile_nome_cognome').'<br>');

      $field_ids=array();
      for($i=0;$i<sizeof($fields_to_be_validated);$i++)
      {
         $element=$html->find('[name='.$fields_to_be_validated[$i].']',0);
         if(!sizeof($element))
            continue;

         
         if($element->type=='checkbox')
         {
            $elements=$html->find('[name='.$fields_to_be_validated[$i].']');
            for($j=0;$j<sizeof($elements);$j++)
            {
//print(($elements[$j]->id).' -> '.($elements[$j]->value).' -> '.set_checkbox($elements[$j]->name,$elements[$j]->value).'<br>');
//$form_repopulation.="alert(jQuery(':checkbox[id=\"".$elements[$j]->id."\"]').length);";
               $form_repopulation.="jQuery(':checkbox[id=\"".$elements[$j]->id."\"]').prop('checked','".set_checkbox($elements[$j]->name,$elements[$j]->value)."');\n";
             }
         }         
         else if($element->type=='radio')
         {
//print('setting radio: '.$element->id.'<br>'.$element->type.'<br><br>');  

            $form_repopulation.="jQuery(':radio[id=\"".$element->id."\"]').attr('checked','".set_radio($element->name,$element->value)."');\n";    
         }
         else if($element->type=='select')
         {
//print('setting select: '.$element->id.'<br>'.$element->type.'<br><br>');
               
             $select_options=$html->find('[id='.$element->id.']')->children();
             foreach($select_options as $option)
                $form_repopulation.="jQuery('[id=\"".$option->id."\"]').attr('checked','".set_select($element->name,$option->value)."');\n";
             //$form_repopulation.="alert('select population not supported yet');";
         }
         else
         {
//print('setting text: '.$element->id.'<br>'.$element->type.'<br><br>');  

            $form_repopulation.="var curr_input=jQuery('[id=\"".$element->id."\"]');\n
                                 if(curr_input.val()=='')\n
                                    curr_input.attr('value','".set_value($element->name)."');\n";
            //if($element->tag!='input' && $element->tag!='textarea')
            //   $non_input_fields[]=$element->id;
         }  
         $field_ids[]=$element->id;                
      }
      
//var_dump($non_input_fields);      
      
      /*for($i=0;$i<sizeof($input_names);$i++)
      {
          $id=$input_names[$i];
          if($input_types[$i]=='checkbox')
              $form_repopulation.="jQuery(':checkbox[id=\"".$id."\"]').attr('checked','".set_checkbox($input_names[$i],$input_values[$i])."')";
          else if($input_types[$i]=='radio')
              $form_repopulation.="jQuery(':radio[id=\"".$id."\"]').attr('checked','".set_radio($input_names[$i],$input_values[$i])."')";

      }*/
          //$form_repopulation.="jQuery('input[name=\"".$name."\"]').attr('value','".set_value($name)."');\n";

      $form_repopulation.="});\n";
      $form_repopulation.="</script>\n";
    
      if(isset($curr_form_data['precompile_fields_after_submission']) && !$curr_form_data['precompile_fields_after_submission'])
         $form_repopulation='';
      
      /********************************************************************************************************************************************************************/
      /***                                                                     VALIDAZIONE JAVASCRIPT                                                                   ***/
      /********************************************************************************************************************************************************************/
       
      $js_validation="";
      $skip_js_validation=array();
      if($curr_form_data['js_validation']['enabled'])
      {         
    
         //foreach($html->find('[class*=validate]') as $element)//($html->find('input') as $element)
         for($i=0;$i<sizeof($fields_to_be_validated);$i++)
         {
            $elements=$html->find('[name='.$fields_to_be_validated[$i].']');                     
            
            if(!sizeof($elements))
               continue;
            
//var_dump($fields_to_be_validated[$i]);
//print('sizeof($elements): '.sizeof($elements).'<br>');
            
            
            //if($element->type=='submit' || $element->type=='hidden')
            //   continue; 
            for($j=0;$j<sizeof($elements);$j++)
            {
               $name=$elements[$j]->name;

            //if(!isset($curr_form_data['inputs'][$name])) 
            //   continue;       
       
               $js_rules_array=explode('|',$curr_form_data['inputs'][$name]['js_rules']);  
               $js_rules=join(',',$js_rules_array);
               if(strlen($js_rules)==0)
                  $skip_js_validation[]=$elements[$j]->id;
            
               if(!isset($curr_form_data['inputs'][$name]['promptPosition']) || !strlen($curr_form_data['inputs'][$name]['promptPosition']))
                  $curr_form_data['inputs'][$name]['promptPosition']='topLeft';
            
//print($name.': ');print($curr_form_data['inputs'][$name]['js_rules']);print('<br>');
            
               $js_validation.="<SCRIPT type='text/javascript'>\n
                                   jQuery(document).ready(function(){\n
                                   jQuery('#".($elements[$j]->id)."').addClass('validate[".$js_rules."]');\n
                                   jQuery('#".($elements[$j]->id)."').attr('data-prompt-position','".$curr_form_data['inputs'][$name]['promptPosition']."');\n
                                   });\n
                                </SCRIPT>\n";
            }
         }


         /********************************************************************************************************************************************************************/
         /***                                                                             ESEGUE LA VALIDAZIONE JS                                                         ***/
         /********************************************************************************************************************************************************************/
         $js_validation.="<SCRIPT type='text/javascript'>\n
                                jQuery(document).ready(function(){\n
                                var confirm=false;
                                
                                do_submit=function(selector){jQuery('#'+selector['form_id']).submit();};\n
                                
                                var class_successful='".$curr_form_data['js_validation']['field_classes_on_validation']['successful']."';\n
                                var class_failed='".$curr_form_data['js_validation']['field_classes_on_validation']['failed']."';\n";
//var_dump($field_ids);                  
         for($i=0;$i<sizeof($field_ids);$i++)                       
         {
            if(in_array($field_ids[$i], $skip_js_validation)) 
               continue;
             
            $js_validation.="     jQuery('#".$field_ids[$i]."').not('.ui-spinner-input').on('click keyup blur',function()\n
                                  {\n
                                      var error=jQuery('#".($field_ids[$i])."').validationEngine('validate');\n

                                      if(error)\n
                                         jQuery('#".($field_ids[$i])."').removeClass(class_successful).addClass(class_failed);\n
                                      else\n
                                      {
                                         jQuery('#".($field_ids[$i])."').removeClass(class_failed).addClass(class_successful);\n
                                         jQuery('#".($field_ids[$i])."').validationEngine('hide');\n
                                      }
                                  });\n";           
             
         }                      
                                
         $js_validation.="        jQuery('#".($form->id)." .ui-spinner').on('click',function()\n
                                  {\n
//alert(jQuery(this).attr('class'));                                 
//jQuery('body').append('<div id=\"log\"/>');
//jQuery('#log').append(jQuery(this).parent('.ui-spinner').children('.ui-spinner-input').attr('id')+'<br>');                                        
                                      var parent_form_id=jQuery(this).parents('form').attr('id');
//alert(parent_form_id+' != '+jQuery(".($form->id).").attr('id'));                                      
                                      if(parent_form_id!=jQuery(".($form->id).").attr('id'))
                                         return false;
                                         
                                      var input_id=jQuery(this).children('.ui-spinner-input').attr('id');                                  

                                      var error=jQuery('#'+input_id).validationEngine('validate');\n
                                      

//alert(input_id+' | '+error);   
                                      if(error)\n
                                      {
                                         jQuery('#'+input_id).removeClass(class_successful).addClass(class_failed);\n
                                      }
                                      else\n
                                      {
                                         jQuery('#'+input_id).removeClass(class_failed).addClass(class_successful);\n

//alert('hiding: '+input_id+' > '+jQuery('.ui-spinner-button').length+' > '+jQuery(this).attr('class'));
                                         jQuery('#'+input_id).validationEngine('hide');\n
                                      }
                                  });\n";           
         
         $js_validation.="        jQuery('#".$curr_form_data['js_validation']['submit_id']."').on('click',function()\n
                                  {\n
                                     var error=false;\n";
                                     
         for($i=0;$i<sizeof($field_ids);$i++)       
         {
            if(in_array($field_ids[$i], $skip_js_validation)) 
               continue; 
               
            $js_validation.="        var curr_error=jQuery('#".$field_ids[$i]."').validationEngine('validate');\n
                                      if(curr_error)\n
                                         jQuery('#".($field_ids[$i])."').removeClass(class_successful).addClass(class_failed);\n
                                      else\n
                                      {
                                         jQuery('#".($field_ids[$i])."').removeClass(class_failed).addClass(class_successful);\n
                                         jQuery('#".($field_ids[$i])."').validationEngine('hide');\n
                                      }
                                     error=(curr_error || error);\n";                                               
         }
   
         /********************************************************************************************************************************************************************/
         /***                                                                 AGGIUNGE UN CONFIRM, SE ABILITATO                                                            ***/
         /********************************************************************************************************************************************************************/
   
         if(isset($curr_form_data['confirm_before_submission']) && $curr_form_data['confirm_before_submission']['enable'])
         {

            if($curr_form_data['confirm_before_submission']['message']['source_mode']=='direct')
            {
                $message=$curr_form_data['confirm_before_submission']['message']['content'];
                $js_validation.="     var confirm_message='".$message."';\n";
            }
            else if($curr_form_data['confirm_before_submission']['message']['source_mode']=='view')       
            { 
                $message=$this->load->view($curr_form_data['confirm_before_submission']['message']['content'],array(),true);
                $js_validation.="     var confirm_message='".$message."';\n";
            }
            else if($curr_form_data['confirm_before_submission']['message']['source_mode']=='container_selector')
            {
                 $js_validation.="     var confirm_message=jQuery('".$curr_form_data['confirm_before_submission']['message']['content']."').html();\n";
            }
            
            $js_validation.="     confirm=true;\n
                                  var open_confirm=function(){run_dialog_as_confirm(".$curr_form_data['confirm_before_submission']['dialog_options'].",
                                                        '<div>'+confirm_message+'</div>',
                                                        'do_submit',
                                                        {form_id: '".($form->id)."'},
                                                        'safe_forms_confirm_submit',
                                                        {'yes_btn_label':'Conferma','no_btn_label':'Modifica'})};\n";
             
         }

         /********************************************************************************************************************************************************************/
         
         $js_validation.="           if(!error)\n
                                     {\n
                                        if(!confirm)
                                           do_submit({form_id: '".($form->id)."'});\n
                                        else\n
	                                       open_confirm();\n

                                     }\n
                                  });\n
                            });\n
                         </SCRIPT>\n"; 
         /********************************************************************************************************************************************************************/
      } 
      else 
      {
         $js_validation.="<SCRIPT type='text/javascript'>\n
                             jQuery(document).ready(function(){\n
                                    jQuery('#".$curr_form_data['js_validation']['submit_id']."').click(function()\n
                                    {
                                       jQuery('#".($form->id)."').submit();\n
                                    });\n
                             });\n
                          </SCRIPT>\n"; 	
      }

      /********************************************************************************************************************************************************************/
      /***                                STORA EVENTUALI ERRORI INDIVIDUALI E GLOBALI E LI ASSEGNA AI RELATIVI CONTAINER, SE PRESENTI                                  ***/
      /********************************************************************************************************************************************************************/

      if($curr_form_data['php_validation']['enabled'])
      {
         $this->_all_validation_errors[$label]=validation_errors();
    
//print('test SUBMITTED['.'submitted_'.($form->id).']='.strlen($this->input->post('submitted_'.($form->id),true)).'<br>');
         $all_validations_are_ok=true;
         for($i=0;$i<sizeof($input_names);$i++)
         {     
            $this->_individual_validation_errors[$label][$input_names[$i]]=form_error($input_names[$i]);
            $all_validations_are_ok=$all_validations_are_ok && strlen($this->_individual_validation_errors[$label][$input_names[$i]]==0);
         }
      
         if($curr_form_data['php_validation']['php_errors']['show_errors'] && strlen($this->input->post('submitted_'.($form->id),true)))
         {
            if($curr_form_data['php_validation']['php_errors']['mode']=='all')
            {
               $container_errori=$html->find('[id='.$curr_form_data['php_validation']['php_errors']['error_container_id'].']',0); 

               $container_errori->setAttribute('style','display:block;'); 
//print($label.'->'.$container_errori->id.' setting error: '.$this->_all_validation_errors[$label].' $container_errori: '.$container_errori.' id errori: '.$curr_form_data['php_validation']['php_errors']['error_container_id'].'<br>');
               if($container_errori)
               {
                  $container_errori->innertext = $this->_all_validation_errors[$label];              
               }
            }
            else if($curr_form_data['php_validation']['php_errors']['mode']=='individual')
            {
               foreach($this->_individual_validation_errors[$label] as $name => $curr_error)
               {             
//print('Errore: '.$curr_error.' to '.$name.'_'.$curr_form_data['php_validation']['php_errors']['error_container_id'].'<br>');
                  $container_errori=$html->find('[id='.$name.'_'.$curr_form_data['php_validation']['php_errors']['error_container_id'].']',0);  
               
                  if($container_errori)
                  {               
                     $container_errori->setAttribute('style','display:block;'); 
                     $container_errori->innertext = $curr_error;             
                  }
               }
            }
         }
      }
      else
         $all_validations_are_ok=true;
      /********************************************************************************************************************************************************************/
      /***                                                                ALERT PER SUBMISSION OK                                                                       ***/
      /********************************************************************************************************************************************************************/
//print(strlen($this->input->post('submitted_'.($form->id),true)).'<br>'.$all_validations_are_ok.'<br>'.isset($curr_form_data['inputs'][$name]['alert_submission_ok']).'<br>'.$curr_form_data['inputs'][$name]['alert_submission_ok']['enabled'].'<br>');

      $alert_submission_ok='';
      if(strlen($this->input->post('submitted_'.($form->id),true)) && $all_validations_are_ok && 
         isset($curr_form_data['alert_submission_ok']) && $curr_form_data['alert_submission_ok']['enabled'])
      {
         $alert_submission_ok.="<SCRIPT type='text/javascript'>\n
                                   jQuery(document).ready(function(){\n
                                      var alert_submission_ok=".$curr_form_data['alert_submission_ok']['options'].";\n
                                      jQuery.extend(alert_submission_ok,{modal: true});
                                      run_dialog_as_alert(alert_submission_ok,'<DIV id=\"alert_submission_ok\">".$curr_form_data['alert_submission_ok']['message']."</DIV>',function(){},'alert_submission_ok');\n
                                   });\n
                                </SCRIPT>\n";
                                
         if(!$curr_form_data['alert_submission_ok']['auto_call'])
         {
            $this->_alert_submission_ok=$alert_submission_ok;
            $alert_submission_ok='';
         }
      }
      
      /********************************************************************************************************************************************************************/
      /***                                                                     INTERAZIONE COL DB                                                                       ***/
      /********************************************************************************************************************************************************************/

      for($i=0;$i<sizeof($input_names);$i++)
      {
         if(isset($curr_form_data['inputs'][$input_names[$i]]['db']))
         {
            $db_disable_if_some_other_validation_fails=$curr_form_data['inputs'][$name]['db']['db_disable_if_some_other_validation_fails'];
            $interact_with_db=$db_disable_if_some_other_validation_fails==false || ($db_disable_if_some_other_validation_fails==true && $all_validations_are_ok);
      
            if($interact_with_db)
            {
               for($i=0;$i<sizeof($input_names);$i++)   
               {
                  if(strlen($this->_individual_validation_errors[$label][$input_names[$i]])==0)
                  {
                      $this->db_io($input_names[$i],$curr_form_data['inputs'][$name]['db']);
                  }
               }
            }
         }
      }
      
      /********************************************************************************************************************************************************************/
      /***                                                   AGGIUNGE L'ACTION AL FORM E I TAGS PER IL CONTROLLO CSRF                                                   ***/
      /********************************************************************************************************************************************************************/

      if(!$form->hasAttribute('action') || !$form->getAttribute('action'))
      {
         if(!strlen($form_action)) 
            $form_action=base_url().'index.php/'.$this->uri->uri_string();
//var_dump($form_action);   
         if($captcha_data['enabled'])
         {
            $form->setAttribute('action','#'); 
            $hid='<input type="hidden" id="hidden_'.$captcha_data['container_id'].'" value="'.$form_action.'" />';
            //$hid='<input type="hidden" id="mc-action" value="'.$form_action.'" />';
            $form->innertext=$form->innertext.$hid;
         }
         else
         {
            $form->setAttribute('action',$form_action);
         }
      }
      
      $csrf='<input type="hidden" name="'.$this->security->get_csrf_token_name().'" value="'.$this->security->get_csrf_hash().'" />';
      $form->innertext=$form->innertext.$csrf;
//print($form->id.'<br>');
//var_dump($csrf);  

      /********************************************************************************************************************************************************************/
      /***                                                   AGGIUNGE UN HIDDEN PER IL TEST DI SOTTOMISSIONE DEL FORM                                                   ***/
      /********************************************************************************************************************************************************************/

      $form_submission_check='<input type="hidden" id="submitted_'.($form->id).'" name="submitted_'.($form->id).'" value="submitted" />';
      $form->innertext=$form->innertext.$form_submission_check;

      /********************************************************************************************************************************************************************/
      /***                                                              AGGIUNGE IL MOTION CAPTCHA SE ABILITATO                                                         ***/
      /********************************************************************************************************************************************************************/
      
      $motion_captcha='';
      
      if($captcha_data['enabled'])
      {      
      
         $motion_captcha.='<script type="text/javascript">
                              jQuery(document).ready(function(){
                                 jQuery("'.$captcha_data['title'].'<canvas id=\'mc-canvas\'></canvas>").appendTo("#'.$captcha_data['container_id'].'"); 
                                  
                                 captcha_options={divId: "#'.$captcha_data['container_id'].'",
                                                  action: "#hidden_'.$captcha_data['container_id'].'",
                                                  canvasId: "#mc-canvas",
                                                  submitId: "#'.$curr_form_data['js_validation']['submit_id'].'",
                                                  errorMsg: "'.$captcha_data['error_msg'].'",
                                                  successMsg: "'.$captcha_data['success_msg'].'"};
                                 jQuery("#'.($form->id).'").motionCaptcha(captcha_options);
                              });
                           </script>';
      }

      /********************************************************************************************************************************************************************/
      /***                                                              ABILITA/DISABILITA AUTOCOMPLETE DEI CAMPI                                                       ***/      
      /********************************************************************************************************************************************************************/
      
      $autocomplete='';
      if(isset($curr_form_data['autocomplete']) && !$curr_form_data['autocomplete'])
      {
          $autocomplete.='<script type="text/javascript">
                              jQuery(document).ready(function(){
                                 jQuery("input").attr("autocomplete","off");
                              });
                           </script>';
      }
      
      /********************************************************************************************************************************************************************/
      /***                                                              MOSTRA/NASCONDE IL CONTATORE DI CARATTERI                                                       ***/      
      /********************************************************************************************************************************************************************/
      
      $char_counter='';

      if(isset($curr_form_data['char_counter']) && $curr_form_data['char_counter']['enable'])
      {
          $char_counter.='<script type="text/javascript">
                              jQuery(document).ready(function(){

                                 var form_id=jQuery('.($form->id).').attr("id");

                                 jQuery("#"+form_id+" input[type=\'text\'],#"+form_id+" textarea,#"+form_id+" input[type=\'password\']").each(function()
                                 {
                                   var input_id=jQuery(this).attr("id");
                                   if(jQuery("#char_container_"+input_id).length==0 && !jQuery(this).hasClass("ui-spinner-input"))
                                   {
                                      jQuery("<div id=\'char_container_"+input_id+"\' class=\''.$curr_form_data['char_counter']['counter_div_class'].'\'>0</div>").insertAfter(this);
                                          
                                      jQuery("#char_container_"+input_id).css("visibility","hidden");
                                   }
                                 });


                                 jQuery("#"+form_id+" input[type=\'text\'],#"+form_id+" textarea,#"+form_id+" input[type=\'password\']").on("keyup focus",function(){char_counter(this);});
                                 function char_counter(curr_input)
                                 {
                                   var input_id=jQuery(curr_input).attr("id");
                                   var maxlength=parseInt(jQuery(curr_input).attr("class").replace(/.*maxSize\[(.*)\].*/,"$1").replace(/\]/,""),10);

                                   if(isNaN(maxlength))
                                      return;
                                   else
                                     jQuery("#char_container_"+input_id).css("visibility","visible");';
                                   
          if($curr_form_data['char_counter']['mode']=='missing')
             $char_counter.='      jQuery("#char_container_"+input_id).html(maxlength-curr_input.value.length);'; 
          else if($curr_form_data['char_counter']['mode']=='written_total')
             $char_counter.='      jQuery("#char_container_"+input_id).html(curr_input.value.length+"/"+maxlength);';
        
          $char_counter.='       }
                              });
                           </script>';
      }      
      
      $parsed_form_file=$html->save();
      
      $html->clear();
      unset($html);

      return($parsed_form_file.$form_repopulation.$php_validation_alert.$js_validation.$motion_captcha.$alert_submission_ok.$autocomplete.$char_counter); 
   }
 
   function get_alert_submission_ok()
   {
      return($this->_alert_submission_ok);
   }
 
   function get_all_validation_errors($label)
   {
       if(!isset($this->_all_validation_errors[$label]))
          return('');
          
       return($this->_all_validation_errors[$label]);
   }

   function get_individual_validation_errors($label)
   {
       if(!isset($this->_individual_validation_errors[$label]))
          return(array(''));
                 
       return($this->_individual_validation_errors[$label]);
   }
    
   function form_validation_is_ok($label)
   {   
      if(!isset($this->_validation_is_ok[$label]))
         return(false);
      
//print('Validation is OK for '.$label.'? '.$this->_validation_is_ok[$label].'<br>');      
      
      return($this->_validation_is_ok[$label]);
   }

   function db_io($input_name,$db_options) 
   {
      $db_table=$db_options['db_table'];
      $db_field=$db_options['db_field'];
      $db_where=$db_options['db_where'];

      $query=$this->_db_id->select("MAX(id)")->from($db_table)->get()->result_array();

      $CURR_ID=$query[0]['MAX(id)'];

      /* il seguente loop serve ad assegnare valori a variabili specificate nel campo where */
      foreach($db_where as $where_key=>$where_value)
      {
         if(strpos($where_value,'$')!==false)
         {
            if(strpos($where_value,'$this')!==false)
            {
               $var=""; 
               eval("\$var=\$this->".preg_replace('/\$this->/','',$where_value).";"); 
               if($var)
                  $db_where[$where_key]=$var;
            }
            else if(isset(${preg_replace('/\$/','',$where_value)}))
            {
               $db_where[$where_key]=${preg_replace('/\$/','',$where_value)};
            }
            else
               return;
         }
      }
      
      $this->_db_id->reconnect();
      
      /* scrive il dato nel db */
/*
print("<br>%%%%%%%%%%%%%%%%%%%<BR>");
var_dump($input_options);
print("<br>curr_id: ".$CURR_ID);
print("<br><br>POST: ");
var_dump($_POST);
print("<BR>   test1: ".(isset($_POST[$input_options['name']]))." name: ".$input_options['name']." test2: ".(isset($input_options['db_save_action']))."<BR>");
print("<br>%%%%%%%%%%%%%%%%%%%<BR>");
*/

//if($input_options['name']=='mailing_list' && isset($_POST))
//var_dump($_POST);

      if(isset($_POST[$input_name]) && isset($db_options['db_save_action']))
      {
//print("<BR>".$_POST[$input_options['name']]);
//var_dump($input_options['db_save_action']);
//print("<br><br>");
         if(isset($db_options['db_parsing_function']) && $db_options['db_parsing_function'])
         {
            $parse='$data=$this->db_parsing_functions->'.$db_options['db_parsing_function']."('".($this->input->post($input_name,true))."','to_db');";
          
            eval($parse);
         }
         else
            $data=($this->input->post($input_name,true));

         $data=array($db_field=>$data);
/*
print("<br>FIELD: ");
var_dump($db_field);
print("<br> action: ".$input_options['db_save_action']."<br>DB_TABLE: ");
var_dump($db_table);
print("<br>DB_WHERE: ");
var_dump($db_where);
print("<br>");
*/
         if(!strcmp($db_options['db_save_action'],'update'))
         {
            $this->_db_id->update($db_table, $data, $db_where); 
         }
         else if(!strcmp($db_options['db_save_action'],'insert'))
         {
            $this->_db_id->insert($db_table,$data);                          
         }   
         else if(!strcmp($db_options['db_save_action'],'insert_once'))
         {
            $this->_db_id->select($db_field)->from($db_table)->where($data);
            $num_records = $this->_db_id->count_all_results();
            if($num_records==0)
               $this->_db_id->insert($db_table,$data);                          
         }                
      } 
    
      if(empty($db_where))
      {
         $query=$this->_db_id->select("MAX(id)")->from($db_table)->get()->result_array();
         $CURR_ID=$query[0]['MAX(id)'];       
         $db_where=array('id'=>$CURR_ID);
         if($this->db->field_exists('currtimestamp',$db_table))
         {
            $LAST_TIMESTAMP=$this->update_last_timestamp_in_db_if_null($db_group,$db_table,$CURR_ID);

         /* legge il dato dal db */
         //$query=$this->_db_id->select("MAX(currtimestamp)")->from($db_table)->get()->result_array();
         //$LAST_TIMESTAMP=$query[0]['MAX(currtimestamp)'];
            if($LAST_TIMESTAMP)
               $db_where=array('currtimestamp'=>$LAST_TIMESTAMP);
            //eval("\$db_where=array('currtimestamp'=>".$LAST_TIMESTAMP.");"); 
         }
      }

      $results=array();
      if ($this->_db_id->field_exists($db_field, $db_table))
      {
         $query=$this->_db_id->select($db_field)->from($db_table)->where($db_where)->get()->result_array();
         for($n=0;$n<sizeof($query);$n++)
         {
            if(isset($db_options['db_parsing_function']) && $db_options['db_parsing_function'])
            {
               $parse='$val=$this->db_parsing_functions->'.$db_options['db_parsing_function']."('".$query[$n][$db_field]."','from_db');";
               eval($parse);
            }
            else
               $val=$query[$n][$db_field];
            
            $results[]=$val;
         }
      }
//print("<BR>*******************<br>");

      return($results);
   }

}