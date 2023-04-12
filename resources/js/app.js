import './bootstrap';
import $ from 'jquery';
import { faker } from '@faker-js/faker';

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
  if(confirm('Вы точно хотите удалить Администратора?')) {

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
  
  }
});

$(".org_delete_btn").on("click", function() {
  if(confirm('Вы точно хотите удалить Компанию?')) {

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
        if(data == "HAVE") alert("К этой компании привязаны Агенты, его невозможно удалить!");
        if(data == "ERR") alert("Ошибка удаление пожалуйста перезагрузите страницу и повторите попытку!");
      }
    });
  
  }
});

$(".agent_delete_btn").on("click", function() {
  if(confirm('Вы точно хотите удалить Агента?')) {

    $.ajax({
      url: req_del_agent_url,
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
          alert("Агент удалён");
          location.reload();
        } 
        if(data == "ERR") alert("Ошибка удаление пожалуйста перезагрузите страницу и повторите попытку!");
      }
    });
  
  }
});

$(".tour_delete_btn").on("click", function() {
  if(confirm('Вы точно хотите удалить Тур!?')) {

    $.ajax({
      url: req_del_tour_url,
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
          alert("Тур удалён");
          location.reload();
        } 
        if(data == "HAVE") alert("К этому туру присутствуют брони, его невозможно удалить!");
        if(data == "ERR") alert("Ошибка удаление пожалуйста перезагрузите страницу и повторите попытку!");
      }
    });
  
  }
});

$("#start_fly_btn").on("click", function() {

  if(all_flys < 3) {

    all_flys++;

    $("#start_fly_complex").append(`

      <h5 class="gbr-`+all_flys+` mt-4 mb-0"><b>Прилёт</b></h5>
      <div class="gbr-`+all_flys+` col-md-4">
        <label for="start_come_`+all_flys+`_date" class="form-label">Дата</label>
        <input required type="date" class="form-control" name="start_come_`+all_flys+`_date" id="start_come_`+all_flys+`_date">
      </div>
      <div class="gbr-`+all_flys+` col-md-4">
        <label for="start_come_`+all_flys+`_time" class="form-label">Время</label>
        <input required type="Time" class="form-control" name="start_come_`+all_flys+`_time" id="start_come_`+all_flys+`_time">
      </div>
      <div class="gbr-`+all_flys+` col-md-4">
        <label for="start_come_`+all_flys+`_city" class="form-label">Город</label>
        <input required type="text" maxlength="30" class="form-control" name="start_come_`+all_flys+`_city" id="start_come_`+all_flys+`_city">
      </div>`);

      $("#start_fly_complex").append(`
      <h5 class="gbr-`+all_flys+` mt-4 mb-0"><b>Вылет</b></h5>
      <div class="gbr-`+all_flys+` col-md-4">
        <label for="start_leave_`+all_flys+`_date" class="form-label">Дата</label>
        <input required type="date" class="form-control" name="start_leave_`+all_flys+`_date" id="start_leave_`+all_flys+`_date">
      </div>
      <div class="gbr-`+all_flys+` col-md-4">
        <label for="start_leave_`+all_flys+`_time" class="form-label">Время</label>
        <input required type="Time" class="form-control" name="start_leave_`+all_flys+`_time" id="start_leave_`+all_flys+`_time">
      </div>
      <div class="gbr-`+all_flys+` col-md-4">
        <label for="start_leave_`+all_flys+`_city" class="form-label">Город</label>
        <input required type="text" maxlength="30" class="form-control" name="start_leave_`+all_flys+`_city" id="start_leave_`+all_flys+`_city">
      </div>

    `);
  }

  if(all_flys > 1) {
    $("#start_fly_mom_del").removeClass("hidden");
  }

});

if(all_flys > 1) {
  $("#start_fly_mom_del").removeClass("hidden");
}

$("#start_fly_btn_del").on("click", function() {

  if(all_flys > 1) {
    $(".gbr-"+all_flys).remove();

    
    all_flys--;
  }

  if(all_flys < 2) {
    $("#start_fly_mom_del").addClass("hidden");
  }

});




