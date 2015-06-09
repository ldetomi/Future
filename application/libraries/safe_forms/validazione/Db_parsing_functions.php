<?php 
if ( ! defined('BASEPATH')) 
   exit('No direct script access allowed');

class Db_parsing_functions 
{
    function phpdate2mysqldate($date,$mode)
    {
       if(!strcmp($mode,'to_db'))
       {
          $date_array=split("/",$date);
          return($date_array[2]."-".$date_array[1]."-".$date_array[0]);
       }
       else if(!strcmp($mode,'from_db'))
       {
          $date_array=split("-",$date);
          /* il db ritorna una data col formato: aaaa-mm-gg. Tale data viene riassemblata come mm/gg/aaaa. Notare che NON viene riassemblata come
             ci si aspetterebbe, ovvero gg/mm/aaaa perche' questo output va in un campo input a cui e' associato un datepicker, il quale si aspetta
             il formato mm/gg/aaaa. */
          return($date_array[1]."/".$date_array[2]."/".$date_array[0]);
       }
    }

    function parse_name($value,$mode)
    {
	   if(!strcmp($mode,'to_db'))
	   {
	      return($value);		   
	   }
	   else if(!strcmp($mode,'from_db'))
	   {
	      return($value);
       }
    }

    function parse_textarea($value,$mode)
    {
	   if(!strcmp($mode,'to_db'))
	   {
	      return($value);		   
	   }
	   else if(!strcmp($mode,'from_db'))
	   {
	      return($value);
       }
    }

    function parse_select($value,$mode)
    {
	   if(!strcmp($mode,'to_db'))
	   {
	      return($value);		   
	   }
	   else if(!strcmp($mode,'from_db'))
	   {
	      return($value);
       }
    }
    
    function parse_radio($value,$mode)
    {
	   if(!strcmp($mode,'to_db'))
	   {
	      return($value);		   
	   }
	   else if(!strcmp($mode,'from_db'))
	   {
	      return($value);
       }
    }
    
    function parse_check($value,$mode)
    {
	   if(!strcmp($mode,'to_db'))
	   {
	      return($value);		   
	   }
	   else if(!strcmp($mode,'from_db'))
	   {
	      return($value);
       }
    }

    function parse_strtolower($value)
    {
       return(strtolower($value));
    }
    
    function parse_ucwords($value)
    {
       return(ucwords(strtolower($value)));
    }
}

?>
