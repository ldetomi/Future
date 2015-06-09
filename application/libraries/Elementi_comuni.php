<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Elementi_comuni
{
   private $_CI;
   private $_is_browser_ok=false;
   private $_login_form='';
   private $_login_logout_frame='';

   private $_facebook=array();
   private $_dati_controllers;
   private $_db_id;
   private $_db_testi_id;
   
   public function __construct()
   {
      $this->_CI =& get_instance();
      
      /********* carica i dati default per tutti i controllers **********/

      $this->_facebook=['meta_title_content'=>'Casa Monte Tabor - Roma',
                        'meta_url_content'=>'http://www.casamontetabor.com/',
                        'meta_image_content'=>'http://www.casamontetabor.com/application/views/sito/immagini_comuni/logo_fb.jpg',
                        'meta_site_name_content'=>'Monte Tabor - Casa per ferie - Roma',
                        'meta_description_content'=>'Casa per ferie situata nel cuore di Roma'];
   }
   
   function loadMainConfigDataFromDb(&$main_config_data)
   {   
       $this->_db_testi_id=$this->_CI->load->database('testi',TRUE); 
 
       $this->_db_id=$this->_CI->load->database('default',TRUE); 
       
       $main_config_data=$this->_db_id->select('*')->from('main_admin_config_data')->get()->result_array();    
       $main_config_data=$main_config_data[0];
       
       if($main_config_data['environment']=='dev')
          error_reporting(E_ALL);
       else
          error_reporting(0);
       
       $this->_CI->session->set_userdata(array('environment'=>$main_config_data['environment']));   
//var_dump($main_config_data);
   }
   
   function setJSGlobalVars(&$global)
   {
       $global='<script type="text/javascript">
                   base_url="'.base_url().'";
                   token_name="'.$this->_CI->security->get_csrf_token_name().'";
                   token_value="'.$this->_CI->security->get_csrf_hash().'";
                   environment="'.$this->_CI->_main_config_data["environment"].'";
                </script>';
       

   }
   
   function getKillPendingAjaxJSCode(&$js_headers)
   {
      $js_headers[]="<script type='text/javascript'>\najax_handlers = [];\n
                        function deletePendingAjaxRequests()
                        {
                           for(var i=0;i<ajax_handlers.length;i++)
                              if(ajax_handlers[i] && ajax_handlers[i].readyState!=4)
                                 ajax_handlers[i].abort();

                           ajax_handlers=[];   
          //alert('deleting: '+(ajax_handlers.length)+' pending requests');
                        }
                     </script>"; 
   }
   
   function isFirstAccess()
   { 
//$this->_CI->session->sess_destroy();
//exit;
//print("FIRST ACCESS: >".$this->_CI->session->has_userdata('is_first_access')."<");
      if($this->_CI->session->userdata('is_first_access')===null)
         $this->_CI->session->set_userdata(array('is_first_access'=>1));
      else
         $this->_CI->session->set_userdata(array('is_first_access'=>0));
      
      return($this->_CI->session->userdata('is_first_access'));
   }
   
   function isConnectedToInternet()
   {
       $connected=@fsockopen('http://www.google.com',80);
//var_dump($connected);
       if($connected)
          return(true);
       else
          return(false);
   }
   
   function loadDefaultLibs(&$js_headers)
   {
      $this->_CI->config->load('autoload_lib/autoload_lib');
      $autoload_high_priority=$this->_CI->config->item('autoload_high_priority');
      $autoload_low_priority=$this->_CI->config->item('autoload_low_priority');
      $autoload_DEFAULTS=$this->_CI->config->item('autoload_DEFAULTS');
      
//var_dump($this->_CI->_main_config_data['environment']);
      
      $autoload_DEFAULTS=$autoload_DEFAULTS[$this->_CI->_main_config_data['environment']];
      
      $autoload_fallback=$this->_CI->config->item('autoload_fallback');
              
      $high_priority=[];
      $low_priority=[];   
      
      foreach($autoload_DEFAULTS as $main_label=>$lib)
      {
          if(isset($autoload_high_priority[$main_label]))
          {
             foreach($autoload_high_priority[$main_label][$lib] as $file=>$path)
             {
                if($file!='literal' || $this->_CI->_is_connected_to_internet) 
                   $high_priority[]=$autoload_high_priority[$main_label][$lib]; 
                else if(in_array($lib,array_keys($autoload_fallback)))
                   $high_priority[]=$autoload_fallback[$lib];
             }
          }
          else if(isset($autoload_low_priority[$main_label]))
          {
             foreach($autoload_low_priority[$main_label][$lib] as $file=>$path)
             {
                if($file!='literal' || $this->_CI->_is_connected_to_internet) 
                   $low_priority[]=$autoload_low_priority[$main_label][$lib]; 
                else if(in_array($lib,array_keys($autoload_fallback)))
                   $low_priority[]=$autoload_fallback[$lib];
             }
          }
      }

      $default_libs=[];
      for($i=0;$i<sizeof($high_priority);$i++)
         foreach($high_priority[$i] as $file=>$path)
            $default_libs[$file]=$path;  
      
      for($i=0;$i<sizeof($low_priority);$i++)
         foreach($low_priority[$i] as $file=>$path)
            $default_libs[$file]=$path;        
         
      $this->_CI->javascripts->add_data_and_get_headers($default_libs,$js_headers);
   } 
   
   function setCache($doSetCache=false,$min=10)
   {
      /********* caching **********/

      if($doSetCache) 
        $this->_CI->output->cache($min);
      else
      {
//var_dump('rm '.APPPATH.'cache/*[^index.html]');
//         system('rm '.APPPATH.'cache/*[^index.html]');
      }
      
      /*["PHP_SELF"]=$this->_CI->input->server("PHP_SELF",true);  
      $_SERVER["HTTP_HOST"]=$this->_CI->input->server("HTTP_HOST",true); 
      $php_self_array=explode("/",$_SERVER["PHP_SELF"]);

      if($_SERVER["HTTP_HOST"]!="localhost" && $doSetCache)
         if($_SERVER["HTTP_HOST"]=="www.mediagate.it" || $_SERVER["HTTP_HOST"]=="mediagate.it")
            $this->_CI->output->cache($min);*/
   }
   
   function setLess(&$js_headers,$enable=true)
   {
      $this->_CI->_less_enabled=$enable; 

      if(!$enable) 
         return;
      
      $this->_CI->load->model('less/less'); 
      /*** Gestisce LESS ***/

      //$this->_CI->less->set_headers_styles($js_headers);
      //if(($_SERVER["HTTP_HOST"]=="www.mediagate.it")) 
      //    $js_headers[]='<link href="'.base_url().'application/views/stili/sviluppo/semaforo.less" rel="stylesheet/less" >'; 
  
          
      $this->_CI->less->set_headers_js($js_headers);
 
   }
   
   function loadCustomizedTexts()
   {
       $lingua=$this->_CI->_main_config_data["language"];
       $profilo=$this->getCurrentProfile();
       $controller_tag=$this->_CI->_view_data['page_tag'];
       
       $table='testi_'.$controller_tag;
       $testi=$this->_db_testi_id->select('*')->from($table)->where(['lingua'=>$lingua,'profilo'=>$profilo])->get()->result_array();
       $testi_default=$this->_db_testi_id->select('*')->from($table)->where(['lingua'=>$lingua,'profilo'=>'default'])->get()->result_array();
     
       $testi_blocco=[];
       for($i=0;$i<sizeof($testi);$i++)
          $testi_blocco[$testi[$i]['id_blocco']]=$testi[$i]['testo'];

       $testi_blocco_default=[];
       for($i=0;$i<sizeof($testi_default);$i++)
          if(!isset($testi_blocco[$testi_default[$i]['id_blocco']]))
             $testi_blocco[$testi_default[$i]['id_blocco']]=$testi_default[$i]['testo'];
     
     
       return($testi_blocco);
       
   }
   
   function doIRespectProfile($profile)
   {
       return($this->getCurrentProfile()==$profile);
   }
   
   function getProfileMap()
   {
       $profile_map['less_enabled']=$this->_CI->_less_enabled;
       $profile_map['environment_is_dev']=$this->_CI->_main_config_data['environment']=='dev';       
       
       return($profile_map);
   }
   
   function getCurrentProfile()
   {       
       $profile_map=$this->getProfileMap();
       
       $current_profile='default';
       foreach($profile_map as $profile=>$criterion)
       {
//print('parsing criterion: '.$profile.' res: '.$criterion.'<br>');
          if($criterion===true)
             $current_profile=$profile;
       }
       
       return($current_profile);
   }
   
   function loadTheme(&$js_headers)
   {
      if($this->_CI->_less_enabled)
         $subpath='less';
      else
         $subpath='css';
      
      $file=$this->_CI->_main_config_data['theme'].'.'.$subpath;
      $theme=[$file=>'application/views/tema/'.$subpath];
      
      //var_dump($theme);
      
      $this->_CI->javascripts->add_data_and_get_headers($theme,$js_headers);
   }
   
   function buildInfoBrowserDialog(&$view_data,&$js_headers,$only_once_browser_check)
   {
       
        /********* dialog info browser **********/
      $this->_CI->dialog->set_headers($js_headers);

      $this->_is_browser_ok=$this->_CI->info_user->browser_check();
      
      $info_browser=$this->_CI->info_user->get_info();
      
      if($only_once_browser_check && $this->_CI->_is_first_access)
      {
         $view_data['dialog_browser_check']=($this->_is_browser_ok)?'':$this->_CI->dialog->build_dialog('browser_check',$info_browser);
      }
      $view_data['dialog_info_browser_ok']=$this->_CI->dialog->build_dialog('info_browser_ok',$info_browser);
      $view_data['dialog_info_browser_old']=$this->_CI->dialog->build_dialog('info_browser_old',$info_browser);
      
      /* permette l'inserimento in ogni pagina di un form login. Di default il form viene aggiunto nel print_navigation() */
      if(isset($this->_dati_controllers['add_login_form_to_all_pages']) && $this->_dati_controllers['add_login_form_to_all_pages']['add']===true)
      {
        //$this->_CI->load->model('login/login_form'); 
        $this->_CI->login_form->set_headers($this->_dati_controllers['add_login_form_to_all_pages']['login_data_label'],$view_data['js_headers']);
        $destinazione_admin_login=base_url().'index.php/'.$this->_dati_controllers['add_login_form_to_all_pages']['dest_controller_login'];
        $destinazione_admin_logout=base_url().'index.php/'.$this->_dati_controllers['add_login_form_to_all_pages']['dest_controller_logout'];
        $on_login_go_to=array('mediagate'=>$destinazione_admin_login,'admin'=>$destinazione_admin_login);
        $on_logout_go_to=array('mediagate'=>$destinazione_admin_logout,'admin'=>$destinazione_admin_logout);
        $this->_login_form=$this->_CI->login_form->build_login_form($on_login_go_to,$on_logout_go_to);
        $this->_login_logout_frame=$this->_CI->login_form->set_login_logout_frame(array('nome','cognome','user_id','bitmask'));// Non printato
      }
      

   }
   
   function buildEmailFormDialog(&$view_data,&$js_headers,$label)
   {
      /*** Costruisce il form mail mediagate (come dialog) ***/
      $this->_CI->email_form->set_headers($js_headers,$label); 
      $view_data['email_form_dialog']=$this->_CI->email_form->build_email_form($label);
   }
   
   
   function loadHeader($filename,$data=[])
   {
       return($this->_CI->load->view('macro_blocchi/headers/'.$filename,$data,true));
   }

   function loadMainNavigation($filename,$data=[])
   {
       return($this->_CI->load->view('macro_blocchi/navigations/'.$filename,$data,true));
   }
 
   function loadFirstLevelNavigation($filename,$data=[])
   {
       return($this->_CI->load->view('macro_blocchi/navigations/'.$filename,$data,true));
   }

   function loadSecondLevelNavigation($filename,$data=[])
   {
       return($this->_CI->load->view('macro_blocchi/navigations/'.$filename,$data,true));
   }
  
   function loadAside($filename,$data=[])
   {
       return($this->_CI->load->view('macro_blocchi/asides/'.$filename,$data,true));
   }

   function loadFooter($filename,$data=[])
   {
       return($this->_CI->load->view('macro_blocchi/footers/'.$filename,$data,true));
   }   
   
   function getDocTypeString()
   {
      $doc_type='<!DOCTYPE HTML>';
      
      return($doc_type);
   }
   
   function getDefaultMetaTags()
   {
       
       $tags=['meta',
              'viewport',
              'IE8_standard_mode',
              'Fix_html5_IE',
              'robots_dev',
              'robots_prod',
              'favicon',
              'no_js',
              //'facebook',
              'google_analytics'];
       
       for($i=0;$i<sizeof($tags);$i++)
       {
           if($this->_CI->_main_config_data['environment']=='prod' && $tags[$i]=='robots_dev')
              continue;
           else if($this->_CI->_main_config_data['environment']=='dev' && $tags[$i]=='robots_prod')
              continue;
           else if($this->_CI->_main_config_data['environment']=='dev' && $tags[$i]=='google_analytics')
              continue;
           else
           {
              $fun="print_{$tags[$i]}"; 
              $meta_tags[$tags[$i]]=$this->$fun(); 
           }

       }

       return($meta_tags);
   }
   
   
   function print_meta()
   {
      $meta="  <META charset='UTF-8'>\n";
      $meta.="  <META NAME='Author' CONTENT='MediaGate'>\n";
      //$meta_e_base.="   <BASE href='".base_url()."application/views/'>\n";
      
      return($meta);
   }
   
   function print_viewport()
   {
      return('  <meta name="viewport" content="width=device-width, initial-scale=1.0">');
   }
   
   function print_IE8_standard_mode()
   {
      $ie8_standard="  <META HTTP-EQUIV='X-UA-Compatible' CONTENT='IE=Edge,chrome=1'>";     
      return($ie8_standard);
   }

   function print_Fix_html5_IE()
   {
      $fix_html5_ie="  <!--[if lt IE 9]><script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script><![endif]-->\n";
      
      return($fix_html5_ie);
   }

   function print_robots_dev()
   {
      $robots="<meta name='robots' content='noindex, nofollow'>\n"; 
    
      return($robots);
   }

   function print_robots_prod()
   {
      $robots="  <meta name='robots' content='index, follow'>\n"; 
    
      return($robots);
   }   
   
   function print_favicon()
   {
      $favicon="  <link REL='shortcut icon' href='".base_url()."application/views/tema/images/favicon/favicon.ico'>\n";
      $favicon.="  <link rel='icon' type='image/gif' href='".base_url()."application/views/tema/images/favicon/animated_favicon1.gif'>\n";
      $favicon.="  <link rel='apple-touch-icon' href='".base_url()."application/views/tema/images/favicon/apple-touch-icon.png'>\n";
      
      return($favicon);
   }
   
   function print_no_js()
   {
      $no_js="<NOSCRIPT><META http-equiv='Refresh' content='0; URL=".base_url()."index.php/no_js'></NOSCRIPT>\n";
      
      return($no_js);
   }

   function print_google_analytics()
   {
       $codice='xyz'; 
       
       $google="
          <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', '".$codice."', 'casamontetabor.com');
            ga('send', 'pageview');
          </script>\n";
      return($google);
   }
   
   
   
   
   
   
   
   
   
   
   
   
   
   /**********************************************************************************************************/
   
   /* IL CODICE CHE SEGUE E' QUI SOLO COME PROMEMORIA, NON UTILIZZATO AL MOMENTO, DECIDERE COSA RECICLARE */
   
   /**********************************************************************************************************/
   

   /*-------FOOTER--------------------------------------------------------------------------------------------*/
   function print_footer()      /*Questa funzione printa il footer della pagina*/
   {    
      $anno_attivazione_sito=2013;
      
      if($this->_is_browser_ok)
      {
         $footer_id="browser_ok";
         $footer_dialog="info_browser_ok";
         $footer_title="OTTIMO! Stai visualizzando il sito nel modo migliore. Fai CLICK per altre informazioni";
      }
      else
      {
         $footer_id="browser_old";
         $footer_dialog="info_browser_old";
         $footer_title="ATTENZIONE! Stai utilizzando un Browser obsoleto. Fai CLICK per altre informazioni";
      }

      date_default_timezone_set('Europe/Rome');
      $attivazione=mktime("0","0","0","1","1",$anno_attivazione_sito);
	  $oggi=time();
	  $diff_anni=floor(($oggi-$attivazione)/(60*60*24*365));
      if($diff_anni)
         $anno_oggi="-".($anno_attivazione_sito+$diff_anni);
      else
         $anno_oggi="";
         
      $controller=& get_instance();
        
      $view_data=array('anno_attivazione_sito'=>$anno_attivazione_sito,
                       'anno_oggi'=>$anno_oggi,
                       'footer_id'=>$footer_id,
                       'footer_dialog'=>$footer_dialog,
                       'footer_title'=>$footer_title);
        
      $fondo_pagina=$controller->load->view('sito/elementi_comuni/macro_sezioni/footer',$view_data,true);
    
//ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only
      return($fondo_pagina);
   }
  /*---------------------------------------------------------------------------------------------------------*/  

} 



?>