$("#end_fly_btn").on("click", function() {

  if(all_flys_end < 3) {

    all_flys_end++;

    $("#end_fly_complex").append(`

      <h5 class="gbre-`+all_flys_end+` mt-4 mb-0"><b>Прилёт</b></h5>
      <div class="gbre-`+all_flys_end+` col-md-4">
        <label for="end_come_`+all_flys_end+`_date" class="form-label">Дата</label>
        <input required type="date" class="form-control" name="end_come_`+all_flys_end+`_date" id="end_come_`+all_flys_end+`_date">
      </div>
      <div class="gbre-`+all_flys_end+` col-md-4">
        <label for="end_come_`+all_flys_end+`_time" class="form-label">Время</label>
        <input required type="Time" class="form-control" name="end_come_`+all_flys_end+`_time" id="end_come_`+all_flys_end+`_time">
      </div>
      <div class="gbre-`+all_flys_end+` col-md-4">
        <label for="end_come_`+all_flys_end+`_city" class="form-label">Город</label>
        <input required type="text" maxlength="30" class="form-control" name="end_come_`+all_flys_end+`_city" id="end_come_`+all_flys_end+`_city">
      </div>`);

      $("#end_fly_complex").append(`
      <h5 class="gbre-`+all_flys_end+` mt-4 mb-0"><b>Вылет</b></h5>
      <div class="gbre-`+all_flys_end+` col-md-4">
        <label for="end_leave_`+all_flys_end+`_date" class="form-label">Дата</label>
        <input required type="date" class="form-control" name="end_leave_`+all_flys_end+`_date" id="end_leave_`+all_flys_end+`_date">
      </div>
      <div class="gbre-`+all_flys_end+` col-md-4">
        <label for="end_leave_`+all_flys_end+`_time" class="form-label">Время</label>
        <input required type="Time" class="form-control" name="end_leave_`+all_flys_end+`_time" id="end_leave_`+all_flys_end+`_time">
      </div>
      <div class="gbre-`+all_flys_end+` col-md-4">
        <label for="end_leave_`+all_flys_end+`_city" class="form-label">Город</label>
        <input required type="text" maxlength="30" class="form-control" name="end_leave_`+all_flys_end+`_city" id="end_leave_`+all_flys_end+`_city">
      </div>

    `);
  }

  if(all_flys_end > 1) {
    $("#end_fly_mom_del").removeClass("hidden");
  }

});

if(all_flys_end > 1) {
  $("#end_fly_mom_del").removeClass("hidden");
}

$("#end_fly_btn_del").on("click", function() {

  if(all_flys_end > 1) {
    $(".gbre-"+all_flys_end).remove();

    
    all_flys_end--;
  }

  if(all_flys_end < 2) {
    $("#end_fly_mom_del").addClass("hidden");
  }

});






$("#city_btn").on("click", function() {

  if(all_cityes < 2) {

    all_cityes++;

    $("#city_complex").append(`

    <div class="gbrs-`+all_cityes+` col-md-4">
      <label for="city_name_`+all_cityes+`" class="form-label">Название</label>
      <input required type="text" maxlength="40" class="form-control" name="city_name_`+all_cityes+`" id="city_name_`+all_cityes+`">
    </div>
    <div class="gbrs-`+all_cityes+` col-md-4">
      <label for="city_days_`+all_cityes+`" class="form-label">Дней</label>
      <input required type="number" min="0" class="form-control" name="city_days_`+all_cityes+`" id="city_days_`+all_cityes+`">
    </div>
    <div class="gbrs-`+all_cityes+` col-md-4">
      <label for="city_nights_`+all_cityes+`" class="form-label">Ночей</label>
      <input required type="number" min="0" class="form-control" name="city_nights_`+all_cityes+`" id="city_nights_`+all_cityes+`">
    </div>

    <div class="gbrs-`+all_cityes+` col-md-3">
      <label for="distance_city_`+all_cityes+`" class="form-label">Расстояние</label>
      <input required type="number" min="0" class="form-control" name="distance_city_`+all_cityes+`" id="distance_city_`+all_cityes+`">
    </div>
    <div class="gbrs-`+all_cityes+` col-md-3">
      <label for="city_eats_`+all_cityes+`" class="form-label">Питание</label>
      <input required type="number" min="0" class="form-control" name="city_eats_`+all_cityes+`" id="city_eats_`+all_cityes+`">
    </div>
    <div class="gbrs-`+all_cityes+` col-md-3">
      <label for="city_hotel_`+all_cityes+`" class="form-label">Отель</label>
      <input required type="text" class="form-control" name="city_hotel_`+all_cityes+`" id="city_hotel_`+all_cityes+`">
    </div>
    <div class="gbrs-`+all_cityes+` col-md-3">
      <label for="city_hotel_stars_`+all_cityes+`" class="form-label">Звёзды</label>
      <input required type="number" min="0" max="7" class="form-control" name="city_hotel_stars_`+all_cityes+`" id="city_hotel_stars_`+all_cityes+`">
    </div>

    `);
  }

  if(all_cityes > 1) {
    $("#city_mom_del").removeClass("hidden");
  }

});

