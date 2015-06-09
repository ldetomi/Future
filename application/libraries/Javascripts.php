<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
* Javascripts:: a class that stores an array of javascripts to be output in the view
*
* looks in your config for: $config['javascripts'] = array('jquery.js', 'interface.js'); 
* and $config['javascript_files']="system/application/JS/";
*/
class Javascripts
{
   private $_headers;
   private $_CI;

   function __construct()
   {
      $this->clear();
      $this->_CI =& get_instance();
   }
   
   // return the array of headers
   function add_data_and_get_headers($header_data,&$js_headers/*,$disable_autoload_include=false*/)
   {
       
       
      if($header_data)
         $this->add_data($header_data);
      
      
//var_dump($js_headers);  
      if(is_array($js_headers))
         $js_headers=array_unique(array_merge($js_headers,$this->_headers));
      else
         $js_headers=array_unique($this->_headers);
      
      $js_headers=array_values($js_headers);
      
     
      /* METTE IN FONDO IL FILE JS CHE GESTISCE LESS */
      for($i=0;$i<sizeof($js_headers);$i++)
      {
          //print('checking: '.$js_headers[$i].': '.(preg_match('/.*less.*\.js/', $js_headers[$i])).'<br>');
          if(preg_match('/.*less.*\.js/', $js_headers[$i]))
          {
             $less=$js_headers[$i];
             unset($js_headers[$i]);
             $js_headers[]=$less;
             $js_headers=array_values($js_headers);
             break;
          }
      }
      
         
   }

   function add_data($header_data)
   {
                     
      $files=array_keys($header_data);
      $path=array_values($header_data);
      if ($files) 
         $this->build_headers($files,$path);

   }
   
   // return the array of headers
   function get_headers_only_css()
   {
      $headers=$this->_headers;
      for($i=0;$i<sizeof($headers);$i++)
      {
         if(preg_match("/rel='stylesheet'/i",$headers[$i]))
            $only_css[]=$headers[$i];
      }
      return($only_css);

   }

   // clear all headers
   function clear()
   {
      $this->_headers = array();
   }

   // get javascript headers
   function build_headers($items,$paths)
   {
      if (is_array($items)) 
      {
         for($i=0;$i<sizeof($items);$i++)
         {
            $item=$items[$i];
            $path=$paths[$i];
            if (!in_array($item, $this->_headers)) 
            {
               if(preg_match("/\.less/i",$item) && $this->_CI->_less_enabled)
                  $this->_headers[] = htmlspecialchars("<link href='".base_url().$path."/".$item."' rel='stylesheet/less' >",ENT_NOQUOTES); 
               elseif(preg_match("/\.less/i",$item) && !$this->_CI->_less_enabled)  
                  $this->_headers[] = htmlspecialchars("<link href='".base_url().$path."/../css/".$item."' rel='stylesheet' >",ENT_NOQUOTES);  
               elseif(preg_match("/\.css/i",$item))
                  $this->_headers[] = htmlspecialchars("<link href='".base_url().$path."/".$item."' rel='stylesheet' >",ENT_NOQUOTES);
               elseif(preg_match("/\.js/i",$item))
                  $this->_headers[] = htmlspecialchars("<script src='".base_url().$path."/".$item."' ></sc"."ript>",ENT_NOQUOTES);
               elseif(preg_match("/literal/i",$item))
               {
                  if(preg_match("/css/i",$path))
                     $this->_headers[] = htmlspecialchars("<link href='".$path."' rel='stylesheet' >",ENT_NOQUOTES);
                  else
                     $this->_headers[] = htmlspecialchars("<script src='".$path."' ></sc"."ript>",ENT_NOQUOTES);
               }
               elseif(preg_match("/exec/i",$item))
                  $this->_headers[] = htmlspecialchars("<script >".$path."</sc"."ript>",ENT_NOQUOTES);

            }
         }
      } 
      else 
      {
         $paths=trim($paths,"/");

         if (!in_array($items, $this->_headers)) 
         {
            if(preg_match("/less/i",$items) && $this->_CI->_less_enabled)
               $this->_headers[] = htmlspecialchars("<link href='".base_url().$paths."/".$items."' rel='stylesheet/less' >",ENT_NOQUOTES); 
            elseif(preg_match("/\.less/i",$item) && !$this->_CI->_less_enabled)
                $this->_headers[] = htmlspecialchars("<link href='".base_url().$paths."/../css/".$items."' rel='stylesheet' >",ENT_NOQUOTES); 
            elseif(preg_match("/css/i",$items))
               $this->_headers[] = htmlspecialchars("<link href='".base_url().$paths."/".$items."' rel='stylesheet' >",ENT_NOQUOTES);
            elseif(preg_match("/js/i",$items))
               $this->_headers[] = htmlspecialchars("<script src='".$paths."/".$items."' ></sc"."ript>",ENT_NOQUOTES);
            elseif(preg_match("/literal/i",$items))
            {
               if(preg_match("/css/i",$paths))
                  $this->_headers[] = htmlspecialchars("<link href='".$paths."' rel='stylesheet' >",ENT_NOQUOTES);
               else           
                  $this->_headers[] = htmlspecialchars("<script src='".$paths."' ></sc"."ript>",ENT_NOQUOTES);
            }
            elseif(preg_match("/exec/i",$items))
               $this->_headers[] = htmlspecialchars("<script >".$paths."</sc"."ript>",ENT_NOQUOTES);

         }
      }
   }

   // output the array of headers
   function to_string()
   {
      return 'headers are: '.implode(',', $this->_headers);
   }


   /*************************************************************************************************/
   /* Converte un vettore PHP in vettore Javascript, ritorna la stringa JS                          */
   /* codificata, per inserirla nell'HTML decodificare con html_entity_decode(). Ex.
      
      $js_array=$this->javascripts->convert_PHP2JS_vector("mio_js_array",array("uno"=>1,"due"=>2));
      print(html_entity_decode($js_array));
      
      printa:
      
      <SCRIPT type='text/javascript'> var mio_js_array=new Array();
      mio_js_array["uno"]=1;
      mio_js_array["due"]=2;
      </SCRIPT>
   */
   function convert_PHP2JS_vector($JS_vector_name,$php_vector) 
   {
      $js="";
      $js.=htmlspecialchars("<SCRIPT >",ENT_NOQUOTES);
      $js.=htmlspecialchars("var ".$JS_vector_name."=new Array();",ENT_NOQUOTES);
   
      if(sizeof($php_vector))
      {
         foreach($php_vector as $key=>$value)
         {
            $js.=htmlspecialchars("\n ".$JS_vector_name."['".$key."']=".$value.";",ENT_NOQUOTES);
         }
      }

      $js.=htmlspecialchars("</SCRIP"."T>",ENT_NOQUOTES);

      return($js);
   }
}
?>