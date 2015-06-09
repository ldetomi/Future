<?php

  class Content_editable_ajax extends CI_controller
  {
     private $_db_id;

     function __construct()
     {
        parent::__construct();

        $this->_db_id=$this->load->database('testi',TRUE);
     }

     function save_text()
     {
         $edited_text=$this->input->post('edited_text',true);
         $block_id=$this->input->post('block_id',true);
         $page_tag=$this->input->post('page_tag',true);

         $table='testi_'.$page_tag;
         $data=['testo'=>$edited_text];

         $this->_db_id->where(['id_blocco'=>$block_id]);
         $this->_db_id->update($table,$data);

         print(json_encode([]));
     }


  }

?>

