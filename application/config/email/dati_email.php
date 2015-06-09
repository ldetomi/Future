<?php

   /*************************************************************************************************************************************************/

   $config['email']['form_tabor']=['email_form_input_field_names'=>['sender_name'=>'nome_cognome',
                                                                    'from_address'=>'indirizzo_email',
                                                                    'subject'=>'',
                                                                    'message'=>'messaggio_email'],
                                   'email_invia_a'=>['dev'=>['info@casamontetabor.com'],
                                                     'prod'=>['']],
                                   'email_cc'=>['dev'=>[''],
                                                'prod'=>['']],
                                   'add_sender_to_cc'=>true,
                                   'email_bcc'=>['dev'=>['ldetomi@yahoo.com'],
                                                'prod'=>['']],
                                   'email_subject'=>'E-mail inviata dal sito CasaMonteTabor.com',
                                   'email_mostra_report'=>false,
                                   'is_modal'=>false];

   $config['email']['mediagate']=['email_form_input_field_names'=>['sender_name'=>'nome_cognome_dialog',
                                                                   'from_address'=>'indirizzo_email_dialog',
                                                                   'subject'=>'',
                                                                   'message'=>'messaggio_email_dialog'],
                                  'email_invia_a'=>['dev'=>['davdtm02@libero.it'],
                                                    'prod'=>['']],
                                  'email_cc'=>['dev'=>[''],
                                               'prod'=>['']],
                                  'add_sender_to_cc'=>false,
                                  'email_bcc'=>['dev'=>[''],
                                                'prod'=>['']],
                                  'email_subject'=>'E-mail inviata al WebMaster dal sito CasaMonteTabor.com',
                                  'email_mostra_report'=>false,
                                  'is_modal'=>true,
                                  'dialog_options'=>['autoOpen'=>'false',
                                                               'show'=>'blind',
                                                               'hide'=> 'explode',
                                                               'resizable'=>false,
                                                               'height'=> 500,
                                                               'width'=> 800]];
?>
