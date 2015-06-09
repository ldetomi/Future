<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Safe_forms_expansion
{
   private $_CI;
   public function __construct()
   {
      $this->_CI =& get_instance();
   } 
    
   public function check_data($string,$param)
   {

       $validation=true;

       $params=explode(',',$param);

       if(sizeof($params)!=1)
          print('Il campo parametri della funzione di validazione check_data deve contenere un solo campo');
       else
       {    
          //$label=$params[0];
          $pattern=$params[0];
          $pattern=str_replace('d','g',$pattern);
          $pattern=str_replace('y','a',$pattern);
          
          $orig_pattern=$pattern;
          $date_labels=array('g','m','a');
          foreach($date_labels as $lab)
             $pattern=str_replace($lab,'',$pattern);

          $separator=$pattern[0];
          $pattern_exploded=explode($separator,$orig_pattern);
          
          //var_dump($separator);
       }
                   
       if(!$string || strlen($string)>10)
          $validation=false;
       else
       {
          $data_array=explode($separator,$string);
          if(sizeof($data_array)!=3)
             $validation=false;
          else
          {
             if($pattern_exploded[0]=='g' && $pattern_exploded[1]=='m' && $pattern_exploded[2]=='a')
                $validation=checkdate ($pattern_exploded[1], $pattern_exploded[0], $pattern_exploded[2]);
             else if($pattern_exploded[0]=='g' && $pattern_exploded[1]=='a' && $pattern_exploded[2]=='m')
                $validation=checkdate ($pattern_exploded[2], $pattern_exploded[0], $pattern_exploded[1]);
             else if($pattern_exploded[0]=='m' && $pattern_exploded[1]=='a' && $pattern_exploded[2]=='g')
                $validation=checkdate ($pattern_exploded[0], $pattern_exploded[2], $pattern_exploded[1]);
             else if($pattern_exploded[0]=='a' && $pattern_exploded[1]=='g' && $pattern_exploded[2]=='m')
                $validation=checkdate ($pattern_exploded[2], $pattern_exploded[1], $pattern_exploded[0]);
             else if($pattern_exploded[0]=='a' && $pattern_exploded[1]=='m' && $pattern_exploded[2]=='g')
                $validation=checkdate ($pattern_exploded[1], $pattern_exploded[2], $pattern_exploded[0]);
             else if($pattern_exploded[0]=='m' && $pattern_exploded[1]=='g' && $pattern_exploded[2]=='a')
                $validation=checkdate ($pattern_exploded[0], $pattern_exploded[1], $pattern_exploded[2]);
          }
       }
         
       if (!$validation)
       {
       
          $_CI->$form_validation->set_message('check_data', 'Il campo %s deve contenere una data nel formato '.$orig_pattern);
          
          
          return FALSE;
       }
       else
       {
          return TRUE;
       }
       //print('DATA '.$string.' CHECKED. SEPARATOR: '.$separator);
   }
}