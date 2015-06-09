<?php

  class Pagina_interna extends Private_Controller 
  {    
    
    function __construct()
    {
      parent::__construct();
      $this->_view_data['page_tag']=$this->router->class;
      
      /******************************* CARICA I TESTI DEI BLOCCHI EDITABILI *************************/
       /*                     CARICA DALLA TABELLA CHE COMBINA LINGUA E PROFILO                      */     
       $this->_view_data['customized_texts']=$this->elementi_comuni->loadCustomizedTexts();
    }
     
    function index()
    {
      $navigation=['main_navigation'=>$this->_view_data['main_navigation'],
                   'first_level_navigation'=>$this->_view_data['first_level_navigation']];
                   
      $this->_view_data['header']=$this->loadHeader('header_pagina_interna',$navigation); // sovrascrive il default (macro-blocchi/headers/header.php)
   
      $this->load->view('pagine/sito/pagina_interna/view_pagina_interna',$this->_view_data); // nome del file di view, vedi esempi in controller gia' esistenti
    }
  }
?> 
