@extends('layouts.agent')


@section('title', 'Забронированные туры')
@section('header_title', APP_NAME)
@section('sub_title', 'Забронированные туры')

@section('username', $_SESSION['user'] -> full_name)
@php
use ThreadBeanPHP\C as C;
$org_h = C::findOne("companys", "id = ?", [$_SESSION['user'] -> company]);
@endphp
@section('usersubname', $org_h -> name)


@section('content')

<div class="card">
  <div class="card-body">
    <div class="card-title">Список Всех активных Забронированных туров</div>
    <div style="overflow-y:scroll;">

      @foreach ($busyes as $busy)

        @php
          $tour = C::findOne('tours', 'id = ?', [$busy -> tour]);
          
          if(!$tour -> active) {
            continue;
          }

          $org = C::findOne("companys", "id = ?", [$tour -> company]);
          $agent = C::findOne("agents", "company = ?", [$org -> id]);

          $busy_count = C::find("busy", "tour = ?", [$tour -> id]);
          $places_rem = $tour -> places;
          foreach ($busy_count as $item) {
            $places_rem -= $item -> places;
          }


          $city_start_1 = json_decode($tour -> start_leave_1, true);
          $city_start_2 = json_decode(@$tour -> start_come_2, true);
          $city_start_3 = json_decode(@$tour -> start_come_3, true);
          $city_start_4 = json_decode($tour -> start_come_4, true);

          $city_end_1 = json_decode($tour -> end_leave_1, true);
          $city_end_2 = json_decode(@$tour -> end_come_2, true);
          $city_end_3 = json_decode(@$tour -> end_come_3, true);
          $city_end_4 = json_decode($tour -> end_come_4, true);

          if(@$tour -> city_days_2) {
            $days = $tour -> city_days_1 + $tour -> city_days_2;
          } else {
            $days = $tour -> city_days_1;
          }


          // $date1 = DateTime::createFromFormat('Y-m-d H:i', ($city_start_4['date'].' '.$city_start_1['time'])); // первая дата
          // $date2 = DateTime::createFromFormat('Y-m-d H:i', ($city_end_1['date'].' '.$city_end_1['time'])); // вторая дата

          // $diff = $date1->diff($date2);
          // $total_hours = $diff->h + $diff->days * 24;

          // echo $total_hours; // вывод общего количества часов

        @endphp

        <div class="col card-2 mb-4">
          <a href="/tour?id={{$tour -> id}}" class="un-style">
            <div class="row-lg-12 cnt">
              <img src="{{(@$agent -> avatar) ? "/uploads/avatar/".$agent -> avatar : "/assets/img/profile-img.jpg"}}" alt="Profile" class="rounded-circle" width="50rem">
              <span class="mx-3 lead"><b>{{$org -> name}}</b></span>
              |
              <span class="mx-3 lead">Цена <b>{{$tour -> price}}$</b></span>
              |
              <span class="mx-3 lead">Всего мест <b>{{$tour -> places}}</b></span>
              |
              <span class="mx-3 lead">Свободно мест <b>{{$places_rem}}</b></span>
              |
              <span class="mx-3 lead">Время прибывания <b>{{$days}}</b> дней</span>
            </div>
          </a>
          <div class="row-lg-12 mt-3">
            <h3>{{$tour -> name}}</h3>
            <nav style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Отправление |</b> </span>
                <li class="breadcrumb-item lead active"> {{$city_start_1['city']}}</li>
                {!!(@$tour -> start_come_2) ? '<li class="breadcrumb-item lead">'.$city_start_2['city'].'</li>' : ""!!}
                {!!(@$tour -> start_come_3) ? '<li class="breadcrumb-item lead">'.$city_start_3['city'].'</li>' : ""!!}
                <li class="breadcrumb-item lead active">{{$city_start_4['city']}}</li>
                <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>{{$city_start_1['date']}}</i>
                | Забронировано {{@$busy -> places}}</b>
                </span>
              </ol>
            </nav>
            <nav style="--bs-breadcrumb-divider: '>';">
              <ol class="breadcrumb">
                <span class="lead" style="margin-right:0.5rem;margin-top:-1px;"><b>Возвращение |</b> </span>
                <li class="breadcrumb-item lead active"> {{$city_end_1['city']}}</li>
                {!!(@$tour -> end_come_2) ? '<li class="breadcrumb-item lead">'.$city_end_2['city'].'</li>' : ""!!}
                {!!(@$tour -> end_come_3) ? '<li class="breadcrumb-item lead">'.$city_end_3['city'].'</li>' : ""!!}
                <li class="breadcrumb-item lead active">{{$city_end_4['city']}}</li>
                <span class="lead-p" style="margin-left:0.5rem;margin-top:-2px;"><b><i>{{$city_end_1['date']}}</i></b>
                  <button delid="{{$busy -> id}}" class="busy_delete_btn btn btn-danger mx-2"><i class="bi bi-trash-fill"></i></button>
                </span>
              </ol>
            </nav>
          </div>
        </div>

      @endforeach
      

    </div>
  </div>
</div>

<script>
  const req_del_busy_url = "{{route('DeleteBusy')}}";
</script>
@endsection
