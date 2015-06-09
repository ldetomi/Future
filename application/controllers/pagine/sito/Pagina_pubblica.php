<?php

  class Pagina_pubblica extends Public_Controller 
  {    
    
    function __construct()
    {
      parent::__construct();
      $this->_view_data['page_tag']=$this->router->class;
    }
     
    function index()
    {            
      $this->load->view('pagine/pagina_pubblica/view_pagina_pubblica',$this->_view_data); // nome del file di view, vedi esempi in controller gia' esistenti
    }
  }
?> 
