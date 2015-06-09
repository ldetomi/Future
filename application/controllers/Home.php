<?php

  class Home extends Public_Controller
  {    
      
    
    function __construct()
    {
      parent::__construct();
      $this->_view_data['page_tag']=$this->router->class;
    }
     
    function index()
    {    
       $this->load->view('pagine/home/view_home',$this->_view_data); // nome del file di view, vedi esempi in controller gia' esistenti
    }
  }
?> 
