<?php

/* GESTIONE LOGIN v. 2.0 

UTILIZZO:
========

1) Nel costruttore del controller caricare il modello:

   $this->load->model('login/login_form'); 

2) Nell'index() del controller caricare gli headers:

   $this->login_form->set_headers($view_data['js_headers']);

3) Allocare la variabile che conterranno il form login da passare alla view

   $view_data['login_form']=$this->login_form->build_login_form($destinazione_submit_ok=array(),$destinazione_logout=array());

   In cui $destinazione_submit_ok e $destinazione_logout sono due array opzionali che permettono di andare a view predefinite in caso
   di login di successo e di logout

4) e il frame login/logout nella view

   $view_data['login_logout_frame']=$this->login_form->set_login_logout_frame(array('nome','cognome','user_id','bitmask'));


   Questo modulo Inizializza una sessione inserendo i seguenti dati:

   user_id
   password
   bitmask

FILE CONFIGURAZIONE:
===================

   Vengono passati tre parametri: il gruppo di db e la tabella contenente i dati per l'autenticazione/registrazione e un booleano (true|false)
   che determina la visualizzazione dei campi di registrazione. In caso di 'registration_enabled'=>true verra' visualizzato il radiobutton
   che fa lo switch fra autenticazione e registrazione, se false verra' visualizzato solo il form di autenticazione (e il radiobutton sara' nascosto)

   $config['login']['db_group']='nome_db';
   $config['login']['db_table']='nome_tabella_login';
   $config['login']['registration_enabled']=bool;


*/
class Login_form extends CI_Model
{
   private $_bitmask=0;
   private $_db_id;
   private $_db_table;
   private $_registration_enabled;
   //private $_validation_functions;
   private $_is_modal;
   private $_hide_show_login_on_new_btn_click;
   private $_hide_show_login_on_existing_target_click;
   private $_login_form;
   private $_login_logout_frame_view;
   
   private $_controller;
   
   function __construct()
   {
      // Call the Model constructor
      parent::__construct();
      $this->load->model('permissions/permissions');   

      $this->_controller=& get_instance();
      
      /* Carica il modello 'form_input' */
      //$this->load->model('safe_forms/safe_forms');   
      $this->config->load('login/dati_login');
      
   }
    
   function set_headers($label,&$js_headers)
   {
      $data=$this->config->item("login");
      $this->_registration_enabled=$data[$label]['registration_enabled'];
      $this->_is_modal=$data[$label]['is_modal'];

      $this->_db_table=$data[$label]['db']['table'];
      $this->_db_id=$this->load->database($data[$label]['db']['group'],TRUE);

      $this->_login_form=$data[$label]['login_form'];
      $this->_hide_show_login_on_new_btn_click=$data[$label]['hide_show_login']['on_new_btn_click'];
      $this->_hide_show_login_on_existing_target_click=$data[$label]['hide_show_login']['on_existing_target_click'];

      $this->_login_logout_frame_view=$data[$label]['login_logout_frame_view'];

      //$this->form_input->init("view_login",$js_headers);
      //$this->form_input->set_validation_rules_and_headers($js_headers,$this->_validation_functions,TRUE);
  
   }
     
   /* Accetta tre parametri, uno richiesto e due opzionali. Il primo e' un array che contiene i campi da visualizzare 
      nel frame di login/logout (ad esempio array('nome','cognome'), il secondo parametro e' un array che rappresenta le view
      di destinazione in funzione del livello di autenticazione al momento di autenticazione riuscita, il terzo parametro ha stesso
      significato ma l'evento scatenante e' un click sul link di logout.
    */
   function build_login_form($destinazione_submit_ok=array(),$destinazione_logout=array())
   {
      //if(isset($_POST["form_do_logout"]) && $_POST["form_do_logout"])
      if($this->input->post('form_do_logout'))
      {
         $this->logout($destinazione_logout);
         redirect(current_url(),'refresh');
      }
      $view_data['messaggio']="";

            
      //$view_data['validation_functions']=$this->_validation_functions;
      $view_data['registration_enabled']=$this->_registration_enabled;
      $view_data['is_modal']=$this->_is_modal;
      
      
      if($this->_hide_show_login_on_new_btn_click['exists'])
      {
         $view_data['hide_show_login']="<BUTTON type='button' id='".$this->_hide_show_login_on_new_btn_click['button_id']."' ";
         /*name='cancel_ckeditor'*/
         $view_data['hide_show_login'].="class='".$this->_hide_show_login_on_new_btn_click['class']."' ";
         $view_data['hide_show_login'].="> ".$this->_hide_show_login_on_new_btn_click['text']." </BUTTON>";
         $view_data['hide_show_login_form_target_id']=$this->_hide_show_login_on_new_btn_click['button_id'];
      }
      else if($this->_hide_show_login_on_existing_target_click['exists'])
      {
          $view_data['hide_show_login_form_target_id']=$this->_hide_show_login_on_existing_target_click['target_id'];
      }
      
      $view_data['login_form_id']=$this->_login_form['id'];
      $view_data['login_form_title']=$this->_login_form['title'];
      if($this->_login_form['login_form_default_on_page_load']=='hide')
         $view_data['display_login_form']='none;';
      else if($this->_login_form['login_form_default_on_page_load']=='show')
         $view_data['display_login_form']='block;';
      
      $validated_form=$this->safe_forms->build_safe_forms('login_form',$view_data);
      
      if($this->safe_forms->form_validation_is_ok('login_form'))
      {
         $data["user_id"]=strtolower(htmlentities($this->input->post('user_id',true)));
         $data["password"]=htmlentities($this->input->post('password_id_1',true));
         if(!$this->_registration_enabled || $this->input->post('login_opt')=="verifica_vecchio_utente")
            $this->processa_autenticazione($data,$view_data['messaggio'],$destinazione_submit_ok);
         else if($this->input->post('login_opt')=="abilita_nuovo_utente")
            $this->processa_registrazione($data,$view_data['messaggio'],$destinazione_submit_ok);
            
         $validated_form=$this->safe_forms->build_safe_forms('login_form',$view_data);   
      }

      return($validated_form);
      
   }
   