if(all_cityes > 1) {
  $("#city_mom_del").removeClass("hidden");
}

$("#city_btn_del").on("click", function() {

  if(all_cityes > 1) {
    $(".gbrs-"+all_cityes).remove();

    
    all_cityes--;
  }

  if(all_cityes < 2) {
    $("#city_mom_del").addClass("hidden");
  }

});

setInterval(() => {
  $('#all_flys').val(all_flys);
  $('#all_flys_end').val(all_flys_end);
  $('#all_cityes').val(all_cityes);
}, 500);


function rnd(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function rndDate() {
  let yyyy = rnd(2023, 2024);
  let mm = rnd(1, 12);
  let dd = rnd(1, 29);
  if(mm < 10) mm = "0"+mm;
  if(dd < 10) dd = "0"+dd;
  return yyyy+"-"+mm+"-"+dd;
}

function rndTime() {
  let hour = rnd(0, 23);
  let minute = rnd(0, 60);
  if(hour < 10) hour = "0"+hour;
  if(minute < 10) minute = "0"+minute;
  return hour+":"+minute;
}

$("#test_btn").on("dblclick", function() {

  for (let i = 0; i <= 4; i++) {
    $('#start_leave_'+i+'_date').val(rndDate());
    $('#start_leave_'+i+'_time').val(rndTime());
    $('#start_leave_'+i+'_city').val(faker.name.fullName());    
  }

  for (let i = 0; i <= 4; i++) {
    $('#start_come_'+i+'_date').val(rndDate());
    $('#start_come_'+i+'_time').val(rndTime());
    $('#start_come_'+i+'_city').val(faker.name.fullName());    
  }

  for (let i = 0; i <= 4; i++) {
    $('#end_leave_'+i+'_date').val(rndDate());
    $('#end_leave_'+i+'_time').val(rndTime());
    $('#end_leave_'+i+'_city').val(faker.name.fullName());    
  }

  for (let i = 0; i <= 4; i++) {
    $('#end_come_'+i+'_date').val(rndDate());
    $('#end_come_'+i+'_time').val(rndTime());
    $('#end_come_'+i+'_city').val(faker.name.fullName());    
  }

  for (let i = 0; i <= 2; i++) {
    $('#city_name_'+i).val(faker.name.fullName());
    $('#city_days_'+i).val(rnd(1, 80));
    $('#city_nights_'+i).val(rnd(1, 80));    
    $('#distance_city_'+i).val(rnd(10, 900));
    $('#city_eats_'+i).val(rnd(1, 4));
    $('#city_hotel_'+i).val(faker.name.fullName());
    $('#city_hotel_stars_'+i).val(rnd(1, 7));
  }

  $('#name').val(faker.name.fullName());
  $('#price').val(rnd(1000, 5000));
  $('#bonus').val(rnd(50, 500));
  $('#places').val(rnd(1, 80));    
  $('#places_limit').val(rnd(0, 80));

  $('#description').val(faker.name.fullName());
  // $('#').val();

});