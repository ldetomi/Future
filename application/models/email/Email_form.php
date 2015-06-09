<?php

/* EMAIL v. 2.0

1) Nel costruttore del controller caricare il modello:

   $this->load->model('email/email_form');

2) Nell'index() del controller caricare gli headers     

   $this->email_form->set_headers($view_data['js_headers']); 
      
3) Eseguire la funzione:

   $view_data['email_form']=$this->email_form->build_email_form($label,$direct_config_data)

   in cui $label identifica un gruppo di opzioni del file di configurazione. Viene ritornato il form mail come stringa, che e' possibile quindi passare alla view.
   mentre $direct_config_data e' un array opzionale che aggiunge dati customizzati oltre a quelli specificati nel file di configurazione (solo ai dati di tipo array)
 
   $this->load->view('path_to_view/view_email',$view_data);

FILE CONFIGURAZIONE:
===================

   $config['email'][LABEL]=array('email_form_input_field_names'=>['sender_name'=>'nome_cognome',
                                                                    'from_address'=>'indirizzo_email',
                                                                    'subject'=>'',
                                                                    'message'=>'messaggio_email'],
                                 'email_invia_a'=>['dev'=>['davdtm02@libero.it'],
                                                   'prod'=>['']],
                                 'email_cc'=>['dev'=>[''],
                                              'prod'=>['']],
                                 'email_bcc'=>['dev'=>['ldetomi@yahoo.com'],
                                               'prod'=>['']],
                                 'email_subject'=>'E-mail inviata dal sito Idra.it',
                                 'add_sender_to_cc'=>true,
                                 'email_mostra_report'=>false,
                                 'is_modal'=>false,
                                 'dialog_options'=>array(...));

   In cui:

   'email_form_input_field_names' => specifica i names degli input della form mail, serve per prepopolare i campi al reload
   'email_invia_a', 'email_cc', 'email_bcc', 'email_subject' => parametri della mail, si differenziano fra 'dev' (development) e 'prod' (production), l'ambiente di funzionamento viene caricato e gestito in automatico
   'add_sender_to_cc' => aggiunge il sender ai cc per avere una ricevuta
   'email_mostra_report' => mostra un report sull'invio della mail (debug)
   'is_modal' => (true|false) vedi spiegazione al punto (2) precedente
   'dialog_options' => array di opzioni per la configurazione del dialog in caso is_modal sia true
 
*/

class Email_form extends CI_Model 
{
   
   private $_email_data;
   private $_info_user=array();
   private $_current_form_mail_id=0;
   
   function __construct()
   {
      // Call the Model constructor
      parent::__construct();

      $this->load->library('email');
      $this->config->load('email/dati_email');

      //$this->load->model('safe_forms/safe_forms');   

      $this->email->initialize(array('mailtype'=>'html',
                                     'validate'=>true,
                                     'priority'=>1));
   }

   function set_headers(&$js_headers)
   {
      $this->_email_data=$this->config->item('email');
      $this->safe_forms->set_headers($js_headers);
   }
   
   function build_email_form($label,$direct_config_data=array())
   {
      $view_data['current_form_mail_id']=$this->_current_form_mail_id;
      
      $curr_email_data=$this->_email_data[$label];

      if($curr_email_data['is_modal'])
      {

         if(isset($curr_email_data['dialog_options']))
         {
            $dialog_options="";
            foreach($curr_email_data['dialog_options'] as $key=>$value)
               if($value==='true')
                  $dialog_options.="'".$key."' : true, ";
               else if($value==='false')
                  $dialog_options.="'".$key."' : false, ";
               else
                  $dialog_options.="'".$key."' : '".$value."', ";
            $view_data['dialog_options']=substr($dialog_options,0,strlen($dialog_options)-2);
         }         
          
         $view ="<SCRIPT type='text/javascript'>
       
                  var client_info={window_width: jQuery(window).width(),
                                   window_height: jQuery(window).height(),
                                   screen_width: screen.width,
                                   screen_height:  screen.height};
                         
                  jQuery(window).load(function()
                  {
                     var view_data={".$view_data['dialog_options']."};\n
                     jQuery.extend(view_data,client_info);
                     jQuery.extend(view_data,{'".($this->security->get_csrf_token_name())."' : '".($this->security->get_csrf_hash())."'});
                     jQuery.extend(view_data,{'current_form_mail_id' : '".$view_data['current_form_mail_id']."'});
                     jQuery.extend(view_data,{'form_action' : '".base_url().'index.php/'.$this->uri->uri_string()."'});
                     
                     jQuery.ajax({type: 'POST',
                                  url: '".base_url()."index.php/ajax_controllers/email_form_dialog/load_view',
                                  data: view_data,
                                  beforeSend: function(load_view)
                                     {
                                        ajax_handlers[0]=load_view;

                                     },
                                  success: function(d,s,x)
                                  {
                                     jQuery(d).appendTo('body').hide();
                                     jQuery.ajax({type: 'post',
                                                  url: '".base_url()."application/JS/email/email_form_dialog.js',
                                                  dataType: 'script',
                                                  beforeSend: function(email_form_dialog)
                                                     {
                                                        ajax_handlers[1]=email_form_dialog;
                                                     },
                                                  success: function()
                                                     {
                                                        init_email_dialog({".$view_data['dialog_options']."});
                                                     }
                                                  });
                                  },
                                  error: function(xhr,textStatus,errorTrown)
                                         {
                                            alert(textStatus+' '+errorTrown);
                                         }
                                 });                                                                        
                  });
                </SCRIPT>";
          
         //$view=$this->safe_forms->build_safe_forms('email_form_dialog');
      }
      else
         $view=$this->safe_forms->build_safe_forms('email_form',$view_data);
//print('<br>test: '.$this->input->post('current_form_mail_id',true).'<br>'.($this->_current_form_mail_id).' res: '.($this->input->post('current_form_mail_id',true)===$this->_current_form_mail_id));
      $view_data['email_alert']="";
      if((string)$this->input->post('current_form_mail_id',true)!='' && 
         (int)$this->input->post('current_form_mail_id',true)===$this->_current_form_mail_id)
      {
//print('sending test: '.($this->safe_forms->form_validation_is_ok('email_form')));
         if($this->safe_forms->form_validation_is_ok('email_form'))
         {
            if($this->send_email($label,$direct_config_data))
            {
               $mesg_email_inviata="<H3>Email inviata con successo</H3>";
               $view_data['email_alert']="<SCRIPT type='text/javascript'>
                                             var email_inviata_options={autoOpen: false,show: 'blind',hide: 'explode',width: 500};
                                             run_dialog_as_alert(email_inviata_options,
                                                '<DIV id=\"email_inviata\">".$mesg_email_inviata."</DIV>',function(){},'email_delivery_successful');
                                          </SCRIPT>";

            }
            else
            {
               $mesg_email_non_inviata="<H3>Attenzione: Email NON inviata</H3>";
               $view_data['email_alert']="<SCRIPT type='text/javascript'>
                                             var email_non_inviata_options={autoOpen: false,show: 'blind',hide: 'explode',width: 500};
                                             run_dialog_as_alert(email_non_inviata_options,
                                                '<DIV id=\"email_non_inviata\">".$mesg_email_non_inviata."</DIV>',function(){},'email_delivery_failed');
                                          </SCRIPT>";
            }
         }
         else 
         {
	
         }
         
      }
      $this->_current_form_mail_id++;


      $view.=$view_data['email_alert'];
      return($view);
   }
   
