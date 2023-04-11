import './bootstrap';
import $ from 'jquery';

$('#file').on('change', () => {

  if($('#file').prop('files')[0].size > 2 * 1024 * 1024) {
    alert("Аватар слишком тяжёлый, аватар не должен вестить более 2мб!");
  }

  let fileReader = new FileReader();
  fileReader.onload = function () {
    let data = fileReader.result;
    $('#avatar_preview').attr('src', data);
    $('#avatar_state').val('add');
  };
  fileReader.readAsDataURL($('#file').prop('files')[0]);
});

$('#file_remove').on('click', () => {
  $('#avatar_preview').attr('src', '');
  $('#file').val('');
  $('#avatar_state').val('remove');
});

$("#price").on("dblclick", function() {
  alert("Бонус "+$(this).attr('bonus')+'$');
});


$(".admin_delete_btn").on("click", function() {
  $.ajax({
    url: req_del_admin_url,
    type: "delete",
    dataType: 'html',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: ({
      id: $(this).attr("delid"),
    }),
    error: function(err) {
      if(err.status == 500) {
        alert("Интернета нету");
      } else {
        alert("Ошибка: "+err.status+"!");
      }
    },
    success: function(data) {
      if(data == "OK"){
        alert("Администратор удалён");
        location.reload();
      } 
      if(data == "ERR") alert("Ошибка удаление пожалуйста перезагрузите страницу и повторите попытку!");
    }
  });
});

$(".org_delete_btn").on("click", function() {
  $.ajax({
    url: req_del_org_url,
    type: "delete",
    dataType: 'html',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    data: ({
      id: $(this).attr("delid"),
    }),
    error: function(err) {
      if(err.status == 500) {
        alert("Интернета нету");
      } else {
        alert("Ошибка: "+err.status+"!");
      }
    },
    success: function(data) {
      if(data == "OK"){
        alert("Компания удалена");
        location.reload();
      } 
      if(data == "ERR") alert("Ошибка удаление пожалуйста перезагрузите страницу и повторите попытку!");
    }
  });
});