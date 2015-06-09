<?php

$config['login']['admin']=array('db'=>array('group'=>'default',
                                            'table'=>'login_data'),
                                'registration_enabled'=>false,
                                'login_logout_frame_view'=>'plugins/login/view_login_logout_frame',
                                'is_modal'=>true,
                                'login_form'=>array('id'=>'toggle_login_form',
                                                    'title'=>'<H2>Autenticazione</H2>',
                                                    'login_form_default_on_page_load'=>'hide'),
                                'hide_show_login'=>array('on_new_btn_click'=>array('exists'=>false,
                                                                                   'button_id'=>'toggle_login_form_btn',
                                                                                   'class'=>'ui-state-default ui-corner-all',
                                                                                   'text'=>'Mostra login'),
                                                         'on_existing_target_click'=>array('exists'=>true,
                                                                                           'target_id'=>'login')));

?>