   /*****************************************************************************/
   /********* FINE DELLE LE FUNZIONI CHIAMABILI DA CONTROLLERS E MODELS *********/
   /*****************************************************************************/
   
   function send_email($label,$direct_config_data=array())
   {
      if(!empty($direct_config_data))
      {
          foreach($direct_config_data as $key=>$value)
          {
              if(is_array($value))
                  $email_data[$key]=array_merge($email_data[$key],$value);
          }
      }
       
       
      $email_data=$this->config->item('email');
      $email_data=$email_data[$label];
      $is_modal=$email_data['is_modal'];
      
      $this->email->clear();

      $controller=& get_instance();
      $campo_email=($controller->input->post($email_data['email_form_input_field_names']['from_address'],true)); 
      $nome_cognome=($controller->input->post($email_data['email_form_input_field_names']['sender_name'],true));
      if($email_data['email_form_input_field_names']['subject']!='')
         $oggetto=($controller->input->post($email_data['email_form_input_field_names']['subject'],true));
      $contenuto_email=($controller->input->post($email_data['email_form_input_field_names']['message'],true));

      $this->email->from($campo_email, $nome_cognome);
      if(isset($oggetto) && $oggetto!='')
         $this->email->subject($oggetto);
      
      $info=""; 
      if($is_modal)
      { 
         $this->_info_user=$controller->info_user->get_info();
         $this->_info_user['window_width']=(int)$_POST['window_width'];
         $this->_info_user['window_height']=(int)$_POST['window_height'];
         $this->_info_user['screen_width']=(int)$_POST['screen_width'];
         $this->_info_user['screen_height']=(int)$_POST['screen_height'];
         
         foreach($this->_info_user as $key=>$value)
            $info.=$key.": ".$value."\n"; 
      }
      
      $this->email->message($contenuto_email."\n\n".$info);

      $this->email->to($email_data['email_invia_a'][$controller->_main_config_data['environment']]);

      if($email_data['email_subject']!='')
         $this->email->subject($email_data['email_subject']);
  
      $cc=array();
      if(isset($email_data['add_sender_to_cc']) && $email_data['add_sender_to_cc'])
          $cc=array($campo_email);
      
      if(isset($email_data['email_cc'][$controller->_main_config_data['environment']]))
      {
         if(is_array($email_data['email_cc'][$controller->_main_config_data['environment']]))
         {
           $cc=array_merge($cc,$email_data['email_cc'][$controller->_main_config_data['environment']]);
           $this->email->cc($cc);
         }
      }
      
      if(isset($email_data['email_bcc'][$controller->_main_config_data['environment']]))
      {
         if(is_array($email_data['email_bcc'][$controller->_main_config_data['environment']]))
            $this->email->bcc($email_data['email_bcc'][$controller->_main_config_data['environment']]);
      }
      
      $result=$this->email->send();

//print($this->email->print_debugger());

      $_POST=array();
      
      if($email_data['email_mostra_report'])
         print($this->email->print_debugger());
         
      return($result);
   }


}

?>
