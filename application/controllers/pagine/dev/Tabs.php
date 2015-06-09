<?php

  class Tabs extends Private_Controller 
  {    
    function __construct()
    {
       parent::__construct();
       $this->_view_data['page_tag']=$this->router->class;
      
       /******************************* CARICA I TESTI DEI BLOCCHI EDITABILI *************************/
       /*                     CARICA DALLA TABELLA CHE COMBINA LINGUA E PROFILO                      */     
       //$this->_view_data['customized_texts']=$this->elementi_comuni->loadCustomizedTexts();
    }
     
    function index()
    {
      $navigation=['main_navigation'=>$this->_view_data['main_navigation']];
      $this->_view_data['header']=$this->loadHeader('header_private',$navigation); // sovrascrive il default (macro-blocchi/headers/header.php)
       
      
//print('Il mio profilo attuale &egrave; '.$this->elementi_comuni->getCurrentProfile().', la lingua scelta: '.$this->_main_config_data["language"].'<br>');      
      
      $this->load->view('pagine/dev/tabs/view_tabs',$this->_view_data); // nome del file di view, vedi esempi in controller gia' esistenti
    }
  }
?> 
