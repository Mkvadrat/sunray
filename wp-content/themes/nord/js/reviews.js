jQuery(function($){$('#commentform').submit(function(){$.ajax({type:'POST',url:'http://'+location.host+'/wp-admin/admin-ajax.php',data:$(this).serialize()+'&action=ajaxcomments',beforeSend:function(xhr){$('#submit').text('Загрузка');},error:function(request,status,error){if(status==500){alert('Ошибка при добавлении комментария');}else if(status=='timeout'){alert('Ошибка: Сервер не отвечает, попробуй ещё.');}else{}},success:function(error_comments){$('#respond').prepend('<div class="error_class_form">'+error_comments+'</div>');if(!error_comments){$('#respond').prepend('<div class="complete_send_message">Вы успешно оставили комментарий</div>');}},complete:function(){$('#comment').val('');$('#submit').text('Отправить');}});return false;});});