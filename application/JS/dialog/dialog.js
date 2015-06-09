   // increase the default animation speed to exaggerate the effect
   jQuery.fx.speeds._default = 800;


   /* Sono disponibili due funzioni: 'run_dialog' e 'run_dialog_on_window_load'. 
       La prima puo' venire utilizzata per i seguenti scopi:

      1) Associare un dialog a un evento su un elemento del DOM (ex: cliccando un'ancora si apre un dialog di help). In questo caso il testo
         da visualizzare sta in una view da specificare nel file di configurazione
      2) Usare un dialog come pseudo-alert, ovvero passando direttamente il testo da visualizzare

      'run_dialog' accetta quattro argomenti: 

      run_dialog(target_selector,options,event_types,direct_message)

      'target_selector' => e' il selettore jQuery dell'elemento del DOM che scatena l'apertura del dialog. In altre parole, e' il selettore che 
                           identifica l'elemento del DOM a cui e' associata la classe dialog[XXX] con XXX ID del dialog da aprire.

      'options'         => e' un array javascript che contiene le opzioni del dialog, ad esempio: {autoOpen: false,show: 'blind',hide: 'explode',width: 500}

      'event_types'     => specifica gli eventi su cui si deve aprire il dialog, ad esempio 'click' (o piu' di uno, come 'click onfocus ...')
 
      'direct_message' (opzionale) => se questo parametro e' presente, il dialog funziona in modalita' pseudo-alert. La sintassi deve essere cosi':
      
                                      direct_message='<DIV id='XXX' title='YYY'> messaggio da printare </DIV>';
      
                                      in particolare e' fondamentale inserire il messaggio in un DIV e assegnare un ID univoco al DIV stesso. 
                                      In questa modalita' e' comunque necessario assegnare una classe "dialog[XXX]" nella view all'elemento che scatena 
                                      l'alert-dialog. Inoltre, in questo caso il valore di "event_types" viene trascurato e quindi puo' essere una stringa vuota.

      In caso di dialog associato a piu' messaggi distinti, usare una sintassi del tipo "dialog[XXX|YYY]". 



      La seconda invece

      3) associa un dialog all'evento onload di BODY, quindi della pagina. Questo puo' essere utile per le pagine che richiedono un 
         check preliminare per esempio quello sul browser usato

      'run_dialog_on_window_load' accetta solo il parametro 'options' e (opzionale) direct_message

   */

   function run_dialog(target_selector,options,event_types,direct_message)
   {
      jQuery(target_selector).each(function()
      {
         /* In caso di class='dialog[dialog1|dialog2|...]' elimina il carattere di pipe che altrimenti genera casini */
         jQuery(this).attr('class',jQuery(this).attr('class').replace(/\|/g,''));

         /* Salta tutti gli elementi con classe contenente la stringa 'dialog' ma senza argomenti ([...]) e, in piu', l'elemento body 
            (per il quale ha senso solo la funzione 'run_dialog_on_window_load') */
         if(jQuery(this).attr('class').indexOf('[')==-1 || jQuery(this).is('body'))
            return true;

         /* Estrae l'argomento del dialog, quindi XXX da class='dialog[XXX]' */
         var curr_dialog=jQuery(this).attr('class').replace(/^.*(dialog\[(.*)\]).*$/g,'$2');

         jQuery('#'+curr_dialog).attr('style','');

         /* Se 'direct_message' e' una stringa vuota, allora il dialog e' associato a un evento su un elemento e non e' uno pseudo-alert */
         if(typeof direct_message == 'undefined')
         {
            jQuery('#'+curr_dialog).dialog(options);
            jQuery(this).bind(event_types,function() 
            {
               jQuery('#'+curr_dialog).dialog('open');
               return false;
            });
         }
         else
         {
            msg=jQuery(direct_message);
            msg_id=jQuery(msg).attr('id');
            curr_dialog=curr_dialog.replace(/\|/g,' ');
            if(curr_dialog.indexOf(msg_id)!=-1)
            {
               if(jQuery('#'+msg_id).length==0)
                  msg.appendTo('body');

               jQuery(msg).dialog(options);

               jQuery(msg).dialog('open');
               return false;
            }
         }
      });
   }

   function run_dialog_as_alert(options,direct_message,callback_on_close,dialog_id)
   {
      var msg=jQuery(direct_message);
      msg.appendTo('body');
      options.buttons={Chiudi: function() 
                               {
                                  if(typeof(callback_on_close)!='undefined')
                                     callback_on_close();
                                 
                                  jQuery( this ).dialog( "close" );
                                  if(typeof(dialog_id)!='undefined')
                                       jQuery('#'+dialog_id+', .'+dialog_id).remove();
                               }};
      
      jQuery(msg).dialog(options);
      jQuery(msg).dialog('open');

      if(typeof(dialog_id)!='undefined')
          jQuery(msg).dialog('widget').attr('id', dialog_id);
   }

   function run_dialog_as_confirm(/*ok_text,*/options,direct_message,ok_function,ok_function_data,dialog_id,other_options,no_function,no_function_data)
   {
      var custom_options={'yes_btn_label':'Si','no_btn_label':'No'};
      if(typeof(other_options)!='undefined')
         jQuery.extend(custom_options,other_options);
       
       
      var msg=jQuery(direct_message);
      msg.appendTo('body');
      msg.attr('id','run_dialog_as_confirm_'+dialog_id);
      var on_ok_click=function(data) 
                      {                                  
                         if(typeof(ok_function)!='undefined' && ok_function!='')
                         {
                            if(typeof(data)!='undefined')
                            {
                               jQuery.extend(data,{'exit_status':true}); 
                               eval(ok_function)(data);   
                            }
                            else
                            {
                               var data={'exit_status':true};
                               eval(ok_function)(data);
                            }
                         }
                       
                         jQuery(msg).dialog( "close" );
                         if(typeof(dialog_id)!='undefined')
                            jQuery('#'+dialog_id+', .'+dialog_id).remove();

                         jQuery('#run_dialog_as_confirm_'+dialog_id).remove();
                      };
                                
      var on_no_click=function(data)
                      {                                  
                         if(typeof(no_function)!='undefined')
                         {
                            if(typeof(data)!='undefined')
                            {
                               jQuery.extend(data,{'exit_status':false});
                               eval(no_function)(data);
                            }
                            else
                            {
                               var data={'exit_status':false};
                               eval(no_function)(data);
                            }                                          
                         }
//alert(jQuery(msg).dialog('widget').attr('id'));

                         jQuery(msg).dialog( "close" );
                         if(typeof(dialog_id)!='undefined')
                            jQuery('#'+dialog_id+', .'+dialog_id).remove();
                                  
                         jQuery('#run_dialog_as_confirm_'+dialog_id).remove();
                         
                         };
      options.buttons={};
      options.buttons[custom_options['yes_btn_label']]= function(){on_ok_click(ok_function_data);};
      options.buttons[custom_options['no_btn_label']]= function(){on_no_click(no_function_data);};

      jQuery(msg).dialog(options);
      jQuery(msg).dialog('open');
      
      if(typeof(dialog_id)!='undefined')
          jQuery(msg).dialog('widget').attr('id', dialog_id);

   }

   function run_dialog_on_window_load(options,direct_message)
   {
      var dialog_selector='[class*=dialog]';

      jQuery(dialog_selector).each(function()
      {
         if(typeof(direct_message)=='undefined')
         {
            var id_dialog=jQuery(this).attr('class').replace(/^.*(dialog\[(.*)\]).*$/g,'$2');
            jQuery('#'+id_dialog).attr('style','');
            jQuery('#'+id_dialog).dialog(options);
            jQuery('#'+id_dialog).dialog('open');
         }
         else
         {
            var msg=jQuery(direct_message);
            msg.appendTo('body')
            jQuery(msg).dialog(options);
            jQuery(msg).dialog('open');
         }
         
         
         return false;
      });
   }
