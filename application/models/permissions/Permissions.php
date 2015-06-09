<?php

/* PERMISSIONS:

Utilizzo:

1) Nel costruttore del controller caricare il modello:

   $this->load->model('permissions/permissions');

2) Nell'index() del controller NON serve caricare alcun header. Scrivere:

   $bitmask=$this->permissions->set_permissions(array('write'=>false,'read'=>true, ...));

   In cui 'read', 'write', ... sono le opzioni disponibili su cui abilitare permessi. L'elenco
   completo e' quello che appare nel file .../config/permissions/dati_permissions.php. Si noti che
   l'ordine con cui vengono specificati i permessi in 'set_permissions' non deve necessariamente rispecchiare
   l'ordine dell'array $config['permissions']['mask'] nel file dati_permissions.php

   I valori booleani attivano (true) o disattivano (false) i diversi permessi e NON devono essere specificati come stringhe,
   ovvero 'false', 'true' ma come variabili booleane: false, true. 
   Nell'esempio sopra viene abilitata la lettura e disabilitata la scrittura. In generale, specificare solo
   i permessi di cui si desidera cambiare lo stato rispetto al default che prevede la disattivazione di TUTTI i permessi (tutti a false).
   La funzione ritorna un intero $bitmask che rappresenta in decimale la maschera dei permessi specificata
   Questo codice puo' essere poi scritto in un db o storato in una variabile di sessione.

   Per verificare i permessi abilitati, invece, usare:

   $check=$this->permissions->check_permissions($bitmask,$permissions,$permission_in_and=true);

   Dove viene passata la variabile $bitmask (per esempio presa da db o da variabile di sessione) e confrontata con la stringa o con l'array 
   di stringhe passato come secondo parametro $permissions. Se '$permissions' e' una stringa, il check verifica che il permesso specificato 
   risulti abilitato (in questo caso il terzo parametro e' totalmente trascurato). Se invece '$permissions' e' un array e se il terzo parametro 
   '$permissions_in_and' (opzionale!) e' assente o settato a true, il check verifica che l'array contenga opzioni TUTTE abilitate in $bitmask, 
   ovvero le opzioni dell'array sono messe in AND logico fra loro. Altrimenti, se il terzo parametro e' settato a false, le opzioni dell'array
   sono messe in OR logico fra loro. Esempi: 

   $check=$this->permissions->check_permissions($bitmask,'read'); // sintassi per check su singolo permesso
   
   Si verifica che il permesso di lettura sia abilitato. In caso di verifica positiva $check assume il valore true, altrimenti false.

   oppure

   $check=$this->permissions->check_permissions($bitmask,array('read','write',...)); // sintassi per check su piu' permessi in AND

   Si verifica che $bitmask consenta la lettura E la scrittura. In caso di verifica positiva $check assume il valore true, altrimenti false. 
   
   Tipicamente 'set_permissions' viene chiamato al login, dopo aver verificato il profilo utente. A quel punto la variabile $bitmask viene storata
   in db o in variabile di sessione e ogni controller/model interroghera' tale valore nelle diverse pagine per verificare se certe azioni sono consentite
   o meno. 

FILE CONFIGURAZIONE:
===================

   La maschera puo' essere estesa con qualunque numero di opzioni. Ad esempio:

   $config['permissions']['mask']=array("read","write","delete","change_permissions","admin");

   Nell'esempio precedente, vengono associati i seguenti valori binari (e decimali)

       'read'               => 10000 (16)
       'write'              => 1000  (8)
       'delete'             => 100   (4)
       'change_permissions' => 10    (2)
       'admin'              => 1     (1)

   NON SONO RICHIESTI HEADERS PER QUESTO MODULO

*/

class Permissions extends CI_Model 
{
   private $_permissions;
   function __construct()
   {
      // Call the Model constructor
      parent::__construct();
      $this->config->load('permissions/dati_permissions');
   }

   /*******************************************************************************/
   /********* INIZIO DELLE LE FUNZIONI CHIAMABILI DA CONTROLLERS E MODELS *********/
   /*******************************************************************************/

   /* Dato un array (opzionale) di coppie 'azioni'=>true|false ritorna un intero
      che definisce la bitmask corrispondente */
   function set_permissions($permessi_abilitati)
   {
      $permissions_data=$this->config->item("permissions");
      $permissions_data=array_reverse($permissions_data['mask'],true);

      foreach($permissions_data as $value)
      {
         if(in_array($value,array_keys($permessi_abilitati)))
             $this->_permissions[$value]=$permessi_abilitati[$value];
         else
             $this->_permissions[$value]=false;
      }

      $bitmask=$this->to_bitmask($this->_permissions);
      return($bitmask);
   }
   
   /* Data una bitmask e un set di autorizzazioni (come stringa separata da virgole o array), testa se tali autorizzazioni sono
      consentiti dalla bitmask. Ritorna true se tutte le autorizzazioni sono previste dalla bitmask, false altrimenti */

   function check_permissions($current_bitmask,$authorizations,$permission_in_and=true)
   {
      if(is_string($authorizations))
         $authorizations=array($authorizations);

      for($i=0;$i<sizeof($authorizations);$i++)
         $auth[$authorizations[$i]]=true;

      $check_bitmask=$this->to_bitmask($auth,$permission_in_and);

      $check=false;
      if($permission_in_and)
      {
         if(($current_bitmask & $check_bitmask)==$check_bitmask)
            $check=true;
      }
      else
      {
         foreach($check_bitmask as $value)
         {

            if(($current_bitmask & $value)==$value)
            $check=true;
         }
      }

      return($check);
   }
      
   function to_bitmask($permissions,$permission_in_and=true)
   {
      $permissions_data=$this->config->item("permissions");
      $permissions_data=array_reverse($permissions_data['mask'],true);

      if($permission_in_and)
         $tmp_bitmask=0;
      else
         $tmp_bitmask=array();

      $i=0;
      $keys=array_keys($permissions);

      foreach($permissions_data as $key)
      {
         if($permission_in_and)
         {
            if(in_array($key,$keys) && $permissions[$key])
               $tmp_bitmask+=pow(2,$i);
         }
         else
         {
            if(in_array($key,$keys) && $permissions[$key])
               $tmp_bitmask[]=pow(2,$i);
         }
         $i++;   
      }
      return $tmp_bitmask;
   }          
   

}

?>
