@extends('layouts.admin')


@section('title', 'Создать Тур')
@section('header_title', APP_NAME)
@section('sub_title', 'Создать Тур')

@section('content')
  
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Форма создания Тура</h5>

        <form class="row g-3" method="post" action="{{route('CreateTour')}}">

          @csrf

          <input type="hidden" name="all_flys" id="all_flys" value="">
          <input type="hidden" name="all_flys_end" id="all_flys_end" value="">
          <input type="hidden" name="all_cityes" id="all_cityes" value="">


          <div class="col-md-12">
            <label for="name" class="form-label">Название Тура</label>
            <input required type="text" minlength="4" maxlength="40" class="form-control" name="name" id="name" value="{{old('name')}}">
          </div>

          <h5 class="mt-4 mb-0"><b>Выбор тур оператора</b></h5>
          <div class="col-md-12">
            <select required class="form-select" name="company" aria-label="Default select example">
              <option selected value="">Нажмите чтобы открыть список</option>
              @foreach ($orgs as $org)  
                <option {{((old('org') == $org -> id) ? "selected" : '')}} value="{{$org -> id}}">{{$org -> name}}</option>
              @endforeach
            </select>
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Туда</b></h4>

          <h5 class="mt-4 mb-0"><b>Вылет</b></h5>
          <div class="col-md-4">
            <label for="start_leave_1_date" class="form-label">Дата</label>
            <input required type="date" class="form-control" name="start_leave_1_date" id="start_leave_1_date" value="{{old('start_leave_1_date')}}">
          </div>
          <div class="col-md-4">
            <label for="start_leave_1_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="start_leave_1_time" id="start_leave_1_time" value="{{old('start_leave_1_time')}}">
          </div>
          <div class="col-md-4">
            <label for="start_leave_1_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="start_leave_1_city" id="start_leave_1_city"  value="{{old('start_leave_1_city')}}">
          </div>

          <div class="row g-3" id="start_fly_complex">

            @for ($i = 2; $i <= old('all_flys'); $i++)

              <h5 class="gbr-{{$i}} mt-4 mb-0"><b>Прилёт</b></h5>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_come_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="start_come_{{$i}}_date" id="start_come_{{$i}}_date" value="{{old('start_come_'.$i.'_date')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_come_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="start_come_{{$i}}_time" id="start_come_{{$i}}_time" value="{{old('start_come_'.$i.'_time')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_come_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="start_come_{{$i}}_city" id="start_come_{{$i}}_city" value="{{old('start_come_'.$i.'_city')}}">
              </div>
        
              <h5 class="gbr-{{$i}} mt-4 mb-0"><b>Вылет</b></h5>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_leave_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="start_leave_{{$i}}_date" id="start_leave_{{$i}}_date" value="{{old('start_leave_'.$i.'_date')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_leave_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="start_leave_{{$i}}_time" id="start_leave_{{$i}}_time" value="{{old('start_leave_'.$i.'_time')}}">
              </div>
              <div class="gbr-{{$i}} col-md-4">
                <label for="start_leave_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="start_leave_{{$i}}_city" id="start_leave_{{$i}}_city" value="{{old('start_leave_'.$i.'_city')}}">
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
            <input required type="date" class="form-control" name="start_come_4_date" id="start_come_4_date" value="{{old('start_come_4_date')}}">
          </div>
          <div class="col-md-4">
            <label for="start_come_4_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="start_come_4_time" id="start_come_4_time" value="{{old('start_come_4_time')}}">
          </div>
          <div class="col-md-4">
            <label for="start_come_4_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="start_come_4_city" id="start_come_4_city" value="{{old('start_come_4_city')}}">
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Обратно</b></h4>

          <h5 class="mt-4 mb-0"><b>Вылет</b></h5>
          <div class="col-md-4">
            <label for="end_leave_1_date" class="form-label">Дата</label>
            <input required type="date" class="form-control" name="end_leave_1_date" id="end_leave_1_date" value="{{old('end_leave_1_date')}}">
          </div>
          <div class="col-md-4">
            <label for="end_leave_1_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="end_leave_1_time" id="end_leave_1_time" value="{{old('end_leave_1_time')}}">
          </div>
          <div class="col-md-4">
            <label for="end_leave_1_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="end_leave_1_city" id="end_leave_1_city" value="{{old('end_leave_1_city')}}">
          </div>

          <div class="row g-3" id="end_fly_complex">
            @for ($i = 2; $i <= old('all_flys_end'); $i++)

              <h5 class="gbre-{{$i}} mt-4 mb-0"><b>Прилёт</b></h5>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_come_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="end_come_{{$i}}_date" id="end_come_{{$i}}_date" value="{{old('end_come_'.$i.'_date')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_come_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="end_come_{{$i}}_time" id="end_come_{{$i}}_time" value="{{old('end_come_'.$i.'_time')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_come_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="end_come_{{$i}}_city" id="end_come_{{$i}}_city" value="{{old('end_come_'.$i.'_city')}}">
              </div>
        
              <h5 class="gbre-{{$i}} mt-4 mb-0"><b>Вылет</b></h5>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_leave_{{$i}}_date" class="form-label">Дата</label>
                <input required type="date" class="form-control" name="end_leave_{{$i}}_date" id="end_leave_{{$i}}_date" value="{{old('end_leave_'.$i.'_date')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_leave_{{$i}}_time" class="form-label">Время</label>
                <input required type="Time" class="form-control" name="end_leave_{{$i}}_time" id="end_leave_{{$i}}_time" value="{{old('end_leave_'.$i.'_time')}}">
              </div>
              <div class="gbre-{{$i}} col-md-4">
                <label for="end_leave_{{$i}}_city" class="form-label">Город</label>
                <input required type="text" maxlength="30" class="form-control" name="end_leave_{{$i}}_city" id="end_leave_{{$i}}_city" value="{{old('end_leave_'.$i.'_city')}}">
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
            <input required type="date" class="form-control" name="end_come_4_date" id="end_come_4_date" value="{{old('end_come_4_date')}}">
          </div>
          <div class="col-md-4">
            <label for="end_come_4_time" class="form-label">Время</label>
            <input required type="Time" class="form-control" name="end_come_4_time" id="end_come_4_time" value="{{old('end_come_4_time')}}">
          </div>
          <div class="col-md-4">
            <label for="end_come_4_city" class="form-label">Город</label>
            <input required type="text" maxlength="30" class="form-control" name="end_come_4_city" id="end_come_4_city" value="{{old('end_come_4_city')}}">
          </div>

          <hr>

          <h4 class="mt-0 mb-0"><b>Города</b></h4>


          <div class="col-md-4">
            <label for="city_name_1" class="form-label">Название</label>
            <input required type="text" maxlength="40" class="form-control" name="city_name_1" id="city_name_1" value="{{old('city_name_1')}}">
          </div>
          <div class="col-md-4">
            <label for="city_days_1" class="form-label">Дней</label>
            <input required type="number" min="0" class="form-control" name="city_days_1" id="city_days_1" value="{{old('city_days_1')}}">
          </div>
          <div class="col-md-4">
            <label for="city_nights_1" class="form-label">Ночей</label>
            <input required type="number" min="0" class="form-control" name="city_nights_1" id="city_nights_1" value="{{old('city_nights_1')}}">
          </div>

          <div class="col-md-3">
            <label for="distance_city_1" class="form-label">Расстояние</label>
            <input required type="number" min="0" class="form-control" id="distance_city_1" name="distance_city_1" value="{{old('distance_city_1')}}">
          </div>
          <div class="col-md-3">
            <label for="city_eats_1" class="form-label">Питание</label>
            <input required type="number" min="0" class="form-control" name="city_eats_1" id="city_eats_1" value="{{old('city_eats_1')}}">
          </div>
          <div class="col-md-3">
            <label for="city_hotel_1" class="form-label">Отель</label>
            <input required type="text" class="form-control" name="city_hotel_1" id="city_hotel_1" value="{{old('city_hotel_1')}}">
          </div>
          <div class="col-md-3">
            <label for="city_hotel_stars_1" class="form-label">Звёзды</label>
            <input required type="number" min="0" max="7" class="form-control" name="city_hotel_stars_1" id="city_hotel_stars_1" value="{{old('city_hotel_stars_1')}}">
          </div>

          <div class="row g-3" id="city_complex">
            @for ($i = 2; $i <= old('all_cityes'); $i++)
              <div class="gbrs-{{$i}} col-md-4">
                <label for="city_name_{{$i}}" class="form-label">Название</label>
                <input required type="text" maxlength="40" class="form-control" name="city_name_{{$i}}" id="city_name_{{$i}}" value="{{old('city_name_'.$i)}}">
              </div>
              <div class="gbrs-{{$i}} col-md-4">
                <label for="city_days_{{$i}}" class="form-label">Дней</label>
                <input required type="number" min="0" class="form-control" name="city_days_{{$i}}" id="city_days_{{$i}}" value="{{old('city_days_'.$i)}}">
              </div>
              <div class="gbrs-{{$i}} col-md-4">
                <label for="city_nights_{{$i}}" class="form-label">Ночей</label>
                <input required type="number" min="0" class="form-control" name="city_nights_{{$i}}" id="city_nights_{{$i}}" value="{{old('city_nights_'.$i)}}">
              </div>
          
              <div class="gbrs-{{$i}} col-md-3">
                <label for="distance_city_{{$i}}" class="form-label">Расстояние</label>
                <input required type="number" min="0" class="form-control" name="distance_city_{{$i}}" id="distance_city_{{$i}}" value="{{old('distance_city_'.$i)}}">
              </div>
              <div class="gbrs-{{$i}} col-md-3">
                <label for="city_eats_{{$i}}" class="form-label">Питание</label>
                <input required type="number" min="0" class="form-control" name="city_eats_{{$i}}" id="city_eats_{{$i}}" value="{{old('city_eats_'.$i)}}">
              </div>
              <div class="gbrs-{{$i}} col-md-3">
                <label for="city_hotel_{{$i}}" class="form-label">Отель</label>
                <input required type="text" class="form-control" name="city_hotel_{{$i}}" id="city_hotel_{{$i}}" value="{{old('city_hotel_'.$i)}}">
              </div>
              <div class="gbrs-{{$i}} col-md-3">
                <label for="city_hotel_stars_{{$i}}" class="form-label">Звёзды</label>
                <input required type="number" min="0" max="7" class="form-control" name="city_hotel_stars_{{$i}}" id="city_hotel_stars_{{$i}}" value="{{old('city_hotel_stars_'.$i)}}">
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
            <input required type="number" min="0" class="form-control" name="price" id="price" value="{{old('price')}}">
          </div>
          <div class="col-md-3">
            <label for="bonus" class="form-label">Бонус</label>
            <input required type="number" min="0" class="form-control" name="bonus" id="bonus" value="{{old('bonus')}}">
          </div>
          <div class="col-md-3">
            <label for="places" class="form-label">Кол-во мест</label>
            <input required type="number" min="0" class="form-control" name="places" id="places" value="{{old('places')}}">
          </div>
          <div class="col-md-3">
            <label for="places_limit" class="form-label">Ограничение на бронь</label>
            <input type="number" min="0" class="form-control" name="places_limit" id="places_limit" value="{{old('places_limit')}}">
          </div>

          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="transfer" {{(old('transfer')) ? "checked" : ""}}>
              <label class="form-check-label" for="transfer">
                Трансфер
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="guide" {{(old('guide')) ? "checked" : ""}}>
              <label class="form-check-label" for="guide">
                Гид
              </label>
            </div>
          </div>

          <textarea class="form-control" placeholder="Напишите комментарий" name="description" id="description" style="height: 100px;">{{old('description')}}</textarea>

          <div class="text-center">
            @if(getenv('APP_DEBUG') == "true")
              <span type="submit" class="btn btn-primary" id="test_btn">ТЕСТ <i class="bi bi-back"></i></span>
            @endif
            
            <button type="submit" class="btn btn-primary">Создать Тур <i class="bi bi-check-lg"></i></button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script>
    let all_flys = 1;
    let all_flys_end = 1;
    let all_cityes = 1;
    
    let ifl = "{{old('all_flys')}}";
    if(ifl != "") {
      all_flys = Number("{{old('all_flys')}}");
      all_flys_end = Number("{{old('all_flys_end')}}");
      all_cityes = Number("{{old('all_cityes')}}");
    }
  </script>

@endsection