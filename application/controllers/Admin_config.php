<?php

  class Admin_config extends Mediagate_Controller
  {    
      
    function __construct()
    {
      parent::__construct();
    }
     
    function index()
    {
       $data=$this->_view_data;
       $data['main_config_data']=$this->_main_config_data;
       $this->load->view('view_admin_config',$data); // nome del file di view, vedi esempi in controller gia' esistenti
    }
  }
?> 
