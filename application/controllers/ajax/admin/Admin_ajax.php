<?php

  class Admin_ajax extends CI_controller
  {    
     private $_db_id;

     function __construct()
     {
        parent::__construct();

        $this->_db_id=$this->load->database('default',TRUE);       
     }
     
     function save_data()
     {
         $environment=$this->input->post('environment',true);
         $force_disable_cache=$this->input->post('force_disable_cache',true);
         $less_css=$this->input->post('less_css',true);
         $anno_pubblicazione=$this->input->post('anno_pubblicazione',true);
         $nome_sito=$this->input->post('nome_sito',true);
         $form_validation=$this->input->post('form_validation',true);
         $tema_sito=$this->input->post('tema_sito',true);
         
         $save_data=['environment'=>$environment,
                     'force_disable_cache'=>$force_disable_cache,
                     'less_css'=>$less_css,
                     'year_activation'=>$anno_pubblicazione,
                     'title'=>$nome_sito,
                     'force_disable_form_validation'=>$form_validation,
                     'theme'=>$tema_sito];
         
         $this->_db_id->update('main_admin_config_data',$save_data); 
         
         print(json_encode(array('token_value'=>$this->security->get_csrf_hash())));  
     }
     
      
  }

?>