<?php

$config['dialog']['info_browser_ok']=array(array('target_selector'=>'#browser_ok',
                                                 'options'=>array('autoOpen'=>'false',
                                                                  'show'=>'blind',
                                                                  'hide'=>'explode',
                                                                  'width'=>700,
                                                                  'resizable'=>false,
                                                                  'modal'=>true),
                                                 'view'=>'plugins/dialogs/view_dialog_info_browser_ok',
                                                 'events'=>'click',
                                                 'on_window_load'=>false));
                                           
$config['dialog']['info_browser_old']=array(array('target_selector'=>'#browser_old',
                                                 'options'=>array('autoOpen'=>'false',
                                                                  'show'=>'blind',
                                                                  'hide'=>'explode',
                                                                  'width'=>700,
                                                                  'resizable'=>false,
                                                                  'modal'=>true),
                                                 'view'=>'plugins/dialogs/view_dialog_info_browser_old',
                                                 'events'=>'click',
                                                 'on_window_load'=>false));
                                                 
$config['dialog']['browser_check']=array(array('options'=>array('autoOpen'=>'false',
                                                                'show'=>'blind',
                                                                'hide'=>'explode',
                                                                'width'=>700,
                                                                'resizable'=>false,
                                                                'modal'=>true),
                                                'view'=>'plugins/dialogs/view_dialog_browser_check',
                                                'on_window_load'=>true));

$config['dialog']['info_mappe']=array(array('target_selector'=>'#target_dialog_info_mappe',
                                            'options'=>array('autoOpen'=>'false',
                                                             'show'=>'blind',
                                                             'hide'=>'explode',
                                                             'width'=>500),
                                            'view'=>'sito/pagine/dove_siamo/elementi_dove_siamo/view_dialog_info_mappe',
                                            'events'=>'click',
                                            'on_window_load'=>false));

/**************************************************************************************************************************************************/
/************************************************************* Non toccare qui sotto **************************************************************/
/**************************************************************************************************************************************************/

$config['dialog']['headers']=array('dialog.js'=>'application/JS/dialog'/*,
                                   'modal_form.css'=>'application/views/plugins/email'*/);

?>
