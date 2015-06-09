<?php

/* DIALOG v. 2.0

UTILIZZO:
========

1) Nel costruttore del controller caricare il modello:

   $this->load->model('dialog/dialog');

2) Nell'index() del controller caricare gli headers e costruire il set di dialogs che saranno contenuti nella pagina:

   $this->dialog->set_headers($view_data['js_headers']);
   $view_data['label_view_dialog']=$this->dialog->build_dialog($view_data['js_headers'],$data);
    
   in cui il primo parametro passato a "build_dialog" e' lo stesso passato a "set_headers" mentre $data e' opzionale ed e' un array che contiene
   dati che si desidera rendere disponibili nella view del dialog
      
3) nel controller, lanciare la view:
  
   $this->load->view('path_to_view/view_XXX',$view_data);

4) nella view per applicare l'effetto e' necessario specificare la seguente classe: 
   
   class='dialog[id_div_view_dialog]'
   
   in cui 'id_div_view_dialog' e' l'ID del DIV che contiene il dialog da aprire. Tale DIV va collocato in un file di view
   e la path di tale view va specificata nel file di configurazione del dialog in corrispondenza della chiave 'view'.

5) printare la variabile $label_view_dialog in fondo alla view (serve per inserire il DIV del dialog nella view).
   Quindi ad esempio si inserisce la classe in un <A>:

   <A HREF='#' class='dialog[id_div_view_dialog]' title='Dialog di esempio'></A>

   e, in fondo alla view (non e' indispensabile, ma e' meglio per vari motivi, appena prima di </BODY>):

   <?php print($label_view_dialog);?>

6) In questo modo cliccando sull'ancora si apre il dialog contenuto nel DIV con ID='id_div_view_dialog'. In caso si desideri aprire
   un dialog sull'onload della pagina, magari a seguito di un test nel controller, e' necessario specificare nei dati del dialog relativi
   alla label scelta l'opzione: 'on_window_load'=>true

FILE CONFIGURAZIONE:
===================

   I dati sono raggruppati in due sezioni, la prima configurabile sito per sito, la seconda contente gli headers e quindi generalmente da non toccare
   la prima sezione contiene degli array con la sintassi:

   $config['dialog'][LABEL]=array(OPZIONI);

   Dove LABEL e' una label a piacere mentre OPZIONI e' un array contenente le seguenti opzioni   

   $config['dialog'][LABEL]=array(array('target_selector'=>'#target',
                                        'options'=>array('autoOpen'=>'false',
                                                         'show'=>'blind',
                                                         'hide'=>'explode',
                                                         'width'=>500),
                                        'view'=>'path_to_view_file/view_file',
                                        'events'=>'click',
                                        'on_window_load'=>false));

   In cui:
 
      'target_selector' => Un selettore jQuery che identifica l'oggetto del DOM che scatena l'apertura del dialog
      'options' => Opzioni del dialog (vedi dialogs jQuery UI)
      'view' => path e file di view che verra' inglobato nel dialog
      'events' => evento associato all'elemento specificato da 'target_selector' che scatena l'apertura del dialog
      'on_window_load' => (true|false) se 'true' apre il dialog sull'onload della pagina

   Secondo questa sintassi, quindi, a una LABEL possono corrispondere piu' dialogs, ciascuno specificato da un diverso array di OPZIONI

*/

class Dialog extends CI_Model 
{
   function __construct()
   {
      // Call the Model constructor
      parent::__construct();
      $this->config->load('dialog/dati_dialog');
   }

   /*******************************************************************************/
   /********* INIZIO DELLE LE FUNZIONI CHIAMABILI DA CONTROLLERS E MODELS *********/
   /*******************************************************************************/
   
   function set_headers(&$js_headers)
   {
      $dialog_data=$this->config->item("dialog");
      $curr_headers=$dialog_data['headers'];
      $this->javascripts->add_data_and_get_headers($curr_headers,$js_headers);	  
      
   }
   
   function build_dialog($label,$view_data=array())
   {
      $dialog_data=$this->config->item('dialog');

      $dialogs=$dialog_data[$label];
      $view_dialog="";
      foreach($dialogs as $dialog)
      {
         $js_data="{";
         $j=0;
         foreach($dialog['options'] as $key=>$value)
         {
            if(is_numeric($value) || !strcmp($value,"true") || !strcmp($value,"false") || !strcmp($value,"null"))
               $js_data.=$key.":".$value;
            else     
               $js_data.=$key.":'".$value."'";

            if($j<sizeof($dialog['options'])-1)
               $js_data.=",\n";     
            
            $j++;     
         }
         $js_data.="}";

         $view_dialog.=$this->load->view($dialog['view'],$view_data,true);

         $view_dialog.="<SCRIPT  type='text/javascript'>
                           jQuery(function()
                           {";
                        if($dialog['on_window_load'])
                           $view_dialog.="run_dialog_on_window_load(".$js_data.");";
                        else
                           $view_dialog.="run_dialog('".$dialog['target_selector']."',".$js_data.",'".$dialog['events']."');";
                           $view_dialog.="});
                        </SCRIPT>";
      }

      return($view_dialog);
   }
}

?>