   function get_user_info($select_data,$where_left,$where_right)
   {

      $query=$this->_db_id->select(join(',',$select_data))->from($this->_db_table)->where($where_left,$where_right)->get()->result_array();

      for($i=0;$i<sizeof($select_data);$i++)
      {
         $data[$select_data[$i]]=(empty($query))?"":$query[0][$select_data[$i]];
      } 
      return($data);
   }
   
   /*******************************************************************************/
   /********** FINE DELLE LE FUNZIONI CHIAMABILI DA CONTROLLERS E MODELS **********/
   /*******************************************************************************/

   /************************ logout **************************************/

   function logout($destinazione_logout)
   {
      $user_id=$this->session->userdata('user_id');

      $this->session->sess_destroy();

      $query=$this->_db_id->select('bitmask')->from($this->_db_table)->where('user_id',$user_id)->get()->result_array();
      $this->_bitmask=$query[0]['bitmask'];

      if($this->permissions->check_permissions($this->_bitmask,'mediagate') && isset($destinazione_logout['mediagate']))
      {
         print("<SCRIPT type=\"text/javascript\">");
         print("location.href='".$destinazione_logout['mediagate']."';");
         print("</SCRIP"."T>");
      }
      elseif($this->permissions->check_permissions($this->_bitmask,'admin') && isset($destinazione_logout['admin']))
      {
         print("<SCRIPT type=\"text/javascript\">");
         print("location.href='".$destinazione_logout['admin']."';");
         print("</SCRIP"."T>");
      }
      else
      {
         // Destinazione default
      }

   }

   function carica_dati_utente()
   {      
      /******************************************/
      /*    Carica dati dell'utente corrente    */
      $query=$this->_db_id->select("nome,cognome,bitmask")->from("login_data")->where('user_id',$this->session->userdata('user_id'))->get()->result_array();

      $dati['nome']=(empty($query))?'':ucwords($query[0]['nome']);
      $dati['cognome']=(empty($query))?'':ucwords($query[0]['cognome']);
      $dati['bitmask']=(empty($query))?'':$query[0]['bitmask'];

      return($dati);
   }
      
   function set_login_logout_frame($select_data)
   {
      $view_data=array();
      if($this->session->userdata("user_id"))
      {
         $query=$this->_db_id->select(join(',',$select_data))->from($this->_db_table)->where("user_id",$this->session->userdata("user_id"))->get()->result_array();
         if(!empty($query))
         {
            $query=$query[0]; 
            foreach($query as $key=>$value)
               $view_data[$key]=$value;
         }
      }

      return($this->load->view($this->_login_logout_frame_view,$view_data,true));
    
   }
   
