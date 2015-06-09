
  var CKEditor_enabled = true;

  if(CKEditor_enabled)
    CKEDITOR.disableAutoInline = true;

  $(document).ready(function()
  {
    $('#view_buttons').on('click',function()
    {
      if( !$('.toggle-edit').length )
      {
        $('.editableElement').each(function()
        {
          var id_editableElement = $(this).attr('id');
          $(this).attr('contenteditable','false').wrap('<div class="editableElement_container"></div>');
          $(this).closest('.editableElement_container').prepend('<button class="toggle-edit" title="Modifica il testo di questa sezione" data-edit-target="' + id_editableElement +'">Start Editing</button>');
        });
        bindEditButtons();
        $(this).text('Nascondi Pulsanti di Edit');
      }
      else
      {
        $('.toggle-edit').remove();
        $('.editableElement').unwrap('<div class="editableElement_container"></div>');
        $(this).text('Visualizza Pulsanti di Edit');
      }
    });
  });


  function saveText(edited_text,block_id,page_tag)
  {
    var input_data={};
    input_data[token_name]=token_value;
    jQuery.extend(input_data,{'edited_text':edited_text,
                              'block_id':block_id,
                              'page_tag':page_tag});

    return(jQuery.ajax({type: 'POST',
                        url: base_url+'index.php/ajax/content_editable/content_editable_ajax/save_text',
                        data: input_data,
                        dataType: 'json',
                        success: function(data,status,xhr)
                                 {

                                 },
                        error: function(xhr){alert(inspectObject(xhr,'Errore in save_text\n'));}   
                        }).done(function()
                                {}));  
  }

  
  function bindEditButtons()
  {
    $('.toggle-edit').on('click',function(e)
    { 
      var id_editedDiv = $(this).data('editTarget');
      var editedDiv = '#' + id_editedDiv;
      
      if( $(editedDiv).attr('contenteditable') == 'true' )
      {
        $(editedDiv).attr('contenteditable','false');
        if(CKEditor_enabled)
          CKEDITOR.instances[id_editedDiv].destroy(); 
        $(this).text('Start Editing');
      }
      else
      {
        $(editedDiv).attr('contenteditable','true');
        if(CKEditor_enabled)
          $(editedDiv).ckeditor({
              on: {blur: function(event) 
                         {
                            var data = encodeURIComponent(event.editor.getData());
                            //alert('edited div: '+id_editedDiv+'\nsender: '+inspectObject(event.sender)+'\neditor: '+inspectObject(event.editor));
                            var page_tag=jQuery('body').attr('id');
                            var block_id=event.editor.name;
                            saveText(data,block_id,page_tag);
                         }}, 
              extraAllowedContent: {
              a: {
                   classes: 'btn, btn-primary, btn-default, btn-success, btn-info, btn-lg',
                   attributes: 'disabled'
              },
              button: {
                        classes: 'btn, btn-primary, btn-default, btn-success, btn-info, btn-lg',
                        attributes: 'disabled'
              },
              table: {
                        classes: 'sisal-table'
              }
            }
          });
       
        $(this).text('Finish Editing');
      }
    });
    
    $('.editableElement').on('dblclick',function()
    { 
      //TO DO: sostituire il comando seguente che va a cercare il pulsante attraverso il DOM, con un altro che faccia la corrispondenza tra l'ID del DIV cliccato e l'attributo data-edit-target del relativo pulsante
      $(this).closest('.editableElement_container').find('.toggle-edit').trigger('click');
      $(this).focus();
    });
  }
