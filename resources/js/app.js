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