   function processa_autenticazione($data,&$messaggio,$pagine_destinazione)
   {
      $this->_db_id->reconnect();

      $query=$this->_db_id->select('id')->from($this->_db_table)->where('user_id',$data['user_id'])->get()->result_array();
      $id=(empty($query))?0:$query[0]['id'];

      $crypted_password=crypt($data['password'],$data['password']);
      $query=$this->_db_id->select('password')->from($this->_db_table)->where('id',$id)->get()->result_array();
      $password_from_db=(empty($query))?"":$query[0]['password']; 

      $query=$this->_db_id->select('id')->from($this->_db_table)->where('password',$crypted_password)->get()->result_array();
      $password_exists=(empty($query))?0:$query[0]['id'];
//print('id: '.$id.' password: '.$data['password'].' crypted: '.$crypted_password.'<br>');
      if (!$id || !$password_exists)
         $messaggio.= "Almeno uno dei dati inseriti non esiste<BR>";

      if ($id && $password_from_db != $crypted_password )
         $messaggio.= "Errore immissione dei dati<BR>";
         
      if (!strcmp($messaggio,"")) /* Nessun errore */
      {  
         $query=$this->_db_id->select('bitmask')->from($this->_db_table)->where('id',$id)->get()->result_array();
         $this->_bitmask=$query[0]['bitmask'];

         $data_to_session=array("user_id"=>$data["user_id"],"password"=>$crypted_password,'bitmask'=>$this->_bitmask);   
         $this->session->set_userdata($data_to_session);
//print("login_form, processa_autenticazione<br><br>");
 
         if($this->permissions->check_permissions($this->_bitmask,'mediagate') && isset($pagine_destinazione['mediagate']))
         {
            print("<SCRIPT type=\"text/javascript\">");
            print("location.href='".$pagine_destinazione['mediagate']."';");
            print("</SCRIP"."T>");
         }
         elseif($this->permissions->check_permissions($this->_bitmask,'admin') && isset($pagine_destinazione['admin']))
         {
            print("<SCRIPT type=\"text/javascript\">");
            print("location.href='".$pagine_destinazione['admin']."';");
            print("</SCRIP"."T>");
         }
         else
         {
            // Destinazione default
         }
      }

   }
   
   function processa_registrazione($data,&$messaggio,$pagine_destinazione,$additional_fields=array())
   {
//print("login_form, processa_registrazione<br><br>");

      $this->_bitmask=$this->permissions->set_permissions(array('standard_user'=>true));
      
      $query=$this->_db_id->select("id")->from($this->_db_table)->where("user_id",$data["user_id"])->get();
      
      if($query->num_rows())
         $messaggio.= "I dati esistono gi� nel Database:\n";

      if (!strcmp($messaggio,"")) /* Nessun errore */
      {
         $crypted_password=crypt($data["password"],$data["password"]);
         $data_to_session=array("user_id"=>$data["user_id"],"password"=>$crypted_password,"bitmask"=>$this->_bitmask);   
         $this->session->set_userdata($data_to_session);
                  
         $data_to_db=$data_to_session;
         if(!empty($additional_fields))
            foreach($additional_fields as $key=>$value)
               $data_to_db[$key]=$value;
     
         $this->_db_id->insert($this->_db_table, $data_to_db); 
         
         //$this->salva_info_utente();

         if($this->permissions->check_permissions($this->_bitmask,'mediagate') && isset($pagine_destinazione['mediagate']))
         {
            print("<SCRIPT type=\"text/javascript\">");
            print("location.href='".$pagine_destinazione['mediagate']."';");
            print("</SCRIP"."T>");
         }
         elseif($this->permissions->check_permissions($this->_bitmask,'admin') && isset($pagine_destinazione['admin']))
         {
            print("<SCRIPT type=\"text/javascript\">");
            print("location.href='".$pagine_destinazione['admin']."';");
            print("</SCRIP"."T>");
         }
         else
         {
            // Destinazione default
         }

      }
   
   }
   
   function salva_info_utente()
   {
   /*
      $user_id=$this->db->select('user_id')->from($this->config->item("info_utente"))->where('user_id',$this->config->item("autentica_user_id") );

      if(!GetData("info_utente","user_id","user_id",$this->session->set_userdata("user_id");))
         $id = InsertDataInNewRow("info_utente",array("user_id","user_agent","remote_IP","remote_host","proveniente_da"),array($_SESSION["user_id"],$_SERVER["HTTP_USER_AGENT"],$_SERVER["REMOTE_ADDR"],gethostbyaddr($_SERVER["REMOTE_ADDR"]),$_SERVER["HTTP_REFERER"]));
      else
         UpdateData("info_utente",array("user_agent","remote_IP","remote_host","proveniente_da"),array($_SERVER["HTTP_USER_AGENT"],$_SERVER["REMOTE_ADDR"],gethostbyaddr($_SERVER["REMOTE_ADDR"]),$_SERVER["HTTP_REFERER"]),"user_id",$_SESSION["user_id"]);
   */
   }


   function password_smarrita()
   {
   /*
         if($this->config->item("password_smarrita"))
      {
            /*session_unset();
            session_destroy();*/
           /* if($this->config->item("destinazione_password_smarrita"))
            {
               print("<SCRIPT type='text/javascript'>");
               print("location.href='".$this->config->item("destinazione_password_smarrita")."';");
               print("</SCRIP"."T>");
            }
            else
               return("ok_password_smarrita");

      }   
   
    */
   }
      
}
?>
