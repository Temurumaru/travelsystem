@extends('layouts.admin')


@section('title', 'Изменить Тур')
@section('header_title', APP_NAME)
@section('sub_title', 'Изменить Тур')


@php
  $start_leave_1 = json_decode($tour -> start_leave_1, true);
  $start_come_2 = json_decode(@$tour -> start_come_2, true);
  $start_leave_2 = json_decode(@$tour -> start_leave_2, true);
  $start_come_3 = json_decode(@$tour -> start_come_3, true);
  $start_leave_3 = json_decode(@$tour -> start_leave_3, true);
  $start_come_4 = json_decode($tour -> start_come_4, true);

  $end_leave_1 = json_decode($tour -> end_leave_1, true);
  $end_come_2 = json_decode(@$tour -> end_come_2, true);
  $end_leave_2 = json_decode($tour -> end_leave_2, true);
  $end_come_3 = json_decode(@$tour -> end_come_3, true);
  $end_leave_3 = json_decode($tour -> end_leave_3, true);
  $end_come_4 = json_decode($tour -> end_come_4, true);
@endphp



@section('content')

  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма изменения Тура</h5>

        <form class="row g-3" method="post" action="{{route('UpdateTour')}}">

          @csrf

          <input type="hidden" name="id" value="{{$tour -> id}}">

          <input type="hidden" name="all_flys" id="all_flys" value="">
          <input type="hidden" name="all_flys_end" id="all_flys_end" value="">
          <input type="hidden" name="all_cityes" id="all_cityes" value="">


          <div class="col-md-12">
            <label for="name" class="form-label">Название Тура</label>
            <input required type="text" minlength="4" maxlength="40" class="form-control" name="name" id="name" value="{{$tour -> name}}">
          </div>

          <h5 class="mt-4 mb-0"><b>Выбор тур оператора</b></h5>
          <div class="col-md-12">
            <select required class="form-select" name="company" aria-label="Default select example">
              @foreach ($orgs as $org)  
                <option {{(($tour -> company == $org -> id) ? "selected" : '')}} value="{{$org -> id}}">{{$org -> name}}</option>
              @endforeach
            </select>
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Туда</b></h4>

          <h5 class="mt-4 mb-0"><b>Вылет</b></h5>
          <div class="col-md-4">
            <label for="start_leave_1_date" class="form-label">Дата</label>
            <input required type="date" class="form-control" name="start_leave_1_date" id="start_leave_1_date" value="{{$start_leave_1['date']}}">
          </div>
          <div class="col-md-4">
            <label for="start_leave_1_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="start_leave_1_time" id="start_leave_1_time" value="{{$start_leave_1['time']}}">
          </div>
          <div class="col-md-4">
            <label for="start_leave_1_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="start_leave_1_city" id="start_leave_1_city"  value="{{$start_leave_1['city']}}">
          </div>

          <div class="row g-3" id="start_fly_complex">

            @for ($i = 2; $i <= $tour -> all_flys; $i++)

              <h5 class="gbr-{{$i}} mt-4 mb-0"><b>Прилёт</b></h5>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_come_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="start_come_{{$i}}_date" id="start_come_{{$i}}_date" value="{{eval('return $start_come_'.$i.'["date"];')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_come_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="start_come_{{$i}}_time" id="start_come_{{$i}}_time" value="{{eval('return $start_come_'.$i.'["time"];')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_come_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="start_come_{{$i}}_city" id="start_come_{{$i}}_city" value="{{eval('return $start_come_'.$i.'["city"];')}}">
              </div>
        
              <h5 class="gbr-{{$i}} mt-4 mb-0"><b>Вылет</b></h5>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_leave_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="start_leave_{{$i}}_date" id="start_leave_{{$i}}_date" value="{{eval('return $start_leave_'.$i.'["date"];')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_leave_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="start_leave_{{$i}}_time" id="start_leave_{{$i}}_time" value="{{eval('return $start_leave_'.$i.'["time"];')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_leave_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="start_leave_{{$i}}_city" id="start_leave_{{$i}}_city" value="{{eval('return $start_leave_'.$i.'["city"];')}}">
              </div>
            @endfor
          
          </div>

          <div class="col-md-12 mb-2 mt-4 hidden" id="start_fly_mom_del">
            <button type="button" id="start_fly_btn_del" class="btn btn-danger">Удалить пересадку <i class="bi bi-dash-lg"></i></button>
          </div>

          <div class="col-md-12 mb-2 mt-4">
            <button type="button" id="start_fly_btn" class="btn btn-success">Добавить пересадку <i class="bi bi-plus-lg"></i></button>
          </div>

          <h5 class="mt-4 mb-0"><b>Прилёт</b></h5>
          <div class="col-md-4">
            <label for="start_come_4_date" class="form-label">Дата</label>
            <input required type="date" class="form-control" name="start_come_4_date" id="start_come_4_date" value="{{$start_come_4["date"]}}">
          </div>
          <div class="col-md-4">
            <label for="start_come_4_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="start_come_4_time" id="start_come_4_time" value="{{$start_come_4["time"]}}">
          </div>
          <div class="col-md-4">
            <label for="start_come_4_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="start_come_4_city" id="start_come_4_city" value="{{$start_come_4["city"]}}">
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Обратно</b></h4>

          <h5 class="mt-4 mb-0"><b>Вылет</b></h5>
          <div class="col-md-4">
            <label for="end_leave_1_date" class="form-label">Дата</label>
            <input required type="date" class="form-control" name="end_leave_1_date" id="end_leave_1_date" value="{{$end_leave_1["date"]}}">
          </div>
          <div class="col-md-4">
            <label for="end_leave_1_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="end_leave_1_time" id="end_leave_1_time" value="{{$end_leave_1["time"]}}">
          </div>
          <div class="col-md-4">
            <label for="end_leave_1_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="end_leave_1_city" id="end_leave_1_city" value="{{$end_leave_1["city"]}}">
          </div>

          <div class="row g-3" id="end_fly_complex">
            @for ($i = 2; $i <= $tour -> all_flys_end; $i++)

              <h5 class="gbre-{{$i}} mt-4 mb-0"><b>Прилёт</b></h5>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_come_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="end_come_{{$i}}_date" id="end_come_{{$i}}_date" value="{{eval('return $end_come_'.$i.'["date"];')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_come_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="end_come_{{$i}}_time" id="end_come_{{$i}}_time" value="{{eval('return $end_come_'.$i.'["time"];')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_come_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="end_come_{{$i}}_city" id="end_come_{{$i}}_city" value="{{eval('return $end_come_'.$i.'["city"];')}}">
              </div>
        
              <h5 class="gbre-{{$i}} mt-4 mb-0"><b>Вылет</b></h5>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_leave_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="end_leave_{{$i}}_date" id="end_leave_{{$i}}_date" value="{{eval('return $end_leave_'.$i.'["date"];')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_leave_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="end_leave_{{$i}}_time" id="end_leave_{{$i}}_time" value="{{eval('return $end_leave_'.$i.'["time"];')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_leave_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="end_leave_{{$i}}_city" id="end_leave_{{$i}}_city" value="{{eval('return $end_leave_'.$i.'["city"];')}}">
              </div>
            @endfor
          </div>

          <div class="col-md-12 mb-2 mt-4 hidden" id="end_fly_mom_del">
            <button type="button" id="end_fly_btn_del" class="btn btn-danger">Удалить пересадку <i class="bi bi-dash-lg"></i></button>
          </div>

          <div class="col-md-12 mb-2 mt-4">
            <button type="button" id="end_fly_btn" class="btn btn-success">Добавить пересадку <i class="bi bi-plus-lg"></i></button>
          </div>

          <h5 class="mt-4 mb-0"><b>Прилёт</b></h5>
          <div class="col-md-4">
            <label for="end_come_4_date" class="form-label">Дата</label>
            <input required type="date" class="form-control" name="end_come_4_date" id="end_come_4_date" value="{{$end_come_4["date"]}}">
          </div>
          <div class="col-md-4">
            <label for="end_come_4_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="end_come_4_time" id="end_come_4_time" value="{{$end_come_4["time"]}}">
          </div>
          <div class="col-md-4">
            <label for="end_come_4_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="end_come_4_city" id="end_come_4_city" value="{{$end_come_4["city"]}}">
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Города</b></h4>


          <div class="col-md-4">
            <label for="city_name_1" class="form-label">Название</label>
            <input required type="text" maxlength="40" class="form-control" name="city_name_1" id="city_name_1" value="{{$tour -> city_name_1}}">
          </div>
          <div class="col-md-4">
            <label for="city_days_1" class="form-label">Дней</label>
            <input required type="number" min="0" class="form-control" name="city_days_1" id="city_days_1" value="{{$tour -> city_days_1}}">
          </div>
          <div class="col-md-4">
            <label for="city_nights_1" class="form-label">Ночей</label>
            <input required type="number" min="0" class="form-control" name="city_nights_1" id="city_nights_1" value="{{$tour -> city_nights_1}}">
          </div>

          <div class="col-md-3">
            <label for="distance_city_1" class="form-label">Расстояние</label>
            <input required type="number" min="0" class="form-control" id="distance_city_1" name="distance_city_1" value="{{$tour -> distance_city_1}}">
          </div>
          <div class="col-md-3">
            <label for="city_eats_1" class="form-label">Питание</label>
            <input required type="number" min="0" class="form-control" name="city_eats_1" id="city_eats_1" value="{{$tour -> city_eats_1}}">
          </div>
          <div class="col-md-3">
            <label for="city_hotel_1" class="form-label">Отель</label>
            <input required type="text" class="form-control" name="city_hotel_1" id="city_hotel_1" value="{{$tour -> city_hotel_1}}">
          </div>
          <div class="col-md-3">
            <label for="city_hotel_stars_1" class="form-label">Звёзды</label>
            <input required type="number" min="0" max="7" class="form-control" name="city_hotel_stars_1" id="city_hotel_stars_1" value="{{$tour -> city_hotel_stars_1}}">
          </div>

          <div class="row g-3" id="city_complex">
            @for ($i = 2; $i <= $tour -> all_cityes; $i++)
              <div class="gbrs-{{$i}} col-md-4">
                <label for="city_name_{{$i}}" class="form-label">Название</label>
                <input required type="text" maxlength="40" class="form-control" name="city_name_{{$i}}" id="city_name_{{$i}}" value="{{eval('return $tour -> city_name_'.$i.';')}}">
              </div>
              <div class="gbrs-{{$i}} col-md-4">
                <label for="city_days_{{$i}}" class="form-label">Дней</label>
                <input required type="number" min="0" class="form-control" name="city_days_{{$i}}" id="city_days_{{$i}}" value="{{eval('return $tour -> city_days_'.$i.';')}}">
              </div>
              <div class="gbrs-{{$i}} col-md-4">
                <label for="city_nights_{{$i}}" class="form-label">Ночей</label>
                <input required type="number" min="0" class="form-control" name="city_nights_{{$i}}" id="city_nights_{{$i}}" value="{{eval('return $tour -> city_nights_'.$i.';')}}">
              </div>
          
              <div class="gbrs-{{$i}} col-md-3">
                <label for="distance_city_{{$i}}" class="form-label">Расстояние</label>
                <input required type="number" min="0" class="form-control" name="distance_city_{{$i}}" id="distance_city_{{$i}}" value="{{eval('return $tour -> distance_city_'.$i.';')}}">
              </div>
              <div class="gbrs-{{$i}} col-md-3">
                <label for="city_eats_{{$i}}" class="form-label">Питание</label>
                <input required type="number" min="0" class="form-control" name="city_eats_{{$i}}" id="city_eats_{{$i}}" value="{{eval('return $tour -> city_eats_'.$i.';')}}">
              </div>
              <div class="gbrs-{{$i}} col-md-3">
                <label for="city_hotel_{{$i}}" class="form-label">Отель</label>
                <input required type="text" class="form-control" name="city_hotel_{{$i}}" id="city_hotel_{{$i}}" value="{{eval('return $tour -> city_hotel_'.$i.';')}}">
              </div>
              <div class="gbrs-{{$i}} col-md-3">
                <label for="city_hotel_stars_{{$i}}" class="form-label">Звёзды</label>
                <input required type="number" min="0" max="7" class="form-control" name="city_hotel_stars_{{$i}}" id="city_hotel_stars_{{$i}}" value="{{eval('return $tour -> city_hotel_stars_'.$i.';')}}">
              </div>
            @endfor
          </div>

          <div class="col-md-12 mb-2 mt-4 hidden" id="city_mom_del">
            <button type="button" id="city_btn_del" class="btn btn-danger">Удалить город <i class="bi bi-dash-lg"></i></button>
          </div>

          <div class="col-md-12 mb-2 mt-4">
            <button type="button" id="city_btn" class="btn btn-success">Добавить город <i class="bi bi-plus-lg"></i></button>
          </div>
          
          <hr>

          <div class="col-md-3">
            <label for="price" class="form-label">Цена</label>
            <input required type="number" min="0" class="form-control" name="price" id="price" value="{{$tour -> price}}">
          </div>
          <div class="col-md-3">
            <label for="bonus" class="form-label">Бонус</label>
            <input required type="number" min="0" class="form-control" name="bonus" id="bonus" value="{{$tour -> bonus}}">
          </div>
          <div class="col-md-3">
            <label for="places" class="form-label">Кол-во мест</label>
            <input required type="number" min="0" class="form-control" name="places" id="places" value="{{$tour -> places}}">
          </div>
          <div class="col-md-3">
            <label for="places_limit" class="form-label">Ограничение на бронь</label>
            <input type="number" min="0" class="form-control" name="places_limit" id="places_limit" value="{{$tour -> places_limit}}">
          </div>

          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="transfer" {{($tour -> transfer) ? "checked" : ""}}>
              <label class="form-check-label" for="transfer">
                Трансфер
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="guide" {{($tour -> guide) ? "checked" : ""}}>
              <label class="form-check-label" for="guide">
                Гид
              </label>
            </div>
          </div>

          <textarea class="form-control" placeholder="Напишите комментарий" name="description" id="description" style="height: 100px;">{{$tour -> description}}</textarea>

          <div class="text-center">
            @if(getenv('APP_DEBUG') == "true")
              <span type="submit" class="btn btn-primary" id="test_btn">ТЕСТ <i class="bi bi-back"></i></span>
            @endif
            
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">
              <i class="bi bi-eye-fill"></i>
            </button>
            <button type="submit" class="btn btn-success">Сохранить <i class="bi bi-download"></i></button>
            <button type="button" id="close_tour_btn_imitator" class="btn btn-danger">Завершить <i class="bi bi-calendar2-x-fill"></i></button>
            <button type="submit" name="close" id="close_tour_btn" value="true" class="btn btn-danger hidden"></button>
          </div>
        </form>

      </div>
    </div>
  </div>
  
  @php
    use ThreadBeanPHP\C as C;
  @endphp
  <script>
    let all_flys = 1;
    let all_flys_end = 1;
    let all_cityes = 1;
    
    let ifl = "{{$tour -> all_flys}}";
    if(ifl != "") {
      all_flys = Number("{{$tour -> all_flys}}");
      all_flys_end = Number("{{$tour -> all_flys_end}}");
      all_cityes = Number("{{$tour -> all_cityes}}");
    }
  </script>
  

  <div class="modal fade" id="largeModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Список забронировавших Агентов</h5>
          <button class="btn btn-primary mx-2" id="booking_slide_btn"><i class="bi bi-clipboard-fill"></i></button>
          <a href="{{route('StatBusy')}}?tour={{$tour -> id}}" class="btn btn-success mx-2"><i class="bi bi-download"></i></i></a>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          @php
            $busy = C::find("busy", "tour = ?", [$tour -> id]);
            $places_rem = $tour -> places;
            foreach ($busy as $item) {
              $places_rem -= $item -> places;
            }
          @endphp

          <div style="width: 100%;" id="booking_slide">
            <form action="{{route('CreateBusy')}}" method="post" class="row g-3">
              @csrf
              <input type="hidden" name="tour" id="booking_slide_tour" value="{{$tour -> id}}">
              <div class="col-md-12">
                <label for="company" class="form-label">Тур операторы</label>
                <select required class="form-select" name="company" id="booking_slide_company" aria-label="Default select example">
                  <option selected value="">Нажмите чтобы открыть список</option>
                  @foreach ($orgs as $org)  
                    <option value="{{$org -> id}}">{{$org -> name}}</option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-12">
                <label for="places" class="form-label">Места</label>
                <input required type="number" min="0" class="form-control" name="places" id="booking_slide_places" free="{{$places_rem}}" max="0" >
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success">Забронировать <i class="bi bi-bookmark-check-fill"></i></button>
              </div>
            </form>
            <hr>
          </div>

          <table class="table table-borderless">
            <tbody class="agent_tour_element">

              

              @foreach ($busyes as $busy)

              @php
                $org = C::findOne("companys", "id = ?", [$busy -> company]);
                $agent = C::findOne("agents", "company = ?", [$org -> id]);
                $bonus = 0;
                if($busy -> company != $tour -> company) {
                  $bonus = $tour -> bonus * $busy -> places;
                }
              @endphp
                
              <tr class="mx-0">
                <td class="p-1"><img src="{{(@$agent -> avatar) ? "/uploads/avatar/".$agent -> avatar : "/assets/img/profile-img.jpg"}}" alt="Profile" class="rounded-circle" width="50px"></td>
                <td class="p-1"><b>{{$org -> name}}<b></td>
                {{-- <td>{{((@$agent -> full_name) ? $agent -> full_name : "Unknown")}}</td> --}}
                <td class="p-1">{{$bonus}}$</td>
                <td class="p-1"><b>{{$busy -> places}}</b> <i class="bi bi-people-fill"></i></td>
                <td class="p-1"><button delid="{{$busy -> id}}" class="busy_delete_btn btn btn-danger"><i class="bi bi-trash-fill"></i></button></td>
              </tr>

              @endforeach

            </tbody>
          </table>
          $org = C::findOne("companys", "id = ?", [$req -> id]);
          C::trash($org);
          return "OK";
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    const req_del_busy_url = "{{route('DeleteBusy')}}";
    const req_count_busy_url = "{{route('CountBusy')}}";
  </script>

@endsection