<?php
print($doc_type);
?>
<html>
<head>
  
 <?php

    if(isset($meta_tags) && is_array($meta_tags))
      foreach ($meta_tags as $tag)
          print(html_entity_decode($tag)."\n");


    /* Carica fogli di stile e librerie javascript, comuni e specifiche */
    if(isset($js_headers) && is_array($js_headers))
      foreach ($js_headers as $script)
          print(html_entity_decode($script)."\n");
  ?>

</head>

<body>

Setta l'ambiente:
<br>
<input type='radio' name='environment' id='environment_is_dev' <?php if($main_config_data['environment']=="dev")print('checked');?>  value='dev' >DEV</input>
<br>
<input type='radio' name='environment' id='environment_is_prod' <?php if($main_config_data['environment']=="prod")print('checked');?> value='prod'>PROD</input>
<br><br>
Forza la disabilitazione della cache anche in PROD (in PROD la cache &egrave; attiva per default)
<br>
<input type='checkbox' id='force_disable_cache' <?php if((int)$main_config_data['force_disable_cache'])print('checked');?>></input>
<br><br>
Modalit&agrave; stili:
<br>
<input type='radio' name='less_css' id='style_is_less' <?php if($main_config_data['less_css']=="less")print('checked');?>  value='less' >Less</input>
<br>
<input type='radio' name='less_css' id='style_is_css' <?php if($main_config_data['less_css']=="css")print('checked');?> value='css'>CSS</input>
<br><br>
Anno di Pubblicazione del sito
<input type='text' id='anno_pubblicazione' value="<?php print($main_config_data['year_activation']); ?>">
<br><br>
Nome del sito
<input type='text' id='nome_sito' value="<?php print($main_config_data['title']); ?>">
<br><br>
Abilita della validazione delle FORM
<br>
<input type='checkbox' id='form_validation' <?php if((int)$main_config_data['force_disable_form_validation'])print('checked');?>></input>

<br><br>
Scelta del tema

<select id='tema_sito'>
  <option value="tema-verde" >Verde</option>
  <option value="tema-rosso" >Rosso</option>
</select>

<br><br>
<button type='button' id='save_data'><strong>Salva</strong></button>

</body>
</html>


<script type="text/javascript"> 
    var selected_theme='<?php print($main_config_data['theme']);?>';
    jQuery('#tema_sito option[value='+selected_theme+']').prop('selected', true);

    jQuery('#save_data').on('click',function()
    {

       var environment=jQuery('input[name=environment]:checked').val();
       var force_disable_cache=jQuery('#force_disable_cache').is(':checked')?1:0;
       var less_css=jQuery('input[name=less_css]:checked').val();
       var anno_pubblicazione=jQuery('#anno_pubblicazione').val();
       var nome_sito=jQuery('#nome_sito').val();
       var form_validation=jQuery('#form_validation').is(':checked')?1:0;
       var tema_sito=jQuery('#tema_sito').val();

       var input_data={};
       input_data[token_name]=token_value;
//alert(inspectObject(input_data));       
       jQuery.extend(input_data,{'environment':environment,
                                 'force_disable_cache':force_disable_cache,
                                 'less_css':less_css,
                                 'anno_pubblicazione':anno_pubblicazione,
                                 'nome_sito':nome_sito,
                                 'form_validation':form_validation,
                                 'tema_sito':tema_sito});

       return(jQuery.ajax({type: 'POST',
                url: base_url+'index.php/ajax/admin/admin_ajax/save_data',
                data: input_data,
                dataType: 'json',
                success: function(data,status,xhr)
                         {
                             //alert('done');
                            //alert(inspectObject(data));
                         },
                error: function(xhr){handleAJAXErrors(xhr,'save_data');}   
               }).done(function(data)
                       {token_value=data['token_value']}));

        
    });
</script>